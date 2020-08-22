<?php

namespace Skillbox;

use \Bitrix\Sale\Location\LocationTable;

include $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

class SimpleLocations
{
    private const COUNTRY_LOCATION_ID = 1;
    private const COUNTRY_DISTRICT_LOCATION_ID = 2;
    private const REGION_LOCATION_ID = 3;
    private const CITY_LOCATION_ID = 5;
    private const FIRST_SERVICE_ID = 5;
    private const SECOND_SERVICE_ID = 6;

    private $dadataLocation;
    private $bitrixLocation;
    private $xmlId;

    public function __construct(string $city, string $xmlId)
    {
        $this->dadataLocation = $this->getLocationFormDadata($city);
        $this->bitrixLocation = $this->getLocationFormBitrix($city);
        if ($this->bitrixLocation) {
            $this->bitrixLocation['EXTERNAL'] = $this->addExternal($city);
        }
        $this->xmlId = $xmlId;
    }

    /**
     * Getter for dadataLocation property
     * @return array
     */
    public function getDadataLocation(): array
    {
        return $this->dadataLocation;
    }

    /**
     * Getter for bitrixLocation property
     */
    public function getBitrixLocation()
    {
        return $this->bitrixLocation;
    }

    /**
     * Get the result for the location from the dadata.ru service
     * @param  string $city
     * @return array
     */
    private function getLocationFormDadata(string $city): array
    {
        $token = "66e4b04f562a6c657f9a145919875e8b8e960eb4";
        $secret = "6b20ecdfbd836f90915fef87e16fc3c4648a62ce";
        $dadata = new \Dadata\DadataClient($token, $secret);

        return $dadata->clean("address", $city);
    }

    /**
     * Get the result for the location from the Bitrix
     * @param  string $city
     */
    private function getLocationFormBitrix(string $city)
    {
        return LocationTable::getList(array(
            'filter' => ['=NAME.LANGUAGE_ID' => LANGUAGE_ID, '=NAME.NAME' => $city],
            'select' => ['ID', 'CODE', 'PARENT_ID', 'NAME_RU' => 'NAME.NAME'],
        ))->fetch();
    }

    /**
     * General method for starting location processing
     * @return string
     */
    public function run(): string
    {
        try {
            if ($this->bitrixLocation && $this->dadataLocation[fias_id]) {
                return $this->addLocationData() . PHP_EOL . '######################################' . PHP_EOL;
            }

            if (!$this->bitrixLocation && $this->dadataLocation[fias_id]) {
                return $this->addLocation() . PHP_EOL . '######################################' . PHP_EOL;
            }

            throw new \Exception('Город не найден в справочнике' . PHP_EOL);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Get External data for a location from Bitrix
     * @param string $city
     * @return array
     */
    private function addExternal(string $city): array
    {
        $result = '';
        $external = [];

        if ($this->bitrixLocation) {
            $result = LocationTable::getList(array(
                'filter' => ['=NAME.LANGUAGE_ID' => LANGUAGE_ID, '=NAME.NAME' => $city],
                'select' => ['EXTERNAL.*'],
            ));
        }

        while ($item = $result->fetch()) {
            $external[$item['SALE_LOCATION_LOCATION_EXTERNAL_SERVICE_ID']] = $item['SALE_LOCATION_LOCATION_EXTERNAL_XML_ID'];
        }

        return $external;
    }

    /**
     * Set External data for a location
     * @param int|integer $locationId
     * @return string
     */
    private function addLocationData(int $locationId = 0): string
    {
        $serviceId = preg_match('#^sa#siU', $this->xmlId) ? self::SECOND_SERVICE_ID : self::FIRST_SERVICE_ID;

        if (in_array($this->xmlId, $this->bitrixLocation['EXTERNAL'])) {
            throw new \Exception("У местоположения '{$this->bitrixLocation['NAME_RU']}' уже есть Внешние данные с кодом '{$this->xmlId}'" . PHP_EOL);
        }

        $result = LocationTable::update($locationId !== 0 ? $locationId : $this->bitrixLocation['ID'], [
            'EXTERNAL' => [
                ['SERVICE_ID' => $serviceId, 'XML_ID' => (string) $this->xmlId],
            ],
        ]);

        if ($result->isSuccess()) {
            return "Для местоположения '{$this->bitrixLocation['NAME_RU']}' добавлены Внешние данные с кодом '{$this->xmlId}'";
        }

        return "Не удалось добавить Внешние данные для местоположения '{$this->bitrixLocation['NAME_RU']}'";
    }

    /**
     * Add location
     * @return string
     */
    private function addLocation(): string
    {
        $city = $this->dadataLocation['source'] === 'Москва' ? $this->dadataLocation['source'] : $this->dadataLocation['city'];
        $parents = $this->addLocationParents();
        $parentId = $parents['ID'];
        $resultMessage .= $parents['MESSAGE'];

        $result = LocationTable::add(array(
            'CODE' => $this->dadataLocation[fias_id],
            'SORT' => '100',
            'PARENT_ID' => $parentId,
            'TYPE_ID' => self::CITY_LOCATION_ID,
            'NAME' => [
                'ru' => ['NAME' => $city],
                'en' => ['NAME' => \Cutil::translit($city, "ru")],
            ],
            'LATITUDE' => $this->dadataLocation['geo_lat'],
            'LONGITUDE' => $this->dadataLocation['geo_lon'],
        ));

        if ($result->isSuccess()) {
            $resultMessage .= "Добавлено новое местоположение '{$city}' c ID {$result->getId()}" . PHP_EOL;
            $this->bitrixLocation['NAME_RU'] = $city;
            $resultMessage .= $this->addLocationData($result->getId());

            return $resultMessage;
        }

        throw new \Exception($res->getErrorMessages());
    }

    /**
     * Adding parent locations
     * @return array
     */
    private function addLocationParents(): array
    {
        $message = '';
        $parentId = self::COUNTRY_LOCATION_ID;

        $locationStructure = [
            self::COUNTRY_DISTRICT_LOCATION_ID => $this->dadataLocation['federal_district'],
            self::REGION_LOCATION_ID => "{$this->dadataLocation['region']} {$this->dadataLocation['region_type_full']}",
        ];

        foreach ($locationStructure as $locationType => $locationName) {
            if ($parent = $this->isLocationExists($locationName)) {
                $parentId = $parent['ID'];
                continue;
            }

            $code = mb_strtolower(\Cutil::translit($locationName, "ru") . '-' . rand(1000, 9000));

            $result = LocationTable::add(array(
                'CODE' => $code,
                'SORT' => '100',
                'PARENT_ID' => $parentId,
                'TYPE_ID' => $locationType,
                'NAME' => [
                    'ru' => ['NAME' => $locationName],
                    'en' => ['NAME' => \Cutil::translit($locationName, "ru")],
                ],
            ));

            if ($result->isSuccess()) {
                $parentId = $result->getId();
                $message .= "Добавлено родительское местоположение '{$locationName}'" . PHP_EOL;
            } else {
                throw new \Exception($result->getErrorMessages());
            }
        }

        return ['ID' => $parentId, 'MESSAGE' => $message];
    }

    /**
     * Check if the location exists and return its id
     * @param  string  $location
     */
    public function isLocationExists(string $location)
    {
        return LocationTable::getList(array(
            'filter' => array('=NAME.NAME' => $location),
            'select' => array('ID'),
        ))->fetch();
    }

    public static function getCity($ip): array
    {
        $token = "66e4b04f562a6c657f9a145919875e8b8e960eb4";
        $dadata = new \Dadata\DadataClient($token, null);

        return $dadata->iplocate($ip);
    }
}

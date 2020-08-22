<?php

namespace Skillbox;

class SimpleProductsImport
{
    private $products = [];

    private const IBLOCK_ID = 4;
    private const OFFERS_IBLOCK_ID = 5;

    public function __construct(string $fileName)
    {
        $file = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/local/integration/data/' . $fileName);
        $this->products = new \SimpleXMLElement($file);
    }

    /**
     * Debug
     * @return \SimpleXMLElement
     */
    public function deb(): \SimpleXMLElement
    {
        return $this->products;
    }

    /**
     * Run the creation of goods
     * @return string
     */
    public function run(): string
    {
        $resultMessage = '';
        foreach ($this->products as $product) {
            try {
                $this->productId = $this->addProduct($product);
                $resultMessage .= 'Товар добавлен успешно' . PHP_EOL;
                $this->addProperties($product);
                $resultMessage .= 'Свойства привязаны к товару' . PHP_EOL;                
                if (isset($product->OFFERS)) {
                    $this->addOffers($product->OFFERS);
                    $resultMessage .= 'Для товара добавлены торговые предложения' . PHP_EOL;
                }   
                return $resultMessage;
            } catch (\Exception $e) {
                return "Ошибка: {$e->getMessage()}";
            }

            break;
        }
    }

    /**
     * Add product
     * @param \SimpleXMLElement $product
     * @return integer
     */
    private function addProduct(\SimpleXMLElement $product): int
    {
        $el = new \CIBlockElement();

        $arFields = [
            "IBLOCK_ID" => self::IBLOCK_ID,
            "IBLOCK_SECTION_ID" => $product->SECTION_ID,
            "NAME" => $product->NAME,
            "CODE" => $product->CODE,
            "ACTIVE" => "Y",
            "PREVIEW_TEXT" => mb_strimwidth($product->DESCRIPTION, 0, 30),
            "DETAIL_TEXT" => $product->DESCRIPTION,
        ];

        if ($productId = $el->Add($arFields)) {
            return $productId;
        }

        throw new \Exception('При создании товара произошла ошибка');
    }

    /**
     * Add product properties
     * @param \SimpleXMLElement $product
     * @return boolean
     */
    private function addProperties(\SimpleXMLElement $product): bool
    {
        if (isset($product->SYKNO)) {
            $this->addSyknoProperties($product->SYKNO);
        }

        return true;
    }

    /**
     * Add Sykno type properties
     * @param \SimpleXMLElement $sykno
     */
    private function addSyknoProperties(\SimpleXMLElement $sykno)
    {
        $props = [];
        foreach ($sykno->VARIANT as $prop) {
            $props[] = (string) $prop;
        }

        \CIBlockElement::SetPropertyValuesEx(
            $this->productId,
            self::IBLOCK_ID,
            ['SYKNO' => $props]
        );
    }

    /**
     * Add offers
     * @param \SimpleXMLElement $offers
     * @return boolean
     */
    private function addOffers(\SimpleXMLElement $offers): bool
    {
        foreach ($offers->OFFER as $offer) {
            $el = new \CIBlockElement;

            $arFields = [
                "IBLOCK_ID" => self::OFFERS_IBLOCK_ID,
                "PROPERTY_VALUES" => ["CML2_LINK" => $this->productId],
                "NAME" => $offer->GAME_TYPE . ' ' . $offer->SIZE_FIELD,
                "ACTIVE" => "Y",
            ];

            if (!$offerId = $el->Add($arFields)) {
                throw new \Exception('Не удалось добавить торговые предложения');
            }

            $this->addOfferProperties($offerId, $offer);
        }
        
        return true;
    }

    /**
     * Add offer properties
     * @param int               $offerId
     * @param \SimpleXMLElement $offer
     */
    private function addOfferProperties(int $offerId, \SimpleXMLElement $offer) 
    {
        \CIBlockElement::SetPropertyValuesEx(
            $offerId,
            self::OFFERS_IBLOCK_ID,
            ['VES' => $offer->VES, 'QTY_LEGS' => $offer->QTY_LEGS]
        );
    }
}

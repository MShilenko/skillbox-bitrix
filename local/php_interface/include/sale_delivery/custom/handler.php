<?php

namespace Sale\Handlers\Delivery;

use Bitrix\Sale\Delivery\CalculationResult;
use Bitrix\Sale\Delivery\Services\Base;
use \Bitrix\Sale\Location\LocationTable;

class CustomHandler extends Base
{
    public static function getClassTitle()
    {
        return 'Доставка по городу';
    }

    public static function getClassDescription()
    {
        return 'Доставка, стоимость которой зависит от города';
    }

    protected function calculateConcrete(\Bitrix\Sale\Shipment $shipment)
    {
        $deliveryPrice = $this->config["MAIN"]["BASE_PRICE"];

        $order = $shipment->getCollection()->getOrder();
        $basket = $order->getBasket();
        $basePrice = $basket->getBasePrice();
        $props = $order->getPropertyCollection(); 
        $location = $this->getLocation($props->getDeliveryLocation()->getValue());

        if ($basePrice > $this->config["MAIN"]["PRICE"] && $location['NAME_RU'] === 'Москва') {
            $deliveryPrice = 0;
        } elseif (strlen($location['NAME_RU']) % 2) {
            $deliveryPrice = 800;
        }

        $result = new CalculationResult();
        $result->setDeliveryPrice($deliveryPrice);

        return $result;
    }

    protected function getConfigStructure()
    {
        return array(
            "MAIN" => array(
                "TITLE" => 'Основные настройки',
                "DESCRIPTION" => 'Сумма заказа', "ITEMS" => array(
                    "PRICE" => array(
                        "TYPE" => "NUMBER",
                        "MIN" => 0,
                        "NAME" => 'Заказ на сумму не более',
                    ),
                    "BASE_PRICE" => array(
                        "TYPE" => "NUMBER",
                        "MIN" => 0,
                        "NAME" => 'Базовая цена доставки',
                    ),
                ),
            ),
        );
    }

    private function getLocation($location)
    {
        return LocationTable::getList(array(
            'filter' => array('=CODE' => $location, '=NAME.LANGUAGE_ID' => LANGUAGE_ID),
            'select' => array('NAME_RU' => 'NAME.NAME'),
        ))->fetch();
    }

    public function isCalculatePriceImmediately()
    {
        return true;
    }

    public static function whetherAdminExtraServicesShow()
    {
        return true;
    }
}

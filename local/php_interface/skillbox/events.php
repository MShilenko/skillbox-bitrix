<?php

use Skillbox\SimpleEvents;
use Skillbox\Catalog;

$event = new SimpleEvents();

$event->run('iblock', 'OnBeforeIBlockElementAdd', Catalog::class, 'onBeforeIBlockElementAddHandler');

Bitrix\Main\EventManager::getInstance()->addEventHandler(
    'sale',
    'onSaleDeliveryRestrictionsClassNamesBuildList',
    'myDeliveryFunction'
);

function myDeliveryFunction()
{
    return new \Bitrix\Main\EventResult(
        \Bitrix\Main\EventResult::SUCCESS,
        array(
            '\ByCubeValue' => '/local/php_interface/skillbox/class/Restrictions/ByCubeValue.php',
        )
    );
}
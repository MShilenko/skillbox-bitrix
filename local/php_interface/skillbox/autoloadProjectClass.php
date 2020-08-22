<?php

use Bitrix\Main\Loader;

Loader::registerAutoLoadClasses(null, [
	#Класс с NAMESPACE -> файл с классом
	'\Skillbox\Catalog' => '/local/php_interface/skillbox/class/Catalog.php',
    '\Skillbox\SimpleSoap' => '/local/php_interface/skillbox/class/SimpleSoap.php',
    '\Skillbox\SimpleProductsImport' => '/local/php_interface/skillbox/class/SimpleProductsImport.php',
    '\Skillbox\User' => '/local/php_interface/skillbox/class/User.php',
    '\Skillbox\SimpleEvents' => '/local/php_interface/skillbox/class/SimpleEvents.php',
    '\Skillbox\SimpleLocations' => '/local/php_interface/skillbox/class/SimpleLocations.php',
    '\Dadata\DadataClient' => '/local/php_interface/skillbox/class/Dadata/DadataClient.php',
    '\Dadata\CleanClient' => '/local/php_interface/skillbox/class/Dadata/CleanClient.php',
    '\Dadata\ClientBase' => '/local/php_interface/skillbox/class/Dadata/ClientBase.php',
    '\Dadata\ProfileClient' => '/local/php_interface/skillbox/class/Dadata/ProfileClient.php',
    '\Dadata\Settings' => '/local/php_interface/skillbox/class/Dadata/Settings.php',
    '\Dadata\SuggestClient' => '/local/php_interface/skillbox/class/Dadata/SuggestClient.php',
]);
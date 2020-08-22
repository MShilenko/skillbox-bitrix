<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

$file = file_get_contents(__DIR__ . '/data/data.xml');
$products = new \SimpleXMLElement($file);
vd($products);
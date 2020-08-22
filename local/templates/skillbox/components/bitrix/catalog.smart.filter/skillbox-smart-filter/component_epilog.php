<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */

CJSCore::Init(array('fx', 'popup'));

global $APPLICATION;

$APPLICATION->SetPageProperty('SEO_CITY_PREPOSITIONAL', 'Москве'); 
$APPLICATION->SetPageProperty('SEO_MIN_PRICE', $arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["HTML_VALUE"] ?? $arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["VALUE"]); 
$APPLICATION->SetPageProperty('SEO_MAX_PRICE', $arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["HTML_VALUE"] ?? $arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["VALUE"]); 
?>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"); ?>
Skillbox
<?
$APPLICATION->IncludeComponent(
    "skillbox:slider.main",
    "",
    [
        "IBLOCK_ID" => 4,
        "CACHE_TIME" => 0,
        "CACHE_TYPE" => "A",
    ]
);
?>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>

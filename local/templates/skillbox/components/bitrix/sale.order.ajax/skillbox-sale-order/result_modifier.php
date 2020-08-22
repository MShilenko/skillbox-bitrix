<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult['ORDER_PROP']['USER_PROPS_Y'] as $item) {
    if (in_array($item['CODE'], ['FIO', 'EMAIL', 'PHONE', 'LOCATION'])) {
        if ($item['CODE'] == 'LOCATION') {
            $arParams['PERSONAL_BLOCK_DATA_LOCATION'] = [
                'ID' => $item['ID'], 
                'NAME' => $item['NAME'], 
                'VALUE' => $item['VALUE'], 
                'DEFAULT_VALUE' => $item['DEFAULT_VALUE'], 
                'FIELD_NAME' => $item['FIELD_NAME']
            ];
        } else {
            $arParams['PERSONAL_BLOCK_DATA'][$item['CODE']] = $item;
        }
    }
}

$signedParams = (new Bitrix\Main\Security\Sign\Signer)->sign(base64_encode(serialize($arParams)), 'sale.order.ajax');
$arParams['SIGNED_PARAMS'] = CUtil::JSEscape($signedParams);
<?php

namespace Skillbox;

use Bitrix\Main\SystemException;

class Catalog
{
    public function onBeforeIBlockElementAddHandler(&$arFields)
    {
        try {
            $pos = stripos($arFields['NAME'], "КАКТУС");

            if ($pos !== false) {
                throw new SystemException("Слово 'КАКТУС' запрещено!");
            }
        } catch (SystemException $exception) {
            \CAdminMessage::ShowMessage($exception->getMessage());
            return false;
        }
    }
}

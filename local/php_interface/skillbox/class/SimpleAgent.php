<?php

namespace Skillbox;

class SimpleAgent
{
    public static function init()
    {
        $arEventFields = array(
            'TIME_RUN' => date("m.d.Y H:m:s"),   
            'RANDOM_STR' => random_bytes(4),   
        );
        CEvent::Send("TEST_AGENT", 's1', $arEventFields);

        return "\Skillbox\SimpleAgent::init()";
    }
}
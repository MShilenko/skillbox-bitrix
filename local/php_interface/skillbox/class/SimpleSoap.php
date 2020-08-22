<?php

namespace Skillbox;

use \SoapClient;

class SimpleSoap
{
    private $SOAPClient;

    public function __construct(string $wsdl)
    {
        $this->$SOAPClient = new SoapClient($wsdl);
    }

    public function getSOAPClient(): SoapClient
    {
        return $this->$SOAPClient;   
    }
}
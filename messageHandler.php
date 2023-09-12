<?php

spl_autoload_register(function ($class) {
    require_once 'messages/' . $class . '.php';
});

class messageHandler
{
    public function decode($message)
    {
        $msgcode = substr($message, 0, 2);
        $response = ini($msgcode)->build();
        return $response;
    }
}

function ini($msgcode)
{
    switch ($msgcode) {
        case '09':
            return new itemCheckinResponse();
        case '23':
            return new patronStatusResponse();
        case '11':
            return new checkoutResponse();
        case '97':
            return new ACSStatus();
        case '93':
            return new loginResponse();
        case '63':
            return new patronInformationResponse();
        case '35':
            return new endSessionResponse();
        case '37':
            return new feePaidResponse();
        case '17':
            return new itemInformationResponse();
        case '19':
            return new itemStatusUpdateResponse();
        case '25':
            return new patronEnableResponse();
        case '15':
            return new holdResponse();
        case '29':
            return new renewResponse();
        case '65':
            return new renewAllResponse();
    }
}

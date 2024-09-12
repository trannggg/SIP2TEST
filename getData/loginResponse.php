<?php
require_once 'messages/loginResponse.php';
function getDataLoginResponse($message){
    $data['LoginResponse'] = [];

    if(strlen($message) == 3){

        $loginResponse = new LoginResponse;
        
        // Extract login result ok?
        $loginResponse->setOk(substr($message,2,1));
        $data['LoginResponse']['IsOk'] = $loginResponse->isOk();
    }else{
        echo "Invalid message format\n";
    }
    return $data;
}
?>
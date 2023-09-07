<?php
function getDataLoginResponse($message){
    $data['LoginResponse'] = [];

    if(strlen($message) == 3){
        // Extract login result ok?
        $ok = substr($message,2,1);
        $data['LoginResponse']['IsOk'] = $ok;
    }else{
        echo "Invalid message format\n";
    }
    return $data;
}
?>
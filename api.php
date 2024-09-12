<?php
foreach (glob("postData/*.php") as $filename) {
    require_once $filename;
}
function callAPI($message){
    $components = explode('|', $message);
    $uidAlgorithm = substr($components[0], 0, 2);
    switch ($uidAlgorithm){
        case '11': return postCheckout($message);
        case '09': return postCheckin($message);
    }
}

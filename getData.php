<?php
require 'data/login.php';
require 'data/endSession.php';
require 'data/itemCheckin.php';
require 'data/itemCheckout.php';
require 'data/itemInformation.php';
require 'data/renewAllItems.php';
require 'data/renewItem.php';
require 'data/updateNotice.php';
require 'data/feePaid.php';
require 'data/patronStatus.php';

function getData($message){
    $components = explode('|', $message);
    $uidAlgorithm = substr($components[0], 0, 2);
    switch ($uidAlgorithm){
        case '93': return getDataLogin($message);
        case '09': return getDataItemCheckin($message);
        case '65': return getDataRenewAllItems($message);
        case '35': return getDataEndSession($message);
        case '11': return getDataItemCheckout($message);
        case '29': return getDataRenew($message);
        case '17': return getDataInformation($message);
        case '43': return getDataUpdateNotice($message);
        case '23': return getDataPatronStatus($message);
        case '37': return getDataFeePaid($message);
    }
}
?>

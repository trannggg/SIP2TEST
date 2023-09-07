<?php
require_once 'data/login.php';
require_once 'data/endSession.php';
require_once 'data/itemCheckin.php';
require_once 'data/itemCheckout.php';
require_once 'data/itemInformation.php';
require_once 'data/renewAllItems.php';
require_once 'data/renewItem.php';
require_once 'data/updateNotice.php';
require_once 'data/feePaid.php';
require_once 'data/patronStatus.php';
require_once 'data/patronInformation.php';

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
        case '63':  return getDataPatronInformation($message);
    }
}
?>

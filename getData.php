<?php

foreach (glob("getData/*.php") as $filename) {
    require $filename;
}

function getData($message){
    $components = explode('|', $message);
    $uidAlgorithm = substr($components[0], 0, 2);
    switch ($uidAlgorithm){
        case '93': return getDataLogin($message);
        case '94': return getDataLoginResponse($message);
        case '09': return getDataItemCheckin($message);
        case '10': return getDataItemCheckinResponse($message);
        case '65': return getDataRenewAllItems($message);
        case '66': return getDataRenewAllItemsResponse($message);
        case '35': return getDataEndSession($message);
        case '36': return getDataEndSessionResponse($message);
        case '11': return getDataItemCheckout($message);
        case '12': return getDataItemCheckoutResponse($message);
        case '29': return getDataRenew($message);
        case '30': return getDataRenewResponse($message);
        case '17': return getDataInformation($message);
        case '18': return getDataInformationResponse($message);
        case '43': return getDataUpdateNotice($message);
        case '23': return getDataPatronStatus($message);
        case '24': return getDataPatronStatusResponse($message);
        case '37': return getDataFeePaid($message);
        case '38': return getDataFeePaidResponse($message);
        case '63':  return getDataPatronInformation($message);
        case '64':  return getDataPatronInformationResponse($message);
    }
}
?>

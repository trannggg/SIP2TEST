<?php
require_once 'messages/renewAllItem.php';
function getDataRenewAllItems($message){
    $data['Renew All Items']=[];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        $renewAllRequest = new renewAllItem();
        // Extract transaction date and time
        $renewAllRequest->setTransactionDate(substr($components[0], 2, 18));

        // Extract institution ID
        $fullInstitutionId = explode('AO', $components[0]);
        $renewAllRequest->setInstitutionId(isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '');
        // Extract patron identifier 
        $fullPatronIdentifier = explode('AA', $components[1]);
        $renewAllRequest->setPatronIdentifier(isset($fullPatronIdentifier[1]) ? $fullPatronIdentifier[1] : '');

        // Extract patron password
        $fullPatronPassword = explode('AD', $components[2]);
        $renewAllRequest->setPatronPassword(isset($fullPatronPassword[1]) ? $fullPatronPassword[1] : '');

        $data['Renew All Items']['Transaction Date'] = $renewAllRequest->getTransactionDate();
        $data['Renew All Items']['Institution ID'] = $renewAllRequest->getInstitutionId();
        $data['Renew All Items']['Patron Identifier'] = $renewAllRequest->getPatronIdentifier();
        $data['Renew All Items']['Patron Password'] = $renewAllRequest->getPatronPassword();

    } else {
        echo "Invalid message format\n";
    }
    return $data;
}

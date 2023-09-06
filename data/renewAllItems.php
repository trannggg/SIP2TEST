<?php
function getDataRenewAllItems($message){
    $data['Renew All Items']=[];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        // Extract transaction date and time
        $transactionDate = substr($components[0], 2, 18);

        // Extract institution ID
        $fullInstitutionId = explode('AO', $components[0]);
        $institutionId = isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '';

        // Extract patron identifier 
        $fullPatronIdentifier = explode('AA', $components[1]);
        $patronIdentifier = isset($fullPatronIdentifier[1]) ? $fullPatronIdentifier[1] : '';

        // Extract patron password
        $fullPatronPassword = explode('AD', $components[2]);
        $patronPassword = isset($fullPatronPassword[1]) ? $fullPatronPassword[1] : '';

        $data['Renew All Items']['Transaction Date'] = $transactionDate;
        $data['Renew All Items']['Institution ID'] = $institutionId;
        $data['Renew All Items']['Patron Identifier'] = $patronIdentifier;
        $data['Renew All Items']['Patron Password'] = $patronPassword;

    } else {
        echo "Invalid message format\n";
    }
}

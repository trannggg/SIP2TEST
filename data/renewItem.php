<?php
function getDataRenew($message){
    $data['Renew'] = [];
    // Split the message into components using the "|" delimiter
    $components = explode('|', $message);

    if(count($components) >=2){
        // Extract third party allowed and no block?
        $thirdPartyAllowed = substr($components[0], 2, 1);
        $noBlock = substr($components[0], 3, 1);
        // Extract transaction date and nb due date
        $transactionDate = substr($components[0],4,18);
        $nbDueDate = substr($components[0],22,18);
        // Extract institution id
        $renewFullInstitutionId=explode('AO', $components[0]);
        $renewInstitutionId = isset($renewFullInstitutionId[1]) ? $renewFullInstitutionId[1] : '';
        // Extract patron identifier
        $renewFullPatronIdentifier=explode('AA', $components[1]);
        $renewPatronIdentifier = isset($renewFullPatronIdentifier[1]) ? $renewFullPatronIdentifier[1] : '';
        // Extract patron password
        // Extract item identifier
        // Extract title identifier 
        // Extract terminal password 
        // Extract item properties 
        // Extract fee acknowledged

        $data['Renew']['Third Party Allowed'] = $thirdPartyAllowed;
        $data['Renew']['No Block'] = $noBlock;
        $data['Renew']['Transaction Date'] = $transactionDate;
        $data['Renew']['nb Due Date'] = $nbDueDate;
        $data['Renew']['Institution ID'] = $renewInstitutionId;
        $data['Renew']['Patron Identifier'] = $renewPatronIdentifier;
        
    }else {
        echo "Invalid message format\n";
    }
    return $data;
}

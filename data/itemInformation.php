<?php
function getDataInformation($message){
    $data['ItemInformation'] = [];
    // Split the message into components using the "|" delimiter
    $components = explode('|', $message);

    if(count($components) >=2){
        
        // Extract transaction date 
        $transactionDate = substr($components[0],2,18);
        // Extract institution id
        $itemInforFullInstitutionId=explode('AO', $components[0]);
        $itemInforInstitutionId = isset($itemInforFullInstitutionId[1]) ? $itemInforFullInstitutionId[1] : '';
        // Extract item identifier
        $itemInforFullItemIdentifier=explode('AB', $components[1]);
        $itemInforItemIdentifier = isset($itemInforFullItemIdentifier[1]) ? $itemInforFullItemIdentifier[1] : '';
        // Extract terminal password
        $itemInforFullTerminalPassword=explode('AC', $components[1]);
        $itemInforTerminalPassword = isset($itemInforFullTerminalPassword[1]) ? $itemInforFullTerminalPassword[1] : '';
        
        $data['ItemInformation']['Transaction Date'] = $transactionDate;
        $data['ItemInformation']['Institution ID'] = $itemInforInstitutionId;
        $data['ItemInformation']['Item Identifier'] = $itemInforItemIdentifier;
        $data['ItemInformation']['Terminal Password'] = $itemInforTerminalPassword;
        
    }else {
        echo "Invalid message format\n";
    }
    return $data;
}
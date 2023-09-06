<?php
function getDataItemCheckout($message){
    $data['Item Checkout']=[];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        $SCRenewalPolicy = substr($components[0], 2, 1);

        $noBlock = substr($components[0], 3, 1);

        // Extract transaction date and time
        $transactionDate = substr($components[0], 4, 18);

        $nbDueDate = substr($components[0], 22, 18);

        // Extract institution ID
        $fullInstitutionId = explode('AO', $components[0]);
        $institutionId = isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '';

        // Extract patron identifier 
        $fullPatronIdentifier = explode('AA', $components[1]);
        $patronIdentifier = isset($fullPatronIdentifier[1]) ? $fullPatronIdentifier[1] : '';

        // Extract item identifier 
        $fullItemIdentifier = explode('AB', $components[2]);
        $itemIdentifier = isset($fullItemIdentifier[1]) ? $fullItemIdentifier[1] : '';

        // Extract terminal password
        $fullTerminalPassword = explode('AC', $components[3]);
        $terminalPassword = isset($fullTerminalPassword[1]) ? $fullTerminalPassword[1] : '';

        // Extract patron password
        $fullPatronPassword = explode('AD', $components[4]);
        $patronPassword = isset($fullPatronPassword[1]) ? $fullPatronPassword[1] : '';

        // Extract fee acknowledged
        $fullFeeAcknowledge = explode('BO', $components[5]);
        $feeAcknowledge = isset($fullFeeAcknowledge[1]) ? $fullFeeAcknowledge[1] : '';

        $data['Item Checkout']['SC renewal policy'] = $SCRenewalPolicy;
        $data['Item Checkout']['No block'] = $noBlock;
        $data['Item Checkout']['Transaction date'] = $transactionDate;
        $data['Item Checkout']['Nb due date'] = $nbDueDate;
        $data['Item Checkout']['Institution id'] = $institutionId;
        $data['Item Checkout']['Patron identifier'] = $patronIdentifier;
        $data['Item Checkout']['Item identifier'] = $itemIdentifier;
        $data['Item Checkout']['Terminal password'] = $terminalPassword;
        $data['Item Checkout']['Patron password'] = $patronPassword;
        $data['Item Checkout']['Fee acknowledged'] = $feeAcknowledge;

    } else {
        echo "Invalid message format\n";
    }
}
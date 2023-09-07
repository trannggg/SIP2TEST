<?php
function getDataItemCheckin($message){
    $data['Item Checkin']=[];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        $noBlock = substr($components[0], 2, 1);

        // Extract transaction date and time
        $transactionDate = substr($components[0], 3, 18);

        // Extract return date and time
        $returnDate = substr($components[0], 21, 18);

        // Extract current location
        $fullCurrentLocation = explode('AP', $components[0]);
        $currentLocation = isset($fullCurrentLocation[1]) ? $fullCurrentLocation[1] : '';

        // Extract institution ID
        $fullInstitutionId = explode('AO', $components[1]);
        $institutionId = isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '';

        // Extract item identifier (barcode)
        $fullItemIdentifier = explode('AB', $components[2]);
        $itemIdentifier = isset($fullItemIdentifier[1]) ? $fullItemIdentifier[1] : '';

        // Extract terminal password
        $fullTerminalPassword = explode('AC', $components[3]);
        $terminalPassword = isset($fullTerminalPassword[1]) ? $fullTerminalPassword[1] : '';

        $data['Item Checkin']['No Block'] = $noBlock;
        $data['Item Checkin']['Transaction Date'] = $transactionDate;
        $data['Item Checkin']['Return Date'] = $returnDate;
        $data['Item Checkin']['Current Location'] = $currentLocation;
        $data['Item Checkin']['Institution ID'] = $institutionId;
        $data['Item Checkin']['Item Identifier (Barcode)'] = $itemIdentifier;
        $data['Item Checkin']['Terminal Password'] = $terminalPassword;

    } else {
        echo "Invalid message format\n";
    }
    return $data;
}

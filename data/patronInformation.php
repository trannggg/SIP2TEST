<?php
function getDataPatronInformation($message){
    $data['Patron Information']=[];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        $language = substr($components[0], 2, 3);

        $transactionDate = substr($components[0], 5, 18);

        // Extract transaction date and time
        $summary = substr($components[0], 23, 10);
        // Extract institution ID
        $fullInstitutionId = explode('AO', $components[0]);
        $institutionId = isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '';

        // Extract patron identifier
        $fullPatronIdentifier = explode('AA', $components[1]);
        $patronIdentifier = isset($fullPatronIdentifier[1]) ? $fullPatronIdentifier[1] : '';

        // Extract item identifier
//        $fullItemIdentifier = explode('AB', $components[2]);
//        $itemIdentifier = isset($fullItemIdentifier[1]) ? $fullItemIdentifier[1] : '';

        // Extract terminal password
//        $fullTerminalPassword = explode('AC', $components[3]);
//        $terminalPassword = isset($fullTerminalPassword[1]) ? $fullTerminalPassword[1] : '';

        // Extract patron password
        $fullPatronPassword = explode('AD', $components[2]);
        $patronPassword = isset($fullPatronPassword[1]) ? $fullPatronPassword[1] : '';

        // Extract start item
        $fullStartItem = explode('BP', $components[3]);
        $startItem = isset($fullStartItem[1]) ? $fullStartItem[1] : '';
        // Extract end item
        $fullEndItem = explode('BQ', $components[4]);
        $endItem = isset($fullEndItem[1]) ? $fullEndItem[1] : '';

        $data['Patron Information']['Language'] = $language;
        $data['Patron Information']['Transaction date'] = $transactionDate;
        $data['Patron Information']['summary'] = $summary;
        $data['Patron Information']['Institution id'] = $institutionId;
        $data['Patron Information']['Patron identifier'] = $patronIdentifier;
        $data['Patron Information']['Patron password'] = $patronPassword;
        $data['Patron Information']['Start item'] = $startItem;
        $data['Patron Information']['End item'] = $endItem;

    } else {
        echo "Invalid message format\n";
    }
    return $data;
}

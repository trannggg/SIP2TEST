<?php

require_once 'messages/patronInformation.php';
function getDataPatronInformation($message){
    $data['Patron Information']=[];
    $components = explode('|', $message);

    if (count($components) >= 2) {

        $patronInformation=new patronInformation();
        // Extract transaction language
        $patronInformation->setLanguage(substr($components[0], 2, 3));

        // Extract transaction date and time
        $patronInformation->setTransactionDate(substr($components[0], 5, 18));

        // Extract transaction summary
        $patronInformation->setSummary(substr($components[0], 23, 10));

        // Extract institution ID
        $fullInstitutionId = explode('AO', $components[0]);
        $patronInformation->setInstitutionId(isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '');

        // Extract patron identifier
        $fullPatronIdentifier = explode('AA', $components[1]);
        $patronInformation->setPatronIdentifier(isset($fullPatronIdentifier[1]) ? $fullPatronIdentifier[1] : '');
        // Extract item identifier
//        $fullItemIdentifier = explode('AB', $components[2]);
//        $itemIdentifier = isset($fullItemIdentifier[1]) ? $fullItemIdentifier[1] : '';

        // Extract terminal password
//        $fullTerminalPassword = explode('AC', $components[3]);
//        $terminalPassword = isset($fullTerminalPassword[1]) ? $fullTerminalPassword[1] : '';

        // Extract patron password
        $fullPatronPassword = explode('AD', $components[2]);
        $patronInformation->setPatronPassword(isset($fullPatronPassword[1]) ? $fullPatronPassword[1] : '');

        // Extract start item
        $fullStartItem = explode('BP', $components[3]);
        $patronInformation->setStartItem(isset($fullStartItem[1]) ? $fullStartItem[1] : '');
        // Extract end item
        $fullEndItem = explode('BQ', $components[4]);
        $patronInformation->setEndItem(isset($fullEndItem[1]) ? $fullEndItem[1] : '');

        $data['Patron Information']['Language'] = $patronInformation->getLanguage();
        $data['Patron Information']['Transaction date'] = $patronInformation->getTransactionDate();
        $data['Patron Information']['summary'] = $patronInformation->getSummary();
        $data['Patron Information']['Institution id'] = $patronInformation->getInstitutionId();
        $data['Patron Information']['Patron identifier'] = $patronInformation->getPatronIdentifier();
        $data['Patron Information']['Patron password'] = $patronInformation->getPatronPassword();
        $data['Patron Information']['Start item'] = $patronInformation->getStartItem();
        $data['Patron Information']['End item'] = $patronInformation->getEndItem();

    } else {
        echo "Invalid message format\n";
    }
    return $data;
}

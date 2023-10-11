<?php
require_once 'messages/patronStatus.php';
function getDataPatronStatus($message)
{
    $data['Patron Status'] = [];
    $components = explode('|', $message);
    if (count($components) == 4) {
        $patronStatus= new patronStatus();


        $patronStatus->setLanguage(substr($components[0], 2, 3));

        $patronStatus->setTransactionDate(substr($components[0], 5, 18));

        $institution_id_full = explode('AO', $components[0]);
        //AO
        $patronStatus->setInstitutionId(isset($institution_id_full) ? $institution_id_full[1] : '');

        $patron_identifier_full =  explode('AA', $components[1]);
        //AA
        $patronStatus->setPatronIdentifier(isset($patron_identifier_full) ? $patron_identifier_full[1] : '');

        $patron_password_full =  explode('AD', $components[2]);
        //AD
        $patronStatus->setPatronPassword(isset($patron_password_full) ? $patron_password_full[1] : '');
        //EXAMPLE 2300120230906    134017AO11|AA66666|AD33333|AY4AZF4E1
        $data['Patron Status']['Language'] = $patronStatus->getLanguage();
        $data['Patron Status']['Transaction Date'] = $patronStatus->getTransactionDate();
        $data['Patron Status']['Institution ID'] = $patronStatus->getInstitutionId();
        $data['Patron Status']['Patron Identifier'] =  $patronStatus->getPatronIdentifier();
        $data['Patron Status']['Patron Password'] = $patronStatus->getPatronPassword();
    } else {
        echo  "Invalid message format\n";
    }
    return $data;
}
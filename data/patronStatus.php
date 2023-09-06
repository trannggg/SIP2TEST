<?php
function getDataPatronStatus($message)
{
    $data['Patron Status'] = [];
    $components = explode('|', $message);
    if (count($components) == 4) {
        $language = substr($components[0], 2, 3);
        $transaction_date = substr($components[0], 5, 18);
        $institution_id_full = explode('AO', $components[0]);
        $institution_id = isset($institution_id_full) ? $institution_id_full[1] : ''; //AO
        $patron_identifier_full =  explode('AA', $components[1]);
        $patron_identifier = isset($patron_identifier_full) ? $patron_identifier_full[1] : ''; //AA
        $patron_password_full =  explode('AD', $components[2]);
        $patron_password = isset($patron_password_full) ? $patron_password_full[1] : ''; //AD
        //EXAMPLE 2300120230906    134017AO11|AA66666|AD33333|AY4AZF4E1
        $data['Patron Status']['Language'] = $language;
        $data['Patron Status']['Transaction Date'] = $transaction_date;
        $data['Patron Status']['Institution ID'] = $institution_id;
        $data['Patron Status']['Patron Identifier'] = $patron_identifier;
        $data['Patron Status']['Patron Password'] = $patron_password;
    } else {
        echo  "Invalid message format\n";
    }
    return $data;
}
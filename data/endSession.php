<?php
function getDataEndSession($message){
    $data['End Session']=[];
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

        $data['End Session']['Transaction Date'] = $transactionDate;
        $data['End Session']['Institution ID'] = $institutionId;
        $data['End Session']['Patron Identifier'] = $patronIdentifier;
        $data['End Session']['Patron Password'] = $patronPassword;

    } else {
        echo "Invalid message format\n";
    }
}

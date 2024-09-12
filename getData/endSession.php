<?php
// require_once('driveMapping.php');
require_once('messages/endSession.php');
// exec("net use $tempDriveLetter /delete"); // Remove the temporary drive mapping

function getDataEndSession($message) {
    $data['End Session'] = [];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        $endSession = new EndSession();

        // Extract transaction date and time
        $endSession->setTransactionDate(substr($components[0], 2, 18));

        // Extract institution ID
        $fullInstitutionId = explode('AO', $components[0]);
        $endSession->setInstitutionId(isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '');

        // Extract patron identifier 
        $fullPatronIdentifier = explode('AA', $components[1]);
        $endSession->setPatronIdentifier(isset($fullPatronIdentifier[1]) ? $fullPatronIdentifier[1] : '');

        // Extract patron password
        $fullPatronPassword = explode('AD', $components[2]);
        $endSession->setPatronPassword(isset($fullPatronPassword[1]) ? $fullPatronPassword[1] : '');

        // Add EndSession object to the getData array
        $data['End Session']['Transaction Date'] = $endSession->getTransactionDate();
        $data['End Session']['Institution ID'] = $endSession->getInstitutionId();
        $data['End Session']['Patron Identifier'] = $endSession->getPatronIdentifier();
        $data['End Session']['Patron Password'] = $endSession->getPatronPassword();
    } else {
        echo "Invalid message format\n";
    }

    return $data;
}

// Sử dụng hàm
// $message = "3520230907    102307AOasa|AA123123|AD12|AY0AZF520";
// $result = getDataEndSession($message);
// print_r($result);

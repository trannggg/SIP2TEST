<?php
function getDataPatronStatusResponse($message){
    $data['Patron Status Response'] = [];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        // Extract patron status
        $patronStatus = substr($components[0], 2, 14);
        // Extract language
        $language = substr($components[0], 16, 3);
        // Extract transaction date and time
        $transactionDate = substr($components[0], 19, 18);

        // Extract institution ID
        $fullInstitutionId = explode('AO', $components[0]);
        $institutionId = isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '';

        // Extract patron identifier
        $fullPatronIdentifier = explode('AA', $components[1]);
        $patronIdentifier = isset($fullPatronIdentifier[1]) ? $fullPatronIdentifier[1] : '';

        // Extract personal name
        $fullpersonalName = explode('AE', $components[2]);
        $personalName = isset($fullpersonalName[1]) ? $fullpersonalName[1] : '';

        $i = 3;
                while ($i < count($components)) {
                    // Extract valid patron
                    if (substr($components[$i], 0, 2) === 'BL') {
                        $validPatron = '' . substr($components[$i], 2);
                    } 
                    // Extract valid patron password
                    elseif (substr($components[$i], 0, 2) === 'CQ') {
                        $validPatronPassword = '' . substr($components[$i], 2);
                    }
                    // Extract currency type
                    elseif (substr($components[$i], 0, 2) === 'BH') {
                        $currencyType = '' . substr($components[$i], 2);
                    }
                    // Extract fee amount 
                    elseif (substr($components[$i], 0, 2) === 'BV') {
                        $feeAmount = '' . substr($components[$i], 2);
                    }
                    // Extract screen message
                    elseif (substr($components[$i], 0, 2) === 'AF') {
                        $screenMessage = '' . substr($components[$i], 2);
                    }
                    // Extract print line  
                    elseif (substr($components[$i], 0, 2) === 'AG') {
                        $printLine  = '' . substr($components[$i], 2);
                    }
                    $i++;
                }

        $data['Patron Status Response']['Patron Status'] = $patronStatus;        
        $data['Patron Status Response']['Language'] = $language;
        $data['Patron Status Response']['Transaction date'] = $transactionDate;
        $data['Patron Status Response']['Institution id'] = $institutionId;
        $data['Patron Status Response']['Patron identifier'] = $patronIdentifier;
        $data['Patron Status Response']['Personal Name'] = $personalName;
        $data['Patron Status Response']['Valid Patron'] = $validPatron;
        $data['Patron Status Response']['Valid Patron Password'] = $validPatronPassword;
        $data['Patron Status Response']['Currency Type'] = $currencyType;
        $data['Patron Status Response']['Fee Amount'] = $feeAmount;
        $data['Patron Status Response']['Sceen Message'] = $screenMessage;
        $data['Patron Status Response']['Print Line'] = $printLine;
    

    } else {
        echo "Invalid message format\n";
    }
    return $data;
}
?>
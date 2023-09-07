<?php
function  getDataFeePaidResponse($message) {
    $data['Fee Paid Response']=[];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        // Extract payment accepted ?
        $paymentAccepted = substr($components[0], 2, 1);

        // Extract transaction date and time
        $transactionDate = substr($components[0], 3, 18);

        // Extract institution ID
        $fullInstitutionId = explode('AO', $components[0]);
        $institutionId = isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '';

        // Extract patron identifier 
        $fullPatronIdentifier = explode('AA', $components[1]);
        $patronIdentifier = isset($fullPatronIdentifier[1]) ? $fullPatronIdentifier[1] : '';

        $i = 2;
            while ($i < count($components)) {
                // Extract transaction id 
                if (substr($components[$i], 0, 2) === 'BK') {
                    $transactionId = '' . substr($components[$i], 2);
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
        
            $data['Fee Paid Response']['Payment Accepted'] = $paymentAccepted;
            $data['Fee Paid Response']['Transaction Date'] = $transactionDate;
            $data['Fee Paid Response']['Institution ID'] = $institutionId;
            $data['Fee Paid Response']['Patron Identifier'] = $patronIdentifier;
            $data['Fee Paid Response']['Transaction ID'] = $transactionId;
            $data['Fee Paid Response']['Screen Message'] = $screenMessage;
            $data['Fee Paid Response']['Print Line'] = $printLine;

    } else {
        echo "Invalid message format\n";
    }
    return $data;
}
?>
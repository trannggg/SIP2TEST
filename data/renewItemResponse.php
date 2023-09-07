<?php
function getDataRenewResponse($message){
    $data['Renew Items Response']=[];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        // Extract is OK?
        $isOK = substr($components[0], 2, 1);

       // Extract renewal OK?
       $renewalOK = substr($components[0], 3, 1);

       // Extract magnetic media
       $magneticMedia = substr($components[0], 4, 1);

       // Extract desensitize
       $desensitize = substr($components[0], 5, 1);

       // Extract transaction date and time
       $transactionDate = substr($components[0], 6, 18);

       // Extract institution ID
       $fullInstitutionId = explode('AO', $components[0]);
       $institutionId = isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '';

       // Extract patron identifier
       $fullPatronIdentifier = explode('AA', $components[1]);
       $patronIdentifier = isset($fullPatronIdentifier[1]) ? $fullPatronIdentifier[1] : '';

       // Extract item identifier (barcode)
       $fullItemIdentifier = explode('AB', $components[2]);
       $itemIdentifier = isset($fullItemIdentifier[1]) ? $fullItemIdentifier[1] : '';

       // Extract title identifier 
       $fullTitleIdentifier = explode('AJ', $components[3]);
       $titleIdentifier = isset($fullTitleIdentifier[1]) ? $fullTitleIdentifier[1] : '';

       // Extract due date
       $fullDueDate = explode('AH', $components[4]);
       $dueDate = isset($fullDueDate[1]) ? $fullDueDate[1] : '';



        $i = 5;
        while ($i < count($components)) {
            // Extract fee type
            if (substr($components[$i], 0, 2) === 'BT') {
                $feeType = '' . substr($components[$i], 2);
            } 
            // Extract security inhibit 
            elseif (substr($components[$i], 0, 2) === 'CI') {
                $securityInhibit = '' . substr($components[$i], 2);
            }
            // Extract currency type
            elseif (substr($components[$i], 0, 2) === 'BH') {
                $currencyType = '' . substr($components[$i], 2);
            }
            // Extract fee amount 
            elseif (substr($components[$i], 0, 2) === 'BV') {
                $feeAmount = '' . substr($components[$i], 2);
            }
            // Extract media Type
            elseif (substr($components[$i], 0, 2) === 'CK') {
                $mediaType = '' . substr($components[$i], 2);
            }
            // Extract item properties
            elseif (substr($components[$i], 0, 2) === 'CH') {
                $itemProperties = '' . substr($components[$i], 2);
            }
            // Extract transaction id 
            elseif (substr($components[$i], 0, 2) === 'BK') {
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

        $data['Renew Items Response']['IsOK'] = $isOK;
        $data['Renew Items Response']['Renewal OK'] = $renewalOK;
        $data['Renew Items Response']['Magnetic Media '] = $magneticMedia;
        $data['Renew Items Response']['Desensitize'] = $desensitize;
        $data['Renew Items Response']['Transaction Date'] = $transactionDate;
        $data['Renew Items Response']['Institution ID'] = $institutionId;
        $data['Renew Items Response']['Patron Identifier'] = $patronIdentifier;
        $data['Renew Items Response']['Item Identifier (Barcode)'] = $itemIdentifier;
        $data['Renew Items Response']['Title Identifier'] = $titleIdentifier;
        $data['Renew Items Response']['Due Date'] = $dueDate;
        $data['Renew Items Response']['Fee Type'] = $feeType;
        $data['Renew Items Response']['Security Inhibit'] = $securityInhibit;
        $data['Renew Items Response']['Currency Type'] = $currencyType;
        $data['Renew Items Response']['Fee Amount'] = $feeAmount;
        $data['Renew Items Response']['Media Type'] = $mediaType;
        $data['Renew Items Response']['Item Properties '] = $itemProperties;
        $data['Renew Items Response']['Transaction ID'] = $transactionId;
        $data['Renew Items Response']['Screen Message'] = $screenMessage;
        $data['Renew Items Response']['Print Line'] = $printLine;
    

    } else {
        echo "Invalid message format\n";
    }
    return $data;
}
?>
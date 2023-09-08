<?php
function getDataItemCheckoutResponse($message){
    $data['Item Checkout Response']=[];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        // Extract Checkout is OK?
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

        $data['Item Checkout Response']['IsOK'] = $isOK;
        $data['Item Checkout Response']['Renewal OK'] = $renewalOK;
        $data['Item Checkout Response']['Magnetic Media '] = $magneticMedia;
        $data['Item Checkout Response']['Desensitize'] = $desensitize;
        $data['Item Checkout Response']['Transaction Date'] = $transactionDate;
        $data['Item Checkout Response']['Institution ID'] = $institutionId;
        $data['Item Checkout Response']['Patron Identifier'] = $patronIdentifier;
        $data['Item Checkout Response']['Item Identifier (Barcode)'] = $itemIdentifier;
        $data['Item Checkout Response']['Title Identifier'] = $titleIdentifier;
        $data['Item Checkout Response']['Due Date'] = $dueDate;
        $data['Item Checkout Response']['Fee Type'] = $feeType;
        $data['Item Checkout Response']['Security Inhibit'] = $securityInhibit;
        $data['Item Checkout Response']['Currency Type'] = $currencyType;
        $data['Item Checkout Response']['Fee Amount'] = $feeAmount;
        $data['Item Checkout Response']['Media Type'] = $mediaType;
        $data['Item Checkout Response']['Item Properties '] = $itemProperties;
        $data['Item Checkout Response']['Transaction ID'] = $transactionId;
        $data['Item Checkout Response']['Screen Message'] = $screenMessage;
        $data['Item Checkout Response']['Print Line'] = $printLine;
        
    } else {
            echo "Invalid message format\n";
        }
    return $data;
}
?>
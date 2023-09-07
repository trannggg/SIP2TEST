<?php
function getDataPatronInformationResponse($message){
    
    $data['Patron Information Response']=[];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        // Extract patron Status
        $patronStatus = substr($components[0], 2, 14);
        // Extract language
        $language = substr($components[0], 16, 3);
        // Extract transaction date and time
        $transactionDate = substr($components[0], 19, 18);
        // Extract hold items count
        $holdItemsCount = substr($components[0], 37, 4);
        // Extract overdue items count 
        $overdueItemsCount  = substr($components[0], 41, 4);
        // Extract charged items count
        $chargedItemsCount = substr($components[0], 45, 4);
        // Extract fine items count
        $fineItemsCount = substr($components[0], 49, 4);
        // Extract recall items count
        $recallitemsCount = substr($components[0], 53, 4);
        // Extract unavailable holds count
        $unavailableHoldsCount = substr($components[0], 57, 4);

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
                    // Extract hold items limit
                    if (substr($components[$i], 0, 2) === 'BZ') {
                        $holdItemsLimit = '' . substr($components[$i], 2);
                    }
                    // Extract overdue items limit
                    if (substr($components[$i], 0, 2) === 'CA') {
                        $overdueItemsLimit = '' . substr($components[$i], 2);
                    }
                    // Extract charged items limit
                    if (substr($components[$i], 0, 2) === 'CB') {
                        $chargedItemsLimit = '' . substr($components[$i], 2);
                    }
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
                    // Extract fee limit 
                    elseif (substr($components[$i], 0, 2) === 'CC') {
                        $feeLimit = '' . substr($components[$i], 2);
                    }
                    // Extract hold items 
                    elseif (substr($components[$i], 0, 2) === 'AS') {
                        $holdItems = '' . substr($components[$i], 2);
                    }
                    // Extract overdue items 
                    elseif (substr($components[$i], 0, 2) === 'AT') {
                        $overdueItems = '' . substr($components[$i], 2);
                    }
                    // Extract charged items 
                    elseif (substr($components[$i], 0, 2) === 'AU') {
                        $chargedItems = '' . substr($components[$i], 2);
                    }
                    // Extract fine items 
                    elseif (substr($components[$i], 0, 2) === 'AV') {
                        $fineItems = '' . substr($components[$i], 2);
                    }
                    // Extract recall items 
                    elseif (substr($components[$i], 0, 2) === 'BU') {
                        $recallitems = '' . substr($components[$i], 2);
                    }
                    // Extract unavailable hold items  
                    elseif (substr($components[$i], 0, 2) === 'CD') {
                        $unavailebleHoldItems = '' . substr($components[$i], 2);
                    }
                    // Extract home address 
                    elseif (substr($components[$i], 0, 2) === 'BD') {
                        $homeAddress = '' . substr($components[$i], 2);
                    }
                    // Extract e-mail address 
                    elseif (substr($components[$i], 0, 2) === 'BE') {
                        $emailAddress = '' . substr($components[$i], 2);
                    }
                    // Extract home phone number 
                    elseif (substr($components[$i], 0, 2) === 'BF') {
                        $homePhoneNumber = '' . substr($components[$i], 2);
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

        $data['Patron Information Response']['Patron Status'] = $patronStatus;        
        $data['Patron Information Response']['Language'] = $language;
        $data['Patron Information Response']['Transaction date'] = $transactionDate;
        $data['Patron Information Response']['Hold Items Count'] = $holdItemsCount;
        $data['Patron Information Response']['Overdue Items Count '] = $overdueItemsCount;
        $data['Patron Information Response']['Charged Items Count'] = $chargedItemsCount;
        $data['Patron Information Response']['Fine Items Count'] = $fineItemsCount;
        $data['Patron Information Response']['Recall Items Count '] = $recallitemsCount;
        $data['Patron Information Response']['Unavailable Holds Count '] = $unavailableHoldsCount;
        $data['Patron Information Response']['Institution id'] = $institutionId;
        $data['Patron Information Response']['Patron identifier'] = $patronIdentifier;
        $data['Patron Information Response']['Personal Name'] = $personalName;
        $data['Patron Information Response']['Hold Items Limit'] = $holdItemsLimit;
        $data['Patron Information Response']['Overdue Items Limit '] = $overdueItemsLimit;
        $data['Patron Information Response']['Charged Items Limit'] = $chargedItemsLimit;
        $data['Patron Information Response']['Valid Patron'] = $validPatron;
        $data['Patron Information Response']['Valid Patron Password'] = $validPatronPassword;
        $data['Patron Information Response']['Currency Type'] = $currencyType;
        $data['Patron Information Response']['Fee Amount'] = $feeAmount;
        $data['Patron Information Response']['Fee Limit'] = $feeLimit;
        $data['Patron Information Response']['Hold Items '] = $holdItems;
        $data['Patron Information Response']['Overdue Items  '] = $overdueItems;
        $data['Patron Information Response']['Charged Items '] = $chargedItems;
        $data['Patron Information Response']['Fine Items '] = $fineItems;
        $data['Patron Information Response']['Recall Items  '] = $recallitems;
        $data['Patron Information Response']['Unavailable Holds Items '] = $unavailebleHoldItems;
        $data['Patron Information Response']['home address'] = $homeAddress;
        $data['Patron Information Response']['e-mail address'] = $emailAddress;
        $data['Patron Information Response']['home phone number'] = $homePhoneNumber;
        $data['Patron Information Response']['Sceen Message'] = $screenMessage;
        $data['Patron Information Response']['Print Line'] = $printLine;
    

    } else {
        echo "Invalid message format\n";
    }
    return $data;
}
?>
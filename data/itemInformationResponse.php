<?php
function getDataInformationResponse($message){
    $data['Item Information Response']=[];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        // Extract circulation status
        $circulationStatus = substr($components[0], 2, 2);
        // Extract security marker
        $securityMaker = substr($components[0], 4, 2);
         // Extract fee type
         $feeType = substr($components[0], 6, 2);
        // Extract transaction date and time
        $transactionDate = substr($components[0], 8, 18);

        if(substr($components[0], 26, 2) === 'AB'){
            $fullItemIdentifier = explode('AB', $components[0]);
            $itemIdentifier = isset($fullItemIdentifier[1]) ? $fullItemIdentifier[1] : '';
        }

        $i = 0;
                while ($i < count($components)) {
                    // Extract hold queue length
                    if (substr($components[$i], 0, 2) === 'CF') {
                        $holdQueueLength = '' . substr($components[$i], 2);
                    }
                    // Extract due date
                    elseif (substr($components[$i], 0, 2) === 'AH') {
                        $dueDate = '' . substr($components[$i], 2);
                    }
                    // Extract recall date 
                    elseif (substr($components[$i], 0, 2) === 'CJ') {
                        $recallDate = '' . substr($components[$i], 2);
                    }
                    // Extract hold pickup date
                    elseif (substr($components[$i], 0, 2) === 'CM') {
                        $holdPickupDate = '' . substr($components[$i], 2);
                    } 
                    // Extract item identifier
                    elseif (substr($components[$i], 0, 2) === 'AB') {
                        $itemIdentifier = '' . substr($components[$i], 2);
                    }
                    // Extract title identifier
                    elseif (substr($components[$i], 0, 2) === 'AJ') {
                        $titleIdentifier = '' . substr($components[$i], 2);
                    }
                    // Extract owner
                    elseif (substr($components[$i], 0, 2) === 'BG') {
                        $owner = '' . substr($components[$i], 2);
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
                    // Extract permanent location 
                    elseif (substr($components[$i], 0, 2) === 'AQ') {
                        $permanentLocation = '' . substr($components[$i], 2);
                    }
                    // Extract current location
                    elseif (substr($components[$i], 0, 2) === 'AP') {
                        $currentLocation = '' . substr($components[$i], 2);
                    }
                    // Extract item properties
                    elseif (substr($components[$i], 0, 2) === 'CH') {
                        $itemProperties = '' . substr($components[$i], 2);
                    }
                    // Extract screen message
                    elseif (substr($components[$i], 0, 2) === 'AF') {
                        $screenMessage = '' . substr($components[$i], 2);
                    }
                    // Extract print line  
                    elseif (substr($components[$i], 0, 2) === 'AG') {
                        $printLine  = '' . substr($components[$i], 2);
                    }
                    echo $i;
                    $i++;
                }

        $data['Item Information Response']['Circulation Status'] = $circulationStatus;        
        $data['Item Information Response']['Security Marker '] = $securityMaker;
        $data['Item Information Response']['Fee Type'] = $feeType;
        $data['Item Information Response']['Transaction date'] = $transactionDate;
        $data['Item Information Response']['Hold Queue Length'] = $holdQueueLength;
        $data['Item Information Response']['Due Date'] = $dueDate;
        $data['Item Information Response']['Recall Date'] = $recallDate;
        $data['Item Information Response']['Hold Pickup Date'] = $holdPickupDate;
        $data['Item Information Response']['Item Identifier (Barcode)'] = $itemIdentifier;
        $data['Item Information Response']['Title Identifier'] = $titleIdentifier;
        $data['Item Information Response']['Owner'] = $owner;
        $data['Item Information Response']['Currency Type'] = $currencyType;
        $data['Item Information Response']['Fee Amount'] = $feeAmount;
        $data['Item Information Response']['Media Type'] = $mediaType;
        $data['Item Information Response']['Permanent Location'] = $permanentLocation;
        $data['Item Information Response']['Current Location'] = $currentLocation;
        $data['Item Information Response']['Item Properties '] = $itemProperties;
        $data['Item Information Response']['Sceen Message'] = $screenMessage;
        $data['Item Information Response']['Print Line'] = $printLine;
    

    } else {
        echo "Invalid message format\n";
    }
    return $data;
}
?>
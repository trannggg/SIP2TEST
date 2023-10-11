<?php
require_once 'messages/itemInformationResponse.php';

function getDataInformationResponse($message){
    $data['Item Information Response']=[];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        $itemInformationResponse = new ItemInformationResponse(); // Tạo một đối tượng ItemInformationResponse
        
        // Extract circulation status
        $itemInformationResponse->setCirculationStatus(substr($components[0], 2, 2)) ;

        // Extract security marker
        $itemInformationResponse->setSecurityMarker(substr($components[0], 4, 2)) ;

         // Extract fee type
         $itemInformationResponse->setFeeType( substr($components[0], 6, 2));

        // Extract transaction date and time
        $itemInformationResponse->setTransactionDate(substr($components[0], 8, 18)) ;

        // Extract item identifier (barcode)
        if(substr($components[0], 26, 2) === 'AB'){
            $fullItemIdentifier = explode('AB', $components[0]);
            $itemInformationResponse->setItemIdentifier(isset($fullItemIdentifier[1]) ? $fullItemIdentifier[1] : '') ;
        }

        $i = 0;
                while ($i < count($components)) {
                    // Extract hold queue length
                    if (substr($components[$i], 0, 2) === 'CF') {
                        $itemInformationResponse->setHoldQueueLength('' . substr($components[$i], 2));
                    }
                    // Extract due date
                    elseif (substr($components[$i], 0, 2) === 'AH') {
                        $itemInformationResponse->setDueDate('' . substr($components[$i], 2)) ;
                    }
                    // Extract recall date 
                    elseif (substr($components[$i], 0, 2) === 'CJ') {
                        $itemInformationResponse->setRecallDate('' . substr($components[$i], 2));
                    }
                    // Extract hold pickup date
                    elseif (substr($components[$i], 0, 2) === 'CM') {
                        $itemInformationResponse->setHoldPickupDate('' . substr($components[$i], 2));
                    } 
                    // Extract item identifier
                    elseif (substr($components[$i], 0, 2) === 'AB') {
                        $itemInformationResponse->setItemIdentifier('' . substr($components[$i], 2)) ;
                    }
                    // Extract title identifier
                    elseif (substr($components[$i], 0, 2) === 'AJ') {
                        $itemInformationResponse->setTitleIdentifier('' . substr($components[$i], 2));
                    }
                    // Extract owner
                    elseif (substr($components[$i], 0, 2) === 'BG') {
                        $itemInformationResponse->setOwner('' . substr($components[$i], 2));
                    }
                    // Extract currency type
                    elseif (substr($components[$i], 0, 2) === 'BH') {
                        $itemInformationResponse->setCurrencyType('' . substr($components[$i], 2));
                    }
                    // Extract fee amount 
                    elseif (substr($components[$i], 0, 2) === 'BV') {
                        $itemInformationResponse->setFeeAmount('' . substr($components[$i], 2));
                    }
                    // Extract media Type
                    elseif (substr($components[$i], 0, 2) === 'CK') {
                        $itemInformationResponse->setMediaType('' . substr($components[$i], 2));
                    }
                    // Extract permanent location 
                    elseif (substr($components[$i], 0, 2) === 'AQ') {
                        $itemInformationResponse->setPermanentLocation('' . substr($components[$i], 2));
                    }
                    // Extract current location
                    elseif (substr($components[$i], 0, 2) === 'AP') {
                        $itemInformationResponse->setCurrentLocation('' . substr($components[$i], 2));
                    }
                    // Extract item properties
                    elseif (substr($components[$i], 0, 2) === 'CH') {
                        $itemInformationResponse->setItemProperties('' . substr($components[$i], 2));
                    }
                    // Extract screen message
                    elseif (substr($components[$i], 0, 2) === 'AF') {
                        $itemInformationResponse->setScreenMessage('' . substr($components[$i], 2));
                    }
                    // Extract print line  
                    elseif (substr($components[$i], 0, 2) === 'AG') {
                        $itemInformationResponse->setPrintLine('' . substr($components[$i], 2));
                    }
                    echo $i;
                    $i++;
                }

        $data['Item Information Response']['Circulation Status'] = $itemInformationResponse->getCirculationStatus();        
        $data['Item Information Response']['Security Marker '] = $itemInformationResponse->getSecurityMarker();
        $data['Item Information Response']['Fee Type'] = $itemInformationResponse->getFeeType();
        $data['Item Information Response']['Transaction date'] = $itemInformationResponse->getTransactionDate();
        $data['Item Information Response']['Hold Queue Length'] = $itemInformationResponse->getHoldQueueLength();
        $data['Item Information Response']['Due Date'] = $itemInformationResponse->getDueDate();
        $data['Item Information Response']['Recall Date'] = $itemInformationResponse->getRecallDate();
        $data['Item Information Response']['Hold Pickup Date'] = $itemInformationResponse->getHoldPickupDate();
        $data['Item Information Response']['Item Identifier (Barcode)'] = $itemInformationResponse->getItemIdentifier();
        $data['Item Information Response']['Title Identifier'] = $itemInformationResponse->getTitleIdentifier();
        $data['Item Information Response']['Owner'] = $itemInformationResponse->getOwner();
        $data['Item Information Response']['Currency Type'] = $itemInformationResponse->getCurrencyType();
        $data['Item Information Response']['Fee Amount'] = $itemInformationResponse->getFeeAmount();
        $data['Item Information Response']['Media Type'] = $itemInformationResponse->getMediaType();
        $data['Item Information Response']['Permanent Location'] = $itemInformationResponse->getPermanentLocation();
        $data['Item Information Response']['Current Location'] = $itemInformationResponse->getCurrentLocation();
        $data['Item Information Response']['Item Properties '] = $itemInformationResponse->getItemProperties();
        $data['Item Information Response']['Sceen Message'] = $itemInformationResponse->getScreenMessage();
        $data['Item Information Response']['Print Line'] = $itemInformationResponse->getPrintLine();
    

    } else {
        echo "Invalid message format\n";
    }
    return $data;
}

// $message = "1801000120230908    101206AB|AJ|CF00000|AY6AZF5CD";
// $result = getDataInformationResponse($message);
// print_r($result);
?>
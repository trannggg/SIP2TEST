<?php
require_once 'messages/itemCheckoutResponse.php';
function getDataItemCheckoutResponse($message){
    $data['Item Checkout Response']=[];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        $response = new ItemCheckoutResponse();
        // Extract Checkin is OK?
        $response->setOK(substr($components[0], 2, 1));

        // Extract renewal OK?
        $response->setRenewalOK(substr($components[0], 3, 1));

        // Extract magnetic media
        $response->setMagneticMedia(substr($components[0], 4, 1));

        // Extract desensitize
        $response->setDesensitize(substr($components[0], 5, 1));

        // Extract transaction date and time
        $response->setTransactionDate(substr($components[0], 6, 18));

        // Extract institution ID
        $fullInstitutionId = explode('AO', $components[0]);
        $response->setInstitutionId(isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '');

        // Extract patron identifier
        $fullPatronIdentifier = explode('AA', $components[1]);
        $response->setPatronIdentifier(isset($fullPatronIdentifier[1]) ? $fullPatronIdentifier[1] : '');

        // Extract item identifier (barcode)
        $fullItemIdentifier = explode('AB', $components[2]);
        $itemIdentifier = isset($fullItemIdentifier[1]) ? $fullItemIdentifier[1] : '';
        $response->setItemIdentifier(isset($fullItemIdentifier[1]) ? $fullItemIdentifier[1] : '');

        // Extract title identifier 
        $fullTitleIdentifier = explode('AJ', $components[3]);
        $response->setTitleIdentifier(isset($fullTitleIdentifier[1]) ? $fullTitleIdentifier[1] : '');

        // Extract due date
        $fullDueDate = explode('AH', $components[4]);
        $response->setDueDate(isset($fullDueDate[1]) ? $fullDueDate[1] : '');

        $i = 5;
        while ($i < count($components)) {
            // Extract fee type
            if (substr($components[$i], 0, 2) === 'BT') {
                $response->setFeeType('' . substr($components[$i], 2));
            } 
            // Extract security inhibit 
            elseif (substr($components[$i], 0, 2) === 'CI') {
                $response->setSecurityInhibit('' . substr($components[$i], 2));
            }
            // Extract currency type
            elseif (substr($components[$i], 0, 2) === 'BH') {
                $response->setCurrencyType('' . substr($components[$i], 2));
            }
            // Extract fee amount 
            elseif (substr($components[$i], 0, 2) === 'BV') {
                $response->setFeeAmount('' . substr($components[$i], 2));
            }
            // Extract media Type
            elseif (substr($components[$i], 0, 2) === 'CK') {
                $response->setMediaType('' . substr($components[$i], 2));
            }
            // Extract item properties
            elseif (substr($components[$i], 0, 2) === 'CH') {
                $response->setItemProperties('' . substr($components[$i], 2));
            }
            // Extract transaction id 
            elseif (substr($components[$i], 0, 2) === 'BK') {
                $response->setTransactionId('' . substr($components[$i], 2));
            }
            // Extract screen message
            elseif (substr($components[$i], 0, 2) === 'AF') {
                $response->setScreenMessage('' . substr($components[$i], 2));
            }
            // Extract print line  
            elseif (substr($components[$i], 0, 2) === 'AG') {
                $response->setPrintLine('' . substr($components[$i], 2));
            }
            $i++;
        }       

        $data['Item Checkout Response']['IsOK'] = $response->isOK();
        $data['Item Checkout Response']['Renewal OK'] = $response->isRenewalOK();
        $data['Item Checkout Response']['Magnetic Media '] = $response->isMagneticMedia();
        $data['Item Checkout Response']['Desensitize'] = $response->isDesensitize();
        $data['Item Checkout Response']['Transaction Date'] = $response->getTransactionDate();
        $data['Item Checkout Response']['Institution ID'] = $response->getInstitutionId();
        $data['Item Checkout Response']['Patron Identifier'] = $response->getPatronIdentifier();
        $data['Item Checkout Response']['Item Identifier (Barcode)'] = $response->getItemIdentifier();
        $data['Item Checkout Response']['Title Identifier'] = $response->getTitleIdentifier();
        $data['Item Checkout Response']['Due Date'] = $response->getDueDate();
        $data['Item Checkout Response']['Fee Type'] = $response->getFeeType();
        $data['Item Checkout Response']['Security Inhibit'] = $response->isSecurityInhibit();
        $data['Item Checkout Response']['Currency Type'] = $response->getCurrencyType();
        $data['Item Checkout Response']['Fee Amount'] = $response->getFeeAmount();
        $data['Item Checkout Response']['Media Type'] = $response->getMediaType();
        $data['Item Checkout Response']['Item Properties '] = $response->getItemProperties();
        $data['Item Checkout Response']['Transaction ID'] = $response->getTransactionId();
        $data['Item Checkout Response']['Screen Message'] = $response->getScreenMessage();
        $data['Item Checkout Response']['Print Line'] = $response->getPrintLine();

    } else {
        echo "Invalid message format\n";
    }

    return $response;
}
<?php
require_once 'messages/patronInformationResponse.php';
function getDataPatronInformationResponse($message){
    
    $data['Patron Information Response']=[];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        $response = new PatronInformationResponse();
        // Extract patron Status
        $response->setPatronStatus(substr($components[0], 2, 14));
        // Extract language
        $response->setLanguage(substr($components[0], 16, 3));
        // Extract transaction date and time
        $response->setTransactionDate(substr($components[0], 19, 18));
        // Extract hold items count
        $response->setHoldItemsCount(substr($components[0], 37, 4));
        // Extract overdue items count 
        $response->setOverdueItemsCount(substr($components[0], 41, 4));
        // Extract charged items count
        $response->setChargedItemsCount(substr($components[0], 45, 4));
        // Extract fine items count
        $response->setFineItemsCount(substr($components[0], 49, 4));
        // Extract recall items count
        $response->setRecallItemsCount(substr($components[0], 53, 4));
        // Extract unavailable holds count
        $response->setUnavailableHoldsCount(substr($components[0], 57, 4));
        // Extract institution ID
        $fullInstitutionId = explode('AO', $components[0]);
        $response->setInstitutionId(isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '');
        // Extract patron identifier
        $fullPatronIdentifier = explode('AA', $components[1]);
        $response->setPatronIdentifier(isset($fullPatronIdentifier[1]) ? $fullPatronIdentifier[1] : '');
        // Extract personal name
        $fullpersonalName = explode('AE', $components[2]);
        $response->setPersonalName(isset($fullpersonalName[1]) ? $fullpersonalName[1] : '');

        $i = 3;
        while ($i < count($components)) {
            // Extract hold items limit
            if (substr($components[$i], 0, 2) === 'BZ') {
                $response->setHoldItemsLimit(substr($components[$i], 2));
            }
            // Extract overdue items limit
            if (substr($components[$i], 0, 2) === 'CA') {
                $response->setOverdueItemsLimit( substr($components[$i], 2));
            }
            // Extract charged items limit
            if (substr($components[$i], 0, 2) === 'CB') {
                $response->setChargedItemsLimit(substr($components[$i], 2));
            }
            // Extract valid patron
            if (substr($components[$i], 0, 2) === 'BL') {
                $response->setValidPatron(substr($components[$i], 2));
            } 
            // Extract valid patron password
            elseif (substr($components[$i], 0, 2) === 'CQ') {
                $response->setValidPatronPassword(substr($components[$i], 2));
            }
            // Extract currency type
            elseif (substr($components[$i], 0, 2) === 'BH') {
                $response->setCurrencyType(substr($components[$i], 2));
            }
            // Extract fee amount 
            elseif (substr($components[$i], 0, 2) === 'BV') {
                $response->setFeeAmount(substr($components[$i], 2));
            }
            // Extract fee limit 
            elseif (substr($components[$i], 0, 2) === 'CC') {
                $response->setFeeLimit(substr($components[$i], 2));
            }
            // Extract hold items 
            elseif (substr($components[$i], 0, 2) === 'AS') {
                $response->setHoldItems(substr($components[$i], 2));
            }
            // Extract overdue items 
            elseif (substr($components[$i], 0, 2) === 'AT') {
                $response->setOverdueItems(substr($components[$i], 2));
            }
            // Extract charged items 
            elseif (substr($components[$i], 0, 2) === 'AU') {
                $response->setChargedItems(substr($components[$i], 2));
            }
            // Extract fine items 
            elseif (substr($components[$i], 0, 2) === 'AV') {
                $response->setFineItems(substr($components[$i], 2));
            }
            // Extract recall items 
            elseif (substr($components[$i], 0, 2) === 'BU') {
                $response->setRecallItems(substr($components[$i], 2));
            }
            // Extract unavailable hold items  
            elseif (substr($components[$i], 0, 2) === 'CD') {
                $response->setUnavailableHoldItems(substr($components[$i], 2));
            }
            // Extract home address 
            elseif (substr($components[$i], 0, 2) === 'BD') {
                $response->setHomeAddress(substr($components[$i], 2));
            }
            // Extract e-mail address 
            elseif (substr($components[$i], 0, 2) === 'BE') {
                $response->setEmailAddress(substr($components[$i], 2));
            }
            // Extract home phone number 
            elseif (substr($components[$i], 0, 2) === 'BF') {
                $response->setHomePhoneNumber(substr($components[$i], 2));
            }
            // Extract screen message
            elseif (substr($components[$i], 0, 2) === 'AF') {
                $response->setScreenMessage(substr($components[$i], 2));
            }
            // Extract print line  
            elseif (substr($components[$i], 0, 2) === 'AG') {
                $response->setPrintLine(substr($components[$i], 2));
            }
            $i++;
        }

        $data['Patron Information Response']['Patron Status'] = $response->getPatronStatus();        
        $data['Patron Information Response']['Language'] = $response->getLanguage();
        $data['Patron Information Response']['Transaction date'] = $response->getTransactionDate();
        $data['Patron Information Response']['Hold Items Count'] = $response->getHoldItemsCount();
        $data['Patron Information Response']['Overdue Items Count '] = $response->getOverdueItemsCount();
        $data['Patron Information Response']['Charged Items Count'] = $response->getChargedItemsCount();
        $data['Patron Information Response']['Fine Items Count'] = $response->getFineItemsCount();
        $data['Patron Information Response']['Recall Items Count '] = $response->getRecallItemsCount();
        $data['Patron Information Response']['Unavailable Holds Count '] = $response->getUnavailableHoldsCount();
        $data['Patron Information Response']['Institution id'] = $response->getInstitutionId();
        $data['Patron Information Response']['Patron identifier'] = $response->getPatronIdentifier();
        $data['Patron Information Response']['Personal Name'] = $response->getPersonalName();
        $data['Patron Information Response']['Hold Items Limit'] = $response->getHoldItemsLimit();
        $data['Patron Information Response']['Overdue Items Limit '] = $response->getOverdueItemsLimit();
        $data['Patron Information Response']['Charged Items Limit'] = $response->getChargedItemsLimit();
        $data['Patron Information Response']['Valid Patron'] = $response->isValidPatron();
        $data['Patron Information Response']['Valid Patron Password'] = $response->isValidPatronPassword();
        $data['Patron Information Response']['Currency Type'] = $response->getCurrencyType();
        $data['Patron Information Response']['Fee Amount'] = $response->getFeeAmount();
        $data['Patron Information Response']['Fee Limit'] = $response->getFeeLimit();
        $data['Patron Information Response']['Hold Items '] = $response->getHoldItems();
        $data['Patron Information Response']['Overdue Items  '] = $response->getOverdueItems();
        $data['Patron Information Response']['Charged Items '] = $response->getChargedItems();
        $data['Patron Information Response']['Fine Items '] = $response->getFineItems();
        $data['Patron Information Response']['Recall Items  '] = $response->getRecallItems();
        $data['Patron Information Response']['Unavailable Holds Items '] = $response->getUnavailableHoldItems();
        $data['Patron Information Response']['home address'] = $response->getHomeAddress();
        $data['Patron Information Response']['e-mail address'] = $response->getEmailAddress();
        $data['Patron Information Response']['home phone number'] = $response->getHomePhoneNumber();
        $data['Patron Information Response']['Screen Message'] = $response->getScreenMessage();
        $data['Patron Information Response']['Print Line'] = $response->getPrintLine();

    } else {
        echo "Invalid message format\n";
    }
    return $data;
}
?>
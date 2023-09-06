<?php
    function getData($message){
        $components = explode('|', $message);
        $uidAlgorithm = substr($components[0], 0, 2);
        switch ($uidAlgorithm){
            case '93': return getDataLogin($message);
            case '09': return getDataItemCheckin($message);
            case '65': return getDataRenewAllItems($message);
            case '35': return getDataEndSession($message);
            case '11': return getDataItemCheckout($message);
            case '29': return getDataRenew($message);
            case '17': return getDataInformation($message);
            case '43': return getDataUpdateNotice($message);
        }

    }
    function getDataLogin($message){
        $data['Login']=[];
        // Split the message into components using the "|" delimiter
        $components = explode('|', $message);

        if (count($components) >= 2) {
            // Extract UID algorithm and PWD algorithm
            $uidAlgorithm = substr($components[0], 2, 1);
            $pwdAlgorithm = substr($components[0], 3, 1);
            // Extract Login us er id
            $loginFullUserID=explode('CN', $components[0]);
            $loginUserId = isset($loginFullUserID[1]) ? $loginFullUserID[1] : '';
            // Extract Login password
            $loginFullPassword = explode('CO', $components[1]);
            $loginPassword = isset($loginFullPassword[1]) ? $loginFullPassword[1] : '';
            // Extract Location Code
            $loginFullLocationCode=explode('CP', $components[2]);
            // Check if the optional location code field is present
            $locationCode = isset($loginFullLocationCode[1]) ? $loginFullLocationCode[1] : '';

            $loginFullVP=explode('VP', $components[3]);
            // Check if the optional location code field is present
            $vendorProfile = isset($loginFullVP[1]) ? $loginFullVP[1] : '';

            $data['Login']['UID Algorithm'] = $uidAlgorithm;
            $data['Login']['PWD Algorithm'] = $pwdAlgorithm;
            $data['Login']['Login User ID'] = $loginUserId;
            $data['Login']['Login Password'] = $loginPassword;
            $data['Login']['Location Code'] = $locationCode;
            $data['Login']['Vendor Profile'] = $vendorProfile;
        } else {
            echo "Invalid message format\n";
        }
        return $data;
    }

    function getDataItemCheckin($message){
        $data['Item Checkin']=[];
        $components = explode('|', $message);

        if (count($components) >= 2) {
            $noBlock = substr($components[0], 2, 1);

            // Extract transaction date and time
            $transactionDate = substr($components[0], 3, 18);

            // Extract return date and time
            $returnDate = substr($components[0], 21, 18);

            // Extract current location
            $fullCurrentLocation = explode('AP', $components[0]);
            $currentLocation = isset($fullCurrentLocation[1]) ? $fullCurrentLocation[1] : '';

            // Extract institution ID
            $fullInstitutionId = explode('AO', $components[1]);
            $institutionId = isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '';

            // Extract item identifier (barcode)
            $fullItemIdentifier = explode('AB', $components[2]);
            $itemIdentifier = isset($fullItemIdentifier[1]) ? $fullItemIdentifier[1] : '';

            // Extract terminal password
            $fullTerminalPassword = explode('AC', $components[3]);
            $terminalPassword = isset($fullTerminalPassword[1]) ? $fullTerminalPassword[1] : '';

            $data['Item Checkin']['No Block'] = $noBlock;
            $data['Item Checkin']['Transaction Date'] = $transactionDate;
            $data['Item Checkin']['Return Date'] = $returnDate;
            $data['Item Checkin']['Current Location'] = $currentLocation;
            $data['Item Checkin']['Institution ID'] = $institutionId;
            $data['Item Checkin']['Item Identifier (Barcode)'] = $itemIdentifier;
            $data['Item Checkin']['Terminal Password'] = $terminalPassword;

        } else {
            echo "Invalid message format\n";
        }
        return $data;
    }

    function getDataRenewAllItems($message){
        $data['Renew All Items']=[];
        $components = explode('|', $message);

        if (count($components) >= 2) {
            // Extract transaction date and time
            $transactionDate = substr($components[0], 2, 18);

            // Extract institution ID
            $fullInstitutionId = explode('AO', $components[0]);
            $institutionId = isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '';

            // Extract patron identifier 
            $fullPatronIdentifier = explode('AA', $components[1]);
            $patronIdentifier = isset($fullPatronIdentifier[1]) ? $fullPatronIdentifier[1] : '';

            // Extract patron password
            $fullPatronPassword = explode('AD', $components[2]);
            $patronPassword = isset($fullPatronPassword[1]) ? $fullPatronPassword[1] : '';

            $data['Renew All Items']['Transaction Date'] = $transactionDate;
            $data['Renew All Items']['Institution ID'] = $institutionId;
            $data['Renew All Items']['Patron Identifier'] = $patronIdentifier;
            $data['Renew All Items']['Patron Password'] = $patronPassword;

        } else {
            echo "Invalid message format\n";
        }
    }

    function getDataEndSession($message){
        $data['End Session']=[];
        $components = explode('|', $message);

        if (count($components) >= 2) {
            // Extract transaction date and time
            $transactionDate = substr($components[0], 2, 18);

            // Extract institution ID
            $fullInstitutionId = explode('AO', $components[0]);
            $institutionId = isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '';

            // Extract patron identifier 
            $fullPatronIdentifier = explode('AA', $components[1]);
            $patronIdentifier = isset($fullPatronIdentifier[1]) ? $fullPatronIdentifier[1] : '';



            // Extract patron password
            $fullPatronPassword = explode('AD', $components[2]);
            $patronPassword = isset($fullPatronPassword[1]) ? $fullPatronPassword[1] : '';

            $data['End Session']['Transaction Date'] = $transactionDate;
            $data['End Session']['Institution ID'] = $institutionId;
            $data['End Session']['Patron Identifier'] = $patronIdentifier;
            $data['End Session']['Patron Password'] = $patronPassword;

        } else {
            echo "Invalid message format\n";
        }
    }

    function getDataItemCheckout($message){
        $data['Item Checkout']=[];
        $components = explode('|', $message);

        if (count($components) >= 2) {
            $SCRenewalPolicy = substr($components[0], 2, 1);

            $noBlock = substr($components[0], 3, 1);

            // Extract transaction date and time
            $transactionDate = substr($components[0], 4, 18);

            $nbDueDate = substr($components[0], 22, 18);

            // Extract institution ID
            $fullInstitutionId = explode('AO', $components[0]);
            $institutionId = isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '';

            // Extract patron identifier 
            $fullPatronIdentifier = explode('AA', $components[1]);
            $patronIdentifier = isset($fullPatronIdentifier[1]) ? $fullPatronIdentifier[1] : '';

            // Extract item identifier 
            $fullItemIdentifier = explode('AB', $components[2]);
            $itemIdentifier = isset($fullItemIdentifier[1]) ? $fullItemIdentifier[1] : '';

            // Extract terminal password
            $fullTerminalPassword = explode('AC', $components[3]);
            $terminalPassword = isset($fullTerminalPassword[1]) ? $fullTerminalPassword[1] : '';

            // Extract patron password
            $fullPatronPassword = explode('AD', $components[4]);
            $patronPassword = isset($fullPatronPassword[1]) ? $fullPatronPassword[1] : '';

            // Extract fee acknowledged
            $fullFeeAcknowledge = explode('BO', $components[5]);
            $feeAcknowledge = isset($fullFeeAcknowledge[1]) ? $fullFeeAcknowledge[1] : '';

            $data['Item Checkout']['SC renewal policy'] = $SCRenewalPolicy;
            $data['Item Checkout']['No block'] = $noBlock;
            $data['Item Checkout']['Transaction date'] = $transactionDate;
            $data['Item Checkout']['Nb due date'] = $nbDueDate;
            $data['Item Checkout']['Institution id'] = $institutionId;
            $data['Item Checkout']['Patron identifier'] = $patronIdentifier;
            $data['Item Checkout']['Item identifier'] = $itemIdentifier;
            $data['Item Checkout']['Terminal password'] = $terminalPassword;
            $data['Item Checkout']['Patron password'] = $patronPassword;
            $data['Item Checkout']['Fee acknowledged'] = $feeAcknowledge;

        } else {
            echo "Invalid message format\n";
        }
    }

    function getDataRenew($message){
        $data['Renew'] = [];
        // Split the message into components using the "|" delimiter
        $components = explode('|', $message);

        if(count($components) >=2){
            // Extract third party allowed and no block?
            $thirdPartyAllowed = substr($components[0], 2, 1);
            $noBlock = substr($components[0], 3, 1);
            // Extract transaction date and nb due date
            $transactionDate = substr($components[0],4,18);
            $nbDueDate = substr($components[0],22,18);
            // Extract institution id
            $renewFullInstitutionId=explode('AO', $components[0]);
            $renewInstitutionId = isset($renewFullInstitutionId[1]) ? $renewFullInstitutionId[1] : '';
            // Extract patron identifier
            $renewFullPatronIdentifier=explode('AA', $components[1]);
            $renewPatronIdentifier = isset($renewFullPatronIdentifier[1]) ? $renewFullPatronIdentifier[1] : '';
            // Extract patron password
            // Extract item identifier
            // Extract title identifier 
            // Extract terminal password 
            // Extract item properties 
            // Extract fee acknowledged

            $data['Renew']['Third Party Allowed'] = $thirdPartyAllowed;
            $data['Renew']['No Block'] = $noBlock;
            $data['Renew']['Transaction Date'] = $transactionDate;
            $data['Renew']['nb Due Date'] = $nbDueDate;
            $data['Renew']['Institution ID'] = $renewInstitutionId;
            $data['Renew']['Patron Identifier'] = $renewPatronIdentifier;
            
        }else {
            echo "Invalid message format\n";
        }
        return $data;
    }

    
    function getDataInformation($message){
        $data['ItemInformation'] = [];
        // Split the message into components using the "|" delimiter
        $components = explode('|', $message);

        if(count($components) >=2){
            
            // Extract transaction date 
            $transactionDate = substr($components[0],2,18);
            // Extract institution id
            $itemInforFullInstitutionId=explode('AO', $components[0]);
            $itemInforInstitutionId = isset($itemInforFullInstitutionId[1]) ? $itemInforFullInstitutionId[1] : '';
            // Extract item identifier
            $itemInforFullItemIdentifier=explode('AB', $components[1]);
            $itemInforItemIdentifier = isset($itemInforFullItemIdentifier[1]) ? $itemInforFullItemIdentifier[1] : '';
            // Extract terminal password
            $itemInforFullTerminalPassword=explode('AC', $components[1]);
            $itemInforTerminalPassword = isset($itemInforFullTerminalPassword[1]) ? $itemInforFullTerminalPassword[1] : '';
            
            $data['ItemInformation']['Transaction Date'] = $transactionDate;
            $data['ItemInformation']['Institution ID'] = $itemInforInstitutionId;
            $data['ItemInformation']['Item Identifier'] = $itemInforItemIdentifier;
            $data['ItemInformation']['Terminal Password'] = $itemInforTerminalPassword;
            
        }else {
            echo "Invalid message format\n";
        }
        return $data;
    }

    function getDataUpdateNotice($message){
        $data['UpdateNotice'] = [];
        // Split the message into components using the "|" delimiter
        $components = explode('|', $message);

        if(count($components) >=2){
            // Extract Notice Status
            $noticeStatus = substr($components[0],2,2);
           
            // Extract transaction date and  due date
            $transactionDate = substr($components[0],4,18);
            $deliveryDate = substr($components[0],22,18);

            // Extract Notice Medium and Notification Type
            $noticeMedium = substr($components[0],42,1);
            $notificationType = substr($components[0],45,1);
            // Extract institution id
            $updateNoticeFullInstitutionId=explode('AO', $components[0]);
            $updateNoticeInstitutionId = isset($updateNoticeFullInstitutionId[1]) ? $updateNoticeFullInstitutionId[1] : '';
            // Extract patron identifier
            $updateNoticeFullPatronIdentifier=explode('AA', $components[1]);
            $updateNoticePatronIdentifier = isset($updateNoticeFullPatronIdentifier[1]) ? $updateNoticeFullPatronIdentifier[1] : '';
            
            // Extract item identifier
            $updateNoticeFullItemIdentifier=explode('AB', $components[2]);
            $updateNoticeItemIdentifier = isset($updateNoticeFullItemIdentifier[1]) ? $updateNoticeFullItemIdentifier[1] : ''; 
            
            // Extract terminal password 
            $updateNoticeFullTerminalPassword=explode('AC', $components[3]);
            $updateNoticeTerminalPassword = isset($updateNoticeFullTerminalPassword[1]) ? $updateNoticeFullTerminalPassword[1] : '';
            
            $data['Update Notice']['Notice Status'] = $noticeStatus;
            $data['Update Notice']['Transaction Date'] = $transactionDate;
            $data['Update Notice']['Delicary Date'] = $deliveryDate;
            $data['Update Notice']['Notice Medium'] = $noticeMedium;
            $data['Update Notice']['Notification Type'] = $notificationType;
            $data['Update Notice']['Institution ID'] = $updateNoticeInstitutionId;
            $data['Update Notice']['Patron Identifier'] = $updateNoticePatronIdentifier;
            $data['Update Notice']['Item Identifier'] = $updateNoticeItemIdentifier;
            $data['Update Notice']['Terminal Password'] = $updateNoticeTerminalPassword;
            
        }else {
            echo "Invalid message format\n";
        }
        return $data;
    }
?>

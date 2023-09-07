<?php
require_once 'messages/updateNotice.php';
function getDataUpdateNotice($message){
    $data['Update Notice'] = [];
    // Split the message into components using the "|" delimiter
    $components = explode('|', $message);

    if(count($components) >=2){
        // Create an instance of the updateNotice class
        $updateNotice = new updateNotice();
        // Extract Notice Status
        $updateNotice->setNoticeStatus(substr($components[0], 2, 2));
       
        // Extract transaction date and  due date
        $updateNotice->setTransactionDate(substr($components[0],4,18));
        $updateNotice->setDeliveryDate(substr($components[0], 22, 18));

        // Extract Notice Medium and Notification Type
        $updateNotice->setNoticeMedium(substr($components[0], 42, 1));
        $updateNotice->setNotificationType(substr($components[0], 45, 1));

        // Extract institution id
        $updateNoticeFullInstitutionId=explode('AO', $components[0]);
        $updateNotice->setNoticeInstitutionId(isset($updateNoticeFullInstitutionId[1]) ? $updateNoticeFullInstitutionId[1] : '');
        // Extract patron identifier
        $updateNoticeFullPatronIdentifier=explode('AA', $components[1]);
        $updateNotice->setNoticePatronIdentifier(isset($updateNoticeFullPatronIdentifier[1]) ? $updateNoticeFullPatronIdentifier[1] : '');
        // Extract item identifier
        $updateNoticeFullItemIdentifier=explode('AB', $components[2]);
        $updateNotice->setNoticeItemIdentifier(isset($updateNoticeFullItemIdentifier[1]) ? $updateNoticeFullItemIdentifier[1] : '');
        // Extract terminal password 
        $updateNoticeFullTerminalPassword=explode('AC', $components[3]);
        $updateNotice->setNoticeTerminalPassword(isset($updateNoticeFullTerminalPassword[1]) ? $updateNoticeFullTerminalPassword[1] : '');

        // Retrieve the data from the updateNotice object
        $data['Update Notice']['Notice Status'] = $updateNotice->getNoticeStatus();
        $data['Update Notice']['Transaction Date'] = $updateNotice->getTransactionDate();
        $data['Update Notice']['Delivery Date'] = $updateNotice->getDeliveryDate();
        $data['Update Notice']['Notice Medium'] = $updateNotice->getNoticeMedium();
        $data['Update Notice']['Notification Type'] = $updateNotice->getNotificationType();
        $data['Update Notice']['Institution ID'] = $updateNotice->getNoticeInstitutionId();
        $data['Update Notice']['Patron Identifier'] = $updateNotice->getNoticePatronIdentifier();
        $data['Update Notice']['Item Identifier'] = $updateNotice->getNoticeItemIdentifier();
        $data['Update Notice']['Terminal Password'] = $updateNotice->getNoticeTerminalPassword();

        if(count($components) >5){
            $updateNoticeFullComment=explode('DE', $components[4]);
            $updateNotice->setNoticeComment(isset($updateNoticeFullComment[1]) ? $updateNoticeFullComment[1] : '');
            $data['Update Notice']['Comment'] = $updateNotice->getNoticeComment();
        }
    }else {
        echo "Invalid message format\n";
    }
    return $data;
}
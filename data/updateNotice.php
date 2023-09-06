<?php
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
        if(count($components) >5){
            $updateNoticeFullComment=explode('DE', $components[4]);
        $updateNoticeComment = isset($updateNoticeFullComment[1]) ? $updateNoticeFullComment[1] : '';
        $data['Update Notice']['Comment'] = $updateNoticeComment;
        }
    }else {
        echo "Invalid message format\n";
    }
    return $data;
}
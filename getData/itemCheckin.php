<?php
require_once 'messages/itemCheckin.php';
function getDataItemCheckin($message){
    $data['Item Checkin']=[];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        $checkIn = new ItemCheckin(); // Tạo một đối tượng CheckIn
        $checkIn->setNoBlock(substr($components[0], 2, 1));
        $checkIn->setTransactionDate(substr($components[0], 3, 18));
        $checkIn->setReturnDate(substr($components[0], 21, 18));
        
        $fullCurrentLocation = explode('AP', $components[0]);
        $checkIn->setCurrentLocation(isset($fullCurrentLocation[1]) ? $fullCurrentLocation[1] : '');
        
        $fullInstitutionId = explode('AO', $components[1]);
        $checkIn->setInstitutionId(isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '');
        
        $fullItemIdentifier = explode('AB', $components[2]);
        $checkIn->setItemIdentifier(isset($fullItemIdentifier[1]) ? $fullItemIdentifier[1] : '');
        
        $fullTerminalPassword = explode('AC', $components[3]);
        $checkIn->setTerminalPassword(isset($fullTerminalPassword[1]) ? $fullTerminalPassword[1] : '');

        // Lấy các giá trị từ đối tượng CheckIn và đưa vào mảng dữ liệu
        $data['Item Checkin']['No Block'] = $checkIn->isNoBlock();
        $data['Item Checkin']['Transaction Date'] = $checkIn->getTransactionDate();
        $data['Item Checkin']['Return Date'] = $checkIn->getReturnDate();
        $data['Item Checkin']['Current Location'] = $checkIn->getCurrentLocation();
        $data['Item Checkin']['Institution ID'] = $checkIn->getInstitutionId();
        $data['Item Checkin']['Item Identifier (Barcode)'] = $checkIn->getItemIdentifier();
        $data['Item Checkin']['Terminal Password'] = $checkIn->getTerminalPassword();
    } else {
        echo "Invalid message format\n";
    }

    return $data;
}
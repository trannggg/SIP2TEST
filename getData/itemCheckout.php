<?php
require_once 'messages/itemCheckout.php';
function getDataItemCheckout($message){
    $data['Item Checkout']=[];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        $checkOut = new ItemCheckout(); // Tạo một đối tượng CheckOut
        $checkOut->setSCRenewalPolicy(substr($components[0], 2, 1));
        $checkOut->setNoBlock(substr($components[0], 3, 1));
        $checkOut->setTransactionDate(substr($components[0], 4, 18));
        $checkOut->setNbDueDate(substr($components[0], 22, 18));
        
        $fullInstitutionId = explode('AO', $components[0]);
        $checkOut->setInstitutionId(isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '');
        
        $fullPatronIdentifier = explode('AA', $components[1]);
        $checkOut->setPatronIdentifier(isset($fullPatronIdentifier[1]) ? $fullPatronIdentifier[1] : '');
        
        $fullItemIdentifier = explode('AB', $components[2]);
        $checkOut->setItemIdentifier(isset($fullItemIdentifier[1]) ? $fullItemIdentifier[1] : '');
        
        $fullTerminalPassword = explode('AC', $components[3]);
        $checkOut->setTerminalPassword(isset($fullTerminalPassword[1]) ? $fullTerminalPassword[1] : '');
        
        $fullPatronPassword = explode('AD', $components[4]);
        $checkOut->setPatronPassword(isset($fullPatronPassword[1]) ? $fullPatronPassword[1] : '');

        $fullFeeAcknowledge = explode('BO', $components[5]);
        $checkOut->setFeeAcknowledged(isset($fullFeeAcknowledge[1]) ? $fullFeeAcknowledge[1] : '');

        // Lấy các giá trị từ đối tượng CheckOut và đưa vào mảng dữ liệu
        $data['Item Checkout']['SC renewal policy'] = $checkOut->isSCRenewalPolicy();
        $data['Item Checkout']['No block'] = $checkOut->isNoBlock();
        $data['Item Checkout']['Transaction date'] = $checkOut->getTransactionDate();
        $data['Item Checkout']['Nb due date'] = $checkOut->getNbDueDate();
        $data['Item Checkout']['Institution id'] = $checkOut->getInstitutionId();
        $data['Item Checkout']['Patron identifier'] = $checkOut->getPatronIdentifier();
        $data['Item Checkout']['Item identifier'] = $checkOut->getItemIdentifier();
        $data['Item Checkout']['Terminal password'] = $checkOut->getTerminalPassword();
        $data['Item Checkout']['Patron password'] = $checkOut->getPatronPassword();
        $data['Item Checkout']['Fee acknowledged'] = $checkOut->isFeeAcknowledged();
    } else {
        echo "Invalid message format\n";
    }

    return $data;
}
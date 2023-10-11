<?php
require_once 'messages/itemInformation.php';
function getDataInformation($message){
    $data['ItemInformation'] = [];
    // Split the message into components using the "|" delimiter
    $components = explode('|', $message);

    if (count($components) >= 2) {
        $itemInformation = new ItemInformation(); // Tạo một đối tượng ItemInformation
        $itemInformation->setTransactionDate(substr($components[0], 2, 18));

        $itemInforFullInstitutionId = explode('AO', $components[1]);
        $itemInformation->setInstitutionId(isset($itemInforFullInstitutionId[1]) ? $itemInforFullInstitutionId[1] : '');

        $itemInforFullItemIdentifier = explode('AB', $components[2]);
        $itemInformation->setItemIdentifier(isset($itemInforFullItemIdentifier[1]) ? $itemInforFullItemIdentifier[1] : '');

        $itemInforFullTerminalPassword = explode('AC', $components[3]);
        $itemInformation->setTerminalPassword(isset($itemInforFullTerminalPassword[1]) ? $itemInforFullTerminalPassword[1] : '');

        // Lấy các giá trị từ đối tượng ItemInformation và đưa vào mảng dữ liệu
        $data['ItemInformation']['Transaction Date'] = $itemInformation->getTransactionDate();
        $data['ItemInformation']['Institution ID'] = $itemInformation->getInstitutionId();
        $data['ItemInformation']['Item Identifier'] = $itemInformation->getItemIdentifier();
        $data['ItemInformation']['Terminal Password'] = $itemInformation->getTerminalPassword();
    } else {
        echo "Invalid message format\n";
    }

    return $data;
}
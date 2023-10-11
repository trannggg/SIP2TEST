<?php
require_once 'messages/feePaid.php';

function  getDataFeePaid($message) {
    $data['Fee Paid'] = [];
    $components = explode('|', $message);
    
    if (count($components) == 7) {
        $feePaid = new FeePaid(); // Tạo một đối tượng FeePaid
        $feePaid->setTransactionDate(substr($components[0], 2, 18));
        $feePaid->setFeeType(substr($components[0], 20, 2));
        $feePaid->setPaymentType(substr($components[0], 22, 2));
        $feePaid->setCurrencyType(substr($components[0], 24, 3));
        
        $fee_amount_full = explode('BV', $components[0]);
        $feePaid->setFeeAmount(isset($fee_amount_full[1]) ? $fee_amount_full[1] : '');
        
        $institution_id_full = explode('AO', $components[1]);
        $feePaid->setInstitutionId(isset($institution_id_full[1]) ? $institution_id_full[1] : '');

        $patron_identifier_full =  explode('AA', $components[2]);
        $feePaid->setPatronIdentifier(isset($patron_identifier_full[1]) ? $patron_identifier_full[1] : '');

        $patron_password_full =  explode('AD', $components[3]);
        $feePaid->setPatronPassword(isset($patron_password_full[1]) ? $patron_password_full[1] : '');

        $fee_identifier_full = explode('CG', $components[4]);
        $feePaid->setFeeIdentifier(isset($fee_identifier_full[1]) ? $fee_identifier_full[1] : '');

        $transaction_id_full = explode('BK', $components[5]);
        $feePaid->setTransactionId(isset($transaction_id_full[1]) ? $transaction_id_full[1] : '');

        // Lấy các giá trị từ đối tượng FeePaid và đưa vào mảng dữ liệu
        $data['Fee Paid']['Transaction date'] = $feePaid->getTransactionDate();
        $data['Fee Paid']['Fee type'] = $feePaid->getFeeType();
        $data['Fee Paid']['Payment type'] = $feePaid->getPaymentType();
        $data['Fee Paid']['Currency type'] = $feePaid->getCurrencyType();
        $data['Fee Paid']['Fee amount'] = $feePaid->getFeeAmount();
        $data['Fee Paid']['Institution ID'] = $feePaid->getInstitutionId();
        $data['Fee Paid']['Patron Identifier'] = $feePaid->getPatronIdentifier();
        $data['Fee Paid']['Patron Password'] = $feePaid->getPatronPassword();
        $data['Fee Paid']['Fee Identifier'] = $feePaid->getFeeIdentifier();
        $data['Fee Paid']['Transaction ID'] = $feePaid->getTransactionId();
    } else {
        echo "Invalid message format\n";
    }

    return $data;
}

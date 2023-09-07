<?php
function  getDataFeePaid($message) {
    $data['Fee Paid'] = [];
    $components = explode('|', $message);
    // 3720230906    1402454455USDBV88|AO11|AA11|AD22|CG66|BK77|
    
    if (count($components) == 7) {
        $transaction_date = substr($components[0], 2, 18);
        $fee_type = substr($components[0], 20, 2);
        $payment_type = substr($components[0], 22, 2);
        $currency_type = substr($components[0], 24, 3);
        $fee_amount_full = explode('BV', $components[0]);
        $fee_amount = isset($fee_amount_full) ? $fee_amount_full[1] : ''; //BV
        $institution_id_full = explode('AO', $components[1]);
        $institution_id = isset($institution_id_full) ? $institution_id_full[1] : ''; //AO
        $patron_identifier_full =  explode('AA', $components[2]);
        $patron_identifier = isset($patron_identifier_full) ? $patron_identifier_full[1] : ''; //AA
        $patron_password_full =  explode('AD', $components[3]);
        $patron_password = isset($patron_password_full) ? $patron_password_full[1] : ''; //AD
        $fee_identifier_full = explode('CG', $components[4]);
        $fee_identifier = isset($fee_identifier_full) ? $fee_identifier_full[1] : ''; //CG
        $transaction_id_full = explode('BK', $components[5]); //BK
        $transaction_id = isset($transaction_id_full) ? $transaction_id_full[1] : '';

        $data['Fee Paid']['Transaction date'] = $transaction_date;
        $data['Fee Paid']['Fee type'] = $fee_type;
        $data['Fee Paid']['Payment type'] = $payment_type;
        $data['Fee Paid']['Currency type'] = $currency_type;
        $data['Fee Paid']['Fee amount'] =$fee_amount;
        $data['Fee Paid']['Institution ID'] = $institution_id;
        $data['Fee Paid']['Patron Identifier'] = $patron_identifier;
        $data['Fee Paid']['Patron Password'] = $patron_password;
        $data['Fee Paid']['Fee Identifier'] = $fee_identifier;
        $data['Fee Paid']['Transaction ID'] = $transaction_id;

    } else {
        echo  "Invalid message format\n";
    }
    return $data;
}

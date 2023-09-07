<?php
require_once 'messages/login.php';

function getDataLogin($message) {
    $data['Login'] = [];

    // Split the message into components using the "|" delimiter
    $components = explode('|', $message);

    if (count($components) >= 2) {


        // Create a Login object
        $login = new Login();
        // Extract UID algorithm and PWD algorithm
        $login->setUIDAlgorithm(substr($components[0], 2, 1));
        $login->setPWDAlgorithm(substr($components[0], 3, 1));

        // Extract Login user id
        $loginFullUserID = explode('CN', $components[0]);
        $login->setLoginUserId(isset($loginFullUserID[1]) ? $loginFullUserID[1] : '');

        // Extract Login password
        $loginFullPassword = explode('CO', $components[1]);
        $login->setLoginPassword(isset($loginFullPassword[1]) ? $loginFullPassword[1] : '');

        // Extract Location Code
        $loginFullLocationCode = explode('CP', $components[2]);
        $login->setLocationCode(isset($loginFullLocationCode[1]) ? $loginFullLocationCode[1] : '');

        // Extract Vendor Profile
        $loginFullVP = explode('VP', $components[3]);
        $login->setVendorProfile(isset($loginFullVP[1]) ? $loginFullVP[1] : '');

        $data['Login']['UID Algorithm'] = $login->getUIDAlgorithm();
        $data['Login']['PWD Algorithm'] = $login->getPWDAlgorithm();
        $data['Login']['Login User ID'] = $login->getLoginUserId();
        $data['Login']['Login Password'] = $login->getLoginPassword();
        $data['Login']['Location Code'] = $login->getLocationCode();
        $data['Login']['Vendor Profile'] =$login->getVendorProfile();
    } else {
        echo "Invalid message format\n";
    }

    return $data;
}

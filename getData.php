<?php
    function getData($message){
        $components = explode('|', $message);
        $uidAlgorithm = substr($components[0], 0, 2);
        switch ($uidAlgorithm){
            case 93: return getDataLogin($message);

        }

    }
    function getDataLogin($message){
        $data=[];
        // Split the message into components using the "|" delimiter
        $components = explode('|', $message);

        if (count($components) >= 2) {
            // Extract UID algorithm and PWD algorithm
            $uidAlgorithm = substr($components[0], 0, 2);
            $pwdAlgorithm = substr($components[0], 2, 2);
            // Extract Login user id
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

            $data['UID Algorithm'] = $uidAlgorithm;
            $data['PWD Algorithm'] = $pwdAlgorithm;
            $data['Login User ID'] = $loginUserId;
            $data['Login Password'] = $loginPassword;
            $data['Location Code'] = $locationCode;
            $data['Vendor Profile'] = $vendorProfile;
        } else {
            echo "Invalid message format\n";
        }
        return $data;
    }
?>

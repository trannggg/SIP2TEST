<?php
require_once 'messages/renewItemResponse.php';
function getDataRenewResponse($message){
    $data['Renew Items Response']=[];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        $renewResponse = new RenewResponse();

        $renewResponse->setOk(substr($components[0], 2, 1));
        $renewResponse->setRenewalOk( substr($components[0], 3, 1));
        $renewResponse->setMagneticMedia( substr($components[0], 4, 1));
        $renewResponse->setDesensitize( substr($components[0], 5, 1));
        $renewResponse->setTransactionDate(substr($components[0], 6, 18));

        $fullInstitutionId = explode('AO', $components[0]);
        $renewResponse->setInstitutionId(isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '');

        $fullPatronIdentifier = explode('AA', $components[1]);
        $renewResponse->setPatronIdentifier(isset($fullPatronIdentifier[1]) ? $fullPatronIdentifier[1] : '');

        $fullItemIdentifier = explode('AB', $components[2]);
        $renewResponse->setItemIdentifier(isset($fullItemIdentifier[1]) ? $fullItemIdentifier[1] : '');

        $fullTitleIdentifier = explode('AJ', $components[3]);
        $renewResponse->setTitleIdentifier(isset($fullTitleIdentifier[1]) ? $fullTitleIdentifier[1] : '');

        $fullDueDate = explode('AH', $components[4]);
        $renewResponse->setDueDate(isset($fullDueDate[1]) ? $fullDueDate[1] : '');

        $i = 5;
        while ($i < count($components)) {
            $field = substr($components[$i], 0, 2);
            $value = substr($components[$i], 2);

            switch ($field) {
                case 'BT':
                    $renewResponse->setFeeType($value);
                    break;
                case 'CI':
                    $renewResponse->setSecurityInhibit($value);
                    break;
                case 'BH':
                    $renewResponse->setCurrencyType($value);
                    break;
                case 'BV':
                    $renewResponse->setFeeAmount($value);
                    break;
                case 'CK':
                    $renewResponse->setMediaType($value);
                    break;
                case 'CH':
                    $renewResponse->setItemProperties($value);
                    break;
                case 'BK':
                    $renewResponse->setTransactionId($value);
                    break;
                case 'AF':
                    $renewResponse->setScreenMessage($value);
                    break;
                case 'AG':
                    $renewResponse->setPrintLine($value);
                    break;
            }

            $i++;
        }

        $data['Renew Items Response']['IsOK'] = $renewResponse->isOk();
        $data['Renew Items Response']['Renewal OK'] = $renewResponse->isRenewalOk();
        $data['Renew Items Response']['Magnetic Media '] = $renewResponse->isMagneticMedia();
        $data['Renew Items Response']['Desensitize'] = $renewResponse->isDesensitize();
        $data['Renew Items Response']['Transaction Date'] = $renewResponse->getTransactionDate();
        $data['Renew Items Response']['Institution ID'] = $renewResponse->getInstitutionId();
        $data['Renew Items Response']['Patron Identifier'] = $renewResponse->getPatronIdentifier();
        $data['Renew Items Response']['Item Identifier (Barcode)'] = $renewResponse->getItemIdentifier();
        $data['Renew Items Response']['Title Identifier'] = $renewResponse->getTitleIdentifier();
        $data['Renew Items Response']['Due Date'] = $renewResponse->getDueDate();
        $data['Renew Items Response']['Fee Type'] = $renewResponse->getFeeType();
        $data['Renew Items Response']['Security Inhibit'] = $renewResponse->isSecurityInhibit();
        $data['Renew Items Response']['Currency Type'] = $renewResponse->getCurrencyType();
        $data['Renew Items Response']['Fee Amount'] = $renewResponse->getFeeAmount();
        $data['Renew Items Response']['Media Type'] = $renewResponse->getMediaType();
        $data['Renew Items Response']['Item Properties '] = $renewResponse->getItemProperties();
        $data['Renew Items Response']['Transaction ID'] = $renewResponse->getTransactionId();
        $data['Renew Items Response']['Screen Message'] = $renewResponse->getScreenMessage();
        $data['Renew Items Response']['Print Line'] = $renewResponse->getPrintLine();
    

    } else {
        echo "Invalid message format\n";
    }
    return $data;
}

// Sử dụng hàm
// $message = "300NUN20230908    101704|AAxyz|ABxyz123|AH|AJ|AO|AY2AZF4BB";
// $result = getDataRenewResponse($message);
// print_r($result);
?>
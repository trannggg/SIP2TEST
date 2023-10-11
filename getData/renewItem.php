<?php
require_once 'messages/renewItem.php';
function getDataRenew($message){
    $data['Renew'] = [];
    // Split the message into components using the "|" delimiter
    $components = explode('|', $message);

    if(count($components) >=2){

        $renewItem= new renewItem();

        // Extract third party allowed and no block?
        $renewItem->setThirdPartyAllowed(substr($components[0], 2, 1));

        $renewItem->setNoBlock(substr($components[0], 3, 1));
        // Extract transaction date and nb due date
        $renewItem->setTransactionDate(substr($components[0],4,18));
        $renewItem->setNbDueDate(substr($components[0], 22, 18));

        // Extract institution id
        $renewFullInstitutionId=explode('AO', $components[0]);
        $renewItem->setInstitutionId(isset($renewFullInstitutionId[1]) ? $renewFullInstitutionId[1] : '');
        // Extract patron identifier
        $renewFullPatronIdentifier=explode('AA', $components[1]);
        $renewItem->setPatronIdentifier(isset($renewFullPatronIdentifier[1]) ? $renewFullPatronIdentifier[1] : '');
        // Extract patron password
        // Extract item identifier
        $i = 2;
        while ($i < count($components)) {
            if (substr($components[$i], 0, 2) === 'AD') {
                $renewItem->setPatronPassword('' . substr($components[$i], 2));
            } elseif (substr($components[$i], 0, 2) === 'AB') {
                $renewItem->setItemIdentifier('' . substr($components[$i], 2));
            }
            $i++;
        }

        $data['Renew']['Third Party Allowed'] = $renewItem->isThirdPartyAllowed();
        $data['Renew']['No Block'] = $renewItem->isNoBlock();
        $data['Renew']['Transaction Date'] = $renewItem->getTransactionDate();
        $data['Renew']['nb Due Date'] = $renewItem->getNbDueDate();
        $data['Renew']['Institution ID'] = $renewItem->getInstitutionId();
        $data['Renew']['Patron Identifier'] = $renewItem->getPatronIdentifier();
        $data['Renew']['Patron Password'] = $renewItem->getPatronPassword();
        $data['Renew']['Item Identifier'] = $renewItem->getItemIdentifier();
        
    }else {
        echo "Invalid message format\n";
    }
    return $data;
}

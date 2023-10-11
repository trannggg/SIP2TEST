<?php
function getDataRenewAllItemsResponse($message){
    $data['Renew All Items Response']=[];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        // Extract Renew All is OK?
        $isOK = substr($components[0], 2, 1);
        // Extract renewed count
        $renewedCount = substr($components[0], 3, 4);
         // Extract unrenewed count
         $unrenewedCount = substr($components[0], 7, 4);
        // Extract transaction date and time
        $transactionDate = substr($components[0], 11, 18);

        // Extract institution ID
        $fullInstitutionId = explode('AO', $components[0]);
        $institutionId = isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '';


        $i = 1;
                while ($i < count($components)) {
                    // Extract renewed items
                    if (substr($components[$i], 0, 2) === 'BM') {
                        $renewedItems = '' . substr($components[$i], 2);
                    }
                    // Extract unrenewed items
                    elseif (substr($components[$i], 0, 2) === 'BN') {
                        $unrenewedItems = '' . substr($components[$i], 2);
                    }
                    // Extract screen message
                    elseif (substr($components[$i], 0, 2) === 'AF') {
                        $screenMessage = '' . substr($components[$i], 2);
                    }
                    // Extract print line  
                    elseif (substr($components[$i], 0, 2) === 'AG') {
                        $printLine  = '' . substr($components[$i], 2);
                    }
                    echo $i;
                    $i++;
                }

        $data['Renew All Items Response']['IsOK'] = $isOK;
        $data['Renew All Items Response']['Renewed Count '] = $renewedCount ;
        $data['Renew All Items Response']['Unrenewed Count'] = $unrenewedCount;
        $data['Renew All Items Response']['Transaction Date'] = $transactionDate;
        $data['Renew All Items Response']['Institution ID'] = $institutionId;
        $data['Renew All Items Response']['Renewed Items '] = $renewedItems;
        $data['Renew All Items Response']['Unrenewed Items'] = $unrenewedItems;
        $data['Renew All Items Response']['Sceen Message'] = $screenMessage;
        $data['Renew All Items Response']['Print Line'] = $printLine;
    

    } else {
        echo "Invalid message format\n";
    }
    return $data;
}
?>
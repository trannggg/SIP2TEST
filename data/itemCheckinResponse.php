<?php
function getDataItemCheckinResponse($message){
    $data['Item Checkin Response']=[];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        // Extract Checkin is OK?
        $isOK = substr($components[0], 2, 1);

        // Extract resensitize
        $resensitize = substr($components[0], 3, 1);

        // Extract magnetic media
        $magneticMedia = substr($components[0], 4, 1);

        // Extract alert
        $alert = substr($components[0], 5, 1);

        // Extract transaction date and time
        $transactionDate = substr($components[0], 6, 18);

        // Extract institution ID
        $fullInstitutionId = explode('AO', $components[0]);
        $institutionId = isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '';

        // Extract item identifier (barcode)
        $fullItemIdentifier = explode('AB', $components[1]);
        $itemIdentifier = isset($fullItemIdentifier[1]) ? $fullItemIdentifier[1] : '';

        // Extract permanent location
        $fullPermanentLocation = explode('AQ', $components[2]);
        $permanentLocation = isset($fullPermanentLocation[1]) ? $fullPermanentLocation[1] : '';

        $i = 3;
            while ($i < count($components)) {
                // Extract title identifier 
                if (substr($components[$i], 0, 2) === 'AJ') {
                    $titleIdentifier = '' . substr($components[$i], 2);
                } 
                // Extract sort bin
                elseif (substr($components[$i], 0, 2) === 'CL') {
                    $sortBin = '' . substr($components[$i], 2);
                }
                // Extract patron identifier
                elseif (substr($components[$i], 0, 2) === 'AA') {
                    $patronIdentifier = '' . substr($components[$i], 2);
                }
                // Extract media type 
                elseif (substr($components[$i], 0, 2) === 'CK') {
                    $mediaType = '' . substr($components[$i], 2);
                }
                // Extract item properties
                elseif (substr($components[$i], 0, 2) === 'CH') {
                    $itemProperties = '' . substr($components[$i], 2);
                }
                // Extract screen message
                elseif (substr($components[$i], 0, 2) === 'AF') {
                    $screenMessage = '' . substr($components[$i], 2);
                }
                // Extract print line  
                elseif (substr($components[$i], 0, 2) === 'AG') {
                    $printLine  = '' . substr($components[$i], 2);
                }
                $i++;
            }
        
        

        $data['Item Checkin Response']['IsOK'] = $isOK;
        $data['Item Checkin Response']['Resensitize'] = $resensitize;
        $data['Item Checkin Response']['Magnetic Media '] = $magneticMedia;
        $data['Item Checkin Response']['Alert'] = $alert;
        $data['Item Checkin Response']['Transaction Date'] = $transactionDate;
        $data['Item Checkin Response']['Institution ID'] = $institutionId;
        $data['Item Checkin Response']['Item Identifier (Barcode)'] = $itemIdentifier;
        $data['Item Checkin Response']['Permanent Location'] = $permanentLocation;
        $data['Item Checkin Response']['Title Identifier'] = $titleIdentifier;
        $data['Item Checkin Response']['Sort Bin'] = $sortBin;
        $data['Item Checkin Response']['Patron Identifier'] = $patronIdentifier;
        $data['Item Checkin Response']['Media Type'] = $mediaType;
        $data['Item Checkin Response']['Item Properties '] = $itemProperties;
        $data['Item Checkin Response']['Screen Message'] = $screenMessage;
        $data['Item Checkin Response']['Print Line'] = $printLine;
        
    
        } else {
            echo "Invalid message format\n";
        }
        return $data;
}

?>
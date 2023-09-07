<?php
function getDataEndSessionResponse($message){
    $data['End Session Response']=[];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        // Extract end session ?
        $endSession = substr($components[0], 2, 1);

        // Extract transaction date and time
        $transactionDate = substr($components[0], 3, 18);

        // Extract institution ID
        $fullInstitutionId = explode('AO', $components[0]);
        $institutionId = isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '';

        // Extract patron identifier 
        $fullPatronIdentifier = explode('AA', $components[1]);
        $patronIdentifier = isset($fullPatronIdentifier[1]) ? $fullPatronIdentifier[1] : '';

        $i = 2;
            while ($i < count($components)) {
                // Extract screen message
                if (substr($components[$i], 0, 2) === 'AF') {
                    $screenMessage = '' . substr($components[$i], 2);
                }
                // Extract print line  
                elseif (substr($components[$i], 0, 2) === 'AG') {
                    $printLine  = '' . substr($components[$i], 2);
                }
                $i++;
            }
        
            $data['End Session Response']['End Session'] = $endSession;
            $data['End Session Response']['Transaction Date'] = $transactionDate;
            $data['End Session Response']['Institution ID'] = $institutionId;
            $data['End Session Response']['Patron Identifier'] = $patronIdentifier;
            $data['End Session Response']['Screen Message'] = $screenMessage;
            $data['End Session Response']['Print Line'] = $printLine;

    } else {
        echo "Invalid message format\n";
    }
    return $data;
}
?>
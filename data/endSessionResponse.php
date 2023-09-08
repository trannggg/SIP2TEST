<?php
require_once('messages/endSessionResponse.php');
function getDataEndSessionResponse($message){
    $data['End Session Response']=[];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        $endSessionResponse = new EndSessionResponse();

        // Extract end session ?
        $endSessionResponse->setEndSession(substr($components[0], 2, 1));

        // Extract transaction date and time
        $endSessionResponse->setTransactionDate(substr($components[0], 3, 18));

        // Extract institution ID
        $fullInstitutionId = explode('AO', $components[0]);
        $endSessionResponse->setInstitutionId(isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '');

        // Extract patron identifier 
        $fullPatronIdentifier = explode('AA', $components[1]);
        $endSessionResponse->setPatronIdentifier(isset($fullPatronIdentifier[1]) ? $fullPatronIdentifier[1] : '');

        $i = 2;
            while ($i < count($components)) {
                // Extract screen message
                if (substr($components[$i], 0, 2) === 'AF') {
                    $endSessionResponse->setScreenMessage('' . substr($components[$i], 2));
                }
                // Extract print line  
                elseif (substr($components[$i], 0, 2) === 'AG') {
                    $endSessionResponse->setPrintLine('' . substr($components[$i], 2));
                }
                $i++;
            }
        
            $data['End Session Response']['End Session'] = $endSessionResponse->isEndSession();
            $data['End Session Response']['Transaction Date'] = $endSessionResponse->getTransactionDate();
            $data['End Session Response']['Institution ID'] = $endSessionResponse->getInstitutionId();
            $data['End Session Response']['Patron Identifier'] = $endSessionResponse->getPatronIdentifier();
            $data['End Session Response']['Screen Message'] = $endSessionResponse->getScreenMessage();
            $data['End Session Response']['Print Line'] = $endSessionResponse->getPrintLine();
                      
    } else {
        echo "Invalid message format\n";
    }
    return $data;
}

// Sử dụng hàm
// $message = "36Y19700101    010000AOinstitutionId|AApatronIdentifier|AFscreenMessage|AGprintLine|";
// $result = getDataEndSessionResponse($message);
// print_r($result);
?>
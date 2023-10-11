<?php
require_once 'messages/feePaidResponse.php';
function getDataFeePaidResponse($message)
{
    $data['Fee Paid Response'] = [];
    $components = explode('|', $message);

    if (count($components) >= 2) {
        $response = new FeePaidResponse();

        // Extract payment accepted
        $response->setPaymentAccepted(substr($components[0], 2, 1));

        // Extract transaction date and time
        $response->setTransactionDate(substr($components[0], 3, 18));

        // Extract institution ID
        $fullInstitutionId = explode('AO', $components[0]);
        $response->setInstitutionId(isset($fullInstitutionId[1]) ? $fullInstitutionId[1] : '');

        // Extract patron identifier
        $fullPatronIdentifier = explode('AA', $components[1]);
        $response->setPatronIdentifier(isset($fullPatronIdentifier[1]) ? $fullPatronIdentifier[1] : '');

        $i = 2;
        while ($i < count($components)) {
            // Extract transaction id
            if (substr($components[$i], 0, 2) === 'BK') {
                $response->setTransactionId('' . substr($components[$i], 2));
            }
            // Extract screen message
            elseif (substr($components[$i], 0, 2) === 'AF') {
                $response->setScreenMessage('' . substr($components[$i], 2));
            }
            // Extract print line
            elseif (substr($components[$i], 0, 2) === 'AG') {
                $response->setPrintLine('' . substr($components[$i], 2));
            }
            $i++;
        }

        $data['Fee Paid Response']['Payment Accepted'] = $response->isPaymentAccepted();
        $data['Fee Paid Response']['Transaction Date'] = $response->getTransactionDate();
        $data['Fee Paid Response']['Institution ID'] = $response->getInstitutionId();
        $data['Fee Paid Response']['Patron Identifier'] = $response->getPatronIdentifier();
        $data['Fee Paid Response']['Transaction ID'] = $response->getTransactionId();
        $data['Fee Paid Response']['Screen Message'] = $response->getScreenMessage();
        $data['Fee Paid Response']['Print Line'] = $response->getPrintLine();

    } else {
        echo "Invalid message format\n";
    }
    return $data;
}

<?php
function applyChecksum($strMsg) {
        $intAscSum = 0;

        // Transfer SIP message to an array of characters.
        $chrArray = str_split($strMsg);

        foreach ($chrArray as $char) {
            $intAscSum += ord($char);
        }

        $strBinVal = '';
        do {
            $strBinVal = ($intAscSum % 2) . $strBinVal;
            $intAscSum = (int)($intAscSum / 2);
        } while ($intAscSum > 0);

        $strBinVal = str_pad($strBinVal, 16, '0', STR_PAD_LEFT);

        $chrArray = str_split($strBinVal);
        $strInvBinVal = '';

        foreach ($chrArray as $char) {
            $strInvBinVal .= ($char === '0') ? '1' : '0';
        }

        $blnCarryBit = true;
        $chrArray = str_split($strInvBinVal);
        $strNewBinVal = '';

        for ($i = count($chrArray) - 1; $i >= 0; $i--) {
            if ($blnCarryBit === true) {
                if ($chrArray[$i] === '0') {
                    $chrArray[$i] = '1';
                    $blnCarryBit = false;
                } else {
                    $chrArray[$i] = '0';
                    $blnCarryBit = true;
                }
            }
            $strNewBinVal = $chrArray[$i] . $strNewBinVal;
        }

        return $strMsg . strtoupper(dechex(bindec($strNewBinVal)));
}
?>

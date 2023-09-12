<?php

class RenewAllResponse {

    private $ok;
    private $renewedCount;
    private $unrenewedCount;
    private $transactionDate;
    private $institutionId;
    private $screenMessage;
    private $printLine;

    public function __construct() {
        $this->ok = '0';
        $this->renewedCount = '0000';
        $this->unrenewedCount = '0000';
        $this->transactionDate = (new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh')))->format('Ymd    his');
        $this->institutionId = '';
    }

    public function isOk() {
        return $this->ok;
    }

    public function setOk($ok) {
        $this->ok = $ok;
    }

    public function getRenewedCount() {
        return $this->renewedCount;
    }

    public function setRenewedCount($renewedCount) {
        $this->renewedCount = $renewedCount;
    }

    public function getUnrenewedCount() {
        return $this->unrenewedCount;
    }

    public function setUnrenewedCount($unrenewedCount) {
        $this->unrenewedCount = $unrenewedCount;
    }

    public function getTransactionDate() {
        return $this->transactionDate;
    }

    public function setTransactionDate($transactionDate) {
        $this->transactionDate = $transactionDate;
    }

    public function getInstitutionId() {
        return $this->institutionId;
    }

    public function setInstitutionId($institutionId) {
        $this->institutionId = $institutionId;
    }

    public function getScreenMessage() {
        return $this->screenMessage;
    }

    public function setScreenMessage($screenMessage) {
        $this->screenMessage = $screenMessage;
    }

    public function getPrintLine() {
        return $this->printLine;
    }

    public function setPrintLine($printLine) {
        $this->printLine = $printLine;
    }

    public function build(): string
    {
        $response = '66' . $this->ok . $this->renewedCount . $this->unrenewedCount . $this->transactionDate . 'AO' . $this->institutionId . '|';
        $optional = false;
        $optionalIdArray = ['BM', 'BN', 'AF', 'AG'];
        $index = 0;
        foreach ($this as $key => $value) {
            if ($key == 'renewedItems') {
                $optional = true;
            }
            if ($optional) {
                if ($value != '') {
                    if ($index > -1 && $index < 2) {
                        foreach ($value as $item) {
                            $response .= $optionalIdArray[$index] . $item . '|';
                        }
                    } else {
                        $response .= $optionalIdArray[$index] . $value . '|';
                    }
                }
            }
        }
        return $response;
    }
}

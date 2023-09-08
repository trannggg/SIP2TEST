<?php
class EndSessionResponse {
    private $endSession;
    private $transactionDate;
    private $institutionId;
    private $patronIdentifier;
    private $screenMessage;
    private $printLine;

    public function isEndSession() {
        return $this->endSession;
    }

    public function setEndSession($endSession) {
        $this->endSession = $endSession;
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

    public function getPatronIdentifier() {
        return $this->patronIdentifier;
    }

    public function setPatronIdentifier($patronIdentifier) {
        $this->patronIdentifier = $patronIdentifier;
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
}

?>
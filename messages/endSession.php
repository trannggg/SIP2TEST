<?php

class EndSession {
    private $transactionDate;
    private $institutionId;
    private $patronIdentifier;
    private $terminalPassword;
    private $patronPassword;

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

    public function getTerminalPassword() {
        return $this->terminalPassword;
    }

    public function setTerminalPassword($terminalPassword) {
        $this->terminalPassword = $terminalPassword;
    }

    public function getPatronPassword() {
        return $this->patronPassword;
    }

    public function setPatronPassword($patronPassword) {
        $this->patronPassword = $patronPassword;
    }
}

?>

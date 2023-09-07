<?php
class ItemInformation {
    private $transactionDate;
    private $institutionId;
    private $itemIdentifier;
    private $terminalPassword;

    public function getInstitutionId() {
        return $this->institutionId;
    }

    public function getItemIdentifier() {
        return $this->itemIdentifier;
    }

    public function getTerminalPassword() {
        return $this->terminalPassword;
    }

    public function getTransactionDate() {
        return $this->transactionDate;
    }

    public function setTransactionDate($transactionDate) {
        $this->transactionDate = $transactionDate;
    }

    public function setTerminalPassword($terminalPassword) {
        $this->terminalPassword = $terminalPassword;
    }

    public function setItemIdentifier($itemIdentifier) {
        $this->itemIdentifier = $itemIdentifier;
    }

    public function setInstitutionId($institutionId) {
        $this->institutionId = $institutionId;
    }
}
<?php

class patronStatusResponse {
    public $testCaseDefault = "24              00019700101    010000AA|AE|AO|";

    private $patronStatus;
    private $language;
    private $transactionDate;
    private $institutionId;
    private $patronIdentifier;
    private $personalName;
    private $validPatron;
    private $validPatronPassword;
    private $currencyType;
    private $feeAmount;
    private $screenMessage;
    private $printLine;

    public function getCurrencyType() {
        return $this->currencyType;
    }

    public function getFeeAmount() {
        return $this->feeAmount;
    }

    public function getInstitutionId() {
        return $this->institutionId;
    }

    public function getLanguage() {
        return $this->language;
    }

    public function getPrintLine() {
        return $this->printLine;
    }

    public function getPatronIdentifier() {
        return $this->patronIdentifier;
    }

    public function getPatronStatus() {
        return $this->patronStatus;
    }

    public function getPersonalName() {
        return $this->personalName;
    }

    public function getScreenMessage() {
        return $this->screenMessage;
    }

    public function getTransactionDate() {
        return $this->transactionDate;
    }

    public function isValidPatron() {
        return $this->validPatron;
    }

    public function isValidPatronPassword() {
        return $this->validPatronPassword;
    }

    public function setValidPatronPassword($validPatronPassword) {
        $this->validPatronPassword = $validPatronPassword;
    }

    public function setValidPatron($validPatron) {
        $this->validPatron = $validPatron;
    }

    public function setTransactionDate($transactionDate) {
        $this->transactionDate = $transactionDate;
    }

    public function setScreenMessage($screenMessage) {
        $this->screenMessage = $screenMessage;
    }

    public function setPrintLine($printLine) {
        $this->printLine = $printLine;
    }

    public function setPersonalName($personalName) {
        $this->personalName = $personalName;
    }

    public function setPatronStatus($patronStatus) {
        $this->patronStatus = $patronStatus;
    }

    public function setPatronIdentifier($patronIdentifier) {
        $this->patronIdentifier = $patronIdentifier;
    }

    public function setLanguage($language) {
        $this->language = $language;
    }

    public function setInstitutionId($institutionId) {
        $this->institutionId = $institutionId;
    }

    public function setFeeAmount($feeAmount) {
        $this->feeAmount = $feeAmount;
    }

    public function setCurrencyType($currencyType) {
        $this->currencyType = $currencyType;
    }
}

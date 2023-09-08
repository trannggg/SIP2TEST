<?php
class RenewResponse {
    private $ok;
    private $renewalOk;
    private $magneticMedia;
    private $desensitize;
    private $transactionDate;
    private $institutionId;
    private $patronIdentifier;
    private $itemIdentifier;
    private $titleIdentifier;
    private $dueDate;
    private $feeType;
    private $securityInhibit;
    private $currencyType;
    private $feeAmount;
    private $mediaType;
    private $itemProperties;
    private $transactionId;
    private $screenMessage;
    private $printLine;

    public function isOk() {
        return $this->ok;
    }

    public function setOk($ok) {
        $this->ok = $ok;
    }

    public function isRenewalOk() {
        return $this->renewalOk;
    }

    public function setRenewalOk($renewalOk) {
        $this->renewalOk = $renewalOk;
    }

    public function isMagneticMedia() {
        return $this->magneticMedia;
    }

    public function setMagneticMedia($magneticMedia) {
        $this->magneticMedia = $magneticMedia;
    }

    public function isDesensitize() {
        return $this->desensitize;
    }

    public function setDesensitize($desensitize) {
        $this->desensitize = $desensitize;
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

    public function getItemIdentifier() {
        return $this->itemIdentifier;
    }

    public function setItemIdentifier($itemIdentifier) {
        $this->itemIdentifier = $itemIdentifier;
    }

    public function getTitleIdentifier() {
        return $this->titleIdentifier;
    }

    public function setTitleIdentifier($titleIdentifier) {
        $this->titleIdentifier = $titleIdentifier;
    }

    public function getDueDate() {
        return $this->dueDate;
    }

    public function setDueDate($dueDate) {
        $this->dueDate = $dueDate;
    }

    public function getFeeType() {
        return $this->feeType;
    }

    public function setFeeType($feeType) {
        $this->feeType = $feeType;
    }

    public function isSecurityInhibit() {
        return $this->securityInhibit;
    }

    public function setSecurityInhibit($securityInhibit) {
        $this->securityInhibit = $securityInhibit;
    }

    public function getCurrencyType() {
        return $this->currencyType;
    }

    public function setCurrencyType($currencyType) {
        $this->currencyType = $currencyType;
    }

    public function getFeeAmount() {
        return $this->feeAmount;
    }

    public function setFeeAmount($feeAmount) {
        $this->feeAmount = $feeAmount;
    }

    public function getMediaType() {
        return $this->mediaType;
    }

    public function setMediaType($mediaType) {
        $this->mediaType = $mediaType;
    }

    public function getItemProperties() {
        return $this->itemProperties;
    }

    public function setItemProperties($itemProperties) {
        $this->itemProperties = $itemProperties;
    }

    public function getTransactionId() {
        return $this->transactionId;
    }

    public function setTransactionId($transactionId) {
        $this->transactionId = $transactionId;
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
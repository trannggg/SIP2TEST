<?php
class ItemInformationResponse {
    private $circulationStatus;
    private $securityMarker;
    private $feeType;
    private $transactionDate;
    private $holdQueueLength;
    private $dueDate;
    private $recallDate;
    private $holdPickupDate;
    private $itemIdentifier;
    private $titleIdentifier;
    private $owner;
    private $currencyType;
    private $feeAmount;
    private $mediaType;
    private $permanentLocation;
    private $currentLocation;
    private $itemProperties;
    private $screenMessage;
    private $printLine;

    public function getCirculationStatus() {
        return $this->circulationStatus;
    }

    public function getCurrencyType() {
        return $this->currencyType;
    }

    public function getCurrentLocation() {
        return $this->currentLocation;
    }

    public function getDueDate() {
        return $this->dueDate;
    }

    public function getFeeAmount() {
        return $this->feeAmount;
    }

    public function getFeeType() {
        return $this->feeType;
    }

    public function getHoldPickupDate() {
        return $this->holdPickupDate;
    }

    public function getHoldQueueLength() {
        return $this->holdQueueLength;
    }

    public function getItemIdentifier() {
        return $this->itemIdentifier;
    }

    public function getItemProperties() {
        return $this->itemProperties;
    }

    public function getMediaType() {
        return $this->mediaType;
    }

    public function getOwner() {
        return $this->owner;
    }

    public function getPermanentLocation() {
        return $this->permanentLocation;
    }

    public function getPrintLine() {
        return $this->printLine;
    }

    public function getRecallDate() {
        return $this->recallDate;
    }

    public function getScreenMessage() {
        return $this->screenMessage;
    }

    public function getSecurityMarker() {
        return $this->securityMarker;
    }

    public function getTitleIdentifier() {
        return $this->titleIdentifier;
    }

    public function getTransactionDate() {
        return $this->transactionDate;
    }

    public function setTransactionDate($transactionDate) {
        $this->transactionDate = $transactionDate;
    }

    public function setTitleIdentifier($titleIdentifier) {
        $this->titleIdentifier = $titleIdentifier;
    }

    public function setSecurityMarker($securityMarker) {
        $this->securityMarker = $securityMarker;
    }

    public function setScreenMessage($screenMessage) {
        $this->screenMessage = $screenMessage;
    }

    public function setRecallDate($recallDate) {
        $this->recallDate = $recallDate;
    }

    public function setPrintLine($printLine) {
        $this->printLine = $printLine;
    }

    public function setPermanentLocation($permanentLocation) {
        $this->permanentLocation = $permanentLocation;
    }

    public function setOwner($owner) {
        $this->owner = $owner;
    }

    public function setMediaType($mediaType) {
        $this->mediaType = $mediaType;
    }

    public function setItemProperties($itemProperties) {
        $this->itemProperties = $itemProperties;
    }

    public function setItemIdentifier($itemIdentifier) {
        $this->itemIdentifier = $itemIdentifier;
    }

    public function setHoldQueueLength($holdQueueLength) {
        $this->holdQueueLength = $holdQueueLength;
    }

    public function setHoldPickupDate($holdPickupDate) {
        $this->holdPickupDate = $holdPickupDate;
    }

    public function setFeeType($feeType) {
        $this->feeType = $feeType;
    }

    public function setFeeAmount($feeAmount) {
        $this->feeAmount = $feeAmount;
    }

    public function setDueDate($dueDate) {
        $this->dueDate = $dueDate;
    }

    public function setCurrentLocation($currentLocation) {
        $this->currentLocation = $currentLocation;
    }

    public function setCurrencyType($currencyType) {
        $this->currencyType = $currencyType;
    }

    public function setCirculationStatus($circulationStatus) {
        $this->circulationStatus = $circulationStatus;
    }
}

?>
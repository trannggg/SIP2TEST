<?php

class PatronInformationResponse
{
    private $patronStatus;
    private $language;
    private $transactionDate;
    private $holdItemsCount;
    private $overdueItemsCount;
    private $chargedItemsCount;
    private $fineItemsCount;
    private $recallItemsCount;
    private $unavailableHoldsCount;
    private $institutionId;
    private $patronIdentifier;
    private $personalName;
    private $holdItemsLimit;
    private $overdueItemsLimit;
    private $chargedItemsLimit;
    private $validPatron;
    private $validPatronPassword;
    private $currencyType;
    private $feeAmount;
    private $feeLimit;
    private $holdItems;
    private $overdueItems;
    private $chargedItems;
    private $fineItems;
    private $recallItems;
    private $unavailableHoldItems;
    private $homeAddress;
    private $emailAddress;
    private $homePhoneNumber;
    private $screenMessage;
    private $printLine;

    public function getChargedItems()
    {
        return $this->chargedItems;
    }

    public function getChargedItemsCount()
    {
        return $this->chargedItemsCount;
    }

    public function getChargedItemsLimit()
    {
        return $this->chargedItemsLimit;
    }

    public function getCurrencyType()
    {
        return $this->currencyType;
    }

    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    public function getFeeAmount()
    {
        return $this->feeAmount;
    }

    public function getFeeLimit()
    {
        return $this->feeLimit;
    }

    public function getFineItems()
    {
        return $this->fineItems;
    }

    public function getFineItemsCount()
    {
        return $this->fineItemsCount;
    }

    public function getHoldItems()
    {
        return $this->holdItems;
    }

    public function getHoldItemsCount()
    {
        return $this->holdItemsCount;
    }

    public function getHoldItemsLimit()
    {
        return $this->holdItemsLimit;
    }

    public function getHomeAddress()
    {
        return $this->homeAddress;
    }

    public function getHomePhoneNumber()
    {
        return $this->homePhoneNumber;
    }

    public function getInstitutionId()
    {
        return $this->institutionId;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function getOverdueItems()
    {
        return $this->overdueItems;
    }

    public function getOverdueItemsCount()
    {
        return $this->overdueItemsCount;
    }

    public function getOverdueItemsLimit()
    {
        return $this->overdueItemsLimit;
    }

    public function getPatronIdentifier()
    {
        return $this->patronIdentifier;
    }

    public function getPatronStatus()
    {
        return $this->patronStatus;
    }

    public function getPersonalName()
    {
        return $this->personalName;
    }

    public function getPrintLine()
    {
        return $this->printLine;
    }

    public function getRecallItems()
    {
        return $this->recallItems;
    }

    public function getRecallItemsCount()
    {
        return $this->recallItemsCount;
    }

    public function getScreenMessage()
    {
        return $this->screenMessage;
    }

    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    public function getUnavailableHoldsCount()
    {
        return $this->unavailableHoldsCount;
    }

    public function getUnavailableHoldItems()
    {
        return $this->unavailableHoldItems;
    }

    public function isValidPatron()
    {
        return $this->validPatron;
    }

    public function isValidPatronPassword()
    {
        return $this->validPatronPassword;
    }

    public function setValidPatronPassword($validPatronPassword)
    {
        $this->validPatronPassword = $validPatronPassword;
    }

    public function setValidPatron($validPatron)
    {
        $this->validPatron = $validPatron;
    }

    public function setUnavailableHoldItems($unavailableHoldItems)
    {
        $this->unavailableHoldItems = $unavailableHoldItems;
    }

    public function setUnavailableHoldsCount($unavailableHoldsCount)
    {
        $this->unavailableHoldsCount = $unavailableHoldsCount;
    }

    public function setTransactionDate($transactionDate)
    {
        $this->transactionDate = $transactionDate;
    }

    public function setScreenMessage($screenMessage)
    {
        $this->screenMessage = $screenMessage;
    }

    public function setRecallItemsCount($recallItemsCount)
    {
        $this->recallItemsCount = $recallItemsCount;
    }

    public function setRecallItems($recallItems)
    {
        $this->recallItems = $recallItems;
    }

    public function setPrintLine($printLine)
    {
        $this->printLine = $printLine;
    }

    public function setPersonalName($personalName)
    {
        $this->personalName = $personalName;
    }

    public function setPatronStatus($patronStatus)
    {
        $this->patronStatus = $patronStatus;
    }

    public function setPatronIdentifier($patronIdentifier)
    {
        $this->patronIdentifier = $patronIdentifier;
    }

    public function setOverdueItemsLimit($overdueItemsLimit)
    {
        $this->overdueItemsLimit = $overdueItemsLimit;
    }

    public function setOverdueItemsCount($overdueItemsCount)
    {
        $this->overdueItemsCount = $overdueItemsCount;
    }

    public function setOverdueItems($overdueItems)
    {
        $this->overdueItems = $overdueItems;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function setInstitutionId($institutionId)
    {
        $this->institutionId = $institutionId;
    }

    public function setHomePhoneNumber($homePhoneNumber)
    {
        $this->homePhoneNumber = $homePhoneNumber;
    }

    public function setHomeAddress($homeAddress)
    {
        $this->homeAddress = $homeAddress;
    }

    public function setHoldItemsLimit($holdItemsLimit)
    {
        $this->holdItemsLimit = $holdItemsLimit;
    }

    public function setHoldItemsCount($holdItemsCount)
    {
        $this->holdItemsCount = $holdItemsCount;
    }

    public function setHoldItems($holdItems)
    {
        $this->holdItems = $holdItems;
    }

    public function setFineItemsCount($fineItemsCount)
    {
        $this->fineItemsCount = $fineItemsCount;
    }

    public function setFineItems($fineItems)
    {
        $this->fineItems = $fineItems;
    }

    public function setFeeLimit($feeLimit)
    {
        $this->feeLimit = $feeLimit;
    }

    public function setFeeAmount($feeAmount)
    {
        $this->feeAmount = $feeAmount;
    }

    public function setChargedItems($chargedItems)
    {
        $this->chargedItems = $chargedItems;
    }

    public function setChargedItemsCount($chargedItemsCount)
    {
        $this->chargedItemsCount = $chargedItemsCount;
    }

    public function setChargedItemsLimit($chargedItemsLimit)
    {
        $this->chargedItemsLimit = $chargedItemsLimit;
    }

    public function setCurrencyType($currencyType)
    {
        $this->currencyType = $currencyType;
    }

    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }
}

?>

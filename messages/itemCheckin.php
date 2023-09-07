<?php
class itemCheckin
{
    private $noBlock;
    private $transactionDate;
    private $returnDate;
    
    /**
     * @TaggedField(FieldPolicy.REQUIRED)
     */
    private $currentLocation;
    
    /**
     * @TaggedField
     */
    private $institutionId;
    
    /**
     * @TaggedField(FieldPolicy.REQUIRED)
     */
    private $itemIdentifier;
    
    /**
     * @TaggedField(FieldPolicy.REQUIRED)
     */
    private $terminalPassword;
    
    /**
     * @TaggedField(FieldPolicy.NOT_REQUIRED)
     */
    private $itemProperties;
    
    /**
     * @TaggedField
     */
    private $cancel;

    public function isCancel()
    {
        return $this->cancel;
    }

    public function getCurrentLocation()
    {
        return $this->currentLocation;
    }

    public function getInstitutionId()
    {
        return $this->institutionId;
    }

    public function getItemIdentifier()
    {
        return $this->itemIdentifier;
    }

    public function getItemProperties()
    {
        return $this->itemProperties;
    }

    public function isNoBlock()
    {
        return $this->noBlock;
    }

    public function getReturnDate()
    {
        return $this->returnDate;
    }

    public function getTerminalPassword()
    {
        return $this->terminalPassword;
    }

    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    public function setTransactionDate($transactionDate)
    {
        $this->transactionDate = $transactionDate;
    }

    public function setTerminalPassword($terminalPassword)
    {
        $this->terminalPassword = $terminalPassword;
    }

    public function setReturnDate($returnDate)
    {
        $this->returnDate = $returnDate;
    }

    public function setNoBlock($noBlock)
    {
        $this->noBlock = $noBlock;
    }

    public function setItemProperties($itemProperties)
    {
        $this->itemProperties = $itemProperties;
    }

    public function setItemIdentifier($itemIdentifier)
    {
        $this->itemIdentifier = $itemIdentifier;
    }

    public function setInstitutionId($institutionId)
    {
        $this->institutionId = $institutionId;
    }

    public function setCurrentLocation($currentLocation)
    {
        $this->currentLocation = $currentLocation;
    }

    public function setCancel($cancel)
    {
        $this->cancel = $cancel;
    }
}

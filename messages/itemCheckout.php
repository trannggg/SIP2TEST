<?php
class ItemCheckout
{
    private $SCRenewalPolicy;
    private $noBlock;
    private $transactionDate;
    private $nbDueDate;
    
    /**
     * @TaggedField
     */
    private $institutionId;
    
    /**
     * @TaggedField(FieldPolicy.REQUIRED)
     */
    private $patronIdentifier;
    
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
     * @TaggedField(FieldPolicy.NOT_REQUIRED)
     */
    private $patronPassword;
    
    /**
     * @TaggedField
     */
    private $feeAcknowledged;
    
    /**
     * @TaggedField
     */
    private $cancel;

    public function isCancel()
    {
        return $this->cancel;
    }

    public function isFeeAcknowledged()
    {
        return $this->feeAcknowledged;
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

    public function getNbDueDate()
    {
        return $this->nbDueDate;
    }

    public function isNoBlock()
    {
        return $this->noBlock;
    }

    public function getPatronIdentifier()
    {
        return $this->patronIdentifier;
    }

    public function getPatronPassword()
    {
        return $this->patronPassword;
    }

    public function isSCRenewalPolicy()
    {
        return $this->SCRenewalPolicy;
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

    public function setSCRenewalPolicy($SCRenewalPolicy)
    {
        $this->SCRenewalPolicy = $SCRenewalPolicy;
    }

    public function setPatronPassword($patronPassword)
    {
        $this->patronPassword = $patronPassword;
    }

    public function setPatronIdentifier($patronIdentifier)
    {
        $this->patronIdentifier = $patronIdentifier;
    }

    public function setNoBlock($noBlock)
    {
        $this->noBlock = $noBlock;
    }

    public function setNbDueDate($nbDueDate)
    {
        $this->nbDueDate = $nbDueDate;
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

    public function setFeeAcknowledged($feeAcknowledged)
    {
        $this->feeAcknowledged = $feeAcknowledged;
    }

    public function setCancel($cancel)
    {
        $this->cancel = $cancel;
    }
}

<?php
class FeePaid
{
    private $transactionDate;
    
    /**
     * @PositionedField(start = 2, end = 19)
     */
    private $feeType;
    
    /**
     * @PositionedField(start = 20, end = 21, policy = FieldPolicy.REQUIRED)
     */
    private $paymentType;
    
    /**
     * @PositionedField(start = 22, end = 23)
     */
    private $currencyType;
    
    /**
     * @TaggedField(FieldPolicy.REQUIRED)
     */
    private $feeAmount;
    
    /**
     * @TaggedField
     */
    private $institutionId;
    
    /**
     * @TaggedField(FieldPolicy.REQUIRED)
     */
    private $patronIdentifier;
    
    /**
     * @TaggedField(FieldPolicy.NOT_REQUIRED)
     */
    private $terminalPassword;
    
    /**
     * @TaggedField(FieldPolicy.NOT_REQUIRED)
     */
    private $patronPassword;
    
    /**
     * @TaggedField
     */
    private $feeIdentifier;
    
    /**
     * @TaggedField
     */
    private $transactionId;

    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    public function setTransactionDate($transactionDate)
    {
        $this->transactionDate = $transactionDate;
    }

    public function getFeeType()
    {
        return $this->feeType;
    }

    public function setFeeType($feeType)
    {
        $this->feeType = $feeType;
    }

    public function getPaymentType()
    {
        return $this->paymentType;
    }

    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;
    }

    public function getCurrencyType()
    {
        return $this->currencyType;
    }

    public function setCurrencyType($currencyType)
    {
        $this->currencyType = $currencyType;
    }

    public function getFeeAmount()
    {
        return $this->feeAmount;
    }

    public function setFeeAmount($feeAmount)
    {
        $this->feeAmount = $feeAmount;
    }

    public function getInstitutionId()
    {
        return $this->institutionId;
    }

    public function setInstitutionId($institutionId)
    {
        $this->institutionId = $institutionId;
    }

    public function getPatronIdentifier()
    {
        return $this->patronIdentifier;
    }

    public function setPatronIdentifier($patronIdentifier)
    {
        $this->patronIdentifier = $patronIdentifier;
    }

    public function getTerminalPassword()
    {
        return $this->terminalPassword;
    }

    public function setTerminalPassword($terminalPassword)
    {
        $this->terminalPassword = $terminalPassword;
    }

    public function getPatronPassword()
    {
        return $this->patronPassword;
    }

    public function setPatronPassword($patronPassword)
    {
        $this->patronPassword = $patronPassword;
    }

    public function getFeeIdentifier()
    {
        return $this->feeIdentifier;
    }

    public function setFeeIdentifier($feeIdentifier)
    {
        $this->feeIdentifier = $feeIdentifier;
    }

    public function getTransactionId()
    {
        return $this->transactionId;
    }

    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    }
}

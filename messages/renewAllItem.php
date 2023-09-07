<?php
    /**
     * @Command("65")
     * @TestCaseDefault("6519700101    010000AA|AO|")
     * @TestCasePopulated("6519700101    010000AApatronIdentifier|ACterminalPassword|ADpatronPassword|AOinstitutionId|BOY|")
     */
class renewAllItem
{
    private static $serialVersionUID = -7106820916482094784;

    /**
     * @PositionedField(start = 2, end = 19)
     */
    private $transactionDate;

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
    private $patronPassword;

    /**
     * @TaggedField(FieldPolicy.NOT_REQUIRED)
     */
    private $terminalPassword;

    /**
     * @TaggedField
     */
    private $feeAcknowledged;

    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    public function setTransactionDate($transactionDate)
    {
        $this->transactionDate = $transactionDate;
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

    public function getPatronPassword()
    {
        return $this->patronPassword;
    }

    public function setPatronPassword($patronPassword)
    {
        $this->patronPassword = $patronPassword;
    }

    public function getTerminalPassword()
    {
        return $this->terminalPassword;
    }

    public function setTerminalPassword($terminalPassword)
    {
        $this->terminalPassword = $terminalPassword;
    }

    public function isFeeAcknowledged()
    {
        return $this->feeAcknowledged;
    }

    public function setFeeAcknowledged($feeAcknowledged)
    {
        $this->feeAcknowledged = $feeAcknowledged;
    }
}
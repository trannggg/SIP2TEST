<?php
    /**
     * @Command("29")
     * @TestCaseDefault("29NN19700101    010000                  AA|AO|")
     * @TestCasePopulated("29YY19700101    01000019700101    010000AApatronIdentifier|ABitemIdentifier|ACterminalPassword|ADpatronPassword|AJtitleIdentifier|AOinstitutionId|BOY|CHitemProperties|")
     */
class renewItem
{
    private static $serialVersionUID = 158409818027250051;

    /**
     * @PositionedField(start = 2, end = 2)
     */
    private $thirdPartyAllowed;

    /**
     * @PositionedField(start = 3, end = 3)
     */
    private $noBlock;

    /**
     * @PositionedField(start = 4, end = 21)
     */
    private $transactionDate;

    /**
     * @PositionedField(start = 22, end = 39)
     */
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
     * @TaggedField(FieldPolicy.NOT_REQUIRED)
     */
    private $patronPassword;

    /**
     * @TaggedField(FieldPolicy.NOT_REQUIRED)
     */
    private $itemIdentifier;

    /**
     * @TaggedField(FieldPolicy.NOT_REQUIRED)
     */
    private $titleIdentifier;

    /**
     * @TaggedField(FieldPolicy.NOT_REQUIRED)
     */
    private $terminalPassword;

    /**
     * @TaggedField(FieldPolicy.NOT_REQUIRED)
     */
    private $itemProperties;

    /**
     * @TaggedField
     */
    private $feeAcknowledged;

    public function isThirdPartyAllowed()
    {
        return $this->thirdPartyAllowed;
    }

    public function setThirdPartyAllowed($thirdPartyAllowed)
    {
        $this->thirdPartyAllowed = $thirdPartyAllowed;
    }

    public function isNoBlock()
    {
        return $this->noBlock;
    }

    public function setNoBlock($noBlock)
    {
        $this->noBlock = $noBlock;
    }

    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    public function setTransactionDate($transactionDate)
    {
        $this->transactionDate = $transactionDate;
    }

    public function getNbDueDate()
    {
        return $this->nbDueDate;
    }

    public function setNbDueDate($nbDueDate)
    {
        $this->nbDueDate = $nbDueDate;
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

    public function getItemIdentifier()
    {
        return $this->itemIdentifier;
    }

    public function setItemIdentifier($itemIdentifier)
    {
        $this->itemIdentifier = $itemIdentifier;
    }

    public function getTitleIdentifier()
    {
        return $this->titleIdentifier;
    }

    public function setTitleIdentifier($titleIdentifier)
    {
        $this->titleIdentifier = $titleIdentifier;
    }

    public function getTerminalPassword()
    {
        return $this->terminalPassword;
    }

    public function setTerminalPassword($terminalPassword)
    {
        $this->terminalPassword = $terminalPassword;
    }

    public function getItemProperties()
    {
        return $this->itemProperties;
    }

    public function setItemProperties($itemProperties)
    {
        $this->itemProperties = $itemProperties;
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
<?php
/**
 * @Command("23")
 * @TestCaseDefault("2300019700101    010000AA|AC|AD|AO|")
 * @TestCasePopulated("2302719700101    010000AApatronIdentifier|ACterminalPassword|ADpatronPassword|-|")
 */
class patronStatus
{
    /**
     * @PositionedField(start = 2, end = 4)
     */
    private $language;

    /**
     * @PositionedField(start = 5, end = 22)
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
     * @TaggedField(FieldPolicy.REQUIRED)
     */
    private $terminalPassword;

    /**
     * @TaggedField(FieldPolicy.REQUIRED)
     */
    private $patronPassword;

    public function getInstitutionId()
    {
        return $this->institutionId;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function getPatronIdentifier()
    {
        return $this->patronIdentifier;
    }

    public function getPatronPassword()
    {
        return $this->patronPassword;
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

    public function setPatronPassword($patronPassword)
    {
        $this->patronPassword = $patronPassword;
    }

    public function setPatronIdentifier($patronIdentifier)
    {
        $this->patronIdentifier = $patronIdentifier;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function setInstitutionId($institutionId)
    {
        $this->institutionId = $institutionId;
    }
}
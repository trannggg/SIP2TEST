<?php


class patronInformation
{
    private $language;
    private $transactionDate;
    private $summary;
    private $institutionId;
    private $patronIdentifier;
    private $terminalPassword;
    private $patronPassword;
    private $startItem;
    private $endItem;

    public function getEndItem()
    {
        return $this->endItem;
    }

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

    public function getStartItem()
    {
        return $this->startItem;
    }

    public function getSummary()
    {
        return $this->summary;
    }

    public function getTerminalPassword()
    {
        return $this->terminalPassword;
    }

    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    public function setTransactionDate( $transactionDate)
    {
        $this->transactionDate = $transactionDate;
    }

    public function setTerminalPassword($terminalPassword)
    {
        $this->terminalPassword = $terminalPassword;
    }

    /**
     * Use getSummary()->set(Summary::FIELD) getSummary()->unset(Summary::FIELD)
     * getSummary()->unsetAll()
     *
     * @param $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    public function setStartItem($startItem)
    {
        $this->startItem = $startItem;
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

    public function setEndItem($endItem)
    {
        $this->endItem = $endItem;
    }
}

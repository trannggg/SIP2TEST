<?php

class PatronEnableResponse
{
    private $patronStatus;
    private $language;
    private $transactionDate;
    private $institutionId;
    private $patronIdentifier;
    private $personalName;
    private $validPatronPassword;
    private $screenMessage;
    private $printLine;
    private $validPatron;

    public function __construct()
    {
        $this->patronStatus = '              ';
        $this->language - '000';
        $this->transactionDate = (new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh')))->format('Ymd    his');
        $this->institutionId = '';
        $this->patronIdentifier = '';
        $this->personalName = '';
    }

    public function getPatronStatus()
    {
        return $this->patronStatus;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

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

    public function getPersonalName()
    {
        return $this->personalName;
    }

    public function setPersonalName($personalName)
    {
        $this->personalName = $personalName;
    }

    public function isValidPatron()
    {
        return $this->validPatron;
    }

    public function setValidPatron($validPatron)
    {
        $this->validPatron = $validPatron;
    }

    public function isValidPatronPassword()
    {
        return $this->validPatronPassword;
    }

    public function setValidPatronPassword($validPatronPassword)
    {
        $this->validPatronPassword = $validPatronPassword;
    }

    public function getScreenMessage()
    {
        return $this->screenMessage;
    }

    public function setScreenMessage($screenMessage)
    {
        $this->screenMessage = $screenMessage;
    }

    public function getPrintLine()
    {
        return $this->printLine;
    }

    public function setPrintLine($printLine)
    {
        $this->printLine = $printLine;
    }

    public function build(): string
    {
        $response = '26' . $this->patronStatus . $this->language . $this->transactionDate . 'AO' . $this->institutionId . '|' . 'AA' . $this->patronIdentifier . '|' . 'AE' . $this->personalName . '|';
        $optional = false;
        $optionalIdArray = ['BL', 'CQ', 'AF', 'AG'];
        $index = 0;
        foreach ($this as $key => $value) {
            if ($key == 'validPatron') {
                $optional = true;
            }
            if ($optional) {
                if ($value != '') {
                    $response .= $optionalIdArray[$index] . $value . '|';
                }
            }
        }
        return $response;
    }
}

<?php
class FeePaidResponse 
{
    private $paymentAccepted;
    private $transactionDate;
    private $institutionId;
    private $patronIdentifier;
    private $transactionId;
    private $screenMessage;
    private $printLine;

    public function isPaymentAccepted()
    {
        return $this->paymentAccepted;
    }

    public function setPaymentAccepted($paymentAccepted)
    {
        $this->paymentAccepted = $paymentAccepted;
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

    public function getTransactionId()
    {
        return $this->transactionId;
    }

    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
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
}
?>

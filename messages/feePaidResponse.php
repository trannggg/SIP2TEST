<?php
class feePaidResponse
{
    private $paymentAccepted;
    private $transactionDate;
    private $institutionId;
    private $patronIdentifier;
    private $transactionId;
    private $screenMessage;
    private $printLine;

    public function __construct()
    {
        $this->paymentAccepted = 'N';
        $this->transactionDate = (new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh')))->format('Ymd    his');
        $this->institutionId = '';
        $this->patronIdentifier = '';
    }

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

    public function build(): string
    {
        $response = '38' . $this->paymentAccepted . $this->transactionDate . 'AO' . $this->institutionId . '|' . 'AA' . $this->patronIdentifier . '|';
        $optional = false;
        $optionalIdArray = ['BK', 'AF', 'AG'];
        $index = 0;
        foreach ($this as $key => $value) {
            if ($key == 'transactionId') {
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

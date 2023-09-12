<?php

class HoldResponse
{

    private $ok;
    private $available;
    private $transactionDate;
    private $expirationDate;
    private $queuePosition;
    private $pickupLocation;
    private $institutionId;
    private $patronIdentifier;
    private $itemIdentifier;
    private $titleIdentifier;
    private $screenMessage;
    private $printLine;

    public function __construct()
    {
        $this->ok = '0';
        $this->available = 'N';
        $this->transactionDate = (new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh')))->format('Ymd    his');
        $this->institutionId = '';
        $this->patronIdentifier = '';
    }

    public function isOk()
    {
        return $this->ok;
    }

    public function setOk($ok)
    {
        $this->ok = $ok;
    }

    public function isAvailable()
    {
        return $this->available;
    }

    public function setAvailable($available)
    {
        $this->available = $available;
    }

    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    public function setTransactionDate($transactionDate)
    {
        $this->transactionDate = $transactionDate;
    }

    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
    }

    public function getQueuePosition()
    {
        return $this->queuePosition;
    }

    public function setQueuePosition($queuePosition)
    {
        $this->queuePosition = $queuePosition;
    }

    public function getPickupLocation()
    {
        return $this->pickupLocation;
    }

    public function setPickupLocation($pickupLocation)
    {
        $this->pickupLocation = $pickupLocation;
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
        $response = '16' . $this->ok . $this->available . $this->transactionDate . 'AO' . $this->institutionId . '|' . 'AA' . $this->patronIdentifier . '|';
        $optional = false;
        $optionalIdArray = ['BW', 'BR', 'BS', 'AB', 'AJ', 'AF', 'AG'];
        $index = 0;
        foreach ($this as $key => $value) {
            if ($key == 'expirationDate') {
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

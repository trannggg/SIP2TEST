<?php
// command code: 10
class itemCheckinResponse
{
    private $ok;
    private $resensitize;
    private $magneticMedia;
    private $alert;
    private $transactionDate;
    private $institutionId;
    private $itemIdentifier;
    private $permanentLocation;
    private $titleIdentifier;
    private $sortBin;
    private $patronIdentifier;
    private $mediaType;
    private $itemProperties;
    private $screenMessage;
    private $printLine;

    public function __construct()
    {
        $this->ok = '0';
        $this->resensitize = 'N';
        $this->magneticMedia = 'U';
        $this->alert = 'N';
        $this->transactionDate = (new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh')))->format('Ymd    his');
        $this->institutionId = '';
        $this->itemIdentifier = '';
        $this->permanentLocation = '';
        $this->titleIdentifier = '';
        $this->sortBin = '';
        $this->patronIdentifier = '';
        $this->mediaType = null;
        $this->itemProperties = '';
        $this->screenMessage = '';
        $this->printLine = '';
    }

    public function isAlert()
    {
        return $this->alert;
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

    public function isMagneticMedia()
    {
        return $this->magneticMedia;
    }

    public function getMediaType()
    {
        return $this->mediaType;
    }

    public function isOk()
    {
        return $this->ok;
    }

    public function getPatronIdentifier()
    {
        return $this->patronIdentifier;
    }

    public function getPermanentLocation()
    {
        return $this->permanentLocation;
    }

    public function getPrintLine()
    {
        return $this->printLine;
    }

    public function isResensitize()
    {
        return $this->resensitize;
    }

    public function getScreenMessage()
    {
        return $this->screenMessage;
    }

    public function getSortBin()
    {
        return $this->sortBin;
    }

    public function getTitleIdentifier()
    {
        return $this->titleIdentifier;
    }

    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    public function setTransactionDate(DateTime $transactionDate)
    {
        $this->transactionDate = $transactionDate;
    }

    public function setTitleIdentifier($titleIdentifier)
    {
        $this->titleIdentifier = $titleIdentifier;
    }

    public function setSortBin($sortBin)
    {
        $this->sortBin = $sortBin;
    }

    public function setScreenMessage($screenMessage)
    {
        $this->screenMessage = $screenMessage;
    }

    public function setResensitize($resensitize)
    {
        $this->resensitize = $resensitize;
    }

    public function setPrintLine($printLine)
    {
        $this->printLine = $printLine;
    }

    public function setPermanentLocation($permanentLocation)
    {
        $this->permanentLocation = $permanentLocation;
    }

    public function setPatronIdentifier($patronIdentifier)
    {
        $this->patronIdentifier = $patronIdentifier;
    }

    public function setOk(bool $ok)
    {
        $this->ok = $ok;
    }

    public function setMediaType($mediaType)
    {
        $this->mediaType = $mediaType;
    }

    public function setMagneticMedia($magneticMedia)
    {
        $this->magneticMedia = $magneticMedia;
    }

    public function build(): string
    {
        $response = '10' . $this->ok . $this->resensitize . $this->magneticMedia . $this->alert . $this->transactionDate . 'AO' . $this->institutionId . '|' . 'AB' . $this->itemIdentifier . '|' . 'AQ' . $this->permanentLocation . '|';
        $optional = false;
        $optionalIdArray = ['AJ', 'CL', 'CH', 'AF', 'AG'];
        $index = 0;
        foreach ($this as $key => $value) {
            if ($key == 'titleIdentifier') {
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

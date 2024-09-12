<?php

class ACSStatus
{
    private $onlineStatus;
    private $checkInOk;
    private $checkOutOk;
    private $ACSRenewalPolicy;
    private $statusUpdateOk;
    private $offlineOk;
    private $timeoutPeriod;
    private $retriesAllowed;
    private $dateTimeSync;
    private $protocolVersion;
    private $institutionId;
    private $libraryName;
    private $supportedMessages;
    private $terminalLocation;
    private $screenMessage;
    private $printLine;

    public function __construct()
    {
        $this->onlineStatus = 'N';
        $this->checkInOk = 'N';
        $this->checkOutOk = 'N';
        $this->ACSRenewalPolicy = 'N';
        $this->statusUpdateOk = 'N';
        $this->offlineOk = 'N';
        $this->timeoutPeriod = '   ';
        $this->retriesAllowed = '   ';
        $this->dateTimeSync = (new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh')))->format('Ymd    his');
        $this->protocolVersion = '2.00';
        $this->institutionId = '';
        $this->supportedMessages = '';
    }

    public function getCheckInOk()
    {
        return $this->checkInOk;
    }

    public function getCheckOutOk()
    {
        return $this->checkOutOk;
    }

    public function getDateTimeSync()
    {
        return $this->dateTimeSync;
    }

    public function getInstitutionId()
    {
        return $this->institutionId;
    }

    public function getLibraryName()
    {
        return $this->libraryName;
    }

    public function isOfflineOk()
    {
        return $this->offlineOk;
    }

    public function isOnlineStatus()
    {
        return $this->onlineStatus;
    }

    public function getPrintLine()
    {
        return $this->printLine;
    }

    public function getProtocolVersion()
    {
        return $this->protocolVersion;
    }

    public function isACSRenewalPolicy()
    {
        return $this->ACSRenewalPolicy;
    }

    public function getRetriesAllowed()
    {
        return $this->retriesAllowed;
    }

    public function getScreenMessage()
    {
        return $this->screenMessage;
    }

    public function isStatusUpdateOk()
    {
        return $this->statusUpdateOk;
    }

    public function getSupportedMessages()
    {
        return $this->supportedMessages;
    }

    public function getTerminalLocation()
    {
        return $this->terminalLocation;
    }

    public function getTimeoutPeriod()
    {
        return $this->timeoutPeriod;
    }

    public function setTimeoutPeriod($timeoutPeriod)
    {
        $this->timeoutPeriod = $timeoutPeriod;
    }

    public function setTerminalLocation($terminalLocation)
    {
        $this->terminalLocation = $terminalLocation;
    }

    public function setStatusUpdateOk($statusUpdateOk)
    {
        $this->statusUpdateOk = $statusUpdateOk;
    }

    public function setScreenMessage($screenMessage)
    {
        $this->screenMessage = $screenMessage;
    }

    public function setRetriesAllowed($retriesAllowed)
    {
        $this->retriesAllowed = $retriesAllowed;
    }

    public function setACSRenewalPolicy($ACSRenewalPolicy)
    {
        $this->ACSRenewalPolicy = $ACSRenewalPolicy;
    }

    public function setProtocolVersion($protocolVersion)
    {
        $this->protocolVersion = $protocolVersion;
    }

    public function setPrintLine($printLine)
    {
        $this->printLine = $printLine;
    }

    public function setOnlineStatus($onlineStatus)
    {
        $this->onlineStatus = $onlineStatus;
    }

    public function setOfflineOk($offlineOk)
    {
        $this->offlineOk = $offlineOk;
    }

    public function setLibraryName($libraryName)
    {
        $this->libraryName = $libraryName;
    }

    public function setInstitutionId($institutionId)
    {
        $this->institutionId = $institutionId;
    }

    public function setDateTimeSync($dateTimeSync)
    {
        $this->dateTimeSync = $dateTimeSync;
    }

    public function setCheckOutOk($checkOutOk)
    {
        $this->checkOutOk = $checkOutOk;
    }

    public function setCheckInOk($checkInOk)
    {
        $this->checkInOk = $checkInOk;
    }

    public function build(): string
    {
        $response = '98' . $this->onlineStatus . $this->checkInOk . $this->checkOutOk . $this->ACSRenewalPolicy . $this->statusUpdateOk . $this->offlineOk . $this->timeoutPeriod . $this->retriesAllowed . $this->dateTimeSync . $this->protocolVersion . 'AO' . $this->institutionId . '|' . 'BX' . $this->supportedMessages . '|';
        $optional = false;
        $optionalIdArray = ['AM', 'AN', 'AF', 'AG'];
        $index = 0;
        foreach ($this as $key => $value) {
            if ($key == 'libraryName') {
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

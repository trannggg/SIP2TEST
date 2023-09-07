<?php

class updateNotice
{
    private $noticeStatus;
    private $transactionDate;
    private $deliveryDate;
    private $noticeMedium;
    private $notificationType;
    private $noticeInstitutionId;
    private $noticePatronIdentifier;
    private $noticeItemIdentifier;
    private $noticeTerminalPassword;
    private $noticeComment;
    public function getNoticeStatus()
    {
        return $this->noticeStatus;
    }

    public function setNoticeStatus($noticeStatus)
    {
        $this->noticeStatus = $noticeStatus;
    }

    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    public function setTransactionDate($transactionDate)
    {
        $this->transactionDate = $transactionDate;
    }

    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    public function setDeliveryDate($deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;
    }

    public function getNoticeMedium()
    {
        return $this->noticeMedium;
    }

    public function setNoticeMedium($noticeMedium)
    {
        $this->noticeMedium = $noticeMedium;
    }

    public function getNotificationType()
    {
        return $this->notificationType;
    }

    public function setNotificationType($notificationType)
    {
        $this->notificationType = $notificationType;
    }

    public function getNoticeInstitutionId()
    {
        return $this->noticeInstitutionId;
    }

    public function setNoticeInstitutionId($noticeInstitutionId)
    {
        $this->noticeInstitutionId = $noticeInstitutionId;
    }

    public function getNoticePatronIdentifier()
    {
        return $this->noticePatronIdentifier;
    }

    public function setNoticePatronIdentifier($noticePatronIdentifier)
    {
        $this->noticePatronIdentifier = $noticePatronIdentifier;
    }

    public function getNoticeItemIdentifier()
    {
        return $this->noticeItemIdentifier;
    }

    public function setNoticeItemIdentifier($noticeItemIdentifier)
    {
        $this->noticeItemIdentifier = $noticeItemIdentifier;
    }

    public function getNoticeTerminalPassword()
    {
        return $this->noticeTerminalPassword;
    }

    public function setNoticeTerminalPassword($noticeTerminalPassword)
    {
        $this->noticeTerminalPassword = $noticeTerminalPassword;
    }
    public function getNoticeComment()
    {
        return $this->noticeTerminalPassword;
    }

    public function setNoticeComment($noticeTerminalPassword)
    {
        $this->noticeTerminalPassword = $noticeTerminalPassword;
    }
}

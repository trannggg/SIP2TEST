<?php

class ItemStatusUpdateResponse {
    private $ok;
    private $transactionDate;
    private $itemIdentifier;
    private $titleIdentifier;
    private $itemProperties;
    private $screenMessage;
    private $printLine;

    public function __construct() {
        $this->ok = '0';
        $this->transactionDate = (new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh')))->format('Ymd    his');
        $this->itemIdentifier = '';
    }

    public function isOk() {
        return $this->ok;
    }

    public function setOk($ok) {
        $this->ok = $ok;
    }

    public function getTransactionDate() {
        return $this->transactionDate;
    }

    public function setTransactionDate($transactionDate) {
        $this->transactionDate = $transactionDate;
    }

    public function getItemIdentifier() {
        return $this->itemIdentifier;
    }

    public function setItemIdentifier($itemIdentifier) {
        $this->itemIdentifier = $itemIdentifier;
    }

    public function getTitleIdentifier() {
        return $this->titleIdentifier;
    }

    public function setTitleIdentifier($titleIdentifier) {
        $this->titleIdentifier = $titleIdentifier;
    }

    public function getItemProperties() {
        return $this->itemProperties;
    }

    public function setItemProperties($itemProperties) {
        $this->itemProperties = $itemProperties;
    }

    public function getScreenMessage() {
        return $this->screenMessage;
    }

    public function setScreenMessage($screenMessage) {
        $this->screenMessage = $screenMessage;
    }

    public function getPrintLine() {
        return $this->printLine;
    }

    public function setPrintLine($printLine) {
        $this->printLine = $printLine;
    }

    public function build(): string
    {
        $response = '20' . $this->ok . $this->transactionDate . 'AB' . $this->itemIdentifier . '|';
        $optional = false;
        $optionalIdArray = ['AJ', 'CH', 'AF', 'AG'];
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


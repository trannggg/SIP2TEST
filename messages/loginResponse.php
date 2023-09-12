<?php
class LoginResponse {
    private $ok;

    public function __construct() {
        $this->ok = '0';
    }
    public function isOk() {
        return $this->ok;
    }

    public function setOk($ok) {
        $this->ok = $ok;
    }

    public function build() : string {
        return '94' . $this->ok;
    }
}

?>
<?php
class LoginResponse {
    private $ok;

    public function isOk() {
        return $this->ok;
    }

    public function setOk($ok) {
        $this->ok = $ok;
    }
}

?>
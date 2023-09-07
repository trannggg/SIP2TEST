<?php
/**
 * @Command("93")
 * @TestCaseDefault("93  CN|CO|")
 * @TestCasePopulated("93UPCNloginUserId|COloginPassword|CPlocationCode|")
 */
class login
{
    private $UIDAlgorithm;
    private $PWDAlgorithm;
    private $loginUserId;
    private $loginPassword;
    private $locationCode;
    private $vendorProfile;

    public function getUIDAlgorithm()
    {
        return $this->UIDAlgorithm;
    }

    public function setUIDAlgorithm($UIDAlgorithm)
    {
        $this->UIDAlgorithm = $UIDAlgorithm;
    }

    public function getPWDAlgorithm()
    {
        return $this->PWDAlgorithm;
    }

    public function setPWDAlgorithm($PWDAlgorithm)
    {
        $this->PWDAlgorithm = $PWDAlgorithm;
    }

    public function getLoginUserId()
    {
        return $this->loginUserId;
    }

    public function setLoginUserId($loginUserId)
    {
        $this->loginUserId = $loginUserId;
    }

    public function getLoginPassword()
    {
        return $this->loginPassword;
    }

    public function setLoginPassword($loginPassword)
    {
        $this->loginPassword = $loginPassword;
    }

    public function getLocationCode()
    {
        return $this->locationCode;
    }

    public function setLocationCode($locationCode)
    {
        $this->locationCode = $locationCode;
    }
    public function getVendorProfile()
    {
        return $this->vendorProfile;
    }

    public function setVendorProfile($vendorProfile)
    {
        $this->vendorProfile = $vendorProfile;
    }

}
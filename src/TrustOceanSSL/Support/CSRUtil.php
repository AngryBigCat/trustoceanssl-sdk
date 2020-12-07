<?php


namespace TrustOceanSSL\Support;


class CSRUtil
{
    const ENCRYPTION_RSA = OPENSSL_KEYTYPE_RSA;
    const ENCRYPTION_ECC = OPENSSL_KEYTYPE_EC;

    const ENCRYPTION_LEN_1024 = 1024;
    const ENCRYPTION_LEN_2048 = 2048;
    const ENCRYPTION_LEN_4096 = 4096;

    const DIGEST_ALG_SHA256 = 'sha256';
    const DIGEST_ALG_SHA521 = 'sha512';

    private $commonName;

    private $countryName;

    private $stateOrProvinceName;

    private $localityName;

    private $organizationName;

    private $organizationalUnitName;

    private $emailAddress;

    private $encryption = self::ENCRYPTION_RSA;

    private $encryption_length = self::ENCRYPTION_LEN_2048;

    private $digest_alg = self::DIGEST_ALG_SHA256;

    private $pkey;

    private $csr;

    /**
     * 生成实例
     * @return $this
     */
    public function generate()
    {
        $this->checkData();

        $this->setPKey();
        $this->setCSR();

        return $this;
    }

    /**
     * 获取csr code
     * @return string
     */
    public function getCSRCode()
    {
        openssl_csr_export($this->csr, $csrout);

        return $csrout;
    }

    /**
     * 获取private key code
     * @param null $password
     * @return string
     */
    public function getPKeyCode($password = null)
    {
        openssl_pkey_export($this->pkey, $pkeyout, $password);

        return $pkeyout;
    }

    private function checkData()
    {
        if (empty($this->commonName)) {
            throw new \InvalidArgumentException('缺少commonName');
        }

        if (empty($this->countryName)) {
            throw new \InvalidArgumentException('缺少countryName');
        }

        if (empty($this->stateOrProvinceName)) {
            throw new \InvalidArgumentException('缺少stateOrProvinceName');
        }

        if (empty($this->localityName)) {
            throw new \InvalidArgumentException('缺少localityName');
        }

        if (empty($this->organizationName)) {
            throw new \InvalidArgumentException('缺少organizationName');
        }

        if (empty($this->organizationalUnitName)) {
            throw new \InvalidArgumentException('缺少organizationalUnitName');
        }

        if (empty($this->emailAddress)) {
            throw new \InvalidArgumentException('缺少emailAddress');
        }
    }

    private function setCSR()
    {
        $dn = array(
            "countryName" => $this->countryName,
            "stateOrProvinceName" => $this->stateOrProvinceName,
            "localityName" => $this->localityName,
            "organizationName" => $this->organizationName,
            "organizationalUnitName" => $this->organizationalUnitName,
            "commonName" => $this->commonName,
            "emailAddress" => $this->emailAddress,
        );

        $this->csr = openssl_csr_new($dn, $this->pkey, array('digest_alg' => $this->digest_alg));

        return $this;
    }


    private function setPKey()
    {
        $this->pkey = openssl_pkey_new(array(
            "private_key_bits" => $this->encryption_length,
            "private_key_type" => $this->encryption,
        ));

        return $this;
    }

    public function setCommonName($v)
    {
        $this->commonName = $v;

        return $this;
    }

    public function setEncryption($v)
    {
        $this->encryption = $v;

        return $this;
    }

    public function setEncryptionLength($v)
    {
        $this->encryption_length = $v;

        return $this;
    }

    public function setCountryName($v)
    {
        $this->countryName = $v;

        return $this;
    }

    public function setStateOrProvinceName($v)
    {
        $this->stateOrProvinceName = $v;

        return $this;
    }

    public function setLocalityName($v)
    {
        $this->localityName = $v;

        return $this;
    }

    public function setOrganizationName($v)
    {
        $this->organizationName = $v;

        return $this;
    }

    public function setOrganizationalUnitName($v)
    {
        $this->organizationalUnitName = $v;

        return $this;
    }


    public function setEmailAddress($v)
    {
        $this->emailAddress = $v;

        return $this;
    }

    public function setDigestAlg($v)
    {
        $this->digest_alg = $v;

        return $this;
    }
}

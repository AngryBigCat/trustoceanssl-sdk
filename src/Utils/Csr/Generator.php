<?php


namespace TrustOceanSsl\Csr\Utils;


use AcmePhp\Ssl\CertificateRequest;
use AcmePhp\Ssl\DistinguishedName;
use AcmePhp\Ssl\Generator\KeyOption;
use AcmePhp\Ssl\Generator\KeyPairGenerator;
use AcmePhp\Ssl\Signer\CertificateRequestSigner;

class Generator
{
    private $keyPair;

    private $csr;

    /**
     * Generator constructor.
     * @param DistinguishedName|string $distinguishedName
     * @param KeyOption|null $keyOption
     */
    public function __construct($distinguishedName, KeyOption $keyOption = null)
    {
        if (is_string($distinguishedName)) {
            $distinguishedName = new DistinguishedName($distinguishedName);
        }

        $this->keyPair = (new KeyPairGenerator())->generateKeyPair($keyOption);

        $this->csr = new CertificateRequest($distinguishedName, $this->keyPair);
    }

    /**
     * @return string
     */
    public function getCsr()
    {
        return $this->keyPair->getPrivateKey()->getPEM();
    }

    public function getPrivateKey()
    {
        return (new CertificateRequestSigner())->signCertificateRequest($this->csr);
    }
}

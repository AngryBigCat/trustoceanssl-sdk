<?php


namespace TrustOceanSSL\Tests\Support;


use PHPUnit\Framework\TestCase;
use TrustOceanSSL\Support\CSRUtil;

class CSRUtilTest extends TestCase
{
    private $csrUtil;

    public function setUp(): void
    {
        $this->csrUtil = (new CSRUtil)
            ->setCommonName('a.nskong.com')
            ->setCountryName('CN')
            ->setLocalityName('Xian')
            ->setStateOrProvinceName('Shannxi')
            ->setEmailAddress('angrycat123@163.com')
            ->setOrganizationName('kuyou')
            ->setOrganizationalUnitName('php')
            ->generate();
    }

    public function testGetCsrCode()
    {
        $content = $this->csrUtil->getCSRCode();

        $this->assertStringContainsString('-----BEGIN CERTIFICATE REQUEST-----', $content);
    }

    public function testGetPKeyCode()
    {
        $content = $this->csrUtil->getPKeyCode();

        $this->assertStringContainsString('-----BEGIN PRIVATE KEY-----', $content);
    }
}

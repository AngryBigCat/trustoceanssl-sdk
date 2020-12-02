<?php


namespace TrustOceanSSL\Tests;


use PHPUnit\Framework\TestCase as BaseTestCase;
use TrustOceanSSL\Client;

abstract class TestCase extends BaseTestCase
{
    /**
     * @var Client
     */
    protected $client;

    protected function setUp(): void
    {
        $this->client = new Client('angrycat123@163.com', '04cdd0305d62200abaae047f88c2d45f804f05b03ee2dc2b4914c0f38ef0bcb0');
    }
}

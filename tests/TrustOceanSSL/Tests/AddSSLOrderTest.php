<?php


namespace TrustOceanSSL\Tests;


class AddSSLOrderTest extends TestCase
{
    public function testAddSSLOrderTest()
    {
        $this->assertStringContainsString('success', $this->order->status);
    }
}

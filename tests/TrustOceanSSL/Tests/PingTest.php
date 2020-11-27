<?php

namespace TrustOceanSSL\Tests;

use PHPUnit\Framework\TestCase;
use TrustOceanSSL\Client;

class PingTest extends TestCase
{
    public function testPing()
    {
        $client = new Client('angrycat123@163.com', '859d10621d128f0447c61898971b03e93cdd04d4b2b7fafa75026dbe7df81b09');

        $data = $client->ping();

        $this->assertStringContainsString('success', $data->status);
    }
}

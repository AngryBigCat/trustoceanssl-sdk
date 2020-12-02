<?php

namespace TrustOceanSSL\Tests;


class PingTest extends TestCase
{
    public function testPing()
    {
        $data = $this->client->ping();

        $this->assertStringContainsString('success', $data->status);
    }
}

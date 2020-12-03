<?php


namespace TrustOceanSSL\Tests;


class GetSSLDetailsTest extends TestCase
{
    public function testGetSSLDetails()
    {
        $params = ['trustocean_id' => $this->order->trustocean_id];

        $data = $this->client->getSSLDetails($params);

        $this->assertStringContainsString('success', $data->status);
    }
}

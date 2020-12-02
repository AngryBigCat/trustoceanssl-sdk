<?php


namespace TrustOceanSSL\Tests;


class GetSSLDetailsTest extends TestCase
{
    public function testGetSSLDetails()
    {
        $params = ['trustocean_id' => 159417];

        $data = $this->client->getSSLDetails($params);

        $this->assertStringContainsString('success', $data->status);
    }
}

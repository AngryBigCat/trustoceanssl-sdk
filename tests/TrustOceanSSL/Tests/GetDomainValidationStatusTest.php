<?php


namespace TrustOceanSSL\Tests;


class GetDomainValidationStatusTest extends TestCase
{
    public function testGetDomainValidationStatus()
    {
        $params = ['trustocean_id' => $this->order->trustocean_id];

        $data = $this->client->getDomainValidationStatus($params);

        $this->assertStringContainsString('success', $data->status);
    }
}

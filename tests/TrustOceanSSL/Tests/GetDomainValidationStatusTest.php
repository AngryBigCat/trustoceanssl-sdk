<?php


namespace TrustOceanSSL\Tests;


class GetDomainValidationStatusTest extends TestCase
{
    public function testGetDomainValidationStatus()
    {
        $params = ['trustocean_id' => 159417];

        $data = $this->client->getDomainValidationStatus($params);

        $this->assertStringContainsString('success', $data->status);
    }
}

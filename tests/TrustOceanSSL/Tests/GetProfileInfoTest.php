<?php


namespace TrustOceanSSL\Tests;


class GetProfileInfoTest extends TestCase
{
    public function testGetProfileInfo()
    {
        $data = $this->client->getProfileInfo();

        $this->assertStringContainsString('success', $data->status);
    }
}

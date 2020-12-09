<?php


namespace TrustOceanSSL\Tests;


class CheckUniqueIdTest extends TestCase
{
    public function testCheckUniqueId()
    {
        $params = ['unique_id' => 'un32'.substr(time(), -6)];

        $data = $this->client->checkUniqueId($params);

        $this->assertStringContainsString('success', $data->status);
    }
}

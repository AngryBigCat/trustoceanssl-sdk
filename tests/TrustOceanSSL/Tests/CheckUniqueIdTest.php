<?php


namespace TrustOceanSSL\Tests;


class CheckUniqueIdTest extends TestCase
{
    public $products;

    public function testCheckUniqueId()
    {
        $params = ['unique_id' => 'un32ms0902'];

        $data = $this->client->checkUniqueId($params);

        $this->assertStringContainsString('success', $data->status);
    }
}

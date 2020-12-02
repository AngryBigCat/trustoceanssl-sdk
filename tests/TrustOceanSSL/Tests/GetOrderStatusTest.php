<?php


namespace TrustOceanSSL\Tests;


class GetOrderStatusTest extends TestCase
{
    public function testGetOrderStatus()
    {
        $params = ['trustocean_id' => 159417];

        $data = $this->client->getOrderStatus($params);

        $this->assertStringContainsString('success', $data->status);
    }
}

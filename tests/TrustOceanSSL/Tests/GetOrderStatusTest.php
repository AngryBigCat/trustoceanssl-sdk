<?php


namespace TrustOceanSSL\Tests;


class GetOrderStatusTest extends TestCase
{
    public function testGetOrderStatus()
    {
        $params = ['trustocean_id' => $this->trustocean_id];

        $data = $this->client->getOrderStatus($params);

        $this->assertStringContainsString('success', $data->status);
    }
}

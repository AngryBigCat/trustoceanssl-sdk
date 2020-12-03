<?php


namespace TrustOceanSSL\Tests;


class CheckRefundStatusTest extends TestCase
{
    public $products;

    public function testCheckRefundStatus()
    {
        $params = ['trustocean_id' => $this->order->trustocean_id];

        $data = $this->client->checkRefundStatus($params);

        $this->assertStringContainsString('Order not in refund status.', $data->message);
    }
}

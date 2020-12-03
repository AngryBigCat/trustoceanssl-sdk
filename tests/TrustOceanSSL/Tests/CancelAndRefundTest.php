<?php


namespace TrustOceanSSL\Tests;


class CancelAndRefundTest extends TestCase
{
    public $products;

    public function testCancelAndRefund()
    {
        $params = ['trustocean_id' => $this->order->trustocean_id];

        $data = $this->client->cancelAndRefund($params);

        $this->assertStringContainsString('success', $data->status);
    }
}

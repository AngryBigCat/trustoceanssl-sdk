<?php


namespace TrustOceanSSL\Tests;


class ChangeDCVMethodTest extends TestCase
{
    public $products;

    public function testChangeDCVMethod()
    {
        $params = [
            'trustocean_id' => $this->order->trustocean_id,
            'domain' => 'a.nskong.com',
            'method' => 'http',
        ];

        $data = $this->client->changeDCVMethod($params);

        $this->assertStringContainsString('success', $data->status);
    }
}

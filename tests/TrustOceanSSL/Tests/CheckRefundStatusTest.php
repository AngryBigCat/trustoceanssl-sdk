<?php


namespace TrustOceanSSL\Tests;


class CheckRefundStatusTest extends TestCase
{
    public $products;

    public function testCheckRefundStatus()
    {
        $params = ['trustocean_id' => 159417];

        $data = $this->client->checkRefundStatus($params);

//        var_dump($data);die();
        $this->assertStringContainsString('success', $data->status);
    }
}

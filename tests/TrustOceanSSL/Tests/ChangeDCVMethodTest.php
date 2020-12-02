<?php


namespace TrustOceanSSL\Tests;


class ChangeDCVMethodTest extends TestCase
{
    public $products;

    public function testChangeDCVMethod()
    {
        $params = ['trustocean_id' => 159417];

        $data = $this->client->reTryDcvEmailOrDCVCheck($params);

        $this->assertStringContainsString('success', $data->status);
    }
}

<?php


namespace TrustOceanSSL\Tests;


use PHPUnit\Framework\TestCase;
use TrustOceanSSl\Client;

class GetProductListTest extends TestCase
{
    public $products;

    public function testGetProductList()
    {
        $client = new Client('angrycat123@163.com', '859d10621d128f0447c61898971b03e93cdd04d4b2b7fafa75026dbe7df81b09');

        $data = $client->getProductList();

        $this->assertStringContainsString('success', $data->status);
    }
}

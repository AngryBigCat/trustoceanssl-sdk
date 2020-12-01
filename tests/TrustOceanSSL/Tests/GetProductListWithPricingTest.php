<?php


namespace TrustOceanSSL\Tests;


use PHPUnit\Framework\TestCase;
use TrustOceanSSL\Client;

class GetProductListWithPricingTest extends TestCase
{
    public $products;

    public function testGetProductListWithPricing()
    {
        $client = new Client('angrycat123@163.com', '04cdd0305d62200abaae047f88c2d45f804f05b03ee2dc2b4914c0f38ef0bcb0');

        $data = $client->getProductListWithPricing();

//       var_dump($data);die();
        $this->assertStringContainsString('success', $data->status);
    }
}

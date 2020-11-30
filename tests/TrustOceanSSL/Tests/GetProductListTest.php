<?php


namespace TrustOceanSSL\Tests;


use PHPUnit\Framework\TestCase;
use TrustOceanSSL\Client;

class GetProductListTest extends TestCase
{
    public $products;

    public function testGetProductList()
    {
        $client = new Client('angrycat123@163.com', '04cdd0305d62200abaae047f88c2d45f804f05b03ee2dc2b4914c0f38ef0bcb0');
        $data = $client->getProductList();

        $this->assertStringContainsString('success', $data->status);
    }
}

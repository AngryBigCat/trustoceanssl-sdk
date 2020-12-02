<?php


namespace TrustOceanSSL\Tests;


class GetProductListTest extends TestCase
{
    public function testGetProductList()
    {
        $data = $this->client->getProductList();

        $this->assertStringContainsString('success', $data->status);
    }
}

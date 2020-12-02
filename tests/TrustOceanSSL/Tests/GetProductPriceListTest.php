<?php


namespace TrustOceanSSL\Tests;


class GetProductPriceListTest extends TestCase
{
    public function testGetProductPriceList()
    {
        $data = $this->client->getProductPriceList();

        $this->assertStringContainsString('success', $data->status);
    }
}

<?php


namespace TrustOceanSSL\Tests;


class GetProductListWithPricingTest extends TestCase
{
    public function testGetProductListWithPricing()
    {
        $data = $this->client->getProductListWithPricing();

        $this->assertStringContainsString('success', $data->status);
    }
}

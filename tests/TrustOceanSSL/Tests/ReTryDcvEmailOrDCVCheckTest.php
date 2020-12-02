<?php


namespace TrustOceanSSL\Tests;


class ReTryDcvEmailOrDCVCheckTest extends TestCase
{
    public function testReTryDcvEmailOrDCVCheck()
    {
        $params = ['trustocean_id' => 159417];

        $data = $this->client->reTryDcvEmailOrDCVCheck($params);

        $this->assertStringContainsString('success', $data->status);
    }
}

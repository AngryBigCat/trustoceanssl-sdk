<?php


namespace TrustOceanSSL\Tests;


class ReTryDcvEmailOrDCVCheckTest extends TestCase
{
    public function testReTryDcvEmailOrDCVCheck()
    {
        $params = ['trustocean_id' => $this->trustocean_id];

        $data = $this->client->reTryDcvEmailOrDCVCheck($params);

        $this->assertStringContainsString('success', $data->status);
    }
}

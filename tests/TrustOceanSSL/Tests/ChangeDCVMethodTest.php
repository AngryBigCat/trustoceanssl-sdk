<?php


namespace TrustOceanSSL\Tests;


class ChangeDCVMethodTest extends TestCase
{
    public function testChangeDCVMethod()
    {
        $params = [
            'trustocean_id' => $this->trustocean_id,
            'domain' => 'a.nskong.com',
            'method' => 'http',
        ];

        $data = $this->client->changeDCVMethod($params);

        $this->assertStringContainsString('success', $data->status);
    }
}

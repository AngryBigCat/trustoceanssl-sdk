<?php


namespace TrustOceanSSL\Tests;


class CancelAndRefundTest extends TestCase
{
    public function testCancelAndRefund()
    {
        $params = ['trustocean_id' => $this->trustocean_id];

        $data = $this->client->cancelAndRefund($params);

        $this->assertStringContainsString('success', $data->status);
    }
}

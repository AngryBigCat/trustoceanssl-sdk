<?php


namespace TrustOceanSSL\Tests;


class CheckRefundStatusTest extends TestCase
{
    public function testCheckRefundStatus()
    {
        $params = ['trustocean_id' => $this->trustocean_id];

        $data = $this->client->checkRefundStatus($params);

        if ($data->status === 'error') {
            $this->assertStringContainsString('Order not in refund status.', $data->message);
        } else {
            $this->assertStringContainsString('success', $data->status);
        }
    }
}

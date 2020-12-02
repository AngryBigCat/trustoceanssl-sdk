<?php


namespace TrustOceanSSL\Tests;


class RevokeSSLTest extends TestCase
{
    public function testRevokeSSL()
    {
        $params = ['trustocean_id' => 159417,'revocationReason'=>'test'];

        $data = $this->client->revokeSSL($params);

        $this->assertStringContainsString('success', $data->status);
    }
}

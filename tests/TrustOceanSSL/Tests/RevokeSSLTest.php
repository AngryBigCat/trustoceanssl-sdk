<?php


namespace TrustOceanSSL\Tests;


class RevokeSSLTest extends TestCase
{
    public function testRevokeSSL()
    {
        $params = [
            'trustocean_id' => $this->trustocean_id,
            'revocationReason' => 'test'
        ];

        $data = $this->client->revokeSSL($params);

        $this->assertStringContainsString('This order cnanot be revoked, because this order is not in Issued_Active status.', $data->message);
    }
}

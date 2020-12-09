<?php


namespace TrustOceanSSL\Tests;


class ReissueSSLOrderTest extends TestCase
{
    public function testReissueSSLOrder()
    {
        $params = [
            'trustocean_id' => $this->trustocean_id,
            'csr_code'=>
                '-----BEGIN CERTIFICATE REQUEST-----
MIICijCCAXICAQAwRTELMAkGA1UEBhMCQ04xDzANBgNVBAgTBnNoYW54aTENMAsG
A1UEBxMEeGlhbjEWMBQGA1UEAxMNdGVzdC54YXlzLnRvcDCCASIwDQYJKoZIhvcN
AQEBBQADggEPADCCAQoCggEBAMQFfBnvlC9DD9Iu8+VRwCrAyGZm4bNew1WJGLo7
agQlholSTQ7Iz5n9TwIsoJ5XGkvnVglKyM0pdM5LDsNaOlvTzAwjOm23kJs/Kdic
NCsTjG6C/Cshci0aEh5liBFHCje81zqJjd3h3ZIlvH1ERXkT0Bj6x0vUTPLXhDP/
sa/SvveN6HdSokht1zBQ0ViSgNlqOG0Z8SRx0YJW+tBLUaFOnE3yhe28TxvAHp1M
I+N2peGCdeQm4x1uDuRGBJS/PgYUII4f/fM8zn2h/cGy5NRNddNN/f3NqWAiqL3/
0P8TRLLKz8ZvFx90NoBUAorI7r3MBmB7UyNCveRbQy9DcX8CAwEAAaAAMA0GCSqG
SIb3DQEBCwUAA4IBAQBzmbxoHTnwW+eG/U6BIJLeVKLD8SA5WL+0GJn6J0xR7R/L
rcYoyb4ggsHpjXle1OwCXTRYgc+GNBC/5FqJqJVvrFA4Wj45xJjX+FLEhm+TWXdM
UYN7kTEfldJnr0wmZVJoU6CKUvueg9od1Cwl3FlT4qmEVEZvYknVLLPnHzBg5iY8
DzW1aVLl4nBR+wV3dqQNbqgt+BuluA7yg33QKIkJWqMLWhvObZvFd6JkTbO10gfF
AOBHtbxyVA9WSE+5ECBt6tVRwAhiMugaK2OtYfXL+HJkdzCzVjVSXKA41d+mSQLE
oVSzfI+5yPg+18jyESwO4bVZ5WpJF436zKgY740o
-----END CERTIFICATE REQUEST-----
',
            'contact_email'=>'angrycat123@qq.com',
            'dcv_method' => [
                'https',
                'https',
                'https',
            ],
            'unique_id'  => 'un32'.substr(md5(time()),0,6),
            'domains'    => [
                'd.nskong.com',
                'e.nskong.com',
                'f.nskong.com',
            ]
        ];

        $data = $this->client->reissueSSLOrder($params);

        $this->assertStringContainsString('Cannot reissue this order now, your order not in Issued_Active status', $data->message);

    }
}

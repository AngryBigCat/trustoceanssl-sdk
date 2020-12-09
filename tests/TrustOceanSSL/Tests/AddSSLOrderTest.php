<?php


namespace TrustOceanSSL\Tests;


class AddSSLOrderTest extends TestCase
{
    public function testAddSSLOrderTest()
    {
        $data = $this->createOrder();

        $this->assertStringContainsString('success', $data->status);
    }

    protected function createOrder()
    {
        $params = [
            'pid' => 50,
            'csr_code'=>'-----BEGIN CERTIFICATE REQUEST-----
MIIC6jCCAdICAQAwgaQxCzAJBgNVBAYTAkNOMQ8wDQYDVQQIDAbpmZXopb8xDzAN
BgNVBAcMBuilv+WuiTEtMCsGA1UECgwk6KW/5a6J6YW35ri45L+h5oGv56eR5oqA
5pyJ6ZmQ5YWs5Y+4MQswCQYDVQQLDAJJVDETMBEGA1UEAwwKbnNrb25nLmNvbTEi
MCAGCSqGSIb3DQEJARYTYW5ncnljYXQxMjNAMTYzLmNvbTCCASIwDQYJKoZIhvcN
AQEBBQADggEPADCCAQoCggEBAKI1rTq6rgahIItDFI5UoADyG9ttvLOBOwW679dM
Vnx8pBl4ecyBjm9uhEio2C7YrAkUl8F3m5GrUxpRYcrlbvfqZqNYXvRYaraxVSOC
qAjId+qnljCLA+KrAEXrRu0z7vldWhxmFZ5cnhsmMaxS+c2JVter5gpQPzMSb29X
KvAce831tahWM7nY9essGRjt9bTZu9go1ODGQ1h5hs1KhlIoZH3jWobQObmXj2fV
sSEALIS7OTaPrxCUJFBA3qxH2JMfZ+PtJrzNefE/X9oBICVMi6TnjnA0IOX+tHIe
Mjb3oXvb06EfT8azReql+QYoXW3TU+xTc5vn92RpgBXId9ECAwEAAaAAMA0GCSqG
SIb3DQEBCwUAA4IBAQAidffDK4kOx6NKqgkZ/nMQVft1oB2pBp/GUPxje0DfhbKu
HXTpRTyY5rvM0GKLcxNffEO2U8omuDOlYLJknbFbU75/7iUHnSMzwXUBN/EGDFJN
tf+5JOhDZfCGanC/iUOzhX2U77KyXWDhgxswUpmO/HiQYgI4JNqqpKmMeTMJaa0w
Pk96NUFFW4Wo+VMNbdxxrQUhP8wZVn6Il5lr8mqf4vR0aNbERD1aCK1MTrYUUyn7
ZIzlsckYXsEgi66iVZkcir2c23s08FXr/Nw7XmykokM2c7rQAxKW4D6EVxGnaWfB
FwzDUxIOoZ/UWL4hQBmPc7dywHx5TnXHUBcpP9zF
-----END CERTIFICATE REQUEST-----
',
            'period'=>'Annually',
            'unique_id'=>'un32'.substr(time(), -6),
            'dcv_method'=> [
                'dns',
                'dns',
                'dns',
            ],
            'contact_email'=>'angrycat123@163.com',
            'callback'=>'https://xays.top',
            'domains'=> [
                'a.nskong.com',
                'b.nskong.com',
                'c.nskong.com',
            ],
            'renew'=>'no',
//          'organization_name'=>'',
//          'organizationalUnitName'=>'<string>',
//          'registered_address_line1'=>'<string>',
//          'registered_no'=>'<string>',
//          'country'=>'<string>',
//          'state'=>'<string>',
//          'city'=>'<string>',
//          'postal_code'=>'<string>',
//          'organization_phone'=>'<string>',
//          'date_of_incorporation'=>'<string>',
//          'contact_name'=>'<string>',
//          'contact_title'=>'<string>',
//          'contact_phone'=>'schema type not provided'
        ];

        return $this->client->addSSLOrder($params);
    }
}

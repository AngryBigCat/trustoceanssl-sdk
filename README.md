# TrustOceanSSL-SDK-PHP


https://certs-trustocean.doc.coding.io  

TrustOcean数字证书产品对接API官方PHP库


## Installation:
```
composer require angry-one-cat/trustoceanssl-sdk
```
## Example:
```php

/**
 * Go to TrustOcean official website to get username and password information 
 */
$trustocean_username = 'your trustocean username';
$trustocean_password = 'your trustocean password';

/**
 * Initial TrustOceanSSL Client
 */
$client = new TrustOceanSSl\Client($trustocean_username, $trustocean_password);

/**
 * Create a new unique id for a new order 
 */
$uniqueId = $client->createNewUniqueId();

/** 
 * @var TrustOceanSSl\Result\AddSSLOrderResult $addSSLOrderResult 
 */
$addSSLOrderResult = $client->addSSLOrder([
    'pid' => 50, // this product id can be obtain from `$client->getProductList()`
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
-----END CERTIFICATE REQUEST-----',
    'period'=>'Annually',
    'unique_id'=> $uniqueId,
    'dcv_method'=> [
        'dns',
        'dns',
        'dns',
    ],
    'contact_email'=>'angrycat123@example.com',
    'callback'=>'https://example1.com/notify/callback',
    'domains'=> [
        'example1.com',
        'example2.com',
        'example3.com',
    ],
    'renew'=>'no',
]);


$addSSLOrderResult->trustocean_id;
$addSSLOrderResult->domains;

/**
 * @var TrustOceanSSL\Model\DcvInfoDomain $dcvInfo
 */
$dcvInfo = $addSSLOrderResult->getDcvInfoByDomain('example1.com');
$dcvInfo->domain;
$dcvInfo->method;
$dcvInfo->email;
```

## License
MIT License

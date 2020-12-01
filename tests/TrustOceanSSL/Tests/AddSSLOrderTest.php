<?php


namespace TrustOceanSSL\Tests;


use PHPUnit\Framework\TestCase;
use TrustOceanSSL\Client;

class AddSSLOrderTest extends TestCase
{
    public $products;

    public function testAddSSLOrderTest()
    {
        $client = new Client('angrycat123@163.com', '04cdd0305d62200abaae047f88c2d45f804f05b03ee2dc2b4914c0f38ef0bcb0');

        $params = [
            'pid' => 50,
            'csr_code'=>'-----BEGIN CERTIFICATE REQUEST-----
MIIChTCCAW0CAQAwQDELMAkGA1UEBhMCQ04xDzANBgNVBAgTBnNoYW54aTENMAsG
A1UEBxMEeGlhbjERMA8GA1UEAxMIeGF5cy50b3AwggEiMA0GCSqGSIb3DQEBAQUA
A4IBDwAwggEKAoIBAQC1N5KobkFHl06ca0scUDOi7DY/gfuSwaY8b6tC+FhEv5XL
cLtb62Ug7MLD0vjmzLP8Oxm66EibKN3sm+3GFLv1FW5ZtTBVgeGGipck2pH/et5i
wCR8oQUAVZN55LRQDIKH6G+yFaaB61PngiOBSOHmOPQEV6PQryjOJm0+XXkvMFFm
KlizBCTFDmLA+5qByN57yrRWc6TmkE1iK6Z6UmlqkIsoehQgnpEAFF8p5WcqacOg
QH0Nl9b9i1xscNU+MFZharW0prYV3bJNoeUxWbBurh6u/R9N0xmyasqv+PuzwslS
2pQ0JRX/FLG/ZGiqjCvnJ6y24YzsvumxFys/TrmPAgMBAAGgADANBgkqhkiG9w0B
AQsFAAOCAQEAN4/rOf6AISLC/sCTgcXpLrV08W6aeudBKmzBpafciC5O8d0pc61x
hRjj8rJP+xPAl025lrrNovb5BQT7r0DXucKnLYyQPqsT4pGMWFCj1ss0D+aiN6rb
ZXTjc8Kg26UzruUdd8lqcWOaMeUnThsbr9KXYmON/0M/kqazz/jiII8CrHUWYADq
VxmUto00ncawVqD21zh1evUTrDmKMKwvXihk/RYDDl7ucRvPakZdlpt9FVaJfn8T
4p17mMn6w/FUEzg3QSRSg095+VOFfzD+pizBHFbCZDbuQdjd9VAV6JwPDXgXXvWY
m9cSbcoFL2pZj8X03zSt/cEa8ljkbmxp+Q==
-----END CERTIFICATE REQUEST-----
',
          'period'=>'Annually',
          'unique_id'=>'un32ms0902',
          'dcv_method'=>'https',
          'contact_email'=>'1342479179@qq.com',
          'callback'=>'https://xays.top',
          'domains'=> 'www.xays.top',
          'renew'=>'yes',
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
        $data = $client->addSSLOrder($params);
        var_dump($data);die();

        $this->assertStringContainsString('success', $data->status);
    }
}

<?php


namespace TrustOceanSSL\Tests;


class GetPreDomainValidationInformationTest extends TestCase
{
    public function testGetPreDomainValidationInformation()
    {
        $parmams = [
            'domains'=> 'a.nskong.top',
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
            'unique_id'=>'un32'.substr(time(), -6)
        ];
        $data = $this->client->getPreDomainValidationInformation($parmams);

        $this->assertStringContainsString('success', $data->status);
    }
}

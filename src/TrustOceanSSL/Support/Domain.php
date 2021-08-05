<?php

namespace TrustOceanSSL\Support;

use Pdp\Rules;
use Pdp\Domain as PdpDomain;

class Domain
{
    public static function parse(string $domainString)
    {
        $publicSuffixList = Rules::fromPath(__DIR__.'/../../../public_suffix_list.dat');

        $domain = PdpDomain::fromIDNA2008($domainString);

        return $publicSuffixList->resolve($domain);
    }
}

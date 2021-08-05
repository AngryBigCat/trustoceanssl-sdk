<?php


namespace TrustOceanSSL\Support;


use Pdp\Rules;

class Domain
{
    public static function parse(string $domainString)
    {
        $rules = Rules::createFromPath(__DIR__.'/../../../public_suffix_list.dat');

        return $rules->resolve($domainString);
    }
}

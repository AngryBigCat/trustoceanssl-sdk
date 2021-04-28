<?php


namespace TrustOceanSsl\Csr\Utils;


class Csr
{
    public static function generator($distinguishedName, $keyOption = null)
    {
        return new Generator($distinguishedName, $keyOption);
    }

    public static function validator($csr)
    {
        return new Validator($csr);
    }
}

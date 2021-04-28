<?php


namespace TrustOceanSsl\Csr\Utils;


class Validator
{
    private $csr;

    public function __construct($csr)
    {
        $this->csr = $csr;
    }

    public function checkFormat()
    {
        return false !== preg_match('//', $this->csr);
    }
}

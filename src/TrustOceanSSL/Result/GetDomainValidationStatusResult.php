<?php


namespace TrustOceanSSL\Result;

use TrustOceanSSL\Model\DcvInfoDomain;

class GetDomainValidationStatusResult extends Result
{
    public $dcv_info;

    public function getDcvInfoByDomain($domain)
    {
        return new DcvInfoDomain($this->dcv_info[$domain]);
    }
}

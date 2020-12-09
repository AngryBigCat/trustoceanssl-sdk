<?php


namespace TrustOceanSSL\Result;


use TrustOceanSSL\Model\PreDcvInfoDomain;

class GetPreDomainValidationInformationResult extends Result
{
    public $pre_dcv_info;

    public function getPreDcvInfoByDomain($domain)
    {
        return new PreDcvInfoDomain($this->pre_dcv_info[$domain]);
    }
}

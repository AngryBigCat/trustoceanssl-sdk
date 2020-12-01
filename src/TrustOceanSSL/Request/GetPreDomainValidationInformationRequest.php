<?php


namespace TrustOceanSSL\Request;


use TrustOceanSSL\Exception\TrustOceanRequestException;

class GetPreDomainValidationInformationRequest extends Request
{
    public $domains;

    public $csr_code;

    public $unique_id;

    protected function validate()
    {
        if (empty($this->domains)) {
            throw new TrustOceanRequestException('domians 参数错误');
        }
    }
}

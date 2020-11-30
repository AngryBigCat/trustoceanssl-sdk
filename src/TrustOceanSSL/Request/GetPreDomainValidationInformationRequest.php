<?php


namespace TrustOceanSSL\Request;


use TrustOceanSSL\Exception\RequestParamException;

class GetPreDomainValidationInformationRequest extends Request
{
    public $domains;

    public $csr_code;

    public $unique_id;

    protected function validate()
    {
        if (empty($this->domains)) {
            throw new RequestParamException('domians 参数错误');
        }
    }
}
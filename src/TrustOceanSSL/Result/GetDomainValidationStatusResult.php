<?php


namespace TrustOceanSSL\Result;


use TrustOceanSSL\Exception\RequestParamException;

class GetDomainValidationStatusResult extends Result
{
    public $trustocean_id;

    protected function validate()
    {
        if (!$this->trustocean_id || !is_numeric($this->trustocean_id)) {
            throw new RequestParamException('trustocean_id参数出错或不存在');
        }
    }
}

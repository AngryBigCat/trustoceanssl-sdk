<?php


namespace TrustOceanSSL\Request;


use TrustOceanSSL\Exception\RequestParamException;

class ChangeDCVMethodRequest extends Request
{

    public $trustocean_id;

    public $domain;

    public $method;


    protected function validate()
    {
        if (!$this->trustocean_id || !is_numeric($this->trustocean_id)) {
            throw new RequestParamException('trustocean_id参数出错或不存在');
        }
    }
}

<?php


namespace TrustOceanSSL\Request;


use TrustOceanSSL\Exception\RequestParamException;

class ReissueSSLOrderRequest extends Request
{

    public $trustocean_id;

    public $domain;

    public $method;

    public $csr_code;

    public $contact_email;

    public $dcv_method;

    public $unique_id;


    protected function validate()
    {
        if (!$this->trustocean_id || !is_numeric($this->trustocean_id)) {
            throw new RequestParamException('trustocean_id参数出错或不存在');
        }
    }
}

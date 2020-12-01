<?php


namespace TrustOceanSSL\Request;


use TrustOceanSSL\Exception\RequestParamException;

class CheckUniqueIdRequest extends Request
{

    public $unique_id;

    protected function validate()
    {
        if (!$this->unique_id ) {
            throw new RequestParamException('unique_id参数出错或不存在');
        }
    }
}

<?php


namespace TrustOceanSSL\Request;


use TrustOceanSSL\Exception\TrustOceanRequestException;

class CheckUniqueIdRequest extends Request
{

    public $unique_id;

    protected function validate()
    {
        if (!$this->unique_id ) {
            throw new TrustOceanRequestException('unique_id参数出错或不存在');
        }
    }
}

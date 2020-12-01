<?php


namespace TrustOceanSSL\Request;


use TrustOceanSSL\Exception\TrustOceanRequestException;

class RevokeSSLRequest extends Request
{

    public $trustocean_id;

    public $revocationReason;

    protected function validate()
    {
        if (!$this->trustocean_id || !is_numeric($this->trustocean_id)) {
            throw new TrustOceanRequestException('trustocean_id参数出错或不存在');
        }
    }
}

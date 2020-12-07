<?php


namespace TrustOceanSSL\Request;


/**
 * Class GetSSLDetailsRequest
 * @package TrustOceanSSL\Request
 *
 * @property int $trustocean_id
 */
class GetSSLDetailsRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
        ];
    }
}

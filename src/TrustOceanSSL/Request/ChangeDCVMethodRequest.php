<?php


namespace TrustOceanSSL\Request;


/**
 * Class ChangeDCVMethodRequest
 * @package TrustOceanSSL\Request
 *
 * @property int $trustocean_id
 * @property string $domain
 * @property string $method
 */
class ChangeDCVMethodRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
            'domain' => 'required|domain',
            'method' => 'required|checkDcvMethod',
        ];
    }
}

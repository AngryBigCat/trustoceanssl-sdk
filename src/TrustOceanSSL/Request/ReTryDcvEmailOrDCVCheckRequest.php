<?php


namespace TrustOceanSSL\Request;

/**
 * Class ReTryDcvEmailOrDCVCheckRequest
 * @package TrustOceanSSL\Request
 *
 * @property int $trustocean_id
 */
class ReTryDcvEmailOrDCVCheckRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
        ];
    }
}

<?php


namespace TrustOceanSSL\Request;

/**
 * Class CheckRefundStatusRequest
 * @package TrustOceanSSL\Request
 *
 * @property int $trustocean_id
 */
class CheckRefundStatusRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
        ];
    }
}

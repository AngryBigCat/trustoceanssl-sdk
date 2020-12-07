<?php


namespace TrustOceanSSL\Request;

/**
 * Class CancelAndRefundRequest
 * @package TrustOceanSSL\Request
 *
 * @property int $trustocean_id
 */
class CancelAndRefundRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
        ];
    }
}

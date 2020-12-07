<?php


namespace TrustOceanSSL\Request;


/**
 * Class GetOrderStatusRequest
 * @package TrustOceanSSL\Request
 *
 * @property int $trustocean_id
 */
class GetOrderStatusRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
        ];
    }
}

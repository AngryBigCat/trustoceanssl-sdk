<?php


namespace TrustOceanSSL\Request;


class GetOrderStatusRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
        ];
    }
}

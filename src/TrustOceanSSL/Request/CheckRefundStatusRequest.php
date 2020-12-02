<?php


namespace TrustOceanSSL\Request;


class CheckRefundStatusRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
        ];
    }
}

<?php


namespace TrustOceanSSL\Request;


class CancelAndRefundRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
        ];
    }
}

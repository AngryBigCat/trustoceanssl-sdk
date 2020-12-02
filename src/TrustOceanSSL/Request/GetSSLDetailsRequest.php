<?php


namespace TrustOceanSSL\Request;


class GetSSLDetailsRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
        ];
    }
}

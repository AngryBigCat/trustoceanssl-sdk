<?php


namespace TrustOceanSSL\Request;


class ReTryDcvEmailOrDCVCheckRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
        ];
    }
}

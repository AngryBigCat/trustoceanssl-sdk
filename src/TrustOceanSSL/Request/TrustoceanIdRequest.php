<?php


namespace TrustOceanSSL\Request;


class TrustoceanIdRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
        ];
    }
}

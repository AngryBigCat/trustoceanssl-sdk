<?php


namespace TrustOceanSSL\Request;


class RemoveSanDomainRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
            'domain' => 'required|domain',
        ];
    }
}

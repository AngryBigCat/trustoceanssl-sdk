<?php


namespace TrustOceanSSL\Request;


class GetDomainValidationStatusRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
        ];
    }
}

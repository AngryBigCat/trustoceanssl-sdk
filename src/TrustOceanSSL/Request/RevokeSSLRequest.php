<?php


namespace TrustOceanSSL\Request;


class RevokeSSLRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
            'revocationReason' => 'required|string',
        ];
    }
}

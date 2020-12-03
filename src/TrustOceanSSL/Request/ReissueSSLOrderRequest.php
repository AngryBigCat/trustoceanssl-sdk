<?php


namespace TrustOceanSSL\Request;


class ReissueSSLOrderRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
            'domains' => 'required|domains',
            'dcv_method' => 'required|checkDcvMethod',
            'csr_code' => 'required|checkCsrCode',
            'contact_email' => 'required|email',
            'unique_id' => 'required|string|between:8,15',
        ];
    }
}

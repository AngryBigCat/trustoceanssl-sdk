<?php


namespace TrustOceanSSL\Request;


class GetPreDomainValidationInformationRequest extends Request
{
    protected function rules()
    {
        return [
            'domains' => 'required|domains',
            'csr_code' => 'required|checkCsrCode',
            'unique_id' => 'required|string|between:8,15',
        ];
    }
}

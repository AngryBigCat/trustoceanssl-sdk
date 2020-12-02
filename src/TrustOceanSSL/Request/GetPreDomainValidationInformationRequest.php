<?php


namespace TrustOceanSSL\Request;


class GetPreDomainValidationInformationRequest extends Request
{
    protected function rules()
    {
        return [
            'domains' => 'required|integer',
            'csr_code' => 'required|checkCsrCode',
            'unique_id' => 'required|checkUniqueId',
        ];
    }
}

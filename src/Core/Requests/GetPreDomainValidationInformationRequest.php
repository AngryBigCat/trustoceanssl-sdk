<?php


namespace TrustOceanSSL\Core\Requests;


class GetPreDomainValidationInformationRequest
{
    public function rules()
    {
        return [
            'domains' => 'required',
            'csr_code' => 'required',
            'unique_id' => 'required',
        ];
    }
}

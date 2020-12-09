<?php


namespace TrustOceanSSL\Request;


/**
 * Class GetPreDomainValidationInformationRequest
 * @package TrustOceanSSL\Request
 *
 * @property array $domains
 * @property string $csr_code
 * @property string $unique_id
 */
class GetPreDomainValidationInformationRequest extends Request
{
    protected function rules()
    {
        return [
            'domains' => 'required|domains',
            'csr_code' => 'required|csr',
            'unique_id' => 'required|string|between:8,15',
        ];
    }

    protected function parseDomains()
    {
        return implode(',', $this->domains);
    }
}

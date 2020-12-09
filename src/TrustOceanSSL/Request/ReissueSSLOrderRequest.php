<?php


namespace TrustOceanSSL\Request;


/**
 * Class ReissueSSLOrderRequest
 * @package TrustOceanSSL\Request
 *
 * @property int $trustocean_id
 * @property array $domains
 * @property array $dcv_method
 * @property string $csr_code
 * @property string $contact_email
 * @property string $unique_id
 */
class ReissueSSLOrderRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
            'domains' => 'required|array|domains|size:dcv_method|distinct',
            'dcv_method' => 'required|array|dcv_methods|size:domains',
            'csr_code' => 'required|csr|max:32767',
            'contact_email' => 'required|email',
            'unique_id' => 'required|string|between:8,15',
        ];
    }

    protected function parseDomains()
    {
        return implode(',', $this->domains);
    }

    protected function parseDcvMethod()
    {
        return implode(',', $this->dcv_method);
    }
}

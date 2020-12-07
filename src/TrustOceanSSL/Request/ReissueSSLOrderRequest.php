<?php


namespace TrustOceanSSL\Request;


/**
 * Class ReissueSSLOrderRequest
 * @package TrustOceanSSL\Request
 *
 * @property int $trustocean_id
 * @property array $domains
 * @property string $dcv_method
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
            'domains' => 'required|domains',
            'dcv_method' => 'required|checkDcvMethod',
            'csr_code' => 'required|checkCsrCode',
            'contact_email' => 'required|email',
            'unique_id' => 'required|string|between:8,15',
        ];
    }
}

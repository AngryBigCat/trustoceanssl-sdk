<?php


namespace TrustOceanSSL\Request;


/**
 * Class AddSSLOrderRequest
 * @package TrustOceanSSL\Request
 *
 * @property int $pid
 * @property string $csr_code
 * @property string $period
 * @property array $dcv_method
 * @property string $unique_id
 * @property string $contact_email
 * @property string $callback
 * @property array $domains
 * @property string $renew
 * @property string $organization_name
 * @property string $organizationalUnitName
 * @property string $registered_address_line1
 * @property string $registered_no
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $postal_code
 * @property string $organization_phone
 * @property string $date_of_incorporation
 * @property string $contact_name
 * @property string $contact_title
 * @property string $contact_phone
 */
class AddSSLOrderRequest extends Request
{
    protected function rules()
    {
        return [
            'pid'                       => 'required|integer',
            'csr_code'                  => 'required|csr|max:32767',
            'period'                    => 'required|in:Monthly,Quarterly,Annually,Biennially,Triennially,Quadrennial,Quinquennial',
            'dcv_method'                => 'required|array|dcv_methods|size:domains',
            'unique_id'                 => 'required|string|between:8,20',
            'contact_email'             => 'required|email',
            'callback'                  => 'required|url',
            'domains'                   => 'required|array|domains|size:dcv_method|distinct',
            'renew'                     => 'required|in:yes,no',
            'organization_name'         => 'string|max:64',
            'organizationalUnitName'    => 'string|max:64',
            'registered_address_line1'  => 'string|max:128',
            'registered_no'             => 'string',
            'country'                   => 'string|max:2',
            'state'                     => 'string|max:128',
            'city'                      => 'string|max:128',
            'postal_code'               => 'string|max:40',
            'organization_phone'        => 'string',
            'date_of_incorporation'     => 'string',
            'contact_name'              => 'string',
            'contact_title'             => 'string',
            'contact_phone'             => 'string',
        ];
    }

    public function parseDomains($value)
    {
        $this->domains = implode(',', $value);
    }

    public function parseDcvMethod($value)
    {
        $this->dcv_method = implode(',', $value);
    }
}

<?php


namespace TrustOceanSSL\Request;


class AddSSLOrderRequest extends Request
{
    protected function rules()
    {
        return [
            'pid'                       => 'required|integer',
            'csr_code'                  => 'required|checkCsrCode',
            'period'                    => 'required|in:Monthly,Quarterly,Annually,Biennially,Triennially,Quadrennial,Quinquennial',
            'dcv_method'                => 'required|checkDcvMethod|checkEqualLength:domains',
            'unique_id'                 => 'required|string|between:8,15',
            'contact_email'             => 'required|email',
            'callback'                  => 'required|url',
            'domains'                   => 'required|domains|checkEqualLength:dcv_method|max:32767|noRepeat',
            'renew'                     => 'required|in:yes,no',
            'organization_name'         => 'string',
            'organizationalUnitName'    => 'string',
            'registered_address_line1'  => 'string',
            'registered_no'             => 'string',
            'country'                   => 'string',
            'state'                     => 'string',
            'city'                      => 'string',
            'postal_code'               => 'string',
            'organization_phone'        => 'string',
            'date_of_incorporation'     => 'string',
            'contact_name'              => 'string',
            'contact_title'             => 'string',
            'contact_phone'             => 'string',
        ];
    }
}

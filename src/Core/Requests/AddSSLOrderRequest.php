<?php


namespace TrustOceanSSL\Core\Requests;


use Respect\Validation\Validator as v;

class AddSSLOrderRequest
{
    public function rules($data)
    {

        return v::key('pid', '')
            ->key('csr_code', '')
            ->key('period', '')
            ->key('dcv_method', '')
            ->key('username', '')
            ->key('password', '')
            ->key('unique_id', '')
            ->key('contact_email', '')
            ->key('callback', '')
            ->key('domains', '')
            ->key('renew', '')
            ->key('organization_name', '')
            ->key('organizationalUnitName', '')
            ->key('registered_address_line1', '')
            ->key('registered_no', '')
            ->key('country', '')
            ->key('state', '')
            ->key('city', '')
            ->key('postal_code', '')
            ->key('organization_phone', '')
            ->key('date_of_incorporation', '')
            ->key('contact_name', '')
            ->key('contact_title', '')
            ->key('contact_phone', '')
            ->validate($data);


        return [
            'pid' =>  "required|",
            'csr_code' =>  "required|",
            'period' =>  "required|",
            'dcv_method' =>  "required|",
            'username' =>  "required|",
            'password' =>  "required|",
            'unique_id' =>  "required|",
            'contact_email' =>  "required|",
            'callback' =>  "required|",
            'domains' =>  "required|",
            'renew' =>  "required|",
            'organization_name' =>  "<string>",
            'organizationalUnitName' =>  "<string>",
            'registered_address_line1' =>  "<string>",
            'registered_no' =>  "<string>",
            'country' =>  "<string>",
            'state' =>  "<string>",
            'city' =>  "<string>",
            'postal_code' =>  "<string>",
            'organization_phone' =>  "<string>",
            'date_of_incorporation' =>  "<string>",
            'contact_name' =>  "<string>",
            'contact_title' =>  "<string>",
            'contact_phone' =>  "<string>"
        ];
    }
}

<?php


namespace TrustOceanSSL\Request;


use TrustOceanSSL\Exception\RequestParamException;

class AddSSLOrderRequest extends Request
{
    public $pid;

    public $csr_code;

    public $period;

    public $dcv_method;

    public $unique_id;

    public $contact_email;

    public $callback;

    public $domains;

    public $renew;

    public $organization_name;

    public $organizationalUnitName;

    public $registered_address_line1;

    public $registered_no;

    public $country;

    public $state;

    public $city;

    public $postal_code;

    public $organization_phone;

    public $date_of_incorporation;

    public $contact_name;

    public $contact_title;

    public $contact_phone;

    protected function validate()
    {
        if (!$this->pid || !is_numeric($this->pid)) {
            throw new RequestParamException('pid参数出错或不存在');
        }
    }
}

<?php


namespace TrustOceanSSL\Model;


class PreDcvInfoDomain extends Model
{
    public $isip;

    public $subdomain;

    public $topdomain;

    public $auth_email_addresses;

    public $dns_cname;

    public $http;

    public $https;

    public function getDnsCname()
    {
        return new PreDcvInfoDomainDns($this->dns_cname);
    }

    public function getHttp()
    {
        return new PreDcvInfoDomainHttp($this->http);
    }

    public function getHttps()
    {
        return new PreDcvInfoDomainHttps($this->https);
    }
}

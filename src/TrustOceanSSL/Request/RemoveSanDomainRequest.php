<?php


namespace TrustOceanSSL\Request;


use TrustOceanSSL\Exception\RequestParamException;

class RemoveSanDomainRequest extends Request
{

    public $trustocean_id;

    public $domain;

}

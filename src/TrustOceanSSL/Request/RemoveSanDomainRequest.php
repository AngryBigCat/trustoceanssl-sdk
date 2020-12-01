<?php


namespace TrustOceanSSL\Request;


use TrustOceanSSL\Exception\TrustOceanRequestException;

class RemoveSanDomainRequest extends Request
{
    public $trustocean_id;

    public $domain;
}

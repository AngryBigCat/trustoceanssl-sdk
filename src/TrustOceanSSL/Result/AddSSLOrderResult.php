<?php


namespace TrustOceanSSL\Result;


use TrustOceanSSL\Model\DcvInfoDomain;

class AddSSLOrderResult extends Result
{
    public $vendor_id;

    public $certificate_id;

    public $cert_status;

    public $unique_id;

    public $created_at;

    public $trustocean_id;

    public $csr_code;

    public $contact_email;

    public $domains;

    public $dcv_info;

    public function getDcvInfoByDomain($domain)
    {
        return new DcvInfoDomain($this->dcv_info[$domain]);
    }
}

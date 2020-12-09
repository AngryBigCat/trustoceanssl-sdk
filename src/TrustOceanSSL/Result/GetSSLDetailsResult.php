<?php


namespace TrustOceanSSL\Result;

use TrustOceanSSL\Model\DcvInfoDomain;

class GetSSLDetailsResult extends Result
{

    public $vendor_id;

    public $cert_status;

    public $unique_id;

    public $created_at;

    public $trustocean_id;

    public $class;

    public $product_name;

    public $is_multidomain;

    public $domain_count;

    public $csr_code;

    public $cert_code;

    public $ca_code;

    public $contact_email;

    public $domains;

    public $dcv_info;

    public function getDcvInfoByDomain($domain)
    {
        return new DcvInfoDomain($domain);
    }

}

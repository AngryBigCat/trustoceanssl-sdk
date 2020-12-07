<?php


namespace TrustOceanSSL\Request;


/**
 * Class TrustoceanIdAndDomainRequest
 * @package TrustOceanSSL\Request
 *
 * @property int $trustocean_id
 * @property string $domain
 */
class TrustoceanIdAndDomainRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
            'domain' => 'required|domain',
        ];
    }
}

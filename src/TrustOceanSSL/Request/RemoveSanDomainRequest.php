<?php


namespace TrustOceanSSL\Request;


/**
 * Class RemoveSanDomainRequest
 * @package TrustOceanSSL\Request
 *
 * @property int $trustocean_id
 * @property string $domain
 */
class RemoveSanDomainRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
            'domain' => 'required|domain',
        ];
    }
}

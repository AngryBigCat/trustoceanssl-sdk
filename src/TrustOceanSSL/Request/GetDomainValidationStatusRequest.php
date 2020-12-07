<?php


namespace TrustOceanSSL\Request;

/**
 * Class GetDomainValidationStatusRequest
 * @package TrustOceanSSL\Request
 *
 * @property int $trustocean_id
 */
class GetDomainValidationStatusRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
        ];
    }
}

<?php


namespace TrustOceanSSL\Request;


/**
 * Class RevokeSSLRequest
 * @package TrustOceanSSL\Request
 *
 * @property int $trustocean_id
 * @property string $revocationReason
 */
class RevokeSSLRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
            'revocationReason' => 'required|string',
        ];
    }
}

<?php


namespace TrustOceanSSL\Request;


/**
 * Class TrustoceanIdRequest
 * @package TrustOceanSSL\Request
 *
 * @property int $trustocean_id
 */
class TrustoceanIdRequest extends Request
{
    protected function rules()
    {
        return [
            'trustocean_id' => 'required|integer',
        ];
    }
}

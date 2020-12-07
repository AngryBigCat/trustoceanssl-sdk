<?php


namespace TrustOceanSSL\Request;


/**
 * Class CheckUniqueIdRequest
 * @package TrustOceanSSL\Request
 *
 * @property string $unique_id
 */
class CheckUniqueIdRequest extends Request
{
    protected function rules()
    {
        return [
            'unique_id' => 'required|string|between:8,15',
        ];
    }
}

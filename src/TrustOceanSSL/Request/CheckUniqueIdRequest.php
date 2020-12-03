<?php


namespace TrustOceanSSL\Request;


class CheckUniqueIdRequest extends Request
{
    protected function rules()
    {
        return [
            'unique_id' => 'required|string',
        ];
    }
}

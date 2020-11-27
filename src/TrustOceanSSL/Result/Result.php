<?php


namespace TrustOceanSSL\Result;


use TrustOceanSSL\Concerns\HasAttributes;

class Result
{
    use HasAttributes;

    public $status;

    public $error_code;

    public $message;

    public function __construct($attributes = [])
    {
        $this->fill($attributes);

        $this->fillParse($attributes);
    }
}

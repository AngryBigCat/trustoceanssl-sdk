<?php


namespace TrustOceanSSL\Request;


use TrustOceanSSL\Concerns\HasAttributes;

class Request
{
    use HasAttributes;

    public $username;

    public $password;

    public function __construct($params = [])
    {
        $this->validate();

        $this->fill($params);
    }

    protected function validate()
    {
        return true;
    }
}

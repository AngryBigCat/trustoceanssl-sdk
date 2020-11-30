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
        $this->fill($params);

        $this->validate();
    }

    protected function validate()
    {
        return true;
    }
}

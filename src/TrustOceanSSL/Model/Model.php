<?php


namespace TrustOceanSSL\Model;


use TrustOceanSSL\Model\Concerns\HasAttributes;

class Model
{
    use HasAttributes;

    public function __construct($attributes = [])
    {
        $this->fill($attributes);
    }

    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        } else {
            return '';
        }
    }
}

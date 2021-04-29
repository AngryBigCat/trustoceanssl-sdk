<?php


namespace TrustOceanSSL\Core\Validation;


class Validator
{
    private $name;

    private $arguments;


    public function __construct($name, $arguments)
    {
        $this->name = $name;

        $this->arguments = $arguments;
    }


    public static function make($name, $arguments)
    {
        return new self($name, $arguments);
    }
}

<?php


namespace TrustOceanSSL\Result;


use TrustOceanSSL\Model\Concerns\HasAttributes;

class Result
{
    use HasAttributes;

    public $status;

    public $error_code;

    public $message;

    public function __construct($attributes = [])
    {
        $this->fill($attributes);

        $this->validate();
    }

    public function validate()
    {
//        暂时注释，用户自行处理接口错误
//        if ($this->status !== 'success') {
//            throw new TrustOceanResultException($this->message);
//        }
    }
}

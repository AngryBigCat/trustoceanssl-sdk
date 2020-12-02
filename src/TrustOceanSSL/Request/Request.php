<?php


namespace TrustOceanSSL\Request;


use TrustOceanSSL\Exception\TrustOceanRequestException;
use TrustOceanSSL\Model\Concerns\HasAttributes;
use TrustOceanSSL\Validation\Validator;

class Request
{
    use HasAttributes;

    protected $username;

    protected $password;

    public function __construct($params = [])
    {
        $this->validate($params);

        $this->fill($params);
    }

    protected function validate($params)
    {
        $validator = new Validator($params, $this->rules(), $this->messages());
        if (!$validator->passes()) {
            $messages = $validator->messages();
            throw new TrustOceanRequestException($messages[0]);
        }
    }

    protected function rules()
    {
        // todo:: 子类覆盖此方法
        return [];
    }

    protected function messages()
    {
        return [
            'required' => '您输入的 :attribute 字段值必须存在',
            'integer' => '您输入的 :attribute 字段值必须为int类型',
            'checkCsrCode' => '您输入的 :attribute 字段值格式不正确',
        ];
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}

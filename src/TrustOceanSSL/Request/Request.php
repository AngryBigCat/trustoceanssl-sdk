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
            'in' => '您输入的 :attribute 字段值不在可输入值的范围内 ',
            'url' => '您输入的 :attribute HTTPS URL格式不正确',
            'domains' => '您输入的 :attribute 域名组格式不正确',
            'domain' => '您输入的 :attribute 域名格式不正确',
            'email' => '您输入的 :attribute Email地址不正确',
            'string' => '您输入的 :attribute 必须为字符串类型',
            'checkDcvMethod' => '您输入的 :attribute 域名验证方式格式不正确',
            'max' => '您输入的 :attribute 内容长度不能超过 :param1',
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

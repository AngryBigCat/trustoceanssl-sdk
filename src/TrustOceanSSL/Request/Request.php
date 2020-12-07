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

        $this->parse($params);
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
            'csr' => '您输入的 :attribute 字段值不是正确的CSR内容格式',
            'in' => '您输入的 :attribute 字段值不在可输入值的范围内',
            'url' => '您输入的 :attribute 字段值不是正确URL格式',
            'domains' => '您输入的 :attribute 字段值域名组格式不正确',
            'domain' => '您输入的 :attribute 字段值域名格式不正确',
            'email' => '您输入的 :attribute 字段值Email地址不正确',
            'string' => '您输入的 :attribute 字段值必须为字符串类型',
            'dcv_methods' => '您输入的 :attribute 字段值格式不正确',
            'max' => '您输入的 :attribute 字段值长度不能超过 :param0 位',
            'min' => '您输入的 :attribute 字段值长度不能小于 :param0 位',
            'distinct' => '您输入的 :attribute 字段值内容不能重复',
            'size' => '您输入的 :attribute 字段值长度必须等于 :param0 字段值的长度',
            'between' => '您输入的 :attribute 字段值长度必须介于 :param0 到 :param1 位之间',
            'array' => '您输入的 :attribute 字段值必须是数组类型',
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

<?php


namespace TrustOceanSSL\Validation;


use TrustOceanSSL\Support\Str;
use TrustOceanSSL\Validation\Concerns\ValidatesAttributes;

class Validator
{
    use ValidatesAttributes;

    protected $data;

    protected $rules;

    protected $messages;

    protected $customMessages;

    public function __construct($data, $rules, $customMessages = [])
    {
        $this->data = $this->parseData($data);
        $this->rules = $this->parseRules($rules);
        $this->customMessages = $customMessages;
    }

    public function passes()
    {
        foreach ($this->rules as $attribute => $rules) {
            foreach ($rules as $rule) {
                $this->validateAttribute($attribute, $rule);
            }
        }

        return empty($this->messages);
    }

    public function messages()
    {
        if (empty($this->messages)) {
            $this->passes();
        }

        return $this->messages;
    }

    protected function parseData(array $data)
    {
        $newData = [];

        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $value = $this->parseData($value);
            }

            $newData[$key] = $value;
        }

        return $newData;
    }

    protected function parseRules(array $rules)
    {
        foreach ($rules as $key => $rule) {
            $rules[$key] = explode('|', $rule);
        }
        return $rules;
    }

    protected function validateAttribute($attribute, $rule)
    {
        [$rule, $params] = $this->parseStringRule($rule);
        if ($rule === '') {
            return;
        }

        $value = $this->getValue($attribute);


        $method = "validate{$rule}";

        if (!$this->$method($attribute, $value, $params)) {
            $this->addFailure($attribute, $rule, $params);
        }
    }

    protected function parseStringRule($rules)
    {
        $params = [];
        if (strpos($rules, ':') !== false) {
            [$rules, $params] = explode(':', $rules, 2);

            $params = str_getcsv($params);
        }

        return [Str::studly(trim($rules)), $params];
    }

    protected function getValue($attribute)
    {
        if (!isset($this->data[$attribute])) {
            return '';
        }

        return $this->data[$attribute];
    }

    protected function addFailure($attribute, $rule, $params)
    {
        if (!isset($this->customMessages[Str::snake($rule)])) {
            $this->messages[] = "您输入的 $attribute 内容格式不正确, $rule";
        } else {
            $msg = str_replace(':attribute', $attribute, $this->customMessages[Str::snake($rule)]);
            foreach ($params as $key => $param) {
                $msg = str_replace(":param{$key}", $param, $msg);
            }

            $this->messages[] = $msg;
        }
    }
}

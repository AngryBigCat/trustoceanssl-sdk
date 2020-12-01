<?php


namespace TrustOceanSSL\Concerns;


trait HasAttributes
{
    protected function fill($attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }
    }


    protected function fillParse($attributes)
    {
        foreach ($attributes as $key => $value) {
            $method_name = "parse" . ucfirst($key);
            if (method_exists($this, $method_name)) {
                call_user_func([$this, $method_name]);
            }
        }
    }

    protected function setAttribute($key, $value)
    {
        $this->$key = $value;
    }

    public function toArray()
    {
        $vars = get_object_vars($this);

        $data = [];
        foreach ($vars as $key => $value) {
            $data[$key] = $value;
        }

        return $data;
    }
}

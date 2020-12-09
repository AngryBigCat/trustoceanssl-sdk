<?php


namespace TrustOceanSSL\Model\Concerns;


use TrustOceanSSL\Support\Str;

trait HasAttributes
{
    protected function fill($attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }
    }

    protected function parse($attributes)
    {
        foreach ($attributes as $key => $value) {
            $method = 'parse' . Str::studly($key);
            if (method_exists($this, $method)) {
                $result = call_user_func([$this, $method], $value);

                $this->setAttribute($key, $result);
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

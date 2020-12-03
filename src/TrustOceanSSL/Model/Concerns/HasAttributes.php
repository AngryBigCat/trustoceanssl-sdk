<?php


namespace TrustOceanSSL\Model\Concerns;


trait HasAttributes
{
    protected function fill($attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
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

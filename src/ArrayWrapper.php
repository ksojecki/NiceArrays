<?php

namespace ksojecki\NiceArrays;

class ArrayWrapper
{
    private $array = [];

    /**
     * @param array $array
     */
    public function __construct($array = [])
    {
        $this->array = $array;
    }

    public function wrappedArray()
    {
        return $this->array;
    }

    public function get($key)
    {
        if (!array_key_exists($key, $this->array)) {
            throw new ArrayAccessException('Key does not exists in array');
        }

        return $this->array[$key];
    }
}

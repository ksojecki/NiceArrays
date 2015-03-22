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

    /**
     * Returns wrapped array. Use it if you want to get vanilla php array
     * @return array
     */
    public function wrappedArray()
    {
        return $this->array;
    }

    public function get($key)
    {
        if (!$this->keyExists($key)) {
            throw new ArrayAccessException('Key does not exist in array');
        }

        return $this->array[$key];
    }

    public function add($value)
    {
        $this->array[] = $value;
    }

    public function addWithKey($key, $value)
    {
        $this->array[$key] = $value;
    }

    /**
     * @param $array []
     */
    public function addRange($array)
    {
        $this->array = array_merge($this->array, $array);
    }

    public function first()
    {
        if($this->isEmpty()) throw new ArrayAccessException('Array is empty');
        return $this->array[0];
    }

    public function last()
    {
        if($this->isEmpty()) throw new ArrayAccessException('Array is empty');
        return $this->array[$this->size() - 1];
    }

    public function size()
    {
        return count($this->array);
    }

    public function isEmpty()
    {
        return empty($this->array);
    }

    public function clean()
    {
        $this->array = [];
    }

    public function keyExists($key)
    {
        return array_key_exists($key, $this->array);
    }

    public function valueExists($value)
    {
        return in_array($value, $this->array);
    }

    public function column($columnKey, $indexKey = null)
    {
        return array_column($this->array, $columnKey, $indexKey);
    }
}

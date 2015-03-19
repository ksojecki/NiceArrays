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
            throw new ArrayAccessException('Key does not exist in array');
        }

        return $this->array[$key];
    }

    public function add($object)
    {
        $this->array[] = $object;
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

    public function addRange($array)
    {
        $this->array = array_merge($this->array, $array);
    }
}

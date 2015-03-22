<?php

namespace ksojecki\NiceArrays;

class ArrayWrapper implements \ArrayAccess
{
    private $array = [];

    /**
     * @param array $array
     */
    public function __construct($array = [])
    {
        $this->array = $array;
    }

    public function offsetExists($offset)
    {
        return $this->keyExists($offset);
    }

    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    public function offsetSet($offset, $value)
    {
        if($offset === null) {
            $this->add($value);
            return;
        }

        $this->addWithKey($offset, $value);
    }

    public function offsetUnset($offset)
    {
        $this->delete($offset);
    }

    /**
     * Returns wrapped array. Use it if you want to get vanilla php array
     * @return array
     */
    public function wrappedArray()
    {
        return $this->array;
    }

    /**
     * @param $key mixed
     * @return mixed
     * @throws ArrayAccessException
     */
    public function get($key)
    {
        if (!$this->keyExists($key)) {
            throw new ArrayAccessException('Key does not exist in array');
        }

        return $this->array[$key];
    }

    /**
     * Returns new array with only that values that are provided in keys
     * @param $keys []
     * @return array|ArrayWrapper
     * @throws ArrayAccessException
     */
    public function getValues($keys)
    {
        $values = new self();

        foreach ($keys as $key) {
            $values[$key] = $this->get($key);
        }

        return $values;
    }

    public function add($value)
    {
        $this->array[] = $value;
    }

    public function addWithKey($key, $value)
    {
        $this->array[$key] = $value;
    }

    public function delete($key)
    {
        unset($this->array[$key]);
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
        return $this[$this->size() - 1];
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

    public function countValues()
    {
        return array_count_values($this->array);
    }
}

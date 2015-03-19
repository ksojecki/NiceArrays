<?php

namespace ksojecki\NiceArrays;

class EmptyArrayException extends ArrayAccessException
{
    public function __construct($message = "Empty array", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

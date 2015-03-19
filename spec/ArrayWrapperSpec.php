<?php

namespace spec\ksojecki\NiceArrays;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArrayWrapperSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('ksojecki\NiceArrays\ArrayWrapper');
    }
}

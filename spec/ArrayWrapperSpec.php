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

    function it_should_return_wrapped_array()
    {
        $array = [1, 2, 3];
        $this->beConstructedWith($array);
        $this->wrappedArray()->shouldBe($array);
    }

    function it_should_get_value_by_key()
    {
        $array = [1, 2, 3];
        $this->beConstructedWith($array);
        $this->get(1)->shouldBe(2);
    }

    function it_should_throw_exception_if_object_is_not_found_by_key()
    {
        $array = [1, 2, 3];
        $this->beConstructedWith($array);
        $this->shouldThrow('ksojecki\NiceArrays\ArrayAccessException')->duringGet(3);
    }
}

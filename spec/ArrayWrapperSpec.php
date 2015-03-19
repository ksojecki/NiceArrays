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

    function it_return_wrapped_array()
    {
        $this->beConstructedWith([1, 2, 3]);
        $this->wrappedArray()->shouldBe([1, 2, 3]);
    }

    function it_get_value_by_key()
    {
        $this->beConstructedWith([1, 2, 3]);
        $this->get(1)->shouldBe(2);
    }

    function it_throws_exception_if_object_is_not_found_by_key()
    {
        $this->beConstructedWith([1, 2, 3]);
        $this->shouldThrow('ksojecki\NiceArrays\ArrayAccessException')->duringGet(3);
    }

    function it_returns_first_element()
    {
        $this->beConstructedWith([1, 2, 3]);
        $this->first()->shouldReturn(1);
    }

    function it_throw_exception_if_array_is_empty_when_accessing_first_element()
    {
        $this->shouldThrow('ksojecki\NiceArrays\EmptyArrayException')->duringFirst();
    }

    function it_return_last_element()
    {
        $this->beConstructedWith([1, 2, 3]);
        $this->last()->shouldReturn(3);
    }

    function it_throw_exception_if_array_is_empty_when_accessing_last_element()
    {
        $this->shouldThrow('ksojecki\NiceArrays\EmptyArrayException')->duringLast();
    }
}

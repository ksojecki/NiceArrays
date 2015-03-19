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
        $this->shouldThrow('ksojecki\NiceArrays\ArrayAccessException')->duringFirst();
    }

    function it_return_last_element()
    {
        $this->beConstructedWith([1, 2, 3]);
        $this->last()->shouldReturn(3);
    }

    function it_throw_exception_if_array_is_empty_when_accessing_last_element()
    {
        $this->shouldThrow('ksojecki\NiceArrays\ArrayAccessException')->duringLast();
    }

    function it_checks_id_array_is_empty()
    {
        $this->isEmpty()->shouldBe(true);
    }

    function it_checks_if_array_is_not_empty()
    {
        $this->beConstructedWith([1, 2, 3]);
        $this->isEmpty()->shouldBe(false);
    }

    function it_return_size_of_array()
    {
        $this->beConstructedWith([1, 2, 3]);
        $this->size()->shouldBe(3);
    }

    function it_adds_object_at_the_end_of_array()
    {
        $this->beConstructedWith([1, 3, 4]);
        $this->add(2);
        $this->last()->shouldBe(2);
        $this->size()->shouldBe(4);
    }

    function it_adds_range_of_values_at_the_end_of_array()
    {
        $this->beConstructedWith([1, 5, 6]);
        $this->addRange([2, 3, 4]);
        $this->size()->shouldBe(6);
        $this->wrappedArray()->shouldBe([1, 5, 6, 2, 3, 4]);
    }

    function it_adds_value_with_key()
    {
        $this->beConstructedWith(['a'=> 1, 'b' => '2']);
        $this->addWithKey('c', 3);
        $this->get('c')->shouldBe(3);
    }

    function it_checks_if_key_exists()
    {
        $this->beConstructedWith(['a'=> 1, 'b' => '2']);
        $this->keyExists('b')->shouldBe(true);
    }

    function it_checks_if_key_not_exists()
    {
        $this->beConstructedWith(['a'=> 1, 'b' => '2']);
        $this->keyExists('c')->shouldBe(false);
    }
}

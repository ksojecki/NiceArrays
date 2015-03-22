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

    function it_checks_if_value_exists()
    {
        $this->beConstructedWith(['a'=> 1, 'b' => '2']);
        $this->valueExists(1)->shouldBe(true);
    }

    function it_checks_if_value_not_exists()
    {
        $this->beConstructedWith(['a'=> 1, 'b' => '2']);
        $this->valueExists('b')->shouldBe(false);
    }

    function it_remove_all_items()
    {
        $this->beConstructedWith(['a'=> 1, 'b' => '2']);
        $this->clean();
        $this->size()->shouldBe(0);
    }

    function it_should_return_single_column()
    {
        $this->beConstructedWith([['a'=> 1, 'b' => 2], ['a' => 1, 'b' => 3]]);
        $this->column('b')->shouldBe([2, 3]);
    }

    function it_should_return_empty_array_if_key_dont_exists()
    {
        $this->beConstructedWith([['a'=> 1, 'b' => 2], ['a' => 1, 'b' => 3]]);
        $this->column('c')->shouldBe([]);
    }

    function it_should_count_values()
    {
        $this->beConstructedWith([1, 2, 4, 1, 4, 3]);
        $this->countValues()->shouldBe([1 => 2, 2 => 1, 4 => 2, 3 => 1]);
    }

    function it_should_get_values_like_an_arays()
    {
        $this->beConstructedWith([1, 3, 3]);
        $this[0]->shouldBe(1);
    }

    function it_should_add_values_like_an_arays()
    {
        $this->beConstructedWith([1, 3, 3]);
        $this[] = 4;
        $this->size()->shouldBe(4);
    }

    function it_should_add_values__vith_keys_like_an_arays()
    {
        $this->beConstructedWith([1, 3, 3]);
        $this['test'] = 4;
        $this['test']->shouldBe(4);
    }

    function it_should_create_array_with_keys_that_are_provided_in_arguments()
    {
        $this->beConstructedWith(['a' => 'b', 'b'=> 'c', 'd' => 'e']);
        $this->getValues(['a', 'b'])->wrappedArray()->shouldBe(['a' => 'b', 'b' => 'c']);
        return $this;
    }

    function it_should_be_abble_to_add_multiple_new_arrays(){
        $this[] = 'a';
        $this[] = 'b';

        $this->size()->shouldBe(2);
    }
}

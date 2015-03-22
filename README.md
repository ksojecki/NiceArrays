# NiceArrays
![alt tag](http://phpci.sojecki.pl//build-status/image/1)

Simple wrapper for PHP array functions. Please notice that this functionality is at very beginning of development 

## Usage 

General idea is just wrap you generic array into this nice object and use method provided by this class. 

```php

$vanillaPhpArray = ['key' => 'Hello World', 'anotherKey' => ' it is really nice here'];
$array = new \ksojecki\NiceArrays\ArrayWrapper($vanillaPhpArray);

echo $array['key'];
echo $array->last();

```

You don't have to be pissed off about haystack/needle function argument and weird naming convention. You can simply mock this object and use it in test, because you are operating on object. Pure happiness.

When it was possible methods are throwing an exception. You don't have to think about warnings, checking if key exists. You have to just catch an exception on that application a layer that you want. Just like in C# :) 
If you want see example of usage please look at specs (spec/ArrayWrapperSpec.php and etc). 


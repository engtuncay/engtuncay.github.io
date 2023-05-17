<h1>Introduction to Php</h1> 

- [String and Texts](#string-and-texts)
  - [String concentation](#string-concentation)
  - [Template Literal (String Format)](#template-literal-string-format)
- [Php Numbers (W3S)](#php-numbers-w3s)
  - [Integers](#integers)
  - [Floats](#floats)
  - [Infinity](#infinity)
  - [NaN](#nan)
  - [Numerical Strings](#numerical-strings)
  - [Casting Strings and Floats to Integers](#casting-strings-and-floats-to-integers)
- [Date And Time](#date-and-time)
- [Arrays](#arrays)
  - [Array Functions (1)](#array-functions-1)
  - [Array Functions (2)](#array-functions-2)

# String and Texts

## String concentation 

- '.' işareti ile string birleştirme yapılır.

(tor:concentation:birleştirme)

```php
$adi = 'Ali';
$sayi1 = 10;
echo $adi . $sayi1;

// Output
// Ali10

```

## Template Literal (String Format)

# Php Numbers (W3S)

Source : <a href="https://www.w3schools.com/php/php_numbers.asp" target="_blank">W3Schools</a> 

In this chapter we will look in depth into *Integers, Floats, and Number Strings*.

One thing to notice about PHP is that it provides automatic data type conversion.

So, if you assign an integer value to a variable, the type of that variable will automatically be an integer. Then, if you assign a string to the same variable, the type will change to a string.

This automatic conversion can sometimes break your code.

## Integers

2, 256, -256, 10358, -179567 are all integers.

An integer is a number without any decimal part.

An integer data type is a non-decimal number between -2147483648 and 2147483647 in 32 bit systems, and between -9223372036854775808 and 9223372036854775807 in 64 bit systems. A value greater (or lower) than this, will be stored as float, because it exceeds the limit of an integer.

Note: Another important thing to know is that even if 4 * 2.5 is 10, the result is stored as float, because one of the operands is a float (2.5).

Here are some rules for integers:

- An integer must have at least one digit
- An integer must NOT have a decimal point
- An integer can be either positive or negative
- Integers can be specified in three formats: decimal (10-based), hexadecimal (16-based - prefixed with 0x) or octal (8-based - prefixed with 0)

PHP has the following predefined constants for integers:

- PHP_INT_MAX - The largest integer supported
- PHP_INT_MIN - The smallest integer supported
- PHP_INT_SIZE -  The size of an integer in bytes

PHP has the following functions to check if the type of a variable is integer:

- is_int()
- is_integer() - alias of is_int()
- is_long() - alias of is_int()

Example

Check if the type of a variable is integer:

```php
<?php
$x = 5985;
var_dump(is_int($x));

$x = 59.85;
var_dump(is_int($x));
?>

```
## Floats

A float is a number with a decimal point or a number in exponential form.

2.0, 256.4, 10.358, 7.64E+5, 5.56E-5 are all floats.

The float data type can commonly store a value up to 1.7976931348623E+308 (platform dependent), and have a maximum precision of 14 digits.

PHP has the following predefined constants for floats (from PHP 7.2):

- PHP_FLOAT_MAX - The largest representable floating point number
- PHP_FLOAT_MIN - The smallest representable positive floating point number
- PHP_FLOAT_DIG - The number of decimal digits that can be rounded into a float and back without precision loss
- PHP_FLOAT_EPSILON - The smallest representable positive number x, so that x + 1.0 != 1.0

PHP has the following functions to check if the type of a variable is float:

- is_float()
- is_double() - alias of is_float()

Example

Check if the type of a variable is float:

```php
<?php
$x = 10.365;
var_dump(is_float($x));
?>

```

## Infinity

A numeric value that is larger than PHP_FLOAT_MAX is considered infinite.

PHP has the following functions to check if a numeric value is finite or infinite:

- is_finite()
- is_infinite()

However, the PHP var_dump() function returns the data type and value:

Example

Check if a numeric value is finite or infinite:

```php
<?php
$x = 1.9e411;
var_dump($x);
?>

```

## NaN

NaN stands for Not a Number.

NaN is used for impossible mathematical operations.

PHP has the following functions to check if a value is not a number:

- is_nan()

However, the PHP var_dump() function returns the data type and value:

*Example*

Invalid calculation will return a NaN value:

```php
<?php
$x = acos(8);
var_dump($x);
?>

```
## Numerical Strings

The PHP is_numeric() function can be used to find whether a variable is numeric. The function returns true if the variable is a number or a numeric string, false otherwise.

Example

Check if the variable is numeric:

```php
<?php
$x = 5985;
var_dump(is_numeric($x));

$x = "5985";
var_dump(is_numeric($x));

$x = "59.85" + 100;
var_dump(is_numeric($x));

$x = "Hello";
var_dump(is_numeric($x));
?>

```

Note: From PHP 7.0: The is_numeric() function will return FALSE for numeric strings in hexadecimal form (e.g. 0xf4c3b00c), as they are no longer considered as numeric strings.

## Casting Strings and Floats to Integers

Sometimes you need to cast a numerical value into another data type.

The (int), (integer), or intval() function are often used to convert a value to an integer.

*Example*

Cast float and string to integer:

```php
<?php
// Cast float to int
$x = 23465.768;
$int_cast = (int)$x;
echo $int_cast;

echo "<br>";

// Cast string to int
$x = "23465.768";
$int_cast = (int)$x;
echo $int_cast;
?>

```




# Date And Time

```php
date_default_timezone_set('UTC');
echo date('h:i:s:u a, l F jS Y e');
```


# Arrays

*Examples*

```php

// String array
$bestFriends = array('Joy', 'Willow', 'Ivy');

// Accessing an element of array
echo 'My Wife ' . $bestFriends[0];

// Assignment an index of array
$bestFriends[4] = 'Steve';

// Iterating over array
foreach ($bestFriends as $friend) {
    echo \$friend . ', ';
}

// Key-Value Array
$customer = array('Name'=>$usersName, 'Street'=>$streetAddress, 'City'=>$cityAddress);

// Iterating over key-value array
foreach ($customer as $key => $value) {
	echo $key . ' : ' . \$value . "</br>";
}

// Combining two arrays
$bestFriends = $bestFriends + $customer;

```


## Array Functions (1)

```php

/*
    print_r()
    var_dump()
    explode()
    implode()
    count()
    is_array()
    shuffle()
    array_combine()
    array_count_values()
    array_flip()
    array_key_exists()
*/

$arr = [
    'ad' => 'ali',
    'soyad' => 'veli',
    'yas' => 24
];

print_r($arr);

/* ** Output
 Array
(
    [ad] => ali
    [soyad] => veli
    [yas] => 24
)
 */

var_dump($arr);

/* ** Output
array(3) {
  ["ad"]=>
  string(6) "ali"
  ["soyad"]=>
  string(7) "veli"
  ["yas"]=>
  int(24)
}
*/

$test = 'ali,veli,udemy';
$arr = explode(',', $test);

print_r($arr);

/*
Array
(
    [0] => ali
    [1] => veli
    [2] => udemy
)
*/

$string = implode('|', $arr);

echo $string;
echo "\n";
echo count($arr);
echo "\n";

/*
ali|veli|udemy
3
*/

/*
if (is_array($arr)){
    echo 'bu bir dizidir';
} else {
    echo 'bu bir dizi değildir!';
}
*/

$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
shuffle($arr);

print_r($arr);

/*
Array
(
    [0] => 5
    [1] => 4
    [2] => 1
    [3] => 10
    [4] => 9
    [5] => 6
    [6] => 3
    [7] => 8
    [8] => 2
    [9] => 7
)
*/

$keys = ['ad', 'soyad'];
$values = ['ali', 'veli'];

$arr = array_combine($keys, $values);
print_r($arr);

/*
Array
(
    [ad] => ali
    [soyad] => veli
)
*/

$arr = ['ali', 'veli', 'udemy', 'ali', 'udemy'];
$arr2 = array_count_values($arr);

print_r($arr2);

/*
Array
(
    [ali] => 2
    [veli] => 1
    [udemy] => 2
)
*/

$arr = [
    'ad' => 'ali',
    'soyad' => 'veli',
    'yas' => 24
];
$arr2 = array_flip($arr);

print_r($arr2);

/*
Array
(
    [ali] => ad
    [veli] => soyad
    [24] => yas
)
*/

$arr = [
    'ad' => 'ali',
    'a' => [
        'b' => [
            'c' => [
                'd' => 'e',
                'e' => 'f'
            ]
        ]
    ]
];


if (array_key_exists('ad', $arr)){
    echo 'ad anahtarı var!';
} else {
    echo 'ad anahtarı yok!';
}

function _array_key_exists($cur_key, $arr)
{
    foreach ($arr as $key => $val) {
        if ($key == $cur_key) {
            return true;
        }
        if (is_array($val)) {
            return _array_key_exists($cur_key, $val);
        }
    }
    return false;
}

/*
ad anahtarı var!
*/

if (_array_key_exists('e', $arr)) {
    echo 'c anahtarı var!';
} else {
    echo 'c anahtarı yok!';
}

/*
c anahtarı var!
*/


```


## Array Functions (2)

```php

<?php

/*
    array_map()
    array_filter()
    array_merge()
    array_rand()
    array_reverse()
    array_search()
    in_array()
    array_shift()
    array_pop()
    array_slice()
    array_sum()
    array_product()
    array_unique()
*/

function filtrele($val){
    return $val . ' -';
}

$arr = [1,2,3,4,5];
$arr2 = array_map('filtrele', $arr);
$arr2 = array_map(function($val){
    return $val . ' -';
}, $arr);
//print_r($arr2);

$arr = [1,2,3,4,5];
$arr2 = array_filter($arr, function($item){
    return $item > 2 && $item < 5;
});
$arr2 = array_map(function($val){
    if ($val > 2 && $val < 5){
        return $val;
    }
}, $arr);
//print_r($arr2);

$arr1 = [1,2,3];
$arr2 = [4,5,6];

$arr = array_merge($arr1, $arr2);
//print_r($arr);

$arr = [
    'ad' => 'ali',
    'soyad' => 'veli',
    'yas' => 24,
    'site' => 'veli.net'
];
$random = array_rand($arr, 2);
$values = array_map(function($key) use($arr){
    return $arr[$key];
}, $random);

//print_r($values);

$arr = [1,2,3,4,5];
//print_r($arr);
$arr = array_reverse($arr);
//print_r($arr);

$arr = [
    'ad' => 'ali',
    'soyad' => 'veli',
    'a' => [
        'b' => [
            'c' => 'd'
        ]
    ]
];

$test = array_search('d', $arr);

function _array_search($cur_val, $arr)
{
    foreach ($arr as $key => $val){
        if ($val == $cur_val){
            return true;
        }
        if (is_array($val)){
            return _array_search($cur_val, $val);
        }
    }
    return false;
}

$test = _array_search('d', $arr);
//echo $test;

$arr = [1,2,3,4];

/*
if (in_array('6', $arr))
{
    echo '6 değeri var';
} else {
    echo 'yok';
}
*/

$arr = [1,2,3,4,5];
//$ilk_eleman = array_shift($arr);
$son_eleman = array_pop($arr);
//print_r($arr);
//echo $son_eleman;
//echo $ilk_eleman;

$arr = [1,2,3,4,5];

// ilk 2 eleman hariç hepsi
$arr2 = array_slice($arr, 2);
//print_r($arr2);

$arr3 = array_slice($arr, 2, 2);
//print_r($arr3);

$arr4 = array_slice($arr, -2);
//print_r($arr4);

$arr = [1,2,3,4,5];
$toplam = array_sum($arr);
//echo $toplam;

$carpim = array_product($arr);
//echo $carpim;

$arr = ['ali','veli','ali','veli','udemy'];
print_r($arr);
$arr2 = array_unique($arr);
print_r($arr2);

```


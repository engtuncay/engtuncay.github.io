
- [Arrays](#arrays)
  - [Intro](#intro)
  - [Indexed Arrays](#indexed-arrays)
  - [Associative Arrays](#associative-arrays)
  - [Array Examples](#array-examples)
    - [Array Examples (1) (Declaration)](#array-examples-1-declaration)
    - [Array Examples (2)](#array-examples-2)
    - [Array Examples (3)](#array-examples-3)
  - [PHP equivalent for Java's Map and List?](#php-equivalent-for-javas-map-and-list)
  - [PHP Array Functions](#php-array-functions)

Php Manual : http://php.net/manual/en/language.types.array.php

# Arrays

Source : https://www.w3schools.com/php/php_arrays.asp

## Intro

An array stores multiple values in one single variable. To create an Array : `array()` function is used to create an array.

Example

```php
<?php
$cars = array("Volvo", "BMW", "Toyota");
echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";
?>

```

An array can hold many values under a single name, and you can access the values by referring to an index number as shown above.


➖ In PHP, there are three types of arrays:

- Indexed arrays - Arrays with a numeric index
- Associative arrays - Arrays with named keys
- Multidimensional arrays - Arrays containing one or more arrays

➖ Get The Length of an Array - The count() Function

The count() function is used to return the length (the number of elements) of an array:

Example

```php
<?php
$cars = array("Volvo", "BMW", "Toyota");
echo count($cars);
?>

```

## Indexed Arrays

Source : https://www.w3schools.com/php/php_arrays_indexed.asp

In indexed arrays each item has an index number.

By default, the first item has index 0, the second item has item 1, etc.

Example : Create and display an indexed array:

```php
$cars = array("Volvo", "BMW", "Toyota");
var_dump($cars);

```
🔔 Access Indexed Arrays

To access an array item you can refer to the index number.

Example : Display the first array item:

```php
$cars = array("Volvo", "BMW", "Toyota");
echo $cars[0];

```
🔔 Change Value

To change the value of an array item, use the index number:

Example : Change the value of the second item:

```php
$cars = array("Volvo", "BMW", "Toyota");
$cars[1] = "Ford";
var_dump($cars);

```
🔔 Loop Through an Indexed Array

To loop through and print all the values of an indexed array, you could use a foreach loop, like this:

Example : Display all array items:

```php
$cars = array("Volvo", "BMW", "Toyota");
foreach ($cars as $x) {
  echo "$x <br>";
}

```

For a complete reference of all array functions, go to our complete PHP Array Reference. (https://www.w3schools.com/php/php_ref_array.asp)

🔔 Index Number

The key of an indexed array is a number, by default the first item is 0 and the second is 1 etc., but there are exceptions.

New items get the next index number, meaning one higher than the highest existing index.

So if you have an array like this:

```php
$cars[0] = "Volvo";
$cars[1] = "BMW";
$cars[2] = "Toyota";

```

And if you use the array_push() function to add a new item, the new item will get the index 3:

Example

```php
array_push($cars, "Ford");
var_dump($cars);

```

But if you have an array with random index numbers, like this:

```php
$cars[5] = "Volvo";
$cars[7] = "BMW";
$cars[14] = "Toyota";

```

And if you use the array_push() function to add a new item, what will be the index number of the new item?

Example

```php
array_push($cars, "Ford");
var_dump($cars);

```

## Associative Arrays

Associative arrays are arrays that use named keys that you assign to them.

Example

```php
$car = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);
var_dump($car);

```
 
🔔  Access Associative Arrays

To access an array item you can refer to the key name.

Example : Display the model of the car:

```php
$car = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);
echo $car["model"];

```
🔔 Change Value

To change the value of an array item, use the key name:

Example : Change the year item:

```php
$car = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);
$car["year"] = 2024;
var_dump($car);

```
🔔 Loop Through an Associative Array

To loop through and print all the values of an associative array, you could use a foreach loop, like this:

Example : Display all array items, keys and values:

```php
$car = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);

foreach ($car as $x => $y) {
  echo "$x: $y <br>";
}

```


## Array Examples

### Array Examples (1) (Declaration)

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

### Array Examples (2)

```php
<?php
// Array Examples 2

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

// Associative Array
$arr = [
    'ad' => 'ali',
    'soyad' => 'veli',
    'yas' => 24
];

print_r($arr);

// --Output--
// Array ( [ad] => ali [soyad] => veli [yas] => 24 )

echo "<br/><br/>var_dump(\$arr)<br/>";

var_dump($arr);

/* --Output--
array(3) {
["ad"]=>
string(6) "ali"
["soyad"]=>
string(7) "veli"
["yas"]=>
int(24)
}
*/

echo "<br/><br/>Assoc Array'e element ekleme<br/>";

$arr += ['cinsiyet' => 'erken'];
print_r($arr);

// Alernative Way
// $data += array($category => $question);

// Alt.Way (array_push ile assoc eleman ekleme)
// array_push($data, array($category => $question));
// Normal eleman ekleme (indeksli array için)
// array_push($data,$question);

//echo "<br/><br/> <br/>";

echo "<br/><br/>Explode Örnek<br/>";

$test = 'ali,veli,udemy';
$arr = explode(',', $test);

print_r($arr);

// Array ( [0] => ali [1] => veli [2] => udemy )

$string = implode('|', $arr);

echo $string ."<br/>";
echo count($arr) . "<br/>";

// --Output--
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


if (array_key_exists('ad', $arr)) {
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

### Array Examples (3)

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

// 
function filtrele($val){
    return $val . ' -';
}

$arr = [1,2,3,4,5];
$arr2 = array_map('filtrele', $arr);

// Ex2
$arr2 = array_map(function($val){
    return $val . ' -';
}, $arr);
//print_r($arr2);

// array_filter
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

## PHP equivalent for Java's Map and List?

Source : https://stackoverflow.com/questions/10597996/searching-for-php-equivalent-for-javas-map-and-list

What's about in PHP for these cases ?

```java
// In Java case 1:

Map m1 = new LinkedHashMap();
List l1 = new LinkedList();
m1.put("key1","val1");
m1.put("key2","val2");
l1.add(m1);

// In java case 2

List l1 = new LinkedList();
l1.add("val1");
l1.add("val2");
l1.add("val3");

```

*Answer*

In PHP, arrays serve as all types of containers. They can be used as maps, lists and sets.

Linked list functionality is provided through the *reset/prev/current/next/end* functions; have a look at the "see also" section of the docs to make sure you don't miss any of them.

For map functionality you just index into the array directly; but keep in mind that array keys in PHP can only be strings or integers, and also that most of the time mixing both in the same array is not the right thing to do (although there is no technical reason not to, and there are cases where it makes sense).

Normally you would use arrays for both cases:

```php

// In PHP case 1:

$m1 = array();
$l1 = array();
$m1['key1'] = 'val1';
$m1['key2'] = 'val2';
$l1[] = $m1;

// In PHP case 2

$l1 = array();
$l1[] = "val1";
$l1[] = "val2";
$l1[] = "val3";

```

Then, to go through elements of the list, you can use foreach or reset/prev/current/next/end set of functions.

If using PHP5, you can also look at SPL data structures. (http://us3.php.net/manual/en/spl.datastructures.php)



## PHP Array Functions

The array functions allow you to access and manipulate arrays.

Simple and multi-dimensional arrays are supported.

*PHP Array Functions*

Function	| Description
--|--|
array()	| Creates an array
array_change_key_case()	| Changes all keys in an array to lowercase or uppercase
array_chunk()	| Splits an array into chunks of arrays
array_column()| 	Returns the values from a single column in the input array
array_combine()| 	Creates an array by using the elements from one "keys" array and one "values" array
array_count_values()| 	Counts all the values of an array
array_diff()| 	Compare arrays, and returns the differences (compare values only)
array_diff_assoc()| 	Compare arrays, and returns the differences (compare keys and values)
array_diff_key()	| Compare arrays, and returns the differences (compare keys only)
array_diff_uassoc()| 	Compare arrays, and returns the differences (compare keys and values, using a user-defined key comparison function)
array_diff_ukey()	| Compare arrays, and returns the differences (compare keys only, using a user-defined key comparison function)
array_fill()	| Fills an array with values
array_fill_keys()	|  Fills an array with values, specifying keys
array_filter()	| Filters the values of an array using a callback function
array_flip()	| Flips/Exchanges all keys with their associated values in an array
array_intersect()| 	Compare arrays, and returns the matches (compare values only)
array_intersect_assoc()| 	Compare arrays and returns the matches (compare keys and values)
array_intersect_key()	| Compare arrays, and returns the matches (compare keys only)
array_intersect_uassoc()	| Compare arrays, and returns the matches (compare keys and values, using a user-defined key comparison function)
array_intersect_ukey()	| Compare arrays, and returns the matches (compare keys only, using a user-defined key comparison function)
array_key_exists()	| Checks if the specified key exists in the array
array_keys()	| Returns all the keys of an array
array_map()	| Sends each value of an array to a user-made function, which returns new values
array_merge()	| Merges one or more arrays into one array
array_merge_recursive()| 	Merges one or more arrays into one array recursively
array_multisort()	| Sorts multiple or multi-dimensional arrays
array_pad()	| Inserts a specified number of items, with a specified value, to an array
array_pop()	| Deletes the last element of an array
array_product()| 	Calculates the product of the values in an array
array_push()	| Inserts one or more elements to the end of an array
array_rand()	| Returns one or more random keys from an array
array_reduce()	| Returns an array as a string, using a user-defined function
array_replace()	| Replaces the values of the first array with the values from following arrays
array_replace_recursive()| 	Replaces the values of the first array with the values from following arrays recursively
array_reverse()| 	Returns an array in the reverse order
array_search()| 	Searches an array for a given value and returns the key
array_shift()	| Removes the first element from an array, and returns the value of the removed element
array_slice()	| Returns selected parts of an array
array_splice()| 	Removes and replaces specified elements of an array
array_sum()| 	Returns the sum of the values in an array
array_udiff()	| Compare arrays, and returns the differences (compare values only, using a user-defined key comparison function)
array_udiff_assoc()| 	Compare arrays, and returns the differences (compare keys and values, using a built-in function to compare the keys and a user-defined function to compare the values)
array_udiff_uassoc()| 	Compare arrays, and returns the differences (compare keys and values, using two user-defined key comparison functions)
array_uintersect()| 	Compare arrays, and returns the matches (compare values only, using a user-defined key comparison function)
array_uintersect_assoc()| 	Compare arrays, and returns the matches (compare keys and values, using a built-in function to compare the keys and a user-defined function to compare the values)
array_uintersect_uassoc()| 	Compare arrays, and returns the matches (compare keys and values, using two user-defined key comparison functions)
array_unique()	| Removes duplicate values from an array
array_unshift()	| Adds one or more elements to the beginning of an array
array_values()	| Returns all the values of an array
array_walk()	| Applies a user function to every member of an array
array_walk_recursive()| 	Applies a user function recursively to every member of an array
arsort()	| Sorts an associative array in descending order, according to the value
asort()	| Sorts an associative array in ascending order, according to the value
compact()| 	Create array containing variables and their values
count()	| Returns the number of elements in an array
current()| 	Returns the current element in an array
each()	| Deprecated from PHP 7.2. Returns the current key and value pair from an array
end()	| Sets the internal pointer of an array to its last element
extract()	| Imports variables into the current symbol table from an array
in_array()	| Checks if a specified value exists in an array
key()	| Fetches a key from an array
krsort()	| Sorts an associative array in descending order, according to the key
ksort()	| Sorts an associative array in ascending order, according to the key
list()	| Assigns variables as if they were an array
natcasesort()	| Sorts an array using a case insensitive "natural order" algorithm
natsort()	| Sorts an array using a "natural order" algorithm
next()	| Advance the internal array pointer of an array
pos()	| Alias of current()
prev()	| Rewinds the internal array pointer
range()	| Creates an array containing a range of elements
reset()	| Sets the internal pointer of an array to its first element
rsort()	| Sorts an indexed array in descending order
shuffle()	| Shuffles an array
sizeof()	| Alias of count()
sort()	| Sorts an indexed array in ascending order
uasort()	| Sorts an array by values using a user-defined comparison function and maintains the index association
uksort()| 	Sorts an array by keys using a user-defined comparison function
usort()	| Sorts an array by values using a user-defined comparison function



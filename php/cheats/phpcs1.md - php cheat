
Source : https://quickref.me/php.html

[Back](../readme.md)

---

# Contents

- [Contents](#contents)
- [Getting Started](#getting-started)
  - [Variables](#variables)
  - [Strings](#strings)
  - [Arrays](#arrays)
  - [Operators](#operators)
  - [Include](#include)
  - [Functions](#functions)
  - [Comments](#comments)
  - [Constants](#constants)
  - [Classes](#classes)
- [PHP Types](#php-types)
  - [Boolean](#boolean)
  - [Integer](#integer)
  - [Strings](#strings-1)
  - [Arrays](#arrays-1)
  - [Double (Float)](#double-float)
  - [Null](#null)
  - [Iterables](#iterables)
- [PHP Strings](#php-strings)
  - [String](#string)
  - [Multi-line String](#multi-line-string)
  - [Manipulation Functions](#manipulation-functions)
- [PHP Arrays](#php-arrays)
  - [Defining](#defining)
  - [Short array syntax](#short-array-syntax)
  - [Multi array](#multi-array)
  - [Multi type](#multi-type)
  - [manipulation](#manipulation)
  - [Array eleman sayısı](#array-eleman-sayısı)
  - [Indexing iteration (Loop)](#indexing-iteration-loop)
  - [Value iteration (loop)](#value-iteration-loop)
  - [Key iteration](#key-iteration)
  - [Concatenate arrays (spreading)](#concatenate-arrays-spreading)
  - [Into functions](#into-functions)
  - [Splat Operator](#splat-operator)
- [PHP Operators](#php-operators)
  - [Arithmetic](#arithmetic)
  - [Assignment](#assignment)
  - [Comparison](#comparison)
  - [Logical](#logical)
  - [Arithmetic](#arithmetic-1)
  - [Bitwise](#bitwise)
- [PHP Conditionals](#php-conditionals)
  - [If - elseif - else](#if---elseif---else)
  - [Switch](#switch)
  - [Ternary operator](#ternary-operator)
  - [Match](#match)
  - [Match expressions](#match-expressions)
- [PHP Loops](#php-loops)
  - [while](#while)
  - [do while](#do-while)
  - [for i](#for-i)
  - [break](#break)
  - [continue](#continue)
  - [foreach](#foreach)
  - [foreach (key-value)](#foreach-key-value)
- [PHP Functions](#php-functions)
  - [Returning values](#returning-values)
  - [Return types](#return-types)
  - [Nullable return types](#nullable-return-types)
  - [Void functions](#void-functions)
  - [Variable functions](#variable-functions)
  - [Anonymous functions](#anonymous-functions)
  - [Recursive functions](#recursive-functions)
  - [Default parameters](#default-parameters)
  - [Arrow Functions](#arrow-functions)
- [PHP Classes](#php-classes)
  - [Constructor](#constructor)
  - [Inheritance](#inheritance)
  - [Classes variables](#classes-variables)
  - [Access static variables](#access-static-variables)
  - [Static Metod Tanımı ve Kullanımı](#static-metod-tanımı-ve-kullanımı)
  - [Magic Methods](#magic-methods)
  - [Interface](#interface)
- [Miscellaneous](#miscellaneous)
  - [Basic error handling](#basic-error-handling)
  - [Exception in PHP 8.0](#exception-in-php-80)
  - [Custom exception](#custom-exception)
  - [Nullsafe Operator (\*)](#nullsafe-operator-)
- [Regular expressions](#regular-expressions)
- [File](#file)
  - [fopen() mode](#fopen-mode)
- [Runtime defined Constants](#runtime-defined-constants)
- [Article : Modern PHP Cheatsheet](#article--modern-php-cheatsheet)
  - [Introduction](#introduction)
    - [Motivation](#motivation)
    - [Complementary Resources](#complementary-resources)
    - [Recent PHP releases](#recent-php-releases)
  - [Notions](#notions)
    - [Function default parameter value](#function-default-parameter-value)
    - [Trailing comma](#trailing-comma)
      - [Array](#array)
      - [Grouped use statement](#grouped-use-statement)
      - [Function and method call](#function-and-method-call)
      - [Function parameters](#function-parameters)
      - [Closure's use statement](#closures-use-statement)
    - [Type declaration](#type-declaration)
      - [Class property](#class-property)
      - [Union type](#union-type)
      - [Intersection type](#intersection-type)
        - [External resource](#external-resource)
      - [Nullable type](#nullable-type)
    - [Destructuring arrays](#destructuring-arrays)
      - [Indexed array](#indexed-array)
      - [Associative array](#associative-array)
    - [Null Coalescing](#null-coalescing)
      - [Elvis operator](#elvis-operator)
      - [Null coalescing on array](#null-coalescing-on-array)
      - [Null coalescing on object](#null-coalescing-on-object)
        - [Object's attribute](#objects-attribute)
        - [Object's method](#objects-method)
        - [Chained method](#chained-method)
      - [Null Coalescing Assignment operator](#null-coalescing-assignment-operator)
    - [Nullsafe operator](#nullsafe-operator)
    - [Spread operator](#spread-operator)
      - [Variadic parameter](#variadic-parameter)
      - [Argument unpacking](#argument-unpacking)
      - [Array unpacking](#array-unpacking)
        - [Indexed array](#indexed-array-1)
        - [Associative array](#associative-array-1)
    - [Named arguments](#named-arguments)
      - [Named variadics](#named-variadics)
      - [Unpacking named arguments](#unpacking-named-arguments)
      - [External resource](#external-resource-1)
    - [Short closures](#short-closures)
      - [Outer scope](#outer-scope)
    - [Match expression](#match-expression)
      - [External resource](#external-resource-2)
    - [Stringable interface](#stringable-interface)
    - [Enums](#enums)
      - [Enum methods](#enum-methods)
      - [Backed values](#backed-values)
      - [External resource](#external-resource-3)
    - [Multiple lines string syntax](#multiple-lines-string-syntax)
      - [External resource](#external-resource-4)


# Getting Started

hello.php

```php
<?php // begin with a PHP open tag.

echo "Hello World\n";
print("Hello quickref.me");

?>

```

## Variables

```php
$ php hello.php

$boolean1 = true;
$boolean2 = True;

$int = 12;
$float = 3.1415926;
unset($float);  // Delete variable

$str1 = "How are you?";
$str2 = 'Fine, thanks';

```

See: Types

## Strings


```php
$url = "quickref.me";
echo "I'm learning PHP at $url";

// Concatenate strings
echo "I'm learning PHP at " . $url;

$hello = "Hello, ";
$hello .= "World!";
echo $hello;   # => Hello, World!

```

See: Strings

## Arrays

```php
$num = [1, 3, 5, 7, 9];
$num[5] = 11;
unset($num[2]);    // Delete variable
print_r($num);     # => 1 3 7 9 11
echo count($num);  # => 5

```

See: Arrays

## Operators

```php
$x = 1;
$y = 2;

$sum = $x + $y;
echo $sum;   # => 3

```

See: Operators

## Include

vars.php

```php
<?php // begin with a PHP open tag.
$fruit = 'apple';
echo "I was imported";
return 'Anything you like.';
?>

```

test.php

```php
<?php
include 'vars.php';
echo $fruit . "\n";   # => apple

/* Same as include,
cause an error if cannot be included*/
require 'vars.php';

// Also works
include('vars.php');
require('vars.php');

// Include through HTTP
include 'http://x.com/file.php';

// Include and the return statement
$result = include 'vars.php';
echo $result;  # => Anything you like.
?>

```

## Functions

```php
function add($num1, $num2 = 1) {
    return $num1 + $num2;
}
echo add(10);    # => 11
echo add(10, 5); # => 15

```

See: Functions

## Comments

```php
# This is a one line shell-style comment

// This is a one line c++ style comment

/* This is a multi line comment
   yet another line of comment */

```

## Constants

```php
const MY_CONST = "hello";

echo MY_CONST;   # => hello

# => MY_CONST is: hello
echo 'MY_CONST is: ' . MY_CONST; 

```

## Classes

```php
class Student {
    public function __construct($name) {
        $this->name = $name;
    }
}
$alex = new Student("Alex");

```

See: Classes [PHP Classes](#php-classes)

# PHP Types

## Boolean

```php
$boolean1 = true;
$boolean2 = TRUE;
$boolean3 = false;
$boolean4 = FALSE;

$boolean5 = (boolean) 1;   # => true
$boolean6 = (boolean) 0;   # => false

```

Boolean are case-insensitive

## Integer

```php
$int1 = 28;    # => 28
$int2 = -32;   # => -32
$int3 = 012;   # => 10 (octal)
$int4 = 0x0F;  # => 15 (hex)
$int5 = 0b101; # => 5  (binary)

# => 2000100000 (decimal, PHP 7.4.0)
$int6 = 2_000_100_000;

```

See also: Integers

## Strings


```php
echo 'this is a simple string';

```
See: Strings

## Arrays

```php
$arr = array("hello", "world", "!");

```
See: Arrays

## Double (Float)

```php
$float1 = 1.234;
$float2 = 1.2e7;
$float3 = 7E-10;

$float4 = 1_234.567;  // as of PHP 7.4.0
var_dump($float4);    // float(1234.567)

$float5 = 1 + "10.5";   # => 11.5
$float6 = 1 + "-1.3e3"; # => -1299

```

## Null

```php
$a = null;
$b = 'Hello php!';
echo $a ?? 'a is unset'; # => a is unset
echo $b ?? 'b is unset'; # => Hello php

$a = array();
$a == null    # => true (❗) ikisi de obje türünde mi???
$a === null   # => false
is_null($a)   # => false

```

📝Loose comparison (==) kullanıldığında: PHP, type coercion (tür dönüştürme) yapar

- Boş bir array ([]) falsy değer olarak kabul edilir
- Boş array ile null loose comparison'da eşit görülür

Strict comparison (===) kullanıldığında:

- Tür dönüştürme olmaz
- Dizi tipi null tipi değildir
- Sonuç false olur

```php
$a = array();

// Loose comparison (type coercion var)
$a == null        // => true
$a == false       // => true
$a == ""          // => true
$a == 0           // => true

// Strict comparison (type korunur)
$a === null       // => false
$a === false      // => false
$a === ""         // => false
$a === 0          // => false

```


## Iterables

```php
function bar(): iterable {
    return [1, 2, 3];
}
function gen(): iterable {
    yield 1;
    yield 2;
    yield 3;
}

foreach (bar() as $value) {
    echo $value;   # => 123
} 

```

[🔝](#contents)

# PHP Strings

## String


```php
# => '$String'
$sigle_quotes = '$String';

# => 'This is a $String.'
$dbl_quotes = "This is a $sigle_quotes.";

# => a \t tab character.
$escaped   = "a \t tab character.";

# => a slash and a t: \t (single quotes do not interpret escape sequences)
$unescaped = 'a slash and a t: \t';

```

## Multi-line String

```php
$str = "foo";

// Uninterpolated multi-liners (nowdoc)
$nowdoc = <<<'END'
Multi line string
$str
END;

// Will do string interpolation (heredoc)
$heredoc = <<<END
Multi line
$str
END;

```

TBC - 20251214 - 1757 


## Manipulation Functions

```php
$s = "Hello Phper";
echo strlen($s);       # => 11

echo substr($s, 0, 3); # => Hel
echo substr($s, 1);    # => ello Phper
echo substr($s, -4, 3);# => hpe

echo strtoupper($s);   # => HELLO PHPER
echo strtolower($s);   # => hello phper

echo strpos($s, "l");      # => 2
var_dump(strpos($s, "L")); # => false

```

See: String Functions

# PHP Arrays

## Defining

```php
$a1 = ["hello", "world", "!"]
$a2 = array("hello", "world", "!");
$a3 = explode(",", "apple,pear,peach");

// Mixed int and string keys
$array = array(
    "foo" => "bar",
    "bar" => "foo",
    100   => -100,
    -100  => 100,
);
var_dump($array);

```

## Short array syntax

```php
$array = [
    "foo" => "bar",
    "bar" => "foo",
];

```

## Multi array


```php
$multiArray = [ 
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9],
];

print_r($multiArray[0][0]) # => 1
print_r($multiArray[0][1]) # => 2
print_r($multiArray[0][2]) # => 3

```

## Multi type

```php
$array = array(
    "foo" => "bar",
    42    => 24,
    "multi" => array(
         "dim" => array(
             "a" => "foo"
         )
    )
);

var_dump($array["foo"]);
# => string(3) "bar"

var_dump($array[42]);    
# => int(24)

var_dump($array["multi"]["dim"]["a"]);
# =>  string(3) "foo"

```

## manipulation

```php
$arr = array(5 => 1, 12 => 2);
$arr[] = 56;      // Append
$arr["x"] = 42;   // Add with key
sort($arr);       // Sort
unset($arr[5]);   // Remove
unset($arr);      // Remove all

```

See: Array Functions

## Array eleman sayısı

```php
$arr = [1, 2, 3, 4];

// Eleman sayısını alır
echo count($arr);    // => 4

// `sizeof()` alias olarak aynı şeyi yapar
echo sizeof($arr);   // => 4

```

## Indexing iteration (Loop)

```php
$array = array('a', 'b', 'c');
$count = count($array);

for ($i = 0; $i < $count; $i++) {
    echo "i:{$i}, v:{$array[$i]}\n";
}

```

## Value iteration (loop)

```php
$colors = array('red', 'blue', 'green');

foreach ($colors as $color) {
    echo "Do you like $color?\n";
}

```

## Key iteration 

```php
$arr = ["foo" => "bar", "bar" => "foo"];

foreach ( $arr as $key => $value )
{
  	echo "key: " . $key . "\n";
    echo "val: {$arr[$key]}\n";
}

```

## Concatenate arrays (spreading)

```php
$a = [1, 2];
$b = [3, 4];

// PHP 7.4 later

$result = [...$a, ...$b];
# => [1, 2, 3, 4]

```

## Into functions


```php
$array = [1, 2];

function foo(int $a, int $b) {
	echo $a; # => 1
  echo $b; # => 2
}

foo(...$array);

```

## Splat Operator

(Spread mi?)

```php
function foo($first, ...$other) {
	var_dump($first); # => a
  var_dump($other); # => ['b', 'c']
}

foo('a', 'b', 'c' /*, ...*/ );
// or
function foo($first, string ...$other){}

```

# PHP Operators

## Arithmetic

```php
+	Addition
-	Subtraction
*	Multiplication
/	Division
%	Modulo
**	Exponentiation

```

## Assignment

```php
a += b	Same as a = a + b
a -= b	Same as a = a – b
a *= b	Same as a = a * b
a /= b	Same as a = a / b
a %= b	Same as a = a % b

```

## Comparison

```text
==	Equal
===	Identical
!=	Not equal
<>	Not equal
!==	Not identical
<	Less than
>	Greater than
<=	Less than or equal
>=	Greater than or equal
<=> Spaceship Operator (Less than/equal/greater than)

```

📝<=> operatörü Spaceship Operator (Uzay Gemisi Operatörü) olarak bilinir ve PHP 7.0'da tanıtılmıştır.

Bu operatör iki değeri karşılaştırır ve sonuç olarak:

```
-1 döner (solundaki değer küçükse)
0 döner (değerler eşitse)
1 döner (solundaki değer büyükse)

```

```php
<?php
1 <=> 2    // -1 (çünkü 1 < 2)
2 <=> 2    // 0  (çünkü 2 == 2)
3 <=> 2    // 1  (çünkü 3 > 2)

'a' <=> 'b'  // -1
'b' <=> 'b'  // 0
'c' <=> 'b'  // 1

```

🧲

```php
<?php
$array = [3, 1, 2];

// Artan sıraya göre
usort($array, function($a, $b) {
    return $a <=> $b;
});
// Sonuç: [1, 2, 3]

// Azalan sıraya göre
usort($array, function($a, $b) {
    return $b <=> $a;
});
// Sonuç: [3, 2, 1]
```


## Logical

```
and	And
or	Or
xor	Exclusive or
!	Not
&&	And
||	Or

```

## Arithmetic

```php
// Arithmetic
$sum        = 1 + 1; // 2
$difference = 2 - 1; // 1
$product    = 2 * 2; // 4
$quotient   = 2 / 1; // 2

// Shorthand arithmetic
$num = 0;
$num += 1;       // Increment $num by 1
echo $num++;     // Prints 1 (increments after evaluation)
echo ++$num;     // Prints 3 (increments before evaluation)
$num /= $float;  // Divide and assign the quotient to $num

```

## Bitwise

```
&	And
|	Or (inclusive or)
^	Xor (exclusive or)
~	Not
<<	Shift left
>>	Shift right

```

URREV bitwise operator


# PHP Conditionals

## If - elseif - else

```php
$a = 10;
$b = 20;

if ($a > $b) {
    echo "a is bigger than b";
} elseif ($a == $b) {
    echo "a is equal to b";
} else {
    echo "a is smaller than b";
}

```

## Switch

```php
$x = 0;
switch ($x) {
    case '0':
        print "it's zero";
        break; 
    case 'two':
    case 'three':
        // do something
        break;
    default:
        // do something
}

```

## Ternary operator

```php
print (false ? 'Not' : 'Does');
# => Does

$x = false;
print($x ?: 'Does');
# => Does

$a = null;
$b = 'Does print';
echo $a ?? 'a is unset';
# => a is unset

echo $b ?? 'b is unset';
# => Does print

```

## Match

```php
$statusCode = 500;
$message = match($statusCode) {
  200, 300 => null,
  400 => 'not found',
  500 => 'server error',
  default => 'known status code',
};
echo $message; # => server error

```

See: Match

## Match expressions

```php
$age = 23;

$result = match (true) {
    $age >= 65 => 'senior',
    $age >= 25 => 'adult',
    $age >= 18 => 'young adult',
    default => 'kid',
};

echo $result; # => young adult

```
# PHP Loops

## while

```php
$i = 1;
# => 12345
while ($i <= 5) {
    echo $i++;
}

```

## do while

```php
$i = 1;
# => 12345
do {
    echo $i++;
} while ($i <= 5);

```

## for i

```php
# => 12345
for ($i = 1; $i <= 5; $i++) {
    echo $i;
}

```

## break

```php
# => 123
for ($i = 1; $i <= 5; $i++) {
    if ($i === 4) {
        break;
    }
    echo $i;
}

```

## continue

```php
# => 1235
for ($i = 1; $i <= 5; $i++) {
    if ($i === 4) {
        continue;
    }
    echo $i;
}

```

## foreach

```php
$a = ['foo' => 1, 'bar' => 2];

foreach ($a as $k) {
    echo $k;
}
# => 12

```

## foreach (key-value)

```php
$arr = ["foo" => "bar", "bar" => "foo"];

foreach ($arr as $key => $value) {
    echo "key: " . $key . ", value: " . $value . "\n";
}
# => key: foo, value: bar
# => key: bar, value: foo

```

See: Array iteration

# PHP Functions

## Returning values

```php
function square($x)
{
    return $x * $x;
}

echo square(4);  # => 16

```

## Return types

```php
// Basic return type declaration
function sum($a, $b): float {/*...*/}
function get_item(): string {/*...*/}

class C {}
// Returning an object
function getC(): C { return new C; }

```

## Nullable return types

```php
// Available in PHP 7.1
function nullOrString(int $v) : ?string
{
    return $v % 2 ? "odd" : null;
}
echo nullOrString(3);       # => odd
var_dump(nullOrString(4));  # => NULL

```

See: Nullable types

## Void functions

```php
// Available in PHP 7.1
function voidFunction(): void
{
	echo 'Hello';
	return;
}

voidFunction();  # => Hello

```

## Variable functions

```php
function bar($arg = '')
{
    echo "In bar(); arg: '$arg'.\n";
}

$func = 'bar';
$func('test'); # => In bar(); arg: test

```

## Anonymous functions

```php
$greet = function($name)
{
    printf("Hello %s\r\n", $name);
};

$greet('World'); # => Hello World
$greet('PHP');   # => Hello PHP

```

## Recursive functions

```php
function recursion($x)
{
    if ($x < 5) {
        echo "$x";
        recursion($x + 1);
    }
}
recursion(1);  # => 1234

```

## Default parameters

```php
function coffee($type = "cappuccino")
{
    return "Making a cup of $type.\n";
}
# => Making a cup of cappuccino.
echo coffee();
# => Making a cup of .
echo coffee(null);
# => Making a cup of espresso.
echo coffee("espresso");

```

## Arrow Functions

```php
$y = 1;
 
$fn1 = fn($x) => $x + $y;

// equivalent to using $y by value:
$fn2 = function ($x) use ($y) {
    return $x + $y;
};
echo $fn1(5);   # => 6
echo $fn2(5);   # => 6

```

[🔝](#contents)

# PHP Classes

## Constructor

```php
class Student {
    public function __construct($name) {
        $this->name = $name;
    }
  	public function print() {
        echo "Name: " . $this->name;
    }
}
$alex = new Student("Alex");
$alex->print();    # => Name: Alex

```

➖ PHP’de bir sınıfın field’ı tanımlanıp, obje oluşturulduğunda dikkat edilecek hususlar:

- Tip belirtilmemişse (ör: public $foo;), değeri null olur.
- Tip belirtilmişse (ör: public string $foo;), ama constructor’da değer atanmazsa, PHP 7.4+’da erişmeye çalıştığınızda `Fatal error` verir: `"Typed property ... must not be accessed before initialization"`
- Eğer nullable tip (ör: `public ?string $foo;`) kullanırsanız, değer atanmamışsa null olur ve hata vermez.

## Inheritance

```php
class ExtendClass extends SimpleClass
{
    // Redefine the parent method
    function displayVar()
    {
        echo "Extending class\n";
        parent::displayVar();
    }
}

$extended = new ExtendClass();
$extended->displayVar();

```

## Classes variables

```php
class MyClass
{
    const MY_CONST       = 'value';
    static $staticVar    = 'static';

    // Visibility
    public static $var1  = 'pubs';

    // Class only
    private static $var2 = 'pris';

    // The class and subclasses
    protected static $var3 = 'pros';

    // The class and subclasses
    protected $var6      = 'pro';

    // The class only
    private $var7        = 'pri';  
}

```

## Access static variables

```php
echo MyClass::MY_CONST;   # => value
echo MyClass::$staticVar; # => static

```

## Static Metod Tanımı ve Kullanımı

```php
class Matematik {

    public static function kare($sayi) {
        return $sayi * $sayi;
    }
}

// Static metoda sınıf adı ile erişim:
echo Matematik::kare(5); // Çıktı: 25

```

🔔 Ek Bilgi: Sınıf İçinden Static Metoda Erişim

```php

class Ornek {
    public static function selamla() {
        return "Merhaba!";
    }

    public static function calistir() {
        // Aynı sınıf içinden self anahtar kelimesi ile erişilir
        return self::selamla();
    }
}

echo Ornek::calistir(); // Çıktı: Merhaba!

```

🧠 Açıklama
💡 Ek Bilgi
✅ 
 


## Magic Methods

```php
class MyClass
{
    // Object is treated as a String
    public function __toString()
    {
        return $property;
    }
    // opposite to __construct()
    public function __destruct()
    {
        print "Destroying";
    }
}

```

## Interface

```php
interface Foo 
{
    public function doSomething();
}

interface Bar
{
    public function doSomethingElse();
}

class Cls implements Foo, Bar 
{
    public function doSomething() {}
    public function doSomethingElse() {}
}

```

# Miscellaneous

## Basic error handling

```php
try {
    // Do something
} catch (Exception $e) {
    // Handle exception
} finally {
    echo "Always print!";
}

```

## Exception in PHP 8.0

```php
$nullableValue = null;

try {
	$value = $nullableValue ?? throw new InvalidArgumentException();
} catch (InvalidArgumentException) { // Variable is optional
    // Handle my exception
    echo "print me!";
}

```

## Custom exception

```php
class MyException extends Exception {
    // do something
}

// Usage

try {
    $condition = true;
    if ($condition) {
        throw new MyException('bala');
    }
} catch (MyException $e) {
    // Handle my exception
}

```

[🔝](#contents)

## Nullsafe Operator (*)

```php
// As of PHP 8.0.0, this line:
$result = $repo?->getUser(5)?->name;

// Equivalent to the following code:
if (is_null($repo)) {
    $result = null;
} else {
    $user = $repository->getUser(5);
    if (is_null($user)) {
        $result = null;
    } else {
        $result = $user->name;
    }
}

```

See also: Nullsafe Operator

[🔝](#contents)

# Regular expressions

**Functions**

- (1) `preg_match()`	Performs a regex match
- (2) `preg_match_all()`	Perform a `global` regular expression match
- (3) `preg_replace_callback()`	Perform a regular expression - search and replace using a callback
- (4) `preg_replace()`	Perform a regular expression search and replace
- (5) `preg_split()`	Splits a string by regex pattern
- (6) `preg_grep()`	Returns array entries that match a pattern

➖ 1. preg_match
 
```php
$str = "Visit QuickRef";
$regex = "#quickref#i";

echo preg_match($regex, $str);

// Output: 1

```

➖ 2. preg_replace

```php
$str = "Visit Microsoft!";
$regex = "/microsoft/i";

echo preg_replace($regex, "QuickRef", $str); 

// Output: Visit QuickRef!
```

➖ 3. preg_matchall

```php
$regex = "/[a-zA-Z]+ (\d+)/";
$input_str = "June 24, August 13, and December 30";

if (preg_match_all($regex, $input_str, $matches_out)) {

  echo count($matches_out);
  // Output: 2
  
  echo count($matches_out[0]);
  // Output: 3
  
  print_r($matches_out[0]);
  // Output: Array("June 24", "August 13", "December 30")

  print_r($matches_out[1]);
  // Output: Array("24", "13", "30")

}

```

➖ 4. preg_grep

```php
$arr = ["Jane", "jane", "Joan", "JANE"];
$regex = "/Jane/";

// Output: Jane
echo preg_grep($regex, $arr);
preg_split

$str = "Jane\tKate\nLucy Marion";
$regex = "@\s@";

// Output: Array("Jane", "Kate", "Lucy", "Marion")
print_r(preg_split($regex, $str));

```

- For regex table, see https://quickref.me/regex

# File 

## fopen() mode

```php
r	Read
r+	Read and write, prepend
w	Write, truncate
w+	Read and write, truncate
a	Write, append
a+	Read and write, append

```

# Runtime defined Constants

```php
define("CURRENT_DATE", date('Y-m-d'));

// One possible representation
echo CURRENT_DATE;   # => 2021-01-05

# => CURRENT_DATE is: 2021-01-05
echo 'CURRENT_DATE is: ' . CURRENT_DATE; 

```

Source : https://github.com/smknstd/modern-php-cheatsheet , MIT License

(some parts may be modified or added)

# Article : Modern PHP Cheatsheet

## Introduction

### Motivation

> **Note:** Concepts introduced here are based on the most recent version of PHP available ([PHP 8.3](https://www.php.net/releases/8.3/en.php) at the time of the last update)

### Complementary Resources

When you struggle to understand a notion, I suggest you look for answers on the following resources:

- [PHP The Right Way - Full Php Book *5](https://phptherightway.com/) 
- [Stitcher's blog - Php Articles](https://stitcher.io)
- [PHP.Watch](https://php.watch/versions)

➖ QA Platforms:
- [StackOverflow](https://stackoverflow.com/questions/tagged/php)

➖ UnFree Resources:
- [Exploring PHP 8.0](https://leanpub.com/exploringphp80)
- [PHP 8 in a nutshell](https://amitmerchant.gumroad.com/l/php8-in-a-nutshell)


### Recent PHP releases

| Version                                            | Release date  |
|----------------------------------------------------|---------------|
| [PHP 8.3](https://www.php.net/releases/8.3/en.php) | December 2023 |
| [PHP 8.2](https://www.php.net/releases/8.2/en.php) | December 2022 |
| [PHP 8.1](https://www.php.net/releases/8.1/en.php) | November 2021 |
| [PHP 8.0](https://www.php.net/releases/8.0/en.php) | November 2020 |
| PHP 7.4                                            | November 2019 |

More infos on [php.net](https://www.php.net/supported-versions.php).

## Notions

### Function default parameter value

You can set default value to your function parameters:

```php
function myFunction($param = 'foo')
{
    return $param;
}
$a = myFunction();
// $a = 'foo'

$b = myFunction('bar');
// $b = 'bar'
```

But if you send null or an undefined property, default value won't be used:

```php
function myFunction($param = 'foo')
{
    return $param;
}
$a = myFunction(null);
// $a = null

$b = myFunction($undefined); // PHP Warning:  Undefined variable $undefined
// $b = null
```

### Trailing comma

A trailing comma, also known as a dangling comma, is a comma symbol that is typed after the last item of a list of elements. One of the major benefits when used with multilines, is that [diff outputs are cleaner](https://medium.com/@nikgraf/why-you-should-enforce-dangling-commas-for-multiline-statements-d034c98e36f8).

#### Array

You can use trailing comma in arrays :

```php
$array = [
    'foo',
    'bar',
];
```

#### Grouped use statement

![php-version-72](https://shields.io/badge/php->=7.2-blue)

Since PHP 7.2, you can use trailing comma in grouped use statement:

```php
use Symfony\Component\HttpKernel\{
    Controller\ControllerResolverInterface,
    Exception\NotFoundHttpException,
    Event\PostResponseEvent,
};
```

#### Function and method call

![php-version-73](https://shields.io/badge/php->=7.3-blue)

Since PHP 7.3, you can use trailing comma when calling a function:

```php
function myFunction($foo, $bar)
{
    return true;
}
$a = myFunction(
    'baz',
    'qux',
);
```

and when calling a method:

```php
$f = new Foo();
$f->myMethod(
    'baz',
    'qux',
);
```

#### Function parameters

![php-version-80](https://shields.io/badge/php->=8.0-blue)

Since PHP 8.0, you can use trailing comma when declaring function parameters:

```php
function myFunction(
    $foo,
    $bar,
)
{
    return true;
}
```

#### Closure's use statement

![php-version-80](https://shields.io/badge/php->=8.0-blue)

Since PHP 8.0, you can use trailing comma with closure's use statement:

```php
function() use (
    $foo,
    $bar,
)
{
    return true;
}
```

### Type declaration

![php-version-70](https://shields.io/badge/php->=7.0-blue)

With Type declaration you can specify the expected data type for a property that will be enforce at runtime. It supports many types like scalar types (int, string, bool, and float) but also array, iterable, object, stdClass, etc.

You can set a type to a function's parameter:

```php
function myFunction(int $param)
{
    return $param;
}
$a = myFunction(10);
// $a = 10
$b = myFunction('foo'); // TypeError: myFunction(): Argument #1 ($param) must be of type int, string given
```

You can set a return type to a function:

```php
function myFunction(): int
{
    return 'foo';
}
$a = myFunction(); // TypeError: myFunction(): Return value must be of type int, string returned
```

When a function should not return something, you can use the type "void":

```php
function myFunction(): void
{
    return 'foo';
}
// PHP Fatal error:  A void function must not return a value
```

You cannot return null either:

```php
function myFunction(): void
{
    return null;
}
// PHP Fatal error:  A void function must not return a value
```

However, using return to exit the function is valid:

```php
function myFunction(): void
{
    return;
}
$a = myFunction();
// $a = null
```

#### Class property

![php-version-74](https://shields.io/badge/php->=7.4-blue)

You can set a type to a class property:

```php
Class Foo
{
    public int $bar;
}
$f = new Foo();
$f->bar = 'baz'; // TypeError: Cannot assign string to property Foo::$bar of type int
```

#### Union type

![php-version-80](https://shields.io/badge/php->=8.0-blue)

Since PHP 8.0, you can use a “union type” that accepts values of multiple different types, rather than a single one:

```php
function myFunction(string|int|array $param): string|int|array
{
    return $param;
}
```

It also works with class property:

```php
Class Foo
{
    public string|int|array $bar;
}
```

#### Intersection type

![php-version-81](https://shields.io/badge/php->=8.1-blue)

Since PHP 8.1, you can use an "intersection type" (also known as "pure") that enforce that a given value belong to every types. For example this param needs to implement both *Stringable* and *Countable* interfaces:

```php
function myFunction(Stringable&Countable $param): Stringable&Countable
{
    return $param;
}
Class Foo
{
    public function __toString() {
        return "something";
    }
}
myFunction(new Foo());
// TypeError: myFunction(): Argument #1 ($param) must be of type Stringable&Countable, Foo given
```

It also works with class property:

```php
Class Foo
{
    public Stringable&Countable $bar;
}
```

Intersection type only supports class and interfaces. Scalar types (string, int, array, null, mixed, etc) are not allowed:

```php
function myFunction(string&Countable $param)
{
    return $param;
}
// PHP Fatal error:  Type string cannot be part of an intersection type
```

##### External resource

- [Intersection types on PHP.Watch](https://php.watch/versions/8.1/intersection-types)

#### Nullable type

![php-version-71](https://shields.io/badge/php->=7.1-blue)

When a parameter has no type, it can accept null value:

```php
function myFunction($param)
{
    return $param;
}
$a = myFunction(null);
// $a = null
```

But as soon as a parameter has a type, it won't accept null value anymore and you'll get an error:

```php
function myFunction(string $param)
{
    return $param;
}
$a = myFunction(null); // TypeError: myFunction(): Argument #1 ($param) must be of type string, null given
```

If a function has a return type, it won't accept null value either:

```php
function myFunction(): string
{
    return null;
}
$a = myFunction(); // TypeError: myFunction(): Return value must be of type string, null returned
```

You can make a type declaration explicitly nullable:

```php
function myFunction(?string $param)
{
    return $param;
}
$a = myFunction(null);
// $a = null
```

or with a union type:

```php
function myFunction(string|null $param)
{
    return $param;
}
$a = myFunction(null);
// $a = null
```

It also works with return type:

```php
function myFunction(?string $param): ?string
{
    return $param;
}
// or
function myFunction(string|null $param): string|null
{
    return $param;
}
```

But void cannot be nullable:

```php
function myFunction(): ?void
{
   // some code
} 
// PHP Fatal error:  Void type cannot be nullable
```

or

```php
function myFunction(): void|null
{
   // some code
}
// PHP Fatal error:  Void type cannot be nullable
```

You can set a nullable type to a class property:

```php
Class Foo
{
    public int|null $bar;
}
$f = new Foo();
$f->bar = null;
$a = $f->bar;
// $a = null
```
### Destructuring arrays 

You can destructure arrays to pull out several elements into separate variables.

#### Indexed array

(php>=4.0)

Considering an indexed array like :

```php
$array = ['foo', 'bar', 'baz'];
```

You can destruct it using the list syntax:

```php
list($a, $b, $c) = $array;

// $a = 'foo'
// $b = 'bar'
// $c = 'baz'
```

Or since PHP 7.1, the shorthand syntax:

```php
[$a, $b, $c] = $array;

// $a = 'foo'
// $b = 'bar'
// $c = 'baz'
```

You can skip elements:

```php
list(, , $c) = $array;

// $c = 'baz'
```

Or since PHP 7.1, the shorthand syntax:

```php
[, , $c] = $array;

// $c = 'baz'
```

When you try to destruct an index that doesn't exist in the given array, you'll get a warning:

```php
list($a, $b, $c, $d) = $array; // PHP Warning:  Undefined array key 3

// $a = 'foo'
// $b = 'bar'
// $c = 'baz'
// $d = null;
```

You can also swap variables with destructuring assignments, considering you have variable like:
```php
$a = 'foo';
$b = 'bar';
```

So if you want to swap `$a` and `$b` instead of using a temporary variable like this:

```php
$temp = $a;
$a = $b;
$b = $temp;

// $a = 'bar'
// $b = 'foo'
```

You can swap it using the list syntax:

```php
list($a, $b) = [$b, $a];

// $a = 'bar'
// $b = 'foo'
```

Or since PHP 7.1, the shorthand syntax:

```php
[$a, $b] = [$b, $a];

// $a = 'bar'
// $b = 'foo'
```

#### Associative array

![php-version-71](https://shields.io/badge/php->=7.1-blue)

Considering an associative array (string-keyed) like :

```php
$array = [
    'foo' => 'value1',
    'bar' => 'value2',
    'baz' => 'value3',
];
```

Previous list syntax won't work with an associative array, and you'll get a warning:

```php
list($a, $b, $c) = $array; // PHP Warning:  Undefined array key 0 ...

// $a = null
// $b = null
// $c = null
```

But since PHP 7.1, you can destruct it with another syntax based on keys:

```php
list('foo' => $a, 'bar' => $b, 'baz' => $c) = $array;

// $a = 'value1'
// $b = 'value2'
// $c = 'value3'
```

Or the shorthand syntax:

```php
['foo' => $a, 'bar' => $b, 'baz' => $c] = $array;

// $a = 'value1'
// $b = 'value2'
// $c = 'value3'
```

You can also destruct only a portion of the array (The order doesn't matter):

```php
['baz' => $c, 'foo' => $a] = $array;

// $a = 'value1'
// $c = 'value3'
```

When you try to destruct a key that doesn't exist in the given array, you'll get a warning:

```php
list('moe' => $d) = $array; // PHP Warning:  Undefined array key "moe"

// $d = null
```

### Null Coalescing

![php-version-70](https://shields.io/badge/php->=7.0-blue)

Since PHP 7.0, you can use the null coalescing operator to provide a fallback when a property is null with no error nor warning:

```php
$a = null;
$b = $a ?? 'fallback';

// $b = 'fallback'
```

It is equivalent to:

```php
$a = null;
$b = isset($a) ? $a : 'fallback';
// $b = 'fallback'
```

It also works when property is undefined:

```php
$a = $undefined ?? 'fallback';

// $a = 'fallback'
```

Every other value of the property won't trigger the fallback:

```php
'' ?? 'fallback'; // ''
0 ?? 'fallback'; // 0
false ?? 'fallback'; // false
```

You can chain null coalescing multiple times:

```php
$a = null;
$b = null;
$c = $a ?? $b ?? 'fallback';
// $c = 'fallback'
```

#### Elvis operator

![php-version-53](https://shields.io/badge/php->=5.3-blue)

It should not be confused with the shorthand ternary operator (aka the elvis operator), which was introduced in PHP 5.3:

```php
$a = null;
$b = $a ?: 'fallback';

// $b = 'fallback'
```

The shorthand ternary operator is equivalent to:

```php
$a = null;
$b = $a ? $a : 'fallback';
// $b = 'fallback'
```

Result between null coalescing and elvis operator can be similar, but also different for some specific values:

```php
'' ?: 'fallback'; // 'fallback'
0 ?: 'fallback'; // 'fallback'
false ?: 'fallback'; // 'fallback'
```

#### Null coalescing on array

If array key exists, then fallback isn't triggered:

```php
$a = ['foo' => 'bar'];
$b = $a['foo'] ?? 'fallback';

// $b = 'bar'
```

But when array doesn't exist, fallback is triggered with no error nor warning:

```php
$a = null;
$b = $a['foo'] ?? 'fallback';

// $b = 'fallback'
```

Or array property is undefined, fallback is triggered with no error nor warning:

```php
$b = $undefined['foo'] ?? 'fallback';

// $b = 'fallback'
```

When array exist but key can't be found in the given array, fallback is triggered with no error nor warning:

```php
$a = [];
$b = $a['foo'] ?? 'fallback';

// $b = 'fallback'
```

It also works with indexed arrays:

```php
$a = ['foo'];

// reminder: $a[0] = 'foo'

$b = $a[1] ?? 'fallback';

// $b = 'fallback'
```

It also works with nested arrays. If nested array key exists, then fallback isn't triggered:

```php
$a = [
   'foo' => [
      'bar' => 'baz'
   ]
];
$b = $a['foo']['bar'] ?? 'fallback';

// $b = 'baz'
```

But when nested key can't be found in the given array, fallback is triggered with no error nor warning:

```php
$a = [
   'foo' => [
      'bar' => 'baz'
   ]
];
$b = $a['foo']['qux'] ?? 'fallback';

// $b = 'fallback'
```

#### Null coalescing on object

You can also use null coalescing operator with object.

##### Object's attribute

If object's attribute exists, then fallback isn't triggered:

```php
$a = (object)[
    'foo' => 'bar'
];
$b = $a->foo ?? 'fallback';

// $b = 'bar'
```

But when object's attribute can't be found, fallback is triggered with no error nor warning:

```php
$a = (object)[
    'foo' => 'bar'
];
$b = $a->baz ?? 'fallback';

// $b = 'fallback'
```

##### Object's method

You can also use the null coalescing operator on call to an object's method. If the given method exists, then fallback isn't triggered:

```php
class Foo
{
    public function bar()
    {
        return 'baz';
    }
}

$a = new Foo();
$b = $a->bar() ?? 'fallback';

// $b = 'baz'
```

But when object's method returns null, fallback is triggered with no error nor warning:

```php
class Foo
{
    public function bar()
    {
        return null;
    }
}

$a = new Foo();
$b = $a->bar() ?? 'fallback';

// $b = 'fallback'
```

If object's method can't be found, null coalescing won't work and you'll get an error:

```php
class Foo
{
    public function bar()
    {
        return 'baz';
    }
}

$a = new Foo();
$b = $a->baz() ?? 'fallback'; // PHP Error:  Call to undefined method baz()
```

##### Chained method

When using chained methods on object and an intermediary element can't be found, null coalescing won't work and you'll get an error:

```php
class Foo
{
    public function bar()
    {
        return (object)[];
    }
}

$a = new Foo();
$b = $a->bar()->baz() ?? 'fallback'; // PHP Error:  Call to undefined method baz()
```

#### Null Coalescing Assignment operator

![php-version-74](https://shields.io/badge/php->=7.4-blue)

You can set a default value to a property when it is null:

```php
$a = null;
$a = $a ?? 'foo';
// $a = 'foo'
```

Since PHP 7.4, you can use the null coalescing assignment operator to do the same:

```php
$a = null;
$a ??= 'foo';
// $a = 'foo'
```

### Nullsafe operator

![php-version-80](https://shields.io/badge/php->=8.0-blue)

When trying to read a property or calling a method on null, you'll get a warning and an error:

```php
$a = null;
$b = $a->foo; // PHP Warning:  Attempt to read property "foo" on null
// $b = null

$c = $a->foo(); // PHP Error:  Call to a member function foo() on null
```

With the nullsafe operator, you can do both without warning nor error:

```php
$a = null;
$b = $a?->foo;
// $b = null
$c = $a?->foo();
// $c = null
```

You can chain multiple nullsafe operators:

```php
$a = null;
$b = $a?->foo?->bar;
// $b = null
$c = $a?->foo()?->bar();
// $c = null
```

An expression is short-circuited from the first null-safe operator that encounters null:

```php
$a = null;
$b = $a?->foo->bar->baz();
// $b = null
```

Nullsafe operator has no effect if the target is not null:

```php
$a = 'foo';
$b = $a?->bar; // PHP Warning:  Attempt to read property "bar" on string
// $b = null
$c = $a?->baz(); // PHP Error:  Call to a member function baz() on string
```

Nullsafe operator can't handle arrays properly but still can have some effect:

```php
$a = [];
$b = $a['foo']->bar;
// PHP Warning:  Undefined array key "foo"
// PHP Warning:  Attempt to read property "bar" on null
// $b = null

$c = $a['foo']?->bar; // PHP Warning:  Undefined array key "foo"
// $c = null

$d = $a['foo']->bar();
// PHP Warning:  Undefined array key "foo"
// PHP Error:  Call to a member function bar() on null

$e = $a['foo']?->bar(); // PHP Warning:  Undefined array key "foo"
// $e = null
```

You cannot use the nullsafe operator to write, it is read only:

```php
$a = null;
$a?->foo = 'bar'; // PHP Fatal error:  Can't use nullsafe operator in write context
```

### Spread operator

#### Variadic parameter

![php-version-56](https://shields.io/badge/php->=5.6-blue)

Since PHP 5.6 (~ august 2014), you can add a variadic parameter to any function that let you use an argument lists with variable-length:

```php
function countParameters(string $param, string ...$options): int
{

    foreach ($options as $option) {
        // you can iterate on $options
    }
 
    return 1 + count($options);
}

countParameters('foo'); // 1
countParameters('foo', 'bar'); // 2
countParameters('foo', 'bar', 'baz'); // 3
```

Variadic parameter should always be the last parameter declared:

```php
function countParameters(string ...$options, string $param)
{ 
   // some code
}
// PHP Fatal error: Only the last parameter can be variadic
```

You can have only one variadic parameter:

```php
function countParameters(string ...$options, string ...$moreOptions)
{ 
   // some code
}
// PHP Fatal error: Only the last parameter can be variadic
```

It can't have a default value:

```php
function countParameters(string $param, string ...$options = [])
{
   // some code
}
// PHP Parse error: Variadic parameter cannot have a default value
```

When not typed, it accepts any value:

```php
function countParameters(string $param, ...$options): int
{
    return 1 + count($options);
}

$a = countParameters('foo', null, [], true);
// $a = 4
```

When typed, you have to use properly typed values:

```php
function countParameters(string $param, string ...$options): int
{
    return 1 + count($options);
}

countParameters('foo', null);
// TypeError: countParameters(): Argument #2 must be of type string, null given

countParameters('foo', []);
// TypeError: countParameters(): Argument #2 must be of type string, array given
```

#### Argument unpacking

![php-version-56](https://shields.io/badge/php->=5.6-blue)

Arrays and traversable objects can be unpacked into argument lists when calling functions by using the spread operator:

```php
function add(int $a, int $b, int $c): int
{
    return $a + $b + $c;
}
$array = [2, 3];
$r = add(1, ...$array);

// $r = 6
```

The given array can have more elements than needed:

```php
function add(int $a, int $b, int $c): int
{
    return $a + $b + $c;
}
$array = [2, 3, 4, 5];
$r = add(1, ...$array);

// $r = 6
```

The given array can't have lesser elements than needed:

```php
function add(int $a, int $b, int $c): int
{
    return $a + $b + $c;
}
$array = [2];
$r = add(1, ...$array); // TypeError: Too few arguments to function add(), 2 passed
```

Except when some function arguments have a default value:

```php
function add(int $a, int $b, int $c = 0): int
{
    return $a + $b + $c;
}
$array = [2];
$r = add(1, ...$array);
// $r = 3
```

If an argument is typed and the passed value does not match the given type, you'll get an error:

```php
function add(int $a, int $b, int $c): int
{
    return $a + $b + $c;
}
$array = ['foo', 'bar'];
$r = add(1, ...$array); // TypeError: add(): Argument #2 ($b) must be of type int, string given
```

Since PHP 8.0, it is possible to unpack an associative array (string-keyed) as it will use [named arguments](#unpacking-named-arguments).

#### Array unpacking

##### Indexed array

![php-version-74](https://shields.io/badge/php->=7.4-blue)

When you want to merge multiple arrays, you generally use `array_merge`:

```php
$array1 = ['baz'];
$array2 = ['foo', 'bar'];

$array3 = array_merge($array1, $array2);
// $array3 = ['baz', 'foo', 'bar']
```

But since PHP 7.4, you can unpack indexed arrays, with spread operator:

```php
$array1 = ['foo', 'bar'];
$array2 = ['baz', ...$array1];
// $array2 = ['baz', 'foo', 'bar']
```

Elements will be merged in the order they are passed:

```php
$array1 = ['foo', 'bar'];
$array2 = ['baz', ...$array1, "qux"];
// $array2 = ['baz', 'foo', 'bar', "qux"]
```

It doesn't do any deduplication:

```php
$array1 = ['foo', 'bar'];
$array2 = ['foo', ...$array1];
// $array2 = ['foo', 'foo', 'bar']
```

You can unpack multiple arrays at once:

```php
$array1 = ['foo', 'bar'];
$array2 = ['baz'];
$array3 = [ ...$array1, ...$array2];
// $array3 = ['foo', 'bar', 'baz']
```

You can unpack the same array multiple times:

```php
$array1 = ['foo', 'bar'];
$array2 = [ ...$array1, ...$array1];
// $array2 = ['foo', 'bar', 'foo', 'bar']
```

You can unpack an empty array with no error nor warning:

```php
$array1 = [];
$array2 = ['foo', ...$array1];
// $array2 = ['foo']
```

You can unpack an array that has not been previously stored in a property:

```php
$array1 = [...['foo', 'bar'], 'baz'];
// $array1 = ['foo', 'bar', 'baz']
```

Unpacking only works with arrays (or objects inplementing Traversable interface). If you try to unpack any other value, such as null, you'll get an error: 

```php
$array1 = null;
$array2 = ['foo', ...$array1]; // PHP Error:  Only arrays and Traversables can be unpacked
```

You can unpack the result of a function/method:

```php
function getArray(): array
{
    return ['foo', 'bar'];
}

$array = [...getArray(), 'baz']; 
// $array = ['foo', 'bar', 'baz']
```

##### Associative array

![php-version-81](https://shields.io/badge/php->=8.1-blue)

Since php 8.1, you can unpack associative array (string-keyed):

```php
$array1 = ['foo' => 'bar'];
$array2 = [
   'baz' => 'qux', 
   ...$array1
];
// $array2 = ['baz' => 'qux', 'foo' => 'bar',]
```

You can unpack array with an already existing key:

```php
$array1 = ['foo' => 'bar'];
$array2 = [
   'foo' => 'baz', 
   ...$array1
];
// $array2 = ['foo' => 'bar',]
```

You can unpack an empty array without error nor warning:

```php
$array1 = [];
$array2 = [
   ...$array1,
   ...[]
];
// $array2 = []
```

[🔝](#contents)

### Named arguments

`php>=8.0`

Since PHP 8.0, it is possible to pass in arguments by name instead of their position.

Considering a function like this:

```php
function concat(string $first, string $second): string
{
    return $first . ' ' . $second;
}
$a = concat('foo', 'bar');
// $a = 'foo bar'
```

You can have the same result with the named argument syntax:

```php
$a = concat(first: 'foo', second: 'bar');
// $a = 'foo bar'
```

You can call it with arguments in a different order:

```php
$a = concat(second: 'bar', first: 'foo');
// $a = 'foo bar'
```

You can skip optional parameters:

```php
function orGate(bool $option1 = false, bool $option2 = false, bool $option3 = false): bool
{
   return $option1 || $option2 || $option3;
}
$a = orGate(option3: true);
// $a = true
```

But you cannot skip a mandatory argument:

```php
$a = concat(second: 'bar');
// TypeError: concat(): Argument #1 ($first) not passed
```

You cannot include some extra arguments:

```php
$a = concat(first: 'foo', second: 'bar', third: 'baz');
// PHP Error:  Unknown named parameter $third
```

Named arguments also work with object constructor:

```php
Class Foo
{
    public function __construct(
        public string $first,
        public string $second
    ) {}
    
}
$f = new Foo(first: 'bar', second: 'baz');
```

#### Named variadics

You can use named arguments with a variadic parameter:

```php
function showParams(string ...$params): array
{
    return $params;
}
$a = showParams(first: 'foo', second: 'bar', third: 'baz');
// $a = ["first" => "foo", "second" => "bar", "third" => "baz"]
```

#### Unpacking named arguments

You can unpack an associative array as named arguments if keys match arguments names:

```php
function add(int $a, int $b, int $c): int
{
    return $a + $b + $c;
}
$array = [
    "b" => 2,
    "c" => 3
];
$r = add(1, ...$array);
// $r = 6
```

Order of the elements in the associative array doesn't matter:

```php
function add(int $a, int $b, int $c): int
{
    return $a + $b + $c;
}
$array = [
    "c" => 3,
    "b" => 2,
];
$r = add(1, ...$array);
// $r = 6
```

If a key doesn't match an argument's name, you'll get an error:

```php
function add(int $a, int $b, int $c): int
{
    return $a + $b + $c;
}
$array = [
    "b" => 2,
    "c" => 3,
    "d" => 4,
];
$r = add(1, ...$array); // PHP Error:  Unknown named parameter $d
```

#### External resource

- [Named arguments in depth on stitcher's blog](https://stitcher.io/blog/php-8-named-arguments)
- [Named Parameters on PHP.Watch](https://php.watch/versions/8.0/named-parameters)

### Short closures

![php-version-74](https://shields.io/badge/php->=7.4-blue)

Short closures, also called arrow functions, are an alternative way of writing [anonymous functions](https://www.php.net/manual/en/functions.anonymous.php) in a shorter syntax. The main goal of short closures is to reduce verbosity when it is possible : if there is only a single expression.

Here is an example of a simple closure with only one expression :

```php
$foo = function ($bar) {
    return $bar + 1;
}
$a = $foo(1);
// $a = 2
```

You can write the same function with a short closure :

```php
$foo = fn ($bar) => $bar + 1;
$a = $foo(1);
// $a = 2
```

You cannot give a name to a short closure :

```php
fn foo($bar) => $bar + 1;
// PHP Parse error: Syntax error, unexpected T_STRING, expecting '('
```

You can use short closure as function parameter. For example as a "callable" parameter in PHP's [array_reduce](https://www.php.net/manual/en/function.array-reduce.php):

```php
$myArray = [10,20,30];

$total = array_reduce($myArray, fn ($carry, $item) => $carry + $item, 0);
// $total = 60
```

Type hinting is allowed as in a normal function :

```php
fn (int $foo): int => $foo;
```

You don't need to use the `return` keyword as it is not allowed here :

```php
fn ($foo) => return $foo;
// PHP Parse error: Syntax error, unexpected T_RETURN
```

#### Outer scope

The short closure doesn't require the `use` keyword to be able to access properties from the outer scope :

```php
$bar = 10;
$baz = fn ($foo) => $foo + $bar;
$a = $baz(1);
//$a = 11
```

The keyword `use` is not allowed :

```php
$bar = 10;
fn ($foo) use ($bar) => $foo + $bar;
// PHP Parse error: Syntax error, unexpected T_USE, expecting T_DOUBLE_ARROW
```

You could use `$this` as in any other function :

```php
fn () => $this->foo + 1;
```

### Match expression

![php-version-80](https://shields.io/badge/php->=8.0-blue)

Since PHP 8.0, there is a new `match` syntax similar to the `switch` syntax. As each matching case must only contain one expression, it can't be used and replace a switch statement in every situation. It is significantly shorter and easier to read though.

The match expression always returns a value. Each condition only allows a single expression, and it immediately returns the value and will not fall-through following conditions without an explicit `break` statement:

```php
$foo = 'baz';
$a = match($foo) {
    'bar' => 1,
    'baz' => 2,
    'qux' => 3,
}
// $a = 2
```

It throws an exception when the value can't match:

```php
$foo = 'qux';
$a = match($foo) {
    'bar' => 1,
    'baz' => 2,
}
// PHP Error:  Unhandled match value of type string
```

But it supports a default condition:

```php
$foo = 'qux';
$a = match($foo) {
    'bar' => 1,
    'baz' => 2,
    default => 3,
}
// $a = 3
```

It allows multiple conditions in a single arm:

```php
$foo = 'bar';
$a = match($foo) {
    'bar', 'baz' => 1,
    default => 2,
}
// $a = 1
```

It does strict type-safe comparison without type coercion (it's like using `===` instead of `==`):

```php
function showType($param) {
    return match ($param) {
        1 => 'Integer',
        '1' => 'String',
        true => 'Boolean',
    };
}

showType(1); // "Integer"
showType('1'); // "String"
showType(true); // "Boolean"
```

#### External resource

- [Match expression on PHP.Watch](https://php.watch/versions/8.0/match-expression)

### Stringable interface

![php-version-80](https://shields.io/badge/php->=8.0-blue)

Since PHP 8.0, there is a new interface named `Stringable`, that indicates a class has a `__toString()` magic method. PHP automatically adds the Stringable interface to all classes that implement that method.

```php
interface Stringable {
    public function __toString(): string;
}
```

When you define a parameter with `Stringable` type, it will check that the given class implements the `Stringable` interface:

```php
class Foo {
    public function __toString(): string {
        return 'bar';
    }
}

function myFunction(Stringable $param): string {
    return (string) $param;
}
$a = myFunction(new Foo);
// $a = 'bar'
```

If a given class doesn't implement `__toString()`, you'll get an error:

```php
class Foo {
}

function myFunction(Stringable $param): string {
    return (string) $param;
}
$a = myFunction(new Foo);
// TypeError: myFunction(): Argument #1 ($param) must be of type Stringable, Foo given
```

A stringable type doesn't accept string:

```php
function myFunction(Stringable $param): string {
    return (string) $param;
}
$a = myFunction('foo');
// TypeError: myFunction(): Argument #1 ($param) must be of type Stringable, string given
```

Of course, to accept both string and Stringable, you can use a union type:

```php
function myFunction(string|Stringable $param): string {
    return (string) $param;
}
```

### Enums

![php-version-81](https://shields.io/badge/php->=8.1-blue)

An Enum defines a new type, which has a fixed, limited number of possible legal values.

```php
enum Status
{
    case DRAFT;
    case PUBLISHED;
    case ARCHIVED;
}
```

In an Enum, each case definition is case-sensitive. Historically, in PHP we generally represent "constants" with uppercase to distinguish them from normal variables, so it makes sense to stick to uppercase notation for enum cases. But note that this will work fine and define 3 different cases:

```php
enum MyEnum
{
    case FOO;
    case foo;
    case Foo;
}
```

Now you can compare easily enums with type safe operator `===`:

```php
$statusA = Status::PENDING;

if ($statusA === Status::PENDING) {
    // true
}
```

Also an enum behaves like a traditional PHP object:

```php
$statusA = Status::PENDING;
$statusB = Status::PENDING;
$statusC = Status::ARCHIVED;

$statusA === $statusB; // true
$statusA === $statusC; // false
$statusC instanceof Status; // true
```

You can use Enum to enforce types:

```php
function myFunction(Status $param)
{
    return $param;
}
$a = myFunction(Status::DRAFT);
// $a = Status::DRAFT
$b = myFunction('foo'); // TypeError: myFunction(): Argument #1 ($param) must be of type Status, string given
```

####  Enum methods

You can define methods with an Enum :

```php
enum Status
{
    case DRAFT;
    case PUBLISHED;
    
    public function label(): string
    {
        return match($this) 
        {
            Status::DRAFT => 'Not ready...',   
            Status::PUBLISHED => 'Published !',   
        };
    }
}
```

then you can use methods on any enum instance:

```php
$a = Status::DRAFT;
$a->label(); // 'Not ready...'
```

#### Backed values

Sometimes you need to assign a proper value to each enum case (ex: to store it in a database, comparison, etc). You should define the type of the back value. Here is an example with a backed value defined as an `int` :

```php
enum HttpStatus: int
{
    case OK = 200;
    case NOT_FOUND = 404;
    case INTERNAL_SERVER_ERROR = 500;
}
```

And here is an example of a backed value defined as a `string`:

```php
enum Status: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
}
```

#### External resource

- [Enums manual on PHP official documentation](https://www.php.net/manual/en/language.enumerations.php)
- [Enums on PHP.Watch](https://php.watch/versions/8.0/match-expression)
- [Enums style guide on stitcher's blog](https://stitcher.io/blog/php-enum-style-guide)

### Multiple lines string syntax

![php-version-73](https://shields.io/badge/php->=7.3-blue)

When you want to define a string value that contains multiple lines, you generally use double quotes and escape line breaks:

```php
$string = "Hello\nWorld";
```

Since PHP 7.3, there is a new option for specifying a string value over multiple lines. By placing it between an opening identifier and a closing identifier:

```php
$string = <<<IDENTIFIER
Hello 
World
IDENTIFIER;
```

You can use any identifier you want, but it must be the same at the beginning and at the end of the string. It can't be a variable. 

The closing identifier can be followed by other code on the same line:

```php
$array = ['foo', 'bar', <<<IDENTIFIER
  hello
  world
  IDENTIFIER, 'baz', 'qux',
];
```

#### External resource

- [Relaxed heredoc and nowdoc on PHP.Watch](https://php.watch/versions/7.3/relaxed-heredoc-nowdoc)
- [Heredoc nowdoc on andycarter.dev's blog](https://andycarter.dev/blog/what-are-php-heredoc-nowdoc)


[Back](../readme.md)
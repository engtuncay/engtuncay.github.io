<h1>Php Data Types Details</h1> 

- [Php Strings (W3S)](#php-strings-w3s)
  - [Modify Strings](#modify-strings)
  - [Concatenate Strings](#concatenate-strings)
  - [Slicing Strings](#slicing-strings)
  - [Escape Characters](#escape-characters)
- [Php Numbers (W3S)](#php-numbers-w3s)
  - [Integers](#integers)
  - [Floats](#floats)
  - [Infinity](#infinity)
  - [NaN](#nan)
  - [Numerical Strings](#numerical-strings)
  - [Casting Strings and Floats to Integers](#casting-strings-and-floats-to-integers)
- [PHP Math](#php-math)
  - [Random Numbers](#random-numbers)
- [PHP Constants](#php-constants)
- [Date And Time](#date-and-time)

Sources

- 

# Php Strings (W3S)

Source : https://www.w3schools.com/php/php_string.asp

A string is a sequence of characters, like "Hello world!".

Strings in PHP are surrounded by either double quotation marks, or single quotation marks.

Example

```php
echo "Hello";
echo 'Hello';

```

❗ Note There is a big difference between double quotes and single quotes in PHP.

Double quotes process special characters, single quotes does not.

🔔 Double or Single Quotes?

You can use double or single quotes, but you should be aware of the differences between the two.

Double quoted strings perform action on special characters.

E.g. when there is a variable in the string, it returns the value of the variable:

Example : Double quoted string literals perform operations for special characters:

```php
$x = "John";
echo "Hello $x";

```

Single quoted strings does not perform such actions, it returns the string like it was written, with the variable name:

Example :Single quoted string literals returns the string as it is:

```php
$x = "John";
echo 'Hello $x';

```

🔔 String Length

The PHP strlen() function returns the length of a string.

Example :Return the length of the string "Hello world!":

```php
echo strlen("Hello world!");

```

🔔 Word Count

The PHP str_word_count() function counts the number of words in a string.

Example : Count the number of word in the string "Hello world!":

```php
echo str_word_count("Hello world!");

```
🔔 Search For Text Within a String

The PHP strpos() function searches for a specific text within a string.

If a match is found, the function returns the character position of the first match. If no match is found, it will return FALSE.

Example :Search for the text "world" in the string "Hello world!":

```php
echo strpos("Hello world!", "world");

```

❗ Tip: The first character position in a string is 0 (not 1).

🔔 Complete PHP String Reference

For a complete reference of all string functions, go to our complete PHP String Reference. (https://www.w3schools.com/php/php_ref_string.asp)

## Modify Strings

PHP has a set of built-in functions that you can use to modify strings.

🔔 Upper Case

Example : The strtoupper() function returns the string in upper case:

```php
$x = "Hello World!";
echo strtoupper($x);

```

🔔 Lower Case

Example : The strtolower() function returns the string in lower case:

```php
$x = "Hello World!";
echo strtolower($x);

```

🔔 Replace String

The PHP str_replace() function replaces some characters with some other characters in a string.

Example
Replace the text "World" with "Dolly":

$x = "Hello World!";
echo str_replace("World", "Dolly", $x);
Reverse a String
The PHP strrev() function reverses a string.

Example
Reverse the string "Hello World!":

$x = "Hello World!";
echo strrev($x);

Remove Whitespace

Whitespace is the space before and/or after the actual text, and very often you want to remove this space.

Example : The trim() removes any whitespace from the beginning or the end:

$x = " Hello World! ";
echo trim($x);
Learn more in our trim() Function Reference.

Convert String into Array
The PHP explode() function splits a string into an array.

The first parameter of the explode() function represents the "separator". The "separator" specifies where to split the string.

Note: The separator is required.

Example
Split the string into an array. Use the space character as separator:

$x = "Hello World!";
$y = explode(" ", $x);

//Use the print_r() function to display the result:
print_r($y);

/*
Result:
Array ( [0] => Hello [1] => World! )
*/

## Concatenate Strings

String Concatenation

To concatenate, or combine, two strings you can use the . operator:

Example
$x = "Hello";
$y = "World";
$z = $x . $y;
echo $z;
The result of the example above is HelloWorld, without a space between the two words.

You can add a space character like this:

Example
$x = "Hello";
$y = "World";
$z = $x . " " . $y;
echo $z;
An easier and better way is by using the power of double quotes.

By surrounding the two variables in double quotes with a white space between them, the white space will also be present in the result:

Example
$x = "Hello";
$y = "World";
$z = "$x $y";
echo $z;

## Slicing Strings

You can return a range of characters by using the substr() function.

Specify the start index and the number of characters you want to return.

ExampleGet your own PHP Server
Start the slice at index 6 and end the slice 5 positions later:

$x = "Hello World!";
echo substr($x, 6, 5);
Note The first character has index 0.

Slice to the End
By leaving out the length parameter, the range will go to the end:

Example
Start the slice at index 6 and go all the way to the end:

$x = "Hello World!";
echo substr($x, 6);
Slice From the End
Use negative indexes to start the slice from the end of the string:

Example
Get the 3 characters, starting from the "o" in world (index -5):

$x = "Hello World!";
echo substr($x, -5, 3);
Note The last character has index -1.

Negative Length
Use negative length to specify how many characters to omit, starting from the end of the string:

Example
From the string "Hi, how are you?", get the characters starting from index 5, and continue until you reach the 3. character from the end (index -3).

Should end up with "ow are y":

$x = "Hi, how are you?";
echo substr($x, 5, -3);

## Escape Characters

To insert characters that are illegal in a string, use an escape character.

An escape character is a backslash \ followed by the character you want to insert.

An example of an illegal character is a double quote inside a string that is surrounded by double quotes:

ExampleGet your own PHP Server
$x = "We are the so-called "Vikings" from the north.";
To fix this problem, use the escape character \":

Example
$x = "We are the so-called \"Vikings\" from the north.";
Escape Characters
Other escape characters used in PHP:

Code	Result	Try it
\'	Single Quote	
\"	Double Quote	
\$	PHP variables	
\n	New Line	
\r	Carriage Return	
\t	Tab	
\f	Form Feed	
\ooo	Octal value	
\xhh	Hex value


# Php Numbers (W3S)

Source : https://www.w3schools.com/php/php_numbers.asp 

In this chapter we will look in depth into *Integers, Floats, and Number Strings*.

One thing to notice about PHP is that it provides automatic data type conversion.

So, if you assign an integer value to a variable, the type of that variable will automatically be an integer. Then, if you assign a string to the same variable, the type will change to a string (dynamic type).

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

However, the PHP var_dump() function returns the *data type* and *value*:

*Example*

Check if a numeric value is finite or infinite:

```php
<?php
$x = 1.9e411;
var_dump($x);
?>
//---Output---
// float(INF)
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

# PHP Math

PHP has a set of math functions that allows you to perform mathematical tasks on numbers.

*PHP pi() Function*

The pi() function returns the value of PI:

Example

```php
<?php
echo(pi()); // returns 3.1415926535898
?>

```

*PHP min() and max() Functions*

The min() and max() functions can be used to find the lowest or highest value in a list of arguments:

Example

```php
<?php
echo(min(0, 150, 30, 20, -8, -200));  // returns -200
echo(max(0, 150, 30, 20, -8, -200));  // returns 150
?>

```

*PHP abs() Function*

The abs() function returns the absolute (positive) value of a number:

Example

```php
<?php
echo(abs(-6.7));  // returns 6.7
?>

```

*PHP sqrt() Function*

The sqrt() function returns the square root of a number:

Example

```php
<?php
echo(sqrt(64));  // returns 8
?>

```

*PHP round() Function*

The round() function rounds a floating-point number to its nearest integer:

Example

```php
<?php
echo(round(0.60));  // returns 1
echo(round(0.49));  // returns 0
?>

```

## Random Numbers

The rand() function generates a random number:

Example

```php
<?php
echo(rand());
?>

```

To get more control over the random number, you can add the optional min and max parameters to specify the lowest integer and the highest integer to be returned.

For example, if you want a random integer between 10 and 100 (inclusive), use rand(10, 100):

Example

```php
<?php
echo(rand(10, 100));
?>

```

# PHP Constants

Constants are like variables except that once they are defined they cannot be changed or undefined.

*PHP Constants*

A constant is an identifier (name) for a simple value. The value cannot be changed during the script.

A valid constant name starts with a letter or underscore (no $ sign before the constant name).

Note: Unlike variables, constants are automatically global across the entire script.

*Create a PHP Constant*

To create a constant, use the define() function.

Syntax

```php
define(name, value, case-insensitive)

```

Parameters:

- name: Specifies the name of the constant
- value: Specifies the value of the constant
- case-insensitive: Specifies whether the constant name should be case-insensitive. Default is false

Example

Create a constant with a case-sensitive name:

```php
<?php
define("GREETING", "Welcome to W3Schools.com!");
echo GREETING;
?>

```

Example

Create a constant with a case-insensitive name:

```php
<?php
define("GREETING", "Welcome to W3Schools.com!", true);
echo greeting;
?>

```

*PHP Constant Arrays*

In PHP7, you can create an Array constant using the define() function.

Example

Create an Array constant:

```php
<?php
define("cars", [
  "Alfa Romeo",
  "BMW",
  "Toyota"
]);
echo cars[0];
?>

```

*Constants are Global*

Constants are automatically global and can be used across the entire script.

Example

This example uses a constant inside a function, even if it is defined outside the function:

```php
<?php
define("GREETING", "Welcome to W3Schools.com!");

function myTest() {
  echo GREETING;
}
myTest();
?>

```

# Date And Time

```php
date_default_timezone_set('UTC');
echo date('h:i:s:u a, l F jS Y e');
```







PHP Variable and Data Types

Source : https://javatpoint.com/php-data-types

[Back](readme.md)

---

- [PHP Variables](#php-variables)
- [PHP Variable Scope](#php-variable-scope)
- [PHP $ and $$ Variables](#php--and--variables)
- [PHP Constants](#php-constants)
- [Php Data Types](#php-data-types)
  - [PHP Data Types: Scalar Types](#php-data-types-scalar-types)
  - [PHP Data Types: Compound Types](#php-data-types-compound-types)
  - [PHP Data Types: Special Types](#php-data-types-special-types)
  - [PHP Boolean](#php-boolean)
  - [PHP Integer](#php-integer)
  - [PHP Float](#php-float)

# PHP Variables

In PHP, a variable is declared using a `$` sign followed by the variable name. Here, some important points to know about variables:

- As PHP is a loosely typed language, so we do not need to declare the data types of the variables. It automatically analyzes the values and makes conversions to its correct datatype.

- After declaring a variable, it can be reused throughout the code.

- Assignment Operator (=) is used to assign the value to a variable.

Syntax of declaring a variable in PHP is given below:

```php
$variablename=value;  

```

Rules for declaring PHP variable:

- A variable must start with a dollar ($) sign, followed by the variable name.
- It can only contain alpha-numeric character and underscore (A-z, 0-9, _).
- A variable name must start with a letter or underscore (_) character.
- A PHP variable name cannot contain spaces.
- One thing to be kept in mind that the variable name cannot start with a number or special symbols.

PHP variables are case-sensitive, so $name and $NAME both are treated as different variable.

➖ PHP Variable: Declaring string, integer, and float

Let's see the example to store string, integer, and float values in PHP variables.

File: variable1.php

```php
<?php  
$str="hello string";  
$x=200;  
$y=44.6;  
echo "string is: $str <br/>";  
echo "integer is: $x <br/>";  
echo "float is: $y <br/>";  

// Output:
// 
// string is: hello string
// integer is: 200
// float is: 44.6

```

➖ PHP Variable: Sum of two variables

File: variable2.php

```php
<?php  
$x=5;  
$y=6;  
$z=$x+$y;  
echo $z;  

// Output:
// 
// 11

```

➖ PHP Variable: case sensitive

In PHP, variable names are case sensitive. So variable name "color" is different from Color, COLOR, COLor etc.

File: variable3.php

```php
<?php  
$color="red";  
echo "My car is " . $color . "<br>";  
echo "My house is " . $COLOR . "<br>";  
echo "My boat is " . $coLOR . "<br>";  

// Output:
// 
// My car is red
// Notice: Undefined variable: COLOR in C:\wamp\www\variable.php on line 4
// My house is
// Notice: Undefined variable: coLOR in C:\wamp\www\variable.php on line 5
// My boat is

```

➖ PHP Variable: Rules

- PHP variables must start with letter or underscore only.
- PHP variable can't be start with numbers and special symbols.

File: variablevalid.php

```php
<?php  
$a="hello";//letter (valid)  
$_b="hello";//underscore (valid)  
  
echo "$a <br/> $_b";  

// Output:
// 
// hello
// hello

```

File: variableinvalid.php

```php
<?php  
$4c="hello";//number (invalid)  
$*d="hello";//special symbol (invalid)  
  
echo "$4c <br/> $*d";  

// Output:
// 
// Parse error: syntax error, unexpected '4' (T_LNUMBER), expecting variable (T_VARIABLE)
// or '$' in C:\wamp\www\variableinvalid.php on line 2

```

➖ PHP: Loosely typed language

PHP is a loosely typed language, it means PHP automatically converts the variable to its correct data type.

# PHP Variable Scope

The scope of a variable is defined as its range in the program under which it can be accessed. In other words, "The scope of a variable is the portion of the program within which it is defined and can be accessed."

PHP has three types of variable scopes:

1. Local variable
2. Global variable
3. Static variable

➖ Local variable

The variables that are declared within a function are called local variables for that function. These local variables have their scope only in that particular function in which they are declared. This means that these variables cannot be accessed outside the function, as they have local scope.

A variable declaration outside the function with the same name is completely different from the variable declared inside the function. Let's understand the local variables with the help of an example:

File: local_variable1.php

```php
<?php  
    function local_var()  
    {  
        $num = 45;  //local variable  
        echo "Local variable declared inside the function is: ". $num;  
    }  
    local_var();  

// Output:
// 
// Local variable declared inside the function is: 45

```

File: local_variable2.php

```php
<?php  
    function mytest()  
    {  
        $lang = "PHP";  
        echo "Web development language: " .$lang;  
    }  
    mytest();  
    //using $lang (local variable) outside the function will generate an error  
    echo $lang;  

// Output:
// 
// Web development language: PHP
// Notice: Undefined variable: lang in D:\xampp\htdocs\program\p3.php on line 28

```

➖ Global variable

The global variables are the variables that are declared outside the function. These variables can be accessed anywhere in the program. To access the global variable within a function, use the GLOBAL keyword before the variable. However, these variables can be directly accessed or used outside the function without any keyword. Therefore there is no need to use any keyword to access a global variable outside the function.

Let's understand the global variables with the help of an example:

Example:
File: global_variable1.php

<?php  
    $name = "Sanaya Sharma";        //Global Variable  
    function global_var()  
    {  
        global $name;  
        echo "Variable inside the function: ". $name;  
        echo "</br>";  
    }  
    global_var();  
    echo "Variable outside the function: ". $name;  
?>  
Output:

Variable inside the function: Sanaya Sharma
Variable outside the function: Sanaya Sharma
Note: Without using the global keyword, if you try to access a global variable inside the function, it will generate an error that the variable is undefined.
Example:
File: global_variable2.php

<?php  
    $name = "Sanaya Sharma";        //global variable  
    function global_var()  
    {  
        echo "Variable inside the function: ". $name;  
        echo "</br>";  
    }  
    global_var();  
?>  
Output:

Notice: Undefined variable: name in D:\xampp\htdocs\program\p3.php on line 6
Variable inside the function:
Using $GLOBALS instead of global
Another way to use the global variable inside the function is predefined $GLOBALS array.

Example:

File: global_variable3.php

<?php  
    $num1 = 5;      //global variable  
    $num2 = 13;     //global variable  
    function global_var()  
    {  
            $sum = $GLOBALS['num1'] + $GLOBALS['num2'];  
            echo "Sum of global variables is: " .$sum;  
    }  
    global_var();  
?>  
Output:

Sum of global variables is: 18
If two variables, local and global, have the same name, then the local variable has higher priority than the global variable inside the function.

Example:

File: global_variable2.php

<?php  
    $x = 5;  
    function mytest()  
    {  
        $x = 7;  
        echo "value of x: " .$x;  
    }  
    mytest();  
?>  
Output:

Value of x: 7
Note: local variable has higher priority than the global variable.
Static variable
It is a feature of PHP to delete the variable, once it completes its execution and memory is freed. Sometimes we need to store a variable even after completion of function execution. Therefore, another important feature of variable scoping is static variable. We use the static keyword before the variable to define a variable, and this variable is called as static variable.

Static variables exist only in a local function, but it does not free its memory after the program execution leaves the scope. Understand it with the help of an example:

Example:
File: static_variable.php

<?php  
    function static_var()  
    {  
        static $num1 = 3;       //static variable  
        $num2 = 6;          //Non-static variable  
        //increment in non-static variable  
        $num1++;  
        //increment in static variable  
        $num2++;  
        echo "Static: " .$num1 ."</br>";  
        echo "Non-static: " .$num2 ."</br>";  
    }  
      
//first function call  
    static_var();  
  
    //second function call  
    static_var();  
?>  
Output:

Static: 4
Non-static: 7
Static: 5
Non-static: 7
You have to notice that $num1 regularly increments after each function call, whereas $num2 does not. This is why because $num1 is not a static variable, so it freed its memory after the execution of each function call.

# PHP $ and $$ Variables

The `$var` (single dollar) is a normal variable with the name var that stores any value like string, integer, float, etc.

The `$$var` (double dollar) is a reference variable that stores the value of the $variable inside it.

To understand the difference better, let's see some examples.

Example 1

```php
<?php  
$x = "abc";  
$$x = 200;  
echo $x."<br/>";  
echo $$x."<br/>";  
echo $abc;  
  
// Output:
// 
// abc
// 200
// 200

```

In the above example, we have assigned a value to the variable x as abc. Value of reference variable $$x is assigned as 200.

Now we have printed the values $x, $$x and $abc.

Example2

```php
<?php  
 $x="U.P";  
$$x="Lucknow";  
echo $x. "<br>";  
echo $$x. "<br>";  
echo "Capital of $x is " . $$x;  
  
// Output:
// U.P
// Lucknow
// Capital of U.P is Lucknow

```

In the above example, we have assigned a value to the variable x as U.P. Value of reference variable $$x is assigned as Lucknow.

Now we have printed the values $x, $$x and a string.

Example3
<?php  
$name="Cat";  
${$name}="Dog";  
${${$name}}="Monkey";  
echo $name. "<br>";  
echo ${$name}. "<br>";  
echo $Cat. "<br>";  
echo ${${$name}}. "<br>";  
echo $Dog. "<br>";  
?>  
Output:


PHP $ and $$ variables
In the above example, we have assigned a value to the variable name Cat. Value of reference variable ${$name} is assigned as Dog and ${${$name}} as Monkey.

Now we have printed the values as $name, ${$name}, $Cat, ${${$name}} and $Dog.

# PHP Constants

PHP constants are name or identifier that can't be changed during the execution of the script except for magic constants, which are not really constants. PHP constants can be defined by 2 ways:

Using define() function
Using const keyword
Constants are similar to the variable except once they defined, they can never be undefined or changed. They remain constant across the entire program. PHP constants follow the same PHP variable rules. For example, it can be started with a letter or underscore only.

Conventionally, PHP constants should be defined in uppercase letters.

Note: Unlike variables, constants are automatically global throughout the script.
PHP constant: define()
Use the define() function to create a constant. It defines constant at run time. Let's see the syntax of define() function in PHP.

define(name, value, case-insensitive)  
name: It specifies the constant name.
value: It specifies the constant value.
case-insensitive: Specifies whether a constant is case-insensitive. Default value is false. It means it is case sensitive by default.
Let's see the example to define PHP constant using define().

File: constant1.php

<?php  
define("MESSAGE","Hello JavaTpoint PHP");  
echo MESSAGE;  
?>  
Output:

Hello JavaTpoint PHP
Create a constant with case-insensitive name:

File: constant2.php

<?php    
define("MESSAGE","Hello JavaTpoint PHP",true);//not case sensitive    
echo MESSAGE, "</br>";    
echo message;    
?>    
Output:

Hello JavaTpoint PHP
Hello JavaTpoint PHP
File: constant3.php

<?php  
define("MESSAGE","Hello JavaTpoint PHP",false);//case sensitive  
echo MESSAGE;  
echo message;  
?>  
Output:

Hello JavaTpoint PHP
Notice: Use of undefined constant message - assumed 'message'
in C:\wamp\www\vconstant3.php on line 4
message
PHP constant: const keyword
PHP introduced a keyword const to create a constant. The const keyword defines constants at compile time. It is a language construct, not a function. The constant defined using const keyword are case-sensitive.

File: constant4.php

<?php  
const MESSAGE="Hello const by JavaTpoint PHP";  
echo MESSAGE;  
?>  
Output:

Hello const by JavaTpoint PHP
Constant() function
There is another way to print the value of constants using constant() function instead of using the echo statement.

Syntax


The syntax for the following constant function:

constant (name)  
File: constant5.php

<?php      
    define("MSG", "JavaTpoint");  
    echo MSG, "</br>";  
    echo constant("MSG");  
    //both are similar  
?>  
Output:


JavaTpoint
JavaTpoint
Constant vs Variables
Constant
Variables
Once the constant is defined, it can never be redefined.
A variable can be undefined as well as redefined easily.
A constant can only be defined using define() function. It cannot be defined by any simple assignment.
A variable can be defined by simple assignment (=) operator.
There is no need to use the dollar ($) sign before constant during the assignment.
To declare a variable, always use the dollar ($) sign before the variable.
Constants do not follow any variable scoping rules, and they can be defined and accessed anywhere.
Variables can be declared anywhere in the program, but they follow variable scoping rules.
Constants are the variables whose values can't be changed throughout the program.
The value of the variable can be changed.
By default, constants are global.
Variables can be local, global, or static.



# Php Data Types

PHP data types are used to hold different types of data or values. PHP supports 8 primitive data types that can be categorized further in 3 types:

1. Scalar Types (predefined)
2. Compound Types (user-defined)
3. Special Types

## PHP Data Types: Scalar Types

It holds only single value. There are 4 scalar data types in PHP.

1. boolean
2. integer
3. float
4. string

## PHP Data Types: Compound Types

It can hold multiple values. There are 2 compound data types in PHP.

1. array
2. object

## PHP Data Types: Special Types

There are 2 special data types in PHP.

1. resource
2. NULL

## PHP Boolean

Booleans are the simplest data type works like switch. It holds only two values: TRUE (1) or FALSE (0). It is often used with conditional statements. If the condition is correct, it returns TRUE otherwise FALSE.

Example:

```php
<?php   
    if (TRUE)  
        echo "This condition is TRUE.";  
    if (FALSE)  
        echo "This condition is FALSE.";  

// Output:
// 
// This condition is TRUE.

?>  

```
## PHP Integer

Integer means numeric data with a negative or positive sign. It holds only whole numbers, i.e., numbers without fractional part or decimal points.

Rules for integer:

- An integer can be either positive or negative.
- An integer must not contain decimal point.
- Integer can be decimal (base 10), octal (base 8), or hexadecimal (base 16).
- The range of an integer must be lie between 2,147,483,648 and 2,147,483,647 i.e., -2^31 to 2^31.

Example:

```php
<?php   
    $dec1 = 34;  
    $oct1 = 0243;  
    $hexa1 = 0x45;  
    echo "Decimal number: " .$dec1. "</br>";  
    echo "Octal number: " .$oct1. "</br>";  
    echo "HexaDecimal number: " .$hexa1. "</br>";  

// Output:
// 
// Decimal number: 34
// Octal number: 163
// HexaDecimal number: 69

```

## PHP Float

A floating-point number is a number with a decimal point. Unlike integer, it can hold numbers with a fractional or decimal point, including a negative or positive sign.

Example:

<?php   
    $n1 = 19.34;  
    $n2 = 54.472;  
    $sum = $n1 + $n2;  
    echo "Addition of floating numbers: " .$sum;  
?>  
Output:

Addition of floating numbers: 73.812
PHP String
A string is a non-numeric data type. It holds letters or any alphabets, numbers, and even special characters.

String values must be enclosed either within single quotes or in double quotes. But both are treated differently. To clarify this, see the example below:

Example:


<?php   
    $company = "Javatpoint";  
    //both single and double quote statements will treat different  
    echo "Hello $company";  
    echo "</br>";  
    echo 'Hello $company';  
?>  
Output:

Hello Javatpoint
Hello $company
PHP Array
An array is a compound data type. It can store multiple values of same data type in a single variable.

Example:


<?php   
    $bikes = array ("Royal Enfield", "Yamaha", "KTM");  
    var_dump($bikes);   //the var_dump() function returns the datatype and values  
    echo "</br>";  
    echo "Array Element1: $bikes[0] </br>";  
    echo "Array Element2: $bikes[1] </br>";  
    echo "Array Element3: $bikes[2] </br>";  
?>  
Output:

array(3) { [0]=> string(13) "Royal Enfield" [1]=> string(6) "Yamaha" [2]=> string(3) "KTM" }
Array Element1: Royal Enfield
Array Element2: Yamaha
Array Element3: KTM
You will learn more about array in later chapters of this tutorial.

PHP object
Objects are the instances of user-defined classes that can store both values and functions. They must be explicitly declared.

Example:

<?php   
     class bike {  
          function model() {  
               $model_name = "Royal Enfield";  
               echo "Bike Model: " .$model_name;  
             }  
     }  
     $obj = new bike();  
     $obj -> model();  
?>  
Output:

Bike Model: Royal Enfield
This is an advanced topic of PHP, which we will discuss later in detail.

PHP Resource
Resources are not the exact data type in PHP. Basically, these are used to store some function calls or references to external PHP resources. For example - a database call. It is an external resource.

This is an advanced topic of PHP, so we will discuss it later in detail with examples.

PHP Null

Null is a special data type that has only one value: NULL. There is a convention of writing it in capital letters as it is case sensitive.

The special type of data type NULL defined a variable with no value.

Example:

<?php   
    $nl = NULL;  
    echo $nl;   //it will not give any output  
?>  
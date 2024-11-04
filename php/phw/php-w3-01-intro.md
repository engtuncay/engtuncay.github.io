

Source : https://www.w3schools.com/php/default.asp

[Back](../readme.md)

---

- [PHP Introduction](#php-introduction)
- [PHP Installation](#php-installation)
  - [W3School's Compiler](#w3schools-compiler)
- [PHP Syntax](#php-syntax)
- [PHP Comments](#php-comments)

# PHP Introduction

PHP code is executed on the server.

*What You Should Already Know*

Before you continue you should have a basic understanding of the following:

- HTML
- CSS
- JavaScript

If you want to study these subjects first, find the tutorials on W3Schools website.

*What is PHP?*

- PHP is an acronym for "PHP: Hypertext Preprocessor"
- PHP is a widely-used, open source scripting language
- PHP scripts are executed on the server
- PHP is free to download and use

*PHP is an amazing and popular language!*

It is powerful enough to be at the core of the biggest blogging system on the web (WordPress)!

It is deep enough to run large social networks!

It is also easy enough to be a beginner's first server side language!

*What is a PHP File?*

- PHP files can contain text, HTML, CSS, JavaScript, and PHP code
- PHP code is executed on the server, and the result is returned to the browser as plain HTML
- PHP files have extension ".php"

*What Can PHP Do?*

- PHP can generate dynamic page content
- PHP can create, open, read, write, delete, and close files on the server
- PHP can collect form data
- PHP can send and receive cookies
- PHP can add, delete, modify data in your database
- PHP can be used to control user-access
- PHP can encrypt data

With PHP you are not limited to output HTML. You can output images or PDF files. You can also output any text, such as XHTML and XML.

*Why PHP?*

- PHP runs on various platforms (Windows, Linux, Unix, Mac OS X, etc.)
- PHP is compatible with almost all servers used today (Apache, IIS, etc.)
- PHP supports a wide range of databases
- PHP is free. Download it from the official PHP resource: www.php.net
- PHP is easy to learn and runs efficiently on the server side

*What's new in PHP 7*

- PHP 7 is much faster than the previous popular stable release (PHP 5.6)
- PHP 7 has improved Error Handling
- PHP 7 supports stricter Type Declarations for function arguments
- PHP 7 supports new operators (like the spaceship operator: <=>)

# PHP Installation

*What Do I Need?*

To start using PHP, you can:

- Find a web host with PHP and MySQL support
- Install a web server on your own PC, and then install PHP and MySQL

*Use a Web Host With PHP Support*

If your server has activated support for PHP you do not need to do anything.

Just create some .php files, place them in your web directory, and the server will automatically parse them for you.

You do not need to compile anything or install any extra tools.

Because PHP is free, most web hosts offer PHP support.

*Set Up PHP on Your Own PC*

However, if your server does not support PHP, you must:

- install a web server
- install PHP
- install a database, such as MySQL

The official PHP website (PHP.net) has installation instructions for PHP: http://php.net/manual/en/install.php

*PHP Online Compiler / Editor*

With w3schools' online PHP compiler, you can edit PHP code, and view the result in your browser.

```php
<?php
$txt = "PHP";
echo "I love $txt!";
?>
I love PHP!

```

Click on the "Try it Yourself" button to see how it works. 

## W3School's Compiler

[W3School's Compiler](https://www.w3schools.com/php/phptryit.asp?filename=tryphp_compiler)


# PHP Syntax

A PHP script is executed on the server, and the plain HTML result is sent back to the browser.

*Basic PHP Syntax*

A PHP script can be placed anywhere in the document.

A PHP script starts with <?php and ends with ?>:

```php
<?php
// PHP code goes here
?>

```

The default file extension for PHP files is ".php".

A PHP file normally contains HTML tags, and some PHP scripting code.

Below, we have an example of a simple PHP file, with a PHP script that uses a built-in PHP function "echo" to output the text "Hello World!" on a web page:

Example

```html
<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<?php
echo "Hello World!";
?>

</body>
</html>

```

*Note:* PHP statements end with a semicolon (;).

*PHP Case Sensitivity*

In PHP, keywords (e.g. if, else, while, echo, etc.), classes, functions, and user-defined functions are *not case-sensitive*.

In the example below, all three echo statements below are equal and legal:


Example

```html
<!DOCTYPE html>
<html>
<body>

<?php
ECHO "Hello World!<br>";
echo "Hello World!<br>";
EcHo "Hello World!<br>";
?>

</body>
</html>

```

Note: However; all variable names are *case-sensitive*!

Look at the example below; only the first statement will display the value of the $color variable! This is because $color, $COLOR, and $coLOR are treated as three different variables:

Example

```html
<!DOCTYPE html>
<html>
<body>

<?php
$color = "red";
echo "My car is " . $color . "<br>";
echo "My house is " . $COLOR . "<br>";
echo "My boat is " . $coLOR . "<br>";
?>

</body>
</html>

```

# PHP Comments

*Comments in PHP*

A comment in PHP code is a line that is not executed as a part of the program. Its only purpose is to be read by someone who is looking at the code.

Comments can be used to:

- Let others understand your code
- Remind yourself of what you did - Most programmers have experienced coming back to their own work a year or two later and having to re-figure out what they did. Comments can remind you of what you were thinking when you wrote the code

PHP supports several ways of commenting:

Example

Syntax for single-line comments and multiple-line comments:

```html
<!DOCTYPE html>
<html>
<body>

<?php
// This is a single-line comment

# This is also a single-line comment

/*
This is a multiple-lines comment block
that spans over multiple
lines
*/

?>

</body>
</html>

```

Example

Using comments to leave out parts of the code:

```html
<!DOCTYPE html>
<html>
<body>

<?php
// You can also use comments to leave out parts of a code line
$x = 5 /* + 15 */ + 5;
echo $x;
?>

</body>
</html>

```

-- end --
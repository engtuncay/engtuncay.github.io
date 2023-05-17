<h1>Introduction to Php</h1> 

- [Php Basic 1](#php-basic-1)
  - [Basic PHP Syntax](#basic-php-syntax)
  - [Html Php Elementi](#html-php-elementi)
  - [Comment Line and Block](#comment-line-and-block)
    - [Single Line Comment](#single-line-comment)
    - [Multi Line Comment](#multi-line-comment)
  - [Ekrana Yazdırma](#ekrana-yazdırma)
  - [Data Types and Variables](#data-types-and-variables)
  - [Type Casting](#type-casting)
  - [Checking Types of A Variable](#checking-types-of-a-variable)
  - [Constants](#constants)
  - [Sihirli Karakterler (magical characters)](#sihirli-karakterler-magical-characters)
  - [Operators](#operators)
- [Php Basic 2](#php-basic-2)
  - [Logical Operators](#logical-operators)
  - [If Statement](#if-statement)
  - [Ternary (Short If) Operator](#ternary-short-if-operator)
  - [Switch Statement](#switch-statement)
  - [Loops ( For, While, Do While)](#loops--for-while-do-while)


<h2>Kaynaklar</h2> 

- Udemy Tayfun Erbilen Php Kursu
 
- Php Cheatsheets

- W3School

# Php Basic 1

## Basic PHP Syntax

* Every statement ends in a ;
* Loops, ifs, and anything else with a block of code inside it have brackets {}
* Variables start with \$
* Everything is case sensitive

## Html Php Elementi

```php
<?php
//....php kodu
?>
```

## Comment Line and Block

### Single Line Comment

2 şekilde yapılır.

```php
// This is a single-line comment
```

veya

```php
# Single-Line Comment
```

### Multi Line Comment

```php
/*
    This is a mult-line comment.
*/

```

## Ekrana Yazdırma

```php
echo "test<br/>123";
print "test<br/>123";
```

```html
<html>
<head>
  <!-- ... -->
  <title><?php echo "my sayfa" ?></title>
</head>
<body>
  <?php 
  //.....
  ?>
  <!-- short tag aktif edilmişse - attribute'lere de değer aktarılabilir.-->
  <?="my sayfa"?>
</body>
</html>

```

## Data Types and Variables

7 temel tür vardır : String,Integer,Double,Boolean,Array,Object ve Null'dır.

```php
//Veri tipleri ve örnek veriler
string "ali veli" veya 'ali veli'
integer 500, 200
double 5.5, 7.2
boolean (true, false)
array (dizi)
object (Nesne)
NULL
```

<h3>Variables</h3>

- $ ile başlar ve sonrasında harf ya da (_) ile başlamalı.
- Harf,Rakam ve Alt çizgi kullanılır.
- 255 karakterden fazla olmamalı.
- Türkçe karakterler içerebilir.
- case sensitive'dir
- Atama operatörü (=) eşittir işaretidir.

*Örnek*

```php
$adi = 'Ali';
$sayi1 = 10;

```

## Type Casting

(tor:Veri Tipi Değiştirme)

*Örnek*

```php
(double)(5 / 2);

$randNum = 5;
$refToNum = &$randNum;
$randNum = 100;

echo '$refToNum = ' . $refToNum;

```

## Checking Types of A Variable

gettype(myVar) fonksiyonu ile bir değişkenin türünü öğreniriz.

```php
$string = "ali veli";

$int = 500;

$float = 5.5;
echo gettype($float); // double

$bool = false;
echo gettype($bool); // boolean

$array = array();
echo gettype($array); // array

$object = new stdClass;
echo gettype($object); // object

$null = NULL;
echo gettype($null); // NULL

```

## Constants

Sabit değerler `define([strConsantName],[value])` fonksiyonu ile tanımlanır. Türü object'tir. Sabit değerlerin ismini başına $ işaret olmadan kullanırız.

- Türkçe karakterler içerebilir.
- Sayı ile başlayamaz.
- Harf ya da _ işareti ile başlar.
- Büyük-küçük harfe duyarlıdır.

- Veri türlerinde, Object hariç tüm veri türlerini kapsar. Sabitlere obje tanımlayamayız. Array tanımlayabiliriz.

*Örnekler*

```php
define("author", "ali veli");
echo author;
// Output
// ali veli
```

```php
define('PI', 3.1415926);
echo PI;
```

## Sihirli Karakterler (magical characters)

- Sihirli karakterler çift tırnak içinde kullanılabilir. Özel anlamı olan işaretlerdir.

Karakter | Açıklama
---------|---------
\t       | tab
\n       | new line
\\       | \ char
\$       | $ char
\'       | ' char
\"       | " char

```php
$test = "web\t\t\tsite\nerbilen  \\test\ ";

$ad = "Tayfun";
echo $test;
echo "\$ad değişkeni $ad değerine eşittir";
echo "Tayfun dedi ki: \"ben korkmam\"..";
echo 'Tayfun dedi ki: \'ben korkmam\'..';

// Output
// web			site
// erbilen  \test\ 
// $ad değişkeni Tayfun değerine eşittir
// Tayfun dedi ki: "ben korkmam"..
// Tayfun dedi ki: 'ben korkmam'..
```

## Operators

Operator | Explanation
---------|------------
\+       | Sum
\-       |
\*       | Multiply
\/       | Divide
%        | Modular


# Php Basic 2

Logical Operators, Switch and Loops in this section are mentioned.

## Logical Operators

Operators that return a boolean

| Operator | Meaning                           | Variations |
|----------|-----------------------------------|------------|
| >        | Greater then                      | >=         |
| <        | Less then                         | >=         |
| ==       | Equal                             | =!         |
| ===      | Equal value and type              |            |
| &&       | And (Both things are true)        |            |
| \|       | Or (One of these things are true) |            |
| !        | Not Operator                      |            |

## If Statement

*Examples*

```php
if ( $numOfOranges < 26 ) {
    echo '5% Discount';
} else if ( ($numOfOranges < 31) ) {
    echo '10% Discount';
} else {
    echo '15% Discount';
} 
```

## Ternary (Short If) Operator

```php
echo (15 > 10) ? 15 : 10; 
// Output
// 15
```

## Switch Statement

```php
switch ($userName) {
    case "Marry" :
        echo "Hello Marry";
        break;

    case "John" :
    	echo "Hello John";
        break;

    default :
    	echo "Hello Customer";
    	break;
}
```

## Loops ( For, While, Do While)

```php
for($i = 1; $i <= 20; $i++) {
    // statements
}

$num = 0;

while($num < 20) {
    // statements
}

```


# Introduction to Php

- [Introduction to Php](#introduction-to-php)
- [Php Basic](#php-basic)
  - [Basic PHP Syntax](#basic-php-syntax)
  - [Comment Line and Block](#comment-line-and-block)
  - [Data Types](#data-types)
  - [Constant Assignment](#constant-assignment)
  - [Data Type Casting](#data-type-casting)
  - [Operators and Math Object](#operators-and-math-object)
  - [Logical Operators](#logical-operators)
  - [If Statement](#if-statement)
  - [Ternary (Short If) Operator](#ternary-short-if-operator)
  - [Switch Statement](#switch-statement)
  - [Loops - For,While,Do While](#loops---forwhiledo-while)
- [String , Number, Array](#string--number-array)
  - [String Metodları](#string-metodları)
  - [Template Literal (String Format)](#template-literal-string-format)
- [Date And Time](#date-and-time)
- [Arrays](#arrays)
  - [Array Functions (1)](#array-functions-1)
  - [Array Functions (2)](#array-functions-2)
- [Functions](#functions)
  - [Functions](#functions-1)
  - [Anonymous Functions](#anonymous-functions)
  - [get_args() function](#get_args-function)
  - [Recursive Functions](#recursive-functions)
  - [function_exists](#function_exists)
  - [Yield Function](#yield-function)
  - [Static variable in a function](#static-variable-in-a-function)
  - [Php 7 Feature - Parameter ad Return Type](#php-7-feature---parameter-ad-return-type)
- [OOP Concepts](#oop-concepts)
  - [Class Definition](#class-definition)
  - [Inheritance](#inheritance)
  - [Constructor](#constructor)
  - [Yıkıcılar](#yıkıcılar)
  - [Static Definition](#static-definition)
  - [Interface (Arayüz) Kullanımı](#interface-arayüz-kullanımı)
  - [Abstract Sınıf (Soyut Sınıf) Kullanımı](#abstract-sınıf-soyut-sınıf-kullanımı)
  - [Final Ön Tanımı](#final-ön-tanımı)
  - [Namespace nedir](#namespace-nedir)
- [GET, POST And Session](#get-post-and-session)
  - [Post Variables](#post-variables)
- [Database Connection](#database-connection)
  - [PDO Connection](#pdo-connection)
- [Composer](#composer)
  - [Installation](#installation)
  - [Usage](#usage)
  - [Composer Komutları](#composer-komutları)
- [Kaynaklar](#kaynaklar)
- [Düzenlenecek Notlar](#düzenlenecek-notlar)

# Php Basic

## Basic PHP Syntax

* Every statement ends in a ;
* Loops, ifs, and anything else with a block of code inside it have brackets {}
* Variables start with \$
* Everything is case sensitive

## Comment Line and Block


```php
// This is a single-line comment

# Tek satırlı yorum satırı

/*
    This is a mult-line comment.
*/

```

Comments are completely ignored when running a php file.

## Data Types

- Data Types and Assignment

```php
string "ali veli" veya 'ali veli'
integer 500, 200
double (Float) 5.5, 7.2
boolean (true, false)
array (dizi)
object (Nesne)
NULL
```

- gettype() fonksiyonu ile bir verinin türünü öğreniriz.

```php
$string = "ali veli";
$int = 500;
$float = 5.5;
$bool = false;
$array = array();
$object = new stdClass;
$null = NULL;
echo gettype($null); // NULL
```

## Constant Assignment

- Sabit Değişkenler;
  - define() fonksiyonu ile tanımlanır.
  - Türkçe karakterler içerebilir.
  - Sayı ile başlayamaz.
  - Harf ya da _ işareti ile başlar.
  - Büyük-küçük harfe duyarlıdır.
  - Veri türlerinde, Object hariç tüm veri türlerini kapsar.

Örnekler

```php
$ali = "ali veli";
//echo $ali;

define("ali", "ali veli");
//define("ali", "ali veli2");

echo ali;
```

## Data Type Casting

Örnek

```php
(double)(5 / 2);

$randNum = 5;
$refToNum = &$randNum;
$randNum = 100;

echo '$refToNum = ' . $refToNum;

```

## Operators and Math Object

```php
+ , - , * , / , % (modular arithmetic)

```
Sabit Tanımlama

```php
define('PI', 3.1415926);
echo "The value of PI is " . PI;

```

## Logical Operators

Operators that return a boolean

| Operator | Meaning                           | Variations |
| -------- | --------------------------------- | ---------- |
| >        | Greater then                      | >=         |
| <        | Less then                         | >=         |
| ==       | Equal                             | =!         |
| ===      | Equal value and type              |            |
| &&       | And (Both things are true)        |            |
| \|       | Or (One of these things are true) |            |
| !        | Not Operator                      |            |

## If Statement

Örnekler

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

## Loops - For,While,Do While

```php

for($i = 1; $i <= 20; $i++) {
    // statements
}


$num = 0;

while($num < 20) {
    // statements
}

```

# String , Number, Array

## String Metodları

## Template Literal (String Format)



# Date And Time

```php
date_default_timezone_set('UTC');
echo date('h:i:s:u a, l F jS Y e');
```


# Arrays

Örnekler

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



# Functions


## Functions



```php
// a function without parameter
function test() {
    return "test";
}

$a = test();
//echo $a;

```

- Function with parameters

```php

function topla($sayi1 = 2, $sayi2 = 10)
{
    return ($sayi1 + $sayi2);
}

$toplam = topla();
//echo $toplam;

```

- Using global variable in a function

```php

$ad = 'ali';

/*
    global
    $GLOBALS
*/

function adsoyad($soyad)
{
    // $GLOBALS['ad']
    global $ad;
    return $ad . ' ' . $soyad;
}

//echo adsoyad('veli');

$yazi = "ali";

//echo substr($yazi, 0, 10) . '..';

function kisalt($str, $limit = 10)
{
    $karakterSayisi = strlen($str);
    if ($karakterSayisi > $limit){
       $str = substr($str, 0, $limit) . '..';
    }
    return $str;
}

echo kisalt($yazi, 5);
```

## Anonymous Functions

- Basit Fonksiyon Kullanımı

```php
function test(){
    return 'test';
}

//echo test();

```
- Anonim fonksiyon kullanımı

```php

$test = function($par){
    return 'test ' . $par;
};

$test2 = function() use ($test){
    return 'test2 ' .  $test('test3');
};

echo $test2();

//echo $test('ali');

```

- function assignment to an Array ( it s defined as closure)

```php

$arr = [
    function(){
        return '1. fonksiyon';
    },
    function(){
        return '2. fonksiyon';
    },
    function(){
        return '3. fonksiyon';
    }
];

//echo $arr[rand(0,2)]();

```



```php
$soyad = 'veli';

function filtrele($isim)
{
    global $soyad;
    return $isim . ' ' . $soyad; 
}

$arr = ['ali','Güner','Meltem','Zeynep'];
$arr = array_map(function($isim) use($soyad){
    return $isim . ' ' . $soyad; 
}, $arr);

// Another usage
// array_map ( 'filtrele',$arr) 

print_r($arr);



```

## get_args() function

```php
/*
    func_num_args()
    func_get_args()
    func_get_arg()
*/

function test()
{
    echo func_num_args() . '<br>';
    print_r(func_get_args()) . '<br>';
    echo func_get_arg(2);
}

test('ali', 'udemy', 'prototurk', '93academy');

// Output


```

## Recursive Functions

```php
function say($sayi)
{
    echo $sayi;
    if ($sayi < 10) {
        say($sayi + 1);
    }
}

//say(1);

$kategoriler = [
    [
        'id' => 1,
        'parent' => 0,
        'ad' => 'Dersler'
    ],
    [
        'id' => 2,
        'parent' => 0,
        'ad' => 'Güncel'
    ]
];

function kategoriListele($kategoriler, $parent = 0)
{
    $html = '';
    $html .= '<ul>';
    foreach ($kategoriler as $kategori) {
        if ($kategori['parent'] == $parent) {
            $html .= '<li>' . $kategori['ad'];
            $html .= kategoriListele($kategoriler, $kategori['id']);
            $html .= '</li>';
        }
    }
    $html .= '</ul>';
    return $html;
}

//echo kategoriListele($kategoriler);

$arr = [
    'ad' => 'ali',
    'soyad' => 'veli',
    'sporlar' => [
        'yuzme' => 'evet',
        'kosma' => 'hayır',
        'savunma_sporlari' => [
            'jeetkunedo' => 'evet',
            'judo' => 'hayır'
        ]
    ]
];

function dizide_bul($dizi, $anahtar)
{
    foreach ($dizi as $key => $val) {
        if ($key == $anahtar) {
            return $val;
        }
        if (is_array($val)) {
            $sonuc = dizide_bul($val, $anahtar);
            if ($sonuc) {
                return $sonuc;
            }
        }
    }
    return false;
}

print_r(dizide_bul($arr, 'savunma_sporlari'));
```

## function_exists

```php
function test2(){
    return 'test';
}

if (function_exists('test')){
    echo 'test fonksiyonu vardır';
} else {
    echo 'test fonksiyonu yoktur';
}

function kisalt($str, $limit = 10)
{
    $karakterSayisi = strlen($str);
    if ($karakterSayisi > $limit){
        if (function_exists('mb_substr')){
            $str = mb_substr($str, 0, $limit, 'utf8') . '..';
        } else {
            $str = substr($str, 0, $limit) . '..';
        }
    }
    return $str;
}

```


## Yield Function

```php

// memory_get_usage()
// number_format()

function byteToMB($byte)
{
    return number_format($byte / 1048576, 2);
}

$sayilar = range(0, 1000000);

echo byteToMB(memory_get_usage()) . ' MB bellek kullanıldı<br>';

function say($baslangic, $limit)
{
    for ($i = $baslangic; $i <= $limit; $i++) {
        yield $i;
    }
}

$sayilar = say(0, 1000000);

echo byteToMB(memory_get_usage()) . ' MB bellek kullanıldı';
```
##  Static variable in a function


```php

function say(){
    static $sayi = 1;
    echo $sayi . '<br>';
    $sayi++;
}

function yukle($deger){
    static $yuklenenler = [];
    $yuklenenler[] = $deger;
    return $yuklenenler;
}

yukle('test.php');
yukle('a.php');
$yuklenenler = yukle('b.php');

print_r($yuklenenler);

```

## Php 7 Feature - Parameter ad Return Type

```php

declare(strict_types = 1);

function topla(int $sayi1, int $sayi2): string
{
    return (string) ($sayi1 + $sayi2);
}

function arr(array $arr): string
{
    return implode(',', $arr);
}

//echo topla(1,3);

print_r(arr(["test","test2"]));

```

# OOP Concepts

## Class Definition

```php

class Foo {
    public $marka; // default public olduğu için publc koymayabiliriz
    public $model; // açık kullanılabilir
    private $kimlik; // sadece sınıfın elemanları ulaşabilir
    protected $no; // sadece sınıfın elemanları ve sınıfın miras aldığı alt sınıflar ulaşabilir

    public function get(){
        return $this->no;
    }

}

```

Sınıf Örneği, obje oluşturalım , objenin alanlarına ulaşalım.

```php
$foobar = new Foo();
$foobar->marka = "";
$foobar->get();
```

## Inheritance

```php
class Bar {
    public $z;
    private $y;
    protected $x;
}

class Foo extends Bar {
    public function get(){
        return $this->y;
    }
}

```

## Constructor

```php

class Foo {
    public function __construct() {
        // kurucu işlemleri
    }
}


```

## Yıkıcılar

Objenin kullanımı bitince çalıştırılacak metotdur.

```php

class Foo {
    public function __construct() {
        // commands
        echo "begin of object<br>";
    }

    public function __destruct() {
        // commands
        echo "end of object<br>";
    }
}


```

```php
$s = new Foo();

for($i=1; $i<5;i++>){
    echo "$i \n";
}
// end of page

// Output
begin of object
1 2 3 4
end of object

```

## Static Definition

```php
class Foo {
    public static $x = "tolga";

    public static function get(){
        return self::$x;
    }

    public static function get2(){
        return self::$x;
    }
}

// Statik alana erişim
print Foo::$x
print Foo::get();
print Foo::get2();

```

## Interface (Arayüz) Kullanımı

```php
interface Insan {
    // gövde belirtilmez
    function x();

}

// interface 'in kullanımı
class Foo implements Insan {

    function x(){

    }
}

// interface , interface'i extend edebilir
interface Canlı extends Insan {

}

```

Interface'ler sınıf tarafından extend edilemezler.

## Abstract Sınıf (Soyut Sınıf) Kullanımı

```php
// abstract sınıf tanımı
abstract class Canli {

    public $x = 1;

    abstract function beslen();
}

// abstract sınıfının kullanımı
class Insan extends Canli {

    function beslen(){
        // işlemler
    }

}


```

## Final Ön Tanımı

```php

class Insan {

    final public function get(){

    }
}

class Tolga extends Insan {

    // final function override edilemez / değişiklik yapılamaz
    // xxx function get(){}

}


```

## Namespace nedir

Sınıfları bir araya toplayan kümedir. Javada package, C#'da namespace benzeri bir yapıdır.

```php
// namespace.php
namespace Insan\HH

interface Insan {

}

class Ahmet {

    function get()){
        return 12;
    }
}

// birden fazla namespace aynı dosyada kullanılabilir
namespace Insan\HH2;

```

Namespace'in kullanımı

```php
// demo1.php
require 'namespace.php';
echo Insan\HH\Ahmet::get();

//**Output**
//12

```

```php
// demo2.php
require 'namespace.php';
use Insan\HH\Ahmet as ahmet
echo ahmet::get();

//**Output**
//12

```

---

# GET, POST And Session 

## Post Variables

```php
$usersName = $_POST['username'];
$streetAddress = $_POST['streetaddress'];
$cityAddress = $_POST['cityaddress'];

echo $usersName . "</br>";
echo $streetAddress . "</br>";
echo \$cityAddress . "</br></br>";
```

- Remember, GET and POST are for getting data from the client.

GET - visible in URL

POST - not visible in URL

- SESSION is for keeping data persistet between pages, for example, the ID of a logged in user.

// Retrieve data from a GET method
// (ie method="get" in an HTML form from the previous page.)
$username = $_GET['username'];

// Same thing for a POST method but use $_POST instead of $_GET
$color = $_POST['favorite_color'];

// Session works the same way except that you have to call...
session_start();

// ...before you can do anything.

// also, session variables you set on your own, whereas GET and POST are set on the client side.

$_SESSION['favorite_MLP_character'] = "PewDiePie";

// The string between the []s (AKA the Key) can be whatever you want it to be,
// and you can use that string whenever to retrieve or modify the value that
// $_SESSION['string'] holds, even on a different page entirely.

$pony = $_SESSION['favorite_MLP_character'];
echo $pony; 
// prints 'PewDiePie'

// Each session is unique to that user. If you want to delete all session variables stored for this user, do this:

session_unset();

---

# Database Connection

## PDO Connection

```php

try {
    $db = new PDO('mysql:host=localhost;dbname=uyeler', 'root', 'root'); // connectionUrl,user,pass
    //printf("Baglantı kuruldu");
} catch (PDOException $e){
    echo $e->getMessage();
}

```




---

# Composer

## Installation

- Windows için composer setup indirilip kurulur.

- Mac için

## Usage

- composer ayar dosyası composer.json dosyası oluşturulur. Örnek composer.json dosyası :

```php
{
    "name": "engtuncay/apidemo",
    "description": "apidemo",
    "require": {
        "teknomavi/tcmb": "^1.0",
        "prodigyview/prodigyview": "^0.9.91"
    }
}
```

- require anahtarında gerekli bağımlılıklar yazılır.

- bağımlılıklar https://packagist.org/ adresinden bulunabilir.

- composer install ve composer update ile bağımlılıklar kurulur.

```php
$ composer install

$ composer update
```

- bağımlıkları vendor klasörüne indirir.

- projemizde kullanmak için aşağıdaki importu yapmamız gerekir.

```php
include ('vendor/autoload.php');
```

## Composer Komutları

Composer ile paket yükleme

    composer require paket_adi

veya

    composer require paket_adi:paket_surumu

Örnek

    composer require tolgabulca/coremvc:dev-master

- Composer kendisini güncellemek için

        composer self-update

- Composer projesini klonlamak için
  composer create-project tolgabulca/coremvc:dev-master

* getcomposer.org detay komutları görebilirsiniz.


# Kaynaklar

- Udemy Tayfun Erbilen Kursu
- Cheatsheets


---


# Düzenlenecek Notlar


- EOD String sytax

$str = <<<EOD
	The customers name is
	$usersName and they
live at $streetAddress
	in $cityAddress</br>
EOD;

    echo $str;

- INCREMENT

\$randNum = 5;

echo \$randNum += 10;
echo "</br>";

echo "++randNum = " . ++$randNum . "</br>";
echo "randNum++ = " . $randNum++ . "</br>";
echo \$randNum;



- ARITHMETICS

if(5 == 10) {
echo '5 = 10';
} else {
echo '5 != 10';
}

$numOfOranges = 4;
$numOfBananas = 36;





- MULTI-DIMENSIONAL ARRAYS

\$customers = array(array('Derek', '123 Main', '15212'),
array('Derek', '123 Main', '15212'),
array('Derek', '123 Main', '15212'));

for ($row=0; $row < 3; $row++) { 
	for ($col=0; $col < 3; $col++) {
echo $customers[$row][$col] . ', ';
}
echo '</br>';
}

// Common Array Functions
// sort($yourArray) : Sorts in ascending alphabetical order or
// if you add , SORT_NUMERIC or , SORT_STRING
// asort($yourArray) : sorts arrays with keys
// ksort(\$yourArray) : sorts by the key
// Put a r infront of the above to sort in reverse order

- STRING FUNCTIONS & FORMATTING

\$randString = " Random String ";

echo strlen("$randString") . "</br>";
echo strlen(ltrim("$randString")) . "</br>";
echo strlen(rtrim("$randString")) . "</br>";
echo strlen(trim("$randString")) . "</br>";

- Conversion Codes (printf)

echo "The randomString is $randString </br>";
printf("The randomString is %s </br>", $randString);

\$decimalNum = 2.3456;

printf("decimal num = %.2f </br>", \$decimalNum);

// Other conversion codes
// b : integer to binary
// c : integer to character
// d : integer to decimal
// f : double to float
// o : integer to octal
// s : string to string
// x : integer to hexadecimal\*/

\$randString = "Random String";

echo strtoupper($randString) . "</br>";
echo strtolower($randString) . "</br>";
echo ucfirst(\$randString) . "</br>";

$arrayForString = explode(' ', $randString, 2);
$stringToArray = implode(' ', $arrayForString);
\$partOfString = substr("Random String", 0, 6);

echo "</br>";

echo \$partOfString;

echo "</br>";

$man = "Man";
$manhole = "Manhole";

echo strcmp($man, $manhole);
echo strcasecmp($man, $manhole);

echo "The String " . strstr($randString, "String");
echo "</br>";
echo "Loc the String " . strpos($randString, "String");
echo "</br>";

$newString = str_replace("String", "Stuff", $randString);
echo \$newString;
echo "</br>";

- FUNCTION

function addNumbers($num1, $num2) {
return $num1 + $num2;
}

echo "3 + 4 = " . addNumbers(3, 4);

/\*

- Above is the opening php tag. Include it in a normal html file (ending in
- .php), and inject whatever code you want.
  
  
  
  \*/
  // ^That was a multi-line comment. This line is a single-line comment.
  // Comments are completely ignored when running a .php file.


- BASIC STUFF
  \*/

- Print the words Hello World
    
        echo "Hello World";

- Create a variable and assign a value
    
        $name = "John Doe";

- Change the value of an existing variable
    
        $name = "Adam Smith"; // HA! There is no difference!

- Variables can hold more than just strings
        
        $number = 12;

- Add two strings together and print
echo "My name is " . "Adam Smith";

- Works with variables too

        echo "My name is " . $name;
        echo "My name is $name"; // shorter syntax, does the same thing


- LOGIC STUFF

// If statement
if(1 < 2) {
// The below code is never executed because 1 < 2 is a lie
echo "This should never happen!!!";
}

if($name === "Adam Smith") {
    // The below code is executed because we set $name to Adam Smith earlier
echo "This line is executed";
}

// Else statement
$something = False;
if($something) {
echo "This isn't executed";
}
else {
// Only executed if \$something evaluates to false
echo "But this is";
}

// Elseif statement
$somethingElse = True;
if($something) {
echo "Not used";
}
elseif($something || $somethingElse) {
echo "This block is triggered!";
}
else {
echo "Not used because we've already found a matching condition above.";
}

/\*

\*/

// Sample Uses of Logical Evaluators

echo "2" == 2; // True because == will try to convert types
echo "2" === 2; // False because they are not the same type
echo !True; // Returns False
echo !False; // Returns True
echo $number > 5 && $number < 42; // Returns True if number is between 5 and 42
echo $name === "A. S." || $name === "Mr. Q"; // True if name is A. S. or Mr. Q
echo !($name === "Minchow"); // Returns True as long as $name is not "Minchow"

echo !($number > 12); // Returns True if number is not greater than 12.
//This^ could be rewritten as $number <= 12

/\*\*

- LOOPS
  \*/

// Executes the code between the {}s as long as the condition between the ()s is true.
$number = 5;
while($number > 0) {
echo "Your number is $number. ";
    $number --;
}
// Prints: "Your number is 5. Your number is 4. Your number is 3. Your number
// is 2. Your number is 1.

// Does the same thing as the above while loop.
// within the ()s, first statement sets initial code before the loop starts,
// second checks that the condition is true before it loops again,
// third executes after every loop.
for($number = 5; $number > 0; $number --) {
    echo "Your number is $number. ";
\$number --;
}

- WORKING WITH DATABASES
  \*/

// Connect to database, store conneciton info in $mysqli
$connection = new mysqli("hostname", "user", "password", "database_name");

// Execute query on the conncted database
$queryResult = $connection->query("SELECT \* FROM USERS;"); // Any query can go here.

// TODO add get first row from result as array

?>







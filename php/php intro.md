# Introduction to Php

- [Introduction to Php](#introduction-to-php)
- [OOP Kavramları](#oop-kavramlar%c4%b1)
  - [Sınıf Tanımlama](#s%c4%b1n%c4%b1f-tan%c4%b1mlama)
  - [Miras Alma (Inheritance)](#miras-alma-inheritance)
  - [Constructor (Kurucu Metod)](#constructor-kurucu-metod)
  - [Yıkıcılar](#y%c4%b1k%c4%b1c%c4%b1lar)
  - [Static Tanımım](#static-tan%c4%b1m%c4%b1m)
  - [Interface (Arayüz) Kullanımı](#interface-aray%c3%bcz-kullan%c4%b1m%c4%b1)
  - [Abstract Sınıf (Soyut Sınıf) Kullanımı](#abstract-s%c4%b1n%c4%b1f-soyut-s%c4%b1n%c4%b1f-kullan%c4%b1m%c4%b1)
- [Php'nin Temelleri - 1 (Core Php)](#phpnin-temelleri---1-core-php)
  - [Comment Line and Block](#comment-line-and-block)
  - [Variable Assignment (tr:Değişken Tanımlama)](#variable-assignment-trde%c4%9fi%c5%9fken-tan%c4%b1mlama)
  - [Data Type Casting (tr:Veri Tipini Değiştirme)](#data-type-casting-trveri-tipini-de%c4%9fi%c5%9ftirme)
  - [Operatörler ve Math Objesi](#operat%c3%b6rler-ve-math-objesi)
  - [String Metodları](#string-metodlar%c4%b1)
  - [Template Literal (String oluşturmada yeni standart)](#template-literal-string-olu%c5%9fturmada-yeni-standart)
  - [Arraylerin Özellikleri](#arraylerin-%c3%96zellikleri)
  - [Obje Kavramı ve Oluşturma](#obje-kavram%c4%b1-ve-olu%c5%9fturma)
  - [Zaman Objesi ve Metodları](#zaman-objesi-ve-metodlar%c4%b1)
- [Php Temelleri - 2](#php-temelleri---2)
  - [Karşılaştırma Operatörleri](#kar%c5%9f%c4%b1la%c5%9ft%c4%b1rma-operat%c3%b6rleri)
  - [Mantıksal Bağlaçlar](#mant%c4%b1ksal-ba%c4%9fla%c3%a7lar)
  - [If Statement (if ifadesi)](#if-statement-if-ifadesi)
  - [Switch - Case Yapısı](#switch---case-yap%c4%b1s%c4%b1)
  - [Fonksiyonlar, IIFE ve Anonim Fonksiyonlar](#fonksiyonlar-iife-ve-anonim-fonksiyonlar)
  - [Döngüler - While,Do While,For](#d%c3%b6ng%c3%bcler---whiledo-whilefor)
- [Composer](#composer)
  - [Kurulumu](#kurulumu)
  - [Kullanımı](#kullan%c4%b1m%c4%b1)
  - [Composer Komutları](#composer-komutlar%c4%b1)
- [DATE](#date)
- [FORM POST (variables)](#form-post-variables)
- [EOD String sytax](#eod-string-sytax)
- [INCREMENT](#increment)
- [CASTING](#casting)
- [ARITHMETICS](#arithmetics)
- [TERNARY OPERATOR](#ternary-operator)
- [SWITCH STATMENT](#switch-statment)
- [LOOPS](#loops)
- [ARRAYS](#arrays)
- [MULTI-DIMENSIONAL ARRAYS](#multi-dimensional-arrays)
- [STRING FUNCTIONS & FORMATTING](#string-functions--formatting)
- [Conversion Codes (printf)](#conversion-codes-printf)
- [FUNCTION](#function)

# OOP Kavramları

## Sınıf Tanımlama

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

## Miras Alma (Inheritance)

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

## Constructor (Kurucu Metod)

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
        // kurucu işlemleri
        echo "beg";
    }

    public function __destruct() {
        // kurucu işlemleri
        echo "end";
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
// beg1 2 3 4end

```

## Static Tanımım

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



---

# Php'nin Temelleri - 1 (Core Php)

## Comment Line and Block

    // This is a single-line comment
    
    /*
        This is a mult-line comment.
    */
  
Comments are completely ignored when running a php file.

## Variable Assignment (tr:Değişken Tanımlama)

## Data Type Casting (tr:Veri Tipini Değiştirme)



    (double)(5 / 2);

## Operatörler ve Math Objesi

    + , - , * , / , % (modular arithmetic)




Sabit Tanımlama

    define('PI', 3.1415926);
    echo "The value of PI is " . PI;


## String Metodları

## Template Literal (String oluşturmada yeni standart)

## Arraylerin Özellikleri

## Obje Kavramı ve Oluşturma

## Zaman Objesi ve Metodları

# Php Temelleri - 2

## Karşılaştırma Operatörleri

List of Logical Operators

The things that can go inside a statement that return a boolean

    >  Greater then 
    >= Greater then or equal
    <  Less Then 
    <= Less Then or Equal
    == Equal (value)
    === Both things equal to each other and are the same type
    && Both things are true
    || One of these things are true
    ! Not Operator

## Mantıksal Bağlaçlar

## If Statement (if ifadesi)

## Switch - Case Yapısı

## Fonksiyonlar, IIFE ve Anonim Fonksiyonlar

## Döngüler - While,Do While,For

---

# Composer

## Kurulumu

- Windows için composer setup indirilip kurulur.

- Mac için

## Kullanımı

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

- require anahtarında gerekli bağımlılık yazılır.

- bağımlılıklar https://packagist.org/ adresinden bulunabilir.

- composer install ve composer update ile bağımlılıklar kurulur.

```php
$ composer install

$ composer update
```

- bağımlıkları vendo klasörüne indirir.

- projemiz kullanmak için aşağıdaki importu yapmamız gerekir.

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

# DATE

echo "Data processed";

date_default_timezone_set('UTC');

echo date('h:i:s:u a, l F jS Y e');

# FORM POST (variables)

$usersName = $\_POST['username'];
$streetAddress = $\_POST['streetaddress'];
$cityAddress = $\_POST['cityaddress'];

echo $usersName . "</br>";
echo $streetAddress . "</br>";
echo \$cityAddress . "</br></br>";

# EOD String sytax

$str = <<<EOD
	The customers name is
	$usersName and they
live at $streetAddress
	in $cityAddress</br>
EOD;

    echo $str;


# INCREMENT

\$randNum = 5;

echo \$randNum += 10;
echo "</br>";

echo "++randNum = " . ++$randNum . "</br>";
echo "randNum++ = " . $randNum++ . "</br>";
echo \$randNum;

# CASTING

$randNum = 5;
$refToNum = &$randNum;
$randNum = 100;

echo '$refToNum = ' . $refToNum;

# ARITHMETICS

if(5 == 10) {
echo '5 = 10';
} else {
echo '5 != 10';
}

$numOfOranges = 4;
$numOfBananas = 36;

// IF STATEMENTS
if ( ($numOfOranges > 25) && ($numOfBananas > 30) ) {
echo '25% Discount';
} else if ( ($numOfOranges > 30) || ($numOfBananas > 35) ) {
echo '15% Discount';
} else if ( !($numOfOranges < 5) || !($numOfBananas < 5) ) {
echo '5% Discount';
} else {
echo 'No Discount for you';
}

# TERNARY OPERATOR

\$biggestNum = (15 > 10) ? 15 : 10;

echo \$biggestNum;

# SWITCH STATMENT

switch (\$usersName) {
case "Derek" :
echo "Hello Derek";
break;

    case "Sally" :
    	echo "Hello Sally";
    	break;

    default :
    	echo "Hello Valued Customer";
    	break;

}

# LOOPS

    $num = 0;

    while($num < 20) {
    	echo ++$num . ', ';
    }

    for($i = 1; $i <= 20; $i++) {
    	echo $i;

    	if($i != 20) {
    		echo ', ';
    	} else {
    		break;
    	}
    }

# ARRAYS

\$bestFriends = array('Joy', 'Willow', 'Ivy');

//echo 'My Wife ' . \$bestFriends[0];

\$bestFriends[4] = 'Steve';

foreach ($bestFriends as $friend) {
echo \$friend . ', ';
}

$customer = array('Name'=>$usersName, 'Street'=>$streetAddress, 'City'=>$cityAddress);

echo "</br>";

foreach ($customer as $key => $value) {
	echo $key . ' : ' . \$value . "</br>";
}

$bestFriends = $bestFriends + \$customer;

# MULTI-DIMENSIONAL ARRAYS

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

# STRING FUNCTIONS & FORMATTING

\$randString = " Random String ";

echo strlen("$randString") . "</br>";
echo strlen(ltrim("$randString")) . "</br>";
echo strlen(rtrim("$randString")) . "</br>";
echo strlen(trim("$randString")) . "</br>";

# Conversion Codes (printf)

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

# FUNCTION

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


- This file contains brief examples of valid php code. I'll break up the major
- subsections by multi-line comments, and include smaller labels of what each
- thing is and what it does. Other things to note:
-
- BASIC PHP SYNTAX
-
- - Every statement ends in a ;
- - Loops, ifs, and anything else with a block of code inside it have brackets {}
- - Variables start with \$
- - Everything is case sensitive
- \*/

/\*

- BASIC STUFF
  \*/

// Print the words Hello World
echo "Hello World";

// Create a variable and assign a value
\$name = "John Doe";

// Change the value of an existing variable
\$name = "Adam Smith"; // HA! There is no difference!

// Variables can hold more than just strings
\$number = 12;

// Add two strings together and print
echo "My name is " . "Adam Smith";

// Works with variables too
echo "My name is " . $name;
echo "My name is $name"; // shorter syntax, does the same thing

/\*

- LOGIC STUFF
  \*/

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

/\*\*

- GET, POST, and SESSION
-
- Remember, GET and POST are for getting data from the client.
- GET - visible in URL
- POST - not visible in URL
-
- SESSION is for keeping data persistet between pages, for example, the ID of
- a logged in user.
-
- TODO COOKIES
  \*/

// Retrieve data from a GET method
// (ie method="get" in an HTML form from the previous page.)
$username = $\_GET['username'];

// Same thing for a POST method but use $_POST instead of $\_GET
$color = $\_POST['favorite_color'];

// Session works the same way except that you have to call...
session_start();
// ...before you can do anything.

// also, session variables you set on your own, whereas GET and POST are set
// on the client side.
\$\_SESSION['favorite_MLP_character'] = "PewDiePie";

// The string between the []s (AKA the Key) can be whatever you want it to be,
// and you can use that string whenever to retrieve or modify the value that
// \$\_SESSION['string'] holds, even on a different page entirely.

$pony = $\_SESSION['favorite_MLP_character'];
echo \$pony; // prints 'PewDiePie'

// Each session is unique to that user. If you want to delete all session
// variables stored for this user, do this:
session_unset();

/\*\*

- WORKING WITH DATABASES
  \*/

// Connect to database, store conneciton info in $mysqli
$connection = new mysqli("hostname", "user", "password", "database_name");

// Execute query on the conncted database
$queryResult = $connection->query("SELECT \* FROM USERS;"); // Any query can go here.

// TODO add get first row from result as array

?>

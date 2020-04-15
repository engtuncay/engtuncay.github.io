


# Php 

# OOP Kavramları

## Sınıf Tanımlama

```php
class Kalem {
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
$foobar = new Kalem();
$foobar->marka = "";
$foobar->get();

```

## Miras Alma Kullanmma, Kurucular ve Yıkıcılar


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

## Constructor (Kurucular)

```php

class Foo {
    public function __construct() {
        // kurucu işlemleri
    }
}


```

## Yıkıcılar (Objenin kullanımı bitince çalıştırılacak metod)

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
$s = new Z();

for($i=1; $i<5;i++>){
    echo "$i \n";
}

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

    public function get2(){ // function ifadesinden önce statik koymamız gerekmez
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


- getcomposer.org detay komutları görebilirsiniz.







# DATE
echo "Data processed";

date_default_timezone_set('UTC');

echo date('h:i:s:u a, l F jS Y e');

# FORM POST (variables)
$usersName = $_POST['username'];
$streetAddress = $_POST['streetaddress'];
$cityAddress = $_POST['cityaddress'];

echo $usersName . "</br>";
echo $streetAddress . "</br>";
echo $cityAddress . "</br></br>";

# EOD String sytax
$str = <<<EOD
	The customers name is
	$usersName and they
	live at $streetAddress
	in $cityAddress</br>
EOD;

	echo $str;

# OPERATORS
	define('PI', 3.1415926);

	echo "The value of PI is " . PI;

	echo "</br>5 + 2 = " . (5 + 2);
	echo "</br>5 - 2 = " . (5 - 2);
	echo "</br>5 * 2 = " . (5 * 2);
	echo "</br>5 / 2 = " . (double)(5 / 2);
	echo "</br>5 % 2 = " . (5 % 2) . "</br>";

# INCREMENT
$randNum = 5;

echo $randNum += 10;
echo "</br>";

echo "++randNum = " . ++$randNum . "</br>";
echo "randNum++ = " . $randNum++ . "</br>";
echo $randNum;

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
$biggestNum = (15 > 10) ? 15 : 10;

echo $biggestNum;

# SWITCH STATMENT
switch ($usersName) {
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
$bestFriends = array('Joy', 'Willow', 'Ivy');

//echo 'My Wife ' . $bestFriends[0];

$bestFriends[4] = 'Steve';

foreach ($bestFriends as $friend) {
	echo $friend . ', ';
}

$customer = array('Name'=>$usersName, 'Street'=>$streetAddress, 'City'=>$cityAddress);

echo "</br>";

foreach ($customer as $key => $value) {
	echo $key . ' : ' . $value . "</br>";
}

$bestFriends = $bestFriends + $customer;

# MULTI-DIMENSIONAL ARRAYS
$customers = array(array('Derek', '123 Main', '15212'),
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
// ksort($yourArray) : sorts by the key
// Put a r infront of the above to sort in reverse order

# STRING FUNCTIONS & FORMATTING
$randString = "			Random String 		";

echo strlen("$randString") . "</br>";
echo strlen(ltrim("$randString")) . "</br>";
echo strlen(rtrim("$randString")) . "</br>";
echo strlen(trim("$randString")) . "</br>";

# Conversion Codes (printf)
echo "The randomString is $randString </br>";
printf("The randomString is %s </br>", $randString);

$decimalNum = 2.3456;

printf("decimal num = %.2f </br>", $decimalNum);

// Other conversion codes
// b : integer to binary
// c : integer to character
// d : integer to decimal
// f : double to float
// o : integer to octal
// s : string to string
// x : integer to hexadecimal*/

$randString = "Random String";

echo strtoupper($randString) . "</br>";
echo strtolower($randString) . "</br>";
echo ucfirst($randString) . "</br>";

$arrayForString = explode(' ', $randString, 2);
$stringToArray = implode(' ', $arrayForString);
$partOfString = substr("Random String", 0, 6);

echo "</br>";

echo $partOfString;

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
echo $newString;
echo "</br>";

# FUNCTION
function addNumbers($num1, $num2) {
	return $num1 + $num2;
}

echo "3 + 4 = " . addNumbers(3, 4);

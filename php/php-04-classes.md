
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


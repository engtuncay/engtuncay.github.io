


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









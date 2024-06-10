
- [Composer](#composer)
  - [Installation](#installation)
  - [Usage](#usage)
  - [Composer ile paket yükleme](#composer-ile-paket-yükleme)
  - [Composer kendisini güncellemek için](#composer-kendisini-güncellemek-için)
  - [Composer projesini klonlamak için](#composer-projesini-klonlamak-için)
  - [Composer Documentation](#composer-documentation)
- [Articles](#articles)
  - [Composer Nedir](#composer-nedir)
  - [Composer: Autoload Sınıf Yükleme](#composer-autoload-sınıf-yükleme)


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

## Composer ile paket yükleme

```bash
composer require paket_adi
# veya
composer require paket_adi:paket_surumu
```

*Örnek*

```bash
composer require tolgabulca/coremvc:dev-master
```

- engtuncay/phputils paketini yüklenmesi

```bash
composer require engtuncay/phputils
```


## Composer kendisini güncellemek için

```bash
composer self-update
```


## Composer projesini klonlamak için
  
```bash
composer create-project tolgabulca/coremvc:dev-master
```

## Composer Documentation

- http://getcomposer.org detay komutları görebilirsiniz.


# Articles

## Composer Nedir 

Source : https://www.rizagunes.com/Composer_Nedir 

Date: 27-06-2015

Kısaca PHP için geliştirilmiş bir bağımlılık yönetim aracıdır. Projenizde kullanmak istediğiniz kütüphane isimlerini tanımlarsınız Composer sizin için indirir ve kullanıma hazır hale getirir. Ayrıca güncelleme kolaylığıyla da kütüphanelerinizi uğraşmadan en güncel haliyle kullanabilirsiniz. Bitti mi? Bitmedi, abiler ablalar elimde görmüş olduğunuz Composer bizlere PSR standartlarında autoload da sunuyor. 

PHP dünyasının gerilmesini, tartışmasız composer engellemiştir. Çünkü java da maven, nodejs de npm, ruby de bundler gibi bağımlılık yöneticileri bulunmaktaydı. Composer'ın bize kazandırdıkları saymakla bitmez. Bu yüzden lafı çok uzatmadan anlatıma başlayayım.

➖ Composer Nasıl Kurulur?


Linux/Unix İşletim Sistemlerinde:

1. Seçenek: Curl yüklü ise:

```bash
curl -sS https://getcomposer.org/installer | php

```

1. Seçenek: Eğer yüklü değilse aşağıdaki kod ile composer.phar dosyasını indirin:

```bash
php -r "readfile('https://getcomposer.org/installer');" | php

```

composer.phar dosyasını indirdikten sonra aşağıdaki kod ile sistem dizininize taşıyın.

```
mv composer.phar /usr/local/bin/composer

```

➖ Windows İşletim Sisteminde:

`Composer-Setup.exe` dosyasını indirin ve kurun.

➖ Composer Nasıl Kullanılır?

Composer'ın çalışabilmesi için kök dizinde composer.json dosyasını arar. Bu dosyanın içinde composer ile ilgili tüm ayarlar bulunmaktadır. Kurulumu yaptıktan sonra bu dosyayı kök dizinde oluşturmalısınız.

composer.json dosyasını elinizle oluşturabilceğiniz gibi herhangi bir kütüphane yükleyerek de composer'a oluşturtabilirsiniz.

Composer ile en çok yüklenen paket olan "monolog" kütüphanesini yükleyelim. Terminal yada Komut İstemini açın projenizin kök klasörüne gidin. Ardından aşağıdaki kodu çalıştırın.

```bash
composer require monolog/monolog

```

Tebrikler ilk kütüphanenizi projenize dahil ettiniz, ilk yükleme olduğu için composer kendi kurulumunu da yapmış oldu. Eğer composer.json dosyası tanımlıysa ve vendor klasörü bulunmuyorsa ilk olarak aşağıdaki kod ile yükleme yapacağınızı da unutmayın.

```bash
composer install

```

Şimdi oluşan dosyaları inceleyelim.

composer.json dosyası:

```
{
    "require": {
        "monolog/monolog": "^1.14"
    }
}

```

Biraz önce biz composer'a monolog kütüphanesine ihtiyacım var dedik, o da json dosyasının içine bu ifadeyi yazdı. Ardından gerekli dosyaları indirip ayarlarını yaptı.

composer.json dosyasında require anahtarımızın içinde ihityacımız olan kütüphaneleri ve özellikleri belirtiyoruz. Composer da require dışında bir çok ifade var bunları kafanızı karıştırmamak için bu yazımda anlatmayacağım.

➖ vendor klasörü

Bu klasörde composer tarafından indirilen sınıflar ve composer'ın autoload dosyası bulunmaktadır.

```
vendor/autoload.php

```

İsminden de anlaşılacağı gibi composer'ın autoload dosyası. Biz sadece bu dosyayı projemize dahil edeceğiz.

➖ Projelerde kullanma

Monolog kütüphanesini madem indirdik hadi test yapalım.

```php

<?php

// Composer'ın autoload dosyasını dahil ettik
require_once "vendor/autoload.php";

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('logtesti');
$log->pushHandler(new StreamHandler('logs/logdosyam.log', Logger::WARNING));

// add records to the log
$log->addWarning('Foo');
$log->addError('Bar');

```

Şimdi vendor klasörünü incelemeye devam edelim. monolog klasörünün içinde bir composer.json dosyası daha var. Ona bakalım:

```php
{
    "name": "monolog/monolog",
    "description": "Sends your logs to files, sockets, inboxes, databases and various web services",
    "keywords": ["log", "logging", "psr-3"],
    "homepage": "http://github.com/Seldaek/monolog",
    "type": "library",
    "license": "MIT",
    "authors": [
        {
            "name": "Jordi Boggiano",
            "email": "j.boggiano@seld.be",
            "homepage": "http://seld.be"
        }
    ],
    "require": {
        "php": ">=5.3.0",
        "psr/log": "~1.0"
    },
    "require-dev": {
        "phpunit/phpunit": "~4.5",
        "graylog2/gelf-php": "~1.0",
        "raven/raven": "~0.8",
        "ruflin/elastica": ">=0.90 <3.0",
        "doctrine/couchdb": "~1.0@dev",
        "aws/aws-sdk-php": "^2.4.9",
        "videlalvaro/php-amqplib": "~2.4",
        "swiftmailer/swiftmailer": "~5.3",
        "php-console/php-console": "^3.1.3",
        "phpunit/phpunit-mock-objects": "2.3.0"
    },
    "_": "phpunit/phpunit-mock-objects required in 2.3.0 due to https://github.com/sebastianbergmann/phpunit-mock-objects/issues/223",
    "suggest": {
        "graylog2/gelf-php": "Allow sending log messages to a GrayLog2 server",
        "raven/raven": "Allow sending log messages to a Sentry server",
        "doctrine/couchdb": "Allow sending log messages to a CouchDB server",
        "ruflin/elastica": "Allow sending log messages to an Elastic Search server",
        "videlalvaro/php-amqplib": "Allow sending log messages to an AMQP server using php-amqplib",
        "ext-amqp": "Allow sending log messages to an AMQP server (1.0+ required)",
        "ext-mongo": "Allow sending log messages to a MongoDB server",
        "aws/aws-sdk-php": "Allow sending log messages to AWS services like DynamoDB",
        "rollbar/rollbar": "Allow sending log messages to Rollbar",
        "php-console/php-console": "Allow sending log messages to Google Chrome"
    },
    "autoload": {
        "psr-4": {"Monolog\\": "src/Monolog"}
    },
    "autoload-dev": {
        "psr-4": {"Monolog\\": "tests/Monolog"}
    },
    "provide": {
        "psr/log-implementation": "1.0.0"
    },
    "extra": {
        "branch-alias": {
            "dev-master": "1.14.x-dev"
        }
    },
    "scripts": {
        "test": "phpunit"
    }
}

```

Uzunluğu sizi korkutmasın hepsi basit şeyler ve sonraki yazılarımda bunlardan bahsedeceğim. Zaten çoğunu doğru tahmin etmişsinizdir. Biz şimdi require anahtarının içindeki değerlere bakalım.

```
{  
  "require": {
        "php": ">=5.3.0",
        "psr/log": "~1.0"
    }
}

```

İndirdiğimiz monolog kütüphanesin içinde de istekler var bunlardan birincisi PHP sürümünün 5.3'den büyük yada eşit olması. Eğer altındaysa yükleme sırasında bunun hatasını verecektir. Bir diğeri psr/log kütüphanesi. psr/log kütüphanesini de composer otomatik olarak indirecektir. Eğer onun da ihtiyaç duyduğu kütüphaneler varsa onlar da inecektir ta ki ihtiyaç kalmayana kadar. Bağımlılık yönetim aracı denmesinin sebebi de budur.

Yeni bir kütüphane daha ekleyelim

Monolog kütüphanesini composer require komutu ile yükledik, şimdi composer.json dosyasına müdahale ederek yükleme yapalım.

Kullanımı çok yaygın olan ORM kütüphanesi; Doctrine'i yükleyelim.

```
{
    "require": {
        "monolog/monolog": "^1.14",
        "doctrine/orm": "*"
    }
}

```

composer.json dosyasına "doctrine/orm": "*" satırını ekledikten sonra terminal de composer update komutunu çalıştırın. Yine otomatik indirip autoload'a bu sınıfı kaydedecektir. Size sadece kullanmak kalacak. Kaldırma işlemi de gayet basit require kısmından kaldırmak istediğiniz paketi silin. Ardından composer-update kodunu çalıştırın.

Require Anahtarı:

require ifadesinin içindeki satırda sol taraf paket ismini sağ taraf ise paket sürümünü ifade eder. Peki paket sürümün içinde olan *,^ karakterler ne ifade ediyor ona bakalım.


Karakter             | Açıklama
---------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------
Kesin ifade          | Hangi sürümü yazarsanız onu indirir. Güncellemelerden etkilenmez. Örneğin:  "1.0.2"
`*`                  | Örneğin "1.*" ifadesi 1.0> x <2 ifadesine denktir. Sadece * yazarsanız son stabil sürümü indirir.
`<, >, <=, >=, \|\|` | Aralık belirtir. Örneğin 1.0 ile 2 arasında güncelleme yapmasını istiyorsanız ">=1.0 <=2.0" arada ki boşluk "ve" anlamına gelir. Veya operatörü ise `\|\|` 'dir
`-`                  | Aralık belirtir. Örneğin: "1.0 - 2.0" ifadesi. 1.0>= x <= 2.0 ifadesine denktir.
~                    | "~1.2" ifadesi ">=1.2 <2.0" ifadesine denktir
^                    | "^1.2.3" ifadesi ">=1.2.3 <2.0" ifadesine denktir

Değirmenin Kaynağı

Composer bu dosyaları nereden çekiyor yada işime yarayacak kütüphaneleri nereden bulacağım diyorsanız? Cevap: Packagist.Org

Sitede her paketin sayfasında; composer require xxx kodu yani yükleme kodu var. Sağ tarafta ise paketin sürümleri yer almaktadır. Siz de kendi sınıflarınızı, insanlığın gelişmesi için paylaşabilirsiniz :). Yapmanız gereken; github hesabı açıp, dosyalarınızı yükleyip ardından packagist.org'a kütüphanenizi göndermek.

Konu basit ama uzun olduğu için ortaya nasıl bi anlatım çıktı karar vermiş değilim. Yorumlarınızla belirtirseniz sevinirim. Bir sonraki yazımda Composer autoload'ına kendi sınıflarımızı dahil etmeyi anlatacağım.

Composer hakkında daha detaylı bilgi istiyorsanız sizi buraya, composer.json dosyasındaki anahtar kelimler için ise sizi buraya alalım.


## Composer: Autoload Sınıf Yükleme 

Source : https://www.rizagunes.com/composer-autoload-sinif-yukleme , 29-06-2015

Bir önceki yazımda; "Composer'ın nedir, ne işe yarar?" konusundan bahsetmiştim. Bu yazımda ise composer'da autoload'ların nasıl tanımlanacağından bahsedeceğim.

Composer ile 4 farklı autoload tanımlaması yapabilirsiniz.

```
PSR-4
Classmap
files
PSR-0

```

➖ PSR-4 Standartlarında Autoload:

```
{
    "autoload": {
        "psr-4": {
            "Illuminate\\": "src/Illuminate/"
        }
    }
}

```

Yukarıdaki örnek: laravel paketlerinin autoload tanımlamasıdır. Illuminate\ adında sağlayıcı adı kullanılmıştır ve bu namespace'in dizin(klasör) karşığı "src/Illuminate" olarak ayarlanmıştır.

Aşağıdaki örnekte bir nesne oluşturdum ve yukarıdaki PSR-4 autoload tanımlamasındaki dizin karşılığını belirttim.

```php
new \Illuminate\Auth\AuthManger;

// src\Illuminate\Auth\AuthManager.php

```
Aynı namespace'i birden fazla dizine tanımlayabilrsiniz.

```
{
    "autoload": {
        "psr-4": {
            "Illuminate\\": ["src/Illuminate/", "lib/"]
        }
    }
}

```

Yukarıdaki örnekte Illuminate\ namespace'ini hem "src/Illuminate" dizinine hemde "lib" dizinine tanımladım. Dizinleri ","  karakteri ile istediğiniz kadar çoğaltabilirsiniz.

```
new \Illuminate\Database\Connect;

// |->src/Illuminate/Auth/AuthManager.php
// |->lib/​Database/Connect.php

```

Alt namespace ekleyebileceğiniz gibi namespace kısmını, global de bırakabilirsiniz.
{
    "autoload": {
        "psr-4": {
            "": ["lib/"]
        }
    }
}

OOP geliştiriclerin bir çoğu namespace'lerine özel bir isim(sağlayıcı adı) vermektedir. Bu psr-4 standartlarında da yer almaktadır. Ama tabi verip vermemek size kalmış.

new \Database\Connect;
lib
​​Database
Connect.php

Classmap
{
"autoload": {
            "classmap": [
            "app/commands",
            "app/controllers",
            "app/models",
            "app/library"
            ]
            }
}

Namespace tanımlamadığınız sınıfların dizin konumunu classmap anahtarıyla tanımlayabilirsiniz.

Files
{
    "autoload": {
        "files": ["src/MyLibrary/functions.php"]
    }
}
Namespace tanımlamadığınız sınıfların tam adresini files anahtarıyla tanımlayabilirsiniz.
Bunların dışında PSR-0 tanımlaması da vardır. Artık kullanılmadığı için yazıma dahil etmedim. 

Son olarak testleriniz için ayrı autload tanımlaması da yapabilirsiniz. Yukarıdaki işlemlerin hepsi autoload-dev anahrarı için geçerlidir.

{
    "autoload": {
        "psr-4": { "MyLibrary\\": "src/" }
    },
    "autoload-dev": {
        "psr-4": { "MyLibrary\\Tests\\": "tests/" }
    }
}




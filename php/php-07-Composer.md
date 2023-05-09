
- [Composer](#composer)
  - [Installation](#installation)
  - [Usage](#usage)
  - [Composer ile paket yükleme](#composer-ile-paket-yükleme)
  - [Composer kendisini güncellemek için](#composer-kendisini-güncellemek-için)
  - [Composer projesini klonlamak için](#composer-projesini-klonlamak-için)
  - [Composer Documentation](#composer-documentation)


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



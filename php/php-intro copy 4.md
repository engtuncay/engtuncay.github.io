
- [GET, POST And Session](#get-post-and-session)
  - [Post Variables](#post-variables)
- [Database Connection](#database-connection)
  - [PDO Connection](#pdo-connection)
- [Composer](#composer)
  - [Installation](#installation)
  - [Usage](#usage)
  - [Composer ile paket yükleme](#composer-ile-paket-yükleme)
  - [Composer kendisini güncellemek için](#composer-kendisini-güncellemek-için)
  - [Composer projesini klonlamak için](#composer-projesini-klonlamak-için)
  - [Composer Documentation](#composer-documentation)

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



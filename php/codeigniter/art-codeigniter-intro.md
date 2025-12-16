


# Contents

- [Contents](#contents)
- [Codeigniter 4 Hakkında](#codeigniter-4-hakkında)
- [Codeigniter Intro](#codeigniter-intro)
  - [1. Creating Ci Project](#1-creating-ci-project)
  - [2. Klasör Yapısı](#2-klasör-yapısı)
  - [3. Temel Kullanım](#3-temel-kullanım)
    - [Controller Oluşturma](#controller-oluşturma)
    - [Route Tanımlama](#route-tanımlama)
    - [View Kullanımı](#view-kullanımı)
    - [Model Kullanımı](#model-kullanımı)
    - [4. Migration ve Seeder](#4-migration-ve-seeder)
    - [5. Helper Commands](#5-helper-commands)
    - [6. Konfigürasyon](#6-konfigürasyon)
    - [7. Güvenlik](#7-güvenlik)
    - [4. Migration ve Seeder](#4-migration-ve-seeder-1)
    - [5. Yardımcı Komutlar](#5-yardımcı-komutlar)
    - [6. Konfigürasyon](#6-konfigürasyon-1)
    - [7. Güvenlik](#7-güvenlik-1)
  - [Xss Koruması](#xss-koruması)
    - [Kullanımı](#kullanımı)
    - [Örnek](#örnek)
    - [Ekstra Bilgi](#ekstra-bilgi)
    - [Otomatik XSS Koruması](#otomatik-xss-koruması)

# Codeigniter 4 Hakkında

CodeIgniter 4, PHP ile yazılmış, açık kaynaklı ve hafif bir web uygulama framework’üdür. MVC (Model-View-Controller) mimarisini kullanır ve geliştiricilere hızlı, güvenli ve esnek bir şekilde web uygulamaları geliştirme imkânı sunar.

**Öne çıkan özellikleri:**

- Modern PHP (PHP 7.2 ve üzeri) desteği
- Modüler yapı ve kolay genişletilebilirlik
- RESTful API desteği
- Güçlü veri tabanı katmanı ve migration desteği
- Gelişmiş hata yönetimi ve debug araçları
- Otomatik yükleyici (Autoloader) ve namespace desteği
- Güvenlik için CSRF, XSS korumaları

**Kullanım alanları:**

- Kurumsal web siteleri
- RESTful API servisleri
- Küçük ve orta ölçekli projeler

CodeIgniter 4, hızlı kurulum ve düşük sunucu gereksinimleriyle öne çıkar. Belgeleri kapsamlıdır ve topluluğu aktiftir.

# Codeigniter Intro

CodeIgniter 4’ün kullanımıyla ilgili temel adımlar ve önemli noktalar aşağıda özetlenmiştir:

## 1. Creating Ci Project

(Codeigniter 4 Projesi Oluşturma)

**Composer ile kurulum (önerilen):**

```bash
composer create-project codeigniter4/appstarter myproject

```

Bu komut, `myproject` klasörüne yeni bir CodeIgniter 4 projesi oluşturur.

veya

**ZIP dosyası ile kurulum:**  

[Codeigniter](https://codeigniter.com/) adresinden indirip sunucunuza çıkarabilirsiniz.

---

## 2. Klasör Yapısı

- **app/**: Uygulamanızın ana kodları (Controller, Model, View)
- **public/**: Web sunucusunun kök dizini (index.php burada)
- **writable/**: Log, cache, session gibi yazılabilir dosyalar
- **system/**: Framework çekirdek dosyaları

---

## 3. Temel Kullanım

### Controller Oluşturma

```php
namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
}
```

### Route Tanımlama

```php
$routes->get('/', 'Home::index');
```

### View Kullanımı

```php
<!DOCTYPE html>
<html>
<head>
    <title>Hoşgeldiniz</title>
</head>
<body>
    <h1>CodeIgniter 4'e Hoşgeldiniz!</h1>
</body>
</html>
```

### Model Kullanımı

```php
// filepath: UserModel.php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['name', 'email'];
}
```

---

### 4. Migration ve Seeder

Veritabanı tablolarını yönetmek için migration kullanılır:

```bash
php spark make:migration CreateUsersTable
php spark migrate
```

---

### 5. Helper Commands

(yardımcı komutlar)

- Sunucu başlatmak için:
  
  ```
  php spark serve
  ```
- Yeni controller oluşturmak için:
  ```
  php spark make:controller Blog
  ```

---

### 6. Konfigürasyon

Tüm ayarlar `app/Config` klasöründe tutulur. Örneğin, veritabanı ayarları `app/Config/Database.php` dosyasındadır.

---

### 7. Güvenlik

- CSRF koruması varsayılan olarak açıktır.
- XSS koruması için `esc()` fonksiyonu kullanılır.

---

Daha fazla detay için [resmi dokümantasyon](https://codeigniter4.github.io/userguide/) önerilir. İhtiyacınıza göre örnek kodlar veya daha fazla detay isteyebilirsiniz!---

### 4. Migration ve Seeder

Veritabanı tablolarını yönetmek için migration kullanılır:

```
php spark make:migration CreateUsersTable
php spark migrate
```

---

### 5. Yardımcı Komutlar

- Sunucu başlatmak için:
```
php spark serve
```

- Yeni controller oluşturmak için:

```
php spark make:controller Blog
```

---

### 6. Konfigürasyon

Tüm ayarlar `app/Config` klasöründe tutulur. Örneğin, veritabanı ayarları `app/Config/Database.php` dosyasındadır.

---

### 7. Güvenlik

- CSRF koruması varsayılan olarak açıktır.
- XSS koruması için `esc()` fonksiyonu kullanılır.

---

Daha fazla detay için [resmi dokümantasyon](https://codeigniter4.github.io/userguide/) önerilir. İhtiyacınıza göre örnek kodlar veya daha fazla detay isteyebilirsiniz!

## Xss Koruması 

CodeIgniter 4’te XSS (Cross-Site Scripting) koruması için temel olarak **çıktıların güvenli şekilde ekrana yazdırılması** gerekir. Bunun için CodeIgniter’ın sağladığı `esc()` fonksiyonu kullanılır.

### Kullanımı

Bir değişkeni view dosyasında güvenli şekilde göstermek için:

```php
<?= esc($degisken) ?>
```

Bu fonksiyon, özel karakterleri HTML entity’lerine çevirir ve XSS saldırılarını engeller.

---

### Örnek

```php
<p>Kullanıcı adı: <?= esc($username) ?></p>
```

---

### Ekstra Bilgi

- `esc($degisken, 'html')` : HTML için (varsayılan)
- `esc($degisken, 'js')` : JavaScript için
- `esc($degisken, 'css')` : CSS için

---

### Otomatik XSS Koruması

CodeIgniter 4, form validation sırasında da XSS koruması sağlar. Ancak, **her zaman çıktıları ekrana yazdırırken `esc()` fonksiyonunu kullanmak en güvenli yöntemdir.**

Daha fazla bilgi için: 
 
https://codeigniter4.github.io/userguide/general/common_functions.html#esc

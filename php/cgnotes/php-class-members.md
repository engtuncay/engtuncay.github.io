
Source : https://chatgpt.com/c/67bf4515-92d8-800e-ab9f-c5ed4f96b188

[Back](../readme.md)

---

- [PHP Sınıf Elemanları Nasıl Tanımlanır? Nelere Dikkat Edilmeli? ✨](#php-sınıf-elemanları-nasıl-tanımlanır-nelere-dikkat-edilmeli-)
  - [1. Sınıf Elemanlarını Tanımlama 🚀](#1-sınıf-elemanlarını-tanımlama-)
    - [a. Özellikler (Properties) 🎯](#a-özellikler-properties-)
    - [b. Metotlar (Methods) 🛠️](#b-metotlar-methods-️)
    - [c. Yapıcı (Constructor) ve Yıkıcı (Destructor) Metotlar ⚙️](#c-yapıcı-constructor-ve-yıkıcı-destructor-metotlar-️)
  - [2. Nelere Dikkat Edilmeli? ⚠️](#2-nelere-dikkat-edilmeli-️)
    - [a. Erişim Belirleyicileri Doğru Kullanın 🔐](#a-erişim-belirleyicileri-doğru-kullanın-)
    - [b. Tür Belirleyicileri Kullanma 🎭](#b-tür-belirleyicileri-kullanma-)
    - [c. İlk Değer Atamaları ve Varsayılan Değerleri Kontrol Edin 🧐](#c-i̇lk-değer-atamaları-ve-varsayılan-değerleri-kontrol-edin-)
    - [d. Kapsülleme (Encapsulation) Kurallarına Uyun 🏰](#d-kapsülleme-encapsulation-kurallarına-uyun-)
    - [e. Statik Elemanları Doğru Kullanın ⚡](#e-statik-elemanları-doğru-kullanın-)
    - [f. `readonly` ile Sabit Değişkenler Tanımlayın (PHP 8.1+) 🏷️](#f-readonly-ile-sabit-değişkenler-tanımlayın-php-81-️)
  - [3. PHP'de Özellik (Property) Tanımlamazsak Ne Olur? ❓](#3-phpde-özellik-property-tanımlamazsak-ne-olur-)
  - [Sorun: 🚨](#sorun-)
  - [Çözüm 1: Varsayılan Değer Belirleme ✅](#çözüm-1-varsayılan-değer-belirleme-)
  - [Çözüm 2: Nullable (`?string`) Kullanma 🔄](#çözüm-2-nullable-string-kullanma-)
  - [4. Sonuç 🎯](#4-sonuç-)


## PHP Sınıf Elemanları Nasıl Tanımlanır? Nelere Dikkat Edilmeli? ✨

### 1. Sınıf Elemanlarını Tanımlama 🚀

#### a. Özellikler (Properties) 🎯

Özellikler, sınıfın değişkenleridir ve **erişim belirleyiciler (visibility modifiers)** ile tanımlanır.  

```php
class Araba {
    public string $renk;   // Her yerden erişilebilir
    protected int $hiz;    // Sadece sınıf içinden ve miras alan sınıflardan erişilebilir
    private string $marka; // Sadece bu sınıfın içinden erişilebilir
}
```

#### b. Metotlar (Methods) 🛠️
Metotlar, sınıfın fonksiyonlarıdır ve **erişim belirleyiciler** ile tanımlanır.  

```php
class Araba {
    public function calistir() {
        echo "Araba çalıştırıldı!";
    }

    protected function hizlan() {
        echo "Araba hızlanıyor!";
    }

    private function gizliFonksiyon() {
        echo "Bu fonksiyona sadece bu sınıf erişebilir.";
    }
}
```

#### c. Yapıcı (Constructor) ve Yıkıcı (Destructor) Metotlar ⚙️
- **`__construct()`** : Nesne oluşturulduğunda çalışır.  
- **`__destruct()`** : Nesne bellekten silinirken çalışır.  

```php
class Araba {
    public string $renk;

    public function __construct(string $renk) {
        $this->renk = $renk;
        echo "Araba oluşturuldu. Renk: " . $this->renk;
    }

    public function __destruct() {
        echo "Araba yok ediliyor.";
    }
}
```

---

### 2. Nelere Dikkat Edilmeli? ⚠️

#### a. Erişim Belirleyicileri Doğru Kullanın 🔐
- **public**: Dışarıdan erişime açık olması gerekiyorsa.  
- **protected**: Miras alan sınıflar erişebilmeli ama dışarıdan erişilememeli.  
- **private**: Yalnızca sınıf içinde kullanılmalı.  

#### b. Tür Belirleyicileri Kullanma 🎭
- PHP 7.4 ve sonrası, sınıf özelliklerinde tür belirtebiliriz:
  
```php
class Kullanici {
    public string $isim;
    private int $yas;
}
```
- PHP 8 ile birlikte **`mixed`** ve **`static`** gibi türler de eklenmiştir.

#### c. İlk Değer Atamaları ve Varsayılan Değerleri Kontrol Edin 🧐
- `null` olabilecek değişkenler için `?` kullanabilirsiniz:  
  
```php
class Kullanici {
    public ?string $email = null; // Başlangıçta null olabilir
}
```

#### d. Kapsülleme (Encapsulation) Kurallarına Uyun 🏰
- Değişkenlere doğrudan erişmek yerine, `getter` ve `setter` kullanarak koruyabilirsiniz.  

```php
class Kisi {
    private string $isim;

    public function setIsim(string $isim) {
        if (strlen($isim) < 3) {
            throw new Exception("İsim en az 3 karakter olmalı.");
        }
        $this->isim = $isim;
    }

    public function getIsim(): string {
        return $this->isim;
    }
}
```

#### e. Statik Elemanları Doğru Kullanın ⚡
- Statik değişkenler ve metotlar nesne oluşturulmadan erişilebilir:  

```php
class Sayaç {
    public static int $deger = 0;

    public static function arttir() {
        self::$deger++;
    }
}

Sayaç::arttir();
echo Sayaç::$deger; // 1
```

#### f. `readonly` ile Sabit Değişkenler Tanımlayın (PHP 8.1+) 🏷️
- Bir özelliğin sadece ilk atamadan sonra değişmemesini istiyorsanız:  

```php
class Ayarlar {
    public readonly string $siteAdi;

    public function __construct(string $siteAdi) {
        $this->siteAdi = $siteAdi; // Sadece burada atanabilir
    }
}
```

---

### 3. PHP'de Özellik (Property) Tanımlamazsak Ne Olur? ❓

PHP'de **tip belirleyici (type hinting)** kullandığınızda, değişken **başlangıç değeri almadan tanımlanırsa hata verir**.  

### Sorun: 🚨
```php
class Kullanici {
    public string $email; // Tanımlandı ama başlangıç değeri yok
}

$kullanici = new Kullanici();
echo $kullanici->email; // HATA: Undefined property
```
Bu durumda **"Typed property must not be accessed before initialization"** hatası alırsınız, çünkü `$email` özelliği **ilk değer almadan** kullanılmıştır.

### Çözüm 1: Varsayılan Değer Belirleme ✅
Eğer `$email` özelliğine **başlangıç değeri** verirseniz hata almazsınız:

```php
class Kullanici {
    public string $email = ""; // Varsayılan boş string
}

$kullanici = new Kullanici();
echo $kullanici->email; // Boş string döner
```

### Çözüm 2: Nullable (`?string`) Kullanma 🔄

Eğer `$email` özelliğini bazen **tanımlamayabilirsiniz** diyorsanız, nullable (`?string`) olarak tanımlayın:

```php
class Kullanici {
    public ?string $email = null; // Varsayılan değer olarak null atanabilir
}

$kullanici = new Kullanici();
echo $kullanici->email; // NULL döner, hata vermez
```

---

### 4. Sonuç 🎯

- **Zorunlu atama yapmazsanız ve erişmeye çalışırsanız hata alırsınız.**

- **Hata almamak için ya başlangıç değeri vermelisiniz (`""`, `"default@example.com"`, vb.) ya da nullable (`?string`) olarak tanımlamalısınız.**


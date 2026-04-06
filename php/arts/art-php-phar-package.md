# PHP PHAR Paketi Rehberi

## PHAR Nedir?

**PHAR** (PHP Archive), PHP uygulamalarını ve kütüphanelerini tek bir arşiv dosyasında paketlemek için kullanılan bir dosya formatıdır. JAR dosyaları gibi çalışır.

### PHAR'ın Özellikleri

- TAR, ZIP veya phar-specific formatında arşiv yapısı
- Birden fazla PHP dosyası, kütüphane ve kaynağı içerebilir
- Tek dosya olarak dağıtılabilir
- `php archive.phar` gibi doğrudan çalıştırılabilir
- Sıkıştırılabilir (GZIP, BZIP2)
- İçeriği otomatik olarak çıkarılabilir veya belleğe yüklenebilir
- Dijital imza ile güvenli hale getirilebilir

---

## PHAR Paketleme (Composer Kullanarak)

### 1. Box Tool Kullanımı (Önerilen Yöntem)

**Box**, PHAR dosyaları oluşturmak için en yaygın ve kolay araçtır.

#### Kurulum

```bash
composer require --dev box-project/box
```

#### Yapılandırma Dosyası (box.json)

Proje kökünde `box.json` oluşturun:

```json
{
    "base-path": ".",
    "directories": [
        "src",
        "vendor"
    ],
    "files": [
        "composer.json",
        "composer.lock"
    ],
    "output": "apim.phar",
    "format": "zip",
    "compression": "algorithm:gzip",
    "main": "src/bin/app.php",
    "stub": true,
    "php-scoper": {
        "enabled": true,
        "directory": "vendor"
    }
}
```

#### Paket Oluşturma

```bash
vendor/bin/box compile
```

Bu komut `apim.phar` dosyasını oluşturur.

---

### 2. PHP Phar Eklentisi ile Manuel Yöntem

#### PHP Phar Eklentisinin Kontrolü

```bash
php -i | grep -A10 "Phar"
```

#### Kod ile PHAR Oluşturma

```php
<?php
$phar = new Phar('app.phar');
$phar->startBuffering();

// Dizin içeriğini ekle
$phar->buildFromDirectory(__DIR__ . '/src');
$phar->buildFromDirectory(__DIR__ . '/vendor');

// Entry point ayarla
$phar->setDefaultStub('src/bin/app.php', 'api.php');

$phar->stopBuffering();
echo "PHAR dosyası oluşturuldu: app.phar\n";
?>
```

---

## Vendor Klasörü Paketleme Hakkında

### Sadece Vendor Paketlenebilir mi?

**Evet, paketlenebilir ancak uygun değildir.** İşte neden ve nasıl yapılacağı:

### Senaryo 1: Sadece Vendor Paketlemek

```json
{
    "base-path": ".",
    "directories": [
        "vendor"
    ],
    "output": "dependencies.phar",
    "format": "zip"
}
```

**Dezavantajları:**
- Sadece bağımlılıklar içerir
- Ana uygulama kodunu çalıştıramaz
- Composer ile yeniden kurulum daha hızlıdır

### Senaryo 2: Uygun PHAR Yapısı (Önerilen)

Tüm gerekli dosyaları paket içine alın:

```json
{
    "base-path": ".",
    "directories": [
        "src",
        "vendor",
        "config"
    ],
    "files": [
        "composer.json",
        "composer.lock",
        "README.md"
    ],
    "output": "myapp.phar",
    "format": "zip",
    "compression": "algorithm:gzip",
    "main": "src/bootstrap.php",
    "stub": true
}
```

---

## PHAR Kullanımı

### PHAR'ı Çalıştırma

```bash
php apim.phar
php apim.phar argument1 argument2
```

### PHAR İçeriğini Çıkarma

```bash
php apim.phar -c /path/to/extract
```

### PHAR'ı PHP Kodunda Kullanma

```php
<?php
require 'phar://apim.phar/vendor/autoload.php';

// Kodunuz buraya gelir
?>
```

---

## Composer.json İçin PHAR Yapılandırması

Eğer Composer scripts kullanıyorsanız:

```json
{
    "scripts": {
        "phar": "box compile --no-interaction",
        "build": [
            "@phar"
        ]
    }
}
```

Çalıştırma:
```bash
composer run phar
```

---

## Avisos ve Best Practices

| Konu | Tavsiye |
|------|---------|
| **Autoloader** | Phar içinde `vendor/autoload.php` otomatik yüklenir |
| **İzinler** | Windows'ta izin sorunları yaşanabilir |
| **Sıkıştırma** | İndirme boyutu azalması için GZIP kullanın |
| **İmza** | Dağıtılan PHAR dosyalarında dijital imza ekleyin |
| **PHP Versiyonu** | PHAR oluşturulan ve çalıştırılan PHP sürümleri uyumlu olmalı |
| **open_basedir** | PHAR yolu open_basedir konfigürasyonunda tanımlı olmalı |

---

## CodeIgniter Projesi Paketleme

CodeIgniter uygulamasını PHAR olarak paketlemek için aşağıdaki adımları izleyin:

### Box.json Yapılandırması (CodeIgniter)

```json
{
    "base-path": ".",
    "directories": [
        "app",
        "public",
        "vendor",
        "writable"
    ],
    "files": [
        "composer.json",
        "composer.lock",
        "env",
        ".htaccess",
        "index.php"
    ],
    "excluded-directories": [
        "tests"
    ],
    "output": "myapp.phar",
    "format": "zip",
    "compression": "algorithm:gzip",
    "main": "public/index.php",
    "stub": true,
    "standalone": true,
    "php": "^7.4"
}
```

### CodeIgniter .env Dosyası Ayarı

PHAR içinde çalışırken, ayar dosyasının yolu düzgün belirtilmesi gerekir:

```env
# .env
CI_ENVIRONMENT = production
app.baseURL = 'http://yourdomain.com/'

# Dosya yazma izinleri
app.writable = 'writable'
```

### Komut ile Paketleme

```bash
# Box ile paketleme
vendor/bin/box compile

# veya Composer script ile
composer run phar
```

### Paketlenmiş CodeIgniter'ı Çalıştırma

```bash
# Web sunucu altında
php myapp.phar

# CLI Komut
php myapp.phar spark migrate
php myapp.phar spark make:model User
```

### PHAR İçinde CodeIgniter Konfigürasyonu

Web sunucu tarafından çalıştırılacaksa (`public/index.php` entry point):

```php
<?php
// public/index.php içinde PHAR kontrolü
if (strpos(__DIR__, '.phar') !== false) {
    define('FCPATH', 'phar://' . dirname(__DIR__) . '.phar/public/');
} else {
    define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);
}

// Geri kalanı normal şekilde devam eder...
require FCPATH . '../vendor/autoload.php';
```

### Dağıtım Notları

| Madde | Açıklama |
|-------|----------|
| **Yazılabilir Dizin** | `writable` dizini PHAR içinde işlevli değildir, harici tutulmalıdır |
| **Veritabanı** | SQLite kullanılıyorsa, veritabanı dosyası PHAR dışında olmalıdır |
| **Çevresel Değişkenler** | Production ortamında güvenlik nedeniyle `.env` dosyaları dışarıda tutulmalıdır |
| **Dosya İzinleri** | PHAR çalıştırma izni (`chmod +x`) gerekli olabilir |
| **open_basedir** | PHAR yolu PHP ini dosyasında tanımlı olmalıdır |

### Yükselmiş CodeIgniter Örneği

Daha karmaşık bir yapı için:

```bash
# 1. Bağımlılıkları kur
composer install --no-dev --optimize-autoloader

# 2. Box yapılandırması kopyala
cp build/box.json ./

# 3. Paketleme
vendor/bin/box compile --no-interaction

# 4. İzin ayarla
chmod +x myapp.phar

# 5. Test et
./myapp.phar spark --version
```

---

## Referanslar

- [PHP PHAR Resmi Dokümantasyon](https://www.php.net/manual/tr/book.phar.php)
- [Box Project](https://github.com/box-project/box)
- [PHP Archive Standardı](https://www.php.net/manual/en/intro.phar.php)
- [CodeIgniter Resmi Dokümantasyon](https://codeigniter.com/)
- [CodeIgniter CLI Komutları](https://codeigniter.com/user_guide/cli/cli_commands.html)

---

## Basit Bir HelloWorld PHAR Paketi Örneği

### 1. hello.php Dosyasını Oluşturun

```php
<?php
echo "Hello World!\n";
```

### 2. PHAR Paketini Oluşturacak Script (build-phar.php)

```php
<?php
$phar = new Phar('hello.phar');
$phar->startBuffering();
$phar->addFile('hello.php');
$phar->setDefaultStub('hello.php');
$phar->stopBuffering();
echo "hello.phar oluşturuldu!\n";
```

### 3. Paketleme ve Çalıştırma

```bash
# PHAR paketini oluştur
php build-phar.php

# PHAR paketini çalıştır
php hello.phar
```

### Sonuç

```
Hello World!
```

> Not: PHAR desteği için PHP'nin phar eklentisi aktif olmalıdır.

---

## CodeIgniter Projesi için build-phar.php (PHP Phar Eklentisi Yöntemi)

**Box Tool** yerine doğrudan **PHP Phar eklentisini** kullanarak CodeIgniter projesi paketlemek de mümkündür:

### Adım 1: build-codeigniter-phar.php Dosyası Oluşturun

Proje kökünde `build-codeigniter-phar.php` dosyası oluşturun:

```php
<?php
/**
 * CodeIgniter PHAR Paketleme Script'i
 * Kullanım: php build-codeigniter-phar.php
 */

$phar = new Phar('codeigniter-app.phar');
$phar->startBuffering();

// 1. App dizinini ekle
$phar->buildFromDirectory(__DIR__ . '/app', '/\.php$/');

// 2. Public dizinini ekle
$phar->buildFromDirectory(__DIR__ . '/public', '/(index\.php|\.htaccess)$/');

// 3. Config dosyalarını ekle
$phar->buildFromDirectory(__DIR__ . '/config', '/\.php$/');

// 4. Vendor dizinini ekle (dependency'ler)
$phar->buildFromDirectory(__DIR__ . '/vendor');

// 5. Writable dizinini ekle (boş olabilir)
if (is_dir(__DIR__ . '/writable')) {
    $phar->buildFromDirectory(__DIR__ . '/writable');
}

// 6. Önemli dosyaları ekle
$phar->addFile(__DIR__ . '/composer.json', 'composer.json');
$phar->addFile(__DIR__ . '/composer.lock', 'composer.lock');
if (file_exists(__DIR__ . '/.env')) {
    $phar->addFile(__DIR__ . '/.env', '.env');
}
if (file_exists(__DIR__ . '/.htaccess')) {
    $phar->addFile(__DIR__ . '/.htaccess', '.htaccess');
}

// 7. Entry point'i belirle
$stub = <<<'EOT'
<?php
/*
 * CodeIgniter PHAR Application
 */

// PHAR yorumlandırma
if (strpos(__DIR__, '.phar') !== false) {
    // PHAR içinde çalışıyor
    require 'phar://codeigniter-app.phar/vendor/autoload.php';
} else {
    // Normal ortamda çalışıyor
    require __DIR__ . '/vendor/autoload.php';
}

// Application başlat
require __DIR__ . '/public/index.php';
?>
EOT;

$phar->setDefaultStub('public/index.php', 'api.php');
$phar->stopBuffering();

echo "✓ CodeIgniter PHAR paketi başarıyla oluşturuldu: codeigniter-app.phar\n";
echo "✓ Kullanım: php codeigniter-app.phar\n";
?>
```

### Adım 2: Paketleme Komutu

```bash
# Bağımlılıkları dev paketmiyle birlikte kur (paketlemeden öncesi)
composer install --no-dev --optimize-autoloader

# PHAR paketini oluştur
php build-codeigniter-phar.php
```

### Adım 3: Oluşturulan PHAR Dosyasını Test Edin

```bash
# CLI'den çalıştır
php codeigniter-app.phar

# Apache/Nginx altında çalıştırma için
chmod +x codeigniter-app.phar

# CLI komutlarını çalıştır
php codeigniter-app.phar spark migrate
php codeigniter-app.phar spark make:model User
```

### Gelişmiş Bir build-codeigniter-phar.php Örneği

```php
<?php
/**
 * Daha Gelişmiş CodeIgniter PHAR Paketleme Script'i
 * Özellikler: Sıkıştırma, İlerleme Gösterimi, Dosya Filtreleme
 */

define('PROJECT_ROOT', __DIR__);
define('OUTPUT_FILE', 'codeigniter-app.phar');

// Phar.readonly kontrol
ini_set('phar.readonly', 0);

if (file_exists(OUTPUT_FILE)) {
    @unlink(OUTPUT_FILE);
    echo "Eski PHAR dosyası silindi.\n";
}

$phar = new Phar(OUTPUT_FILE);
$phar->setSignatureAlgorithm(Phar::SHA256);

$phar->startBuffering();

// Dizinleri ekle (rekursif)
$directoriesMap = [
    'app' => '/\.php$/',
    'config' => '/\.php$/',
    'public' => '/(index\.php|\.htaccess)$/',
    'vendor' => '/.+$/',
    'writable' => '/.+$/', // İsteğe bağlı
];

foreach ($directoriesMap as $dir => $filter) {
    $fullPath = PROJECT_ROOT . '/' . $dir;
    if (is_dir($fullPath)) {
        echo "Ekleniyor: $dir/\n";
        $phar->buildFromDirectory($fullPath, $filter);
    }
}

// Dosyaları ekle
$filesToAdd = [
    'composer.json',
    'composer.lock',
    '.env',
    '.htaccess',
    'README.md',
];

foreach ($filesToAdd as $file) {
    $filePath = PROJECT_ROOT . '/' . $file;
    if (file_exists($filePath)) {
        echo "Ekleniyor: $file\n";
        $phar->addFile($filePath, $file);
    }
}

// Entry point
$phar->setDefaultStub('public/index.php', 'api.php');

// Sıkıştırma (opsiyonel)
try {
    $phar->compressFiles(Phar::GZIP);
    echo "GZIP sıkıştırması uygulandı.\n";
} catch (Exception $e) {
    echo "Sıkıştırma uyarısı: " . $e->getMessage() . "\n";
}

$phar->stopBuffering();

// Dosya bilgileri
$fileSize = round(filesize(OUTPUT_FILE) / 1024 / 1024, 2);
echo "\n✓ PHAR dosyası başarıyla oluşturuldu!\n";
echo "✓ Dosya: " . OUTPUT_FILE . "\n";
echo "✓ Boyut: {$fileSize} MB\n";
echo "✓ İmza Algoritması: SHA256\n";
?>
```

### PHP Phar vs Box Tool Karşılaştırması

| Özellik | PHP Phar Eklentisi | Box Tool |
|---------|-------------------|----------|
| **Kurulum** | Yerleşik (phar eklentisi gerekli) | Composer ile `composer require --dev` |
| **Kolaylık** | Manuel kod yazması gerekir | Yapılandırma dosyası (box.json) |
| **PHP Scoper** | Desteklemez | Destekler (namespace çatışmalarını engellemek için) |
| **Otomatizasyon** | Daha az | Daha fazla |
| **Esneklik** | Yüksek | Orta |
| **Dokümantasyon** | Resmi PHP dokümanları | GitHub ve community |

### Dikkat Edilmesi Gereken Noktalar

1. **phar.readonly = 0**: PHAR yazma işlemleri için `php.ini` ayarında bu değer sıfır olmalı
2. **Vendor Boyutu**: `vendor` dizini çok büyükse, PHAR dosyası da büyük olur
3. **Writable Dizin**: Production'da yazılabilir dizin PHAR dışında olmalı
4. **Dosya İzinleri**: PHAR dosyası çalıştırıcı izin gerekir (Linux/Mac)
5. **.env Yönetimi**: Güvenlik nedeniyle production `.env` dosyaları dışarıda tutulmalı

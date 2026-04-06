# PHP Packagist - Paket Oluşturma ve Yönetimi

## Packagist Nedir?

**Packagist**, PHP paketleri için merkezi bir depo (repository) hizmetidir. Composer paket yöneticisinin varsayılan kaynağıdır. Packagist üzerinde bulunan paketler, Composer kullanılarak PHP projelerine kolayca entegre edilebilir.

### Packagist'in Temel Özellikleri

- **Açık Kaynak Araştırması**: Binlerce açık kaynak PHP paketi barındırır
- **Composer Entegrasyonu**: Composer default kaynağı olarak çalışır
- **Sürüm Yönetimi**: Farklı sürümler ve stabil/geliştirme versiyonları tarafından destek
- **Bağımlılık Yönetimi**: Packagist paketleri kendi bağımlılıklarını tanımlarlar
- **Otomatik Güncelleme**: GitHub entegrasyonu ile reposunuz güncellendiğinde otomatik senkronize olur

## PHP'de Packagist ile Paket Nasıl Yapılır?

### 1. Paketi Hazırlama

Bir PHP paketi oluşturmak için aşağıdaki adımları izleyin:

```
your-package/
├── src/                      # Kaynak kodu klasörü
│   └── YourClassName.php
├── tests/                    # Test dosyaları
├── composer.json             # Composer yapılandırması (zorunlu)
├── LICENSE                   # Lisans dosyası
└── README.md                 # Dokümantasyon
```

### 2. composer.json Dosyası Oluşturma

Paketi tanımlamak için `composer.json` dosyası oluşturun:

```json
{
    "name": "username/package-name",
    "description": "Paketinizin kısa açıklaması",
    "type": "library",
    "license": "MIT",
    "authors": [
        {
            "name": "Adınız",
            "email": "email@example.com"
        }
    ],
    "require": {
        "php": ">=7.4"
    },
    "require-dev": {
        "phpunit/phpunit": "^9.0"
    },
    "autoload": {
        "psr-4": {
            "YourVendor\\YourPackage\\": "src/"
        }
    }
}
```

**Önemli Alanlar:**
- `name`: Formatı `vendor/package-name` olmalı (küçük harf, tire ile ayırılmış)
- `type`: Genellikle "library"
- `autoload`: PSR-4 standartını kullanarak otomatik yükleme
- `require`: Minimum gereksinimleri belirtin

### 3. Sürüm Kontrolü ve GitHub

```bash
# Git repository başlatın
git init
git add .
git commit -m "Initial commit"
git tag v1.0.0
git push origin main --tags
```

### 4. Packagist'e Kayıt

1. **Pacakgist.org'a gidin**: https://packagist.org
2. **GitHub ile giriş yapın** veya hesap oluşturun
3. **"Submit Package"** butonuna tıklayın
4. **GitHub repository URL'sini** girin: `https://github.com/username/your-package`
5. **Submit Package** butonuna basın

### 5. Packagist'e Otomatik Güncelleme Ayarlanması

Kodunuzu GitHub'a her push ettiğinizde Packagist'in otomatik güncellenmesi için:

1. https://packagist.org/profile/ adresinden **API Token** oluşturun
2. GitHub repository Settings'e gidin
3. **Webhooks** bölümüne ekleyin:
   - URL: `https://packagist.org/api/github`
   - Webhook Secret: Packagist'ten aldığınız token
   - Events: `push` selected

## Vendor Klasörünü Paket Yapabilir miyiz?

**Kısaca: HAYIR, vendor klasörünü paket yapmak çok önerilmez.**

### Neden vendor Klasörü Paket Edilmemelidir?

```
❌ vendor klasörü paket edilmesi sorunları:
├─ Gereğinden fazla büyük dosya boyutu (yüz-binlerce dosya)
├─ Git/GitHub dosya limitlerine çarpma riski
├─ Bağımlılık çakışmaları ve karmaşıklık oluşturma
├─ Paket güvenliği sorunları (sürüm kontrol kaybı)
├─ .gitignore'a vendor eklenmiş olması (varsayılan)
└─ Diğer projelerde bağımlılık kaosu yaratma
```

### Doğru Yaklaşım

1. **composer.json ve composer.lock** dosyalarını kaydetmelisiniz
2. **vendor klasörü** .gitignore'a eklenmelidir:

```
# .gitignore
vendor/
```

3. Projeyi başka yerde kullanırken:

```bash
composer install
```

Composer, `composer.json` ve `composer.lock` dosyalarını okuyarak gerekli paketleri indirir ve yükler.

### vendor Klasörünün İçeriğini Kontrol Etme

Paketlediğiniz bağımlılıkları görmek için:

```bash
# Yüklü paketleri listele
composer show

# Belirli paket bilgisi
composer show vendor/package-name

# Daha detaylı bilgi (tree format)
composer show -t
```

## Özet - En İyi Uygulamalar

| Yapılacak | Yapılmayacak | Nedeni |
|----------|-----------|--------|
| ✅ composer.json tarafından kontrol etmek | ❌ vendor klasörünü versiyon kontrol etmek | Bağımlılık yönetiminin amacı |
| ✅ composer.lock dosyasını kaydetmek | ❌ vendor'ı paket olarak dağıtmak | Sürüm çatışmalarını önlemek |
| ✅ .gitignore'a vendor eklemek | ❌ Tüm bağımlılıkları manuel yönetmek | Temiz ve güvenli proje yapısı |
| ✅ composer install ile kurulum | ❌ vendor klasörünün kopyalanması | Doğru sürüm güvencesi |

## Faydalı Linkler

- **Packagist Resmi Sitesi**: https://packagist.org
- **Composer Dokümantasyonu**: https://getcomposer.org/doc
- **PSR-4 Autoloading**: https://www.php-fig.org/psr/psr-4/

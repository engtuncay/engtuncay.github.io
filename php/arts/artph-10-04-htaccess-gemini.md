
- [Apache .htaccess Kapsamlı Kullanım Rehberi](#apache-htaccess-kapsamlı-kullanım-rehberi)
  - [1. Temel Kavramlar ve Sözdizimi](#1-temel-kavramlar-ve-sözdizimi)
    - [`RewriteEngine On`](#rewriteengine-on)
    - [Koşullar (`RewriteCond`) ve Kurallar (`RewriteRule`)](#koşullar-rewritecond-ve-kurallar-rewriterule)
    - [Sık Kullanılan Bayraklar (Flags)](#sık-kullanılan-bayraklar-flags)
  - [2. Yaygın ve Hayat Kurtaran `.htaccess` Senaryoları](#2-yaygın-ve-hayat-kurtaran-htaccess-senaryoları)
    - [A. HTTP'yi HTTPS'e Yönlendirme (SSL Zorunluluğu)](#a-httpyi-httpse-yönlendirme-ssl-zorunluluğu)
    - [B. `www` veya `non-www` Sabitleme](#b-www-veya-non-www-sabitleme)
    - [C. Özel Hata Sayfaları (Error Documents)](#c-özel-hata-sayfaları-error-documents)
    - [D. Dosya ve Klasör Güvenliği (Erişim Engelleme)](#d-dosya-ve-klasör-güvenliği-erişim-engelleme)
    - [E. Önbellekleme (Caching) ve Performans](#e-önbellekleme-caching-ve-performans)
  - [3. Alt Klasör ve SPA Hibrit Yapısı (Vue + CodeIgniter)](#3-alt-klasör-ve-spa-hibrit-yapısı-vue--codeigniter)
  - [4. Altın Kurallar ve İpuçları](#4-altın-kurallar-ve-i̇puçları)


# Apache .htaccess Kapsamlı Kullanım Rehberi

`.htaccess` (Hypertext Access), Apache web sunucusunun dizin bazlı yapılandırma dosyasıdır. Web sitenizin yönlendirmelerini, güvenlik kurallarını, URL optimizasyonlarını ve önbellekleme ayarlarını tek bir dosya üzerinden yönetmenizi sağlar.

---

## 1. Temel Kavramlar ve Sözdizimi

### `RewriteEngine On`

Yeniden yazma motorunu etkinleştirir. Apache'nin URL kurallarını okuyabilmesi için her `.htaccess` dosyasının başında yer almalıdır.

### Koşullar (`RewriteCond`) ve Kurallar (`RewriteRule`)

* **`RewriteCond`**: Bir kuralın çalışması için gereken şartı belirtir (Örn: "İstek bir dosya değilse").
* **`RewriteRule`**: Şart sağlandığında URL'in nereye yönlendirileceğini veya nasıl değiştirileceğini tanımlar.
* **Reg Pattern Yakalama (`^(.*)$`):** URL'in kökten sonraki kısmını regex ile yakalar ve `$1` değişkeni ile hedef adrese aktarır.

### Sık Kullanılan Bayraklar (Flags)

* **`[L]` (Last):** Bu kural eşleşirse, sonraki kuralları işlemeyi durdurur.
* **`[R=301]` (Redirect):** Tarayıcıya kalıcı yönlendirme (`Moved Permanently`) bildirimi yapar (SEO dostudur).
* **`[NC]` (No Case):** Büyük/küçük harf duyarlılığını ortadan kaldırır.
* **`[QSA]` (Query String Append):** Mevcut URL'deki GET parametrelerini (`?id=5`) yeni URL'e aktarır.
* **`[OR]` (Or Next):** Alt alta yazılan koşullar arasındaki VE (`AND`) mantığını VEYA (`OR`) mantığına çevirir.

---

## 2. Yaygın ve Hayat Kurtaran `.htaccess` Senaryoları

### A. HTTP'yi HTTPS'e Yönlendirme (SSL Zorunluluğu)

Tüm ziyaretçileri güvenli bağlantıya (SSL) zorlar.

```apache
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [R=301,L]
```

### B. `www` veya `non-www` Sabitleme

* **Tüm istekleri `www` yapma:**

```apache
RewriteEngine On
RewriteCond %{HTTP_HOST} !^www\. [NC]
RewriteRule ^(.*)$ https://www.%{HTTP_HOST}/$1 [R=301,L]
```

* **Tüm istekleri `non-www` (düz domain) yapma:**

```apache
RewriteEngine On
RewriteCond %{HTTP_HOST} ^www\.(.+) [NC]
RewriteRule ^(.*)$ https://%1/$1 [R=301,L]
```

### C. Özel Hata Sayfaları (Error Documents)

Sunucu hatalarında kullanıcıya standart İngilizce sayfalar yerine kendi tasarladığınız sayfaları gösterir.

```apache
ErrorDocument 403 /errors/403.html
ErrorDocument 404 /errors/404.html
ErrorDocument 500 /errors/500.html
```

### D. Dosya ve Klasör Güvenliği (Erişim Engelleme)

* **Hassas dosyelerin okunmasını engelleme (`.env`, `composer.json` vb.):**

```apache
<FilesMatch "^\.(env|git|htaccess)">
    Require all denied
</FilesMatch>
  ```

* **Dizin listelemeyi (Directory Browsing) kapatma:** Kullanıcıların klasör içeriğini (`index.php` olmayan yerlerde) görmesini engeller.

```apache
Options -Indexes
```

### E. Önbellekleme (Caching) ve Performans

Tarayıcıların statik dosyaları (resimler, CSS, JS) önbellekte tutmasını sağlayarak site hızını artırır.

```apache
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType image/jpg "access plus 1 year"
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/gif "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
    ExpiresDefault "access plus 2 days"
</IfModule>
```

---

## 3. Alt Klasör ve SPA Hibrit Yapısı (Vue + CodeIgniter)

Vue SPA arayüzü ile CodeIgniter API altyapısını aynı kök dizinde barındıran örnek kurgunun `.htaccess` dosyası:

```apache

<IfModule mod_rewrite.c>
    RewriteEngine On

    # 1. /api ile başlayan istekleri CodeIgniter backend'ine yönlendir
    RewriteCond %{REQUEST_URI} ^/api
    RewriteRule ^api(.*)$ /admin/public/index.php/$1 [L,QSA]

    # 2. Fiziksel dosya veya klasör varsa doğrudan sun (Resim, CSS, JS vb.)
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    
    # 3. Kalan tüm istekleri Vue Router için index.html dosyasına ver
    RewriteRule ^(.*)$ /index.html [L]

</IfModule>
```

---

## 4. Altın Kurallar ve İpuçları

1. **Doğru Konum:** `.htaccess` dosyası genellikle web sunucusunun kök dizininde (`public_html` veya `www`) yer almalıdır.
2. **Gizli Dosya:** Dosya adı nokta ile başlar (`.htaccess`). Bazı FTP programlarında veya işletim sistemlerinde gizli dosyalar görünmeyebilir, ayarlarından gizli dosyaları göster seçeneğini aktif etmelisiniz.
3. **Modül Kontrolü:** Sunucunuzda **`mod_rewrite`** modülünün aktif olduğundan emin olun (çoğu modern hosting'de varsayılan olarak aktiftir).
4. **Sözdizimi Hataları:** Yanlış yazılan bir kural sitenin tamamen çökmesine (`500 Internal Server Error`) yol açabilir. Değişiklik yapmadan önce mutlaka mevcut dosyanızın bir yedeğini alın.


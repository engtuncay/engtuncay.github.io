
Source : https://chatgpt.com/share/67b5d03b-02b0-800e-9d68-6a639fa045a9

[Back](../readme.md)

---

# .htaccess Nedir?

.htaccess (Hypertext Access), Apache web sunucusunda dizin bazlı yapılandırmalar yapmak için kullanılan bir dosyadır. Web sitenizin belirli ayarlarını, yönlendirmeleri, güvenlik önlemlerini ve daha fazlasını değiştirmek için kullanılır.

## 1. .htaccess Dosyası Nerede Bulunur?

.htaccess dosyası genellikle proje kök dizininde (örneğin: public_html/ veya www/) bulunur.

Alt dizinlere de .htaccess dosyası eklenebilir ve üstteki kuralları geçersiz kılabilir.

## 2. .htaccess Kullanım Alanları

### 2.1. URL Yönlendirme ve Yeniden Yazma (Rewrite)

➖ 301 Kalıcı Yönlendirme

Eski bir sayfanın yeni bir URL'ye yönlendirilmesi için:

```
Redirect 301 /eski-sayfa.html https://example.com/yeni-sayfa.html

```

➖ Rewrite ile SEO Dostu URL'ler

Örneğin, example.com/urun.php?id=5 yerine example.com/urun/5 şeklinde güzel URL'ler yapmak:

```
RewriteEngine On
RewriteRule ^urun/([0-9]+)$ urun.php?id=$1 [L]

```
➖ HTTP’den HTTPS’ye Zorunlu Yönlendirme

```
RewriteEngine On
RewriteCond %{HTTPS} !=on
RewriteRule ^(.*)$ https://%{HTTP_HOST}/$1 [R=301,L]

```

### 2.2. Hata Sayfalarını Özelleştirme

ErrorDocument 404 /hata-sayfalari/404.html
ErrorDocument 500 /hata-sayfalari/500.html

Bu kod, sunucu hatası veya bulunamayan sayfalar için özel hata sayfaları gösterir.

### 2.3. Yetkilendirme ve Güvenlik

Dizine Şifre Koyma (Basic Authentication)

.htpasswd dosyasıyla kullanıcı adı ve şifre zorunlu kılınabilir:


AuthType Basic
AuthName "Gizli Alan"
AuthUserFile /path/to/.htpasswd
Require valid-user

Dizine Erişimi Engelleme

Order Deny,Allow
Deny from all

Belirli IP’lere Erişim Açma

Order Deny,Allow
Deny from all
Allow from 192.168.1.100

### 2.4. MIME Türleri ve Varsayılan Sayfa

➖  Belirli Dosya Türleri İçin MIME Tipi Tanımlama

```
AddType application/json .json
AddType application/pdf .pdf

```


➖ Varsayılan Açılış Sayfası Belirleme

```
DirectoryIndex index.html index.php

```



### 2.5. Tarayıcı Önbellekleme ve Gzip Sıkıştırma
Önbellekleme Ayarları
apache
Kopyala
Düzenle
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType image/jpeg "access plus 1 month"
    ExpiresByType text/css "access plus 1 week"
    ExpiresByType application/javascript "access plus 1 week"
</IfModule>
Gzip Sıkıştırma ile Hız Artırma
apache
Kopyala
Düzenle
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/plain text/css application/javascript
</IfModule>
2.6. Hotlink Koruması (Başka Sitelerin Görsellerinizi Çalmasını Önleme)
apache
Kopyala
Düzenle
RewriteEngine On
RewriteCond %{HTTP_REFERER} !^$
RewriteCond %{HTTP_REFERER} !^https://(www\.)?example\.com/ [NC]
RewriteRule \.(jpg|png|gif)$ - [F]
1. .htaccess Dosyasını Düzenlerken Dikkat Edilmesi Gerekenler
.htaccess değişikliklerinden sonra sunucuyu yeniden başlatmaya gerek yoktur ama tarayıcı önbelleğini temizlemek iyi bir fikirdir.
Yanlış yapılandırmalar, sitenizi tamamen erişilemez hale getirebilir. Bu yüzden yedek alarak değişiklik yapmalısınız.
Sunucunuzun Apache ve gerekli modülleri desteklediğinden emin olun (mod_rewrite, mod_deflate gibi).
Eğer belirli bir kullanım senaryonuz varsa detaylı bir yapılandırma önerebilirim. 🚀

## Me
htaccess dosyası nasıl yazılır, detaylı bilgi verir misin

## AI Assistant
`.htaccess` dosyası, Apache web sunucusunda çalışma zamanında yapılandırma değişikliklerini yapmak için kullanılan bir dosyadır. Bu dosya sayesinde dizin temelli ayarlamalar, URL yeniden yönlendirmeleri, erişim kontrolleri ve daha birçok düzenleme yapılabilir. Aşağıda `.htaccess` dosyasının nasıl oluşturulacağına ve nasıl kullanılacağına dair detaylı bilgi ve örnekler yer almaktadır:

---

### **1. `.htaccess` Dosyasını Oluşturma**

1. `.htaccess` dosyası herhangi bir düz metin editörü (örn: Notepad, PhpStorm, VSCode) ile oluşturulur.
2. Dosyanın adı **tam olarak `.htaccess`** şeklinde yazılmalıdır (önce nokta, ardından "htaccess").
3. Dosya genellikle web sunucusundaki bir klasöre yerleştirilir ve yalnızca o klasör ve alt klasörleri etkiler.

---

### **2. `.htaccess` Temel Kullanım Alanları**

#### A. **URL Yönlendirmeleri (Redirects)**
##### a) SEO Dostu URL'ler Oluşturma

```
RewriteEngine On
RewriteRule ^urunler/([0-9a-zA-Z_-]+)$ urun.php?isim=$1 [L,QSA]
```

Bu kural, `example.com/urunler/telefon` isteğini `example.com/urun.php?isim=telefon` adresine yönlendirir.

##### b) 301 Kalıcı Yönlendirme

```
Redirect 301 /eski-sayfa.html https://example.com/yeni-sayfa.html
```

Bu, eski sayfanızı yeni URL'ye yönlendirerek SEO avantajı sağlar.

#### B. **Giriş İzni Kısıtlamaları**

##### a) IP Adresi Kısıtlama
Sadece belirli bir IP adresine izin vermek için:

```
Order Deny,Allow
Deny from all
Allow from 192.168.1.1
```

##### b) Belirli Dosyaları Koruma

Bir dizindeki `.xml` dosyalarının görüntülenmesini engellemek için:
```
<FilesMatch "\.xml$">
    Order Allow,Deny
    Deny from all
</FilesMatch>
```

#### C. **Hata Sayfaları (Custom Error Pages)**
Kendi özel hata sayfalarınızı tanımlamak için:

```
ErrorDocument 404 /hata-sayfalari/404.html
ErrorDocument 500 /hata-sayfalari/500.html
```

#### D. **Dizin Listelenmesini Engelleme**

Eğer bir dizin içerisinde dizindeki dosyaların listelenmesini istemiyorsanız:

```
Options -Indexes
```

#### E. **Hotlink Koruması**

Başkalarının sitenizden doğrudan resim veya dosya kullanmasını engellemek için:

```
RewriteEngine On
RewriteCond %{HTTP_REFERER} !^$
RewriteCond %{HTTP_REFERER} !^https?://(www\.)?siteniz.com/ [NC]
RewriteRule \.(jpg|jpeg|png|gif|pdf)$ - [F,NC]
```

---

### **3. `.htaccess` ile Sık Kullanılan Özellikler**

#### A. **WWW'yi Zorunlu Yapma**
Eğer sitenizin `www` ile başlamasını istiyorsanız:
```
RewriteEngine On
RewriteCond %{HTTP_HOST} !^www\.
RewriteRule ^(.*)$ http://www.%{HTTP_HOST}/$1 [R=301,L]
```

#### B. **HTTPS'yi Zorunlu Yapma**

Tüm trafiği HTTPS'ye yönlendirmek için:

```
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}/$1 [R=301,L]
```

---

### **4. Örnek `.htaccess` Dosyası**

Aşağıda bir örnek `.htaccess` dosyasını tüm temel özellikleriyle görebilirsiniz:

```
# RewriteEngine Aktif Et
RewriteEngine On

# HTTPS Zorunlu (SSL Yönlendirme)
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}/$1 [R=301,L]

# WWW Zorunlu Yönlendirme
RewriteCond %{HTTP_HOST} !^www\.
RewriteRule ^(.*)$ http://www.%{HTTP_HOST}/$1 [R=301,L]

# Özel Hata Sayfaları
ErrorDocument 404 /errors/404.html
ErrorDocument 500 /errors/500.html

# Dizin Listeleme Engelle
Options -Indexes

# Hotlink Koruma
RewriteCond %{HTTP_REFERER} !^$
RewriteCond %{HTTP_REFERER} !^https?://(www\.)?siteniz.com/ [NC]
RewriteRule \.(jpg|jpeg|png|gif)$ - [F,NC]

# SEO Dostu URL
RewriteRule ^blog/([0-9a-zA-Z_-]+)$ blog.php?post=$1 [L,QSA]
```

---

### **5. `.htaccess` Dosyasını Aktif Etme**

1. Apache yapılandırma dosyasında (`httpd.conf`) **`AllowOverride`** direktifi için `All` değerini kullanın:
```
<Directory "/var/www/html">
  AllowOverride All
</Directory>
```
2. Apache sunucusunu yeniden başlatın:

```shell script
sudo systemctl restart apache2
```

---

Yukarıdaki örnekler sizlere `.htaccess` dosyasını yazma ve kullanma konusunda detaylı bir rehber sunabilir. Hangi özelliği kullanmak istiyorsanız, sadece ilgili örneği eklemeniz yeterlidir. 😊

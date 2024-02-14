
- [Laravel projesini çalıştırma](#laravel-projesini-çalıştırma)
- [Laravelin Çalışma Yapısı](#laravelin-çalışma-yapısı)
- [Xampp Virtual Host Ayarları](#xampp-virtual-host-ayarları)

## Laravel Kurulumu

🔔 Laravel Kurulumu

```bash
composer global require laravel/installer

```

🔔 composer global'den bir paketi kaldırmak için :

```bash
composer global remove the_package_name

```

🔔 Laravel ile yeni proje kurulumu

```bash
laravel new your_project_name

```

ya da php artisan komutu ile de kurulabilir.

```bash

```

ya da composer komutu ile de proje oluşturulabilir.

# Laravel projesini çalıştırma

```bash
php artisan serve
```

# Laravelin Çalışma Yapısı

🔔 laravel'de ilk public klasöründeki index.php'i çalışır.

bu dosyada autoload ve bootstrap işlemi yapılır.

gelen istek analiz edilip uygun sayfaya route edilir.

index.php -> middleware -> routes -> controllers -> response (string/json/html view)

# Xampp Virtual Host Ayarları

- apache/conf/extra klasöründen httpd-vhosts.conf dosyasında aşağıdaki ayarları yaparız.

```xml
<VirtualHost localweb.test:80>
	ServerName localweb.test
  ServerAdmin abc@gmail.com
  DocumentRoot "Y:\xampp\htdocs"
  <Directory "Y:\xampp\htdocs">
    AllowOverride All
    Require all granted
    Options Indexes FollowSymLinks
	</Directory>
</VirtualHost>

<VirtualHost laravelapi.test:80>
ServerName laravelapi.test
ServerAdmin abc@gmail.com
DocumentRoot "Y:\dev-demo\lr-proje1\public"
<Directory "Y:\dev-demo\lr-proje1\public">
  AllowOverride All
  Require all granted
  Options Indexes FollowSymLinks
</Directory>
</VirtualHost>
```

- C:\Windows\System32\drivers\etc klasöründen hosts dosyasından ayar yaparız.

```


```




 

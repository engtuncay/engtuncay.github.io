
- [Laravelin Çalışma Yapısı](#laravelin-çalışma-yapısı)
- [Route Yapısı](#route-yapısı)

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

# Laravelin Çalışma Yapısı

🔔 laravel'de ilk public klasöründeki index.php'i çalışır.

bu dosyada autoload ve bootstrap işlemi yapılır.

gelen istek analiz edilip uygun sayfaya route edilir.

index.php -> middleware -> routes -> controllers -> response (string/json/html view)

# Route Yapısı




 



## codeigniter 4 dosyası Routes.php dosyamı açıkla

GitHub Copilot: Bu **Routes.php** dosyası, CodeIgniter 4 projenizde uygulamanın tüm HTTP rotalarını (yani URL ile hangi controller/metodun çalışacağını) tanımlar. Dosyanın temel işlevleri ve yapısı şöyle:

---

### 1. Auth Filtreli Grup
```php
$routes->group('', ['filter' => 'auth'], function ($routes) {
    // ...dashboard, users, products, vb. rotalar...
});
```
- Bu grup içindeki tüm rotalar için `auth` filtresi uygulanır. Yani bu rotalara erişmek için kullanıcı giriş yapmış olmalıdır.
- İçeride dashboard, kullanıcılar, ürünler, siparişler, sliderlar, ayarlar, sayfalar, müşteriler ve temsilciler gibi birçok yönetim paneli rotası var.

---

### 2. Giriş/Çıkış (Auth) Rotaları

```php
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::loginPost'); 
$routes->get('/logout', 'Auth::logout');
```
- Giriş ve çıkış işlemleri için rotalar. Bu rotalar `auth` filtresi dışında tutulmuş, yani giriş yapmamış kullanıcılar da erişebilir.

---

### 3. Webhook Rotaları

```php
$routes->post('/ziraat-webhook', 'Webhook::ziraatWebhook');
$routes->post('/ziraat-payment-success', 'Webhook::ziraatPaymentSuccess');
$routes->post('/ziraat-payment-fail', 'Webhook::ziraatPaymentFail');
```
- Banka veya ödeme sistemlerinden gelen bildirimler için webhook rotaları.

---

### 4. API Rotaları
```php
$routes->group('api', function($routes) {
    // ...api rotaları...
});
```
- `/api` ile başlayan tüm rotalar burada gruplanmış.
- Bazı rotalarda hem müşteri hem temsilci için ayrı ayrı veya birlikte filtreler uygulanmış.
- Müşteri ve temsilci girişleri, şifre sıfırlama, profil, adres, sepet, ödeme, sipariş gibi işlemler için detaylı API rotaları mevcut.

---

### 5. Swagger Rotaları
```php
$routes->group('swagger', function ($routes) {
    $routes->get('', 'SwaggerController::index');
    $routes->get('yaml', 'SwaggerController::yaml');
});
```
- API dokümantasyonu için Swagger arayüzü ve YAML çıktısı rotaları.

---

### Genel Notlar
- Rotalar, gruplar ve filtreler ile güvenlik ve erişim kontrolü sağlanıyor.
- Segmentler (`(:segment)`) ile dinamik parametreler alınabiliyor.
- API rotalarında müşteri ve temsilci için ayrı filtreler ve bazı işlemler için "veya" (or) mantığı kullanılmış.

---

**Kısacası:**  
Bu dosya, uygulamanızdaki tüm URL'lerin hangi controller ve metoda yönlendirileceğini, hangi filtrelerin uygulanacağını ve erişim kontrollerini merkezi olarak yönetir. Özellikle yönetim paneli, API ve dokümantasyon için kapsamlı bir yapı sunar.
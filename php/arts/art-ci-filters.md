

## codeigniter 4 dosyası filters.php 'yi açıklar mısın ?

GitHub Copilot: Elbette! Bu dosya, CodeIgniter 4 framework’ünde uygulamanızın HTTP isteklerine filtre uygulamak için kullanılır. **Filters.php** dosyası, hangi filtrelerin hangi isteklerde ve hangi yollar için çalışacağını belirler. Dosyanın temel bölümlerini açıklayayım:

---

### 1. **$aliases**
Filtreler için kısa isimler (takma adlar) tanımlar. Böylece filtreleri kolayca çağırabilirsiniz.

```php
public array $aliases = [
    'csrf'    => CSRF::class,
    'toolbar' => DebugToolbar::class,
    // ... diğer filtreler ...
    'auth'    => AuthFilter::class,
    // ... özel filtreler ...
];
```
Burada hem CodeIgniter’ın kendi filtreleri hem de uygulamaya özel filtreler (ör: AuthFilter) tanımlanmış.

---

### 2. **$required**
Her istekte otomatik olarak çalışan, framework’ün temel işlevselliği için gerekli olan filtrelerdir.

```php
public array $required = [
    'before' => [
        'forcehttps',
        'pagecache',
        'corsFilter',
    ],
    'after' => [
        'pagecache',
        'performance',
        'toolbar',
    ],
];
```
Örneğin, her istekten önce HTTPS zorunluluğu, CORS ve sayfa önbellekleme çalışır.

---

### 3. **$globals**
Tüm isteklere (her route’a) otomatik olarak uygulanan filtrelerdir. Burada çoğu yorum satırı yapılmış, yani aktif değil.

```php
public array $globals = [
    'before' => [
        // 'honeypot',
        // 'csrf',
        // 'invalidchars',
    ],
    'after' => [
        // 'honeypot',
        // 'secureheaders',
    ],
];
```

---

### 4. **$methods**
Belirli HTTP metoduna (GET, POST, vs.) göre filtre uygulamak için kullanılır. Bu örnekte boş.

---

### 5. **$filters**
Belirli URI desenlerine göre filtrelerin çalışmasını sağlar.

```php
public array $filters = [
    'auth' => [
        'before' => ['/', 'dashboard', 'dashboard/*'],
        'except' => ['login', 'login/*', 'logout', 'logout/*', 'auth/*', 'auth']
    ]
];
```
Burada, `auth` filtresi ana sayfa ve dashboard için çalışır, ancak login/logout gibi yollar hariç tutulmuş.

---

### **Özet**
- **Filters.php** dosyası, uygulamanızda hangi filtrelerin ne zaman ve nerede çalışacağını merkezi olarak yönetir.
- Güvenlik, yetkilendirme, CORS, önbellekleme gibi işlemler için filtreler tanımlanır ve atanır.
- Hem framework’ün kendi filtreleri hem de size özel filtreler kullanılabilir.


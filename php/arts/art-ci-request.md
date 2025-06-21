

CodeIgniter 4'te **request objesi** (`$this->request`), gelen HTTP isteğiyle (request) ilgili tüm verilere erişim sağlayan bir nesnedir. Controller içinde otomatik olarak bulunur ve şu amaçlarla kullanılır:

- **GET/POST/PUT/DELETE** gibi HTTP metodunu tespit etmek
- Query string, form, JSON veya raw body verilerini almak
- Header, cookie, dosya yükleme gibi isteğe ait diğer bilgilere erişmek

Örnekler:
```php
// GET parametresi almak
$page = $this->request->getGet('page');

// POST parametresi almak
$name = $this->request->getPost('name');

// JSON body almak
$json = $this->request->getJSON();

// Header almak
$token = $this->request->getHeaderLine('Authorization');
```

Kısacası, `$this->request` CodeIgniter 4'te gelen isteğin tüm detaylarını yönetmek için kullanılır.
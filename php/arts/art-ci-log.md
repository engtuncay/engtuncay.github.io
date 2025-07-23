
# codeigniter4 de log mesajı nasıl yazılır 

GitHub Copilot: CodeIgniter 4'te log mesajı yazmak için `log_message()` fonksiyonunu veya `\CodeIgniter\Log\Logger` sınıfını kullanabilirsiniz. İşte farklı yöntemler:

## 1. `log_message()` Helper Fonksiyonu (En Kolay)

```php
// Farklı log seviyeleri
log_message('error', 'Bu bir hata mesajıdır');
log_message('debug', 'Debug bilgisi');
log_message('info', 'Bilgi mesajı');
log_message('notice', 'Uyarı mesajı');
log_message('warning', 'Dikkat mesajı');
log_message('critical', 'Kritik hata');
log_message('alert', 'Alarm mesajı');
log_message('emergency', 'Acil durum');
```

## 2. Logger Servisini Kullanma

```php
// Controller veya başka bir sınıfta
$logger = \Config\Services::logger();
$logger->error('Hata mesajı');
$logger->info('Bilgi mesajı');
$logger->debug('Debug mesajı');
```

## 3. Dependency Injection ile

```php
use CodeIgniter\Log\Logger;

class YourController extends BaseController
{
    protected $logger;
    
    public function __construct()
    {
        $this->logger = \Config\Services::logger();
    }
    
    public function someMethod()
    {
        $this->logger->info('Metod çalıştırıldı');
        
        try {
            // Bazı işlemler
        } catch (Exception $e) {
            $this->logger->error('Hata oluştu: ' . $e->getMessage());
        }
    }
}
```

## 4. Log Konfigürasyonu

Log ayarları Logger.php dosyasında yapılır:

```php
// app/Config/Logger.php
public $threshold = [
    'production'  => 4, // error ve üzeri
    'testing'     => 3, // info ve üzeri  
    'development' => 9, // tüm loglar
];
```

## 5. Özel Log Mesajları

```php
// Değişkenlerle birlikte
$userId = 123;
$action = 'login';
log_message('info', "Kullanıcı {$userId} {$action} işlemi yaptı");

// Array veya object loglamak için
$data = ['user_id' => 123, 'action' => 'login'];
log_message('info', 'Kullanıcı işlemi: ' . json_encode($data));
```

## Log Seviyeleri (Önem Sırasına Göre)

1. **emergency** - Sistem kullanılamaz
2. **alert** - Hemen aksiyon alınmalı
3. **critical** - Kritik durumlar
4. **error** - Hatalar
5. **warning** - Uyarılar
6. **notice** - Normal ama önemli olaylar
7. **info** - Bilgi mesajları
8. **debug** - Debug bilgileri

Log dosyaları varsayılan olarak logs klasöründe saklanır ve `log-YYYY-MM-DD.log` formatında adlandırılır.

Mevcut projenizde hangi yöntemi kullanmak istersiniz? Gerekirse örnek bir kullanım ekleyebilirim.
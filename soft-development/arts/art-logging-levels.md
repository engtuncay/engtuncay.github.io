

## Genel Loglama Kütüphanelerinde Loglama Seviyeleri

### **Loglama Seviyeleri (Log Levels) Hiyerarşisi:**

```
TRACE   → En detaylı (nadir kullanılır)
DEBUG   → Geliştirilme için detaylı bilgiler
INFO    → İşletimsel bilgiler (normal akış)
WARN    → Uyarılar (potansiyel sorunlar)
ERROR   → Hatalar
FATAL   → Kritik hatalar
```

### **`DEBUG` - Hangi Yerlerde Kullanılır?**

- **Değişken değerleri**: Loop içindeki iter değerleri, ara hesaplamalar
- **Fonksiyon çağrıları**: "Bu fonksiyon çağrıldı" mesajları
- **Condition kontrolleri**: "Bu şart sağlandı/sağlanmadı"
- **Detaylı API response'ları**: Tam response body'si
- **Geliştirici-odaklı**: Production'da kapatılır (verbose)

**Örnek:**
```typescript
debug("Loop iteration", { i: 5, value: item.name, condition: true });
debug("Function entered", { params: [...] });
```

### **`INFO` - Hangi Yerlerde Kullanılır?**

- **Başarılı işlemler**: "Veritabanı bağlantısı kuruldu"
- **Sistem olayları**: "Uygulama başladı", "Service başlandı"
- **İşletimsel bilgiler**: "100 record işlendi"
- **User action'ları**: "Kullanıcı giriş yaptı", "Dosya yüklendi"
- **Üretim-odaklı**: Production'da da gösterilir

**Örnek:**
```typescript
info("User logged in successfully", { userId: 123, timestamp: ... });
info("Database connection established", { host: "localhost" });
info("File upload completed", { fileName: "report.pdf", size: "5MB" });
```

### **Pratik Ayırım:**

| Senaryo                                  | Kullanılacak |
|------------------------------------------|--------------|
| Hata debug'lamak                         | DEBUG        |
| API response detayları                   | DEBUG        |
| "Giriş başarılı" mesajı                  | INFO         |
| Döngü içinde her adım                    | DEBUG        |
| Kritik işlem tamamlandı                  | INFO         |
| Hesaplama ara değerleri                  | DEBUG        |
| Veritabanı sorgusunun sonucu (kaç satır) | INFO         |
| SQL sorgusunun tam text'i                | DEBUG        |

### **Kod Tabanınızda Görmek İstediğiniz Durum:**

Şu anda kodunuzda `debug` kullanıyorsunuz, ancak production'da görmesi gereken "başarılı işlem" mesajları için `info` olmalıdır:

```typescript
// Bunlar INFO olmalı (işlem başarılı):
FiApp.fiLogger?.info(res, "Login başarılı");
FiApp.fiLogger?.info(response.data, "Bakiye Denge Rapor Alındı");

// Bunlar DEBUG olabilir (detaylı debug bilgisi):
FiApp.fiLogger?.debug(response.data, "API Response detayları");


[Back](../readme.md)

---

- [Token Üretme ve Doğrulama Sisteminin Adımları](#token-üretme-ve-doğrulama-sisteminin-adımları)
  - [1. Token Yapısı](#1-token-yapısı)
  - [2. Token Üretimi](#2-token-üretimi)
  - [3. Token Doğrulama](#3-token-doğrulama)
  - [4. Performans ve Güvenlik Önerileri](#4-performans-ve-güvenlik-önerileri)
  - [5. Mimari Özet](#5-mimari-özet)


### Token Üretme ve Doğrulama Sisteminin Adımları

JWT'ye benzer bir şekilde kendi token üretim ve doğrulama sisteminizi, aşağıdaki gibi oluşturabilirsiniz. 

---

#### 1. Token Yapısı
JWT'nin özelliklerinden esinlenerek şu formatı oluşturabilirsiniz:
- **Header:** Algoritma ve token tipi. Örnek: `{"alg":"HS256","typ":"TOKEN"}`
- **Payload:** Kullanıcı bilgisi, yetkilendirme veya token iletilmek istenen diğer bilgiler. Örnek: `{"userId":1234,"roles":["admin","user"],"exp":1699641600}`
- **Signature:** Header ve Payload'ın HMAC-SHA256 gibi bir algoritma ile imzalanması.

Token Formatı:
```
Header.Payload.Signature
```

---

#### 2. Token Üretimi
Token üretim sırasında şu adımlara dikkat edilmelidir:
- Expiration süresi belirlenmeli (geçerlilik süresi).
- Kullanıcı özel bilgileri güvenli şekilde şifrelenmeli.
- HMAC-SHA256 gibi hızlı ve performanslı algoritmalar kullanılmalı.

**C# Kod Örneği:**
```csharp
using System;
using System.Security.Cryptography;
using System.Text;

public class TokenGenerator
{
    private readonly string secretKey = "Your_Secret_Key_Here"; // Güçlü ve uzun bir key!

    public string GenerateToken(int userId, int expirationMinutes)
    {
        var header = Convert.ToBase64String(Encoding.UTF8.GetBytes("{\"alg\":\"HS256\",\"typ\":\"TOKEN\"}"));

        var payload = Convert.ToBase64String(Encoding.UTF8.GetBytes($"{{\"userId\":{userId},\"exp\":{ToUnixEpoch(DateTime.UtcNow.AddMinutes(expirationMinutes))}}}"));

        var signature = GenerateSignature(header, payload);

        return $"{header}.{payload}.{signature}";
    }

    private string GenerateSignature(string header, string payload)
    {
        using (var hmac = new HMACSHA256(Encoding.UTF8.GetBytes(secretKey)))
        {
            var data = $"{header}.{payload}";
            var hash = hmac.ComputeHash(Encoding.UTF8.GetBytes(data));
            return Convert.ToBase64String(hash);
        }
    }

    private long ToUnixEpoch(DateTime dateTime)
    {
        return (long)(dateTime - new DateTime(1970, 1, 1)).TotalSeconds;
    }
}
```

---

#### 3. Token Doğrulama
Token doğrularken imza kontrolü ve süresi dolmuş token’ın reddi önemlidir.

**C# Kod Örneği:**
```csharp
using System;
using System.Linq;

public class TokenValidator
{
    private readonly string secretKey = "Your_Secret_Key_Here";

    public bool ValidateToken(string token)
    {
        var parts = token.Split('.');
        if (parts.Length != 3)
            return false;

        var header = parts[0];
        var payload = parts[1];
        var signature = parts[2];

        var expectedSignature = GenerateSignature(header, payload);

        if (signature != expectedSignature)
            return false;

        // Payload kontrolü yapılır
        var payloadJson = Encoding.UTF8.GetString(Convert.FromBase64String(payload));
        dynamic payloadData = Newtonsoft.Json.JsonConvert.DeserializeObject(payloadJson);
        long exp = payloadData.exp;

        // Token süresi kontrol edilir
        if (exp < ToUnixEpoch(DateTime.UtcNow))
            return false;

        return true;
    }

    private string GenerateSignature(string header, string payload)
    {
        using (var hmac = new HMACSHA256(Encoding.UTF8.GetBytes(secretKey)))
        {
            var data = $"{header}.{payload}";
            var hash = hmac.ComputeHash(Encoding.UTF8.GetBytes(data));
            return Convert.ToBase64String(hash);
        }
    }

    private long ToUnixEpoch(DateTime dateTime)
    {
        return (long)(dateTime - new DateTime(1970, 1, 1)).TotalSeconds;
    }
}
```

---

#### 4. Performans ve Güvenlik Önerileri
- **Hashing Algoritması:** HMAC-SHA256 veya HMAC-SHA512 gibi güçlü algoritmalar kullanın.
- **Secret Key:** Güçlü ve uzun bir anahtar belirleyin, anahtar harici bir ortamda saklanmalıdır.
- **Expiration:** Token geçerlilik süresini kısa tutun (örneğin 15-60 dakika).
- **Yenileme Sistemleri:** Refresh token sistemleriyle uzun süreli oturumları yönetin.
- **Payload Kısıtlamaları:** Gereksiz bilgiyi payload'a koymaktan kaçının. Veri boyutunu düşük tutmak performansı artırır.

---

#### 5. Mimari Özet
Bu sistem JWT’nin temel özelliklerini sağlayarak (güvenli token yapısı, imza kontrolü) uygulama ihtiyaçlarınıza uygun performanslı çözümler sunabilir.


[Back](../readme.md)

---

## Web Api Dönüş Yöntemleri

### 1. **İsimlendirilmiş Propertiler Kullanmak**

Anonim nesneye daha açıklayıcı ve net isimlendirilmiş propertiler verilebilir:

```csharp
return new
{
    IsTokenValid = checkToken.boTknCheck,
    FdrResult = DtoFdr1.ImportFdr(checkMusteri),
    Version = 3,
    // Request = fiRequest // Yoruma açıldığında kullanılabilir.
};
```

---

### 2. **Dinamik Nesne Kullanımı**
Eğer daha esnek bir yapı isteniyorsa, `dynamic` türü kullanılabilir:

```csharp
dynamic result = new System.Dynamic.ExpandoObject();
result.IsTokenValid = checkToken.boTknCheck;
result.FdrResult = DtoFdr1.ImportFdr(checkMusteri);
result.Version = 3;
// result.Request = fiRequest; // Yoruma açıldığında kullanılabilir.

return result;
```

---

### 3. **Bir DTO (Data Transfer Object) Sınıfı Kullanmak**
Anonim nesne yerine bir DTO sınıfına dönüş yapılabilir:

#### DTO Tanımı:
```csharp
public class CheckMusteriResponse
{
    public bool IsTokenValid { get; set; }
    public object FdrResult { get; set; }
    public int Version { get; set; }
    // public FiRequest Request { get; set; } // Gerekirse eklenecek.
}
```

#### Kullanımı:
```csharp
return new CheckMusteriResponse
{
    IsTokenValid = checkToken.boTknCheck,
    FdrResult = DtoFdr1.ImportFdr(checkMusteri),
    Version = 3,
    // Request = fiRequest
};
```

---

### 4. **JSON Dönüşümü için** (Eğer JSON bir çıktı bekleniyorsa)
Eğer API içinde JSON dönüşü gerekiyorsa, bir `JsonResult` veya `Ok` yanıtı sağlayarak yapılabilir:

```csharp
return Ok(new
{
    IsTokenValid = checkToken.boTknCheck,
    FdrResult = DtoFdr1.ImportFdr(checkMusteri),
    Version = 3,
    // Request = fiRequest
});
```

---

### 5. **Bir Sözlük (Dictionary) Kullanmak**
Anahtar-değer (key-value) çiftleriyle dönüş yapmak için `Dictionary<string, object>` kullanılabilir:

```csharp
return new Dictionary<string, object>
{
    { "IsTokenValid", checkToken.boTknCheck },
    { "FdrResult", DtoFdr1.ImportFdr(checkMusteri) },
    { "Version", 3 },
    // { "Request", fiRequest }
};
```

---

### 6. **Tamamen Plain Object Yaklaşımla**
Hızlıca bir `object` dönüşü yapılabilir:

```csharp
object result = new
{
    checkToken.boTknCheck,
    FdrResult = DtoFdr1.ImportFdr(checkMusteri),
    Version = 3,
};

return result;
```

---

### Hangi Yöntem Seçilmeli?
- **API'de JSON dönecekseniz:** `Ok`, DTO veya JSON nesnesi daha iyi bir tercih olacaktır.
- **Esneklik istiyorsanız:** `dynamic` veya `Dictionary<string, object>` kullanabilirsiniz.
- **Tip güvenliği önemliyse:** DTO sınıfı ile dönüş yapmanız önerilir.

Bu seçeneklere göre kodunuzu tasarlayabilirsiniz. 😊
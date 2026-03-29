
## Me
web.config kodda kullanacağımız özel ayar nasıl ekleriz ?

## AI Assistant
ASP.NET projelerinde özel bir ayar eklemek için `web.config` dosyasını şu şekilde düzenleyebilirsiniz:

### 1. **Ayar Eklemek**
`<appSettings>` sekmesine yeni bir anahtar-değer çifti ekleyebilirsiniz. Örneğin:

```xml
<appSettings>
  <!-- Var olan ayarlar -->
  <add key="webpages:Version" value="3.0.0.0" />
  <add key="webpages:Enabled" value="false" />
  <!-- Yeni özel ayar -->
  <add key="CustomSetting" value="MyCustomValue" />
</appSettings>
```

Burada `key` değeri ayarın adını, `value` ise ayarın değerini belirtir.

---

### 2. **C# Kodunda Bu Ayarı Okumak**
Eklediğiniz ayarı kodda şu şekilde okuyabilirsiniz:

```csharp
using System;
using System.Configuration;

public class Program
{
    public static void Main()
    {
        string customValue = ConfigurationManager.AppSettings["CustomSetting"];
        Console.WriteLine($"CustomSetting Value: {customValue}");
    }
}
```

Bu kod, `web.config` dosyasındaki `CustomSetting` adlı ayarı okuyarak `customValue` değişkenine atar.

---

### 3. **String Formatında Veri Eklemek**
Eğer daha karmaşık değerler (ör. JSON) saklamak istiyorsanız, `value` alanına JSON veya başka bir veri formatını koyabilirsiniz:

```xml
<appSettings>
  <add key="CustomJsonSetting" value='{"Name":"John", "Age":30}' />
</appSettings>
```

Ve bu değeri kodda şu şekilde kullanabilirsiniz:

```csharp
using Newtonsoft.Json;
using System;
using System.Configuration;

public class Program
{
    public static void Main()
    {
        string jsonValue = ConfigurationManager.AppSettings["CustomJsonSetting"];
        var customObject = JsonConvert.DeserializeObject<dynamic>(jsonValue);
        Console.WriteLine($"Name: {customObject.Name}, Age: {customObject.Age}");
    }
}
```

---

### 4. **Grup Halinde Özel Ayarlar Eklemek**
Eğer daha düzenli bir çözüm istiyorsanız, özel bir `<configSections>` oluşturabilirsiniz:

#### a. `web.config` Dosyasına Yeni Grup Eklemek:
```xml
<configuration>
  <configSections>
    <section name="CustomSettings" type="System.Configuration.NameValueSectionHandler" />
  </configSections>
  <CustomSettings>
    <add key="Setting1" value="Value1" />
    <add key="Setting2" value="Value2" />
  </CustomSettings>
</configuration>
```

#### b. Kod Tarafında Ayarları Okumak:
```csharp
using System;
using System.Configuration;

public class Program
{
    public static void Main()
    {
        var customSettings = ConfigurationManager.GetSection("CustomSettings") as System.Collections.Specialized.NameValueCollection;
        if (customSettings != null)
        {
            Console.WriteLine($"Setting1: {customSettings["Setting1"]}");
            Console.WriteLine($"Setting2: {customSettings["Setting2"]}");
        }
    }
}
```

---

### Sonuç:
Bu yöntemler, projeye özel ayarları yönetilebilir ve düzenli bir şekilde eklemenizi sağlar. Eğer çok fazla özel ayarınız varsa, `<configSections>` yaklaşımını tercih etmek daha düzenli bir yapı sağlar.

## Me
string customValue = ConfigurationManager.AppSettings["CustomSetting"];
eğer ilgili ayar yoksa customValue değişkeni null mu olur

## AI Assistant
Evet, eğer ilgili ayar `web.config` dosyasındaki `<appSettings>` bölümünde yoksa, şu satır:

```csharp
string customValue = ConfigurationManager.AppSettings["CustomSetting"];
```

`customValue` değişkenine **`null`** değeri atar.

---

### Açıklama:
- `ConfigurationManager.AppSettings` söz konusu anahtarı (`key`) arar.
- Eğer bulursa, ilgili anahtara (`key`) karşılık gelen **`value`** değerini döner.
- Eğer bulamazsa, dönüş değeri **`null`** olur.

### Örnek Senaryo:
Varsayılan olarak aşağıdaki `web.config` dosyası olduğunu düşünelim:

```xml
<appSettings>
  <add key="Setting1" value="SomeValue" />
</appSettings>
```

Eğer aşağıdaki kodu çalıştırırsanız:
```csharp
string customValue = ConfigurationManager.AppSettings["CustomSetting"]; // "CustomSetting" yok
Console.WriteLine(customValue == null ? "Null değer" : customValue);
```

Konsolda **`Null değer`** yazdırılır.

---

### Varsayılan Değer Kullanımı:
Eğer ayar bulunmadığında `null` yerine bir varsayılan değer kullanmak istiyorsanız, şu şekilde basit bir kontrol yapabilirsiniz:

```csharp
string customValue = ConfigurationManager.AppSettings["CustomSetting"] ?? "Varsayılan Değer";
Console.WriteLine(customValue);
```

Bu durumda:
- Eğer ayarlanan bir değer varsa, `customValue` bu değeri alır.
- Eğer ayar yoksa, `customValue` **`"Varsayılan Değer"`** olarak set edilir.

---

### Özet:
Eğer bir ayar bulunmazsa, `ConfigurationManager.AppSettings[...]` **`null`** dönecektir. Bu durumu kontrol etmek için `null` kontrolü ya da `null-coalescing` operatörünü (**`??`**) kullanabilirsiniz.

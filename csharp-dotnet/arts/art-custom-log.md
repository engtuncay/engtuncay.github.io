
[Back](../readme.md)

---

## Me
web api uygulamamda hataları dosyaya loglamayı nasıl yapabilirim

## AI Assistant
ASP.NET Web API uygulamanızda hataları dosyaya loglamak için bir **log mekanizması** oluşturabilirsiniz. Aşağıda temel bir çözüm yapısını örnekleyeceğim ve mevcut dosyanızdaki `EwaLog` sınıfını genişleterek dosyaya yazma yeteneği ekleyeceğim:

### Gerekli Adımlar:

1. **Loglama için bir dosya belirleyin:** Logların saklanacağı bir dosya yolu tanımlayın. Bu, genellikle `App_Data` veya `Logs` gibi bir klasör olabilir.

2. **Dosyaya yazımı sağlayan kodu geliştirin:** `System.IO.File` veya `StreamWriter` kullanarak logları dosyaya yazabilirsiniz.

3. **Global hata yakalama (Global Exception Handling):** Hataları merkezi bir şekilde yakalamak için `ExceptionFilter` ya da `Middleware` kullanabilirsiniz.

### Örnek Güncel Kod (EwaLog İçin Genişletme)

Mevcut kodunuza aşağıdaki örnek genişletmeyle birlikte dosyaya yazma yeteneği ekleyebilirsiniz:

```csharp
using OrakYazilimLib.Util.config;
using System;
using System.IO;

namespace EntegreWebApiNet.EwaConfig
{
    public class EwaLog : IFiLogManager
    {
        private readonly string _logFilePath;

        public EwaLog()
        {
            // Log dosyasının yolu (örnek: App_Data/Logs klasörüne yazılır)
            _logFilePath = Path.Combine(AppDomain.CurrentDomain.BaseDirectory, "App_Data", "Logs", "log.txt");

            // Eğer log klasörü/dosyası yoksa oluşturulur
            string logDirectory = Path.GetDirectoryName(_logFilePath);
            if (!Directory.Exists(logDirectory))
            {
                Directory.CreateDirectory(logDirectory);
            }
        }

        public void LogMessage(string message)
        {
            LogToFile(message);
        }

        public void LogMessage(string message, Type refType)
        {
            LogToFile($"{DateTime.Now} [{refType.FullName}]: {message}");
        }

        private void LogToFile(string message)
        {
            try
            {
                // Dosyaya ekleme
                File.AppendAllText(_logFilePath, $"{DateTime.Now}: {message}{Environment.NewLine}");
            }
            catch (Exception ex)
            {
                // Eğer loglama sırasında hata olursa konsola yazılır
                Console.WriteLine($"Log yazma hatası: {ex.Message}");
            }
        }
    }
}
```

### Açıklamalar:
1. **`_logFilePath`:** Log dosyasının tam yolunu belirler. Burada `AppDomain.CurrentDomain.BaseDirectory` kullanarak uygulamanın temel dizinine `App_Data/Logs` isimli bir klasör eklenmiş ve içerisinde `log.txt` dosyası oluşturulmuştur.

2. **`LogToFile` Metodu:** Gelen mesajı belirlenen dosyaya yazdırır. Eğer dosya dizini yoksa otomatik olarak oluşturulur.

3. **Hata Yönetimi:** Eğer dosya yazımı sırasında bir hata oluşursa bu durum konsola yazdırılarak hata durumlarıyla ilgili bilgi sağlar.

---

### Global Exception Handling (Opsiyonel)
Uygulamanızda oluşan tüm `Exception`ları yakalamak ve loglamak için bir global hata yakalama sistemi kurabilirsiniz. Örnek bir `ExceptionFilter` aşağıdaki gibi olabilir:

#### Örnek Global Exception Handler
```csharp
using System;
using System.Net;
using System.Net.Http;
using System.Web.Http.Filters;
using EntegreWebApiNet.EwaConfig;

public class GlobalExceptionLogger : ExceptionFilterAttribute
{
    private readonly EwaLog _logger;

    public GlobalExceptionLogger()
    {
        _logger = new EwaLog();
    }

    public override void OnException(HttpActionExecutedContext context)
    {
        // Hataları logla
        _logger.LogMessage(context.Exception.Message, context.Exception.GetType());

        // İsteğe bağlı olarak bir HTTP cevabı oluşturabilirsiniz
        context.Response = new HttpResponseMessage(HttpStatusCode.InternalServerError)
        {
            Content = new StringContent("Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz."),
            ReasonPhrase = "Internal Server Error"
        };
    }
}
```

**Kullanım:**
`Global.asax` veya `WebApiConfig` dosyanızda bu `ExceptionLogger`'ı kaydedin:

```csharp
config.Filters.Add(new GlobalExceptionLogger());
```

---

### Sonuç
Bu sistem ile uygulamanızdaki hataları veya kurumsal loglama ihtiyaçlarını bir dosyada toplayabilirsiniz. Daha gelişmiş bir yapı için **Serilog**, **NLog** gibi kütüphaneleri kullanmayı da tercih edebilirsiniz.

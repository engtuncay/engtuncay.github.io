
[Back](../readme.md)

---

## Me
api isteklerinin başında token kontrolü yapıyorum. bunu global tanımlama imkanım var mı ?

```csharp
Fdr<FiResponse> checkToken = EwamLogin.CheckToken(fiRequest);
if (!FiBoolean.IsTrue(checkToken.boTknValid))
{
  return checkToken.refValue;
}
```


## AI Assistant

Evet, API isteklerinin başında bir "token kontrol" işlemini global bir şekilde tanımlayabilirsiniz. Bunun için bir **Action Filter** veya bir **Base Controller** kullanabilirsiniz. ASP.NET Web API ile çalışırken global anlamda bu tür kontrolleri yönetmenin en etkili yolları aşağıdaki gibidir:

### 1. **Action Filter ile Token Kontrolü**
Bir Action Filter tanımlayarak her API isteği öncesinde token kontrol işlemini gerçekleştirebilirsiniz. İşte bir örnek:

```csharp
using System.Net;
using System.Net.Http;
using System.Web.Http.Controllers;
using System.Web.Http.Filters;

public class TokenCheckAttribute : ActionFilterAttribute
{
    public override void OnActionExecuting(HttpActionContext actionContext)
    {
        if (actionContext.ActionArguments.ContainsKey("fiRequest"))
        {
            var fiRequest = actionContext.ActionArguments["fiRequest"] as FiRequest;

            if (fiRequest != null)
            {
                // Token kontrolü
                var checkToken = EwamLogin.CheckToken(fiRequest);
                if (!FiBoolean.IsTrue(checkToken.boTknValid))
                {
                    // Hatalı token durumu
                    actionContext.Response = actionContext.Request.CreateResponse(HttpStatusCode.Unauthorized, checkToken.refValue);
                }
            }
        }

        base.OnActionExecuting(actionContext);
    }
}
```

#### Kullanımı:
Tüm API metotlarında `TokenCheck` filtresini kullanabilirsiniz:

```csharp
[TokenCheck]
[HttpPost]
public Object GetMusteri([FromBody] FiRequest fiRequest)
{
    RepoTest repoTest = new RepoTest(fiRequest.frTxProfile);

    return new
    {
        fiRequest, fiFdr = DtoFdr1.ImportFdr(repoTest.CariOzet(fiRequest.frFkbParams)), fiVer = 3
    };
}
```

### 2. **Base Controller ile Token Kontrolü**
Başka bir yaklaşım da token kontrolünü ortak bir `BaseController` sınıfında ele almak. Tüm controller'lar bu sınıftan türetilir ve böylece global bir çözüm elde edersiniz.

Örnek `BaseController` sınıfı:

```csharp
using System.Net;
using System.Net.Http;
using System.Web.Http;

public class BaseController : ApiController
{
    protected HttpResponseMessage CheckToken(FiRequest fiRequest)
    {
        var checkToken = EwamLogin.CheckToken(fiRequest);

        if (!FiBoolean.IsTrue(checkToken.boTknValid))
        {
            return Request.CreateResponse(HttpStatusCode.Unauthorized, checkToken.refValue);
        }
        return null; // Token geçerli
    }
}
```

`B2BController` sınıfında `BaseController`'ı kullanarak kontrolü yapabilirsiniz:

```csharp
[RoutePrefix("api/b2b")]
public class B2BController : BaseController
{
    [HttpPost]
    public Object GetMusteri([FromBody] FiRequest fiRequest)
    {
        // Token kontrolü
        var tokenResponse = CheckToken(fiRequest);
        if (tokenResponse != null)
        {
            return tokenResponse;
        }

        RepoTest repoTest = new RepoTest(fiRequest.frTxProfile);

        return new
        {
            fiRequest, fiFdr = DtoFdr1.ImportFdr(repoTest.CariOzet(fiRequest.frFkbParams)), fiVer = 3
        };
    }
}
```

### 3. **Global Filter ile Tüm API İsteklerinde Kontrol**
Token kontrolü tüm API isteklerinde otomatik çağrılmak isteniyorsa bir global filter kullanılabilir:

`WebApiConfig.cs`'de aşağıdaki kodu ekleyin:

```csharp
public static class WebApiConfig
{
    public static void Register(HttpConfiguration config)
    {
        // Global Token Filter
        config.Filters.Add(new TokenCheckAttribute());

        // Diğer ayarlar
        config.MapHttpAttributeRoutes();
    }
}
```

Bu durumda artık her API metodunun başında filter otomatik çalışır.

### Hangi Yöntem Tercih Edilmeli?
- **Belirli metotlarda kontrol yapmak istiyorsanız** `Action Filter` kullanımı.
- **Tüm kontrollerde ortak bir yöntem istiyorsanız** `Base Controller` yaklaşımı.
- **Global bir kontrol istiyorsanız** `Global Filter` tercih edebilirsiniz.

Sizin senaryonuzda `Action Filter` veya `Global Filter` oldukça şeffaf ve yönetimi kolay bir seçenek olacaktır.

## Me
TokenCheckAttribute sınıfını hangi klasöre koysam daha iyi olur 


## AI Assistant
ASP.NET projelerinde kodun düzenlenmesi ve yönetilebilir olması açısından, sınıfları kullanım alanlarına göre organize etmek en iyi yaklaşımdır. `TokenCheckAttribute` gibi bir sınıf genellikle bir **filter** veya **attributes** kategorisinde yer alır. Aşağıda bu sınıfı koyabileceğiniz en uygun klasör isimlerini önerdim:

### 1. **Filters / Attributes Klasörü**
`TokenCheckAttribute`, bir kontrol filtresi olduğu için genellikle `Filters` veya `Attributes` adında bir klasör altında saklanır.

- **Filters Klasörü**: (Daha yaygın kullanılan isim)
  - `Filters` klasörü genellikle tüm **Action Filters**, **Authorization Filters** ve benzeri türdeki sınıflarınızı saklamak için tercih edilir.
  - Örnek yol:
```
/Filters/TokenCheckAttribute.cs
```

- **Attributes Klasörü**:
  - Eğer projede başka türde attribute'larınız da varsa, bu sınıfları daha anlamlı bir şekilde organize etmek için `Attributes` klasörünü kullanabilirsiniz.
  - Örnek yol:
```
/Attributes/TokenCheckAttribute.cs
```

### 2. **Infrastructure Klasörü**
Daha büyük projelerde, altyapıya özel birçok şey (helpers, utils, filters, middleware gibi) için `Infrastructure` adında bir klasör oluşturulur. Eğer mimarinizde bu tür bir katman varsa, aşağıdaki yolları tercih edebilirsiniz:

- Filtering için aşağıdaki yolu kullanabilirsiniz:
```
/Infrastructure/Filters/TokenCheckAttribute.cs
```

- Genel bir yapıda:
```
/Infrastructure/TokenCheckAttribute.cs
```

### 3. **Security Klasörü (Opsiyonel)**
`TokenCheckAttribute` gibi sınıflar genellikle güvenlik politikaları (security token, authorization vs.) ile ilgili olduğu için projede bir `Security` klasörünüz varsa veya oluşturmayı düşünüyorsanız, bu klasör de uygundur:

```
/Security/TokenCheckAttribute.cs
```

### Hangi Klasör Yapısı Daha Uygun?
Eğer projede hâlihazırda bir düzen yoksa ve yeni bir mimari oluşturuyorsanız:

1. Küçük bir proje:
   - Klasör düzenini basit tutun: `/Filters/TokenCheckAttribute.cs`.

2. Orta/Büyük ölçekli projeler:
   - Daha modüler bir yapıyı amaçlayın:
```
/Infrastructure/Filters/TokenCheckAttribute.cs
```
   - Alternatif olarak:
```
/Security/TokenCheckAttribute.cs
```

### Sonuç: Önerilen Yer
Çoğu durumda **`/Filters/`** klasörüne koymak, anlaşılabilirlik ve standart açısından en iyi yaklaşımdır. Ancak projede başka güvenlikle ilgili sınıflarınız varsa, **`/Security/`** klasörünü de tercih edebilirsiniz.

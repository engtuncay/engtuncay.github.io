


## Json Web Token ile Dot Net Core 8 Web Api Güvenliği

Source : 

➖ Nuget indirilecek Paket

- JwtBearer (dot net core versiyonuna göre) indiririz.

- Microsoft Identity Model Tokens indiririz.

- System.IdentityModel.Tokens.Jwt indiririz.

➖ AppSettings.Json dosyasını düzenleriz.

```js
"Jwt" : {
  "Key": "adadasdasdsad12121122",
  "Issuer": "https://localhost:7057/",
  "Audience": "https://localhost:7057/"
}

```

➖ JwtAyarlari nesne oluştururuz

```cs
public class JwtAyarlari {
  
  public string? Key {get;set;}
  public string? Issuer {get;set;}
  public string? Audience {get;set;}

}
```

➖ program.cs 'yi ayarlarız.

```cs
builder.Services.AddAuthentication(JwtBearerDefaults.AuthenticationScheme) // importları ekleriz
  .AddJwtBearer ( options => {
    options.TokenValidationParameters = new TokenValidationParameters {
      ValidateIssuer = true,
      ValidateAudience = true,
      ValidateLifeTime = true,
      ValidateIssuerSigningKey = true,
      ValidIssuer = builder.Configuration["Jwt:Issuer"],
      ValidAudience = builder.Configuration["Jwt:AudienceIssuer"],
      IssuerSigningKey = new SymmetricSecurityKey(Encoding.UTF8.GetBytes(
        builder.Configuration["Jwt:AudienceIssuer"] ?? string.Empty));

    };
  });


```

➖ ApiKullanicisi nesnesini oluştururuz.

```cs
public class ApiKullanicisi {
  public int Id {get;set;}
  public string? KullaniciAdi {get;set;}
  public string? Sifre {get;set;}
  public string? Rol {get;set;}
}
```

➖ Test Amaçlı static Kullanici listesi oluştururuz.

```cs
public class ApiKullanicilari {
  public static List<ApiKullanicisi> = new () {
    new ApiKullanicisi { Id = 1 , KullaniciAdi = "sinan", Sifre = "123456", Rol= "Yonetici"}
    new ApiKullanicisi { Id = 2 , KullaniciAdi = "ilyas", Sifre = "123456", Rol= "StandartKullanici"}
  }
}
```

➖ jwt ayarlarının controllerda okunması için program.cs 'de ayarlar yaparız

```cs
builder.Services.Configure<JwtAyarlari>(builder.Configuration.GetSection("Jwt"));
```

➖ kimlik denetimi için yeni bir kontroller ekleriz. 

📝 ctor ile construction snippet çalıştırabiliriz.

```cs
[ApiController]
[Route("[controller]")]
public class KimlikDenetimiController : ControllerBase {
  
  private readonly JwtAyarlari _jwtAyarlari;

  public KimlikDenetimiController(IOptions<JwtAyarlari> jwtAyarlari) 
  {
    _jwtAyarlari = jwtAyarlari.Value;

  }

  [HttpPost("Giris)]
  public IActionResult Giris([FromBody] ApiKullanicisi apiKullaniciBilgi)
  {
    var apiKullanicisi = KimlikDenetimiYap(apiKullaniciBilgi); 

    if( apiKullanicisi == null) return NotFound("Kullanici bulunamadi.");

    var token = TokenOlustur(apiKullanicisi);

    return Ok(token);
  }

  public ApiKullanicisi? KimlikDenetimiYap(ApiKullanicisi apiKullaniciBilgi)
  {
    return ApiKullanicilari.Kullanicilar
      .FirstOrDefault(x=>x.KullaniciAdi?.ToLower()== apiKullaniciBilgi.KullaniciAdi 
        && x.Sifre == apiKullaniciBilgi.Sifre );
  }

  public string TokenOlustur(ApiKullanici apiKullanicisi)
  {
    if(_jwtAyarlari.Key == null) throw new Exception("Jwt Ayarların Key null");

    var securityKey = new SymmetricSecurityKey(Encoding.UTF8.GetBytes(_jwtAyarlari.Key))
    var credentials = new SigningCredentials(securityKey, SecurityAlgorithms.HmacSha256);

    var claimDizisi = new []
    {
      new Claim(ClaimTypes.NameIdentifier, apiKullanicisi.KullaniciAdi!)
      new Claim(ClaimTypes.Role, apiKullanicisi.Rol)
    };

    var token = new JwtSecurityToken(_jwtAyarlari.Issuer,
      _jwtAyarlari.Audience,
      claimDizisi,
      expires: DateTime.Now.AddHours(1),
      signingCredentials:credentials
    );

    return new JwtSecurityTokenHandler().WriteToken(token);
  }


}
```

➖ api point test ederiz

- end point (post action)

```
https://localhost:7057/api/KimlikDenetimi/Giris

```

- istek body sini ayarlarız

```js
{
  "KullaniciAdi": "sinan",
  "Sifre": "123456",

}

```

- api, token gönderir.

gönderilen token jwt.io sitesinde decode edebiliriz.


➖ controller sınıfına [Authorize] attribute ekleyerek o sınıftaki istekleri güvenli duruma getiririz.


➖ postmanda güvenli metoda istek yaparken headers alan ekleriz

```
Key : Authorization
Value : Bearer {{tokenValue}}

```

veya postman Authorization tabında type bearer token seçip, token değerini gireriz.

➖ KimlikDenetimi controller'a authorize annotation eklersek, Giris request metoduna herkes erişebilmesi için metoda `[AllowAnonymous]` annotation'ı ekleriz.

```cs

  [AllowAnonymous]
  [HttpPost("Giris)]
  public IActionResult Giris([FromBody] ApiKullanicisi apiKullaniciBilgi)
  {
    // ..

  }

```

➖ Rollere göre yetkilendirme yapmak için Authorize rol parametresi göndeririz.


```cs
[ApiController]
[Authorize()]
[Authorize(Roles="Yonetici")]
public class KimlikDenetimiController : ControllerBase {
  // ...
}

```

- birkaç role yetki vermek için

```cs
[Authorize(Roles="Yonetici,StandartKullanici")]

```

➖ controller'da kullanici bilgisine nasıl ulaşabiliriz.

```cs
var identity = HttpContext.User.Identity as ClaimsIdentity;

var kullaniciAdi = identity?.Claims.FirstOrDefault( x=> x.Type == ClaimTypes(NameIdentifier)?.Value)


```



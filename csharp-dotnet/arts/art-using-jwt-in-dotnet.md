
Source : https://onnurkarakus.medium.com/net-core-web-api-ve-jwt-token-189ed336d615

(some parts may be modified or added)

[Back](../readme.md)

---

.NET 6 Web API ve JWT Token
Onur KARAKUŞ
Feb 21, 2023

- [Kimlik Doğrulama (Authentication)](#kimlik-doğrulama-authentication)
- [JSON Web Token (JWT) nedir ?](#json-web-token-jwt-nedir-)
- [.NET Core Web API uygulaması ve JWT Token](#net-core-web-api-uygulaması-ve-jwt-token)

Bugün, API uygulamalarında güvenlik yöntemlerinden biri olan JWT Token yapısını inceleyeceğiz. Yapıyı, oluşturulmasını ve çalışma yöntemlerini kendimce anlatmaya çalışacağım.

# Kimlik Doğrulama (Authentication)

Authentication, bir kullanıcının kimlik doğrulama işlemidir. Bu işlemde kullanıcı, kendisini doğrulayan bir kimlik bilgisi ile uygulama üzerinde yetki alarak kullanımını sağlar. Örneğin bir kullanıcı adı ve şifre ile kullanıcı uygulamaya kendini tanıtır. Bu kimlik bilgileri doğrulandıktan sonra kullanıcının kimliği onaylanır ve sistemdeki kaynaklara erişmesine izin verilir.

.NET Core Web API yapısında, kimlik doğrulama için kullanılabilecek birçok seçenek bulunmaktadır. Ancak en yaygın kullanılanı JWT (JSON Web Token) tabanlı kimlik doğrulama yapısıdır. JWT, kullanıcının kimlik bilgilerinin tutulduğu bir veri yapısıdır ve bu veri yapısının doğruluğu, içinde yer alan özel bir anahtar tarafından sağlanır. Bu nedenle, bir JWT kullanarak kimlik doğrulama işlemi gerçekleştirmek oldukça güvenlidir.

# JSON Web Token (JWT) nedir ?

JSON Web Token (JWT), web uygulamaları için güvenli bir yetkilendirme yöntemidir. JWT, kullanıcı yetkilendirmesi ile ilgili bilgileri içeren token şeklinde verileri taşır ve bu verileri kullanarak uygulamalar arasında güvenli bir şekilde veri akışı sağlar.

JWT, bir header, bir payload ve bir signature olmak üzere üç parçadan oluşur. Bu parçalar “.” işareti ile ayrılarak gösterilir.

Bu bölümlerin kısaca ne anlama geldiklerine bakalım.

Başlık (Header) :

Başlık bilgisi iki bölümden oluşur. Belirte türü ve imzalama algoritması. İmzalama algoritması HMAC, SHA256 veya RSA olabilmektedir.

Yük (Payload) :

JWT içinde saklanacak veya gönderilecek olan bilgiyi temsil etmektedir. Burada kullanıcı bilgisi, kullanıcı yetki bilgileri veya ek bilgiler yer alabilmektedir.

Payload içerisinde üç tip bilgi bulunabilmektedir. Bunlar;

Kayıtlı Talepler (Registered Claims) :
Gerekli olmayan fakat token ile ilgili bilgileri içeren başlıklardır. Örnek vermek gerekirse sub (subject), iss (issuer) gibi.

Açık Talepler (Public Claims) :
Token’ı kullananlar tarafından eklenebilen bilgiler.

Özel Talepler (Private Claims) :
Token ile aktarılacak veya paylaşılacak bilgileri içermektedir.

Talepler içinde kullanılacak olan bilgilerin rezerve edilmiş bilgilere denk gelmemesi gerekmektedir. Bunun için belirli talep isimlendirme standartları belirlenmiştir.

Kullanılan bilgilere ve kısaltmalara buradan ulaşabilirsiniz. -> https://www.iana.org/assignments/jwt/jwt.xhtml

İmza (Signature) :

İmza bölümünü oluşturmak için Base64Url olarak kodlanmış başlık (header), yük (payload) bilgisini ve bir gizli değer (secret) alınarak başlıkta belirtilen algoritma ile imzalamanız gerekmektedir.

Bu işlemlerden sonra oluşacak olan JWT token bilgisi aşağıdaki gibi olacaktır.

EyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.

EyJzdWIiOiJCeU9udXIiLCJuYW1lIjoiT251ciBLQVJBS1XFniIsImlhdCI6MTUxNjIzOTAyMn0.8rPL9B1HFX-5QGX7qHOIIIsmPyUkFHbigg06sE3U-Pk

https://jwt.io/#debugger-io adresinde JWT token oluşturma ve bu token bilgilerini tekrar açmak ile ilgili debugger uygulamasını kontrol edebilirsiniz.

Her yerde karşılaşılan bildik JWT Token diyagramı.

Kısaca anlatmak gerekirse JWT, bir header, bir payload ve bir signature olmak üzere üç parçadan oluşur. Header, JWT’nin tipini ve encoding formatını tanımlar. Payload, yetkilendirme bilgilerini içeren verilerdir ve bu veriler genellikle JSON formatında tutulur. Signature, header ve payload verilerinin hash değerini içerir ve JWT’nin doğruluğunu kontrol etmek için kullanılır.

JWT, sunucu tarafında veri saklama ihtiyacı olmadan kullanıcı yetkilendirmesi yapılmasına olanak tanır. Bu, uygulamalar arasında güvenli veri transferi yaparken sunucu tarafında veri saklama gereksinimini ortadan kaldırır ve aynı zamanda sunucunun performansını da arttırır.

JWT’nin avantajları arasında, verilerin kolayca okunabilir ve kodlanabilir olması, sunucu tarafında veri saklama gereksinimi olmaması, uygulamalar arasında güvenli veri akışı sağlaması gibi unsurlar bulunur.

Kimlik doğrulama (Authentication) ve yetki (Authorization) nedir?

Kimlik doğrulama ve yetkilendirme, web uygulamalarının güvenliği için iki temel kavramdır.

Kimlik doğrulama (Authentication), daha önce de belirttiğim gibi kullanıcının kimliğini doğrulama işlemidir. Bu işlem, kullanıcının kimliğini kanıtlamasını gerektirir. Örneğin, bir kullanıcının kullanıcı adı ve şifre gibi kimlik bilgileri kullanılarak doğrulanması işlemi kimlik doğrulama (authentication) olarak adlandırılır. Bu işlem sonucunda kullanıcının kimliği doğrulanır ve uygulama tarafından yetkilendirme işlemi yapılabilmesi için uygulamanın da daha sonra anlayabileceği bir token oluşturulur.

Yetkilendirme (Authorization) ise, kullanıcının yapabileceği işlemleri belirleme işlemidir. Kullanıcının uygulama tarafından kimliği doğrulandıktan sonra yapılması gereken işlemdir. Örnek olarak, kullanıcı sadece belirli bir role ait işlemlerin yapılması için yetkilendirilebilir. Yönetici (admin) rolüne sahip bir kullanıcının uygulama içerisinde bu role ait işlemleri yapabilmesi, farklı rollerde olan işlemleri gerçekleştirmek istediği zaman ise belirli bir mesaj ile uyarılması sağlanabilmektedir.

Token-based authentication’ın avantajları

JWT Authentication, birçok web uygulamasında tercih edilen bir kimlik doğrulama yöntemidir. Bu yöntem, kullanıcıların web uygulamanıza kayıt olmaları veya giriş yapmaları için gereken bir parola veya benzeri bilgileri kullanmak yerine, kullanıcının sahip olduğu bir token kullanarak kimlik doğrulama işlemini gerçekleştirir.

Genel olarak web uygulamalarında kullanılan Token-based authentication ölçeklenebilir, performanslı ve güvenli bir kimlik doğrulama yöntemidir.

- Durumsuz (Stateless) : Sunucu tarafında durum bilgisi tutulmasına gerek kalmadan token kullanıcı tarafından uygulamaya gönderilebilir ve işlenebilir. Bu sebepten dolayı hızlı ve ölçeklenebilir bir yapıya sahiptir.
- Güvenli (Trustworthy) : Token bilgileri kullanıcı ve uygulama arasında genellikle şifrelenir ve gizli tutulur. Bu sebeple güvenli bir yapıya sahiptir. Token’lar, uygulama tarafından işlenmeden önce, veri bütünlüğü ve doğruluğu sağlamak için imzalanır.
- Esnek (Flexible) : Token-based authentication platform bağımsız olarak kullanılabilmektedir. Bu da yeni gelişen teknoloji ve uygulama yapıları ile rahat çalışma olanağı sağlamaktadır.
- Performans (Performance) : Token-based authentication yapısını kullanan uygulamalar gelen her kullanıcı isteği için bir kimlik doğrulama işlemi yapmaz. Bunun yerine gönderilen token bilgisinin doğruluğu kontrol edilir. Bu da uygulamalarımızın daha performanslı ve hızlı çalışmasının sağlar.
- Ölçeklenebilir (Scalable) : Token-based authentication, sunucular arasında yük dengeleme yaparken de kullanışlıdır. Token’lar sayesinde, yük dengeleme işlemi kolaylaşır ve her sunucu aynı kimlik doğrulama ve yetkilendirme işlemini yapabilir.
- Özelleştirilebilir (Customizable) : Kullanıcılara özelleştirilmiş izinler ve yetkiler verme işlemini kolaylaştırır. Token’lar, kullanıcılara özel izinlerle birlikte verilebilir ve uygulamanın ihtiyacına göre özelleştirilebilir.
- Düşük maliyetli (Cost-Effective) : Token’lar genellikle açık kaynaklı kütüphanelerle kolayca oluşturulabilir ve yönetilebilir. Böylelikle uygulama için kimlik doğrulama ve yetkilendirme işlemlerini uygun maliyetli bir şekilde çözüme kavuşturur.

Önemli noktalar bir tanesi kimlik doğrulama işleminin tek başına bir yetkilendirme mekanizması olmamasıdır. Kullanıcıların doğrulanmasının ardından yetki yapısı içerisinde uygulamamızı kullanacak seviyelerin belirlenmesi gerekmektedir. Böylelikle uygulamamız daha güvenli bir hale gelecektir.

# .NET Core Web API uygulaması ve JWT Token

Örnek olarak hazırlayacağımız API uygulamamızın biraz yapısından bahsederek başlayalım.

API içerisinde iki farklı controller sınıfımız olacak. Bu sınıfların ilki kullanıcıların giriş işlemlerini gerçekleştirebilecekleri AuthContoller bir diğeri ise kullanıcıların kitap bilgilerine ulaşabilecekleri BookController.

BookController içerisinde iki metot hazırlayacağız ve bu metotların biri giriş işlemini yapmış kullanıcılar için diğeri ise tüm kullanıcılar için çalışacak.

Hızlı bir örnek olması açısından bir veri tabanı üzerinde kayıt tutmak yerine kullanıcı bilgilerini, dönecek olan cevap bilgilerini hard-coded olarak uygulama içerisinde (In-Memory) tutacağız. Tabii burada kullanıcı yönetimi için ASP.NET Identity veya başka bir kimlik doğrulama yapısı kullanarak da kullanıcıların kimlik doğrulama ve yetkilendirme işlemlerini yapabilirsiniz.

Öncelikle projemizi oluşturalım. JwtAuthForBooks isimli bir ASP.NET Core Web Api projesi oluşturuyoruz.

Uygulama kodumuzda hazır olarak gelen Contorllers/WeatherForecastController.cs ve WeatherForecast.cs sınıflarını silebiliriz.

İlk önce kullanıcıların girişlerini yapacağımız Model, Controller, Interface ve Service sınıflarını geliştirelim.

Models isimli bir klasör ile birlikte UserLoginRequest.cs ve UserLoginResponse.cs isimli iki sınıf oluşturuyoruz.

```cs
//UserLoginRequest.cs 

namespace JwtAuthForBooks.Models;

public class UserLoginRequest
{
    public string Username { get; set; }
    public string Password { get; set; }
}

```

```cs
//UserLoginResponse.cs

namespace JwtAuthForBooks.Models;

public class UserLoginResponse
{
    public bool AuthenticateResult { get; set; }
    public string AuthToken { get; set; }
    public DateTime AccessTokenExpireDate { get; set; }
}

```

Interfaces isminde bir klasör oluşturarak IAuthService.cs isminde bir sınıf oluşturuyoruz. Burada Controller sınıfımıza ekleyebilmek için (inject) servis ara yüzümüzü tanımlayacağız.

```cs
//IAuthService.cs

using JwtAuthForBooks.Models;

namespace JwtAuthForBooks.Interfaces;

public interface IAuthService
{
    public Task<UserLoginResponse> LoginUserAsync(UserLoginRequest request);
}

```

Services isminde bir klasör oluşturarak AuthService.cs isminde bir sınıf oluşturuyoruz. Bu sınıf ise bizim login işlemlerimizi yapacak olan servis olacaktır.

```cs
//AuthService.cs

using JwtAuthForBooks.Interfaces;
using JwtAuthForBooks.Models;

namespace JwtAuthForBooks.Services;

public class AuthService : IAuthService
{
    public Task<UserLoginResponse> LoginUserAsync(UserLoginRequest request)
    {
        UserLoginResponse response = new();

        if (string.IsNullOrEmpty(request.Username) || string.IsNullOrEmpty(request.Password))
        {
            throw new ArgumentNullException(nameof(request));
        }

        if (request.Username == "onur" && request.Password == "123456")
        {
            response.AccessTokenExpireDate = DateTime.UtcNow;
            response.AuthenticateResult = true;
            response.AuthToken = string.Empty;            
        }

        return Task.FromResult(response);
    }
}

```

Controllers klasörümüz içerisine AuthController.cs isminde bir Api Controller oluşturup aşağıdaki gibi düzenliyoruz. Bu sınıf bizim login işlemlerimizi yaptığımız controller olacaktır.

```cs
//AuthController.cs

using JwtAuthForBooks.Interfaces;
using JwtAuthForBooks.Models;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Mvc;

namespace JwtAuthForBooks.Controllers;

[Route("api/[controller]")]
[ApiController]
public class AuthController : ControllerBase
{
 readonly IAuthService authService;

 public AuthController(IAuthService authService)
 {
  this.authService = authService;
 }

    [HttpPost("LoginUser")]
    [AllowAnonymous]
    public async Task<ActionResult<UserLoginResponse>> LoginUserAsync([FromBody] UserLoginRequest request)
    {
        var result = await authService.LoginUserAsync(request);

        return result;
    }
}

```

Servisin aktif olması için Program.cs sınıfı içerisinde servisimizi kayıt ediyoruz.

```cs
//Program.cs

using JwtAuthForBooks.Interfaces;
using JwtAuthForBooks.Services;

var builder = WebApplication.CreateBuilder(args);

// Add services to the container.

builder.Services.AddControllers();
// Learn more about configuring Swagger/OpenAPI at https://aka.ms/aspnetcore/swashbuckle
builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen();

//Eklenecek olan kayıt satırı.
builder.Services.AddTransient<IAuthService, AuthService>();

var app = builder.Build();

// Configure the HTTP request pipeline.
if (app.Environment.IsDevelopment())
{
    app.UseSwagger();
    app.UseSwaggerUI();
}

app.UseAuthorization();

app.MapControllers();

app.Run();

```

Uygulamamızı çalıştırdığımız zaman controller üzerinden login işlemini yapabiliyoruz. Burada token ve tarih bilgileri boş olarak geliyor. Birazdan JWT token ile ilgili geliştirmelerimizi ve kullanacağımız BookController sınıfımızı ekleyeceğiz.

Öncelikle JWT işlemleri için kullanacağımız Nuget paketini ekleyelim. Aşağıdaki paket ismini bulabilirsiniz. .NET 6 ile projemizi oluşturduğumuz için 6.0.14 versiyonunu almamız gerekmektedir. Eğer siz .NET 7 ile projenizi oluşturduysanız 7 versiyonunu alabilirsiniz.

```
Microsoft.AspNetCore.Authentication.JwtBearer

```

Token işlemleri yapmak için kullanacağımız model, servis ara yüzü ve servis sınıfını geliştirelim. Model bilgileri Models , ara yüz bilgileri Interfaces, servis sınıfı ise Services klasörü içinde olacaktır.

```cs
//GenerateTokenRequest.cs

namespace JwtAuthForBooks.Models;

public class GenerateTokenRequest
{
    public string Username { get; set; }
}

```

```cs
//GenerateTokenResponse.cs

namespace JwtAuthForBooks.Models;

public class GenerateTokenResponse
{
    public string Token { get; set; }
    public DateTime TokenExpireDate { get; set; }
}

```

```cs
//ITokenService.cs

using JwtAuthForBooks.Models;

namespace JwtAuthForBooks.Interfaces;

public interface ITokenService
{
    public Task<GenerateTokenResponse> GenerateToken(GenerateTokenRequest request);
}

```

```cs
//TokenService.cs

using JwtAuthForBooks.Interfaces;
using JwtAuthForBooks.Models;
using Microsoft.IdentityModel.Tokens;
using System.IdentityModel.Tokens.Jwt;
using System.Security.Claims;
using System.Text;

namespace JwtAuthForBooks.Services;

public class TokenService : ITokenService
{
    readonly IConfiguration configuration;

    public TokenService(IConfiguration configuration)
    {
        this.configuration = configuration;
    }

    public Task<GenerateTokenResponse> GenerateToken(GenerateTokenRequest request)
    {
        SymmetricSecurityKey symmetricSecurityKey = new SymmetricSecurityKey(Encoding.ASCII.GetBytes(configuration["AppSettings:Secret"]));

        var dateTimeNow = DateTime.UtcNow;

        JwtSecurityToken jwt = new JwtSecurityToken(
                issuer: configuration["AppSettings:ValidIssuer"],
                audience: configuration["AppSettings:ValidAudience"],
                claims: new List<Claim> {
                    new Claim("userName", request.Username)
                },
                notBefore: dateTimeNow,
                expires: dateTimeNow.Add(TimeSpan.FromMinutes(500)),
                signingCredentials: new SigningCredentials(symmetricSecurityKey, SecurityAlgorithms.HmacSha256)
            );

        return Task.FromResult(new GenerateTokenResponse
        {
            Token = new JwtSecurityTokenHandler().WriteToken(jwt),
            TokenExpireDate = dateTimeNow.Add(TimeSpan.FromMinutes(500))
        });
    }
}

```

Oluşturduğumuz TokenService sınıfımızın AuthService içerisinde kullanılması için de aşağıdaki şekilde AuthService.cs sınıfımızı yeniden düzenlememiz gerekmektedir.

```cs
//AuthService.cs

using JwtAuthForBooks.Interfaces;
using JwtAuthForBooks.Models;

namespace JwtAuthForBooks.Services;

public class AuthService : IAuthService
{
    readonly ITokenService tokenService;

     public AuthService(ITokenService tokenService)
    {
        this.tokenService = tokenService;
    }
    
    public async Task<UserLoginResponse> LoginUserAsync(UserLoginRequest request)
    {
        UserLoginResponse response = new();

        if (string.IsNullOrEmpty(request.Username) || string.IsNullOrEmpty(request.Password))
        {
            throw new ArgumentNullException(nameof(request));
        }

        if (request.Username == "onur" && request.Password == "123456")
        {
            var generatedTokenInformation = await tokenService.GenerateToken(new GenerateTokenRequest { Username = request.Username });

            response.AuthenticateResult = true;
            response.AuthToken = generatedTokenInformation.Token;
            response.AccessTokenExpireDate = generatedTokenInformation.TokenExpireDate;           
        }

        return response;
    }
}

```

Son olarak da appsettings.json dosyasında da aşağıdaki değişiklikleri yapmamız gerekiyor.

```cs
//appsettings.json

{
  "Logging": {
    "LogLevel": {
      "Default": "Information",
      "Microsoft.AspNetCore": "Warning"
    }
  },
  "AllowedHosts": "*",

  "AppSettings": {
    "ValidAudience": "AudienceInformation",
    "ValidIssuer": "IssuerInformation",
    "Secret": "JWTAuthenticationHIGHsecuredPasswordVVVp1OH7Xzyr",
  }
}

```

Login metodumuzu yeniden çalıştırdığımız zaman JWT Token bilgisinin oluştuğunun görebileceğiz.

Burada durup biraz servisi incelememiz gerekiyor. Bu servis içerisinde bulunan GenerateToken metodunda kullanıcının girdiği kullanıcı adını da kullanarak bir JWT token oluşturuyoruz.

JwtSecurityToken sınıfı bizim için JWT token için gerekli bilgileri alarak token oluşturma işlemini gerçekleştiriyor. Peki, bu bilgilerin neler olduğunun incelemeye çalışalım.

Önemli noktalardan biri JwtSecuritToken sınıfına signingCredentials olarak geçtiğimiz Secret değeri. Bu değer sayesinde token bilgimizi imzalayabiliyoruz. Bu imzalama işlemini de appsetting.json dosyamız içinde belirlediğimiz değerden bir `SymmetricSecurityKey` oluşturarak yapıyoruz. Bu değeri bize gönderilen token üzerinden alarak kontrol edebiliriz ve bizim tarafımızdan imzalandığını anlayabiliriz.

Burada dikkat edilmesi gereken konu token bilgileri okunabilir yapılardır. Bundan dolayı özel bilgilerin token içinde olmaması gerekmektedir.

issuer bilgisi token değerinin kimin tarafından dağıtıldığını yani bizi belirten bir değerdir. Örnek olarak MyBookStore gibi bir değer belirtilebilir.

audience oluşturulacak olan token değerinin kimler tarafından kullanılacağını belirler. Bir site (www.test.com) için üretilecek olan token bilgisi olabilir.

expires Token bilgisinin ne kadar süre ile aktif olacağını belirler. Bu süre sonrasında token kullanılmaz halde olacak ve Api metotlarının kullanımları sırasında yetki hatası verilecektir.

notBefore Token bilgisi üretildikten belirli bir zaman sonra devreye girmesini istersen burada bir değer geçip bu özelliği aktif edebiliriz. Biz token bilgisinin hemen aktif olmasının istediğimiz için üretildiği zamanı başlama değer olarak belirledik.

claims Token bilgisi içinde saklamak istediğimiz bilgileri eklediğimiz bölüm olarak tanımlanabilir. Burada özel olmayacak şekilde istediğimiz bir bilgiyi token içinde tanımlayıp daha sonra bize bu token gönderildiği zaman bu değerleri alarak belirli işlemler yapabiliriz.

Şimdi de yetkilendirme testini yapacağımız BookController sınıfını geliştirelim. Ardından uygulamamız için kimlik doğrulamayı aktif edeceğiz ve testimizi yapabileceğiz.

Senaryomuzda daha önce belirttiğimiz gibi iki adet controller metodumuz olacak. bu metotlardan birisi kitap listesini dönecek ve tüm kullanıcılar için çalışabilecek. İkinci metodumuz ise sadece login işlemini başarılı bir şekilde yapmış ve token bilgisini gönderen yetkili kullanıcılar için çalışacak ve kitap bilgisini bize dönecek.

Models klasörümüze BookInformation.cs, BookTitle.cs ve GetBookInformationByIdRequest.cs isminde üç sınıf oluşturarak başlıyoruz.

```cs
//BookInformation.cs

namespace JwtAuthForBooks.Models;

public class BookInformation
{
    public int BookId { get; set; }
    public string Isbn { get; set; }
    public string Title { get; set; }
    public string Description { get; set; }
    public string AuthorName { get; set; }
}

```

```cs
//BookTitle.cs

namespace JwtAuthForBooks.Models;

public class BookTitle
{
    public int BookId { get; set; }
    public string Isbn { get; set; }
    public string Title { get; set; }
}

```


```cs
//GetBookInformationByIdRequest.cs

namespace JwtAuthForBooks.Models;

public class GetBookInformationByIdRequest
{
    public int BookId { get; set; }
}

```

Servis düzenimizi bozmayalım. Interfaces klasörümüze IBookService.cs ve Services klasörümüze BookService.cs isminde iki sınıf oluşturuyoruz ve aşağıdaki gibi düzenliyoruz.

```cs
//IBookService.cs

using JwtAuthForBooks.Models;

namespace JwtAuthForBooks.Interfaces;

public interface IBookService
{
    public Task<List<BookTitle>> GetBookTitlesAsync();
    public Task<BookInformation> GetBookInformationByIdAsync(GetBookInformationByIdRequest request);
}

```

```cs
//BookService.cs

using JwtAuthForBooks.Interfaces;
using JwtAuthForBooks.Models;

namespace JwtAuthForBooks.Services;

public class BookService : IBookService
{
    static readonly List<BookInformation> bookInformations = new List<BookInformation> {
            new BookInformation { BookId = 1, Isbn = "9752115047", Title ="22/11/63",  AuthorName = "Stephen King",  Description = "22 Kasım 1963’te, bütün bunları değiştirme şansınız olsaydı?" },
            new BookInformation { BookId = 2, Isbn = "1476762740", Title ="Uyuyan Güzeller",  AuthorName = "Stephen King *  Owen King",  Description = "Şimdi burada dünyanın kaderine karar verilecek." },
            new BookInformation { BookId = 3, Isbn = "9752126049", Title ="Enstitü",  AuthorName = "Stephen King",  Description = "Enstitü..." }
        };

    public Task<BookInformation> GetBookInformationByIdAsync(GetBookInformationByIdRequest request)
    {
        var loadedBookInformation = bookInformations.FirstOrDefault(p => p.BookId == request.BookId);

        return Task.FromResult(loadedBookInformation);
    }

    public Task<List<BookTitle>> GetBookTitlesAsync()
    {
        var booktitleList = bookInformations.Select(book => GenerateBookTitleForList(book)).ToList();

        return Task.FromResult(booktitleList);
    }

    private static BookTitle GenerateBookTitleForList(BookInformation book)
    {
        return new BookTitle { BookId = book.BookId, Title = book.Title, Isbn = book.Isbn };
    }
}

```

Şimdi de BookController.cs sınıfımızı Controllers klasörüne ekliyoruz.

```cs
using JwtAuthForBooks.Interfaces;
using JwtAuthForBooks.Models;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Mvc;

namespace JwtAuthForBooks.Controllers;

[Route("api/[controller]")]
[ApiController]
public class BookController : ControllerBase
{
    readonly IBookService bookService;

 public BookController(IBookService bookService)
 {
  this.bookService = bookService;
 }

    [HttpPost("GetBookTitles")]
    [AllowAnonymous]
    public async Task<ActionResult<List<BookTitle>>> GetBookTitles()
    {
        var result = await bookService.GetBookTitlesAsync();

        return result;
    }

    [HttpPost("GetBookInformationById")]
    [Authorize]
    public async Task<ActionResult<BookInformation>> GetBookInformationById([FromBody] GetBookInformationByIdRequest request)
    {
        var result = await bookService.GetBookInformationByIdAsync(request);

        return result;
    }
}

```

Burada dikkat edilmesi gereken konu tüm kullanıcıların yetki almadan kullanacakları metodumuza [AllowAnonymous], yetkili olarak kullanılacak metodumuza ise [Authorize] özelliklerini tanımlıyoruz. İsimlerinden de anlaşılacağı gibi anonim ve yetkili çalışacak metotlarımızı bu şekilde belirtmiş olduk.

Şimdi de Program.cs sınıfımıza servisimizi kayıt edelim.

```cs
//Program.cs

using JwtAuthForBooks.Interfaces;
using JwtAuthForBooks.Services;

var builder = WebApplication.CreateBuilder(args);

// Add services to the container.

builder.Services.AddControllers();
// Learn more about configuring Swagger/OpenAPI at https://aka.ms/aspnetcore/swashbuckle
builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen();

builder.Services.AddTransient<IAuthService, AuthService>();
builder.Services.AddTransient<ITokenService, TokenService>();

//Eklenecek olan kayıt satırı.
builder.Services.AddTransient<IBookService, BookService>(); 

var app = builder.Build();

// Configure the HTTP request pipeline.
if (app.Environment.IsDevelopment())
{
    app.UseSwagger();
    app.UseSwaggerUI();
}

app.UseAuthorization();

app.MapControllers();

app.Run();

```

Tüm geliştirmeleri yaptığımıza göre şimdi de uygulamamız için yetkilendirme yapısının aktif edelim. Bunun için yine Program.cs sınıfımız içinde tanımlamalarımızı yapalım.

```cs
//Program.cs

using JwtAuthForBooks.Interfaces;
using JwtAuthForBooks.Services;
using Microsoft.AspNetCore.Authentication.JwtBearer;
using Microsoft.IdentityModel.Tokens;
using System.Text;

var builder = WebApplication.CreateBuilder(args);

// Add services to the container.

builder.Services.AddControllers();
// Learn more about configuring Swagger/OpenAPI at https://aka.ms/aspnetcore/swashbuckle
builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen();

builder.Services.AddTransient<IAuthService, AuthService>();
builder.Services.AddTransient<ITokenService, TokenService>();
builder.Services.AddTransient<IBookService, BookService>();

//Eklenecek olan satırlar
builder.Services.AddAuthentication(options =>
{
    options.DefaultAuthenticateScheme = JwtBearerDefaults.AuthenticationScheme;
    options.DefaultChallengeScheme = JwtBearerDefaults.AuthenticationScheme;
    options.DefaultScheme = JwtBearerDefaults.AuthenticationScheme;
}).AddJwtBearer(o =>
{
    o.TokenValidationParameters = new TokenValidationParameters
    {
        ValidIssuer = builder.Configuration["AppSettings:ValidIssuer"],
        ValidAudience = builder.Configuration["AppSettings:ValidAudience"],
        IssuerSigningKey = new SymmetricSecurityKey(Encoding.UTF8.GetBytes(builder.Configuration["AppSettings:Secret"])),
        ValidateIssuer = true,
        ValidateAudience = true,
        ValidateLifetime = false,
        ValidateIssuerSigningKey = true
    };
});

builder.Services.AddAuthorization();

//Eklenecek olan satırların sonu

var app = builder.Build();

// Configure the HTTP request pipeline.
if (app.Environment.IsDevelopment())
{
    app.UseSwagger();
    app.UseSwaggerUI();
}

//Eklenecek olan satırlar

app.UseAuthentication();
app.UseAuthorization();

//Eklenecek olan satırların sonu

app.MapControllers();

app.Run();

```

Projemizin son durumu aşağıdaki gibi olacaktır.

`AddAuthentication()` tanımı ile JWT token yapısının çalışmasını tanımladık. `AddAuthorization()` ile yetkilendirmenin olacağınız belirttik. `UseAuthentication() ve UseAuthorization()` ile de bu tanımları aktif ettik.

Metotlarımızı test edebiliriz. Test sırasında `[AllowAnonymous]` olarak tanımlı metodumuz sorunsuz bir şekilde çalışacaktır.

Login işlemini başarılı bir şekilde geçmemiş ve token bilgisini almamış kullanıcılar GetBookInformationById metodunu çalıştırdıkları zaman 401 Unauthorized hatası alacaklardır.

Login metodu üzerinden kullanıcı adı ve şifre ile login olup token bilgisini alalım. Ardından GetBookInformationById metoduna bu token bilgisini göndererek işlemi tekrar deneyeceğiz.

Başarılı bir şekilde giriş işlemini yaptık ve token bilgisini aldık.

Şimdi bu token bilgisini GetBookInformationById metoduna göndererek işlemi yenidne deneyeceğiz. Yalnız, burada token gönderirken header bilgileri içerisinde Authorization key değeri ile bunu ileteceğiz. `Bearer <token_bilgisi>` şeklinde.

Ardından metodumuzu yeniden çalıştırdığımızda yetkimizi almış bir şekilde metot cevabının geldiğini görebiliriz.

Oluşturduğumuz uygulama kodlarına aşağıdaki bağlantıdan ulaşabilirsiniz.

GitHub - onurkarakus/JwtAuthForBooks: JWT Token Implementation for .NET 6 Web API (https://github.com/onurkarakus/JwtAuthForBooks)


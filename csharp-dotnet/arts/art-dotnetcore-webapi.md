dot net core web api (dotnet8) hakkında bilgi verir misin ? proje yapısı, klasör yapısı, config dosyaları, application life cycle gibi

.NET 8 Core Web API hakkında kapsamlı bilgi vereceğim:

## ASP.NET Core Web API (.NET 8) - Kapsamlı Rehber

### 1. Proje Yapısı ve Klasör Organizasyonu

```
MyWebAPI/
├── Properties/
│   └── launchSettings.json          # Çalışma profilleri
├── Controllers/                      # API endpoints
│   └── ProductController.cs
├── Models/                           # Veri modelleri
│   └── Product.cs
├── Services/                         # İş mantığı
│   └── ProductService.cs
├── Data/                            # Veritabanı bağlamı
│   └── ApplicationDbContext.cs
├── Middlewares/                     # Özel middleware'ler
├── Filters/                         # Action/Exception filters
├── Dtos/                            # Data Transfer Objects
├── Repositories/                    # Repository pattern
├── appsettings.json                 # Konfigürasyon
├── appsettings.Development.json     # Geliştirme config
├── appsettings.Production.json      # Prodüksyon config
├── Program.cs                       # Giriş noktası & DI yapılandırması
└── MyWebAPI.csproj                  # Proje dosyası
```

### **2. Önemli Konfigürasyon Dosyaları**

#### **Program.cs** (Giriş Noktası)

```csharp
var builder = WebApplication.CreateBuilder(args);

// Servisleri DI container'a ekle
builder.Services.AddControllers();
builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen();
builder.Services.AddDbContext<ApplicationDbContext>(options =>
    options.UseSqlServer(builder.Configuration.GetConnectionString("DefaultConnection")));
builder.Services.AddScoped<IProductService, ProductService>();

var app = builder.Build();

// Middleware pipeline
if (app.Environment.IsDevelopment())
{
    app.UseSwagger();
    app.UseSwaggerUI();
}

app.UseHttpsRedirection();
app.UseAuthorization();
app.MapControllers();
app.Run();
```

#### **appsettings.json**
```json
{
  "Logging": {
    "LogLevel": {
      "Default": "Information",
      "Microsoft.AspNetCore": "Warning"
    }
  },
  "AllowedHosts": "*",
  "ConnectionStrings": {
    "DefaultConnection": "Server=localhost;Database=MyDb;User Id=sa;Password=..."
  },
  "JwtSettings": {
    "SecretKey": "your-secret-key-min-256-bits",
    "Issuer": "your-app",
    "Audience": "your-audience",
    "ExpiryMinutes": 60
  }
}
```

### **3. Application Lifecycle (Uygulama Yaşam Döngüsü)**

```
1. HOST INITIALIZATION (Ana Bilgisayar Başlatması)
   └─> WebApplication.CreateBuilder(args)
       └─> Logging, config, DI container oluştur

2. SERVICE REGISTRATION (Servis Kaydı)
   └─> builder.Services.AddXxx()
       └─> DbContext, Controllers, Custom Services, Authentication...

3. MIDDLEWARE CONFIGURATION (Middleware Yapılandırması)
   └─> builder.Build()
       └─> UseSwagger(), UseAuthorization(), UseHttpsRedirection()...

4. REQUEST PIPELINE (İstek Pipeline'ı)
   ├─> Request giriş → Middleware zinciri
   ├─> Endpoint matching
   ├─> Routing
   ├─> Authorization
   ├─> Controller Action
   └─> Response döndürme

5. APPLICATION RUNNING
   └─> app.Run()
       └─> Port dinleme ve istekleri işleme
```

### 4. Controller Yapısı Örneği

```csharp
[ApiController]
[Route("api/[controller]")]
public class ProductsController : ControllerBase
{
    private readonly IProductService _service;
    
    public ProductsController(IProductService service)
    {
        _service = service;
    }
    
    [HttpGet("{id}")]
    [ProduceResponseType(StatusCodes.Status200OK)]
    [ProduceResponseType(StatusCodes.Status404NotFound)]
    public async Task<ActionResult<ProductDto>> GetProduct(int id)
    {
        var product = await _service.GetProductAsync(id);
        if (product == null)
            return NotFound();
        return Ok(product);
    }
    
    [HttpPost]
    [Authorize]
    public async Task<ActionResult<ProductDto>> CreateProduct(CreateProductDto dto)
    {
        var product = await _service.CreateProductAsync(dto);
        return CreatedAtAction(nameof(GetProduct), new { id = product.Id }, product);
    }
}
```

### **5. Dependency Injection Yapılandırması**

```csharp
// Singleton: Uygulama ömrü boyunca tek örnek
builder.Services.AddSingleton<ILogger, Logger>();

// Scoped: Her HTTP isteği için yeni örnek
builder.Services.AddScoped<IProductService, ProductService>();
builder.Services.AddScoped<IRepository<Product>, Repository<Product>>();

// Transient: Her seferinde yeni örnek
builder.Services.AddTransient<ITempData, TempData>();
```

### **6. Middleware Pipeline Sırası (Önemli)**

```csharp
// GELEN İSTEK
// ↓
app.UseExceptionHandling();           // 1. Hata yönetimi
app.UseHttpsRedirection();            // 2. HTTPS yönlendirmesi
app.UseStaticFiles();                 // 3. Static dosyalar
app.UseRouting();                     // 4. Routing
app.UseAuthentication();              // 5. Kimlik doğrulama
app.UseAuthorization();               // 6. Yetkilendirme
app.MapControllers();                 // 7. Endpoint mapping
app.Run(async context => {...});      // 8. Terminal middleware
// ↑
// GIDEN YANIT
```

### **7. .csproj Dosyası**

```xml
<Project Sdk="Microsoft.NET.Sdk.Web">
  <PropertyGroup>
    <TargetFramework>net8.0</TargetFramework>
    <Nullable>enable</Nullable>
  </PropertyGroup>
  
  <ItemGroup>
    <PackageReference Include="Microsoft.EntityFrameworkCore" Version="8.0.0" />
    <PackageReference Include="Microsoft.EntityFrameworkCore.SqlServer" Version="8.0.0" />
    <PackageReference Include="Swashbuckle.AspNetCore" Version="6.4.0" />
  </ItemGroup>
</Project>
```

### **8. DbContext Yapılandırması (Entity Framework)**

```csharp
public class ApplicationDbContext : DbContext
{
    public ApplicationDbContext(DbContextOptions<ApplicationDbContext> options)
        : base(options) { }
    
    public DbSet<Product> Products { get; set; }
    public DbSet<Category> Categories { get; set; }
    
    protected override void OnModelCreating(ModelBuilder modelBuilder)
    {
        base.OnModelCreating(modelBuilder);
        
        modelBuilder.Entity<Product>()
            .HasOne(p => p.Category)
            .WithMany(c => c.Products)
            .HasForeignKey(p => p.CategoryId);
    }
}
```

### **9. Custom Middleware Örneği**

```csharp
public class LoggingMiddleware
{
    private readonly RequestDelegate _next;
    private readonly ILogger<LoggingMiddleware> _logger;
    
    public LoggingMiddleware(RequestDelegate next, ILogger<LoggingMiddleware> logger)
    {
        _next = next;
        _logger = logger;
    }
    
    public async Task InvokeAsync(HttpContext context)
    {
        _logger.LogInformation($"Request: {context.Request.Method} {context.Request.Path}");
        await _next(context);
        _logger.LogInformation($"Response: {context.Response.StatusCode}");
    }
}

// Program.cs içinde
app.UseMiddleware<LoggingMiddleware>();
```

### **10. CORS Yapılandırması**

```csharp
builder.Services.AddCors(options =>
{
    options.AddPolicy("AllowAll", builder =>
    {
        builder.AllowAnyOrigin()
               .AllowAnyMethod()
               .AllowAnyHeader();
    });
});

// ...
app.UseCors("AllowAll");
```

Bu yapı, modern .NET 8 Web API projelerinin standart uygulamasıdır. Çalışma alanında bu konuyla ilgili daha detaylı notlar oluşturmak isterseniz, belirtebilirsiniz.

### **11. Komut Satırından Proje Oluşturma (CLI)**

.NET SDK yüklü ise bir Web API projesini komut satırından hızlıca oluşturabilirsiniz. Aşağıdaki adımlar temel bir proje oluşturma, paket ekleme ve çalıştırma akışını gösterir.

- Yeni Web API projesi oluşturma:

```bash
dotnet new webapi -n MyWebApi --framework net8.0
cd MyWebApi
```

- Çözüm dosyası oluşturup projeyi ekleme (isteğe bağlı):

```bash
dotnet new sln -n MySolution
dotnet sln MySolution.sln add MyWebApi/MyWebApi.csproj
```

- Gerekli NuGet paketlerini ekleme (JWT, EF Core, Swagger örneği):

```bash
dotnet add package Microsoft.AspNetCore.Authentication.JwtBearer
dotnet add package System.IdentityModel.Tokens.Jwt
dotnet add package Microsoft.EntityFrameworkCore.SqlServer
dotnet add package Swashbuckle.AspNetCore
```

- Restore, build ve çalıştırma:

```bash
dotnet restore
dotnet build
dotnet run
# veya development sırasında otomatik yeniden başlatma için
dotnet watch run
```

- EF Core araçlarıyla migration ekleme (önce global tool olarak yükleyin):

```bash
dotnet tool install --global dotnet-ef
dotnet ef migrations add InitialCreate
dotnet ef database update
```

- Windows ortamında geliştirme ortamı değişkeni ayarlama:

```powershell
setx DOTNET_ENVIRONMENT "Development"
```

- Hızlı testler için curl örnekleri (yerel çalıştırma sonrası):

```bash
# Health/Swagger görmek için
curl https://localhost:5001/swagger/index.html

# Login (örnek auth endpoint varsa)
curl -X POST https://localhost:5001/api/auth/login -H "Content-Type: application/json" -d '{"username":"admin","password":"password123"}'
```

Notlar:
- Oluşturulan proje zaten bir örnek controller ve WeatherForecast şablonunu içerir; yeni controller dosyalarını `Controllers/` klasörüne ekleyin.
- Production için `JwtSettings` gibi hassas bilgileri `appsettings.Production.json` yerine environment variable veya secrets manager (Azure Key Vault vb.) ile yönetin.

### **12. Aynı Diskteki Library Projesini Referans Olarak Ekleme**

Bir çözüm veya proje dizininde yer alan başka bir library projesini referans olarak eklemek için CLI ve Visual Studio yolları vardır. En yaygın ve güvenli yol `ProjectReference` kullanmaktır.

- CLI ile proje referansı ekleme (örnek yapıda MyLib bir üst klasörde ise):

```bash
# Proje klasöründeyken
dotnet add reference ..\MyLib\MyLib.csproj

# veya çözüm kökünden (projeye göre)
dotnet sln MySolution.sln add MyLib/MyLib.csproj
dotnet add MyWebApi/MyWebApi.csproj reference MyLib/MyLib.csproj
```

- `csproj` içinde otomatik eklenen `ProjectReference` örneği:

```xml
<ItemGroup>
    <ProjectReference Include="..\MyLib\MyLib.csproj" />
</ItemGroup>
```

- Visual Studio: `Solution` üzerinde sağ tık → `Add` → `Existing Project...` ile library ekleyin, ardından Web API projesine sağ tık → `Add` → `Project Reference...` ile işaretleyin.

- Ekledikten sonra restore ve build çalıştırın:

```bash
dotnet restore
dotnet build
```

Not: `ProjectReference` kullanıldığında derleme sırası ve hata ayıklama düzgün çalışır; ayrıca kaynak kod aynı solution içinde olduğu için hızlı geliştirme sağlar.

### **13. .NET Framework (eski) Library ile Farklar ve Çözüm Önerileri**

.NET 8 (ve .NET Core/.NET 5+) projeleri, doğrudan .NET Framework (ör. `net48`) hedefleyen kütüphaneleri her zaman desteklemez. Aşağıdaki seçenekleri değerlendirin:

1) Kütüphaneyi `netstandard2.0` veya doğrudan modern `net8.0`/`net6.0` olarak yeniden hedefleyin. `netstandard2.0` genellikle hem .NET Framework hem .NET Core/.NET (modern) tarafından kullanılabilir.

2) Library üzerinde multi-targeting uygulayın:

```xml
<PropertyGroup>
    <TargetFrameworks>net48;netstandard2.0;net8.0</TargetFrameworks>
</PropertyGroup>
```

3) NuGet paketi oluşturup hedef platform uyumlu sürümü paketleyin ve `dotnet add package` ile ekleyin.

4) (Son çare) Derlenmiş `.dll` dosyasını doğrudan `Reference` ile ekleyebilirsiniz, fakat uyumluluk sorunları ve runtime hatalarıyla karşılaşabilirsiniz. Örnek csproj snippet:

```xml
<ItemGroup>
    <Reference Include="MyLib">
        <HintPath>..\libs\MyLib.dll</HintPath>
    </Reference>
</ItemGroup>
```

Özet: en sağlam çözüm kütüphaneyi `netstandard` veya modern `net` hedeflerine taşıyarak `ProjectReference` kullanmaktır. Eğer kütüphane üçüncü taraf ve değiştiremiyorsanız, uygun bir NuGet paketi arayın veya uyumlu bir shim/proxy katmanı oluşturun.


---

User: temel dot net 8 web api projesine jwt güvenliği nasıl eklenir ? (istediğimiz action'a (metoda) attribute yoluyla eklemek daha iyi olur)

GitHub Copilot: .NET 8 Web API projesine JWT güvenliği ekleme adımlarını detaylı anlatayım.

## **JWT Güvenliği Ekleme - Adım Adım**

### **1. Gerekli NuGet Paketlerini Yükle**

```bash
dotnet add package Microsoft.AspNetCore.Authentication.JwtBearer
dotnet add package System.IdentityModel.Tokens.Jwt
```

### **2. appsettings.json'a JWT Konfigürasyonu Ekle**

```json
{
  "JwtSettings": {
    "SecretKey": "your-super-secret-key-must-be-at-least-256-bits-long-for-HS256",
    "Issuer": "YourAppName",
    "Audience": "YourAppUsers",
    "ExpiryMinutes": 60
  },
  "ConnectionStrings": {
    "DefaultConnection": "Server=localhost;Database=MyDb;User Id=sa;Password=..."
  },
  "Logging": {
    "LogLevel": {
      "Default": "Information"
    }
  }
}
```

### **3. JWT Service Oluştur**

Services/JwtTokenService.cs şu şekilde oluştur:

```csharp
using System.IdentityModel.Tokens.Jwt;
using System.Security.Claims;
using System.Text;
using Microsoft.IdentityModel.Tokens;

namespace YourApi.Services;

public interface IJwtTokenService
{
    string GenerateToken(string userId, string username, string[] roles);
    ClaimsPrincipal? ValidateToken(string token);
}

public class JwtTokenService : IJwtTokenService
{
    private readonly IConfiguration _configuration;
    private readonly ILogger<JwtTokenService> _logger;

    public JwtTokenService(IConfiguration configuration, ILogger<JwtTokenService> logger)
    {
        _configuration = configuration;
        _logger = logger;
    }

    public string GenerateToken(string userId, string username, string[] roles)
    {
        var jwtSettings = _configuration.GetSection("JwtSettings");
        var secretKey = new SymmetricSecurityKey(
            Encoding.UTF8.GetBytes(jwtSettings["SecretKey"]!));
        var signingCredentials = new SigningCredentials(secretKey, SecurityAlgorithms.HmacSha256);

        var claims = new List<Claim>
        {
            new Claim(ClaimTypes.NameIdentifier, userId),
            new Claim(ClaimTypes.Name, username),
            new Claim("urn:custom:userid", userId)
        };

        // Roller ekle
        foreach (var role in roles)
        {
            claims.Add(new Claim(ClaimTypes.Role, role));
        }

        var token = new JwtSecurityToken(
            issuer: jwtSettings["Issuer"],
            audience: jwtSettings["Audience"],
            claims: claims,
            expires: DateTime.UtcNow.AddMinutes(
                int.Parse(jwtSettings["ExpiryMinutes"]!)),
            signingCredentials: signingCredentials);

        var tokenHandler = new JwtSecurityTokenHandler();
        var encryptedToken = tokenHandler.WriteToken(token);

        _logger.LogInformation($"Token generated for user: {username}");
        return encryptedToken;
    }

    public ClaimsPrincipal? ValidateToken(string token)
    {
        try
        {
            var jwtSettings = _configuration.GetSection("JwtSettings");
            var key = Encoding.UTF8.GetBytes(jwtSettings["SecretKey"]!);

            var tokenHandler = new JwtSecurityTokenHandler();
            var principal = tokenHandler.ValidateToken(token, new TokenValidationParameters
            {
                ValidateIssuerSigningKey = true,
                IssuerSigningKey = new SymmetricSecurityKey(key),
                ValidateIssuer = true,
                ValidIssuer = jwtSettings["Issuer"],
                ValidateAudience = true,
                ValidAudience = jwtSettings["Audience"],
                ValidateLifetime = true,
                ClockSkew = TimeSpan.Zero
            }, out SecurityToken validatedToken);

            return principal;
        }
        catch (Exception ex)
        {
            _logger.LogError($"Token validation failed: {ex.Message}");
            return null;
        }
    }
}
```

### **4. Authentication Konfigürasyonunu Program.cs'e Ekle**

```csharp
using Microsoft.AspNetCore.Authentication.JwtBearer;
using Microsoft.IdentityModel.Tokens;
using System.Text;
using YourApi.Services;

var builder = WebApplication.CreateBuilder(args);

// Servisleri ekle
builder.Services.AddControllers();
builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen();

// JWT Service
builder.Services.AddScoped<IJwtTokenService, JwtTokenService>();

// Authentication konfigürasyonu
var jwtSettings = builder.Configuration.GetSection("JwtSettings");
var secretKey = Encoding.UTF8.GetBytes(jwtSettings["SecretKey"]!);

builder.Services
    .AddAuthentication(options =>
    {
        options.DefaultAuthenticateScheme = JwtBearerDefaults.AuthenticationScheme;
        options.DefaultChallengeScheme = JwtBearerDefaults.AuthenticationScheme;
    })
    .AddJwtBearer(options =>
    {
        options.TokenValidationParameters = new TokenValidationParameters
        {
            ValidateIssuerSigningKey = true,
            IssuerSigningKey = new SymmetricSecurityKey(secretKey),
            ValidateIssuer = true,
            ValidIssuer = jwtSettings["Issuer"],
            ValidateAudience = true,
            ValidAudience = jwtSettings["Audience"],
            ValidateLifetime = true,
            ClockSkew = TimeSpan.Zero
        };

        options.Events = new JwtBearerEvents
        {
            OnAuthenticationFailed = context =>
            {
                context.Response.StatusCode = StatusCodes.Status401Unauthorized;
                return context.Response.WriteAsJsonAsync(new { message = "Authentication failed" });
            },
            OnChallenge = context =>
            {
                context.HandleResponse();
                context.Response.StatusCode = StatusCodes.Status401Unauthorized;
                return context.Response.WriteAsJsonAsync(new { message = "Token is required" });
            }
        };
    });

// Authorization
builder.Services.AddAuthorization();

var app = builder.Build();

// Middleware sırası ÖNEMLİ!
if (app.Environment.IsDevelopment())
{
    app.UseSwagger();
    app.UseSwaggerUI();
}

app.UseHttpsRedirection();

// Authentication middleware'i UseAuthorization'dan ÖNCE ekle!
app.UseAuthentication();
app.UseAuthorization();

app.MapControllers();
app.Run();
```

### **5. Login Controller Oluştur**

Controllers/AuthController.cs:

```csharp
using Microsoft.AspNetCore.Mvc;
using YourApi.Services;
using YourApi.Dtos;

namespace YourApi.Controllers;

[ApiController]
[Route("api/[controller]")]
public class AuthController : ControllerBase
{
    private readonly IJwtTokenService _jwtTokenService;
    private readonly ILogger<AuthController> _logger;

    public AuthController(IJwtTokenService jwtTokenService, ILogger<AuthController> logger)
    {
        _jwtTokenService = jwtTokenService;
        _logger = logger;
    }

    [HttpPost("login")]
    public ActionResult<LoginResponseDto> Login([FromBody] LoginRequestDto request)
    {
        // Basit örnek - gerçek uygulamada DB'den kontrol et
        if (request.Username == "admin" && request.Password == "password123")
        {
            var token = _jwtTokenService.GenerateToken(
                userId: "1",
                username: request.Username,
                roles: new[] { "Admin" });

            _logger.LogInformation($"User {request.Username} logged in successfully");

            return Ok(new LoginResponseDto
            {
                Token = token,
                ExpiresIn = 3600,
                TokenType = "Bearer"
            });
        }

        _logger.LogWarning($"Failed login attempt for user: {request.Username}");
        return Unauthorized(new { message = "Invalid credentials" });
    }

    [HttpPost("refresh")]
    public ActionResult<LoginResponseDto> RefreshToken([FromBody] RefreshTokenRequestDto request)
    {
        // Token validate et
        var principal = _jwtTokenService.ValidateToken(request.RefreshToken);
        
        if (principal == null)
            return Unauthorized(new { message = "Invalid token" });

        var userId = principal.FindFirst(System.Security.Claims.ClaimTypes.NameIdentifier)?.Value;
        var username = principal.FindFirst(System.Security.Claims.ClaimTypes.Name)?.Value;
        var roles = principal.FindAll(System.Security.Claims.ClaimTypes.Role)
            .Select(c => c.Value).ToArray();

        var newToken = _jwtTokenService.GenerateToken(userId!, username!, roles);

        return Ok(new LoginResponseDto
        {
            Token = newToken,
            ExpiresIn = 3600,
            TokenType = "Bearer"
        });
    }
}
```

### **6. DTO'ları Oluştur**

Dtos/LoginRequestDto.cs:

```csharp
namespace YourApi.Dtos;

public class LoginRequestDto
{
    public string Username { get; set; } = string.Empty;
    public string Password { get; set; } = string.Empty;
}

public class LoginResponseDto
{
    public string Token { get; set; } = string.Empty;
    public int ExpiresIn { get; set; }
    public string TokenType { get; set; } = "Bearer";
}

public class RefreshTokenRequestDto
{
    public string RefreshToken { get; set; } = string.Empty;
}
```

### **7. Korunan Controller Oluştur**

Controllers/ProductsController.cs:

```csharp
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Mvc;
using YourApi.Dtos;

namespace YourApi.Controllers;

[ApiController]
[Route("api/[controller]")]
public class ProductsController : ControllerBase
{
    [HttpGet]
    public ActionResult<List<string>> GetProducts()
    {
        return Ok(new List<string> { "Product 1", "Product 2" });
    }

    // Yalnızca authenticate olmuş kullanıcılar erişebilir
    [HttpGet("{id}")]
    [Authorize]
    public ActionResult<string> GetProductById(int id)
    {
        return Ok($"Product {id}");
    }

    // Yalnızca Admin rolü erişebilir
    [HttpPost]
    [Authorize(Roles = "Admin")]
    public ActionResult<string> CreateProduct([FromBody] CreateProductDto dto)
    {
        return CreatedAtAction(nameof(GetProductById), new { id = 1 }, 
            $"Product created: {dto.Name}");
    }

    // Birden fazla rol
    [HttpPut("{id}")]
    [Authorize(Roles = "Admin,Manager")]
    public ActionResult<string> UpdateProduct(int id, [FromBody] UpdateProductDto dto)
    {
        return Ok($"Product {id} updated: {dto.Name}");
    }

    // Özel policy
    [HttpDelete("{id}")]
    [Authorize(Policy = "AdminOnly")]
    public ActionResult DeleteProduct(int id)
    {
        return NoContent();
    }
}

public class CreateProductDto
{
    public string Name { get; set; } = string.Empty;
    public decimal Price { get; set; }
}

public class UpdateProductDto
{
    public string Name { get; set; } = string.Empty;
    public decimal Price { get; set; }
}
```

### **8. Custom Authorization Policy (Opsiyonel)**

Program.cs'e ekle:

```csharp
builder.Services.AddAuthorization(options =>
{
    options.AddPolicy("AdminOnly", policy =>
        policy.RequireRole("Admin"));
    
    options.AddPolicy("PremiumUser", policy =>
        policy.RequireClaim("subscription", "premium"));
});
```

### **9. Test Etme - Postman/cURL Örneği**

```bash
# 1. Login - Token al
curl -X POST https://localhost:7001/api/auth/login \
  -H "Content-Type: application/json" \
  -d '{"username":"admin","password":"password123"}'

# Response:
{
  "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...",
  "expiresIn": 3600,
  "tokenType": "Bearer"
}

# 2. Korunan endpoint'e erişim
curl -X GET https://localhost:7001/api/products/1 \
  -H "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9..."

# 3. Admin action
curl -X POST https://localhost:7001/api/products \
  -H "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9..." \
  -H "Content-Type: application/json" \
  -d '{"name":"New Product","price":99.99}'
```

### **Önemli Noktalar:**

1. **`[Authorize]`** - Tüm authenticate edilmiş kullanıcılar
2. **`[Authorize(Roles = "Admin")]`** - Spesifik rol
3. **`[AllowAnonymous]`** - Authenticate olmadan erişim (login endpoint'i için)
4. **Middleware sırası** - `UseAuthentication()` mutlaka `UseAuthorization()`'dan önce
5. **Secret Key** - Production'da environment variable kullan, hard-coded etme

Bu yapı production-ready bir JWT implementasyonudur.
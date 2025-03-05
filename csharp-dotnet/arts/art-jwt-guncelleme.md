
Source : chatgpt

[Back](../readme.md)

---


# JWT Token Güncelleme Nasıl Uygulanır?

JWT (JSON Web Token) güncelleme işlemi, genellikle bir "Refresh Token" mekanizması kullanılarak yapılır. Refresh Token, uzun ömürlü bir tokendir, Access Token süresi dolduğunda onun yerine yeni bir Access Token oluşturmak için kullanılır.

---

## Adımlar

1. **Access Token ve Refresh Token Oluşturma**  
   Kullanıcı giriş yaptığında hem bir **Access Token** hem de bir **Refresh Token** oluşturulmalıdır.  
   - **Access Token**: Kısa ömürlüdür ve API erişiminde kullanılır. (Örneğin: 1 saat)
   - **Refresh Token**: Sadece **Access Token**'ı yenilemek için kullanılır ve daha uzun ömürlüdür. (Örneğin: 7 gün)

2. **Refresh Token Endpoint Eklemek**  
   Kullanıcıların mevcut Refresh Token'ı göndererek yeni Access Token talep edebileceği bir endpoint oluşturun.

3. **Refresh Token ile Access Token Yenileme**  
   Bu endpoint'e gelen Refresh Token kontrol edilir ve geçerliyse yeni bir Access Token oluşturulur.

---

## Örnek Kod

### 1. Kullanıcı Girişindeki Token Üretimi

```csharp
public class TokenService
{
    public string GenerateAccessToken(string userId, string secretKey, TimeSpan expiry)
    {
        // Access Token oluşturma
        var tokenHandler = new JwtSecurityTokenHandler();
        var key = Encoding.ASCII.GetBytes(secretKey);
        var tokenDescriptor = new SecurityTokenDescriptor
        {
            Subject = new ClaimsIdentity(new Claim[]
            {
                new Claim(ClaimTypes.NameIdentifier, userId)
            }),
            Expires = DateTime.UtcNow.Add(expiry), // Kısa süreli (ör. 1 saat)
            SigningCredentials = new SigningCredentials(new SymmetricSecurityKey(key), SecurityAlgorithms.HmacSha256Signature)
        };
        var token = tokenHandler.CreateToken(tokenDescriptor);
        return tokenHandler.WriteToken(token);
    }

    public string GenerateRefreshToken()
    {
        // Daha uzun süre geçerli olan bir Refresh Token oluştur
        return Guid.NewGuid().ToString().Replace("-", "");
    }
}
```

---

### 2. Refresh Token ile Yeni Access Token Oluşturma

```csharp
[HttpPost]
[Route("api/token/refresh")]
public IHttpActionResult RefreshToken(TokenRequest request)
{
    // Refresh Token kontrolü
    var existingRefreshToken = GetRefreshTokenFromDb(request.RefreshToken); // DB'den token kontrolü
    if (existingRefreshToken == null || existingRefreshToken.IsExpired)
    {
        return Unauthorized(); // Geçersiz veya süresi dolmuş token
    }

    // Yeni Access Token oluştur
    var tokenService = new TokenService();
    var accessToken = tokenService.GenerateAccessToken(userId: existingRefreshToken.UserId, 
                                                      secretKey: "YourSecretKeyHere",
                                                      expiry: TimeSpan.FromMinutes(60));

    return Ok(new
    {
        AccessToken = accessToken
    });
}

public class TokenRequest
{
    public string AccessToken { get; set; }
    public string RefreshToken { get; set; }
}
```

---

### 3. Refresh Token Veritabanında Yönetmek

**Refresh Token'ları DB'de kaydedin.**

Veritabanında `RefreshToken` tablosu ya da benzeri bir yapı kullanabilirsiniz:

```csharp
public class RefreshToken
{
    public string Token { get; set; }
    public string UserId { get; set; }
    public DateTime Expiration { get; set; }
    public bool IsExpired => DateTime.UtcNow >= Expiration;
}

// Yeni Refresh Token'ı DB'ye ekleyin
void SaveRefreshTokenToDb(string userId, string refreshToken)
{
    var dbToken = new RefreshToken
    {
        Token = refreshToken,
        UserId = userId,
        Expiration = DateTime.UtcNow.AddDays(7) // Örnek: 7 gün geçerli
    };
    SaveToDatabase(dbToken);
}
```

---

## Güvenlik Notları ve En İyi Uygulamalar

1. **Token Sürelerini Kısıtlayın:**
   - Access Token süresi kısa olmalı (ör. 1 saat).
   - Refresh Token ise daha uzun ömürlü olabilir (ör. 7 gün).

2. **Refresh Token'ların İptali (Revocation):**
   - Kullanıcı tekrar giriş yaptığında eski Refresh Token'ları iptal edin.

3. **HttpOnly Cookies Kullanın:**
   - Güvenlik önlemi olarak token'ları çerezlerde saklayabilirsiniz (XSS saldırılarına karşı).

4. **OAuth Standardını Takip Edin:**
   - Token yönetimi işlemlerini OAuth2 dokümanlarındaki standartlara uygun yapmaya çalışın.

---

## Sonuç

Bu adımları takip ederek, **JWT Token yenileme (update)** mekanizmasını uygulayabilirsiniz. Token yenileme işlemini güvenli ve etkili bir şekilde kullanarak kullanıcı deneyimini iyileştirebilirsiniz. 😊
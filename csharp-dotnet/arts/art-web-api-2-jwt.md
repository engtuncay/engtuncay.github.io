
Source : https://www.c-sharpcorner.com/article/asp-net-web-api-2-creating-and-validating-jwt-json-web-token/

[Back](../readme.md)

---


ASP.NET Web API 2 - Creating And Validating JWT (JSON Web Token)
Bilal Shahzad, Jul 02, 2020

Why do we need a Token in Restful services?
 
Restful services or Web APIs are stateless by default. Every request is a new request to the server. This makes Web APIs easily scalable. But what if we want to provide some authorization on our Web APIs? We can issue a token to the requester and then the requester can present that token in future requests to authorize itself.
 
Now we have two options,

- Create a random but unique token and keep track of that token on the server side. This is how Server Side Session works. We have "Session Id", a unique & random string.

- Create a token which contains everything in it and then you don't track anything on server.

The first option is not very scalable but the second option is. Now if our token is going to contain the data in itself, what issues do we see?

- What will be format of token & how to represent data in it?
- How to secure the content of token so the end user can't read it?
- How to detect if token is tempered by end user?

We can develop our own mechanism to 1) Create a token 2) Validate a token and extract information from it when someone presents a token to us. But do we have any solution already available for us? Yes, do.
 
Following are two popular token types for which we currently have support/libraries in ASP.NET,

1. oAuth Bearer Token

- It stores data in the form of claims (key/value pairs)
- Token is encrypted.
- End User needs algorithm & key to decrypt it.

2. Json Web Token 

## Json Web Tokens (check https://jwt.io/ for example)

- JWT token is a string and has three parts separated by dot (.) a) Header b) Payload c) Signature 
- Header & Payload are JSON objects
- Header contains algorithm & type of token which is jwt
- Payload contains claims (key/value pairs) + expiration date + aud/issuer etc. 
- Signature is HASH value computed using Base64(Header) +"." + Base64(Payload).  This information is passed to an algorithm with a secret key.
- Token structure is base64(header) + "." + base64(payload) + "." + hash

This is a quick workflow using JWT,

1. Client sends a request to server for token
2. Server generates a JWT (which contains a hash). Hash is generated using a secret key.
3. Client receives the token and stores it somewhere locally.
4. Client sends the token in future requests.
5. Server gets the token from request header, computes Hash again by using a) Header from token b) payload from token c) secret key which server already has.
6. If ("newly computed hash" = "hash came in token"), token is valid otherwise it is tempered or not valid. 

User can decode JWT and see what is in header & in payload. Therefore we should not keep any confidential information in token.
 
In this article, we'll learn,

1. How can we create Json Web Token in ASP.NET Web API
2. How to validate a JWT bearer token if it comes in a request
3. How to get claims data 

## Creating & Validating JWT in ASP.NET Web API
 
Lets' create an ASP.NET Web API application in Visual Studio 2015/2017/2019 - File -> New Project -> ASP.NET Web Application -> Web API (without authentication to keep things simple).
 
### Creating JWT Token

1. Add following nuget Package (You may choose latest version available for .NET Framework version you are using)

- System.IdentityModel.Tokens.Jwt 5.5.0 

2. Open Values Controller (or we may create a new API controller) and add following namespaces

```cs
using Microsoft.IdentityModel.Tokens;
using System.IdentityModel.Tokens.Jwt;
using System.Security.Claims;
using System.Text;

```

Add following Action in Values Controller. Here we've made it very simple.
 

📝 Note : Normally we'll expose this method with POST verb + we'll receive some credentials for authentication. Once user will be authenticated, token will be generated accordingly. 

```cs
[HttpGet]    
public Object GetToken()    
{    
    string key = "my_secret_key_12345"; //Secret key which will be used later during validation    
    var issuer = "http://mysite.com";  //normally this will be your site URL    
  
    var securityKey = new SymmetricSecurityKey(Encoding.UTF8.GetBytes(key));    
    var credentials = new SigningCredentials(securityKey, SecurityAlgorithms.HmacSha256);    
  
    //Create a List of Claims, Keep claims name short    
    var permClaims = new List<Claim>();    
    permClaims.Add(new Claim(JwtRegisteredClaimNames.Jti, Guid.NewGuid().ToString()));    
    permClaims.Add(new Claim("valid", "1"));    
    permClaims.Add(new Claim("userid", "1"));    
    permClaims.Add(new Claim("name", "bilal"));    
  
    //Create Security Token object by giving required parameters    
    var token = new JwtSecurityToken(issuer, //Issure    
                    issuer,  //Audience    
                    permClaims,    
                    expires: DateTime.Now.AddDays(1),    
                    signingCredentials: credentials);    
    var jwt_token = new JwtSecurityTokenHandler().WriteToken(token);    
    return new { data = jwt_token };    
}

```

This is not required but to use action name in route; we are making the following highlighted change in `App_Start\WebApiConfig.cs` file

```cs
config.Routes.MapHttpRoute(  
                name: "DefaultApi",  
                routeTemplate: "api/{controller}/{action}/{id}",  
                defaults: new { id = RouteParameter.Optional }  
            );   

```

Now let's run the application and test the following in browser/postman (considering `http://localhost:1234` is base URL of our application). 
 
http://localhost:1234/api/values/gettoken
 
Response in browser should be something like this. "data" contains the token.
{"data":"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI3ODZlZmY0OS00OWQ2LTQ4YjQtODM4NC0yYTA5NDYxODJmN2YiLCJ2YWxpZCI6IjEiLCJ1c2VyaWQiOiIxIiwibmFtZSI6ImJpbGFsIiwiZXhwIjoxNTcwNjMwMzMwLCJpc3MiOiJodHRwOi8vbXlzaXRlLmNvbSIsImF1ZCI6Imh0dHA6Ly9teXNpdGUuY29tIn0.06vzYfiSpj1X9s0-CL2nE7NH4LloASMikZCNfHIJ8tY"}  
You may copy token from here and decode it on http://jwt.io to see what it contains.
 
Note
If you get serialize or XML error, You may remove XML formatter and make JSON formatter as default formatter. You should not be doing this in actual application if your API needs to provide XML formatting support.
 
Go to Global.asax.cs file and add following line at end of Application_start() method
GlobalConfiguration.Configuration.Formatters.Remove(GlobalConfiguration.Configuration.Formatters.XmlFormatter);  
How to Validate JWT Token?
 
Note
JWT Creator App & JWT Validator App can be two different applications.
 
Add the following nuget packages,
Microsoft.Owin.Security.Jwt 4.0.1
Microsoft.AspNet.WebApi.Owin 5.2.3
Microsoft.Owin.Host.SystemWeb 4.0.1 
Create Owin Statup class -> Right click on Web Project -> Add -> Owin Startup Class. 
 
a) Add following namespaces 
using Microsoft.Owin.Security.Jwt;  
using Microsoft.Owin.Security;  
using Microsoft.IdentityModel.Tokens;  
using System.Text;  
b) Replace class with the following.
 
Note
We are using same parameters that we used while creating token. This will be used to validate request. If it finds a token is valid, it will set User.Identity accordingly. We'll see later how to check if a user is authenticated (i.e. valid token is recieved) and how to extract claims from identity. 
public class Startup  
    {  
        public void Configuration(IAppBuilder app)  
        {  
            app.UseJwtBearerAuthentication(  
                new JwtBearerAuthenticationOptions  
                {  
                    AuthenticationMode = AuthenticationMode.Active,  
                    TokenValidationParameters = new TokenValidationParameters()  
                    {  
                        ValidateIssuer = true,  
                        ValidateAudience = true,  
                        ValidateIssuerSigningKey = true,  
                        ValidIssuer = "http://mysite.com", //some string, normally web url,  
                        ValidAudience = "http://mysite.com",  
                        IssuerSigningKey = new SymmetricSecurityKey(Encoding.UTF8.GetBytes("my_secret_key_12345"))  
                    }  
                });  
        }  
    }  
Open App_Start\WebApiConfig.cs file,
 
a) Add following namespace
using Microsoft.Owin.Security.OAuth;  
b) Update WebApiConfig.Register method with highlighted code. This is to enable oAuth authentication. Also add {action} in route config.
public static void Register(HttpConfiguration config) {  
 // Web API configuration and services    
 config.SuppressDefaultHostAuthentication();  
 config.Filters.Add(new HostAuthenticationFilter(OAuthDefaults.AuthenticationType));  
  
 // Web API routes    
 config.MapHttpAttributeRoutes();  
  
 config.Routes.MapHttpRoute(  
  name: "DefaultApi",  
  routeTemplate: "api/{controller}/{action}/{id}",  
  defaults: new {  
   id = RouteParameter.Optional  
  }  
 );  
}  
Open any API Controller (e.g. Values Controller)
 
a) Add following namespace
using System.Security.Claims;  
b) Add the following Actions in API Controller (e.g. Values) for testing.
 
GetName1
 
It has no authorization enabled on it. This function will be called whether we've received a token or not but we are checking if user is authenticated (means a valid token has been received) inside the function. User.Identity contains the claims (which are constructed from token)
[HttpPost]    
public String GetName1() {    
 if (User.Identity.IsAuthenticated) {    
  var identity = User.Identity as ClaimsIdentity;    
  if (identity != null) {    
   IEnumerable < Claim > claims = identity.Claims;    
  }    
  return "Valid";    
 } else {    
  return "Invalid";    
 }    
}    
GetName2
 
It has Authorize attribute. This function will not be called if a valid token is not received.
[Authorize]  
[HttpPost]  
public Object GetName2() {  
 var identity = User.Identity as ClaimsIdentity;  
 if (identity != null) {  
  IEnumerable < Claim > claims = identity.Claims;  
  var name = claims.Where(p => p.Type == "name").FirstOrDefault() ? .Value;  
  return new {  
   data = name  
  };  
  
 }  
 return null;  
} 
Now let's run the application and test it using Postman (https://getpostman.com) by providing token, by providing invalid token, without token etc.
 
Method Type: POST
 
URL: http://localhost:1234/api/values/getname1
 
Headers
 
Authorization: Bearer <token> 
Content-Type: application/json
   

 
Method Type: POST
URL: http://localhost:1234/api/values/getname2
 
Headers
Authorization: Bearer <token>
Content-Type: application/json
 

 
 
Note
Requester/Consumer of token can be browser/desktop app/mobile app/postman etc. as long it allows creating HTTP requests. 
 
Want to see how to achieve above with ASP.NET Core? Check here.
 
Summary
 
JSON web tokens have got quite popular and there are reasons for this popularity. The main reason is its simplicity. End application/consumer should consider security of tokens as important as login/password security. JWT are not encrypted, but rather encoded. It means anyone who has access to JWT can decode and get information from it. Confidential data should not be part of it or it should be encrypted if it is required. Size of payload should be small. Keep only required claims with small names.

Aspnet-web-api-ile-yazilimcilarin-bagimsizligi kurs notları

Source : https://www.udemy.com/course/aspnet-web-api-ile-yazilimcilarin-bagimsizligi

- [B1 - Intro](#b1---intro)
  - [1. WEB API ve ASP.NET WEB API Nedir?](#1-web-api-ve-aspnet-web-api-nedir)
  - [2. HTTP Protocol ve HTTP Status Code Nedir?](#2-http-protocol-ve-http-status-code-nedir)
  - [3. HTTP Header ve HTTP Body Nedir?](#3-http-header-ve-http-body-nedir)
  - [4. REST ve RESTful Kavramları Nedir?](#4-rest-ve-restful-kavramları-nedir)
  - [5. ASP.NET WEB API Projesi Oluşturma](#5-aspnet-web-api-projesi-oluşturma)
  - [6. Fiddler Aracını Tanımak ve Kullanmak](#6-fiddler-aracını-tanımak-ve-kullanmak)
  - [7. Postman Aracını Tanımak ve Kullanmak](#7-postman-aracını-tanımak-ve-kullanmak)
- [B2 - Routing](#b2---routing)
  - [8. Convention Based Routing Kavramı](#8-convention-based-routing-kavramı)
  - [9. Action Based Routing Kavramı](#9-action-based-routing-kavramı)
  - [10. Attribute Based Routing](#10-attribute-based-routing)
  - [11. RoutePrefix Kullanımı](#11-routeprefix-kullanımı)
  - [12. Route Contstraint(Kısıtlama) Kullanımı](#12-route-contstraintkısıtlama-kullanımı)
  - [13. Route Custom Constraint(Özel Kısıtlama) Kullanımı](#13-route-custom-constraintözel-kısıtlama-kullanımı)
  - [14. Route İçinde Default ve Optional Kullanımı](#14-route-i̇çinde-default-ve-optional-kullanımı)
  - [15. Route Name ile Route Link Oluşturma](#15-route-name-ile-route-link-oluşturma)
- [B3 Http Response Message \& Entity Framework CRUD](#b3-http-response-message--entity-framework-crud)
  - [16. Entity Framework DatabaseFirst ile Proje Oluşturma](#16-entity-framework-databasefirst-ile-proje-oluşturma)
  - [17. Get Metodu ile EF Select İşlemi](#17-get-metodu-ile-ef-select-i̇şlemi)


# B1 - Intro

## 1. WEB API ve ASP.NET WEB API Nedir?

- Web Api (App Programming Interface)
- Http protokolü üzerinden haberleşir
- Mvc Design Pattern kullanır
- Routing Controllers,Action Results,Filter, Model Binders
- Wcf değildir
- Rest Mimarisi ile Restful Servisler
- Rest : Representational state transfer
- Wcf Web Api -> Asp.Net Web Api
- Soap ve Rest Tercihi

🔚

## 2. HTTP Protocol ve HTTP Status Code Nedir?

- Http -> Hyper Text Transfer Protocol

- Protokol : Uyulması gereken kurallar

Örnek : client server'dan bir istekte bulunacağı zaman Http Get Request işlemi yapar. 

```
Client ---Request (Http Get)----> Server
      <---Response (200 ok)------

```

- Önemli Http Metodları

Metot  | Amacı
-------|-------
Post   | Create
Get    | Read
Put    | Update
Delete | Delete

bunlara aynı zamanda action da deniliyor.


➖ Http Status Code (Durum Kodları) isteğin sonucunun durumunu belirtir.

Örneğin

```
200 ok
404 not found

```

- 1xx olanlar bilgi amaçlıdır. Gruplanmıştır. Digerler aşağıdadır. Bunlar örnek daha fazla sayıda kodlar vardır.

```
1xx Kod - Açıklama (Bilgi)
100 Continue
101 Switching Protocols
102 Processing
```

```
2xx Kod - Açıklama (Başarı) 
200 ok
201 created
204 no content
```

```
3xx Kod - Açıklama (Yönlendirme) 
301 Moved Permanently
302 Moved Temporarily
305 Use Proxy
```

```
4xx Kod - Açıklama (Client Hatası) 
400 Bad Request
401 Unauthorized
405 Method Not Allowed
```

```
5xx Kod - Açıklama (Sunucu Hata) 
500 Internal Server Error
501 Not Implemented
503 Service Unavailable
```

🔚

## 3. HTTP Header ve HTTP Body Nedir?
5 dak

## 4. REST ve RESTful Kavramları Nedir?
8 dak

## 5. ASP.NET WEB API Projesi Oluşturma

➖ New Project -> Asp.Net Web Application Seçilir 

➖ Template'den Web Api seçilir. Aşağıda varsayılan olarak Mvc ve Web Api tikli olacaktır.

➖ sağda authentication tipleri vardır, unit test seçeneği var, bunları değiştirmiyoruz, örnek proje için.

➖ böylelikle bize projeyi oluşturur. burada önemli dizinler controllers'dur. 

![web-api-sol](./img/web-api-sol.jpg)

- Mvc Controller'ı Controller sınıfını miras alır
- Api Controller'ı ise ApiController sınıfını miras alır.

➖ Proje ayağa kalkarken `global.asax` bulunan `Application_Start` metodu çalışacaktır. Burada ayarlar yapılmıştır. `App_Start` dizininde ayarlar sınıfları vardır. `WebApiConfig` sınıfında api ayarları yapılır.

➖ controller içerisindeki metodlara action diyoruz.

➖ routeTemplate görüldüğü üzere controller istekte bulunmak için `api/{controller}` ismini vermek yeterlidir. controller dan sonra optional değer verilmiştir.

```cs
routeTemplate : "api/{controller}/{id}",
defaults : new { id = RouteParameter.Optional}
```

- sınıf ismi ValuesController 'u api/values şeklinde istekte bulunuruz.

- bir sınfa `[Authorize]` attribute verilirse, yetki alınıp kullanabileceği gösterilir.

- visual studion run yaptığımızda her değişiklikte durdurup tekrar çalıştırmamız gerekir. bunun yerine `views\home\index.cshtml` açıp editorde sağ klik `view in browser` 'ı tıklayıp proje çalıştırabiliriz. değişikliklerin aktif olması için build solutions yapmamız gerekir.

🔚

## 6. Fiddler Aracını Tanımak ve Kullanmak
12 dak

## 7. Postman Aracını Tanımak ve Kullanmak

- fake online rest api : jsonplaceholder.typicode.com
- postman : www.getpostman.com
- fiddler : www.telerik.com/fiddler



# B2 - Routing

## 8. Convention Based Routing Kavramı


```cs
    public class ValuesController : ApiController
    {
        static List<string> degerler = new List<string>()
        {
            "value0","value1","value2","value3"
        };

        // GET api/values
        public IEnumerable<string> Get()
        {
            return degerler;
        }

        // GET api/values/5
        public string Get(int id)
        {
            return degerler[id];
        }

        // POST api/values
        public void Post([FromBody] string value)
        {
            degerler.Add(value);
        }

        // PUT api/values/5
        public void Put(int id, [FromBody] string value)
        {
            degerler[id] = value;
        }

        // DELETE api/values/5
        public void Delete(int id)
        {
            degerler.RemoveAt(id);
        }
    }
}
```

✏ Fiddler post yaparkent `Content-Type:application/json` değerini header'a eklememiz gerekir.

## 9. Action Based Routing Kavramı
6 dak

➖ öncelikle Webapiconfig dosyasında routeTemplate alanımızda değişiklik yaparız.

```cs
public static void Register(HttpConfiguration config)
  {
      // Web API configuration and services

      // Web API routes
      config.MapHttpAttributeRoutes();

      config.Routes.MapHttpRoute(
          name: "DefaultApi",
          routeTemplate: "api/{controller}/{action}/{id}",
          defaults: new { id = RouteParameter.Optional }
      );
  }
```

➖ ValuesController metod isimlerinde değişiklik yaparız. İlgili request tipini annotation olarak belirtmemiz gerekir. HttpGet,HttpPost gibi...

```cs
    public class ValuesController : ApiController
    {
        static List<string> degerler = new List<string>()
        {
            "value0","value1","value2","value3"
        };

        // GET api/values
        [HttpGet]
        public IEnumerable<string> Degerler()
        {
            return degerler;
        }

        // GET api/values/5
        [HttpGet]
        public string DegerGetir(int id)
        {
            return degerler[id];
        }

        // POST api/values
        [HttpPost]      
        public void DegerEkle([FromBody] string value)
        {
            degerler.Add(value);
        }

        // PUT api/values/5
        [HttpPut]
        public void DegerGuncelle(int id, [FromBody] string value)
        {
            degerler[id] = value;
        }

        // DELETE api/values/5
        [HttpDelete]
        public void DegerSil(int id)
        {
            degerler.RemoveAt(id);
        }
    }
}

```

➖ request isteğimizi örneğin `https://localhost:44355/api/values/degerler` şeklinde yapmamız gerekir.


## 10. Attribute Based Routing
11 dak

```cs
    [RoutePrefix("api/employee")]
    public class EmployeeController : ApiController
    {
        static List<Employee> Employees = new List<Employee>()
        {
            new Employee() { Id = 1, Name = "PersonA" },
            new Employee() { Id = 2, Name = "PersonB" },
            new Employee() { Id = 3, Name = "PersonC" }
        };

        [Route("")]
        public IEnumerable<Employee> Get()
        {
            return Employees;
        }


        
        [Route("detail/{id:decimal=2}")]
        public Employee Get(decimal id)
        {
            return Employees.FirstOrDefault(e => e.Id == id);
        }


        [Route("{id:int:range(1,5)}", Name = "GetById")]
        public Employee Get(int id)
        {
            return Employees.FirstOrDefault(e => e.Id == id);
        }

        [Route("{name:alpha:lastletter}")]
        public Employee Get(string name)
        {
            return Employees.FirstOrDefault(e => e.Name.ToLower() == name.ToLower());
        }

        [Route("add")]
        public HttpResponseMessage Post(Employee emp)
        {
            emp.Id = Employees.Max(x => x.Id) + 1;
            Employees.Add(emp);

            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.Created);
            //response.Headers.Location = new Uri("/api/employee/" + emp.Id.ToString());
            //response.Headers.Location = new Uri(Request.RequestUri + "/" + emp.Id.ToString());
            response.Headers.Location = new Uri(Url.Link("GetById", new { id = emp.Id }));

            return response;
        }



        [Route("{id}/tasks")]
        public IEnumerable<string> GetEmployeeTasks(int id)
        {
            switch (id)
            {
                case 1:
                    return new List<string> { "Task 1-1", "Task 1-2", "Task 1-3" };
                case 2:
                    return new List<string> { "Task 2-1", "Task 2-2", "Task 2-3" };
                case 3:
                    return new List<string> { "Task 3-1", "Task 3-2", "Task 3-3" };
                default:
                    return null;
            }
        }

        [Route("~/api/tasks")]
        public IEnumerable<string> GetTasks()
        {
            return new List<string> { "Task 1-1", "Task 1-2", "Task 1-3", "Task 2-1", "Task 2-2", "Task 2-3", "Task 3-1", "Task 3-2", "Task 3-3" };
        }
    }
}

```


## 11. RoutePrefix Kullanımı
6 dak

## 12. Route Contstraint(Kısıtlama) Kullanımı
7 dak

## 13. Route Custom Constraint(Özel Kısıtlama) Kullanımı
10 dak

## 14. Route İçinde Default ve Optional Kullanımı
4 dak

## 15. Route Name ile Route Link Oluşturma
11 dak

# B3 Http Response Message & Entity Framework CRUD

## 16. Entity Framework DatabaseFirst ile Proje Oluşturma
8 dak

## 17. Get Metodu ile EF Select İşlemi
3 dak

18. Post Metodu ile EF Insert İşlemi ve Http Response Message
16 dak

19. Put Metodu ile EF Update İşlemi ve Http Response Message
7 dak

20. Delete Metodu ile EF Delete İşlemi ve Http Response Message
5 dak

21. Query String Kullanımı
12 dak

22. FromBody ve FromUri Kullanımı
13 dak

23. Döngüsel Referans Yönetimi - 1
13 dak

24. Döngüsel Referans Yönetimi - 2
12 dak

25. JQuery ile GET İşlemi - 1
18 dak

26. JQuery ile GET İşlemi - 2
4 dak

27. JQuery ile POST İşlemi
11 dak

28. Content Negotiation
10 dak

29. Media TypeFormatter (JSON and XML Serialization)
14 dak

30. Custom CSV MediaTypeFormatter Oluşturmak
13 dak

31. Model Validation
5 dak

32. Model Validation Uygulaması
20 dak

33. Cross Domain ve Same Origin Policy
14 dak

34. Web Api'de HTTPS/SSL Nedir ? Nasıl Kullanılır?
8 dak

35. Exception Filter Attribute
14 dak

36. Action Filter Attribute
17 dak

37. Authorization Filter Attribute
14 dak

38. Temel Oturum
10 dak

39. Custom Token Authentication
20 dak

40. Bearer Token Authentication - 1
13 dak

41. Bearer Token Authentication - 2
9 dak

42. Bearer Token Authentication - 3
22 dak

43. Standart Multipart File Upload
16 dak

44. Base64String ile File Uoload
10 dak

45. Inversion of Control Mantığı
14 dak

46. Dependency Injection Mekanizması
17 dak

47. Ninject IoC Kullanımı - 1
16 dak

48. Ninject IoC Kullanımı - 2
8 dak

49. Castle.Windsor IoC Kullanımı
14 dak

50. AutoFac IoC Kullanımı
9 dak

51. ODATA Giriş
5 dak

52. ODATA Kurulum
13 dak

53. ODATA Filtreleme - 1
9 dak
Başlat
Sınav 1: ODATA Select Testi

54. ODATA Filtreleme - 2
4 dak

55. ODATA İnceleme
16 dak

56. ODATA Filtreleme - 3
9 dak

57. ODATA Filtreleme - 4
3 dak

58. ODATA EnableQuery
8 dak

59. ODATA Single Result
5 dak

60. ODATA - Update İşlemi
7 dak

61. ODATA - Pacth ile Update
6 dak

62. ODATA - Insert
4 dak

63. ODATA - Delete
6 dak
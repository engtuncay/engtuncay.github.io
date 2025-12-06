
Global.asax.cs dosyasındaki Application_Start metodu içeriğini açıklar mısın ?

`Application_Start` metodu, ASP.NET uygulaması başlatıldığında bir kez çağrılır ve uygulamanın başlangıç yapılandırmalarını yapar. Bu metotta yapılan işlemler:

2. **Ortam Kontrolü ve Loglama:**  
   `ewaTxEnvironment` değeri okunur. Eğer ortam "dev" ise, loglama aktif edilir ve "Dev Ortamı" mesajı loglanır.

3. **Konfigürasyon Nesnesi Oluşturma:**  
   `FiAppConfig.fiConfig = new EwaConfigManager();` ile uygulama konfigürasyonu yüklenir.

5. **Alanların Kaydı:**  
   `AreaRegistration.RegisterAllAreas();` ile MVC alanları kaydedilir.

6. **Web API Yapılandırması:**  
   `GlobalConfiguration.Configure(WebApiConfig.Register);` ile Web API ayarları yapılır.

7. **Global Filtrelerin Kaydı:**  
   `FilterConfig.RegisterGlobalFilters(GlobalFilters.Filters);` ile filtreler eklenir.

8. **Rotaların Kaydı:**  
   `RouteConfig.RegisterRoutes(RouteTable.Routes);` ile URL yönlendirme kuralları tanımlanır.

9. **Bundle (Script/CSS) Kaydı:**  
   `BundleConfig.RegisterBundles(BundleTable.Bundles);` ile script ve stil dosyaları gruplanır.

10. **Owin ve JWT Ayarları:**  
    XML format desteği kaldırılır, sadece JSON formatı desteklenir.

Kısacası, bu metod uygulamanın başlatılması için gerekli tüm temel ayarları ve bağımlılıkları yükler. İlgili kodu Global.asax.cs dosyasında bulabilirsin.
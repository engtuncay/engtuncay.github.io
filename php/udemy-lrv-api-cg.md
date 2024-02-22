
Laravel 7 ile Sıfırdan RESTful API Uygulamaları Geliştirme Kurs Notlarım

- [B1 Giriş](#b1-giriş)
  - [1. 1.0. Giriş](#1-10-giriş)
  - [2. 1.1. API Nedir?](#2-11-api-nedir)
  - [3. 1.2. REST ve RESTful Nedir?](#3-12-rest-ve-restful-nedir)
  - [4. 1.3. REST Yapısının Özellikleri ve SOAP Yapısı ile Kıyaslanması](#4-13-rest-yapısının-özellikleri-ve-soap-yapısı-ile-kıyaslanması)
  - [5. 1.4. Örnek API İncelemeleri](#5-14-örnek-api-i̇ncelemeleri)
- [B2 Laravel'in Temelleri](#b2-laravelin-temelleri)
  - [6. 2.0. Laravel'in Temelleri](#6-20-laravelin-temelleri)
  - [7. 2.1. Laravel Nedir?](#7-21-laravel-nedir)
  - [8. 2.2. XAMPP ve Composer Kurulumu](#8-22-xampp-ve-composer-kurulumu)
  - [9. 2.3. Laravel Projesi Oluşturma](#9-23-laravel-projesi-oluşturma)
  - [10. 2.4. Geliştirme Ortamı Alanadını Ayarlama](#10-24-geliştirme-ortamı-alanadını-ayarlama)
  - [11. 2.5. PhpStorm ve Postman Kurulumu](#11-25-phpstorm-ve-postman-kurulumu)
  - [12. 2.6. Laravel Projesi Dosya ve Klasör Yapısı](#12-26-laravel-projesi-dosya-ve-klasör-yapısı)
  - [13. 2.7. Laravel'in Çalışma Yapısı](#13-27-laravelin-çalışma-yapısı)
  - [14. 2.8. Web Route Yapısı](#14-28-web-route-yapısı)
  - [15.  2.9. Route Yapısı Yanıt Türleri](#15--29-route-yapısı-yanıt-türleri)
  - [16. 2.10. Route Yapısında Parametre Kullanımı](#16-210-route-yapısında-parametre-kullanımı)
  - [17. 2.11. Route Tanımlarını İsimlendirme](#17-211-route-tanımlarını-i̇simlendirme)
  - [18. 2.12. Route Tanımlarını Gruplama](#18-212-route-tanımlarını-gruplama)
  - [19. 2.13. Controller Yapısı](#19-213-controller-yapısı)
  - [20. 2.14. View Yapısı ve Blade Template Engine](#20-214-view-yapısı-ve-blade-template-engine)
  - [21. 2.15. View Yapısı ve Blade Template Engine-2](#21-215-view-yapısı-ve-blade-template-engine-2)
  - [22. 2.16. Veritabanı Bağlantısı](#22-216-veritabanı-bağlantısı)
  - [23. 2.17. Migration Yapısı](#23-217-migration-yapısı)
  - [24. 2.18. Raw SQL Query](#24-218-raw-sql-query)
- [B3 - RESTful API Geliştirme](#b3---restful-api-geliştirme)
  - [32. 3.0. RESTful API Geliştirme](#32-30-restful-api-geliştirme)
  - [33. 3.1. API Route Dosyası](#33-31-api-route-dosyası)
  - [34. 3.2. API İsteklerini Test Etme](#34-32-api-i̇steklerini-test-etme)




# B1 Giriş

## 1. 1.0. Giriş

## 2. 1.1. API Nedir?

## 3. 1.2. REST ve RESTful Nedir?

## 4. 1.3. REST Yapısının Özellikleri ve SOAP Yapısı ile Kıyaslanması

## 5. 1.4. Örnek API İncelemeleri


# B2 Laravel'in Temelleri

## 6. 2.0. Laravel'in Temelleri


## 7. 2.1. Laravel Nedir?


## 8. 2.2. XAMPP ve Composer Kurulumu


## 9. 2.3. Laravel Projesi Oluşturma


## 10. 2.4. Geliştirme Ortamı Alanadını Ayarlama


## 11. 2.5. PhpStorm ve Postman Kurulumu


## 12. 2.6. Laravel Projesi Dosya ve Klasör Yapısı


## 13. 2.7. Laravel'in Çalışma Yapısı


## 14. 2.8. Web Route Yapısı

- default index web rutu, view template sisteminde welcome view'ni açar. (resources/views/welcome.blade.php)

```php
Route::get('/', function () {
    return view('welcome');
});

```

- routes/web.php dosyasına rut eklediğimizde text olarak dönüş yapabiliriz. (http://127.0.0.1:8000/merhaba)

```php
Route::get('/merhaba', function () {
    return 'Merhaba';
});
```

- json dönüş yapabiliriz.

```php
Route::get('/merhaba-json', function () {
    return ['message' => 'Merhaba API'];
});
```

- json dönüşünü Laravel fonksiyonları ile de yapabiliriz.

```php
Route::get('/merhaba-json2', function () {
    return response(['message' => 'Merhaba API Json2'], 200);
});
```

- laravel metodları ile response header ları dönüş yapabiliriz.

```php
Route::get('/merhaba-json3', function () {
    return response(['message' => 'Merhaba API JSON3'], 200)
        ->header('Content-Type', 'application/json'); // text/plain
});

```

## 15.  2.9. Route Yapısı Yanıt Türleri


## 16. 2.10. Route Yapısında Parametre Kullanımı

```php
Route::get('/product/$id', function ($id) {
    return "Product Id:$id";
});

Route::get('/product/$id/$type', function ($id, $typeParam) {
    return "Product Id:$id Type: $typeParam";
});
```

- opsiyonel parametre kullanımı, callback function'ında ilgili argumana default değer verilmesi gerekir.

```php
Route::get('/product/{$id}/{$type?}', function ($id, $typeParam = '') {
    return "Product Id:$id Type: $typeParam";
});

```

## 17. 2.11. Route Tanımlarını İsimlendirme
4 dak

## 18. 2.12. Route Tanımlarını Gruplama
2 dak

## 19. 2.13. Controller Yapısı
5 dak

## 20. 2.14. View Yapısı ve Blade Template Engine
7 dak

## 21. 2.15. View Yapısı ve Blade Template Engine-2
7 dak

## 22. 2.16. Veritabanı Bağlantısı
7 dak

## 23. 2.17. Migration Yapısı
12 dak

## 24. 2.18. Raw SQL Query
6 dak

25. 2.19. Query Builder Yapısı
7 dak

26. 2.20. Eloquent ORM ve Model Yapısı
6 dak

27. 2.21. Eloquent ORM - Kayıt Ekleme
6 dak

28. 2.22. Eloquent ORM - Kayıt Çekme
2 dak

29. 2.23. Eloquent ORM - Güncelleme ve Silme
6 dak

30. 2.24. Factory Yapısı
10 dak

31. 2.25. Seed Yapısı
10 dak

# B3 - RESTful API Geliştirme 

## 32. 3.0. RESTful API Geliştirme

🔔 Neler öğrenilecek

## 33. 3.1. API Route Dosyası

- routes klasörünün altında api.php dosyasından api rutları ayarlanır.
- İlk ayarlamalar Providers klasörü içerisindeki RouteServiceProvider tarafından gerçekleştirilir.
  map metodunda iki metod çalıştırır. mapApiRoutes ve mapWebRoutes. 

- api route ları otomatik `/api` prefix ile tanımlanmış. 'myurl/api/' gibi alt dizinde belirtilir.

- api middleware kullanılmış. group metodu ile route tanımlarının nerede yapılacağı belirtilir.

Example 1 

```php
Route::get('/merhaba', function () {
    return "Merhaba Restful API";
});
```



- return olarak factory fonksiyonunu kullanabiliriz.

```php
Route::get('/users', function () {
    return factory(User::class,10)->make();
});
```


## 34. 3.2. API İsteklerini Test Etme
2 dak

35. 3.3. HTTP Metotları
4 dak

36. 3.4. HTTP Status Codes
2 dak

37. 3.5. Resource Controller ve Route Tanımları
9 dak

38. 3.6. API Resource Controller ve Route Tanımları
6 dak

39. 3.7. Product API Read (GET)
8 dak

40. 3.8. Product API Insert (POST)
13 dak

41. 3.9. Product API Update (PUT)
8 dak

42. 3.10. Product API Delete (DELETE)
2 dak

43. 3.11. Sayfalandırma
10 dak

44. 3.12. Filtreleme ve Sıralama
8 dak

45. 3.13. Category API İşlemleri
7 dak

46. 3.14. User API İşlemleri
5 dak

47. 3.15. İlişkili Tablo Yapısını Oluşturma
12 dak

48. 3.16. Product ve Category Model İlişkileri
6 dak

49. 3.17. İlişkili Tablo Verilerini Çekme
4 dak

50. 4.0. Veri Dönüşümleri
1 dak

51. 4.1. Dönüş Kolonlarını Özelleştirme
8 dak

52. 4.2. map Metodu ile Kolonları Özelleştirme
4 dak

53. 4.3. Gruplanmış Tablo Verileri
6 dak

54. 4.4. Kolonları Gizleme
3 dak

55. 4.5. Özelleştirilmiş Kolonlar
13 dak

56. 4.6. Tarih Biçimlendirme
4 dak

57. 4.7. API Resources
12 dak

58. 4.8. Resource collection Metodu
2 dak

59. 4.9. Resource Collection Dosyaları
9 dak

60. 4.10. Resource Paginated Data
4 dak

61. 4.11. Resource Data Wrapping
6 dak

62. 4.12. Relational Data
7 dak

63. 4.13. Conditional Column
3 dak

64. 4.14. Conditional Relationship
3 dak

65. 4.15. Custom Wrapper Response
3 dak

66. 4.16. apiResponse Metodunu Oluşturma
8 dak

67. 4.17. apiResponse Metodunu Geliştirme
7 dak

68. 5.0. Veri Doğrulama ve Hata Yakalama
1 dak

69. 5.1. Veri Doğrulama İşlemi
10 dak

70. 5.2. Özel Request Tanımı ile Veri Doğrulama
15 dak

71. 5.3. Doğrulama Hata Mesajlarını Özelleştirme
6 dak

72. 5.4. Handler ile Hata Yakalama
11 dak

73. 5.5. try-catch ile Hata Yakalama
5 dak

74. 6.0 Authentication Yapısı
1 dak

75. 6.1. Authentication Kavramı ve Konfigrasyonu
5 dak

76. 6.2. Web Arayüzünde Authentication Kontrolü Ekleme
4 dak

77. 6.3. Web Arayüzünde Auth Yapısını Oluşturma
9 dak

78. 6.4. Api Arayüzünde Authentication Kontrolü Ekleme
5 dak

79. 6.5. Token Authentication
11 dak

80. 6.6. Özel Bearer Token Authentication
17 dak

81. 6.7. Dinamik Api Token Oluşturma
14 dak

82. 6.8. Basic Authentication
3 dak

83. 7.0. Dosya Kullanımı
1 dak

84. 7.1. Client Uygulaması Üzerinde Upload Formunun Oluşturulması
13 dak

85. 7.2. API Uygulaması İçerisinde Upload İşleminin Gerçekleştirilmesi
13 dak

86. 7.3. Postman Üzerinde Upload İşleminin Test Edilmesi
2 dak

87. 7.4. Upload Verilerini Doğrulama
11 dak

88. 7.5. Ek Dosya Komutları
8 dak

89. 7.6. Laravel Storage Kullanımı
8 dak

90. 7.7. Laravel Storage Link
15 dak

91. 7.8. API ile Dosya Download
10 dak

92. 8.0 Özel Middleware Tanımları
1 dak

93. 8.1. Middleware Yapısı
2 dak

94. 8.2. Middleware Tanımlarının Kullanılması
6 dak

95. 8.3. Throttle Middleware
10 dak

96. 8.4. Dynamic Rate Limiting
7 dak

97. 8.5. Guest & Authenticated User Rate Limits
5 dak

98. 8.6. Logger Middleware
8 dak

99. 8.7. Log Dosyaları Oluşturma ve Ortam Değişkeni Kullanımı
9 dak

100. 8.8. Header Middleware
4 dak

101. 9.0. API Belgelendirme ve Test İşlemleri
1 dak

102. 9.1. Örnek API Belgeleri
8 dak

103. 9.2. Swagger Paket Kurulumu
3 dak

104. 9.3. Swagger UI İncelemesi
7 dak

105. 9.4. Annotation Yapısı
7 dak

106. 9.5. Swagger ile Belgenin Oluşturulması
16 dak

107. 9.6. Parametre Kullanımı
6 dak

108. 9.7. Farklı Durum Kodları ve Response Tanımlarının Kullanımı
6 dak

109. 9.8. Verileri Schema Tanımlarıyla İlişkilendirme
8 dak

110. 9.9. Model Özelliklerini Tanımlama
6 dak

111. 9.10. Belgelendirme Tanımlarını Ayrı Dosyada Kullanma
3 dak

112. 9.11. GetById Tanımı
10 dak

113. 9.12. Post Metot Tanımı
7 dak

114. 9.13. Update Metot Tanımı
5 dak

115. 9.14. Delete Metot Tanımı
3 dak

116. 9.15. Tag Tanımı
4 dak

117. 9.16. SecurityScheme ve Authorize Tanımı
12 dak

118. 9.17. Server, ExternalDocumentation
9 dak

119. 10.0. API Uygulamasını Yayınlama
1 dak

120. 10.1. Paylaşımlı Sunucuda Veritabanı İşlemleri
6 dak

121. 10.2. Proje Dosyalarının Sunucuya Yüklenmesi
5 dak

122. 10.3. Symbolic Link Verme İşlemi
8 dak

123. 10.4. Yayınlama Sonrası Hatalar ve Düzenlemeler
5 dak

124. 10.5. Subdomain Olarak Yayınlama
5 dak

125. 10.6. Yayınlama Sonrası İşlemler
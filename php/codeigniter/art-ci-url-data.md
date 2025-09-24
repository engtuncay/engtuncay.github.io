
- [codeigniter 4'de url üzerinden hangi yollarla veri gönderebilirim ve controller'da nasıl alırım ?](#codeigniter-4de-url-üzerinden-hangi-yollarla-veri-gönderebilirim-ve-controllerda-nasıl-alırım-)
  - [1. Query String (Sorgu Parametreleri) ile](#1-query-string-sorgu-parametreleri-ile)
  - [2. URL Segmentleri ile](#2-url-segmentleri-ile)
- [site.com/kullanici/Ali/25 bu şekilde gönderimi getUriSegment ile de alınabilir mi](#sitecomkullaniciali25-bu-şekilde-gönderimi-geturisegment-ile-de-alınabilir-mi)


## codeigniter 4'de url üzerinden hangi yollarla veri gönderebilirim ve controller'da nasıl alırım ?

CodeIgniter 4'te URL üzerinden veri göndermenin başlıca iki yolu vardır:

### 1. Query String (Sorgu Parametreleri) ile  

Örnek URL:  
```
http://site.com/controller/metot?ad=Ali&yas=25
```

**Controller'da Alma:**
````php
public function metot()
{
    $ad = $this->request->getGet('ad');
    $yas = $this->request->getGet('yas');
    // Kullanım: $ad ve $yas değişkenlerinde değerler olur
}
````

---

### 2. URL Segmentleri ile  
Route tanımı:  
```
$routes->get('kullanici/(:any)/(:num)', 'Kullanici::profil/$1/$2');
```
Örnek URL:  
```
http://site.com/kullanici/Ali/25
```

**Controller'da Alma:**
````php
public function profil($ad, $yas)
{
    // $ad = 'Ali', $yas = 25
}
````

---

**Ekstra:**  
POST ile veri göndermek için form veya AJAX kullanılır, bu durumda `$this->request->getPost('alan_adi')` ile alınır.

Sorunuzun detayına göre örnekleri çoğaltabilirim.

## site.com/kullanici/Ali/25 bu şekilde gönderimi getUriSegment ile de alınabilir mi

Evet, `getUri()->getSegment()` yöntemiyle de URL segmentlerini alabilirsiniz. Bu yöntem, parametreleri doğrudan fonksiyon parametresi olarak almak yerine URI’dan manuel olarak çekmenizi sağlar.

Örnek kullanım:

````php
public function profil()
{
    $ad  = $this->request->getUri()->getSegment(2); // 'Ali'
    $yas = $this->request->getUri()->getSegment(3); // '25'

    // $ad ve $yas değişkenlerini kullanabilirsiniz
}
````

> Not: Segment numaralandırması 1’den başlar.  
> Örnekte `kullanici` = 1. segment, `Ali` = 2. segment, `25` = 3. segment olur.

Bu yöntem, fonksiyon parametresi kullanmadan segmentlere erişmek için uygundur.
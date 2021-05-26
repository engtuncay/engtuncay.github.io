

# Php Rest Introduction

Öncelikle yazacağımız rest apiyi kullanacak insanların gönderdikleri sorgulardan aldıkları cevap türlerini header içerisinde için HTTP mesajları eklememiz gerekmektedir. HTTP mesajlarının listesine buradan bakabilirsiniz.  (https://www.w3schools.com/tags/ref_httpmessages.asp)

Rest apinin temel mantığı tek bir base url kullanarak çoklu işlev gerçekleştirmektir. Biraz daha detaylı anlatacak olursam; örneğin bizim base urlimiz /users/  olsun bu linke:

POST methodu ile sorgu istek atarsak üye ekleme,
PUT methodu ile sorgu atarsak güncelleme,
GET methodu ile sorgu atarsak listeleme,
DELETE methodu ile istek atarsak silme işlemi gerçekleştirsin.


Veritabanı Oluşturma MySql
CREATE SCHEMA `demo` DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci ;


```sql
CREATE TABLE IF NOT EXISTS uyeler (
 id int(11) NOT NULL AUTO_INCREMENT,
 kullaniciAdi varchar(25) NOT NULL,
 adSoyad varchar(100) NOT NULL,
 sifre varchar(255) NOT NULL,
 posta varchar(20) NOT NULL,
 telefon varchar(20) NOT NULL,
 PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;auto
```


# Rest Types

Restful over HTTP normally breaks down into 4 types of requests of GET, POST, PUT and DELETE. There are other request types that are outside of the scope of this article. The requests can be described as:

- GET: Normally maps to an operation of retrieving data. In CRUD, this is your READ.

- POST: Used for creating data, or in CRUD the CREATE.

- PUT: Called when a user wants to update data. Is the U in CRUD.
  
- DELETE: Used to remove data. And lastly, the DELETE in CRUD.

In this tutorial, we are going to create a small application that executes those 4 methods and represents how we can give access to a microservice. This article will NOT cover areas such as security or access control.








# Kaynaklar
- mobilhanem.com
  

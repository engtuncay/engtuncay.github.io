
<h3>Maria Db Alan Tipler</h3>

- [Create Table](#create-table)
- [mariab de text alanı](#mariab-de-text-alanı)
- [Şifre alanı nasıl olmalı ? (uzunluk,hash algoritma)](#şifre-alanı-nasıl-olmalı--uzunlukhash-algoritma)


# Create Table

```sql
CREATE TABLE XaiUser (
  a01LnId  int IDENTITY(1,1) NOT NULL PRIMARY KEY,
  a01TxUsername  nvarchar(50),
  a01TxEmail  nvarchar(254),
  a01TxPass  varchar(255),
  a01TxName  nvarchar(200),
  a01DtCreate datetime,
  a01DtUpdate datetime,
  a01TxUpdate datetime
)

```

bunu mariadb ye göre nasıl yazarım ?

MariaDB için şöyle yazarsın

```sql
sqlCREATE TABLE XaiUser (
  a01LnId     INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  a01TxUsername  NVARCHAR(50),
  a01TxEmail     NVARCHAR(254),
  a01TxPass      VARCHAR(255),
  a01TxName      NVARCHAR(200),
  a01DtCreate    DATETIME,
  a01DtUpdate    DATETIME,
  a01TxUpdate    DATETIME
);

```

Tek değişiklik: IDENTITY(1,1) → AUTO_INCREMENT

Ek not: MariaDB'de NVARCHAR teknik olarak desteklenir ama aslında VARCHAR ile eş anlamlıdır — gerçek UTF-16 saklamaz. Düzgün Unicode desteği için tablonun CHARACTER SET ve COLLATION'ını açıkça belirtmek daha sağlıklı olur:


```sql
CREATE TABLE XaiUser (
  a01LnId        INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  a01TxUsername  VARCHAR(50),
  a01TxEmail     VARCHAR(254),
  a01TxPass      VARCHAR(255),
  a01TxName      VARCHAR(200),
  a01DtCreate    DATETIME,
  a01DtUpdate    DATETIME,
  a01TxUpdate    DATETIME
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci;

```

utf8mb4 + utf8mb4_unicode_ci → Türkçe karakterler dahil tam Unicode desteği sağlar.You said: mariab de text alanı manası nedir

# mariab de text alanı

MariaDB'de TEXT bir büyük metin veri tipidir — VARCHAR'ın yetmediği durumlarda kullanılır.MariaDB'de TEXT bir büyük metin veri tipidir — VARCHAR'ın yetmediği durumlarda kullanılır.

VARCHAR vs TEXT farkı

Özellik | VARCHAR(n) | TEXT
Max uzunluk | 65.535 byte'a kadar ama tanımlı | ~65.535 byte (MEDIUMTEXT: 16MB, LONGTEXT: 4GB)
Uzunluk belirtme  | Zorunlu VARCHAR(200) | Gerekmez
Index | Direkt indexlenebilir | Prefix index gerekir TEXT(100)
Bellek | Satır içinde tutulur | Ayrı alanda tutulabilir
Varsayılan değer | Verilebilir | Verilemez

TEXT türleri

```sql
sqlTINYTEXT    -- max 255 byte
TEXT        -- max 65.535 byte (~64 KB)
MEDIUMTEXT  -- max 16.777.215 byte (~16 MB)
LONGTEXT    -- max 4.294.967.295 byte (~4 GB)

```

Ne zaman kullanılır?

```sql
sql-- VARCHAR yeterli → uzunluk bellidir
a01TxName VARCHAR(200)

-- TEXT kullan → uzunluk belirsiz/uzun içerik
aciklama      TEXT        -- blog yazısı, notlar
makale        MEDIUMTEXT  -- uzun makaleler
log_verisi    LONGTEXT    -- büyük log/JSON

```

Özet: Adı, soyadı, email gibi alanlar için VARCHAR; açıklama, içerik, not gibi uzunluğu önceden bilinmeyen alanlar için TEXT kullanırsın.

email alanını veritabanın varchar , nvarchar , uzunluğu ne yapmalıyım

Genelde en mantıklı seçim:

VARCHAR(254)
veya Unicode gerekiyorsa:
NVARCHAR(254)

Sebebi:

E-posta standardında maksimum adres uzunluğu pratikte 254 karakter kabul edilir.
Çoğu sistem (ASP.NET Identity, büyük servisler vb.) 254 kullanır.

Önerim:

Sadece ASCII email tutacaksan → VARCHAR(254)
Türkçe / Unicode domain desteklemek istiyorsan (büro.com gibi IDN dönüşümleri vs.) → NVARCHAR(254)

SQL Server için örnek:

Email VARCHAR(254) NOT NULL

veya

Email NVARCHAR(254) NOT NULL

Ek önemli noktalar:

Email karşılaştırmaları genelde case-insensitive yapılır.
Index koyacaksan 254 hala güvenlidir.
VARCHAR(MAX) kullanma. Gereksiz yer tüketir ve index/verim sorunları çıkarır.
Kullanıcı tablolarında çoğu zaman unique index gerekir:
CREATE UNIQUE INDEX IX_Users_Email ON Users(Email);

Kurumsal uygulamalarda en yaygın pratik:

NVARCHAR(255) veya VARCHAR(255)

255 seçilmesinin sebebi teknik zorunluluk değil, eski alışkanlık ve yuvarlak sayı tercihidir. 254 daha standarttır.

# Şifre alanı nasıl olmalı ? (uzunluk,hash algoritma)

Önce önemli nokta:

MD5 artık güvenli değil.
SHA1 de güvenli değil.

Modern uygulamada:

bcrypt
Argon2
PBKDF2

kullanılır. Düz SHA256(password) yapmak yeterli güvenlik sağlamaz çünkü brute-force çok hızlı olur.

Uzunluklar:

Algoritma	Hex String Uzunluğu	Önerilen Kolon
MD5	32	CHAR(32)
SHA1	40	CHAR(40)
SHA256	64	CHAR(64)
SHA512	128	CHAR(128)
bcrypt	60	CHAR(60)
Argon2	95-255 arası olabilir	VARCHAR(255)

Bugün için en mantıklı seçim:

```sql
PasswordHash VARCHAR(255) NOT NULL

```

Çünkü:

bcrypt
Argon2
gelecekte algoritma değişimi

hepsini rahat taşır.

Örneğin PHP:

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

veya:

$passwordHash = password_hash($password, PASSWORD_ARGON2ID);

Doğrulama:

password_verify($password, $hash)

Bu yöntem:

salt işlemini otomatik yapar
güvenlidir
industry standarddır

Kendi MD5/SHA sistemi yazmak artık tavsiye edilmez.

bcrypt varchar 60 mı char 60 m

bcrypt için teknik olarak en doğru seçim:

CHAR(60)

Çünkü bcrypt hash uzunluğu sabittir:

hep 60 karakter üretir.

Örnek:

$2y$10$usesomesillystringfore7hnbRJHxXVLeakoG8K30oukPsA.ztMG

Ama pratikte birçok geliştirici şunu kullanır:

VARCHAR(255)

Sebebi:

ileride Argon2’ye geçebilmek
migration gerektirmemek
farklı algoritmaları aynı kolonda tutabilmek

Yani:

Sadece ve sonsuza kadar bcrypt kullanacaksan → CHAR(60)
Esnek ve modern tasarım istiyorsan → VARCHAR(255) ← genelde daha iyi seçim

Benim önerim:

PasswordHash VARCHAR(255) NOT NULL

Çünkü gelecekte algoritma değiştirmek çok yaygın bir ihtiyaç oluyor.

name alanı uzunluğu ne olmalı

name alanı için tek doğru sayı yok çünkü kullanım amacına göre değişir. Ama çoğu iş uygulaması için iyi pratikler şöyle:

Alan	Öneri
Ad (FirstName)	NVARCHAR(100)
Soyad (LastName)	NVARCHAR(100)
Tam ad (FullName / Name)	NVARCHAR(200)

Genel önerim:

Name NVARCHAR(200) NOT NULL

Sebep:

Türkçe karakter desteği için NVARCHAR
Çift isimler
Uzun soyadlar
Firma/personel isimleri
Uluslararası kullanıcılar

hepsini rahat taşır.

Eğer:

kullanıcı adı / kısa görünen isim ise → NVARCHAR(50) yeterli olabilir.
şirket adı ise → NVARCHAR(255) daha mantıklı olabilir.

Kaçınılması gereken:

NVARCHAR(MAX) → gereksiz
çok kısa limitler (30, 40) → gerçek hayatta sorun çıkarır

Modern sistemlerde en güvenli/pratik yaklaşım:

Name NVARCHAR(200)
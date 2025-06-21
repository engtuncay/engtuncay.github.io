
## Mssql view nasıl yazılır

GitHub Copilot: Bir MSSQL (Microsoft SQL Server) view (görünüm) oluşturmak için aşağıdaki temel sözdizimini kullanabilirsiniz:

````sql
CREATE VIEW view_adi AS
SELECT kolon1, kolon2, ...
FROM tablo_adi
WHERE koşullar;
````

**Örnek:**

````sql
CREATE VIEW vw_MusteriListesi AS
SELECT MusteriID, Ad, Soyad, Sehir
FROM Musteriler
WHERE Sehir = 'İstanbul';
````

Bu örnekte vw_MusteriListesi adında bir görünüm oluşturuluyor ve sadece İstanbul şehrindeki müşteriler listeleniyor.

Bir view’ı kullanmak için normal bir tablo gibi sorgulayabilirsiniz:

````sql
SELECT * FROM vw_MusteriListesi;
````

Var olan bir view’ı güncellemek için:

````sql
ALTER VIEW vw_MusteriListesi AS
SELECT MusteriID, Ad, Soyad, Sehir, Email
FROM Musteriler
WHERE Sehir = 'İstanbul';
````

Sorunuz varsa veya daha karmaşık bir örnek isterseniz belirtin!
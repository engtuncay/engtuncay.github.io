





[TOC]





### Function

- Scaler function : Bir değer döndürür.
- Table function :



#### Scalar Fonksiyon Örnek (varchar dönüşlü)



```mssql
Create Function dbo.ayadi(@TARIH AS DATETIME)
RETURNS VARCHAR(20)
AS
BEGIN

DECLARE @AYADI AS VARCHAR(20)
IF DATEPART(MONTH,@TARIH)=1 SET @AYADI = '01.OCAK'
IF DATEPART(MONTH,@TARIH)=2 SET @AYADI = '02.SUBAT'
IF DATEPART(MONTH,@TARIH)=3 SET @AYADI = '03.MART'
IF DATEPART(MONTH,@TARIH)=4 SET @AYADI = '04.NİSAN'

RETURN @AYADI

END
```



#### Fonksiyonun Kullanılışı - Test

```mssql
select dbo.ayadi('20180301')
```





## Çeşitli Komutlar

##### SET ANSI_NULLS ON



##### SET QUOTED_IDENTIFIER ON






<!-- TOC -->

- [JOINLER](#joinler)
    - [Outer Join Usage : Draft](#outer-join-usage--draft)
    - [Outer Apply Usage](#outer-apply-usage)
- [Function](#function)
    - [Scalar Function (Değer Döndüren Fonksiyon)](#scalar-function-değer-döndüren-fonksiyon)
    - [Tabular Function](#tabular-function)
    - [Fonksiyonun Çağrılması](#fonksiyonun-çağrılması)
    - [Değişkene Değer Atama](#değişkene-değer-atama)
    - [Fonksiyondan değer atama](#fonksiyondan-değer-atama)
- [Cursor Tanımlama](#cursor-tanımlama)
- [Case When Yapısı](#case-when-yapısı)
- [IIF YAPISI](#iif-yapisi)
- [Çeşitli Komutlar](#çeşitli-komutlar)
    - [SET ANSI_NULLS ON](#set-ansi_nulls-on)
    - [SET QUOTED_IDENTIFIER ON](#set-quoted_identifier-on)

<!-- /TOC -->



[TOC]

## JOINLER

### Outer Join Usage : Draft





### Outer Apply Usage



````sql
select ADRES.adr_temsilci_kodu ,* FROM [CARI_HESAPLAR] SUBECH 
OUTER APPLY (SELECT TOP 1 ADRES1.adr_temsilci_kodu FROM [CARI_HESAP_ADRESLERI] ADRES1 WHERE ADRES1.adr_cari_kod = SUBECH.cari_kod) AS ADRES



````




## Function

- Scaler function : Bir değer döndürür.
- Table function :



### Scalar Function (Değer Döndüren Fonksiyon)

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


### Tabular Function

```
CREATE FUNCTION GetAllProducts(@Category  NVARCHAR(25) )
RETURNS TABLE
AS
RETURN
(SELECT ProductID, ProductName, RetailPrice, Category
FROM CurrentProducts 
WHERE Category = @Category)

```

Kaynaklar
- https://blog.sqlauthority.com/2011/08/26/sql-server-tips-from-the-sql-joes-2-pros-development-series-table-valued-functions-day-26-of-35/




### Fonksiyonun Çağrılması

```mssql
select dbo.ayadi('20180301')
```





### Değişkene Değer Atama 



### Fonksiyondan değer atama

```mssql
select @value = dbo.getNumber()
```



## Cursor Tanımlama

```mssql
-- Sqlserverdaki Veritabanlarını Listeler

DECLARE @name VARCHAR(50) -- database name 

-- Cursor lenecek sorgu yazılır
DECLARE db_cursor CURSOR FOR 
SELECT name 
FROM MASTER.dbo.sysdatabases 
WHERE name NOT IN ('master','model','msdb','tempdb') 

-- Cursor açılır, Cursor sorgusundan dönecek alanlar , hangi değişkene bağlanacağı belirlenir
--, sırasına göre değişkene bağlar, aynı ismi olması gerekmez
OPEN db_cursor  
FETCH NEXT FROM db_cursor INTO @name  

-- döngü gerçekleştirilir
WHILE @@FETCH_STATUS = 0 -- AND [$secondCondition]
BEGIN  
    PRINT 'DB : ' + @name
    FETCH NEXT FROM db_cursor INTO @name 
END 

-- cursor kapatılır , deallocate edilir
CLOSE db_cursor  
DEALLOCATE db_cursor 


```

Output

```
DB : MikroDB_V15 
	
DB : MikroDB_V15_TEMP 	
DB : MikroDB_V15_OZPASTEST 	
DB : MikroDB_V15_OZPASTEST_LOGDATA 	
DB : OZPASENTEGRE 	
	DB : ENTEGRE_CRM 	
	DB : ENTEGRE_ERP 	
	DB : AKTARIM_TESTOZPAS 	
	DB : MikroDB_V15_OZPASDEMO 	
	DB : MikroDB_V15_OZPASDEMO_LOGDATA 	
	DB : MikroDB_V15_KRAFTDEMO 	
	DB : MikroDB_V15_KRAFTDEMO_LOGDATA 	
	DB : MikroDB_V15_OZPASTESTDEV 	
	DB : MikroDB_V15_OZPASTESTDEV2 	
	DB : MikroDB_V15_OZPASTESTDEV_LOGDATA 	
	DB : MikroDB_V15_KRAFTDEV 	
	DB : MikroDB_V15_KRAFTDEV_LOGDATA 
	
	Total execution time: 00:00:00.064
```





## Case When Yapısı

That format requires you to use either:

```sql
CASE ebv.db_no 
  WHEN 22978 THEN 'WECS 9500' 
  WHEN 23218 THEN 'WECS 9500'  
  WHEN 23219 THEN 'WECS 9500' 
  ELSE 'WECS 9520' 
END as wecs_system 
```

Otherwise, use:

```sql
CASE  
  WHEN ebv.db_no IN (22978, 23218, 23219) THEN 'WECS 9500' 
  ELSE 'WECS 9520' 
END as wecs_system 
```



## IIF YAPISI

```sql
SELECT [ID],[NAME],[STATUS],IIF([STATUS]='Active', 1,0) [Boolean Status]
FROM tbl_sample
```



## Çeşitli Komutlar

### SET ANSI_NULLS ON



### SET QUOTED_IDENTIFIER ON




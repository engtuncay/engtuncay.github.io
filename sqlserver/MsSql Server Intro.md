

<!-- TOC -->

- [SQL TEMEL SORGULAR](#sql-temel-sorgular)
  - [SELECT](#select)
  - [UPDATE](#update)
    - [UPDATE JOIN](#update-join)
  - [DELETE](#delete)
    - [DELETE WITH JOIN](#delete-with-join)
- [SQL JOINLER](#sql-joinler)
  - [JOINLER](#joinler)
    - [Outer Join Usage : Draft](#outer-join-usage--draft)
    - [Outer Apply Usage](#outer-apply-usage)
- [SQL EXTENSIONS](#sql-extensions)
  - [Function](#function)
    - [Scalar Function (Tek Değer Döndüren Fonksiyon)](#scalar-function-tek-de%C4%9Fer-d%C3%B6nd%C3%BCren-fonksiyon)
    - [Tabular Function](#tabular-function)
    - [Fonksiyonun Çağrılması](#fonksiyonun-%C3%A7a%C4%9Fr%C4%B1lmas%C4%B1)
    - [Değişkene Değer Atama](#de%C4%9Fi%C5%9Fkene-de%C4%9Fer-atama)
    - [Fonksiyondan değer atama](#fonksiyondan-de%C4%9Fer-atama)
  - [Stored Procedure](#stored-procedure)
  - [Cursor Tanımlama](#cursor-tan%C4%B1mlama)
  - [Case When Yapısı](#case-when-yap%C4%B1s%C4%B1)
  - [IIF YAPISI](#iif-yapisi)
  - [Temp Table](#temp-table)
  - [Global Değişkenler](#global-de%C4%9Fi%C5%9Fkenler)
  - [Çeşitli Komutlar](#%C3%A7e%C5%9Fitli-komutlar)
    - [SET ANSI_NULLS ON](#set-ansinulls-on)
    - [SET QUOTED_IDENTIFIER ON](#set-quotedidentifier-on)
- [TSQL](#tsql)
  - [IF Kullanımı](#if-kullan%C4%B1m%C4%B1)
- [SQL GÜVENLİK - KULLANICI SORGULAR](#sql-g%C3%BCvenli%CC%87k---kullanici-sorgular)
- [SQL LOGGING](#sql-logging)
  - [RaiseError](#raiseerror)
  - [Kayıt Edilen Sayısını Bastırma](#kay%C4%B1t-edilen-say%C4%B1s%C4%B1n%C4%B1-bast%C4%B1rma)

<!-- /TOC -->



[TOC]

# SQL TEMEL SORGULAR

## SELECT

## UPDATE

### UPDATE JOIN

```
Update Tb1 SET Tb1.Column1=100 FROM myTableA Tb1 
LEFT JOIN myTableB Tb2 ON Tb1.ID=Tb2.ID

```

Özet Syntax
```
Update alias SET alias.col=... (select sorgusunun FROM ve devamı eklenir)
```



## DELETE

### DELETE WITH JOIN

```sql
DELETE w
FROM WorkRecord2 w
INNER JOIN Employee e ON EmployeeRun=EmployeeNo
WHERE Company = '1' AND Date = '2013-05-06'
```

Syntax
```sql
DELETE alias FROM mytbl alias
INNER JOIN ...normal select sql devam ediyor...

```




# SQL JOINLER

## JOINLER

### Outer Join Usage : Draft





### Outer Apply Usage



The APPLY operator allows you to join two table expressions; the right table expression is processed every time for each row from the left table expression. As you might have guessed, the left table expression is evaluated first and then the right table expression is evaluated against each row of the left table expression for the final result set. The final result set contains all the selected columns from the left table expression followed by all the columns of the right table expression.(*source1)

SQL Server APPLY operator has two variants; CROSS APPLY and OUTER APPLY
- The CROSS APPLY operator returns only those rows from the left table expression (in its final output) if it matches with the right table expression. In other words, the right table expression returns rows for the left table expression match only.(*source1)

- The OUTER APPLY operator returns all the rows from the left table expression irrespective of its match with the right table expression. For those rows for which there are no corresponding matches in the right table expression, it contains NULL values in columns of the right table expression.(*source1)

> So you might conclude, **the CROSS APPLY is equivalent to an INNER JOIN** (or to be more precise its like a CROSS JOIN with a correlated sub-query) with an implicit join condition of 1=1 whereas **the OUTER APPLY is equivalent to a LEFT OUTER JOIN**. (*source1)

source1 : https://www.mssqltips.com/sqlservertip/1958/sql-server-cross-apply-and-outer-apply/


````sql
select ADRES.adr_temsilci_kodu ,* FROM [CARI_HESAPLAR] SUBECH 
OUTER APPLY (SELECT TOP 1 ADRES1.adr_temsilci_kodu FROM [CARI_HESAP_ADRESLERI] ADRES1 WHERE ADRES1.adr_cari_kod = SUBECH.cari_kod) AS ADRES


````


# SQL EXTENSIONS

## Function

- Scaler function : Bir değer döndürür.
- Table function :



### Scalar Function (Tek Değer Döndüren Fonksiyon)

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


## Stored Procedure


```sql
CREATE PROC SP_UPT_MAAS
( @bolum nvarchar(10) )
WITH ENCRYPTION
AS
BEGIN
UPDATE dbo.Calisanlar SET maas = maas * 1.20 WHERE bolum=@bolum (1)
END

```

Kullanımı
```sql
exec IletisimUnvani @ContactTitle  = 'Owner';
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
SELECT id,name,status,IIF( status='Active', 1,0) [Boolean Status]
FROM tbl_sample
```


## Temp Table

```sql

create table #Temp (sira int)
insert into #Temp values (34463),(34464),(34465),(34466),(34467),(34468

SELECT Tp.sira, Chh2.sayi FROM #Temp Tp
OUTER APPLY ( SELECT count(*)  as sayi FROM CARI_HESAP_HAREKETLERI Chh
WHERE Chh.cha_evrakno_sira=Tp.sira AND Chh.cha_evrak_tip = @chh_evraktip 
AND Chh.cha_evrakno_seri= @seri) as Chh2


-- işlem sonra temp table silinir
Drop Table #Temp

```


## Global Değişkenler

- @@ROWCOUNT 

Ne kadar satır etkilendiğini gösterir

```
-- varchar çevrilir , print de string kullanmak 
CAST( @@ROWCOUNT as varchar(10))
için
```




## Çeşitli Komutlar

### SET ANSI_NULLS ON



### SET QUOTED_IDENTIFIER ON




# TSQL 

## IF Kullanımı

```sql
IF (kosul)
  BEGIN
    --Eğer koşulumuz doğru ise bu alandaki ifademiz çalışır.
  END
ELSE
  BEGIN
    --Eğer koşulumuz doğru değilse bu alandaki ifademiz çalışır.
  END
```

```sql
declare @Toplam int
--1- Bu bir kural değil ama standart olan ilk önce değişkeni tanımlamaktır.
select @Toplam = count( * ) from Person.Contact where FirstName like '%b%'
--2- Burada tablomuzdaki FirstName kolonunda içinde b harfi olan kayıtların toplamını değişkene aktarıyoruz.

if(@Toplam > 2000)
  begin
    print 'Fazla Kayıt Var!'
  end
else if(@Toplam < 2000)
  begin
    print 'Az Kayıt Var!'
  end
else
  begin
    print 'Az Kayıt Var!'
  end
```

```sql
IF((SELECT COUNT( * ) FROM Person.Contact WHERE FirstName LIKE '%b%') > 2000)
begin
  print '2000'den Fazla Kayıt Var!'
end
```

```sql
IF((SELECT COUNT( * ) FROM Production.Product WHERE ListPrice > 0 AND Color IS NOT NULL) > 100)
BEGIN
  print 'Çok fazla kayıt var.'
END
ELSE
BEGIN
  print 'Çok az kayıt var.'
END
```


# SQL GÜVENLİK - KULLANICI SORGULAR



# SQL LOGGING

## RaiseError

```sql

RAISERROR('Hiç bir sayı sıfıra bölünemez, hata oluştu',0,1);

DECLARE @MaxAmount int = 16;
DECLARE @minAmount int = 1;
Raiserror('Total Amount should be less than %d and Greater than %d',@MaxAmount,@MinAmount)

RAISERROR('SAYISI %d',@MUSTSAYI,0,1);
```

**Ek Kaynak**

https://docs.microsoft.com/en-us/sql/t-sql/language-elements/raiserror-transact-sql?view=sql-server-2017

## Kayıt Edilen Sayısını Bastırma


DELETE FROM STOK_HAREKETLERI where sth_evrakno_seri=@seri and sth_evrakno_sira=@sira and sth_evraktip = @sth_evraktip 
PRINT  'STOK HAREKETLERİ - DELETED RECORDS :' + CAST( @@ROWCOUNT as varchar(10))



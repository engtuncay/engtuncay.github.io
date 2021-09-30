

- [SQL TEMEL SORGULAR](#sql-temel-sorgular)
  - [SELECT](#select)
  - [UPDATE](#update)
    - [UPDATE JOIN](#update-join)
  - [DELETE](#delete)
    - [DELETE WITH JOIN](#delete-with-join)
  - [INSERT](#insert)
- [SQL JOINLER](#sql-joinler)
  - [JOINLER](#joinler)
    - [Outer Join Usage : Draft](#outer-join-usage--draft)
    - [Outer Apply Usage](#outer-apply-usage)
    - [Cross Join (Cartesian Product of the joined tables)](#cross-join-cartesian-product-of-the-joined-tables)
- [SQL EXTENSIONS](#sql-extensions)
  - [Function](#function)
    - [Scalar Function (Tek Değer Döndüren Fonksiyon)](#scalar-function-tek-değer-döndüren-fonksiyon)
    - [Tabular Function](#tabular-function)
    - [Fonksiyonun Çağrılması](#fonksiyonun-çağrılması)
    - [Değişkene Değer Atama](#değişkene-değer-atama)
    - [Fonksiyondan değer atama](#fonksiyondan-değer-atama)
  - [Stored Procedure](#stored-procedure)
  - [Cursor Tanımlama](#cursor-tanımlama)
  - [Case When Yapısı](#case-when-yapısı)
  - [IIF YAPISI](#iif-yapisi)
  - [Temp Table](#temp-table)
  - [Global Değişkenler](#global-değişkenler)
  - [Çeşitli Komutlar](#çeşitli-komutlar)
    - [SET ANSI_NULLS ON](#set-ansi_nulls-on)
    - [SET QUOTED_IDENTIFIER ON](#set-quoted_identifier-on)
- [TSQL](#tsql)
  - [IF Kullanımı](#if-kullanımı)
  - [WITH ile döngüsel sıralamalı tarih tablosu hazırlama](#with-ile-döngüsel-sıralamalı-tarih-tablosu-hazırlama)
  - [Convert Int To Date](#convert-int-to-date)
  - [COALESCE (The first non-null value)](#coalesce-the-first-non-null-value)
- [SQL GÜVENLİK - KULLANICI SORGULAR](#sql-güvenli̇k---kullanici-sorgular)
- [SQL LOGGING](#sql-logging)
  - [RaiseError](#raiseerror)
  - [Kayıt Edilen Sayısını Bastırma](#kayıt-edilen-sayısını-bastırma)

# SQL TEMEL SORGULAR

## SELECT

## UPDATE

### UPDATE JOIN

```sql
Update Tb1 SET Tb1.Column1=100 FROM myTableA Tb1 
LEFT JOIN myTableB Tb2 ON Tb1.ID=Tb2.ID
```

Özet Syntax
```sql
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
INNER JOIN 
WHERE ...

```

## INSERT

Syntax

```sql
INSERT INTO table_name (column1, column2, column3, ...)
VALUES (value1, value2, value3, ...);
```

If you are adding values for all the columns of the table, you do not need to specify the column names in the SQL query. However, make sure the order of the values is in the same order as the columns in the table. The INSERT INTO syntax would be as follows:

```sql
INSERT INTO table_name
VALUES (value1, value2, value3, ...);
```

**Example**
```sql
INSERT INTO Customers (CustomerName, ContactName, Address, City, PostalCode, Country, CustomerNo)
VALUES ('Ahmet Sögüt', 'Ali Sögüt', 'Batıkent Mah', 'Gaziantep', '27000', 'Turkey',10);
```

- Insert with Select Query

```sql
INSERT INTO table1 ( column1, column2, someInt, someVarChar )
SELECT  table2.column1, table2.column2, 8, 'some string etc.'
FROM    table2
WHERE   table2.ID = 7;
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

### Cross Join (Cartesian Product of the joined tables)

The main idea of the CROSS JOIN is that it returns the Cartesian product of the joined tables. In the following tip, we will briefly explain the Cartesian product;

Tip: What is the Cartesian Product?

The Cartesian Product is a multiplication operation in the set theory that generates all ordered pairs of the given sets. Suppose that, A is a set and elements are {a,b} and B is a set and elements are {1,2,3}. The Cartesian Product of these two A and B is denoted AxB and the result will be like the following.

AxB ={(a,1), (a,2), (a,3), (b,1), (b,2), (b,3)}

Syntax
The syntax of the CROSS JOIN in SQL will look like the below syntax:


```sql
SELECT ColumnName_1, 
       ColumnName_2, 
       ColumnName_N
FROM [Table_1]
CROSS JOIN [Table_2]

```
Or we can use the following syntax instead of the previous one. This syntax does not include the CROSS JOIN keyword; only we will place the tables that will be joined after the FROM clause and separated with a comma.

```sql

SELECT ColumnName_1, 
       ColumnName_2, 
       ColumnName_N
FROM [Table_1],[Table_2]
```


# SQL EXTENSIONS

## Function

- Scaler function : Bir değer döndürür.
- Table function :



### Scalar Function (Tek Değer Döndüren Fonksiyon)

```sql
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

```sql
CREATE FUNCTION GetAllProducts(@Category NVARCHAR(25) )
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

```sql
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


-- işlemden sonra temp table silinir
Drop Table #Temp

```


## Global Değişkenler

- @@ROWCOUNT 

Ne kadar satır etkilendiğini gösterir

```sql
-- varchar çevrilir , print de string kullanmak 
CAST(@@ROWCOUNT as varchar(10))

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

Örnek
```sql
declare @Toplam int
--1- Bu bir kural değil ama standart olan ilk önce değişkeni tanımlamaktır.

select @Toplam = count(*) from Person.Contact where FirstName like '%b%'
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

Örnek
```sql
IF((SELECT COUNT( * ) FROM Person.Contact WHERE FirstName LIKE '%b%') > 2000)
begin
  print '2000'den Fazla Kayıt Var!'
end
```

Örnek
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

## WITH ile döngüsel sıralamalı tarih tablosu hazırlama


```sql
WITH mycte AS ( 
	SELECT CAST(@dtBas AS DATETIME) calc_date
	UNION ALL
	SELECT calc_date + 1
	FROM mycte
	WHERE calc_date + 1 <= @dtSon
)

SELECT *
FROM mycte
OPTION (MAXRECURSION 0)

-- Output Sample (dtBas:20210701)
-- 2021-07-01 00:00:00.000
-- 2021-07-02 00:00:00.000
-- 2021-07-03 00:00:00.000
-- 2021-07-04 00:00:00.000
-- 2021-07-05 00:00:00.000
-- ...

```

## Convert Int To Date

```sql
--Way 1
Select cast(cast(20160729 as varchar(10)) as date)
Returns

--2016-07-29

--Way 2
Select cast(left(20160729,8) as date)
```

```sql
select CONVERT(date,cast(20210717 as varchar(10)))

--
```

## COALESCE (The first non-null value)

- Definition and Usage

The COALESCE() function returns the first non-null value in a list.

- Syntax

COALESCE(val1, val2, ...., val_n)

- Parameter Values , Parameter	Description

val1, val2, val_n	Required. The values to test

- Example

SELECT COALESCE(NULL, NULL, NULL, 'W3Schools.com', NULL, 'Example.com');



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


```sql

DELETE FROM STOK_HAREKETLERI where sth_evrakno_seri=@seri and sth_evrakno_sira=@sira and sth_evraktip = @sth_evraktip 
PRINT  'STOK HAREKETLERİ - DELETED RECORDS :' + CAST( @@ROWCOUNT as varchar(10))
```



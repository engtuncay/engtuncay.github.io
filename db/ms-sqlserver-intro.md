

- [Reference Sources](#reference-sources)
- [SQL TEMEL SORGULAR](#sql-temel-sorgular)
  - [SELECT](#select)
  - [UPDATE](#update)
    - [UPDATE JOIN](#update-join)
  - [DELETE](#delete)
    - [DELETE WITH JOIN](#delete-with-join)
  - [INSERT](#insert)
  - [CREATE TABLE](#create-table)
  - [ALTER TABLE](#alter-table)
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
    - [Case When Multiple Values](#case-when-multiple-values)
  - [IIF YAPISI](#iif-yapisi)
  - [Temp Table](#temp-table)
  - [Global Değişkenler](#global-değişkenler)
  - [Çeşitli Komutlar](#çeşitli-komutlar)
    - [SET ANSI\_NULLS ON](#set-ansi_nulls-on)
    - [SET QUOTED\_IDENTIFIER ON](#set-quoted_identifier-on)
- [TSQL](#tsql)
  - [Sql Variables: Basics and Usage](#sql-variables-basics-and-usage)
  - [Sql Operators](#sql-operators)
    - [Arithmetic Operators](#arithmetic-operators)
    - [Logical Operators](#logical-operators)
    - [Comparison Operators](#comparison-operators)
  - [IF Kullanımı](#if-kullanımı)
  - [WITH ile döngüsel sıralamalı tarih tablosu hazırlama](#with-ile-döngüsel-sıralamalı-tarih-tablosu-hazırlama)
  - [Convert Int To Date](#convert-int-to-date)
  - [COALESCE (The first non-null value)](#coalesce-the-first-non-null-value)
- [SQL GÜVENLİK - KULLANICI SORGULAR](#sql-güvenli̇k---kullanici-sorgular)
- [SQL LOGGING](#sql-logging)
  - [RaiseError](#raiseerror)
  - [Kayıt Edilen Sayısını Bastırma](#kayıt-edilen-sayısını-bastırma)


# Reference Sources

- https://www.tutlane.com/tutorial/sql-server/sql-introduction




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

## CREATE TABLE


## ALTER TABLE




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

### Case When Multiple Values

```sql
select
chh.cha_evrakno_seri
,chh.cha_evrakno_sira
,chh.cha_evrak_tip
,CASE WHEN chh.cha_evrak_tip IN (110,33) THEN sum(cha_meblag)/2 
ELSE sum(cha_meblag) END AS cha_meblag
,MIN(cha_tarihi)cha_tarihi
,MIN(cha_belge_tarih)cha_belge_tarih
,MIN(chh.cha_RECno) cha_RECno
,MAX(chh.cha_aciklama) cha_aciklama
,MAX(cha_belge_no) cha_belge_no
FROM CARI_HESAP_HAREKETLERI chh
GROUP BY chh.cha_evrakno_seri, chh.cha_evrakno_sira,chh.cha_evrak_tip

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

## Sql Variables: Basics and Usage

Source : sqlshack.com/sql-variables-basics-and-usage/

November 18, 2019 by Esat Erkec

In this article, we will learn the notions and usage details of the SQL variable. In SQL Server, local variables are used to store data during the batch execution period. The local variables can be created for different data types and can also be assigned values. Additionally, variable assigned values can be changed during the execution period. The life cycle of the variable starts from the point where it is declared and has to end at the end of the batch. On the other hand, If a variable is being used in a stored procedure, the scope of the variable is limited to the current stored procedure. In the next sections, we will reinforce this theoretical information with various examples

Note: In this article examples, the sample AdventureWorks database is used.

🔔 SQL Variable declaration

The following syntax defines how to declare a variable:

```sql
DECLARE { @LOCAL_VARIABLE data_type [ = value ] }

```

Now, let’s interpret the above syntax.

Firstly, if we want to use a variable in SQL Server, we have to declare it. The DECLARE statement is used to declare a variable in SQL Server. In the second step, we have to specify the name of the variable. Local variable names have to start with an at (@) sign because this rule is a syntax necessity. Finally, we defined the data type of the variable. The value argument which is indicated in the syntax is an optional parameter that helps to assign an initial value to a variable during the declaration. On the other hand, we can assign or replace the value of the variable on the next steps of the batch. If we don’t make any initial value assigned to a variable, it is initialized as NULL.

The following example will declare a variable whose name will be `@VarValue` and the data type will be varchar. At the same time, we will assign an initial value which is ‘Save Our Planet’:

```sql
DECLARE @TestVariable AS VARCHAR(100)='Save Our Planet'
PRINT @TestVariable

```

Declaring a SQL variable with initial value

Assigning a value to SQL Variable

SQL Server offers two different methods to assign values into variables except for initial value assignment. The first option is to use the SET statement and the second one is to use the SELECT statement. In the following example, we will declare a variable and then assign a value with the help of the SET statement:

```sql
DECLARE @TestVariable AS VARCHAR(100)
SET @TestVariable = 'One Planet One Life'
PRINT @TestVariable

```

🔔 Assigning  a value to SQL variable through SET statement

In the following example, we will use the SELECT statement in order to assign a value to a variable:

```sql
DECLARE @TestVariable AS VARCHAR(100)
SELECT @TestVariable = 'Save the Nature'
PRINT @TestVariable

```
 
🔔 Assigning  a value to SQL Variable through SELECT statement

Additionally, the SELECT statement can be used to assign a value to a variable from table, view or scalar-valued functions. Now, we will take a glance at this usage concept through the following example:

```sql
DECLARE @PurchaseName AS NVARCHAR(50)
SELECT @PurchaseName = [Name]
FROM [Purchasing].[Vendor]
WHERE BusinessEntityID = 1492
PRINT @PurchaseName

```

🔔 Assigning  a value to SQL Variable from a table

As can be seen, the `@PurchaseName` value has been assigned from the Vendor table.

Now, we will assign a value to variable from a scalar-valued function:

```sql
DECLARE @StockVal AS INT
SELECT @StockVal=dbo.ufnGetStock(1)
SELECT @StockVal AS [VariableVal]

```

Assigning  a value to SQL Variable from a scalar-valued function

Multiple SQL Variables

For different cases, we may need to declare more than one variable. In fact, we can do this by declaring each variable individually and assigned a value for every parameter:

```sql
DECLARE @Variable1 AS VARCHAR(100)
DECLARE @Variable2 AS UNIQUEIDENTIFIER
SET @Variable1 = 'Save Water Save Life'
SET @Variable2= '6D8446DE-68DA-4169-A2C5-4C0995C00CC1'
PRINT @Variable1
PRINT @Variable2

```

🔔 Multiple SQL variables 

This way is tedious and inconvenient. However, we have a more efficient way to declare multiple variables in one statement. We can use the DECLARE statement in the following form so that we can assign values to these variables in one SELECT statement:

```sql
DECLARE @Variable1 AS VARCHAR(100), @Variable2 AS UNIQUEIDENTIFIER
SELECT @Variable1 = 'Save Water Save Life' , @Variable2= '6D8446DE-68DA-4169-A2C5-4C0995C00CC1'
PRINT @Variable1
PRINT @Variable2

```

🔔 Multiple SQL Variables usage with SELECT statement

Also, we can use a SELECT statement in order to assign values from tables to multiple variables:

```sql
DECLARE @VarAccountNumber AS NVARCHAR(15)
,@VariableName AS NVARCHAR(50)
SELECT @VarAccountNumber=AccountNumber , @VariableName=Name
FROM [Purchasing].[Vendor]
WHERE BusinessEntityID = 1492
PRINT @VarAccountNumber
PRINT @VariableName

```

Multiple SQL  variable usage

Useful tips about the SQL Variables

Tip 1: As we mentioned before, the local variable scope expires at the end of the batch. Now, we will analyze the following example of this issue:

```sql
DECLARE @TestVariable AS VARCHAR(100)
SET @TestVariable = 'Think Green'
GO
PRINT @TestVariable

```

SQL variable scope problem

The above script generated an error because of the GO statement. GO statement determines the end of the batch in SQL Server thus @TestVariable lifecycle ends with GO statement line. The variable which is declared above the GO statement line can not be accessed under the GO statement. However, we can overcome this issue by carrying the variable value with the help of the temporary tables:

```sql
IF OBJECT_ID('tempdb..#TempTbl') IS NOT NULL DROP TABLE #TempTbl
DECLARE @TestVariable AS VARCHAR(100)
SET @TestVariable = 'Hello World'
SELECT @TestVariable AS VarVal INTO #TempTbl
GO
DECLARE @TestVariable AS VARCHAR(100)
SELECT @TestVariable = VarVal FROM #TempTbl
PRINT @TestVariable

```

SQL variable usage in the diffrent scopes

Tip 2: Assume that, we assigned a value from table to a variable and the result set of the SELECT statement returns more than one row. The main issue at this point will be which row value is assigned to the variable. In this circumstance, the assigned value to the variable will be the last row of the resultset. In the following example, the last row of the resultset will be assigned to the variable:

```sql
SELECT AccountNumber 
FROM [Purchasing].[Vendor]
ORDER BY BusinessEntityID 
        
DECLARE @VarAccountNumber AS NVARCHAR(15)
SELECT @VarAccountNumber=AccountNumber 
FROM [Purchasing].[Vendor]
order by BusinessEntityID 
SELECT @VarAccountNumber AS VarValue

```

Value assignment to SQL variable from a table which has multiple rows

Tip 3: If the variable declared data types and assigned value data types are not matched, SQL Server makes an implicit conversion in the value assignment process, if it is possible. The lower precedence data type is converted to the higher precedence data type by the SQL Server but this operation may lead to data loss. For the following example, we will assign a float value to the variable but this variable data type has declared as an integer:

```sql
DECLARE @FloatVar AS FLOAT = 12312.1232
DECLARE @IntVar AS INT
SET @IntVar=@FloatVar
PRINT  @IntVar

```

SQL variable implicit conversion

Conclusion

In this article, we have explored the concept of SQL variables from different perspectives, and we also learned how to define a variable and how to assign a value(s) to it.

See more

ApexSQL Complete is a SQL code complete tool that includes features like code snippets, SQL auto-replacements, tab navigation, saved queries and more for SSMS and Visual Studio



## Sql Operators

In SQL, operator is a symbol which is used to specify a particular action that is performed on one or more expressions. Generally, we will use these operators in SQL statements to perform a logical or arithmetic or comparison operations. 

In SQL we have a different type of operators available, those are 

SQL Arithmetic Operators
SQL Logical Operators
SQL Comparison Operators
SQL Assignment Operators

### Arithmetic Operators

In SQL, arithmetic operators are useful to perform mathematical operations like addition ( ), subtraction (-), multiplication (*), division (/), module (%) on SQL statements. In SQL, we have a different type of arithmetic operators available, those are 

SQL Addition (+) Operator
SQL Subtraction (-) Operator
SQL Multiplication (*) Operator
SQL Division (/) Operator
SQL Modulus (-) Operator

### Logical Operators

In SQL, logical operators are useful to perform some conditional and comparison checks in SQL statements. In logical operators we have a different type of operators available, those are 

AND Operator
OR Operator
LIKE Operator
IN Operator
BETWEEN Operator
Exists Operator
NOT Operator
SOME Operator
ALL Operator
ANY Operator
For more information related to logical operators in SQL server check following information

```text
Operator	Description
AND	The AND operator in SQL is used to compare data with more than one condition. If all the conditions return TRUE then only it will display records.
OR	The OR operator in SQL is used to compare data with more than one condition. If either of the condition is TRUE it will return data.
ALL	The ALL operator in SQL returns true when value matches all values in a single column set of values. It’s like AND operator it will compare the value against all values in column.
ANY	The Any operator in SQL returns true when the value matches any value in single column set of values. It’s like an OR operator and it will compare value against any value in the column.
LIKE	The LIKE operator in SQL is used to search for character string with the specified pattern using wildcards in a column.
IN	The IN operator in SQL is used to search for specified value matches any value in set of multiple values.
BETWEEN	The BETWEEN operator in SQL is used to get values within a range.
EXISTS	The EXISTS operator in SQL is used to show the result if the subquery returns data.
NOT	The NOT operator in SQL is a negate operator that means it will show data for opposite of conditions that we mentioned in SQL statement.
SOME	The SOME operator in SQL is used to compare value with a single column set of values returned by subquery. SOME must match at least one value in a subquery and that value must be preceded by comparison operators.

```

### Comparison Operators

In SQL, the comparison operators are useful to compare one expression with another expression using mathematical operators like equal (=), greater than (>), less than (*), greater than or equal to (>=), less than or equal to (<=), not equal (<>), etc. on SQL statements. In SQL, we have a different type of comparison operators available those are 

SQL Equal (=) Operator
SQL Not Equal (!= or <>) Operator
SQL Greater Than (>) Operator
SQL Less Than (<) Operator
SQL Greater Than or Equal To (>=) Operator
SQL Less Than or Equal To (<=) Operator
SQL Not Less Than (!<) Operator
SQL Not Greater Than (!>) Operator

Source : 

https://www.tutlane.com/tutorial/sql-server/sql-comparison-operators



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
IF((SELECT COUNT(*) FROM Person WHERE FirstName LIKE '%b%') > 2000)
begin
  print '2000'den Fazla Kayıt Var!'
end
```

Örnek
```sql
IF((SELECT COUNT(*) FROM Production.Product WHERE ListPrice > 0 AND Color IS NOT NULL) > 100)
BEGIN
  print 'Çok fazla kayıt var.'
END
ELSE
BEGIN
  print 'Çok az kayıt var.'
END

```

```sql

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



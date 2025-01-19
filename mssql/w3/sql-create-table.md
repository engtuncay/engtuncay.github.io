
Source : 

- [SQL CREATE TABLE Statement](#sql-create-table-statement)
  - [The SQL CREATE TABLE Statement](#the-sql-create-table-statement)
  - [Create Table Using Another Table](#create-table-using-another-table)
  - [Example Sqlserver](#example-sqlserver)
  - [Article CREATE TABLE in SQL Server – Guide With Examples - Jane Williams](#article-create-table-in-sql-server--guide-with-examples---jane-williams)
    - [CREATE TABLE with a primary key](#create-table-with-a-primary-key)
    - [CREATE TABLE with a foreign key](#create-table-with-a-foreign-key)
    - [CREATE TABLE from another table](#create-table-from-another-table)
    - [CREATE TABLE if not exists](#create-table-if-not-exists)
    - [CREATE temp TABLE](#create-temp-table)
  - [Sqlserver Full Syntax](#sqlserver-full-syntax)


# SQL CREATE TABLE Statement

## The SQL CREATE TABLE Statement

The CREATE TABLE statement is used to create a new table in a database.

Syntax

```sql
CREATE TABLE table_name (
    column1 datatype,
    column2 datatype,
    column3 datatype,
   ....
);

```

`The column parameters` specify the names of the columns of the table.

`The datatype parameter` specifies the type of data the column can hold (e.g. varchar, integer, date, etc.).

Tip: For an overview of the available data types, go to our complete Data Types Reference.

*SQL CREATE TABLE Example*

The following example creates a table called "Persons" that contains five columns: PersonID, LastName, FirstName, Address, and City:

Example

```sql
CREATE TABLE Persons (
    PersonID int,
    LastName varchar(255),
    FirstName varchar(255),
    Address varchar(255),
    City varchar(255)
);

```

The PersonID column is of type int and will hold an integer.

The LastName, FirstName, Address, and City columns are of type varchar and will hold characters, and the maximum length for these fields is 255 characters.

The empty "Persons" table will now look like this:

```
PersonID	LastName	FirstName	Address	City

```

## Create Table Using Another Table

A copy of an existing table can also be created using CREATE TABLE.

The new table gets the same column definitions. All columns or specific columns can be selected.

If you create a new table using an existing table, the new table will be filled with the existing values from the old table.

Syntax

```sql
CREATE TABLE new_table_name AS
    SELECT column1, column2,...
    FROM existing_table_name
    WHERE ....;

```

The following SQL creates a new table called "TestTables" (which is a copy of the "Customers" table): 

Example

```sql
CREATE TABLE TestTable AS
SELECT customername, contactname
FROM customers;

```

Test Yourself With Exercises

Exercise:

Write the correct SQL statement to create a new table called Persons.

```sql
 (
  PersonID int,
  LastName varchar(255),
  FirstName varchar(255),
  Address varchar(255),
  City varchar(255) 
);

```

## Example Sqlserver

```sql
CREATE TABLE dbo.PurchaseOrderDetail (
    PurchaseOrderID INT NOT NULL,
    LineNumber SMALLINT NOT NULL,
    ProductID INT NULL,
    UnitPrice MONEY NULL,
    OrderQty SMALLINT NULL,
    ReceivedQty FLOAT NULL,
    RejectedQty FLOAT NULL,
    DueDate DATETIME NULL
);
```

## Article CREATE TABLE in SQL Server – Guide With Examples - Jane Williams

May 26, 2023

Source : https://blog.devart.com/create-table-in-sql-server.html

Creating a table is the core of the database design. Data is stored in tables, and the table structure with internal relations allows us to organize that data effectively. It is impossible to work with databases without creating and configuring tables, and it is one of the fundamental skills for all database professionals.

There are standard methods of creating tables and tips that help us to do it faster and ensure accuracy. This article aims to review these methods and tips on Microsoft’s SQL Server – the data platform and one of the world’s most popular database management systems.

The basics of creating database tables
The syntax of the CREATE TABLE query

- CREATE TABLE with a primary key
- CREATE TABLE with a foreign key
- CREATE TABLE from another table
- CREATE TABLE if not exist
- CREATE temp TABLE

The basics of creating database tables
The database table is a structure that contains data organized by rows and columns. Tables have descriptive names. Table columns also have specific names. Besides, each column is assigned the data type that defines which values that column can store.

MS SQL Server provides the following options for creating tables:

The CREATE TABLE command: It is the standard method used to create an SQL Server table. Here we can specify columns, data types, set constraints, and define other table properties. Besides, it allows the developers to save the script and reuse it whenever needed, even automatically.

The SELECT AS/SELECT INTO command: This method creates a new table from the existing one based on the SELECT query result set. The resulting table inherits the structure of the “source” table, whether or not it contains any records. This method provides a convenient way to generate a new table with the same structure as the original one.

GUI-based software tools (SSMS or third-party solutions): Graphical user interfaces are favored by both database experts and regular users as they streamline all processes and eliminate errors caused by manual coding. SQL Server Management Studio (SSMS) is the default solution provided by Microsoft.

This article will demonstrate how to create new tables on SQL Server with dedicated scripts. However, we’ll also utilize GUI tools to illustrate the work – we appeal to dbForge Studio for SQL Server, a more powerful and robust alternative to SSMS that allows us to design database tables in several clicks.

The syntax of the CREATE TABLE statement

The basic syntax we use to create a new table on SQL Server is:

```sql
CREATE TABLE [database_name.][schema_name.]table_name (
    column_name1 data_type [NULL | NOT NULL],
    column_name2 data_type [NULL | NOT NULL],
    column_name3 data_type [NULL | NOT NULL],
    ...,
);

```

Note the following parameters:

database_name and schema_name – optional parameters that define respectively the names of the database and the database schema where you are creating the new table. If they aren’t specified explicitly, the query will be executed against the current database and the default schema of that database.

table_name – the name of the table you are creating. The maximum length of the table name is 128 characters (except for the local temporary tables – we’ll review them further in this article). It is recommended to use descriptive names to manage tables easier.

column_name – the name of the column in the table. Most tables contain multiple columns, and we separate column names in the CREATE TABLE script by commas.

data_type – the data type for each column to indicate which values that particular column will store.

NOT NULL – the optional parameter that specifies that the column can not contain NULL values. If it is not set, the column allows having NULL values.

The CREATE TABLE statement can be significantly more intricate and incorporate a wider array of parameters, whereas this syntax represents the simplest variant. But for now, let us see how the basic syntax works.

Assume we want to create a table in a shop database with information about regular customers.

```sql
CREATE TABLE Customers (
First_Name varchar(50) NOT NULL,
Last_Name varchar(50) NOT NULL,
City varchar(50) NOT NULL,
Email varchar(100) NOT NULL,
Phone_Number varchar(20) NOT NULL,
Registration_Date date NOT NULL
);

```

If we don’t insert data into the table at once, it will be empty. That’s why we produce some dummy data and insert it into the table to demonstrate how it looks:

We have created a new table in the existing SQL Server database.

### CREATE TABLE with a primary key

The primary key is a constraint that identifies each table record uniquely. It is not mandatory, but it is present in most tables. Most likely, we’ll need it too.

The primary key has the following characteristics:

- Contains unique values only
- Can be only one on a table
- Can’t contain NULL values
- Consists of one or several columns

To create a table in SQL Server with a primary key, we use the PRIMARY KEY keyword for the respective column after its name and data type:

```sql
CREATE TABLE Customers (
First_Name varchar(50) NOT NULL,
Last_Name varchar(50) NOT NULL,
City varchar(50) NOT NULL,
Email varchar(100) NOT NULL PRIMARY KEY,
Phone_Number varchar(20) NOT NULL,
Registration_Date date NOT NULL
);

```

Setting a primary key is possible for any column or a combination of columns:

```sql
CREATE TABLE Customers (
First_Name varchar(50) NOT NULL,
Last_Name varchar(50) NOT NULL,
Email varchar(100) NOT NULL,
Phone_Number varchar(20) NOT NULL,
CONSTRAINT PK_Customer PRIMARY KEY (Last_Name, Email, Phone_Number)
);

```

In the above example, we create a table with a primary key that involves three columns – the last name, the email address, and the phone number. This combination will be used to identify each record in the table.

### CREATE TABLE with a foreign key

The foreign key constraint is an essential element for relational databases – it creates the relation between tables by referring to the primary key set on a different table. As a result, two tables get linked together.

The table with the primary key is called the parent table, and the table with the foreign key is called the child table. The values used by the foreign key of the child table must exist in the parent table.

It is a common practice to create a table on an SQL server with a foreign key at once to relate it to another table and make the entire schema more organized.

Assume we want to create a table with information about orders placed by customers. It will be a child table for the Customers table, and we’ll have the foreign key on it.

```sql
CREATE TABLE Orders (
Order_ID int NOT NULL PRIMARY KEY,
Customer_ID int NOT NULL FOREIGN KEY REFERENCES Customers(Customer_ID),
Order_Date datetime NOT NULL
);

```

This way, we create a table with a foreign key in SQL server and relate two tables (Orders and Customers). The Order_ID column is the primary key of the Orders table, and the Customer_ID column is the foreign key referencing the Customer_ID column in the parent Customers table.


### CREATE TABLE from another table

Creating a new table in a database from an existing table is common. We use the SELECT…INTO statement for that. It fetches columns from an existing table and inserts them into a new table.

SELECT column1, column2, column3, ...
INTO new_table [IN external_db]
FROM old_table
WHERE condition;

Note the optional parameter IN that allows making a new table in an external database with that command. Also, the WHERE clause can be used to specify which data you want to retrieve and save in a new table.

```sql
SELECT First_Name, Last_Name, City, State
INTO NY
FROM Customer
WHERE State = 'NY';

```

One of the scenarios where SELECT INTO comes in handy is creating empty tables with a specific structure. For that, we add the WHERE clause with the 1 = 0 parameter:

```sql
SELECT column1, column2, column3, ...
INTO new_table 
FROM old_table
WHERE 1 = 0;

```

This parameter ensures that the query won’t copy any data from the source table. It will create an empty table with the same structure as the original one, and you can populate its columns with your data.

```sql
SELECT * 
INTO Next_Product
FROM Product
WHERE 1 = 0;

```

However, indexes, constraints, and triggers aren’t transferred through SELECT INTO. If you need them in a new table, you should add them separately.

### CREATE TABLE if not exists

Before creating a new table in a database, checking whether such a table already exists would be helpful. And here the issue is: Microsoft SQL Server does not support the “if not exists” function in the CREATE TABLE queries. Should the database contain the same table, the command to create a new one with the same name will fail.

Is there some alternative to the “create table if not exist” on SQL Server? The recommended solution is the OBJECT_ID() function.

```sql
IF OBJECT_ID(N'table_name', N'U') IS NULL
CREATE TABLE table_name (
    column_name1 data_type [NULL | NOT NULL],
    column_name2 data_type [NULL | NOT NULL],
    column_name3 data_type [NULL | NOT NULL],
    ...,
);

```

In this example, we specify our object – the user-defined table. If this object does not exist in the database, the function returns NULL, which is the condition of creating a new table.

Assume we want a new table called Visitors. Let’s check if it exists before executing the query to create it.

```sql
IF OBJECT_ID(N'Visitors', N'U') IS NULL
CREATE TABLE Visitors (
First_Name VARCHAR(50) NOT NULL,
Last_Name VARCHAR(50) NOT NULL,
Phone VARCHAR(50) NULL,
Email VARCHAR(100) NOT NULL,
City VARCHAR(50) NOT NULL
);

```

Thus, the CREATE TABLE command is successful, and we have a new Visitors table in our database.

### CREATE temp TABLE

On Microsoft’s SQL Server, a temporary (temp) table is a table with some data portion extracted from the regular table and not stored in the memory. While it is possible to use and reuse this table during a particular session, it will be deleted when that session ends or the database connection is terminated.

Temp tables are convenient to work with if we regularly deal with some records kept in the database. We can retrieve that data, process it as needed, and turn it into a temporary table. The table is stored in the tempdb system database, and we can operate it the same way as regular tables. Temp tables are significantly faster in loading data.

To create a temp table on SQL Server, we can use the SELECT INTO command – it is the simplest approach:

```sql
SELECT column1, column2, column3, ...
INTO #new_table
FROM old_table
WHERE condition;

```

Important: The temp table name always starts with the hash symbol (#), and the maximum name length is 116 characters.

```sql
SELECT First_Name, Last_Name, City, State
INTO #California
FROM Customer
WHERE State = 'CA';

```

As you can see, the temp table is successfully created – we can see it in tempdb.


Another way to create a temp table in SQL Server is by using the CREATE TABLE statement. It works in the same way as in the earlier examples of creating regular tables. You only need to begin the table name with the hash symbol (#).

```sql
CREATE TABLE #New_Products (
Product_Name VARCHAR(250) NOT NULL,
Brand VARCHAR(60) NOT NULL
Model_Year SMALLINT NOT NULL,
Delivery_Date DATETIME NOT NULL
);

```

Then, we insert records into this table and work with it as required. When the session is over, the table will be automatedly deleted.

In some work scenarios, we need to create a temporary table on SQL Server and make it accessible to other users. The solution is a global temporary table visible to all users and their sessions.

To create a global temporary table, we use the CREATE TABLE command and mark the table name with two hash symbols: ##table_name.

```sql
CREATE TABLE ##2023_Sales (  
Product_Name VARCHAR(255) NOT NULL,
Brand VARCHAR(55) NOT NULL,
Price MONEY NOT NULL,
Order_ID INT NOT NULL,
Date DATETIME NOT NULL
);

```

Global temporary tables are also stored in the system tempdb database. They remain there until all users who refer to the particular temp table complete their sessions or close connections to the database.

## Sqlserver Full Syntax

Source : https://learn.microsoft.com/en-us/sql/t-sql/statements/create-table-transact-sql?view=sql-server-ver15

```sql
CREATE TABLE
    { database_name.schema_name.table_name | schema_name.table_name | table_name }
    [ AS FileTable ]
    ( {   <column_definition>
        | <computed_column_definition>
        | <column_set_definition>
        | [ <table_constraint> ] [ ,... n ]
        | [ <table_index> ] }
          [ ,... n ]
          [ PERIOD FOR SYSTEM_TIME ( system_start_time_column_name
             , system_end_time_column_name ) ]
      )
    [ ON { partition_scheme_name ( partition_column_name )
           | filegroup
           | "default" } ]
    [ TEXTIMAGE_ON { filegroup | "default" } ]
    [ FILESTREAM_ON { partition_scheme_name
           | filegroup
           | "default" } ]
    [ WITH ( <table_option> [ ,... n ] ) ]
[ ; ]

<column_definition> ::=
column_name <data_type>
    [ FILESTREAM ]
    [ COLLATE collation_name ]
    [ SPARSE ]
    [ MASKED WITH ( FUNCTION = 'mask_function' ) ]
    [ [ CONSTRAINT constraint_name ] DEFAULT constant_expression ]
    [ IDENTITY [ ( seed , increment ) ]
    [ NOT FOR REPLICATION ]
    [ GENERATED ALWAYS AS { ROW | TRANSACTION_ID | SEQUENCE_NUMBER } { START | END } [ HIDDEN ] ]
    [ [ CONSTRAINT constraint_name ] {NULL | NOT NULL} ]
    [ ROWGUIDCOL ]
    [ ENCRYPTED WITH
        ( COLUMN_ENCRYPTION_KEY = key_name ,
          ENCRYPTION_TYPE = { DETERMINISTIC | RANDOMIZED } ,
          ALGORITHM = 'AEAD_AES_256_CBC_HMAC_SHA_256'
        ) ]
    [ <column_constraint> [ ,... n ] ]
    [ <column_index> ]

<data_type> ::=
[ type_schema_name. ] type_name
    [ ( precision [ , scale ] | max |
        [ { CONTENT | DOCUMENT } ] xml_schema_collection ) ]

<column_constraint> ::=
[ CONSTRAINT constraint_name ]
{
   { PRIMARY KEY | UNIQUE }
        [ CLUSTERED | NONCLUSTERED ]
        [ ( <column_name> [ ,... n ] ) ]
        [
            WITH FILLFACTOR = fillfactor
          | WITH ( <index_option> [ ,... n ] )
        ]
        [ ON { partition_scheme_name ( partition_column_name )
            | filegroup | "default" } ]

  | [ FOREIGN KEY ]
        REFERENCES [ schema_name. ] referenced_table_name [ ( ref_column ) ]
        [ ON DELETE { NO ACTION | CASCADE | SET NULL | SET DEFAULT } ]
        [ ON UPDATE { NO ACTION | CASCADE | SET NULL | SET DEFAULT } ]
        [ NOT FOR REPLICATION ]

  | CHECK [ NOT FOR REPLICATION ] ( logical_expression )
}

<column_index> ::=
 INDEX index_name [ CLUSTERED | NONCLUSTERED ]
    [ WITH ( <index_option> [ ,... n ] ) ]
    [ ON { partition_scheme_name ( column_name )
         | filegroup_name
         | default
         }
    ]
    [ FILESTREAM_ON { filestream_filegroup_name | partition_scheme_name | "NULL" } ]

<computed_column_definition> ::=
column_name AS computed_column_expression
[ PERSISTED [ NOT NULL ] ]
[
    [ CONSTRAINT constraint_name ]
    { PRIMARY KEY | UNIQUE }
        [ CLUSTERED | NONCLUSTERED ]
        [
            WITH FILLFACTOR = fillfactor
          | WITH ( <index_option> [ ,... n ] )
        ]
        [ ON { partition_scheme_name ( partition_column_name )
        | filegroup | "default" } ]

    | [ FOREIGN KEY ]
        REFERENCES referenced_table_name [ ( ref_column ) ]
        [ ON DELETE { NO ACTION | CASCADE } ]
        [ ON UPDATE { NO ACTION } ]
        [ NOT FOR REPLICATION ]

    | CHECK [ NOT FOR REPLICATION ] ( logical_expression )
]

<column_set_definition> ::=
column_set_name XML COLUMN_SET FOR ALL_SPARSE_COLUMNS

<table_constraint> ::=
[ CONSTRAINT constraint_name ]
{
    { PRIMARY KEY | UNIQUE }
        [ CLUSTERED | NONCLUSTERED ]
        ( column_name [ ASC | DESC ] [ ,... n ] )
        [
            WITH FILLFACTOR = fillfactor
           | WITH ( <index_option> [ ,... n ] )
        ]
        [ ON { partition_scheme_name (partition_column_name)
            | filegroup | "default" } ]
    | FOREIGN KEY
        ( column_name [ ,... n ] )
        REFERENCES referenced_table_name [ ( ref_column [ ,... n ] ) ]
        [ ON DELETE { NO ACTION | CASCADE | SET NULL | SET DEFAULT } ]
        [ ON UPDATE { NO ACTION | CASCADE | SET NULL | SET DEFAULT } ]
        [ NOT FOR REPLICATION ]
    | CHECK [ NOT FOR REPLICATION ] ( logical_expression )

<table_index> ::=
{
    {
      INDEX index_name  [ UNIQUE ] [ CLUSTERED | NONCLUSTERED ]
         ( column_name [ ASC | DESC ] [ ,... n ] )
    | INDEX index_name CLUSTERED COLUMNSTORE
    | INDEX index_name [ NONCLUSTERED ] COLUMNSTORE ( column_name [ ,... n ] )
    }
    [ INCLUDE ( column_name [ ,... n ] ) ]
    [ WHERE <filter_predicate> ]
    [ WITH ( <index_option> [ ,... n ] ) ]
    [ ON { partition_scheme_name ( column_name )
         | filegroup_name
         | default
         }
    ]
    [ FILESTREAM_ON { filestream_filegroup_name | partition_scheme_name | "NULL" } ]

}

<table_option> ::=
{
    [ DATA_COMPRESSION = { NONE | ROW | PAGE }
      [ ON PARTITIONS ( { <partition_number_expression> | <range> }
      [ ,... n ] ) ] ]
    [ XML_COMPRESSION = { ON | OFF }
      [ ON PARTITIONS ( { <partition_number_expression> | <range> }
      [ ,... n ] ) ] ]
    [ FILETABLE_DIRECTORY = <directory_name> ]
    [ FILETABLE_COLLATE_FILENAME = { <collation_name> | database_default } ]
    [ FILETABLE_PRIMARY_KEY_CONSTRAINT_NAME = <constraint_name> ]
    [ FILETABLE_STREAMID_UNIQUE_CONSTRAINT_NAME = <constraint_name> ]
    [ FILETABLE_FULLPATH_UNIQUE_CONSTRAINT_NAME = <constraint_name> ]
    [ SYSTEM_VERSIONING = ON
        [ ( HISTORY_TABLE = schema_name.history_table_name
          [ , DATA_CONSISTENCY_CHECK = { ON | OFF } ]
    ) ]
    ]
    [ REMOTE_DATA_ARCHIVE =
      {
        ON [ ( <table_stretch_options> [ ,... n] ) ]
        | OFF ( MIGRATION_STATE = PAUSED )
      }
    ]
    [ DATA_DELETION = ON
          { (
             FILTER_COLUMN = column_name,
             RETENTION_PERIOD = { INFINITE | number { DAY | DAYS | WEEK | WEEKS
                              | MONTH | MONTHS | YEAR | YEARS }
        ) }
    ]
    [ LEDGER = ON [ ( <ledger_option> [ ,... n ] ) ]
    | OFF
    ]
}

<ledger_option>::=
{
    [ LEDGER_VIEW = schema_name.ledger_view_name  [ ( <ledger_view_option> [ ,... n ] ) ]
    [ APPEND_ONLY = ON | OFF ]
}

<ledger_view_option>::=
{
    [ TRANSACTION_ID_COLUMN_NAME = transaction_id_column_name ]
    [ SEQUENCE_NUMBER_COLUMN_NAME = sequence_number_column_name ]
    [ OPERATION_TYPE_COLUMN_NAME = operation_type_id column_name ]
    [ OPERATION_TYPE_DESC_COLUMN_NAME = operation_type_desc_column_name ]
}

<table_stretch_options> ::=
{
    [ FILTER_PREDICATE = { NULL | table_predicate_function } , ]
      MIGRATION_STATE = { OUTBOUND | INBOUND | PAUSED }
 }

<index_option> ::=
{
    PAD_INDEX = { ON | OFF }
  | FILLFACTOR = fillfactor
  | IGNORE_DUP_KEY = { ON | OFF }
  | STATISTICS_NORECOMPUTE = { ON | OFF }
  | STATISTICS_INCREMENTAL = { ON | OFF }
  | ALLOW_ROW_LOCKS = { ON | OFF }
  | ALLOW_PAGE_LOCKS = { ON | OFF }
  | OPTIMIZE_FOR_SEQUENTIAL_KEY = { ON | OFF }
  | COMPRESSION_DELAY = { 0 | delay [ Minutes ] }
  | DATA_COMPRESSION = { NONE | ROW | PAGE | COLUMNSTORE | COLUMNSTORE_ARCHIVE }
       [ ON PARTITIONS ( { partition_number_expression | <range> }
       [ ,... n ] ) ]
  | XML_COMPRESSION = { ON | OFF }
      [ ON PARTITIONS ( { <partition_number_expression> | <range> }
      [ ,... n ] ) ] ]
}

<range> ::=
<partition_number_expression> TO <partition_number_expression>

```


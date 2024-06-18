
<h2>Php PDO - Mysql Tutorial</h2>

Source : 

---

Contents

- [MySQL Database](#mysql-database)
- [Connecting to MySQL](#connecting-to-mysql)
  - [Open a Connection to MySQL](#open-a-connection-to-mysql)
  - [Close the Connection](#close-the-connection)
- [Creating a MySQL Database](#creating-a-mysql-database)
- [Include database helper scripts (for PDO)](#include-database-helper-scripts-for-pdo)
- [Creating Table](#creating-table)
- [Insert Data](#insert-data)
- [Get Last Inserted ID](#get-last-inserted-id)
- [Transactions - Multiple Records](#transactions---multiple-records)
- [Prepared Statements and Bound Parameters](#prepared-statements-and-bound-parameters)
- [Select Data](#select-data)
- [Delete Data](#delete-data)
- [Update Data](#update-data)
- [Limit Data Selections](#limit-data-selections)

---

# MySQL Database

With PHP, you can connect to and manipulate databases.

MySQL is the most popular database system used with PHP.

What is MySQL?

- MySQL is a database system used on the web
- MySQL is a database system that runs on a server
- MySQL is ideal for both small and large applications
- MySQL is very fast, reliable, and easy to use
- MySQL uses standard SQL
- MySQL compiles on a number of platforms
- MySQL is free to download and use
- MySQL is developed, distributed, and supported by Oracle Corporation
- MySQL is named after co-founder Monty Widenius's daughter: My

The data in a MySQL database are stored in tables. A table is a collection of related data, and it consists of columns and rows.

Databases are useful for storing information categorically. A company may have a database with the following tables:

- Employees
- Products
- Customers
- Orders

*PHP + MySQL Database System*

PHP combined with MySQL are cross-platform (you can develop in Windows and serve on a Unix platform)

🔔 *Database Queries*

A query is a question or a request.

We can query a database for specific information and have a recordset returned.

Look at the following query (using standard SQL):

```sql
SELECT LastName FROM Employees
```

The query above selects all the data in the "LastName" column from the "Employees" table.

To learn more about SQL, please visit our SQL tutorial.

*Download MySQL Database*

If you don't have a PHP server with a MySQL Database, you can download it for free here: http://www.mysql.com
Facts About MySQL Database

MySQL is the de-facto standard database system for web sites with HUGE volumes of both data and end-users (like Facebook, Twitter, and Wikipedia).

Another great thing about MySQL is that it can be scaled down to support embedded database applications.

Look at http://www.mysql.com/customers/ for an overview of companies using MySQL.

# Connecting to MySQL

PHP 5 and later can work with a MySQL database using:

- MySQLi extension (the "i" stands for improved)
- PDO (PHP Data Objects)

Earlier versions of PHP used the MySQL extension. However, this extension was deprecated in 2012.

*Should I Use MySQLi or PDO?*

If you need a short answer, it would be "Whatever you like".

Both MySQLi and PDO have their advantages:

PDO will work on *12 different database systems*, whereas MySQLi will only work with MySQL databases.

So, if you have to switch your project to use another database, PDO makes the process easy. You only have to change the connection string and a few queries. With MySQLi, you will need to rewrite the entire code - queries included.

Both are object-oriented, but MySQLi also offers *a procedural API*.

Both support Prepared Statements. Prepared Statements protect from SQL injection, and are very important for web application security.

*MySQL Examples in Both MySQLi and PDO Syntax*

In this, and in the following chapters we demonstrate three ways of working with PHP and MySQL:

- MySQLi (object-oriented)
- MySQLi (procedural)
- PDO

*MySQLi Installation*

For Linux and Windows: The MySQLi extension is automatically installed in most cases, when php5 mysql package is installed.

For installation details, go to: http://php.net/manual/en/mysqli.installation.php

*PDO Installation*

For installation details, go to: http://php.net/manual/en/pdo.installation.php

## Open a Connection to MySQL

Before we can access data in the MySQL database, we need to be able to connect to the server:

Example (PDO)

```php
<?php
$servername = "localhost";
$username = "username";
$password = "password";

try {
  $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>

```

Note: In the PDO example above we have also specified a database (myDB). PDO require a valid database to connect to. If no database is specified, an exception is thrown ❗.

*Tip:* A great benefit of PDO is that it has an exception class to handle any problems that may occur in our database queries. If an exception is thrown within the try{ } block, the script stops executing and flows directly to the first catch(){ } block.

*Example (MySQLi Object-Oriented)*

```php
<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>

```

Note on the object-oriented example above:

`$connect_error` was broken until PHP 5.2.9 and 5.3.0. If you need to ensure compatibility with PHP versions prior to 5.2.9 and 5.3.0, use the following code instead:

```php
// Check connection
if (mysqli_connect_error()) {
  die("Database connection failed: " . mysqli_connect_error());
}

```

Example (MySQLi Procedural)

```php
<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>

```

## Close the Connection

The connection will be closed automatically when the script ends. To close the connection before, use the following:

```php

//PDO:
$conn = null;

//MySQLi Object-Oriented:
$conn->close();

//MySQLi Procedural:
mysqli_close($conn);

```

# Creating a MySQL Database

A database consists of one or more tables. You will need special `CREATE privileges` to create or to delete a MySQL database.

The CREATE DATABASE statement is used to create a database in MySQL.

*Example (PDO)*

The following PDO example *create a database* named "test":

```php
<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE DATABASE test";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Database created successfully<br>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>

```

# Include database helper scripts (for PDO)

*pdo-db-vars.php*

```php
<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbName = "myDBPDO";
?>
```

*pdo-db-conn.php*

```php
<?php
require_once "./pdo-db-vars.php";

$conn = null;

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password); 
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully<br/>";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  echo "<br/>";
}

?>
```

- To connect to myDb , only needs one line

```php
require_once './pdo-db-conn.php';
```

# Creating Table

A database table has its own unique name and consists of columns and rows.

The `CREATE TABLE` statement is used to create a table in MySQL.

We will create a table named "MyGuests", with five columns: "id", "firstname", "lastname", "email" and "reg_date":

```sql
CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)

```

Notes on the table above:

The data type specifies what type of data the column can hold. For a complete reference of all the available data types, go to the Data Types reference. (https://www.w3schools.com/sql/sql_datatypes.asp)

After the data type, you can specify other `optional attributes` for each column:

- NOT NULL - Each row must contain a value for that column, null values are not allowed
- DEFAULT value - Set a default value that is added when no other value is passed
- UNSIGNED - Used for number types, limits the stored data to positive numbers and zero
- AUTO INCREMENT - MySQL automatically increases the value of the field by 1 each time a new record is added
- PRIMARY KEY - Used to uniquely identify the rows in a table. The column with PRIMARY KEY setting is often an ID number, and is often used with AUTO_INCREMENT

Each table should have a `primary key column` (in this case: the "id" column). Its value must be unique for each record in the table.

The following examples shows how to create the table in PHP:

Example (PDO)

```php
<?php
require_once './pdo-db-conn.php';

try {
  // sql to create table
  $sql = "CREATE TABLE MyGuests (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Table MyGuests created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>

```

# Insert Data

After a database and a table have been created, we can start adding data in them. For PDO, `$conn->exec($sql);` exec metod is used.

Here are some syntax rules to follow:

- The SQL query must be quoted in PHP
- String values inside the SQL query must be quoted
- Numeric values must not be quoted
- The word NULL must not be quoted

The INSERT INTO statement is used to add new records to a MySQL table:

```sql
INSERT INTO table_name (column1, column2, column3,...)
VALUES (value1, value2, value3,...)

```

In the previous chapter we created an empty table named "MyGuests" with five columns: "id", "firstname", "lastname", "email" and "reg_date". Now, let us fill the table with data.

*Note:* If a column is AUTO_INCREMENT (like the "id" column) or TIMESTAMP with default update of current_timesamp (like the "reg_date" column), it is no need to be specified in the SQL query; MySQL will automatically add the value.

The following examples add a new record to the "MyGuests" table:

Example (PDO)

```php
<?php
require_once './pdo-db-conn.php';

try {
  $sql = "INSERT INTO MyGuests (firstname, lastname, email)
  VALUES ('John', 'Doe', 'john@example.com')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>

```

# Get Last Inserted ID

If we perform an INSERT or UPDATE on a table with an AUTO_INCREMENT field, we can get the ID of the last inserted/updated record immediately.

In the table "MyGuests", the "id" column is an AUTO_INCREMENT field:

The following examples are equal to the examples from the previous page, except that we have added one single line of code to retrieve the ID of the last inserted record.

Example (PDO)

```php
<?php
require_once './pdo-db-conn.php';

try {
  $sql = "INSERT INTO MyGuests (firstname, lastname, email)
  VALUES ('John', 'Doe', 'john@example.com')";
  // use exec() because no results are returned
  $conn->exec($sql);
  $last_id = $conn->lastInsertId();
  echo "New record created successfully. Last inserted ID is: " . $last_id;
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

```

# Transactions - Multiple Records

The following examples add three new records to the "MyGuests" table in one transaction:

Example (PDO)

```php
<?php
require_once './pdo-db-conn.php';

try {
  // begin the transaction
  $conn->beginTransaction();
  // our SQL statements
  $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
  VALUES ('John', 'Doe', 'john@example.com')");
  $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
  VALUES ('Mary', 'Moe', 'mary@example.com')");
  $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
  VALUES ('Julie', 'Dooley', 'julie@example.com')");

  // commit the transaction
  $conn->commit();
  echo "New records created successfully";
} catch(PDOException $e) {
  // roll back the transaction if something failed
  $conn->rollback();
  echo "Error: " . $e->getMessage();
}

$conn = null;

```

# Prepared Statements and Bound Parameters

Prepared statements are very useful against SQL injections.

A prepared statement is a feature used to execute the same (or similar) SQL statements repeatedly with high efficiency.

Prepared statements basically work like this:

- Prepare: An SQL statement template is created and sent to the database. Certain values are left unspecified, called parameters (labeled "?"). Example: `INSERT INTO MyGuests VALUES(?, ?, ?)`

- The database parses, compiles, and performs query optimization on the SQL statement template, and stores the result without executing it

- Execute: At a later time, the application binds the values to the parameters, and the database executes the statement. The application may execute the statement as many times as it wants with different values

Compared to executing SQL statements directly, prepared statements have three main advantages:

- Prepared statements reduce parsing time as the preparation on the query is done only once (although the statement is executed multiple times)

- Bound parameters minimize bandwidth to the server as you need send only the parameters each time, and not the whole query
  
- Prepared statements are very useful *against SQL injections*, because parameter values, which are transmitted later using a different protocol, need not be *correctly escaped*. If the original statement template is not derived from external input, SQL injection cannot occur.

The following example uses prepared statements and bound parameters in PDO:

Example (PDO with Prepared Statements)

```php
<?php
require_once './pdo-db-conn.php';

try {
  // prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email)
  VALUES (:firstname, :lastname, :email)");
  $stmt->bindParam(':firstname', $firstname);
  $stmt->bindParam(':lastname', $lastname);
  $stmt->bindParam(':email', $email);

  // insert a row
  $firstname = "John";
  $lastname = "Doe";
  $email = "john@example.com";
  $stmt->execute();

  // insert another row
  $firstname = "Mary";
  $lastname = "Moe";
  $email = "mary@example.com";
  $stmt->execute();

  // insert another row
  $firstname = "Julie";
  $lastname = "Dooley";
  $email = "julie@example.com";
  $stmt->execute();

  echo "New records created successfully";
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>

```

- bind params as array

```php
try {
  // prepare sql and bind parameters
  $stmt = $pdo->prepare("INSERT INTO MyGuests (firstname,lastname)
  VALUES (:firstname,:lastname)");

  // insert a row
  $firstname = "John";
  $lastname = "Doe";
  //$email = "john@example.com";

  $arr = array();
  $arr["firstname"] = $firstname;
  $arr["lastname"] = $lastname;
  $stmt->execute($arr);

  echo "New records created successfully";
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

//$pdo = null;

```

# Select Data

The SELECT statement is used to select data from one or more tables. The following example uses *prepared statements*. Use prepare and execute method.

It selects the id, firstname and lastname columns from the MyGuests table.

Example (PDO)

```php
<?php
require_once './pdo-db-conn.php';

try {

  $stmt = $conn->prepare("SELECT id, firstname, lastname FROM MyGuests");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  foreach ($stmt->fetchAll() as $row) {
    foreach ($row as $field => $value) {
      echo $field . ' => ' . $value . '<br/>';
    }
  }

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

$conn = null;

```

# Delete Data

The DELETE statement is used to delete records from a table:

```sql
DELETE FROM table_name
WHERE some_column = some_value

```

Notice the WHERE clause in the DELETE syntax: The WHERE clause specifies which record or records that should be deleted. If you omit the WHERE clause, all records will be deleted!

The following examples delete the record with id=3 in the "MyGuests" table:

*Example (PDO)*

```php
<?php
require_once './pdo-db-conn.php';

try {
  // sql to delete a record
  $sql = "DELETE FROM MyGuests WHERE id=3";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Record deleted successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

```

# Update Data

The UPDATE statement is used to update existing records in a table:

```sql
UPDATE table_name
SET column1=value, column2=value2,...
WHERE some_column=some_value 

```

The following examples update the record with id=2 in the "MyGuests" table:

Example (PDO)

```php
<?php
require_once './pdo-db-conn.php';

try {
  $sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

  // Prepare statement
  $stmt = $conn->prepare($sql);

  // execute the query
  $stmt->execute();

  // echo a message to say the UPDATE succeeded
  echo $stmt->rowCount() . " records UPDATED successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

```

# Limit Data Selections

MySQL provides a LIMIT clause that is used to specify the number of records to return.

The LIMIT clause makes it easy to code multi page results or pagination with SQL, and is very useful on large tables. Returning a large number of records can impact on performance.

Assume we wish to select all records from 1 - 30 (inclusive) from a table called "Orders". The SQL query would then look like this:

```php
$sql = "SELECT * FROM Orders LIMIT 30";

```

When the SQL query above is run, it will return the first 30 records.

What if we want to select records 16 - 25 (inclusive)?

Mysql also provides a way to handle this: by using OFFSET.

The SQL query below says "return only 10 records, start on record 16 (OFFSET 15)":

```php
$sql = "SELECT * FROM Orders LIMIT 10 OFFSET 15";

```

You could also use a shorter syntax to achieve the same result:

```php
$sql = "SELECT * FROM Orders LIMIT 15, 10";

```

Notice that the numbers are reversed when you use a comma.

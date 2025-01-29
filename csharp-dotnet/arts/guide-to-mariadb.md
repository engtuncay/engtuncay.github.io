
Source : https://www.sqliz.com/posts/c-sharp-basic-mariadb

[Back](../readme.md)

(some parts may be modified or added)

---

# A Beginner's Guide to Using MariaDB in a C# Application

Posted on 2023-10-01

In this guide, we will explore the basics of using MariaDB in a C# application, including installation, setup, and common database operations.

MariaDB is a popular open-source relational database management system (RDBMS) known for its performance, reliability, and ease of use. C# is a versatile programming language developed by Microsoft, commonly used for building Windows applications, web services, and more. In this guide, we will explore the basics of using MariaDB in a C# application, including installation, setup, and common database operations.

## Prerequisites

Before we dive into using MariaDB with C#, make sure you have the following prerequisites in place:

C# Development Environment: You should have a C# development environment set up, including a code editor like Visual Studio or Visual Studio Code.

MariaDB: Install MariaDB if you haven’t already. You can download it from the official MariaDB website.

MariaDB Connector/NET: You’ll need the MariaDB Connector/NET, which is the official MariaDB connector for .NET applications. You can download it from the MariaDB website.

## Creating a C# Application

Let’s start by creating a new C# application.

Visual Studio: If you’re using Visual Studio, you can create a new C# project by selecting “File” -> “New” -> “Project,” and then choose the type of application you want to create (e.g., Console Application, Windows Forms Application, ASP.NET Core Web Application, etc.).

Visual Studio Code: If you’re using Visual Studio Code, you can create a new C# project using the .NET CLI. Open your terminal and run:

```cs
dotnet new console -n MyMariaDBApp
cd MyMariaDBApp

```
This will create a new console application named MyMariaDBApp.

## Connecting to MariaDB

To connect your C# application to MariaDB, follow these steps:

- Add MariaDB Connector/NET: In your C# project, add a reference to the MariaDB Connector/NET library (`MySql.Data.dll`).

- Connection String: Define a connection string that specifies the details of your MariaDB server, such as server address, username, password, and database name:

```cs
using System;
using MySql.Data.MySqlClient;

class Program
{
    static void Main()
    {
        string connectionString = "Server=your_server_address;Database=your_database_name;User=your_username;Password=your_password;";
        MySqlConnection connection = new MySqlConnection(connectionString);

        try
        {
            connection.Open();
            Console.WriteLine("Connected to MariaDB!");
        }
        catch (Exception ex)
        {
            Console.WriteLine($"Error: {ex.Message}");
        }
        finally
        {
            connection.Close();
        }
    }
}

```

Replace your_server_address, your_database_name, your_username, and your_password with your MariaDB server details.

Performing Database Operations: With the connection established, you can perform various database operations, such as querying data, inserting records, updating data, and deleting records, using SQL commands executed through the MySqlCommand class.

Here’s an example of inserting data into a table:

```cs
string insertSql = "INSERT INTO your_table_name (column1, column2) VALUES (@value1, @value2)";
MySqlCommand insertCommand = new MySqlCommand(insertSql, connection);
insertCommand.Parameters.AddWithValue("@value1", "John Doe");
insertCommand.Parameters.AddWithValue("@value2", "john@example.com");

try
{
    connection.Open();
    int rowsAffected = insertCommand.ExecuteNonQuery();
    Console.WriteLine($"Inserted {rowsAffected} row(s)!");
}
catch (Exception ex)
{
    Console.WriteLine($"Error: {ex.Message}");
}
finally
{
    connection.Close();
}

```

Replace your_table_name with the name of your database table and column1, column2, etc., with the actual column names.

## Handling Errors

In a real-world application, it’s important to handle errors gracefully. You can use try-catch blocks to catch exceptions and implement error-handling logic to ensure that your application responds appropriately to any issues that may arise during database operations.

## Conclusion

MariaDB is a reliable and powerful RDBMS that pairs well with C# for building various types of applications. In this guide, we’ve covered the basics of using MariaDB in a C# application, including installation, connecting to the database, and performing common database operations. As you continue to develop your C# application, you can explore more advanced features and optimizations provided by MariaDB to create efficient and scalable database-driven applications.
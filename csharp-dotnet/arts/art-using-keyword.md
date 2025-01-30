
Source : https://www.c-sharpcorner.com/UploadFile/manas1/usage-and-importance-of-using-in-C-Sharp472/

[Back](../readme.md)

(some parts may be modified or added)

---
	
Usage and Importance of Using in C#

Manas Mohapatra, Feb 20, 2023

There are two ways to use the using in C#. One is as a directive and the other is as a statement. Let's explain!

## Using Directive

Generally, we use the using keyword to add namespaces in code-behind and class files. Then it makes all the classes, interfaces and abstract classes and their methods and properties available in the current page. Adding a namespace can be done in the following two ways,

A. To allow the normal use of types in a namespace,

```cs
using System.IO;
using System.Text;

```

B. To create an alias for a namespace or a type. This is called a using alias directive. 

```cs
using MyProject = TruckingApp.Services;

```

We can use the namespace alias as in the following:

```cs
MyProject.Truck newObj = new MyProject.Truck();

```

This one (option B) is very useful when the same class/abstract/interface is present in multiple namespaces.

Let's say the Truck class is present in TruckingApp1, TruckingApp2, and TruckingApp3. Then it is difficult to call the Truck class of namespace2.

Here the alias directive gives an elegant syntax to use the Truck class.

```cs
using namespace1 = TruckingApp1.Services;
using namespace2 = TruckingApp2.Services;
using namespace3 = TruckingApp3.Services;

namespace2.Truck newObj = new namespace2.Truck();

```

Now the code looks more elegant and easy to understand. Except for this way, you can also access the Truck class using namespace directly as in the following:

TruckingApp.Services2.Truck newObj = new TruckingApp.Services2.Truck();

This one has one disadvantage. If I am using the Truck class in 100 places, then I need to use the namespace name every time. So always use the alias directive in this scenario.

## Using Statement

This is another way to use the using keyword in C#. It plays a vital role in improving performance in Garbage Collection.

What it actually does

The using statement ensures that Dispose() is called even if an exception occurs when you are creating objects and calling methods, properties and so on. Dispose() is a method that is present in the IDisposable interface that helps to implement custom Garbage Collection. In other words, if I am doing some database operation (Insert, Update, Delete) but somehow an exception occurs, then here the using statement closes the connection automatically. here's no need to call the connection Close() method explicitly.

Another important factor is that it helps in Connection Pooling. Connection Pooling in .NET helps to eliminate the closing of a database connection multiple times. It sends the connection object to a pool for future use (next database call). The next time a database connection is called from your application the connection pool fetches the objects available in the pool. So it helps to improve the performance of the application. So when we use the using statement the controller sends the object to the connection pool automatically, and there is no need to call the Close() and Dispose() methods explicitly. For more on Connection Pooling, visit the link here.

You can do the same as what the using statement is doing by using try-catch block and calling the Dispose() inside the finally block explicitly. But the using statement does the calls automatically to make the code cleaner and more elegant. Within the using block, the object is read-only and cannot be modified or reassigned.

Let's explain how to implement the using statement in ADO.NET, calling WebService, IO operations, EntityFramework and so on.

ADO.NET
string connString = "Data Source=localhost;Integrated Security=SSPI;Initial Catalog=Northwind;";

using (SqlConnection conn = new SqlConnection(connString))
{
      SqlCommand cmd = conn.CreateCommand();
      cmd.CommandText = "SELECT CustomerId, CompanyName FROM Customers";
      conn.Open();

      using (SqlDataReader dr = cmd.ExecuteReader())
      {
         while (dr.Read())
         Console.WriteLine("{0}\t{1}", dr.GetString(0), dr.GetString(1));
      }
}
C#
In the preceding code I am not closing any connection, it will close automatically. The using statement will call conn.Close() automatically due to the using statement (using (SqlConnection conn = new SqlConnection(connString)) and the same for a SqlDataReader object.

And also if any exception occurs it will close the connection automatically.

Entity Framework
The using statement can also be used in EntityFramework and Transaction.

Code

public string GetDriver()
{
      try
      {
            // Creating Transaction object through using statemnt
            using (TransactionScope trans = new TransactionScope())
            {
                  // Creating entity framework connection object through Using statement
                  using (TruckingDBEntities cc = new TruckingDBEntities ())
                  {
                        // Getting employee list
                        List<emp> empList = (from temp in cc.Employees
                                                        Where temp.name = “manas”
                                                        Select temp).ToList();
                  }
               // Means all operations are successful and needs to commit.
                trans.Complete();
         }
   }
   catch (Exception ex)
   {
         // Log error for future reference
   }
}
C#
Web Service
These days, a web service call is often used in our applications. We can also use the using statement when calling a web service. Once we call the web service if we forgot to dispose of the object then the using statement helps in closing and disposing of the object because web service objects are heavy.

Code

// Calling Webserice with username and password
using (TruckServiceClient sc = new TruckServiceClient())
{
      // Appending username and password to request
      sc.ClientCredentials.UserName.UserName = "uid";
      sc.ClientCredentials.UserName.Password = "pwd";

      // Calling webs service method
      string returndata = sc.GetData(100);
}
C#
IO operations
The using statement can also be used when we do any kind of IO operations. It also helps to dispose of IO objects.

Code

try
{
    using (StreamWriter sw = File.AppendText(filePath))
    {
        sw.WriteLine(message);
    }
}
catch(Exception ex)
{
   // Handle exception
}
C#
Lastly we can implement the using statement in custom classes like: 

Class Emloyee
{
   Public void getEmp()
   {
      // Do some operations
   }
}
C#
Call the Employee class method using the using statement as in the following:

Using(Employee emp = new Employee())
{
   emp.getEmp();
}
C#
From the preceding discussion, you can understand that the "using" keyword plays a vital role.

First, to add a namespace as a type, or a namespace as an alias.

Secondly, to dispose of and close the objects wisely. It enhances the performance of an application.

Please extensively use the using statement in projects.

I hope it helps you to understand the usage and importance of the using keyword in C#.

Happy coding!
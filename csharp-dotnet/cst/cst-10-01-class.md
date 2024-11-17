
C# Object and Class

Source : https://www.javatpoint.com/c-sharp-object-and-class

[Back](../readme.md)

---

**Contents**

- [Object and Class](#object-and-class)
- [C# Constructor](#c-constructor)
- [C# Destructor](#c-destructor)
- [C# this](#c-this)
- [C# static](#c-static)
- [C# static class](#c-static-class)
- [C# static constructor](#c-static-constructor)


## Object and Class

Since C# is an object-oriented language, program is designed using objects and classes in C#.

➖ C# Object

In C#, Object is a real world entity, for example, chair, car, pen, mobile, laptop etc.

In other words, object is an entity that has state and behavior. Here, state means data and behavior means functionality.

Object is a runtime entity, it is created at runtime.

Object is an instance of a class. All the members of the class can be accessed through object.

Let's see an example to create object using new keyword.

```cs
Student s1 = new Student();//creating an object of Student    

```

In this example, Student is the type and s1 is the reference variable that refers to the instance of Student class. The new keyword allocates memory at runtime.

➖ C# Class

In C#, class is a group of similar objects. It is a template from which objects are created. It can have fields, methods, constructors etc.

Let's see an example of C# class that has two fields only.

```cs
public class Student  
 {  
     int id;//field or data member   
     String name;//field or data member  
 }  

```

➖ C# Object and Class Example

Let's see an example of class that has two fields: id and name. It creates instance of the class, initializes the object and prints the object value.

```cs
using System;  
   public class Student  
    {  
        int id;//data member (also instance variable)    
        String name;//data member(also instance variable)    
         
    public static void Main(string[] args)  
        {  
            Student s1 = new Student();//creating an object of Student    
            s1.id = 101;  
            s1.name = "Sonoo Jaiswal";  
            Console.WriteLine(s1.id);  
            Console.WriteLine(s1.name);  
  
        }  
    }  
// Output:
// 
// 101
// Sonoo Jaiswal

```

➖ C# Class Example 2: Having Main() in another class

Let's see another example of class where we are having Main() method in another class. In such case, class must be public.

```cs
using System;

  public class Student  
  {  
    public int id;   
    public String name;  
  }

  class TestStudent{ 

    public static void Main(string[] args) {  
      Student s1 = new Student();    
      s1.id = 101;  
      s1.name = "Sonoo Jaiswal";  
      Console.WriteLine(s1.id);  
      Console.WriteLine(s1.name);  
  
    }  
  }
     
// Output:
// 
// 101
// Sonoo Jaiswal

```

➖ C# Class Example 3: Initialize and Display data through method

Let's see another example of C# class where we are initializing and displaying object through method.

```cs
using System;  
   public class Student  
    {  
        public int id;   
        public String name;  
        public void insert(int i, String n)  
        {  
            id = i;  
            name = n;  
        }  
        public void display()  
        {  
            Console.WriteLine(id + " " + name);  
        }  
   }  
   class TestStudent{  
       public static void Main(string[] args)  
        {  
            Student s1 = new Student();  
            Student s2 = new Student();  
            s1.insert(101, "Ajeet");  
            s2.insert(102, "Tom");  
            s1.display();  
            s2.display();  
  
        }  
    }  
// Output:
// 
// 101 Ajeet
// 102 Tom

```
C# Class Example 4: Store and Display Employee Information

```cs
using System;  
   public class Employee  
    {  
        public int id;   
        public String name;  
        public float salary; 

        public void insert(int i, String n,float s)  
        {  
            id = i;  
            name = n;  
            salary = s;  
        }  
        public void display()  
        {  
            Console.WriteLine(id + " " + name+" "+salary);  
        }  
   }

   class TestEmployee{  
       
       public static void Main(string[] args)  
        {  
            Employee e1 = new Employee();  
            Employee e2 = new Employee();  
            e1.insert(101, "Sonoo",890000f);  
            e2.insert(102, "Mahesh", 490000f);  
            e1.display();  
            e2.display();  
  
        }  
    }  
// Output:
// 
// 101 Sonoo 890000
// 102 Mahesh 490000

```

## C# Constructor

In C#, constructor is a special method which is invoked automatically at the time of object creation. It is used to initialize the data members of new object generally. The constructor in C# has the same name as class or struct.

There can be two types of constructors in C#.

- Default constructor
- Parameterized constructor

➖ C# Default Constructor

A constructor which has no argument is known as default constructor. It is invoked at the time of creating object.

➖ C# Default Constructor Example

```cs
using System;  

  public class Employee  
  {  
        public Employee()  
        {  
            Console.WriteLine("Default Constructor Invoked");  
        }  
  }

   class TestEmployee{  
       public static void Main(string[] args)  
        {  
            Employee e1 = new Employee();  
            Employee e2 = new Employee();  
        }  
    }  

// Output:
// 
// Default Constructor Invoked
// Default Constructor Invoked

```

➖ C# Parameterized Constructor

A constructor which has parameters is called parameterized constructor. It is used to provide different values to distinct objects.

```cs
using System;
 
   public class Employee  
    {  
        public int id;   
        public String name;  
        public float salary; 

        public Employee(int i, String n,float s)  
        {  
            id = i;  
            name = n;  
            salary = s;  
        }

        public void display()  
        {  
            Console.WriteLine(id + " " + name+" "+salary);  
        }  

   }

   class TestEmployee{ 

       public static void Main(string[] args)  
        {  
            Employee e1 = new Employee(101, "Sonoo", 890000f);  
            Employee e2 = new Employee(102, "Mahesh", 490000f);  
            e1.display();  
            e2.display();  
  
        }  
    }  

// Output:
// 
// 101 Sonoo 890000
// 102 Mahesh 490000

```

## C# Destructor

A destructor works opposite to constructor, It destructs the objects of classes. It can be defined only once in a class. Like constructors, it is invoked automatically.

📝 Note: C# destructor cannot have parameters. Moreover, modifiers can't be applied on destructors.

➖ C# Constructor and Destructor Example

Let's see an example of constructor and destructor in C# which is called automatically.

```cs
using System;  
   public class Employee  
    {  
        public Employee()  
        {  
            Console.WriteLine("Constructor Invoked");  
        }

        ~Employee()  
        {  
            Console.WriteLine("Destructor Invoked");  
        }  
    }

   class TestEmployee{  

       public static void Main(string[] args)  
        {  
            Employee e1 = new Employee();  
            Employee e2 = new Employee();  
        }  
    }  

// Output:
// 
// Constructor Invoked
// Constructor Invoked
// Destructor Invoked
// Destructor Invoked

```

Note: Destructor can't be public. We can't apply any modifier on destructors.

## C# this

In c# programming, this is a keyword that refers to the current instance of the class. There can be 3 main usage of this keyword in C#.

- It can be used to refer current class instance variable. It is used if field names (instance variables) and parameter names are same, that is why both can be distinguish easily.
- It can be used to pass current object as a parameter to another method.
- It can be used to declare indexers.

➖ C# this example

Let's see the example of this keyword in C# that refers to the fields of current class.

```cs
using System;  
public class Employee  
{  
    public int id;   
    public String name;  
    public float salary;  
    
    public Employee(int id, String name,float salary)  
    {  
        this.id = id;  
        this.name = name;  
        this.salary = salary;  
    }  
    
    public void display()  
    {  
        Console.WriteLine(id + " " + name+" "+salary);  
    }  
}
  
class TestEmployee{  
    public static void Main(string[] args)  
    {  
        Employee e1 = new Employee(101, "Sonoo", 890000f);  
        Employee e2 = new Employee(102, "Mahesh", 490000f);  
        e1.display();  
        e2.display();  

    }  
}  
// Output:
// 
// 101 Sonoo 890000
// 102 Mahesh 490000

```
We will learn about other usage of this keyword in next chapters.

## C# static

Source : https://www.javatpoint.com/c-sharp-static

In C#, static is a keyword or modifier that belongs to the type not instance. So instance is not required to access the static members. ❗ `In C#, static can be field, method, constructor, class, properties, operator and event`.

📝 Note: Indexers and destructors cannot be static.

➖ Advantage of C# static keyword

- Memory efficient: Now we don't need to create instance for accessing the static members, so it saves memory. Moreover, it belongs to the type, so it will not get memory each time when instance is created.

➖ C# Static Field

A field which is declared as static, is called static field. Unlike instance field which gets memory each time whenever you create object, there is only one copy of static field created in the memory. It is shared to all the objects.

It is used to refer the common property of all objects such as rateOfInterest in case of Account, companyName in case of Employee etc.

➖ C# static field example

Let's see the simple example of static field in C#.

```cs
using System;  
public class Account  
{  
    public int accno;   
    public String name;  
    public static float rateOfInterest=8.8f;  
    
    public Account(int accno, String name)  
    {  
        this.accno = accno;  
        this.name = name;  
    }  
      
    public void display()  
    {  
        Console.WriteLine(accno + " " + name + " " + rateOfInterest);  
    }  
}  

class TestAccount{  

    public static void Main(string[] args)  
    {  
      Account a1 = new Account(101, "Sonoo");  
      Account a2 = new Account(102, "Mahesh");  
      a1.display();  
      a2.display();  
    }  
}  
// Output:
// 
// 101 Sonoo 8.8
// 102 Mahesh 8.8

```

➖ C# static field example 2: changing static field

If you change the value of static field, it will be applied to all the objects.

```cs
using System;

public class Account  
{  
    public int accno;   
    public String name;  
    public static float rateOfInterest=8.8f;  
    public Account(int accno, String name)  
    {  
        this.accno = accno;  
        this.name = name;  
    }  
      
    public void display()  
    {  
        Console.WriteLine(accno + " " + name + " " + rateOfInterest);  
    }  
}  
class TestAccount{  
    public static void Main(string[] args)  
    {  
        Account.rateOfInterest = 10.5f;//changing value  
        Account a1 = new Account(101, "Sonoo");  
        Account a2 = new Account(102, "Mahesh");  
        a1.display();  
        a2.display();  

    }  
}  
// Output:

// 101 Sonoo 10.5
// 102 Mahesh 10.5

```

➖ C# static field example 3: Counting Objects

Let's see another example of static keyword in C# which counts the objects.

```cs
using System;  
public class Account  
{  
    public int accno;   
    public String name;  
    public static int count=0; 

    public Account(int accno, String name)  
    {  
        this.accno = accno;  
        this.name = name;  
        count++;  
    }  
      
    public void display()  
    {  
        Console.WriteLine(accno + " " + name);  
    }  
}  
class TestAccount{  
    public static void Main(string[] args)  
    {  
        Account a1 = new Account(101, "Sonoo");  
        Account a2 = new Account(102, "Mahesh");  
        Account a3 = new Account(103, "Ajeet");  
        a1.display();  
        a2.display();  
        a3.display();  
        Console.WriteLine("Total Objects are: "+Account.count);  
    }  
}  
// Output:
// 
// 101 Sonoo
// 102 Mahesh
// 103 Ajeet
// Total Objects are: 3

```

## C# static class

The C# static class is like the normal class but it cannot be instantiated. It can have only static members. The advantage of static class is that it provides you guarantee that instance of static class cannot be created.

Points to remember for C# static class

- C# static class contains only static members.
- C# static class cannot be instantiated.
- C# static class is sealed.
- C# static class cannot contain instance constructors.

➖ C# static class example

Let's see the example of static class that contains static field and static method.

```cs
using System;  
public static class MyMath  
{  
    public static float PI=3.14f;   
    public static int cube(int n){return n*n*n;}  
}

class TestMyMath{

    public static void Main(string[] args)  
    {  
        Console.WriteLine("Value of PI is: "+MyMath.PI);  
        Console.WriteLine("Cube of 3 is: " + MyMath.cube(3));  
    }

}  
// Output:
// 
// Value of PI is: 3.14
// Cube of 3 is: 27

```

## C# static constructor

C# static constructor is used to initialize static fields. It can also be used to perform any action that is to be performed only once. It is invoked automatically before first instance is created or any static member is referenced.

➖ Points to remember for C# Static Constructor

- C# static constructor cannot have any modifier or parameter.
- C# static constructor is invoked implicitly. It can't be called explicitly.

➖ C# Static Constructor example

Let's see the example of static constructor which initializes the static field rateOfInterest in Account class.

using System;  
   public class Account  
    {  
        public int id;   
        public String name;  
        public static float rateOfInterest;  
        public Account(int id, String name)  
        {  
            this.id = id;  
            this.name = name;  
        }  
        static Account()  
        {  
            rateOfInterest = 9.5f;  
        }  
        public void display()  
        {  
            Console.WriteLine(id + " " + name+" "+rateOfInterest);  
        }  
   }  
   class TestEmployee{  
       public static void Main(string[] args)  
        {  
            Account a1 = new Account(101, "Sonoo");  
            Account a2 = new Account(102, "Mahesh");  
            a1.display();  
            a2.display();  
  
        }  
    }  
Output:

101 Sonoo 9.5
102 Mahesh 9.5



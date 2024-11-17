
C# Polymorphism

Source : https://www.javatpoint.com/c-sharp-member-overloading

[Back](../readme.md)

---

**Contents**

- [C# Member Overloading](#c-member-overloading)
- [C# Method Overriding](#c-method-overriding)
- [C# Base](#c-base)
- [C# Polymorphism](#c-polymorphism)
- [C# Sealed](#c-sealed)


## C# Member Overloading

If we create two or more members having same name but different in number or type of parameter, it is known as member overloading. In C#, we can overload:

- methods,
- constructors, and
- indexed properties

It is because these members have parameters only.

➖ C# Method Overloading

Having two or more methods with same name but different in parameters, is known as method overloading in C#.

The advantage of method overloading is that it increases the readability of the program because you don't need to use different names for same action.

You can perform method overloading in C# by two ways:

1. By changing number of arguments
2. By changing data type of the arguments

🧲 Example

Let's see the simple example of method overloading where we are changing number of arguments of add() method.

```cs
using System;  

public class Cal{  
    
    public static int add(int a,int b){  
        return a + b;  
    }

    public static int add(int a, int b, int c)  
    {  
        return a + b + c;  
    }  
}  

public class TestMemberOverloading  
{  
    public static void Main()  
    {  
        Console.WriteLine(Cal.add(12, 23));  
        Console.WriteLine(Cal.add(12, 23, 25));  
    }  
}  

// Output:
// 
// 35
// 60

```

🧲 Example

Let's see the another example of method overloading where we are changing data type of arguments.

```cs
using System;  

public class Cal{  

    public static int add(int a, int b){  
        return a + b;  
    }  

    public static float add(float a, float b)  
    {  
        return a + b;  
    }  

}  

public class TestMemberOverloading  
{  

    public static void Main()  
    {  
        Console.WriteLine(Cal.add(12, 23));  
        Console.WriteLine(Cal.add(12.4f,21.3f));  
    }  

}  

// Output:
// 
// 35
// 33.7

```

## C# Method Overriding

If derived class defines same method as defined in its base class, it is known as method overriding in C#. It is used to achieve runtime polymorphism. It enables you to provide specific implementation of the method which is already provided by its base class.

To perform method overriding in C#, you need to use `virtual keyword` with base class method and `override keyword` with derived class method.

🧲 Example

Let's see a simple example of method overriding in C#. In this example, we are overriding the eat() method by the help of override keyword.

```cs
using System;  

public class Animal{ 

    public virtual void eat(){  
        Console.WriteLine("Eating...");  
    }  

}  

public class Dog: Animal  
{  
    public override void eat()  
    {  
        Console.WriteLine("Eating bread...");  
    }  
}  

public class TestOverriding  
{  
    public static void Main()  
    {  
        Dog d = new Dog();  
        d.eat();  
    }  
}  
//Output:
//
//Eating bread...

```

## C# Base

In C#, base keyword is used to access fields, constructors and methods of base class.

You can use base keyword within instance method, constructor or instance property accessor only. You can't use it inside the static method.

🔔 C# base keyword: accessing base class field

We can use the base keyword to access the fields of the base class within derived class. It is useful if base and derived classes have the same fields. If derived class doesn't define same field, there is no need to use base keyword. Base class field can be directly accessed by the derived class.

🧲 Let's see the simple example of base keyword in C# which accesses the field of base class.


```cs
using System;  

public class Animal{  
    public string color = "white";  
}  

public class Dog: Animal  
{  
    string color = "black";  
    
    public void showColor()  
    {  
        Console.WriteLine(base.color);  
        Console.WriteLine(color);  
    }  
      
}  
public class TestBase  
{  
    public static void Main()  
    {  
        Dog d = new Dog();  
        d.showColor();  
    }  
}  
// Output:
// 
// white
// black

```

--*TBC - csh poly

🧲 C# base keyword example: calling base class method

By the help of base keyword, we can call the base class method also. It is useful if base and derived classes defines same method. In other words, if method is overridden. If derived class doesn't define same method, there is no need to use base keyword. Base class method can be directly called by the derived class method.

Let's see the simple example of base keyword which calls the method of base class.

using System;  
public class Animal{  
    public virtual void eat(){  
        Console.WriteLine("eating...");  
    }  
}  
public class Dog: Animal  
{  
    public override void eat()  
    {  
        base.eat();  
        Console.WriteLine("eating bread...");  
    }  
      
}  
public class TestBase  
{  
    public static void Main()  
    {  
        Dog d = new Dog();  
        d.eat();  
    }  
}  
Output:

eating...
eating bread...
C# inheritance: calling base class constructor internally
Whenever you inherit the base class, base class constructor is internally invoked. Let's see the example of calling base constructor.

using System;  
public class Animal{  
    public Animal(){  
        Console.WriteLine("animal...");  
    }  
}  
public class Dog: Animal  
{  
    public Dog()  
    {  
        Console.WriteLine("dog...");  
    }  
      
}  
public class TestOverriding  
{  
    public static void Main()  
    {  
        Dog d = new Dog();  
          
    }  
}  
Output:

animal...
dog...

## C# Polymorphism
The term "Polymorphism" is the combination of "poly" + "morphs" which means many forms. It is a greek word. In object-oriented programming, we use 3 main concepts: inheritance, encapsulation and polymorphism.

There are two types of polymorphism in C#: compile time polymorphism and runtime polymorphism. Compile time polymorphism is achieved by method overloading and operator overloading in C#. It is also known as static binding or early binding. Runtime polymorphism in achieved by method overriding which is also known as dynamic binding or late binding.

C# Runtime Polymorphism Example
Let's see a simple example of runtime polymorphism in C#.

using System;  
public class Animal{  
    public virtual void eat(){  
        Console.WriteLine("eating...");  
    }  
}  
public class Dog: Animal  
{  
    public override void eat()  
    {  
        Console.WriteLine("eating bread...");  
    }  
      
}  
public class TestPolymorphism  
{  
    public static void Main()  
    {  
        Animal a= new Dog();  
        a.eat();  
    }  
}  
Output:

eating bread...
C# Runtime Polymorphism Example 2
Let's see a another example of runtime polymorphism in C# where we are having two derived classes.

using System;  
public class Shape{  
    public virtual void draw(){  
        Console.WriteLine("drawing...");  
    }  
}  
public class Rectangle: Shape  
{  
    public override void draw()  
    {  
        Console.WriteLine("drawing rectangle...");  
    }  
      
}  
public class Circle : Shape  
{  
    public override void draw()  
    {  
        Console.WriteLine("drawing circle...");  
    }  
  
}  
public class TestPolymorphism  
{  
    public static void Main()  
    {  
        Shape s;  
        s = new Shape();  
        s.draw();  
        s = new Rectangle();  
        s.draw();  
        s = new Circle();  
        s.draw();  
  
    }  
}  
Output:

drawing...
drawing rectangle...
drawing circle...
Runtime Polymorphism with Data Members
Runtime Polymorphism can't be achieved by data members in C#. Let's see an example where we are accessing the field by reference variable which refers to the instance of derived class.

using System;  
public class Animal{  
    public string color = "white";  
  
}  
public class Dog: Animal  
{  
    public string color = "black";  
}  
public class TestSealed  
{  
    public static void Main()  
    {  
        Animal d = new Dog();  
        Console.WriteLine(d.color);  
    
    }  
}  
Output:

white

## C# Sealed
C# sealed keyword applies restrictions on the class and method. If you create a sealed class, it cannot be derived. If you create a sealed method, it cannot be overridden.

Note: Structs are implicitly sealed therefore they can't be inherited.
C# Sealed class
C# sealed class cannot be derived by any class. Let's see an example of sealed class in C#.

using System;  
sealed public class Animal{  
    public void eat() { Console.WriteLine("eating..."); }  
}  
public class Dog: Animal  
{  
    public void bark() { Console.WriteLine("barking..."); }  
}  
public class TestSealed  
{  
    public static void Main()  
    {  
        Dog d = new Dog();  
        d.eat();  
        d.bark();  
  
  
    }  
}  
Output:

Compile Time Error: 'Dog': cannot derive from sealed type 'Animal'
C# Sealed method
The sealed method in C# cannot be overridden further. It must be used with override keyword in method.

Let's see an example of sealed method in C#.

using System;  
public class Animal{  
    public virtual void eat() { Console.WriteLine("eating..."); }  
    public virtual void run() { Console.WriteLine("running..."); }  
  
}  
public class Dog: Animal  
{  
    public override void eat() { Console.WriteLine("eating bread..."); }  
    public sealed override void run() {   
    Console.WriteLine("running very fast...");   
    }  
}  
public class BabyDog : Dog  
{  
    public override void eat() { Console.WriteLine("eating biscuits..."); }  
    public override void run() { Console.WriteLine("running slowly..."); }  
}  
public class TestSealed  
{  
    public static void Main()  
    {  
        BabyDog d = new BabyDog();  
        d.eat();  
        d.run();  
    }  
}  
Output:

Compile Time Error: 'BabyDog.run()': cannot override inherited member 'Dog.run()' because it is sealed
Note: Local variables can't be sealed.
using System;  
public class TestSealed  
{  
    public static void Main()  
    {  
        sealed int x = 10;  
        x++;  
        Console.WriteLine(x);  
    }  
}  
Output:

Compile Time Error: Invalid expression term 'sealed'

[Back](../readme.md)
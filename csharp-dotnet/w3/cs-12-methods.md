
- [C# Methods](#c-methods)
- [C# Method Parameters](#c-method-parameters)
- [C# Default Parameter Value](#c-default-parameter-value)
- [C# Return Values](#c-return-values)
- [C# Named Arguments](#c-named-arguments)
- [C# Method Overloading](#c-method-overloading)
- [C# Call By Value](#c-call-by-value)
- [C# Call By Reference](#c-call-by-reference)
- [C# Out Parameter](#c-out-parameter)


# C# Methods

A method is a block of code which only runs when it is called.

You can pass data, known as `parameters`, into a method.

Methods are used to perform certain actions, and they are also known as functions.

Why use methods? To reuse code: define the code once, and use it many times.

➖ Create a Method

A method is defined with the *name* of the method, followed by parentheses (). C# provides some pre-defined methods, which you already are familiar with, such as Main(), but you can also create your own methods to perform certain actions:

 Example

Create a method inside the Program class:

```cs
class Program
{
  static void MyMethod() 
  {
    // code to be executed
  }
} 

```

Example Explained

- MyMethod() is the name of the method

- static means that the method belongs to the Program class and not an object of the Program class. You will learn more about objects and how to access methods through objects later in this tutorial.

- void means that this method does not have a return value. You will learn more about return values later in this chapter

Note: In C#, it is good practice to start with an uppercase letter when naming methods, as it makes the code easier to read.

*Call a Method*

To call (execute) a method, write the method's name followed by two parentheses () and a semicolon;

In the following example, MyMethod() is used to print a text (the action), when it is called:

Example

Inside Main(), call the myMethod() method:

```cs
static void MyMethod() 
{
  Console.WriteLine("I just got executed!");
}

static void Main(string[] args)
{
  MyMethod();
}

// Outputs "I just got executed!"

```

A method can be called multiple times:

Example

```cs
static void MyMethod() 
{
  Console.WriteLine("I just got executed!");
}

static void Main(string[] args)
{
  MyMethod();
  MyMethod();
  MyMethod();
}

// I just got executed!
// I just got executed!
// I just got executed!

```

# C# Method Parameters

*Parameters and Arguments*

Information can be passed to methods as parameter. Parameters act as variables inside the method.

They are specified after the method name, inside the parentheses. You can add as many parameters as you want, just separate them with a comma.

The following example has a method that takes a string called fname as parameter. When the method is called, we pass along a first name, which is used inside the method to print the full name:

Example

```cs
static void MyMethod(string fname) 
{
  Console.WriteLine(fname + " Refsnes");
}

static void Main(string[] args)
{
  MyMethod("Liam");
  MyMethod("Jenny");
  MyMethod("Anja");
}

// Liam Refsnes
// Jenny Refsnes
// Anja Refsnes

```
 
When a parameter is passed to the method, it is called an argument. So, from the example above: fname is a parameter, while Liam, Jenny and Anja are arguments.

*Multiple Parameters*

You can have as many parameters as you like, just separate them with commas:

Example

```cs
static void MyMethod(string fname, int age) 
{
  Console.WriteLine(fname + " is " + age);
}

static void Main(string[] args)
{
  MyMethod("Liam", 5);
  MyMethod("Jenny", 8);
  MyMethod("Anja", 31);
}

// Liam is 5
// Jenny is 8
// Anja is 31

```

#  C# Default Parameter Value

You can also use a default parameter value, by using the equals sign (=).

If we call the method without an argument, it uses the default value ("Norway"):

Example

```cs
static void MyMethod(string country = "Norway") 
{
  Console.WriteLine(country);
}

static void Main(string[] args)
{
  MyMethod("Sweden");
  MyMethod("India");
  MyMethod();
  MyMethod("USA");
}

// Sweden
// India
// Norway
// USA

```

A parameter with a default value, is often known as an "optional parameter". From the example above, country is an optional parameter and "Norway" is the default value.

# C# Return Values

In the previous page, we used the void keyword in all examples, which indicates that the method should not return a value.

If you want the method to return a value, you can use a primitive data type (such as int or double) instead of void, and use the return keyword inside the method:

Example

```cs
static int MyMethod(int x) 
{
  return 5 + x;
}

static void Main(string[] args)
{
  Console.WriteLine(MyMethod(3));
}

// Outputs 8 (5 + 3)

```

This example returns the sum of a method's two parameters:

Example

```cs
static int MyMethod(int x, int y) 
{
  return x + y;
}

static void Main(string[] args)
{
  Console.WriteLine(MyMethod(5, 3));
}

// Outputs 8 (5 + 3)

```

You can also store the result in a variable (recommended, as it is easier to read and maintain):

Example

```cs
static int MyMethod(int x, int y) 
{
  return x + y;
}

static void Main(string[] args)
{
  int z = MyMethod(5, 3);
  Console.WriteLine(z);
}

// Outputs 8 (5 + 3)

```

# C# Named Arguments

It is also possible to send arguments with the "key: value" syntax.

That way, the order of the arguments does not matter:

Example

```cs
static void MyMethod(string child1, string child2, string child3) 
{
  Console.WriteLine("The youngest child is: " + child3);
}

static void Main(string[] args)
{
  MyMethod(child3: "John", child1: "Liam", child2: "Liam");
}

// The youngest child is: John

```

# C# Method Overloading

With method overloading, multiple methods can have the same name with different parameters:

Example

```cs
int MyMethod(int x)
float MyMethod(float x)
double MyMethod(double x, double y)

```

Consider the following example, which have two methods that add numbers of different type:

Example

```cs
static int PlusMethodInt(int x, int y)
{
  return x + y;
}

static double PlusMethodDouble(double x, double y)
{
  return x + y;
}

static void Main(string[] args)
{
  int myNum1 = PlusMethodInt(8, 5);
  double myNum2 = PlusMethodDouble(4.3, 6.26);
  Console.WriteLine("Int: " + myNum1);
  Console.WriteLine("Double: " + myNum2);
}

```

Instead of defining two methods that should do the same thing, it is better to overload one.

In the example below, we overload the PlusMethod method to work for both int and double:

Example

```cs
static int PlusMethod(int x, int y)
{
  return x + y;
}

static double PlusMethod(double x, double y)
{
  return x + y;
}

static void Main(string[] args)
{
  int myNum1 = PlusMethod(8, 5);
  double myNum2 = PlusMethod(4.3, 6.26);
  Console.WriteLine("Int: " + myNum1);
  Console.WriteLine("Double: " + myNum2);
} 

```

Note: Multiple methods can have the same name as long as the number and/or type of parameters are different.

# C# Call By Value

Source : https://www.javatpoint.com/c-sharp-call-by-value

In C#, value-type parameters are that pass a copy of original value to the function rather than reference. It does not modify the original value. A change made in passed value does not alter the actual value. In the following example, we have pass value during function call.

C# Call By Value Example

```cs
using System;  
namespace CallByValue  
{  
    class Program  
    {  
        // User defined function  
        public void Show(int val)  
        {  
             val *= val; // Manipulating value  
            Console.WriteLine("Value inside the show function "+val);  
            // No return statement  
        }  
        // Main function, execution entry point of the program  
        static void Main(string[] args)  
        {  
            int val = 50;  
            Program program = new Program(); // Creating Object  
            Console.WriteLine("Value before calling the function "+val);  
            program.Show(val); // Calling Function by passing value            
            Console.WriteLine("Value after calling the function " + val);  
        }  
    }  
}  
Output:

//Value before calling the function 50
// Value inside the show function 2500
// Value after calling the function 50

```

# C# Call By Reference

C# provides a ref keyword to pass argument as reference-type. It passes reference of arguments to the function rather than copy of original value. The changes in passed values are permanent and modify the original variable value.

C# Call By Reference Example

```cs
using System;  
namespace CallByReference  
{  
    class Program  
    {  
        // User defined function  
        public void Show(ref int val)  
        {  
             val *= val; // Manipulating value  
            Console.WriteLine("Value inside the show function "+val);  
            // No return statement  
        }  
        // Main function, execution entry point of the program  
        static void Main(string[] args)  
        {  
            int val = 50;  
            Program program = new Program(); // Creating Object  
            Console.WriteLine("Value before calling the function "+val);  
            program.Show(ref val); // Calling Function by passing reference            
            Console.WriteLine("Value after calling the function " + val);  
        }  
    }  
}  

// Output:
// 
// Value before calling the function 50
// Value inside the show function 2500
// Value after calling the function 2500

```

# C# Out Parameter

C# provides out keyword to pass arguments as out-type. It is like reference-type, except that it does not require variable to initialize before passing. We must use out keyword to pass argument as out-type. It is useful when we want a function to return multiple values.

C# Out Parameter Example 1

```cs
using System;  
namespace OutParameter  
{  
    class Program  
    {  
        // User defined function  
        public void Show(out int val) // Out parameter  
        {  
            int square = 5;  
            val = square;  
            val *= val; // Manipulating value  
        }  
        // Main function, execution entry point of the program  
        static void Main(string[] args)  
        {  
            int val = 50;  
            Program program = new Program(); // Creating Object  
            Console.WriteLine("Value before passing out variable " + val);  
            program.Show(out val); // Passing out argument  
            Console.WriteLine("Value after recieving the out variable " + val);  
        }  
    }  
}  
Output:

// Value before passing out variable 50
// Value after receiving the out variable 25
// The following example demonstrates that how a function can return multiple values.

```

C# Out Parameter Example 2

```cs
using System;  
namespace OutParameter  
{  
    class Program  
    {  
        // User defined function  
        public void Show(out int a, out int b) // Out parameter  
        {  
            int square = 5;  
            a = square;  
            b = square;  
            // Manipulating value  
            a *= a;   
            b *= b;  
        }  
        // Main function, execution entry point of the program  
        static void Main(string[] args)  
        {  
            int val1 = 50, val2 = 100;  
            Program program = new Program(); // Creating Object  
            Console.WriteLine("Value before passing \n val1 = " + val1+" \n val2 = "+val2);  
            program.Show(out val1, out val2); // Passing out argument  
            Console.WriteLine("Value after passing \n val1 = " + val1 + " \n val2 = " + val2);  
        }  
    }  
}  

// Output:
// 
// Value before passing
//  val1 = 50
//  val2 = 100
// Value after passing
//  val1 = 25
//  val2 = 25

```
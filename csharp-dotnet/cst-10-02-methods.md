
C# Method

Source : https://www.javatpoint.com/c-sharp-function (some parts may be modified or added)

[Home](readme.md)

---

**Contents**

- [C# Methods](#c-methods)
- [C# Method: using no parameter and return type](#c-method-using-no-parameter-and-return-type)
- [C# Method: using parameter but no return type](#c-method-using-parameter-but-no-return-type)
- [C# Method: using parameter and return type](#c-method-using-parameter-and-return-type)
- [C# Call By Value](#c-call-by-value)
- [C# Call By Reference](#c-call-by-reference)
- [C# Out Parameter](#c-out-parameter)

## C# Methods

A Method (function) is a block of code that has a signature. Function is used to execute statements specified in the code block. A function consists of the following components:

➖ Method name: It is a unique name that is used to make Function call.

➖ Return type: It is used to specify the data type of function return value.

➖ Body: It is a block that contains executable statements.

➖ Access specifier: It is used to specify function accessibility in the application.

➖ Parameters: It is a list of arguments that we can pass to the function during call.

**C# Method Syntax**

```cs
<access-specifier><return-type>FunctionName(<parameters>)  
{  
// function body  
// return statement  
}  

```

Access-specifier, parameters and return statement are optional.

Let's see an example in which we have created a function that returns a string value and takes a string parameter.

## C# Method: using no parameter and return type

A function that does not return any value specifies `void` type as a return type. In the following example, a function is created without return type.

```cs
using System;  
namespace FunctionExample  
{  
    class Program  
    {  
        // User defined function without return type  
        public void Show() // No Parameter  
        {  
            Console.WriteLine("This is non parameterized function");  
            // No return statement  
        }  
        // Main function, execution entry point of the program  
        static void Main(string[] args)  
        {  
            Program program = new Program(); // Creating Object  
            program.Show(); // Calling Function             
        }  
    }  
}  
// Output:
// This is non parameterized function (method)
```

- Try : https://dotnetfiddle.net/SypzAS

## C# Method: using parameter but no return type

```cs
using System;  
namespace FunctionExample  
{  
    class Program  
    {  
        // User defined function without return type  
        public void Show(string message)  
        {  
            Console.WriteLine("Hello " + message);  
            // No return statement  
        }  
       // Main function, execution entry point of the program  
        static void Main(string[] args)  
        {  
            Program program = new Program(); // Creating Object  
            program.Show("Rahul Kumar"); // Calling Function             
        }  
    }  
}  
// Output:
// 
// Hello Rahul Kumar

```

A function can have zero or any number of parameters to get data. In the following example, a function is created without parameters. A function without parameter is also known as non-parameterized function.

## C# Method: using parameter and return type

```cs
using System;  
namespace FunctionExample  
{  
    class Program  
    {  
        // User defined function  
        public string Show(string message)  
        {  
         Console.WriteLine("Inside Show Function");  
         return message;  
        }  
        // Main function, execution entry point of the program  
        static void Main(string[] args)  
        {  
            Program program = new Program();  
            string message = program.Show("Rahul Kumar");  
            Console.WriteLine("Hello "+message);  
        }  
    }  
}  

// Output:
// 
// Inside Show Function
// Hello Rahul Kumar

```

## C# Call By Value

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

// Output:
// 
// Value before calling the function 50
// Value inside the show function 2500
// Value after calling the function 50

```

## C# Call By Reference

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

## C# Out Parameter

C# provides out keyword to `pass arguments as out-type`. It is like reference-type, except that `it does not require variable to initialize before passing`. We must use out keyword to pass argument as out-type. `It is useful when we want a function to return multiple values`.

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
// Output:
// 
// Value before passing out variable 50
// Value after receiving the out variable 25

```

The following example demonstrates that how a function can return multiple values.

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

// Value before passing
// val1 = 50
// val2 = 100
// Value after passing
// val1 = 25
// val2 = 25

```

[Home](readme.md)
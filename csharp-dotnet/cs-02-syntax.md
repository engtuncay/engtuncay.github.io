

- [C# Syntax](#c-syntax)
- [C# Output](#c-output)
- [C# Comments](#c-comments)

Source : https://www.w3schools.com/cs/cs_syntax.php

# C# Syntax

*C# Syntax* 

In the previous chapter, we created a C# file called Program.cs, and we used the following code to print "Hello World" to the screen:

*Program.cs*

```cs
using System;

namespace HelloWorld
{
  class Program
  {
    static void Main(string[] args)
    {
      Console.WriteLine("Hello World!");    
    }
  }
}

// Result:
// Hello World!

```

Example explained

Line 1: using System means that we can use classes from the System namespace.

Line 2: A blank line. C# ignores white space. However, multiple lines makes the code more readable.

Line 3: namespace is used to organize your code, and it is a container for classes and other namespaces.

Line 4: The curly braces {} marks the beginning and the end of a block of code.

Line 5: class is a container for data and methods, which brings functionality to your program. Every line of code that runs in C# must be inside a class. In our example, we named the class Program.

Don't worry if you don't understand how using System, namespace and class works. Just think of it as something that (almost) always appears in your program, and that you will learn more about them in a later chapter.

Line 7: Another thing that always appear in a C# program, is the Main method. Any code inside its curly brackets {} will be executed. You don't have to understand the keywords before and after Main. You will get to know them bit by bit while reading this tutorial.

Line 9: Console is a class of the System namespace, which has a WriteLine() method that is used to output/print text. In our example it will output "Hello World!".

If you omit the using System line, you would have to write System.Console.WriteLine() to print/output text.

Note: Every C# statement ends with a semicolon ;.

Note: C# is case-sensitive: "MyClass" and "myclass" has different meaning.

Note: Unlike Java, the name of the C# file does not have to match the class name, but they often do (for better organization). When saving the file, save it using a proper name and add ".cs" to the end of the filename. To run the example above on your computer, make sure that C# is properly installed: Go to the Get Started Chapter for how to install C#. The output should be:

Hello World!


# C# Output

*C# Output* 

To output values or print text in C#, you can use the WriteLine() method:

Example

Console.WriteLine("Hello World!");

You can add as many WriteLine() methods as you want. Note that it will add a new line for each method:

Example
Console.WriteLine("Hello World!");
Console.WriteLine("I am Learning C#");
Console.WriteLine("It is awesome!");

You can also output numbers, and perform mathematical calculations:

Example
Console.WriteLine(3 + 3);

The Write Method
There is also a Write() method, which is similar to WriteLine().

The only difference is that it does not insert a new line at the end of the output:

Example
Console.Write("Hello World! ");
Console.Write("I will print on the same line.");

Note that we add an extra space when needed (after "Hello World!" in the example above), for better readability.

In this tutorial, we will only use WriteLine() as it makes it easier to read the output of code.

# C# Comments

Comments can be used to explain C# code, and to make it more readable. It can also be used to prevent execution when testing alternative code.

*Single-line Comments*

Single-line comments start with two forward slashes (//).

Any text between // and the end of the line is ignored by C# (will not be executed).

This example uses a single-line comment before a line of code:

Example

```cs
// This is a comment
Console.WriteLine("Hello World!");

```

This example uses a single-line comment at the end of a line of code:

Example

Console.WriteLine("Hello World!");  // This is a comment

C# Multi-line Comments

Multi-line comments start with /* and ends with */.

Any text between /* and */ will be ignored by C#.

This example uses a multi-line comment (a comment block) to explain the code:

Example
/* The code below will print the words Hello World
to the screen, and it is amazing */
Console.WriteLine("Hello World!"); 

Single or multi-line comments?
It is up to you which you want to use. Normally, we use // for short comments, and /* */ for longer.
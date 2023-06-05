
- [C# Tutorial](#c-tutorial)
- [C# Introduction](#c-introduction)
- [C# Get Started](#c-get-started)

Source :  https://www.w3schools.com/cs/index.php

# C# Tutorial

*Learn C#*

- C# (C-Sharp) is a programming language developed by Microsoft that runs on the .NET Framework.

- C# is used to develop web apps, desktop apps, mobile apps, games and much more.

*Examples in Each Chapter*

W3 "Try it Yourself" editor makes it easy to learn C#. You can edit C# code and view the result in your browser.

*Example*

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

```

Click on the "Run example" button to see how it works.

We recommend reading this tutorial, in the sequence listed in the left menu.

# C# Introduction

*What is C#?*

C# is pronounced "C-Sharp".

It is an object-oriented programming language created by Microsoft that runs on the .NET Framework.

C# has roots from the C family, and the language is close to other popular languages like C++ and Java.

The first version was released in year 2002. The latest version, C# 11, was released in November 2022.

C# is used for:

- Mobile applications
- Desktop applications
- Web applications
- Web services
- Web sites
- Games
- VR
- Database applications
- And much, much more!

*Why Use C#?*

- It is one of the most popular programming language in the world
- It is easy to learn and simple to use
- It has a huge community support
- C# is an object oriented language which gives a clear structure to programs and allows code to be reused, lowering development costs
- As C# is close to C, C++ and Java, it makes it easy for programmers to switch to C# or vice versa

*Get Started*

This tutorial will teach you the basics of C#.

It is not necessary to have any prior programming experience.

# C# Get Started

Source : https://www.w3schools.com/cs/cs_getstarted.php

*C# IDE*

The easiest way to get started with C#, is to use an IDE.

An IDE (Integrated Development Environment) is used to edit and compile code.

In our tutorial, we will use Visual Studio Community, which is free to download from https://visualstudio.microsoft.com/vs/community/.

Applications written in C# use the .NET Framework, so it makes sense to use Visual Studio, as the program, the framework, and the language, are all created by Microsoft.

*C# Install*

Once the Visual Studio Installer is downloaded and installed, choose the .NET workload and click on the Modify/Install button:


After the installation is complete, click on the Launch button to get started with Visual Studio.

On the start window, choose Create a new project:

Then click on the "Install more tools and features" button:

Choose "Console App (.NET Core)" from the list and click on the Next button:

Enter a name for your project, and click on the Create button:

Visual Studio will automatically generate some code for your project:


The code should look something like this:

```cs
Program.cs
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

```

Don't worry if you don't understand the code above - we will discuss it in detail in later chapters. For now, focus on how to run the code.

Run the program by pressing the F5 button on your keyboard (or click on "Debug" -> "Start Debugging"). This will compile and execute your code. The result will look something to this:

```bash
Hello World!
C:\Users\Username\source\repos\HelloWorld\HelloWorld\bin\Debug\netcoreapp3.0\HelloWorld.exe (process 13784) exited with code 0.
To automatically close the console when debugging stops, enable Tools->Options->Debugging->Automatically close the console when debugging stops.
Press any key to close this window . . .
Congratulations! You have now written and executed your first C# program.

```


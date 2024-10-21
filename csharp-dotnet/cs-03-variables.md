
- [C# Variables](#c-variables)
- [Constants](#constants)
- [C# Display Variables](#c-display-variables)
- [C# Multiple Variables](#c-multiple-variables)
- [C# Identifiers (variable names)](#c-identifiers-variable-names)

# C# Variables

Variables are containers for storing data values.

In C#, there are different types of variables (defined with different keywords), for example:

- int - stores integers (whole numbers), without decimals, such as 123 or -123
- double - stores floating point numbers, with decimals, such as 19.99 or -19.99
- char - stores single characters, such as 'a' or 'B'. Char values are surrounded by single quotes
- string - stores text, such as "Hello World". String values are surrounded by double quotes
- bool - stores values with two states: true or false

*Declaring (Creating) Variables*

To create a variable, you must specify the type and assign it a value:

*Syntax*

```CS
type variableName = value;

```

Where type is a C# type (such as int or string), and variableName is the name of the variable (such as x or name). The equal sign is used to assign values to the variable.

To create a variable that should store text, look at the following example:

Example

Create a variable called name of type string and assign it the value "John":

```cs
string name = "John";
Console.WriteLine(name);

```

To create a variable that should store a number, look at the following example:

Example

Create a variable called myNum of type int and assign it the value 15:

```cs
int myNum = 15;
Console.WriteLine(myNum);

```

You can also declare a variable without assigning the value, and assign the value later:

Example

```cs
int myNum;
myNum = 15;
Console.WriteLine(myNum);

```

Note that if you assign a new value to an existing variable, it will overwrite the previous value:

Example

Change the value of myNum to 20:

```cs
int myNum = 15;
myNum = 20; // myNum is now 20
Console.WriteLine(myNum);

```

*Other Types*

A demonstration of how to declare variables of other types:

Example

```cs
int myNum = 5;
double myDoubleNum = 5.99D;
char myLetter = 'D';
bool myBool = true;
string myText = "Hello";

```

You will learn more about data types in a later chapter.

# Constants

If you don't want others (or yourself) to overwrite existing values, you can add the const keyword in front of the variable type.

This will declare the variable as "constant", which means unchangeable and read-only:

Example 

```cs
const int myNum = 15;
myNum = 20; // error

```

The const keyword is useful when you want a variable to always store the same value, so that others (or yourself) won't mess up your code. An example that is often referred to as a constant, is PI (3.14159...).

📝 Note: You cannot declare a constant variable without assigning the value. If you do, an error will occur: A const field requires a value to be provided.

# C# Display Variables

The `WriteLine()` method is often used to display variable values to the console window.

To combine both text and a variable, use the `+` character :

Example

```cs
string name = "John";
Console.WriteLine("Hello " + name);

```

You can also use the "+" character to add a variable to another variable:

Example

```cs
string firstName = "John ";
string lastName = "Doe";
string fullName = firstName + lastName;
Console.WriteLine(fullName);

```

For numeric values, the `+` character works as a mathematical operator (notice that we use int (integer) variables here):

Example

```cs
int x = 5;
int y = 6;
Console.WriteLine(x + y); // Print the value of x + y

//---Output---
// 11
```

# C# Multiple Variables

➖ Declare Many Variables

To declare more than one variable of the same type, use a comma-separated list:

Example 

```cs
int x = 5, y = 6, z = 50;
Console.WriteLine(x + y + z);

```

You can also assign the same value to multiple variables in one line:

Example

```cs
int x, y, z;
x = y = z = 50;
Console.WriteLine(x + y + z);

```

# C# Identifiers (variable names)

All C# variables must be identified with unique names.

These unique names are called *identifiers*.

Identifiers can be short names (like x and y) or more descriptive names (age, sum, totalVolume).

📝 Note: It is recommended to use descriptive names in order to create understandable and maintainable code:

Example

```cs
// Good
int minutesPerHour = 60;

// OK, but not so easy to understand what m actually is
int m = 60;

```

The general rules for naming variables are:

- Names can contain letters, digits and the underscore character (_)
- Names must begin with a letter
- Names should start with a lowercase letter and it cannot contain whitespace
- Names are case sensitive ("myVar" and "myvar" are different variables)
Reserved words (like C# keywords, such as int or double) cannot be used as names

🔚
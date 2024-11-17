

C# Data Types

Source : https://www.javatpoint.com/csharp-data-types

[Back](../readme.md)

---

**Contents**

- [Value Data Type](#value-data-type)
- [Reference Data Type](#reference-data-type)
- [Pointer Data Type](#pointer-data-type)
- [Symbols used in pointer](#symbols-used-in-pointer)
- [Declaring a pointer](#declaring-a-pointer)


A data type specifies the type of data that a variable can store such as integer, floating, character etc.

![](https://images.javatpoint.com/csharp/images/csharp-data-type1.png)

There are 3 types of data types in C# language.

Types               | Data Types
--------------------|------------------------------------
Value Data Type     | short, int, char, float, double etc
Reference Data Type | String, Class, Object and Interface
Pointer Data Type   | Pointers

## Value Data Type

The value data types are `integer-based` and `floating-point based`. C# language supports both signed and unsigned literals.

There are 2 types of value data type in C# language.

1) Predefined Data Types - such as Integer, Boolean, Float, etc.

2) User defined Data Types - such as Structure, Enumerations, etc.

The memory size of data types may change according to 32 or 64 bit operating system.

Let's see the value data types. It size is given according to 32 bit OS ❗


Data Types     | Memory Size | Range
---------------|-------------|---------------------------------------------------------------------------
char           | 1 byte      | -128 to 127
signed char    | 1 byte      | -128 to 127
unsigned char  | 1 byte      | 0 to 127
short          | 2 byte      | -32,768 to 32,767
signed short   | 2 byte      | -32,768 to 32,767
unsigned short | 2 byte      | 0 to 65,535
int            | 4 byte      | -2,147,483,648 to -2,147,483,647
signed int     | 4 byte      | -2,147,483,648 to -2,147,483,647
unsigned int   | 4 byte      | 0 to 4,294,967,295
long           | 8 byte      | ?9,223,372,036,854,775,808 to <br/> 9,223,372,036,854,775,807
signed long    | 8 byte      | ?9,223,372,036,854,775,808 to <br/> 9,223,372,036,854,775,807
unsigned long  | 8 byte      | 0 - 18,446,744,073,709,551,615
float          | 4 byte      | 1.5 * 10-45 - 3.4 * 1038, 7-digit precision
double         | 8 byte      | 5.0 * 10-324 - 1.7 * 10308, 15-digit precision
decimal        | 16 byte     | at least -7.9 * 10?28 - 7.9 * 1028,<br/>  with at least 28-digit precision

## Reference Data Type

The reference data types do not contain the actual data stored in a variable, but they contain a reference to the variables.

If the data is changed by one of the variables, the other variable automatically reflects this change in value.

There are 2 types of reference data type in C# language.

1) Predefined Types - such as Objects, String.

2) User defined Types - such as Classes, Interface.

## Pointer Data Type

The pointer in C# language is a variable, it is also known as locator or indicator that points to an address of a value.

## Symbols used in pointer

Symbol              | Name                 | Description
--------------------|----------------------|-------------------------------------
& (ampersand sign)  | Address operator     | Determine the address of a variable.
`* (asterisk sign)` | Indirection operator | Access the value of an address.

## Declaring a pointer 

The pointer in C# language can be declared using * (asterisk symbol).

```cs
int * a;  //pointer to int      
char * c; //pointer to char  

```
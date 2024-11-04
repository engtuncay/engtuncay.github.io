C# Structs

Source : https://javatpoint.com/c-sharp-structs

[Back](readme.md)

---

In C#, classes and structs are blueprints that are used to create instance of a class. Structs are used for lightweight objects such as Color, Rectangle, Point etc.

 Unlike class, structs in C# are `value type`❗ than reference type. It is useful if you have data that is not intended to be modified after creation of struct.

➖ C# Struct Example

Let's see a simple example of struct Rectangle which has two data members width and height.

```cs
using System;  
public struct Rectangle  
{  
    public int width, height;  
  
 }  
public class TestStructs  
{  
    public static void Main()  
    {  
        Rectangle r = new Rectangle();  
        r.width = 4;  
        r.height = 5;  
        Console.WriteLine("Area of Rectangle is: " + (r.width * r.height));  
    }  
}  

// Output:

// Area of Rectangle is: 20

```

➖ C# Struct Example: Using Constructor and Method

Let's see another example of struct where we are using constructor to initialize data and method to calculate area of rectangle.

```cs
using System;  

public struct Rectangle  
{  
    public int width, height;  
  
    public Rectangle(int w, int h)  
    {  
        width = w;  
        height = h;  
    }  
    public void areaOfRectangle() {   
     Console.WriteLine("Area of Rectangle is: "+(width*height)); }  
    }

public class TestStructs  
{  
    public static void Main()  
    {  
        Rectangle r = new Rectangle(5, 6);  
        r.areaOfRectangle();  
    }  
}  
// Output:
// 
// Area of Rectangle is: 30

```

📝 Note: Struct doesn't support inheritance. But it can `implement interfaces`.


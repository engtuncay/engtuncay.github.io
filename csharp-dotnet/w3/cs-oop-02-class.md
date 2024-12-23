
- [Classes and Objects](#classes-and-objects)
- [Multiple Classes](#multiple-classes)
- [Class Members](#class-members)
- [Constructors](#constructors)
- [Access Modifiers](#access-modifiers)
- [Properties (Get and Set)](#properties-get-and-set)

Source : 

# Classes and Objects

Everything in C# is associated with classes and objects, along with its `attributes (fields) and methods`. For example: in real life, a car is an object. The car has attributes, such as weight and color, and methods, such as drive and brake.

A Class is like `an object constructor`, or `a blueprint` for creating objects.

➖ Create a Class

To create a class, use the `class keyword`:

Create a class named "Car" with a variable color:

```cs
class Car 
{
  string color = "red";
}

```

When a variable is declared directly in a class, it is often referred to as a *field* (or *attribute* or *property*).

It is not required, but it is a good practice to start with `an uppercase first letter when naming classes`. Also, it is common that the name of the C# file and the class matches, as it makes our code organized. However it is not required (like in Java). 

➖ Create an Object

An object is created from a class. We have already created the class named Car, so now we can use this to create objects.

🧲  Example

Create an object called "myObj" and use it to print the value of color:

```cs
Car myObj = new Car(); 
Console.WriteLine(myObj.color);
```

Note that we use the dot syntax (.) to access variables/fields inside a class (myObj.color). You will learn more about fields in the next chapter.

# Multiple Classes

You can define multiple classes in a file.

```cs
//prog.cs
class Car 
{
  public string color = "red";
}

//prog2.cs
class Program
{
  static void Main(string[] args)
  {
    Car myObj = new Car();
    Console.WriteLine(myObj.color);
  }
}

```

# Class Members

Fields and methods inside classes are often referred to as `Class Members`:

🧲 Example : Create a Car class with three class members: two fields and one method.

```cs
// The class
class MyClass
{
  // Class members
  string color = "red";        // field
  int maxSpeed = 200;          // field
  
  public void fullThrottle()   // method
  {
    Console.WriteLine("The car is going as fast as it can!");
  }
}

```

➖ Fields

You can also leave the fields blank (unassigned), and modify them when creating the object:

Example

```cs
class Car 
{
  string color;
  int maxSpeed;

  static void Main(string[] args)
  {
    Car myObj = new Car();
    myObj.color = "red";
    myObj.maxSpeed = 200;
    Console.WriteLine(myObj.color);
    Console.WriteLine(myObj.maxSpeed);
  }
} 

```

This is especially useful when creating multiple objects of one class:

Example

```cs
class Car 
{
  string model;
  string color;
  int year;

  static void Main(string[] args)
  {
    Car Ford = new Car();
    Ford.model = "Mustang";
    Ford.color = "red";
    Ford.year = 1969;

    Car Opel = new Car();
    Opel.model = "Astra";
    Opel.color = "white";
    Opel.year = 2005;

    Console.WriteLine(Ford.model);
    Console.WriteLine(Opel.model);
  }
} 

```

➖ Object Methods

Methods normally belongs to a class, and they define how an object of a class behaves.

Just like with fields, you can access methods with the dot syntax. However, note that the method must be public. And remember that we use the name of the method followed by two parantheses () and a semicolon ; to call (execute) the method:

Example

```cs
class Car 
{
  string color;                 // field
  int maxSpeed;                 // field

  public void fullThrottle()    // method
  {
    Console.WriteLine("The car is going as fast as it can!"); 
  }

  static void Main(string[] args)
  {
    Car myObj = new Car();
    myObj.fullThrottle();  // Call the method
  }
} 

```

Why did we declare the method as public, and not static, like in the examples from the C# Methods Chapter?

The reason is simple: a static method can be accessed without creating an object of the class, while public methods can only be accessed by objects.

➖ Use Multiple Classes


```cs
//prog2.cs
class Car 
{
  public string model;
  public string color;
  public int year;

  public void fullThrottle()
  {
    Console.WriteLine("The car is going as fast as it can!"); 
  }
}

//prog.cs
class Program
{
  static void Main(string[] args)
  {
    Car Ford = new Car();
    Ford.model = "Mustang";
    Ford.color = "red";
    Ford.year = 1969;

    Car Opel = new Car();
    Opel.model = "Astra";
    Opel.color = "white";
    Opel.year = 2005;

    Console.WriteLine(Ford.model);
    Console.WriteLine(Opel.model);
  }
}

```

The public keyword is called `an access modifier`, which specifies that the fields of Car are accessible for other classes as well, such as Program.

You will learn more about *Access Modifiers* in a later chapter.

Tip: As you continue to read, you will also learn more about other class members, such as constructors and properties.

--*TBC - class csharp

# Constructors

A constructor is a special method that is used to initialize objects. The advantage of a constructor, is that it is called when an object of a class is created. It can be used to set initial values for fields:

Example

Create a constructor:

```cs
// Create a Car class
class Car
{
  public string model;  // Create a field

  // Create a class constructor for the Car class
  public Car()
  {
    model = "Mustang"; // Set the initial value for model
  }

  static void Main(string[] args)
  {
    Car Ford = new Car();  // Create an object of the Car Class (this will call the constructor)
    Console.WriteLine(Ford.model);  // Print the value of model
  }
}

// Outputs "Mustang"

```

Note that the constructor name must match the class name, and it cannot have a return type (like void or int).

Also note that the constructor is called when the object is created.

All classes have constructors by default: if you do not create a class constructor yourself, C# creates one for you. However, then you are not able to set initial values for fields.

Constructors save time! Take a look at the last example on this page to really understand why.

*Constructor Parameters*

Constructors can also take parameters, which is used to initialize fields.

The following example adds a string modelName parameter to the constructor. Inside the constructor we set model to modelName (model=modelName). When we call the constructor, we pass a parameter to the constructor ("Mustang"), which will set the value of model to "Mustang":

Example

```cs
class Car
{
  public string model;

  // Create a class constructor with a parameter
  public Car(string modelName)
  {
    model = modelName;
  }

  static void Main(string[] args)
  {
    Car Ford = new Car("Mustang");
    Console.WriteLine(Ford.model);
  }
}

// Outputs "Mustang"

```

You can have as many parameters as you want:

Example

```cs
class Car
{
  public string model;
  public string color;
  public int year;

  // Create a class constructor with multiple parameters
  public Car(string modelName, string modelColor, int modelYear)
  {
    model = modelName;
    color = modelColor;
    year = modelYear;
  }

  static void Main(string[] args)
  {
    Car Ford = new Car("Mustang", "Red", 1969);
    Console.WriteLine(Ford.color + " " + Ford.year + " " + Ford.model);
  }
}


// Outputs Red 1969 Mustang

```
 
Tip: Just like other methods, constructors can be overloaded by using different numbers of parameters.

*Constructors Save Time*

When you consider the example from the previous chapter, you will notice that constructors are very useful, as they help reducing the amount of code:

Without constructor:

```cs
// prog.cs
class Program
{
  static void Main(string[] args)
  {
    Car Ford = new Car();
    Ford.model = "Mustang";
    Ford.color = "red";
    Ford.year = 1969;

    Car Opel = new Car();
    Opel.model = "Astra";
    Opel.color = "white";
    Opel.year = 2005;

    Console.WriteLine(Ford.model);
    Console.WriteLine(Opel.model);
  }
}
```

With constructor:

```cs
prog.cs
class Program
{
  static void Main(string[] args)
  {
    Car Ford = new Car("Mustang", "Red", 1969);
    Car Opel = new Car("Astra", "White", 2005);

    Console.WriteLine(Ford.model);
    Console.WriteLine(Opel.model);
  }
}

```

# Access Modifiers

By now, you are quite familiar with the public keyword that appears in many of our examples:

```cs
public string color;

```

The public keyword is an access modifier, which is used to set the access level/visibility for classes, fields, methods and properties.

C# has the following access modifiers:

Modifier  | Description
----------|--------------------------------------------------------------------------------------------------------------------------------------------------------
public    | The code is accessible for all classes
private   | The code is only accessible within the same class
protected | The code is accessible within the same class, or in a class that is inherited from that class. You will learn more about inheritance in a later chapter
internal  | The code is only accessible within its own assembly, but not from another assembly. You will learn more about this in a later chapter

There's also two combinations: protected internal and private protected.

For now, lets focus on public and private modifiers.

🛎 Private Modifier

If you declare a field with a private access modifier, it can only be accessed within the same class:

Example

```cs
class Car
{
  private string model = "Mustang";

  static void Main(string[] args)
  {
    Car myObj = new Car();
    Console.WriteLine(myObj.model);
  }
}

// The output will be:
// Mustang

```

If you try to access it outside the class, an error will occur:

Example

```cs
class Car
{
  private string model = "Mustang";
}

class Program
{
  static void Main(string[] args)
  {
    Car myObj = new Car();
    Console.WriteLine(myObj.model);
  }
}
 
// The output will be:

// 'Car.model' is inaccessible due to its protection level
// The field 'Car.model' is assigned but its value is never used

```

*Public Modifier*

If you declare a field with a public access modifier, it is accessible for all classes:

Example

```cs
class Car
{
  public string model = "Mustang";
}

class Program
{
  static void Main(string[] args)
  {
    Car myObj = new Car();
    Console.WriteLine(myObj.model);
  }
}
 
// The output will be:

// Mustang

```

*Why Access Modifiers?*

To control the visibility of class members (the security level of each individual class and class member).

To achieve "Encapsulation" - which is the process of making sure that "sensitive" data is hidden from users. This is done by declaring fields as private. You will learn more about this in the next chapter.

Note: By *default*, all members of a class are *private* if you don't specify an access modifier:

Example

```cs
class Car
{
  string model;  // private
  string year;   // private
}

```

# Properties (Get and Set)

➖ Properties and Encapsulation

Before we start to explain properties, you should have a basic understanding of "Encapsulation".

The meaning of Encapsulation, is to make sure that "sensitive" data is hidden from users. To achieve this, you must:

- declare fields/variables as private
- provide public get and set methods, through properties, to access and update the value of a private field

*Properties*

You learned from the previous chapter that private variables can only be accessed within the same class (an outside class has no access to it). However, sometimes we need to access them - and it can be done with properties.

A property is like a combination of a variable and a method, and it has two methods: a get and a set method:

Example

```cs
class Person
{
  private string name; // field

  public string Name   // property
  {
    get { return name; }   // get method
    set { name = value; }  // set method
  }
} 

```

Example explained

The *Name* property is associated with the name field. It is a good practice to use the same name for both the property and the private field, but with an uppercase first letter.

The get method returns the value of the variable name.

The set method assigns a value to the name variable. The value keyword represents the value we assign to the property.

*Example*

Now we can use the Name property to access and update the private field of the Person class:

```cs
class Person
{
  private string name; // field
  public string Name   // property
  {
    get { return name; }
    set { name = value; }
  }
}

class Program
{
  static void Main(string[] args)
  {
    Person myObj = new Person();
    myObj.Name = "Liam";
    Console.WriteLine(myObj.Name);
  }
}

// The output will be:

// Liam

```

*Automatic Properties (Short Hand)*

C# also provides a way to use short-hand / automatic properties, where you do not have to define the field for the property, and you only have to write get; and set; inside the property.

The following example will produce the same result as the example above. The only difference is that there is less code:

Example

Using automatic properties:

```cs
class Person
{
  public string Name { get; set; }  // property
  
}

class Program
{
  static void Main(string[] args)
  {
    Person myObj = new Person();
    myObj.Name = "Liam";
    Console.WriteLine(myObj.Name);
  }
}
 
// The output will be:

// Liam

```

*Why Encapsulation?*

- Better control of class members (reduce the possibility of yourself (or others) to mess up the code)
- Fields can be made read-only (if you only use the get method), or write-only (if you only use the set method)
- Flexible: the programmer can change one part of the code without affecting other parts
- Increased security of data

--end--

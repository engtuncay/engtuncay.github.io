
Learn TypeScript – A Comprehensive Guide for Beginners By Isaiah Clifford Opoku

Source : https://www.freecodecamp.org/news/typescript-for-beginners-guide/ , August 8, 2024

TypeScript has become an industry standard for building large-scale applications, with many organizations choosing it as their primary language for application development.

This tutorial will serve as your introductory guide to TypeScript. It's designed to cater to learners at all stages – from beginners to advanced users. It teaches both fundamental and advanced TypeScript concepts, making it a helpful resource for anyone looking to delve into TypeScript.

The aim of this guide is not to be an exhaustive resource, but rather a concise and handy reference. It distills the essence of TypeScript into a digestible format.

Whether you're a novice just starting out, an intermediate learner aiming to consolidate your knowledge, or an advanced user in need of a quick refresher, this guide is crafted to meet your TypeScript learning requirements.

After carefully reading through this tutorial and practicing the examples it contains, you should have the skills to build robust, scalable, and maintainable TypeScript applications. We'll cover key TypeScript concepts like types, functions, classes, interfaces, generics, and more.

Table of Contents

Prerequisites

Who is this guide for?

TypeScript vs. JavaScript

Advantages of TypeScript

Code Generation

Installation

Configuration

Understanding tsconfig.json

TypeScript Basics

Type Declarations and Variables in TypeScript

Functions in TypeScript

Classes and Objects in TypeScript

Interfaces in TypeScript

Enums in TypeScript

Generics in TypeScript

Prerequisites
Before you begin going through this guide, you should have a basic understanding of JavaScript. Familiarity with object-oriented programming concepts like classes, interfaces, and inheritance is also recommended.

But if you're new to these concepts, don't worry - we'll cover them in detail in this guide.

Who is this Guide For?
This guide is for anyone looking to learn TypeScript. Whether you're a beginner, an intermediate learner, or an advanced user, this guide is designed to meet your TypeScript learning needs.

It's also a handy reference for anyone looking to brush up on their TypeScript skills.

TypeScript vs JavaScript
TypeScript is a statically-typed superset of JavaScript, designed to enhance the development of large-scale applications.

It introduces optional static typing, classes, and interfaces to JavaScript, drawing parallels with languages like C# and Java. TypeScript code is transpiled to plain JavaScript, ensuring compatibility across various JavaScript environments.

While TypeScript and JavaScript can operate in the same environment, they exhibit key differences. The main one is that TypeScript is statically typed, providing type safety, while JavaScript is dynamically typed.

Let's delve into some of these differences:

TypeScript code is written in .ts or .tsx files, whereas JavaScript code resides in .js or .jsx files. The .tsx and .jsx extensions indicate that the file may contain JSX syntax, a popular choice for UI development in libraries like React.

Let's explore the differences between JavaScript and TypeScript through an example:

// JavaScript
function add(a, b) {
  return a + b;
}

// Calling the function
add(1, 2); // Returns: 3
In the JavaScript example above, the add function takes two parameters, a and b, and returns their sum. The function is invoked with the arguments 1 and 2, yielding 3. Notice that the function parameters are not annotated with types, which is typical in JavaScript.

Now, let's see how we can write the same function in TypeScript:

// TypeScript
function add(a: number, b: number): number {
  return a + b;
}

// Calling the function
add(1, 2); // Returns: 3
In the TypeScript version, we've annotated the parameters a and b with the number type. We've also specified that the function returns a number.

This is a key difference between JavaScript and TypeScript. TypeScript enforces type safety, meaning it checks the types of values at compile time and throws errors if they don't match the expected types.

This feature helps catch errors early in the development process, making TypeScript a popular choice for large-scale applications.

TypeScript and JavaScript are both powerful languages used in a wide range of applications. Let's summarize their key differences:

Feature	TypeScript	JavaScript
Type System	Statically typed (types are checked at compile-time)	Dynamically typed (types are checked at run-time)
Superset	Yes, TypeScript is a superset of JavaScript	N/A
Compilation	Needs to be compiled (or transpiled) into JavaScript	Does not need to be compiled
OOP Features	Includes advanced OOP features such as interfaces, generics, and decorators	Supports OOP through prototypes, does not natively support interfaces or generics
Tooling	Offers better tooling with autocompletion, type checking, and source map support	Basic tooling
Community and Ecosystem	Newer, smaller community and ecosystem	Large community and vast ecosystem of libraries and frameworks since 1995
Learning Curve	Steeper due to additional features	Generally easier for beginners
Use Cases	Typically used in larger codebases where the benefits of type checking and autocompletion are most noticeable	Used for both client-side and server-side development, can be executed natively in the browser
Advantages of TypeScript
TypeScript offers several advantages over JavaScript:

Improved Tooling: TypeScript's static typing enables better tooling support. Features like autocompletion, type inference, and type checking make the development process more efficient and enjoyable.

Better Documentation: TypeScript codebases are often easier to understand and maintain. The type annotations serve as implicit documentation, making it easier to understand what kind of values a function expects and returns.

Advanced Features: TypeScript supports advanced JavaScript features such as decorators and async/await, and it also introduces features not available in JavaScript, such as interfaces, enums, and tuples.

Refactoring: TypeScript's tooling makes refactoring larger codebases safer and more predictable. You can make large-scale changes with confidence.

Gradual Adoption: TypeScript is a superset of JavaScript, which means you can gradually adopt TypeScript in your projects. You can start by renaming your .js files to .ts and then you can gradually add type annotations as you see fit.

Community and Ecosystem: TypeScript has a growing community and ecosystem. Many popular JavaScript libraries, such as React and Angular, have TypeScript definitions, which makes it easier to use them in a TypeScript project.

Code Generation
TypeScript code isn't natively understood by browsers or Node.js, so it needs to be transpiled into JavaScript. This transpilation process is handled by the TypeScript compiler (tsc), which reads TypeScript code and generates equivalent JavaScript code.

To transpile a TypeScript file, you can use the tsc command followed by the filename:

$ tsc index.ts
This command transpiles the index.ts file into a index.js file in the same directory. The resulting JavaScript code can be executed in any JavaScript environment, such as a browser or Node.js.

Watching for File Changes
During active development, it's beneficial to have your TypeScript code automatically recompiled whenever you make changes. The TypeScript compiler provides a --watch option for this purpose:

$ tsc index.ts --watch
With this command, the compiler will monitor the index.ts file and automatically recompile it whenever it detects a change.

Configuring the TypeScript Compiler
For larger projects, it's common to have a configuration file, tsconfig.json, to manage compiler options. This file allows you to specify the root level files and the compiler options required to compile the project.

Here's an example of a tsconfig.json file:

{
  "compilerOptions": {
    "target": "es5",
    "module": "commonjs",
    "strict": true,
    "outDir": "./dist"
  },
  "include": ["src/**/*.ts"],
  "exclude": ["node_modules"]
}
In this configuration, the compilerOptions object contains options for the compiler. The target option specifies the ECMAScript target version, the module option sets the module system, the strict option enables a wide range of type checking behavior, and the outDir option specifies the output directory for the compiled JavaScript files.

The include and exclude options are used to specify the files to be compiled and ignored, respectively.

To compile the project based on the tsconfig.json file, you can run the tsc command without any arguments:

$ tsc
This command will compile all TypeScript files in the project according to the options specified in the tsconfig.json file.

TypeScript Basics
In this section , we'll go through the basics of TypeScript. You'll see more examples of how TypeScript is statically typed, and you'll learn more about its tooling and error checking.

Installation
Before we dive into TypeScript, you'll need to make sure that you have Node.js installed on your system. Node.js is a runtime environment that allows you to run JavaScript outside of the browser. You can download Node.js from the official website.

Once Node.js is installed, you can install TypeScript using the Node Package Manager (npm), which comes bundled with Node.js.

Open your terminal and run the following command:

npm install -g typescript
This command installs TypeScript globally on your system. You can confirm the installation by running the tsc command, which stands for TypeScript compiler:

tsc --version
This command should display the version of TypeScript that you've installed.

Now that TypeScript is installed, we're ready to start our journey into the world of TypeScript!

Configuration
Great! Now that we have TypeScript installed, let's talk about something else important: configuration. For larger projects, it's common to have a configuration file, tsconfig.json, to manage compiler options. This file allows you to specify the root level files and the compiler options required to compile the project.

When you run the tsc command, the compiler looks for a tsconfig.json file in the current directory. If it finds one, it uses the options specified in the file to compile the project. If it doesn't find one, it uses the default options.

To generate a tsconfig.json file, you can run the following command:

tsc --init
Understanding tsconfig.json
Now that we have TypeScript installed and configured, let's dive deeper into the tsconfig.json file. This file is a crucial part of any TypeScript project. It holds various settings that determine how your TypeScript code gets compiled into JavaScript.

To create a tsconfig.json file, you can use the tsc --init command as I showed above. This command generates a tsconfig.json file in your current directory with some default settings.

Here's an example of what a tsconfig.json file might look like:

{
 "compilerOptions": {
    "target": "es5",
    "module": "commonjs",
    "strict": true,
    "outDir": "./dist"
 },
 "include": ["src/**/*.ts"],
 "exclude": ["node_modules"]
}
In this configuration:

The compilerOptions object contains settings for the TypeScript compiler.

The target option tells the compiler which version of ECMAScript to compile your code down to.

The module option sets the module system for your project.

The strict option enables a wide range of type checking behavior.

The outDir option specifies the directory where the compiled JavaScript files will be placed.

The include and exclude options tell the compiler which files to include and exclude during the compilation process.

After setting up your tsconfig.json file, you can compile your TypeScript project by simply running the tsc command in your terminal. This command will compile all TypeScript files in your project according to the options specified in your tsconfig.json file.

Type Declarations and Variables in TypeScript
Let's now learn more about types. TypeScript supports several types, including number, string, boolean, object, null, undefined, symbol, bigint, and any. Let's explore each of these types in detail.

number: This type is used for numeric values. It can be an integer or floating-point value.
Example:

let age: number = 30;
let weight: number = 65.5;
string: This type is used for textual data. It can be defined using single quotes, double quotes, or template literals.
Example:

let name: string = 'John Doe';
let greeting: string = `Hello, ${name}`;
boolean: This type is used for logical values. It can only be true or false.
Example:

let isAdult: boolean = true;
let isStudent: boolean = false;
object: This type is used for complex data structures. An object can have properties and methods.
Example:

let person: object = { name: 'John Doe', age: 30 };
let date: object = new Date();
null: This type has only one value: null. It is used when you want to explicitly set a variable to have no value or object.
Example:

let emptyValue: null = null;
let anotherEmptyValue: null = null;
undefined: This type has only one value: undefined. It is used when a variable has been declared but has not yet been assigned a value.
Example:

let unassignedValue: undefined = undefined;
let anotherUnassignedValue: undefined;
symbol: This type is used to create unique identifiers for objects.
Example:

let symbol1: symbol = Symbol('symbol1');
let symbol2: symbol = Symbol('symbol2');
bigint: This type is used for whole numbers larger than 2^53 - 1, which is the upper limit for the number type.
Example:

let bigNumber: bigint = 9007199254740993n;
let anotherBigNumber: bigint = BigInt(9007199254740993);
any: This type is used when the type of a variable could be anything. It is a way of opting out of type-checking.
Example:

let variable: any = 'I am a string';
variable = 42; // I am a number now
Now let talk about some different ways you can declare variables in TypeScript.

TypeScript provides a way to define the shape of an object, including its properties and methods, using type declarations. This allows you to create reusable types that can be used to define the structure of objects throughout your codebase.

Type Aliases: Type aliases are a way to create a new name for an existing type. They are often used to define complex types that are used in multiple places.
Example:

type Point = {
  x: number;
  y: number;
}

let origin: Point = { x: 0, y: 0 };
In this example, Point is a type alias for an object with x and y properties. It is used to define the type of the origin object.

Intersection Types: Intersection types are a way to combine multiple types into a single type. They are often used to create complex types that have the properties of multiple other types.
Example:

type Printable = {
  print: () => void;
};

type Loggable = {
  log: () => void;
};

type Logger = Printable & Loggable;

let logger: Logger = {
  print: () => console.log('Printing...'),
  log: () => console.log('Logging...'),
};
In this example, Printable and Loggable are two types that have a print and log method, respectively. The Logger type is an intersection of Printable and Loggable, so it has both a print and log method.

Union Types: Union types are a way to define a type that can be one of several different types. They are often used to create flexible types that can represent a variety of values.
Example:

type ID = string | number;

let id: ID = '123';
id = 123;
In this example, ID is a union type that can be either a string or a number. It is used to define the type of the id variable, which can be assigned a string or a number.

Type Assertions: Type assertions are a way to tell the TypeScript compiler that you know more about the type of a value than it does. They are similar to type casting in other languages.
Example:

let value: any = 'Hello, TypeScript!';
let length: number = (value as string).length;
In this example, the as keyword is used to assert that value is of type string. This allows us to access the length property of the string.

Functions in TypeScript
Functions are the building blocks of any programming language. They encapsulate logic into reusable units of code, promoting code reuse and modularity. In TypeScript, functions can be defined using the function keyword or arrow functions (=>). Both methods have their own use cases and characteristics.

Let's talk about some types of functions in TypeScript:

Function Declarations: Functions can be declared using the function keyword followed by a unique function name. The function body is enclosed in curly braces {}.
Example:

function greet(name: string): void {
  console.log(`Hello, ${name}!`);
}

greet('Alice');  // Outputs: Hello, Alice!
In this example, greet is a function that takes one parameter, name, of type string. The function doesn't return anything, so its return type is void.

Arrow Functions: Arrow functions are a more modern syntax for writing functions in TypeScript and JavaScript. They are especially useful when writing small, inline functions.
Example:

const greet = (name: string): void => {
  console.log(`Hello, ${name}!`);
}

greet('Bob');  // Outputs: Hello, Bob!
In this example, greet is an arrow function that behaves exactly the same as the greet function in the previous example. The => symbol separates the function parameters and the function body.

Function Types: In TypeScript, you can specify the types of the parameters and the return value of a function. This provides type safety, ensuring that the function is called with the correct types of arguments and that it returns the correct type of value.
Example:

function add(a: number, b: number): number {
  return a + b;
}

let sum: number = add(1, 2);  // sum is 3
In this example, the add function takes two parameters, a and b, both of type number, and returns a number.

Optional and Default Parameters: TypeScript allows function parameters to be optional or have default values.
Example:

function greet(name: string, greeting: string = 'Hello'): void {
  console.log(`${greeting}, ${name}!`);
}

greet('Charlie');  // Outputs: Hello, Charlie!
greet('Charlie', 'Hi');  // Outputs: Hi, Charlie!
In this example, the greet function has two parameters, name and greeting. The greeting parameter is optional and has a default value of 'Hello'.

Rest Parameters: TypeScript supports rest parameters, which allow you to pass an arbitrary number of arguments to a function.
Example:

function sum(...numbers: number[]): number {
  return numbers.reduce((a, b) => a + b, 0);
}

let total: number = sum(1, 2, 3, 4, 5); // total is 15
In this example, the sum function takes an arbitrary number of arguments and returns their sum.

Classes and Objects in TypeScript
Classes are a fundamental part of object-oriented programming (OOP). They are templates for creating objects, providing initial values for state (member variables) and implementations of behavior (member functions or methods).

TypeScript supports classes, which are declared using the class keyword. One advantage of TypeScript classes is that they support object-oriented programming (OOP) features such as inheritance, encapsulation, and polymorphism.

Class Declaration: In TypeScript, classes are declared using the class keyword.
Example:

class Person {
  name: string;
  age: number;

  constructor(name: string, age: number) {
    this.name = name;
    this.age = age;
  }

  greet(): void {
    console.log(`Hello, my name is ${this.name} and I am ${this.age} years old.`);
  }
}

let john = new Person('John', 25);
john.greet(); // Outputs: Hello, my name is John and I am 25 years old.
In this example, Person is a class with two properties, name and age, and a method greet. The constructor is a special method for creating and initializing an object created with a class.

Inheritance: TypeScript supports inheritance, a mechanism of basing a class upon another class, retaining similar implementation. Inheritance is achieved using the extends keyword.
Example:

class Employee extends Person {
  department: string;

  constructor(name: string, age: number, department: string) {
    super(name, age);
    this.department = department;
  }

  greet(): void {
    super.greet();
    console.log(`I work in ${this.department}.`);
  }
}

let jane = new Employee('Jane', 30, 'HR');
jane.greet(); // Outputs: Hello, my name is Jane and I am 30 years old. I work in HR.
In this example, Employee is a class that extends Person. It adds a new property department and overrides the greet method. The super keyword is used to call corresponding methods of the parent class.

Abstract Classes: Abstract classes are classes that cannot be instantiated directly. They are used as base classes for other classes and can contain abstract methods that must be implemented by derived classes.
Example:

abstract class Shape {
  abstract area(): number;
}

class Circle extends Shape {
  radius: number;

  constructor(radius: number) {
    super();
    this.radius = radius;
  }

  area(): number {
    return Math.PI * this.radius ** 2;
  }
}

let circle = new Circle(5);
console.log(circle.area()); // Outputs: 78.54
In this example, Shape is an abstract class with an abstract method area. The Circle class extends Shape and implements the area method. Abstract classes are useful for defining a common interface for a set of classes.

Encapsulation: Encapsulation is the bundling of data (properties) and methods that operate on the data (methods) into a single unit called a class. In TypeScript, encapsulation is achieved by using access modifiers such as public, private, and protected.
Example:

class Person {
  private name: string;
  protected age: number;

  constructor(name: string, age: number) {
    this.name = name;
    this.age = age;
  }

  greet(): void {
    console.log(`Hello, my name is ${this.name} and I am ${this.age} years old.`);
  }
}

let john = new Person("John", 25);
console.log(john.name); // Error: Property "name" is private
console.log(john.age);  // Error: Property "age" is protected
In this example, name is a private property of the Person class, so it cannot be accessed from outside the class. age is a protected property, so it can be accessed from subclasses but not from outside the class.

Polymorphism: Polymorphism is the ability of an object to take on many forms. In TypeScript, polymorphism is achieved through method overriding, where a method in a subclass has the same name and signature as a method in its superclass.
Example:

class Animal {
  speak(): void {
    console.log('Animal makes a sound');
  }
}

class Dog extends Animal {
  speak(): void {
    console.log('Dog barks');
  }
}

let animal: Animal = new Dog();
animal.speak(); // Outputs: Dog barks
In this example, Animal is a base class with a speak method. Dog is a subclass that overrides the speak method. When an instance of Dog is assigned to a variable of type Animal, the speak method of Dog is called.

Access Modifiers: TypeScript supports the access modifiers public, private, and protected. By default, each member is public.
Example:

class Animal {
  private name: string;

  constructor(name: string) {
    this.name = name;
  }

  public getName(): string {
    return this.name;
  }
}

let dog = new Animal('Dog');
console.log(dog.getName()); // Outputs: Dog
In this example, name is a private member of the Animal class. It can only be accessed within the Animal class. The getName method is public, so it can be called from outside the class.

Interfaces in TypeScript
Interfaces in TypeScript are powerful ways to define contracts within your code. They are used to type-check whether an object fits a certain structure.

By defining an interface we can name a specific combination of variables, making sure they will always be used as a set.

Interface Declaration: Interfaces are declared with the interface keyword.
Example:

interface Person {
  name: string;
  age: number;
}

let john: Person = { name: 'John', age: 25 };
In this example, Person is an interface that describes an object that has a name of type string and an age of type number.

Optional Properties: Interface properties can be marked as optional with ?.
Example:

interface Person {
  name: string;
  age?: number;
}

let alice: Person = { name: 'Alice' };
In this example, age is an optional property in the Person interface. The object alice is still a Person even though it doesn't have an age.

Function Types: Interfaces can also describe function types.
Example:

interface GreetFunction {
  (name: string, age: number): string;
}

let greet: GreetFunction = function(name: string, age: number): string {
  return `Hello, my name is ${name} and I am ${age} years old.`;
};
In this example, GreetFunction is an interface that describes a function that takes a name and an age and returns a string.

Extending Interfaces: Interfaces can extend one another, creating a new interface that inherits the members of the base interface.
Example:

interface Animal {
  name: string;
}

interface Dog extends Animal {
  breed: string;
}

let myDog: Dog = { name: 'Rex', breed: 'German Shepherd' };
In this example, Dog extends Animal, so a Dog has both a name and a breed.

Enums in TypeScript
Enums are a way to define a set of named constants. They are often used to represent a set of related values, such as the days of the week or the months of the year.

TypeScript supports both numeric and string enums, providing a flexible way to define and work with sets of constants.

Numeric Enums: Numeric enums are a way to define a set of named constants with numeric values. By default, the values of the constants start at 0 and increment by 1 for each subsequent constant.
Example:

enum Day {
  Sunday,
  Monday,
  Tuesday,
  Wednesday,
  Thursday,
  Friday,
  Saturday
}

let today: Day = Day.Monday;
In this example, Day is a numeric enum that represents the days of the week. The constants Sunday, Monday, Tuesday, and so on are assigned numeric values starting from 0.

String Enums: String enums are a way to define a set of named constants with string values. Unlike numeric enums, the values of the constants in a string enum are initialized with the value of the constant name.
Example:

enum Month {
  January = 'January',
  February = 'February',
  March = 'March',
  April = 'April',
  May = 'May',
  June = 'June',
  July = 'July',
  August = 'August',
  September = 'September',
  October = 'October',
  November = 'November',
  December = 'December'
}

let currentMonth: Month = Month.June;
In this example, Month is a string enum that represents the months of the year. The constants January, February, March, and so on are assigned string values equal to their names.

Computed Enums: Enums can have computed values, which are initialized with an expression instead of a constant value. This allows for more flexibility in defining the values of the constants.
Example:

enum Color {
  Red = 1,
  Green = Math.pow(2, 2),
  Blue = Math.pow(2, 3)
}

let color: Color = Color.Green;
In this example, Color is an enum with computed values. The constants Red, Green, and Blue are assigned the values 1, 4, and 8, respectively, using the Math.pow function.

Reverse Mapping: Enums in TypeScript support reverse mapping, which means that you can access the name of a constant from its value. This is useful for debugging and logging purposes.
Example:

enum Day {
  Sunday,
  Monday,
  Tuesday,
  Wednesday,
  Thursday,
  Friday,
  Saturday
}

let dayName: string = Day[1]; // 'Monday'
In this example, the Day enum is used to access the name

Generics in TypeScript
Generics are a way to define a function or class that can be used with different types of data. They are often used to create reusable components that can work with different types of data.

TypeScript supports generics, allowing you to write type-safe code that is flexible and reusable.

Now let's look at some examples of generic functions and classes.

Generic Functions: Generic functions are functions that can work with a variety of data types. They are defined using type parameters, which are placeholders for the actual types that will be used when the function is called.
Example:

function identity<T>(value: T): T {
  return value;
}

let result1: number = identity<number>(42);
let result2: string = identity<string>('Hello, TypeScript!');
In this example, identity is a generic function that takes a type parameter T and returns a value of type T. The type parameter T is used to specify the type of the argument and the return value.

Generic Classes: Generic classes are classes that can work with a variety of data types. They are defined using type parameters, which are placeholders for the actual types that will be used when the class is instantiated.
Example:

class Box<T> {
  value: T;

  constructor(value: T) {
    this.value = value;
  }
}

let box1: Box<number> = new Box<number>(42);
let box2: Box<string> = new Box<string>('Hello, TypeScript!');
In this example, Box is a generic class that takes a type parameter T and has a property value of type T. The type parameter T is used to specify the type of the value stored in the box.

Generic Constraints: Generic constraints are a way to restrict the types that can be used with a generic function or class. They are defined using the extends keyword, followed by the type or interface that the type parameter must extend.
Example:

interface Printable {
  print(): void;
}

function printValue<T extends Printable>(value: T): void {
  value.print();
}

class Person implements Printable {
  print(): void {
    console.log('Printing person...');
  }
}

let person: Person = new Person();
printValue(person);
In this example, Printable is an interface that defines a print method. The printValue function is a generic function that takes a type parameter T that must extend Printable. The Person class implements the Printable interface.

At this point you have a basic understanding of TypeScript and you can start diving into more advanced concepts.

Conclusion

In this article, you've learned the basics of TypeScript.

We talked about the basic syntax of TypeScript, such as variables, functions, and classes.

You also learned about TypeScript's built-in types, such as numbers, strings, and booleans.

We discussed TypeScript's built-in enumerations, such as number enums, string enums, and computed enums. And you learned about TypeScript's generic types, such as generic functions and classes.

Thank you for reading!

About Author : Isaiah Clifford Opoku

Hello, my name is Isaiah Clifford Opoku. I am a TypeScript and C# developer. I love solving problems using technology and sharing my knowledge through technical writing.




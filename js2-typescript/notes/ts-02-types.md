Source : https://www.typescripttutorial.net/typescript-tutorial/typescript-types/

(some parts may be modified or removed) ✔

[Back](../readme.md)

---

- [TypeScript Types](#typescript-types)
- [Understanding Type Annotations in TypeScript](#understanding-type-annotations-in-typescript)
  - [Arrays](#arrays)
  - [Objects](#objects)
  - [Function arguments \& return types](#function-arguments--return-types)
- [TypeScript Type Inference](#typescript-type-inference)
  - [Contextual typing](#contextual-typing)
  - [Type inference vs. Type annotations](#type-inference-vs-type-annotations)
- [TypeScript Number](#typescript-number)
- [TypeScript String](#typescript-string)
- [TypeScript Boolean](#typescript-boolean)
- [TypeScript object Type](#typescript-object-type)
- [TypeScript Array Type](#typescript-array-type)
- [TypeScript Tuple](#typescript-tuple)
- [TypeScript Enum](#typescript-enum)
- [TypeScript any Type](#typescript-any-type)
- [TypeScript Unknown Type](#typescript-unknown-type)
- [TypeScript union Type](#typescript-union-type)
- [TypeScript String Literal Types](#typescript-string-literal-types)
- [TypeScript Type Aliases](#typescript-type-aliases)
- [TypeScript never Type](#typescript-never-type)

---

# TypeScript Types

In TypeScript, a type is a convenient way to refer to the different properties and functions that a value has.(bir tip tanımı yapılınca beraberinde metodları birlikte tanımlanmış olur)

A value is anything that you can assign to a variable e.g., a number, a string, an array, an object, and a function.

See the following value:

```js
"Hello";
```

When you look at this value, you can say that it’s a string. And this value has properties and methods that a string has.

```js
console.log("Hello".length); // 5
```

It also has many methods like match(), indexOf(), and toLocaleUpperCase(). For example:

```js
console.log("Hello".toLocaleUpperCase()); // HELLO
```

In conclusion, in TypeScript:

- a type is a label that describes the different properties and method that a value has

- every value has a type.

➖ Types in TypeScript

TypeScript inherits the built-in types from JavaScript. TypeScript types is categorized into:

- Primitive types
- Object types

🔔 _Primitive types_

The following illustrates the primitive types in TypeScript:

| Name      | Description                                                                  |
| --------- | ---------------------------------------------------------------------------- |
| string    | represents text data                                                         |
| number    | represents numeric values                                                    |
| boolean   | has true and false values                                                    |
| null      | has one value: null                                                          |
| undefined | has one value: undefined. It is a default value of an uninitialized variable |
| symbol    | represents a unique constant value                                           |

🔔 _Object types_

Objec types are `functions, arrays, classes, etc.` Later, you’ll learn how to create custom object types.

➖ Examples of TypeScript types

The following example uses the querySelector() method to select the `<h1>` element:

```js
const heading = document.querySelector("h1");
```

The TypeScript compiler knows that the type of heading is `HTMLHeadingElement`:

And it shows a list of methods of the HTMLHeadingElement type that `heading` can access:

If you try to access a property or method that doesn’t exist, the TypeScript compiler will show an error. For example:

```js
heading.rotate(); // red underline is seen
```

➖ Summary

- Every value in TypeScript has a type.
- A type is a label that describes the properties and methods that a value has.

- TypeScript compiler uses types to analyze your code for hunting bugs and errors.

# Understanding Type Annotations in TypeScript

TypeScript uses type annotations to specify explicit types for identifiers such as variables, functions, objects, etc.

The following syntax shows how to specify type annotations for variables and constants:

```js
let variableName: type;
let variableName: type = value;
const constantName: type = value;
```

The following example uses number annotation for a variable:

```js
let counter: number;
```

```js
counter = 1;
```

If you assign a string to the counter variable, you’ll get an error.

```js
Type '"Hello"' is not assignable to type 'number'.

```

You can both use a type annotation for a variable and initialize it in a single statement like this:

```js
let counter: number = 1;
```

The following shows other examples of primitive type annotations:

```js
let name: string = "John";
let age: number = 25;
let active: boolean = true;
```

➖ Type annotation examples

## Arrays

To annotate an array type you use a specific type followed by a square bracket : `type[] :`

Syntax

```js
let arrayName: type[];
```

For example, the following declares an array of strings:

```js
let names: string[] = ["John", "Jane", "Peter", "David", "Mary"];
```

## Objects

To specify a type for an object, you use the object type annotation. For example:

```js
let person: {
  name: string,
  age: number,
};

person = {
  name: "John",
  age: 25,
}; // valid
```

In this example, the person object only accepts an object that has two properties: name with the string type and age with the number type.

## Function arguments & return types

The following shows a function annotation with parameter type annotation and return type annotation:

```js
let greeting: (name: string) => string;
```

In this example, you can assign any function that accepts a string and returns a string to the greeting variable:

```js
greeting = function (name: string) {
  return `Hi ${name}`;
};
```

The following causes an error because the function that is assigned to the greeting variable doesn’t match its function type.

```js
greeting = function () {
  console.log("Hello");
};

// Error:

// Type '() => void' is not assignable to type '(name: string) => string'. Type 'void' is not assignable to type 'string'.
```

# TypeScript Type Inference

Type inference describes where and how TypeScript infers types when you don’t explicitly annotate them.

➖ Basic type inference

When you declare a variable, you can use a type annotation to explicitly specify a type for it. For example:

```js
let counter: number;
```

However, if you initialize the counter variable with a number, TypeScript will infer the type of the counter to be number. For example:

```js
let counter = 0;
```

It is equivalent to the following statement:

```js
let counter: number = 0;
```

Likewise, when you assign a function parameter a value, TypeScript infers the type of the parameter to the type of the default value. For example:

```js
function setCounter(max = 100) {
  // ...
}
```

In this example, TypeScript infers the type of the max parameter to be number.

Similarly, TypeScript infers the following return type of the increment() function as number:

```js
function increment(counter: number) {
  return counter++;
}
```

It is the same as:

```js
function increment(counter: number): number {
  return counter++;
}
```

The best common type algorithm
Consider the following assignment:

```js
let items = [1, 2, 3, null];
```

To infer the type of items variable, TypeScript needs to consider the type of each element in the array.

It uses the best common type algorithm to analyze each candidate type and select the type that is compatible with all other candidates.

In this case, TypeScript selects the number or null array type (number | null) []) as the best common type. Note that the | means the OR operator in types.

If you add a string to the items array, TypeScript will infer the type for the items as an array of numbers and strings: `(number | string)[]`

```js
let items = [1, 2, 3, "Cheese"];
```

## Contextual typing

TypeScript uses the locations of variables to infer their types. This mechanism is known as `contextual typing`. For example:

```js
document.addEventListener("click", function (event) {
  console.log(event.button);
});
```

In this example, TypeScript knows that the event parameter is an instance of `MouseEvent` because of the click event.

However, when you change the click event to the scroll the event, TypeScript will issue an error:

```js
document.addEventListener("scroll", function (event) {
  console.log(event.button); // compile error
});
```

```js
Error:

Property 'button' does not exist on type 'Event'.(2339)

```

TypeScript knows that the event in this case, is an instance of UIEvent, not a MouseEvent. And `UIEvent does not have the button property`, therefore, TypeScript throws an error.

You will find contextual typing in many cases such as arguments to function calls, type assertions, members of objects and array literals, return statements, and right-hand sides of assignments.

## Type inference vs. Type annotations

The following shows the difference between type inference and type annotations:

| Type inference              | Type annotations                        |
| --------------------------- | --------------------------------------- |
| TypeScript guesses the type | You explicitly tell TypeScript the type |

So, when do you use type inference and type annotations?

In practice, you should always use the type inference as much as possible. You use the type annotation in the following cases:

- When you declare a variable and assign it a value later.
- When you want a variable that can’t be inferred.
- When a function returns the any type, you need to clarify the value.

Summary

- Type inference occurs when you initialize variables, set parameter default values, and determine function return types.
- TypeScript uses the best common type algorithm to select the best candidate types that are compatible with all variables.
- TypeScript also uses contextual typing to infer types of variables based on the locations of the variables.

# TypeScript Number

All numbers in TypeScript are either floating-point values or big integers. The floating-point numbers have the type number while the big integers get the type bigint.

➖ The number type

The following shows how to declare a variable that holds a floating-point value:

```js
let price: number;
```

Alternatively, you can initialize the price variable to a number:

```js
let price = 9.95;
```

As in JavaScript, TypeScript supports the number literals for decimal, hexadecimal, binary, and octal literals:

➖ Decimal numbers

The following shows some decimal numbers:

```js
let counter: number = 0;
let x: number = 100,
  y: number = 200;
```

➖ Binary Numbers

The binary number uses a leading zero followed by a lowercase or uppercase letter “B” e.g., 0b or 0B :

```js
let bin = 0b100;
let anotherBin: number = 0b010;
```

Note that the digit after 0b or 0B must be 0 or 1.

➖ Octal Numbers

An octal number uses a leading zero followed by the letter o (since ES2015) 0o. The digits after 0o are numbers in the range 0 through 7:

```js
let octal: number = 0o10;
```

➖ Hexadecimal numbers

Hexadecimal numbers use a leading zero followed by a lowercase or uppercase letter X (0x or 0X). The digits after the 0x must be in the range (0123456789ABCDEF). For example:

```js
let hexadecimal: number = 0xa;
```

JavaScript has the Number type (with the letter N in uppercase) that refers to the non-primitive boxed object. You should not use this Number type as much as possible in TypeScript.

➖ Big Integers

The big integers represent the whole numbers larger than 2^53–1. A Big integer literal has the n character at the end of an integer literal like this:

```js
let big: bigint = 9007199254740991n;
```

Summary

- All numbers in TypeScript are either floating-point values that get the number type or big integers that get the bigint type.

- Avoid using the Number type as much as possible.

# TypeScript String

Like JavaScript, TypeScript uses double quotes (") or single quotes (') to surround string literals:

```js
let firstName: string = "John";
let title: string = "Web Developer";
```

TypeScript also supports template strings that use the backtick (`) to surround characters.

The template strings allow you to create multi-line strings and provide string interpolation features.

The following example shows how to create a multi-line string using the backtick (`):

```js
let description = `This TypeScript string can 
span multiple 
lines
`;
```

String interpolations allow you to embed the variables into the string like this:

```js
let firstName: string = `John`;
let title: string = `Web Developer`;
let profile: string = `I'm ${firstName}. 
I'm a ${title}`;

console.log(profile);
```

```txt
Output:

I'm John.
I'm a Web Developer.
Code language: PHP (php)

```

Summary

- In TypeScript, all strings get the string type.

- Like JavaScript, TypeScript uses double quotes ("), single quotes ('), and backtick (`) to surround string literals.

# TypeScript Boolean

The TypeScript boolean type has two values: true and false. The boolean type is one of the primitive types in TypeScript.

➖ Declaring boolean variables

In TypeScript, you can declare a boolean variable using the boolean keyword. For example:

```js
let pending: boolean;
pending = true;
// after a while
// ..
pending = false;
```

➖ Boolean operator

To manipulate boolean values, you use the boolean operators. TypeScript supports common boolean operators:
Meaning
| Operator | Meaning |
|----------|----------------------|
| && | Logical AND operator |
| `\|\|` | Logical OR operator |
| ! | Logical NOT operator |

For example:

```js
// NOT operator
const pending: boolean = true;
const notPending = !pending; // false
console.log(result); // false

const hasError: boolean = false;
const completed: boolean = true;

// AND operator
let result = completed && hasError;
console.log(result); // false

// OR operator
result = completed || hasError;
console.log(result); // true
```

➖ Type annotations for boolean

As seen in previous examples, you can use the boolean keyword to annotate the types for the boolean variables:

```js
let completed: boolean = true;
```

However, TypeScript often infers types automatically, so type annotations may not be necessary:

```js
let completed = true;
```

Like a variable, you can annotate boolean parameters or return the type of a function using the boolean keyword:

```js
function changeStatus(status: boolean): boolean {
  //...
}
```

➖ Boolean Type

JavaScript has the Boolean type that refers to the non-primitive boxed object. The Boolean type has the letter B in uppercase, which is different from the boolean type.

It’s a good practice to avoid using the Boolean type.

**Summary**

- TypeScript boolean type has two values true and false.
- Use the boolean keyword to declare boolean variables.
- Do not use Boolean type unless you have a good reason to do so.

# TypeScript object Type

The TypeScript object type represents all values that are not in primitive types.

The following are primitive types in TypeScript:

```
number
bigint
string
boolean
null
undefined
symbol

```

The following shows how to declare a variable that holds an object:

```js
let employee: object;

employee = {
  firstName: "John",
  lastName: "Doe",
  age: 25,
  jobTitle: "Web Developer",
};

console.log(employee);
```

```js
Output:

{
  firstName: 'John',
  lastName: 'Doe',
  age: 25,
  jobTitle: 'Web Developer'
}

```

If you reassign a primitive value to the employee object, you’ll get an error :

```js
employee = "Jane";

// Error:
//
// error TS2322: Type '"Jane"' is not assignable to type 'object'.
```

The employee object is an object type with a fixed list of properties. If you attempt to access a property that doesn’t exist on the employee object, you’ll get an error:

```js
console.log(employee.hireDate);

// Error:
//
// error TS2339: Property 'hireDate' does not exist on type 'object'.
```

Note that the above statement works perfectly fine in JavaScript and returns undefined instead.

To explicitly specify properties of the employee object, you first use the following syntax to declare the employee object:

```js
let employee: {
  firstName: string,
  lastName: string,
  age: number,
  jobTitle: string,
};
```

And then assign the employee object to a literal object with the described properties:

```js
employee = {
  firstName: "John",
  lastName: "Doe",
  age: 25,
  jobTitle: "Web Developer",
};
```

Or you can combine both syntaxes in the same statement like this:

```js
let employee: {
  firstName: string,
  lastName: string,
  age: number,
  jobTitle: string,
} = {
  firstName: "John",
  lastName: "Doe",
  age: 25,
  jobTitle: "Web Developer",
};
```

➖ object vs. Object

TypeScript has another type called Object with the letter O in uppercase. It’s important to understand the differences between them.

The object type represents all non-primitive values while the Object type describes the functionality of all objects.

For example, the Object type has the toString() and valueOf() methods that can be accessible by any object.

➖ The empty type {}

TypeScript has another type called empty type denoted by `{}` , which is quite similar to the object type.

The empty type {} describes an object that has no property on its own. If you try to access a property on such an object, TypeScript will issue a compile-time error:

```js
let vacant: {};
vacant.firstName = "John";

// Error:
//
// error TS2339: Property 'firstName' does not exist on type '{}'.
```

But you can access all properties and methods declared on the Object type, which is available on the object via the prototype chain:

```js
let vacant: {} = {};
console.log(vacant.toString());

// Output:
//
// [object Object]
```

**Summary**

- The TypeScript object type represents any value that is not a primitive value.
- The Object type, however, describes functionality that is available on all objects.
- The empty type {} refers to an object that has no property on its own.

# TypeScript Array Type

A TypeScript array is an ordered list of data. To declare an array that holds values of a specific type, you use the following syntax:

```js
let arrayName: type[];
```

For example, the following declares an array of strings:

```js
let skills: string[] = [];
```

And you can add one or more strings to the array:

```js
skills[0] = "Problem Solving";
skills[1] = "Programming";
```

or use the push() method:

```js
skills.push("Software Design");
```

The following declares a variable and assigns an array of strings to it:

```js
let skills = ["Problem Sovling", "Software Design", "Programming"];
```

In this example, TypeScript infers the skills array as an array of strings. It is equivalent to the following:

```js
let skills: string[];
skills = ["Problem Sovling", "Software Design", "Programming"];
```

After you define an array of a specific type, TypeScript will prevent you from adding incompatible values. For example, the following will cause an error:

```js
skills.push(100);

// Error:
//
// Argument of type 'number' is not assignable to parameter of type 'string'.
```

… because we’re trying to add a number to the string array.

When you extract an element from the array, TypeScript infers the type of the array element. For example:

```js
let skill = skills[0];
console.log(typeof skill);

// Output:
//
// string
```

Since an element in a string array is a string, TypeScript infers the type of the skill variable to string as shown in the output.

➖ TypeScript array properties and methods

TypeScript arrays have the same properties and methods as JavaScript arrays. For example, the following uses the length property to get the number of elements in an array:

```js
let series = [1, 2, 3];
console.log(series.length); // 3
```

You can use all the useful array methods such as forEach(), map(), reduce(), and filter(). For example:

```js
let series = [1, 2, 3];
let doubleIt = series.map((e) => e * 2);
console.log(doubleIt);

// Output:
//
// [ 2, 4, 6 ]
```

➖ Storing values of mixed types

The following illustrates how to define an array that holds both strings and numbers:

```js
let scores = ["Programming", 5, "Software Design", 4];
```

In this case, TypeScript infers the scores array as an array of `string | number`. It’s equivalent to the following:

```js
let scores: (string | number)[];
scores = ["Programming", 5, "Software Design", 4];
```

**Summary**

- In TypeScript, an array is an ordered list of values.
- Use the `let arr: type[]` syntax to declare an array of a specific type. Adding a value of a different type to the array will result in an error.
- An array can store values of mixed types. Use the `arr: (type1 | type2) []` syntax to declare an array of values with mixed types (type1, and type2)

# TypeScript Tuple

A tuple works like an array with some additional considerations:

- The number of elements in the tuple is fixed.
- The types of elements are known, and need not be the same.

For example, you can use a tuple to represent a value as a pair of a string and a number:

```js
let skill: [string, number];
skill = ["Programming", 5];
```

The order of values in a tuple is important. If you change the order of values of the skill tuple to [5, "Programming"], you’ll get an error:

```js
let skill: [string, number];
skill = [5, "Programming"];

// Error:
//
// error TS2322: Type 'string' is not assignable to type 'number'.
```

For example, you can use a tuple to define an RGB color that always comes in a three-number pattern: (r,g,b)

For example:

```js
let color: [number, number, number] = [255, 0, 0];
```

The color[0], color[1], and color[2] would be logically mapped to Red, Green and Blue color values.

➖ Optional Tuple Elements

Since TypeScript 3.0, a tuple can have optional elements specified using the question mark `(?)` postfix.

For example, you can define an RGBA tuple with the optional alpha channel value:

```js
let bgColor, headerColor: [number, number, number, number?];
bgColor = [0, 255, 255, 0.5];
headerColor = [0, 255, 255];

```

Note that the RGBA defines colors using the red, green, blue, and alpha models. The alpha specifies the opacity of the color.

**Summary**

- A tuple is an array with a fixed number of elements whose types are known.



# TypeScript Enum

An enum is a group of named constant values. Enum stands for enumerated type.

To define an enum, you follow these steps:

- First, use the enum keyword followed by the name of the enum.
- Then, define constant values for the enum.

The following shows the syntax for defining an enum:

```js
enum name {constant1, constant2, ...};

```

In this syntax, the constant1, constant2, etc., are also known as the members of the enum.

🧲 TypeScript enum type example

The following example creates an enum that represents the months of the year:

```js
enum Month {
    Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec
};

```

In this example, the enum name is Month and constant values are Jan, Feb, Mar, and so on.

The following declares a function that uses the Month enum as the type of the month parameter:

```js
function isItSummer(month: Month) {
  let isSummer: boolean;
  switch (month) {
    case Month.Jun:
    case Month.Jul:
    case Month.Aug:
      isSummer = true;
      break;
    default:
      isSummer = false;
      break;
  }
  return isSummer;
}
```

And you can call it like so:

```js
console.log(isItSummer(Month.Jun)); // true
```

This example uses constant values including Jan, Feb, Mar, … in the enum rather than magic values like 1, 2, 3,… This makes the code more obvious.

➖ How TypeScript enum works

It’s a good practice to use the constant values defined by enums in the code.

However, the following example passes a number instead of an enum to the isItSummer() function. And it works.

```js
console.log(isItSummer(6)); // true
```

This example uses a number (6) instead of a constant defined by the Month enum. And it works.

Let’s check the generated Javascript code of the Month enum:

```js
var Month;
(function (Month) {
  Month[(Month["Jan"] = 0)] = "Jan";
  Month[(Month["Feb"] = 1)] = "Feb";
  Month[(Month["Mar"] = 2)] = "Mar";
  Month[(Month["Apr"] = 3)] = "Apr";
  Month[(Month["May"] = 4)] = "May";
  Month[(Month["Jun"] = 5)] = "Jun";
  Month[(Month["Jul"] = 6)] = "Jul";
  Month[(Month["Aug"] = 7)] = "Aug";
  Month[(Month["Sep"] = 8)] = "Sep";
  Month[(Month["Oct"] = 9)] = "Oct";
  Month[(Month["Nov"] = 10)] = "Nov";
  Month[(Month["Dec"] = 11)] = "Dec";
})(Month || (Month = {}));
```

And you can output the Month variable to the console:

```js
{
  '0': 'Jan',
  '1': 'Feb',
  '2': 'Mar',
  '3': 'Apr',
  '4': 'May',
  '5': 'Jun',
  '6': 'Jul',
  '7': 'Aug',
  '8': 'Sep',
  '9': 'Oct',
  '10': 'Nov',
  '11': 'Dec',
  Jan: 0,
  Feb: 1,
  Mar: 2,
  Apr: 3,
  May: 4,
  Jun: 5,
  Jul: 6,
  Aug: 7,
  Sep: 8,
  Oct: 9,
  Nov: 10,
  Dec: 11
}

```

The output indicates that a TypeScript enum is an object in JavaScript. This object has named properties declared in the enum. For example, Jan is 0 and Feb is 1.

The generated object also has number keys with string values representing the named constants.

That’s why you can pass a number into the function that accepts an enum. In other words, an enum member is both a number and a defined constant.

➖ Specifying enum members’ numbers

TypeScript defines the numeric value of an enum’s member based on the order of that member that appears in the enum definition. For example, Jan takes 0, Feb gets 1, etc.

It’s possible to explicitly specify numbers for the members of an enum like this:

```js
enum Month {
    Jan = 1,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec
};

```

In this example, the Jan constant value takes 1 instead of 0. The Feb takes 2, and the Mar takes 3, etc.

➖ When to use an enum

You should use an enum when you:

- Have a small set of closely related fixed values.
- And these values are known at compile time.

For example, you can use an enum for the approval status:

```js
enum ApprovalStatus {
    draft,
    submitted,
    approved,
    rejected
};

```

Then, you can use the ApprovalStatus enum like this:

```js
const request = {
  id: 1,
  status: ApprovalStatus.approved,
  description: "Please approve this request",
};

if (request.status === ApprovalStatus.approved) {
  // send an email
  console.log("Send email to the Applicant...");
}
```

**Summary**

- A TypeScript enum is a group of constant values.
- Under the hood, an enum is a JavaScript object with named properties declared in the enum definition.
- Do use an enum when you have a small set of fixed values that are closely related and known at compile time.

# TypeScript any Type

Sometimes, you may need to store a value in a variable. But you don’t know its type when writing the program. And the unknown value may come from a third-party API or user input.

In this case, you want to opt out of the type checking and allow the value to pass through the compile-time check.

For example:

```js
let result: any;

result = 1;
console.log(result);

result = "Hello";
console.log(result);

result = [1, 2, 3];
const total = result.reduce((a: number, b: number) => a + b, 0);
console.log(total);

// Output:
//
```

In this example:

- First, declare the variable result with the type any.
- Second, assign number 1 to the result and display its value to the console.
- Third, assign the string literal 'Hello' to the result and show its value to the console.
- Finally, assign an array of numbers to the result variable, calculate the total using the reduce() method, and log the total to the console.

Let’s take another typical example:

```js
// json may come from a third-party API
const json = `{"latitude": 10.11, "longitude":12.12}`;

// parse JSON to find location
const currentLocation = JSON.parse(json);
console.log(currentLocation);

// Output:
//
// { latitude: 10.11, longitude: 12.12 }
```

In this example, TypeScript infers the value of the currentLocation variable as any. We assign an object returned by the JSON.parse() function the currentLocation variable.

However, when we access the non-existing property (x) of the currentLocation variable, TypeScript does not carry any checks.

This is working fine and shows an undefined value in the console:

```js
console.log(currentLocation.x); // undefined

// Output:
//
// undefined
```

The TypeScript compiler doesn’t complain or issue any errors.

The any type provides you with a way to work with the existing JavaScript codebase. It allows you to gradually opt in and opt out of type-checking during compilation. Therefore, you can use the any type for migrating a JavaScript project over to TypeScript.

➖ TypeScript any: implicit typing

If you declare a variable without specifying a type, TypeScript assumes that you use the any type. This feature is called type inference. TypeScript guesses the type of the variable. For example:

```js
let result;
```

In this example, TypeScript infers the type for you. This practice is called `implicit typing`.

Note that to disable implicit typing to the any type, you change the `noImplicitAny` option in the tsconfig.json file to true. You’ll learn more about the tsconfig.json in the later tutorial.

➖ TypeScript any vs. object

If you declare a variable with the object type, you can also assign any value to it. However, you cannot call a method on it even if the method exists. For example:

```js
let result: any;
result = 10.123;
console.log(result.toFixed());
result.willExist(); //
```

In this example, the TypeScript compiler doesn’t issue any warning even the willExist() method doesn’t exist at compile time because the willExist() method might be available at runtime.

If you run the code, you’ll see the following error message on the console window:

```sh
TypeError: result.willExist is not a function

```

However, if you change the type of the result variable to object, the TypeScript compiler will issue two errors:

```js
let result: object;
result = 10.123;
result.toFixed();

// Errors:
//
// app.ts:2:1 - error TS2322: Type 'number' is not assignable to type 'object'.
//
// 2 result = 10.123;
//  ~~~~~~
// app.ts:3:8 - error TS2339: Property 'toFixed' does not exist on type 'object'.
//
// 3 result.toFixed();
// ~~~~~~~
//
// Found 2 errors in the same file, starting at: app.ts:2
```

**Summary**

- The TypeScript any type allows you to store a value of any type. It instructs the compiler to skip type-checking.
- Use the any type to store a value that you don’t know its type at the compile-time or when you migrate a JavaScript project over to a TypeScript project.

# TypeScript Unknown Type

In TypeScript, the unknown type can hold a value that is not known upfront but requires type checking.

To declare a variable of the unknown type, you use the following syntax:

```js
let result: unknown;
```

Like the any type, you can assign any value to a variable of the unknown type. For example:

```js
let result: unknown;

result = 1;
result = "hello";
result = false;
result = Symbol();
result = { name: "John" };
result = [1, 2, 3];
```

Unlike the any type, TypeScript checks the type before performing operations on it.

For example, you cannot call a method or apply an operator on a unknown value. If you attempt to do so, the TypeScript compiler will issue an error:

```js
let result: unknown;
result = [1, 2, 3];

const total = result.reduce((a: number, b: number) => a + b, 0);
console.log(total);
```

In this example, the result variable has the type of unknown. We assign an array the result value, but its type is still unknown. Therefore, we cannot call the reduce() method of an array on it.

To call the reduce() method on the result variable, you need to use `the type assertion` to explicitly tell the TypeScript compiler that the type of the result is array. For example:

```js
let result: unknown;
result = [1, 2, 3];

const total = (result as number[]).reduce((a: number, b: number) => a + b, 0);
console.log(total); // 6

```

In this example, we explicitly tell the TypeScript compiler that the type of the result is an array of numbers (result as number[]).

Therefore, we can call the reduce() method on the result array without any issues.

➖ Unknown vs Any type

The following table highlights the key differences between the unknown and any types:

| Feature          | any                                                                      | unknown                                                                                                      |
| ---------------- | ------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ |
| Type Safety      | No type-safety                                                           | Enforces type safety                                                                                         |
| Operations       | Operations can be performed without checks                               | Operations cannot be performed without type assertion (narrowing type)                                       |
| Use cases        | Useful for dynamic values but unsafe.                                    | Useful for dynamic values and safe because it requires validation before use.                                |
| Type Checking    | TypeScript compiler does not perform a type checking on an any variable. | TypeScript compiler enforces a type checking on an unknown variable.                                         |
| Common Scenarios | Used for migrating JavaScript codebase to TypeScript.                    | Used when handling data from external sources (API calls, databases, ..) where type validation is necessary. |

➖ TypeScript unknown examples

Let’s take some practical examples of using the Typescript unknown type.

1. Handling external data
   When receiving data from an external API, you can use the unknown type to enforce validation before processing it.

The following example shows how to use the fetch method to call an API from the https://jsonplaceholder.typicode.com/posts endpoint:

```js
const fetchData = async (url: string): Promise<unknown> => {
const response = await fetch(url);
return await response.json();
};

const showPosts = async () => {
const url = 'https://jsonplaceholder.typicode.com/posts';
try {
const posts = await fetchData(url); // unknown type

(
  posts as { userId: number; id: number; title: string; body: string }[]
).map((post) => console.log(post.title));
  } catch (err) {
    console.log(err);
  }

};

showPosts();

```

How it works.

First, define a function fetchData that calls API from a URL and returns JSON data. Since the shape of the returned data is not known, the function returns a `Promise<unknown>` value:

```js
const fetchData = async (url: string): Promise<unknown> => {
const response = await fetch(url);
return await response.json();
};

```

Second, define the showPosts() function that uses the fetchData() function to call an API from the endpoint https://jsonplaceholder.typicode.com/posts:

```js
const showPosts = async () => {
const url = 'https://jsonplaceholder.typicode.com/posts';
try {
const posts = await fetchData(url); // unknown type
(
posts as { userId: number; id: number; title: string; body: string }[]
).map((post) => console.log(post.title));
} catch (err) {
console.log(err);
}
};

```

In this example, the posts variable has a type of unknown.

Before accessing its title property, we use type assertion to instruct the TypeScript compiler to treat it as an array of post objects:

```js
posts as { userId: number; id: number; title: string; body: string }[]

```

Third, call the showPosts() function:

```js
showPosts();

```
Code language: TypeScript (typescript) 2) Creating type-safe interfaces

The following example defines a function format that format a value before logging it to the console:

```js
function format(value: unknown): void {
switch (typeof value) {
case 'string':
console.log('String:', value.toUpperCase());
break;
case 'number':
console.log('Number:', value.toFixed(2));
break;
default:
console.log('Other types:', value);
}
}

```

In this example, before accessing a method of the value, we validate its type to ensure that the operation is valid.

**Summary**

- The unknown type is like any type but more restrictive.

- Use the unknown type to handle data coming from external sources and requires validation before use.


# TypeScript union Type

Sometimes, you will run into a function that expects a parameter that is either a number or a string. For example:

```js
function add(a: any, b: any) {
    if (typeof a === 'number' && typeof b === 'number') {
        return a + b;
    }
    if (typeof a === 'string' && typeof b === 'string') {
        return a.concat(b);
    }
    throw new Error('Parameters must be numbers or strings');
}

```

In this example, the add() function will calculate the sum of its parameters if they are numbers.

If the parameters are strings, the add() function will concatenate them into a single string.

If the parameters are neither numbers nor strings, the add() function throws an error.

The problem with the parameters of the add() function is that its parameters have the any type. It means that you can call the function with arguments that are neither numbers nor strings, the TypeScript will be fine with it.

This code will be compiled successfully but cause an error at runtime:

```js
add(true, false);

```

To resolve this, you can use the TypeScript union type. The union type allows you to combine multiple types into one type.

For example, the following variable is of type number or string:

```js
let result: number | string;
result = 10; // OK
result = 'Hi'; // also OK
result = false; // a boolean value, not OK

```

A union type describes a value that can be one of several types, not just two. For example number | string | boolean is the type of a value that can be a number, a string, or a boolean.

Back to the add() function example, you can change the types of parameters from the any to a union like this:

```ts
function add(a: number | string, b: number | string) {
    if (typeof a === 'number' && typeof b === 'number') {
        return a + b;
    }
    if (typeof a === 'string' && typeof b === 'string') {
        return a.concat(b);
    }
    throw new Error('Parameters must be numbers or strings');
}

```

We can specify the union type for the add function:

```js
function add(a: number | string, b: number | string) :  number | string {
    if (typeof a === 'number' && typeof b === 'number') {
        return a + b;
    }
    if (typeof a === 'string' && typeof b === 'string') {
        return a.concat(b);
    }
    throw new Error('Parameters must be numbers or strings');
}

```

Later, you will learn about the generic type to handle this more elegantly.

Summary

- A TypeScript union type allows you to store a value of one or several types in a variable.

# TypeScript String Literal Types

The string literal types allow you to define a type that accepts only one specified string literal.

The following defines a string literal type that accepts a literal string 'click':

```js
let click: 'click';

```

The click is a string literal type that accepts only the string-literal 'click'. If you assign the literal string 'click' to the click, it will be valid:

```js
click = 'click'; // valid

```

However, when you assign another string literal to the click, the TypeScript compiler will issue an error. For example:

```js
click = 'dblclick'; // compiler error

// Error:
// 
// Type '"dblclick"' is not assignable to type '"click"'.
```

The string literal type is useful to limit a possible string value that a variable can store.

The string literal types can combine nicely with the union types to define a finite set of string literal values for a variable:

```js
let mouseEvent: 'click' | 'dblclick' | 'mouseup' | 'mousedown';
mouseEvent = 'click'; // valid
mouseEvent = 'dblclick'; // valid
mouseEvent = 'mouseup'; // valid
mouseEvent = 'mousedown'; // valid
mouseEvent = 'mouseover'; // compiler error

```

If you use the string literal types in multiple places, they will be verbose.

To avoid this, you can use the type aliases. For example:

```js
type MyMouseEvent = 'click' | 'dblclick' | 'mouseup' | 'mousedown';
let mouseEvent: MyMouseEvent;
mouseEvent = 'click'; // valid
mouseEvent = 'dblclick'; // valid
mouseEvent = 'mouseup'; // valid
mouseEvent = 'mousedown'; // valid
mouseEvent = 'mouseover'; // compiler error

let anotherEvent: MyMouseEvent;

```

Summary

- A TypeScript string literal type defines a type that accepts specified string literal.
Use the string literal types with union types and type aliases to define types that accept a finite set of string literals.

# TypeScript Type Aliases

In TypeScript, a type alias allows you to create `a new name for an existing type`.

Type aliases can be useful for:

- Simplifying complex types.
- Making code more readable.
- Creating reusable types that can be used in many places in the codebase.

To define a type alias, you use the `type` keyword followed by the alias name and the type it represents.

Syntax

```js
type alias = existingType;

```

The existing type can be any valid TypeScript type including primitive type, object type, union type, intersection type, and function type.

➖ Type alias examples

1) Primitive types

The following example uses the type alias chars for the string type:

```js
type Name: string;

let firstName: Name;
let lastName: Name;

```

In this example, we create the `Name` as `a type alias` for the string type and use it to declare two variables firstName and lastName.

1) Object types
2) 
The following example defines `a type alias Person` for an object that has two properties name and age:

```js
type Person = {
  name: string;
  age: number;
};

let person: Person = {
  name: 'John',
  age: 25
};

```

1) Union Types

The following example shows how to define a type alias for the union type `string | number`:

```js
type alphanumeric = string | number;

let input: alphanumeric;
input = 100; // valid
input = 'Hi'; // valid
input = false; // Compiler error

```

2) Intersection Types

The following example shows how to create a type alias for the intersection type Personal & Contact:

```js
type Personal = {
  name: string;
  age: number;
};

type Contact = {
  email: string;
  phone: string;
};

type Candidate = Personal & Contact;

let candidate: Candidate = {
  name: "Joe",
  age: 25,
  email: "joe@example.com",
  phone: "(408)-123-4567"
};

```

Summary

- Use type aliases to define new names for existing types.

# TypeScript never Type

In TypeScript, a type is like a set of values. For example, the number type holds the numbers 1, 2, 3, etc. The string type holds the strings like 'Hi', 'Hello', etc. The null type holds a single value, which is null.

The never type is a type that holds no value. It is like an empty set.

Since a never type does not hold any value, you cannot assign a value to a variable with the never type.

For example, the following will result in an error:

```js
let empty: never = 'hello';

```

The TypeScript compiler issues the following error:

```sh
Type 'string' is not assignable to type 'never'

```

So why do we need the never type in the first place?

Since the never type has zero value, you can use it to denote an impossibility in the type system.

For example, you may have an intersection type that can be both a string and a number at the same time, which is impossible:

```js
type Alphanumeric = string & number; // never

```

Therefore, the TypeScript compiler infers the type of Alphanumeric as never.

This is because string and number are mutually exclusive. In other words, a value cannot be both a string and a number simultaneously.

Typically, you use the never type to represent the return type of a function that never returns the control to the caller. For example, a function that always throws an error:

```js
function raiseError(message: string): never {
    throw new Error(message);
}

```
Please do not confuse with functions that return void but still return the control to the caller.

If you have a function that contains an indefinite loop, its return type should be never. For example:

```js
function forever(): never {
  while (true) {}
}


```

In this example, the type of the return type of the forever() function is never.

The TypeScript never example

Let’s take an example of using the never type:

```js
type Role = 'admin' | 'user';

const authorize = (role: Role): string => {
  switch (role) {
    case 'admin':
      return 'You can do anything';
    case 'user':
      return 'You can do something';
    default:
      // never reach here util we add a new role
      const _unreachable: never = role;
      throw new Error(`Invalid role: ${_unreachable}`);
  }
};

console.log(authorize('admin'));

```

How it works.

Step 1. Define a type Role that can be either a string 'admin' or 'user':

```js
type Role = 'admin' | 'user';

```

Step 2. Create the authorize() function that accepts a value of the Role type and returns a string:

```js
const authorize = (role: Role): string => {
  switch (role) {
    case 'admin':
      return 'You can do anything';
    case 'user':
      return 'You can do something';
    default:
      // never reach here util we add a new role
      const _unreachable: never = role;
      throw new Error(`Invalid role: ${_unreachable}`);
  }
};

```

How it works.

First, use the switch statement to return a corresponding string if the role is admin or user.

Second, define a variable called _unreachable with the type never and assign the role to it. Also, throw an error in the default branch because the execution will never reach the default branch.

Why do we handle the default case?

The reason is that if we add a new value to the Role type and forget to add a logic to handle the new role, TypeScript will issue an error:

```js
type Role = 'admin' | 'user' | 'guest';

```

In this case, we add the 'guest' to the Role type.

And TypeScript issues the following error:

```js
Type 'string' is not assignable to type 'never'.ts(2322)

```

This is because the value of the role in the default branch now becomes the string 'guest' and you cannot assign a string value to a variable with the type never.

To fix this, you need to create a new case branch to handle the new role:

```js
const authorize = (role: Role): string => {
  switch (role) {
    case 'admin':
      return 'You can do anything';
    case 'user':
      return 'You can do something';
    case 'guest':
      return 'You can do nothing';
    default:
      // never reach here util we add a new role
      const _unreachable: never = role;
      throw new Error(`Invalid role: ${_unreachable}`);
  }
};

```

To make it more concise, we can define a function with the return type never and use it in the default branch:

```js
type Role = 'admin' | 'user' | 'guest';

const unknownRole = (role: never): never => {
  throw new Error(`Invalid role: ${role}`);
};

const authorize = (role: Role): string => {
  switch (role) {
    case 'admin':
      return 'You can do anything';
    case 'user':
      return 'You can do something';
    case 'guest':
      return 'You can do nothing';
    default:
      // never reach here util we add a new role
      return unknownRole(role);
  }
};

console.log(authorize('admin'));

```

Summary

- Use the never type that holds no value, denoting an impossibility in the type system.



> ⚠️ Note: This content is for educational and personal reference purposes only.  
> Original source
> https://www.typescripttutorial.net/typescript-tutorial/typescript-types
>
> All rights and copyrights belong to their respective owners.

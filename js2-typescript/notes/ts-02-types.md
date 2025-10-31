Source : https://www.typescripttutorial.net/typescript-tutorial/typescript-types/

(some parts may be modified or removed)

[Back](../readme.md)

- [TypeScript Types](#typescript-types)
- [Understanding Type Annotations in TypeScript](#understanding-type-annotations-in-typescript)
  - [Type annotation examples](#type-annotation-examples)
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

If you look at the value 'Hello' and describe it by listing the properties and methods, it would be inconvenient.

A shorter way to refer to a value is to assign it a type. In this example, you say the 'Hello' is a string. Then, you know that you can use the properties and methods of a string for the value 'Hello'.

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

## Type annotation examples

### Arrays

To annotate an array type you use a specific type followed by a square bracket : `type[] :`

Syntax

```js
let arrayName: type[];
```

For example, the following declares an array of strings:

```js
let names: string[] = ["John", "Jane", "Peter", "David", "Mary"];
```

### Objects

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

### Function arguments & return types

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
| Operator | Meaning              |
|----------|----------------------|
| &&       | Logical AND operator |
| `\|\|`   | Logical OR operator  |
| !        | Logical NOT operator |

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
    firstName: 'John',
    lastName: 'Doe',
    age: 25,
    jobTitle: 'Web Developer'
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
    firstName: string;
    lastName: string;
    age: number;
    jobTitle: string;
};

```

And then assign the employee object to a literal object with the described properties:

```js
employee = {
    firstName: 'John',
    lastName: 'Doe',
    age: 25,
    jobTitle: 'Web Developer'
};

```

Or you can combine both syntaxes in the same statement like this:

```js
let employee: {
    firstName: string;
    lastName: string;
    age: number;
    jobTitle: string;
} = {
    firstName: 'John',
    lastName: 'Doe',
    age: 25,
    jobTitle: 'Web Developer'
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
vacant.firstName = 'John';

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

TBC - 20251031 - 1836 

A TypeScript array is an ordered list of data. To declare an array that holds values of a specific type, you use the following syntax:

let arrayName: type[];
Code language: JavaScript (javascript)
For example, the following declares an array of strings:

let skills: string[] = [];
Code language: TypeScript (typescript)
And you can add one or more strings to the array:

skills[0] = "Problem Solving";
skills[1] = "Programming";
Code language: TypeScript (typescript)
or use the push() method:

skills.push('Software Design');
Code language: JavaScript (javascript)
The following declares a variable and assigns an array of strings to it:

let skills = ['Problem Sovling','Software Design','Programming'];
Code language: TypeScript (typescript)
In this example, TypeScript infers the skills array as an array of strings. It is equivalent to the following:

let skills: string[];
skills = ['Problem Sovling','Software Design','Programming'];
Code language: TypeScript (typescript)
After you define an array of a specific type, TypeScript will prevent you from adding incompatible values. For example, the following will cause an error:

skills.push(100);
Code language: CSS (css)
… because we’re trying to add a number to the string array.

Error:

Argument of type 'number' is not assignable to parameter of type 'string'.
Code language: Shell Session (shell)
When you extract an element from the array, TypeScript infers the type of the array element. For example:

let skill = skills[0];
console.log(typeof(skill));
Code language: TypeScript (typescript)
Output:

string 
In this example, we extract the first element of the skills array and assign it to the skill variable.

Since an element in a string array is a string, TypeScript infers the type of the skill variable to string as shown in the output.

TypeScript array properties and methods
TypeScript arrays have the same properties and methods as JavaScript arrays. For example, the following uses the length property to get the number of elements in an array:

let series = [1, 2, 3];
console.log(series.length); // 3
Code language: TypeScript (typescript)
You can use all the useful array methods such as forEach(), map(), reduce(), and filter(). For example:

let series = [1, 2, 3];
let doubleIt = series.map(e => e* 2);
console.log(doubleIt);
Code language: TypeScript (typescript)
Output:

[ 2, 4, 6 ] 
Code language: JSON / JSON with Comments (json)
Storing values of mixed types
The following illustrates how to define an array that holds both strings and numbers:

let scores = ['Programming', 5, 'Software Design', 4]; 
Code language: TypeScript (typescript)
In this case, TypeScript infers the scores array as an array of string | number. It’s equivalent to the following:

let scores : (string | number)[];
scores = ['Programming', 5, 'Software Design', 4]; 
Code language: TypeScript (typescript)
Summary
In TypeScript, an array is an ordered list of values.
Use the let arr: type[] syntax to declare an array of a specific type. Adding a value of a different type to the array will result in an error.
An array can store values of mixed types. Use the arr: (type1 | type2) [] syntax to declare an array of values with mixed types (type1, and type2)







> ⚠️ Note: This content is for educational and personal reference purposes only.  
> Original source
> https://www.typescripttutorial.net/typescript-tutorial/typescript-types
> 
> All rights and copyrights belong to their respective owners.
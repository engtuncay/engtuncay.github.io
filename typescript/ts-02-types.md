
# TypeScript Types

Summary: in this tutorial, you’ll learn about the TypeScript types and their purposes.

*What is a type in TypeScript*

In TypeScript, a type is a convenient way to refer to the different properties and functions that a value has.

A value is anything that you can assign to a variable e.g., a number, a string, an array, an object, and a function.

See the following value:

```js
'Hello'

```

When you look at this value, you can say that it’s a string. And this value has properties and methods that a string has.

For example, the 'Hello' value has a property called length that returns the number of characters:

```js
 console.log('Hello'.length); // 5

```

It also has many methods like match(), indexOf(), and toLocaleUpperCase(). For example:

```js
console.log('Hello'.toLocaleUpperCase()); // HELLO 

```

If you look at the value 'Hello' and describe it by listing the properties and methods, it would be inconvenient.

A shorter way to refer to a value is to assign it a type. In this example, you say the 'Hello' is a string. Then, you know that you can use the properties and methods of a string for the value 'Hello'.

In conclusion, in TypeScript:

- a type is a label that describes the different properties and method that a value has
- every value has a type.

*Types in TypeScript*

TypeScript inherits the built-in types from JavaScript. TypeScript types is categorized into:

- Primitive types
- Object types

*Primitive types*

The following illustrates the primitive types in TypeScript:

Name      | Description
----------|-----------------------------------------------------------------------------
string    | represents text data
number    | represents numeric values
boolean   | has true and false values
null      | has one value: null
undefined | has one value: undefined. It is a default value of an uninitialized variable
symbol    | represents a unique constant value

*Object types*

Objec types are functions, arrays, classes, etc. Later, you’ll learn how to create custom object types.

*Purposes of types in TypeScript*

There are two main purposes of types in TypeScript:

- First, types are used by the TypeScript compiler to analyze your code for errors
- Second, types allow you to understand what values are associated with variables.

*Examples of TypeScript types*

The following example uses the querySelector() method to select the `<h1>` element:

```js
const heading = document.querySelector('h1');

```

The TypeScript compiler knows that the type of heading is *HTMLHeadingElement*:

And it shows a list of methods of the HTMLHeadingElement type that *heading* can access:

If you try to access a property or method that doesn’t exist, the TypeScript compiler will show an error. For example:

```js
heading.rotate() // red underline is seen
```

*Summary*

- Every value in TypeScript has a type.
- A type is a label that describes the properties and methods that a value has.
- TypeScript compiler uses types to analyze your code for hunting bugs and errors.

[Back](../readme.md)

- [Introduction to Data types](#introduction-to-data-types)
    - [Numbers](#numbers)
    - [Strings](#strings)
    - [Booleans](#booleans)
    - [Undefined](#undefined)
    - [Null](#null)
  - [Checking Data Types](#checking-data-types)
  - [Comments Again](#comments-again)
  - [Variables](#variables)
- [Section - Scope](#section---scope)
  - [Scope](#scope)
    - [Window Global Object](#window-global-object)
    - [Global scope](#global-scope)
    - [Local scope](#local-scope)


# Introduction to Data types

In JavaScript and also other programming languages, there are different types of data types. The following are JavaScript primitive data types: _String, Number, Boolean, undefined, Null_, and _Symbol_.

### Numbers

- Integers: Integer (negative, zero and positive) numbers
  Example:
  ... -3, -2, -1, 0, 1, 2, 3 ...
- Float-point numbers: Decimal number
  Example
  ... -3.5, -2.25, -1.0, 0.0, 1.1, 2.2, 3.5 ...

### Strings

A collection of one or more characters between two single quotes, double quotes, or backticks.

**Example:**

```js
'a'
'Asabeneh'
"Asabeneh"
'Finland'
'JavaScript is a beautiful programming language'
'I love teaching'
'I hope you are enjoying the first day'
`We can also create a string using a backtick`
'A string could be just as small as one character or as big as many pages'
'Any data type under a single quote, double quote or backtick is a string'
```

### Booleans

A boolean value is either True or False. Any comparisons returns a boolean value, which is either true or false.

A boolean data type is either a true or false value.

**Example:**

```js
true // if the light is on, the value is true
false // if the light is off, the value is false
```

### Undefined

In JavaScript, if we don't assign a value to a variable, the value is undefined. In addition to that, if a function is not returning anything, it returns undefined.

```js
let firstName
console.log(firstName) // undefined, because it is not assigned to a value yet
```

### Null

Null in JavaScript means an empty value.

```js
let emptyValue = null
```

## Checking Data Types

To check the data type of a certain variable, we use the **typeof** operator. See the following example.

```js
console.log(typeof 'Asabeneh') // string
console.log(typeof 5) // number
console.log(typeof true) // boolean
console.log(typeof null) // object type
console.log(typeof undefined) // undefined
```

## Comments Again

Remember that commenting in JavaScript is similar to other programming languages. Comments are important in making your code more readable.
There are two ways of commenting:

- _Single line commenting_
- _Multiline commenting_

```js
// commenting the code itself with a single comment
// let firstName = 'Asabeneh'; single line comment
// let lastName = 'Yetayeh'; single line comment
```

Multiline commenting:

```js
/*
  let location = 'Helsinki';
  let age = 100;
  let isMarried = true;
  This is a Multiple line comment
*/
```

## Variables

Variables are _containers_ of data. Variables are used to _store_ data in a memory location. When a variable is declared, a memory location is reserved. When a variable is assigned to a value (data), the memory space will be filled with that data. To declare a variable, we use _var_, _let_, or _const_ keywords.

For a variable that changes at a different time, we use _let_. If the data does not change at all, we use _const_. For example, PI, country name, gravity do not change, and we can use _const_. We will not use var in this challenge and I don't recommend you to use it. It is error prone way of declaring variable it has lots of leak. We will talk more about var, let, and const in detail in other sections (scope). For now, the above explanation is enough.

A valid JavaScript variable name must follow the following rules:

- A JavaScript variable name should not begin with a number.
- A JavaScript variable name does not allow special characters except dollar sign and underscore.
- A JavaScript variable name follows a camelCase convention.
- A JavaScript variable name should not have space between words.

The following are examples of valid JavaScript variables.

```js
firstName
lastName
country
city
capitalCity
age
isMarried

first_name
last_name
is_married
capital_city

num1
num_1
_num_1
$num1
year2020
year_2020
```

The first and second variables on the list follows the camelCase convention of declaring in JavaScript. In this material, we will use camelCase variables(camelWithOneHump). We use CamelCase(CamelWithTwoHump) to declare classes, we will discuss about classes and objects in other section.

Example of invalid variables:

```js
  first-name
  1_num
  num_#_1
```

Let us declare variables with different data types. To declare a variable, we need to use _let_ or _const_ keyword before the variable name. Following the variable name, we write an equal sign (assignment operator), and a value(assigned data).

```js
// Syntax
let nameOfVariable = value
```

The nameOfVriable is the name that stores different data of value. See below for detail examples.

**Examples of declared variables**

```js
// Declaring different variables of different data types
let firstName = 'Asabeneh' // first name of a person
let lastName = 'Yetayeh' // last name of a person
let country = 'Finland' // country
let city = 'Helsinki' // capital city
let age = 100 // age in years
let isMarried = true

console.log(firstName, lastName, country, city, age, isMarried)
```

```sh
Asabeneh Yetayeh Finland Helsinki 100 true
```

```js
// Declaring variables with number values
let age = 100 // age in years
const gravity = 9.81 // earth gravity  in m/s2
const boilingPoint = 100 // water boiling point, temperature in °C
const PI = 3.14 // geometrical constant
console.log(gravity, boilingPoint, PI)
```

```sh
9.81 100 3.14
```

```js
// Variables can also be declaring in one line separated by comma, however I recommend to use a seperate line to make code more readble
let name = 'Asabeneh', job = 'teacher', live = 'Finland'
console.log(name, job, live)
```

```sh
Asabeneh teacher Finland
```

# Section - Scope

## Scope 

To declare a variable we use the key word _var_, _let_ and _const_. 

Variables scopes can be:

- Global
- Local

Variable can be declared globally or locally scope. Anything declared without let, var or const is scoped at global level.

### Window Global Object

Without using console.log() open your browser and check, you will see the value of a and b if you write a or b on the browser. That means a and b are already available in the window.

```js
//file:scope.js
a = 'JavaScript' // declaring a variable without let or const make it available in window object and this found anywhere
b = 10 // this is a global scope variable and found in the window object
function letsLearnScope() {
  console.log(a, b)
  if (true) {
    console.log(a, b)
  }
}
console.log(a, b) // accessible
```

### Global scope

A globally declared variable can be accessed every where in the same file. But the term global is relative. It can be global to the file or it can be global relative to some block of codes.

```js
//scope.js
let a = 'JavaScript' // is a global scope it will be found anywhere in this file
let b = 10 // is a global scope it will be found anywhere in this file
function letsLearnScope() {
  console.log(a, b) // JavaScript 10, accessible
  if (true) {
    let a = 'Python'
    let b = 100
    console.log(a, b) // Python 100
  }
  console.log(a, b)
}
letsLearnScope()
console.log(a, b) // JavaScript 10, accessible
```

### Local scope

A variable declared as local can be accessed only in certain block code.

- Block Scope
- Function Scope

```js
//scope.js
let a = 'JavaScript' // is a global scope it will be found anywhere in this file
let b = 10 // is a global scope it will be found anywhere in this file
// Function scope
function letsLearnScope() {
  console.log(a, b) // JavaScript 10, accessible
  let value = false
  // block scope
  if (true) {
    // we can access from the function and outside the function but 
    // variables declared inside the if will not be accessed outside the if block
    let a = 'Python'
    let b = 20
    let c = 30
    let d = 40
    value = !value
    console.log(a, b, c, value) // Python 20 30 true
  }
  // we can not access c because c's scope is only the if block
  console.log(a, b, value) // JavaScript 10 true
}
letsLearnScope()
console.log(a, b) // JavaScript 10, accessible
```

Now, you have an understanding of scope. A variable declared with *var* only scoped to function but variable declared with *let* or *const* is block scope(function block, if block, loop block, etc). Block in JavaScript is a code in between two curly brackets ({}).

```js
//scope.js
function letsLearnScope() {
  var gravity = 9.81
  console.log(gravity)

}
// console.log(gravity), Uncaught ReferenceError: gravity is not defined

if (true){
  var gravity = 9.81
  console.log(gravity) // 9.81
}
console.log(gravity)  // 9.81

for(var i = 0; i < 3; i++){
  console.log(i) // 0, 1, 2
}
console.log(i) // 3

```

In ES6 and above there is *let* and *const*, so you will not suffer from the sneakiness of *var*. When we use *let* our variable is block scoped and it will not infect other parts of our code.

```js
//scope.js
function letsLearnScope() {
  // you can use let or const, but gravity is constant I prefer to use const
  const gravity = 9.81
  console.log(gravity)

}
// console.log(gravity), Uncaught ReferenceError: gravity is not defined

if (true){
  const gravity = 9.81
  console.log(gravity) // 9.81
}
// console.log(gravity), Uncaught ReferenceError: gravity is not defined

for(let i = 0; i < 3; i++){
  console.log(i) // 0, 1, 2
}
// console.log(i), Uncaught ReferenceError: i is not defined

```

The scope *let* and *const* are the same. The difference is only reassigning. We can not change or reassign the value of the `const` variable. 

I would strongly suggest you to use *let* and *const*, by using *let* and *const* you will write clean code and avoid hard to debug mistakes. As a rule of thumb, you can use *let* for any value which change, *const* for any constant value, and for an array, object, arrow function and function expression.

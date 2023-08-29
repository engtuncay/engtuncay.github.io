
- [Array](#array)
  - [Creating Array](#creating-array)
  - [Methods to manipulate array](#methods-to-manipulate-array)
    - [Array](#array-1)
    - [fill(myPrimValue)](#fillmyprimvalue)
    - [length](#length)
    - [indexOf(checkValue)](#indexofcheckvalue)
    - [lastIndexOf(checkValue)](#lastindexofcheckvalue)
    - [includes(checkValue) : returns boolean](#includescheckvalue--returns-boolean)
    - [Array.isArray(identifierName)](#arrayisarrayidentifiername)
    - [slice(delimiterValue)](#slicedelimitervalue)
    - [toString()](#tostring)
    - [join()](#join)
    - [concat(anotherArray)](#concatanotherarray)
    - [slice() : cut out an array](#slice--cut-out-an-array)
    - [splice](#splice)
    - [push(myValue)](#pushmyvalue)
    - [pop(myValue)](#popmyvalue)
    - [shift()](#shift)
    - [unshift](#unshift)
    - [reverse()](#reverse)
    - [sort](#sort)
  - [Array of Arrays](#array-of-arrays)
- [Loops](#loops)
  - [For Loops](#for-loops)
  - [while loop](#while-loop)
  - [do while loop](#do-while-loop)
  - [For of Loop](#for-of-loop)
  - [break](#break)
  - [continue](#continue)
- [Functions](#functions)
  - [Declaration function](#declaration-function)
  - [Function with unlimited number of parameters](#function-with-unlimited-number-of-parameters)
    - [Unlimited number of parameters in regular function](#unlimited-number-of-parameters-in-regular-function)
    - [Unlimited number of parameters in arrow function](#unlimited-number-of-parameters-in-arrow-function)
  - [Expression Function and Anonymous Function](#expression-function-and-anonymous-function)
  - [Self Invoking Functions](#self-invoking-functions)
  - [Arrow function](#arrow-function)
  - [Function with default parameters](#function-with-default-parameters)
  - [Function declaration versus Arrow function](#function-declaration-versus-arrow-function)



# Array

## Creating Array

```js
let arr = Array()
// or new Array()

// This the most recommended way to create an empty list
let arr = []

```

```js
const numbers = [0, 3.14, 9.81, 37, 98.6, 100] // array of numbers
const fruits = ['banana', 'orange', 'mango', 'lemon'] // array of strings, fruits

const arr = [
    'Asabeneh',
    250,
    true,
    { country: 'Finland', city: 'Helsinki' },
    { skills: ['HTML', 'CSS', 'JS', 'React', 'Python'] }
] // arr containing different data types
```

- Creating array using split

```js
let companiesString = 'Facebook, Google, Microsoft, Apple, IBM, Oracle, Amazon'
const companies = companiesString.split(',')

console.log(companies) // ["Facebook", " Google", " Microsoft", " Apple", " IBM", " Oracle", " Amazon"]


let js = 'JavaScript'
const charsInJavaScript = js.split('')

console.log(charsInJavaScript) // ["J", "a", "v", "a", "S", "c", "r", "i", "p", "t"]

```
 
✏ you can split with white space also.

## Methods to manipulate array

### Array

Array(8) : // it creates an array sized 8

### fill(myPrimValue)

fill all the array elements with a static value

```js
const eight0values = Array(8).fill(0) // it creates eight element values filled with '0'
console.log(eight0values) // [0, 0, 0, 0, 0, 0, 0, 0]
```

### length

arrayIdentifier.length --> lenght is a identifier

### indexOf(checkValue) 

it returns index value of the check value.

### lastIndexOf(checkValue)

it returns index value of the check value reversely. (tersten sırasını verir)

### includes(checkValue) : returns boolean

### Array.isArray(identifierName)

### slice(delimiterValue)

it slice according to delimiter value.

### toString()

converts array to string comma delimited.

### join() 

it returns comma joined values of the array

join(delimiterValue) : different delimiter can be used.

`myArray.join("#");`

### concat(anotherArray)

combines arrays.

### slice() : cut out an array

it doesnt include the ending position.

```js
slice()  // -> all items
slice(0) // -> all items
slice(0,myArray.length) // -> all item
slice(1,4) // -> slice [2,3,4]

```

### splice

Syntax

```js
myArray.splice(lnStartPos,numOfItems,itemsToAdd);
```

Exs:

```js
const numbers = [1, 2, 3, 4, 5]
  numbers.splice()
  console.log(numbers)                // -> remove all items
```

```js
  const numbers = [1, 2, 3, 4, 5]
	numbers.splice(0,1)
  console.log(numbers)            // remove the first item
```

```js
const numbers = [1, 2, 3, 4, 5, 6]
	numbers.splice(3, 3, 7, 8, 9)
  console.log(numbers.splice(3, 3, 7, 8, 9))  // -> [1, 2, 3, 7, 8, 9] //it removes three item and replace three items

```

### push(myValue)

adding item in the end.

### pop(myValue)

Removing item in the end.

### shift()

Removing one array element in the beginning of the array.

```js
const numbers = [1, 2, 3, 4, 5]
numbers.shift() // -> remove one item from the beginning
console.log(numbers) // -> [2,3,4,5]
```

### unshift

Adding array element in the beginning of the array.

```js
const numbers = [1, 2, 3, 4, 5]
numbers.unshift(0) // -> add one item from the beginning
console.log(numbers) // -> [0,1,2,3,4,5]
```

### reverse()

reverse the order of an array.

```js
const numbers = [1, 2, 3, 4, 5]
numbers.reverse() // -> reverse array order
console.log(numbers) // [5, 4, 3, 2, 1]
```

### sort

```js
const webTechs = [
  'HTML',
  'CSS',
  'JavaScript',
  'React',
  'Redux',
  'Node',
  'MongoDB'
]

webTechs.sort()
console.log(webTechs) // ["CSS", "HTML", "JavaScript", "MongoDB", "Node", "React", "Redux"]

webTechs.reverse() // after sorting we can reverse it
console.log(webTechs) // ["Redux", "React", "Node", "MongoDB", "JavaScript", "HTML", "CSS"]
```

sorting with a callback function later.

## Array of Arrays

```js
const firstNums = [1, 2, 3]
const secondNums = [1, 4, 9]

const arrayOfArray =  [[1, 2, 3], [1, 2, 3]]
console.log(arrayOfArray[0]) // [1, 2, 3]
```

# Loops

## For Loops

```js
// For loop structure
for(initialization, condition, increment/decrement){
  // code goes here
}
```

```js
for(let i = 0; i <= 5; i++){
  console.log(i)
}

// 0 1 2 3 4 5
```

Creating a new array based on the existing array

```js
const numbers = [1, 2, 3, 4, 5]
const newArr = []
let sum = 0
for(let i = 0; i < numbers.length; i++){
  newArr.push(numbers[i] ** 2)
}

console.log(newArr)  // [1, 4, 9, 16, 25]
```

## while loop

```js
let i = 0
while (i <= 5) {
  console.log(i)
  i++
}

// 0 1 2 3 4 5
```

## do while loop

```js
let i = 0
do {
  console.log(i)
  i++
} while (i <= 5)

// 0 1 2 3 4 5
```

## For of Loop

We use for of loop for arrays. It is very hand way to iterate through an array if we are not interested in the index of each element in the array.

```js
for (const element of arr) {
  // code goes here
}
```

```js

const numbers = [1, 2, 3, 4, 5]

for (const num of numbers) {
  console.log(num)
}

// 1 2 3 4 5

```

## break

Break is used to interrupt a loop.

```js
for(let i = 0; i <= 5; i++){
  if(i == 3){
    break
  }
  console.log(i)
}

// 0 1 2
```

The above code stops if 3 found in the iteration process.

## continue

We use the keyword *continue* to skip a certain iterations. 

```js
for(let i = 0; i <= 5; i++){
  if(i == 3){
    continue
  }
  console.log(i)
}

// 0 1 2 4 5
```

# Functions

A function can be declared or created in couple of ways: Declaration,Expression,Anonymous,Arrow

## Declaration function

```js
//declaring a function without a parameter
function functionName(parameters) {
  // code goes here
  // optional if returns data
  // return something;

}
functionName(parameters) // calling function by its name and with parentheses
```

Example : Function with two parameters :

```js
// function with two parameters
function functionName(param1, param2) {
  //code goes her
  return param1+param2;
}
functionName(param1, param2) // during calling or invoking two arguments needed

```

## Function with unlimited number of parameters

### Unlimited number of parameters in regular function

A function declaration provides a function scoped arguments array like object. Any thing we passed as argument in the function can be accessed from arguments object inside the functions. Let us see an example

```js
// Let us access the arguments object
​
function sumAllNums() {
  console.log(arguments)
}

sumAllNums(1, 2, 3, 4)
// Arguments(4) [1, 2, 3, 4, callee: ƒ, Symbol(Symbol.iterator): ƒ]

```

```js
// function declaration
​
function sumAllNums() {
  let sum = 0
  for (let i = 0; i < arguments.length; i++) {
    sum += arguments[i]
  }
  return sum
}

console.log(sumAllNums(1, 2, 3, 4)) // 10
console.log(sumAllNums(10, 20, 13, 40, 10))  // 93
console.log(sumAllNums(15, 20, 30, 25, 10, 33, 40))  // 173
```

### Unlimited number of parameters in arrow function

Arrow function does not have the function scoped arguments object. To implement a function which takes unlimited number of arguments in an arrow function we use spread operator followed by any parameter name. Any thing we passed as argument in the function can be accessed as array in the arrow function. Let us see an example

```js
// Let us access the arguments object
​
const sumAllNums = (...args) => {
  // console.log(arguments), arguments object not found in arrow function
  // instead we use a parameter followed by spread operator (...)
  console.log(args)
}

sumAllNums(1, 2, 3, 4)
// [1, 2, 3, 4]

```

- Another example

```js

const sumAllNums = (...args) => {
  let sum = 0
  for (const element of args) {
    sum += element
  }
  return sum
}

console.log(sumAllNums(1, 2, 3, 4)) // 10
console.log(sumAllNums(10, 20, 13, 40, 10))  // 93
console.log(sumAllNums(15, 20, 30, 25, 10, 33, 40))  // 173
```

## Expression Function and Anonymous Function

Anonymous function or without name. function name isnt written after function keyword. using `function(){/*...*/}`

Expression functions are anonymous functions. After we create a function without a name and we assign it to a variable. To return a value from the function we should call the variable. Look at the example below.

```js
// Function expression
const square = function(n) {
  return n * n
} // I am an anonymous function and my value is stored in square

console.log(square(2)) // -> 4
```

## Self Invoking Functions

Self invoking functions are anonymous functions which do not need to be called to return a value.

```js
(function(n) {
  console.log(n * n)
})(2) // 4, but instead of just printing if we want to return and store the data, we do as shown below

let squaredNum = (function(n) {
  return n * n
})(10)

console.log(squaredNum)
```

## Arrow function

Arrow function is an alternative to write a function, however function declaration and arrow function have some minor differences.

Arrow function uses arrow instead of the keyword *function* to declare a function. Let us see both function declaration and arrow function.

```js
// This is how we write normal or declaration function
// Let us change this declaration function to an arrow function
function square(n) {
  return n * n
}

console.log(square(2)) // 4

// Arrow Function style

const square = n => {
  return n * n
}

console.log(square(2))  // -> 4

// if we have only one line in the code block, it can be written as follows, explicit return
const square = n => n * n  // -> 4
```

```js
const changeToUpperCase = arr => {
  const newArr = []
  for (const element of arr) {
    newArr.push(element.toUpperCase())
  }
  return newArr
}

const countries = ['Finland', 'Sweden', 'Norway', 'Denmark', 'Iceland']
console.log(changeToUpperCase(countries))

// ["FINLAND", "SWEDEN", "NORWAY", "DENMARK", "ICELAND"]
```

```js
const printFullName = (firstName, lastName) => {
  return `${firstName} ${lastName}`
}

console.log(printFullName('Asabeneh', 'Yetayeh'))
```

The above function has only the return statement, therefore, we can explicitly return it as follows.

```js
const printFullName = (firstName, lastName) => `${firstName} ${lastName}`

console.log(printFullName('Asabeneh', 'Yetayeh'))
```

## Function with default parameters

Sometimes we pass default values to parameters, when we invoke the function if we do not pass an argument the default value will be used. Both function declaration and arrow function can have a default value or values.

```js
// syntax
// Declaring a function
function functionName(param = value) {
  //codes
}

// Calling function
functionName()
functionName(arg)
```

**Example:**

```js
function greetings(name = 'Peter') {
  let message = `${name}, welcome to 30 Days Of JavaScript!`
  return message
}

console.log(greetings())
console.log(greetings('Asabeneh'))
```

```js
function generateFullName(firstName = 'Asabeneh', lastName = 'Yetayeh') {
  let space = ' '
  let fullName = firstName + space + lastName
  return fullName
}

console.log(generateFullName())
console.log(generateFullName('David', 'Smith'))
```

```js
function calculateAge(birthYear, currentYear = 2023) {
  let age = currentYear - birthYear
  return age
}

console.log('Age: ', calculateAge(1819))
```

```js
function weightOfObject(mass, gravity = 9.81) {
  let weight = mass * gravity + ' N' // the value has to be changed to string first
  return weight
}

console.log('Weight of an object in Newton: ', weightOfObject(100)) // 9.81 gravity at the surface of Earth
console.log('Weight of an object in Newton: ', weightOfObject(100, 1.62)) // gravity at surface of Moon
```

Let us see how we write the above functions with arrow functions

```js
// syntax
// Declaring a function
const functionName = (param = value) => {
  //codes
}

// Calling function
functionName()
functionName(arg)
```

**Example:**

```js
const greetings = (name = 'Peter') => {
  let message = name + ', welcome to 30 Days Of JavaScript!'
  return message
}

console.log(greetings())
console.log(greetings('Asabeneh'))
```

```js
const generateFullName = (firstName = 'Asabeneh', lastName = 'Yetayeh') => {
  let space = ' '
  let fullName = firstName + space + lastName
  return fullName
}

console.log(generateFullName())
console.log(generateFullName('David', 'Smith'))
```

```js

const calculateAge = (birthYear, currentYear = 2023) => currentYear - birthYear
console.log('Age: ', calculateAge(1819))
```

```js
const weightOfObject = (mass, gravity = 9.81) => mass * gravity + ' N'
  
console.log('Weight of an object in Newton: ', weightOfObject(100)) // 9.81 gravity at the surface of Earth
console.log('Weight of an object in Newton: ', weightOfObject(100, 1.62)) // gravity at surface of Moon
```

## Function declaration versus Arrow function

It Will be covered in other section.
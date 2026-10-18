
- Source : https://www.javascriptcheatsheet.org/cheatsheet/basics 
  
(some parts may be modified or removed)

Not : Regular expression düzenlenmeli

C1 -> Cheat1

<h3>Content</h3> 

- [Comments](#comments)
  - [Examples](#examples)
- [Data types](#data-types)
  - [Basics](#basics)
  - [falsy values](#falsy-values)
  - [`undefined` ve `null` Arasındaki Farklar](#undefined-ve-null-arasındaki-farklar)
- [Variables](#variables)
  - [Examples](#examples-1)
  - [ES6 var, let and const](#es6-var-let-and-const)
- [Strings](#strings)
  - [Examples](#examples-2)
  - [Escape sequences](#escape-sequences)
  - [The length of a string](#the-length-of-a-string)
  - [Split and Join](#split-and-join)
  - [Index of a String](#index-of-a-string)
  - [ES6 Template Literals](#es6-template-literals)
- [Arrays](#arrays)
  - [Example](#example)
  - [Accessing elements of an array with index](#accessing-elements-of-an-array-with-index)
  - [Manipulate arrays with reverse, push, pop, shift and unshift](#manipulate-arrays-with-reverse-push-pop-shift-and-unshift)
  - [Splice : Remove any element with splice (parça çıkarma ve elde etme)](#splice--remove-any-element-with-splice-parça-çıkarma-ve-elde-etme)
  - [Slice : Copy an array with slice (dilim alma)](#slice--copy-an-array-with-slice-dilim-alma)
  - [indexOf (checking existing element)](#indexof-checking-existing-element)
  - [Accessing Nested Arrays](#accessing-nested-arrays)
  - [ES6 Includes to Determine if an Array Contains an Element](#es6-includes-to-determine-if-an-array-contains-an-element)
  - [ES6 The Spread Operator](#es6-the-spread-operator)
  - [ES6 Destructuring Arrays to Assign Variables](#es6-destructuring-arrays-to-assign-variables)
- [Array Methods](#array-methods)
  - [Map](#map)
- [Objects](#objects)
  - [Example](#example-1)
  - [Accessing Objects Properties](#accessing-objects-properties)
    - [Accessing with dot (`.`) notation](#accessing-with-dot--notation)
    - [Accessing with bracket (`[]`) notation](#accessing-with-bracket--notation)
    - [Accessing dynamic (with variable)](#accessing-dynamic-with-variable)
    - [Accessing and modifying Nested Objects](#accessing-and-modifying-nested-objects)
    - [Creating an array from the keys of an object (with for-in)](#creating-an-array-from-the-keys-of-an-object-with-for-in)
  - [Modifying Objects Properties (Fields)](#modifying-objects-properties-fields)
  - [Objects for Lookups](#objects-for-lookups)
  - [Check Existance of Object Properties](#check-existance-of-object-properties)
  - [Accessing Nested Objects](#accessing-nested-objects)
  - [ES6 Destructuring Variables from Objects](#es6-destructuring-variables-from-objects)
  - [ES6 Destructuring to Pass an Object as a Function's Parameters](#es6-destructuring-to-pass-an-object-as-a-functions-parameters)
  - [ES6 Object Literal Declarations Using Simple Fields](#es6-object-literal-declarations-using-simple-fields)
- [Booleans](#booleans)
- [Classes](#classes)
  - [Class Declaration](#class-declaration)
  - [Methods](#methods)
  - [Getters and Setters](#getters-and-setters)
  - [Static Methods](#static-methods)
  - [Inheritance](#inheritance)
  - [Private Fields](#private-fields)
- [Conditional Statements](#conditional-statements)
  - [If Statements](#if-statements)
  - [Conditional (Ternary) Operator](#conditional-ternary-operator)
  - [Multiple Conditional (Ternary) Operators](#multiple-conditional-ternary-operators)
- [Switch Statement](#switch-statement)
- [Comparison Operators](#comparison-operators)
- [While Loops](#while-loops)
  - [While Loop](#while-loop)
  - [Do...While Loops](#dowhile-loops)
- [For Loops](#for-loops)
  - [For Loop](#for-loop)
  - [ES6 for-of (for arrays)](#es6-for-of-for-arrays)
  - [for-in (objects,arrays)](#for-in-objectsarrays)
- [Functions](#functions)
  - [Function Arguments](#function-arguments)
  - [Return Statement](#return-statement)
  - [Immediately Invoked Function Expression or IIFE](#immediately-invoked-function-expression-or-iife)
  - [ES6 Arrow Functions](#es6-arrow-functions)
  - [ES6 Higher Order Arrow Functions](#es6-higher-order-arrow-functions)
  - [ES6 Rest Operator with Function Parameters](#es6-rest-operator-with-function-parameters)
  - [ES6 Declarative Functions within Objects](#es6-declarative-functions-within-objects)
- [Regular Expressions](#regular-expressions)
  - [Regular Expression Symbols](#regular-expression-symbols)
  - [Resume Table](#resume-table)
  - [Regex Methods](#regex-methods)
  - [Examples](#examples-3)
- [Object Oriented (old style)](#object-oriented-old-style)
  - [Example](#example-2)
  - [Constructors and New Objects](#constructors-and-new-objects)
  - [Inheritance](#inheritance-1)
  - [Mixins](#mixins)
  - [Closures to Protect Properties](#closures-to-protect-properties)
  - [Modules](#modules)
- [ES6 Object Oriented](#es6-object-oriented)
  - [Basics](#basics-1)
  - [ES6 Classes](#es6-classes)
  - [ES6 getters and setters](#es6-getters-and-setters)
  - [ES6 Statics Methods](#es6-statics-methods)
  - [Importing References or Classes](#importing-references-or-classes)
  - [ES6 Inheritance](#es6-inheritance)
- [ES6 import and export](#es6-import-and-export)
  - [Basics](#basics-2)
  - [import](#import)
  - [export](#export)
- [Async/Await](#asyncawait)
  - [JavaScript is a synchronous language!](#javascript-is-a-synchronous-language)
  - [What is async-await?](#what-is-async-await)
  - [Async](#async)
  - [Await](#await)
  - [Things to remember when using Async Await](#things-to-remember-when-using-async-await)
- [Math](#math)
  - [Math.PI](#mathpi)
- [Json](#json)
  - [JSON.stringify()](#jsonstringify)
  - [JSON.parse()](#jsonparse)
  - [Deep Copy with JSON](#deep-copy-with-json)
  - [Handling Dates](#handling-dates)
- [Fetch API](#fetch-api)
  - [Basic GET Request](#basic-get-request)
  - [POST Request](#post-request)
  - [Async/Await vs .then()](#asyncawait-vs-then)
- [Date And Time](#date-and-time)
  - [Creating a Date](#creating-a-date)
  - [Get Methods](#get-methods)
  - [Set Methods](#set-methods)
  - [Formatting Dates](#formatting-dates)
- [Files and Directories](#files-and-directories)
- [Error Handling](#error-handling)
- [Debugging](#debugging)
- [Map](#map-1)
- [Set](#set)
- [String Manipulation](#string-manipulation)
- [String Formatting](#string-formatting)
- [Extra Sources](#extra-sources)


## Comments

### Examples

```javascript
// This is an in-line comment.

/* This is a
multi-line comment */
```

## Data types


### Basics

JavaScript provides seven different data types:

| Data Types  | Examples                                                              |
| ----------- | --------------------------------------------------------------------- |
| `undefined` | A variable that has not been assigned a value is of type `undefined`. |
| `null`      | no value.                                                             |
| `string`    | `'a', 'aa', 'aaa', 'Hello!', '11 cats'`                               |
| `number`    | `12, -1, 0.4`                                                         |
| `boolean`   | `true, false`                                                         |
| `object`    | A collection of properties.                                           |
| `symbol`    | Represents a unique identifier.                                       |


### falsy values

JavaScript/TypeScript'te falsy değerler:

- `false`
- `0`
- `-0`
- `0n`
- `""` (boş string)
- `null` 
- `undefined` 
- `NaN`


### `undefined` ve `null` Arasındaki Farklar

Koşul kontrolleri açısından davranışları aynıdır, fakat **tür ve kaynakları farklı**dır.

➖ Temel Farklar

| Özellik     | `undefined`                    | `null`                        |
|-------------|--------------------------------|-------------------------------|
| **Tür**     | `undefined` (kendi türü)       | `object`                      |
| **Anlamı**  | Değer atanmamış, başlatılmamış | Boş, hiç bir değer (bilinçli) |
| **Kaynağı** | Otomatik, sistem tarafından    | Geliştiricinin atadığı        |

Detaylı Açıklama

**`undefined`:**
- Değişken tanımlanmış ama değer atanmamışsa oluşur
- Fonksiyonda `return` statement'i varsa geri dönüş değeri yoksa `undefined` olur
- Fonksiyon parametresi geçilmemiş ise `undefined` olur
- Eksik nesne property'sine erişilirse `undefined` olur

```typescript
let x; // undefined
const result = () => {}; // undefined döner
function test(param) { console.log(param); } // param undefined
const obj = {}; obj.missing; // undefined
```

**`null`:**
- Geliştiricinin bilinçli olarak atadığı "hiç bir değer" anlamına gelir
- Daha iyileştirici niyeti gösterir
- Boş bir referans temsil eder

```typescript
let x = null; // Bilinçli olarak boş
const value = someCondition ? data : null;
```

Karşılaştırma

```typescript
undefined == null   // true  (gevşek eşitlik)
undefined === null  // false (sıkı eşitlik)

typeof undefined    // "undefined"
typeof null         // "object" (JavaScript'te bilinen bug)
```

Pratikte

Kodda `null` kullanmak daha açık ve anlaşılırdır. Fonksiyonda dönüş olarak undefined yerine null vermek daha iyi olur.

```typescript
return null; // "hiç bir değer yok" demek daha açık
```

## Variables

### Examples

```javascript
// declare a variable
var ourName;

// store values
myNumber = 5;
myString = "myVar";

// declare variables with the assignment operator
var myNum = 0;

// add, subtract, multiply and divide numbers
myVar = 5 + 10; // 15
myVar = 12 - 6; // 6
myVar = 13 * 13; // 169
myVar = 16 / 2; // 8

// increment and decrement numbers
i++; // the equivalent of i = i + 1
i--; // the equivalent of i = i - 1;

// decimals
var ourDecimal = 5.7; // float
```

### ES6 var, let and const

- Unlike `var`, `let` throws an error if you declare the same variable twice.
- Variables declared with `let` inside a block, statement, or expression, its scope is limited to that block, statement, or expression.
- Variables declared with `const` are read-only and cannot be reassigned.
- Objects (including arrays and functions) assigned to a variable using `const` are still mutable and only prevents the reassignment of the variable identifier.

To ensure your data doesn't change, JavaScript provides a function Object.freeze to prevent data mutation.

```javascript
let obj = {
  name: "FreeCodeCamp",
  review: "Awesome",
};

Object.freeze(obj);
obj.review = "bad"; //will be ignored. Mutation not allowed
obj.newProp = "Test"; // will be ignored. Mutation not allowed
console.log(obj);
// { name: "FreeCodeCamp", review:"Awesome"}
```

## Strings

### Examples

```javascript
// escape literal quotes
var sampleStr = 'Alan said, "Peter is learning JavaScript".';
// this prints: Alan said, "Peter is learning JavaScript".

// concatenating strings
var ourStr = "I come first. " + "I come second.";

// concatenating strings with +=
var ourStr = "I come first. ";
ourStr += "I come second.";

// constructing strings with variables
var ourName = "freeCodeCamp";
var ourStr = "Hello, our name is " + ourName + ", how are you?";

// appending variables to strings
var anAdjective = "awesome!";
var ourStr = "freeCodeCamp is ";
ourStr += anAdjective;
```

### Escape sequences

| Code | Output             |
| ---- | ------------------ |
| `\'` | single quote (`'`) |
| `\"` | double quote (`"`) |
| `\\` | backslash (`\`)    |
| `\n` | newline            |
| `\r` | carriage return    |
| `\t` | tab                |
| `\b` | backspace          |
| `\f` | form feed          |

### The length of a string

```javascript
"Alan Peter".length; // 10
```

### Split and Join

```javascript
let str = "a string";
let splittedStr = str.split("");
// ​​​​​[ 'a', ' ', 's', 't', 'r', 'i', 'n', 'g' ]​​​​​

let joinedStr = splittedStr.join("");
// a string​​​​​
```

### Index of a String

```javascript
//first element has an index of 0
var firstLetterOfFirstName = "";
var firstName = "Ada";
firstLetterOfFirstName = firstName[0]; // A

// find the las character of a string
var firstName = "Ada";
var lastLetterOfFirstName = firstName[firstName.length - 1]; // a
```

### ES6 Template Literals

```javascript
const person = {
  name: "Zodiac Hasbro",
  age: 56,
};

// Template literal with multi-line and string interpolation
const greeting = `Hello, my name is ${person.name}!
I am ${person.age} years old.`;

console.log(greeting);
// Hello, my name is Zodiac Hasbro!
// I am 56 years old.
```

## Arrays

### Example

```javascript
var sandwich = ["peanut butter", "jelly", "bread"][
  // nested arrays
  (["Bulls", 23], ["White Sox", 45])
];
```

### Accessing elements of an array with index

```javascript
var ourArray = [50, 60, 70];
var ourData = ourArray[0]; // equals 50

// modify an array with indexes
var ourArray = [50, 40, 30];
ourArray[0] = 15; // equals [15,40,30]

// access multi-dimensional arrays with indexes
var arr = [
  [1, 2, 3],
  [4, 5, 6],
  [7, 8, 9],
  [[10, 11, 12], 13, 14],
];
arr[3]; // [[10,11,12], 13, 14]
arr[3][0]; // [10,11,12]
arr[3][0][1]; // 11
```

### Manipulate arrays with reverse, push, pop, shift and unshift

```javascript
// reverse an array
[1, "two", 3].reverse(); // ​​​​​[ 3, 'two', 1 ]

// push() to append data to the end of an array
var arr = [1, 2, 3];
arr.push(4); // arr is now [1,2,3,4]

// pop() to "pop" a value off of the end of an array
var threeArr = [1, 4, 6];
var oneDown = threeArr.pop();
console.log(oneDown); // Returns 6
console.log(threeArr); // Returns [1, 4]

// shift() removes the first element of an array
var ourArray = [1, 2, [3]];
var removedFromOurArray = ourArray.shift();
// removedFromOurArray now equals 1 and ourArray now equals [2, [3]].

// unshift() adds the element at the beginning of the array
var ourArray = ["Stimpson", "J", "cat"];
ourArray.shift(); // ourArray now equals ["J", "cat"]
ourArray.unshift("Happy"); // ourArray now equals ["Happy", "J", "cat"]
```

### Splice : Remove any element with splice (parça çıkarma ve elde etme) 

❗ array start index is 0.

(remove a slice in an array ve returns that slice) - (array içerisinden dilim çıkarır ve dilimi dönüş yapar)

```javascript
// first parameter is the index, the second indicates the number of elements to delete.
let array = ["today", "was", "not", "so", "great"];
array.splice(2, 2); // (2.index itibari ile 2 elemanı at)
// remove 2 elements beginning with the 3rd element (array starts from 0 index !!!)
// array now equals ['today', 'was', 'great']

// also returns a new array containing the value of the removed elements
let array = ["I", "am", "feeling", "really", "happy"];
let newArray = array.splice(3, 2);
// newArray equals ['really', 'happy']

// the third parameter, represents one or more elements, let us add them
function colorChange(arr, index, newColor) {
  arr.splice(index, 1, newColor);
  return arr;
}
let colorScheme = ["#878787", "#a08794", "#bb7e8c", "#c9b6be", "#d1becf"];
colorScheme = colorChange(colorScheme, 2, "#332327");
// we have removed '#bb7e8c' and added '#332327' in its place
// colorScheme now equals ['#878787', '#a08794', '#332327', '#c9b6be', '#d1becf']
```

### Slice : Copy an array with slice (dilim alma)

(dilim almak) (1,3) (1 itibariyle 3'e kadar (3 dahil değil))

```javascript
// Copies a given number of elements to a new array and leaves the original array untouched
let weatherConditions = ["rain", "snow", "sleet", "hail", "clear"];
let todaysWeather = weatherConditions.slice(1, 3);
// todaysWeather equals ['snow', 'sleet'];
// weatherConditions still equals ['rain', 'snow', 'sleet', 'hail', 'clear']
```

### indexOf (checking existing element)

```javascript
let fruits = ["apples", "pears", "oranges", "peaches", "pears"];
fruits.indexOf("dates"); // -1
fruits.indexOf("oranges"); // 2
fruits.indexOf("pears"); // 1, the first index at which the element exists
```

### Accessing Nested Arrays

```javascript
var ourPets = [
  {
    animalType: "cat",
    names: ["Meowzer", "Fluffy", "Kit-Cat"],
  },
  {
    animalType: "dog",
    names: ["Spot", "Bowser", "Frankie"],
  },
];
ourPets[0].names[1]; // "Fluffy"
ourPets[1].names[0]; // "Spot"
```

### ES6 Includes to Determine if an Array Contains an Element

```javascript
let fruits = ["Banana", "Orange", "Apple", "Mango"];
fruits.includes("Mango"); // true
```

### ES6 The Spread Operator

```javascript
// The ES5 code below uses apply() to compute the maximum value in an array.
var arr = [6, 89, 3, 45];
var maximus = Math.max.apply(null, arr); // 89

// ...arr returns an unpacked array. In other words, it spreads the array.
const arr = [6, 89, 3, 45];
const maximus = Math.max(...arr); // 89     (Math.max(6,89,3,45) gibi uygulama yapar (unpacked) ) 

// [...new Set(arr)] = unique value array
const arr = [1, 2, 2, 3, 3, 4, 5, 5];
const uniq = [...new Set(arr)]; // [1,2,3,4,5]

// copy an array
let thisArray = [true, true, undefined, false, null];
let thatArray = [...thisArray];
// thatArray equals [true, true, undefined, false, null]
// thisArray remains unchanged, and is identical to thatArray

// combine arrays
let thisArray = ["sage", "rosemary", "parsley", "thyme"];
let thatArray = ["basil", "cilantro", ...thisArray, "coriander"];
// thatArray now equals ['basil', 'cilantro', 'sage', 'rosemary', 'parsley', 'thyme', 'coriander']
```

### ES6 Destructuring Arrays to Assign Variables

(yapıyı açma-çözme) (parse yapar)

```javascript
const [a, b] = [1, 2, 3, 4, 5, 6];
console.log(a, b); // 1, 2

// it can access any value by using commas to reach the desired index
const [a, b, , , c] = [1, 2, 3, 4, 5, 6];
console.log(a, b, c); // 1, 2, 5

// to collect the rest of the elements into a separate array.
const [a, b, ...arr] = [1, 2, 3, 4, 5, 7];
console.log(a, b); // 1, 2
console.log(arr); // [3, 4, 5, 7]
```

📝 Parse-Deparse : Yazılım dünyasında bu iki kavram şu şekilde işler:

- Parse (Ayrıştırma,Öğelerine ayırma): Düz bir metin halindeki kaynak kodu okuyup, bilgisayarın anlayacağı bir ağaç yapısına (AST - Abstract Syntax Tree) dönüştürmektir. (Öğelerine ayırmak gibi, xml'i objeye çevirmek)
- Unparse (or Deparse): Bu soyut ağaç yapısını (AST) alıp, tekrar insanların okuyabileceği düz bir metin (kod) haline getirmek demektir. (objeyi xml'e çevirmek)

## Array Methods

### Map

(her bir elemanı işleyerek farklı bir yapıya çeviririk tekrar birleştirme yapılır. bir nevi eşleme)

```javascript
var watchList = [
  {
    Title: "Inception",
    imdbRating: "8.8",
    Type: "movie",
  },
  {
    Title: "Interstellar",
    imdbRating: "8.6",
    Type: "movie",
  },
  {
    Title: "The Dark Knight",
    imdbRating: "9.0",
    Type: "movie",
  },
  {
    Title: "Batman Begins",
    imdbRating: "7.9",
    Type: "movie",
  },
];

const rating = watchList.map(function (movie) {
  return { title: movie.Title, rating: movie.imdbRating };
});
/* [ { title: 'Inception', rating: '8.8' }, 
  { title: 'Interstellar', rating: '8.6' }, 
  { title: 'The Dark Knight', rating: '9.0' }, 
  { title: 'Batman Begins', rating: '7.9' } ]  */

// or...
const rating = watchList.map((movie) => ({
  title: movie.Title,
  rating: movie.imdbRating,
}));
/* [ { title: 'Inception', rating: '8.8' }, 
  { title: 'Interstellar', rating: '8.6' }, 
  { title: 'The Dark Knight', rating: '9.0' }, 
  { title: 'Batman Begins', rating: '7.9' } ]  */
```

## Objects

### Example

• '{}' object notation or object literal

```javascript
var cat = {
  name: "Whiskers",
  legs: 4,
  tails: 1,
  enemies: ["Water", "Dogs"],
};
```

```js
const user = { ad: "Ahmet", yaş: 30 }; // Bu bir Object Literal'dır.

```

📝 { } farklı kullanım alanları

• Template Literals (Şablon Dizileri içinde İfade)

Ters tırnak (`) içinde dolar işaretiyle birlikte (${}) kullanılıyorsa, araya bir JavaScript ifadesi veya değişkeni yerleştirmek için kullanılan bir yer tutucudur (placeholder).

```js
console.log(`Merhaba ${user.ad}`); // Bu bir şablon yer tutucusudur.

```

• Object Destructuring (Nesne Parçalama)

Bir nesnenin içindeki özellikleri (property) tek hamlede değişkenlere çıkarmak için eşittir işaretinin solunda kullanılıyorsa buna destructuring (parçalama) denir.

```js
const { ad, yaş } = user; // Bu bir Destructuring işlemidir.

```

### Accessing Objects Properties

#### Accessing with dot (`.`) notation

```javascript
var myObj = {
  prop1: "val1",
  prop2: "val2",
};

let prop1val = myObj.prop1; // val1
let prop2val = myObj.prop2; // val2
let prop3val = myObj.prop3; // undefined (tanımlı değil)

```

#### Accessing with bracket (`[]`) notation

```javascript
var myObj = {
  "Space Name": "Kirk",
  "More Space": "Spock",
  NoSpace: "USS Enterprise",
};

myObj["Space Name"]; // Kirk
myObj["More Space"]; // Spock
myObj["NoSpace"]; // USS Enterprise
```

#### Accessing dynamic (with variable)

```javascript
var dogs = {
  Fido: "Mutt",
  Hunter: "Doberman",
  Snoopie: "Beagle",
};

var myDog = "Hunter";
var myBreed = dogs[myDog]; // dynamic access
console.log(myBreed); // "Doberman"
```

#### Accessing and modifying Nested Objects

```javascript
let userActivity = {
  id: 23894201352,
  date: "January 1, 2017",
  data: {
    totalUsers: 51,
    online: 42,
  },
};

userActivity.data.online = 45; // or
userActivity["data"].online = 45; // or
userActivity["data"]["online"] = 45;
```

#### Creating an array from the keys of an object (with for-in)

```javascript
let users = {
  Alan: {
    age: 27,
    online: false,
  },
  Jeff: {
    age: 32,
    online: true,
  },
  Sarah: {
    age: 48,
    online: false,
  },
  Ryan: {
    age: 19,
    online: true,
  },
};

function getArrayOfUsers(obj) {
  let arr = [];
  for (let key in obj) {
    arr.push(key);
  }
  return arr;
}
  
console.log(getArrayOfUsers(users));
// [ 'Alan', 'Jeff', 'Sarah', 'Ryan' ]

```

### Modifying Objects Properties (Fields)

```javascript
// Updating object properties
var ourDog = {
  name: "Camper",
  legs: 4,
  tails: 1,
  friends: ["everything!"],
};

ourDog.name = "Happy Camper"; // or
ourDog["name"] = "Happy Camper";

// add new properties
ourDog.bark = "bow-wow"; // or
ourDog["bark"] = "bow-wow";

// delete properties
delete ourDog.bark;
```

### Objects for Lookups

```javascript
var alpha = {
  1:"Z",
  2:"Y",
  3:"X",
  4:"W",
  ...
  24:"C",
  25:"B",
  26:"A"
};
alpha[2]; // "Y"
alpha[24]; // "C"

var value = 2;
alpha[value]; // "Y"
```

### Check Existance of Object Properties 

```javascript
var myObj = {
  top: "hat",
  bottom: "pants",
};

myObj.hasOwnProperty("top"); // true
myObj.hasOwnProperty("middle"); // false
```

### Accessing Nested Objects

```javascript
var ourStorage = {
  desk: {
    drawer: "stapler",
  },
  cabinet: {
    "top drawer": {
      folder1: "a file",
      folder2: "secrets",
    },
    "bottom drawer": "soda",
  },
};

ourStorage.cabinet["top drawer"].folder2; // "secrets"
ourStorage.desk.drawer; // "stapler"
```

### ES6 Destructuring Variables from Objects

```javascript
// Consider the following ES5 code
var voxel = { x: 3.6, y: 7.4, z: 6.54 };
var x = voxel.x; // x = 3.6
var y = voxel.y; // y = 7.4
var z = voxel.z; // z = 6.54

// the same assignment statement with ES6 destructuring syntax
const { x, y, z } = voxel; // x = 3.6, y = 7.4, z = 6.54

// to store the values of voxel.x into a, voxel.y into b, and voxel.z into c, you have that freedom as well
const { x: a, y: b, z: c } = voxel; // a = 3.6, b = 7.4, c = 6.54

// Destructuring Variables from Nested Objects
const a = {
  start: { x: 5, y: 6 },
  end: { x: 6, y: -9 },
};

const {
  start: { x: startX, y: startY },
} = a;

console.log(startX, startY); // 5, 6
```

### ES6 Destructuring to Pass an Object as a Function's Parameters

```javascript
// destructure the object in a function argument itself.
const profileUpdate = (profileData) => {
  const { name, age, nationality, location } = profileData;
  // do something with these variables
};

// this can also be done in-place:
const profileUpdate = ({ name, age, nationality, location }) => {
  /* do something with these fields */
};
```

### ES6 Object Literal Declarations Using Simple Fields

```javascript
const getMousePosition = (x, y) => ({
  x: x,
  y: y,
});

// the same function rewritten to use this new syntax:
const getMousePosition = (x, y) => ({ x, y });
```

## Booleans

Booleans may only be one of two values: true or false. They are basically little on-off switches,
where true is "on" and false is "off". These two states are mutually exclusive.

```javascript
true;
false;
```

## Classes

JavaScript classes, introduced in ECMAScript 2015, are primarily syntactical sugar over JavaScript's existing prototype-based inheritance. The class syntax does not introduce a new object-oriented inheritance model to JavaScript.

### Class Declaration

You define a class using the class keyword followed by the name of the class.

```js
class Rectangle {
  constructor(height, width) {
    this.height = height;
    this.width = width;
  }
}

const rect = new Rectangle(10, 20);
console.log(rect.height);

//Output

```

The `constructor` method is a special method for creating and initializing an object created with a class. There can only be one special method with the name "constructor" in a class.

### Methods

You can define methods inside a class. These methods are stored on the prototype of the class.

```js
class Rectangle {
  constructor(height, width) {
    this.height = height;
    this.width = width;
  }
  
  // Method
  calcArea() {
    return this.height * this.width;
  }
}

const square = new Rectangle(10, 10);
console.log(square.calcArea());

//Output

```

### Getters and Setters

You can use the get and set keywords to define getters and setters for properties.

```js
class User {
  constructor(name) {
    this._name = name;
  }

  get name() {
    return this._name.toUpperCase();
  }

  set name(newName) {
    if (newName.length < 4) {
      console.log("Name is too short.");
      return;
    }
    this._name = newName;
  }
}

let user = new User("John");
console.log(user.name);

user.name = "Al";
console.log(user.name);

//Output

```
### Static Methods

The static keyword defines a static method for a class. Static methods are called without instantiating their class and cannot be called through a class instance. They are often used to create utility functions for an application.

JAVASCRIPT
Run
Playground

class Point {
  constructor(x, y) {
    this.x = x;
    this.y = y;
  }

  static distance(a, b) {
    const dx = a.x - b.x;
    const dy = a.y - b.y;

    return Math.hypot(dx, dy);
  }
}

const p1 = new Point(5, 5);
const p2 = new Point(10, 10);

console.log(Point.distance(p1, p2));
Output

Visualize
No output yet.
### Inheritance

Classes can inherit from other classes using the extends keyword.

JAVASCRIPT
Run
Playground

class Animal {
  constructor(name) {
    this.name = name;
  }

  speak() {
    console.log(`${this.name} makes a noise.`);
  }
}

class Dog extends Animal {
  constructor(name) {
    super(name); // call the super class constructor and pass in the name parameter
  }

  speak() {
    console.log(`${this.name} barks.`);
  }
}

let d = new Dog('Mitzie');
d.speak();
Output

Visualize
No output yet.
The super keyword is used to access and call functions on an object's parent.

### Private Fields

Class fields are public by default, but private class members can be created by using a hash # prefix. The privacy encapsulation of these class features is enforced by JavaScript itself.

JAVASCRIPT
Run
Playground

class Counter {
  #count = 0;

  increment() {
    this.#count++;
  }

  getCount() {
    return this.#count;
  }
}

const counter = new Counter();
counter.increment();
console.log(counter.getCount());


## Conditional Statements

### If Statements

```javascript
if (condition is true) {
  statement is executed
}
```

➖ Else Statement

```javascript
if (num > 10) {
  return "Bigger than 10";
} else {
  return "10 or Less";
}
```

➖ Else if statement

```javascript
if (num > 15) {
  return "Bigger than 15";
} else if (num < 5) {
  return "Smaller than 5";
} else {
  return "Between 5 and 15";
}
```

### Conditional (Ternary) Operator

```javascript
// this if statement...
function findGreater(a, b) {
  if (a > b) {
    return "a is greater";
  } else {
    return "b is greater";
  }
}

// is equivalent to this ternary operator
function findGreater(a, b) {
  return a > b ? "a is greater" : "b is greater";
}
```

### Multiple Conditional (Ternary) Operators

```javascript
// this if statement...
function findGreaterOrEqual(a, b) {
  if (a === b) {
    return "a and b are equal";
  } else if (a > b) {
    return "a is greater";
  } else {
    return "b is greater";
  }
}

// is equivalent to this ternary operator
function findGreaterOrEqual(a, b) {
  return a === b
    ? "a and b are equal"
    : a > b
    ? "a is greater"
    : "b is greater";
}
```

## Switch Statement

```javascript
switch(num) {
  case value1:
    statement1;
    break;
  case value2:
    statement2;
    break;
...
  case valueN:
    statementN;
    break;
}
```

➖ Default Switch Statement

```javascript
switch (num) {
  case value1:
    statement1;
    break;
  case value2:
    statement2;
    break;
...
  default:
    defaultStatement;
    break;
}
```

➖ Multiple Options with Switch Statement

```javascript
switch (val) {
  case 1:
  case 2:
  case 3:
    result = "1, 2, or 3";
    break;
  case 4:
    result = "4 alone";
}
```

## Comparison Operators

| Operator | Meaning               |
| -------- | --------------------- |
| `==`     | Equality              |
| `===`    | Strict Equality       |
| `!=`     | Inequality            |
| `!==`    | Strict Inequality     |
| `>`      | Greater Than          |
| `>=`     | Greater or Equal Than |
| `<`      | Less Than             |
| `<=`     | Less or Equal Than    |
| `&&`     | And                   |
| `        |                       | ` | Or |

## While Loops

### While Loop

```javascript
var ourArray = [];
var i = 0;
while (i < 5) {
  ourArray.push(i);
  i++;
}
```

### Do...While Loops

```javascript
var ourArray = [];
var i = 0;
do {
  ourArray.push(i);
  i++;
} while (i < 5);
```

## For Loops

### For Loop

```javascript
var ourArray = [];
var i = 0;
while (i < 5) {
  ourArray.push(i);
  i++;
}

// Count Backwards With a For Loop
var ourArray = [];
for (var i = 10; i > 0; i -= 2) {
  ourArray.push(i);
}

// Iterate Through an Array
var arr = [10, 9, 8, 7, 6];
for (var i = 0; i < arr.length; i++) {
  console.log(arr[i]);
}

// Nested for loops
var arr = [
  [1, 2],
  [3, 4],
  [5, 6],
];
for (var i = 0; i < arr.length; i++) {
  for (var j = 0; j < arr[i].length; j++) {
    console.log(arr[i][j]);
  }
}
```

### ES6 for-of (for arrays)

(elemanları arasında iterate ettirir)

```javascript
for (let value of myArray) {
  console.log(value);
}
```

```js
const langs = ["Python", "Java", "C++", "Php"];

for (let value of langs) {
  console.log(value);
}

/* --Output--
Python
Java
C++
Php
*/

```

➖ for-of with String

```js
const name = "Ahmet";

for (let character of name) {
  console.log(character);
}

/* --Output--
A
h
m
e
t
*/
```

### for-in (objects,arrays)

(elemanları arasında iterate ettirir)

➖ for-in with object

```js
const person = {
  name: "Mustafa",
  age: 25,
  salary: 3000
};

// For In Object
for (let prop in person) {
  console.log(prop, person[prop]);
}

/* ---Output--- 
name Mustafa
age 25
salary 3000
*/
```

➖ for-in with array

```js
const langs = ["Python", "Java", "C++", "Php"];

// For in Array
for (let index in langs) {
  console.log(index, langs[index]);
}

/* ---Output---
0 Python
1 Java
2 C++
3 Php
*/
```

## Functions

```javascript
function functionName() {
  console.log("Hello World");
}

functionName(); // call the function
```

### Function Arguments

```javascript
function ourFunctionWithArgs(a, b) {
  console.log(a - b);
}
ourFunctionWithArgs(10, 5); // 5
```

### Return Statement

```javascript
function plusThree(num) {
  return num + 3;
}
var answer = plusThree(5); // 8
```

### Immediately Invoked Function Expression or IIFE

```javascript
(function () {
  console.log("A cozy nest is ready");
})();
```

### ES6 Arrow Functions

```javascript
const myFunc = function () {
  const myVar = "value";
  return myVar;
};

// can be rewritten like this
const myFunc = () => {
  const myVar = "value";
  return myVar;
};

// and if there is no function body, and only a return value
const myFunc = () => "value";

// to pass parameters to an arrow function
const doubler = (item) => item * 2;
```

### ES6 Higher Order Arrow Functions

```javascript
FBPosts.filter(function (post) {
  return post.thumbnail !== null && post.shares > 100 && post.likes > 500;
});

// the previous function can be rewritten like this
FBPosts.filter(
  (post) => post.thumbnail !== null && post.shares > 100 && post.likes > 500
);
```

### ES6 Rest Operator with Function Parameters

With the rest operator, you can create functions that take a variable number of arguments. These arguments are stored in an array that can be accessed later from inside the function.

```javascript
function howMany(...args) {
  return "You have passed " + args.length + " arguments.";
}
console.log(howMany(0, 1, 2)); // You have passed 3 arguments
console.log(howMany("string", null, [1, 2, 3], {})); // You have passed 4 arguments.
```

### ES6 Declarative Functions within Objects

```javascript
// When defining functions within objects in ES5, we have to use the keyword function
const person = {
  name: "Taylor",
  sayHello: function () {
    return `Hello! My name is ${this.name}.`;
  },
};

// With ES6, You can remove the function keyword and colon
const person = {
  name: "Taylor",
  sayHello() {
    return `Hello! My name is ${this.name}.`;
  },
};
```

## Regular Expressions

From the MDN web docs (https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Regular_expressions)

Regular expressions are patterns used to match character combinations in strings. In JavaScript, regular expressions are also objects. These patterns are used with the exec() and test() methods of RegExp, and with the match(), matchAll(), replace(), replaceAll(), search(), and split() methods of String. This section describes JavaScript regular expressions.

### Regular Expression Symbols

| Symbol   | Description                                                               |
|----------|---------------------------------------------------------------------------|
| .        | Matches any character except newline                                      |
| `\d`     | Matches any digit (0-9)                                                   |
| \D       | Matches any non-digit character                                           |
| \s       | Matches any whitespace character                                          |
| \S       | Matches any non-whitespace character                                      |
| \w       | Matches any alphanumeric character (a-z, A-Z, 0-9) and underscore (_)     |
| \W       | Matches any non-alphanumeric character                                    |
| `[abc]`  | Matches any character inside the brackets (a, b, or c)                    |
| `[^abc]` | Matches any character not inside the brackets                             |
| `^`      | Matches the start of the string                                           |
| $        | Matches the end of the string                                             |
| *        | Matches zero or more occurrences of the preceding element                 |
| +        | Matches one or more occurrences of the preceding element                  |
| ?        | Matches zero or one occurrence of the preceding element                   |
| `{n}`    | Matches exactly n occurrences of the preceding element                    |
| `{n,}`   | Matches n or more occurrences of the preceding element                    |
| `{n,m}`  | Matches at least n and at most m occurrences of the preceding element     |
| `\|`     | Acts as a boolean OR. Matches the pattern before or the pattern after the |
| `( )`    | Defines a group                                                           |
| `(?: )`  | Defines a non-capturing group                                             |
| `(?= )`  | Positive lookahead                                                        |
| `(?! )`  | Negative lookahead                                                        |

📝 Complex Patterns : Please note that following examples are simple examples and regular expressions can be combined to create more complex patterns.

➖ Dot (.)
Matches any character except newline.

```js
let regex = /a.c/;
let str = 'abc';
console.log(regex.test(str));
Output

```

➖ Digit (\d)
Matches any digit (0-9).

JAVASCRIPT
Run
Playground

let regex = /\d/;
let str = 'abc123';
console.log(regex.test(str));
Output

Visualize
No output yet.
Non-Digit (\D)
Matches any non-digit character.

JAVASCRIPT
Run
Playground

let regex = /\D/;
let str = 'abc123';
console.log(regex.test(str));
Output

Visualize
No output yet.
Whitespace (\s)
Matches any whitespace character.

JAVASCRIPT
Run
Playground

let regex = /\s/;
let str = 'abc def';
console.log(regex.test(str));
Output

Visualize
No output yet.
Non-Whitespace (\S)
Matches any non-whitespace character.

JAVASCRIPT
Run
Playground

let regex = /\S/;
let str = ' abc';
console.log(regex.test(str));
Output

Visualize
No output yet.
Word Character (\w)
Matches any alphanumeric character (a-z, A-Z, 0-9) and underscore (_).

JAVASCRIPT
Run
Playground

let regex = /\w/;
let str = 'abc';
console.log(regex.test(str));
Output

Visualize
No output yet.
Non-Word Character (\W)
Matches any non-alphanumeric character.

JAVASCRIPT
Run
Playground

let regex = /\W/;
let str = 'abc-def';
console.log(regex.test(str));
Output

Visualize
No output yet.
Character Set ([abc])
Matches any character inside the brackets (a, b, or c).

JAVASCRIPT
Run
Playground

let regex = /[abc]/;
let str = 'defabc';
console.log(regex.test(str));
Output

Visualize
No output yet.
Negated Character Set ([^abc])
Matches any character not inside the brackets.

JAVASCRIPT
Run
Playground

let regex = /[^abc]/;
let str = 'defabc';
console.log(regex.test(str));
Output

Visualize
No output yet.
Start Anchor (^)
Matches the start of the string.

JAVASCRIPT
Run
Playground

let regex = /^abc/;
let str = 'abcdef';
console.log(regex.test(str));
Output

Visualize
No output yet.
End Anchor ($)
Matches the end of the string.

JAVASCRIPT
Run
Playground

let regex = /def$/;
let str = 'abcdef';
console.log(regex.test(str));
Output

Visualize
No output yet.
Zero or More (*):** Matches zero or more occurrences of the preceding element.
JAVASCRIPT
Run
Playground

let regex = /a*/;
let str = 'aaaabc';
console.log(regex.test(str));
Output

Visualize
No output yet.
One or More (+)
Matches one or more occurrences of the preceding element.

JAVASCRIPT
Run
Playground

let regex = /a+/;
let str = 'aaaabc';
console.log(regex.test(str));
Output

Visualize
No output yet.
Zero or One (?)
Matches zero or one occurrence of the preceding element.

JAVASCRIPT
Run
Playground

let regex = /a?/;
let str = 'abc';
console.log(regex.test(str));
Output

Visualize
No output yet.
Exactly N ({n})
Matches exactly n occurrences of the preceding element.

JAVASCRIPT
Run
Playground

let regex = /a{2}/;
let str = 'aaaabc';
console.log(regex.test(str));
Output

Visualize
No output yet.
N or More ({n,})
Matches n or more occurrences of the preceding element.

JAVASCRIPT
Run
Playground

let regex = /a{2,}/;
let str = 'aaaabc';
console.log(regex.test(str));
Output

Visualize
No output yet.
Between N and M ({nm})
Matches at least n and at most m occurrences of the preceding element.

JAVASCRIPT
Run
Playground

let regex = /a{2,3}/;
let str = 'aaaabc';
console.log(regex.test(str));
Output

Visualize
No output yet.
OR (|)
Acts as a boolean OR. Matches the pattern before or the pattern after the |.

JAVASCRIPT
Run
Playground

let regex = /abc|def/;
let str1 = 'abc';
let str2 = 'def';
console.log(regex.test(str1));
console.log(regex.test(str2));
Output

Visualize
No output yet.
Grouping (()
Defines a group.

JAVASCRIPT
Run
Playground

let regex = /(abc)/;
let str = 'abcdef';
console.log(regex.test(str));
Output

Visualize
No output yet.
Non-Capturing Group ((?: ))
Defines a non-capturing group.

JAVASCRIPT
Run
Playground

let regex = /(?:abc)/;
let str = 'abcdef';
console.log(regex.test(str));
Output

Visualize
No output yet.
Sure, here is the continuation from item 21:

Positive Lookahead ((?= ))
Positive lookahead.

JAVASCRIPT
Run
Playground

let regex = /abc(?=def)/;
let str = 'abcdef';
console.log(regex.test(str));
Output

Visualize
No output yet.
Negative Lookahead ((?! ))
Negative lookahead.

JAVASCRIPT
Run
Playground

let regex = /abc(?!def)/;
let str = 'abcghi';
console.log(regex.test(str));
Output

Visualize
No output yet



### Resume Table

| Character  | Description                                                                                        |
| ---------- | -------------------------------------------------------------------------------------------------- |
| `\`        | Escapes a special character.                                                                       |
|`\|`| Search for multiple patterns. To match "yes" or "no", the regex is `/yes | no/`. |
| `i`        | This flag is used to ignore upper and lowercase. `/ignorecase/i`.                                  |
| `g`        | Search or extract a pattern more than once.                                                        |
| `.`        | The wildcard character `.` will match any character except new lines.                              |
| `[]`       | Allow you to define the characters to match. `/b[au]g/` will match "bag", "bug" but not "bog".     |
| `[a-z]`    | Match all the characters between a and z.                                                          |
| `[1-9]`    | Match all the numbers between 1 and 9.                                                             |
| `[a-z1-9]` | Match all the character between a and z, and the numbers between 1 and 9.                          |
| `[^]`      | Match the characters not in the set. `[^a-e]` match all other characters except A, B, C, D, and E. |
| `+`        | Match 1 or more occurrences of the previous character in a row.                                    |
| `*`        | Match 0 or more occurrences of the previous character.                                             |
| `?`        | Match 0 or 1 occurrence of the previous character. Useful for Lazy matching.                       |
| `^`        | Search for patterns at the beginning of strings.                                                   |
| `$`        | Search for patterns at the end of a string.                                                        |
| `\w`       | Equal to `[A-Za-z0-9_]`. Matches upper, lowercase, numbers the and underscore character (-).       |
| `\W`       | Matches any nonword character. Equivalent to `[^a-za-z0-9_]`.                                      |
| `\d`       | Equal to `[0-9]`. Match one digit.                                                                 |
| `\D`       | Equal to `[^0-9]`. Match one non digit.                                                            |
| `\s`       | Match a whitespace.                                                                                |
| `\S`       | Match everything except whitespace.                                                                |
| `a{2,5}`   | Match the letter `a` between 3 and 5 times.                                                        |
| `a{2,}`    | Specify only the lower number of matches.                                                          |
| `a{5}`     | Specify the exact number of matches.                                                               |
| `(...)`    | Specify a group that can be acceded with number (from 1)                                           |

### Regex Methods

| Method      | Description                                                 |
| ----------- | ----------------------------------------------------------- |
| `test()`    | Returns true or false if the pattern match a string or not. |
| `match()`   | Extract the actual matches found.                           |
| `replace()` | Search and replace text in a string .                       |

### Examples

```javascript
// test method returns true or false if the pattern match a string or not (pattern exist)
// (tümüyle uyumuna değil, parça olarak var mı ona bakar)
let myString1 = "Hello, World!";
let myRegex1 = /Hello/;
let result1 = myRegex1.test(myString1);

console.log(result1);
// true

// extract the matches of a regex with the match method
let extractStr = "Extract the word 'coding' from this string.";
let codingRegex = /coding/;
let result2 = extractStr.match(codingRegex);

console.log(result2);
/*
[
  'coding',
  index: 18,
  input: "Extract the word 'coding' from this string.",
  groups: undefined
]
*/

// Search and replace
let wrongText = "The sky is silver.";
let silverRegex = /silver/;
let result2_1 = wrongText.replace(silverRegex, "blue"); // Returns "The sky is blue."

console.log(result2_1);
// The sky is blue.

// search for multiple patterns using the alternation or OR operator: |
let petString = "James has a pet cat.";
let petRegex = /dog|cat|bird|fish/;
let result3 = petRegex.test(petString);

console.log(result3);
// true

// ignore upper or lowercase
let myString = "FreeCodeCamp";
let fccRegex = /freeCodeCamp/i; // flag i
let result4 = fccRegex.test(myString);

console.log(result4);
// true

// Search or extract a pattern more than once
let twinkleStar = "Twinkle, twinkle, little star";
let starRegex = /Twinkle/gi; // a regex can have multiple flags
let result5 = twinkleStar.match(starRegex);

console.log(result5);
// [ 'Twinkle', 'twinkle' ]

// The wildcard character .(dot) will match any character except new lines.
let exampleStr = "Let's have fun with regular expressions!";
let unRegex = /.un/;
let result6 = unRegex.test(exampleStr);

console.log(result6);
// true

// define the characters to match, in this example all the vowels in quoteSample
let quoteSample1 =
  "Beware of bugs in the above code; I have only proved it correct, not tried it.";
let vowelRegex = /[aeiou]/gi;
let result7 = quoteSample1.match(vowelRegex);


console.log(result7);
/*
[
  'e', 'a', 'e', 'o', 'u', 'i',
  'e', 'a', 'o', 'e', 'o', 'e',
  'I', 'a', 'e', 'o', 'o', 'e',
  'i', 'o', 'e', 'o', 'i', 'e',
  'i'
]
*/

// Match all the characters in quoteSample (between a and z)
let quoteSample2 = "The quick brown fox jumps over the lazy dog.";
let alphabetRegex = /[a-z]/gi;
let result8 = quoteSample2.match(alphabetRegex);

console.log(result8);

/*
[
  'T', 'h', 'e', 'q', 'u', 'i', 'c',
  'k', 'b', 'r', 'o', 'w', 'n', 'f',
  'o', 'x', 'j', 'u', 'm', 'p', 's',
  'o', 'v', 'e', 'r', 't', 'h', 'e',
  'l', 'a', 'z', 'y', 'd', 'o', 'g'
]
*/

// Match all the character between two characters and numbers
let quoteSample3 = "Blueberry 3.141592653s are delicious.";
let myRegex2 = /[h-s2-6]/gi;
let result9 = quoteSample3.match(myRegex2);

console.log(result9);
/*
[
  'l', 'r', 'r', '3', '4',
  '5', '2', '6', '5', '3',
  's', 'r', 'l', 'i', 'i',
  'o', 's'
]
*/

// Match all that is not a number or a vowel
let quoteSample4 = "3 blind mice.";
let myRegex3 = /[^aeiou0-9]/gi;
let result10 = quoteSample4.match(myRegex3);

console.log(result10);
/* 
[
  ' ', 'b', 'l',
  'n', 'd', ' ',
  'm', 'c', '.'
]
*/

// Match 1 or more occurrences of the previous character (* for 0 or more)
let difficultSpelling = "Mississippi";
let myRegex4 = /s+/g;
let result11 = difficultSpelling.match(myRegex4);

console.log(result11);
/* 
[ 'ss', 'ss' ]
*/

// ? Match 0 or 1 occurrence of the previous character. Useful for Lazy matching
let text = "titanic";
let myRegex5 = /t[a-z]*?i/;
let result12 = text.match(myRegex5);

console.log(result12);
// [ 'ti', index: 0, input: 'titanic', groups: undefined ]


// Search for patterns at the beginning of strings
let rickyAndCal = "Cal and Ricky both like racing.";
let calRegex = /^Cal/;
let result13 = calRegex.test(rickyAndCal);

console.log(result13);
// true

// Search for patterns at the end of a string
let caboose = "The last car on a train is the caboose";
let lastRegex = /caboose$/;
let result14 = lastRegex.test(caboose);

console.log(result14);
// true

// \w is equal to [A-Za-z0-9_]
let quoteSample = "The five boxing wizards jump quickly.";
let alphabetRegexV2 = /\w/g;
let result15 = quoteSample.match(alphabetRegexV2).length;

console.log(result15);
// 31

// Match only 3 to 6 letter h's in the word "Oh no"
let ohStr = "Ohhh no";
let ohRegex = /Oh{3,6} no/;
let result16 = ohRegex.test(ohStr);

console.log(result16);
// true

// Match both the American English (favorite) and the British English (favorite) version of the word
let favWord = "favorite";
let favRegex = /favou?rite/;
let result17 = favRegex.test(favWord);

console.log(result17);
// true

// Groups () let you reuse patterns
let repeatNum = "42 42 42";
let reRegex = /^(\d+)\s\1\s\1$/; // every 1 represent the group (\d+)
let result18 = reRegex.test(repeatNum);

console.log(result18);
//true

// Remove all the spaces at the beginning and end of a string
let hello = "   Hello, World!  ";
let wsRegex = /^\s+(.*\S)\s+$/;
let result19 = hello.replace(wsRegex, "$1"); // returns 'Hello, World!'

console.log(result19);
// Hello, World!


```




## Object Oriented (old style)

### Example

```javascript
let duck = {
  name: "Aflac",
  numLegs: 2,
  sayName: function () {
    return "The name of this duck is " + this.name + ".";
  },
};

duck.sayName(); // Returns "The name of this duck is Aflac."
```

### Constructors and New Objects

Constructors follow a few conventions:

- Constructors are defined with a capitalized name to distinguish them from other functions that are not constructors.
- Constructors use the keyword this to set properties of the object they will create. Inside the constructor, this refers to the new object it will create.
- Constructors define properties and behaviors instead of returning a value as other functions might.

```javascript
// constructor
function Bird(name, color) {
  this.name = name;
  this.color = color;
}

// create a new instance of Bird
let cardinal = new Bird("Bruce", "red");
let duck = new Bird("Donald", "blue");

// access and modify blueBird object
cardinal.name; // Bruce
cardinal.color; // red
cardinal.color = green;
cardinal.color; // green

// check if an object is an instance of a constructor
cardinal instanceof Bird; // true
crow instanceof Bird; // false

// check an objects own (name, color, numLegs) properties
cardinal.hasOwnProperty("color"); // true
cardinal.hasOwnProperty("age"); // false

//check an objects properties with the constructor property
cardinal.constructor === Bird; // true

// use constructor.prototype to add new properties to object constructors
Bird.prototype.cute = true;
cardinal.cute; // true
crow.cute; // true

// add more than one property and method to a constructor
Bird.prototype = {
  constructor: Bird, // specify the constructor
  numLegs: 2, // new property

  eat: function () {
    // new method
    console.log("nom nom nom");
  },

  describe: function () {
    // new method
    console.log("My name is " + this.name);
  },
};

let chicken = new Bird("Dinner", "brown");
chicken.numLegs; // 2
chicken.eat(); // nom nom nom
chicken.describe(); // My name is Dinner
```

### Inheritance

```javascript
function Animal() {}

Animal.prototype = {
  constructor: Animal,
  eat: function () {
    console.log("nom nom nom");
  },
};

function Cat(name) {
  this.name = name;
}

// make the Cat constructor inherit the eat function from Animal
Cat.prototype = Object.create(Animal.prototype);

let myCat = new Cat("charles");
myCat.eat(); // nom nom nom
```

Add methods after Inheritance and override them

```javascript
function Animal() {}
Animal.prototype.eat = function () {
  console.log("nom nom nom");
};

// Dog constructor
function Dog() {}

// make the Gog constructor inherit the eat function from Animal
Dog.prototype = Object.create(Animal.prototype);
Dog.prototype.constructor = Dog;

Dog.prototype.bark = function () {
  console.log("wof wof!");
};

// the new object will have both, the inherited eat() and its own bark() method
let beagle = new Dog();
beagle.eat(); // "nom nom nom"
beagle.bark(); // "Woof!"

// override an inherited method
Dog.prototype.eat = function () {
  return "nice meeeeat!";
};

let doberman = new Dog();
doberman.eat(); // nice meeeeat!
```

### Mixins

A mixin allows unrelated objects to use a collection of functions.

```javascript
let bird = {
  name: "Donald",
  numLegs: 2,
};

let boat = {
  name: "Warrior",
  type: "race-boat",
};

// this mixin contain the glide method
const glideMixin = function (obj) {
  obj.glide = function () {
    console.log("gliding...");
  };
};

// the object is passed to the mixin and the glide method is assigned
glideMixin(bird);
glideMixin(boat);

bird.glide(); // "gliding..."
boat.glide(); // "gliding..."
```

### Closures to Protect Properties

In JavaScript, a function always has access to the context in which it was created. This is called closure. Now, the property can only be accessed and changed by methods also within the constructor function. In JavaScript, this is called closure.

```javascript
function Bird() {
  // instead of this.hatchedEgg...
  let hatchedEgg = 10; // private property

  this.getHatchedEggCount = function () {
    // publicly available method that a bird object can use
    return hatchedEgg;
  };
}

let ducky = new Bird();
ducky.hatchedEgg = 2; // nothing happens
ducky.getHatchedEggCount; // 10
```

### Modules

An immediately invoked function expression (IIFE) is often used to group related functionality into a single object or module.

```javascript
let funModule = (function () {
  return {
    isCuteMixin: function (obj) {
      obj.isCute = function () {
        return true;
      };
    },

    singMixin: function (obj) {
      obj.sing = function () {
        console.log("Singing to an awesome tune");
      };
    },
  };
})();

function Dog() {}
let goodBoy = new Dog();

// assign the singMixin method to the goodBoy object
funModule.singMixin(goodBoy);
goodBoy.sing(); // Singing to an awesome tune
```

## ES6 Object Oriented

### Basics

ES6 provides a new syntax to help create objects, the keyword `class`.The class syntax
is just a syntax, and not a full-fledged class based implementation of object oriented paradigm,
unlike in languages like Java, or Python, or Ruby etc.

### ES6 Classes

```javascript
class Book {
  constructor(title, author, year) {
    this.title = title;
    this.author = author;
    this.year = year;
  }

  getSummary() {
    return `${this.title} was written by ${this.author} in ${this.year}`;
  }

  getAge() {
    const years = new Date().getFullYear() - this.year;
    return `${this.title} is ${years} years old`;
  }
}

book = new Book("Book One", "John Doe", 2016);
book.getSummary(); // Book One was written by John Doe in 2016
book.getAge(); // Book One is 3 years old
```

### ES6 getters and setters

```javascript
class Book {
  constructor(author) {
    this._author = author;
  }
  // getter
  get writer() {
    return this._author;
  }
  // setter
  set writer(updatedAuthor) {
    this._author = updatedAuthor;
  }
}
const lol = new Book("anonymous");
console.log(lol.writer); // anonymous
lol.writer = "wut";
console.log(lol.writer); // wut
```

### ES6 Statics Methods

Static methods allow using methods without instantiating an object

```javascript
class Book {
  constructor(title, author, year) {
    this.title = title;
    this.author = author;
    this.year = year;
  }

  static sayHi() {
    return "Hi!";
  }
}

Book.sayHi(); // Hi!
```

### Importing References or Classes

TypeScript (ve JavaScript) ortamında bir sınıfın statik alanı, o sınıfın kendisine aittir ve modül sistemi gereği, farklı dosyalardan aynı sınıfı import ettiğinizde aynı statik alanı işaret edersiniz.

Yani:
- Statik alanlar, sınıfın örneklerine değil, doğrudan sınıfın kendisine bağlıdır.
- `Bir modül bir kez yüklenir ve cache’lenir`. Farklı dosyalardan import ettiğinizde, aynı sınıf ve aynı statik alan kullanılır.

Örnek:
````typescript
// logger.ts
export class Logger {
  static count = 0;
}

// a.ts
import { Logger } from './logger';
Logger.count++; // count = 1

// b.ts
import { Logger } from './logger';
Logger.count++; // count = 2 (aynı alan!)
````

Sonuç: Farklı dosyalardan import etseniz de, statik alan tek ve ortaktır.


### ES6 Inheritance

```javascript
class Book {
  constructor(title, author, year) {
    this.title = title;
    this.author = author;
    this.year = year;
  }

  getSummary() {
    return `${this.title} was written by ${this.author} in ${this.year}`;
  }
}

class Magazine extends Book {
  constructor(title, author, year, month) {
    super(title, author, year);
    this.month = month;
  }

  sayHi() {
    return "Hi!";
  }
}

mag = new Magazine("Mag", "People", 2019, "jan");
mag.getSummary(); // Mag was written by People in 2019
mag.sayHi(); // Hi!
```

## ES6 import and export

### Basics

> The lessons in this section handle non-browser features. import won't work on a browser directly.
> However, we can use various tools to create code out of this to make it work in browser.

### import

```javascript
// we can choose which parts of a module or file to load into a given file.
import { function } from "file_path";
// We can also import variables the same way!

// Import Everything from a File
import * as name_of_your_choice from "file_path";
```

### export

In order for `import` to work, though, we must first `export` the functions or variables we need.
Like import, export is a non-browser feature.

```javascript
const capitalizeString = (string) => {
  return string.charAt(0).toUpperCase() + string.slice(1);
};
export { capitalizeString }; //How to export functions.
export const foo = "bar"; //How to export variables.

// Alternatively, if you would like to compact all your export statements into one line, you can take this approach
const capitalizeString = (string) => {
  return string.charAt(0).toUpperCase() + string.slice(1);
};
const foo = "bar";
export { capitalizeString, foo };

// use export default if only one value is being exported from a file.
// It is also used to create a fallback value for a file or module
export default function add(x, y) {
  return x + y;
}
// and to import
import add from "math_functions";
add(5, 4); //Will return 9
```

## Async/Await

### JavaScript is a synchronous language!

> This means only one operation can be carried out at a time. Also There are many ways JavaScript provides us with the ability to make it behave like an
> asynchronous language. One of them is with the Async-Await clause.

### What is async-await?

Async and Await are extensions of promises. First you need to clear the concepts of `Promises(Future)` before coming to async/await.

### Async

Async functions enable us to write promise based code as if it were synchronous, but without blocking the execution thread. It operates asynchronously via the event-loop. Async functions will always return a value. Using `async` simply implies that a promise will be returned, and if a `promise` is not returned, JavaScript automatically wraps it in a resolved promise with its value.

```javascript
async function firstAsync() {
  return 23;
}

firstAsync().then(alert); // 23
```

Running the above code gives the alert output as 23, it means that a `promise` was returned, otherwise the `.then()` method simply would not be possible.

### Await

The await operator is used to wait for a Promise to complete. It can be used inside an `async` block only. The keyword `await` makes JavaScript wait until the promise returns a result. It has to be noted that it only makes the `async` function block wait and not the whole program execution.

The code block below shows the use of Async Await together.

(await sadece async fonksiyon içinde kullanılabilir)

```javascript

async function firstAsync() {
    let promise = new Promise((res, rej) => {
        setTimeout(() => res("Now it's done!"), 1000)
    });

    // wait until the promise returns us a value
    let result = await promise;

    // "Now it's done!"
    alert(result);
    }
};
firstAsync();
```

### Things to remember when using Async Await

➖  We can’t use the `await` keyword inside of regular functions. (only in async functions)

```javascript
function firstAsync() {
  let promise = Promise.resolve(10);
  let result = await promise; // Syntax error
}
```

To make the above function work properly, we need to add `async` before the function `firstAsync();`

➖ Async Await makes execution sequential

Not necessarily a bad thing, but having paralleled execution is much much faster.

For example:

```javascript
async function sequence() {
  await promise1(50); // Wait 50ms…
  await promise2(50); // …then wait another 50ms.
  return "done!";
}
```

The above takes 100ms to complete, not a huge amount of time but still slow.

This is because it is happening in sequence. Two promises are returned, both of which takes 50ms to complete. The second promise executes only after the first promise is resolved. This is not a good practice, as large requests can be very time consuming. We have to make the execution parallel.

That can be achieved by using `Promise.all()` .

According to MDN:

> The `Promise.all()` method returns a single `Promise` that resolves when all of the promises passed as an iterable have resolved or when the iterable contains > no promises. It rejects with the reason of the first promise that rejects.

➖ Promise.all()

```javascript
async function sequence() {
  await Promise.all([promise1(), promise2()]);
  return "done!";
}
```

The `promise.all()` function resolves when all the promises inside the iterable have been resolved and then returns the result.

Another method:

```javascript
async function parallel() {
  // Start a 500ms timer asynchronously…
  const wait1 = promise1(50);
  // …meaning this timer happens in parallel.
  const wait2 = promise2(50);

  // Wait 50ms for the first timer…
  await wait1;

  // …by which time this timer has already finished.
  await wait2;

  return "done!";
}
```

Async Await is very powerful but they come with caveats. But if we use them properly, they help to make our code very readable and efficient.

## Math

📝 Math Object : The `Math` object is not a constructor. All properties and methods of `Math` are static. You refer to the constant pi as `Math.PI` and you call the sine function as `Math.sin(x)`, where x is the method's argument.

### Math.PI

Math.PI returns the ratio of a circle's circumference to its diameter (approx. 3.14159).

JAVASCRIPT
Run
Playground

console.log(Math.PI);
Output

Visualize
No output yet.
Math.round()
Math.round(x) returns the value of x rounded to its nearest integer.

JAVASCRIPT
Run
Playground

console.log(Math.round(4.7));
console.log(Math.round(4.4));
Output

Visualize
No output yet.
Math.pow()
Math.pow(x, y) returns the value of x to the power of y.

JAVASCRIPT
Run
Playground

console.log(Math.pow(8, 2));
Output

Visualize
No output yet.
Math.sqrt()
Math.sqrt(x) returns the square root of x.

JAVASCRIPT
Run
Playground

console.log(Math.sqrt(64));
Output

Visualize
No output yet.
Math.abs()
Math.abs(x) returns the absolute (positive) value of x.

JAVASCRIPT
Run
Playground

console.log(Math.abs(-4.7));
Output

Visualize
No output yet.
Math.ceil()
Math.ceil(x) returns the value of x rounded up to its nearest integer.

JAVASCRIPT
Run
Playground

console.log(Math.ceil(4.4));
Output

Visualize
No output yet.
Math.floor()
Math.floor(x) returns the value of x rounded down to its nearest integer.

JAVASCRIPT
Run
Playground

console.log(Math.floor(4.7));
Output

Visualize
No output yet.
Math.min() and Math.max()
Math.min() and Math.max() can be used to find the lowest or highest value in a list of arguments.

JAVASCRIPT
Run
Playground

console.log(Math.min(0, 150, 30, 20, -8, -200));
console.log(Math.max(0, 150, 30, 20, -8, -200));
Output

Visualize
No output yet.
Math.random()
Math.random() returns a random number between 0 (inclusive), and 1 (exclusive).

JAVASCRIPT
Run
Playground

console.log(Math.random());
Output

Visualize
No output yet.
Random Integer
This JavaScript function always returns a random integer between min (included) and max (excluded):

JAVASCRIPT
Run
Playground

function getRndInteger(min, max) {
  return Math.floor(Math.random() * (max - min) ) + min;
}

console.log(getRndInteger(0, 10));
Output

Visualize
No output yet.
Math.trunc()
Math.trunc(x) returns the integer part of x (new in ES6).

JAVASCRIPT
Run
Playground

console.log(Math.trunc(4.9));
console.log(Math.trunc(-4.2));
Output

Visualize
No output yet.


## Json

➖ What is JSON?

JSON (JavaScript Object Notation) is a standard text-based format for representing structured data based on JavaScript object syntax. It is commonly used for transmitting data in web applications (e.g., sending some data from the server to the client, so it can be displayed on a web page, or vice versa).

### JSON.stringify()

The JSON.stringify() method converts a JavaScript object or value to a JSON string.

JAVASCRIPT
Run
Playground

const obj = {
  name: "John",
  age: 30,
  city: "New York"
};

const jsonString = JSON.stringify(obj);
console.log(jsonString);
Output

Visualize
No output yet.
You can also use it to format the output for readability (pretty-print) by passing arguments for replacer (null) and space (2 or 4).

JAVASCRIPT
Run
Playground

const obj = {
  name: "John",
  age: 30,
  city: "New York"
};

const prettyJson = JSON.stringify(obj, null, 2);
console.log(prettyJson);
Output

Visualize
No output yet.
### JSON.parse()

The JSON.parse() method parses a JSON string, constructing the JavaScript value or object described by the string.

JAVASCRIPT
Run
Playground

const jsonString = '{"name":"John", "age":30, "city":"New York"}';

const obj = JSON.parse(jsonString);
console.log(obj.name);
Output

Visualize
No output yet.
Parsing Errors

`JSON.parse()` will throw an error if the string passed to it is not valid JSON. Always ensure your JSON strings are well-formed (e.g., proper quoting of keys). It's good practice to wrap `JSON.parse()` in a `try...catch` block.

### Deep Copy with JSON

You can create a deep copy of an object (if it doesn't contain functions, Dates, undefined, or circular references) using a combination of JSON.parse() and JSON.stringify().

JAVASCRIPT
Run
Playground

const original = {
  name: "Alice",
  details: {
    age: 25,
    hobbies: ["reading", "coding"]
  }
};

const copy = JSON.parse(JSON.stringify(original));

// Modify the copy
copy.details.age = 30;

// The original remains unchanged
console.log(original.details.age);
console.log(copy.details.age);
Output

Visualize
No output yet.

This method is simple but has limitations (it loses Date objects and undefined values). For complex objects, consider using structuredClone() or a library like Lodash.

### Handling Dates
 
JSON does not have a built-in date type. Dates are often serialized as ISO strings.

```js
const event = {
  title: "Conference",
  date: new Date()
};

const json = JSON.stringify(event);
console.log(json);

const parsed = JSON.parse(json);
console.log(typeof parsed.date);

// You need to manually convert it back to a Date object
parsed.date = new Date(parsed.date);
console.log(parsed.date.getFullYear());

// Output
// {"title":"Conference","date":"2026-10-18T06:17:14.195Z"}
// string
// 2026

```

## Fetch API

The Fetch API provides a JavaScript interface for accessing and manipulating parts of the HTTP pipeline, such as requests and responses. It also provides a global `fetch()` method that provides an easy, logical way to fetch resources asynchronously across the network.

### Basic GET Request

The simplest use of fetch() takes one argument — the path to the resource you want to fetch — and returns a promise containing the response (a Response object).

JAVASCRIPT

async function getData() {
  const response = await fetch('https://jsonplaceholder.typicode.com/todos/1');
  const data = await response.json();
  console.log(data);
}

getData();
Here, we are fetching a JSON object from a public API. We await the fetch call to get the response, and then await the response.json() method to parse the JSON body.

Handling Text Responses
Sometimes you might want to fetch text instead of JSON. You can use the text() method for this.

JAVASCRIPT

async function getText() {
  const response = await fetch('https://jsonplaceholder.typicode.com/posts/1');
  const text = await response.text();
  console.log(text);
}

getText();

### POST Request

To allow your script to modify data, you can send data to the server using the POST method. You need to provide a second argument to fetch(): an options object.

JAVASCRIPT

async function postData() {
  const response = await fetch('https://jsonplaceholder.typicode.com/posts', {
    method: 'POST',
    body: JSON.stringify({
      title: 'foo',
      body: 'bar',
      userId: 1,
    }),
    headers: {
      'Content-type': 'application/json; charset=UTF-8',
    },
  });
  
  const data = await response.json();
  console.log(data);
}

postData();

In this example:

method: set to 'POST'.
body: the data we want to send, converted to a JSON string.
headers: specifying that we are sending JSON data.
Checking for Success
The fetch promise only rejects on network failure. HTTP errors (like 404 or 500) validly resolve. You should check response.ok or response.status.

JAVASCRIPT

async function checkStatus() {
  const response = await fetch('https://jsonplaceholder.typicode.com/posts/invalid-id');
  
  if (!response.ok) {
    console.log('Network response was not ok:', response.status);
    return;
  }
  
  const data = await response.json();
  console.log(data);
}

checkStatus();

### Async/Await vs .then()

While valid to use .then(), modern JavaScript prefers async/await for cleaner code.

Using .then():

JAVASCRIPT

fetch('https://jsonplaceholder.typicode.com/todos/1')
  .then(response => response.json())
  .then(json => console.log(json))
  .catch(err => console.error('Error:', err));
Using Async/Await:

JAVASCRIPT

async function fetchData() {
  try {
    const response = await fetch('https://jsonplaceholder.typicode.com/todos/1');
    const json = await response.json();
    console.log(json);
  } catch (err) {
    console.error('Error:', err);
  }
}

## Date And Time

📝 Date Objects : JavaScript `Date` objects represent a single moment in time in a platform-independent format. `Date` objects contain a `Number` that represents milliseconds since 1 January 1970 UTC.

### Creating a Date

There are four ways to create a new date object:

• New Date(): Creates a new date object with the current date and time.

JAVASCRIPT
Run
Playground

const now = new Date();
console.log(now);
Output

Visualize
No output yet.
Date(milliseconds): Creates a new date object as zero time plus milliseconds.
JAVASCRIPT
Run
Playground

// 0 milliseconds after Jan 01 1970
const d = new Date(0);
console.log(d);
Output

Visualize
No output yet.
Date(dateString): Creates a new date object from a date string.
JAVASCRIPT
Run
Playground

const d = new Date("October 13, 2014 11:13:00");
console.log(d);
Output

Visualize
No output yet.
Date(year, month, ...): Creates a new date object with a specified date and time.
Note: JavaScript counts months from 0 to 11 (January = 0, December = 11).
JAVASCRIPT
Run
Playground

// year, month, day, hour, minute, second, millisecond
const d = new Date(2018, 11, 24, 10, 33, 30, 0);
console.log(d);
Output

Visualize
No output yet.

### Get Methods

Use these methods to get information from a date object.

JAVASCRIPT
Run
Playground

const d = new Date("2021-03-25");

console.log(d.getFullYear());
console.log(d.getMonth());
console.log(d.getDate());
console.log(d.getDay());
console.log(d.getHours());
console.log(d.getTime());
Output

Visualize
No output yet.
### Set Methods

Use these methods to set a part of a date object.

JAVASCRIPT
Run
Playground

const d = new Date();
d.setFullYear(2020);
d.setMonth(11);
d.setDate(25);
console.log(d);
Output

Visualize
No output yet.
Date.now()
Date.now() returns the number of milliseconds since January 1, 1970 00:00:00 UTC.

JAVASCRIPT
Run
Playground

const start = Date.now();

// do something...
for (let i = 0; i < 100000; i++) {}

const end = Date.now();
console.log(`Elapsed time: ${end - start} ms`);
Output

Visualize
No output yet.

### Formatting Dates

JavaScript provides a built-in object Intl.DateTimeFormat for language-sensitive date and time formatting.

JAVASCRIPT
Run
Playground

const date = new Date(Date.UTC(2020, 11, 20, 3, 23, 16, 738));

// US English
console.log(new Intl.DateTimeFormat('en-US').format(date));

// British English
console.log(new Intl.DateTimeFormat('en-GB').format(date));

// Korean
console.log(new Intl.DateTimeFormat('ko-KR').format(date));
Output

Visualize
No output yet.
Date Calculations
Since dates are just numbers (milliseconds) under the hood, you can perform math on them.

JAVASCRIPT
Run
Playground

const date1 = new Date('2022-01-01');
const date2 = new Date('2022-01-02');

// Difference in milliseconds
const diffTime = Math.abs(date2 - date1);

// Convert to days
const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 

console.log(diffDays + " days");
Output

Visualize
No output yet.

## Files and Directories

To interact with the file system in JavaScript, you typically use the built-in fs (File System) module in Node.js.

Node.js Environment

While running in a browser, Javascript doesn't have the permissions to directly interact with files and directories on a user's computer due to security restrictions. The contents of this cheatsheet are intended for local use with a Node.js environment.

Requirements
Node.js Environment: JavaScript by itself doesn't have the ability to interact with the file system for security reasons. However, Node.js, a JavaScript runtime built on Chrome's V8 JavaScript engine, provides this capability.

FS Module: The fs module in Node.js is used for interacting with the file system. It provides methods for reading files, creating files, updating files, deleting files, and renaming files.

Async/Sync Operations: The fs module provides both synchronous (blocking) and asynchronous (non-blocking) methods. It's generally recommended to use asynchronous methods for better performance, especially for IO-heavy operations.

Error Handling: When working with the file system, it's important to handle errors properly. This can be done using callbacks, promises, or async/await.

Here's a simple example of reading a file using the fs module:

JAVASCRIPT

const fs = require('fs').promises;

async function readFileAsync() {
  try {
    const data = await fs.readFile('example.txt', 'utf8');
    console.log('File content:', data);
  } catch (err) {
    console.error('An error occurred:', err);
  }
}

readFileAsync();
fs.readFile is used to read the content of example.txt. Because fs.readFile returns a promise, you can use await to wait for the promise to resolve. If an error occurs while reading the file, it's caught by the catch block and logged to the console.

Reading Files
Reading files in Node.js can be done using the fs module's readFile function. This is how you can do it using async/await:

JAVASCRIPT

const fs = require('fs').promises;

async function readFileAsync

(filePath

) {
  try {
    const data = await fs.readFile(filePath, 'utf8');
    console.log('File content:', data);
  } catch (err) {
    console.error('An error occurred:', err);
  }
}

readFileAsync('example.txt');
readFileAsync reads a file at the given filePath. The fs.readFile function is used to read the file content. It returns a promise that resolves with the file content as a string. If an error occurs while reading the file, it's caught by the catch block and logged to the console.

Writing Files
Writing files can be done using the fs module's writeFile function:

JAVASCRIPT

const fs = require('fs').promises;

async function writeFileAsync(filePath, content) {
  try {
    await fs.writeFile(filePath, content);
    console.log('File written successfully');
  } catch (err) {
    console.error('An error occurred:', err);
  }
}

writeFileAsync('example.txt', 'Hello, World!');
The writeFileAsync function writes content to a file at the given filePath. The fs.writeFile function is used to write the content. It returns a promise that resolves when the file has been written. If an error occurs while writing the file, it's caught by the catch block and logged to the console.

Updating Files
To update a file you can use the appendFile or writeFile function.

Appending to a file
JAVASCRIPT

const fs = require('fs').promises;

async function appendToFileAsync(filePath, content) {
  try {
    await fs.appendFile(filePath, content);
    console.log('File updated successfully');
  } catch (err) {
    console.error('An error occurred:', err);
  }
}

appendToFileAsync('example.txt', ' More content');
The appendToFileAsync function appends content to a file at the given filePath. The fs.appendFile function is used to append the content. It returns a promise that resolves when the file has been updated. If an error occurs while updating the file, it's caught by the catch block and logged to the console.

Overwriting a file
JAVASCRIPT

const fs = require('fs').promises;

async function overwriteFileAsync(filePath, content) {
  try {
    await fs.writeFile(filePath, content);
    console.log('File updated successfully');
  } catch (err) {
    console.error('An error occurred:', err);
  }
}

overwriteFileAsync('example.txt', 'New content');
overwriteFileAsync overwrites a file at the given filePath with new content. The fs.writeFile function is used to write the new content. It returns a promise that resolves when the file has been updated. If an error occurs while updating the file, it's caught by the catch block and logged to the console.

Deleting Files
You can delete a file with the unlink function.

JAVASCRIPT

const fs = require('fs').promises;

async function deleteFileAsync(filePath) {
  try {
    await fs.unlink(filePath);
    console.log('File deleted successfully');
  } catch (err) {
    console.error('An error occurred:', err);
  }
}

deleteFileAsync('example.txt');
The deleteFileAsync function deletes a file at the given filePath. The fs.unlink function is used to delete the file. It returns a promise that resolves when the file has been deleted. If an error occurs while deleting the file, it's caught by the catch block and logged to the console.

Renaming Files
The rename function allow you to rename a file.

JAVASCRIPT

const fs = require('fs').promises;

async function renameFileAsync(old

Path

, newPath) {
  try {
    await fs.rename(oldPath, newPath);
    console.log('File renamed successfully');
  } catch (err) {
    console.error('An error occurred:', err);
  }
}

renameFileAsync('oldName.txt', 'newName.txt');
renameFileAsync renames a file from oldPath to newPath. The fs.rename function is used to rename the file. It returns a promise that resolves when the file has been renamed. If an error occurs while renaming the file, it's caught by the catch block and logged to the console.

Creating Directories
To create a directory, you can use the mkdir function.

JAVASCRIPT

const fs = require('fs').promises;

async function createDirectoryAsync(dirPath) {
  try {
    await fs.mkdir(dirPath, { recursive: true });
    console.log('Directory created successfully');
  } catch (err) {
    console.error('An error occurred:', err);
  }
}

createDirectoryAsync('exampleDir');
The createDirectoryAsync function creates a directory at the given dirPath. The fs.mkdir function is used to create the directory. The recursive option is set to true to create parent directories if they do not exist. It returns a promise that resolves when the directory has been created. If an error occurs while creating the directory, it's caught by the catch block and logged to the console.

Reading Directories
You can read a directory by using the readdir function.

JAVASCRIPT

const fs = require('fs').promises;

async function readDirectoryAsync(dirPath) {
  try {
    const files = await fs.readdir(dirPath);
    console.log('Directory content:', files);
  } catch (err) {
    console.error('An error occurred:', err);
  }
}

readDirectoryAsync('exampleDir');
readDirectoryAsync reads the content of a directory at the given dirPath. The fs.readdir function is used to read the directory content. It returns a promise that resolves with an array of filenames. If an error occurs while reading the directory, it's caught by the catch block and logged to the console.

Deleting Directories
To delete a directory yo can use the rmdir function.

JAVASCRIPT

const fs = require('fs').promises;

async function deleteDirectoryAsync(dirPath) {
  try {
    await fs.rmdir(dirPath);
    console.log('Directory deleted successfully');
  } catch (err) {
    console.error('An error occurred:', err);
  }
}

deleteDirectoryAsync('exampleDir');
The deleteDirectoryAsync function deletes a directory at the given dirPath. The fs.rmdir function is used to delete the directory. It returns a promise that resolves when the directory has been deleted. If an error occurs while deleting the directory, it's caught by the catch block and logged to the console.

Deleting Non-Empty Directories

`fs.rmdir` only works on empty directories. If you want to delete a directory and all of its contents, you'll need to first delete the contents of the directory. This can be done using a library like `rimraf`, or by recursively deleting all files and subdirectories.

Deleting non Empty Directories
Deleting non-empty directories requires a recursive function that deletes all files and subdirectories within the directory before deleting the directory itself:

JAVASCRIPT

const fs = require('fs').promises;
const path = require('path');

async function deleteDirectoryRecursive(dirPath) {
  if (dirPath === '/') {
    throw new Error("You are trying to delete the root directory, operation stopped.");
  }

  let entries = await fs.readdir(dirPath, { withFileTypes: true });

  for (let entry of entries) {
    let fullPath = path.join(dirPath, entry.name);

    if (entry.isDirectory()) {
      await deleteDirectoryRecursive(fullPath);
    } else {
      await fs.unlink(fullPath);
    }
  }

  await fs.rmdir(dirPath);
  console.log(`Directory ${dirPath} has been deleted!`);
}

deleteDirectoryRecursive('exampleDir');
deleteDirectoryRecursive deletes a directory and all of its contents at the given dirPath. The fs.readdir function is used to read the directory content. If an entry is a directory, the function is called recursively. If an entry is a file, it's deleted using fs.unlink. Finally, the directory itself is deleted using fs.rmdir.

Caution

This operation is potentially dangerous as it will permanently delete the specified directory and all of its contents. Always make sure that the path you provide does not contain any files or directories you want to keep.

Watching Files and Directories
Watching files and directories can be done using watch or watchFile.

JAVASCRIPT

const fs = require('fs');

fs.watch('example.txt', (eventType, filename) => {
  console.log(`Event type is: ${eventType}`);
  if (filename) {
    console.log(`Filename provided: ${filename}`);
  } else {
    console.log('Filename not provided');
  }
});
fs.watch is used to watch changes in the file example.txt. The callback function is called when the file is accessed or modified. The eventType argument can be 'rename' or 'change', and the filename argument is the name of the file which triggered the event.

Platform and Situational Variability

The exact behavior of `fs.watch` can vary across different platforms and situations. It's not always reliable, especially on network file systems and certain file systems like NFS and VFS. For more reliable file watching, consider using a library like `chokidar`.

Checking if a File or Directory Exists
Checking if a file or directory exists can be don with the access function or fs.promises API's access function.

JAVASCRIPT

const fs = require('fs').promises;

async function checkExists(path) {
  try {
    await fs.access(path);
    console.log('The file or directory exists.');
  } catch {
    console.log('The file or directory does not exist.');
  }
}

checkExists('example.txt');
checkExists checks if a file or directory at the given path exists. The fs.access function is used to check for the existence of the file or directory. It returns a promise that resolves if the file or directory exists, and rejects if it does not.

## Error Handling

Error handling in programming is the process of responding to and managing errors that occur during the execution of a program.

Why is Error Handling Important?

Error handling is important because it helps to ensure that your program can continue to function (or fail gracefully) even when unexpected conditions occur.

Errors can occur for a variety of reasons, such as user input that the program doesn't know how to handle, system resources being unavailable, or unexpected conditions in the program's logic.

Try...Catch Statements
Error handling is typically done using try...catch statements:

JAVASCRIPT

try {
  // Code that may throw an error
} catch (error) {
  // Code to handle the error
}
In the try block, you write the code that may throw an error. In the catch block, you write the code to handle the error. The error object that is passed to the catch block contains information about the error, such as its name and message.

JAVASCRIPT
Run
Playground

try {
  let x = y; // y is not defined, so an error is thrown
} catch (error) {
  console.log(error.message);
}
Output

Visualize
No output yet.
y is not defined, so when we try to assign its value to x, an error is thrown. The catch block catches this error and logs its message to the console.

Finally Block
There's also a finally block that can be added after catch, which will be executed regardless of whether an error was thrown or caught:

JAVASCRIPT

try {
  // Code that may throw an error
} catch (error) {
  // Code to handle the error
} finally {
  // Code to be executed regardless of an error
}
Throwing Errors
Throwing errors in programming is a way to handle unexpected or exceptional conditions. It allows a function to indicate that it is unable to proceed with its normal execution, and gives control back to the part of the program that called the function.

In many programming languages, you can "throw" an error (or "raise" an exception) with a throw statement.

JAVASCRIPT

function divide(a, b) {
  if (b === 0) {
    throw new Error("Division by zero is not allowed");
  }
  return a / b;
}
If the function divide is called with the second argument as 0, it will throw an error. The calling code can then "catch" this error and handle it appropriately.

Custom Error Types
Creating custom error types can be useful when you want to throw and catch errors that represent specific conditions in your program. This allows you to handle different types of errors in different ways.

Here's an example of how you can define and use a custom error type:

JAVASCRIPT
Run
Playground

class DivisionByZeroError extends Error {
  constructor() {
    super("Division by zero is not allowed");
    this.name = "DivisionByZeroError";
  }
}

function divide(a, b) {
  if (b === 0) {
    throw new DivisionByZeroError();
  }
  return a / b;
}

try {
  console.log(divide(1, 0));
} catch (error) {
  if (error instanceof DivisionByZeroError) {
    console.log(error.message);
  } else {
    throw error;
  }
}
Output

Visualize
No output yet.
DivisionByZeroError is a custom error type that extends the built-in Error type. When divide is called with 0 as the second argument, it throws a DivisionByZeroError. The try/catch block then catches this error and handles it by logging the error message to the console.

Error Propagation
Error propagation refers to the process by which errors (or exceptions) are passed up the call stack from where they were thrown until they are caught by an appropriate error handler.

In many programming languages, when an error is thrown and not immediately caught within the same function or method, it propagates up to the calling function. This continues until the error is either caught and handled, or it reaches the top level of the call stack, at which point the program typically crashes with an unhandled exception error.

Here's an example in JavaScript:

JAVASCRIPT
Run
Playground

function function1() {
  function2();
}

function function2() {
  throw new Error("An error occurred");
}

try {
  function1();
} catch (error) {
  console.log("Caught an error: " + error.message);
}
Output

Visualize
No output yet.
function2 throws an error. Since it's not caught within function2, it propagates up to function1. Again, it's not caught there, so it propagates up to the top level, where it is finally caught in the try/catch block.

Asynchronous Error Handling
Asynchronous error handling is a bit different from synchronous error handling. In asynchronous programming, because the operations are not blocking, errors can't be caught with a simple try/catch block.

There are a few ways to handle errors in asynchronous code:

Callbacks: The most traditional way is to use a callback function that takes an error as its first argument.
JAVASCRIPT

fs.readFile('nonexistent-file.txt', function(err, data) {
  if (err) {
    console.error('There was an error reading the file!', err);
    return;
  }
  // Otherwise handle the data
});
Promises: Promises have .catch method to handle any errors that might have occurred in the promise chain.
JAVASCRIPT

doSomething()
  .then(result => doSomethingElse(result))
  .then(newResult => doAnotherThing(newResult))
  .catch(error => console.error(error));
Async/Await: With async/await, you can use a try/catch block to handle errors, which can make your asynchronous code look and behave a little more like synchronous code.
JAVASCRIPT

async function doSomethingAsync() {
  try {
    const result = await doSomething();
    const newResult = await doSomethingElse(result);
    await doAnotherThing(newResult);
  } catch (error) {
    console.error(error);
  }
}
In all these cases, the key is to make sure that any function that might throw an error is properly handled to prevent the error from propagating up and crashing your program.

## Debugging

Debugging is the process of identifying, isolating, and fixing problems or "bugs" in computer code. It involves running the program and using various tools and techniques to understand why the program is not behaving as expected

console.log
The console.log() function is quite versatile and can be used in several ways to aid in debugging and understanding your code. Here are some examples:

Logging variable values: The most common use of console.log() is to print the value of a variable.
JAVASCRIPT
Run
Playground

let x = 10;
console.log(x);
Output

Visualize
No output yet.
Logging multiple values: You can pass multiple arguments to console.log() to print them all.
JAVASCRIPT
Run
Playground

let x = 10;
let y = 20;
console.log(x, y);
Output

Visualize
No output yet.
String substitution: console.log() supports string substitution, similar to printf in C.
JAVASCRIPT
Run
Playground

let name = 'Alice';
console.log('Hello, %s', name);
Output

Visualize
No output yet.
Logging objects: You can log entire objects, and console.log() will format them nicely.
JAVASCRIPT
Run
Playground

let obj = {a: 1, b: 2, c: 3};
console.log(obj);
Output

Visualize
No output yet.
Logging arrays: Similarly, you can log entire arrays.
JAVASCRIPT
Run
Playground

let arr = [1, 2, 3, 4, 5];
console.log(arr);
Output

Visualize
No output yet.
Remember, excessive use of console.log() can slow down your application, especially when logging large objects or arrays. It's a good practice to remove or comment out console.log() statements once you're done debugging.

Caution

Remember to remove or comment out the `console.log()` statements once you're done debugging, as they can slow down your code and you typically don't want to output debug information in a production environment.

console.info
The console.info() method is used to output an informational message to the Web Console. In many environments, it behaves the same way as console.log().

Here's an example of how you can use console.info():

JAVASCRIPT
Run
Playground

console.info('This is an informational message');
Output

Visualize
No output yet.
When you run this code, it will output the string "This is an informational message" to the console.

In some browsers, the output of console.info() might be styled differently from console.log() to indicate that it's an informational message. However, in many environments, including Node.js and many modern browsers, console.info() and console.log() behave the same way.

console.warn
Used to output a warning message to the Web Console. It's similar to console.log(), but in many environments, the output is styled differently to indicate that it's a warning.

JAVASCRIPT
Run
Playground

console.warn('This is a warning message');
Output

Visualize
No output yet.
When you run this code, it will output the string "This is a warning message" to the console. In many browsers, this message will be displayed with a yellow warning icon and a yellow text background to distinguish it from regular console log messages.

This method is useful for logging messages that indicate potential problems in your code that aren't severe enough to throw an error.

console.error
Output an error message to the Web Console. In some environments, the output is styled differently to indicate that it's an error.

Here's an example of how you can use console.error():

JAVASCRIPT
Run
Playground

console.error('This is an error message');
Output

Visualize
No output yet.
Useful for logging error messages that help in debugging your code. It does not throw an error or stop the execution of the function. It simply outputs the message to the console.

console.table
Display data in a table format in the console. It's particularly useful when working with arrays or objects.

JAVASCRIPT
Run
Playground

let people = [
  { name: 'Alice', age: 20 },
  { name: 'Bob', age: 25 },
  { name: 'Charlie', age: 30 }
];

console.table(people);
Output

Visualize
No output yet.
The console.table() method can make it easier to visualize and understand complex data structures. It automatically provides an index column, and uses the keys of your objects as the column names.

console.group
I group together related log messages. When you call console.group(), it starts a new group in the console. All subsequent console messages will be added to this group, until you call console.groupEnd(), which ends the group.

JAVASCRIPT
Run
Playground

const array = [1, 2, 3, 4, 5];
console.group('Processing array');
console.log('Array has', array.length, 'elements');
console.log('First element:', array[0]);
console.groupEnd();
Output

Visualize
No output yet.
The messages inside the group are indented to show that they're part of the group. This can make it easier to understand the flow of complex code with many log messages.

You can also create nested groups by calling console.group() multiple times before calling console.groupEnd(). Each call to console.groupEnd() ends the most recently started group that hasn't already been ended.

console.count
Log the number of times that this particular call to console.count() has been invoked. It takes an optional argument label. If provided, console.count() outputs the count and label. If label is omitted, the console uses 'default' as the label.

JAVASCRIPT
Run
Playground

for(let i = 0; i < 5; i++) {
  console.count('Loop counter');
}
Output

Visualize
No output yet.
This method is useful when you want to know how many times a particular part of your code has been executed.

console.time
console.time is used in conjunction with console.timeEnd() to measure the time taken by a block of code to execute. It's a simple and effective way to benchmark your code.

JAVASCRIPT
Run
Playground

console.time('Array processing');

// Some array processing to measure
let array = [];
for(let i = 0; i < 1000000; i++) {
  array.push(i);
}

console.timeEnd('Array processing');
Output

Visualize
No output yet.
The string you pass to console.time() and console.timeEnd() is used as the label for the timer. The timer starts when you call console.time() and stops when you call console.timeEnd(). The elapsed time, in milliseconds, is then output to the console.

console.trace
console.trace() is used to output a stack trace to the console. A stack trace is a report of the active stack frames at a certain point in time during the execution of a program. It can be very useful for debugging, as it shows the execution path your code has taken to reach a certain point.

JAVASCRIPT

function firstFunction() {
  secondFunction();
}

function secondFunction() {
  thirdFunction();
}

function thirdFunction() {
  console.trace();
}

firstFunction();
When you run this code, it will output a stack trace to the console that shows that firstFunction called secondFunction, which called thirdFunction, which is where the trace was output.

The output will look something like this:

Code

thirdFunction
secondFunction
firstFunction
This shows the order in which the functions were called. The function at the top of the list is the current function (where console.trace() was called), and the function at the bottom is the first function that was called.

console.assert
This method is used to write a message to the console if the assertion is false. If the assertion is true, nothing happens.

JAVASCRIPT
Run
Playground

console.assert(1 === 2, '1 is not equal to 2');
Output

Visualize
No output yet.
When you run this code, it will output the string "1 is not equal to 2" to the console, because the assertion (1 === 2) is false. If the assertion was true, console.assert() would do nothing.

Debugger Statement
The debugger statement is used to pause execution and start a debugging session. When the JavaScript interpreter encounters a debugger statement, and if the developer console is open in your browser or if the code is running in a debugging environment (like Node.js with a debugger attached), the execution of the code will pause at the debugger statement.

Here's an example of how you can use the debugger statement:

JAVASCRIPT

function potentiallyBuggyFunction() {
  let obj = { a: 1, b: 2 };

  // Insert debugger statement
  debugger;

  // Rest of the function
  obj.c = obj.a + obj.b;
  return obj.c;
}

potentiallyBuggyFunction();
When you run this code with the developer console open, the execution will pause at the debugger statement. You can then step through the rest of the function, inspect variables, and so on.

Caution

Remember to remove `debugger` statements once you're done debugging, as leaving them in can cause your code to pause unexpectedly if run with a debugger attached.

Unit Testing
Unit testing is a software testing method where individual units of source code—sets of one or more computer program modules together with associated control data, usage procedures, and operating procedures—are tested to determine whether they are fit for use.

In the context of programming, a unit could be an entire module, but it is more commonly an individual function or procedure. The purpose of unit testing is to isolate each part of the program and verify that the individual parts are working correctly.

Here's an example of a simple unit test using the Jest testing framework:

JAVASCRIPT

const sum = require('./sum');

test('adds 1 + 2 to equal 3', () => {
  expect(sum(1, 2)).toBe(3);
});
The sum function is being tested to ensure that it correctly adds two numbers together. The test function is used to define a test, and the expect and toBe functions are used to define what the expected output should be.

Unit tests are typically automated and run by a CI/CD system whenever changes are made to the codebase, ensuring that regressions are caught and fixed as early as possible.

## Map

Javascript Map Object

A Map is a built in object that holds key-value pairs. It can hold a key of any data type unlike in plain objects. It maintains the insertion order and provides helpers to manage key-value pairs.

Creating a Map
Creates an empty Map instance.

JAVASCRIPT
Run
Playground

const map = new Map()
console.log(map.size)
Output

Visualize
No output yet.
Initializing a Map
You can initialize a Map with an array of key-value pairs.

JAVASCRIPT
Run
Playground

const map = new Map([
  ['id', 1], // key: 'id', value: 1
  ['name', 'Alice'], // key: 'name', value: 'Alice'
])
console.log(map.size)
Output

Visualize
No output yet.
Map Size
size property returns the number of key-value pairs in a map. It returns a number.

JAVASCRIPT
Run
Playground

const map = new Map([
  ['id', 1],
  ['name', 'Alice'],
])
console.log(map.size)
Output

Visualize
No output yet.
Map Set
The set(key, value) method adds a key-value pair. If a key exists already, the value will be updated. set() affects the size of a map.

JAVASCRIPT
Run
Playground

const map = new Map([
  ['id', 1],
  ['name', 'Alice'],
])
map.set('age', 50)
map.set(2, 200)
map.set('id', 2)

console.log(map.size)
Output

Visualize
No output yet.
You can also chain set like map.set(key, value).set(key, value)

Map Get
The get(key) retrieves the value of the specified key. If a key exists, its value will be returned otherwise undefined.

JAVASCRIPT
Run
Playground

const map = new Map([
  ['id', 1],
  ['name', 'Alice'],
  ['age', 50],
])
console.log(map.get('age'))
console.log(map.get('none'))
Output

Visualize
No output yet.
Map Has
The has(key) returns a boolean by checking the key existence.

JAVASCRIPT
Run
Playground

const map = new Map([
  ['id', 1],
  ['name', 'Alice'],
])
console.log(map.has('id'))
console.log(map.has('none'))
Output

Visualize
No output yet.
Map Delete
The delete(key) method removes the key-value pair with the specified key. It returns true if the key exists, otherwise false. delete() affects the size of a map.

JAVASCRIPT
Run
Playground

const map = new Map([
  ['id', 1],
  ['name', 'Alice'],
  ['age', 50],
  [2, 200],
])
console.log(map.delete('age'))
console.log(map.delete('none'))
console.log(map.size)
Output

Visualize
No output yet.
Map Clear
The clear method removes all key-value pairs from the map. clear affects the size of a map.

JAVASCRIPT
Run
Playground

const map = new Map([
  ['id', 1],
  ['name', 'Alice'],
])
map.clear()
console.log(map.size)
Output

Visualize
No output yet.
Iterate Map using for ... of
You can directly iterate using for ... of over each key-value pair.

JAVASCRIPT
Run
Playground

const map = new Map()
map.set('name', 'Bob').set('age', 20)
for (const [key, value] of map) {
  console.log(`${key}: ${value}`)
}
Output

Visualize
No output yet.
Iterate Map using keys()
You can iterate over the map keys using keys() method as in the order it was inserted.

JAVASCRIPT
Run
Playground

const map = new Map()
map.set('name', 'Bob').set('age', 20)
for (const key of map.keys()) {
  console.log(`${key}`)
}
Output

Visualize
No output yet.
Iterate Map using values()
You can iterate over the map values using values() method as in the order it was inserted.

JAVASCRIPT
Run
Playground

const map = new Map()
map.set('name', 'Bob').set('age', 20)
for (const value of map.values()) {
  console.log(`${value}`)
}
Output

Visualize
No output yet.
Iterate Map using entries()
You can iterate over the map's key-value pair using entries() method as in the order it was inserted.

JAVASCRIPT
Run
Playground

const map = new Map()
map.set('name', 'Bob').set('age', 20)
for (let [key, value] of map.entries()) {
  console.log(`${key}: ${value}`)
}
Output

Visualize
No output yet.

## Set

Sets are commonly used in scenarios where you need to work with collections of unique elements.

From the MDN Web Docs

The Set object lets you store unique values of any type, whether primitive values or object references.

Common Use Cases
Removing duplicates from an array
Since a Set automatically removes duplicates, you can convert an array to a Set and back to an array to remove duplicate elements.

JAVASCRIPT
Run
Playground

let array = [1, 2, 2, 3, 4, 4, 5];
let uniqueArray = [...new Set(array)];
console.log(uniqueArray);
Output

Visualize
No output yet.
Membership check
Checking if an element exists in a Set is faster and more efficient than checking if it exists in an array.

JAVASCRIPT
Run
Playground

let mySet = new Set([1, 2, 3, 4, 5]);
console.log(mySet.has(3));
Output

Visualize
No output yet.
Set operations
You can perform operations like union, intersection, difference, and symmetric difference on Sets, similar to mathematical set operations.

Remember!

Sets only store unique values, so they are not suitable for cases where duplicate values are important.

Set Declaration
A Set is declared using the new Set() constructor. You can optionally pass an iterable (like an array) to the constructor to initialize the Set with values.

JAVASCRIPT
Run
Playground

// Declare an empty Set
let set1 = new Set();

// Declare a Set with initial values
let set2 = new Set([1, 2, 3, 4, 5]);

console.log([...set1]);
console.log([...set2]);
Output

Visualize
No output yet.
set1 is an empty Set, and set2 is a Set initialized with the values 1, 2, 3, 4, and 5. Note that Sets automatically remove duplicate values, so each value in a Set is unique.

Checking if a Value Exists
You can check if a value exists in a Set using the has method. The has method returns a boolean indicating whether the value exists in the Set:

JAVASCRIPT
Run
Playground

let mySet = new Set([1, 2, 3, 4, 5]);

console.log(mySet.has(1));
console.log(mySet.has(6));
Output

Visualize
No output yet.
mySet is a Set initialized with the values 1, 2, 3, 4, and 5. The has method is used to check if the values 1 and 6 exist in the Set.

Adding and Deleting Values
Add and delete values in a Set using the add and delete methods respectively.

Adding Values
You can add a value to a Set using the add method. The add method appends a new element with a specified value to the end of a Set object.

JAVASCRIPT
Run
Playground

let mySet = new Set();

mySet.add(1);
mySet.add(2);
mySet.add(3);

console.log([...mySet]);
Output

Visualize
No output yet.
Here, we're adding the values 1, 2, and 3 to the Set mySet.

Deleting Values
You can delete a value from a Set using the delete method. The delete method removes the specified element from a Set.

JAVASCRIPT
Run
Playground

let mySet = new Set([1, 2, 3]);

mySet.delete(2);

console.log([...mySet]);
Output

Visualize
No output yet.
We're deleting the value 2 from the Set mySet.

Getting the Size of a Set
Get the size (number of elements) of a Set using the size property.

JAVASCRIPT
Run
Playground

let mySet = new Set([1, 2, 3, 4, 5]);

console.log(mySet.size);
Output

Visualize
No output yet.
mySet is a Set initialized with the values 1, 2, 3, 4, and 5. The size property is used to get the number of elements in the Set.

Iterating Over a Set
You can iterate over a Set using several methods:

For...of loop: Iterate over the values in a Set.
JAVASCRIPT
Run
Playground

let mySet = new Set([1, 2, 3, 4, 5]);

for (let value of mySet) {
  console.log(value);
}
Output

Visualize
No output yet.
forEach method: This allows you to execute a function for each value in a Set.
JAVASCRIPT
Run
Playground

let mySet = new Set([1, 2, 3, 4, 5]);

mySet.forEach(function(value) {
  console.log(value);
});
Output

Visualize
No output yet.
Spread operator: Convert a Set into an Array, which can be useful for iteration.
JAVASCRIPT
Run
Playground

let mySet = new Set([1, 2, 3, 4, 5]);
let array = [...mySet];

array.forEach(function(value) {
  console.log(value);
});
Output

Visualize
No output yet.
In each of these examples, we're iterating over the Set mySet and logging each value to the console.

Clearing a Set
In JavaScript, you can clear all values from a Set using the clear method.

JAVASCRIPT
Run
Playground

let mySet = new Set([1, 2, 3, 4, 5]);

console.log(mySet.size);

mySet.clear();

console.log(mySet.size);
Output

Visualize
No output yet.
mySet is a Set initialized with the values 1, 2, 3, 4, and 5. The clear method is used to remove all values from the Set. After clearing, the size of the Set is 0.

In JavaScript, you can perform set operations like union, intersection, difference, and symmetric difference using Sets. Here's how you can do it:

Set Union
The union of two sets is a set of all elements from both sets. You can get the union of two sets by creating a new Set from the concatenation of the two sets.

JAVASCRIPT
Run
Playground

let setA = new Set([1, 2, 3]);
let setB = new Set([3, 4, 5]);

let union = new Set([...setA, ...setB]);
console.log([...union]);
Output

Visualize
No output yet.
Set Intersection
The intersection of two sets is a set of elements that are common to both sets. You can get the intersection of two sets by filtering one set for elements that also exist in the other set.

JAVASCRIPT
Run
Playground

let setA = new Set([1, 2, 3]);
let setB = new Set([3, 4, 5]);

let intersection = new Set([...setA].filter(x => setB.has(x)));
console.log([...intersection]);
Output

Visualize
No output yet.
Set Difference
The difference of two sets is a set of elements that exist in the first set but not in the second set. You can get the difference of two sets by filtering the first set for elements that do not exist in the second set.

JAVASCRIPT
Run
Playground

let setA = new Set([1, 2, 3]);
let setB = new Set([3, 4, 5]);

let difference = new Set([...setA].filter(x => !setB.has(x)));
console.log([...difference]);
Output

Visualize
No output yet.
Set Symmetric Difference
The symmetric difference of two sets is a set of elements that exist in either of the two sets but not in their intersection. You can get the symmetric difference of two sets by getting the union of the two sets and then filtering out the intersection.

JAVASCRIPT
Run
Playground

let setA = new Set([1, 2, 3]);
let setB = new Set([3, 4, 5]);

let union = new Set([...setA, ...setB]);
let intersection = new Set([...setA].filter(x => setB.has(x)));

let symmetricDifference = new Set([...union].filter(x => !intersection.has(x)));
console.log([...symmetricDifference]);
Output

Visualize
No output yet.


## String Manipulation

Manipulating Strings

String manipulation refers to the process of changing, parsing, slicing, or analyzing strings in various ways.

Concat
The concat method is used to join two or more strings together. This method does not change the existing strings, but returns a new string containing the text of the joined strings.

JAVASCRIPT
Run
Playground

let str1 = "Hello, ";
let str2 = "World!";
let result = str1.concat(str2);

console.log(result);
Output

Visualize
No output yet.
str1 and str2 are two strings. The concat method is called on str1 with str2 as the argument, resulting in a new string that is the concatenation of str1 and str2. The new string is stored in the result variable.

CharAt
charAt method is used to get the character at a specific index in a string. The index of the first character is 0, the second character is 1, and so on.

JAVASCRIPT
Run
Playground

let str = "Hello, World!";
let char = str.charAt(7);

console.log(char);
Output

Visualize
No output yet.
Here, str is a string. The charAt method is called on str with 7 as the argument, which corresponds to the 8th character in the string (since the index is 0-based). The character at this index is "W", so "W" is stored in the char variable and then logged to the console.

Includes
The includes method is used to determine whether one string can be found within another string, returning true or false as appropriate. It performs a case-sensitive search.

JAVASCRIPT
Run
Playground

let str = "Hello, World!";
let result = str.includes("World");

console.log(result);
Output

Visualize
No output yet.
str is a string. The includes method is called on str with "World" as the argument. Since "World" is a substring of str, the includes method returns true, which is stored in the result variable and then logged to the console.

IndexOf
indexOf method is used to determine the first occurrence of a specified value in a string. It returns the index of the value if found, or -1 if the value is not found. The search is case-sensitive.

JAVASCRIPT
Run
Playground

let str = "Hello, World!";
let index = str.indexOf("World");

console.log(index);
Output

Visualize
No output yet.
str is a string. The indexOf method is called on str with "World" as the argument. Since "World" is a substring of str and starts at index 7, the indexOf method returns 7, which is stored in the index variable and then logged to the console.

Slice
The slice method is used to extract a section of a string and returns it as a new string, without modifying the original string. The method takes two parameters: the start index (inclusive), and the end index (exclusive).

JAVASCRIPT
Run
Playground

let str = "Hello, World!";
let slicedStr = str.slice(7, 12);

console.log(slicedStr);
Output

Visualize
No output yet.
Here, str is a string. The slice method is called on str with 7 as the start index and 12 as the end index. This extracts the substring starting from the 8th character up to (but not including) the 13th character. The resulting substring "World" is stored in the slicedStr variable and then logged to the console.

Split
The split method is used to divide a string into an array of substrings. It takes a separator as an argument, which specifies the character(s) to use for separating the string. If the separator is not provided, the entire string will be returned as a single element in an array.

JAVASCRIPT
Run
Playground

let str = "Hello, World!";
let array = str.split(", ");

console.log(array);
Output

Visualize
No output yet.
str is a string. The split method is called on str with ", " as the separator. This divides the string into two substrings "Hello" and "World!", which are returned as elements in an array. The array is stored in the array variable and then logged to the console.

Replace
The replace method is used to replace a specified value with another value in a string. It returns a new string with some or all matches of a pattern replaced by a replacement. The original string is not modified.

JAVASCRIPT
Run
Playground

let str = "Hello, World!";
let newStr = str.replace("World", "Universe");

console.log(newStr);
Output

Visualize
No output yet.
str is a string. The replace method is called on str with "World" as the pattern to be replaced and "Universe" as the replacement. This results in a new string "Hello, Universe!", which is stored in the newStr variable and then logged to the console.

ToLowerCase
The toLowerCase method is used to convert a string to lowercase letters. This method does not change the original string, but returns a new string where all the uppercase characters are converted to lowercase.

JAVASCRIPT
Run
Playground

let str = "Hello, World!";
let lowerCaseStr = str.toLowerCase();

console.log(lowerCaseStr);
Output

Visualize
No output yet.
str is a string. The toLowerCase method is called on str, resulting in a new string where all the uppercase characters are converted to lowercase. The new string is stored in the lowerCaseStr variable and then logged to the console.

ToUpperCase
The toUpperCase method is used to convert a string to uppercase letters. This method does not change the original string, but returns a new string where all the lowercase characters are converted to uppercase.

Here's an example of how to use the toUpperCase method:

JAVASCRIPT
Run
Playground

let str = "Hello, World!";
let upperCaseStr = str.toUpperCase();

console.log(upperCaseStr);
Output

Visualize
No output yet.
str is a string. The toUpperCase method is called on str, resulting in a new string where all the lowercase characters are converted to uppercase. The new string is stored in the upperCaseStr variable and then logged to the console.

Trim
The trim method is used to remove whitespace from both ends of a string. This method does not change the original string, but returns a new string with the whitespace removed.

JAVASCRIPT
Run
Playground

let str = "   Hello, World!   ";
let trimmedStr = str.trim();

console.log(trimmedStr);
Output

Visualize
No output yet.
str is a string with leading and trailing whitespace. The trim method is called on str, resulting in a new string where the whitespace at both ends is removed. The new string is stored in the trimmedStr variable and then logged to the console.

TrimLeft and TrimRight
trimLeft and trimRight methods are used to remove whitespace from the beginning and end of a string respectively. These methods do not change the original string, but return a new string with the whitespace removed.

JAVASCRIPT
Run
Playground

let str = "   Hello, World!   ";
let trimmedLeftStr = str.trimLeft();
let trimmedRightStr = str.trimRight();

console.log(trimmedLeftStr);
console.log(trimmedRightStr);
Output

Visualize
No output yet.
In this example, str is a string with leading and trailing whitespace. The trimLeft method is called on str, resulting in a new string where the whitespace at the beginning is removed. Similarly, the trimRight method is called on str, resulting in a new string where the whitespace at the end is removed. The new strings are stored in the trimmedLeftStr and trimmedRightStr variables and then logged to the console.

## String Formatting

Template Literals
Template literals (also known as template strings) are string literals allowing embedded expressions. You can use multi-line strings and string interpolation features with them. They were introduced in ECMAScript 6.

From the MDN Web Docs

Template literals are literals delimited with backtick (`) characters, allowing for multi-line strings, string interpolation with embedded expressions, and special constructs called tagged templates.

Template literals can contain placeholders, indicated by the dollar sign and curly braces (${expression}). The expressions in the placeholders and the text between them get passed to a function.

JAVASCRIPT
Run
Playground

let name = "John";
let age = 30;
let greeting = `Hello, my name is ${name} and I am ${age} years old.`;

console.log(greeting);
Output

Visualize
No output yet.
Here, name and age are variables. The template literal is defined using backticks, and the variables are embedded in the string using ${} syntax. The resulting string is stored in the greeting variable and then logged to the console.

String Concatenation
String concatenation is the operation of joining two or more strings together. This can be achieved using the + operator or the concat method.

Using the + Operator
Here's an example of string concatenation using the + operator:

JAVASCRIPT
Run
Playground

let str1 = "Hello, ";
let str2 = "World!";
let result = str1 + str2;

console.log(result);
Output

Visualize
No output yet.
str1 and str2 are strings. The + operator is used to concatenate str1 and str2 together. The resulting string is stored in the result variable and then logged to the console.

Using the concat Method
Here's an example of string concatenation using the concat method:

JAVASCRIPT
Run
Playground

let str1 = "Hello, ";
let str2 = "World!";
let result = str1.concat(str2);

console.log(result);
Output

Visualize
No output yet.
str1 and str2 are strings. The concat method is called on str1 with str2 as the argument, concatenating str1 and str2 together. The resulting string is stored in the result variable and then logged to the console.

The recommended way
The recommended way to format strings in JavaScript is by using Template Literals (Template Strings) introduced in ECMAScript 6 (ES6). Template literals allow you to embed expressions, create multi-line strings, and use string interpolation features, making them a powerful tool for string formatting.




## Extra Sources

- https://www.javascriptcheatsheet.org/cheatsheet/basics

- https://github.com/mbeaudru/modern-js-cheatsheet



> ⚠️ Note: This content is for educational and personal reference purposes only.
> The original source is shown at the top of the document.
>
> All rights and copyrights belong to their respective owners.
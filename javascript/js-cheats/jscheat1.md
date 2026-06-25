# JavaScript Cheat Sheet

> Source: [quickref.me/javascript](https://quickref.me/javascript)

(some parts may be modified or removed)
 
---

- [JavaScript Cheat Sheet](#javascript-cheat-sheet)
  - [Getting Started](#getting-started)
    - [Console](#console)
    - [Numbers](#numbers)
    - [Variables](#variables)
    - [Strings](#strings)
    - [Arithmetic Operators](#arithmetic-operators)
    - [Comments](#comments)
    - [Assignment Operators](#assignment-operators)
    - [String Interpolation](#string-interpolation)
    - [let Keyword](#let-keyword)
    - [const Keyword](#const-keyword)
  - [Conditionals](#conditionals)
    - [if Statement](#if-statement)
    - [Ternary Operator](#ternary-operator)
    - [Logical Operator ||](#logical-operator-)
    - [Logical Operator \&\&](#logical-operator--1)
    - [Comparison Operators](#comparison-operators)
    - [Logical Operator !](#logical-operator--2)
    - [Nullish Coalescing Operator ??](#nullish-coalescing-operator-)
    - [else if](#else-if)
    - [switch Statement](#switch-statement)
    - [== vs ===](#-vs-)
  - [Functions](#functions)
    - [Function Declaration](#function-declaration)
    - [Anonymous Functions](#anonymous-functions)
    - [Arrow Functions (ES6)](#arrow-functions-es6)
    - [Function Parameters \& Return](#function-parameters--return)
    - [Function Expressions](#function-expressions)
  - [Scope](#scope)
    - [Block Scoped Variables](#block-scoped-variables)
    - [Global Variables](#global-variables)
    - [let vs var](#let-vs-var)
    - [Loops with Closures](#loops-with-closures)
  - [Arrays](#arrays)
    - [Array Basics](#array-basics)
    - [Mutable Methods](#mutable-methods)
    - [.push() / .pop()](#push--pop)
    - [.shift() / .unshift()](#shift--unshift)
    - [.concat()](#concat)
  - [Loops](#loops)
    - [while Loop](#while-loop)
    - [do...while Statement](#dowhile-statement)
    - [for Loop](#for-loop)
    - [Reverse Loop](#reverse-loop)
    - [break / continue](#break--continue)
    - [for...in (index)](#forin-index)
    - [for...of (value)](#forof-value)
  - [Iterators](#iterators)
    - [Callback Functions](#callback-functions)
    - [.forEach()](#foreach)
    - [.map()](#map)
    - [.filter()](#filter)
    - [.reduce()](#reduce)
  - [Objects](#objects)
    - [Accessing Properties](#accessing-properties)
    - [Mutable Object](#mutable-object)
    - [Destructuring (Shorthand)](#destructuring-shorthand)
    - [delete Operator](#delete-operator)
    - [Shorthand Object Creation](#shorthand-object-creation)
    - [this Keyword](#this-keyword)
    - [Factory Functions](#factory-functions)
    - [Getters and Setters](#getters-and-setters)
  - [Classes](#classes)
    - [Class Definition](#class-definition)
    - [Static Methods](#static-methods)
    - [extends (Inheritance)](#extends-inheritance)
  - [Modules](#modules)
    - [ES Modules (import/export)](#es-modules-importexport)
    - [CommonJS (Node.js)](#commonjs-nodejs)
  - [Promises](#promises)
    - [Promise States](#promise-states)
    - [.then() / .catch()](#then--catch)
    - [Promise.all()](#promiseall)
    - [Chaining .then()](#chaining-then)
  - [Async / Await](#async--await)
    - [async Function](#async-function)
    - [Error Handling](#error-handling)
    - [Async + Fetch](#async--fetch)
  - [HTTP Requests](#http-requests)
    - [XMLHttpRequest (GET)](#xmlhttprequest-get)
    - [XMLHttpRequest (POST)](#xmlhttprequest-post)
    - [Fetch API](#fetch-api)
    - [Fetch + async/await](#fetch--asyncawait)


## Getting Started

### Console

```javascript
// => Hello world!
console.log('Hello world!');

// => Hello QuickRef.ME
console.warn('hello %s', 'QuickRef.ME');

// Prints error message to stderr
console.error(new Error('Oops!'));
```

### Numbers

```javascript
let amount = 6;
let price = 4.99;
```

### Variables

```javascript
let x = null;
let name = "Tammy";
const found = false;

// => Tammy, false, null
console.log(name, found, x);

var a;
console.log(a); // => undefined
```

### Strings

```javascript
let single = 'Wheres my bandit hat?';
let double = "Wheres my bandit hat?";

// => 21
console.log(single.length);
```

### Arithmetic Operators

```javascript
5 + 5 = 10     // Addition
10 - 5 = 5     // Subtraction
5 * 10 = 50    // Multiplication
10 / 5 = 2     // Division
10 % 5 = 0     // Modulo
```

### Comments

```javascript
// This line will denote a comment

/*
The below configuration must be
changed before deployment.
*/
```

### Assignment Operators

```javascript
let number = 100;

// Both statements will add 10
number = number + 10;
number += 10;

console.log(number); // => 120
```

### String Interpolation

```javascript
let age = 7;

// String concatenation
'Tommy is ' + age + ' years old.';

// String interpolation
`Tommy is ${age} years old.`;
```

### let Keyword

```javascript
let count;
console.log(count); // => undefined
count = 10;
console.log(count); // => 10
```

### const Keyword

```javascript
const numberOfColumns = 4;

// TypeError: Assignment to constant...
numberOfColumns = 8;
```

---

## Conditionals

### if Statement

```javascript
const isMailSent = true;

if (isMailSent) {
  console.log('Mail sent to recipient');
}
```

### Ternary Operator

```javascript
var x = 1;

// => true
result = (x == 1) ? true : false;
```

### Logical Operator ||

```javascript
true || false;       // true
10 > 5 || 10 > 20;   // true
false || false;      // false
10 > 100 || 10 > 20; // false
```

### Logical Operator &&

```javascript
true && true;        // true
1 > 2 && 2 > 1;      // false
true && false;       // false
4 === 4 && 3 > 1;    // true
```

### Comparison Operators

```javascript
1 > 3                // false
3 > 1                // true
250 >= 250           // true
1 === 1              // true
1 === 2              // false
1 === '1'            // false
```

### Logical Operator !

```javascript
let lateToWork = true;
let oppositeValue = !lateToWork;

// => false
console.log(oppositeValue);
```

### Nullish Coalescing Operator ??

```javascript
null ?? 'I win';           //  'I win'
undefined ?? 'Me too';     //  'Me too'

false ?? 'I lose'          //  false
0 ?? 'I lose again'        //  0
'' ?? 'Damn it'            //  ''
```

### else if

```javascript
const size = 10;

if (size > 100) {
  console.log('Big');
} else if (size > 20) {
  console.log('Medium');
} else if (size > 4) {
  console.log('Small');
} else {
  console.log('Tiny');
}
// Print: Small
```

### switch Statement

```javascript
const food = 'salad';

switch (food) {
  case 'oyster':
    console.log('The taste of the sea');
    break;
  case 'pizza':
    console.log('A delicious pie');
    break;
  default:
    console.log('Enjoy your meal');
}
```

### == vs ===

```javascript
0 == false         // true
0 === false        // false, different type
1 == "1"           // true,  automatic type conversion
1 === "1"          // false, different type
null == undefined  // true
null === undefined // false
'0' == false       // true
'0' === false      // false
```

> `==` sadece değeri karşılaştırır, `===` hem değeri hem de tipi karşılaştırır.

---

## Functions

### Function Declaration

```javascript
function add(num1, num2) {
  return num1 + num2;
}
```

### Anonymous Functions

```javascript
// Named function
function rocketToMars() {
  return 'BOOM!';
}

// Anonymous function
const rocketToMars = function() {
  return 'BOOM!';
}
```

### Arrow Functions (ES6)

```javascript
// With two arguments
const sum = (param1, param2) => {
  return param1 + param2;
};

// With no arguments
const printHello = () => {
  console.log('hello');
};

// With a single argument
const checkWeight = weight => {
  console.log(`Weight : ${weight}`);
};

// Concise (implicit return)
const multiply = (a, b) => a * b;
```

### Function Parameters & Return

```javascript
function sayHello(name) {
  return `Hello, ${name}!`;
}
```

### Function Expressions

```javascript
const dog = function() {
  return 'Woof!';
}
```

---

## Scope

### Block Scoped Variables

```javascript
const isLoggedIn = true;

if (isLoggedIn == true) {
  const statusMessage = 'Logged in.';
}

// Uncaught ReferenceError...
console.log(statusMessage);
```

### Global Variables

```javascript
const color = 'blue';

function printColor() {
  console.log(color);
}

printColor(); // => blue
```

### let vs var

```javascript
for (let i = 0; i < 3; i++) {
  // i accessible ✔️
}
// i not accessible ❌

for (var i = 0; i < 3; i++) {
  // i accessible ✔️
}
// i accessible ✔️
```

> `var` en yakın **function** bloğuna, `let` en yakın **enclosing** bloğuna scope'lanır.

### Loops with Closures

```javascript
// Prints 3 thrice (wrong!)
for (var i = 0; i < 3; i++) {
  setTimeout(_ => console.log(i), 10);
}

// Prints 0, 1, 2 (correct)
for (let j = 0; j < 3; j++) {
  setTimeout(_ => console.log(j), 10);
}
```

---

## Arrays

### Array Basics

```javascript
const fruits = ["apple", "orange", "banana"];
const data = [1, 'chicken', false];

// Length
fruits.length // 3

// Index access
console.log(fruits[0]); // apple
```

### Mutable Methods

| Method      | Add | Remove | Start | End |
|-------------|-----|--------|-------|-----|
| `push`      | ✔   |        |       | ✔   |
| `pop`       |     | ✔      |       | ✔   |
| `unshift`   | ✔   |        | ✔     |     |
| `shift`     |     | ✔      | ✔     |     |

### .push() / .pop()

```javascript
const cart = ['apple', 'orange'];
cart.push('pear'); // end'e ekler

const fruits = ["apple", "orange", "banana"];
const fruit = fruits.pop(); // 'banana' — end'den çıkarır
```

### .shift() / .unshift()

```javascript
let cats = ['Bob', 'Willy', 'Mini'];
cats.shift(); // ['Willy', 'Mini'] — baştan çıkarır

cats.unshift('Puff', 'George'); // başa ekler
```

### .concat()

```javascript
const numbers = [3, 2, 1];
const newFirstNumber = 4;

[newFirstNumber].concat(numbers) // => [4, 3, 2, 1]
numbers.concat(newFirstNumber)   // => [3, 2, 1, 4]
```

---

## Loops

### while Loop

```javascript
let i = 0;
while (i < 5) {
  console.log(i);
  i++;
}
```

### do...while Statement

```javascript
let x = 0, i = 0;
do {
  x = x + i;
  console.log(x);
  i++;
} while (i < 5);
// => 0 1 3 6 10
```

### for Loop

```javascript
for (let i = 0; i < 4; i += 1) {
  console.log(i);
}
// => 0, 1, 2, 3
```

### Reverse Loop

```javascript
const fruits = ["apple", "orange", "banana"];

for (let i = fruits.length - 1; i >= 0; i--) {
  console.log(`${i}. ${fruits[i]}`);
}
```

### break / continue

```javascript
// break
for (let i = 0; i < 99; i++) {
  if (i > 5) break;
  console.log(i); // => 0 1 2 3 4 5
}

// continue
for (let i = 0; i < 10; i++) {
  if (i === 3) continue;
  console.log(i);
}
```

### for...in (index)

```javascript
const fruits = ["apple", "orange", "banana"];

for (let index in fruits) {
  console.log(index); // => 0, 1, 2
}
```

### for...of (value)

```javascript
const fruits = ["apple", "orange", "banana"];

for (let fruit of fruits) {
  console.log(fruit); // => apple, orange, banana
}
```

---

## Iterators

### Callback Functions

```javascript
const isEven = (n) => n % 2 == 0;

let printMsg = (evenFunc, num) => {
  const isNumEven = evenFunc(num);
  console.log(`${num} is an even number: ${isNumEven}.`);
}

printMsg(isEven, 4); // => The number 4 is an even number: true.
```

### .forEach()

```javascript
const numbers = [28, 77, 45, 99, 27];

numbers.forEach(number => {
  console.log(number);
});
```

### .map()

```javascript
const members = ["Taylor", "Donald", "Don", "Natasha", "Bobby"];

const announcements = members.map(member => {
  return member + " joined the contest.";
});
```

### .filter()

```javascript
const randomNumbers = [4, 11, 42, 14, 39];
const filteredArray = randomNumbers.filter(n => n > 5);
```

### .reduce()

```javascript
const numbers = [1, 2, 3, 4];

const sum = numbers.reduce((accumulator, curVal) => {
  return accumulator + curVal;
});

console.log(sum); // 10
```

---

## Objects

### Accessing Properties

```javascript
const apple = {
  color: 'Green',
  price: { bulk: '$3/kg', smallQty: '$4/kg' }
};

console.log(apple.color);       // => Green
console.log(apple.price.bulk);  // => $3/kg
```

### Mutable Object

```javascript
const student = {
  name: 'Sheldon',
  score: 100,
  grade: 'A',
}

delete student.score;
student.grade = 'F';
// { name: 'Sheldon', grade: 'F' }
```

### Destructuring (Shorthand)

```javascript
const person = { name: 'Tom', age: '22' };
const { name, age } = person;
console.log(name); // 'Tom'
console.log(age);  // '22'
```

### delete Operator

```javascript
const person = {
  firstName: "Matilda",
  age: 27,
  hobby: "knitting",
};

delete person.hobby;
```

### Shorthand Object Creation

```javascript
const activity = 'Surfing';
const beach = { activity };
console.log(beach); // { activity: 'Surfing' }
```

### this Keyword

```javascript
const cat = {
  name: 'Pipey',
  age: 8,
  whatName() {
    return this.name;
  }
};
console.log(cat.whatName()); // => Pipey
```

### Factory Functions

```javascript
const dogFactory = (name, age, breed) => {
  return {
    name: name,
    age: age,
    breed: breed,
    bark() {
      console.log('Woof!');
    }
  };
};
```

### Getters and Setters

```javascript
const myCat = {
  _name: 'Dottie',
  get name() {
    return this._name;
  },
  set name(newName) {
    this._name = newName;
  }
};

console.log(myCat.name); // getter
myCat.name = 'Yankee';   // setter
```

---

## Classes

### Class Definition

```javascript
class Song {
  constructor(title, artist) {
    this.title = title;
    this.artist = artist;
  }

  play() {
    console.log('Song playing!');
  }

  stop() {
    console.log('Stopping!');
  }
}

const mySong = new Song('Bohemian Rhapsody', 'Queen');
```

### Static Methods

```javascript
class Dog {
  constructor(name) {
    this._name = name;
  }

  introduce() {
    console.log('This is ' + this._name + ' !');
  }

  static bark() {
    console.log('Woof!');
  }
}

const myDog = new Dog('Buster');
myDog.introduce();
Dog.bark(); // static — instance üzerinden çağrılmaz
```

### extends (Inheritance)

```javascript
class Media {
  constructor(info) {
    this.publishDate = info.publishDate;
    this.name = info.name;
  }
}

class Song extends Media {
  constructor(songData) {
    super(songData);
    this.artist = songData.artist;
  }
}

const mySong = new Song({
  artist: 'Queen',
  name: 'Bohemian Rhapsody',
  publishDate: 1975
});
```

---

## Modules

### ES Modules (import/export)

```javascript
// myMath.js

// Default export
export default function add(x, y) {
  return x + y;
}

// Named exports
export function subtract(x, y) {
  return x - y;
}

function multiply(x, y) { return x * y; }
function duplicate(x)    { return x * 2; }

export { multiply, duplicate };
```

```javascript
// main.js
import add, { subtract, multiply, duplicate } from './myMath.js';

console.log(add(6, 2));       // 8
console.log(subtract(6, 2));  // 4
console.log(multiply(6, 2));  // 12
console.log(duplicate(5));    // 10
```

```html
<!-- index.html -->
<script type="module" src="main.js"></script>
```

### CommonJS (Node.js)

```javascript
// myMath.js
function add(x, y)      { return x + y; }
function subtract(x, y) { return x - y; }

module.exports = { add, subtract };
```

```javascript
// main.js
const myMath = require('./myMath.js');

console.log(myMath.add(6, 2));      // 8
console.log(myMath.subtract(6, 2)); // 4
```

---

## Promises

### Promise States

```javascript
const promise = new Promise((resolve, reject) => {
  const res = true;
  if (res) {
    resolve('Resolved!');
  } else {
    reject(Error('Error'));
  }
});

promise.then(
  (res) => console.log(res),
  (err) => console.error(err)
);
```

### .then() / .catch()

```javascript
const promise = new Promise((resolve, reject) => {
  setTimeout(() => {
    reject(Error('Promise Rejected Unconditionally.'));
  }, 1000);
});

promise.then((res) => {
  console.log(res);
});

promise.catch((err) => {
  console.error(err);
});
```

### Promise.all()

```javascript
const promise1 = new Promise(resolve => setTimeout(() => resolve(3), 300));
const promise2 = new Promise(resolve => setTimeout(() => resolve(2), 200));

Promise.all([promise1, promise2]).then(res => {
  console.log(res[0]); // 3
  console.log(res[1]); // 2
});
```

### Chaining .then()

```javascript
promise
  .then(twoStars)
  .then(oneDot)
  .then(print);
```

---

## Async / Await

### async Function

```javascript
function helloWorld() {
  return new Promise(resolve => {
    setTimeout(() => resolve('Hello World!'), 2000);
  });
}

async function msg() {
  const msg = await helloWorld();
  console.log('Message:', msg);
}

msg(); // Message: Hello World! <-- after 2 seconds
```

### Error Handling

```javascript
let json = '{ "age": 30 }';

try {
  let user = JSON.parse(json);
  console.log(user.name);
} catch (e) {
  console.error("Invalid JSON data!");
}
```

### Async + Fetch

```javascript
const getSuggestions = async () => {
  const endpoint = `${url}${queryParams}${wordQuery}`;
  try {
    const response = await fetch(endpoint, { cache: 'no-cache' });
    if (response.ok) {
      const jsonResponse = await response.json();
    }
  } catch (error) {
    console.log(error);
  }
};
```

---

[🔝](#contents)

## HTTP Requests

### XMLHttpRequest (GET)

```javascript
const req = new XMLHttpRequest();
req.responseType = 'json';
req.open('GET', '/getdata?id=65');
req.onload = () => {
  console.log(req.response);
};
req.send();
```

### XMLHttpRequest (POST)

```javascript
const data = { fish: 'Salmon', weight: '1.5 KG', units: 5 };
const xhr = new XMLHttpRequest();
xhr.open('POST', '/inventory/add');
xhr.responseType = 'json';
xhr.send(JSON.stringify(data));

xhr.onload = () => {
  console.log(xhr.response);
};
```

[🔝](#contents)

### Fetch API

```javascript
fetch('https://api-xxx.com/endpoint', {
  method: 'POST',
  headers: {
    'Content-type': 'application/json',
    'apikey': apiKey
  },
  body: JSON.stringify({ id: "200" })
}).then(response => {
  if (response.ok) {
    return response.json();
  }
  throw new Error('Request failed!');
}, networkError => {
  console.log(networkError.message);
}).then(jsonResponse => {
  console.log(jsonResponse);
});
```

### Fetch + async/await

```javascript
const getSuggestions = async () => {
  try {
    const response = await fetch(endpoint, { cache: 'no-cache' });
    if (response.ok) {
      const jsonResponse = await response.json();
      console.log(jsonResponse);
    }
  } catch (error) {
    console.log(error);
  }
};
```


> ⚠️ Note: This content is for educational and personal reference purposes only.
> The original source is shown at the top of the document.
>
> All rights and copyrights belong to their respective owners.
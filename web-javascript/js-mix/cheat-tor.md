
- [Array](#array)
  - [Creating Array](#creating-array)
  - [Methods to manipulate array](#methods-to-manipulate-array)
    - [Array](#array-1)
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

## Methods to manipulate array

### Array

Array(8) : // it creates an array sized 8

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




- fill
- push
- pop
- shift
- unshift
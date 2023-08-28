
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


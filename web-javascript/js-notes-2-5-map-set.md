
- [Sources](#sources)
- [Set - Map](#set---map)
  - [Set](#set)
    - [Creating an empty set](#creating-an-empty-set)
    - [Creating set from array](#creating-set-from-array)
    - [Adding an element to a set](#adding-an-element-to-a-set)
    - [Deleting an element a set](#deleting-an-element-a-set)
    - [Checking an element in the set](#checking-an-element-in-the-set)
    - [Clearing the set](#clearing-the-set)
    - [Union of sets](#union-of-sets)
    - [Intersection of sets](#intersection-of-sets)
    - [Difference of sets](#difference-of-sets)
  - [Map](#map)
    - [Creating an empty Map](#creating-an-empty-map)
    - [Creating an Map from array](#creating-an-map-from-array)
    - [Adding values to the Map](#adding-values-to-the-map)
    - [Getting a value from Map](#getting-a-value-from-map)
    - [Checking key in Map](#checking-key-in-map)
    - [Getting all values from map using loop](#getting-all-values-from-map-using-loop)
- [Destructuring and Spread](#destructuring-and-spread)
  - [Destructuring](#destructuring)
    - [Destructing Arrays](#destructing-arrays)
    - [Destructuring during iteration](#destructuring-during-iteration)
    - [Destructuring Object](#destructuring-object)
    - [Renaming during structuring](#renaming-during-structuring)
    - [Object parameter with destructuring](#object-parameter-with-destructuring)
    - [Destructuring object during iteration](#destructuring-object-during-iteration)
  - [Spread or Rest Operator](#spread-or-rest-operator)
    - [Spread operator to get the rest of array elements](#spread-operator-to-get-the-rest-of-array-elements)
    - [Spread operator to copy array](#spread-operator-to-copy-array)
    - [Spread operator to copy object](#spread-operator-to-copy-object)
      - [Spread operator with arrow function](#spread-operator-with-arrow-function)
- [Regular Expressions](#regular-expressions)
  - [Regular Expressions](#regular-expressions-1)
    - [RegExp parameters](#regexp-parameters)
      - [Pattern](#pattern)
      - [Flags](#flags)
    - [Creating a pattern with RegExp Constructor](#creating-a-pattern-with-regexp-constructor)
    - [Creating a pattern with slashed (without RegExp Constructor)](#creating-a-pattern-with-slashed-without-regexp-constructor)
    - [RegExpp Object Methods](#regexpp-object-methods)
      - [Testing for  a match](#testing-for--a-match)
      - [Array containing all of the match](#array-containing-all-of-the-match)
      - [Replacing a substring](#replacing-a-substring)
    - [Square Bracket](#square-bracket)
    - [Escape character(\\) in RegExp](#escape-character-in-regexp)
    - [One or more times(+)](#one-or-more-times)
    - [Period(.)](#period)
    - [Zero or more times (\*)](#zero-or-more-times-)
    - [Zero or one times (?)](#zero-or-one-times-)
    - [Quantifier in RegExp](#quantifier-in-regexp)
    - [Cart ^](#cart-)
    - [Exact match](#exact-match)


# Sources

- Main source, https://github.com/Asabeneh/30-Days-Of-JavaScript 


# Set - Map 

## Set

Set is  a collection of elements. Set can only contains unique elements.

### Creating an empty set

```js
const companies = new Set();
console.log(companies);
```

```sh
Set(0) {}
```

### Creating set from array

```js
const languages = [
  'English',
  'Finnish',
  'English',
  'French',
  'Spanish',
  'English',
  'French',
]
// removes repetitive items
const setOfLanguages = new Set(languages)
console.log(setOfLanguages)
```

```sh
Set(4) {"English", "Finnish", "French", "Spanish"}
```

Set is an <span style="color:red">iterable object</span> and we can iterate through each elements.

```js
const languages = [
  'English',
  'Finnish',
  'English',
  'French',
  'Spanish',
  'English',
  'French',
]

const setOfLanguages = new Set(languages)

for (const language of setOfLanguages) {
  console.log(language)
}
```

```sh
  English
  Finnish
  French
  Spanish
```

### Adding an element to a set

```js
const companies = new Set() // creating an empty set
console.log(companies.size) // 0

companies.add('Google') // add element to the set
companies.add('Facebook')
companies.add('Amazon')
companies.add('Oracle')
companies.add('Microsoft')
console.log(companies.size) // 5 elements in the set
console.log(companies)
```

```sh
Set(5) {"Google", "Facebook", "Amazon", "Oracle", "Microsoft"}
```

We can also use loop to add element to a set.

```js
const companies = ['Google', 'Facebook', 'Amazon', 'Oracle', 'Microsoft']
setOfCompanies = new Set()
for (const company of companies) {
  setOfCompanies.add(company)
}
```

```sh
Set(5) {"Google", "Facebook", "Amazon", "Oracle", "Microsoft"}

```

### Deleting an element a set

We can delete an element from a set using a delete method.

```js
console.log(companies.delete('Google'))
console.log(companies.size) // 4 elements left in the set
```

### Checking an element in the set

The has method can help to know if a certain element exists in a set.

```js
console.log(companies.has('Apple')) // false
console.log(companies.has('Facebook')) // true
```

### Clearing the set

It removes all the elements from a set.

```js
companies.clear()
console.log(companies)
```

```sh
Set(0) {}
```

See the example below to learn how to use set.

```js
const languages = [
  'English',
  'Finnish',
  'English',
  'French',
  'Spanish',
  'English',
  'French',
]
const langSet = new Set(languages)
// removes duplicated items
console.log(langSet) // Set(4) {"English", "Finnish", "French", "Spanish"}
console.log(langSet.size) // 4

const counts = []
const count = {}

for (const l of langSet) {
  const filteredLang = languages.filter((lng) => lng === l)
  console.log(filteredLang) // ["English", "English", "English"]
  counts.push({ lang: l, count: filteredLang.length })
}
console.log(counts)
```

```js
[
  { lang: 'English', count: 3 },
  { lang: 'Finnish', count: 1 },
  { lang: 'French', count: 2 },
  { lang: 'Spanish', count: 1 },
]
```

Other use case of set. For instance to count unique item in an array.

```js
const numbers = [5, 3, 2, 5, 5, 9, 4, 5]
const setOfNumbers = new Set(numbers)

console.log(setOfNumbers)
```

```sh
Set(5) {5, 3, 2, 9, 4}
```

### Union of sets

To find a union to two sets can be achieved using spread operator. Lets find the union of set A and set B (A U B)

```js
let a = [1, 2, 3, 4, 5]
let b = [3, 4, 5, 6]
let c = [...a, ...b]

let A = new Set(a)
let B = new Set(b)
let C = new Set(c)

console.log(C)
```

```sh
Set(6) { 1, 2, 3, 4, 5, 6 }
```

### Intersection of sets

To find an intersection of two sets can be achieved using filter. Lets find the intersection of set A and set B (A ∩ B)

```js
let a = [1, 2, 3, 4, 5]
let b = [3, 4, 5, 6]

let A = new Set(a)
let B = new Set(b)

let c = a.filter((num) => B.has(num))
let C = new Set(c)

console.log(C)
```

```sh
Set(3) {3, 4, 5}
```

### Difference of sets

To find an the difference between two sets can be achieved using filter. Lets find the different of set A and set B (A \ B)

```js
let a = [1, 2, 3, 4, 5]
let b = [3, 4, 5, 6]

let A = new Set(a)
let B = new Set(b)

let c = a.filter((num) => !B.has(num))
let C = new Set(c)

console.log(C)
```

```sh
Set(2) {1, 2}
```


## Map

### Creating an empty Map

```js
const map = new Map()
console.log(map)
```

```sh
Map(0) {}
```

### Creating an Map from array

```js
countries = [
  ['Finland', 'Helsinki'],
  ['Sweden', 'Stockholm'],
  ['Norway', 'Oslo'],
]
const map = new Map(countries)
console.log(map)
console.log(map.size)
```

```sh
Map(3) {"Finland" => "Helsinki", "Sweden" => "Stockholm", "Norway" => "Oslo"}
3
```

### Adding values to the Map

```js
const countriesMap = new Map()
console.log(countriesMap.size) // 0
countriesMap.set('Finland', 'Helsinki')
countriesMap.set('Sweden', 'Stockholm')
countriesMap.set('Norway', 'Oslo')
console.log(countriesMap)
console.log(countriesMap.size)
```

```sh
Map(3) {"Finland" => "Helsinki", "Sweden" => "Stockholm", "Norway" => "Oslo"}
3
```

### Getting a value from Map

```js
console.log(countriesMap.get('Finland'))
```

```sh
Helsinki
```

### Checking key in Map

Check if a key exists in a map using _has_ method. It returns _true_ or _false_.

```js
console.log(countriesMap.has('Finland'))
```

```sh
true
```

### Getting all values from map using loop

```js
for (const country of countriesMap) {
  console.log(country)
}
```

```sh
(2) ["Finland", "Helsinki"]
(2) ["Sweden", "Stockholm"]
(2) ["Norway", "Oslo"]
```

```js
for (const [country, city] of countriesMap){
 console.log(country, city)
}
```

```sh
Finland Helsinki
Sweden Stockholm
Norway Oslo
```

# Destructuring and Spread

## Destructuring

Destructuring is a way to *unpack* arrays, and objects and assigning to a distinct variable.

### Destructing Arrays

```js
  const numbers = [1, 2, 3]
  let [numOne, numTwo, numThree] = numbers

  console.log(numOne, numTwo, numThree)
```

```sh
  1 2 3
```

```js
const fullStack = [
  ['HTML', 'CSS', 'JS', 'React'],
  ['Node', 'Express', 'MongoDB']
]
const [frontEnd, backEnd] = fullStack

console.log(frontEnd)
console.log(backEnd)
```

```sh
["HTML", "CSS", "JS", "React"]
["Node", "Express", "MongoDB"]
```

If we like to skip on of the values in the array we use additional comma. The comma helps to omit the value at that specific index


```js
  const names = ['Asabeneh', 'Brook', 'David', 'John']
  let [, secondPerson, , fourthPerson] = names // first and third person is omitted

  console.log(secondPerson, fourthPerson)
```

```sh
Brook John
```

We can use default value in case the value of array for that index is undefined:

```js
const names = [undefined, 'Brook', 'David']
let [
  firstPerson = 'Asabeneh',
  secondPerson,
  thirdPerson,
  fourthPerson = 'John'
] = names

console.log(firstPerson, secondPerson, thirdPerson, fourthPerson)  
```

```sh
Asabeneh Brook David John
```

We can not assign variable to all the elements in the array. We can destructure few of the first and we can get <span style="color:red">the remaining as array using spread operator(...)</span>.

```js
const nums = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
let [num1, num2, num3, ...rest] = nums

console.log(num1, num2, num3)
console.log(rest)
```

```sh
1 2 3
[4, 5, 6, 7, 8, 9, 10]
```


### Destructuring during iteration

```js
const countries = [['Finland', 'Helsinki'], ['Sweden', 'Stockholm'], ['Norway', 'Oslo']]

for (const [country, city] of countries) {
console.log(country, city)
}
```

```sh
Finland Helsinki
Sweden Stockholm
Norway Oslo
```

```js
const fullStack = [
  ['HTML', 'CSS', 'JS', 'React'],
  ['Node', 'Express', 'MongoDB']
]

for(const [first, second, third] of fullStack) {
console.log(first, second, third)
}
```

```sh
HTML CSS JS
Node Express MongoDB
```

### Destructuring Object

When we destructure the name of the variable we use to destructure should be <span style="color:red">exactly the same as the key or property</span> of the object. See the example below.

```js
const rectangle = {
  width: 20,
  height: 10,
  area: 200
}
let { width, height, area, perimeter } = rectangle

console.log(width, height, area, perimeter)
```

```sh
20 10 200 undefined
```

### Renaming during structuring

```js
const rectangle = {
  width: 20,
  height: 10,
  area: 200
}
let { width: w, height: h, area: a, perimeter: p } = rectangle

console.log(w, h, a, p)
```

```sh
20 10 200 undefined
```

If the key is not found in the object the variable will be assigned to undefined. Sometimes the key might not be in the object, in that case we can give a default value during declaration. See the example.

```js
const rectangle = {
  width: 20,
  height: 10,
  area: 200
}
let { width, height, area, perimeter = 60 } = rectangle

console.log(width, height, area, perimeter) //20 10 200 60
//Let us modify the object:width to 30 and perimeter to 80
```

```js
const rectangle = {
  width: 30,
  height: 10,
  area: 200,
  perimeter: 80
}
let { width, height, area, perimeter = 60 } = rectangle
console.log(width, height, area, perimeter) //30 10 200 80
```

Destructuring keys as a function parameters. Let us create a function which takes a rectangle object and it returns a perimeter of a rectangle.


### Object parameter with destructuring

- Without destructuring

```js
// Without destructuring
const rect = {
  width: 20,
  height: 10
}
const calculatePerimeter = rectangle => {
  return 2 * (rectangle.width + rectangle.height)
}

console.log(calculatePerimeter(rect)) // 60
```

```js

const calculatePerimeter = ({ width, height }) => {
  return 2 * (width + height)
}

console.log(calculatePerimeter(rect)) // 60
```


### Destructuring object during iteration

```js
const todoList = [
{
  task:'Prepare JS Test',
  time:'4/1/2020 8:30',
  completed:true
},
{
  task:'Give JS Test',
  time:'4/1/2020 10:00',
  completed:false
},
{
  task:'Assess Test Result',
  time:'4/1/2020 1:00',
  completed:false
}
]

for (const {task, time, completed} of todoList){
  console.log(task, time, completed)
}
```

```sh
Prepare JS Test 4/1/2020 8:30 true
Give JS Test 4/1/2020 10:00 false
Assess Test Result 4/1/2020 1:00 false
```

## Spread or Rest Operator

When we destructure an array we use the spread operator(...) to get the rest elements as array. In addition to that we use spread operator to spread array elements to another array.

### Spread operator to get the rest of array elements

```js
const nums = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
let [num1, num2, num3, ...rest] = nums
​
console.log(num1, num2, num3)
console.log(rest)
```

```sh
1 2 3
[4, 5, 6, 7, 8, 9, 10]
```

### Spread operator to copy array

```js
const evens = [0, 2, 4, 6, 8, 10]
const evenNumbers = [...evens]

const odds = [1, 3, 5, 7, 9]
const oddNumbers = [...odds]

const wholeNumbers = [...evens, ...odds]

console.log(evenNumbers)
console.log(oddNumbers)
console.log(wholeNumbers)

```

```sh
[0, 2, 4, 6, 8, 10]
[1, 3, 5, 7, 9]
[0, 2, 4, 6, 8, 10, 1, 3, 5, 7, 9]
```

### Spread operator to copy object

We can copy an object using a spread operator

```js
const user = {
  name:'Asabeneh',
  title:'Programmer',
  country:'Finland',
  city:'Helsinki'
}

const copiedUser = {...user}
console.log(copiedUser)
```

```sh
{name: "Asabeneh", title: "Programmer", country: "Finland", city: "Helsinki"}
```

Modifying or changing the object while copying

```js
const user = {
  name:'Asabeneh',
  title:'Programmer',
  country:'Finland',
  city:'Helsinki'
}

const copiedUser = {...user, title:'instructor'}
console.log(copiedUser)
```

```sh
{name: "Asabeneh", title: "instructor", country: "Finland", city: "Helsinki"}
```

#### Spread operator with arrow function

Whenever we like to write an arrow function which takes unlimited number of arguments we use a spread operator. If we use a spread operator as a parameter, the argument passed when we invoke a function will change to an array.

```js

const sumAllNums = (...args) => {
  console.log(args)
}

sumAllNums(1, 2, 3, 4, 5)

```

```sh
[1, 2, 3, 4, 5]

```


# Regular Expressions

## Regular Expressions

A regular expression or RegExp is a small programming language that helps to find pattern in data. A RegExp can be used to check if some pattern exists in a different data types. To use RegExp in JavaScript either we use RegExp constructor or we can declare a RegExp pattern using two forward slashes followed by a flag. We can create a pattern in two ways.

To declare a string we use a single quote, double quote and backtick, to declare a regular expression we use two forward slashes and an optional flag. The flag could be g, i, m, s, u or y.

(tor:grammer hatası var orjinalde)

### RegExp parameters

A regular expression takes two parameters. One required search pattern and an optional flag.

#### Pattern

A pattern could be a text or any form of pattern which some sort of similarity. For instance a phone number format number might be our interest to look for.

#### Flags

Flags are optional parameters in a regular expression which determine the type of searching. Let us see some of the flags:

- g: greedy (a global flag which means looking for a pattern in whole text)
- i: case insensitive flag(it searches for both lowercase and uppercase)
- m: multiline

### Creating a pattern with RegExp Constructor

Declaring regular expression without global flag and case insensitive flag.

```js
// without flag
let pattern = 'love'
let regEx = new RegExp(pattern)
```

Declaring regular expression with global flag and case insensitive flag.

```js
let pattern = 'love'
let flag = 'gi'
let regEx = new RegExp(pattern, flag)
```

Declaring a regex pattern using RegExp object. Writing the pattern and the flag inside the RegExp constructor

```js
let regEx = new RegExp('love','gi')
```

### Creating a pattern with slashed (without RegExp Constructor)

Declaring regular expression with global flag and case insensitive flag.

```js
let regEx= /love/gi

// same
let regEx= new RegExp('love','gi')

```


### RegExpp Object Methods

Let us see some of RegExp methods

#### Testing for  a match

*test()*:Tests for a match in a string. It returns true or false.

```js
const str = 'I love JavaScript'
const pattern = /love/
const result = pattern.test(str)
console.log(result)
```

```sh
true
```

#### Array containing all of the match

*match()*:Returns an array containing all of the matches, including capturing groups, or null if no match is found.
If we do not use a global flag, match() returns an array containing the pattern, index, input and group.

```js
const str = 'I love JavaScript'
const pattern = /love/
const result = str.match(pattern)
console.log(result);
```

```sh
["love", index: 2, input: "I love JavaScript", groups: undefined]
```

```js
const str = 'I love JavaScript'
const pattern = /love/g
const result = str.match(pattern)
console.log(result)
```

```sh
["love"]
```

*search()*: Tests for a match in a string. It returns the index of the match, or -1 if the search fails.

```js
const str = 'I love JavaScript'
const pattern = /love/g
const result = str.search(pattern)
console.log(result)
```

```sh
2
```

#### Replacing a substring

*replace()*: Executes a search for a match in a string, and replaces the matched substring with a replacement substring.

```js
const txt = 'Python is the most beautiful language that a human begin has ever created.\
I recommend python for a first programming language'

matchReplaced = txt.replace(/Python|python/, 'JavaScript')
console.log(matchReplaced)
```

```sh
JavaScript is the most beautiful language that a human begin has ever created.I recommend python for a first programming language
```

```js
const txt = 'Python is the most beautiful language that a human begin has ever created.\
I recommend python for a first programming language'

let matchReplaced = txt.replace(/Python|python/g, 'JavaScript')
console.log(matchReplaced)
```

```sh
JavaScript is the most beautiful language that a human begin has ever created.I recommend JavaScript for a first programming language
```

```js
const txt = 'Python is the most beautiful language that a human begin has ever created.\
I recommend python for a first programming language'

let matchReplaced = txt.replace(/Python/gi, 'JavaScript')
console.log(matchReplaced)
```

```sh
JavaScript is the most beautiful language that a human begin has ever created.I recommend JavaScript for a first programming language
```

```js

const txt = '%I a%m te%%a%%che%r% a%n%d %% I l%o%ve te%ach%ing.\
T%he%re i%s n%o%th%ing as m%ore r%ewarding a%s e%duc%at%i%ng a%n%d e%m%p%ow%er%ing \
p%e%o%ple.\
I fo%und te%a%ching m%ore i%n%t%er%%es%ting t%h%an any other %jobs.\
D%o%es thi%s m%ot%iv%a%te %y%o%u to b%e a t%e%a%cher.'

matches = txt.replace(/%/g, '')
console.log(matches)  
```

```sh
I am teacher and  I love teaching.There is nothing as more rewarding as educating and empowering people.I found teaching more interesting than any other jobs.Does this motivate you to be a teacher.
```

* []:  A set of characters
  * [a-c] means, a or b or c
  * [a-z] means, any letter a to z
  * [A-Z] means, any character A to Z
  * [0-3] means, 0 or 1 or 2 or 3
  * [0-9] means any number 0 to 9
  * [A-Za-z0-9] any character which is a to z, A to Z, 0 to 9
* \\:  uses to escape special characters
  * \d mean: match where the string contains digits (numbers from 0-9)
  * \D mean: match where the string does not contain digits
* . : any character except new line character(\n)
* ^: starts with
  * r'^substring' eg r'^love', a sentence which starts with a word love
  * r'[^abc] mean not a, not b, not c.
* $: ends with
  * r'substring$' eg r'love$', sentence ends with a word love
* *: zero or more times
  * r'[a]*' means a optional or it can occur many times.
* +: one or more times
  * r'[a]+' means at least once or more times
* ?: zero or one times
  *  r'[a]?' means zero times or once
* \b: word bounder, matches with the beginning or ending of a word
* {3}: Exactly 3 characters
* {3,}: At least 3 characters
* {3,8}: 3 to 8 characters
* |: Either or
  * r'apple|banana' mean either of an apple or a banana
* (): Capture and group

![Regular Expression cheat sheet](./img/regex.png)

Let's use example to clarify the above meta characters

### Square Bracket

Let's use square bracket to include lower and upper case

```js
const pattern = '[Aa]pple' // this square bracket means either A or a
const txt = 'Apple and banana are fruits. An old cliche says an apple a day keeps the  doctor way has been replaced by a banana a day keeps the doctor far far away. '
const matches = txt.match(pattern)

console.log(matches)  
```

```sh
["Apple", index: 0, input: "Apple and banana are fruits. An old cliche says an apple a day keeps the  doctor way has been replaced by a banana a day keeps the doctor far far away.", groups: undefined]

```

```js
const pattern = /[Aa]pple/g // this square bracket means either A or a
const txt = 'Apple and banana are fruits. An old cliche says an apple a day a doctor way has been replaced by a banana a day keeps the doctor far far away. '
const matches = txt.match(pattern)

console.log(matches)  
```

```sh
["Apple", "apple"]
```

If we want to look for the banana, we write the pattern as follows:

```js
const pattern = /[Aa]pple|[Bb]anana/g // this square bracket mean either A or a
const txt = 'Apple and banana are fruits. An old cliche says an apple a day a doctor way has been replaced by a banana a day keeps the doctor far far away. Banana is easy to eat too.'
const matches = txt.match(pattern)

console.log(matches)  
```

```sh
["Apple", "banana", "apple", "banana", "Banana"]
```

Using the square bracket and or operator , we manage to extract Apple, apple, Banana and banana.

### Escape character(\\) in RegExp

```js
const pattern = /\d/g  // d is a special character which means digits
const txt = 'This regular expression example was made in January 12,  2020.'
const matches = txt. match(pattern)

console.log(matches)  // ["1", "2", "2", "0", "2", "0"], this is not what we want
```

```js
const pattern = /\d+/g  // d is a special character which means digits
const txt = 'This regular expression example was made in January 12,  2020.'
const matches = txt. match(pattern)

console.log(matches)  // ["12", "2020"], this is not what we want
```
                        
### One or more times(+)

```js
const pattern = /\d+/g  // d is a special character which means digits
const txt = 'This regular expression example was made in January 12,  2020.'
const matches = txt. match(pattern)
console.log(matches)  // ["12", "2020"], this is not what we want
```

### Period(.)

```js
const pattern = /[a]./g  // this square bracket means a and then ".". "." means any character except new line. Caution: match two characters in the anywhere of whole text
const txt = 'Apple and banana are fruits'
const matches = txt.match(pattern)

console.log(matches)  // ["an", "an", "an", "a ", "ar"]
```

```js
const pattern = /[a].+/g  // . any character, + any character one or more times 
const txt = 'Apple and banana are fruits'
const matches = txt.match(pattern)

console.log(matches)  // ['and banana are fruits']
```

### Zero or more times (*)

Zero or many times. The pattern may not occur or it can occur many times.

```js

const pattern = /[a].*/g  //. any character, + any character one or more times 
const txt = 'Apple and banana are fruits'
const matches = txt.match(pattern)

console.log(matches)  // ['and banana are fruits']

```


### Zero or one times (?) 

Zero or one times. The pattern may not occur or it may occur once❗ .

```js
const txt = 'I am not sure if there is a convention how to write the word e-mail.\
Some people write it email others may write it as Email or E-mail.'
const pattern = /[Ee]-?mail/g  // ? means optional
matches = txt.match(pattern)

console.log(matches)  // ["e-mail", "email", "Email", "E-mail"]

```

--*LINK - tbc


### Quantifier in RegExp

We can specify the length of the substring we look for in a text, using a curly bracket. Let us see, how to use RegExp quantifiers. Imagine, we are interested in substring that their length are 4 characters

```js
const txt = 'This regular expression example was made in December 6,  2019.'
const pattern = /\\b\w{4}\b/g  //  exactly four character words
const matches = txt.match(pattern)
console.log(matches)  //['This', 'made', '2019']
```

```js
const txt = 'This regular expression example was made in December 6,  2019.'
const pattern = /\b[a-zA-Z]{4}\b/g  //  exactly four character  words without numbers
const matches = txt.match(pattern)
console.log(matches)  //['This', 'made']
```

```js
const txt = 'This regular expression example was made in December 6,  2019.'
const pattern = /\d{4}/g  // a number and exactly four digits
const matches = txt.match(pattern)
console.log(matches)  // ['2019']
```

```js
const txt = 'This regular expression example was made in December 6,  2019.'
const pattern = /\d{1,4}/g   // 1 to 4
const matches = txt.match(pattern)
console.log(matches)  // ['6', '2019']
```

### Cart ^

- Starts with
  
```js
const txt = 'This regular expression example was made in December 6,  2019.'
const pattern = /^This/ // ^ means starts with
const matches = txt.match(pattern)
console.log(matches)  // ['This']
```

- Negation

```js
const txt = 'This regular expression example was made in December 6,  2019.'
const pattern = /[^A-Za-z,. ]+/g  // ^ in set character means negation, not A to Z, not a to z, no space, no comma no period
const matches = txt.match(pattern)
console.log(matches)  // ["6", "2019"]
```

### Exact match

It should have ^ starting and $ which is an end.

```js
let pattern = /^[A-Z][a-z]{3,12}$/;
let name = 'Asabeneh';
let result = pattern.test(name)

console.log(result) // true
```
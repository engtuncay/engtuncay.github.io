<h2>Regular Expression in Javascript</h2>

Sources : https://github.com/Asabeneh/30-Days-Of-JavaScript (some modifications may be done.)

[Back](../readme.md)

- [Section - Regular Expressions](#section---regular-expressions)
  - [Regular Expressions](#regular-expressions)
    - [RegExp parameters](#regexp-parameters)
      - [Pattern](#pattern)
      - [Flags](#flags)
    - [Creating a pattern with RegExp Constructor](#creating-a-pattern-with-regexp-constructor)
    - [Creating a pattern with backslashes](#creating-a-pattern-with-backslashes)
    - [RegExp Object Methods](#regexp-object-methods)
      - [Test Method](#test-method)
      - [Match Method](#match-method)
      - [Search Method](#search-method)
      - [Replace Method](#replace-method)
    - [Meta Characters](#meta-characters)

# Section - Regular Expressions

## Regular Expressions

A regular expression or RegExp is a `small programming language` that helps to find pattern in data (text).

We can create a pattern in two ways :

To declare a string we use a single quote, double quote and backtick, to declare a regular expression we use `two forward slashes` and an optional flag. The flag could be g, i, m, s, u or y.

```js
let patternExample = /patternText/flags;

```

### RegExp parameters

A regular expression takes two parameters. One required search pattern and an optional flag.

#### Pattern

A pattern is composed of characters with `meta characters`. For instance a phone numbers have similar format.

#### Flags

Flags are optional parameters in a regular expression which determine the type of searching. Let us see some of the flags:

- g: greedy `a global flag` which means looking for the pattern in the whole text. dont stop after the first match. (ilk bulduktan sonra durmaz sonrasında da eşleşen desenleri(pattern) arar )
- i: case insensitive flag (it searches for both lowercase and uppercase)
- m: multiline

### Creating a pattern with RegExp Constructor

➖ Declaring regular expression without global flag and case insensitive flag. (default)

```js
// without flag
let pattern = "love";
let regEx = new RegExp(pattern);
```

➖ Declaring regular expression with global flag and case insensitive flag.

```js
let pattern = "love";
let flag = "gi";
let regEx = new RegExp(pattern, flag);
```

### Creating a pattern with backslashes

Declaring regular expression with global flag and case insensitive flag.

```js
let regEx = /love/gi;

// same
let regEx = new RegExp("love", "gi");
```

### RegExp Object Methods

Let us see some of RegExp methods

#### Test Method

`test()` method tests for a match in a string. It returns true or false.

(içinde match eden parça varsa true - include da denilebilir)

```js
const str = "I love JavaScript";
const pattern = /love/;
const result = pattern.test(str);
console.log(result);

// -- Output --
// true
```

It says the string includes 'love' text.

- Try : https://jsfiddle.net/engtuncay/9x6kudz2

#### Match Method

`match()` method returns an array containing all of the matches, including capturing groups, or null if no match is found if we use a global flag in the pattern.

❗ If we do not use a global (greedy) flag, match() returns an object containing the pattern, index, input and group.

🧲 Example : without global flag

```js
const str = "I love JavaScript";
const pattern = /love/;
const result = str.match(pattern);
console.log(result);

// -- Output --
// ["love", index: 2, input: "I love  JavaScript", groups: undefined]
```

🧲 Example : with global flag

```js
const str = "I love JavaScript";
const pattern = /love/g;
const result = str.match(pattern);
console.log(result);

// -- Output --
// ["love"]
```

It returns captured matched parts. (text içinde yakaladığı parçaları döner)

🧲 Example 2

- farklı parçaladığı yakaladığı bir örnek :

```js
const str = "I love Js, I luve Ts, I live Ps";
const pattern = /l.{1}ve/g;
const result = str.match(pattern);
console.log(result);

// ---Output---
// ["love","luve","live"]

```
<!-- TBC - 20250809 - 1404   -->

#### Search Method

`search()` method tests for a match in a string and then it returns the index of the match, or -1 if the search fails.

```js
const str = "I love JavaScript";
const pattern = /love/g;
const result = str.search(pattern);
console.log(result);

// -- Output -- (index of the match)
// 2
```

#### Replace Method

`replace()` method executes a search for a match in a string, and replaces the matched substring with a replacement substring.

🧲 Example

```js
const txt =
  "Python is the most beautiful language that a human begin has ever created.\
I recommend python for a first programming language";

matchReplaced = txt.replace(/Python|python/, "JavaScript");
console.log(matchReplaced);

// -- Output --
// JavaScript is the most beautiful language that a human begin has ever created.I recommend python for a first programming language
```

❗ without greedy flag, it ignores the second match phyton.


🧲 Example

```js
const txt =
  "Python is the most beautiful language that a human begin has ever created.\
I recommend python for a first programming language";

let matchReplaced = txt.replace(/Python|python/g, "JavaScript");
console.log(matchReplaced);

// -- Output --
// JavaScript is the most beautiful language that a human begin has ever created.I recommend JavaScript for a first programming language
```

🧲 Example

```js
const txt =
  "Python is the most beautiful language that a human begin has ever created.\
I recommend python for a first programming language";

let matchReplaced = txt.replace(/Python/gi, "JavaScript");
console.log(matchReplaced);

// -- Output --
// JavaScript is the most beautiful language that a human begin has ever created.I recommend JavaScript for a first programming language
```

🧲 Example

```js
const txt =
  "%I a%m te%%a%%che%r%.\
T%he%re i%s n%o%th%ing as m%ore r%ewarding a%s e%duc%at%i%ng a%n%d e%m%p%ow%er%ing";

matches = txt.replace(/%/g, "");
console.log(matches);

// -- Output --
// I am teacher.There is nothing as more rewarding as educating and empowering
```

--*TBC - regex js

### Meta Characters

- []: A set of characters

  - [a-c] means, a or b or c
  - [a-z] means, any letter a to z
  - [A-Z] means, any character A to Z
  - [0-3] means, 0 or 1 or 2 or 3
  - [0-9] means any number 0 to 9
  - [A-Za-z0-9] any character which is a to z, A to Z, 0 to 9

- \\: uses to escape special characters

  - \d mean: match where the string contains digits (numbers from 0-9)
  - \D mean: match where the string does not contain digits

- . : any character except new line character(\n)

- ^: starts with

  - r'^substring' eg r'^love', a sentence which starts with a word love
  - r'[^abc] mean not a, not b, not c.

- $: ends with

  - r'substring$' eg r'love$', sentence ends with a word love

- \*: zero or more times

  - r'[a]\*' means a optional or it can occur many times.

- +: one or more times

  - r'[a]+' means at least once or more times

- ?: zero or one times

  - r'[a]?' means zero times or once

- \b: word bounder, matches with the beginning or ending of a word

- {3}: Exactly 3 characters

- {3,}: At least 3 characters

- {3,8}: 3 to 8 characters

- |: Either or

  - r'apple|banana' mean either of an apple or a banana

- (): Capture and group

![Regular Expression cheat sheet](./img/regex.png)

Let's use example to clarify the above meta characters

➖ Square Bracket

Let's use square bracket to include lower and upper case

```js
const pattern = "[Aa]pple"; // this square bracket means either A or a
const txt =
  "Apple and banana are fruits. An old cliche says an apple a day keeps the  doctor way has been replaced by a banana a day keeps the doctor far far away. ";
const matches = txt.match(pattern);

console.log(matches);
```

```sh
["Apple", index: 0, input: "Apple and banana are fruits. An old cliche says an apple a day keeps the  doctor way has been replaced by a banana a day keeps the doctor far far away.", groups: undefined]

```

```js
const pattern = /[Aa]pple/g; // this square bracket means either A or a
const txt =
  "Apple and banana are fruits. An old cliche says an apple a day a doctor way has been replaced by a banana a day keeps the doctor far far away. ";
const matches = txt.match(pattern);

console.log(matches);
```

```sh
["Apple", "apple"]
```

If we want to look for the banana, we write the pattern as follows:

```js
const pattern = /[Aa]pple|[Bb]anana/g; // this square bracket mean either A or a
const txt =
  "Apple and banana are fruits. An old cliche says an apple a day a doctor way has been replaced by a banana a day keeps the doctor far far away. Banana is easy to eat too.";
const matches = txt.match(pattern);

console.log(matches);
```

```sh
["Apple", "banana", "apple", "banana", "Banana"]
```

Using the square bracket and or operator , we manage to extract Apple, apple, Banana and banana.

➖ Escape character(\\) in RegExp

```js
const pattern = /\d/g; // d is a special character which means digits
const txt = "This regular expression example was made in January 12,  2020.";
const matches = txt.match(pattern);

console.log(matches); // ["1", "2", "2", "0", "2", "0"], this is not what we want
```

```js
const pattern = /\d+/g; // d is a special character which means digits
const txt = "This regular expression example was made in January 12,  2020.";
const matches = txt.match(pattern);

console.log(matches); // ["12", "2020"]
```

➖ One or more times(+)

```js
const pattern = /\d+/g; // d is a special character which means digits
const txt = "This regular expression example was made in January 12,  2020.";
const matches = txt.match(pattern);
console.log(matches); // ["12", "2020"]
```

➖ Period(.)

```js
const pattern = /[a]./g; // this square bracket means a and then ".". "." means any character except new line. Caution: match two characters in the anywhere of whole text
const txt = "Apple and banana are fruits";
const matches = txt.match(pattern);

console.log(matches); // ["an", "an", "an", "a ", "ar"]
```

```js
const pattern = /[a].+/g; // . any character, + any character one or more times
const txt = "Apple and banana are fruits";
const matches = txt.match(pattern);

console.log(matches); // ['and banana are fruits']
```

➖ Zero or more times (\*)

Zero or many times. The pattern may not occur or it can occur many times.

```js
const pattern = /[a].*/g; //. any character, + any character one or more times
const txt = "Apple and banana are fruits";
const matches = txt.match(pattern);

console.log(matches); // ['and banana are fruits']
```

➖ Zero or one times (?)

Zero or one times. The pattern may not occur or it may occur once ❗

```js
const txt =
  "I am not sure if there is a convention how to write the word e-mail.\
Some people write it email others may write it as Email or E-mail.";
const pattern = /[Ee]-?mail/g; // ? means optional
matches = txt.match(pattern);

console.log(matches); // ["e-mail", "email", "Email", "E-mail"]
```

➖ Quantifier in RegExp

We can specify the length of the substring we look for in a text, using a curly bracket. Let us see, how to use RegExp quantifiers. Imagine, we are interested in substring that their length are 4 characters

```js
const txt = "This regular expression example was made in December 6,  2019.";
const pattern = /\\b\w{4}\b/g; //  exactly four character words
const matches = txt.match(pattern);
console.log(matches); //['This', 'made', '2019']
```

```js
const txt = "This regular expression example was made in December 6,  2019.";
const pattern = /\b[a-zA-Z]{4}\b/g; //  exactly four character  words without numbers
const matches = txt.match(pattern);
console.log(matches); //['This', 'made']
```

```js
const txt = "This regular expression example was made in December 6,  2019.";
const pattern = /\d{4}/g; // a number and exactly four digits
const matches = txt.match(pattern);
console.log(matches); // ['2019']
```

```js
const txt = "This regular expression example was made in December 6,  2019.";
const pattern = /\d{1,4}/g; // 1 to 4
const matches = txt.match(pattern);
console.log(matches); // ['6', '2019']
```

➖ Cart ^

- Starts with

```js
const txt = "This regular expression example was made in December 6,  2019.";
const pattern = /^This/; // ^ means starts with
const matches = txt.match(pattern);
console.log(matches); // ['This']
```

➖ Negation

```js
const txt = "This regular expression example was made in December 6,  2019.";
const pattern = /[^A-Za-z,. ]+/g; // ^ in set character means negation, not A to Z, not a to z, no space, no comma no period
const matches = txt.match(pattern);
console.log(matches); // ["6", "2019"]
```

➖ Exact match

It should have ^ starting and $ which is an end.

```js
let pattern = /^[A-Z][a-z]{3,12}$/;
let name = "Asabeneh";
let result = pattern.test(name);

console.log(result); // true
```

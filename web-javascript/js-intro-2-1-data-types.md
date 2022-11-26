
This tutorial is mostly prepared from javascript.info website. It is very good. Some sections may be changed or removed.

**Source**

http://www.javascript.info

**Contents**

- [Fundamentals 2](#fundamentals-2)
  - [Variables](#variables)
    - [A variable](#a-variable)
    - [Variable naming](#variable-naming)
    - [Constants](#constants)
      - [Uppercase constants](#uppercase-constants)
  - [Data types](#data-types)
    - [Number](#number)
    - [BigInt](#bigint)
    - [String](#string)
    - [Boolean (logical type)](#boolean-logical-type)
    - [The “null” value](#the-null-value)
    - [The “undefined” value](#the-undefined-value)
    - [Objects and Symbols](#objects-and-symbols)
    - [The typeof operator](#the-typeof-operator)
    - [Summary](#summary)
  - [Interaction: alert, prompt, confirm](#interaction-alert-prompt-confirm)
    - [alert](#alert)
    - [prompt](#prompt)
    - [confirm](#confirm)
    - [Summary](#summary-1)
  - [Type Conversions](#type-conversions)
    - [String Conversion](#string-conversion)
    - [Numeric Conversion](#numeric-conversion)
    - [Boolean Conversion](#boolean-conversion)
    - [Summary](#summary-2)
- [Sources](#sources)

# Fundamentals 2

## Variables

Variables are used to store information.

### A variable

A variable is a “named storage” for data.

To create a variable in JavaScript, use the let keyword.

The statement below creates (in other words: declares) a variable with the name “message”:

```js
let message;

```

Now, we can put some data into it by using the assignment operator =:

```js
let message;
message = 'Hello'; // store the string
```

The string is now saved into the memory area associated with the variable. We can access it using the variable name:

```js
let message;
message = 'Hello!';
alert(message); // shows the variable content

```

To be concise, we can combine the variable declaration and assignment into a single line:

```js
let message = 'Hello!'; // define the variable and assign the value
alert(message); // Hello!

```

We can also declare multiple variables in one line: 

```js
let user = 'John', age = 25, message = 'Hello';

```

That might seem shorter, but we don’t recommend it. For the sake of better readability, please use a single line per variable.

The multiline variant is a bit longer, but easier to read:

```js
let user = 'John';
let age = 25;
let message = 'Hello';

```

Some people also define multiple variables in this multiline style:

```js
let user = 'John',
  age = 25,
  message = 'Hello';

```

…Or even in the “comma-first” style:

```js
let user = 'John'
  , age = 25
  , message = 'Hello';

```

Technically, all these variants do the same thing. So, it’s a matter of personal taste and aesthetics.

- We can also declare two variables and copy data from one into the other.

```js
let hello = 'Hello world!';

let message;

// copy 'Hello world' from hello into message
message = hello;

// now two variables hold the same data
alert(hello); // Hello world!
alert(message); // Hello world!

```

- Note: Functional languages

It’s interesting to note that there exist functional programming languages, like Scala or Erlang that forbid changing variable values.

In such languages, once the value is stored “in the box”, it’s there forever. If we need to store something else, the language forces us to create a new box (declare a new variable). We can’t reuse the old one.

Though it may seem a little odd at first sight, these languages are quite capable of serious development. More than that, there are areas like parallel computations where this limitation confers certain benefits. Studying such a language (even if you’re not planning to use it soon) is recommended to broaden the mind.

### Variable naming

There are two limitations on variable names in JavaScript:

- The name must contain only letters, digits, or the symbols $ and _.

- The first character must not be a digit.

Examples of valid names:

```js
let userName;
let test123;

```

When the name contains multiple words, camelCase is commonly used. That is: words go one after another, each word except first starting with a capital letter: myVeryLongName.

What’s interesting – the dollar sign '$' and the underscore '_' can also be used in names. They are regular symbols, just like letters, without any special meaning.

These names are valid:

```js
let $ = 1; // declared a variable with the name "$"
let _ = 2; // and now a variable with the name "_"
alert($ + _); // 3

```

Examples of incorrect variable names:

```js
let 1a; // cannot start with a digit

let my-name; // hyphens '-' aren't allowed in the name

```

- Info: Case matters

Variables named apple and AppLE are two different variables.

- Info: Non-Latin letters are allowed, but not recommended

It is possible to use any language, including cyrillic letters or even hieroglyphs, like this:

```js
let имя = '...';
let 我 = '...';

```

Technically, there is no error here. Such names are allowed, but there is an international convention to use English in variable names. Even if we’re writing a small script, it may have a long life ahead. People from other countries may need to read it some time.

- Warn: Reserved names

There is a list of reserved words, which cannot be used as variable names because they are used by the language itself.

For example: let, class, return, and function are reserved.

The code below gives a syntax error:

```js
let let = 5; // can't name a variable "let", error!
let return = 5; // also can't name it "return", error!

```

- Warn: An assignment without use strict

Normally, we need to define a variable before using it. But in the old times, it was technically possible to create a variable by a mere assignment of the value without using let. This still works now if we don’t put use strict in our scripts to maintain compatibility with old scripts.

```js
// note: no "use strict" in this example
num = 5; // the variable "num" is created if it didn't exist
alert(num); // 5

```

This is a bad practice and would cause an error in strict mode:

```js
"use strict";
num = 5; // error: num is not defined

```

### Constants

To declare a constant (unchanging) variable, use const instead of let:

```js
const myBirthday = '18.04.1982';

```

Variables declared using const are called “constants”. They cannot be reassigned. An attempt to do so would cause an error:

```js
const myBirthday = '18.04.1982';

myBirthday = '01.01.2001'; // error, can't reassign the constant!

```

When a programmer is sure that a variable will never change, they can declare it with const to guarantee and clearly communicate that fact to everyone.

#### Uppercase constants

There is a widespread practice to use constants as aliases for difficult-to-remember values that are known prior to execution.

Such constants are named using capital letters and underscores.

For instance, let’s make constants for colors in so-called “web” (hexadecimal) format:

```js
const COLOR_RED = "#F00";
const COLOR_GREEN = "#0F0";
const COLOR_BLUE = "#00F";
const COLOR_ORANGE = "#FF7F00";

// ...when we need to pick a color
let color = COLOR_ORANGE;
alert(color); // #FF7F00

```

Benefits:

- COLOR_ORANGE is much easier to remember than "#FF7F00".

- It is much easier to mistype "#FF7F00" than COLOR_ORANGE.

- When reading the code, COLOR_ORANGE is much more meaningful than #FF7F00.

When should we use capitals for a constant and when should we name it normally? Let’s make that clear.

For instance:

```js
const pageLoadTime = /* time taken by a webpage to load */;

```

The value of pageLoadTime is not known prior to the page load, so it’s named normally. But it’s still a constant because it doesn’t change after assignment.

In other words, capital-named constants are only used as aliases for “hard-coded” values.

**Name things right**

Talking about variables, there’s one more extremely important thing.

A variable name should have a clean, obvious meaning, describing the data that it stores.

Variable naming is one of the most important and complex skills in programming. A quick glance at variable names can reveal which code was written by a beginner versus an experienced developer.

In a real project, most of the time is spent modifying and extending an existing code base rather than writing something completely separate from scratch. When we return to some code after doing something else for a while, it’s much easier to find information that is well-labeled. Or, in other words, when the variables have good names.

Please spend time thinking about the right name for a variable before declaring it. Doing so will repay you handsomely.

Some good-to-follow rules are:

- Use human-readable names like userName or shoppingCart.
- Stay away from abbreviations or short names like a, b, c, unless you really know what you’re doing.
- Make names maximally descriptive and concise. Examples of bad names are data and value. Such names say nothing. It’s only okay to use them if the context of the code makes it exceptionally obvious which data or value the variable is referencing.
- Agree on terms within your team and in your own mind. If a site visitor is called a “user” then we should name related variables currentUser or newUser instead of currentVisitor or newManInTown.

Sounds simple? Indeed it is, but creating descriptive and concise variable names in practice is not. Go for it.

**Summary**

We can declare variables to store data by using the var, let, or const keywords.

- let – is a modern variable declaration.
- var – is an old-school variable declaration. Normally we don’t use it at all, but we’ll cover subtle differences from let in the chapter The old "var", just in case you need them.
- const – is like let, but the value of the variable can’t be changed.

Variables should be named in a way that allows us to easily understand what’s inside them.

## Data types

A value in JavaScript is always of a certain type. For example, a string or a number.

There are eight basic data types in JavaScript. Here, we’ll cover them in general and in the next chapters we’ll talk about each of them in detail.

We can put any type in a variable. For example, a variable can at one moment be a string and then store a number:

```js
// no error
let message = "hello";
message = 123456;

```

Programming languages that allow such things, such as JavaScript, are called “dynamically typed”, meaning that there exist data types, but variables are not bound to any of them.

### Number 

```js
let n = 123;
n = 12.345;
```

There are many operations for numbers, e.g. multiplication *, division /, addition +, subtraction -, and so on.

Besides regular numbers, there are so-called “special numeric values” which also belong to this data type: Infinity, -Infinity and NaN.

- Infinity represents the mathematical Infinity ∞. It is a special value that’s greater than any number.

We can get it as a result of division by zero:

```js
alert( 1 / 0 ); // Infinity

```

Or just reference it directly:

```js
alert( Infinity ); // Infinity

```

- NaN represents a computational error. It is a result of an incorrect or an undefined mathematical operation, for instance:

```js
alert( "not a number" / 2 ); // NaN, such division is erroneous

```

NaN is sticky. Any further operation on NaN returns NaN:

```js
alert( "not a number" / 2 + 5 ); // NaN

```

So, if there’s a NaN somewhere in a mathematical expression, it propagates to the whole result.

__________
- Info: Mathematical operations are safe

Doing maths is “safe” in JavaScript. We can do anything: divide by zero, treat non-numeric strings as numbers, etc.

The script will never stop with a fatal error (“die”). At worst, we’ll get NaN as the result.
__________

Special numeric values formally belong to the “number” type. Of course they are not numbers in the common sense of this word.

We’ll see more about working with numbers in the chapter Numbers.

### BigInt

In JavaScript, the “number” type cannot represent integer values larger than (2^253-1) (that’s 9007199254740991), or less than -(2^253-1) for negatives. It’s a technical limitation caused by their internal representation.

For most purposes that’s quite enough, but sometimes we need really big numbers, e.g. for cryptography or microsecond-precision timestamps.

BigInt type was recently added to the language to represent integers of arbitrary length.

A BigInt value is created by appending n to the end of an integer:

// the "n" at the end means it's a BigInt
const bigInt = 1234567890123456789012345678901234567890n;

As BigInt numbers are rarely needed, we don’t cover them here, but devoted them a separate chapter BigInt. Read it when you need such big numbers.

__________
- Info : Compatibility issues

Right now, BigInt is supported in Firefox/Chrome/Edge/Safari, but not in IE.
__________

### String

A string in JavaScript must be surrounded by quotes.

```js
let str = "Hello";
let str2 = 'Single quotes are ok too';
let phrase = `can embed another ${str}`;

```

In JavaScript, there are 3 types of quotes.

1. Double quotes: "Hello".
2. Single quotes: 'Hello'.
3. Backticks: `Hello`.

Double and single quotes are “simple” quotes. There’s practically no difference between them in JavaScript.

Backticks are “extended functionality” quotes. They allow us to embed variables and expressions into a string by wrapping them in ${…}, for example:

```js
let name = "John";

// embed a variable
alert( `Hello, ${name}!` ); // Hello, John!

// embed an expression
alert( `the result is ${1 + 2}` ); // the result is 3

```

The expression inside ${…} is evaluated and the result becomes a part of the string. We can put anything in there: a variable like name or an arithmetical expression like 1 + 2 or something more complex.

Please note that this can only be done in backticks. Other quotes don’t have this embedding functionality!

```js
alert( "the result is ${1 + 2}" ); // the result is ${1 + 2} (double quotes do nothing)

```

We’ll cover strings more thoroughly in the chapter Strings.

__________
- Info : There is no character type.
In some languages, there is a special “character” type for a single character. For example, in the C language and in Java it is called “char”.

In JavaScript, there is no such type. There’s only one type: string. A string may consist of zero characters (be empty), one character or many of them.
__________

### Boolean (logical type)

The boolean type has only two values: true and false.

This type is commonly used to store yes/no values: true means “yes, correct”, and false means “no, incorrect”.

For instance:

```js
let nameFieldChecked = true; // yes, name field is checked
let ageFieldChecked = false; // no, age field is not checked

```

Boolean values also come as a result of comparisons:

```js
let isGreater = 4 > 1;

alert( isGreater ); // true (the comparison result is "yes")

```

We’ll cover booleans more deeply in the chapter Logical operators.

### The “null” value

The special null value does not belong to any of the types described above.

It forms a separate type of its own which contains only the null value:

```js
let age = null;

```

In JavaScript, null is not a “reference to a non-existing object” or a “null pointer” like in some other languages.

It’s just a special value which represents “nothing”, “empty” or “value unknown”.

The code above states that age is unknown.

### The “undefined” value

The special value undefined also stands apart. It makes a type of its own, just like null.

The meaning of undefined is “value is not assigned”.

If a variable is declared, but not assigned, then its value is undefined:

```js
let age;

alert(age); // shows "undefined"

```

Technically, it is possible to explicitly assign undefined to a variable:

```js
let age = 100;

// change the value to undefined
age = undefined;

alert(age); // "undefined"

```

…But we don’t recommend doing that. Normally, one uses null to assign an “empty” or “unknown” value to a variable, while undefined is reserved as a default initial value for unassigned things.

### Objects and Symbols

The object type is special.

All other types are called “primitive” because their values can contain only a single thing (be it a string or a number or whatever). In contrast, objects are used to store collections of data and more complex entities.

Being that important, objects deserve a special treatment. We’ll deal with them later in the chapter Objects, after we learn more about primitives.

The symbol type is used to create unique identifiers for objects. We have to mention it here for the sake of completeness, but also postpone the details till we know objects.

### The typeof operator

The typeof operator returns the type of the argument. It’s useful when we want to process values of different types differently or just want to do a quick check.

It supports two forms of syntax:

As an operator: typeof x.
As a function: typeof(x).

In other words, it works with parentheses or without them. The result is the same.

The call to typeof x returns a string with the type name:

```js
typeof undefined // "undefined"

typeof 0 // "number"

typeof 10n // "bigint"

typeof true // "boolean"

typeof "foo" // "string"

typeof Symbol("id") // "symbol"

typeof Math // "object"  (1)

typeof null // "object"  (2)

typeof alert // "function"  (3)

```

The last three lines may need additional explanation:

1. Math is a built-in object that provides mathematical operations. We will learn it in the chapter Numbers. Here, it serves just as an example of an object.

2. The result of typeof null is "object". That’s an officially recognized error in typeof behavior, coming from the early days of JavaScript and kept for compatibility. Definitely, null is not an object. It is a special value with a separate type of its own.

3. The result of typeof alert is "function", because alert is a function. We’ll study functions in the next chapters where we’ll also see that there’s no special “function” type in JavaScript. Functions belong to the object type. But typeof treats them differently, returning "function". That also comes from the early days of JavaScript. Technically, such behavior isn’t correct, but can be convenient in practice.

### Summary

There are 8 basic data types in JavaScript.

- number : for numbers of any kind: integer or floating-point, integers are limited by ±(253-1).
- bigint : is for integer numbers of arbitrary length.
- string for strings. : A string may have zero or more characters, there’s no separate single-character type.
- boolean : for true/false.
- null : for unknown values – a standalone type that has a single value null.
- undefined : for unassigned values – a standalone type that has a single value undefined.
- object : for more complex data structures.
- symbol for unique identifiers.

The typeof operator allows us to see which type is stored in a variable.

- Two forms: typeof x or typeof(x).
- Returns a string with the name of the type, like "string".
- For null returns "object" – this is an error in the language, it’s not actually an object.

In the next chapters, we’ll concentrate on primitive values and once we’re familiar with them, we’ll move on to objects.

https://javascript.info/types

## Interaction: alert, prompt, confirm

As we’ll be using the browser as our demo environment, let’s see a couple of functions to interact with the user: alert, prompt and confirm.

### alert

This one we’ve seen already. It shows a message and waits for the user to press “OK”.

For example:

```js
alert("Hello");

```

The mini-window with the message is called a modal window. The word “modal” means that the visitor can’t interact with the rest of the page, press other buttons, etc, until they have dealt with the window. In this case – until they press “OK”.

### prompt

The function prompt accepts two arguments:

```js
result = prompt(title, [default]);

```

It shows a modal window with a text message, an input field for the visitor, and the buttons OK/Cancel.

title : The text to show the visitor.

default : An optional second parameter, the initial value for the input field.

__________
- Info:  The square brackets in syntax [...]

The square brackets around default in the syntax above denote that the parameter is optional, not required.
__________

The visitor can type something in the prompt input field and press OK. Then we get that text in the result. Or they can cancel the input by pressing Cancel or hitting the Esc key, then we get null as the result.

The call to prompt returns the text from the input field or null if the input was canceled.

For instance:

```js
let age = prompt('How old are you?', 100);

alert(`You are ${age} years old!`); // You are 100 years old!

```

### confirm

The syntax:

```js
result = confirm(question);

```

The function confirm shows a modal window with a question and two buttons: OK and Cancel.

The result is true if OK is pressed and false otherwise.

For example:

```js
let isBoss = confirm("Are you the boss?");

alert( isBoss ); // true if OK is pressed

```

### Summary

We covered 3 browser-specific functions to interact with visitors:

alert : shows a message.

prompt : shows a message asking the user to input text. It returns the text or, if Cancel button or Esc is clicked, null.

confirm : shows a message and waits for the user to press “OK” or “Cancel”. It returns true for OK and false for Cancel/Esc.

All these methods are modal: they pause script execution and don’t allow the visitor to interact with the rest of the page until the window has been dismissed.

There are two limitations shared by all the methods above:

1. The exact location of the modal window is determined by the browser. Usually, it’s in the center.

2. The exact look of the window also depends on the browser. We can’t modify it.

That is the price for simplicity. There are other ways to show nicer windows and richer interaction with the visitor, but if “bells and whistles” do not matter much, these methods work just fine.

## Type Conversions

Most of the time, operators and functions automatically convert the values given to them to the right type.

For example, alert automatically converts any value to a string to show it. Mathematical operations convert values to numbers.

There are also cases when we need to explicitly convert a value to the expected type. 

__________
 - Note: Not talking about objects yet

In this chapter, we won’t cover objects. For now we’ll just be talking about primitives.

Later, after we learn about objects, in the chapter Object to primitive conversion we’ll see how objects fit in.
__________

### String Conversion

String conversion happens when we need the string form of a value.

For example, alert(value) does it to show the value.

We can also call the String(value) function to convert a value to a string:

```js
let value = true;
alert(typeof value); // boolean

value = String(value); // now value is a string "true"
alert(typeof value); // string

```

String conversion is mostly obvious. A false becomes "false", null becomes "null", etc.

### Numeric Conversion

Numeric conversion happens in mathematical functions and expressions automatically.

For example, when division / is applied to non-numbers:

```js
alert( "6" / "2" ); // 3, strings are converted to numbers

```

We can use the Number(value) function to explicitly convert a value to a number:

```js
let str = "123";
alert(typeof str); // string

let num = Number(str); // becomes a number 123

alert(typeof num); // number

```

Explicit conversion is usually required when we read a value from a string-based source like a text form but expect a number to be entered.

If the string is not a valid number, the result of such a conversion is NaN. For instance:

```js
let age = Number("an arbitrary string instead of a number");

alert(age); // NaN, conversion failed

```

Numeric conversion rules:

```
Value	    Becomes…
undefined	    NaN
null            0
true and false	1 and 0
string	        Whitespaces from the start and end are removed. If the remaining string is empty, the result is 0. Otherwise, the number is “read” from the string. An error gives NaN.

```

Examples:

```js
alert( Number("   123   ") ); // 123
alert( Number("123z") );      // NaN (error reading a number at "z")
alert( Number(true) );        // 1
alert( Number(false) );       // 0

```

Please note that null and undefined behave differently here: null becomes zero while undefined becomes NaN.

Most mathematical operators also perform such conversion, we’ll see that in the next chapter. 

### Boolean Conversion

Boolean conversion is the simplest one.

It happens in logical operations (later we’ll meet condition tests and other similar things) but can also be performed explicitly with a call to Boolean(value).

The conversion rule:

Values that are intuitively “empty”, like 0, an empty string, null, undefined, and NaN, become false.
Other values become true.

For instance:

```js
alert( Boolean(1) ); // true
alert( Boolean(0) ); // false

alert( Boolean("hello") ); // true
alert( Boolean("") ); // false

```
__________
-Warn: Please note: the string with zero "0" is true
Some languages (namely PHP) treat "0" as false. But in JavaScript, a non-empty string is always true.

```js
alert( Boolean("0") ); // true
alert( Boolean(" ") ); // spaces, also true (any non-empty string is true)

```
__________

### Summary

The three most widely used type conversions are to string, to number, and to boolean.

String Conversion – Occurs when we output something. Can be performed with String(value). The conversion to string is usually obvious for primitive values.

Numeric Conversion – Occurs in math operations. Can be performed with Number(value).

The conversion follows the rules:

```
Value	Becomes…
undefined	NaN
null	0
true / false	1 / 0
string	The string is read “as is”, whitespaces from both sides are ignored. An empty string becomes 0. An error gives NaN.

```

Boolean Conversion – Occurs in logical operations. Can be performed with Boolean(value).

Follows the rules:

```
Value	Becomes…
0, null, undefined, NaN, ""	    false
any other value	                true

```

Most of these rules are easy to understand and memorize. The notable exceptions where people usually make mistakes are:

- undefined is NaN as a number, not 0.
- "0" and space-only strings like " " are true as a boolean.

Objects aren’t covered here. We’ll return to them later in the chapter Object to primitive conversion that is devoted exclusively to objects after we learn more basic things about JavaScript.

https://javascript.info/type-conversions


# Sources

* https://javascript.info/intro




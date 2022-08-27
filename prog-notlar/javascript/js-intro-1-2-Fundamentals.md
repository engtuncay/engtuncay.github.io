
This tutorial is mostly prepared from javascript.info website. It is very good. Some sections may be changed or removed.

Source : http://www.javascript.info


- [Fundamentals 2](#fundamentals-2)
  - [Variables](#variables)
    - [A variable](#a-variable)
    - [Variable naming](#variable-naming)
    - [Constants](#constants)
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
  - [Basic operators, maths](#basic-operators-maths)
    - [Terms: “unary”, “binary”, “operand”](#terms-unary-binary-operand)
    - [Math Operations](#math-operations)
    - [String concatenation with binary +](#string-concatenation-with-binary-)
    - [Numeric conversion, unary +](#numeric-conversion-unary-)
    - [Operator precedence](#operator-precedence)
    - [Assignment](#assignment)
    - [Chaining assignments](#chaining-assignments)
    - [Modify-in-place](#modify-in-place)
    - [Increment/decrement](#incrementdecrement)
    - [Bitwise operators](#bitwise-operators)
    - [Comma](#comma)
  - [Comparisons](#comparisons)
    - [Boolean is the result](#boolean-is-the-result)
    - [String comparison](#string-comparison)
    - [Comparison of different types](#comparison-of-different-types)
    - [Strict equality](#strict-equality)
    - [Comparison with null and undefined](#comparison-with-null-and-undefined)
    - [Summary](#summary-3)
- [Sources](#sources)


# Fundamentals 2

## Variables

Most of the time, a JavaScript application needs to work with information. Here are two examples:

1. An online shop – the information might include goods being sold and a shopping cart.
2. A chat application – the information might include users, messages, and much more.

Variables are used to store this information.

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

The name must contain only letters, digits, or the symbols $ and _.

The first character must not be a digit.

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

**Uppercase constants**

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

Use human-readable names like userName or shoppingCart.
Stay away from abbreviations or short names like a, b, c, unless you really know what you’re doing.
Make names maximally descriptive and concise. Examples of bad names are data and value. Such names say nothing. It’s only okay to use them if the context of the code makes it exceptionally obvious which data or value the variable is referencing.
Agree on terms within your team and in your own mind. If a site visitor is called a “user” then we should name related variables currentUser or newUser instead of currentVisitor or newManInTown.

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

## Basic operators, maths

We know many operators from school. They are things like addition +, multiplication *, subtraction -, and so on.

In this chapter, we’ll start with simple operators, then concentrate on JavaScript-specific aspects, not covered by school arithmetic.

### Terms: “unary”, “binary”, “operand”

Before we move on, let’s grasp some common terminology.

An operand – is what operators are applied to. For instance, in the multiplication of 5 * 2 there are two operands: the left operand is 5 and the right operand is 2. Sometimes, people call these “arguments” instead of “operands”.

An operator is unary if it has a single operand. For example, the unary negation - reverses the sign of a number:

```js
let x = 1;

x = -x;
alert( x ); // -1, unary negation was applied

```

An operator is binary if it has two operands. The same minus exists in binary form as well:

```js
let x = 1, y = 3;
alert( y - x ); // 2, binary minus subtracts values

```

Formally, in the examples above we have two different operators that share the same symbol: the negation operator, a unary operator that reverses the sign, and the subtraction operator, a binary operator that subtracts one number from another.

### Math Operations

The following math operations are supported:

```
Addition +,
Subtraction -,
Multiplication *,
Division /,
Remainder %,
Exponentiation **.

```

The first four are straightforward, while % and ** need a few words about them.

**Remainder %**

The remainder operator %, despite its appearance, is not related to percents.

The result of a % b is the remainder of the integer division of a by b.

For instance:

```js
alert( 5 % 2 ); // 1, a remainder of 5 divided by 2
alert( 8 % 3 ); // 2, a remainder of 8 divided by 3

```

**Exponentiation ****

The exponentiation operator a ** b multiplies a by itself b times.

For instance:

```js
alert( 2 ** 2 ); // 4  (2 multiplied by itself 2 times)
alert( 2 ** 3 ); // 8  (2 * 2 * 2, 3 times)
alert( 2 ** 4 ); // 16 (2 * 2 * 2 * 2, 4 times)

```

Mathematically, the exponentiation is defined for non-integer numbers as well. For example, a square root is an exponentiation by 1/2:

```js
alert( 4 ** (1/2) ); // 2 (power of 1/2 is the same as a square root)
alert( 8 ** (1/3) ); // 2 (power of 1/3 is the same as a cubic root)

```

### String concatenation with binary +

Let’s meet features of JavaScript operators that are beyond school arithmetics.

Usually, the plus operator + sums numbers.

But, if the binary + is applied to strings, it merges (concatenates) them:

```js
let s = "my" + "string";
alert(s); // mystring

```

Note that if any of the operands is a string, then the other one is converted to a string too.

For example:

```js
alert( '1' + 2 ); // "12"
alert( 2 + '1' ); // "21"

```

See, it doesn’t matter whether the first operand is a string or the second one.

Here’s a more complex example:

```js
alert(2 + 2 + '1' ); // "41" and not "221"

```

Here, operators work one after another. The first + sums two numbers, so it returns 4, then the next + adds the string 1 to it, so it’s like 4 + '1' = '41'.

```js
alert('1' + 2 + 2); // "122" and not "14"

```

Here, the first operand is a string, the compiler treats the other two operands as strings too. The 2 gets concatenated to '1', so it’s like '1' + 2 = "12" and "12" + 2 = "122".

The binary + is the only operator that supports strings in such a way. Other arithmetic operators work only with numbers and always convert their operands to numbers.

Here’s the demo for subtraction and division:

```js
alert( 6 - '2' ); // 4, converts '2' to a number
alert( '6' / '2' ); // 3, converts both operands to numbers

```

### Numeric conversion, unary +

The plus + exists in two forms: the binary form that we used above and the unary form.

The unary plus or, in other words, the plus operator + applied to a single value, doesn’t do anything to numbers. But if the operand is not a number, *the unary plus converts it into a number*.

For example:

```js
// No effect on numbers
let x = 1;
alert( +x ); // 1

let y = -2;
alert( +y ); // -2

// Converts non-numbers
alert( +true ); // 1
alert( +"" );   // 0

```

It actually does the same thing as Number(...), but is shorter.

The need to convert strings to numbers arises very often. For example, if we are getting values from HTML form fields, they are usually strings. What if we want to sum them?

The binary plus would add them as strings:

```js
let apples = "2";
let oranges = "3";

alert( apples + oranges ); // "23", the binary plus concatenates strings
```

If we want to treat them as numbers, we need to convert and then sum them:

```js
let apples = "2";
let oranges = "3";

// both values converted to numbers before the binary plus
alert( +apples + +oranges ); // 5

// the longer variant
// alert( Number(apples) + Number(oranges) ); // 5

```

From a mathematician’s standpoint, the abundance of pluses may seem strange. But from a programmer’s standpoint, there’s nothing special: unary pluses are applied first, they convert strings to numbers, and then the binary plus sums them up.

Why are unary pluses applied to values before the binary ones? As we’re going to see, that’s because of their *higher precedence*.

### Operator precedence

If an expression has more than one operator, the execution order is defined by their precedence, or, in other words, the default priority order of operators.

From school, we all know that the multiplication in the expression 1 + 2 * 2 should be calculated before the addition. That’s exactly the precedence thing. The multiplication is said to have a higher precedence than the addition.

Parentheses override any precedence, so if we’re not satisfied with the default order, we can use them to change it. For example, write (1 + 2) * 2.

There are many operators in JavaScript. Every operator has a corresponding precedence number. The one with the larger number executes first. If the precedence is the same, the execution order is from left to right.

Here’s an extract from the precedence table (you don’t need to remember this, but note that unary operators are higher than corresponding binary ones):
(https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/Operator_Precedence )

```
Precedence	Name	  Sign
…	…	…
17	unary plus	    +
17	unary negation	-
16	exponentiation	**
15	multiplication	*
15	division	      /
13	addition	      +
13	subtraction	    -
…	…	…
3	assignment	      =
…	…	…

```

As we can see, the “unary plus” has a priority of 17 which is higher than the 13 of “addition” (binary plus). That’s why, in the expression "+apples + +oranges", unary pluses work before the addition

### Assignment

Let’s note that an assignment = is also an operator. It is listed in the precedence table with the very low priority of 3.

That’s why, when we assign a variable, like x = 2 * 2 + 1, the calculations are done first and then the = is evaluated, storing the result in x.

```js
let x = 2 * 2 + 1;

alert( x ); // 5

```
**Assignment = returns a value**

The fact of = being an operator, not a “magical” language construct has an interesting implication.

All operators in JavaScript return a value. That’s obvious for + and -, but also true for =.

The call x = value writes the value into x and then returns it.

Here’s a demo that uses an assignment as part of a more complex expression:

```js
let a = 1;
let b = 2;

let c = 3 - (a = b + 1);

alert( a ); // 3
alert( c ); // 0

```

In the example above, the result of expression (a = b + 1) is the value which was assigned to a (that is 3). It is then used for further evaluations.

Funny code, isn’t it? We should understand how it works, because sometimes we see it in JavaScript libraries.

Although, please don’t write the code like that. Such tricks definitely don’t make code clearer or readable.

### Chaining assignments

Another interesting feature is the ability to chain assignments:

```js
let a, b, c;

a = b = c = 2 + 2;

alert( a ); // 4
alert( b ); // 4
alert( c ); // 4

```

Chained assignments evaluate from right to left. First, the rightmost expression 2 + 2 is evaluated and then assigned to the variables on the left: c, b and a. At the end, all the variables share a single value.

Once again, for the purposes of readability it’s better to split such code into few lines:

```js
c = 2 + 2;
b = c;
a = c;

```

That’s easier to read, especially when eye-scanning the code fast.

### Modify-in-place

We often need to apply an operator to a variable and store the new result in that same variable.

For example:

```js
let n = 2;
n = n + 5;
n = n * 2;

```

This notation can be shortened using the operators += and *=:

```js
let n = 2;
n += 5; // now n = 7 (same as n = n + 5)
n *= 2; // now n = 14 (same as n = n * 2)

alert( n ); // 14

```

Short “modify-and-assign” operators exist for all arithmetical and bitwise operators: /=, -=, etc.

Such operators have the same precedence as a normal assignment, so they run after most other calculations:

```js
let n = 2;

n *= 3 + 5;

alert( n ); // 16  (right part evaluated first, same as n *= 8)

```

### Increment/decrement

Increasing or decreasing a number by one is among the most common numerical operations.

So, there are special operators for it:

Increment ++ increases a variable by 1:

```js
let counter = 2;
counter++;        // works the same as counter = counter + 1, but is shorter
alert( counter ); // 3

```

Decrement -- decreases a variable by 1:

```js
let counter = 2;
counter--;        // works the same as counter = counter - 1, but is shorter
alert( counter ); // 1

```
__________
- Warn: Important:
Increment/decrement can only be applied to variables. Trying to use it on a value like 5++ will give an error.
__________

The operators ++ and -- can be placed either before or after a variable.

- When the operator goes after the variable, it is in “postfix form”: counter++.
- The “prefix form” is when the operator goes before the variable: ++counter.

Both of these statements do the same thing: increase counter by 1.

Is there any difference? Yes, but we can only see it if we use the returned value of ++/--.

Let’s clarify. As we know, all operators return a value. Increment/decrement is no exception. The prefix form returns the new value while the postfix form returns the old value (prior to increment/decrement).

To see the difference, here’s an example:

```js
let counter = 1;
let a = ++counter; // (*)

alert(a); // 2

```

In the line (*), the prefix form ++counter increments counter and returns the new value, 2. So, the alert shows 2.

Now, let’s use the postfix form:

```js
let counter = 1;
let a = counter++; // (*) changed ++counter to counter++

alert(a); // 1

```

In the line (*), the postfix form counter++ also increments counter but returns the old value (prior to increment). So, the alert shows 1.

To summarize:

If the result of increment/decrement is not used, there is no difference in which form to use:

```js
let counter = 0;
counter++;
++counter;
alert( counter ); // 2, the lines above did the same

```

If we’d like to increase a value and immediately use the result of the operator, we need the prefix form:

```js
let counter = 0;
alert( ++counter ); // 1

```

If we’d like to increment a value but use its previous value, we need the postfix form:

```js
let counter = 0;
alert( counter++ ); // 0

```

__________
- Info : Increment/decrement among other operators

The operators ++/-- can be used inside expressions as well. Their precedence is higher than most other arithmetical operations.

For instance:

```js
let counter = 1;
alert( 2 * ++counter ); // 4

```

Compare with:

```js
let counter = 1;
alert( 2 * counter++ ); // 2, because counter++ returns the "old" value

```

Though technically okay, such notation usually makes code less readable. One line does multiple things – not good.

While reading code, a fast “vertical” eye-scan can easily miss something like counter++ and it won’t be obvious that the variable increased.

We advise a style of *“one line – one action”*:

```js
let counter = 1;
alert( 2 * counter );
counter++;

```

### Bitwise operators

Bitwise operators treat arguments as *32-bit integer numbers* and work on the level of their binary representation.

These operators are not JavaScript-specific. They are supported in most programming languages.

The list of operators:

- AND ( & )
- OR ( | )
- XOR ( ^ )
- NOT ( ~ )
- LEFT SHIFT ( << )
- RIGHT SHIFT ( >> )
- ZERO-FILL RIGHT SHIFT ( >>> )

These operators are used very rarely, when we need to fiddle with numbers on the very lowest (bitwise) level. We won’t need these operators any time soon, as web development has little use of them, but in some special areas, such as cryptography, they are useful. You can read the Bitwise Operators chapter on MDN when a need arises.

### Comma

The comma operator , is one of the rarest and most unusual operators. Sometimes, it’s used to write shorter code, so we need to know it in order to understand what’s going on.

The comma operator allows us to evaluate several expressions, dividing them with a comma ,. Each of them is evaluated but only the result of the last one is returned.

```js
let a = (1 + 2, 3 + 4);

alert( a ); // 7 (the result of 3 + 4)

```

Here, the first expression 1 + 2 is evaluated and its result is thrown away. Then, 3 + 4 is evaluated and returned as the result.

__________
- Info : Comma has a very low precedence

Please note that the comma operator has very low precedence, lower than =, so parentheses are important in the example above.

Without them: a = 1 + 2, 3 + 4 evaluates + first, summing the numbers into a = 3, 7, then the assignment operator = assigns a = 3, and the rest is ignored. It’s like (a = 1 + 2), 3 + 4.

Why do we need an operator that throws away everything except the last expression?

Sometimes, people use it in more complex constructs to put several actions in one line.

For example:

```js
// three operations in one line
for (a = 1, b = 3, c = a * b; a < 10; a++) {
 ...
}

```

Such tricks are used in many JavaScript frameworks. That’s why we’re mentioning them. But usually they don’t improve code readability so we should think well before using them.

## Comparisons

We know many comparison operators from maths.

In JavaScript they are written like this:

- Greater/less than: a > b, a < b.

- Greater/less than or equals: a >= b, a <= b.

- Equals: a == b, please note the double equality sign == means the equality test, while a single one a = b means an assignment.

- Not equals. In maths the notation is ≠, but in JavaScript it’s written as a != b.

In this article we’ll learn more about different types of comparisons, how JavaScript makes them, including important peculiarities.

At the end you’ll find a good recipe to avoid “JavaScript quirks”-related issues.

### Boolean is the result

All comparison operators return a boolean value:

- true – means “yes”, “correct” or “the truth”.

- false – means “no”, “wrong” or “not the truth”.

For example:

```js
alert( 2 > 1 );  // true (correct)
alert( 2 == 1 ); // false (wrong)
alert( 2 != 1 ); // true (correct)

```

A comparison result can be assigned to a variable, just like any value:

```js
let result = 5 > 4; // assign the result of the comparison
alert( result ); // true

```

### String comparison

To see whether a string is greater than another, JavaScript uses the so-called “dictionary” or “lexicographical” order.

In other words, strings are compared letter-by-letter.

For example:

```js
alert( 'Z' > 'A' ); // true
alert( 'Glow' > 'Glee' ); // true
alert( 'Bee' > 'Be' ); // true

```

The algorithm to compare two strings is simple:

1. Compare the first character of both strings.

2. If the first character from the first string is greater (or less) than the other string’s, then the first string is greater (or less) than the second. We’re done.

3. Otherwise, if both strings’ first characters are the same, compare the second characters the same way.

4. Repeat until the end of either string.

5. If both strings end at the same length, then they are equal. Otherwise, the longer string is greater.

In the first example above, the comparison 'Z' > 'A' gets to a result at the first step.

The second comparison 'Glow' and 'Glee' needs more steps as strings are compared character-by-character:

1. G is the same as G.
2. l is the same as l.
3. o is greater than e. Stop here. The first string is greater.

__________
- Info : Not a real dictionary, but Unicode order
- 
The comparison algorithm given above is roughly equivalent to the one used in dictionaries or phone books, but it’s not exactly the same.

For instance, case matters. A capital letter "A" is not equal to the lowercase "a". Which one is greater? The lowercase "a". Why? Because the lowercase character has a greater index in the internal encoding table JavaScript uses (Unicode). We’ll get back to specific details and consequences of this in the chapter Strings.
__________

### Comparison of different types

When comparing values of different types, JavaScript converts the values to numbers.

For example:

```js
alert( '2' > 1 ); // true, string '2' becomes a number 2
alert( '01' == 1 ); // true, string '01' becomes a number 1

```

For boolean values, true becomes 1 and false becomes 0.

For example:

```js
alert( true == 1 ); // true
alert( false == 0 ); // true

```

__________
- Info : A funny consequence

It is possible that at the same time:

- Two values are equal.

- One of them is true as a boolean and the other one is false as a boolean.

For example:

```js
let a = 0;
alert( Boolean(a) ); // false

let b = "0";
alert( Boolean(b) ); // true

alert(a == b); // true!

```

From JavaScript’s standpoint, this result is quite normal. An equality check converts values using the numeric conversion (hence "0" becomes 0), while the explicit Boolean conversion uses another set of rules.
__________

### Strict equality

A regular equality check == has a problem. It cannot differentiate 0 from false:

```js
alert( 0 == false ); // true

```

The same thing happens with an empty string:

```js
alert( '' == false ); // true

```

This happens because operands of different types are converted to numbers by the equality operator ==. An empty string, just like false, becomes a zero.

What to do if we’d like to differentiate 0 from false?

*A strict equality operator === checks the equality without type conversion.*

In other words, if a and b are of different types, then a === b immediately returns false without an attempt to convert them.

Let’s try it:

```js
alert( 0 === false ); // false, because the types are different

```

There is also a “strict non-equality” operator !== analogous to !=.

The strict equality operator is a bit longer to write, but makes it obvious what’s going on and leaves less room for errors.

### Comparison with null and undefined

There’s a non-intuitive behavior when null or undefined are compared to other values.

**For a strict equality check ===**

These values are different, because each of them is a different type.

```js
alert( null === undefined ); // false

```

**For a non-strict check ==**

There’s a special rule. These two are a “sweet couple”: they equal each other (in the sense of ==), but not any other value.

```js
alert( null == undefined ); // true

```

**For maths and other comparisons < > <= >=**

null/undefined are converted to numbers: null becomes 0, while undefined becomes NaN.

Now let’s see some funny things that happen when we apply these rules. And, what’s more important, how to not fall into a trap with them.

**Strange result: null vs 0**

Let’s compare null with a zero:

```js
alert( null > 0 );  // (1) false
alert( null == 0 ); // (2) false
alert( null >= 0 ); // (3) true

```

Mathematically, that’s strange. The last result states that "null is greater than or equal to zero", so in one of the comparisons above it must be true, but they are both false.

The reason is that an equality check == and comparisons > < >= <= work differently. Comparisons convert null to a number, treating it as 0. That’s why (3) null >= 0 is true and (1) null > 0 is false.

On the other hand, the equality check == for undefined and null is defined such that, *without any conversions*, *they equal each other and don’t equal anything else*. That’s why (2) null == 0 is false.

**An incomparable undefined**

The value undefined shouldn’t be compared to other values:

```js
alert( undefined > 0 ); // false (1)
alert( undefined < 0 ); // false (2)
alert( undefined == 0 ); // false (3)

```
Why does it dislike zero so much? Always false!

We get these results because:

Comparisons (1) and (2) return false because undefined gets converted to NaN and NaN is a special numeric value which returns false for all comparisons.
The equality check (3) returns false because undefined only equals null, undefined, and no other value.

**Avoid problems**

Why did we go over these examples? Should we remember these peculiarities all the time? Well, not really. Actually, these tricky things will gradually become familiar over time, but there’s a solid way to avoid problems with them:

- Treat any comparison with undefined/null except the strict equality === with exceptional care.

- Don’t use comparisons >= > < <= with a variable which may be null/undefined, unless you’re really sure of what you’re doing. If a variable can have these values, check for them separately.

### Summary

- Comparison operators return a boolean value.

- Strings are compared letter-by-letter in the “dictionary” order.

- When values of different types are compared, they get converted to numbers (with the exclusion of a strict equality check).

- The values null and undefined equal == each other and do not equal any other value.

- Be careful when using comparisons like > or < with variables that can occasionally be null/undefined. Checking for null/undefined separately is a good idea.

# Sources

* https://javascript.info/intro




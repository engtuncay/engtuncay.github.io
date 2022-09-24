
- [Data Types](#data-types)
  - [Methods of primitives](#methods-of-primitives)
    - [A primitive as an object](#a-primitive-as-an-object)
    - [Summary](#summary)
  - [Numbers](#numbers)
  - [Strings](#strings)
  - [Arrays](#arrays)
  - [Array methods](#array-methods)
  - [Iterables](#iterables)
  - [Map and Set](#map-and-set)
  - [WeakMap and WeakSet](#weakmap-and-weakset)
  - [Object.keys, values, entries](#objectkeys-values-entries)
  - [Destructing assignment](#destructing-assignment)
  - [Date and Time](#date-and-time)
  - [JSON Methods, toJSON](#json-methods-tojson)

# Data Types

## Methods of primitives

JavaScript allows us to work with primitives (strings, numbers, etc.) as if they were objects. They also provide methods to call as such. We will study those soon, but first we’ll see how it works because, of course, primitives are not objects (and here we will make it even clearer).

Let’s look at the key distinctions between primitives and objects.

A primitive

- Is a value of a primitive type.

- There are 7 primitive types: string, number, bigint, boolean, symbol, null and undefined.

An object

- Is capable of storing multiple values as properties.

- Can be created with {}, for instance: {name: "John", age: 30}. There are other kinds of objects in JavaScript: functions, for example, are objects.

One of the best things about objects is that we can store a function as one of its properties.

```js
let john = {
  name: "John",
  sayHi: function() {
    alert("Hi buddy!");
  }
};

john.sayHi(); // Hi buddy!

```

So here we’ve made an object john with the method sayHi.

Many built-in objects already exist, such as those that work with dates, errors, HTML elements, etc. They have different properties and methods.

But, these features come with a cost!

Objects are “heavier” than primitives. They require additional resources to support the internal machinery.

### A primitive as an object

Here’s the paradox faced by the creator of JavaScript:

- There are many things one would want to do with a primitive like a string or a number. It would be great to access them using methods.
- Primitives must be as fast and lightweight as possible.
The solution looks a little bit awkward, but here it is:

1. Primitives are still primitive. A single value, as desired.
2. The language allows access to methods and properties of strings, numbers, booleans and symbols.
3. In order for that to work, a special “object wrapper” that provides the extra functionality is created, and then is destroyed.

The “object wrappers” are different for each primitive type and are called: String, Number, Boolean and Symbol. Thus, they provide different sets of methods.

For instance, there exists a string method str.toUpperCase() that returns a capitalized str.

Here’s how it works

```js
let str = "Hello";

alert( str.toUpperCase() ); // HELLO

```

Simple, right? Here’s what actually happens in str.toUpperCase():

1. The string str is a primitive. So in the moment of accessing its property, a special object is created that knows the value of the string, and has useful methods, like toUpperCase().

2. That method runs and returns a new string (shown by alert).

3. The special object is destroyed, leaving the primitive str alone.

So primitives can provide methods, but they still remain lightweight.

The JavaScript engine highly optimizes this process. It may even skip the creation of the extra object at all. But it must still adhere to the specification and behave as if it creates one.

A number has methods of its own, for instance, *toFixed(n)* rounds the number to the given precision:

```js
let n = 1.23456;

alert( n.toFixed(2) ); // 1.23

```

We’ll see more specific methods in chapters Numbers and Strings.

__________
- Warn: Constructors String/Number/Boolean are for internal use only

Some languages like Java allow us to explicitly create “wrapper objects” for primitives using a syntax like new Number(1) or new Boolean(false).

In JavaScript, that’s also possible for historical reasons, but highly unrecommended. Things will go crazy in several places.

For instance:

```js
alert( typeof 0 ); // "number"

alert( typeof new Number(0) ); // "object"!

```

Objects are always truthy in if, so here the alert will show up:

```js
let zero = new Number(0);

if (zero) { // zero is true, because it's an object
  alert( "zero is truthy!?!" );
}

```

On the other hand, using the same functions String/Number/Boolean without new is a totally sane and useful thing. They convert a value to the corresponding type: to a string, a number, or a boolean (primitive).

For example, this is entirely valid:

```js
let num = Number("123"); // convert a string to number

```

__________
- Warn: null/undefined have no methods

The special primitives null and undefined are exceptions. They have no corresponding “wrapper objects” and provide no methods. In a sense, they are “the most primitive”.

An attempt to access a property of such value would give the error:

```js
alert(null.test); // error

```
__________  

### Summary

- Primitives except null and undefined provide many helpful methods. We will study those in the upcoming chapters

- Formally, these methods work via temporary objects, but JavaScript engines are well tuned to optimize that internally, so they are not expensive to call.

__________
## Numbers

In modern JavaScript, there are two types of numbers:

1- Regular numbers in JavaScript are stored in 64-bit format IEEE-754, also known as “double precision floating point numbers”. These are numbers that we’re using most of the time, and we’ll talk about them in this chapter.

2- BigInt numbers, to represent integers of arbitrary length. They are sometimes needed, because a regular number can’t exceed 253 or be less than -253. As bigints are used in few special areas, we devote them a special chapter BigInt.

So here we’ll talk about regular numbers. Let’s expand our knowledge of them.

More ways to write a number
Imagine we need to write 1 billion. The obvious way is:

let billion = 1000000000;

We also can use underscore _ as the separator:

let billion = 1_000_000_000;

Here the underscore _ plays the role of the “syntactic sugar”, it makes the number more readable. The JavaScript engine simply ignores _ between digits, so it’s exactly the same one billion as above.

In real life though, we try to avoid writing long sequences of zeroes. We’re too lazy for that. We’ll try to write something like "1bn" for a billion or "7.3bn" for 7 billion 300 million. The same is true for most large numbers.

In JavaScript, we can shorten a number by appending the letter "e" to it and specifying the zeroes count:

let billion = 1e9;  // 1 billion, literally: 1 and 9 zeroes

alert( 7.3e9 );  // 7.3 billions (same as 7300000000 or 7_300_000_000)

In other words, e multiplies the number by 1 with the given zeroes count.

1e3 = 1 * 1000 // e3 means *1000
1.23e6 = 1.23 * 1000000 // e6 means *1000000

Now let’s write something very small. Say, 1 microsecond (one millionth of a second):

let ms = 0.000001;

Just like before, using "e" can help. If we’d like to avoid writing the zeroes explicitly, we could say the same as:

let ms = 1e-6; // six zeroes to the left from 1

If we count the zeroes in 0.000001, there are 6 of them. So naturally it’s 1e-6.

In other words, a negative number after "e" means a division by 1 with the given number of zeroes:

// -3 divides by 1 with 3 zeroes
1e-3 = 1 / 1000 (=0.001)

// -6 divides by 1 with 6 zeroes
1.23e-6 = 1.23 / 1000000 (=0.00000123)

Hex, binary and octal numbers

Hexadecimal (https://en.wikipedia.org/wiki/Hexadecimal) numbers are widely used in JavaScript to represent colors, encode characters, and for many other things. So naturally, there exists a shorter way to write them: 0x and then the number.

For instance:

alert( 0xff ); // 255
alert( 0xFF ); // 255 (the same, case doesn't matter)

Binary and octal numeral systems are rarely used, but also supported using the 0b and 0o prefixes:

let a = 0b11111111; // binary form of 255
let b = 0o377; // octal form of 255

alert( a == b ); // true, the same number 255 at both sides

There are only 3 numeral systems with such support. For other numeral systems, we should use the function parseInt (which we will see later in this chapter).

toString(base)
The method num.toString(base) returns a string representation of num in the numeral system with the given base.

For example:

let num = 255;

alert( num.toString(16) );  // ff
alert( num.toString(2) );   // 11111111

The base can vary from 2 to 36. By default it’s 10.

Common use cases for this are:

base=16 is used for hex colors, character encodings etc, digits can be 0..9 or A..F.
base=2 is mostly for debugging bitwise operations, digits can be 0 or 1.
base=36 is the maximum, digits can be 0..9 or A..Z. The whole latin alphabet is used to represent a number. A funny, but useful case for 36 is when we need to turn a long numeric identifier into something shorter, for example to make a short url. Can simply represent it in the numeral system with base 36:


alert( 123456..toString(36) ); // 2n9c

Warn: Two dots to call a method
Please note that two dots in 123456..toString(36) is not a typo. If we want to call a method directly on a number, like toString in the example above, then we need to place two dots .. after it.

If we placed a single dot: 123456.toString(36), then there would be an error, because JavaScript syntax implies the decimal part after the first dot. And if we place one more dot, then JavaScript knows that the decimal part is empty and now goes the method.

Also could write (123456).toString(36).

Rounding
One of the most used operations when working with numbers is rounding.

There are several built-in functions for rounding:

Math.floor
Rounds down: 3.1 becomes 3, and -1.1 becomes -2.
Math.ceil
Rounds up: 3.1 becomes 4, and -1.1 becomes -1.
Math.round
Rounds to the nearest integer: 3.1 becomes 3, 3.6 becomes 4, the middle case: 3.5 rounds up to 4 too.

Math.trunc (not supported by Internet Explorer)
Removes anything after the decimal point without rounding: 3.1 becomes 3, -1.1 becomes -1.

Here’s the table to summarize the differences between them:


Number Math.floor -Math.ceil - Math.round - Math.trunc
3.1	3	4	3	3
3.6	3	4	4	3
-1.1	-2	-1	-1	-1
-1.6	-2	-1	-2	-1

These functions cover all of the possible ways to deal with the decimal part of a number. But what if we’d like to round the number to n-th digit after the decimal?

For instance, we have 1.2345 and want to round it to 2 digits, getting only 1.23.

There are two ways to do so:

1. Multiply-and-divide.

For example, to round the number to the 2nd digit after the decimal, we can multiply the number by 100 (or a bigger power of 10), call the rounding function and then divide it back.

let num = 1.23456;

alert( Math.round(num * 100) / 100 ); // 1.23456 -> 123.456 -> 123 -> 1.23

2. The method toFixed(n) rounds the number to n digits after the point and returns a string representation of the result.

let num = 12.34;
alert( num.toFixed(1) ); // "12.3"

This rounds up or down to the nearest value, similar to Math.round:

let num = 12.36;
alert( num.toFixed(1) ); // "12.4"

Please note that result of toFixed is a string. If the decimal part is shorter than required, zeroes are appended to the end:

let num = 12.34;
alert( num.toFixed(5) ); // "12.34000", added zeroes to make exactly 5 digits

We can convert it to a number using the unary plus or a Number() call: +num.toFixed(5).

Imprecise calculations
Internally, a number is represented in 64-bit format IEEE-754, so there are exactly 64 bits to store a number: 52 of them are used to store the digits, 11 of them store the position of the decimal point (they are zero for integer numbers), and 1 bit is for the sign.

If a number is too big, it would

overflow the 64-bit storage, potentially giving an infinity:
 

alert( 1e500 ); // Infinity

What may be a little less obvious, but happens quite often, is the loss of precision.

Consider this (falsy!) test:

alert( 0.1 + 0.2 == 0.3 ); // false

That’s right, if we check whether the sum of 0.1 and 0.2 is 0.3, we get false.

Strange! What is it then if not 0.3?

alert( 0.1 + 0.2 ); // 0.30000000000000004

Ouch! There are more consequences than an incorrect comparison here. Imagine you’re making an e-shopping site and the visitor puts $0.10 and $0.20 goods into their cart. The order total will be $0.30000000000000004. That would surprise anyone.

But why does this happen?

A number is stored in memory in its binary form, a sequence of bits – ones and zeroes. But fractions like 0.1, 0.2 that look simple in the decimal numeric system are actually unending fractions in their binary form.

In other words, what is 0.1? It is one divided by ten 1/10, one-tenth. In decimal numeral system such numbers are easily representable. Compare it to one-third: 1/3. It becomes an endless fraction 0.33333(3).

So, division by powers 10 is guaranteed to work well in the decimal system, but division by 3 is not. For the same reason, in the binary numeral system, the division by powers of 2 is guaranteed to work, but 1/10 becomes an endless binary fraction.

There’s just no way to store exactly 0.1 or exactly 0.2 using the binary system, just like there is no way to store one-third as a decimal fraction.


We

The numeric format IEEE-754 solves this by rounding to the nearest possible number. These rounding rules normally don’t allow us to see that “tiny precision loss”, but it exists.

We can see this in action:

alert( 0.1.toFixed(20) ); // 0.10000000000000000555

And when we sum two numbers, their “precision losses” add up.

That’s why 0.1 + 0.2 is not exactly 0.3.

Info: Not only JavaScript
The same issue exists in many other programming languages.

PHP, Java, C, Perl, Ruby give exactly the same result, because they are based on the same numeric format.

Can we work around the problem? Sure, the most reliable method is to round the result with the help of a method toFixed(n):

let sum = 0.1 + 0.2;
alert( sum.toFixed(2) ); // 0.30

Please note that toFixed always returns a string. It ensures that it has 2 digits after the decimal point. That’s actually convenient if we have an e-shopping and need to show $0.30. For other cases, we can use the unary plus to coerce it into a number:

let sum = 0.1 + 0.2;
alert( +sum.toFixed(2) ); // 0.3

We also can temporarily multiply the numbers by 100 (or a bigger number) to turn them into integers, do the maths, and then divide back. Then, as we’re doing maths with integers, the error somewhat decreases, but we still get it on division:

alert( (0.1 * 10 + 0.2 * 10) / 10 ); // 0.3
alert( (0.28 * 100 + 0.14 * 100) / 100); // 0.4200000000000001

So, multiply/divide approach reduces the error, but doesn’t remove it totally.

Sometimes we could try to evade fractions at all. Like if we’re dealing with a shop, then we can store prices in cents instead of dollars. But what if we apply a discount of 30%? In practice, totally evading fractions is rarely possible. Just round them to cut “tails” when needed.

Info: The funny thing
Try running this:

// Hello! I'm a self-increasing number!
alert( 9999999999999999 ); // shows 10000000000000000

This suffers from the same issue: a loss of precision. There are 64 bits for the number, 52 of them can be used to store digits, but that’s not enough. So the least significant digits disappear.

JavaScript doesn’t trigger an error in such events. It does its best to fit the number into the desired format, but unfortunately, this format is not big enough.

Info: Two zeroes

Another funny consequence of the internal representation of numbers is the existence of two zeroes: 0 and -0.

That’s because a sign is represented by a single bit, so it can be set or not set for any number including a zero.

In most cases the distinction is unnoticeable, because operators are suited to treat them as the same.

Tests: isFinite and isNaN

Remember these two special numeric values?

Infinity (and -Infinity) is a special numeric value that is greater (less) than anything.
NaN represents an error.

They belong to the type number, but are not “normal” numbers, so there are special functions to check for them:

isNaN(value) converts its argument to a number and then tests it for being NaN:

alert( isNaN(NaN) ); // true
alert( isNaN("str") ); // true

But do we need this function? Can’t we just use the comparison === NaN? Sorry, but the answer is no. The value NaN is unique in that it does not equal anything, including itself:

alert( NaN === NaN ); // false

isFinite(value) converts its argument to a number and returns true if it’s a regular number, not NaN/Infinity/-Infinity:
alert( isFinite("15") ); // true
alert( isFinite("str") ); // false, because a special value: NaN
alert( isFinite(Infinity) ); // false, because a special value: Infinity

Sometimes isFinite is used to validate whether a string value is a regular number:

let num = +prompt("Enter a number", '');

// will be true unless you enter Infinity, -Infinity or not a number
alert( isFinite(num) );

Please note that an empty or a space-only string is treated as 0 in all numeric functions including isFinite.

Info: Compare with Object.is
There is a special built-in method Object.is that compares values like ===, but is more reliable for two edge cases:

It works with NaN: Object.is(NaN, NaN) === true, that’s a good thing.
Values 0 and -0 are different: Object.is(0, -0) === false, technically that’s true, because internally the number has a sign bit that may be different even if all other bits are zeroes.
In all other cases, Object.is(a, b) is the same as a === b.

This way of comparison is often used in JavaScript specification. When an internal algorithm needs to compare two values for being exactly the same, it uses Object.is (internally called SameValue). (https://tc39.github.io/ecma262/#sec-samevalue)

parseInt and parseFloat
Numeric conversion using a plus + or Number() is strict. If a value is not exactly a number, it fails:

alert( +"100px" ); // NaN

The sole exception is spaces at the beginning or at the end of the string, as they are ignored.

But in real life we often have values in units, like "100px" or "12pt" in CSS. Also in many countries the currency symbol goes after the amount, so we have "19€" and would like to extract a numeric value out of that.

That’s what parseInt and parseFloat are for.

They “read” a number from a string until they can’t. In case of an error, the gathered number is returned. The function parseInt returns an integer, whilst parseFloat will return a floating-point number:

alert( parseInt('100px') ); // 100
alert( parseFloat('12.5em') ); // 12.5

alert( parseInt('12.3') ); // 12, only the integer part is returned
alert( parseFloat('12.3.4') ); // 12.3, the second point stops the reading

There are situations when parseInt/parseFloat will return NaN. It happens when no digits could be read:

alert( parseInt('a123') ); // NaN, the first symbol stops the process

Info: The second argument of parseInt(str, radix)
The parseInt() function has an optional second parameter. It specifies the base of the numeral system, so parseInt can also parse strings of hex numbers, binary numbers and so on:

alert( parseInt('0xff', 16) ); // 255
alert( parseInt('ff', 16) ); // 255, without 0x also works

alert( parseInt('2n9c', 36) ); // 123456

Other math functions
JavaScript has a built-in Math object which contains a small library of mathematical functions and constants.

A few examples:

Math.random()
Returns a random number from 0 to 1 (not including 1).

alert( Math.random() ); // 0.1234567894322
alert( Math.random() ); // 0.5435252343232
alert( Math.random() ); // ... (any random numbers)

Math.max(a, b, c...) / Math.min(a, b, c...)
Returns the greatest/smallest from the arbitrary number of arguments.

alert( Math.max(3, 5, -10, 0, 1) ); // 5
alert( Math.min(1, 2) ); // 1

Math.pow(n, power)
Returns n raised to the given power.

alert( Math.pow(2, 10) ); // 2 in power 10 = 1024

There are more functions and constants in Math object, including trigonometry, which you can find in the docs for the Math object. (https://developer.mozilla.org/en/docs/Web/JavaScript/Reference/Global_Objects/Math)

Summary

To write numbers with many zeroes:

Append "e" with the zeroes count to the number. Like: 123e6 is the same as 123 with 6 zeroes 123000000.
A negative number after "e" causes the number to be divided by 1 with given zeroes. E.g. 123e-6 means 0.000123 (123 millionths).
For different numeral systems:

Can write numbers directly in hex (0x), octal (0o) and binary (0b) systems.
parseInt(str, base) parses the string str into an integer in numeral system with given base, 2 ≤ base ≤ 36.
num.toString(base) converts a number to a string in the numeral system with the given base.
For converting values like 12pt and 100px to a number:

Use parseInt/parseFloat for the “soft” conversion, which reads a number from a string and then returns the value they could read before the error.
For fractions:

Round using Math.floor, Math.ceil, Math.trunc, Math.round or num.toFixed(precision).
Make sure to remember there’s a loss of precision when working with fractions.
More mathematical functions:

See the Math object when you need them. The library is very small, but can cover basic needs.
__________
## Strings

In JavaScript, the textual data is stored as strings. There is no separate type for a single character.

The internal format for strings is always UTF-16, it is not tied to the page encoding.

Quotes
Let’s recall the kinds of quotes.

Strings can be enclosed within either single quotes, double quotes or backticks:

let single = 'single-quoted';
let double = "double-quoted";

let backticks = `backticks`;

Single and double quotes are essentially the same. Backticks, however, allow us to embed any expression into the string, by wrapping it in ${…}:

function sum(a, b) {
  return a + b;
}

alert(`1 + 2 = ${sum(1, 2)}.`); // 1 + 2 = 3.

Another advantage of using backticks is that they allow a string to span multiple lines:

let guestList = `Guests:
 * John
 * Pete
 * Mary
`;

alert(guestList); // a list of guests, multiple lines

Looks natural, right? But single or double quotes do not work this way.

If we use them and try to use multiple lines, there’ll be an error:

let guestList = "Guests: // Error: Unexpected token ILLEGAL
  * John";

Single and double quotes come from ancient times of language creation when the need for multiline strings was not taken into account. Backticks appeared much later and thus are more versatile.

Backticks also allow us to specify a “template function” before the first backtick. The syntax is: func`string`. The function func is called automatically, receives the string and embedded expressions and can process them. This is called “tagged templates”. This feature makes it easier to implement custom templating, but is rarely used in practice. You can read more about it in the manual. (https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Template_literals#Tagged_templates)

Special characters
It is still possible to create multiline strings with single and double quotes by using a so-called “newline character”, written as \n, which denotes a line break:

let guestList = "Guests:\n * John\n * Pete\n * Mary";

alert(guestList); // a multiline list of guests

For example, these two lines are equal, just written differently:

let str1 = "Hello\nWorld"; // two lines using a "newline symbol"

// two lines using a normal newline and backticks
let str2 = `Hello
World`;

alert(str1 == str2); // true

There are other, less common “special” characters.

Here’s the full list:


Character	Description
\n	New line
\r	Carriage return: not used alone. Windows text files use a combination of two characters \r\n to represent a line break.
\', \"	Quotes
\\	Backslash
\t	Tab
\b, \f, \v	Backspace, Form Feed, Vertical Tab – kept for compatibility, not used nowadays.
\xXX	Unicode character with the given hexadecimal Unicode XX, e.g. '\x7A' is the same as 'z'.
\uXXXX	A Unicode symbol with the hex code XXXX in UTF-16 encoding, for instance \u00A9 – is a Unicode for the copyright symbol ©. It must be exactly 4 hex digits.
\u{X…XXXXXX} (1 to 6 hex characters)	A Unicode symbol with the given UTF-32 encoding. Some rare characters are encoded with two Unicode symbols, taking 4 bytes. This way we can insert long codes.

Examples with Unicode:

alert( "\u00A9" ); // ©
alert( "\u{20331}" ); // 佫, a rare Chinese hieroglyph (long Unicode)
alert( "\u{1F60D}" ); // 😍, a smiling face symbol (another long Unicode)

All special characters start with a backslash character \. It is also called an “escape character”.

We might also use it if we wanted to insert a quote into the string.

For instance:

alert( 'I\'m the Walrus!' ); // I'm the Walrus!

As you can see, we have to prepend the inner quote by the backslash \', because otherwise it would indicate the string end.

 

Of course, only the quotes that are the same as the enclosing ones need to be escaped. So, as a more elegant solution, we could switch to double quotes or backticks

instead:

alert( `I'm the Walrus!` ); // I'm the Walrus!

Note that the backslash \ serves for the correct reading of the string by JavaScript, then disappears. The in-memory string has no \. You can clearly see that in alert from the examples above.

But what if we need to show an actual backslash \ within the string?

That’s possible, but we need to double it like \\:

alert( `The backslash: \\` ); // The backslash: \

String length
The length property has the string length:

alert( `My\n`.length ); // 3

Note that \n is a single “special” character, so the length is indeed 3.

Warn: length is a property
People with a background in some other languages sometimes mistype by calling str.length() instead of just str.length. That doesn’t work.

Please note that str.length is a numeric property, not a function. There is no need to add parenthesis after it.

Accessing characters
To get a character at position pos, use square brackets [pos] or call the method str.charAt(pos). The first character starts from the zero position:

let str = `Hello`;

// the first character
alert( str[0] ); // H
alert( str.charAt(0) ); // H

// the last character
alert( str[str.length - 1] ); // o

The square brackets are a modern way of getting a character, while charAt exists mostly for historical reasons.

The only difference between them is that if no character is found, [] returns undefined, and charAt returns an empty string:

let str = `Hello`;

alert( str[1000] ); // undefined
alert( str.charAt(1000) ); // '' (an empty string)

We can also iterate over characters using for..of:

for (let char of "Hello") {
  alert(char); // H,e,l,l,o (char becomes "H", then "e", then "l" etc)
}

Strings are immutable
Strings can’t be changed in JavaScript. It is impossible to change a character.

Let’s try it to show that it doesn’t work:

let str = 'Hi';

str[0] = 'h'; // error
alert( str[0] ); // doesn't work

The usual workaround is to create a whole new string and assign it to str instead of the old one.

For instance:

let str = 'Hi';

str = 'h' + str[1]; // replace the string

alert( str ); // hi

In the following sections we’ll see more examples of this.

Changing the case
Methods toLowerCase() and toUpperCase() change the case:

alert( 'Interface'.toUpperCase() ); // INTERFACE
alert( 'Interface'.toLowerCase() ); // interface

Or, if we want a single character lowercased:

alert( 'Interface'[0].toLowerCase() ); // 'i'

Searching for a substring

There are multiple ways to look for a substring within a string.

str.indexOf
The first method is str.indexOf(substr, pos).

It looks for the substr in str, starting from the given position pos, and returns the position where the match was found or -1 if nothing can be found.

For instance:

let str = 'Widget with id';

alert( str.indexOf('Widget') ); // 0, because 'Widget' is found at the beginning
alert( str.indexOf('widget') ); // -1, not found, the search is case-sensitive

alert( str.indexOf("id") ); // 1, "id" is found at the position 1 (..idget with id)

For instance, the first occurrence of "id" is at position 1. To look for the next occurrence, let’s start the search from position 2:

let str = 'Widget with id';

alert( str.indexOf('id', 2) ) // 12

If we’re interested in all occurrences, we can run indexOf in a loop. Every new call is made with the position after the previous match:



let str = 'As sly as a fox, as strong as an ox';

let target = 'as'; // let's look for it

let pos = 0;
while (true) {
  let foundPos = str.indexOf(target, pos);
  if (foundPos == -1) break;

  alert( `Found at ${foundPos}` );
  pos = foundPos + 1; // continue the search from the next position
}

The same algorithm can be layed out shorter:

let str = "As sly as a fox, as strong as an ox";
let target = "as";

let pos = -1;
while ((pos = str.indexOf(target, pos + 1)) != -1) {
  alert( pos );
}

Info: str.lastIndexOf(substr, position)
There is also a similar method str.lastIndexOf(substr, position) that searches from the end of a string to its beginning.

It would list the occurrences in the reverse order.

There is a slight inconvenience with indexOf in the if test. We can’t put it in the if like this:

let str = "Widget with id";

if (str.indexOf("Widget")) {
    alert("We found it"); // doesn't work!
}

The alert in the example above doesn’t show because str.indexOf("Widget") returns 0 (meaning that it found the match at the starting position). Right, but if considers 0 to be false.

So, we should actually check for -1, like this:

let str = "Widget with id";

if (str.indexOf("Widget") != -1) {
    alert("We found it"); // works now!
}

The bitwise NOT trick
One of the old tricks used here is the bitwise NOT ~ operator. It converts the number to a 32-bit integer (removes the decimal part if exists) and then reverses all bits in its binary representation.

In practice, that means a simple thing: for 32-bit integers ~n equals -(n+1).

For instance:

alert( ~2 ); // -3, the same as -(2+1)
alert( ~1 ); // -2, the same as -(1+1)
alert( ~0 ); // -1, the same as -(0+1)
alert( ~-1 ); // 0, the same as -(-1+1)

As we can see, ~n is zero only if n == -1 (that’s for any 32-bit signed integer n).

So, the test if ( ~str.indexOf("...") ) is truthy only if the result of indexOf is not -1. In other words, when there is a match.

People use it to shorten indexOf checks:

let str = "Widget";

if (~str.indexOf("Widget")) {
  alert( 'Found it!' ); // works
}

It is usually not recommended to use language features in a non-obvious way, but this particular trick is widely used in old code, so we should understand it.

Just remember: if (~str.indexOf(...)) reads as “if found”.

To be precise though, as big numbers are truncated to 32 bits by ~ operator, there exist other numbers that give 0, the smallest is ~4294967295=0. That makes such check correct only if a string is not that long.

Right now we can see this trick only in the old code, as modern JavaScript provides .includes method (see below).

includes, startsWith, endsWith

@@@ devam
__________
## Arrays

__________
## Array methods

__________
## Iterables

__________
## Map and Set

__________
## WeakMap and WeakSet

__________
## Object.keys, values, entries

__________
## Destructing assignment

__________
## Date and Time

__________
## JSON Methods, toJSON





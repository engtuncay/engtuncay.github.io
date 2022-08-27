
This tutorial is mostly prepared from javascript.info website. It is very good. Some sections may be changed or removed.

Source : http://www.javascript.info


- [Fundamentals-3](#fundamentals-3)
  - [Conditional branching: if, '?'](#conditional-branching-if-)
    - [The “if” statement](#the-if-statement)
    - [Boolean conversion](#boolean-conversion)
    - [The “else” clause](#the-else-clause)
    - [Several conditions: “else if”](#several-conditions-else-if)
    - [Conditional operator ‘?’ (Short if)](#conditional-operator--short-if)
    - [Multiple ‘?’](#multiple-)
    - [Non-traditional use of ‘?’](#non-traditional-use-of-)
  - [Logical Operators](#logical-operators)
    - [|| (OR)](#-or)
    - [OR "||" finds the first truthy value](#or--finds-the-first-truthy-value)
    - [&& (AND)](#-and)
    - [! (NOT)](#-not)
  - [Nullish coalescing operator '??'](#nullish-coalescing-operator-)
  - [Loops: while and for](#loops-while-and-for)
  - [Switch Statement](#switch-statement)
  - [Functions](#functions)
  - [Function Expressions](#function-expressions)
  - [Arrow Functions](#arrow-functions)
  - [Javascript Specials](#javascript-specials)
- [Sources](#sources)


# Fundamentals-3

## Conditional branching: if, '?'

Sometimes, we need to perform different actions based on different conditions.

To do that, we can use the if statement and the conditional operator ?, that’s also called a “question mark” operator. (+ that is also called "short if")

### The “if” statement

The if(...) statement evaluates a condition in parentheses and, if the result is true, executes a block of code.

For example:

let year = prompt('In which year was ECMAScript-2015 specification published?', '');

```js
if (year == 2015) alert( 'You are right!' );

```

In the example above, the condition is a simple equality check (year == 2015), but it can be much more complex.

If we want to execute more than one statement, we have to wrap our code block inside curly braces:

```js
if (year == 2015) {
  alert( "That's correct!" );
  alert( "You're so smart!" );
}

```

We recommend wrapping your code block with curly braces {} every time you use an if statement, even if there is only one statement to execute. Doing so improves readability.

### Boolean conversion

The if (…) statement evaluates the expression in its parentheses and converts the result to a boolean.

Let’s recall the conversion rules from the chapter Type Conversions:

- A number 0, an empty string "", null, undefined, and NaN all become false. Because of that they are called “falsy” values.

- Other values become true, so they are called “truthy”.

So, the code under this condition would never execute:

```js
if (0) { // 0 is falsy
  ...
}

```

…and inside this condition – it always will:

```js
if (1) { // 1 is truthy
  ...
}

```

We can also pass a pre-evaluated boolean value to if, like this:

```js
let cond = (year == 2015); // equality evaluates to true or false

if (cond) {
  ...
}

```

### The “else” clause

The if statement may contain an optional “else” block. It executes when the condition is falsy.

For example:

```js
let year = prompt('In which year was the ECMAScript-2015 specification published?', '');

if (year == 2015) {
  alert( 'You guessed it right!' );
} else {
  alert( 'How can you be so wrong?' ); // any value except 2015
}

```

### Several conditions: “else if”

Sometimes, we’d like to test several variants of a condition. The else if clause lets us do that.

For example:

```js
let year = prompt('In which year was the ECMAScript-2015 specification published?', '');

if (year < 2015) {
  alert( 'Too early...' );
} else if (year > 2015) {
  alert( 'Too late' );
} else {
  alert( 'Exactly!' );
}

```

In the code above, JavaScript first checks year < 2015. If that is falsy, it goes to the next condition year > 2015. If that is also falsy, it shows the last alert.

There can be more else if blocks. The final else is optional.

### Conditional operator ‘?’ (Short if)

Sometimes, we need to assign a variable depending on a condition.

For instance:

```js
let accessAllowed;
let age = prompt('How old are you?', '');

if (age > 18) {
  accessAllowed = true;
} else {
  accessAllowed = false;
}

alert(accessAllowed);

```

The so-called “conditional” or “question mark” operator lets us do that in a shorter and simpler way.

The operator is represented by a question mark ?. Sometimes it’s called “ternary”, because the operator has three operands. It is actually the one and only operator in JavaScript which has that many.

The syntax is:

```js
let result = condition ? value1 : value2;

```

The condition is evaluated: if it’s truthy then value1 is returned, otherwise – value2.

For example:

```js
let accessAllowed = (age > 18) ? true : false;

```

Technically, we can omit the parentheses around age > 18. The question mark operator has a low precedence, so it executes after the comparison >.

This example will do the same thing as the previous one:

```js
// the comparison operator "age > 18" executes first anyway
// (no need to wrap it into parentheses)
let accessAllowed = age > 18 ? true : false;

```

But parentheses make the code more readable, so we recommend using them.

__________
- Info : Please note:

In the example above, you can avoid using the question mark operator because the comparison itself returns true/false:

```js
// the same
let accessAllowed = age > 18;

```
__________

### Multiple ‘?’

A sequence of question mark operators ? can return a value that depends on more than one condition.

For instance:

```js
let age = prompt('age?', 18);

let message = (age < 3) ? 'Hi, baby!' :
  (age < 18) ? 'Hello!' :
  (age < 100) ? 'Greetings!' :
  'What an unusual age!';

alert( message );

```

It may be difficult at first to grasp what’s going on. But after a closer look, we can see that it’s just an ordinary sequence of tests:

1. The first question mark checks whether age < 3.
2. If true – it returns 'Hi, baby!'. Otherwise, it continues to the expression after the colon ‘":"’, checking age < 18.
3. If that’s true – it returns 'Hello!'. Otherwise, it continues to the expression after the next colon ‘":"’, checking age < 100.
4. If that’s true – it returns 'Greetings!'. Otherwise, it continues to the expression after the last colon ‘":"’, returning 'What an unusual age!'.

Here’s how this looks using if..else:

```js
if (age < 3) {
  message = 'Hi, baby!';
} else if (age < 18) {
  message = 'Hello!';
} else if (age < 100) {
  message = 'Greetings!';
} else {
  message = 'What an unusual age!';
}

```

### Non-traditional use of ‘?’

Sometimes the question mark ? is used as a replacement for if:

```js
let company = prompt('Which company created JavaScript?', '');

(company == 'Netscape') ?
   alert('Right!') : alert('Wrong.');

```

Depending on the condition company == 'Netscape', either the first or the second expression after the ? gets executed and shows an alert.

We don’t assign a result to a variable here. Instead, we execute different code depending on the condition.

It’s not recommended to use the question mark operator in this way.

The notation is shorter than the equivalent if statement, which appeals to some programmers. But it is less readable.

Here is the same code using if for comparison:

```js
let company = prompt('Which company created JavaScript?', '');

if (company == 'Netscape') {
  alert('Right!');
} else {
  alert('Wrong.');
}

```

Our eyes scan the code vertically. Code blocks which span several lines are easier to understand than a long, horizontal instruction set.

The purpose of the question mark operator ? is to return one value or another depending on its condition. Please use it for exactly that. Use if when you need to execute different branches of code.
__________
## Logical Operators

There are four logical operators in JavaScript: || (OR), && (AND), ! (NOT), ?? (Nullish Coalescing). Here we cover the first three, the ?? operator is in the next article.

Although they are called “logical”, they can be applied to values of any type, not only boolean. Their result can also be of any type. (!!!)

Let’s see the details.

### || (OR)

The “OR” operator is represented with two vertical line symbols:

result = a || b;

In classical programming, the logical OR is meant to manipulate boolean values only. If any of its arguments are true, it returns true, otherwise it returns false.

In JavaScript, the operator is a little bit trickier and more powerful. But first, let’s see what happens with boolean values.

There are four possible logical combinations:

```js
alert( true || true );   // true
alert( false || true );  // true
alert( true || false );  // true
alert( false || false ); // false

```

As we can see, the result is always true except for the case when both operands are false.

If an operand is not a boolean, it’s converted to a boolean for the evaluation.

Most of the time, OR || is used in an if statement to test if any of the given conditions is true.

For example:

```js
let hour = 9;

if (hour < 10 || hour > 18) {
  alert( 'The office is closed.' );
}

```

For instance, the number 1 is treated as true, the number 0 as false:

We can pass more conditions:

```js
let hour = 12;
let isWeekend = true;

if (hour < 10 || hour > 18 || isWeekend) {
  alert( 'The office is closed.' ); // it is the weekend
}

```

### OR "||" finds the first truthy value

The logic described above is somewhat classical. Now, let’s bring in the “extra” features of JavaScript.

The extended algorithm works as follows.

Given multiple OR’ed values:

```js
result = value1 || value2 || value3;

```

The OR || operator does the following:

- Evaluates operands from left to right.
- For each operand, converts it to boolean. If the result is true, stops and returns the original value of that operand.
- If all operands have been evaluated (i.e. all were false), returns the last operand.

A value is returned in its original form, without the conversion.

```js
if (1 || 0) { // works just like if( true || false )
  alert( 'truthy!' );
}

```

In other words, a chain of OR || returns the first truthy value or the last one if no truthy value is found.

For instance:

```js
alert( 1 || 0 ); // 1 (1 is truthy)

alert( null || 1 ); // 1 (1 is the first truthy value)
alert( null || 0 || 1 ); // 1 (the first truthy value)

alert( undefined || null || 0 ); // 0 (all falsy, returns the last value)

```

This leads to some interesting usage compared to a “pure, classical, boolean-only OR”. 

1. Getting the first truthy value from a list of variables or expressions.

For instance, we have firstName, lastName and nickName variables, all optional (i.e. can be undefined or have falsy values).

Let’s use OR || to choose the one that has the data and show it (or "Anonymous" if nothing set):

```js
let firstName = "";
let lastName = "";
let nickName = "SuperCoder";

alert( firstName || lastName || nickName || "Anonymous"); // SuperCoder

```

If all variables were falsy, "Anonymous" would show up.

2. Short-circuit evaluation.

Another feature of OR || operator is the so-called “short-circuit” evaluation.

It means that || processes its arguments until the first truthy value is reached, and then the value is returned immediately, without even touching the other argument.

That importance of this feature becomes obvious if an operand isn’t just a value, but an expression with a side effect, such as a variable assignment or a function call.

In the example below, only the second message is printed:

```js
true || alert("not printed");
false || alert("printed");

```

In the first line, the OR || operator stops the evaluation immediately upon seeing true, so the alert isn’t run.

Sometimes, people use this feature to execute commands only if the condition on the left part is falsy.

### && (AND)

The AND operator is represented with two ampersands &&:

```js
result = a && b;

```

In classical programming, AND returns true if both operands are truthy and false otherwise:

```js
alert( true && true );   // true
alert( false && true );  // false
alert( true && false );  // false
alert( false && false ); // false

```

An example with if:

```js
let hour = 12;
let minute = 30;

if (hour == 12 && minute == 30) {
  alert( 'The time is 12:30' );
}

```

Just as with OR, any value is allowed as an operand of AND:

```js
if (1 && 0) { // evaluated as true && false
  alert( "won't work, because the result is falsy" );
}

```

Given multiple AND’ed values:

```js
result = value1 && value2 && value3;

```

In other words, AND returns the first falsy value or the last value if none were found.

The rules above are similar to OR. The difference is that AND returns the first falsy value while OR returns the first truthy one.

The AND && operator does the following:

Evaluates operands from left to right.
For each operand, converts it to a boolean. If the result is false, stops and returns the original value of that operand.
If all operands have been evaluated (i.e. all were truthy), returns the last operand.

```js
// if the first operand is truthy,
// AND returns the second operand:
alert( 1 && 0 ); // 0
alert( 1 && 5 ); // 5

// if the first operand is falsy,
// AND returns it. The second operand is ignored
alert( null && 5 ); // null
alert( 0 && "no matter what" ); // 0

```

We can also pass several values in a row. See how the first falsy one is returned:

```js
alert( 1 && 2 && null && 3 ); // null

```

When all values are truthy, the last value is returned:

```js
alert( 1 && 2 && 3 ); // 3, the last one

```

__________  
- Note Precedence of AND && is higher than OR ||

The precedence of AND && operator is higher than OR ||.

So the code a && b || c && d is essentially the same as if the && expressions were in parentheses: (a && b) || (c && d).

Examples:

Warn:
Don’t replace if with || or &&
Sometimes, people use the AND && operator as a "shorter way to write if".

For instance:

```js
let x = 1;

(x > 0) && alert( 'Greater than zero!' );

```

The action in the right part of && would execute only if the evaluation reaches it. That is, only if (x > 0) is true.

So we basically have an analogue for:

```js
let x = 1;

if (x > 0) alert( 'Greater than zero!' );

```

Although, the variant with && appears shorter, if is more obvious and tends to be a little bit more readable. So we recommend using every construct for its purpose: use if if we want if and use && if we want AND.

### ! (NOT)

The boolean NOT operator is represented with an exclamation sign !.

The syntax is pretty simple:

AND “&&” finds the first falsy value

```js
result = !value;

```

The operator accepts a single argument and does the following:

- Converts the operand to boolean type: true/false.
- Returns the inverse value.

For instance:

```js
alert( !true ); // false
alert( !0 ); // true

```

A double NOT !! is sometimes used for converting a value to boolean type:

```js
alert( !!"non-empty string" ); // true
alert( !!null ); // false

```

That is, the first NOT converts the value to boolean and returns the inverse, and the second NOT inverses it again. In the end, we have a plain value-to-boolean conversion.

There’s a little more verbose way to do the same thing – a built-in Boolean function:

```js
alert( Boolean("non-empty string") ); // true
alert( Boolean(null) ); // false

```
The precedence of NOT ! is the highest of all logical operators, so it always executes first, before && or ||.

__________

## Nullish coalescing operator '??'

Note: A recent addition
This is a recent addition to the language. Old browsers may need polyfills.

The nullish coalescing operator is written as two question marks ??.

As it treats null and undefined similarly, we’ll use a special term here, in this article. We’ll say that an expression is “defined” when it’s neither null nor undefined.

The result of a ?? b is:

if a is defined, then a,
if a isn’t defined, then b.

In other words, ?? returns the first argument if it’s not null/undefined. Otherwise, the second one.

The nullish coalescing operator isn’t anything completely new. It’s just a nice syntax to get the first “defined” value of the two.

We can rewrite result = a ?? b using the operators that we already know, like this:

result = (a !== null && a !== undefined) ? a : b;

Now it should be absolutely clear what ?? does. Let’s see where it helps.

The common use case for ?? is to provide a default value for a potentially undefined variable.

For example, here we show user if defined, otherwise Anonymous:

let user;

alert(user ?? "Anonymous"); // Anonymous (user not defined)

Here’s the example with user assigned to a name:

let user = "John";

alert(user ?? "Anonymous"); // John (user defined)

We can also use a sequence of ?? to select the first value from a list that isn’t null/undefined.

Let’s say we have a user’s data in variables firstName, lastName or nickName. All of them may be not defined, if the user decided not to enter a value.

We’d like to display the user name using one of these variables, or show “Anonymous” if all of them aren’t defined.

Let’s use the ?? operator for that:

let firstName = null;
let lastName = null;
let nickName = "Supercoder";

// shows the first defined value:
alert(firstName ?? lastName ?? nickName ?? "Anonymous"); // Supercoder

Comparison with ||
The OR || operator can be used in the same way as ??, as it was described in the previous chapter.

For example, in the code above we could replace ?? with || and still get the same result:

let firstName = null;
let lastName = null;
let nickName = "Supercoder";

// shows the first truthy value:
alert(firstName || lastName || nickName || "Anonymous"); // Supercoder

Historically, the OR || operator was there first. It exists since the beginning of JavaScript, so developers were using it for such purposes for a long time.

On the other hand, the nullish coalescing operator ?? was added to JavaScript only recently, and the reason for that was that people weren’t quite happy with ||.

The important difference between them is that:

|| returns the first truthy value.
?? returns the first defined value.

In other words, || doesn’t distinguish between false, 0, an empty string "" and null/undefined. They are all the same – falsy values. If any of these is the first argument of ||, then we’ll get the second argument as the result.

In practice though, we may want to use default value only when the variable is null/undefined. That is, when the value is really unknown/not set.

For example, consider this:

let height = 0;

alert(height || 100); // 100
alert(height ?? 100); // 0

The height || 100 checks height for being a falsy value, and it’s 0, falsy indeed.
so the result of || is the second argument, 100.
The height ?? 100 checks height for being null/undefined, and it’s not,
so the result is height “as is”, that is 0.

In practice, the zero height is often a valid value, that shouldn’t be replaced with the default. So ?? does just the right thing.

Precedence
The precedence of the ?? operator is about the same as ||, just a bit lower. It equals 5 in the MDN table, while || is 6.

That means that, just like ||, the nullish coalescing operator ?? is evaluated before = and ?, but after most other operations, such as +, *.

So if we’d like to choose a value with ?? in an expression with other operators, consider adding parentheses:

let height = null;
let width = null;

// important: use parentheses
let area = (height ?? 100) * (width ?? 50);

alert(area); // 5000

Otherwise, if we omit parentheses, then as * has the higher precedence than ??, it would execute first, leading to incorrect results.

// without parentheses
let area = height ?? 100 * width ?? 50;

// ...works the same as this (probably not what we want):
let area = height ?? (100 * width) ?? 50;

Using ?? with && or ||
Due to safety reasons, JavaScript forbids using ?? together with && and || operators, unless the precedence is explicitly specified with parentheses.

The code below triggers a syntax error:

let x = 1 && 2 ?? 3; // Syntax error

The limitation is surely debatable, it was added to the language specification with the purpose to avoid programming mistakes, when people start to switch from || to ??.

Use explicit parentheses to work around it:

let x = (1 && 2) ?? 3; // Works
alert(x); // 2

Summary
The nullish coalescing operator ?? provides a short way to choose the first “defined” value from a list.

It’s used to assign default values to variables:

// set height=100, if height is null or undefined
height = height ?? 100;

The operator ?? has a very low precedence, only a bit higher than ? and =, so consider adding parentheses when using it in an expression.

It’s forbidden to use it with || or && without explicit parentheses.

__________
## Loops: while and for

We often need to repeat actions.

For example, outputting goods from a list one after another or just running the same code for each number from 1 to 10.

Loops are a way to repeat the same code multiple times.

The “while” loop
The while loop has the following syntax:

while (condition) {
  // code
  // so-called "loop body"
}

While the condition is truthy, the code from the loop body is executed.

For instance, the loop below outputs i while i < 3:

let i = 0;
while (i < 3) { // shows 0, then 1, then 2
  alert( i );
  i++;
}

A single execution of the loop body is called an iteration. The loop in the example above makes three iterations.

If i++ was missing from the example above, the loop would repeat (in theory) forever. In practice, the browser provides ways to stop such loops, and in server-side JavaScript, we can kill the process.

Any expression or variable can be a loop condition, not just comparisons: the condition is evaluated and converted to a boolean by while.

For instance, a shorter way to write while (i != 0) is while (i):

let i = 3;
while (i) { // when i becomes 0, the condition becomes falsy, and the loop stops
  alert( i );
  i--;
}

Note:
Curly braces are not required for a single-line body
If the loop body has a single statement, we can omit the curly braces {…}:

let i = 3;
while (i) alert(i--);

The “do…while” loop
The condition check can be moved below the loop body using the do..while syntax:

do {
  // loop body
} while (condition);

The loop will first execute the body, then check the condition, and, while it’s truthy, execute it again and again.

For example:

let i = 0;
do {
  alert( i );
  i++;
} while (i < 3);

This form of syntax should only be used when you want the body of the loop to execute at least once regardless of the condition being truthy. Usually, the other form is preferred: while(…) {…}.

The “for” loop
The for loop is more complex, but it’s also the most commonly used loop.

It looks like this:

 for (begin; condition; step) {
// ... loop body ...
}
 

Let’s learn the meaning of these parts by example. The loop below runs alert(i) for i from 0 up to (but not including) 3:

for (let i = 0; i < 3; i++) { // shows 0, then 1, then 2
  alert(i);
}
Let’s examine the for statement part-by-part:

part

-------------------------------------------------
begin :	i = 0	Executes once upon entering the loop.
condition :	i < 3	Checked before every loop iteration. If false, the loop stops.
body :	alert(i)	Runs again and again while the condition is truthy.
step	: i++	Executes after the body on each iteration.

The general loop algorithm works like this:

Run begin
→ (if condition → run body and run step)
→ (if condition → run body and run step)
→ (if condition → run body and run step)
→ ...

That is, begin executes once, and then it iterates: after each condition test, body and step are executed.

If you are new to loops, it could help to go back to the example and reproduce how it runs step-by-step on a piece of paper.

Here’s exactly what happens in our case:

// for (let i = 0; i < 3; i++) alert(i)

// run begin
let i = 0
// if condition → run body and run step
if (i < 3) { alert(i); i++ }
// if condition → run body and run step
if (i < 3) { alert(i); i++ }
// if condition → run body and run step
if (i < 3) { alert(i); i++ }
// ...finish, because now i == 3
Inline variable declaration
Here, the “counter” variable i is declared right in the loop. This is called an “inline” variable declaration. Such variables are visible only inside the loop.

for (let i = 0; i < 3; i++) {
  alert(i); // 0, 1, 2
}
alert(i); // error, no such variable

Instead of defining a variable, we could use an existing one:

let i = 0;

for (i = 0; i < 3; i++) { // use an existing variable
  alert(i); // 0, 1, 2
}

alert(i); // 3, visible, because declared outside of the loop

Skipping parts
Any part of for can be skipped.

For example, we can omit begin if we don’t need to do anything at the loop start.

Like here:

let i = 0; // we have i already declared and assigned

for (; i < 3; i++) { // no need for "begin"
  alert( i ); // 0, 1, 2
}
We can also remove the step part:

let i = 0;

for (; i < 3;) {
  alert( i++ );
}

This makes the loop identical to while (i < 3).

We can actually remove everything, creating an infinite loop:

for (;;) {
  // repeats without limits
}
Please note that the two for semicolons ; must be present. Otherwise, there would be a syntax error.

Breaking the loop
Normally, a loop exits when its condition becomes falsy.

But we can force the exit at any time using the special break directive.

For example, the loop below asks the user for a series of numbers, “breaking” when no number is entered:

let sum = 0;

while (true) {
  let value = +prompt("Enter a number", '');
  if (!value) break; // (*)
  sum += value;
}
alert( 'Sum: ' + sum );

The break directive is activated at the line (*) if the user enters an empty line or cancels the input. It stops the loop immediately, passing control to the first line after the loop. Namely, alert.

The combination “infinite loop + break as needed” is great for situations when a loop’s condition must be checked not in the beginning or end of the loop, but in the middle or even in several places of its body.

Continue to the next iteration
The continue directive is a “lighter version” of break. It doesn’t stop the whole loop. Instead, it stops the current iteration and forces the loop to start a new one (if the condition allows).

We can use it if we’re done with the current iteration and would like to move on to the next one.

The loop below uses continue to output only odd values:

for (let i = 0; i < 10; i++) {

  // if true, skip the remaining part of the body
  if (i % 2 == 0) continue;

  alert(i); // 1, then 3, 5, 7, 9
}

For even values of i, the continue directive stops executing the body and passes control to the next iteration of for (with the next number). So the alert is only called for odd values.

The continue directive helps decrease nesting
A loop that shows odd values could look like this:

for (let i = 0; i < 10; i++) {

  if (i % 2) {
    alert( i );
  }

}

From a technical point of view, this is identical to the example above. Surely, we can just wrap the code in an if block instead of using continue.

But as a side-effect, this created one more level of nesting (the alert call inside the curly braces). If the code inside of if is longer than a few lines, that may decrease the overall readability.

Note:
No break/continue to the right side of ‘?’
Please note that syntax constructs that are not expressions cannot be used with the ternary operator ?. In particular, directives such as break/continue aren’t allowed there.

For example, if we take this code:

if (i > 5) {
  alert(i);
} else {
  continue;
}
…and rewrite it using a question mark:

(i > 5) ? alert(i) : continue; // continue isn't allowed here
…it stops working: there’s a syntax error.

This is just another reason not to use the question mark operator ? instead of if.

Labels for break/continue
Sometimes we need to break out from multiple nested loops at once.

For example, in the code below we loop over i and j, prompting for the coordinates (i, j) from (0,0) to (2,2):

for (let i = 0; i < 3; i++) {

  for (let j = 0; j < 3; j++) {

    let input = prompt(`Value at coords (${i},${j})`, '');

    // what if we want to exit from here to Done (below)?
  }
}

alert('Done!');

We need a way to stop the process if the user cancels the input.

The ordinary break after input would only break the inner loop. That’s not sufficient – labels, come to the rescue!

A label is an identifier with a colon before a loop:

labelName: for (...) {
  ...
}
The break <labelName> statement in the loop below breaks out to the label:

outer: for (let i = 0; i < 3; i++) {

  for (let j = 0; j < 3; j++) {

    let input = prompt(`Value at coords (${i},${j})`, '');

    // if an empty string or canceled, then break out of both loops
    if (!input) break outer; // (*)

    // do something with the value...
  }
}
alert('Done!');

In the code above, break outer looks upwards for the label named outer and breaks out of that loop.

So the control goes straight from (*) to alert('Done!').

We can also move the label onto a separate line:

outer:
for (let i = 0; i < 3; i++) { ... }

The continue directive can also be used with a label. In this case, code execution jumps to the next iteration of the labeled loop.

Labels do not allow to “jump” anywhere
Labels do not allow us to jump into an arbitrary place in the code.

For example, it is impossible to do this:

break label; // jump to the label below (doesn't work)

label: for (...)
A break directive must be inside a code block. Technically, any labelled code block will do, e.g.:

label: {
  // ...
  break label; // works
  // ...
}
…Although, 99.9% of the time break used is inside loops, as we’ve seen in the examples above.

A continue is only possible from inside a loop.

Summary
We covered 3 types of loops:

while – The condition is checked before each iteration.
do..while – The condition is checked after each iteration.
for (;;) – The condition is checked before each iteration, additional settings available.
To make an “infinite” loop, usually the while(true) construct is used. Such a loop, just like any other, can be stopped with the break directive.

If we don’t want to do anything in the current iteration and would like to forward to the next one, we can use the continue directive.

break/continue support labels before the loop. A label is the only way for break/continue to escape a nested loop to go to an outer one.

## Switch Statement

A switch statement can replace multiple if checks.

It gives a more descriptive way to compare a value with multiple variants.

The syntax
The switch has one or more case blocks and an optional default.

It looks like this:

switch(x) {
  case 'value1':  // if (x === 'value1')
    ...
    [break]

  case 'value2':  // if (x === 'value2')
    ...
    [break]

  default:
    ...
    [break]
}

- The value of x is checked for a strict equality to the value from the first case (that is, value1) then to the second (value2) and so on.

- If the equality is found, switch starts to execute the code starting from the corresponding case, until the nearest break (or until the end of switch).

- If no case is matched then the default code is executed (if it exists).

An example
An example of switch (the executed code is highlighted):

let a = 2 + 2;

switch (a) {
  case 3:
    alert( 'Too small' );
    break;
  case 4:
    alert( 'Exactly!' );
    break;
  case 5:
    alert( 'Too big' );
    break;
  default:
    alert( "I don't know such values" );
}

Here the switch starts to compare a from the first case variant that is 3. The match fails.

Then 4. That’s a match, so the execution starts from case 4 until the nearest break.

If there is no break then the execution continues with the next case without any checks.

An example without break:

let a = 2 + 2;

switch (a) {
  case 3:
    alert( 'Too small' );
  case 4:
    alert( 'Exactly!' );
  case 5:
    alert( 'Too big' );
  default:
    alert( "I don't know such values" );
}

In the example above we’ll see sequential execution of three alerts:

alert( 'Exactly!' );
alert( 'Too big' );
alert( "I don't know such values" );
Info:
Any expression can be a switch/case argument
Both switch and case allow arbitrary expressions.

For example:



let a = "1";
let b = 0;

switch (+a) {
  case b + 1:
    alert("this runs, because +a is 1, exactly equals b+1");
    break;

  default:
    alert("this doesn't run");
}

Here +a gives 1, that’s compared with b + 1 in case, and the corresponding code is executed.

Grouping of “case”
Several variants of case which share the same code can be grouped.

For example, if we want the same code to run for case 3 and case 5:

let a = 3;

switch (a) {
  case 4:
    alert('Right!');
    break;

  case 3: // (*) grouped two cases
  case 5:
    alert('Wrong!');
    alert("Why don't you take a math class?");
    break;

  default:
    alert('The result is strange. Really.');
}

Now both 3 and 5 show the same message.

The ability to “group” cases is a side-effect of how switch/case works without break. Here the execution of case 3 starts from the line (*) and goes through case 5, because there’s no break.

Type matters
Let’s emphasize that the equality check is always strict. The values must be of the same type to match.

For example, let’s consider the code:

let arg = prompt("Enter a value?");
switch (arg) {
  case '0':
  case '1':
    alert( 'One or zero' );
    break;

  case '2':
    alert( 'Two' );
    break;

  case 3:
    alert( 'Never executes!' );
    break;
  default:
    alert( 'An unknown value' );
}

1. For 0, 1, the first alert runs.
2. For 2 the second alert runs.
3. But for 3, the result of the prompt is a string "3", which is not strictly equal === to the number 3. So we’ve got a dead code in case 3! The default variant will execute.

## Functions

Functions are the main “building blocks” of the program. They allow the code to be called many times without repetition.

We’ve already seen examples of built-in functions, like alert(message), prompt(message, default) and confirm(question). But we can create functions of our own as well.

Function Declaration
To create a function we can use a function declaration.

It looks like this:

function showMessage() {
  alert( 'Hello everyone!' );
}

The function keyword goes first, then goes the name of the function, then a list of parameters between the parentheses (comma-separated, empty in the example above) and finally the code of the function, also named “the function body”, between curly braces.

function name(parameters) {
  ...body...
}

Our new function can be called by its name: showMessage().

For instance:

function showMessage() {
  alert( 'Hello everyone!' );
}

showMessage();
showMessage();

The call showMessage() executes the code of the function. Here we will see the message two times.

This example clearly demonstrates one of the main purposes of functions: to avoid code duplication.

If we ever need to change the message or the way it is shown, it’s enough to modify the code in one place: the function which outputs it.

Local variables
A variable declared inside a function is only visible inside that function.

For example:

function showMessage() {
  let message = "Hello, I'm JavaScript!"; // local variable

  alert( message );
}

showMessage(); // Hello, I'm JavaScript!

alert( message ); // <-- Error! The variable is local to the function

Outer variables
A function can access an outer variable as well, for example:

let userName = 'John';

function showMessage() {
  let message = 'Hello, ' + userName;
  alert(message);
}

showMessage(); // Hello, John

The function has full access to the outer variable. It can modify it as well.

For instance:

let userName = 'John';

function showMessage() {
  userName = "Bob"; // (1) changed the outer variable

  let message = 'Hello, ' + userName;
  alert(message);
}

alert( userName ); // John before the function call

showMessage();

alert( userName ); // Bob, the value was modified by the function

The outer variable is only used if there’s no local one.

If a same-named variable is declared inside the function then it shadows the outer one. For instance, in the code below the function uses the local userName. The outer one is ignored:

let userName = 'John';

function showMessage() {
  let userName = "Bob"; // declare a local variable

  let message = 'Hello, ' + userName; // Bob
  alert(message);
}

// the function will create and use its own userName
showMessage();

alert( userName ); // John, unchanged, the function did not access the outer variable

Global variables
Variables declared outside of any function, such as the outer userName in the code above, are called global.

Global variables are visible from any function (unless shadowed by locals).

It’s a good practice to minimize the use of global variables. Modern code has few or no globals. Most variables reside in their functions. Sometimes though, they can be useful to store project-level data.

Parameters
We can pass arbitrary data to functions using parameters (also called function arguments) .

In the example below, the function has two parameters: from and text.

function showMessage(from, text) { // arguments: from, text
  alert(from + ': ' + text);
}

showMessage('Ann', 'Hello!'); // Ann: Hello! (*)
showMessage('Ann', "What's up?"); // Ann: What's up? (**)

When the function is called in lines (*) and (**), the given values are copied to local variables from and text. Then the function uses them.

Here’s one more example: we have a variable from and pass it to the function. Please note: the function changes from, but the change is not seen outside, because a function always gets a copy of the value:

function showMessage(from, text) {

  from = '*' + from + '*'; // make "from" look nicer

  alert( from + ': ' + text );
}

let from = "Ann";

showMessage(from, "Hello"); // *Ann*: Hello

// the value of "from" is the same, the function modified a local copy
alert( from ); // Ann

Default values
If a parameter is not provided, then its value becomes undefined.

For instance, the aforementioned function showMessage(from, text) can be called with a single argument:

showMessage("Ann");

That’s not an error. Such a call would output "*Ann*: undefined". There’s no text, so it’s assumed that text === undefined.

If we want to use a “default” text in this case, then we can specify it after =:

function showMessage(from, text = "no text given") {
  alert( from + ": " + text );
}

showMessage("Ann"); // Ann: no text given

Now if the text parameter is not passed, it will get the value "no text given"

Here "no text given" is a string, but it can be a more complex expression, which is only evaluated and assigned if the parameter is missing. So, this is also possible:

function showMessage(from, text = anotherFunction()) {
  // anotherFunction() only executed if no text given
  // its result becomes the value of text
}

Warning
Evaluation of default parameters
In JavaScript, a default parameter is evaluated every time the function is called without the respective parameter.

In the example above, anotherFunction() is called every time showMessage() is called without the text parameter.

Alternative default parameters
Sometimes it makes sense to set default values for parameters not in the function declaration, but at a later stage, during its execution.

To check for an omitted parameter, we can compare it with undefined:

function showMessage(text) {
  if (text === undefined) {
    text = 'empty message';
  }

  alert(text);
}

showMessage(); // empty message

…Or we could use the || operator:

// if text parameter is omitted or "" is passed, set it to 'empty'
function showMessage(text) {
  text = text || 'empty';
  ...
}

Modern JavaScript engines support the nullish coalescing operator ??, it’s better when falsy values, such as 0, are considered regular:

// if there's no "count" parameter, show "unknown"
function showCount(count) {
  alert(count ?? "unknown");
}

showCount(0); // 0
showCount(null); // unknown
showCount(); // unknown

Returning a value
A function can return a value back into the calling code as the result.

The simplest example would be a function that sums two values:

function sum(a, b) {
  return a + b;
}

let result = sum(1, 2);
alert( result ); // 3

The directive return can be in any place of the function. When the execution reaches it, the function stops, and the value is returned to the calling code (assigned to result above).

There may be many occurrences of return in a single function. For instance:

function checkAge(age) {
  if (age >= 18) {
    return true;
  } else {
    return confirm('Do you have permission from your parents?');
  }
}

let age = prompt('How old are you?', 18);

if ( checkAge(age) ) {
  alert( 'Access granted' );
} else {
  alert( 'Access denied' );
}

It is possible to use return without a value. That causes the function to exit immediately.

For example:

function showMovie(age) {
  if ( !checkAge(age) ) {
    return;
  }

  alert( "Showing you the movie" ); // (*)
  // ...
}

In the code above, if checkAge(age) returns false, then showMovie won’t proceed to the alert.

Info:
A function with an empty return or without it returns undefined
If a function does not return a value, it is the same as if it returns undefined:

function doNothing() { /* empty */ }
alert( doNothing() === undefined ); // true

An empty return is also the same as return undefined:

function doNothing() {
  return;
}
alert( doNothing() === undefined ); // true
Warn:
Never add a newline between return and the value
For a long expression in return, it might be tempting to put it on a separate line, like this:

return
 (some + long + expression + or + whatever * f(a) + f(b))
That doesn’t work, because JavaScript assumes a semicolon after return. That’ll work the same as:

return;
 (some + long + expression + or + whatever * f(a) + f(b))

So, it effectively becomes an empty return.

If we want the returned expression to wrap across multiple lines, we should start it at the same line as return. Or at least put the opening parentheses there as follows:

return (
  some + long + expression
  + or +
  whatever * f(a) + f(b)
  )

And it will work just as we expect it to.

Naming a function
Functions are actions. So their name is usually a verb. It should be brief, as accurate as possible and describe what the function does, so that someone reading the code gets an indication of what the function does.

It is a widespread practice to start a function with a verbal prefix which vaguely describes the action. There must be an agreement within the team on the meaning of the prefixes.

For instance, functions that start with "show" usually show something.

Function starting with…

"get…" – return a value,
"calc…" – calculate something,
"create…" – create something,
"check…" – check something and return a boolean, etc.

Examples of such names:

showMessage(..)     // shows a message
getAge(..)          // returns the age (gets it somehow)
calcSum(..)         // calculates a sum and returns the result
createForm(..)      // creates a form (and usually returns it)
checkPermission(..) // checks a permission, returns true/false

With prefixes in place, a glance at a function name gives an understanding what kind of work it does and what kind of value it returns.
Info:
One function – one action
A function should do exactly what is suggested by its name, no more.

Two independent actions usually deserve two functions, even if they are usually called together (in that case we can make a 3rd function that calls those two).

A few examples of breaking this rule:

getAge – would be bad if it shows an alert with the age (should only get).
createForm – would be bad if it modifies the document, adding a form to it (should only create it and return).
checkPermission – would be bad if it displays the access granted/denied message (should only perform the check and return the result).

These examples assume common meanings of prefixes. You and your team are free to agree on other meanings, but usually they’re not much different. In any case, you should have a firm understanding of what a prefix means, what a prefixed function can and cannot do. All same-prefixed functions should obey the rules. And the team should share the knowledge.
Info:
Ultrashort function names
Functions that are used very often sometimes have ultrashort names.

For example, the jQuery framework defines a function with $. The Lodash library has its core function named _.

These are exceptions. Generally function names should be concise and descriptive.

Functions == Comments
Functions should be short and do exactly one thing. If that thing is big, maybe it’s worth it to split the function into a few smaller functions. Sometimes following this rule may not be that easy, but it’s definitely a good thing.

A separate function is not only easier to test and debug – its very existence is a great comment!

For instance, compare the two functions showPrimes(n) below. Each one outputs prime numbers up to n.

The first variant uses a label:

function showPrimes(n) {
  nextPrime: for (let i = 2; i < n; i++) {

    for (let j = 2; j < i; j++) {
      if (i % j == 0) continue nextPrime;
    }

    alert( i ); // a prime
  }
}

The second variant uses an additional function isPrime(n) to test for primality:

function showPrimes(n) {

  for (let i = 2; i < n; i++) {
    if (!isPrime(i)) continue;

    alert(i);  // a prime
  }
}

function isPrime(n) {
  for (let i = 2; i < n; i++) {
    if ( n % i == 0) return false;
  }
  return true;
}

The second variant is easier to understand, isn’t it? Instead of the code piece we see a name of the action (isPrime). Sometimes people refer to such code as self-describing.

So, functions can be created even if we don’t intend to reuse them. They structure the code and make it readable.

Summary
A function declaration looks like this:

function name(parameters, delimited, by, comma) {
  /* code */
}

Values passed to a function as parameters are copied to its local variables.
A function may access outer variables. But it works only from inside out. The code outside of the function doesn’t see its local variables.
A function can return a value. If it doesn’t, then its result is undefined.

To make the code clean and easy to understand, it’s recommended to use mainly local variables and parameters in the function, not outer variables.

It is always easier to understand a function which gets parameters, works with them and returns a result than a function which gets no parameters, but modifies outer variables as a side-effect.

Function naming:

A name should clearly describe what the function does. When we see a function call in the code, a good name instantly gives us an understanding what it does and returns.

A function is an action, so function names are usually verbal.

There exist many well-known function prefixes like create…, show…, get…, check… and so on. Use them to hint what a function does.

Functions are the main building blocks of scripts. Now we’ve covered the basics, so we actually can start creating and using them. But that’s only the beginning of the path. We are going to return to them many times, going more deeply into their advanced features.

## Function Expressions

In JavaScript, a function is not a “magical language structure”, but a special kind of value.

The syntax that we used before is called a Function Declaration:

function sayHi() {
  alert( "Hello" );
}

There is another syntax for creating a function that is called a Function Expression.

It looks like this:



;

let sayHi = function() {
  alert( "Hello" );
};

Here, the function is created and assigned to the variable explicitly, like any other value. No matter how the function is defined, it’s just a value stored in the variable sayHi.

The meaning of these code samples is the same: "create a function and put it into the variable sayHi".

We can even print out that value using alert:

function sayHi() {
  alert( "Hello" );
}

alert( sayHi ); // shows the function code

Please note that the last line does not run the function, because there are no parentheses after sayHi. There are programming languages where any mention of a function name causes its execution, but JavaScript is not like that.

In JavaScript, a function is a value, so we can deal with it as a value. The code above shows its string representation, which is the source code.

Surely, a function is a special value, in the sense that we can call it like sayHi().




But it’s still a value. So we can work with it like with other kinds of values.

We can copy a function to another variable:

function sayHi() {   // (1) create
  alert( "Hello" );
}

let func = sayHi;    // (2) copy

func(); // Hello     // (3) run the copy (it works)!
sayHi(); // Hello    //     this still works too (why wouldn't it)

Here’s what happens above in detail:

The Function Declaration (1) creates the function and puts it into the variable named sayHi.
Line (2) copies it into the variable func. Please note again: there are no parentheses after sayHi. If there were, then func = sayHi() would write the result of the call sayHi() into func, not the function sayHi itself.
Now the function can be called as both sayHi() and func().

Note that we could also have used a Function Expression to declare sayHi, in the first line:

let sayHi = function() {
  alert( "Hello" );
};

let func = sayHi;
// ...

Everything would work the same.
Info:
Why is there a semicolon at the end?
You might wonder, why does Function Expression have a semicolon ; at the end, but Function Declaration does not:

function sayHi() {
  // ...
}

let sayHi = function() {
  // ...
};

The answer is simple:

There’s no need for ; at the end of code blocks and syntax structures that use them like if { ... }, for { }, function f { } etc.
A Function Expression is used inside the statement: let sayHi = ...;, as a value. It’s not a code block, but rather an assignment. The semicolon ; is recommended at the end of statements, no matter what the value is. So the semicolon here is not related to the Function Expression itself, it just terminates the statement.

Callback functions
Let’s look at more examples of passing functions as values and using function expressions.

We’ll write a function ask(question, yes, no) with three parameters:

question
Text of the question
yes
Function to run if the answer is “Yes”
no
Function to run if the answer is “No”

The function should ask the question and, depending on the user’s answer, call yes() or no():

function ask(question, yes, no) {
  if (confirm(question)) yes()
  else no();
}

function showOk() {
  alert( "You agreed." );
}

function showCancel() {
  alert( "You canceled the execution." );
}

// usage: functions showOk, showCancel are passed as arguments to ask
ask("Do you agree?", showOk, showCancel);

In practice, such functions are quite useful. The major difference between a real-life ask and the example above is that real-life functions use more complex ways to interact with the user than a simple confirm. In the browser, such function usually draws a nice-looking question window. But that’s another story.

The arguments showOk and showCancel of ask are called callback functions or just callbacks.

The idea is that we pass a function and expect it to be “called back” later if necessary. In our case, showOk becomes the callback for “yes” answer, and showCancel for “no” answer.

We can use Function Expressions to write the same function much shorter:

function ask(question, yes, no) {
  if (confirm(question)) yes()
  else no();
}

ask(
  "Do you agree?",
  function() { alert("You agreed."); },
  function() { alert("You canceled the execution."); }
);

Here, functions are declared right inside the ask(...) call. They have no name, and so are called anonymous. Such functions are not accessible outside of ask (because they are not assigned to variables), but that’s just what we want here.

Such code appears in our scripts very naturally, it’s in the spirit of JavaScript.
Info:
A function is a value representing an “action”
Regular values like strings or numbers represent the data.

A function can be perceived as an action.

We can pass it between variables and run when we want.

Function Expression vs Function Declaration
Let’s formulate the key differences between Function Declarations and Expressions.

First, the syntax: how to differentiate between them in the code.

Function Declaration: a function, declared as a separate statement, in the main code flow.

// Function Declaration
function sum(a, b) {
  return a + b;
}

Function Expression: a function, created inside an expression or inside another syntax construct. Here, the function is created at the right side of the “assignment expression” =:

// Function Expression
let sum = function(a, b) {
  return a + b;
};

The more subtle difference is when a function is created by the JavaScript engine.

A Function Expression is created when the execution reaches it and is usable only from that moment.

Once the execution flow passes to the right side of the assignment let sum = function… – here we go, the function is created and can be used (assigned, called, etc. ) from now on.

Function Declarations are different.

A Function Declaration can be called earlier than it is defined.

For example, a global Function Declaration is visible in the whole script, no matter where it is.

That’s due to internal algorithms. When JavaScript prepares to run the script, it first looks for global Function Declarations in it and creates the functions. We can think of it as an “initialization stage”.

And after all Function Declarations are processed, the code is executed. So it has access to these functions.

For example, this works:

sayHi("John"); // Hello, John

function sayHi(name) {
  alert( `Hello, ${name}` );
}

The Function Declaration sayHi is created when JavaScript is preparing to start the script and is visible everywhere in it.

…If it were a Function Expression, then it wouldn’t work:

sayHi("John"); // error!

let sayHi = function(name) {  // (*) no magic any more
  alert( `Hello, ${name}` );
};

Function Expressions are created when the execution reaches them. That would happen only in the line (*). Too late.

Another special feature of Function Declarations is their block scope.

In strict mode, when a Function Declaration is within a code block, it’s visible everywhere inside that block. But not outside of it.

For instance, let’s imagine that we need to declare a function welcome() depending on the age variable that we get during runtime. And then we plan to use it some time later.

If we use Function Declaration, it won’t work as intended:

let age = prompt("What is your age?", 18);

// conditionally declare a function
if (age < 18) {

  function welcome() {
    alert("Hello!");
  }

} else {

  function welcome() {
    alert("Greetings!");
  }

}

// ...use it later
welcome(); // Error: welcome is not defined

That’s because a Function Declaration is only visible inside the code block in which it resides.

Here’s another example:

let age = 16; // take 16 as an example

if (age < 18) {
  welcome();               // \   (runs)
                           //  |
  function welcome() {     //  |
    alert("Hello!");       //  |  Function Declaration is available
  }                        //  |  everywhere in the block where it's declared
                           //  |
  welcome();               // /   (runs)

} else {

  function welcome() {
    alert("Greetings!");
  }
}

// Here we're out of curly braces,
// so we can not see Function Declarations made inside of them.

welcome(); // Error: welcome is not defined

What can we do to make welcome visible outside of if?

The correct approach would be to use a Function Expression and assign welcome to the variable that is declared outside of if and has the proper visibility.

This code works as intended:

let age = prompt("What is your age?", 18);

let welcome;

if (age < 18) {

  welcome = function() {
    alert("Hello!");
  };

} else {

  welcome = function() {
    alert("Greetings!");
  };

}

welcome(); // ok now

Or we could simplify it even further using a question mark operator ?:

let age = prompt("What is your age?", 18);

let welcome = (age < 18) ?
  function() { alert("Hello!"); } :
  function() { alert("Greetings!"); };

welcome(); // ok now
Info:
When to choose Function Declaration versus Function Expression?
As a rule of thumb, when we need to declare a function, the first to consider is Function Declaration syntax. It gives more freedom in how to organize our code, because we can call such functions before they are declared.

That’s also better for readability, as it’s easier to look up function f(…) {…} in the code than let f = function(…) {…};. Function Declarations are more “eye-catching”.

…But if a Function Declaration does not suit us for some reason, or we need a conditional declaration (we’ve just seen an example), then Function Expression should be used.

Summary
Functions are values. They can be assigned, copied or declared in any place of the code.
If the function is declared as a separate statement in the main code flow, that’s called a “Function Declaration”.
If the function is created as a part of an expression, it’s called a “Function Expression”.
Function Declarations are processed before the code block is executed. They are visible everywhere in the block.
Function Expressions are created when the execution flow reaches them.
In most cases when we need to declare a function, a Function Declaration is preferable, because it is visible prior to the declaration itself. That gives us more flexibility in code organization, and is usually more readable.

So we should use a Function Expression only when a Function Declaration is not fit for the task. We’ve seen a couple of examples of that in this chapter, and will see more in the future.

## Arrow Functions

Arrow functions, the basics
There’s another very simple and concise syntax for creating functions, that’s often better than Function Expressions.

It’s called “arrow functions”, because it looks like this:

let func = (arg1, arg2, ..., argN) => expression

…This creates a function func that accepts arguments arg1..argN, then evaluates the expression on the right side with their use and returns its result.

In other words, it’s the shorter version of:

let func = function(arg1, arg2, ..., argN) {
  return expression;
};

Let’s see a concrete example:

let sum = (a, b) => a + b;

/* This arrow function is a shorter form of:

let sum = function(a, b) {
  return a + b;
};
*/

alert( sum(1, 2) ); // 3

As you can, see (a, b) => a + b means a function that accepts two arguments named a and b. Upon the execution, it evaluates the expression a + b and returns the result.

If we have only one argument, then parentheses around parameters can be omitted, making that even shorter.

For example:

let double = n => n * 2;
// roughly the same as: let double = function(n) { return n * 2 }

alert( double(3) ); // 6

If there are no arguments, parentheses will be empty (but they should be present):

let sayHi = () => alert("Hello!");

sayHi();

Arrow functions can be used in the same way as Function Expressions.

For instance, to dynamically create a function:

let age = prompt("What is your age?", 18);

let welcome = (age < 18) ?
  () => alert('Hello') :
  () => alert("Greetings!");

welcome();

Arrow functions may appear unfamiliar and not very readable at first, but that quickly changes as the eyes get used to the structure.

They are very convenient for simple one-line actions, when we’re just too lazy to write many words.

Multiline arrow functions
The examples above took arguments from the left of => and evaluated the right-side expression with them.

Sometimes we need something a little bit more complex, like multiple expressions or statements. It is also possible, but we should enclose them in curly braces. Then use a normal return within them.

Like this:

let sum = (a, b) => {  // the curly brace opens a multiline function
  let result = a + b;
  return result; // if we use curly braces, then we need an explicit "return"
};

alert( sum(1, 2) ); // 3
Info:
More to come
Here we praised arrow functions for brevity. But that’s not all!

Arrow functions have other interesting features.

To study them in-depth, we first need to get to know some other aspects of JavaScript, so we’ll return to arrow functions later in the chapter Arrow functions revisited.

For now, we can already use arrow functions for one-line actions and callbacks.


Arrow functions are handy for one-liners. They come in two flavors:

1. Without curly braces: (...args) => expression – the right side is an expression: the function evaluates it and returns the result.
2. With curly braces: (...args) => { body } – brackets allow us to write multiple statements inside the function, but we need an explicit return to return something.

## Javascript Specials

This chapter briefly recaps the features of JavaScript that we’ve learned by now, paying special attention to subtle moments.

Code structure
Statements are delimited with a semicolon:

alert('Hello'); alert('World');

Usually, a line-break is also treated as a delimiter, so that would also work:



alert('Hello')
alert('World')

That’s called “automatic semicolon insertion”. Sometimes it doesn’t work, for instance:

alert("There will be an error after this message")

[1, 2].forEach(alert)

Most codestyle guides agree that we should put a semicolon after each statement.

Semicolons are not required after code blocks {...} and syntax constructs with them like loops:

function f() {
  // no semicolon needed after function declaration
}

for(;;) {
  // no semicolon needed after the loop
}

…But even if we can put an “extra” semicolon somewhere, that’s not an error. It will be ignored.

More in: Code structure.

Strict mode
To fully enable all features of modern JavaScript, we should start scripts with "use strict".

'use strict';

...

The directive must be at the top of a script or at the beginning of a function body.

Without "use strict", everything still works, but some features behave in the old-fashion, “compatible” way. We’d generally prefer the modern behavior.

Some modern features of the language (like classes that we’ll study in the future) enable strict mode implicitly.

More in: The modern mode, "use strict".

Variables
Can be declared using:

let
const (constant, can’t be changed)
var (old-style, will see later)

A variable name can include:

Letters and digits, but the first character may not be a digit.
Characters $ and _ are normal, on par with letters.
Non-Latin alphabets and hieroglyphs are also allowed, but commonly not used.
Variables are dynamically typed. They can store any value:

let x = 5;
x = "John";

There are 8 data types:

number for both floating-point and integer numbers,
bigint for integer numbers of arbitrary length,
string for strings,
boolean for logical values: true/false,
null – a type with a single value null, meaning “empty” or “does not exist”,
undefined – a type with a single value undefined, meaning “not assigned”,
object and symbol – for complex data structures and unique identifiers, we haven’t learnt them yet.

The typeof operator returns the type for a value, with two exceptions:

typeof null == "object" // error in the language
typeof function(){} == "function" // functions are treated specially

More in: Variables and Data types.

Interaction
We’re using a browser as a working environment, so basic UI functions will be:

prompt(question, [default])
Ask a question, and return either what the visitor entered or null if they clicked “cancel”.
confirm(question)
Ask a question and suggest to choose between Ok and Cancel. The choice is returned as true/false.
alert(message)
Output a message.
All these functions are modal, they pause the code execution and prevent the visitor from interacting with the page until they answer.

For instance:

let userName = prompt("Your name?", "Alice");
let isTeaWanted = confirm("Do you want some tea?");

alert( "Visitor: " + userName ); // Alice
alert( "Tea wanted: " + isTeaWanted ); // true

More in: Interaction: alert, prompt, confirm.

Operators
JavaScript supports the following operators:

Arithmetical
Regular: * + - /, also % for the remainder and ** for power of a number.

The binary plus + concatenates strings. And if any of the operands is a string, the other one is converted to string too:

alert( '1' + 2 ); // '12', string
alert( 1 + '2' ); // '12', string

Assignments
There is a simple assignment: a = b and combined ones like a *= 2.

Bitwise
Bitwise operators work with 32-bit integers at the lowest, bit-level: see the docs when they are needed. (https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Expressions_and_Operators#Bitwise)

Conditional
The only operator with three parameters: cond ? resultA : resultB. If cond is truthy, returns resultA, otherwise resultB.

Logical operators
Logical AND && and OR || perform short-circuit evaluation and then return the value where it stopped (not necessary true/false). Logical NOT ! converts the operand to boolean type and returns the inverse value.

Nullish coalescing operator
The ?? operator provides a way to choose a defined value from a list of variables. The result of a ?? b is a unless it’s null/undefined, then b.

Comparisons
Equality check == for values of different types converts them to a number (except null and undefined that equal each other and nothing else), so these are equal:

alert( 0 == false ); // true
alert( 0 == '' ); // true

Other comparisons convert to a number as well.

The strict equality operator === doesn’t do the conversion: different types always mean different values for it.

Values null and undefined are special: they equal == each other and don’t equal anything else.

Greater/less comparisons compare strings character-by-character, other types are converted to a number.

Other operators
There are few others, like a comma operator.

More in: Basic operators, maths, Comparisons, Logical operators, Nullish coalescing operator '??'.

Loops
We covered 3 types of loops:

// 1
while (condition) {
  ...
}

// 2
do {
  ...
} while (condition);

// 3
for(let i = 0; i < 10; i++) {
  ...
}

The variable declared in for(let...) loop is visible only inside the loop. But we can also omit let and reuse an existing variable.

Directives break/continue allow to exit the whole loop/current iteration. Use labels to break nested loops.

Details in: Loops: while and for.

Later we’ll study more types of loops to deal with objects.

The “switch” construct
The “switch” construct can replace multiple if checks. It uses === (strict equality) for comparisons.

For instance:

let age = prompt('Your age?', 18);

switch (age) {
  case 18:
    alert("Won't work"); // the result of prompt is a string, not a number
    break;

  case "18":
    alert("This works!");
    break;

  default:
    alert("Any value not equal to one above");
}

Details in: The "switch" statement.

Functions
We covered three ways to create a function in JavaScript:

1. Function Declaration: the function in the main code flow

function sum(a, b) {
  let result = a + b;

  return result;
}

2.Function Expression: the function in the context of an expression

let sum = function(a, b) {
  let result = a + b;

  return result;
};

3. Arrow functions:

// expression at the right side
let sum = (a, b) => a + b;

// or multi-line syntax with { ... }, need return here:
let sum = (a, b) => {
  // ...
  return a + b;
}

// without arguments
let sayHi = () => alert("Hello");

// with a single argument
let double = n => n * 2;

Functions may have local variables: those declared inside its body or its parameter list. Such variables are only visible inside the function.
Parameters can have default values: function sum(a = 1, b = 2) {...}.
Functions always return something. If there’s no return statement, then the result is undefined.

Details: see Functions, Arrow functions, the basics.

More to come

That was a brief list of JavaScript features. As of now we’ve studied only basics. Further in the tutorial you’ll find more specials and advanced features of JavaScript.



# Sources

* https://javascript.info/intro




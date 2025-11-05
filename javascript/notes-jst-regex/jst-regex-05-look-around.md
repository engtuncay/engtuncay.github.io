
Source : https://www.javascripttutorial.net/

(some parts may be modified or removed)

[Back](../readme.md)

----

- [Regex Lookahead X(?=Y) (LookAfter)](#regex-lookahead-xy-lookafter)
  - [Regex multiple lookaheads X(?=Y)(?=Z)](#regex-multiple-lookaheads-xyz)
  - [Regex negative lookaheads X(?!Y)](#regex-negative-lookaheads-xy)
- [Regex Lookbehind (?\<=Y)X (LookBefore)](#regex-lookbehind-yx-lookbefore)
  - [Negative lookbehind (?\<!Y)X](#negative-lookbehind-yx)


# Regex Lookahead X(?=Y) (LookAfter)

In regular expressions, a lookahead allows you to match X but only if it is followed by Y.

Here’s the syntax of the lookahead:

```js
X(?=Y)

```

In this syntax, the regex engine searches for X and only matches if it is followed by Y.

For example, suppose you have the following string:

```js
const s = '1 car is 15 feet long';

```

And you want to match the number 15 followed by a space and the literal string feet, not the number 1. To do that, you can use a lookahead in a regular expression:

```js
/\d+(?=\s*feet)/

```

In this regular expression:

- \d+ matches one or more digits
- ?= is the lookahead syntax
- \s* matches zero or more whitespaces
- feet matches the literal string feet

The following code uses the above pattern to match the number that is followed by zero or more spaces and the literal string feet:

```js
const s = '1 car is 15 feet long';
const pattern = /\d+(?=\s*feet)/;

const match = s.match(pattern);
console.log(match);

// Output:
// 
// 15

```

## Regex multiple lookaheads X(?=Y)(?=Z)

It’s possible to have multiple lookaheads in a regular expression with the following syntax:

```js
X(?=Y)(?=Z)

```

In this syntax, the regex engine performs the following steps:

- Search for X
- Check if Y is immediately after X, skip if it isn’t.
- Check if Z is also immediately after Y; skip if it isn’t.
- If both tests pass, return X as a match; otherwise, search for the next match.

Therefore, the `X(?=Y)(?=Z)` matches X followed by Y and Z simultaneously.

## Regex negative lookaheads X(?!Y) 

Suppose you want to match the number 1 but not the number 15 in the following string:

```js
const s = '1 car is 15 feet long';

```

To do that, you use a negative lookahead. Here’s the syntax of the negative lookahead:

```js
X(?!Y)

```

In this syntax, the regex engine matches X only if it is not followed by Y.

The following example illustrates how to use a negative lookahead:

```js
const s = '1 car is 15 feet long';
const pattern = /\d+(?!\s*feet)/;

const match = s.match(pattern);
console.log(match);

// Output:
// 
// 1

```

➖ **Summary**

- A regex lookahead X(?=Y) matches X only if it is followed by Y.

- A negative regex lookahead X(?!Y) matches X only if it is not followed by Y.

# Regex Lookbehind (?<=Y)X (LookBefore)

In regular expressions, a lookbehind matches an element if there is another specific element before it. A lookbehind has the following syntax:

```js
(?<=Y)X

```

In this syntax, the pattern match X if there is Y before it. [[öncesinde Y olan X'ler]]

For example, suppose you want to match the number 900 not the number 1 in the following string:

```js
'1 computer costs $900'

```

To do it, you use a lookahead in the regular expression as follows:

```js
/(?<=\$)\d+/

```

In this regular expression:

- The (?<=\$) matches an element if there is a literal string $ before it. Because $ is a special character in the regex, we need to use the backslash \ to escape it. By doing this, the regex engine treats \$ as a literal character $.
- The \d+ matches one or more digits.

The following example illustrates how to use a lookbehind in a regular expression to match a number that has the $ sign before it:

```js
const s = '1 computer costs $900';
const pattern = /(?<=\$)\d+/;

const match = s.match(pattern);
console.log(match);

// Output:
// 
// [ '900', index: 18, input: '1 computer costs $900', groups: undefined ]

```

## Negative lookbehind (?<!Y)X

To negate a lookbehind, you use a negative lookbehind with the following syntax:

```js
(?<!Y)X

```

In this syntax, the regex engine matches X if there is no Y before it. The following example uses a regular expression with a negative lookbehind to match a number that doesn’t have the $ letter before it:

```js
const s = '1 computer costs $900';
const pattern = /(?<!\$)\d+/;

const match = s.match(pattern);
console.log(match);

// Output:
// 
// 1

```

➖ **Summary**

- A lookbehind (?<=Y)X matches X only if is is preceded by Y.
- A negative lookbehind (?<!Y)X matches X only if it is not preceded by Y.



> ⚠️ Note: This content is for educational and personal reference purposes only.
> Original source
> https://www.javascripttutorial.net
>
> All rights and copyrights belong to their respective owners.
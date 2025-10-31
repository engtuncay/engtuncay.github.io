
Intro to Regex for Web Developers

Source : https://dev.to/chrisachard/intro-to-regex-for-web-developers-2fj4

By Chris Achard, Posted on 8 Eki 2019

[Back](../readme.md)

---

1. Regular expressions find parts of a string that match a pattern

In JavaScript they're created in between forward slashes `//`, or with `new RegExp()` and then used in methods like `match, test, or replace`

You can define the regex beforehand, or directly when calling the method new regex

```js
// / : forward slashed
// reg is Matching pattern
// i (or g in the regexTwo) optional flag(s)
const regexOne = /reg/i;

const regexTwo = new RegExp('101','g');

const str = "regex101";

// call 'match' on the string, and pass in a regex. Returns array of results
str.match(regexOne); // ["reg"]
str.match(regexTwo); // ["101"]
// it s common to create the regex right in the method call
str.replace(/r/,'R') // "Regex101"

// 'test' is the opposite:  call method on the regex and pass in the string to test
const contains_r = /r/.test(str); // true
```

2. Match individual characters one at a time, or put multiple characters in square brackets `[]` to capture any that match
***
Capture a range of characters with a hyphen -

```js

```

square brackets and hyphen

3.
Add optional flags to the end of a regex to modify how the matcher works.

In JavaScript, these flags are:

i = case insensitive
m = multi line matching
g = global match (find all, instead of find one)

regex flag modifiers

4.
Using a caret ^ at the start means "start of string"

Using a dollar sign $ at the end means "end of string"

Start putting groups of matches together to match longer strings

caret dollar sign, group matches together

5.
Use wildcards and special escaped characters to match larger classes of characters

. = any character except line break

\d = digit
\D = NOT a digit

\s = white space
\S = any NON white space

\n new line

wildcards

6.
Match only certain counts of matched characters or groups with quantifiers

= zero or more
= one more more ? = 0 or 1 {3} = exactly 3 times {2, 4} = two, three, or four times {2,} = two or more times
quantifiers

7.
Use parens () to capture in a group

match will return the full match plus the groups, unless you use the g flag

Use the pipe operator | inside of parens () to specify what that group matches

| = or

parens to capture group

8.
To match special characters, escape them with a backslash \

Special characters in JS regex are: ^ $ \ . * + ? ( ) [ ] { } |

So to match an asterisks, you'd use:

\*

Instead of just *

special characters

9.
To match anything BUT a certain character, use a caret ^ inside of square brackets

This means ^ has two meanings, which can be confusing.

It means both "start of string" when it is at the front of a regex, and "not this character" when used inside of square brackets.

caret to mean NOT

10.
Regexs can be used to find and match all sort of things, from urls to filenames

HOWEVER! be careful if you try to use regexs for really complex tasks, such as parsing emails (which get really confusing, really fast), or HTML (which is not a regular language, and so can't be fully parsed by a regular expression)

There is (of course) much more to regex like lazy vs greedy, lookahead, and capturing

but most of what web developers want to do with regular expressions can use just these base building blocks.

I'm already writing a follow up post with a bunch of real world regex use cases 🎉

 

Source : https://www.javascripttutorial.net/javascript-regular-expression/

(some parts may be modified or removed)

[Back](../readme.md)

---

# Contents

- [Contents](#contents)
- [Regular Expression](#regular-expression)
- [Character Classes](#character-classes)
- [Anchors](#anchors)
- [Word Boundaries](#word-boundaries)

# Regular Expression

A regular expression is a string that describes a pattern such as email addresses and phone numbers.

In JavaScript, regular expressions are objects. JavaScript provides the built-in `RegExp type` that allows you to work with regular expressions effectively.

Regular expressions are useful for searching and replacing strings that match a pattern. They have many useful applications.

You can use regular expressions to `extract useful information` or to `validate form fields`.

➖ Creating a regular expression

To create a regular expression in JavaScript, you enclose its pattern in forward-slash characters (/) like this:

```js
let re = /hi/;

```

Note that a regular expression is not surrounded by single or double quotes like a regular string.

Alternatively, you can use the RegExp constructor to create a regular expression:

```js
let re = new RegExp('hi');

```

Both regular expressions are instances of the RegExp type. They match the string 'hi'.

➖ Testing for matching

The RegExp object has many useful methods. One of them is the `test()` method that allows you to test if a string contains a match of the pattern in the regular expression.

The test() method returns true if the string argument contains a match.

The following example uses the test() method to test whether the string 'hi John' matches the pattern hi :

```js
let re = /hi/;
let result = re.test('hi John');
console.log(result); // true

```

➖ Using pattern flags

Besides a pattern, a RegExp object also accepts an optional flag parameter. Flags are settings that change the searching behavior. Regular expressions have many flags. We’ll cover the commonly used flags in this tutorial.

1) The ignore flag (i)

The i flag `ignores cases` when searching. The I stands for ignore case. When you use the i flag, the regex engine will perform a `case-insensitive search`. This means it will match both lowercase and uppercase characters.

The regex engine performs `a case-sensitive search by default`. For example `/hi/` regular expression matches the string hi not Hi.

To search for either string hi, Hi, or HI, you add the i flag to the regular expression /hi/i

```js
const re = /hi/i;
const result = re.test('Hi John');

console.log(result); // true

```

The following example shows how to use the flag in the RegExp constructor:

```js
let re = new RegExp('hi','i');
let result = re.test('HI John');

console.log(result); // true

```

2) The global flag (g) (or greedy)

Another commonly used flag is the global flag (g). When you use a regular expression without the g flag, the RegExp object checks for a match in the string but stops after finding the first one. (ungreedy)

However, when you use the g flag, the RegExp continues to search through the entire string for all matches and returns all of them. (greedy)

You can also combine flags to perform more flexible searches. For example, the gi flags find every match in the string regardless of the case.

The `exec()` method of the RegExp performs a search for a match in a string and `returns an array containing detailed information about the match`.

The exec() method returns null if no match is found. However, it only returns one match at a time. To get all matches in a string, you need to call the exec() method multiple times, typically within a loop.

The following example uses the exec() method with a do...while loop to return all the matches:

```js
let message = 'Hi, are you there? hi, HI...';
let re = /hi/gi;

let matches = [];
let match;
do {
    match = re.exec(message);
    if(match) {
      matches.push(match);
    }
} while(match != null)

console.dir(matches);
// Output:
// 
// Array (3)
// 0 : Hi , index : 0 , input: ...
// 1 : hi , index : 19, input: ...
// 2 : HI , index : 23, input: ...

```

➖ Searching strings

The method `str.match(regexp)` returns all matches of regexp in the string str.

To find all matches, you use the global flag (g). To find the matches regardless of cases, you use the ignore flag (i).

The following example shows how to use the match() method:

```js
let str = "Are you Ok? Yes, I'm OK";
let result = str.match(/OK/gi);

console.log(result);

// Output:
// 
// ["Ok", "OK"]

```

➖ Replacing strings

The following example uses the replace() method of a string to replace the first occurrence of the string 'Ok' in the string str:

```js
const str = "Are you Ok? Yes, I'm OK";
const result = str.match(/OK/gi);

console.log(result);

// Output:
// 
// Are you fine? Yes, I'm OK

```

To replace all occurrences of OK, you use a regular expression with the global flag (g):

```js
let str = "Are you OK? Yes, I'm OK.";
let result = str.replace(/OK/g,'fine');

console.log(result);

// Output:
// 
// Are you fine? Yes, I'm fine.

```
The following example uses both ignore and global flags to replace all occurrences of `OK` regardless of cases with the string fine:

```js
let str = "Are you Ok? Yes, I'm OK.";
let result = str.replace(/OK/gi,'fine');

console.log(result);

// Output:
// 
// Are you fine? Yes, I'm fine.

```

**Summary**

- Use /pattern/ or RegExp constructor to create a regular expression.
- Use the ignore (i) and global (g) flags to modify the matching behavior.
- Use the RegExp.test() method to determine if a pattern is found in a string.
- Use the RegExp.exec() method to find the match and return an array containing the information of the match.
- Use the String.match() method to find all matches of a pattern in a string.
- Use the String.replace() method to replace text that matches a regular expression in a string.

[🔝](#contents)

# Character Classes

`A character class` allows you to match any symbol from a character set. Note that a character class is also known as a `character set`.

Suppose that you have a phone number like this:

```sh
+1-(408)-555-0105

```

And you want to turn it into a plain number:

```sh
14085550105

```

Character classes in regular expressions can help you to do this.

Let’s explore the digit character class first. The digit character class is denoted by `\d` which matches any single digit:

The following example uses the `\d` to match the first number in the phone number:

```js
let phone = '+1-(408)-555-0105';
let re = /\d/;

console.log(phone.match(re));

// Output:
// 
// ['1', index: 1, input: '+1-(408)-555-0105', groups: undefined]

```

When you add the global flag (g), the regular expression will search for all numbers, not the first one:

```js
let phone = '+1-(408)-555-0105';
let re = /\d/g;

console.log(phone.match(re));

// Output:
// 
// ["1", "4", "0", "8", "5", "5", "5", "0", "1", "0", "5"]

```

Now, you can turn the phone number into a plain number as follows:

- Use the match() method to return an array containing numbers.
- Use the join() method to concatenate elements of the array into a string.

For example:

```js
let phone = '+1-(408)-555-0105';
let re = /\d/g;

let numbers = phone.match(re);
let phoneNo = numbers.join('');

console.log(phoneNo);

// Output:
// 
// 14085550105

```

To make it more concise, you can chain the match() and join() methods like this:

```js
console.log('+1-(408)-555-0105'.match(/\d/g).join(''));

```

Besides the digit character class (\d), regular expressions support other character classes.

The most commonly used character classes are:

- `\d` – match a single digit or a character from 0 to 9.

- `\s` – match a single `whitespace symbol` such as a space, a tab (\t), a newline (\n).

- `\w` – w stands for word character. It matches the ASCII character `[A-Za-z0-9_]` including Latin alphabets, digits, and the underscore (_)

In practice, you often combine the character classes to form a more powerful match.

For example \w\d matches any word followed by a digit like O2:

```js
let str = 'O2 is oxygen';
let re = /\w\d/g

console.log(str.match(re));

// Output:
// 
// ['O2']

```

A pattern may contain both regular characters and character classes. For example, the ES\d regular expression matches ES followed by a digit like ES6:

```js
let str = 'ES6 Tutorial';
let re = /ES\d/g

console.log(str.match(re));

// Output:
// 
// ['ES6']

```

➖ Inverse Classes

A character class has an inverse class with the same letter but in the uppercase e.g., `\D` is the inverse of `\d`.

The inverse class matches all the other characters. For example, the \D match any character except a digit (or \d). The following are the inverse classes:

- `\D` – matches any character except a digit e.g., a letter.
- `\S` – matches any character except a whitespace e.g., a letter
- `\W` – matches any character except a word character e.g., non-Latin letter or space.

Back to the phone number example, you can use the \d with the global flag (g):

```js
let phone = '+1-(408)-555-0105';
let re = /\d/g;

console.log(phone.match(re).join(''));

// Output:
// 
// 14085550105

```

Alternatively, you can remove the non-digit using the \D inverse class and `replace all non-digit characters with blank`, like this:

```js
let phone = '+1-(408)-555-0105';
let re = /\D/g;

console.log(phone.replace(re,''));

// Output:
// 
// 14085550105
```

➖ The dot (.) character class

The dot (.) is a special character class that matches any character except a newline:

```js
let re = /E.6/
console.log('ES6'.match(re)); 

// Output:
// 
// ['ES6', index: 0, input: 'ES6', groups: undefined]

```

However, the following example returns null:

```js
let re = /ES.6/
console.log('ES\n6'.match(re));

```

If you want to use the dot (.) character class to match any character including the newline ❗, you can use the `s` flag:

```js
let re = /ES.6/s
console.log('ES\n6'.match(re));

// Output:
// 
// ['ES\n6', index: 0, input: 'ES\n6', groups: undefined]

```

➖ Summary

- Character classes match any symbol from certain character sets e.g., `\d, \s, and \w`.

- The character classes \d, \s, and \w have the inverse classes `\D, \S and \W` that match other characters except \d, \s and \w.

- The dot(.) matches any character except the newline character. Use the s flag to make the dot (.) character class matches any character including the newline.

[🔝](#contents)

# Anchors

You’ll learn how to use regular expression anchors to match a position before or after characters.

Anchors have special meaning in regular expressions. They do not match any character. Instead, they match a position before or after characters:

- `^` – The caret anchor matches the beginning of the text.
- `$` – The dollar anchor matches the end of the text.

See the following example:

```js
let str = 'JavaScript';
console.log(/^J/.test(str));

// Output:
// 
// true

```

The `/^J/` match any text that starts with the letter J. It returns true.

The following example returns false because the string JavaScript doesn’t start with the letter S:

```js
let str = 'JavaScript';
console.log(/^S/.test(str));

// Output:
// 
// false

```

Similarly, the following example returns true because the string JavaScript ends with the letter t:

```js
let str = 'JavaScript';
console.log(/t$/.test(str));

// Output:
// 
// true

```

You will often need to use anchors ^ and $ to check if a string fully matches a pattern. The following example checks if an input string matches a time format hh:mm like 12:05:

```js
let isValid = /^\d\d:\d\d$/.test('12:05');
console.log(isValid);

// Output:
// 
// true

```

The following example returns false:

```js
let valid = /^\d\d:\d\d$/.test('12:105');
console.log(valid);

// Output:
// 
// false

```

TBC - 20251103 - 1741 

➖ Multiline mode of anchors `^ and $`: the m flag

The default of the anchor ^ or $ is the single-line mode. In the single-line mode, the anchor ^ and $ matches the beginning and the end of a string.

To enable the multiline mode, you use m flag. In the multiline mode, the ^ or $ anchor matches the beginning or end of the string, or the beginning or end of lines ❗.

The following example returns only the first digit of the multiline string:

```js
let str = `1st line
2nd line
3rd line`;

let re = /^\d/g;
let matches = str.match(re);

console.log(matches);

// Output:
// 
// ['1']

```

If you add the flag m, the anchor ^ will also match the digit at the beginning of the line, like this:

```js
let str = `1st line
2nd line
3rd line`;

let re = /^\d/gm;
let matches = str.match(re);

console.log(matches);

// Output:
// 
// ['1', '2', '3']

```

Summary
- Use the ^ anchor to match the beginning of the text.
- Use the $ anchor to match the end of the text.
- Use the m flag to enable the multiline mode that instructs the ^ and $ anchors to match the beginning and end of the text as well as the beginning and end of the line.


# Word Boundaries

The `(\b)` is an anchor like the caret (^) and the dollar sign ($). It matches a position that is called a “word boundary”. The word boundary match is zero-length ❗.

The following three positions are qualified as word boundaries:

- Before the first character in a string if the first character is a word character.

- After the last character in a string if the last character is a word character.

- Between two characters in a string if one is a word character and the other is not.

Simply put, the word boundary `\b` allows you to match the whole word using a regular expression in the following form:

```js
\bword\b

```

For example, in the string Hello, JS! the following positions qualify as a word boundary:

The following example returns 'JS' because 'Hello, JS!' matches the regular expression /\bJS\b/:

```js
console.log('Hello, JS!'.match(/\bJS\b/));

// Output:
// 
// ['JS', index: 7, input: 'Hello, JS!', groups: undefined]

```

However, the 'Hello, JScript' doesn’t match /\bJS\b/:

```js
console.log('Hello, JSscript!'.match(/\bJS\b/));

// Output:
// 
// null

```

Note that `without \b`, the /JS/ matches both 'Hello, JS' and 'Hello, JScript':

```js
console.log('Hello, JSscript!'.match(/JS/)); 
console.log('Hello, JS!'.match(/JS/)); 

// Output:
// 
// ['JS', index: 7, input: 'Hello, JSscript!', groups: undefined]
// ['JS', index: 7, input: 'Hello, JS!', groups: undefined]

```

It’s possible to use the word boundary with digits.

For example, the regular expression \b\d\d\d\d\b matches a 4-digit number surrounded by characters different from `\w`:

```js
console.log('ES 2015'.match(/\b\d\d\d\d\b/));

// Output:
// 
// ['2015', index: 3, input: 'ES 2015', groups: undefined]

```

The following example uses the word boundary to find the time that has the format hh:mm e.g., 09:15:

```js
let str = 'I start coding JS at 05:30 AM';
let re = /\b\d\d:\d\d\b/;
let result = str.match(re);

console.log(result);

// Output:
// 
// ['05:30', index: 21, input: 'I start coding JS at 05:30 AM', groups: undefined]

```

It’s important to note that the `\b` doesn’t work for non-Latin alphabets ❗.

As you have seen so far, the patterns `\d\d\d\d` and `\d\d` has been used to match a four-digit or a two-digit number.

It’ll be easier and more flexible if you use quantifiers that will be covered in the quantifiers tutorial. You can use `\d{4}` instead of `\d\d\d\d`, which is much shorter.

➖ Summary

- The \b anchor matches a word boundary position.


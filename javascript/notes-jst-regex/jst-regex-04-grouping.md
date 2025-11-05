
Source : https://www.javascripttutorial.net/capturing-groups/

(some parts may be modified or removed)

[Back](../readme.md)

---

- [JavaScript Regex: Capturing groups](#javascript-regex-capturing-groups)
  - [Named capturing groups](#named-capturing-groups)
- [Backreferences](#backreferences)
- [Regex Alternation](#regex-alternation)


# JavaScript Regex: Capturing groups

➖ Introduction to the JavaScript regex capturing groups

Suppose you have the following path (pattern): `resource/id`

For example: `posts/10`

In the path, the resource is posts and id is 10. To match the path, you use the following regular expression:

`/\w+\/\d+/`

In this pattern:

- `\w+` is a word character set with a quantifier (+) that matches one or more word characters.
- `/` matches the `forward slash` (/). The `backslash (\)`  escapes the forward slash,
- `\d+` is the combination of the digit character set and a quantfifer (+), which matches one or more digits.

The following uses the regular expression `/\w+\/\d+/` pattern to match the string ‘posts/10':

```js
const path = 'posts/10';
const pattern = /\w+\/\d+/;

const match = path.match(pattern);
console.log(match);

// Output:
// 
// [ 'posts/10', index: 0, input: 'posts/10', groups: undefined ]

```

To get the id 10 from the path posts/10, you use a capturing group. To create a capturing group for a rule, you place that rule in parentheses like this:

`(rule)`

The following example creates a capturing group that captures the id value from the path posts/10:

`'\w+/(\d+)'`

In this pattern, we place the rule `\d+` inside the parentheses `()`. If you run the program with the new pattern, you’ll see that it displays one match:

```js
const path = 'posts/10';
const pattern = /\w+\/(\d+)/;

const match = path.match(pattern);
console.log(match);

// Output:
// 
// [ 'posts/10', '10', index: 0, input: 'posts/10', groups: undefined ]

```

The match() method returns an array of matches. The first element is the whole match ('posts/10') while the second one ('10') is the value of the capturing group.

Note that the String.match() method will not return groups if you set the g flag e.g., `/\w+\/(\d+)/g`. If you use the g flag, you need to use the String.matchAll() method instead to get the groups.

➖ Multiple capturing groups

To capture both the resource (posts) and id (10) of the path (post/10), you use multiple capturing groups in the regular expression as follows:

`/(\w+)\/(\d+)/`

The regex has two capturing groups one for \w+ and the other for \d+ .

The following script shows the entire match and all the subgroups:

```js
const path = 'posts/10';
const pattern = /(\w+)\/(\d+)/;

const match = path.match(pattern);
console.log(match);

// Output:
// 
// ['posts/10', 'posts', '10', index: 0, input: 'posts/10', groups: undefined]

```

To access the first and second subgroups, you use match[1] and match[2]. Note that the match[0] returns the entire match. For example:

```js
const path = 'posts/10';
const pattern = /(\w+)\/(\d+)/;

const match = path.match(pattern);
console.log(match[0], match[1], match[2]);

// Output:
// 
// posts/10 posts 10

```
## Named capturing groups

To access a subgroup in a match, you use an index. However, you may want to access a subgroup by a meaningful name to make it more convenient.

To do that, you use the named capturing group to assign a name to a group. The following shows the syntax for assigning a name to a capturing group:

```js
(?<name>rule)

```

In this syntax:

`()` indicates a capturing group.

`?<name>` specifies the name of the capturing group.

rule is a rule in the pattern.

For example, the following creates the names:

```js
/?<resource>\w+)\/(?<id>\d+/

```

In this syntax:

- The resource is the name for the first capturing group
- The id is the name for the second capturing group.

For example:

```js
const path = 'posts/10';
const pattern = /(?<resource>\w+)\/(?<id>\d+)/;

const match = path.match(pattern);
console.log(match);
// Output:
// 
// [
  // 'posts/10',
  // 'posts',
  // '10',
  // index: 0,
  // input: 'posts/10',
  // groups: [Object: null prototype] { resource: 'posts', id: '10' }
// ]

```

The match has a groups property that is an object. The match.groups object has properties whose names are the capturing group name and values are the capturing values. For example:

```js
const path = 'posts/10';
const pattern = /(?<resource>\w+)\/(?<id>\d+)/;

const match = path.match(pattern);
for (const name in match.groups) {
  console.log(name, match.groups[name]);
}

// Output:
// 
// resource posts
// id 10

```

➖ More named capturing group example

The following regular expression matches the path `posts/2022/02/18`

```js
/\w+\/d{4}\/d{2}\/d{2}/

```

To capture the resource (post), year (2022), month (02), and day (18), you use the named capturing groups like this:

```js
/(?<resource>\w+)\/(?<year>\d{4})\/(?<month>\d{2})\/(?<day>\d{2})/

```

This program uses the patterns to match the path and shows all the subgroups:

```js
const path = 'posts/2022/02/18';
const pattern =
  /(?<resource>\w+)\/(?<year>\d{4})\/(?<month>\d{2})\/(?<day>\d{2})/;

const match = path.match(pattern);
console.log(match.groups);

// Output:
// 
// {resource: 'posts', year: '2022', month: '02', day: '18'}

```

**Summary**

- Place a rule in parentheses () to create a capturing group. A regular expression can have multiple capturing groups.
- Use the (?<capturingGroupName>rule) to create a named capturing group for the rule in a pattern.

# Backreferences

Backreferences allow you to `reference the capturing groups` in the regular expressions. Technically speaking, backreferences are like variables in regular expressions.

Here’s the syntax of a backreference:

```js
\N

```

In this syntax, N is an integer such as 1, 2, and 3 that represents the corresponding capturing group number.

Suppose you have a string with the duplicate word JavaScript like this:

```js
const s = 'JavaScript JavaScript is awesome';

```

And you want to remove the duplicate word (JavaScript) so that the result string will be:

```js
'JavaScript is awesome'

```

To do so, you can use a backreference in the regular expression.

First, match a word:

```js
/\w+\s+/

```

Second, create `a capturing group` that captures the word:

```js
/(\w+)\s+/

```

Third, use `a backreference` to reference the first capturing group:

```js
/(\w+)\s+\1/

```

In this pattern, the `\1` is a backreference that references the (\w+) capturing group.

Finally, replace the entire match with the first capturing group using the String.replace() method:

```js
const s = 'JavaScript JavaScript is cool';
const pattern = /(\w+)\s+\1/;

const result = s.replace(pattern, '$1');

console.log(result);

// Output:
// 
// JavaScript is cool

```

[[eşleşen tüm kısım ("JavaScript JavaScript") ile sadece $1 (ilk yakalanan capturing grup) ile ("JavaScript") değiştirilir]]

➖ JavaScript regex backreference examples

The following examples show some practical applications of backreferences.

➖ 1) Using backreferences to get text inside quotes

To get the text inside the double quotes like this:

```js
"JavaScript Regex Backreferences"

```

Or single quotes:

```js
'JavaScript Regex Backreferences'

```

But not mixed of single and double-quotes:

```js
'not match"

```

To do so, you might come up with the following regular expression:

```js
/[\'"](.*?)[\'"]/

```

However, this regular expression also matches the text that starts with a single quote (‘) and ends with a double quote (“) or vice versa. For example:

```js
const message = `"JavaScript's cool". They said`;
const pattern = /[\'"].*?[\'"]/;

const match = message.match(pattern);

console.log(match[0]);

```

It returns the "JavaScript' not "JavaScript's cool".

To resolve it, you can use a backreference in the regular expression:

```js
/([\'"]).*?\1/

```

The backreference \1 references the first capturing group. If the subgroup starts with a single quote, the \1 matches the single quote. And if the subgroup starts with double quotes, the \1 matches double-quotes.

For example:

```js
const message = `"JavaScript's cool". They said`;
const pattern = /([\'"]).*?\1/;

const match = message.match(pattern);

console.log(match[0]);

// Output:
// 
// "JavaScript's cool"

```

➖ 2) Using backreferences to find word that has at least one consecutive repeated character

The following example shows how to use a backreference to find the word that has at least one consecutive repeated character e.g., apple (the letter p is repeated):

```js
const words = ['apple', 'orange', 'strawberry'];
const pattern = /\b\w*(\w)\1\w*\b/;

for (const word of words) {
  const result = word.match(pattern);
  if (result) {
    console.log(result[0], '->', result[1]);
  }
}

// Output:
// 
// apple -> p
// strawberry -> r

```

**Summary**

- Use backreferences to reference the capturing groups in a regular expression.

# Regex Alternation

Regex uses the pipe operator (`|`) to represent an alternation, which is like the logical OR operator in regular expressions. The alternation allows you to match either A or B:

```js
A | B

```

The following example uses the alternation to match either the JavaScript or JS in the string 'JavaScript and JS':

```js
const s = 'JavaScript and JS';
const pattern = /JavaScript|JS/g;
const match = s.match(pattern);

console.log(match);

// Output:
// 
// [ 'JavaScript', 'JS' ]

```
➖ Regex alternation examples

The following example illustrates the practical applications of the regex alternation.

1) Using regex alternation to match time string in the hh:mm format

The following regular expression that combines the \d character set with the quantifiers {} to match a time string in the format hh:mm:

```js
/\d{2}:\d{2}/

```

In this regular expression:

- `\d{2}` matches two digits.
- : matches the colon character
- \d{2} matches two digits

But the rule \d{2} also matches an invalid hour or minute for example 99. To make it match more precisely, you can use an alternation ❗

Since the valid hours are from 01 to 23, you can use the following pattern to match the hour part:

```js
[01]\d|2[0-3]

```

In this pattern:

- The rule [01] matches a single digit 0 or 1 and the rule \d matches a single digit from 0 to 9. Therefore, the rule [01]\d matches 00, 01 to 19

- The literal number 2 matches the digit 2 and the rule [0-3] matches a single digit from 0 to 3 including 0, 1, 2, 3. Therefore, the rule 2[0-3] matches two digits 20, 21, 22, and 23.

Hence, the rule [01]\d|2[0-3] matches two digits from 00 to 23 ❗

Similarly, you can use the following rule to match a valid minute that ranges from 00 to 59:

```js
[0-5]\d

```

The following regular expression combines those rules to match a time string in the hh:mm format:

```js
/[01]\d|2[0-3]:[0-5]\d/g

```

However, this regular expression will not work as expected. For example:

```js
const time = '05:30 31:62 23:45 26:99';
const pattern = /[01]\d|2[0-3]:[0-5]\d/g;
const match = time.match(pattern);

console.log(match);

// Output:
// 
// [ '05', '23:45' ]
```

In this example, the regex engine treats the pattern [01]\d|2[0-3]:[0-5]\d as two parts separated by the alternation ❗: 

```js
[01]\d
OR
2[0-3]):([0-5]\d)

```

To fix it, you use parentheses to wrap the alternation. It indicates that only the wrapped part is alternated, not the entire pattern:

```js
([01]\d|2[0-3]):[0-5]\d

```

Now, the script works as expected:

```js
const time = '05:30 31:62 23:45 26:99';
const pattern = /([01]\d|2[0-3]):[0-5]\d/g;
const match = time.match(pattern);

console.log(match);

// Output:
// 
// [ '05:30', '23:45' ]

```

**Summary**
- The alternation A | B matches either A or B.
- The alternation is like an OR operator in regular expressions.
- Use parentheses () to wrap the parts that you want to apply the alternation.

> ⚠️ Note: This content is for educational and personal reference purposes only.
> Original source
> https://www.javascripttutorial.net/capturing-groups/
>
> All rights and copyrights belong to their respective owners.

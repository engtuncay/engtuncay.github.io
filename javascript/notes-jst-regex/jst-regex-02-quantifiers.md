Source : https://www.javascripttutorial.net/regular-expression-quantifiers/

(some parts may be modified or removed)

[Back](../readme.md)

---

# Contents

- [Contents](#contents)
- [Quantifiers](#quantifiers)
- [Greedy](#greedy)
- [Non-Greedy Quantifiers](#non-greedy-quantifiers)


# Quantifiers

Quantifiers specify `how many instances` of a character, group, or character class must appear in the input string for a match to be found.

➖ Quantity

🔔 Exact count {n}

A number in curly braces `{n}` is the simplest quantifier. When you append it to a character or character class, it specifies how many characters or character classes you want to match.

For example, the regular expression `/\d{4}/` matches a four-digit number. It is the same as `/\d\d\d\d/`:

```js
let str = "ECMAScript 2020";
let re = /\d{4}/;

let result = str.match(re);

console.log(result);

// Output:
//
// ['2020', index: 11, input: 'ECMAScript 2020', groups: undefined]
```

🔔 The range {n,m}

The range matches a character or character class from n to m times.

For example, to find numbers that have two, three, or four digits, you use the regular expression `/\d{2,4}/g`:

```js
let str = "The official name of ES11 is ES2020";
let re = /\d{2,4}/g;

let result = str.match(re);
console.log(result);

// Output:
//
// ["11", "2020"]
```

Because the upper limit is optional, the {n,} searches for a sequence of n or more times. For example, the regular expression /\d{2,}/ will match any number that has two or more digits.

```js
let str = "The official name of ES6 is ES2015";
let re = /\d{2,}/g;

let result = str.match(re);
console.log(result);

// Output:
//
// ["2015"]
```

The following example uses the regular expression /\d{1,}/g to match any numbers that have one or more digits in a phone number:

```js
let numbers = "+1-(408)-555-0105".match(/\d{1,}/g);
console.log(numbers);

// Output:
//
// ["1", "408", "555", "0105"]
```

🔔 Shorthands

➖ +

The quantifier `{1,}` means one or more which has the shorthand as `+`. For example, the `\d+` searches for numbers:

```js
let phone = "+1-(408)-555-0105";
let result = phone.match(/\d+/g);

console.log(result);

// Output:
//
// ["1", "408", "555", "0105"]
```

➖ ?

The quantifier ? means `zero or one`. It is the same as `{0,1}`. For example, /colou?r/ will match both color and colour:

```js
let str = "Is this color or colour?";
let result = str.match(/colou?r/g);

console.log(result);

// Output:
//
// ["color", "colour"]
```

➖ \*

The quantifier `*` means zero or more. It is the same as {0,}. The following example shows how to use the quantifier \* to match the string Java followed by any word character:

```js
let str = "JavaScript is not Java";
let re = /Java\w*/g;

let results = str.match(re);
console.log(results);

// Output:
//
// ["JavaScript", "Java"]
```

We often use quantifiers to form complex regular expressions. The following shows some regular expression examples that include quantifiers:

- Whole numbers: `/^\d+$/`
- Decimal numbers:`/^\d*.\d+$/`
- Whole numbers and decimal numbers:`/^\d*(.\d+)?$/`
- Negative, positive whole numbers & decimal numbers: `/^-?\d*(.\d+)?$/`

Summary

The following table lists the quantifiers:

- `*` : Match zero or more times.
- `+` : Match one or more times.
- `?` : Match zero or one time.
- `{ n }` : Match exactly n times.
- `{ n ,}` : Match at least n times.
- `{ n , m }` : Match from n to m times.

# Greedy

All quantifiers work in a greedy mode by default. This means that quantifiers will match their preceding elements as much as possible.

The following example illustrates how greedy quantifiers work.

➖ The greedy quantifier example

Suppose you have an HTML string that represents a button element:

```js
const button = '<button type="submit" class="btn">Send</button>';

```

And you want to match the texts surrounded by double quotes ("") like submit and btn.

To do that, you use the double quotes (“), dot (.) character class and the (+) quantifier to construct the following pattern:

```js
/".+"/g

```

This pattern means that:

- " starts with "
- . matches any character except the newline
- + matches the preceding character one or more times
- " ends with "
- g flag returns all matches

The following uses the `match()` method to match the string with the pattern:

```js
const s = '<button type="submit" class="btn">Send</button>';
const pattern = /".+"/g;

const result = s.match(pattern);
console.log(result);

// Output:
//
//['"submit" class="btn"']

```

It returns '"submit" class="btn"' instead of submit and btn.

The reason is that in the greedy mode, the quantifier (+) tries to match the preceding element (".) as much as possible.

➖ How greedy quantifiers work

First, the regex engine starts matching from the first character in the string s.

Next, because the first character < does not match the quote ("), the regex engine continues to match the next characters until it finds the first quote ("):

Then, the regex engine matches the string with the next rule .+ in the regular expression.

Since the .+ rule matches one or more characters, the regex engine matches the characters until it encounters the end of the string:

After that, the regex engine checks the last rule in the regular expression, which is a quote (“). However, there’s no more character to match because it already reached the end of the string. This means that the regex engine is too greedy by going too far.

Finally, the regex engine goes back from the end of the string to find the quote (“). This step is often referred to as `backtracking`.

As a result, the match is the following substring which is not what you might expect:

```js
"submit" class="btn"

```

To resolve this issue, you need to instruct the quantifier `(+)` to use the non-greedy (or lazy) mode instead of the greedy mode. To do that, you add a question mark (`?`) after the quantifier like this:

```js
/".+?"/g

```

The following script returns the expected result:

```js
const s = '<button type="submit" class="btn">Send</button>';
const pattern = /".+?"/g;

const result = s.match(pattern)
console.log(result);

// Output:
// 
// ['"submit"', '"btn"']

```

Summary
- Quantifiers use the greedy mode by default.
- Greedy quantifiers match their preceding elements as much as possible.

# Non-Greedy Quantifiers

➖ Introduction to JavaScript regex non-greedy (or lazy) quantifiers

In regular expressions, quantifiers allow you to match their preceding elements with specified numbers of times.

By default, quantifiers use the greedy mode for matching. In the greedy mode, quantifiers try to match as many as possible and return the largest matches. When quantifiers use the greedy mode, they are called greedy quantifiers. In the quantifier tutorial, you learned how to work with greedy quantifiers such as `*, +, and ?` .

Besides the greedy mode, quantifiers also work in the non-greedy mode or lazy mode. In the lazy mode, the quantifiers match their preceding elements as few as possible and return the smallest matches. When quantifiers use the lazy mode, they’re often referred to as `non-greedy quantifiers` or `lazy quantifiers`.

To transform a greedy quantifier into a non-greedy quantifier, you add an extra question mark to it. The following table lists the greedy quantifiers and their corresponding lazy quantifiers:

Greedy quantifier	Lazy quantifier	Meaning
- *	*?	Match its preceding element zero or more times.
- +	+?	Match its preceding element one or more times.
- ?	??	Match its preceding element zero or one time.
- { n }	{ n }?	Match its preceding element exactly n times.
- { n ,}	{ n ,}?	Match its preceding element at least n times.
- { n , m }	{ n , m }?	Match its preceding element from n to m times.

➖ JavaScript non-greedy quantifiers example

The following program uses the non-greedy quantifier (+?) to match the text within the quotes ("") of a button element:

```js
const s = '<button type="submit" class="btn">Send</button>'
const pattern = /".+?"/g;

const result = s.match(pattern)
console.log(result);

// Output:
// 
// ['"submit"', '"btn"']

```

Summary

- Lazy quantifiers match their preceding elements as few as possible to return the smallest possible matches.
- Use a question mark (?) to transform a greedy quantifier into a lazy quantifier.


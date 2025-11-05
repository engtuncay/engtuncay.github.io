
Source : https://www.javascripttutorial.net/javascript-regex/javascript-string-match/

(some parts may be modified or removed)

[Back](../readme.md)

---

- [Regex match()](#regex-match)
- [Regex Replace](#regex-replace)


# Regex match()

To understand how the match() method works and how to use it effectively, you should have the basic knowledge of regular expression.

Introduction to the JavaScript match() method

The String match() method matches a string against a regular expression:

str.match(regexp);
Code language: JavaScript (javascript)
If the regexp is not a regular expression, the match() will convert it to a regular expression using the RegExp() constructor. The match() returns an array depending on whether the regular expression uses the global flag (g) flag or not:

If the regexp uses the g flag, then match() method returns an array containing all the matches. The result does not contain the capturing groups.
If the regexp doesn’t use the g flag, the match() method will return the first match and its related capturing groups. The result of the match is the same result as RegExp.exec() with additional properties. See the example below for the details.
The match() returns null if it does not find any matches.

JavaScript Regex match() method
Let’s take some examples of using the match() method.

1) Using the JavaScript regex match() method with the expression that has the global flag
The following example shows how to use the match() method with the global flag (g). It returns an array of matches:

let str = "Price: $5–$10";
let result = str.match(/\$\d+/g);
console.log(result);
Code language: JavaScript (javascript)
Output:

["$5", "$10"]
Code language: JavaScript (javascript)
In this example, the match() searches for any number that follows the $ sign.

2) Using the JavaScript regex match() method with the expression that has the global flag
The following example illustrates how to use the match() method with a regular expression that doesn’t have a global flag. It returns an array of the first match with additional properties.

let str = "Price: $5–$10";
let result = str.match(/\$\d+/);
console.log(result);
Code language: JavaScript (javascript)
Output:



The additional properties are:

index: is the index at which the match was found.
input: a copy of the search string.
groups: is the object of named capturing groups whose keys and values are the names and the capturing groups respectively. In this example, it is undefined because we did to define any named capturing groups.

3) Using the JavaScript Regex match() method with the named capturing group
The following shows how to use the match() method with a named capturing group. It captures the "yellow" into a group named "color":

```js
let str = 'I like yellow color palette!';

let re = /(?<color>yellow) color/;
let result = str.match(re);

console.log(result);

// Output: 
// 
// 0 : "yellow color",
// 1 : "yellow"
// groups : 
//   color : "yellow"
// ...

```




JavaScript String match with named capturing group
In this tutorial, you have learned how to use the JavaScript String match() method to match a string against a regular expression.

# Regex Replace

The String.prototype.replace() method works with both strings and regular expressions. This tutorial focuses solely on regular expressions.

The following shows the syntax of the replace() method:

replace(regexp, newSubstr)
In this syntax:

The regexp is a regular expression to match.
The newSubstr is a string to replace the matches. If the newSubstr is empty, the replace() method removes the matches.
The replace() returns a new string with the matches replaced by the newSubstr. Note that the replace() method doesn’t change the original string but returns a new string.

By default, the replace() method replaces the first match if the regexp doesn’t use the global flag (g). To replace all matches, you use the global flag (g) in the regexp.

JavaScript regex replace() method examples
Let’s take some examples of using the replace() method.

1) A simple the JavaScript regex replace() method example
The following example uses the replace() method to replace the first match of the JS string with the JavaScript string:

const s = 'JS and js';
const re = /js/i;

const newS = s.replace(re, 'JavaScript');
console.log(newS);
Code language: JavaScript (javascript)
Output:

JavaScript and js
The /js/i matches both JS and js in the 'JS and js' string. However, the replace() method replaces only the first match (JS).

To replace all matches, you use the global flag (g) in the regular expression.

2) Using the JavaScript regex replace() method with the global flag
The following example uses the replace() method with a regular expression containing a global flag (g) to replace all matches:

const s = 'JS and js';
const re = /js/gi;

const newS = s.replace(re, 'JavaScript');
console.log(newS);
Code language: JavaScript (javascript)
Output:

JavaScript and JavaScript
3) Using the JavaScript regex replace() method with capturing groups
When a regular expression contains the capturing groups, you can reference these groups in the newSubstr using the $N syntax where N is the grouping number. For example, $1 and $2 reference first and second capturing groups.

The following example illustrates how to use the replace() method with capturing groups to swap the first and last names in a person name:

let re = /(\w+)\s(\w+)/;
let name = 'Jane Doe';
let lastFirst = name.replace(re, '$2, $1');

console.log(lastFirst);
Code language: JavaScript (javascript)
Output:

Doe, Jane
How it works.

The regular expression /(\w+)\s(\w+)/ matches one or more word characters, a space, and then one or more word characters. In other words, it matches any string that has a word, space, and another word.

The regular expression contains two capturing groups. The first capturing group captures the first word and the second one captures the second word after the space.

In the newSubstr, we use $1 to reference the first capturing group and $2 to reference the second one. To swap the first name and last name, we place the second match ($2) first and then the first match ($1).

JavaScript regex replace() method with replacer function
The second argument of the replace() method can be a function like this:

replace(regexp, replacerFunction)
The replace() method calls the replacerFunction after it finds the first match. The replacerFunction is used to create a substring to replace the match.

If the regexp uses the global flag (g), the replace() method will call the replacerFunction after every match.

The replacerFunction has the following arguments:

match specifies the matched substring.
p1, p2, … the values of the capturing groups in the regexp.
offset is an integer that specifies the offset of the matched substring within the input string.
string is the input string.
groups is an object whose are are the named capturing group and values are matched values.
Let’s take an example of using the replace() method with a replacer function.

Suppose you have a string like this:

backgroundColor
And you want to transform it into something like:

background-color
To do that you can use the replace() method with a replacer function.

First, construct a regular expression that matches a capital letter:

/[A-Z]/g
Second, define a replacer function:

function replacer(match, offset) {
  return (offset > 0 ? '-' : '') + match.toLowerCase();
}
Code language: JavaScript (javascript)
The replacer() function adds a hyphen if the matched letter is not at the beginning of the string and concatenates the hyphen with the matched letter converted to lowercase.

Third, use the replace() method to replace the match with the substring returned from the replacer() function:

function addHyphen(prop) {
  return prop.replace(/[A-Z]/g, replacer);
}
Code language: JavaScript (javascript)
The following shows the complete code:

function replacer(match, offset) {
  return (offset > 0 ? '-' : '') + match.toLowerCase();
}

function addHyphen(prop) {
  return prop.replace(/[A-Z]/g, replacer);
}

const prop = 'backgroundColor';
console.log(addHyphen(prop));
Code language: JavaScript (javascript)
Output:

background-color
To make the code more concise, you can use arrow functions with the replacer function as a callback function like this:

const addHyphen = (prop) =>
  prop.replace(
    /[A-Z]/g,
    (match, offset) => (offset > 0 ? '-' : '') + match.toLowerCase()
  );

const prop = 'backgroundColor';
console.log(addHyphen(prop));
Code language: JavaScript (javascript)
Summary
Use the replace() method to find matches against a regular expression and replace the matches with a new substring.
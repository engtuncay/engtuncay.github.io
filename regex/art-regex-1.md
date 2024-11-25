<h1>Regex tutorial — A quick cheatsheet by examples by Jonny Fox</h1> 

Jun 23, 2017 6 min read

Link :

https://medium.com/factory-mind/regex-tutorial-a-simple-cheatsheet-by-examples-649dc1c3f285

Note : Some parts can be modified.

UPDATE 10/2022

Check out the author's REGEX COOKBOOK article about the most commonly used (and most wanted) regex 🎉

- [Introduction](#introduction)
- [Basic topics](#basic-topics)
  - [Anchors — ^ and $ etc](#anchors---and--etc)
  - [Quantifiers — \* + ? and {} etc](#quantifiers-----and--etc)
  - [OR operator — | or \[\] etc](#or-operator---or--etc)
  - [Character classes - \\d \\w \\s and . etc](#character-classes---d-w-s-and--etc)
- [Flags](#flags)
- [Intermediate topics](#intermediate-topics)
  - [Grouping and capturing — () etc](#grouping-and-capturing---etc)
  - [Bracket expressions — \[\] (Ranges)](#bracket-expressions-ranges)
  - [Greedy and Lazy match](#greedy-and-lazy-match)
  - [Substitution](#substitution)
- [Summary](#summary)
- [Remember These (Addittion by engtuncay)](#remember-these-addittion-by-engtuncay)
- [Cheatsheet](#cheatsheet)

# Introduction

Regular expressions (regex or regexp) are extremely useful in extracting information from any text by searching for one or more matches of a specific search pattern (i.e. a specific sequence of ASCII or unicode characters).

Fields of application range from validation to parsing/replacing strings, passing through translating data to other formats and web scraping.

One of the most interesting features is that once you’ve learned the syntax, you can actually use this tool in (almost) all programming languages ​​(JavaScript, Java, VB, C #, C / C++, Python, Perl, Ruby, Delphi, R, Tcl, and many others) with the slightest distinctions about the support of the most advanced features and syntax versions supported by the engines.

Let’s start by looking at some examples and explanations.

# Basic topics

To Try Regex

-  [Regex 101](https://regex101.com/r/cO8lqs/2)

- 

## Anchors — ^ and $ etc

Patterns  | Explanation
----------|---------------------------------------------------
^The      | matches any string that starts with "The"
end$      | matches a string that ends with "end"
^The end$ | exact string match (starts and ends with The end)
roar      | matches any string that has the text roar in it

## Quantifiers — * + ? and {} etc

(tor:sayısal miktar göstericiler-niteleyiciler)

Patterns   | Explanation
-----------|-------------------------------------------------------------------------------
abc*       | matches a string that has ab followed by *zero or more* c (Try it!)
abc+       | matches a string that has ab followed by *one or more* c
abc?       | matches a string that has ab followed by *zero or one* c
abc{2}     | matches a string that has ab followed by 2 c
abc{2,}    | matches a string that has ab followed by 2 or more c
abc{2,5}   | matches a string that has ab followed by 2 up to 5 c
a(bc)*     | matches a string that has a followed by zero or more copies of the sequence bc
a(bc){2,5} | matches a string that has a followed by 2 up to 5 copies of the sequence bc

## OR operator — | or [] etc

Patterns   | Explanation
-----------|-------------------------------------------------------------------------------
a(b\|c) |matches a string that has a followed by b or c (and captures b or c) (Try it!)
a[bc]      |same as previous, but without capturing b or c

## Character classes - \d \w \s and . etc

Patterns | Explanation
---------|-----------------------------------------------------------------------------
\d       | matches *a single digit* character (Try it!)
\w       | matches *a word character* (alphanumeric character plus *underscore*) (Try it!)
\s       | matches *a whitespace* character (includes tabs and line breaks)
.        | matches *any character* (Try it!)

Use the "." operator carefully since often class or negated character class (which we’ll cover next) are *faster and more precise*.

`\d, \w and \s also present their negations with \D, \W and \S respectively.`

For example, \D will perform the inverse match with respect to that obtained with \d.

`\D         matches a single non-digit character (Try it!)`

In order to be taken literally, you must escape the characters ^.[$()|*+?{\ with a backslash \ as they have special meaning.

`\$\d       matches a string that has a $ before one digit (Try it!)`

Notice that you can match also non-printable characters like tabs \t, new-lines \n, carriage returns \r.

# Flags

We are learning how to construct a regex but forgetting a fundamental concept: flags.

A regex usually comes within this form /abc/, where the search pattern is delimited by two slash characters /. At the end we can specify a flag with these values (we can also combine them each other):

- g (global) does not return after the first match, restarting the subsequent searches from the end of the previous match
- m (multi-line) when enabled ^ and $ will match the start and end of a line, instead of the whole string
- i (insensitive) makes the whole expression case-insensitive (for instance /aBc/i would match AbC)

# Intermediate topics

## Grouping and capturing — () etc

Patterns    | Explanation
------------|--------------------------------------------------------------
a(bc)       | parentheses create a capturing group with value bc (Try it!)
a(?:bc)*    | using ?: we disable the capturing group (Try it!)
`a(?<foo>bc)` | using `?<foo>` we put a name to the group (Try it!)

This operator is very useful when we need to extract information from strings or data using your preferred programming language. Any multiple occurrences captured by several groups will be exposed in the form of a classical array: we will access their values specifying using an index on the result of the match.

If we choose to put a name to the groups (using (`?<foo>...`)) we will be able to retrieve the group values using the match result like a dictionary where the keys will be the name of each group.

## Bracket expressions — [] (Ranges)

Patterns   | Explanation
-----------|-------------------------------------------------------------------------------
[abc]            |matches a string that has either an a or a b or a c -> is the same as a|b|c -> Try it!
[a-c]            |same as previous
[a-fA-F0-9]      |a string that represents a single hexadecimal digit, case insensitively -> Try it!
[0-9]%           |a string that has a character from 0 to 9 before a % sign
[^a-zA-Z]        |a string that has not a letter from a to z or from A to Z. In this case the ^ is used as negation of the expression -> Try it!

## Greedy and Lazy match

The quantifiers ( * + { } ) are greedy operators, so they expand the match as far as they can through the provided text.

For example, <.+> matches `<div>simple div</div>` in `This is a <div> simple div</div> test`. In order to catch only the div tag we can use a ? to make it lazy:

`<.+?>` matches any character one or more times included inside < and >, expanding as needed (Try it!)

Notice that a better solution should avoid the usage of . in favor of a more strict regex:

Pattern  | Desc
---------|----------------------------------------------------------------------------------------
<[^<>]+> | matches any character except < or > one or more times included inside < and > (Try it!)
```

# Advanced topics

## Boundaries — \b and \B

`\babc\b          performs a "whole words only" search -> Try it!`

\b represents an anchor like caret (it is similar to $ and ^) matching positions where one side is a word character (like \w) and the other side is not a word character (for instance it may be the beginning of the string or a space character).

It comes with its negation, \B. This matches all positions where \b doesn’t match and could be if we want to find a search pattern fully surrounded by word characters.

`\Babc\B          matches only if the pattern is fully surrounded by word characters -> Try it!`

## Back-references — \1

Patterns             | Explanation
---------------------|---------------------------------------------------------------------------------------------------------------------------------------
([abc])\1            | using \1 it matches the same text that was matched by the first capturing group (Try it!)
([abc])([de])\2\1    | we can use \2 (\3, \4, etc.) to identify the same text that was matched by the second (third, fourth, etc.) capturing group (Try it!)
`(?<foo>[abc])\k<foo>` | we put the name foo to the group and we reference it later (`\k<foo>`). The result is the same of the first regex (Try it!)

Look-ahead and Look-behind — (?=) and (?<=)

Patterns  | Explanation
----------|-----------------------------------------------------------------------------------------------------
d(?=r)    | matches a d only if is followed by r, but r will not be part of the overall regex match (Try it!)
`(?<=r)d` | matches a d only if is preceded by an r, but r will not be part of the overall regex match (Try it!)

You can use also the negation operator!

Patterns | Explanation
---------|----------------------------------------------------------------------------------------------------------
d(?!r)   | matches a d only if is not followed by r, but r will not be part of the overall regex match (Try it!)
`(?<!r)d`  | matches a d only if is not preceded by an r, but r will not be part of the overall regex match (Try it!)


## Lookarounds

Patterns  | Explanation
----------|--------------------------------------------------------------------------------------------------------------------------------
(?=ABC)   | (positive lookahed) Matches a group after the main expression without including it in the result.
(?!ABC)   | (negative lookahed) Matches a group after the main expression without including it in the result.
(?<=ABC)  | (positive lookbehind) Matches a group before the main expression without including it in the result.
(?<!=ABC) | (negative lookbehind) Specifies a group that can not match before the main expression (if it matches, the result is discarded).

Örnek
```java
// Pattern 
\d(?=px)

// Text
1pt 2px 3em 4px

// Match Result
2 ve 4 olur

```

## Substitution

Short Meaining | Keywod | Meaning
---------------|--------|----------------------------------------------------------------------------------------------------------
match          | $&     | Inserts the matched text.
capture group  | $1     | Inserts the results of the specified capture group. For example, $3 would insert the third capture group.
before match       | $` | Inserts the portion of the source string that precedes the match.
after match        | $' | Inserts the portion of the source string that follows the match.
escaped $          | $$ | Inserts a dollar sign character ($).
escaped characters | \n | For convenience, these escaped characters are supported in the Replace string in RegExr: \n, \r, \t, \\, and unicode escapes \uFFFF. This may vary in your deploy environment.



# Summary

As you’ve seen, the application fields of regex can be multiple and I’m sure that you’ve recognized at least one of these tasks among those seen in your developer career, here a quick list:

- data validation (for example check if a time string i well-formed)
- data scraping (especially web scraping, find all pages that contain a certain set of words eventually in a specific order)
- data wrangling (transform data from “raw” to another format)
- string parsing (for example catch all URL GET parameters, capture text inside a set of parenthesis)
- string replacement (for example, even during a code session using a common IDE to translate a Java or C# class in the respective JSON object — replace “;” with “,” make it lowercase, avoid type declaration, etc.)
- syntax highlightning, file renaming, packet sniffing and many other applications involving strings (where data need not be textual)

Have fun and do not forget to recommend the article if you liked the article from the link 💚


- Link

https://medium.com/factory-mind/regex-tutorial-a-simple-cheatsheet-by-examples-649dc1c3f285


# Remember These (Addittion by engtuncay)

- Disabling group and naming a group

Patterns      | Explanation
--------------|----------------------------------------------------
a(?:bc)*      | using ?: we disable the capturing group (Try it!)
`a(?<foo>bc)` | using `?<foo>` we put a name to the group (Try it!)


- Character Classes
  
All shows a single character, quantifiers can be added after it.

Patterns | Explanation
---------|---------------------------------------------------------------------------
\d       | matches *a single digit* character
\w       | matches *a single word* character (alphanumeric character plus underscore)
\s       | matches a *whitespace* character (includes tabs and line breaks)


- In bracket expressions [], negation sign can be used.

```text
[^a-zA-Z] a string that has not a letter from a to z or from A to Z. In this case the ^ is used as negation of the expression
```

- default is greedy match, sometimes lazy match is needed.

`<.+?> : matches any character one or more times included inside < and >, expanding as needed`

Greedy example , preventing to behave greedy

`<[^<>]+> : matches any character except < or > one or more times included inside < and >`

- Boundaries are like ^,$. They shows a position.

\b represents an anchor like caret. \b assert position at a word boundary: (^\w|\w$|\W\w|\w\W). It shows start or end positions of a word.

`\babc\b : performs a "whole words only" search`

- back references is not mostly needed.

`([abc])\1 : using \1 it matches the same text that was matched by the first capturing group `

- flags

g modifier : *g*lobal. All matches (don't return after first match)

m modifier: *m*ulti line. Causes ^ and $ to match the begin/end of each line (not only begin/end of string)

i modifier: *i*nsensitive. Case insensitive match (ignores case of [a-zA-Z])

s modifier: *s*ingle line. Dot matches newline characters

u modifier: *u*nicode. Pattern strings are treated as UTF-16. Also causes escape sequences to match unicode characters

x modifier: e*x*tended. Spaces and text after a # in the pattern are ignored


# Cheatsheet

This cheatsheet is from www.regexr.com

Pattern | Explain
--------|-----------------------------
**Character classes**
.       | any character except newline
\w\d\s  | word, digit, whitespace
\W\D\S  | not word, digit, whitespace
[abc]   | any of a, b, or c
[^abc]  | not a, b, or c
[a-g]   | character between a & g
**Anchors**
^abc$	|start / end of the string
\b\B	|word, not-word boundary
**Escaped characters**
`\.\*\\`	|escaped special characters
\t\n\r	|tab, linefeed, carriage return
**Groups & Lookaround**
(abc)	|capture group
\1	|backreference to group #1
(?:abc)	|non-capturing group
(?=abc)	|positive lookahead
(?!abc)	|negative lookahead
**Quantifiers & Alternation**
a*a+a?	|0 or more, 1 or more, 0 or 1
a{5}a{2,}	|exactly five, two or more
a{1,3}	|between one & three
a+?a{2,}?	|match as few as possible
`ab|cd`	|match ab or cd


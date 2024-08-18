
- [PHP Regular Expressions](#php-regular-expressions)
  - [Regular Expression Functions](#regular-expression-functions)
  - [preg\_match()](#preg_match)
  - [preg\_match\_all()](#preg_match_all)
  - [preg\_replace()](#preg_replace)
  - [Regular Expression Modifiers](#regular-expression-modifiers)
  - [Regular Expression Patterns](#regular-expression-patterns)
    - [Metacharacters](#metacharacters)
    - [Quantifiers](#quantifiers)
    - [Grouping](#grouping)
  - [Complete RegExp Reference](#complete-regexp-reference)
- [Loop In Matches](#loop-in-matches)
- [Online Code Plays](#online-code-plays)
- [Articles](#articles)
  - [Regex Cheat Sheet on Rex Egg](#regex-cheat-sheet-on-rex-egg)
    - [Characters](#characters)
    - [Quantifiers](#quantifiers-1)
    - [More Characters](#more-characters)
    - [Logic](#logic)
    - [More White-Space](#more-white-space)
    - [More Quantifiers (Greedy and Lazy)](#more-quantifiers-greedy-and-lazy)
    - [Character Classes](#character-classes)
    - [Anchors and Boundaries](#anchors-and-boundaries)
    - [POSIX Classes](#posix-classes)
    - [Inline Modifiers](#inline-modifiers)
    - [Lookarounds](#lookarounds)
    - [Character Class Operations](#character-class-operations)
    - [Other Syntax](#other-syntax)
 

# PHP Regular Expressions

Source : https://www.w3schools.com/php/php_regex.asp

💡 What is a Regular Expression?

A regular expression is a sequence of characters that forms `a search pattern`. When you search for data in a text, you can use this search pattern to describe what you are searching for.

A regular expression can be a single character, or a more complicated pattern.

Regular expressions can be used to perform all types of text search and text replace operations.

Syntax

In PHP, regular expressions are strings composed of `delimiters (/), a pattern and optional modifiers`.

```php
$exp = "/w3schools/i";

```

In the example above, `/` is the delimiter, w3schools is the `pattern` that is being searched for, and `i` is a modifier that makes the search case-insensitive.

The delimiter can be any character that is not a letter, number, backslash or space. The most common delimiter is `the forward slash (/)`, but when your pattern contains forward slashes it is convenient to choose other delimiters such as `# or ~`.

## Regular Expression Functions

PHP provides a variety of functions that allow you to use regular expressions.

The most common functions are:

Function         | Description
-----------------|---------------------------------------------------------------------------------------
preg_match()     | Returns 1 if `the pattern was found` in the string and 0 if not
preg_match_all() | Returns `the number of times the pattern` was found in the string, which may also be 0 or to find the matched parts
preg_replace()   | Returns a new string where matched patterns have been replaced with another string

## preg_match()

The preg_match() function will tell you whether a string contains matches of a pattern.

Example : Use a regular expression to do a case-insensitive search for "w3schools" in a string:

```php
$str = "Visit W3Schools";
$pattern = "/w3schools/i";
echo preg_match($pattern, $str);

```

## preg_match_all()

The preg_match_all() function will tell you how many matches were found for a pattern in a string.

Example : Use a regular expression to do a case-insensitive count of the number of occurrences of "ain" in a string:


```php
$str = "The rain in SPAIN falls mainly on the plains.";
$pattern = "/ain/i";
echo preg_match_all($pattern, $str);

```

➖ find the matched parts

```php
preg_match_all($pattern, $str, $matches, PREG_SET_ORDER);

foreach ($matches as $m) {
  echo $m[0];
  echo "\n";
}
```

```php
$str2 = "The rain in SPAIN falls mainly on the plains.";
$pattern2 = "/f(all).*(ain)/i";

preg_match_all($pattern2, $str2, $matches2, PREG_SET_ORDER);

foreach ($matches2 as $m) {
  echo "m0:" . $m[0];
  echo "\n";
  if (!empty($m[1])) {
    echo "m1:" . $m[1];
    echo "\n";
  }
}
```





## preg_replace()

The preg_replace() function will replace all of the matches of the pattern in a string with another string.

Example : Use a case-insensitive regular expression to replace Microsoft with W3Schools in a string:


```php
$str = "Visit Microsoft!";
$pattern = "/microsoft/i";
echo preg_replace($pattern, "W3Schools", $str);

```

## Regular Expression Modifiers

Modifiers can change how a search is performed.

Modifier | Description
---------|----------------------------------------------------------------------------------------------------------------------------------------------------
i        | Performs a case-insensitive search
m        | Performs a multiline search (patterns that search for a match at the beginning or end of a string will now match the beginning or end of each line)
u        | Enables correct matching of UTF-8 encoded patterns

## Regular Expression Patterns

Brackets are used to find a range of characters:

Expression | Description
-----------|----------------------------------------------------------------------------------------------------------
[abc]      | Find one or many of the characters inside the brackets
[^abc]     | Find any character NOT between the brackets
[a-z]      | Find any character alphabetically between two letters
[A-z]      | Find any character alphabetically between a specified upper-case letter and a specified lower-case letter
[A-Z]      | Find any character alphabetically between two upper-case letters.
[123]      | Find one or many of the digits inside the brackets
[0-5]      | Find any digits between the two numbers
[0-9]      | Find any digits

### Metacharacters

Metacharacters are characters with a special meaning:

Metacharacter	| Description
---|---
\|	| Find a match for any one of the patterns separated by | as in: cat|dog|fish	
.	|Find any character	
^	|Finds a match as the beginning of a string as in: ^Hello	
$	|Finds a match at the end of the string as in: World$	
\d|	Find any digits	
\D|	Find any non-digits	
\s|	Find any whitespace character	
\S|	Find any non-whitespace character	
\w|	Find any alphabetical letter (a to Z) and digit (0 to 9)	
\W|	Find any non-alphabetical and non-digit character	
\b|	Find a match at the beginning of a word like this: \bWORD, or at the end of a word like this: WORD\b	
\uxxxx	|Find the Unicode character specified by the hexadecimal number xxxx	

### Quantifiers

Quantifiers define quantities:

Quantifier | Description
-----------|-----------------------------------------------------------------------------------
n+         | Matches any string that contains at least one n
n*         | Matches any string that contains zero or more occurrences of n
n?         | Matches any string that contains zero or one occurrences of n
n{3}       | Matches any string that contains a sequence of 3 n's
n{2, 5}    | Matches any string that contains a sequence of at least 2, but not more that 5 n's
n{3,}      | Matches any string that contains a sequence of at least 3 n's

Note: If your expression needs to search for one of the special characters you can use a backslash `( \ )` to escape them. For example, to search for one or more question marks you can use the following expression: `$pattern = '/\?+/';`

### Grouping

You can use parentheses `( )` to apply quantifiers to entire patterns. They also can be used to select parts of the pattern to be used as a match.

Example : Use grouping to search for the word "banana" by looking for ba followed by two instances of na:

```php
$str = "Apples and bananas.";
$pattern = "/ba(na){2}/i";
echo preg_match($pattern, $str);

```

## Complete RegExp Reference

For a complete reference, go to our Complete PHP Regular Expression Reference.

The reference contains descriptions and examples of all Regular Expression functions.

# Loop In Matches

```php
$re = '@\[([a-zA-Z0-9]+)\]|[][=?~#!]@';
$strs =array('DeviceLocation[West12]', '#=Device', '?[1234]=#Martin');

preg_match_all($re, $str, $matches, PREG_SET_ORDER);
$results = array();
$match_val = "";
foreach ($matches as $m) {
    if (!empty($m[1])) {
        $match_val = trim($m[1], "[]");
        array_push($results, "[]");
    } else {
        array_push($results, $m[0]);
    } 
}
echo "Value: " . $match_val . "\n";
echo "Symbols: " . implode(", ", $results);
echo "\n-----\n";


```

# Online Code Plays

- https://regexr.com/

- https://regex101.com

# Articles

Official Docs

- https://www.php.net/manual/en/function.preg-match-all.php

Articles

- https://dev.to/nnekajenny/php-regular-expressions-35dh


## Regex Cheat Sheet on Rex Egg

Source : https://www.rexegg.com/regex-quickstart.php

some parts may be removed and changed.

### Characters

Character | Legend                                                                                          | Example    | Sample Match
----------|-------------------------------------------------------------------------------------------------|------------|-------------
\d        | Most engines: one digit from 0 to 9                                                             | file_\d\d  | file_25
\w        | Most engines: "word character": ASCII letter, digit or underscore (alphanumeric and underscore) | \w-\w\w\w  | A-b_1
\s        | Most engines: "whitespace character": space, tab, newline, carriage return, vertical tab        | a\sb\sc    | a b \nc
\D        | One character that is not a digit as defined by your engine's \d                                | \D\D\D     | ABC
\W        | One character that is not a word character as defined by your engine's \w                       | \W\W\W\W\W | *-+=)
\S        | One character that is not a whitespace character as defined by your engine's \s                 | \S\S\S\S   | Yoyo

### Quantifiers

Quantifier | Legend              | Example        | Sample Match
-----------|---------------------|----------------|---------------
\+         | One or more         | Version \w-\w+ | Version A-b1_1
{3}        | Exactly three times | \D{3}          | ABC
{2,4}      | Two to four times   | \d{2,4}        | 156
{3,}       | Three or more times | \w{3,}         | regex_tutorial
\*         | Zero or more times  | A*B*C*         | AAACC
?          | Once or none        | plurals?       | plural


### More Characters

Character | Legend                                                   | Example                   | Sample Match
----------|----------------------------------------------------------|---------------------------|---------------
.         | Any character except line break                          | a.c                       | abc
.         | Any character except line break                          | .*                        | whatever, man.
\.        | A period (special character: needs to be escaped by a \) | a\\.c                     | a.c
\         | Escapes a special character                              | \\.\\*\\+\\? \\$\\^\\/\\\ | .*+? $^/\
\         | Escapes a special character                              | \\[\\{\\(\\)\\}\\]        | [{()}]


### Logic

Logic   | Legend                   | Example               | Sample Match
--------|--------------------------|-----------------------|------------------------
\|      | Alternation - OR operand | 22\|33                | 33
( … )   | Capturing group          | A(nt\|pple)           | Apple (captures "pple")
\1      | Contents of Group 1      | r(\w)g\1x             | regex
\2      | Contents of Group 2      | (\d\d)\+(\d\d)=\2\+\1 | 12+65=65+12
(?: … ) | Non-capturing group      | A(?:nt\|pple)         | Apple


### More White-Space

Character | Legend                              | Example    | Sample Match
----------|-------------------------------------|------------|-------------
\t        | Tab                                 | T\\t\\w{2} | T     ab
\r        | Carriage return character	see below |            |
\n|	Line feed character	see below	|
\r\n|	Line separator on Windows	|AB\r\nCD	|AB\nCD
\N	|Perl, PCRE (C, PHP, R…): one character that is not a line break	|\N+	|ABC

➖ for more infro, see the ref. article


### More Quantifiers (Greedy and Lazy)

Quantifier | Legend                           | Example  | Sample Match
-----------|----------------------------------|----------|-------------
\+         | The + (one or more) is "greedy"  | \d+      | 12345
?          | Makes quantifiers "lazy"         | \d+?     | 1 in 12345
\*         | The * (zero or more) is "greedy" | A*       | AAA
?          | Makes quantifiers "lazy"         | A*?      | empty in AAA
{2,4}      | Two to four times, "greedy"      | \w{2,4}  | abcd
?          | Makes quantifiers "lazy"         | \w{2,4}? | ab in abcd


### Character Classes

Character | Legend                                                                      | Example        | Sample Match
----------|-----------------------------------------------------------------------------|----------------|-------------------------------------------------------------------------
[ … ]     | One of the characters in the brackets                                       | T[ao]p         | Tap or Top
\-        | Range indicator                                                             | [a-z]          | One lowercase letter
[x-y]     | One of the characters in the range from x to y                              | [A-Z]+         | GREAT
[ … ]     | One of the characters in the brackets                                       | [AB1-5w-z]     | One of either: A,B,1,2,3,4,5,w,x,y,z
[x-y]     | One of the characters in the range from x to y                              | [ -~]+         | Characters in the printable section of the ASCII table.
[^x]      | One character that is not x                                                 | [^a-z]{3}      | A1!
[^x-y]    | One of the characters not in the range from x to y                          | [^ -~]+        | Characters that are not in the printable section of the ASCII table.
[\d\D]    | One character that is a digit or a non-digit                                | [\d\D]+        | Any characters, including new lines, which the regular dot doesn't match
[\x41]    | Matches the character at hexadecimal position 41 in the ASCII table, i.e. A | [\x41-\x45]{3} | ABE

### Anchors and Boundaries

Anchor | Legend                                                                                   | Example    | Sample Match
----------|------------------------------------------------------------------------------------------|------------|-------------
^	|Start of string or start of line depending on multiline mode. (But when [^inside brackets], it means "not")	|^abc.*	|abc (line start)
$	|End of string or end of line depending on multiline mode. Many engine-dependent subtleties.	|.*? the end$|	this is the end
\A|	Beginning of string (all major engines except JS)	|\Aabc[\d\D]*	abc (string... ...start)
\z |	Very end of the string Not available in Python and JS	the end\z	this is...\n...the end
\Z	| End of string or (except Python) before final line break Not available in JS	the end\Z	this is...\n...the end\n
\G	| Beginning of String or End of Previous Match .NET, Java, PCRE (C, PHP, R…), Perl, Ruby		
\b	| Word boundary Most engines: position where one side only is an ASCII letter, digit or underscore	Bob.*\bcat\b	Bob ate the cat
\b	|Word boundary .NET, Java, Python 3, Ruby: position where one side only is a Unicode letter, digit or underscore	Bob.*\b\кошка\b	Bob ate the кошка
\B	| Not a word boundary	c.*\Bcat\B.*	copycats


### POSIX Classes

see the reference article

### Inline Modifiers

None of these are supported in JavaScript. In Ruby, beware of (?s) and (?m).

Modifier | Legend                                                                                                                                                                      | Example                                                                                                                  | Sample Match
---------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------------------------------------------|------------------
(?i)     | Case-insensitive mode (except JavaScript)                                                                                                                                   | (?i)Monday                                                                                                               | monDAY
(?s)     | DOTALL mode (except JS and Ruby). The dot (.) matches new line characters (\r\n). Also known as "single-line mode" because the dot treats the entire input as a single line | (?s)From A.*to Z                                                                                                         | From A <br/>to Z
(?m)     | Multiline mode (except Ruby and JS) ^ and $ match at the beginning and end of every line                                                                                    | `(?m)1\r\n^2$\r\n^3$`                                                                                                    | 1 <br/>2 <br/>  3
(?m)     | In Ruby: the same as (?s) in other engines, i.e. DOTALL mode, i.e. dot matches line breaks                                                                                  | (?m)From A.*to Z                                                                                                         | From A <br/>to Z
(?x)     | Free-Spacing Mode mode (except JavaScript). Also known as comment mode or whitespace mode                                                                                   | (?x) # this is a <br/># comment <br/>abc # write on multiple <br/> # lines <br/>[ ]d # spaces must be <br/># in brackets | abc d
(?n)	|.NET, PCRE 10.30+: named capture only	|Turns all (parentheses) into non-capture groups. To capture, use named groups.
(?d)	|Java: Unix linebreaks only	|The dot and the ^ and $ anchors are only affected by \n	
(?^)	|PCRE 10.32+: unset modifiers	| Unsets ismnx modifiers	

named groups for more information : (https://www.rexegg.com/regex-capture.html#namedgroups)	


### Lookarounds

Lookaround | Legend              | Example           | Sample Match
-----------|---------------------|-------------------|--------------------
(?=…)      | Positive lookahead  | (?=\d{10})\d{5}   | 01234 in 0123456789
(?<=…)     | Positive lookbehind | (?<=\d)cat        | cat in 1cat
(?!…)      | Negative lookahead  | (?!theatre)the\w+ | theme
(?<!…)     | Negative lookbehind | \w{3}(?<!mon)ster | Munster


### Character Class Operations

Class Operation | Legend                                                                                                          | Example       | Sample Match
----------------|-----------------------------------------------------------------------------------------------------------------|---------------|------------------------
[…-[…]]         | .NET: character class subtraction. One character that is in those on the left, but not in the subtracted class. | [a-z-[aeiou]] | Any lowercase consonant

➖ for more info, see the ref article

### Other Syntax

Syntax | Legend                                                                                                                                                          | Example     | Sample Match
-------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------|-------------|-------------
\K     | Keep Out <br/> Perl, PCRE (C, PHP, R…), Python's alternate regex engine, Ruby 2+: drop everything that was matched so far from the overall match to be returned | prefix\K\d+ | 12
\Q…\E  | Perl, PCRE (C, PHP, R…), Java: treat anything between the delimiters as a literal string. Useful to escape metacharacters.                                      | \Q(C++ ?)\E | (C++ ?)

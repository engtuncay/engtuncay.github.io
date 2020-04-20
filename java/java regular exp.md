Java ve Diger Dillerde Regular Expression Kullanımı

[TOC]

# Java Regular Expressions

## Regex Online Test

- [Regex Planet](http://www.regexplanet.com/advanced/java/index.html)


## Matching a single character
Characters that otherwise have special regexp meanings.
Özel anlama sahip karakterler. Kullanırsak, backslash ( \ ) ile kullanmamız gerekir.

```c
\   Precedes characters that have a special meaning: \. \+ \* \? \| \{ \( \[ \^ \$
```

## Characters that need to be written in a special way

```c
\t  The tab character
\n  The newline (line feed) character
\r  The carriage-return character
\f  The form-feed character
```

## Matching a single character with a predefined character class

Karakter kümesini tanımlayan özel karakterler

```c
.   Any character (may or may not match line terminators)
\d  A digit: [0-9]
\D  A non-digit: [^0-9]
\s  A whitespace character: [ \t\n\x0B\f\r]   (Boşluk karekteri)
\S  A non-whitespace character: [^\s]
\w  A word character: [a-zA-Z_0-9]
\W  A non-word character: [^\w]
```

## Defining Character classes (match one character)

Character classes provide a way to specify a set of characters. The class specification is enclosed in [ ]. The set can also be expressed by what must not be in it by beginning the set with a caret, "^". Minus, "-", can be used to indicate a range of character values. Altho a character class matches only one character, a quantifier following it can be used to match multiple characters.

```c
[abc]   a, b, or c (simple class)
[^abc]  Any character except a, b, or c (negation)
[a-zA-Z]    a through z or A through Z, inclusive (range)
```

## Position and Boundary patterns (match zero characters) 

```c
^   The beginning of a line. Very useful.
$   The end of a line. Very userful. ^$ matches all emtpy lines.
\b  A word boundary
\B  A non-word boundary
\A  The beginning of the input
\G  The end of the previous match
\Z  The end of the input but for the final terminator, if any
\z  The end of the input
```

## Quantifiers (repeating the previous element) (Miktar Belirleyiciler)

Greedy quantifiers - Expand as much as possible

Açgözlü belirleyiciler - Mümkün olduğunca

```c
X?  X, once or not at all (1 veya 0)
X*  X, zero or more times ( 0 veya daha çok)
X+  X, one or more times ( 1 veya daha çok)
X{n}    X, exactly n times ( Tam olarak n tane)
X{n,}   X, at least n times ( En az n tane)
X{n,m}  X, at least n but not more than m times ( En az n, en çok m tane )
```

## Reluctant quantifiers - Expand only if forced by later failure to match $$work

```c
X?? X, once or not at all
X*? X, zero or more times
X+? X, one or more times
X{n}?   X, exactly n times
X{n,}?  X, at least n times
X{n,m}? X, at least n but not more than m times
```

FIXME ek bilgiler eklenmeli


## Alternation

```c
X|Y Tries matching X first, if that doesn't work, tries Y
```

FIXME ek bilgiler eklenmeli

## Grouping - Parentheses both group and create a numbered element that can be used later.

```c
(X) X. This capturing group is remembered so it can be referenced later.
Numbered starting at 1.
```

FIXME ek bilgiler eklenmeli

## Genel Özellikler ( global , multiline )



## Regex Tutorials

- [Lee Point](https://www.leepoint.net/data/strings/40regular_expressions/25sum-regex-basic.html)
- [Journal Dev](https://www.journaldev.com/634/regular-expression-in-java-regex-example)

## Sources

- https://www.leepoint.net/data/strings/40regular_expressions/25sum-regex-basic.html

# Samples

## ReplaceAll - Using With $1

```java
this.str = str.replaceAll("(--.*)(@)", "$1#");
```





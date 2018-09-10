
**Java Programming Language**

**Prepared By** Tuncay Orak

**Contributions**

Sources are given at the end of the sections.

---

<!-- TOC -->

- [Java Core](#java-core)
    - [Types](#types)
        - [String](#string)
        - [Date](#date)
            - [Parsing String to Date](#parsing-string-to-date)
    - [Atomic Reference](#atomic-reference)
- [Java Regular Expressions](#java-regular-expressions)
    - [Regex Online Test](#regex-online-test)
    - [Matching a single character](#matching-a-single-character)
    - [Characters that need to be written in a special way](#characters-that-need-to-be-written-in-a-special-way)
    - [Matching a single character with a predefined character class](#matching-a-single-character-with-a-predefined-character-class)
    - [Defining Character classes (match one character)](#defining-character-classes-match-one-character)
    - [Position and Boundary patterns (match zero characters)](#position-and-boundary-patterns-match-zero-characters)
    - [Quantifiers (repeating the previous element) (Miktar Belirleyiciler)](#quantifiers-repeating-the-previous-element-miktar-belirleyiciler)
    - [Other](#other)
    - [Regex Tutorials](#regex-tutorials)
    - [Sources](#sources)
- [Java IO](#java-io)
    - [Character Encoding](#character-encoding)
        - [Hexidecimal Number](#hexidecimal-number)
        - [Encoding Scheme](#encoding-scheme)

<!-- /TOC -->

---

# Java Core

## Types

### String

### Date

####  Parsing String to Date

Source

https://www.mkyong.com/java/how-to-convert-string-to-date-java/





## Atomic Reference

Anonim sınıf veya Lambda bloklarında metodun lokal değişkenlerini kullanabilmek için atomic reference nesnesini kullanabiliriz.

```java
AtomicReference<List<MkCARI_HESAP_HAREKETLERI>> atomref = new AtomicReference<>();
    
    Thread t = new Thread(() -> {
        // atomic ref set ediyoruz
        atomref.set(new RepoTblCariHareketler().getBankaEkste());
    });

     List<MkCARI_HESAP_HAREKETLERI> listEkstre = atomref.get();
```

# Java Regular Expressions

## Regex Online Test

- http://www.regexplanet.com/advanced/java/index.html



## Matching a single character

Characters that otherwise have special regexp meanings.

Özel anlama sahip karakterler. Kullanırsak, backslash ( \ ) ile kullanmamız gerekir.

```
\	Precedes characters that have a special meaning: \. \+ \* \? \| \{ \( \[ \^ \$
```

## Characters that need to be written in a special way

```
\t	The tab character
\n	The newline (line feed) character
\r	The carriage-return character
\f	The form-feed character
```

## Matching a single character with a predefined character class
Karakter kümesini tanımlayan özel karakterler

```
.	Any character (may or may not match line terminators)
\d	A digit: [0-9]
\D	A non-digit: [^0-9]
\s	A whitespace character: [ \t\n\x0B\f\r]
\S	A non-whitespace character: [^\s]
\w	A word character: [a-zA-Z_0-9]
\W	A non-word character: [^\w]

```

## Defining Character classes (match one character)

Character classes provide a way to specify a set of characters. The class specification is enclosed in [ ]. The set can also be expressed by what must not be in it by beginning the set with a caret, "^". Minus, "-", can be used to indicate a range of character values. Altho a character class matches only one character, a quantifier following it can be used to match multiple characters.

```
[abc]	a, b, or c (simple class)
[^abc]	Any character except a, b, or c (negation)
[a-zA-Z]	a through z or A through Z, inclusive (range)

```

## Position and Boundary patterns (match zero characters)

```
^	The beginning of a line. Very useful.
$	The end of a line. Very userful. ^$ matches all emtpy lines.
\b	A word boundary
\B	A non-word boundary
\A	The beginning of the input
\G	The end of the previous match
\Z	The end of the input but for the final terminator, if any
\z	The end of the input

``` 

## Quantifiers (repeating the previous element) (Miktar Belirleyiciler)

Greedy quantifiers - Expand as much as possible
Açgözlü belirleyiciler - Mümkün olduğ

```
X?	X, once or not at all  (1 veya 0)
X*	X, zero or more times  ( 0 veya daha çok)
X+	X, one or more times  ( 1 veya daha çok)
X{n}	X, exactly n times ( Tam olarak n tane)
X{n,}	X, at least n times ( En az n tane)
X{n,m}	X, at least n but not more than m times ( En az n, en çok m tane )
 
```

Reluctant quantifiers - Expand only if forced by later failure to match

```
X??	X, once or not at all
X*?	X, zero or more times
X+?	X, one or more times
X{n}?	X, exactly n times
X{n,}?	X, at least n times
X{n,m}?	X, at least n but not more than m times

```
## Other
 
Alternation

```
X|Y	Tries matching X first, if that doesn't work, tries Y

``` 

Grouping - Parentheses both group and create a numbered element that can be used later.

```
(X) X. This capturing group is remembered so it can be referenced later. 
        Numbered starting at 1.

```

## Regex Tutorials

- https://www.leepoint.net/data/strings/40regular_expressions/25sum-regex-basic.html

- https://www.journaldev.com/634/regular-expression-in-java-regex-example



## Sources

- https://www.leepoint.net/data/strings/40regular_expressions/25sum-regex-basic.html




# Java IO


## Character Encoding 

Files are split into two cats [dosyalar iki kategoriye ayrılır] : (binary (like images) and text (txt files) ) 

Fundamentally all files are binary.

### Hexidecimal Number 

a -> 61 (hex) -> 0110 0001

Single byte can be any of 256 patterns (2^8)

### Encoding Scheme

Every  file uses some encoding scheme.

character <-> hexadecimal # <-> binary

Encoding : 'a' -> 61 hex code -> 0110 0001

Decoding : 0110 0001 -> 61 -> 'a'

Examples : ASCII , UCS-2 , UTF-16 , UTF-32


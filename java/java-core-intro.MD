**Java Programming Language**

**Prepared By** Tuncay Orak

**Contributions**

Sources are given at the end of the sections.

- [Java Core](#java-core)
  - [Basic Types](#basic-types)
    - [String](#string)
      - [String Format](#string-format)
    - [Integer](#integer)
    - [Double](#double)
    - [Date](#date)
      - [Parsing String to Date](#parsing-string-to-date)
  - [Other Types](#other-types)
    - [Long](#long)
    - [Float](#float)
  - [Advanced Types](#advanced-types)
- [Atomic Reference](#atomic-reference)
- [Java IO](#java-io)
  - [Character Encoding](#character-encoding)
    - [Hexidecimal Number](#hexidecimal-number)
    - [Encoding Scheme](#encoding-scheme)
- [Source](#source)

---

# Java Core

## Basic Types

```java
String
Integer
Double
Float
Date
```

**Advanced Types**
```java

```

### String

#### String Format

```java
String sf1=String.format("name is %s",name);  
String sf2=String.format("value is %f",32.33434); // same output with number
String sf3=String.format("value is %32.12f",32.33434);//returns 12 char fractional part filling with 0  
```

```java
Format Specifier	Data Type	Output
%a	floating point (except BigDecimal)	Returns Hex output of floating point number.
%b	Any type	"true" if non-null, "false" if null
%c	character	Unicode character
%d	integer (incl. byte, short, int, long, bigint)	Decimal Integer
%e	floating point	decimal number in scientific notation
%f	floating point	decimal number
%g	floating point	decimal number, possibly in scientific notation depending on the precision and value.
%h	any type	Hex String of value from hashCode() method.
%n	none	Platform-specific line separator.
%o	integer (incl. byte, short, int, long, bigint)	Octal number
%s	any type	String value
%t	Date/Time (incl. long, Calendar, Date and TemporalAccessor)	%t is the prefix for Date/Time conversions. More formatting flags are needed after this. See Date/Time conversion below.
%x	integer (incl. byte, short, int, long, bigint)	
Hex string.
```

### Integer

### Double

### Date


#### Parsing String to Date


## Other Types

### Long

### Float


## Advanced Types





# Atomic Reference
Anonim sınıf veya Lambda bloklarında metodun lokal değişkenlerini kullanabilmek için atomic reference nesnesini kullanabiliriz.

```java
AtomicReference<List<MkCARI_HESAP_HAREKETLERI>> atomref = new AtomicReference<>();
Thread t = new Thread(() -> {
// atomic ref set ediyoruz
atomref.set(new RepoTblCariHareketler().getBankaEkste());
});
List<MkCARI_HESAP_HAREKETLERI> listEkstre = atomref.get();
```




# Java IO

## Character Encoding
Files are split into two cats [dosyalar iki kategoriye ayrılır] : (binary (like images) and text (txt files) )
Fundamentally all files are binary.

### Hexidecimal Number
a -> 61 (hex) -> 0110 0001
Single byte can be any of 256 patterns (2^8)

### Encoding Scheme
Every file uses some encoding scheme.
character <-> hexadecimal # <-> binary
Encoding : 'a' -> 61 hex code -> 0110 0001
Decoding : 0110 0001 -> 61 -> 'a'
Examples : ASCII , UCS-2 , UTF-16 , UTF-32



# Source

- https://www.mkyong.com/java/how-to-convert-string-to-date-java/
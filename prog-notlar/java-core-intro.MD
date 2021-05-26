**Java Programming Language**
**Prepared By** Tuncay Orak
**Contributions**
Sources are given at the end of the sections.

[TOC]


---

# Java Core


## Basic Types

### String

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
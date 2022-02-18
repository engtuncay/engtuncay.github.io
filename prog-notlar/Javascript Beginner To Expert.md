# Introduction to Javascript 

This book introduces core Javascript and also new features of ES6

<div class="page"/>

# Content

- [Introduction to Javascript](#introduction-to-javascript)
- [Content](#content)
  - [Visual Studio Code Extension for Javascript](#visual-studio-code-extension-for-javascript)
- [Core Concepts](#core-concepts)
  - [Variable Assignment](#variable-assignment)
  - [Data Type Casting](#data-type-casting)
  - [Operators and Math Object](#operators-and-math-object)
  - [String Methods](#string-methods)
  - [Template Literal](#template-literal)
  - [Arrays](#arrays)
  - [Objects in Javascript](#objects-in-javascript)
  - [Js Time Object and its methods](#js-time-object-and-its-methods)
- [Js Core (Part 2)](#js-core-part-2)
  - [Comparison Operators](#comparison-operators)
  - [Logical Operators](#logical-operators)
  - [If Statement](#if-statement)
  - [Switch - Case Statement](#switch---case-statement)
  - [Functions, IIFE and Anonymous Functions](#functions-iife-and-anonymous-functions)
  - [Loops - While,Do While,For](#loops---whiledo-whilefor)
  - [Window Object](#window-object)
  - [Scope Concepts - Function Scope, Global Scope, Block Scope](#scope-concepts---function-scope-global-scope-block-scope)
- [DOM](#dom)
  - [Document Object (Part 1)](#document-object-part-1)
  - [Document Object (Part 2)](#document-object-part-2)
- [ES-6 Features](#es-6-features)
  - [For in and For of Loops](#for-in-and-for-of-loops)
  - [ES6 Maps](#es6-maps)
  - [Referance Types - Recap](#referance-types---recap)
  - [Set](#set)

<div class="page"/>


## Visual Studio Code Extension for Javascript 

These are useful extension for visual stuido code:

* Debugger for Chrome

* JavaScript (ES6) code snippets

* jQuery Code Snippets

* ESLint

<div class="page"/>

# Core Concepts

## Variable Assignment 

* var is old assignment keyword , it is global assignment which can lead to some confusing situations. There are three assignment keywords in javascript.

```js
var : global assignemnt
let : local assignment 
const : local assignmet for constants
```
* You should use let or const keyword usually. 

* If we create a reference or array with const, we couldnt set it again, but we can change content of const object or const array. (tr:const referans bir obje veya array oluşturursak, yeni set edemeyiz, fakat mevcut içinde değişiklik yapabiliriz.)

## Data Type Casting 

- Converting data type to string

```js
value1 = String(323);
value2 = String(true);
value3 = String(function() { console.log()});
value4 = String([1,2,3])
value5 = (10).toString();
```

- Converting data type to integere

```js
value = Number("123");
value = Number(null); // 0
```

- undefined,string and function types cant be converted to number.

 ```js
value = parseFloat("3.14");
value = parseInt("3");
```
- Automatic Casting (Otomatik Çevirme)

```js
const a = "Hello" + 34 // Hello34
// 34 (number) is converted to string
```

## Operators and Math Object

Core four Operators:

```js
let a = 20
let b = 10

a + b (plus)
a - b (minus)
a * b (multiply)
a % b  (modular)
```

- Math object

```js
a = Math.PI
b = Math.E

Math.round(3.6) // 4
Math.ceil(3.2) // 4
Math.floor(3.6) // 3

Math.sqrt(16) // 4
Math.abs(-10) // 10
Math.pow(2,3) // 8

Math.max(10,-1,100) // 100
Math.min(3,9,10) // 3

Math.random() // generates number between 0-1

Math.random() * 20 // generates number between 0-20

Math.floor(Math.random()*20+1); // generates number between 1 ile 20
```

## String Methods

- String concentanation

Ways for combining string :

 ```js
let a = "Ali" + " " + "Kaya"

a + = ":";

a.concat(" Sayın"); // equals a + " Sayın"
 ```
 
- Some methods

```js
a.length
a.toLowerCase();
a.toUpperCase();
```

- index of first character in a string is 0

```js
let a = "Book";
console.log(a[0]) // B
```

* indexOf method

```js
a.indexOf("A") // 0
a.indexOf("x") // -1
```
    
* charAt Method

```js
a.charAt(0) // A
```
    
* split Method

```js
let degerler = "Ali,Veli,Kaya";
degerler.split(","); // [Ali,Veli,Kaya]
```

* replace Method

```js
let degerler = "Ali,Veli,Kaya";
degerler.replace("Ali","Kemal") // replaces Ali with Kemal.
```
    
* includes Method

```js
let degerler = "Ali,Veli,Kaya";
degerler.includes("Veli") // true 
```
    
## Template Literal 

You can make String with template literal.

```js
let name = "Ali Veli";
let department = "Bilişim"

const a = `Name:$(name)\nDepartment$(department)\n`

const html = `<ul><li>$(name)<li><ul>`
```

- mathematical operations can be done
    
```js
$(10/2) // 5 
```

## Arrays

    const numbers= [15,2,5,6] // stringde ekleyebiliriz.
    
    const numbers = new Array(15,2,5,6)

    const langs = ["Phyton","Java"]

    // uzunluk
    value = numbers.length;

    // indeks ile erişim
    value = numbers[0] // 15
    value = numbers[numbers.length-1] // son elemana erişir

    numbers[0] = 152

    // index of
    numbers.indexOf(5) // 2 verir

    // array sonuna ekler
    numbers.push(200)

    // array başına ekleme
    numbers.unshift(324)

    // arrayin sonundaki elemanı çıkarır
    numbers.pop()

    // arrayin başındaki elemanı çıkarır
    numbers.shift()

    // arrayden eleman çıkarma indeks ile
    numbers.splice(0,2) // indeks 0 ve 2 de olan elemanları çıkarır

    // tersine çevirir
    numbers.reverse()

    // sıralama (string çevirererk göre yapar)
    numbers.sort()

    // sayıları sıralama
    numbers.sort(function(x,y){ // küçükten büyüğe
        return x-y;
    });
 
     
    numbers.sort(function(x,y){ // büyükten küçüğe sırala
    return x-y;
    });
 
 ## Objects in Javascript
 
 (tr:Js de Obje Kavramı ve Oluşturma)
 
     conts programmer = {
      name : "Ali Kemal",
      age : 25,
      langs : ["Java","Phyton"],
      address : {
        street: "Kaya Mah",
        no : 13
      },
      work: function(){
       console.log("Programcı çalışıyor");
      }
     }

     value = programmer;
     console.log(value);

     // Alanlar Erişim
     value = programmer.name
     value = programmer["email"]

     // Objenin obje elemanın alanına erişim
     value = programmer.address.city;

     // Metod Çağırma
     programmer.work();

    // Array içerisine obje koyma
    const programmers = [
        {name:"Ali Kemal",age:21},
        {name:"Veli Kemal",age:25}
    ]

    value = programmers[0].name; //Ali Kemal


## Js Time Object and its methods

(tr:Zaman Objesi ve Metodları)

    const now = new Date(); // Şu anki zamanı almamızı sağlar

    const date1 = new Date("9-19-1993 06:15:00");

    date2 = new Date("September 19 1993");

    date3 = new Date("9/19/1993");

    value = date1.getMonth(); // ay indeksini verir, Ocak 0'dan başlar

    date1.getDate(); // ayın kaçıncı günü olduğunu verir

    date1.getDay(); // gün indeksini verir, pazartesi 0 dan başlar

    date1.getHours(); // saati verir

    date1.getMinutes(); // dakikayı verir

    date1.getSeconds(); // saniyeyi verir

    date1.getMiliseconds(); // milisaniyeyi verir

- Bu metodların set hali de var.

        setDate(date:number) // ayın gününü belirler


<div class="page"/>

# Js Core (Part 2)

## Comparison Operators

(tr:Karşılaştırma Operatörleri)

    == Eşitlik (Değer) Operatörü
    === Eşitlik (Tip ve Değer) Operatörü

    != Eşit Değildir Operatörü
    !=== Eşit Değildir Operatörü

    > , < , >= , <= 

    2=2 true
    "js" == "java" false
    2=="2" true (2 yi stringe çevirir)
    2 === "2" false (değerleri gibi tipleri aynı olmalı)

## Logical Operators

(tr:Mantıksal Operatörler)

    ! Not Operatörü

    && And Operatörü ( Bir false değer, sonucu false yapar)

    || Or Operatör ( Bir true değer, sonucu true yapar )

## If Statement

- General Syntax:

```js
if(condition) {
    //statements
} [else {
    // statements
}] [else if (condition){
    // statements
}]
```

 - Example 1
 
 ```js
const error = false;

if(error==true){
    consolo.log("Error variable is true");
} 
 ```
 
- Short if

Tek işlemli if

    if(error==true) console.log("Hata oluştu");

- Ternary If

usage of ternary operatörü (?)

    let sonuc = (number === 100 ? "Sayı 100":"Sayı 100 degil");


## Switch - Case Statement


```js
const = process = 1 ;

switch(process){

case 1:
console.log("1")
break;
case 2:
console.log("1")
break;
default:
console.log("Varsayılan İşlem")
//break;
}
```

## Functions, IIFE and Anonymous Functions


```js
// Function definition
function hello(name,age){
    console.log(`Name ${name} Yaş: ${age}`);
}

// Calling a function
hello();

```

- varsayılan değer atamak istenirse

a. Way 1

    function hello(name,age){
        if(typeof name === "undefined") name ="Bilgi Yok";
        console.log(`Name ${name} Age: ${age}`);
    }

b.

    function merhaba(name= "Bilgi Yok",age){
        if(typeof name === "undefined") name ="Bilgi Yok";
        console.log(`Name ${name} Age: ${age}`);
    }

- return kullanımı ,fonksiyon sonucunda bir değer veya obje döndürmesi

        function square(x){
            return x*x;
        }

return bir fonksiyonu sonlandıran da ifadedir.

- Function Expression

        const merhaba = function(name){
            console.log("Merhaba "+ name);
        }

        merhaba("Murat"); // Murat yazdırır konsole.

- Immediately Invoked Function Expression(IIFE) tanımlandığı yerde çalışan fonksiyon

        (function(name){
          console.log("Merhaba: "+ name);
        })("Murat"); // output: Merhaba: Murat

- objenin içindeyse fonksiyona metod denir, dışında ise fonksiyon denir.

        const database = {
            host: "localhost",
            add: function(){
                console.log("eklendi");
            }
            delete: function(id){
                console.log(`id: ${id} Silindi`);
            }
        }


        database.add()
        database.delete(10);


## Loops - While,Do While,For

- While Loop

```js
let i = 0
while(i<10){
    console.log(i);
    i++;
    if(i==2){
        continue;
    }
    if(i==8){
        break;
    }
}
```

- break stops a loop.

- continue statement passes next step in a loop

- Do While Loop

        let i = 0
        do {
          console.log(i)
          i++;
        }while(i<10)


        const langs = ["Phyton,"Javascript","Java"]
        let index = 0;
        while( index < langs.length){
            console.log(langs[index]);
            index++
        }


- For Loop

        for(let index=0;index<langs.length;index++){
          console.log(langs[index]);
        }


- For Each Loop

        langs.forEach( function(lang){
            console.log(lang);
        });

        langs.forEach( function(lang,index){
            console.log(lang,index);
        });


        const users = [
         {name:"Ali",age:20},
         {name:"Kemal",age:24},
         {name:"Veli",age:22}
        ];

        const names = users.map(function(user){
            return user.name;
        });

        console.log(names); // [Ali,Kemal,Veli]

- for in Loop

        for( let user in users){
            console.log(
        }

        const = user {
            name:"Mustafa",
            age:25
        };

- **Loop in properties of an Object**


```js
for ( let key in user){
    console.log(key,user[key]);
}

// output: 
// name Mustafa
// age 25
```


## Window Object

- Javascript code in a web page place in the window object, as this keyword (or reference) refer to window object. (tr: web sayfasındaki javascript kodlarımız window objesinin içerisinde çalışır, çünkü this anahtar kelimesi (veya referansı) window objesini gösterir.)

```js

        console.log(this); // window objesini döner

        console.log(window); // window objesini döner

        window.location objesi
        window.confirm()
        window.prompt() kullanıcıdan veri almak için

```

- confirm

```js

const cevap = confirm("Emin misiniz?");
console.log(cevap) // true ve false döner kullanıcının cevabına göre

// promp

const cevap = prompt("2+2 = ?");

console.log(cevap);

// window.location

let value = window.location;
console.log(value);

window.location.host    // host adresi
window.location.hostname
window.location.port
window.location.href
window.location.reload() // sayfayı yeniler.

window.outerHeight // pencere çubuğunu dahil edip yükseklik
window.outerWidth //

window.innerHeight // web sayfasının gösterilen panelin yüksekliği
window.innerWidth

window.scrollx // yatay scroll'un konumu
window.scrolly // dikey scrol'un konumu

```

## Scope Concepts - Function Scope, Global Scope, Block Scope

* Three different scopes :

Global scope : Herhangi bir fonksiyion için olmayan 

Function scope :

    function a(){
        // function scope
    }

    if(){
        // block scope
    }


- Örnek

```js
var value1 = 10;
let value2 = 20;
const value3= 30;

function abc(){
    var value1 = 40;
    let value2 = 50;
    const value3= 60;

    console.log(value1,value2,value3); // 40,50,60
}

abc();
console.log(value1,value2,value3); // 10,20,30
```

- Example 2

        if(true){
            var a = 10;
            let b = 20;
            const c=30;
        }

        // var değişkeni dışarıda da var olur.
        console.log(a); //10
        console.log(b); // hata
        console.log(c); // hata

<div class="page"/>

# DOM

Document Object Model

                                                                   |-> Element <head>
    Document -> Root Element <html> -|
                                                                   |-> Element <body>
                                                

## Document Object (Part 1)

- Document objesi , window objesinin bir propertisidir / alanıdır.

        // ikis de aynı objesi gösterir
        console.log ( window.document )
        console.log ( this.document )

- Örnek 2
```js
let value;
value= document;
value= document.all;

value = document.all.lenght // html de kaç element olduğunu gösterir
value = document.all[0]; // html elementi gösterir
value = document.all[6]; // 6 'nci elementi döner


const elements = document.all; // html collection döner

for ( let i=0; i <element.length;i++) {
    console.log(elements[i]); // bütün eleman tanımlarını gösterir
}

// elements.forEach xxx collection olduğu için kullanılamaz

const collections = Array.from(document.all);

collections.forEach( function(collection) {
    console.log (collection);
})

// body e erişmek için

value = document.body;
value = document.head;
value = document.location; // location objesinin döner
value = document.location.hostname //  127.0.0.1
value = document.location.port // 5500
value = document.URL; // http://.....
value = document.characterSet // UTF-8

console.log(value)
```

## Document Object (Part 2)

```js
value = document.links; // sayfaya eklenen link etiketlerinin (a) listesini verir 
value = document.links[0]; // ilk linki verir
value = document.links.length; // link sayısını verir
value = document.links[0].getAttribute("class");
// link etiketinin class attribute nun değerinin verir

value = document.links[0].getAttribute("href");

value = document.links[0].getAttribute("class");

value = document.links[0].className; // sınıf isimlerini verir

value = document.links[0].classList; // tanımlı sınıfları array şeklinde verir

```

- Formlar

```js
value = document.forms; // sayfadaki formları gösterir (Html Collection olarak)
value = document.forms.length; // form sayısını verir
value = document.forms[0]; // ilk formu gösterir
value = document.forms["form"] // name attribute'u form olan formu döner
value = document.links[0].id; // ilk formun id attribute değerini döner
value = document.links[0].getAttribute("id"); 


```
<div class="page"/>

# ES-6 Features

## For in and For of Loops

```js
const person = {
    name:"Mustafa",
    age:25,
    salary:3000
};

// For In 
// Object
for(let prop in person) {
    console.log(prop,person[prop]);
}

// ---Output---
// name Mustafa Murat
// age 25
// salary 3000

```

```js
// String
const name = "Ali";

for (let index in name){
    console.log(index,name[index]);
}

// ---Output---
// 0 A
// 1 l
// 2 i

```

```js
// Array
const langs = ["Python","Java"];

for (let value of langs){
    console.log(value);
}

// ---Output---
// Phyton
// Java

```

```js
// String
const name = "Ali";

for (let character of name){
    console.log(character);
}

// ---Output---
// A
// l
// i



```


## ES6 Maps

```js
// Mapler - Key(Anahtar) - Value(Değer)

let myMap = new Map(); // Oluşturma
console.log(typeof myMap);

// ---Output---
// 

console.log(myMap);

// ---Output---
// Map(0) {}

const key1= "Ali";
const key2={a:10,b:20}
const key3=()=>2;

myMap.set(key1,"key1 value");
myMap.set(key2,"key2 value");
myMap.set(key3,"key3 value");

console.log(myMap.get(key1));
console.log(myMap.get(key2));
console.log(myMap.get(key3));

// ---Output---
// key1 value
// key2 value
// key3 value


console.log(myMap.size);

// ---Output---
// 3


```

* ÖRnek 2

```js
const cities = new Map();

cities.set("Ankara",5);
cities.set("İstanbul",15);
cities.set("İzmir",4);

// For Each
cities.forEach(function(value,key){
    console.log(key,value);
})

// ---Output---
// Ankara 5
// İstanbul 15
// İzmir 4


```


* For of Kullanımı

```js

// For Of
for(let value of cities){ 
    console.log(key,value);
}

// ---Output---
// [Ankara,5]
// [İstanbul,15]
// [İzmir,15]

// Destruction kullanarak

for(let [key,value] of cities){ 
    console.log(key,value);
}

// ---Output---
// Ankara 5
// İstanbul 15
// İzmir 4

```

```js

// Map Keys

for(let key of cities.keys()){
    console.log(key);
}

// ---Output---
// Ankara
// İstanbul
// İzmir

// Iterate over values
for(let value of cities.values()){
    console.log(value);
}

// ---Output---
// 5
// 15
// 4

```

* Arrayden map oluşturma

```js
// Arraylerden Map Oluşturma
const array = [["key1","value1"],["key2","value2"]];

const lastMap = new Map(array);

console.log(lastMap);

// ---Output---
// Map(2) { "key1"=>"value1", "key2"=>"value2" }

```

* Map den Array oluşturma

```js
// Maplerden Array Oluşturma

const cities = new Map();

cities.set("Ankara",5);
cities.set("İstanbul",15);
cities.set("İzmir",4);

const array = Array.from(cities);

console.log(array);

// ---Output---
// [["Ankara",5],["İstanbul",15],["İzmir",4]]
```

## Referance Types - Recap

Referans tiplerindeki eşitlik kontrolü bellekte aynı objeyi işaret edip etmediğini kontrol eder.


## Set

(tr:Kümeler)

* Setler kümelere benzeyen yapıdır. Aynı eleman iki defa bulunamaz.

```js
// Setler - Kümeler

const myset = new Set();

myset.add(100);
myset.add(100);
myset.add(3.14);
myset.add("Ali");
myset.add(true);
myset.add([1,2,3]);
myset.add({a:1,b:2});

// Arrayden set oluşturma
const myset2 = new Set([100,3.14,"Ali"]);

console.log(myset); // 6 elemanlı set.
console.log(myset2); // 3 elemanlı set.

```

* size property , delete method

```js
// Size
console.log(myset.size); // 6

// Delete Metodu
myset.delete("Mustafa"); // removes "Mustafa" elements

```

* has method

```js
// Has Metodu

console.log(myset.has("Mustafa")); // out: true
console.log(myset.has(3.14)); // out: true
console.log(myset.has(2000)); // out: false
console.log(myset.has([1,2,3])); // out:false

```


* For Each Usage of Set

```js

const myset3 = new Set();

myset3.add(100);
myset3.add("Ali");
myset.add({a:1,b:2});

myset.forEach(function(value){
    console.log(value);
})

// ---Output---
// 100
// Ali
// {a:1,b:2}
```













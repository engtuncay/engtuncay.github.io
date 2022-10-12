
# Introduction to Javascript (tr:Javascript'e Giriş)

- [Introduction to Javascript (tr:Javascript'e Giriş)](#introduction-to-javascript-trjavascripte-giriş)
  - [Ecmascript](#ecmascript)
  - [Webstormda Ecmascript Aktif Etme](#webstormda-ecmascript-aktif-etme)
  - [VS Code Extensions for Javascript](#vs-code-extensions-for-javascript)
  - [Chrome Js Test Page](#chrome-js-test-page)
- [Helper Functions](#helper-functions)
  - [JS Convention Github Repo](#js-convention-github-repo)
- [Core Concepts](#core-concepts)
  - [Data Types](#data-types)
  - [Variable Assignment](#variable-assignment)
  - [Data Type Casting](#data-type-casting)
- [Naming and naming conventions for js var](#naming-and-naming-conventions-for-js-var)
  - [Operators and Math Object](#operators-and-math-object)
  - [String Methods](#string-methods)
  - [Template Literal](#template-literal)
  - [Array Features](#array-features)
  - [Js de Obje Kavramı ve Oluşturma](#js-de-obje-kavramı-ve-oluşturma)
  - [Js Zaman Objesi ve Metodları](#js-zaman-objesi-ve-metodları)
- [Js Temelleri (Bölüm 2)](#js-temelleri-bölüm-2)
  - [Karşılaştırma Operatörleri](#karşılaştırma-operatörleri)
  - [Mantıksal Bağlaçlar](#mantıksal-bağlaçlar)
  - [If Statement (if ifadesi)](#if-statement-if-ifadesi)
  - [Switch - Case Yapısı](#switch---case-yapısı)
  - [Fonksiyonlar, IIFE ve Anonim Fonksiyonlar](#fonksiyonlar-iife-ve-anonim-fonksiyonlar)
  - [Döngüler - While,Do While,For](#döngüler---whiledo-whilefor)
  - [Window Object](#window-object)
  - [Kapsam (Scope) Kavramı - Function Scope, Global Scope, Block Scope](#kapsam-scope-kavramı---function-scope-global-scope-block-scope)
- [DOM](#dom)
  - [Document Objesi (Part 1)](#document-objesi-part-1)
  - [Document Object (Part 2)](#document-object-part-2)
- [ES-6 Özellikleri](#es-6-özellikleri)
  - [Destructing](#destructing)
  - [Spread](#spread)
  - [Arrow Functions](#arrow-functions)
  - [For in ve For of Döngüleri](#for-in-ve-for-of-döngüleri)
  - [ES6 Maps](#es6-maps)
  - [Referans Tipler Tekrar](#referans-tipler-tekrar)
  - [Set (Kümeler)](#set-kümeler)
- [Sources](#sources)


## Ecmascript

Ecmascript , javasricptin bir spesifikasyonu.

## Webstormda Ecmascript Aktif Etme

Settings / Languages & Frameworks - Javascript penceresinden
language versiondan ayarlarız.

## VS Code Extensions for Javascript 

(tr:Javascript için Vs Code Eklentileri )


## Chrome Js Test Page

- Chrome developer tools console tekli komut girebiliyoruz. Daha uzun kod girmek istiyorsak, sources bölümüne gidip, sağ alttan network sekmesinin yanından snippets seçeriz. "+New Snippet" tıklayarak yeni test kod sayfası açabiliriz. Kodları çalıştırmak altta sağda run snippet düğmesine basarız.

- chrome console deki cache temizlemek istersek , tanımladığımız değişkenleri vs , refresh buttonunda alt seçiminden hard reload ve cache temizlemeye tıklamamız gerekir.

# Helper Functions

- prompt : kullanıcıdan veri girişi alır

```js
var yourName = prompt("What is your name");
```

acweb-102

## JS Convention Github Repo

js code convetions 

github rwaldron/idiomatic.js



# Core Concepts

## Data Types

String : text , yazılardı. kod olarak yorumlanmayan içerik
Number : sayılardır
Boolean : true,false değeridir

- typeof data nin tipinin gösterir

```js

typeof(23)
// out
// number
typeof("Ali")
// string
typeof(true);
// boolean

```

## Variable Assignment

- var,let,const

```
var : global assignment 
let : local assignment 
const : constant assignmet
```

const referansını bir objeye veya arraye bağlarsak, yeni bir değer atayamayız, fakat mevcut içinde değişiklik yapabiliriz.

Example

```js
let y = 10

for(let i=0;i<10;i++) { 
    // statements
    var x = 10;
}

console.log(i); // Reference Error: i is not defined
console.log(x); // 10

```

- var ile tanımlanan değişkenler tekrar tanımlanabilir. Bu da hataya sebep olabilir. let ile tanımlansaydı, hata verirdi.

```js
var x='foo';
var x='bar';

console.log(x); 

// Output
// bar

```
- const ile sabitleri tanımlarız, daha sonra değiştirmeyeceğimiz değişkenlere kullanırız.

```js
const pi = 3.14;

```
Example.2

```js
const arr1 = [1,3,5];
arr1.push(7);
console.log(arr1);

const obj1 = { name:'Ali',surname:'Veli'};

```


## Data Type Casting 

(tr:Veri Tipini Değiştirme)

- Veri tipini string e çevirme

```js
value1 = String(323);
value2 = String(true);
value3 = String(function() { console.log()});
value4 = String([1,2,3])

value5 = (10).toString();
```

- Veri tipini sayıya çevirme
```js
value = Number("123");
value = Number(null); // 0
```

undefined,string,fonksiyonu ve array'i number a çeviremeyiz.

    value = parseFloat("3.14");
    value = parseInt("3");

- Automatic Casting (Otomatik Çevirme)

```js
const a = "Hello" + 34 // Hello34
// 34 stringe çevrildi.
```

# Naming and naming conventions for js var

- keyword kullanılamaz
- sayı ile başlayamaz
- harfler , sayılar, $ , _ dışında sembol kullanılamaz. (abc123$_)
- advice : use camel case  ( userScoreNet )

$$$ayweb-108 kaldım

## Operators and Math Object

- Basic Operators

```js
let a = 20
let b = 10

a + b
a - b
a * b
a % b  (mod işlemi)
```
- Math objesi

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

Math.random() // 0-1 arasında sayı üretir

Math.random() * 20 // 0-20 arasında sayı üretir

Math.floor(Math.random()*20+1); // 1 ile 20 arasında değer üretir
```

## String Methods

- concatation

```js
let a = "Ali" + " " + "Kaya"

a + = ":";

a.concat(" Sayın"); // a + " Sayın"

```
- Some methods

```
a.length
a.toLowerCase();
a.toUpperCase();
```
string değeri içindeki karakterlerin indexi 0 dan başlar.

```js
a[0] // A verir
```
-  indexOf

    a.indexOf("A") // 0
    a.indexOf("x") // -1

- charAt
    
    a.charAt(0) // A

- split

    let degerler = "Ali,Veli,Kaya";
    degerler.split(","); // [Ali,Veli,Kaya]

- replace

    degerler.replace("Ali","Kemal") // Ali nin yerine Kemali koyar

- includes

```js
 degerler.includes("Veli") // true döner

```

## Template Literal 

String oluşturmada yeni standart

```js
let name = "Ali Veli";
let department = "Bilişim"

const a = `İsim:${name}\n Department ${department}\n`

const html = `<ul><li>${name}<li><ul>`



```

- Arithmetic operations can be done
    
```js
$(10/4) 
```

## Array Features


```js

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

```
 
 ## Js de Obje Kavramı ve Oluşturma
 
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


## Js Zaman Objesi ve Metodları

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


# Js Temelleri (Bölüm 2)

## Karşılaştırma Operatörleri

    == Eşitlik (Değer) Operatörü
    === Eşitlik (Tip ve Değer) Operatörü

    != Eşit Değildir Operatörü
    !=== Eşit Değildir Operatörü

    > , < , >= , <= 

    2=2 true
    "js" == "java" false
    2=="2" true (2 yi stringe çevirir)
    2 === "2" false (değerleri gibi tipleri aynı olmalı)

## Mantıksal Bağlaçlar

    ! Not Operatörü

    && And Operatörü ( Bir false değer, sonucu false yapar)

    || Or Operatör ( Bir true değer, sonucu true yapar )

## If Statement (if ifadesi)

    if(koşul) {
        //işlemler
    } [else {
      // işlemler
    }] [else if (koşul){
        // işlemler
    }]


const error = false;

if(error==true){
    consolo.log("Hata oluştu");
}

- Kısa if

Tek işlemli if

    if(error==true) console.log("Hata oluştu");

- Ternary If

Ternary Operatörü ? kullanışı

    let sonuc = (number === 100 ? "Sayı 100":"Sayı 100 degil");





## Switch - Case Yapısı

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


## Fonksiyonlar, IIFE ve Anonim Fonksiyonlar

    // Fonksiyon tanımlama
    function merhaba(name,age){
        console.log(`İsim ${name} Yaş: ${age}`);
    }

    // Fonksiyon çağrısı (function call)
    merhaba();

- varsayılan değer atamak istenirse

a. Yol 1

    function merhaba(name,age){
        if(typeof name === "undefined") name ="Bilgi Yok";
        console.log(`İsim ${name} Yaş: ${age}`);
    }

b.

    function merhaba(name= "Bilgi Yok",age){
        if(typeof name === "undefined") name ="Bilgi Yok";
        console.log(`İsim ${name} Yaş: ${age}`);
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


## Döngüler - While,Do While,For

- While Döngüsü

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

- break kullanırak döngü kırılabilir.

- continue bir sonraki döngüye geçiş yapılabilir.

- Do While Döngüsü

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


- For Döngüsü

        for(let index=0;index<langs.length;index++){
          console.log(langs[index]);
        }


- For Each 

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

- for in döngüsü

        for( let user in users){
            console.log(
        }

        const = user {
            name:"Mustafa",
            age:25
        };

- **Objenin alanları içinde döngü**

        for ( let key in user){
          console.log(key,user[key]);
        }

        // output: 
        name Mustafa
        age 25


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

## Kapsam (Scope) Kavramı - Function Scope, Global Scope, Block Scope


Üç farklı kapsamımız bulunuyor.

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

- Örnek 2

        if(true){
            var a = 10;
            let b = 20;
            const c=30;
        }

        // var değişkeni dışarıda da var olur.
        console.log(a); //10
        console.log(b); // hata
        console.log(c); // hata



# DOM

Document Object Model

                                                                   |-> Element <head>
    Document -> Root Element <html> -|
                                                                   |-> Element <body>
                                                

## Document Objesi (Part 1)

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


# ES-6 Özellikleri

## Destructing

- Bir objenin propertylerini değişkenlere dağıtabiliriz.

```js
const degerler = { deger1:'deger1', deger2:'deger2' }

// destructing yaparak dağıtırız.
const { deger1,deger2} = degerler;

console.log(deger1,deger2);

// Output
// deger1 deger2

// Bu şekilde de kullanılabilir

const { deger1,deger2, deger4='deger4'} = degerler;
console.log(deger1,deger2,deger4);

// Output
// deger1 deger2 deger4

```

- Arraylarde de kullanabiliriz.

```js

const degerler = [1,2,3];

const [ deger1,deger2,deger3] = degerler;

console.log(deger1,deger2,deger3);

// Output
// 1 2 3

```

- Bir objenin obje propertysinin , propertylerini de dağıtabiliriz.

```js

const degerler = {
    deger3 : {
        isim : 'mehmet'
    }
}

const { deger3 : {isim} }  = degerler;
console.log(isim);

// Output
// mehmet

// Diger türlü kullanımı
const { deger3 : {isim:name} }  = degerler;
console.log(name);

// Output
// mehmet

```

## Spread

Example

```js

const arr = [1,2,3];
const arr2 = [arr,3,4,5];

console.log(arr2);

// Output 
// [ [1,2,3],3,4,5 ]

// Spread uygularsak

const arr3 = [1,2,3];
const arr4 = [...arr3,3,4,5];

console.log(arr4);

// Output 
// [ 1,2,3,3,4,5 ]


```

Example

```js

const arr= ['a','b','c','d'];
const [ deger1,deger2,...rest] = arr;

console.log(rest)

// Output
// ['c','d']

// Arrayi parçalayarak basmak istiyorsak

console.log(...rest);

// Output
// c d

```

## Arrow Functions


Example : eski tanımlama

```js

let myFunction = function () {
    return 1;
}

console.log(myFunction());

// Output
// 1

```

- Arrow fn kullanarak yazımı

```js

let myFunction = (sayi1,sayi2) {
    return sayi1+sayi2;
}

console.log(myFunction(11,4));

// Output
// 15



```




## For in ve For of Döngüleri

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

## Referans Tipler Tekrar

Referans tiplerindeki eşitlik kontrolü bellekte aynı objeyi işaret edip etmediğini kontrol eder.


## Set (Kümeler)

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

# Sources

- Web

- Dr.Angela Yu Udemy The Complete 2021 Web Dev. Course (ayweb)











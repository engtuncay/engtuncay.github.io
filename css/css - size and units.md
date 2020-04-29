


---

## Bölüm 8 Size and units

### 111 - Module intro

Hatırlatma Css Pozisyonlama

Default pozisyonlama static dir. 

Static ve Relative Elementler (Normal Flow) normal akışında dizilir.
Burada block level ise satır satır gider, inline ise yan yana gider. Relative yapılırsa, top,bottom,left,right değerleri girilip normal olduğu yerden kaydırma yapılabilir.

Absolute ve Fixed elementler , Out of Normal Flow , normal akışın dışında pozisyon alır.

Fixed reference noktası olarak viewport ( görünen ekran ) alır , absolute ise pozisyonlanmış ebeveyn elementini referans noktası olarak alır.

?? body elementi de pozisyonlanmış eleman sayılır mı ? 

Pozisyonlayınca left,right,top,bottom çalışmasını sağlar.

---

Left manası

Static : Left değerinin işlevi yoktur. (inline olsa dahi)
Relative : Mevcut konumuna göre soldan uzaklığı

Fixed : viewport göre soldan uzaklığı 
Absolute : pozisyonlanmış ebeveyn elementin içinde soldan uzaklığı


### 112 - Where units matter

| Units |
|---|---|
| pixels | px |
| percentages | % |
| root em | rem |
| viewport height |  vh  |
| viewport width |  vw  |

---

![css unit](http://i64.tinypic.com/2h82vb4.jpg)

---

### 113 - Overview of available size and units

**Absolute Lengths**

Mostly ignore user settings
px  ( pixel verirsek , browser ayarlarındaki büyüklük küçüklük ayarına göre değişim yapmaz / aldırış etmez. ) ( ekran değişimlerine ayak uydurmamış oluruz)

cm,mm kullanılmaz, 1 cm ekrana göre değişiyor. kağıt üzerindeki 1 cm ile tutmuyor.

**Viewport Lengths**

Adjust to current viewport

vh (viewport height)
vw (viewport widht)
vmin
vmax

adjust size more dynamically

**Font-Relative Lengths**

Adjust to default font size

rem
em

---

![units](http://i64.tinypic.com/33usf4j.jpg)

---

% problem

containing block problem

![percentage problem](http://i67.tinypic.com/25u1uft.jpg)

### 115 - 3 Rules to Remember : 

#### Fixed positioning and %

the reference point for an element is called the containing block.

Boyutunu referans alacağı elemente containinig block denir , yani ebeveyn element'tir.

if containing block is 100px, then the child %10 is 10px.

For fixed pos.ed elem. , **the containing block is viewport**

Boyutunu viewporta göre hesaplar (% ölçüsü verilince)

#### Absolute Pos. and % (v117)

Absolute positon --> Containing Block ( Ancestor content + padding ) (Ebeveynin içerik + besleme uzaklığı ) 

the containing block for absolute positioned element is the closest ancestor which is not position static. (absolute,relative,fixed,sticky)

Örnek bottom %5 denilince , alttan ebeveyn elementin %5 uzaklığında olur. Left %10 , soldan uzaklığı ebeveyn elementin %10 u kadar pixel uzaklığında olur.

---

Absolute elemente width konulmayınca genişliği content'i kadar olacaktır. Width %100 verince containing block kadar olur. Beslemeyi de dahil eder. (border a kadar) (div block level element kural gereği contentin dışıda kullanılamaz,atlar.)

![3 Rules to Remember](https://live.staticflickr.com/65535/49657729666_5c53646f48_b.jpg)

#### Relative / Static Positioning And % (v118)

For static and relative pos. elements , containing block is **content of ancestor (block-level element)**.

---
Ebeveyn element (display:inline) , inline yapılmış ise , bir üst ebeveyn block level elementi referans noktası olarak alır.

---
border-box yapınca ( border box 'ta padding değeri verirsek, alan değişmeden ,content daraltarak padding (besleme) yapar), 
10 + 892 + 19 = 921 tüm width
%50 ile yerleştirirsek width (892/2) 446px olur.
Yani ancestor un content ini baz alır.

---
??? div i width ile kullanmak için display prop. u inline-block yapmalıyız.

![3 Rules to Remember](
https://live.staticflickr.com/65535/49658015642_2d19b24dbd_o.png)

### 118 - Fixing the height 100% Issue

Note: backdrop


So back on our customers page, I would like to add a new element, this element will be a so-called backdrop.

The backdrop has the purpose to cover the entire website, so it should be on top of all the other elements

<div class="backdrop"></div>

sayfanın en üstüne yerleştirirz.

.backdrop {
    position : 
    z-index : 100;
    width: 100%;
    height : 100%;
    background: (0,0,0,0.5);

}

---

body element block level element dir.

---

html ve body elementler yükseklik değeri verebiliriz.

---

.postion : absolute



### 119 - Defining the font size in the root element

font-size css özelliğine % lik değerde verebiliriz.

---

html {
    font-size : 75%;
}

---

### 120 - Using min-width/height & max-width/height

Örnek

max-width: 580px;
min-width

width % lik verip , max-width px olarak verebiliriz.

---

### 121 - Working with rem and em

em and rem are units which are calculated based on the font size.

---

What is 2em in pixels

that em is calculated based on the actual size of our element which is inherited from the parent and then multiplied by this factor right here. ( kalıtımdan alınan değer ile em değeri çarpılarak hesaplanır )
parent div 20px verip , child da ise 1.5em olursa , 30px boyutunda olur.


---

rem

just take the font size that is set by the browser settings,

so 16 pixels in our case and multiply it with 1.1 because rem, the r in rem stands for root.

So we always go back to the root element of our website which is the HTML element and with that, the browser


default which defines the size for that root element,
in all cases where you don't change this default behavior, I showed you how this works


and as the font size always depends on this browser settings, the user has the full control of the
size he wants to have on his website

---

rem değerini margin ler için de kullanabiliriz.

---

### 122 - Adding rem to Additional Properties


Remember : the calculation basis for rem is the initial font size of the HTML element.

---

the default font size of our browser is 16 pixels,


### 123 - Finishing rem

### 124 - Understanding the viewport units vw and vh

backdrop elde etmek için

position fixed
width 100vw
height 1000vh

yaparız.


So I think the general logic of this viewport unit is clear,
it simply allows us to, as I said, always refer our sizes to the actual viewport no matter which position property we have right here

---

width: 80vmin















### 130 - Useful Resources & Links

Dive Deeper into Selected TopicsFont size properties and values: 

https://developer.mozilla.org/en-US/docs/Web/CSS/font-size 

Viewport units and browser support: 

https://caniuse.com/#search=vh


Source : 

- https://www.udemy.com/course/css-the-complete-guide-incl-flexbox-grid-sass/

I recommend to buy this course for learning css.




































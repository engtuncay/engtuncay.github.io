
Source : https://quickref.me/css3

(some parts may be modified or removed)

- [CSS 3 Cheat Sheet \& Quick Reference](#css-3-cheat-sheet--quick-reference)
  - [Getting Started](#getting-started)
    - [Stylesheet Ekleme](#stylesheet-ekleme)
      - [External stylesheet](#external-stylesheet)
      - [Internal stylesheet](#internal-stylesheet)
      - [Inline styles](#inline-styles)
    - [Class Eklemek](#class-eklemek)
    - [!important](#important)
    - [Temel Selector](#temel-selector)
    - [Text Color](#text-color)
    - [Background](#background)
    - [Font](#font)
    - [Position](#position)
    - [Animation](#animation)
    - [Yorum Satırı](#yorum-satırı)
    - [Flex Layout](#flex-layout)
    - [Grid Layout](#grid-layout)
    - [Variable \& Counter](#variable--counter)
  - [CSS Selectors](#css-selectors)
    - [Örnekler](#örnekler)
      - [Groups Selector](#groups-selector)
      - [Chaining Selector](#chaining-selector)
      - [Attribute Selector](#attribute-selector)
      - [First Child Selector](#first-child-selector)
      - [No Children Selector](#no-children-selector)
    - [Temel Selectors](#temel-selectors)
    - [Combinators](#combinators)
    - [Attribute Selectors](#attribute-selectors)
    - [User Action Pseudo Classes](#user-action-pseudo-classes)
    - [Pseudo Classes](#pseudo-classes)
    - [Input Pseudo Classes](#input-pseudo-classes)
    - [Structural Pseudo Classes](#structural-pseudo-classes)
  - [CSS Fonts](#css-fonts)
    - [Properties](#properties)
    - [Shorthand](#shorthand)
    - [Örnek](#örnek)
    - [text-transform](#text-transform)
    - [@font-face](#font-face)
  - [CSS Colors](#css-colors)
    - [Named Color](#named-color)
    - [Hexadecimal Color](#hexadecimal-color)
    - [rgb() Colors](#rgb-colors)
    - [HSL Colors](#hsl-colors)
    - [Diğer](#diğer)
  - [CSS Backgrounds](#css-backgrounds)
    - [Properties](#properties-1)
    - [Shorthand](#shorthand-1)
    - [Örnekler](#örnekler-1)
  - [CSS The Box Model](#css-the-box-model)
    - [Maximums / Minimums](#maximums--minimums)
    - [Margin / Padding](#margin--padding)
    - [Box-sizing](#box-sizing)
    - [Visibility](#visibility)
    - [Auto Keyword](#auto-keyword)
    - [Overflow](#overflow)
  - [CSS Animation](#css-animation)
    - [Shorthand](#shorthand-2)
    - [Properties](#properties-2)
    - [Örnekler](#örnekler-2)
    - [JavaScript Event](#javascript-event)
  - [CSS Flexbox](#css-flexbox)
    - [Basit Örnek](#basit-örnek)
    - [Container](#container)
    - [Child](#child)
  - [CSS Flexbox Tricks](#css-flexbox-tricks)
    - [Dikey Ortalama](#dikey-ortalama)
    - [Dikey + Yatay Ortalama](#dikey--yatay-ortalama)
    - [Sıralama](#sıralama)
    - [Mobil Layout](#mobil-layout)
    - [Tablo Benzeri](#tablo-benzeri)
    - [Sol ve Sağ](#sol-ve-sağ)
  - [CSS Grid Layout](#css-grid-layout)
    - [Grid Template Columns](#grid-template-columns)
    - [fr Relative Unit](#fr-relative-unit)
    - [Grid Gap](#grid-gap)
    - [CSS Block Level Grid](#css-block-level-grid)
    - [CSS Inline Level Grid](#css-inline-level-grid)
    - [css grid-row](#css-grid-row)
    - [minmax() Function](#minmax-function)
    - [grid-row-start \& grid-row-end](#grid-row-start--grid-row-end)
    - [grid-row-gap](#grid-row-gap)
    - [grid-area](#grid-area)
    - [justify-items](#justify-items)
    - [grid-template-areas](#grid-template-areas)
    - [justify-self](#justify-self)
    - [align-items](#align-items)
  - [CSS Dynamic Content](#css-dynamic-content)
    - [CSS Variable](#css-variable)
      - [Tanımlama](#tanımlama)
      - [Kullanım](#kullanım)
    - [Counter](#counter)
    - [Counter Kullanımı](#counter-kullanımı)
  - [CSS 3 Tricks](#css-3-tricks)
    - [Smooth Scroll](#smooth-scroll)
  - [Ayrıca Bakınız](#ayrıca-bakınız)


# CSS 3 Cheat Sheet & Quick Reference

> Selector syntax, properties, units ve diğer kullanışlı bilgileri içeren hızlı referans.

---

## Getting Started

### Stylesheet Ekleme

#### External stylesheet
```html
<link href="./path/to/stylesheet/style.css" rel="stylesheet" type="text/css">
```

#### Internal stylesheet
```html
<style>
body {
    background-color: linen;
}
</style>
```

#### Inline styles
```html
<h2 style="text-align: center;">Centered text</h2>
<p style="color: blue; font-size: 18px;">Blue, 18-point text</p>
```

### Class Eklemek
```html
<div class="classname"></div>
<div class="class1 ... classn"></div>
```
Bir elemana birden fazla class atanabilir.

### !important
```css
.post-title {
    color: blue !important;
}
```
Önceki tüm stil kurallarını geçersiz kılar.

### Temel Selector
```css
h1 { }
#job-title { }
div.hero { }
div > p { }
```

### Text Color
```css
color: #2a2aff;
color: green;
color: rgb(34, 12, 64, 0.6);
color: hsla(30 100% 50% / 0.6);
```

### Background
```css
background-color: blue;
background-image: url("nyan-cat.gif");
background-image: url("../image.png");
```

### Font
```css
.page-title {
    font-weight: bold;
    font-size: 30px;
    font-family: "Courier New";
}
```

### Position
```css
.box {
    position: relative;
    top: 20px;
    left: 20px;
}
```

### Animation
```css
animation: 300ms linear 0s infinite;
animation: bounce 300ms linear infinite;
```

### Yorum Satırı
```css
/* Tek satır yorum */

/* Çok
   satırlı yorum */
```

### Flex Layout
```css
div {
    display: flex;
    justify-content: center;
}
```

### Grid Layout
```css
#container {
  display: grid;
  grid: repeat(2, 60px) / auto-flow 80px;
}

#container > div {
  background-color: #8ca0ff;
  width: 50px;
  height: 50px;
}
```

### Variable & Counter
```css
counter-set: subsection;
counter-increment: subsection;
counter-reset: subsection 0;

:root {
  --bg-color: brown;
}
element {
  background-color: var(--bg-color);
}
```

---

## CSS Selectors

### Örnekler

#### Groups Selector
```css
h1, h2 {
    color: red;
}
```

#### Chaining Selector
```css
h3.section-heading {
    color: blue;
}
```

#### Attribute Selector
```css
div[attribute="SomeValue"] {
    background-color: red;
}
```

#### First Child Selector
```css
p:first-child {
    font-weight: bold;
}
```

#### No Children Selector
```css
.box:empty {
  background: lime;
  height: 80px;
  width: 80px;
}
```

### Temel Selectors

| Selector | Açıklama |
|---|---|
| `*` | Tüm elementler |
| `div` | Tüm div etiketleri |
| `.classname` | Class'a sahip tüm elementler |
| `#idname` | ID'ye sahip element |
| `div,p` | Tüm div ve paragraflar |
| `#idname *` | #idname içindeki tüm elementler |

### Combinators

| Selector | Açıklama |
|---|---|
| `div.classname` | Belirli class'a sahip div |
| `div#idname` | Belirli ID'ye sahip div |
| `div p` | Div içindeki paragraflar |
| `div > p` | Div'in bir alt seviyesindeki p etiketleri |
| `div + p` | Div'den hemen sonra gelen p |
| `div ~ p` | Div'den önce gelen p |

### Attribute Selectors

| Selector | Açıklama |
|---|---|
| `a[target]` | target attribute'una sahip |
| `a[target="_blank"]` | Yeni sekmede açılan |
| `a[href^="/index"]` | /index ile başlayan |
| `[class\|="chair"]` | chair ile başlayan |
| `[class*="chair"]` | chair içeren |
| `[title~="chair"]` | chair kelimesini içeren |
| `a[href$=".doc"]` | .doc ile biten |
| `[type="button"]` | Belirli tipte olan |

### User Action Pseudo Classes

| Selector | Açıklama |
|---|---|
| `a:link` | Normal durumdaki link |
| `a:active` | Tıklanmış link |
| `a:hover` | Üzerine gelinen link |
| `a:visited` | Ziyaret edilmiş link |

### Pseudo Classes

| Selector | Açıklama |
|---|---|
| `p::after` | p'den sonra içerik ekle |
| `p::before` | p'den önce içerik ekle |
| `p::first-letter` | p'nin ilk harfi |
| `p::first-line` | p'nin ilk satırı |
| `::selection` | Kullanıcı tarafından seçilen |
| `::placeholder` | Placeholder attribute |
| `:root` | Dokümanın root elementi |
| `:target` | Aktif anchor'ı vurgula |
| `div:empty` | Alt elementi olmayan element |
| `p:lang(en)` | lang="en" olan p |
| `:not(span)` | span olmayan element |

### Input Pseudo Classes

| Selector | Açıklama |
|---|---|
| `input:checked` | Seçili input |
| `input:disabled` | Devre dışı input |
| `input:enabled` | Aktif input |
| `input:focus` | Odaklanmış input |
| `input:in-range` | Aralıkta olan değer |
| `input:out-of-range` | Aralık dışındaki değer |
| `input:valid` | Geçerli değere sahip input |
| `input:invalid` | Geçersiz değere sahip input |
| `input:optional` | required attribute'u olmayan |
| `input:required` | required attribute'u olan |
| `input:read-only` | readonly attribute'u olan |
| `input:read-write` | readonly attribute'u olmayan |
| `input:indeterminate` | Belirsiz durumda olan |

### Structural Pseudo Classes

| Selector | Açıklama |
|---|---|
| `p:first-child` | İlk child |
| `p:last-child` | Son child |
| `p:first-of-type` | Tipinin ilki |
| `p:last-of-type` | Tipinin sonu |
| `p:nth-child(2)` | Parent'ın ikinci child'ı |
| `p:nth-child(3n42)` | Nth-child (an + b) formülü |
| `p:nth-last-child(2)` | Sondan ikinci child |
| `p:nth-of-type(2)` | Parent'ın ikinci p'si |
| `p:nth-last-of-type(2)` | Sondan ikinci |
| `p:only-of-type` | Parent'ının tek türü |
| `p:only-child` | Parent'ının tek child'ı |

---

## CSS Fonts

### Properties

| Property | Açıklama |
|---|---|
| `font-family:` | Font ailesi |
| `font-size:` | Boyut |
| `letter-spacing:` | Harf aralığı |
| `line-height:` | Satır yüksekliği |
| `font-weight:` | Kalınlık (number / bold / normal) |
| `font-style:` | italic / normal |
| `text-decoration:` | underline / none |
| `text-align:` | left / right / center / justify |
| `text-transform:` | capitalize / uppercase / lowercase |

### Shorthand

```
font: italic 400 14px/1.5 sans-serif;
       style  weight size  line-height family
```

### Örnek
```css
font-family: Arial, sans-serif;
font-size: 12pt;
letter-spacing: 0.02em;
```

### text-transform
```css
/* Hello */
text-transform: capitalize;

/* HELLO */
text-transform: uppercase;

/* hello */
text-transform: lowercase;
```

### @font-face
```css
@font-face {
    font-family: 'Glegoo';
    src: url('../Glegoo.woff');
}
```

---

## CSS Colors

### Named Color
```css
color: red;
color: orange;
color: tan;
color: rebeccapurple;
```

### Hexadecimal Color
```css
color: #090;
color: #009900;
color: #090a;
color: #009900aa;
```

### rgb() Colors
```css
color: rgb(34, 12, 64, 0.6);
color: rgba(34, 12, 64, 0.6);
color: rgb(34 12 64 / 0.6);
color: rgba(34 12 64 / 0.3);
color: rgb(34.0 12 64 / 60%);
color: rgba(34.6 12 64 / 30%);
```

### HSL Colors
```css
color: hsl(30, 100%, 50%, 0.6);
color: hsla(30, 100%, 50%, 0.6);
color: hsl(30 100% 50% / 0.6);
color: hsla(30 100% 50% / 0.6);
```

### Diğer
```css
color: inherit;
color: initial;
color: unset;
color: transparent;
color: currentcolor; /* keyword */
```

---

## CSS Backgrounds

### Properties

| Property | Açıklama |
|---|---|
| `background:` | Shorthand |
| `background-color:` | Renk |
| `background-image:` | url(...) |
| `background-position:` | left/center/right top/center/bottom |
| `background-size:` | cover X Y |
| `background-clip:` | border-box / padding-box / content-box |
| `background-repeat:` | no-repeat / repeat-x / repeat-y |
| `background-attachment:` | scroll / fixed / local |

### Shorthand
```
background: #ff0 url(a.jpg) left top / 100px auto no-repeat fixed;
background: #abc url(b.png) center center / cover repeat-x local;
```

### Örnekler
```css
background: url(img_man.jpg) no-repeat center;

background: url(img_flwr.gif) right bottom no-repeat,
            url(paper.gif) left top repeat;

background: rgb(2,0,36);
background: linear-gradient(90deg,
  rgba(2,0,36,1) 0%,
  rgba(13,232,230,1) 35%,
  rgba(0,212,255,1) 100%);
```

---

## CSS The Box Model

### Maximums / Minimums
```css
.column {
    max-width: 200px;
    width: 500px;
}
```

### Margin / Padding
```css
.block-one {
    margin: 20px;
    padding: 10px;
}
```

### Box-sizing
```css
.container {
    box-sizing: border-box;
}
```

### Visibility
```css
.invisible-elements {
    visibility: hidden;
}
```

### Auto Keyword
```css
div {
    margin: auto;
}
```

### Overflow
```css
.small-block {
    overflow: scroll;
}
```

---

## CSS Animation

### Shorthand

```
animation: bounce 300ms linear 100ms infinite alternate-reverse both reverse;
            name   duration timing  delay   count    direction    fill  play-state
```

### Properties

| Property | Değer |
|---|---|
| `animation:` | Shorthand |
| `animation-name:` | `<name>` |
| `animation-duration:` | `<time>ms` |
| `animation-timing-function:` | ease / linear / ease-in / ease-out / ease-in-out |
| `animation-delay:` | `<time>ms` |
| `animation-iteration-count:` | infinite / `<number>` |
| `animation-direction:` | normal / reverse / alternate / alternate-reverse |
| `animation-fill-mode:` | none / forwards / backwards / both / initial / inherit |
| `animation-play-state:` | normal / reverse / alternate / alternate-reverse |

### Örnekler
```css
/* duration | timing-function | delay | iteration-count | direction | fill-mode | play-state | name */
animation: 3s ease-in 1s 2 reverse both paused slidein;

/* duration | timing-function | delay | name */
animation: 3s linear 1s slidein;

/* duration | name */
animation: 3s slidein;

animation: 4s linear 0s infinite alternate move_eye;
animation: bounce 300ms linear 0s infinite normal;
animation: bounce 300ms linear infinite;
animation: bounce 300ms linear infinite alternate-reverse;
animation: bounce 300ms linear 2s infinite alternate-reverse forwards normal;
```

### JavaScript Event
```js
.one('webkitAnimationEnd oanimationend msAnimationEnd animationend')
```

---

## CSS Flexbox

### Basit Örnek
```css
.container {
  display: flex;
}

.container > div {
  flex: 1 1 auto;
}
```

### Container
```css
display: flex;
display: inline-flex;

flex-direction: row;            /* ltr - varsayılan */
flex-direction: row-reverse;    /* rtl */
flex-direction: column;         /* üst-alt */
flex-direction: column-reverse; /* alt-üst */

flex-wrap: nowrap; /* tek satır */
flex-wrap: wrap;   /* çok satır */

align-items: flex-start; /* dikeyde üste hizala */
align-items: flex-end;   /* dikeyde alta hizala */
align-items: center;     /* dikeyde ortaya hizala */
align-items: stretch;    /* aynı yükseklik (varsayılan) */

justify-content: flex-start;    /* [xxx        ] */
justify-content: center;        /* [    xxx    ] */
justify-content: flex-end;      /* [        xxx] */
justify-content: space-between; /* [x    x    x] */
justify-content: space-around;  /* [ x   x   x ] */
justify-content: space-evenly;  /* [  x  x  x  ] */
```

### Child
```css
/* Bu: */
flex: 1 0 auto;

/* Şuna eşdeğerdir: */
flex-grow: 1;
flex-shrink: 0;
flex-basis: auto;

order: 1;

align-self: flex-start;  /* sola */
margin-left: auto;       /* sağa */
```

---

## CSS Flexbox Tricks

### Dikey Ortalama
```css
.container {
  display: flex;
}

.container > div {
  width: 100px;
  height: 100px;
  margin: auto;
}
```

### Dikey + Yatay Ortalama
```css
.container {
  display: flex;
  align-items: center;      /* dikey */
  justify-content: center;  /* yatay */
}
```

### Sıralama
```css
.container > .top {
 order: 1;
}

.container > .bottom {
 order: 2;
}
```

### Mobil Layout
```css
.container {
  display: flex;
  flex-direction: column;
}

.container > .top {
  flex: 0 0 100px;
}

.container > .content {
  flex: 1 0 auto;
}
```
Sabit yükseklikli üst bar ve dinamik içerik alanı.

### Tablo Benzeri
```css
.container {
  display: flex;
}

.container > .checkbox { flex: 1 0 20px; }
.container > .subject  { flex: 1 0 400px; }
.container > .date     { flex: 1 0 120px; }
```

### Sol ve Sağ
```css
.menu > .left  { align-self: flex-start; }
.menu > .right { align-self: flex-end; }
```

---

## CSS Grid Layout

### Grid Template Columns

```css
#grid-container {
    display: grid;
    width: 100px;
    grid-template-columns: 20px 20% 60%;
}
```



### fr Relative Unit
```css
.grid {
    display: grid;
    width: 100px;
    grid-template-columns: 1fr 60px 1fr;
}
```

### Grid Gap
```css
/* Satır arası 20px, sütun arası 10px */
#grid-container {
    display: grid;
    grid-gap: 20px 10px;
}
```

### CSS Block Level Grid

```css
#grid-container {
    display: block;
}
```

### CSS Inline Level Grid
```css
#grid-container {
    display: inline-grid;
}
```

### css grid-row
```css
.item {
    grid-row: 1 / span 2;
}
```

### minmax() Function
```css
.grid {
    display: grid;
    grid-template-columns: 100px minmax(100px, 500px) 100px;
}
```

### grid-row-start & grid-row-end
```css
grid-row-start: 2;
grid-row-end: span 2;
```

### grid-row-gap
```css
grid-row-gap: length;
/* Geçerli uzunluk değeri (px, % vb.). Varsayılan: 0 */
```

### grid-area
```css
.item1 {
    grid-area: 2 / 1 / span 2 / span 3;
}
```

### justify-items
```css
#container {
    display: grid;
    justify-items: center;
    grid-template-columns: 1fr;
    grid-template-rows: 1fr 1fr 1fr;
    grid-gap: 10px;
}
```

### grid-template-areas
```css
.item {
    grid-area: nav;
}
.grid-container {
    display: grid;
    grid-template-areas:
    'nav nav . .'
    'nav nav . .';
}
```

### justify-self
```css
#grid-container {
    display: grid;
    justify-items: start;
}

.grid-items {
    justify-self: end;
}
```

### align-items
```css
#container {
    display: grid;
    align-items: start;
    grid-template-columns: 1fr;
    grid-template-rows: 1fr 1fr 1fr;
    grid-gap: 10px;
}
```

---

## CSS Dynamic Content

### CSS Variable

#### Tanımlama
```css
:root {
  --first-color: #16f;
  --second-color: #ff7;
}
```

#### Kullanım
```css
#firstParagraph {
  background-color: var(--first-color);
  color: var(--second-color);
}
```

### Counter
```css
/* "my-counter"'ı 0 yap */
counter-set: my-counter;

/* "my-counter"'ı 1 artır */
counter-increment: my-counter;

/* "my-counter"'ı 1 azalt */
counter-increment: my-counter -1;

/* "my-counter"'ı sıfırla */
counter-reset: my-counter;
```

### Counter Kullanımı
```css
body { counter-reset: section; }

h3::before {
  counter-increment: section;
  content: "Section." counter(section);
}
```

```css
ol {
  counter-reset: section;
  list-marker-type: none;
}

li::before {
  counter-increment: section;
  content: counters(section, ".") " ";
}
```

---

## CSS 3 Tricks

### Smooth Scroll
```css
html {
    scroll-behavior: smooth;
}
```

---

## Ayrıca Bakınız

- [CSS selectors cheatsheet](https://frontend30.com/css-selectors-cheatsheet/)
- [MDN: Using CSS flexbox](https://developer.mozilla.org/en-US/docs/Web/Guide/CSS/Flexible_boxes)
- [Ultimate flexbox cheatsheet](http://www.sketchingwithcss.com/samplechapter/cheatsheet.html)
- [GRID: A simple visual cheatsheet](http://grid.malven.co/)
- [CSS Tricks: A Complete Guide to Grid](https://css-tricks.com/snippets/css/complete-guide-grid/)
- [Browser support (caniuse)](https://caniuse.com/#feat=css-grid)


> ⚠️ Note: This content is for educational and personal reference purposes only.
> The original source is shown at the top of the document.
>
> All rights and copyrights belong to their respective owners.


# Contents

- [Contents](#contents)
- [Tailwind CSS'de Flex Kullanımı](#tailwind-cssde-flex-kullanımı)
  - [Flex Class List](#flex-class-list)
  - [Flex Cheat](#flex-cheat)
  - [Temel Flex Sınıfları](#temel-flex-sınıfları)
    - [1. Container Oluşturma (flex)](#1-container-oluşturma-flex)
    - [2. Yön Kontrolü (flex-direction) (flex-col) (flex-row)](#2-yön-kontrolü-flex-direction-flex-col-flex-row)
    - [3. Sarma (Wrap) (flex-wrap)](#3-sarma-wrap-flex-wrap)
    - [4. Justify (Yatay Hizalama) (kendi ekseninde) (justify-\*)](#4-justify-yatay-hizalama-kendi-ekseninde-justify-)
    - [5. Align Items (Dikey Hizalama) (ters eksende) (items-\*)](#5-align-items-dikey-hizalama-ters-eksende-items-)
    - [7. Gap (Boşluk) (gap-\*)](#7-gap-boşluk-gap-)
  - [Flex Item Sınıfları](#flex-item-sınıfları)
    - [6. Grow \& Shrink (Büyüme/Küçülme) (flex-\*)](#6-grow--shrink-büyümeküçülme-flex-)
    - [Flex Grow (Büyüme)](#flex-grow-büyüme)
    - [Flex Shrink (Küçülme)](#flex-shrink-küçülme)
    - [Flex Basis (Başlangıç Genişliği)](#flex-basis-başlangıç-genişliği)
  - [**Pratik Örnekler**](#pratik-örnekler)
  - [Flex sabit col ve dinamik col](#flex-sabit-col-ve-dinamik-col)



# Tailwind CSS'de Flex Kullanımı


## Flex Class List

```
Container Classes:
-----
flex
flex-col (dikey hizalama)
flex-wrap
gap-*
justify-*
align-*


Item Classes:
-----
flex-*
grow  grow-*
shrink  shrink-*
basis-*


```

## Flex Cheat


## Temel Flex Sınıfları

### 1. Container Oluşturma (flex)

```html
<!-- Flex container -->
<div class="flex">
  <div>Item 1</div>
  <div>Item 2</div>
  <div>Item 3</div>
</div>

```

### 2. Yön Kontrolü (flex-direction) (flex-col) (flex-row) 

```html
<!-- Yatay (x ekseni boyunca l-r) (default) -->
<div class="flex">...</div>

<!-- Dikey (y ekseni boyunca t-b) -->
<div class="flex flex-col">...</div>

<!-- Ters yatay -->
<div class="flex flex-row-reverse">...</div>

<!-- Ters dikey -->
<div class="flex flex-col-reverse">...</div>

```

### 3. Sarma (Wrap) (flex-wrap)

```html
<!-- Sarılmaz (default) (no wrap) -->
<div class="flex">...</div>

<!-- Sarılır -->
<div class="flex flex-wrap">...</div>

<!-- Ters sırada sarılır -->
<div class="flex flex-wrap-reverse">...</div>
```

### 4. Justify (Yatay Hizalama) (kendi ekseninde) (justify-*)

```html
<div class="flex justify-start"><!-- Başlangıç --></div>
<div class="flex justify-end"><!-- Son --></div>
<div class="flex justify-center"><!-- Ortada --></div>
<!-- justify-between - uçtan uca hizalama (*5) -->
<div class="flex justify-between"><!-- Aralarında boşluk (space-between) --></div>
<div class="flex justify-around"><!-- Etrafında boşluk  (space-around) --></div>
<div class="flex justify-evenly"><!-- Eşit boşluk (space-evenly) --></div>
```

![justify-* (content)](../img/flex-justify-content.jpg)

source : css-tricks.com

### 5. Align Items (Dikey Hizalama) (ters eksende) (items-*)
```html
<div class="flex items-start"><!-- Üst --></div>
<div class="flex items-end"><!-- Alt --></div>
<div class="flex items-center"><!-- Merkez --></div>
<div class="flex items-baseline"><!-- Baseline --></div>
<div class="flex items-stretch"><!-- Gerilmiş (default) --></div>
```

![items-* (align-items)](../img/flex-align-items.jpg)

source : css-tricks.com

### 7. Gap (Boşluk) (gap-*)
```html
<div class="flex gap-4"><!-- Aralarında 4 birim boşluk --></div>
<div class="flex gap-x-4 gap-y-2"><!-- X ve Y ayrı --></div>
```

## Flex Item Sınıfları

### 6. Grow & Shrink (Büyüme/Küçülme) (flex-*)

```html
<!-- Eşit şekilde büyüyerek alanı doldur -->
<div class="flex">
  <div class="flex-1">1/3</div>
  <div class="flex-1">1/3</div>
  <div class="flex-1">1/3</div>
</div>

<!-- Farklı oranlar -->
<div class="flex">
  <div class="flex-2">2/3</div>
  <div class="flex-1">1/3</div>
</div>

<!-- Sabit genişlik -->
<div class="flex">
  <div class="flex-none">Sabit</div>
  <div class="flex-1">Dinamik</div>
</div>
```

### Flex Grow (Büyüme)

`grow` sınıfları, bir flex item'ın kalan alanı doldurmak için ne kadar büyüyebileceğini kontrol eder.

| Sınıf         | Açıklama                        |
|-------------- |---------------------------------|
| `grow`        | Büyüyebilir (`flex-grow: 1`)    |
| `grow-0`      | Büyümez (`flex-grow: 0`)        |

**Örnek:**
```html
<div class="flex gap-2">
  <div class="grow bg-blue-200">Büyüyen</div>
  <div class="grow-0 bg-red-200">Büyümeyen</div>
</div>
```

### Flex Shrink (Küçülme)

`shrink` sınıfları, bir flex item'ın alan daraldığında ne kadar küçülebileceğini kontrol eder.

| Sınıf         | Açıklama                         |
|-------------- |----------------------------------|
| `shrink`      | Küçülebilir (`flex-shrink: 1`)   |
| `shrink-0`    | Küçülmez (`flex-shrink: 0`)      |

**Örnek:**
```html
<div class="flex w-40 gap-2">
  <div class="shrink bg-green-200 w-32">Küçülebilir</div>
  <div class="shrink-0 bg-yellow-200 w-32">Küçülmez</div>
</div>
```

### Flex Basis (Başlangıç Genişliği)

`basis-*` sınıfları, bir flex item'ın başlangıç genişliğini belirler.

**Örnek:**
```html
<div class="flex gap-2">
  <div class="basis-1/4 bg-purple-200">%25</div>
  <div class="basis-1/2 bg-pink-200">%50</div>
  <div class="basis-1/4 bg-gray-200">%25</div>
</div>
```

## **Pratik Örnekler**

```html
<!-- Navbar - Yatay, Ortada Hizalanmış -->
<div class="flex justify-between items-center h-16 bg-gray-800">
  <div>Logo</div>
  <div class="flex gap-4">
    <a>Ana Sayfa</a>
    <a>Hakkında</a>
  </div>
</div>

<!-- Kartlar - Wrap ile Responsive -->
<div class="flex flex-wrap gap-4">
  <div class="flex-1 min-w-80 p-4 bg-white rounded">Kart 1</div>
  <div class="flex-1 min-w-80 p-4 bg-white rounded">Kart 2</div>
</div>

<!-- Merkeze Hizalı Content -->
<div class="flex h-screen justify-center items-center">
  <div>Ekranın tam ortasında</div>
</div>
```

## Flex sabit col ve dinamik col

Flex'de bir flex-item belli bir rem genişliğinde, kalanı diğer item verecek şekilde dağıtma

```html
<!-- Yol 1: Sabit genişlik + Geri kalanı doldur -->
<div class="flex gap-4">
  <div class="w-32">Sabit 8rem (128px)</div>
  <div class="flex-1">Kalanı doldur</div>
</div>

<!-- Yol 2: Sabit rem genişlik ile -->
<div class="flex gap-4">
  <div class="w-40">Sabit 10rem</div>
  <div class="flex-1">Kalanı doldur</div>
  <div class="flex-1">Kalanı doldur</div>
</div>

<!-- Yol 3: Sidebar + Content örneği -->
<div class="flex gap-4">
  <aside class="w-64">Sidebar (16rem)</aside>
  <main class="flex-1">Ana içerik (kalanı doldur)</main>
</div>

<!-- Yol 4: Min-width ile responsive -->
<div class="flex gap-4">
  <div class="flex-none w-48">Sabit 12rem</div>
  <div class="flex-1 min-w-0">Kalanı doldur</div>
</div>
```

**Kullanılan Sınıflar:**
- **`w-32`** → 8rem genişlik (32 * 0.25rem = 8rem)
- **`w-40`** → 10rem genişlik
- **`w-64`** → 16rem genişlik
- **`flex-1`** → Kalan alanı eşit şekilde doldur
- **`flex-none`** → Sabit genişlik (büyümez/küçülmez)
- **`min-w-0`** → Overflow'u engellemek için

➖ Rem cinsinden özel genişlik ayarlama

`tailwind.config.js` dosyasında custom değer ekleyebilirsiniz:

```js
extend: {
  width: {
    'rem-12': '12rem',
    'rem-20': '20rem',
  }
}
```

Sonra `w-rem-12` şeklinde kullanırsınız.


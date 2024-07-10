
Udemy Kurs Notları

Sources

- https://www.udemy.com/course/tailwind-css-sifirdan-gercek-web-tasarim-projeleri-ile-ogrenin

# Contents

- [Contents](#contents)
- [B1 Giriş](#b1-giriş)
  - [1. Tailwind CSS Nedir?](#1-tailwind-css-nedir)
  - [2. Tailwind UI, Tailwind Components ve Tailwind Templates.](#2-tailwind-ui-tailwind-components-ve-tailwind-templates)
  - [3. Download - Install VS CODE - Tailwind extension, Auto Rename Tag and Live Server](#3-download---install-vs-code---tailwind-extension-auto-rename-tag-and-live-server)
- [B2 Tailwind Css Proje Kurulumu](#b2-tailwind-css-proje-kurulumu)
  - [4. Tailwind CSS Play CDN ile kullanımı](#4-tailwind-css-play-cdn-ile-kullanımı)
  - [5. Tailwind CLI kurulumu. Node.js ile](#5-tailwind-cli-kurulumu-nodejs-ile)
  - [6. Proje dosyalarını indir.](#6-proje-dosyalarını-indir)
- [B3 Light ve Dark Modu](#b3-light-ve-dark-modu)
  - [7. Light ve Dark modu](#7-light-ve-dark-modu)
- [B4 Apply Layer Base and Component Kullanımı](#b4-apply-layer-base-and-component-kullanımı)
  - [9. Tailwind CSS Apply - Layer Base and Component kullanımı.](#9-tailwind-css-apply---layer-base-and-component-kullanımı)
- [B5 React ile Tailwind Kullanımı](#b5-react-ile-tailwind-kullanımı)
  - [11. React ile Tailwind CSS kurulumu, light/dark modu](#11-react-ile-tailwind-css-kurulumu-lightdark-modu)
  - [12. Tailwind css with React.js](#12-tailwind-css-with-reactjs)
- [B6 Breakpoints - Responsive Design](#b6-breakpoints---responsive-design)
  - [13. Tailwind css breakpoints - Responsive design](#13-tailwind-css-breakpoints---responsive-design)
- [B7 Layout](#b7-layout)
  - [15. Container](#15-container)
  - [16. box model](#16-box-model)
  - [17. display. (block,inline,flex vb.)](#17-display-blockinlineflex-vb)
  - [18. float ve clear](#18-float-ve-clear)
  - [19. object fit ve object position](#19-object-fit-ve-object-position)
  - [20. overflow](#20-overflow)
  - [21.  position (relative,absolute,fixed vs.) - top-right-bottom-left](#21--position-relativeabsolutefixed-vs---top-right-bottom-left)
  - [22.  Visibility](#22--visibility)
  - [23. z-index](#23-z-index)
- [B8 Flexbox](#b8-flexbox)
  - [25. flexbox container hazırlanması](#25-flexbox-container-hazırlanması)
  - [26. flexbox flex-direction](#26-flexbox-flex-direction)
  - [27. flex-wrap](#27-flex-wrap)
  - [28. justify-content](#28-justify-content)
  - [29. align-items](#29-align-items)
  - [30. align-content (flexbox and grid)](#30-align-content-flexbox-and-grid)
  - [31. order (flexbox and grid)](#31-order-flexbox-and-grid)
  - [32. flex-grow](#32-flex-grow)
  - [33. flex-shrink](#33-flex-shrink)
  - [34. flex-grow-shrink tek seferde kullanım](#34-flex-grow-shrink-tek-seferde-kullanım)
- [B9 - Spacing (Margin,Padding,Space Between)](#b9---spacing-marginpaddingspace-between)
  - [36. Margin ve padding nedir, ne amaç ile kullanılır? Hatırlatma](#36-margin-ve-padding-nedir-ne-amaç-ile-kullanılır-hatırlatma)
  - [37. margin](#37-margin)
  - [38. padding](#38-padding)
  - [39. space-between](#39-space-between)
- [B10 - Sizing - Boyutlandırma (width,height,mw,mh)](#b10---sizing---boyutlandırma-widthheightmwmh)
  - [41. width, max-width, min-width](#41-width-max-width-min-width)
  - [42. height, max-height, min-height](#42-height-max-height-min-height)
- [B11 - Backgrounds](#b11---backgrounds)
  - [44. Background color](#44-background-color)
  - [45. Background opacity](#45-background-opacity)
  - [46. Background gradient \& background image](#46-background-gradient--background-image)
  - [47. Background image repeat](#47-background-image-repeat)
  - [48. Background size](#48-background-size)
  - [49. Background position](#49-background-position)
- [B12 - Font Family](#b12---font-family)
  - [51. Font-family, font-size, font-style, font-weight](#51-font-family-font-size-font-style-font-weight)
  - [52. text-align, vertical-align](#52-text-align-vertical-align)
  - [53. text color, text-transform, text-indent](#53-text-color-text-transform-text-indent)
- [B13 - Proje 1](#b13---proje-1)
  - [54. Web sitesi tanıtım.](#54-web-sitesi-tanıtım)
  - [55. Proje 1 - Responsive Lamborghini Website. Light and dark mode.](#55-proje-1---responsive-lamborghini-website-light-and-dark-mode)
- [B14 - Proje 2](#b14---proje-2)
  - [57. Web sitesi tanıtım](#57-web-sitesi-tanıtım)
  - [58. Responsive Music Website](#58-responsive-music-website)


# B1 Giriş

## 1. Tailwind CSS Nedir?
10 

## 2. Tailwind UI, Tailwind Components ve Tailwind Templates.
6 

## 3. Download - Install VS CODE - Tailwind extension, Auto Rename Tag and Live Server
5 

🔔 Tavsiye Edilen Eklentiler

- Live Server, 

# B2 Tailwind Css Proje Kurulumu

## 4. Tailwind CSS Play CDN ile kullanımı
7 

## 5. Tailwind CLI kurulumu. Node.js ile
8 




## 6. Proje dosyalarını indir.
1 

# B3 Light ve Dark Modu

## 7. Light ve Dark modu
16 

8. Proje dosyalarını indir.
1 

# B4 Apply Layer Base and Component Kullanımı

## 9. Tailwind CSS Apply - Layer Base and Component kullanımı.

- @layer , tailwind css dosyasına yazmamız gerekir.

- @layer components blogu içerisine tailwind class birleştirme tanımları yapılabilir.

```css
@layer component  {
  .btn-primary {
    @apply py2 px-4 bg-blue-500
  }
}
```

- @ layer base blogu içerisinde temel etiketlere otomatik css tanımları yapabiliriz.

```css
@layer base {
  h1 {
    @apply text-3xl
  }
}
```

# B5 React ile Tailwind Kullanımı

## 11. React ile Tailwind CSS kurulumu, light/dark modu
1 

## 12. Tailwind css with React.js
1 sa 24 

# B6 Breakpoints - Responsive Design

## 13. Tailwind css breakpoints - Responsive design
11 

# B7 Layout

## 15. Container
10 

## 16. box model
6 

- box-border, box-content 


## 17. display. (block,inline,flex vb.)

- html elementinin blok özelliği : block, inline, inline-block, flex, grid vs...

## 18. float ve clear
8 

- float-right, float-left ve float-none sınıfları

- float ile resim ile yazımızı yanyana yapabiliriz, clear ile yanyana özelliği kesmiş oluruz.


## 19. object fit ve object position
7 

- web sitenizi ekleyeceğimiz görsel alana uymaz ve bu sorunu object-fit ile çözeriz. (alanı kaplaması,stretch vs...)

- object position ile sığmadığında nasıl konumlandırıcağını belirleyebiliriz.

## 20. overflow
5 

- overflow-scroll tanımladığımızda, div içerisindeki p elementinde alt scroll çıkması için width belirlenmesi gerekir.

```html
<div class="overflow-scroll">
  <p class="w-96"> burada width belirlenmezse alt scroll görünmez.
  </p>
</div>
```

## 21.  position (relative,absolute,fixed vs.) - top-right-bottom-left
11 

## 22.  Visibility 
5 

- invisible sınıf tanımı yer tutar, ama gösterilmez.

- tamamıyla göstermemesi için `display:none` yaparız.

- collapse sınıf tanımı ile tablolarda satırı göstermeyebiliriz.

## 23. z-index
6 

- module ayarlarında özelleştirebiliriz. (theme::extend::zIndex::'100':'100')

- class="z-[100]" şeklinde istediğimiz değeri de verebiliriz.

24.  Proje dosyalarını indir.
1 

# B8 Flexbox

## 25. flexbox container hazırlanması
6 

## 26. flexbox flex-direction
2 

## 27. flex-wrap
4 

## 28. justify-content
4 

## 29. align-items
4 

## 30. align-content (flexbox and grid)
7 

## 31. order (flexbox and grid)
2 

## 32. flex-grow
3 

## 33. flex-shrink
4 

## 34. flex-grow-shrink tek seferde kullanım
5 

35. Proje dosyalarını indir.
1 

# B9 - Spacing (Margin,Padding,Space Between)

## 36. Margin ve padding nedir, ne amaç ile kullanılır? Hatırlatma
6 

## 37. margin
9 

## 38. padding
8 

## 39. space-between
5 

- flex elemanlarının arasında boşluğu tanımlar.

# B10 - Sizing - Boyutlandırma (width,height,mw,mh)

## 41. width, max-width, min-width
11 
 
## 42. height, max-height, min-height
6 

# B11 - Backgrounds

## 44. Background color
5 

## 45. Background opacity
5 

- opacity / işareti ile belirtiriz. Örneğin `class="bg-sky-500/75"` burada opacity 75 olarak belirtmiş oluruz.

- `bg-[#50d71e]`   ile özel renk belirtebiliriz.

## 46. Background gradient & background image
9 

- `class="bg-[url('img/myimage.svg')]"` tanımlaması gibi kendi resim dosyamızı da belirtebiliriz.


## 47. Background image repeat
4 

## 48. Background size

Source : https://tailwindcss.com/docs/background-size

- h-x ön tanımlı size'ları  kullanabiliriz.

- h-[xxx] ile özel pixel tanımlaması yapabiliriz.

```html
<div class="bg-[url('https://picsum.photos/seed/picsum/536/354')] h-[354px] bg-no-repeat mb-10"></div>

<div class="bg-[url('https://picsum.photos/seed/picsum/536/354')] h-52 w-96 bg-repeat mb-10 bg-auto">

```

- bg-auto (default-size) , bg-cover (fill background layer) ve bg-contain (scale to fit) üç opsiyonumuz var.


- özel length verebiliriz

```html
<div
        class="bg-[url('https://picsum.photos/seed/picsum/536/354')] h-52 w-96 bg-no-repeat mb-10 bg-[length:200px_100px] border dark:border-gray-600">
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus,
          facere. Eligendi amet quibusdam, autem quas debitis nam culpa unde
          pariatur, in id quo ducimus rem at labore perspiciatis voluptate
          dolorum.
        </p>
      </div>
```

- imaj içinde olduğu kutudaki pozisyonu için bg-position kullanırız.


## 49. Background position

Source : https://tailwindcss.com/docs/background-position

- aşağıdaki opsiyonlar imajın div içerisinde görünen kısmını ayarlayabiliriz.

```
bg-bottom
bg-center	
bg-left	
bg-left-bottom	
bg-left-top	
bg-right	
bg-right-bottom	
bg-right-top	
bg-top	

```


# B12 - Font Family

## 51. Font-family, font-size, font-style, font-weight
13 

- font-sans (arial türü) , font-serif (times new roman türü) ve font-mono (eşit büyüklükte harfler) olmak üzere üç adet ana sınıf vardır.

- text-md, text-lg ile yazı büyüklüğünü belirleriz.

- text-md/x sınıf tanımında x ile satır yüksekliğini belirleriz.

- text-md/[10px] gibi satır yüksekliğini pixel olarakda verilebilir.

- font-style olarak italic ve not-italic sınıfları vardır.
  
- font-weight ile yazı kalınlığını belirleriz. font-medium, font-bold, font-black, font-light gibi sınıflar vardır.

- font-[x] ile yazı kalınlığını x olarak belirleriz.

## 52. text-align, vertical-align
8 

- text align ile yazının yatayda hizalanmasını sağlarız. örnek sınıflar text-left,text-center, text-justify (iki tarafa yaslama)

- vertical align için align-top, align-middle,align-sub ... sınıflar dikeyde hizalamamazı sağlar.

- align-[4px] gibi özel bir pixel de verebiliriz.
  

## 53. text color, text-transform, text-indent
7 

- text-sky-100 , text-red-100 gibi text color verebiliriz.

- lowercase, uppercase, capitalize (baş harfleri büyük yapar), normal-case gibi sınıflar var.

- parağraf başıni satırda ne kadar boşluk bırakılacağını gösterir.



# B13 - Proje 1 

## 54. Web sitesi tanıtım.
1 

## 55. Proje 1 - Responsive Lamborghini Website. Light and dark mode.
22 

# B14 - Proje 2

## 57. Web sitesi tanıtım
2 

## 58. Responsive Music Website
42 

60. Bu alan hazırlanıyor

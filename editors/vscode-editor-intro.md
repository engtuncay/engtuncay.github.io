
**Visual Studio Code**

- [Other Important Articles](#other-important-articles)
  - [Navigating to the borders of a code block](#navigating-to-the-borders-of-a-code-block)
- [Extension Tutors](#extension-tutors)
  - [Emmet (Zen Coding)](#emmet-zen-coding)
  - [Region Folding Extension](#region-folding-extension)
- [Settings](#settings)
  - [Arama](#arama)
- [Extensions List](#extensions-list)
  - [Html](#html)
  - [Css](#css)
  - [Js](#js)
  - [Java](#java)
  - [Dot Net C#](#dot-net-c)

# Other Important Articles 

## Navigating to the borders of a code block

To navigate to the borders of a code block, do one of the following:

- To navigate to the code block start, press Ctrl+[ , with the caret anywhere inside the code block.

  The caret jumps to the opening brace of the current code block.

- To navigate to the code block end, press Ctrl+] , with the caret anywhere inside the code block.

  The caret jumps to the closing brace of the current code block.

- To toggle between code block start or end, press Ctrl+Shift+M

  ​

  You can also invoke this action (Move Caret to Matching Brace) with a [Search Everywhere](https://www.jetbrains.com/help/idea/searching-everywhere.html) or [Go to Action](https://www.jetbrains.com/help/idea/navigate-to-action.html)functionality:

  ![matching braces](https://www.jetbrains.com/help/img/idea/2018.1/matching_braces.png)

Navigating to the borders of the closest higher code block

To navigate to the borders of the closest higher code block, do one of the following:

- To jump to the higher code block start, press Ctrl+[, with the caret at the current code block opening brace.
- To jump to the higher code block end, press Ctrl+], with the caret at the current code block closing brace.

Last modified: 4 April 


# Extension Tutors

## Emmet (Zen Coding) 

```text
# bir id nitelikli element oluşturur

. bir class nitelikli element oluşturur

[ ] özel nitelik tanımlı element oluşturur

> alt element oluşturur

+  kardeş element oluşturur

^  üst elemente erişir

* Bir işlemin tekrar etmesini sağlar

$ ve $$ tekrar eden işlem sayısını temsil eder

{ } özel metin ekleme için kullanılır.

```

**Detaylı Bilgi İçin**

docs.emmet.io

docs.emmet.io/cheat-sheet/

```text
html:5 : html 5 şablonu oluşturur

p*3>lorem 

üç paragraf ve içinde lorem parağrafı oluşturur.

lorem25 : 25 kelimelik text üretir.

ul>li*5>lorem3

div#header

id header olan tag üretir

div.header

class header olan 

div.header#header

.header#header

default olarak div yapar

ul#listem.list>li*5.listitem

ul#listem.list>li*5.listitem$

\$ sıra sayıları ekler 1,2,3 diye ;

\$$ yazarsak 01 ,02 şekilnde yazar

ul#listem.list>li*5.listitem$ { item $} : özel içeriğimiz süslü parantez içine yazılır 

h1+h2+h3  : aynı seviyede h1 , h2 ve h3 yapar

```

Ctrl + K + C yorum satırı yapar

Ctrl + K + U yorumu kaldırır

`h1>lorem3^h2+h3    : şapka ile üste çıkmış olduk`

`(h1>lorem3) + (h2>lorem2) + h3    : bu şekilde de kullanılabilir`

`img[src="#" alt=""] kullanılabilir , tek kullanım için verimli degil`

`a:link `

input:email yazarak alanları tab ile geçiş yapabiliriz.

web essentials extension kurarak emmet özelliği eklenebilir.

## Region Folding Extension

- The extension also installs a command to wrap a region comment around the current selection.

Commands :

regionfolder.wrapWithRegion (Ctrl+M Ctrl+R)

Örnek

```
For HTML style languages, you could define a fodable region with the following tags:

<!-- #region Body -->
<body>
</body>
<!-- #endregion -->

```

The extension is still alpha quality, so please do log any bugs on Github here.


# Settings

## Arama

- id üzerinden arama

```
@id:github.copilot.enable @id:chat.implicitContext.enabled 
```






# Extensions List

## Html

- Auto Close Tag By Jun Han
- Auto Rename Tag By Jun Han
- Open in Browser By CoderFree


Keyboard Shortcut 'a Ekle

- Wrap With Abbreviation : elementin başı ve sonu ile beraber al veya seç

Key. Shortcut ı için File -> Pref -> Keyb. Shortcuts buradan bulunur ve kısayol eklenir. alt shift w eklemiş.

## Css

## Js

## Java

## Dot Net C#



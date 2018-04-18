


[TOC]


### Shortcuts



#### File

- Ctrl + P : Go To File



Known Shortcuts

- C + N : New File

#### Edit



#### Selection



#### View

- Ctrl + Shift + P : Show All Commands - Command Palette





#### Navigation or Go

- Find in File : C,S + F

- Toggle Terminal C + "


#### Debug and Run
- Start Debugging F5

#### Tasks

#### Help



### Other Important Articles 

#### Navigating to the borders of a code block

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





### Önemli Extensionlar

- Auto Close Tag By Jun Han
- Auto Rename Tag By Jun Han
- Open in Browser By CoderFree



Keyboard Shortcut 'a Ekle

- Wrap With Abbreviation : elementin başı ve sonu ile beraber al veya seç

Key. Shortcut ı için File -> Pref -> Keyb. Shortcuts buradan bulunur ve kısayol eklenir. alt shift w eklemiş.



### Emmet (Zen Coding) 

```markdown
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

```

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


#### 




- [CSS Flexbox Layout Module](#css-flexbox-layout-module)
  - [Flexbox Elements](#flexbox-elements)
- [Parent Element (Container)](#parent-element-container)
  - [CSS Flex Items](#css-flex-items)
  - [Flexbox Responsive](#flexbox-responsive)
- [Dive into Flexbox (Bocoup)](#dive-into-flexbox-bocoup)

# CSS Flexbox Layout Module

Source : w3schools

Before the Flexbox Layout module, there were four layout modes:

- Block, for sections in a webpage
- Inline, for text
- Table, for two-dimensional table data
- Positioned, for explicit position of an element

The Flexible Box Layout Module, makes it easier to design flexible responsive layout structure without using float or positioning.

## Flexbox Elements

To start using the Flexbox model, you need to first define a flex container.

Example : A flex container with three flex items:

```html
<div class="flex-container">
  <div>1</div>
  <div>2</div>
  <div>3</div>
</div>
```

# Parent Element (Container)

Parent Element (Container)
Like we specified in the previous chapter, this is a flex container (the blue area) with three flex items:
The flex container becomes flexible by setting the display property to flex:

Example
.flex-container {
  display: flex;
}

The flex container properties are:
flex-direction
flex-wrap
flex-flow
justify-content
align-items
align-content

The flex-direction Property
The flex-direction property defines in which direction the container wants to stack the flex items.

Example
The column value stacks the flex items vertically (from top to bottom): (yukarıdan aşağıya sola bitişik kutular)

.flex-container {
  display: flex;
  flex-direction: column;
}

Example
The column-reverse value stacks the flex items vertically (but from bottom to top):

.flex-container {
  display: flex;
  flex-direction: column-reverse;
}

Example
The row value stacks the flex items horizontally (from left to right):

.flex-container {
  display: flex;
  flex-direction: row;
}

Example
The row-reverse value stacks the flex items horizontally (but from right to left):

.flex-container {
  display: flex;
  flex-direction: row-reverse;
}

The flex-wrap Property
The flex-wrap property specifies whether the flex items should wrap or not.

The examples below have 12 flex items, to better demonstrate the flex-wrap property. (flex-wrap özelliğini aktif etmemiş olsaydık, hepsi yanyana dizilirdi. Ekrana sığmazsa da scroll yapar.)

Example
The wrap value specifies that the flex items will wrap if necessary:

.flex-container {
  display: flex;
  flex-wrap: wrap;
}

Example
The nowrap value specifies that the flex items will not wrap (this is default):

.flex-container {
  display: flex;
  flex-wrap: nowrap;
}

Example
The wrap-reverse value specifies that the flexible items will wrap if necessary, in reverse order: ( normalde bir aşağıda satıra giderken, bu sefer bir yukarı satıra geçer)

.flex-container {
  display: flex;
  flex-wrap: wrap-reverse;
}

The flex-flow Property
The flex-flow property is a shorthand property for setting both the flex-direction and flex-wrap properties.

Example
.flex-container {
  display: flex;
  flex-flow: row wrap;
}

The justify-content Property
The justify-content property is used to align the flex items: (takip ettikleri eksen üzerinde (ana eksen) yaslama yapar, default da x ekseni üzerinde yapar, çünkü kutular x ekseni üzerinde sıralanıyor. flex-flow column ise y ekseni üzerinde yapar)

Example
The center value aligns the flex items at the center of the container:

.flex-container {
  display: flex;
  justify-content: center;
}
Example
The flex-start value aligns the flex items at the beginning of the container (this is default): 

.flex-container {
  display: flex;
  justify-content: flex-start;
}

Example
The flex-end value aligns the flex items at the end of the container:

.flex-container {
  display: flex;
  justify-content: flex-end;
}

Example
The space-around value displays the flex items with space before, between, and after the lines: (her kutunun sagında ve solunda ortalama bir boşluk bırakır, mesela 10px, ilk kutunun sağında ve solunda 10px olur, ikinci kutunun da. birinci kutu ile ikinci kutu arasında 20px boşluk olur.)  [-|--|--|--|-]) 

.flex-container {
  display: flex;
  justify-content: space-around;
}

Example
The space-between value displays the flex items with space between the lines: (örneğin ilk kutu sola gelir, son kutuda sağa gelir. aradaki diger kutular arasında eşit boşluk bırakır. [|--|--|--|])

.flex-container {
  display: flex;
  justify-content: space-between;
}

The align-items Property
The align-items property is used to align the flex items. ( flex kutusunu hizalamak için kullanılır. ters eksen üzerinde. varsayılan flex-flow row olunca , y ekseni üzerinde hizalama yapar )

In these examples we use a 200 pixels high container, to better demonstrate the align-items property.

Example
The center value aligns the flex items in the middle of the container:

.flex-container {
  display: flex;
  height: 200px;
  align-items: center;
}

Example
The flex-start value aligns the flex items at the top of the container:

.flex-container {
  display: flex;
  height: 200px;
  align-items: flex-start;
}
Example
The flex-end value aligns the flex items at the bottom of the container:

.flex-container {
  display: flex;
  height: 200px;
  align-items: flex-end;
}

Example
The stretch value stretches the flex items to fill the container (this is default): (container sonuna kadar doldurur, grow yapar)

.flex-container {
  display: flex;
  height: 200px;
  align-items: stretch;
}
Example
The baseline value aligns the flex items such as their baselines aligns: (kutuların merkez orta noktalarını göre hizalar, ortada olacak şekilde.)

.flex-container {
  display: flex;
  height: 200px;
  align-items: baseline;
}

The align-content Property

The align-content property is used to align the flex lines. (bir kolona (yatay veya dikey) sığmayan flex elemanlarını ayarlamak için kullanılır. )
In these examples we use a 600 pixels high container, with the flex-wrap property set to wrap, to better demonstrate the align-content property.

Example
The space-between value displays the flex lines with equal space between them:

.flex-container {
  display: flex;
  height: 600px;
  flex-wrap: wrap;
  align-content: space-between;
}

Example
The space-around value displays the flex lines with space before, between, and after them:

.flex-container {
  display: flex;
  height: 600px;
  flex-wrap: wrap;
  align-content: space-around;
}
Example
The stretch value stretches the flex lines to take up the remaining space (this is default): (örneğin üç satıra sığacaksa ,üç satırı full bir şekilde kullanılır.)

.flex-container {
  display: flex;
  height: 600px;
  flex-wrap: wrap;
  align-content: stretch;
}
Example
The center value displays display the flex lines in the middle of the container:

.flex-container {
  display: flex;
  height: 600px;
  flex-wrap: wrap;
  align-content: center;
}

Example
The flex-start value displays the flex lines at the start of the container:

.flex-container {
  display: flex;
  height: 600px;
  flex-wrap: wrap;
  align-content: flex-start;
}

Example
The flex-end value displays the flex lines at the end of the container: 

.flex-container {
  display: flex;
  height: 600px;
  flex-wrap: wrap;
  align-content: flex-end;
}

Perfect Centering
In the following example we will solve a very common style problem: perfect centering.

SOLUTION: Set both the justify-content and align-items properties to center, and the flex item will be perfectly centered:

Example
.flex-container {
  display: flex;
  height: 300px;
  justify-content: center;
  align-items: center;
}

## CSS Flex Items

Child Elements (Items)

The direct child elements of a flex container automatically becomes flexible (flex) items. ( flex container'daki her bir element, flex item'dır, yani her kutu bir flex item.)

The element below represents four blue flex items inside a grey flex container.

Example
<div class="flex-container">
  <div>1</div>
  <div>2</div>
  <div>3</div>
  <div>4</div>
</div>

The flex item properties are:

```
order
flex-grow
flex-shrink
flex-basis
flex
align-self

```
The order Property

The order property specifies the order of the flex items.

The first flex item in the code does not have to appear as the first item in the layout.

The order value must be a number, default value is 0.

Example
The order property can change the order of the flex items:

<div class="flex-container">
  <div style="order: 3">1</div>
  <div style="order: 2">2</div>
  <div style="order: 4">3</div>
  <div style="order: 1">4</div>
</div>

The flex-grow Property

The flex-grow property specifies how much a flex item will grow relative to the rest of the flex items. (digerlerine nazaran nasıl büyüyecek.)

The value must be a number, default value is 0.

Example

Make the third flex item grow eight times faster than the other flex items: ( flex itemlar 1x,1x,8x olarak container içindeki alanı paylaşırlar)

<div class="flex-container">
  <div style="flex-grow: 1">1</div>
  <div style="flex-grow: 1">2</div>
  <div style="flex-grow: 8">3</div>
</div>

The flex-shrink Property

The flex-shrink property specifies how much a flex item will shrink relative to the rest of the flex items. (digerlerine nazaran nasıl daha küçüyeceğini belirtir.)

The value must be a number, default value is 1.

Example

Do not let the third flex item shrink as much as the other flex items:

```html
<div class="flex-container">
  <div>1</div>
  <div>2</div>
  <div style="flex-shrink: 0">3</div>
  <div>4</div>
  <div>5</div>
  <div>6</div>
  <div>7</div>
  <div>8</div>
  <div>9</div>
  <div>10</div>
</div>
```

The flex-basis Property

The flex-basis property specifies the initial length of a flex item.

Example
Set the initial length of the third flex item to 200 pixels:

<div class="flex-container">
  <div>1</div>
  <div>2</div>
  <div style="flex-basis: 200px">3</div>
  <div>4</div>
</div>

The flex Property
The flex property is a shorthand property for the flex-grow, flex-shrink, and flex-basis properties.

Example
Make the third flex item not growable (0), not shrinkable (0), and with an initial length of 200 pixels:

<div class="flex-container">
  <div>1</div>
  <div>2</div>
  <div style="flex: 0 0 200px">3</div>
  <div>4</div>
</div>

The align-self Property
The align-self property specifies the alignment for the selected item inside the flexible container.

The align-self property overrides the default alignment set by the container's align-items property.

In these examples we use a 200 pixels high container, to better demonstrate the align-self property:

Example
Align the third flex item in the middle of the container:

```html
<div class="flex-container">
  <div>1</div>
  <div>2</div>
  <div style="align-self: center">3</div>
  <div>4</div>
</div>
```

```css
.flex-container { display: flex; height: 200px; background-color: #f1f1f1; } .flex-container > div { 
background-color: DodgerBlue; 
color: white; width: 100px; 
margin: 10px; 
text-align: center; 
line-height: 75px; 
font-size: 30px; 
}

```

Example

Align the second flex item at the top of the container, and the third flex item at the bottom of the container:

```html
<div class="flex-container">
  <div>1</div>
  <div style="align-self: flex-start">2</div>
  <div style="align-self: flex-end">3</div>
  <div>4</div>
</div>
```

## Flexbox Responsive

https://www.w3schools.com/css/css3_flexbox_responsive.asp

# Dive into Flexbox (Bocoup)

https://bocoup.com/blog/dive-into-flexbox


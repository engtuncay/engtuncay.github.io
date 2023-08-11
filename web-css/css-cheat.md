**CSS Cheatsheet**

- [Selectors](#selectors)
- [Ways to Insert Css](#ways-to-insert-css)
- [Multiple Style Sheets](#multiple-style-sheets)
- [Cascading Order](#cascading-order)
- [Comments](#comments)
- [Specifity](#specifity)
- [Element Size](#element-size)
  - [Units](#units)
  - [Absolute Lengths](#absolute-lengths)
  - [Relative Lengths](#relative-lengths)
  - [Box Models](#box-models)
  - [Height and Width Values (and units)](#height-and-width-values-and-units)
  - [Max Width](#max-width)
  - [All CSS Dimension Properties](#all-css-dimension-properties)
- [Color](#color)
- [Background](#background)
- [Flexbox Cheat](#flexbox-cheat)
- [Reference Details](#reference-details)
  - [Other Pseudo Classes](#other-pseudo-classes)


# Selectors

*Simple selectors* 

select elements based on tag name, id, class.

Simple       | Selectors
-------------|---------------
Id (#)       | #idName
Class (.)    | .className
Universal    | *
Grouping (,) | selA,selB
Chaining     | .footer.center

Class Chaining : elements that have footer and center classes,order is not important

*Combinator selectors* 

select elements based on a specific relationship between them

Combinator Sel.      | Example | Note
---------------------|---------|-----------------------
Descendant (space)   | div p   | Nesil Seçici
Child (>)            | div > p | Çocuk Seç.
Adjacent Sibling (+) | div + p | Takip eden kardeş seç.
General Sibling (~)  | div ~ p | Genel kardeş seç.

*Pseudo-classes*

select elements based on a certain state of a tag element.

Syntax | 
--- | 
selector:pseudo-class


*Pseudo Elements*

select and style a part of an element

Syntax | 
--- | 
selector::pseudo-element

Selector       | Example         | Example description
---------------|-----------------|-------------------------------------------------------------
::after        | p::after        | Insert something after the content of each <p> element
::before       | p::before       | Insert something before the content of each <p> element
::first-letter | p::first-letter | Selects the first letter of each <p> element
::first-line   | p::first-line   | Selects the first line of each <p> element
::selection    | p::selection    | Selects the portion of an element that is selected by a user

you can see the detail from this [link](./css-intro-01-Selector-Specifity.md)

*Attribute Selectors*

select elements based on an attribute or attribute value

Examples

```css
a[target] {
  background-color: yellow;
}

a[target="_blank"] {
  background-color: yellow;
}

```

```text
Selector	Example	(Example description)
[attribute]	[target]	Selects all elements with a target attribute

[attribute=value]	[target=_blank]	Selects all elements with (*equals*) target="_blank"

[attribute~=value]	[title~=flower]	Selects all elements with a title attribute *containing* the word "flower"

[attribute|=value]	[lang|=en]	Selects all elements with a lang attribute value *starting with* "en"

[attribute^=value]	a[href^="https"]	Selects every <a> element whose href attribute value *begins with* "https"

[attribute$=value]	a[href$=".pdf"]	Selects every <a> element whose href attribute value *ends with* ".pdf"

[attribute*=value]	a[href*="w3schools"]	Selects every <a> element whose href attribute value *contains* the substring "w3schools"
```

# Ways to Insert Css

*External Css*

```html
<!-- head section -->
<link rel="stylesheet" href="mystyle.css">
```

*Internal Css*

- Head alanında style etiketi içerisine yazarız.

```html
<!-- head section -->
<style>
body {
  background-color: linen;
}
</style>

```

*Inline Css*

```html
<h1 style="color:blue;text-align:center;">This is a heading</h1>

```

# Multiple Style Sheets

If some properties have been defined for the same selector (element) in different style sheets, *the value from the last read style sheet* will be used. 

# Cascading Order

All the styles in a page will "cascade" into a new "virtual" style sheet by the following rules, where number one has the highest priority:

1. Inline style (inside an HTML element)
2. External and internal style sheets (in the head section)
3. Browser default

# Comments

```css
/* This comment can be single-line or multi-line */
p {
  color: red;
}
```

--*LINK - tbc

# Specifity

- If there are two or more conflicting CSS rules that point to the same element, the browser follows some rules to determine which one is most specific and therefore wins out.

Think of specificity as a score/rank that determines which style declarations are ultimately applied to an element.

The universal selector (*) has low specificity, while ID selectors are highly specific! 

- Specificity Hierarchy
Every selector has its place in the specificity hierarchy. There are four categories which define the specificity level of a selector:

1. Inline styles - An inline style is attached directly to the element to be styled. Example: `<h1 style="color: #ffffff;">`.

2. IDs - An ID is a unique identifier for the page elements, such as #navbar.

3. Classes, attributes and pseudo-classes - This category includes .classes, [attributes] and pseudo-classes such as :hover, :focus etc.

4. Elements and pseudo-elements - This category includes element names and pseudo-elements, such as h1, div, :before and :after.

**Topics**

- How to Calculate Specifity

- Specifity Rules

# Element Size

## Units

## Absolute Lengths

Screen | Desc
-------|-----------------------------
cm     | centimeters
mm     | millimeters
in     | inches (1in = 96px = 2.54cm)
px*    | pixels (1px = 1/96th of 1in)
pt     | points (1pt = 1/72 of 1in)
pc     | picas (1pc = 12 pt)

## Relative Lengths

Unit | Desc
-----|------------------------------------------------------------------------------------------
em   | Relative to the font-size of the element (2em means 2 times the size of the current font)
ex   | Relative to the x-height of the current font (rarely used)
ch   | Relative to width of the "0" (zero)
rem  | Relative to font-size of the root element
vw   | Relative to 1% of the width of the viewport*
vh   | Relative to 1% of the height of the viewport*
vmin | Relative to 1% of viewport's* smaller dimension
vmax | Relative to 1% of viewport's* larger dimension
%    | Relative to the parent element (ebeveyn elementin %'si)


Tip: The em and rem units are practical in creating perfectly scalable layout!

* Viewport = the browser window size. If the viewport is 50cm wide, 1vw = 0.5cm.

## Box Models

*Content-Box Model (Default)*

The width and height properties includes only content area. It does not include padding, borders and margins. This is the default.

width = content 
height = content

padding ,border, margin are not included in width size.

*Border Box Model*

For the box-sizing property, *padding and border size* are included in an element's width and height size. ( border-box model )

width = content + padding + border
height = content + padding + border

--- To setup border-Box in whole page

```css
* {
  box-sizing: border-box;
}
```

## Height and Width Values (and units)

Value   | Desc
--------|--------------------------------------------------------------
auto    | This is default. The browser calculates the height and width
length  | Defines the height/width in px, cm etc.
%       | Defines the height/width in percent of *the containing block*
initial | Sets the height/width to its default value
inherit | The height/width will be inherited from its parent value

*Example* : Set the height and width of a <div> element:

```css
div {
  height: 200px;
  width: 50%;
  background-color: powderblue;
}
```

## Max Width

The max-width property is used to set the maximum width of an element. (max-genişliğini belirler, ekranda pencere genişlese dahi büyütmez.)

The max-width can be specified in length values, like px, cm, etc., or in percent (%) of the containing block, or set to none (this is default. Means that there is no maximum width).

Note: The value of the max-width property overrides width.

Example
This <div> element has a height of 100 pixels and a max-width of 500 pixels: 

```css

div {
  max-width: 500px;,
  height: 100px;
  background-color: powderblue;
}
```

## All CSS Dimension Properties

```

Property	Description
height	Sets the height of an element
width	Sets the width of an element 
max-height	Sets the maximum height of an element
max-width	Sets the maximum width of an element
min-height	Sets the minimum height of an element
min-width	Sets the minimum width of an element

```


# Color

- Color Names : Tomato,Orange,DodgerBlue

- Background Color   

```css
background-color:DodgerBlue;
```

- Text Color         

```css
color:Tomato;
``` 

- Border Color       

```css
border:2px solid Tomato;
```

🔔  **Color Values**

-Rgb Color         

```css
rgb(255, 99, 71)  /*(0-255 values)*/
```

- Hex Color         

```css
#ff6347 (value syntax RRGGBB)
```
- Hsl

```css
hsl(9, 100%, 64%)
```               

- Rgba

```css
rgba(255, 99, 71, 0.5) (%50 transparent)
```

a: alpha channel : specifies the opacity for a color (value range 0.0-1.0)

- Hsla

```css
hsla(9, 100%, 64%, 0.5)
```               

Example Colors     |

- Red color : rgb(255, 0, 0) , #ff0000

- black : rgb(0,0,0)

- white : rgb (255,255,255)

- 3 Digit Hex Value  

```css
#rgb (Ex. #f0c = #ff00cc )
```

- Hsl : HSL stands for hue, saturation, and lightness.

Syn: hsl(hue, saturation, lightness)

```css
hsl(0, 100%, 50%) /* red */
```

- Saturation

HSLA HSL with alpha channel

🔔 *Extra: Hue Saturation Lightness*

Hue is a degree on the color wheel from 0 to 360. 0 is red, 120 is green, and 240 is blue.

Saturation is a percentage value. 0% means a shade of gray, and 100% is the full color. 

Lightness is also a percentage. 0% is black, 50% is neither light or dark, 100% is white

*Saturation* can be described as the intensity of a color. 100% is pure color, no shades of gray. 50% is 50% gray, but you can still see the color. 0% is completely gray; you can no longer see the color.

*The lightness* of a color can be described as how much light you want to give the color, where 0% means no light (black), 50% means 50% light (neither dark nor light) and 100% means full lightness (white).

Shades of gray are often defined by setting *the hue and saturation* to 0, and adjust the lightness from 0% to 100% to get darker/lighter shades.

You can examples from https://www.w3schools.com/css/css_colors_hsl.asp

# Background

# Flexbox Cheat

- Flexbox Container Style

```css
display : flex;
```

- Flex Container Props

```css
flex-direction : [ row , row-reverse , column ,column-reverse ]
flex-wrap : [ nowrap , wrap , wrap-reverse];
flex-flow : flex-direction , flex-wrap ;  /*sh prop*/ 
```







# Reference Details

## Other Pseudo Classes

```
Selector	Example	       Example description

:active	    a:active	   Selects the active link

:checked	input:checked	Selects every checked <input> element

:disabled	input:disabled	Selects every disabled <input> element

:empty	    p:empty	       Selects every <p> element that has no children

:enabled	input:enabled	Selects every enabled <input> element

:first-child	p:first-child	Selects every <p> elements that is the first child of its parent

:first-of-type	p:first-of-type	Selects every <p> element that is the first <p> element of its parent

:focus	input:focus	Selects the <input> element that has focus

:hover	a:hover	Selects links on mouse over

:in-range	input:in-range	Selects <input> elements with a value within a specified range

:invalid	input:invalid	Selects all <input> elements with an invalid value

:lang(language)	p:lang(it)	Selects every <p> element with a lang attribute value starting with "it"

:last-child	p:last-child	Selects every <p> elements that is the last child of its parent

:last-of-type	p:last-of-type	Selects every <p> element that is the last <p> element of its parent

:link	a:link	Selects all unvisited links

:not(selector)	:not(p)	Selects every element that is not a <p> element

:nth-child(n)	p:nth-child(2)	Selects every <p> element that is the second child of its parent

:nth-last-child(n)	p:nth-last-child(2)	Selects every <p> element that is the second child of its parent, counting from the last child

:nth-last-of-type(n)	p:nth-last-of-type(2)	Selects every <p> element that is the second <p> element of its parent, counting from the last child

:nth-of-type(n)	p:nth-of-type(2)	Selects every <p> element that is the second <p> element of its parent

:only-of-type	p:only-of-type	Selects every <p> element that is the only <p> element of its parent

:only-child	p:only-child	Selects every <p> element that is the only child of its parent

:optional	input:optional	Selects <input> elements with no "required" attribute

:out-of-range	input:out-of-range	Selects <input> elements with a value outside a specified range

:read-only	input:read-only	Selects <input> elements with a "readonly" attribute specified

:read-write	input:read-write	Selects <input> elements with no "readonly" attribute

:required	input:required	Selects <input> elements with a "required" attribute specified

:root	root	Selects the document's root element

:target	#news:target	Selects the current active #news element (clicked on a URL containing that anchor name)

:valid	input:valid	Selects all <input> elements with a valid value

:visited	a:visited	Selects all visited links

```


**CSS Cheatsheet**

- [Selector](#selector)
  - [Simple Selectors](#simple-selectors)
  - [Combinator selectors](#combinator-selectors)
  - [Pseudo-classes](#pseudo-classes)
  - [Pseudo Elements](#pseudo-elements)
  - [Attribute Selectors](#attribute-selectors)
- [Ways to Insert Css](#ways-to-insert-css)
  - [External Css](#external-css)
  - [Internal Css](#internal-css)
  - [Inline Css](#inline-css)
  - [Multiple Style Sheets](#multiple-style-sheets)
  - [Cascading Order](#cascading-order)
- [Comments](#comments)
- [Specifity](#specifity)
- [CSS Element Size](#css-element-size)
  - [Css Units](#css-units)
  - [Absolute Lengths (mutlak ölçüler)](#absolute-lengths-mutlak-ölçüler)
  - [Relative Lengths (Göreceli uzunluklar)](#relative-lengths-göreceli-uzunluklar)
  - [Box Models](#box-models)
    - [Content-Box Model (Default)](#content-box-model-default)
    - [Border Box Model](#border-box-model)
  - [Height and Width Values (and units)](#height-and-width-values-and-units)
  - [Max Width](#max-width)
  - [All CSS Dimension Properties](#all-css-dimension-properties)


# Selector

We can divide CSS selectors into five categories:

* Simple selectors (select elements based on name, id, class)
* Combinator selectors (select elements based on a specific relationship between them) 
* Pseudo-class selectors (select elements based on a certain state)
* Pseudo-elements selectors (select and style a part of an element)
* Attribute selectors (select elements based on an attribute or attribute value)

## Simple Selectors

select elements based on tag, id, class 

* Id Selector :  #para1 

* Class Selector :  .center 

* Universal selector : *

* Grouping Selector : h1,h2,h3

* Class chaining : .footer.center (elements that have footer and center classes,order is not important)

## Combinator selectors  

* Descendant Selector (Nesil Seçici) (space): div p

* Child Selector (>) (Çocuk Seçici) : div > p

* Adjacent Sibling Selector (+) (Takip eden kardeş seçici) : div + p

* General Sibling Selector (~) (Genel kardeş seçici)  : div ~ p


## Pseudo-classes

* The syntax of pseudo-classes:

```css
selector:pseudo-class {
  property: value;
}
```


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


## Pseudo Elements

* The syntax of pseudo-elements:

```css
selector::pseudo-element {
  property: value;
}

```

```text
Selector	Example	Example description
::after	p::after	Insert something after the content of each <p> element
::before	p::before	Insert something before the content of each <p> element
::first-letter	p::first-letter	Selects the first letter of each <p> element
::first-line	p::first-line	Selects the first line of each <p> element
::selection	p::selection	Selects the portion of an element that is selected by a user

```

## Attribute Selectors

Examples


```css
a[target] {
  background-color: yellow;
}
```


```css
a[target="_blank"] {
  background-color: yellow;
}
```

```css
[title~="flower"] {
  border: 5px solid yellow;
}
```


```css
[class|="top"] {
  background: yellow;
}
```



```text
Selector	Example	Example description
[attribute]	[target]	Selects all elements with a target attribute

[attribute=value]	[target=_blank]	Selects all elements with target="_blank"

[attribute~=value]	[title~=flower]	Selects all elements with a title attribute containing the word "flower"

[attribute|=value]	[lang|=en]	Selects all elements with a lang attribute value starting with "en"

[attribute^=value]	a[href^="https"]	Selects every <a> element whose href attribute value begins with "https"

[attribute$=value]	a[href$=".pdf"]	Selects every <a> element whose href attribute value ends with ".pdf"

[attribute*=value]	a[href*="w3schools"]	Selects every <a> element whose href attribute value contains the substring "w3schools"
```


# Ways to Insert Css

* There are three ways of inserting a style sheet:

External CSS

Internal CSS

Inline CS


## External Css

- Html'de head alanına link etiketi ile harici dosyadan yükleme yaparız.

```html

<link rel="stylesheet" href="mystyle.css">
```

## Internal Css

- Head alanında style etiketi içerisine yazarız.

```html
<!DOCTYPE html>
<html>
<head>
<style>
body {
  background-color: linen;
}
</style>
</head>
<body>
</body>
</html>
```

## Inline Css

- Html etiketinin style attribute'na yazabiliriz.

```html
<h1 style="color:blue;text-align:center;">This is a heading</h1>

```

## Multiple Style Sheets

- If some properties have been defined for the same selector (element) in different style sheets, the value from the last read style sheet will be used. 

## Cascading Order
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

# Specifity

- If there are two or more conflicting CSS rules that point to the same element, the browser follows some rules to determine which one is most specific and therefore wins out.

Think of specificity as a score/rank that determines which style declarations are ultimately applied to an element.

The universal selector (*) has low specificity, while ID selectors are highly specific! 

- Specificity Hierarchy
Every selector has its place in the specificity hierarchy. There are four categories which define the specificity level of a selector:

1. Inline styles - An inline style is attached directly to the element to be styled. Example: <h1 style="color: #ffffff;">.

2. IDs - An ID is a unique identifier for the page elements, such as #navbar.

3. Classes, attributes and pseudo-classes - This category includes .classes, [attributes] and pseudo-classes such as :hover, :focus etc.

4. Elements and pseudo-elements - This category includes element names and pseudo-elements, such as h1, div, :before and :after.

**Topics**

- How to Calculate Specifity

- Specifity Rules

# CSS Element Size

## Css Units

- There are two types of length units: absolute and relative.

## Absolute Lengths (mutlak ölçüler)

Absolute length units are not recommended for use on screen, because screen sizes vary so much. However, they can be used if the output medium is known, such as for print layout.

```
cm	centimeters
mm	millimeters
in	   inches (1in = 96px = 2.54cm)
px*	pixels (1px = 1/96th of 1in)
pt	points (1pt = 1/72 of 1in)
pc	picas (1pc = 12 pt)
```


* ! Pixels (px) are relative to the viewing device. For low-dpi devices, 1px is one device pixel (dot) of the display. For printers and high resolution screens 1px implies multiple device pixels.


## Relative Lengths (Göreceli uzunluklar)

Relative length units specify a length relative to another length property. Relative length units scales better between different rendering mediums.

```
em	Relative to the font-size of the element (2em means 2 times the size of the current font)
ex	Relative to the x-height of the current font (rarely used)	
ch	Relative to width of the "0" (zero)
rem	Relative to font-size of the root element	
vw	Relative to 1% of the width of the viewport*	
vh	Relative to 1% of the height of the viewport*	
vmin	Relative to 1% of viewport's* smaller dimension	
vmax	Relative to 1% of viewport's* larger dimension
%	Relative to the parent element (ebeveyn elementin %'si)
```

Tip: The em and rem units are practical in creating perfectly scalable layout!

* Viewport = the browser window size. If the viewport is 50cm wide, 1vw = 0.5cm.

```

Length Unit chro-expl-fire-safa-oper					
em..pc			1.0	3.0	1.0	1.0	3.5  
(em, ex, %, px, cm, mm, in, pt, pc) 
ch				27.0	9.0	1.0	7.0	20.0
rem				4.0	9.0	3.6	4.1	11.6
vh, vw			20.0	9.0	19.0	6.0	20.0
vmin			20.0	12.0	19.0	6.0	20.0
vmax			26.0	16.0	19.0	7.0	20.0

```

## Box Models

### Content-Box Model (Default)

- By default when you set the width and height properties of an element with CSS, you just set the width and height of the content area. To calculate the full size of an element, you must also add padding, borders and margins. (for content-box model)

- By default, the width and height of an element is calculated like this:

width + padding + border = actual width of an element
height + padding + border = actual height of an element

### Border Box Model

- The box-sizing property allows us to include the padding and border in an element's total width and height. ( border-box model )

- To activate Border-Box

```css
* {
  box-sizing: border-box;
}
```

## Height and Width Values (and units)

- height and width are calculated according to box-model (content-box model or border-box model) With border-box model, they include padding and border. With content-box model, they specify only content area. (do not include padding, borders or margins.)

The height and width properties may have the following values:

```

auto - This is default. The browser calculates the height and width
length - Defines the height/width in px, cm etc.
% - Defines the height/width in percent of the containing block
initial - Sets the height/width to its default value
inherit - The height/width will be inherited from its parent value

```

- Example : Set the height and width of a <div> element:

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






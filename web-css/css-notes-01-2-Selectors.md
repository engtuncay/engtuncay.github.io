
- [Selectors](#selectors)
  - [Simple Selectors](#simple-selectors)
    - [Element (Tag) Selector](#element-tag-selector)
    - [Id Selector (#)](#id-selector-)
    - [Class Selector (.)](#class-selector-)
    - [Universal Selector (\*)](#universal-selector-)
    - [Grouping Selector (,)](#grouping-selector-)
  - [Combinators](#combinators)
    - [Descendant Selector (Space) (a b)](#descendant-selector-space-a-b)
    - [Child Selector (\>)](#child-selector-)
    - [Adjacent Sibling Selector (+)](#adjacent-sibling-selector-)
    - [Sibling Selector (~)](#sibling-selector-)
    - [Combining Selector](#combining-selector)
  - [Pseudo-classes](#pseudo-classes)
  - [Pseudo Elements](#pseudo-elements)
  - [Attribute Selector](#attribute-selector)


# Selectors

CSS selectors are used to "find" (or select) the HTML elements you want to style.

We can divide CSS selectors into five categories:

* Simple selectors (select elements based on name, id, class)
* Combinator selectors (select elements based on a specific relationship between them)
* Pseudo-class selectors (select elements based on a certain state)
* Pseudo-elements selectors (select and style a part of an element)
* Attribute selectors (select elements based on an attribute or attribute value)

## Simple Selectors 

* Element (Tag) Selector (tag)
* Id Selector (#)
* Class Selector (.) 
* Grouping Selector (,)
* Universal Selector (*)

### Element (Tag) Selector

```css
/*html-element-name*/ { /*declaration-block*/ }
```

### Id Selector (#)

The id selector uses the id attribute of an HTML element to select a specific element.

The id of an element is unique within a page, so the id selector is used to select one unique element!

To select an element with a specific id, write a hash (#) character, followed by the id of the element.

Example : The CSS rule below will be applied to the HTML element with id="idName": 

```css
#idName {  text-align: center;  color: red; }
```

Note: An id name cannot start with a number!

### Class Selector (.)

We can add class name to html elements. For example, pstyle class assigned to p tag. we can use pstyle class also for other html elements.

```html
<p class='pstyle'>...
```

In this example all HTML elements with class="center" will be red and center-aligned: 

```css
.center { text-align: center;  color: red; }
```

In this example only `<p>` elements with class="center" will be red and center-aligned: 

```css
p.center { text-align: center;  color: red; }
```

HTML elements can also refer to more than one class.

In this example the `<p>` element will be styled according to class="center" and to class="large": 

```css
<p class="center large">This paragraph refers to two classes.</p>
```

Note: A class name cannot start with a number!

### Universal Selector (*)

The CSS rule below will affect every HTML element on the page:

```css
* {  
  text-align: center;  
  color: blue; 
}
```

### Grouping Selector (,)

The grouping selector selects specified elements or selectors to <span style="color:red">give same style definitions</span>. 

(tor:Aynı stil tanımları vereceğiz seçicileri (selectors) gruplamış oluruz.) 

In this example we have grouped the selectors ( h1,h2 and p): 

```css
h1, h2, p { text-align: center;  color: red; }
```

All CSS Simple Selectors

Selector             | Example      | Example description
---------------------|--------------|----------------------------------------------------
`#id`                | `#firstname` | Selects the element with `id="firstname"`
.class               | .intro       | Selects all elements with `class="intro"`
element.class        | p.intro      | Selects only `<p>` elements with `class="intro"`
`*`                  | `*`          | Selects all elements
element              | p            | Selects all `<p>` elements
element, element,... | div, p       | Selects all `<div>` elements and all `<p>` elements


## Combinators

Combinators have five categories.

* Descendant Selector (Space) (a b) (tr:Nesil Seçici) 
* Child Selector (>) (tr:Çocuk Seçici)
* Adjacent Sibling Selector (+) (tr:Takip eden kardeş seçici)
* General Sibling Selector (~) (tr:Genel kardeş seçici)
* Combined Selector (tr:birden fazla özelliğe sahip element seçici) (.a.b) (without space)

(tor:birleştirici,ilişkilendirici)

A combinator is something that explains the relationship between the selectors. 

A CSS selector can contain more than one simple selector. Between the simple selectors, we can include a combinator.

### Descendant Selector (Space) (a b) 

(tor:Nesil Seçici:)

The descendant selector matches all elements that are descendants of a specified element. 

(tor:nesilde gelen ilgili elementin hepsini (çocuk, torun,...) seçer.)

The following example selects all `<p>` elements inside `<div>` elements: 

(tor:Div elements içerisinde bulunan tüm p elemanlarına uygulanır. div neslinden gelen tüm p'ler. )

Example

```css
div p {
  background-color: yellow;
}
```

### Child Selector (>) 

The child selector selects all elements that are the children of a specified element.

(tor:Çocuk Seçici , div>p div oğlu p)

The following example selects all `<p>` elements that are children of a `<div>` element:

Example

```css
div > p {
  background-color: yellow;
}
```

**Torunu da dahil eder mi ?** (???)

Evet dahil eder. yani div>p>p varsa o da dahil olur.

### Adjacent Sibling Selector (+) 

(tor:Takip eden kardeş seçici, div+p : divden sonra gelen kardeş p elementi)

The adjacent sibling selector is used to select an element that is directly after another specific element.

Sibling elements must have the same parent element, and "adjacent" means "immediately following".

The following example selects the first `<p>` element that are placed immediately after `<div>` elements:

Example

```css
div + p {
  background-color: yellow;
}
```

--*LINK -  tbc (rev)

### Sibling Selector (~) 

The sibling selector selects all elements that are siblings of a specified element and comes after it. 

✏ Warn ❗ : (tr:kendinden önce gelenlere uygulamaz, kendinden sonra gelen küçük kardeşlere uygulanır.)

(tor:kardeş seçici - div~p div küçük kardeşi olan tüm p'ler)

The following example selects all `<p>` elements that are siblings of `<div>` elements: 

Example

```css
div ~ p {
  background-color: yellow;
}
```

### Combining Selector

It selects the elements which have all the selectors specified.

hem a ve b sınıfı olan elementleri seçer
It selects all elements which have both a and b classes

```html
<p class="a b">lorem ipsum </p>
<style>
.a.b {
  color: red;
}
</style>
```

**All CSS Combinator Selectors**
Selector            | Example        | Description
--------------------|----------------|--------------------------------------------------------------------------------------------------------------
element element     | div p          | Selects all `<p>` elements inside `<div>` elements (nesil seçici)
element>element     | div > p        | all `<p>` elements where the parent is a `<div>` element (çocuk seçici)
element+element     | div + p        | Selects the first `<p>` element that are placed immediately after `<div>` elements (takip eden kardeş seçici)
element1`~`element2 | p ~ ul         | Selects every `<ul>` element that are preceded by a `<p>` element (genel kardeş seçici)
selector1selector2  | .class1.class2 | Selects all elements which have both class1 and class2 classes


## Pseudo-classes 

A pseudo-class is used to define a special state of an element. 

(tor:Elementin Durum Sınıfları)

(tor:Html elementin özel bir durumuna (state) göre seçmemizi sağlar. Örneğin mouse ile üzerine gelme, tıklanmış link gibi... :)

For example, it can be used to:

- Style an element when a user mouses over it
- Style visited and unvisited links differently
- Style an element when it gets focus

*Syntax*

The syntax of pseudo-classes:

```css
selector:pseudo-class {
  property: value;
}
```

*Anchor Pseudo-classes*

Links can be displayed in different ways:

```css
/* unvisited link */
a:link {
  color: #FF0000;
}

/* visited link */
a:visited {
  color: #00FF00;
}

/* mouse over link */
a:hover {
  color: #FF00FF;
}

/* selected link */
a:active {
  color: #0000FF;
}
```

Note: a:hover MUST come after a:link and a:visited in the CSS definition in order to be *effective*! 

a:active MUST come after a:hover in the CSS definition in order to be *effective*! Pseudo-class names are not case-sensitive.

*Pseudo-classes and CSS Classes*

Pseudo-classes can be combined with CSS classes:

When you hover over the link in the example, it will change color:

Example

```css
a.highlight:hover {
  color: #ff0000;
}
```

*Hover on <div>*

An example of using the :hover pseudo-class on a `<div>` element:

```css
div:hover {
  background-color: blue;
}
```

*Simple Tooltip Hover*

Hover over a `<div>` element to show a `<p>` element (like a tooltip):

(tor:hover olduğunda kendisinin veya combinator ile farklı bir elementin display özelliğini block yaparak gösterilmesini sağlayabiliriz.:)

Example 

```html
<div>Hover over me to show the p element
  <p>Tada! Here I am!</p>
</div>

<style>
p {
  display: none;
  background-color: yellow;
  padding: 20px;
}

div:hover p {
  display: block;
}
</style>
```

*The :first-child Pseudo-class*

The :first-child pseudo-class matches a specified element that is the first child of another element.

*Match the first `<p>` element*

In the following example, the selector matches any `<p>` element that is the first child of any element:

Example

```css
p:first-child {
  color: blue;
}
```

*Match the first `<i>` element in all `<p>` elements*

In the following example, the selector matches the first `<i>` element in all `<p>` elements:

Example

```css
p i:first-child {
  color: blue;
}
```

*Match all `<i>` elements in all first child `<p>` elements*

In the following example, the selector matches all `<i>` elements in `<p>` elements that are the first child of another element:

Example

```css
p:first-child i {
  color: blue;
}
```

*The :lang Pseudo-class*

The :lang pseudo-class allows you to define special rules for different languages.

In the example below, :lang defines the quotation marks for elements with *lang="no"*:

Example

```html
<html>
<head>
<style>
q:lang(no) {
  quotes: "~" "~";
}
</style>
</head>
<body>
  <p>Some text <q lang="no">A quote in a paragraph</q> Some text.</p>
</body>
</html>
```


All CSS Pseudo Classes

Selector             | Example               | Example Desc
---------------------|-----------------------|---------------------------------------------------------------------------------------------------------
:active              | a:active              | Selects the active link
:checked             | input:checked         | Selects every checked `<input>`  element
:disabled            | input:disabled        | Selects every disabled `<input>`  element
:empty               | p:empty               | Selects every `<p>` element that has no children
:enabled             | input:enabled         | Selects every enabled `<input>`  element
:first-child         | p:first-child         | Selects every `<p>` elements that is the first child of its parent
:first-of-type       | p:first-of-type       | Selects every `<p>` element that is the first `<p>` element of its parent
:focus               | input:focus           | Selects the `<input>`  element that has focus
:hover               | a:hover               | Selects links on mouse over
:in-range            | input:in-range        | Selects `<input>`  elements with a value within a specified range
:invalid             | input:invalid         | Selects all `<input>`  elements with an invalid value
:lang(language)      | p:lang(it)            | Selects every `<p>` element with a lang attribute value starting with "it"
:last-child          | p:last-child          | Selects every `<p>` elements that is the last child of its parent
:last-of-type        | p:last-of-type        | Selects every `<p>` element that is the last `<p>` element of its parent
:link                | a:link                | Selects all unvisited links
:not(selector)       | :not(p)               | Selects every element that is not a `<p>` element
:nth-child(n)        | p:nth-child(2)        | Selects every `<p>` element that is the second child of its parent
:nth-last-child(n)   | p:nth-last-child(2)   | Selects every `<p>` element that is the second child of its parent, counting from the last child
:nth-last-of-type(n) | p:nth-last-of-type(2) | Selects every `<p>` element that is the second `<p>` element of its parent, counting from the last child
:nth-of-type(n)      | p:nth-of-type(2)      | Selects every `<p>` element that is the second `<p>` element of its parent
:only-of-type        | p:only-of-type        | Selects every `<p>` element that is the only `<p>` element of its parent
:only-child          | p:only-child          | Selects every `<p>` element that is the only child of its parent
:optional            | input:optional        | Selects `<input>`  elements with no "required" attribute
:out-of-range        | input:out-of-range    | Selects `<input>`  elements with a value outside a specified range
:read-only           | input:read-only       | Selects `<input>`  elements with a "readonly" attribute specified
:read-write          | input:read-write      | Selects `<input>`  elements with no "readonly" attribute
:required            | input:required        | Selects `<input>`  elements with a "required" attribute specified
:root                | root                  | Selects the document's root element
:target              | #news:target          | Selects the current active #news element (clicked on a URL containing that anchor name)
:valid               | input:valid           | Selects all `<input>`  elements with a valid value
:visited             | a:visited             | Selects all visited links


## Pseudo Elements

A CSS pseudo-element is used to style specified parts of an element. 

(tor:Bir elementin belirli bir alanını stillendirmeye kullanılır. Örneğin elementin ilk harfi, ilk satırı ya da elementin öncesine veya sonrasına içerik ekleme )

For example, it can be used to:
- Style the first letter, or line, of an element
- Insert content before, or after, the content of an element

The syntax of pseudo-elements:

```css
selector::pseudo-element {
  property: value;
}
```

*The ::first-line Pseudo-element*

The ::first-line pseudo-element is used to add a special style to the first line of a text.

The following example formats the first line of the text in all `<p>` elements:

Example 

```css
p::first-line {
  color: #ff0000;
  font-variant: small-caps;
}
```

Note: The ::first-line pseudo-element can only be applied to block-level elements.

The following properties apply to the ::first-line pseudo-element:

```
font properties
color properties
background properties
word-spacing
letter-spacing
text-decoration
vertical-align
text-transform
line-height
clear
```

Notice the double colon notation - ::first-line versus :first-line

The double colon replaced the single-colon notation for pseudo-elements in CSS3. This was an attempt from W3C to distinguish between pseudo-classes and pseudo-elements.

The single-colon syntax was used for both pseudo-classes and pseudo-elements in CSS2 and CSS1.

For backward compatibility, the single-colon syntax is acceptable for CSS2 and CSS1 pseudo-elements.

*The ::first-letter Pseudo-element*

The ::first-letter pseudo-element is used to add a special style to the first letter of a text.

The following example formats the first letter of the text in all `<p>` elements: 

Example

```css
p::first-letter {
  color: #ff0000;
  font-size: xx-large;
}
```

Note: The ::first-letter pseudo-element can only be applied to block-level elements.

The following properties apply to the ::first-letter pseudo- element: 

```
font properties
color properties 
background properties
margin properties
padding properties
border properties
text-decoration
vertical-align (only if "float" is "none")
text-transform
line-height
float
clear
```

*Pseudo-elements and CSS Classes*

Pseudo-elements can be combined with CSS classes: 

Example

```css
p.intro::first-letter {
  color: #ff0000;
  font-size: 200%;
}
```

The example above will display the first letter of paragraphs with class="intro", in red and in a larger size.

*Multiple Pseudo-elements*

Several pseudo-elements can also be combined.

In the following example, the first letter of a paragraph will be red, in an xx-large font size. The rest of the first line will be blue, and in small-caps. The rest of the paragraph will be the default font size and color:

Example

```css
p::first-letter {
  color: #ff0000;
  font-size: xx-large;
}


p::first-line {
  color: #0000ff;
  font-variant: small-caps;
}
```

*The ::before Pseudo-element*

The ::before pseudo-element can be used to insert some content before the content of an element.

The following example inserts an image before the content of each `<h1>` element:

Example

```css
h1::before {
  content: url(smiley.gif);
}
```

*The ::after Pseudo-element*

The ::after pseudo-element can be used to insert some content after the content of an element.

The following example inserts an image after the content of each `<h1>` element:

Example

```css
h1::after {
  content: url(smiley.gif);
}
```

*The ::selection Pseudo-element*

The ::selection pseudo-element matches the portion of an element that is selected by a user.

The following CSS properties can be applied to ::selection: color, background, cursor, and outline.

The following example makes the selected text red on a yellow background:
 
Example

```css
::selection {
  color: red;
  background: yellow;
}
```

All CSS Pseudo Elements


Selector       | Example         | Example description
---------------|-----------------|-------------------------------------------------------------
::after        | p::after        | Insert something after the content of each `<p>` element
::before       | p::before       | Insert something before the content of each `<p>` element
::first-letter | p::first-letter | Selects the first letter of each `<p>` element
::first-line   | p::first-line   | Selects the first line of each `<p>` element
::selection    | p::selection    | Selects the portion of an element that is selected by a user

## Attribute Selector

The [attribute] selector is used to select elements with a specified attribute.

The following example selects all `<a>` elements with *a target attribute*:

Example

```css
a[target] {
  background-color: yellow;
}
```

*[attribute="value"] Selector*

The [attribute="value"] selector is used to select elements with a specified attribute and value.

The following example selects all `<a>` elements with a target="_blank" attribute:

Example

```css
a[target="_blank"] {
  background-color: yellow;
}
```

*[attribute~="value"] Selector*

The [attribute~="value"] selector is used to select elements with an attribute value *containing* a specified word.

The following example selects all elements with a title attribute that contains a *space-separated list* of words, one of which is "flower":

(tor:html de title attribute değerini boşlukla ayırarak girilen değerlerden bir tanesi flower ise bu elementi seçer.)

Example

```css
[title~="flower"] {
  border: 5px solid yellow;
}
```

The example above will match elements with title="flower", title="summer flower", and title="flower new", but not title="my-flower" or title="flowers".

*[attribute|="value"] Selector*

The `[attribute|="value"]` selector is used to select elements with the specified attribute starting with the specified value.

The following example selects all elements with a class attribute value that begins with "top":

Note: The value has to be a whole word, either alone, like class="top", or followed by a hyphen( - ), like class="top-text"! 

Example

```css
[class|="top"] {
  background: yellow;
}
```

*`[attribute^="value"]` Selector*

The `[attribute^="value"]` selector is used to select elements whose attribute value *begins with* a specified value.

The following example selects all elements with a class attribute value that begins with "top":

Note: The value does not have to be a whole word! 

```css
[class^="top"] {
  background: yellow;
}

```

*[attribute$="value"] Selector*

The [attribute$="value"] selector is used to select elements whose attribute value ends with a specified value.

The following example selects all elements with a class attribute value that ends with "test":

Note: The value does not have to be a whole word!  

Example

```css
[class$="test"] {
  background: yellow;
}
```

*[attribute*="value"] Selector*

The [attribute*="value"] selector is used to select elements whose attribute value contains a specified value.

The following example selects all elements with a class attribute value that contains "te":

Note: The value does not have to be a whole word!  

Example

```css
[class*="te"] {
  background: yellow;
}

```

*Styling Forms*

The attribute selectors can be useful for styling forms without class or ID:

Example

```css
input[type="text"] {
  width: 150px;
  display: block;
  margin-bottom: 10px;
  background-color: yellow;
}

input[type="button"] {
  width: 120px;
  margin-left: 35px;
  display: block;
}
```

--- Tip: Visit the CSS Forms Tutorial for more examples on how to style forms with CSS. https://www.w3schools.com/css_form.asp

--*LINK - tbc

All CSS Attribute Selectors

```
Selector	Example	Example description
[attribute]	[target]	Selects all elements with a target attribute

[attribute=value]	[target=_blank]	Selects all elements with target="_blank"

[attribute~=value]	[title~=flower]	Selects all elements with a title attribute containing the word "flower"

[attribute|=value]	[lang|=en]	Selects all elements with a lang attribute value starting with "en"

[attribute^=value]	a[href^="https"]	Selects every <a> element whose href attribute value begins with "https"

[attribute$=value]	a[href$=".pdf"]	Selects every <a> element whose href attribute value ends with ".pdf"

[attribute*=value]	a[href*="w3schools"]	Selects every <a> element whose href attribute value contains the substring "w3schools"

```


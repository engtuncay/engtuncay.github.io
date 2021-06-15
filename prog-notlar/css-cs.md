**CSS Cheatsheet**

- [Selector](#selector)
  - [Selector Categories](#selector-categories)
  - [Simple Selectors](#simple-selectors)
  - [Combinator selectors](#combinator-selectors)
  - [Pseudo-classes](#pseudo-classes)
  - [Pseudo Elements](#pseudo-elements)
  - [Attribute Selectors](#attribute-selectors)
- [Ways to Insert Css](#ways-to-insert-css)


# Selector

## Selector Categories

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


```text
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


Selector	Example	Example description


```text
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
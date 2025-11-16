
CSS Introduction

[Back](../readme.md)

---

- [Intro](#intro)
- [CSS Syntax](#css-syntax)
- [How to add CSS](#how-to-add-css)
- [Comments](#comments)
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
- [Cascading Order](#cascading-order)
- [Specifity](#specifity)

*Sources*

- https://www.w3schools.com/css/

# Intro

**What is CSS?**

CSS stands for Cascading Style Sheets

CSS describes how HTML elements are to be displayed on screen, paper, or in other media

CSS saves a lot of work. It can control the layout of multiple web pages all at once

External stylesheets are stored in CSS files

# CSS Syntax

A CSS rule-set consists of a selector and a declaration block.

/*selector*/ { /*declaration-block*/ }

**Example**

In this example all `<p>` elements will be center-aligned, with a red text color:

```css
p {
  color: red;
  text-align: center;
}
```

**Example explained:**

p is a selector in CSS (it points to the HTML element you want to style: `<p>` tag). color is a property, and red is the property value 

The selector points to the HTML element you want to style.

The declaration block contains one or more declarations separated by semicolons.

Each declaration includes a CSS property name and a value, separated by a colon.

Multiple CSS declarations are separated with semicolons, and declaration blocks are surrounded by curly braces.


# How to add CSS

When a browser reads a style sheet, it will format the HTML document according to the information in the style sheet.

*Three Ways to Insert CSS*

There are three ways of inserting a style sheet:

- External CSS
- Internal CSS
- Inline CSS

**External CSS**

With an external style sheet, you can change the look of an entire website by changing just one file!

Example

External styles are defined within the `<link>` element, inside the `<head>` section of an HTML page:

```html
<link rel="stylesheet" href="mystyle.css"> 

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="mystyle.css">
</head>
<body>

<h1>This is a heading</h1>
<p>This is a paragraph.</p>

</body>
</html>
```

An external style sheet can be written in any text editor, and must be saved with a .css extension.

Here is how the "mystyle.css" file looks:

*mystyle.css*

```css
body {
  background-color: lightblue;
}

h1 {
  color: navy;
  margin-left: 20px;
}
```

*Note:* Do not add a space between the property value and the unit (such as margin-left: 20 px;). The correct way is: margin-left: 20px;

**Internal CSS**

An internal style sheet may be used if one single HTML page has a unique style.

The internal style is defined inside the `<style>` element, inside the head section.

Example
Internal styles are defined within the `<style>` element, inside the `<head>` section of an HTML page:

```html
<!DOCTYPE html>
<html>
<head>
<style>
body {
  background-color: linen;
}

h1 {
  color: maroon;
  margin-left: 40px;
}
</style>
</head>
<body>

<h1>This is a heading</h1>
<p>This is a paragraph.</p>

</body>
</html>
```

**Inline CSS**

An inline style may be used to apply a unique style for a single element.

To use inline styles, add the style attribute to the relevant element. The style attribute can contain any CSS property.

*Example*

```html
<!DOCTYPE html>
<html>
<body>

<h1 style="color:blue;text-align:center;">This is a heading</h1>
<p style="color:red;">This is a paragraph.</p>

</body>
</html>
```

*Tip:* An inline style loses many of the advantages of a style sheet (by mixing content with presentation). Use this method sparingly.

**Multiple Style Sheets**

If some properties have been defined for the same selector (element) in different style sheets, the value from the last read style sheet will be used. 

Assume that an external style sheet has the following style for the `<h1>` element:

*mystyle.css*

```css
h1 {
  color: navy;
}
```

Example
If the internal style is defined after the link to the external style sheet, the `<h1>` elements will be "orange":

```html
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<style>
h1 {
  color: orange;
}
</style>
</head>
```

Example

However, if the internal style is defined before the link to the external style sheet, the `<h1>` elements will be "navy": 

```css
<head>
<style>
h1 {
  color: orange;
}
</style>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
```

# Comments

Comments are used to explain the code, and may help when you edit the source code at a later date.

A CSS comment is placed inside the `<style>` element, and starts with /* and ends with */:

```css
/* This is a single-line comment */
p {
  color: red;
}
```

You can add comments wherever you want in the code:

Example

```css
p {
  color: red;  /* Set text color to red */
}
```

Comments can also span multiple lines: 

Example
```css
/* This is
a multi-line
comment */

p {
  color: red;
}
```



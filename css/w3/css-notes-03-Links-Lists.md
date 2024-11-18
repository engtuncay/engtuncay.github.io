
Css Intro 3 (Icons,Links...)

- [Section - Links - Lists](#section---links---lists)
  - [Links](#links)
    - [Text Decoration](#text-decoration)
    - [Background Color](#background-color)
    - [Link Buttons](#link-buttons)
    - [More Examples](#more-examples)
  - [Lists](#lists)

# Section - Links - Lists

##  Links

With CSS, links can be styled in different ways.

🔔 Styling Links

Links can be styled with any CSS property (e.g. color, font-family, background, etc.).

Example

```css
a {
  color: hotpink;
}

```

In addition, links can be styled differently depending on what state they are in.

The four links states are:

- a:link - a normal, unvisited link
- a:visited - a link the user has visited
- a:hover - a link when the user mouses over it
- a:active - a link the moment it is clicked

Example

```css
/* unvisited link */
a:link {
  color: red;
}

/* visited link */
a:visited {
  color: green;
}

/* mouse over link */
a:hover {
  color: hotpink;
}

/* selected link */
a:active {
  color: blue;
}

```

When setting the style for several link states, there are some order rules:

- a:hover MUST come after a:link and a:visited
- a:active MUST come after a:hover

### Text Decoration

The text-decoration property is mostly used to remove underlines from links:

Example

```css
a:link {
  text-decoration: none;
}

a:visited {
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

a:active {
  text-decoration: underline;
}

```

### Background Color

The background-color property can be used to specify a background color for links:

Example

```css
a:link {
  background-color: yellow;
}

a:visited {
  background-color: cyan;
}

a:hover {
  background-color: lightgreen;
}

a:active {
  background-color: hotpink;
}

```

### Link Buttons

This example demonstrates a more advanced example where we combine several CSS properties to display links as boxes/buttons:

Example

```css
a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: red;
}

```

### More Examples

Example

This example demonstrates how to add other styles to hyperlinks:

```css
a.one:link {color: #ff0000;}
a.one:visited {color: #0000ff;}
a.one:hover {color: #ffcc00;}

a.two:link {color: #ff0000;}
a.two:visited {color: #0000ff;}
a.two:hover {font-size: 150%;}

a.three:link {color: #ff0000;}
a.three:visited {color: #0000ff;}
a.three:hover {background: #66ff66;}

a.four:link {color: #ff0000;}
a.four:visited {color: #0000ff;}
a.four:hover {font-family: monospace;}

a.five:link {color: #ff0000; text-decoration: none;}
a.five:visited {color: #0000ff; text-decoration: none;}
a.five:hover {text-decoration: underline;}

```

Example

Another example of how to create link boxes/buttons:

a:link, a:visited {
  background-color: white;
  color: black;
  border: 2px solid green;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: green;
  color: white;
}

Example
This example demonstrates the different types of cursors (can be useful for links):

<span style="cursor: auto">auto</span><br>
<span style="cursor: crosshair">crosshair</span><br>
<span style="cursor: default">default</span><br>
<span style="cursor: e-resize">e-resize</span><br>
<span style="cursor: help">help</span><br>
<span style="cursor: move">move</span><br>
<span style="cursor: n-resize">n-resize</span><br>
<span style="cursor: ne-resize">ne-resize</span><br>
<span style="cursor: nw-resize">nw-resize</span><br>
<span style="cursor: pointer">pointer</span><br>
<span style="cursor: progress">progress</span><br>
<span style="cursor: s-resize">s-resize</span><br>
<span style="cursor: se-resize">se-resize</span><br>
<span style="cursor: sw-resize">sw-resize</span><br>
<span style="cursor: text">text</span><br>
<span style="cursor: w-resize">w-resize</span><br>
<span style="cursor: wait">wait</span>

## Lists

In HTML, there are two main types of lists:

unordered lists (<ul>) - the list items are marked with bullets
ordered lists (<ol>) - the list items are marked with numbers or letters

The CSS list properties allow you to:
Set different list item markers for ordered lists
Set different list item markers for unordered lists
Set an image as the list item marker
Add background colors to lists and list items

Different List Item Markers
The list-style-type property specifies the type of list item marker.

The following example shows some of the available list item markers:

Example
ul.a {
  list-style-type: circle;
}

ul.b {
  list-style-type: square;
}

ol.c {
  list-style-type: upper-roman;
}

ol.d {
  list-style-type: lower-alpha;
}

Note: Some of the values are for unordered lists, and some for ordered lists.

An Image as The List Item Marker

The list-style-image property specifies an image as the list item marker:

Example
ul {
  list-style-image: url('sqpurple.gif');
}

Position The List Item Markers
The list-style-position property specifies the position of the list-item markers (bullet points).

"list-style-position: outside;" means that the bullet points will be outside the list item. The start of each line of a list item will be aligned vertically. This is default:

"list-style-position: inside;" means that the bullet points will be inside the list item. As it is part of the list item, it will be part of the text and push the text at the start:


Example
ul.a {
  list-style-position: outside;
}

ul.b {
  list-style-position: inside;
}

Remove Default Setting
The list-style-type:none property can also be used to remove the markers/bullets. Note that the list also has default margin and padding. To remove this, add margin:0 and padding:0 to <ul> or <ol>:

Example
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

List - Shorthand property
The list-style property is a shorthand property. It is used to set all the list properties in one declaration:

Example
ul {
  list-style: square inside url("sqpurple.gif");
}

When using the shorthand property, the order of the property values are:

list-style-type (if a list-style-image is specified, the value of this property will be displayed if the image for some reason cannot be displayed)
list-style-position (specifies whether the list-item markers should appear inside or outside the content flow)
list-style-image (specifies an image as the list item marker)
If one of the property values above are missing, the default value for the missing property will be inserted, if any.

Styling List With Colors
We can also style lists with colors, to make them look a little more interesting.

Anything added to the <ol> or <ul> tag, affects the entire list, while properties added to the <li> tag will affect the individual list items:

Example
ol {
  background: #ff9999;
  padding: 20px;
}

ul {
  background: #3399ff;
  padding: 20px;
}

ol li {
  background: #ffe5e5;
  padding: 5px;
  margin-left: 35px;
}

ul li {
  background: #cce5ff;
  margin: 5px;
}

More Examples
Customized list with a red left border
This example demonstrates how to create a list with a red left border.

Full-width bordered list
This example demonstrates how to create a bordered list without bullets.

All the different list-item markers for lists
This example demonstrates all the different list-item markers in CSS.

All CSS List Properties
Property	Description
list-style	Sets all the properties for a list in one declaration
list-style-image	Specifies an image as the list-item marker
list-style-position	Specifies the position of the list-item markers (bullet points)
list-style-type	Specifies the type o


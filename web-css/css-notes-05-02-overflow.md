
- [Overflow Property](#overflow-property)
  - [overflow: visible](#overflow-visible)
  - [overflow: hidden](#overflow-hidden)
  - [overflow: scroll](#overflow-scroll)
  - [overflow: auto](#overflow-auto)
  - [overflow-x and overflow-y](#overflow-x-and-overflow-y)
  - [All Overflow Properties](#all-overflow-properties)
- [Align](#align)
  - [Center Align Elements](#center-align-elements)
  - [Center Align Text](#center-align-text)
  - [Center an Image](#center-an-image)
  - [Left and Right Align - Using position](#left-and-right-align---using-position)
  - [Left and Right Align - Using float](#left-and-right-align---using-float)
  - [Center Vertically - Using padding](#center-vertically---using-padding)
  - [Center Vertically - Using line-height](#center-vertically---using-line-height)
  - [Center Vertically - Using position and transform](#center-vertically---using-position-and-transform)
  - [Center Vertically - Using Flexbox](#center-vertically---using-flexbox)
- [Float and Clear](#float-and-clear)


## Overflow Property

The CSS overflow property controls what happens to content that is too big to fit into an area.

The overflow property specifies whether to clip the content or to add scrollbars when the content of an element is too big to fit in the specified area.

The overflow property has the following values:

- visible - Default. The overflow is not clipped. The content renders outside the element's box
- hidden - The overflow is clipped, and the rest of the content will be invisible
- scroll - The overflow is clipped, and a scrollbar is added to see the rest of the content
- auto - Similar to scroll, but it adds scrollbars only when necessary

**Note !!!** 

The overflow property only works for *block elements with a specified height*.

**Note** 

In OS X Lion (on Mac), scrollbars are hidden by default and only shown when being used (even though "overflow:scroll" is set).

### overflow: visible

By default, the overflow is visible, meaning that it is not clipped and it renders outside the element's box:

*Example*

```css
div {
  width: 200px;
  height: 50px;
  background-color: #eee;
  overflow: visible;
}
```

### overflow: hidden

With the hidden value, the overflow is clipped, and the rest of the content is hidden:  

((taşan yer kırpılır, içeriğin sonrası gizlenir.)) 

Example

```css
div {
  overflow: hidden;
}
```

### overflow: scroll

Setting the value to scroll, the overflow is clipped and a scrollbar is added to scroll inside the box. Note that this will add a scrollbar both horizontally and vertically (even if you do not need it):

Example

```css
div {
  overflow: scroll;
}
```

### overflow: auto

The auto value is similar to scroll, but it adds scrollbars only when necessary:

*Example*

```css
div {
  overflow: auto;
}
```

### overflow-x and overflow-y

The overflow-x and overflow-y properties specifies whether to change the overflow of content just horizontally or vertically (or both):

overflow-x specifies what to do with the left/right edges of the content.

overflow-y specifies what to do with the top/bottom edges of the content.

*Example*

```css
div {
  overflow-x: hidden; /* Hide horizontal scrollbar */
  overflow-y: scroll; /* Add vertical scrollbar */
}
```

### All Overflow Properties

Property   | Description
-----------|---------------------------------------------------------------------------------------------------------
overflow   | Specifies what happens if content overflows an element's box
overflow-x | Specifies what to do with the left/right edges of the content if it overflows the element's content area
overflow-y | Specifies what to do with the top/bottom edges of the content if it overflows the element's content area

---

## Align

### Center Align Elements

To horizontally center a block element (like `<div>`), use `margin: auto;`. Setting the width of the element will prevent it from stretching out to the edges of its container. The element will then take up the specified width, and the remaining space will be split equally between the two margins.

*Example*

```css
.center {
  margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
}
```

**Note:!!!** 

Center aligning has no effect if the width property is not set (or set to 100%).

### Center Align Text

To just center the text inside an element, use `text-align: center;`

*Example*

```css
.center {
  text-align: center;
  border: 3px solid green;
}
```

**Tip:** 

For more examples on how to align text, see the CSS Text chapter. https://www.w3schools.com/css_text.asp

### Center an Image

To center an image, set left and right margin to auto and make it into a block element.

*Example*

```css
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 40%;
}
```

### Left and Right Align - Using position

One method for aligning elements is to use position: absolute;:

*Example*

```css
.right {
  position: absolute;
  right: 0px;
  width: 300px;
  border: 3px solid #73AD21;
  padding: 10px;
}
```

(tor:right 0 dediğimiz için sağ ile boşluğunu 0 yapar ve sağa yaslanmış olur.)

**Note:!!!** 

Absolute positioned elements are removed from the normal flow, and can overlap elements.

### Left and Right Align - Using float

Another method for aligning elements is to use the float property.

*Example*

```css
.right {
  float: right;
  width: 300px;
  border: 3px solid #73AD21;
  padding: 10px;
}
```

**Note:!!!** 

If an element is taller than the element containing it, and it is floated, it will overflow outside of its container. You can use the "clearfix" hack to fix this (see example below).

**The clearfix Hack**

Then we can add `overflow: auto;` to the containing element to fix this problem:

Example

```css
.clearfix {
  overflow: auto;
}
```

### Center Vertically - Using padding

There are many ways to center an element vertically in CSS. A simple solution is to use top and bottom padding:

*Example*

```css
.center {
  padding: 70px 0;
  border: 3px solid green;
}
```

- To center both vertically and horizontally, use padding and text-align: center:

*Example*

```css
.center {
  padding: 70px 0;
  border: 3px solid green;
  text-align: center;
}
```

### Center Vertically - Using line-height

Another trick is to use the line-height property with a value that is equal to the height property:

*Example*

```css
.center {
  line-height: 200px;
  height: 200px;
  border: 3px solid green;
  text-align: center;
}

/* If the text has multiple lines, add the following: */
.center p {
  line-height: 1.5;
  display: inline-block;
  vertical-align: middle;
}
```

### Center Vertically - Using position and transform

If padding and line-height are not options, another solution is to use positioning and the transform property:

Example

```css
.center {
  height: 200px;
  position: relative;
  border: 3px solid green;
}

.center p {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
```

*Tip:* You will learn more about the transform property in our 2D Transforms Chapter.

### Center Vertically - Using Flexbox

You can also use flexbox to center things.

*Example*

```css
.center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 200px;
  border: 3px solid green;
}
```

Tip: You will learn more about Flexbox in our CSS Flexbox Chapter.

## Float and Clear

The CSS float property specifies how an element should float.

The CSS clear property specifies what elements can float beside the cleared element and on which side.

**The float Property**

The float property is used for positioning and formatting content e.g. let an image float left to the text in a container.

The float property can have one of the following values:

* left - The element floats to the left of its container
* right - The element floats to the right of its container
* none - The element does not float (will be displayed just where it occurs in the text). This is default
* inherit - The element inherits the float value of its parent

In its simplest use, the float property can be used to wrap text around images.

**Example - float: right;**

The following example specifies that an image should float to the right in a text:

```css
img {
  float: right;
}
```

**Example - No float**

In the following example the image will be displayed just where it occurs in the text (float: none;):

*Example*

```css
img {
  float: none;
}
```

**Example - Float Next To Each Other**

Normally div elements will be displayed on top of each other. However, if we use float: left we can let elements float next to each other:

Example

```css
div {
  float: left;
  padding: 15px;
}

.div1 {
  background: red;
}

.div2 {
  background: yellow;
}

.div3 {
  background: green;
}

```


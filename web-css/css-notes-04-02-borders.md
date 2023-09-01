
- [Borders](#borders)
  - [CSS Border Style](#css-border-style)
  - [CSS Border Width](#css-border-width)
  - [CSS Border - Shorthand Property](#css-border---shorthand-property)
  - [CSS Rounded Borders](#css-rounded-borders)
  - [All CSS Border Properties](#all-css-border-properties)
- [Margin](#margin)
  - [Margin - Individual Sides](#margin---individual-sides)
  - [Margin - Shorthand Property](#margin---shorthand-property)
- [Padding](#padding)
  - [Padding - Individual Sides](#padding---individual-sides)
  - [Padding - Shorthand Property](#padding---shorthand-property)
  - [Padding and Element Width](#padding-and-element-width)
  - [All CSS Padding Properties](#all-css-padding-properties)
- [CSS Outline](#css-outline)
  - [CSS Outline Style](#css-outline-style)
  - [CSS Outline Width](#css-outline-width)
  - [CSS Outline Width](#css-outline-width-1)
  - [CSS Outline - Shorthand property](#css-outline---shorthand-property)
- [User Interface (Resizing)](#user-interface-resizing)
  - [CSS User Interface](#css-user-interface)
  - [CSS Resizing](#css-resizing)
  - [CSS Outline Offset](#css-outline-offset)
  - [CSS User Interface Properties](#css-user-interface-properties)


# Borders

The CSS border properties allow you to specify the style, width, and color of an element's border.

## CSS Border Style

The border-style property specifies what kind of border to display.

The following values are allowed:

```text
dotted - Defines a dotted border
dashed - Defines a dashed border
solid - Defines a solid border
double - Defines a double border
groove - Defines a 3D grooved border. The effect depends on the border-color value
ridge - Defines a 3D ridged border. The effect depends on the border-color value
inset - Defines a 3D inset border. The effect depends on the border-color value
outset - Defines a 3D outset border. The effect depends on the border-color value
none - Defines no border
hidden - Defines a hidden border
```

The border-style property can have from one to four values (for the top border, right border, bottom border, and the left border).

Example

Demonstration of the different border styles:

```css
p.dotted {border-style: dotted;}
p.dashed {border-style: dashed;}
p.solid {border-style: solid;}
p.double {border-style: double;}
p.groove {border-style: groove;}
p.ridge {border-style: ridge;}
p.inset {border-style: inset;}
p.outset {border-style: outset;}
p.none {border-style: none;}
p.hidden {border-style: hidden;}
p.mix {border-style: dotted dashed solid double;}

```

Note: None of the OTHER CSS border properties (which you will learn more about in the next chapters) will have ANY effect unless the border-style property is set!

## CSS Border Width

The border-width property specifies the width of the four borders.

The width can be set as a specific size (in px, pt, cm, em, etc) or by using one of the three pre-defined values: thin, medium, or thick:

Example

Demonstration of the different border widths:

```css
p.one {
  border-style: solid;
  border-width: 5px;
}

p.two {
  border-style: solid;
  border-width: medium;
}

p.three {
  border-style: dotted;
  border-width: 2px;
}

p.four {
  border-style: dotted;
  border-width: thick;
}

```

**Specific Side Widths**

The border-width property can have from one to four values (for the top border, right border, bottom border, and the left border):

Example

```css
p.one {
  border-style: solid;
  border-width: 5px 20px; /* 5px top and bottom, 20px on the sides */
}

p.two {
  border-style: solid;
  border-width: 20px 5px; /* 20px top and bottom, 5px on the sides */
}

p.three {
  border-style: solid;
  border-width: 25px 10px 4px 35px; /* 25px top, 10px right, 4px bottom and 35px left */
}
```

**CSS Border Color**

The border-color property is used to set the color of the four borders.

The color can be set by:

name - specify a color name, like "red"
HEX - specify a HEX value, like "#ff0000"
RGB - specify a RGB value, like "rgb(255,0,0)"
HSL - specify a HSL value, like "hsl(0, 100%, 50%)"

transparent

Note: If border-color is not set, it inherits the color of the element.

*Example*

Demonstration of the different border colors:

```css
p.one {
  border-style: solid;
  border-color: red;
}

p.two {
  border-style: solid;
  border-color: green;
}

p.three {
  border-style: dotted;
  border-color: blue;
}

```

**Specific Side Colors**

The border-color property can have from one to four values (for the top border, right border, bottom border, and the left border). 

*Example*

```css
p.one {
  border-style: solid;
  border-color: red green blue yellow; /* red top, green right, blue bottom and yellow left */
}

```

**HEX Values**

The color of the border can also be specified using a hexadecimal value (HEX):

Example

```css
p.one {
  border-style: solid;
  border-color: #ff0000; /* red */
}

```

**RGB Values**

Or by using RGB values:

Example

```css
p.one {
  border-style: solid;
  border-color: rgb(255, 0, 0); /* red */
}

```

**HSL Values**

You can also use HSL values:

Example

```css
p.one {
  border-style: solid;
  border-color: hsl(0, 100%, 50%); /* red */
}
```

You can learn more about HEX, RGB and HSL values in our CSS Colors chapters.

*CSS Border - Individual Sides*

From the examples on the previous pages, you have seen that it is possible to specify a different border for each side.

In CSS, there are also properties for specifying each of the borders (top, right, bottom, and left):

Example

```css
p {
  border-top-style: dotted;
  border-right-style: solid;
  border-bottom-style: dotted;
  border-left-style: solid;
}

```

The example above gives the same result as this:

Example

```css
p {
  border-style: dotted solid;
}

```

So, here is how it works:

If the border-style property has four values:

border-style: dotted solid double dashed;

top border is dotted
right border is solid
bottom border is double
left border is dashed

If the border-style property has three values:

border-style: dotted solid double;

top border is dotted
right and left borders are solid
bottom border is double

If the border-style property has two values:

border-style: dotted solid;

top and bottom borders are dotted, right and left borders are solid.

If the border-style property has one value:

```css
/* all four borders are dotted */
border-style: dotted;
```

*Example*

```css
/* Four values */
p {
  border-style: dotted solid double dashed;
}

/* Three values */
p {
  border-style: dotted solid double;
}

/* Two values */
p {
  border-style: dotted solid;
}

/* One value */
p {
  border-style: dotted;
}

```

The border-style property is used in the example above. However, it also works with border-width and border-color.

## CSS Border - Shorthand Property

Like you saw in the previous page, there are many properties to consider when dealing with borders.

To shorten the code, it is also possible to specify all the individual border properties in one property.

The border property is a shorthand property for the following individual border properties:

border-width
border-style (required)
border-color

Example

```css
p {
  border: 5px solid red;
}

```
You can also specify all the individual border properties for just one side:

Left Border

```css
p {
  border-left: 6px solid red;
  background-color: lightgrey;
}

```

Bottom Border

```css
p {
  border-bottom: 6px solid red;
  background-color: lightgrey;
}

```

## CSS Rounded Borders

The border-radius property is used to add rounded borders to an element:

Example

```css
p {
  border: 2px solid red;
  border-radius: 5px;
}

```

*More Examples*

- All the top border properties in one declaration
- Set the style of the bottom border
- Set the width of the left border
- Set the color of the four borders
- Set the color of the right border

## All CSS Border Properties

```text
Property	Description

border	Sets all the border properties in one declaration

border--[top|bottom|left|right]	Sets all the bottom/top/left/right border properties in one declaration
border-[top|bottom|left|right]-color	Sets the color of the top/bottom/left/right border
border-[top|bottom|left|right]-style	Sets the style of the bottom border
border-[top|bottom|left|right]-width	Sets the width of the bottom border

border-color	Sets the color of the four borders
border-radius	Sets all the four border-*-radius properties for rounded corners
border-style	Sets the style of the four borders
border-width	Sets the width of the four borders

```

# Margin

The CSS margin properties are used to create space around elements, outside of any defined borders

## Margin - Individual Sides

CSS has properties for specifying the margin for each side of an element:

- margin-top
- margin-right
- margin-bottom
- margin-left

All the margin properties can have the following values:

* auto - the browser calculates the margin
* length - specifies a margin in px, pt, cm, etc.
* % - specifies a margin in % of the width of the containing element
* inherit - specifies that the margin should be inherited from the parent element

Tip: Negative values are allowed.

Example

Set different margins for all four sides of a <p> element:

```css
p {
  margin-top: 100px;
  margin-bottom: 100px;
  margin-right: 150px;
  margin-left: 80px;
}

```

## Margin - Shorthand Property

To shorten the code, it is possible to specify all the margin properties in one property.

The margin property is a shorthand property for the following individual margin properties:

margin-top
margin-right
margin-bottom
margin-left

So, here is how it works:

If the margin property has four values:

margin: 25px 50px 75px 100px;
top margin is 25px
right margin is 50px
bottom margin is 75px
left margin is 100px

If the margin property has three values:

margin: 25px 50px 75px;
top margin is 25px
right and left margins are 50px
bottom margin is 75px

If the margin property has two values:

margin: 25px 50px;
top and bottom margins are 25px
right and left margins are 50px

If the margin property has one value:

margin: 25px;
all four margins are 25px

The auto Value
You can set the margin property to auto to horizontally center the element within its container.

The element will then take up the specified width, and the remaining space will be split equally between the left and right margins.

Example
Use margin: auto:

div {
  width: 300px;
  margin: auto;
  border: 1px solid red;
}

The inherit Value
This example lets the left margin of the <p class="ex1"> element be inherited from the parent element (<div>):

Example
Use of the inherit value:

div {
  border: 1px solid red;
  margin-left: 100px;
}

p.ex1 {
  margin-left: inherit;
}

Margin Collapse

Top and bottom margins of elements are sometimes collapsed into a single margin that is equal to the largest of the two margins.

This does not happen on left and right margins! Only top and bottom margins!

Look at the following example:

Example
Demonstration of margin collapse:

h1 {
  margin: 0 0 50px 0;
}

h2 {
  margin: 20px 0 0 0;
}

In the example above, the <h1> element has a bottom margin of 50px and the <h2> element has a top margin set to 20px.

Common sense would seem to suggest that the vertical margin between the <h1> and the <h2> would be a total of 70px (50px + 20px). But due to margin collapse, the actual margin ends up being 50px.


# Padding

Padding is used to create space around an element's content, inside of any defined borders.

The CSS padding properties are used to generate space around an element's content, inside of any defined borders.

With CSS, you have full control over the padding. There are properties for setting the padding for each side of an element (top, right, bottom, and left).

## Padding - Individual Sides

CSS has properties for specifying the padding for each side of an element:

* padding-top
* padding-right
* padding-bottom
* padding-left

All the padding properties can have the following values:

* length - specifies a padding in px, pt, cm, etc.
* % - specifies a padding in % of the width of the containing element
* inherit - specifies that the padding should be inherited from the parent element

Note: Negative values are not allowed.

*Example*

Set different padding for all four sides of a <div> element:  

```css
div {
  padding-top: 50px;
  padding-right: 30px;
  padding-bottom: 50px;
  padding-left: 80px;
}

```

## Padding - Shorthand Property

To shorten the code, it is possible to specify all the padding properties in one property.

The padding property is a shorthand property for the following individual padding properties:

* padding-top
* padding-right
* padding-bottom
* padding-left

So, here is how it works:

If the padding property has four values:

padding: 25px 50px 75px 100px;

top padding is 25px
right padding is 50px
bottom padding is 75px
left padding is 100px

*Example*

Use the padding shorthand property with four values:

```css
div {
  padding: 25px 50px 75px 100px;
}
```

If the padding property has three values:

padding: 25px 50px 75px;

top padding is 25px, right and left paddings are 50px, bottom padding is 75px.

Example

Use the padding shorthand property with three values: 

```css
div {
  padding: 25px 50px 75px;
}

```

If the padding property has two values:

padding: 25px 50px;

top and bottom paddings are 25px, right and left paddings are 50px

*Example*

Use the padding shorthand property with two values: 

```css
div {
  padding: 25px 50px;
}

```

If the padding property has one value:

padding: 25px;

all four paddings are 25px

*Example*

Use the padding shorthand property with one value: 

```css
div {
  padding: 25px;
}

```

## Padding and Element Width

The CSS width property specifies the width of the element's content area. The content area is the portion inside the padding, border, and margin of an element (the box model).

So, if an element has a specified width, the padding added to that element will be added to the total width of the element. This is often an undesirable result.

*Example*

Here, the `<div>` element is given a width of 300px. However, the actual width of the `<div>` element will be 350px (300px + 25px of left padding + 25px of right padding):

```css
div {
  width: 300px;
  padding: 25px;
}

```

To keep the width at 300px, no matter the amount of padding, you can use the box-sizing property. This causes the element to maintain its width; if you increase the padding, the available content space will decrease.

Example

Use the box-sizing property to keep the width at 300px, no matter the amount of padding:

```css
div {
  width: 300px;
  padding: 25px;
  box-sizing: border-box;
}

```

## All CSS Padding Properties

Property	Description

padding	A shorthand property for setting all the padding properties in one declaration
padding-bottom	Sets the bottom padding of an element
padding-left	Sets the left padding of an element
padding-right	Sets the right padding of an element
padding-top	Sets the top padding of an element

# CSS Outline

An outline is a line drawn outside the element's border to make the element "stand out".

CSS has the following outline properties:

- outline-style
- outline-color
- outline-width
- outline-offset

Note: Outline differs from borders! Unlike border, the outline is drawn outside the element's border, and may overlap other content. Also, the outline is NOT a part of the element's dimensions; the element's total width and height is not affected by the width of the outline.

## CSS Outline Style

The outline-style property specifies the style of the outline, and can have one of the following values:

```text
dotted - Defines a dotted outline
dashed - Defines a dashed outline
solid - Defines a solid outline
double - Defines a double outline
groove - Defines a 3D grooved outline
ridge - Defines a 3D ridged outline
inset - Defines a 3D inset outline
outset - Defines a 3D outset outline
none - Defines no outline
hidden - Defines a hidden outline
The following example shows the different outline-style values:
```

Example

Demonstration of the different outline styles:

```css
p.dotted {outline-style: dotted;}
p.dashed {outline-style: dashed;}
p.solid {outline-style: solid;}
p.double {outline-style: double;}
p.groove {outline-style: groove;}
p.ridge {outline-style: ridge;}
p.inset {outline-style: inset;}
p.outset {outline-style: outset;}
```

Note: None of the other outline properties (which you will learn more about in the next chapters) will have ANY effect unless the outline-style property is set!

## CSS Outline Width

The outline-width property specifies the width of the outline, and can have one of the following values:

- thin (typically 1px)
- medium (typically 3px)
- thick (typically 5px)
- A specific size (in px, pt, cm, em, etc)

The following example shows some outlines with different widths:

*Example*

```css
p.ex1 {
  border: 1px solid black;
  outline-style: solid;
  outline-color: red;
  outline-width: thin;
}

p.ex2 {
  border: 1px solid black;
  outline-style: solid;
  outline-color: red;
  outline-width: medium;
}

p.ex3 {
  border: 1px solid black;
  outline-style: solid;
  outline-color: red;
  outline-width: thick;
}

p.ex4 {
  border: 1px solid black;
  outline-style: solid;
  outline-color: red;
  outline-width: 4px;
}
```


## CSS Outline Width

The outline-width property specifies the width of the outline, and can have one of the following values:

- thin (typically 1px)
- medium (typically 3px)
- thick (typically 5px)

A specific size (in px, pt, cm, em, etc)

The following example shows some outlines with different widths:
Example

```css
p.ex1 {
  border: 1px solid black;
  outline-style: solid;
  outline-color: red;
  outline-width: thin;
}

p.ex2 {
  border: 1px solid black;
  outline-style: solid;
  outline-color: red;
  outline-width: medium;
}

p.ex3 {
  border: 1px solid black;
  outline-style: solid;
  outline-color: red;
  outline-width: thick;
}

p.ex4 {
  border: 1px solid black;
  outline-style: solid;
  outline-color: red;
  outline-width: 4px;
}

```

## CSS Outline - Shorthand property

The outline property is a shorthand property for setting the following individual outline properties:

outline-width
outline-style (required)
outline-color
The outline property is specified as one, two, or three values from the list above. The order of the values does not matter.

The following example shows some outlines specified with the shorthand outline property:
Example
p.ex1 {outline: dashed;}
p.ex2 {outline: dotted red;}
p.ex3 {outline: 5px solid yellow;}
p.ex4 {outline: thick ridge pink;}

CSS Outline Offset

The outline-offset property adds space between an outline and the edge/border of an element. The space between an element and its outline is transparent.

The following example specifies an outline 15px outside the border edge:
Example
p {
  margin: 30px;
  border: 1px solid black;
  outline: 1px solid red;
  outline-offset: 15px;
}

The following example shows that the space between an element and its outline is transparent:
Example
p {
  margin: 30px;
  background: yellow;
  border: 1px solid black;
  outline: 1px solid red;
  outline-offset: 15px;
}

All CSS Outline Properties

Property	Description
outline	A shorthand property for setting outline-width, outline-style, and outline-color in one declaration
outline-color	Sets the color of an outline
outline-offset	Specifies the space between an outline and the edge or border of an element
outline-style	Sets the style of an outline
outline-width	Sets the width of an outline


# User Interface (Resizing)

## CSS User Interface

In this chapter you will learn about the following CSS user interface properties:

* resize
* outline-offset

## CSS Resizing

The resize property specifies if (and how) an element should be resizable by the user.

The following example lets the user resize only the width of a <div> element:

Example

```css
div {
  resize: horizontal;
  overflow: auto;
}

```

The following example lets the user resize only the height of a <div> element:

Example

```css
div {
  resize: vertical;
  overflow: auto;
}

```

The following example lets the user resize both the height and width of a <div> element:

Example

```css
div {
  resize: both;
  overflow: auto;
}

```

In many browsers, <textarea> is resizable by default. Here, we have used the resize property to disable the resizability:

Example

```css
textarea {
  resize: none;
}

```

## CSS Outline Offset

The outline-offset property adds space between an outline and the edge or border of an element.
Note: Outline differs from borders! Unlike border, the outline is drawn outside the element's border, and may overlap other content. Also, the outline is NOT a part of the element's dimensions; the element's total width and height is not affected by the width of the outline.

The following example uses the outline-offset property to add space between the border and the outline:

Example

```css
div.ex1 {
  margin: 20px;
  border: 1px solid black;
  outline: 4px solid red;
  outline-offset: 15px;
}

div.ex2 {
  margin: 10px;
  border: 1px solid black;
  outline: 5px dashed blue;
  outline-offset: 5px;
}

```

## CSS User Interface Properties

The following table lists all the user interface properties:

Property	Description

outline-offset	Adds space between an outline and the edge or border of an element
resize	Specifies whether or not an element is resizable by the user

 



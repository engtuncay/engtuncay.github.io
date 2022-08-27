
- [Colors](#colors)
  - [CSS Color Names](#css-color-names)
  - [CSS Background Color](#css-background-color)
  - [CSS Text Color](#css-text-color)
  - [CSS Border Color](#css-border-color)
  - [CSS Color Values](#css-color-values)
  - [RGB](#rgb)
  - [Hex Colors](#hex-colors)
  - [HSL](#hsl)
  - [Backgrounds](#backgrounds)
  - [CSS background-image](#css-background-image)
  - [CSS background-repeat](#css-background-repeat)
  - [CSS background-attachment](#css-background-attachment)
  - [CSS background - Shorthand property](#css-background---shorthand-property)
- [Text](#text)
  - [Text Color](#text-color)
  - [Text Alignment](#text-alignment)
  - [](#)
  - [Text Transformation](#text-transformation)
  - [Text Indentation](#text-indentation)
  - [Text Shadow](#text-shadow)
- [Fonts](#fonts)
  - [Fonts](#fonts-1)
  - [CSS Web Safe Fonts](#css-web-safe-fonts)
  - [Opacity / Transparency (Opaklık / Şeffaflık )](#opacity--transparency-opaklık--şeffaflık-)


# Colors

Source : https://www.w3schools.com/css/css_colors.asp

Colors are specified using predefined color names, or RGB, HEX, HSL, RGBA, HSLA values.

## CSS Color Names

In CSS, a color can be specified by using a predefined color name:

Tomato
Orange
DodgerBlue
MediumSeaGreen
Gray
SlateBlue
Violet
LightGray

CSS/HTML support 140 standard color names.

https://www.w3schools.com/colors/colors_names.asp

## CSS Background Color

You can set the background color for HTML elements:

Example

<h1 style="background-color:DodgerBlue;">Hello World</h1>
<p style="background-color:Tomato;">Lorem ipsum...</p>

## CSS Text Color

You can set the color of text:

Example

<h1 style="color:Tomato;">Hello World</h1>
<p style="color:DodgerBlue;">Lorem ipsum...</p>
<p style="color:MediumSeaGreen;">Ut wisi enim...</p>

## CSS Border Color

You can set the color of borders:

Example

<h1 style="border:2px solid Tomato;">Hello World</h1>
<h1 style="border:2px solid DodgerBlue;">Hello World</h1>
<h1 style="border:2px solid Violet;">Hello World</h1>

## CSS Color Values

In CSS, colors can also be specified using RGB values, HEX values, HSL values, RGBA values, and HSLA values:

Same as color name "Tomato":

```css
rgb(255, 99, 71)
#ff6347
hsl(9, 100%, 64%)
```

Same as color name "Tomato", but 50% transparent:

```css
rgba(255, 99, 71, 0.5)
hsla(9, 100%, 64%, 0.5)
```

Example

Same as color name "Tomato":

<h1 style="background-color:rgb(255, 99, 71);">...</h1>
<h1 style="background-color:#ff6347;">...</h1>
<h1 style="background-color:hsl(9, 100%, 64%);">...</h1>

Same as color name "Tomato", but 50% transparent:

<h1 style="background-color:rgba(255, 99, 71, 0.5);">...</h1>
<h1 style="background-color:hsla(9, 100%, 64%, 0.5);">...</h1>


Learn more about Color Values

You will learn more about RGB, HEX and HSL in the next chapters.

## RGB

An RGB color value represents RED, GREEN, and BLUE light sources.

**RGB Value**

In CSS, a color can be specified as an RGB value, using this formula:

rgb(red, green, blue)

Each parameter (red, green, and blue) defines the intensity of the color between 0 and 255.

For example, rgb(255, 0, 0) is displayed as red, because red is set to its highest value (255) and the others are set to 0.

To display black, set all color parameters to 0, like this: rgb(0, 0, 0).

To display white, set all color parameters to 255, like this: rgb(255, 255, 255).

Shades of gray are often defined using equal values for all the 3 light sources: 

**RGBA Value**

RGBA color values are an extension of RGB color values with an alpha channel - which specifies the opacity for a color.

An RGBA color value is specified with:

rgba(red, green, blue, alpha)

The alpha parameter is a number between 0.0 (fully transparent) and 1.0 (not transparent at all):

![](./img/css/rgba.jpg)

## Hex Colors

A hexadecimal color is specified with: #RRGGBB, where the RR (red), GG (green) and BB (blue) hexadecimal integers specify the components of the color.

HEX Value
In CSS, a color can be specified using a hexadecimal value in the form:

#rrggbb

Where rr (red), gg (green) and bb (blue) are hexadecimal values between 00 and ff (same as decimal 0-255).

For example, #ff0000 is displayed as red, because red is set to its highest value (ff) and the others are set to the lowest value (00).

Examples





**3 Digit HEX Value**

Sometimes you will see a 3-digit hex code in the CSS source.

The 3-digit hex code is a shorthand for some 6-digit hex codes.

The 3-digit hex code has the following form:

#rgb

Where r, g, and b represents the red, green, and blue components with values between 0 and f.

The 3-digit hex code can only be used when both the values (RR, GG, and BB) are the same for each components. So, if we have #ff00cc, it can be written like this: #f0c.

Here is an example:

Example

```html
body {
  background-color: #fc9; /* same as #ffcc99 */
}

h1 {
  color: #f0f; /* same as #ff00ff */
}

p {
  color: #b58; /* same as #bb5588 */
}
```

## HSL

A hexadecimal color is specified with: #RRGGBB, where the RR (red), GG (green) and BB (blue) hexadecimal integers specify the components of the color.

**HEX Value**

In CSS, a color can be specified using a hexadecimal value in the form:

#rrggbb

Where rr (red), gg (green) and bb (blue) are hexadecimal values between 00 and ff (same as decimal 0-255).

For example, #ff0000 is displayed as red, because red is set to its highest value (ff) and the others are set to the lowest value (00).

Examples



**3 Digit HEX Value**

Sometimes you will see a 3-digit hex code in the CSS source.

The 3-digit hex code is a shorthand for some 6-digit hex codes.

The 3-digit hex code has the following form:

#rgb

Where r, g, and b represents the red, green, and blue components with values between 0 and f.

The 3-digit hex code can only be used when both the values (RR, GG, and BB) are the same for each components. So, if we have #ff00cc, it can be written like this: #f0c.

Here is an example:

Example

```html
body {
  background-color: #fc9; /* same as #ffcc99 */
}

h1 {
  color: #f0f; /* same as #ff00ff */
}

p {
  color: #b58; /* same as #bb5588 */
}

```

## Backgrounds

The CSS background properties are used to define the background effects for elements.

In these chapters, you will learn about the following CSS background properties:

- background-color
- background-image
- background-repeat
- background-attachment
- background-position

CSS background-color

The background-color property specifies the background color of an element.

Example

The background color of a page is set like this:

```html
body {
  background-color: lightblue;
}
```

With CSS, a color is most often specified by:

a valid color name - like "red"
a HEX value - like "#ff0000"
an RGB value - like "rgb(255,0,0)"

Look at CSS Color Values for a complete list of possible color values.

https://www.w3schools.com/cssref/css_colors_legal.asp

Other Elements

You can set the background color for any HTML elements:

Example

Here, the `<h1>`, `<p>`, and `<div>` elements will have different background colors: 

```css
h1 {
  background-color: green;
}

div {
  background-color: lightblue;
}

p {
  background-color: yellow;
}

```

Opacity / Transparency 

(tr:Opaklık (Şeffaf olmayan) ve Şeffaflık (Transparanlık) :)

The opacity property specifies the opacity/transparency of an element. It can take a value from 0.0 - 1.0. The lower value, the more transparent:

Example

```css
div {
  background-color: green;
  opacity: 0.3;
}
```

(!!!) Note: When using the opacity property to add transparency to the background of an element, all of its child elements inherit the same transparency. This can make the text inside a fully transparent element hard to read.

**Transparency using RGBA**

If you do not want to apply opacity to child elements, like in our example above, use RGBA color values. The following example sets the opacity for the background color and not the text:

You learned from our CSS Colors Chapter, that you can use RGB as a color value. In addition to RGB, you can use an RGB color value with an alpha channel (RGBA) - which specifies the opacity for a color.

An RGBA color value is specified with: rgba(red, green, blue, alpha). The alpha parameter is a number between 0.0 (fully transparent) and 1.0 (fully opaque).

Tip: You will learn more about RGBA Colors in our CSS Colors Chapter.

Example

```css
div {
  background: rgba(0, 128, 0, 0.3) /* Green background with 30% opacity */
}

```

## CSS background-image

The background-image property specifies an image to use as the background of an element.

By default, the image is repeated so it covers the entire element.

Example

Set the background image for a page: 

```css
body {
  background-image: url("bgdesert.jpg");
}

```

Note: When using a background image, use an image that does not disturb the text.

The background image can also be set for specific elements, like the <p> element:

Example

p {
  background-image: url("paper.gif");
}

## CSS background-repeat

By default, the background-image property repeats an image both horizontally and vertically.

Some images should be repeated only horizontally or vertically, or they will look strange, like this:

Example
body {
  background-image: url("gradient_bg.png");
}

If the image above is repeated only horizontally (background-repeat: repeat-x;), the background will look better:

Example
body {
  background-image: url("gradient_bg.png");
  background-repeat: repeat-x;
}

Tip: To repeat an image vertically, set background-repeat: repeat-y;

CSS background-repeat: no-repeat

Showing the background image only once is also specified by the background-repeat property:

Example
Show the background image only once:

body {
  background-image: url("img_tree.png");
  background-repeat: no-repeat;
}

In the example above, the background image is placed in the same place as the text. We want to change the position of the image, so that it does not disturb the text too much.

CSS background-position
The background-position property is used to specify the position of the background image.

Example
Position the background image in the top-right corner: 

body {
  background-image: url("img_tree.png");
  background-repeat: no-repeat;
  background-position: right top;
}

## CSS background-attachment

The background-attachment property specifies whether the background image should scroll or be fixed (will not scroll with the rest of the page):

Example
Specify that the background image should be fixed:

body {
  background-image: url("img_tree.png");
  background-repeat: no-repeat;
  background-position: right top;
  background-attachment: fixed;
}

Example
Specify that the background image should scroll with the rest of the page:

body {
  background-image: url("img_tree.png");
  background-repeat: no-repeat;
  background-position: right top;
  background-attachment: scroll;
}


## CSS background - Shorthand property

To shorten the code, it is also possible to specify all the background properties in one single property. This is called a shorthand property.

Instead of writing:

body {
  background-color: #ffffff;
  background-image: url("img_tree.png");
  background-repeat: no-repeat;
  background-position: right top;
}

You can use the shorthand property background:

Example
Use the shorthand property to set the background properties in one declaration:

body {
  background: #ffffff url("img_tree.png") no-repeat right top;
}

When using the shorthand property the order of the property values is:

background-color
background-image
background-repeat
background-attachment
background-position
It does not matter if one of the property values is missing, as long as the other ones are in this order. Note that we do not use the background-attachment property in the examples above, as it does not have a value.

All CSS Background Properties
Property	Description
background	Sets all the background properties in one declaration
background-attachment	Sets whether a background image is fixed or scrolls with the rest of the page
background-clip	Specifies the painting area of the background
background-color	Sets the background color of an element
background-image	Sets the background image for an element
background-origin	Specifies where the background image(s) is/are positioned
background-position	Sets the starting position of a background image
background-repeat	Sets how a background image will be repeated
background-size	Specifies the size of the background image(s)

# Text

## Text Color

The color property is used to set the color of the text. The color is specified by:

a color name - like "red"
a HEX value - like "#ff0000"
an RGB value - like "rgb(255,0,0)"

Look at CSS Color Values for a complete list of possible color values.

The default text color for a page is defined in the body selector.

Example
body {
  color: blue;
}

h1 {
  color: green;
}

Note: For W3C compliant CSS: If you define the color property, you must also define the background-color. ( color özelliğine değer verilirse, taban rengi de tanımlanmalı.)

Text Color and Background Color
In this example, we define both the background-color property and the color property:

body {
  background-color: lightgrey;
  color: blue;
}

h1 {
  background-color: black;
  color: white;
}

## Text Alignment

The text-align property is used to set the horizontal alignment of a text.

A text can be left or right aligned, centered, or justified.

The following example shows center aligned, and left and right aligned text (left alignment is default if text direction is left-to-right, and right alignment is default if text direction is right-to-left):

Example
h1 {
  text-align: center;
}

h2 {
  text-align: left;
}

h3 {
  text-align: right;
}

When the text-align property is set to "justify", each line is stretched so that every line has equal width, and the left and right margins are straight (like in magazines and newspapers):

Example
div {
  text-align: justify;
}

Text Direction
The direction and unicode-bidi properties can be used to change the text direction of an element:

Example
p {
  direction: rtl;
  unicode-bidi: bidi-override;
}

Vertical Alignment
The vertical-align property sets the vertical alignment of an element.

This example demonstrates how to set the vertical alignment of an image in a text:


Example
img.top {
  vertical-align: top;
}

img.middle {
  vertical-align: middle;
}

img.bottom {
  vertical-align: bottom;
}


## 

The text-align property is used to set the horizontal alignment of a text.

A text can be left or right aligned, centered, or justified.

The following example shows center aligned, and left and right aligned text (left alignment is default if text direction is left-to-right, and right alignment is default if text direction is right-to-left):

Example
h1 {
  text-align: center;
}

h2 {
  text-align: left;
}

h3 {
  text-align: right;
}

When the text-align property is set to "justify", each line is stretched so that every line has equal width, and the left and right margins are straight (like in magazines and newspapers):

Example
div {
  text-align: justify;
}

Text Direction
The direction and unicode-bidi properties can be used to change the text direction of an element:

Example
p {
  direction: rtl;
  unicode-bidi: bidi-override;
}

Vertical Alignment
The vertical-align property sets the vertical alignment of an element.

This example demonstrates how to set the vertical alignment of an image in a text:


Example
img.top {
  vertical-align: top;
}

img.middle {
  vertical-align: middle;
}

img.bottom {
  vertical-align: bottom;
}
end

## Text Transformation

Text Transformation
The text-transform property is used to specify uppercase and lowercase letters in a text.

It can be used to turn everything into uppercase or lowercase letters, or capitalize the first letter of each word:

Example
p.uppercase {
  text-transform: uppercase;
}

p.lowercase {
  text-transform: lowercase;
}

p.capitalize {
  text-transform: capitalize;
}
end

## Text Indentation

Text Indentation

The text-indent property is used to specify the indentation of the first line of a text:

Example
p {
  text-indent: 50px;
}

Letter Spacing
The letter-spacing property is used to specify the space between the characters in a text.

The following example demonstrates how to increase or decrease the space between characters:

Example
h1 {
  letter-spacing: 3px;
}

h2 {
  letter-spacing: -3px;
}

Line Height
The line-height property is used to specify the space between lines:

Example
p.small {
  line-height: 0.8;
}

p.big {
  line-height: 1.8;
}

Word Spacing
The word-spacing property is used to specify the space between the words in a text.

The following example demonstrates how to increase or decrease the space between words:
Example
h1 {
  word-spacing: 10px;
}

h2 {
  word-spacing: -5px;
}

White Space
The white-space property specifies how white-space inside an element is handled.

This example demonstrates how to disable text wrapping inside an element:
Example
p {
  white-space: nowrap;
}

white space default value


## Text Shadow

Text Shadow
The text-shadow property adds shadow to text.

In its simplest use, you only specify the horizontal shadow (2px) and the vertical shadow (2px):
Example
h1 {
  text-shadow: 2px 2px;
}

Next, add a color (red) to the shadow:
Example
h1 {
  text-shadow: 2px 2px red;
}

Then, add a blur effect (5px) to the shadow:
Example
h1 {
  text-shadow: 2px 2px 5px red;
}

Tip: Go to our CSS Fonts chapter to learn about how to change fonts, text size and the style of a text.
https://www.w3schools.com/css_font.asp

Tip: Go to our CSS Text Effects chapter to learn about different text effects. https://www.w3schools.com/css3_text_effects.asp

All CSS Text Properties
Property	Description
color	Sets the color of text
direction	Specifies the text direction/writing direction
letter-spacing	Increases or decreases the space between characters in a text
line-height	Sets the line height
text-align	Specifies the horizontal alignment of text
text-decoration	Specifies the decoration added to text
text-indent	Specifies the indentation of the first line in a text-block
text-shadow	Specifies the shadow effect added to text
text-transform	Controls the capitalization of text
text-overflow	Specifies how overflowed content that is not displayed should be signaled to the user
unicode-bidi	Used together with the direction property to set or return whether the text should be overridden to support multiple languages in the same document
vertical-align	Sets the vertical alignment of an element
white-space	Specifies how white-space inside an element is handled
word-spacing	Increases or decreases the space between words in a text


# Fonts

## Fonts

Choosing the right font for your website is important!

Font Selection is Important
Choosing the right font has a huge impact on how the readers experience a website.

The right font can create a strong identity for your brand.

Using a font that is easy to read is important. The font adds value to your text. It is also important to choose the correct color and text size for the font.

Generic Font Families
In CSS there are five generic font families:

Serif fonts have a small stroke at the edges of each letter. They create a sense of formality and elegance.
Sans-serif fonts have clean lines (no small strokes attached). They create a modern and minimalistic look.
Monospace fonts - here all the letters have the same fixed width. They create a mechanical look. 
Cursive fonts imitate human handwriting.
Fantasy fonts are decorative/playful fonts.
All the different font names belong to one of the generic font families. 

Difference Between Serif and Sans-serif Fonts


Note: On computer screens, sans-serif fonts are considered easier to read than serif fonts.

Some Font Examples
Generic Font Family	Examples of Font Names
Serif	 Times New Roman, Georgia, Garamond
Sans-serif	Arial, Verdana, Helvetica
Monospace	Courier New, Lucida Console,Monaco 
Cursive	Brush Script MT,Lucida Handwriting
Fantasy	Copperplate,Papyrus

The CSS font-family Property
In CSS, we use the font-family property to specify the font of a text.

The font-family property should hold several font names as a "fallback" system, to ensure maximum compatibility between browsers/operating systems. Start with the font you want, and end with a generic family (to let the browser pick a similar font in the generic family, if no other fonts are available). The font names should be separated with comma.

Note: If the font name is more than one word, it must be in quotation marks, like: "Times New Roman".

Example
Specify some different fonts for three paragraphs:

.p1 {
  font-family: "Times New Roman", Times, serif;
}

.p2 {
  font-family: Arial, Helvetica, sans-serif;
}

.p3 {
  font-family: "Lucida Console", "Courier New", monospace;
}
end

## CSS Web Safe Fonts 

What are Web Safe Fonts?

Web safe fonts are fonts that are universally installed across all browsers and devices.

Fallback Fonts
However, there are no 100% completely web safe fonts. There is always a chance that a font is not found or is not installed properly.

Therefore, it is very important to always use fallback fonts.

This means that you should add a list of similar "backup fonts" in the font-family property. If the first font does not work, the browser will try the next one, and the next one, and so on. Always end the list with a generic font family name.

Example
Here, there are three font types: Tahoma, Verdana, and sans-serif. The second and third fonts are backups, in case the first one is not found

p {
font-family: Tahoma, Verdana, sans-serif;
}

Best Web Safe Fonts for HTML and CSS
The following list are the best web safe fonts for HTML and CSS:

Arial (sans-serif)
Verdana (sans-serif)
Helvetica (sans-serif)
Tahoma (sans-serif)
Trebuchet MS (sans-serif)
Times New Roman (serif)
Georgia (serif)
Garamond (serif)
Courier New (monospace)
Brush Script MT (cursive)
Note: Before you publish your webs

Note: Before you publish your website, always check how your fonts appear on different browsers and devices, and always use fallback fonts!

Arial (sans-serif)
Arial is the most widely used font for both online and printed media. Arial is also the default font in Google Docs.

Arial is one of the safest web fonts, and it is available on all major operating systems
Example
Verdana (sans-serif)
Verdana is a very popular font. Verdana is easily readable even for small font sizes.

Example
Helvetica (sans-serif)
The Helvetica font is loved by designers. It is suitable for many types of business.

Example
Tahoma (sans-serif)
The Tahoma font has less space between the characters.

Example
Trebuchet MS (sans-serif)
Trebuchet MS was designed by Microsoft in 1996. Use this font carefully. Not supported by all mobile operating systems.

Example


Times New Roman (serif)
Times New Roman is one of the most recognizable fonts in the world. It looks professional and is used in many newspapers and "news" websites. It is also the primary font for Windows devices and applications.

Example

Georgia (serif)
Georgia is an elegant serif font. It is very readable at different font sizes, so it is a good candidate for mobile-responsive design.

Example
Garamond (serif)
Garamond is a classical font used for many printed books. It has a timeless look and good readability.

Example
Courier New (monospace)
Courier New is the most widely used monospace serif font. Courier New is often used with coding displays, and many email providers use it as their default font. Courier New is also the standard font for movie screenplays.
Brush Script MT (cursive)
The Brush Script MT font was designed to mimic handwriting. It is elegant and sophisticated, but can be hard to read. Use it carefully.

Example
Tip: Also check out all available Google Fonts and how to use them. https://www.w3schools.com/css_font_google.asp
end

## Opacity / Transparency (Opaklık / Şeffaflık )

The opacity property specifies the opacity/transparency of an element.

Transparent Image
The opacity property can take a value from 0.0 - 1.0. The lower value, the more transparent:
Example
img {
  opacity: 0.5;
}

Transparent Hover Effect
The opacity property is often used together with the :hover selector to change the opacity on mouse-over:
Example
img {
  opacity: 0.5;
}

img:hover {
  opacity: 1.0;
}

Example explained
The first CSS block is similar to the code in Example 1. In addition, we have added what should happen when a user hovers over one of the images. In this case we want the image to NOT be transparent when the user hovers over it. The CSS for this is opacity:1;.

When the mouse pointer moves away from the image, the image will be transparent again.

An example of reversed hover effect:
Transparent Box
When using the opacity property to add transparency to the background of an element, all of its child elements inherit the same transparency. This can make the text inside a fully transparent element hard to read:
Example
div {
  opacity: 0.3;
}

Transparency using RGBA
If you do not want to apply opacity to child elements, like in our example above, use RGBA color values. The following example sets the opacity for the background color and not the text:
You learned from our CSS Colors Chapter, that you can use RGB as a color value. In addition to RGB, you can use an RGB color value with an alpha channel (RGBA) - which specifies the opacity for a color.

An RGBA color value is specified with: rgba(red, green, blue, alpha). The alpha parameter is a number between 0.0 (fully transparent) and 1.0 (fully opaque).

Tip: You will learn more about RGBA Colors in our CSS Colors Chapter. https://www.w3schools.com/css3_colors.asp

Example
div {
  background: rgba(76, 175, 80, 0.3) /* Green background with 30% opacity */
}

Text in Transparent Box
Example
<html>
<head>
<style>
div.background {
  background: url(klematis.jpg) repeat;
  border: 2px solid black;
}

div.transbox {
  margin: 30px;
  background-color: #ffffff;
  border: 1px solid black;
  opacity: 0.6;
}

div.transbox p {
  margin: 5%;
  font-weight: bold;
  color: #000000;
}
</style>
</head>
<body>

<div class="background">
  <div class="transbox">
    <p>This is some text that is placed in the transparent box.</p>
  </div>
</div>

</body>
</html>

Example explained

First, we create a <div> element (class="background") with a background image, and a border.

Then we create another <div> (class="transbox") inside the first <div>.

The <div class="transbox"> have a background color, and a border - the div is transparent.

Inside the transparent <div>, we add some text inside a <p> element.
end

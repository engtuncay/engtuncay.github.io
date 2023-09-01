
**CSS Element Size**

- [Section - Units,Box Model,Box-Sizing,Width,Height and etc](#section---unitsbox-modelbox-sizingwidthheight-and-etc)
  - [Units](#units)
    - [Absolute Lengths](#absolute-lengths)
    - [Relative Lengths](#relative-lengths)
  - [Box Model](#box-model)
  - [Box Sizing, Width and Height](#box-sizing-width-and-height)
  - [Box Width and Height](#box-width-and-height)
  - [Height , Width And Max-Width](#height--width-and-max-width)
  - [Height and Width Values](#height-and-width-values)
  - [max-width](#max-width)
  - [Max-Width And Auto Margin](#max-width-and-auto-margin)
  - [All CSS Dimension Properties](#all-css-dimension-properties)

# Section - Units,Box Model,Box-Sizing,Width,Height and etc

## Units

Source : https://www.w3schools.com/css/css_units.asp

CSS has several different units for expressing a length.

Many CSS properties take "length" values, such as width, margin, padding, font-size, etc.

Length is a number followed by a length unit, such as 10px, 2em, etc.

*Examples*

Set different length values, using px (pixels):

```css
h1 {
  font-size: 60px;
}

p {
  font-size: 25px;
  line-height: 50px;
}

```

✏ Note: A whitespace cannot appear between the number and the unit. (25 px --> wrong ) However, if the value is 0, the unit can be omitted.

For some CSS properties, negative lengths are allowed.

There are two types of length units: absolute and relative.

### Absolute Lengths

The absolute length units are fixed and a length expressed in any of these will appear as exactly that size. 

(tor:mutlak ölçüler)

Absolute length units are not recommended for use on <span style="color:red">screen</span>, because screen sizes vary so much. However, they can be used if the output medium is known, such as for <span style="color:red">print layout</span>.

| Unit | Description                  |
|------|------------------------------|
| cm   | centimeters                  |
| mm   | millimeters                  |
| in   | inches (1in = 96px = 2.54cm) |
| px*  | pixels (1px = 1/96th of 1in) |
| pt   | points (1pt = 1/72 of 1in)   |
| pc   | picas (1pc = 12 pt)          |


✏ Pixels (px) are relative to the viewing device. For low-dpi devices, 1px is one device pixel (dot) of the display. For printers and high resolution screens 1px implies multiple device pixels.

### Relative Lengths

Relative length units specify a length relative to another length property. Relative length units scales better between different rendering mediums. 

(tor:Göreceli uzunluklar)

| Unit | Description                                                                               |
|------|-------------------------------------------------------------------------------------------
| %    | Relative to the parent element <br/>(ebeveyn elementin %'si)                                   
| em   | Relative to the font-size of the element <br/>(2em means 2 times the size of the current font) |
| rem  | Relative to font-size of the root element                                                 |
| vw   | Relative to 1% of the width of the viewport*                                              |
| vh   | Relative to 1% of the height of the viewport*                                             |
| vmin | Relative to 1% of viewport's* smaller dimension                                           |
| vmax | Relative to 1% of viewport's* larger dimension                                            |
| ex   | Relative to the x-height of the current font (rarely used)                                |
| ch   | Relative to width of the "0" (zero)                                                       |

**Tips**: 

* The em and rem units are practical in creating perfectly scalable layout !

* Viewport = the browser window size. If the viewport is 50cm wide, 1vw = 0.5cm.

see the source for browser compability.

## Box Model 

Source : https://www.w3schools.com/css/css_boxmodel.asp

All HTML elements can be considered as <span style="color:red">boxes</span>. In CSS, the term "box model" is used when talking about design and layout.

The CSS box model is essentially a box that wraps around every HTML element. It consists of : margins, borders, padding, and the actual content. The image below illustrates the box model:

![](./img/box-model-1.jpg)

Explanation of the different parts:

* Content - The content of the box, where text and images appear
* Padding - Clears an area around the content. The padding is transparent
* Border - A border that goes around the padding and content
* Margin - Clears an area outside the border. The margin is transparent

The box model allows us to add a border around elements, and to define space between elements. 

Example : Demonstration of the box model:

```css
div {
  width: 300px;
  border: 15px solid green;
  padding: 50px;
  margin: 20px;
}

```

![](./img/box-model-ex1.jpg)

## Box Sizing, Width and Height

Source : https://www.w3schools.com/css/css3_box-sizing.asp

The CSS box-sizing property allows us to include <span style="color:red">the padding and border</span> in an element's width and height size. 

(tor: box-sizing property, padding ve border uzunluğunu elementin genişlik ve yüksekliğine dahil etmemizi sağlar.:)

There are two types box sizing model :

* Content Box Sizing (default)
* Border Box Sizing (common) (recommended)

Content Box sizing tells that *width and height include only content*.

Border Box sizing tells that *widht and height include content, padding and border*.

Syntax 

```css
box-sizing: [border-box|];

```

(tor:border-box sizing'de bir elementin genişliğinde veya yüksekliğinde content ile beraber, border ve padding de dahil olur.)

**Without the CSS box-sizing Property**

By default, the width and height of an element is calculated like this:

- width + padding + border = actual width of an element

- height + padding + border = actual height of an element

This means: When you set the width/height of an element, the element often appears bigger than you have set (because the element's border and padding are added to the element's specified width/height).

The following illustration shows two `<div>` elements with the same specified width and height (300px-100px):

The two `<div>` elements above end up with different sizes in the result (because div2 has a padding specified):

Example

```css
.div1 {
  width: 300px;
  height: 100px;
  border: 1px solid blue;
}

.div2 {
  width: 300px;
  height: 100px;
  padding: 50px;
  border: 1px solid red;
}
```

![image](./img/box-sizing-1-17-31.png)

The box-sizing property solves this problem.

**With the CSS box-sizing Property**

The box-sizing property allows us to include the padding and border in an element's total width and height. ( border-box sizing )

If you set `box-sizing: border-box;` on an element, padding and border are included in the width and height:

Here is the same example as above, with `box-sizing: border-box;` added to both `<div>` elements:

Example

```css
.div1 {
  width: 300px;
  height: 100px;
  border: 1px solid blue;
  box-sizing: border-box;
}

.div2 {
  width: 300px;
  height: 100px;
  padding: 50px;
  border: 1px solid red;
  box-sizing: border-box;
}

```
![](./img/box-sizing-border-box.jpg)

Since the result of border-box sizing is so much better, many developers want all elements on their pages to work this way.

The code below ensures that all elements are sized in this more intuitive way. Many browsers already use `box-sizing: border-box;` for many form elements (but not all - which is why inputs and text areas look different at width: 100%;).

Applying this to all elements is safe and wise:

Example

```css
* {
  box-sizing: border-box;
}
```

## Box Width and Height

In order to set the width and height of an element correctly in all browsers, you need to take attention to the box sizing models.

Example : This `<div>` element will have a total box width of 350px: 

```css
div {
  width: 320px;
  padding: 10px;
  border: 5px solid gray;
  margin: 0;
}

```

- Here is the calculation (total width according to content box sizing):

```text
320px (width)
+ 20px (left + right padding)
+ 10px (left + right border)
+ 0px (left + right margin)
= 350px (box-width)

```

## Height , Width And Max-Width

Source : https://www.w3schools.com/css/css_dimension.asp

The CSS height and width properties are used to set the height and width of an element.

The CSS max-width property is used to set the maximum width of an element.

The height and width properties do not include padding, borders, or margins. It sets the height/width of the area inside the padding, border, and margin of the element. (content-box model)	

## Height and Width Values

The height and width properties may have the following values:

* auto - This is default. The browser calculates the height and width
* length - Defines the height/width in px, cm etc.
* % - Defines the height/width in percent of the containing block
* initial - Sets the height/width to its default value
* inherit - The height/width will be inherited from its parent value

Example : Set the height and width of a `<div>` element:

```css
div {
  height: 200px;
  width: 50%;
  background-color: powderblue;
}
```

Example (2)

```css
div {
  height: 100px;
  width: 500px;
  background-color: powderblue;
}
```

## max-width

The max-width property is used to set the maximum width of an element. (max-genişliğini belirler, ekranda pencere genişlese dahi büyütmez. marjin alanı büyür.)

The max-width can be specified in length values, like px, cm, etc., or in percent (%) of the containing block, or set to none (this is default. Means that there is no maximum width).

The problem with the `<div>` above occurs when the browser window is smaller than the width of the element (500px). The browser then adds a horizontal scrollbar to the page.

Using max-width instead, in this situation, will improve the browser's handling of small windows.

Note: The value of the max-width property overrides width.

Example
This `<div>` element has a height of 100 pixels and a max-width of 500 pixels: 

```css
div {
  max-width: 500px;,
  height: 100px;
  background-color: powderblue;
}

```

## Max-Width And Auto Margin

Using width, max-width and margin: auto;

As mentioned in the previous chapter; a block-level element always takes up the full width available (stretches out to the left and right as far as it can).

Setting the width of a block-level element will prevent it from stretching out to the edges of its container. Then, you can set the margins to auto, to horizontally center the element within its container. The element will take up the specified width, and the remaining space will be split equally between the two margins:

Note: The problem with the `<div>` above occurs when the browser window is smaller than the width of the element. The browser then adds a horizontal scrollbar to the page.

(Browser tarayıcısı elementin genişliğinden küçükse problem ortaya çıkar. Böylece tarayıcı, pencerenin en altında sayfa scroll'u ekler.)

Using max-width instead, in this situation, will improve the browser's handling of small windows. This is important when making a site usable on small devices: 

Tip: Resize the browser window to less than 500px wide, to see the difference between the two divs!

Here is an example of the two divs above:

Example
```css
div.ex1 {
  width: 500px;
  margin: auto;
  border: 3px solid #73AD21;
}

div.ex2 {
  max-width: 500px;
  margin: auto;
  border: 3px solid #73AD21;
}

// max-width and percantage usage (to)
div.ex3 { 
  max-width: 100%-10px; 
  margin: auto; 
  border: 3px solid #73AD21; 
}

```

Try it : https://www.w3schools.com/css/tryit.asp?filename=trycss_max-width

## All CSS Dimension Properties

Property   | Description
-----------|--------------------------------------
height     | Sets the height of an element
width      | Sets the width of an element
max-height | Sets the maximum height of an element
max-width  | Sets the maximum width of an element
min-height | Sets the minimum height of an element
min-width  | Sets the minimum width of an element
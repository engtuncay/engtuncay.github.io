
- [Code Play For Tailwind](#code-play-for-tailwind)
- [LAYOUT](#layout)
  - [Container](#container)
  - [Box Decoration Break](#box-decoration-break)
  - [Box Sizing](#box-sizing)
  - [Display](#display)
  - [Floats](#floats)
  - [Clear](#clear)
  - [Isolation ???](#isolation-)
  - [Object Fit](#object-fit)
  - [Object Position](#object-position)
  - [Overflow](#overflow)
  - [Overscroll Behavior](#overscroll-behavior)
  - [Position](#position)
  - [Top / Right / Bottom / Left](#top--right--bottom--left)
  - [Visibility](#visibility)
  - [Z-Index](#z-index)
- [FLEXBOX AND GRID](#flexbox-and-grid)
  - [Flex Direction](#flex-direction)
  - [Flex Wrap](#flex-wrap)
  - [Flex](#flex)
  - [Flex Grow](#flex-grow)
  - [Flex Shrink](#flex-shrink)
  - [Order](#order)
  - [Grid Template Columns](#grid-template-columns)
  - [Gap](#gap)
  - [Justify Content](#justify-content)
  - [Justify Items](#justify-items)
  - [Justify Self](#justify-self)
  - [Align Content](#align-content)
  - [Align Items](#align-items)
  - [Align Self](#align-self)
- [SPACING](#spacing)
  - [Padding](#padding)
  - [Margin](#margin)
  - [Space Between](#space-between)
- [SIZING](#sizing)
  - [Width](#width)
  - [Min-Width](#min-width)
  - [Max Width](#max-width)
  - [Height](#height)
  - [Min-Height](#min-height)
  - [Max Height](#max-height)
- [Typography](#typography)
  - [Font Family](#font-family)
  - [Font Size](#font-size)
  - [Font Smoothing](#font-smoothing)
- [Backgrounds](#backgrounds)
- [Borders](#borders)
- [Effects](#effects)
- [Filters](#filters)
- [Tables](#tables)
- [Transitions and Animations](#transitions-and-animations)
- [Transforms](#transforms)
- [Interactivity](#interactivity)
- [SVG](#svg)
- [Accesibility](#accesibility)
- [Official Plugins](#official-plugins)


# Code Play For Tailwind

Tailwind denemelerine bu code play den yapabilirsiniz. Gayet kullanışlı.

https://play.tailwindcss.com/


# LAYOUT

## Container

A component for fixing an element's width to the current breakpoint.

```
Class       Breakpoint    Properties
container	  None	        width: 100%;
"           sm (640px)    max-width: 640px;
"           md (768px)	  max-width: 768px;
"           lg (1024px)	  max-width: 1024px;
"           xl (1280px)	  max-width: 1280px;
"           2xl (1536px)	max-width: 1536px;
```

Container en büyük ekranda alacağı max genişlik 1536px olur. 1536 üstünde margin degerleri oluşturur. Md ekranda (768-1024px) en geniş 768 px olur.

**Usage**

The container class sets the max-width of an element to match the min-width of the current breakpoint. This is useful if you’d prefer to design for a fixed set of screen sizes instead of trying to accommodate a **fully fluid viewport**.

Note that unlike containers you might have used in other frameworks, Tailwind’s container does not center itself automatically and does not have any built-in horizontal padding.

* To center a container, use the mx-auto utility:

```html
<div class="container mx-auto">
  <!-- ... -->
</div>
```

* To add horizontal padding, use the px-{size} utilities:

```html
<div class="container mx-auto px-4">
  <!-- ... -->
</div>
```

If you’d like to center your containers by default or include default horizontal padding, see the customization options below. 

**Responsive variants**

The container class also includes responsive variants like md:container by default that allow you to make something behave like a container at only a certain breakpoint and up:

```html
<!-- Full-width fluid until the `md` breakpoint, then lock to container -->
<div class="md:container md:mx-auto">
  <!-- ... -->
</div>
```
  
https://tailwindcss.com/docs/container


## Box Decoration Break

Utilities for controlling how element fragments should be rendered across multiple lines, columns, or pages.

```css
Class Properties
decoration-slice	box-decoration-break: slice;
decoration-clone	box-decoration-break: clone;

```

**Usage**

Use the decoration-slice and decoration-clone utilities to control whether properties like background, border, border-image, box-shadow, clip-page, margin, and padding should be rendered as if the element were one continuous fragment, or distinct blocks.

```html
<span class="decoration-clone bg-gradient-to-b from-yellow-400 to-red-500 text-transparent ...">
  Hello<br>
  World
</span>
```

![](https://image.prntscr.com/image/om5zoIXjQVWH9lv3cELOaw.png)

- Responsive




## Box Sizing
Utilities for controlling how the browser should calculate an element's total size.

```css
Class Properties
box-border	box-sizing: border-box;
box-content	box-sizing: content-box;
```

- Include borders and padding

Use box-border to set an element’s box-sizing to border-box, telling the browser to include the element’s borders and padding when you give it a height or width.

This means a 100px × 100px element with a 2px border and 4px of padding on all sides will be rendered as 100px × 100px, with an internal content area of 88px × 88px.

Tailwind makes this the default for all elements in our preflight base styles.

```html
<div class="box-border h-32 w-32 p-4 border-4 ...">
  <!-- ... -->
</div>
```

- Exclude borders and padding

Use box-content to set an element’s box-sizing to content-box, telling the browser to add borders and padding on top of the element’s specified width or height.

This means a 100px × 100px element with a 2px border and 4px of padding on all sides will actually be rendered as 112px × 112px, with an internal content area of 100px × 100px.

```html
<div class="box-content h-32 w-32 p-4 border-4 ...">
  <!-- ... -->
</div>
```

- Responsive

To control the box-sizing at a specific breakpoint, add a {screen}: prefix to any existing box-sizing utility. For example, use md:box-content to apply the box-content utility at only medium screen sizes and above.

```html
<div class="box-border md:box-content ...">
  <!-- ... -->
</div>
```

For more information about Tailwind’s responsive design features, check out the Responsive Design documentation.
(https://tailwindcss.com/docs/responsive-design)

## Display

Utilities for controlling the display box type of an element.

```
Class Properties
block	              display: block;
inline-block	      display: inline-block;
inline	            display: inline;
flex	              display: flex;
inline-flex	        display: inline-flex;
table	              display: table;
inline-table	      display: inline-table;
table-caption	      display: table-caption;
table-cell	        display: table-cell;
table-column	      display: table-column;
table-column-group	display: table-column-group;
table-footer-group	display: table-footer-group;
table-header-group	display: table-header-group;
table-row-group	    display: table-row-group;
table-row	          display: table-row;
flow-root	          display: flow-root;
grid	              display: grid;
inline-grid	        display: inline-grid;
contents	          display: contents;
list-item	          display: list-item;
hidden	            display: none;

```

- Block

Use block to create a block-level element.

```html
<div class="space-y-3">
  <span class="block bg-red-200">1</span>
  <span class="block bg-red-200">2</span>
  <span class="block bg-red-200 ">3</span>
</div>
```

- Flow-Root ???

Use flow-root to create a block-level element with its own block formatting context.

```html
<div class="space-y-4">
  <div class="flow-root ...">
    <div class="my-4 ...">1</div>
  </div>
  <div class="flow-root ...">
    <div class="my-4 ...">2</div>
  </div>
</div>

```

- Inline Block

Use inline-block to create an inline block-level element.

```html
<div class="space-x-4 ...">
  <div class="inline-block ...">1</div>
  <div class="inline-block ...">2</div>
  <div class="inline-block ...">3</div>
</div>
```
- Inline

Use inline to create an inline element.

```html
<div>
  <div class="inline ...">1</div>
  <div class="inline ...">2</div>
  <div class="inline ...">3</div>
</div>
```

- Flex

Use flex to create a block-level flex container.

```html
<div class="flex space-x-4 ...">
  <div class="flex-1 bg-red-200 ...">1</div>
  <div class="flex-1 bg-red-200 ...">2</div>
  <div class="flex-1 bg-red-200 ...">3</div>
</div>

```

- Inline Flex

Use inline-flex to create an inline flex container.

```html
<div class="inline-flex space-x-4 ...">
  <div class="flex-1 bg-red-200 ...">1</div>
  <div class="flex-1 bg-red-200 ...">2</div>
  <div class="flex-1 bg-red-200 ...">3</div>
</div>
```

- Grid

Use grid to create a grid container.

```html
<div class="grid gap-4 grid-cols-3">
  <!-- ... -->
</div>
```

- Inline Grid

Use inline-grid to create an inline grid container.

```html
<span class="inline-grid grid-cols-3 gap-x-4">
  <span>1</span>
  <span>1</span>
  <span>1</span>
</span>
<span class="inline-grid grid-cols-3 gap-x-4">
  <span>2</span>
  <span>2</span>
  <span>2</span>
</span>
```

- Contents

Use contents to create a “phantom” container whose children act like direct children of the parent..

```html
<div class="flex ...">
  <div class="flex-1 ...">1</div>
  <div class="contents">
    <div class="flex-1 ...">2</div>
    <div class="flex-1 ...">3</div>
  </div>
  <div class="flex-1 ...">4</div>
</div>
```

Burada 2 ve 3 sanki üstteki parent ın child'ı gibi hareket eder.


- Table

Use the table, .table-row, .table-cell, .table-caption, .table-column, .table-column-group, .table-header-group, table-row-group, and .table-footer-group utilities to create elements that behave like their respective table elements.

```html
<div class="table w-full ...">
  <div class="table-row-group">
    <div class="table-row">
      <div class="table-cell ...">A cell with more content</div>
      <div class="table-cell ...">Cell 2</div>
      <div class="table-cell ...">Cell 3</div>
    </div>
    <div class="table-row">
      <div class="table-cell ...">Cell 4</div>
      <div class="table-cell ...">A cell with more content</div>
      <div class="table-cell ...">Cell 6</div>
    </div>
  </div>
</div>
```

- Hidden

Use hidden to set an element to display: none and remove it from the page layout (compare with .invisible from the visibility documentation).

```html
<div class="flex ...">
  <div class="hidden ...">1</div>
  <div>2</div>
  <div>3</div>
</div>
```

- Responsive

To control the display property of an element at a specific breakpoint, add a {screen}: prefix to any existing display utility class. For example, use md:inline-flex to apply the inline-flex utility at only medium screen sizes and above.

```html
<div class="flex md:inline-flex ...">
  <!-- ... -->
</div>
```

- Source

https://tailwindcss.com/docs/display

## Floats

Utilities for controlling the wrapping of content around an element.

```css
Class       Properties
float-right	float: right;
float-left	float: left;
float-none	float: none;
```

- Float right

Use float-right to float an element to the right of its container.

```html
<img class="float-right ..." src="http://via.placeholder.com/120x100">

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis et lorem sit amet vehicula. Etiam vel nibh nec nisi euismod mollis ultrices condimentum velit. Proin velit libero, interdum ac rhoncus sit amet, pellentesque ac turpis. Quisque ac luctus turpis, vel efficitur ante. Cras convallis risus vel vehicula dapibus. Donec eget neque fringilla, faucibus mi quis, porttitor magna. Cras pellentesque leo est, et luctus neque rutrum eu. Aliquam consequat velit sed sem posuere, vitae sollicitudin mi consequat. Mauris eget ipsum sed dui rutrum fringilla. Donec varius vehicula magna sit amet auctor. Ut congue vehicula lectus in blandit. Vivamus suscipit eleifend turpis, nec sodales sem vulputate a. Curabitur pulvinar libero viverra, efficitur odio eu, finibus justo. Etiam eu vehicula felis.</p>
```

- Float left

Use float-left to float an element to the left of its container.

- Don't float

Use "float-none" to reset any floats that are applied to an element. This is the default value for the float property.

- Responsive
To control the float of an element at a specific breakpoint, add a {screen}: prefix to any existing float utility class. For example, use md:float-left to apply the float-left utility at only medium screen sizes and above.

```html
<div class="bg-gray-200 p-4">
  <img class="float-right md:float-left ...">
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis et lorem sit amet vehicula. Etiam vel nibh nec nisi euismod mollis ultrices condimentum velit. Proin velit libero, interdum ac rhoncus sit amet, pellentesque ac turpis. Quisque ac luctus turpis, vel efficitur ante. Cras convallis risus vel vehicula dapibus. Donec eget neque fringilla, faucibus mi quis, porttitor magna. Cras pellentesque leo est, et luctus neque rutrum eu. Aliquam consequat velit sed sem posuere, vitae sollicitudin mi consequat. Mauris eget ipsum sed dui rutrum fringilla. Donec varius vehicula magna sit amet auctor. Ut congue vehicula lectus in blandit. Vivamus suscipit eleifend turpis, nec sodales sem vulputate a. Curabitur pulvinar libero viverra, efficitur odio eu, finibus justo. Etiam eu vehicula felis.</p>
</div>

```

- Source

https://tailwindcss.com/docs/float


## Clear

Utilities for controlling the wrapping of content around an element.

```css
Class       Properties
clear-left	clear: left;
clear-right	clear: right;
clear-both	clear: both;
clear-none	clear: none;

```

- Clear left

Use clear-left to position an element below any preceding left-floated elements.

```html
<img class="float-left ..." src="http://via.placeholder.com/120x100">
<img class="float-right ..." src="http://via.placeholder.com/120x100">

<p class="clear-left ...">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis et lorem sit amet vehicula. Etiam vel nibh nec nisi euismod mollis ultrices condimentum velit. Proin velit libero, interdum ac rhoncus sit amet, pellentesque ac turpis. Quisque ac luctus turpis, vel efficitur ante. Cras convallis risus vel vehicula dapibus. Donec eget neque fringilla, faucibus mi quis, porttitor magna. Cras pellentesque leo est, et luctus neque rutrum eu. Aliquam consequat velit sed sem posuere, vitae sollicitudin mi consequat. Mauris eget ipsum sed dui rutrum fringilla. Donec varius vehicula magna sit amet auctor. Ut congue vehicula lectus in blandit. Vivamus suscipit eleifend turpis, nec sodales sem vulputate a. Curabitur pulvinar libero viverra, efficitur odio eu, finibus justo. Etiam eu vehicula felis.</p>
```

- Clear right

Use clear-right to position an element below any preceding right-floated elements.

- Clear both

Use clear-both to position an element below all preceding floated elements.

- Don't clear

Use clear-none to reset any clears that are applied to an element. This is the default value for the clear property.

- Responsive

To control the clear property of an element at a specific breakpoint, add a {screen}: prefix to any existing clear utility. For example, use md:clear-left to apply the clear-left utility at only medium screen sizes and above.

```html
<p class="clear-right md:clear-left ...">
  <!-- ... -->
</p>
```

- Source

https://tailwindcss.com/docs/clear


## Isolation ???

Utilities for controlling whether an element should explicitly create a new stacking context.

```txt
Class           Properties
isolate	        isolation: isolate;
isolation-auto	isolation: auto;
```

- Usage
 
Use the isolate and isolation-auto utilities to control whether an element should explicitly create a new stacking context.

```html
<div class="isolate ...">
  <!-- ... -->
</div>
```

- Responsive

To control the isolation property at a specific breakpoint, add a {screen}: prefix to any existing isolation utility. For example, use md:isolation-auto to apply the isolation-auto utility at only medium screen sizes and above.

```html
<div class="isolate md:isolation-auto ...">
  <!-- ... -->
</div>
```

## Object Fit

Utilities for controlling how a replaced element's content should be resized.

```css
Class               Properties
object-contain	    object-fit: contain;
object-cover	      object-fit: cover;
object-fill	        object-fit: fill;
object-none	        object-fit: none;
object-scale-down	  object-fit: scale-down;
```

- Contain

Resize an element’s content to stay contained within its container using .object-contain.

```html
<div class="bg-rose-300 ...">
  <img class="object-contain h-48 w-full ...">
</div>
```

- Cover

Resize an element’s content to cover its container using .object-cover.

```html
<div class="bg-indigo-300 ...">
  <img class="object-cover h-48 w-full ...">
</div>
```

- Fill

Stretch an element’s content to fit its container using .object-fill.

```html
<div class="bg-light-blue-300 ...">
  <img class="object-fill h-48 w-full ...">
</div>
```

- None

Display an element’s content at its original size ignoring the container size using .object-none.

```html
<div class="bg-yellow-300">
  <img class="object-none h-48 w-full ...">
</div>
```


- Scale Down

Display an element’s content at its original size but scale it down to fit its container if necessary using .object-scale-down.

```html
<div class="bg-green-300">
  <img class="object-scale-down h-48 w-full ...">
</div>
```


- Responsive

To control how a replaced element’s content should be resized only at a specific breakpoint, add a {screen}: prefix to any existing object fit utility. For example, adding the class md:object-scale-down to an element would apply the object-scale-down utility at medium screen sizes and above.

```html
<div>
  <img class="object-contain md:object-scale-down ..." src="...">
</div>
```

- Source

https://tailwindcss.com/docs/object-fit


## Object Position

Utilities for controlling how a replaced element's content should be positioned within its container.

```css
Class   Properties
object-bottom	  object-position: bottom;
object-center	  object-position: center;
object-left	    object-position: left;
object-left-bottom	  object-position: left bottom;
object-left-top	  object-position: left top;
object-right	  object-position: right;
object-right-bottom	  object-position: right bottom;
object-right-top	  object-position: right top;
object-top	  object-position: top;
```

- Usage

Use the object-{side} utilities to specify how a replaced element’s content should be positioned within its container.

```css
<img class="object-none object-left-top bg-yellow-300 w-24 h-24 ..." src="...">
<img class="object-none object-top bg-yellow-300 w-24 h-24 ..." src="...">
<img class="object-none object-right-top bg-yellow-300 w-24 h-24 ..." src="...">
<img class="object-none object-left bg-yellow-300 w-24 h-24 ..." src="...">
<img class="object-none object-center bg-yellow-300 w-24 h-24 ..." src="...">
<img class="object-none object-right bg-yellow-300 w-24 h-24 ..." src="...">
<img class="object-none object-left-bottom bg-yellow-300 w-24 h-24 ..." src="...">
<img class="object-none object-bottom bg-yellow-300 w-24 h-24 ..." src="...">
<img class="object-none object-right-bottom bg-yellow-300 w-24 h-24 ..." src="...">
```


- Responsive
To position an object only at a specific breakpoint, add a {screen}: prefix to any existing object position utility. For example, adding the class md:object-top to an element would apply the object-top utility at medium screen sizes and above.

```html
<img class="object-center md:object-top ..." src="...">

```

- Source 

https://tailwindcss.com/docs/object-position


## Overflow

Utilities for controlling how an element handles content that is too large for the container.

```
Class               Properties
overflow-auto	      overflow: auto;
overflow-hidden	    overflow: hidden;
overflow-visible	  overflow: visible;
overflow-scroll	    overflow: scroll;
overflow-x-auto	    overflow-x: auto;
overflow-y-auto	    overflow-y: auto;
overflow-x-hidden	  overflow-x: hidden;
overflow-y-hidden	  overflow-y: hidden;
overflow-x-visible	overflow-x: visible;
overflow-y-visible	overflow-y: visible;
overflow-x-scroll	  overflow-x: scroll;
overflow-y-scroll	  overflow-y: scroll;

```

- Visible

Use overflow-visible to prevent content within an element from being clipped. Note that any content that overflows the bounds of the element will then be visible.

```html
<div class="overflow-visible h-24 ...">Lorem ipsum dolor sit amet...</div>

```

- Auto

Use overflow-auto to add scrollbars to an element in the event that its content overflows the bounds of that element. Unlike .overflow-scroll, which always shows scrollbars, this utility will only show them if scrolling is necessary.

```html
<div class="overflow-auto h-32 ...">Lorem ipsum dolor sit amet...</div>
```

- Hidden

Use overflow-hidden to clip any content within an element that overflows the bounds of that element.

```html
<div class="overflow-hidden h-32 ...">Lorem ipsum dolor sit amet...</div>
```


- Scroll horizontally if needed

Use overflow-x-auto to allow horizontal scrolling if needed.

```html
<div class="overflow-x-auto ...">QrLmmW69vMQD...</div>
```

- Scroll vertically if needed

Use overflow-y-auto to allow vertical scrolling if needed.

```html
<div class="overflow-y-auto h-32 ...">Lorem ipsum dolor sit amet...</div>
```

- Scroll horizontally always

Use overflow-x-scroll to allow horizontal scrolling and always show scrollbars unless always-visible scrollbars are disabled by the operating system

```css
<div class="overflow-x-scroll ...">QrLmmW69vMQD...</div>

```

- Scroll vertically always

Use overflow-y-scroll to allow vertical scrolling and always show scrollbars unless always-visible scrollbars are disabled by the operating system.


```html
<div class="overflow-y-scroll h-32 ...">Lorem ipsum dolor sit amet...</div>

```

- Scroll in all directions

Use overflow-scroll to add scrollbars to an element. Unlike .overflow-auto, which only shows scrollbars if they are necessary, this utility always shows them. Note that some operating systems (like macOS) hide unnecessary scrollbars regardless of this setting.

```html
<div class="overflow-scroll h-32 ...">Lorem ipsum dolor sit amet...</div>

```

- Responsive

To apply an overflow utility only at a specific breakpoint, add a {screen}: prefix to the existing class name. For example, adding the class md:overflow-scroll to an element would apply the overflow-scroll utility at medium screen sizes and above.

```html
<div class="overflow-auto md:overflow-scroll ...">
  Lorem ipsum dolor sit amet...
</div>
```

- Source 

https://tailwindcss.com/docs/overflow


## Overscroll Behavior

Utilities for controlling how the browser behaves when reaching the boundary of a scrolling area.

```
Class Properties
overscroll-auto	      overscroll-behavior: auto;
overscroll-contain	  overscroll-behavior: contain;
overscroll-none	      overscroll-behavior: none;
overscroll-y-auto	    overscroll-behavior-y: auto;
overscroll-y-contain	overscroll-behavior-y: contain;
overscroll-y-none	    overscroll-behavior-y: none;
overscroll-x-auto	    overscroll-behavior-x: auto;
overscroll-x-contain	overscroll-behavior-x: contain;
overscroll-x-none	    overscroll-behavior-x: none;
```

## Position

Utilities for controlling how an element is positioned in the DOM.

```
Class Properties
static	  position: static;
fixed	    position: fixed;
absolute	position: absolute;
relative	position: relative;
sticky	  position: sticky;
```


- Static
Use static to position an element according to the normal flow of the document.

Any offsets will be ignored and the element will not act as a position reference for absolutely positioned children.

```html
<div class="static ...">
  <p>Static parent</p>
  <div class="absolute bottom-0 left-0 ...">
    <p>Absolute child</p>
  </div>
</div>
```


- Relative

Use relative to position an element according to the normal flow of the document.

Offsets are calculated relative to the element’s normal position and the element will act as a position reference for absolutely positioned children.


```html
<div class="relative ...">
  <p>Relative parent</p>
  <div class="absolute bottom-0 left-0 ...">
    <p>Absolute child</p>
  </div>
</div>
```


- Absolute

Use absolute to position an element outside of the normal flow of the document, causing neighboring elements to act as if the element doesn’t exist.

Offsets are calculated relative to the nearest parent that has a position other than static, and the element will act as a position reference for other absolutely positioned children.

```html
<div class="static ...">
  <!-- Static parent -->
  <div class="static ..."><p>Static child</p></div>
  <div class="inline-block ..."><p>Static sibling</p></div>
  <!-- Static parent -->
  <div class="absolute ..."><p>Absolute child</p></div>
  <div class="inline-block ..."><p>Static sibling</p></div>
</div>
```

- Note : absolute position without tblr values

then tblr values are auto

top değeri üstündeki blockların yüksekliği kadar olur. ltr sistemde left 0 olur, right bottom ne kadar boşluk varsa o kadar büyüklüğü alır.


- Fixed

Use fixed to position an element relative to the browser window.

Offsets are calculated relative to the viewport and the element will act as a position reference for absolutely positioned children.

```html
<div>
  <div class="fixed ...">
    Fixed child
  </div>

  Scroll me!

  Lorem ipsum...
</div>
```

- Sticky

Use sticky to position an element as relative until it crosses a specified threshold, then treat it as fixed until its parent is off screen.

Offsets are calculated relative to the element’s normal position and the element will act as a position reference for absolutely positioned children.

```html
<div>
  <div class="sticky top-0 ...">Sticky Heading 1</div>
  <p class="py-4">Quisque cursus...</p>
</div>
<div>
  <div class="sticky top-0 ...">Sticky Heading 2</div>
  <p class="py-4">Integer lacinia...</p>
</div>
<div>
  <div class="sticky top-0 ...">Sticky Heading 3</div>
  <p class="py-4">Nullam mauris...</p>
</div>
<!-- etc. -->
```

- Responsive

To change how an element is positioned only at a specific breakpoint, add a {screen}: prefix to any existing position utility. For example, adding the class md:absolute to an element would apply the absolute utility at medium screen sizes and above.

```html
<div class="relative h-32 ...">
  <div class="inset-x-0 bottom-0 relative md:absolute"></div>
</div>

```

- Source 

https://tailwindcss.com/docs/position

## Top / Right / Bottom / Left

Utilities for controlling the placement of positioned elements.

```
Class           Properties
inset-0	        top: 0px;right: 0px;bottom: 0px;left: 0px;
inset-x-0	    left: 0px;right: 0px;
inset-y-0	    top: 0px;bottom: 0px;

top-0	        top: 0px;
right-0	        right: 0px;
bottom-0	    bottom: 0px;
left-0	        left: 0px;

// başlarına eksi gelebilir
{-}inset-px	    top: 1px;right: 1px;bottom: 1px;left: 1px;
{-}inset-x-px	    left: 1px;right: 1px;
{-}inset-y-px	    top: 1px;bottom: 1px;

// top right bottom left
{trbl}-px	    {trbl}: 1px;
-{trbl}-px	    {trbl}: -1px;

// örnek
top-px	        top: 1px;
-top-px	        top: -1px;

// başına - gelebilir
inset-0.5	    top: 0.125rem;right: 0.125rem;bottom: 0.125rem;left: 0.125rem;
inset-x-0.5	    left: 0.125rem;right: 0.125rem;-inset-x-0.5	left: -0.125rem;right: -0.125rem;
inset-y-0.5	    top: 0.125rem;bottom: 0.125rem;


// top right bottom left den biri gelir.
trbl-0.5	      trbl: 0.125rem; 
trbl-1	      trbl: 0.25rem;
trbl-1.5	      trbl: 0.375rem;
trbl-2	      trbl: 0.5rem;
trbl-2.5	top: 0.625rem;
trbl-3	top: 0.75rem;
trbl-3.5	top: 0.875rem;
trbl-4	top: 1rem;
trbl-5	top: 1.25rem;
trbl-6	top: 1.5rem;
trbl-7	top: 1.75rem;
trbl-8	top: 2rem;
trbl-9	top: 2.25rem;
trbl-10	top: 2.5rem;
trbl-11	top: 2.75rem;
trbl-12	top: 3rem;
trbl-14	top: 3.5rem;

top-16	top: 4rem;
top-20	top: 5rem;
top-24	top: 6rem;
top-28	top: 7rem;
top-32	top: 8rem;
top-36	top: 9rem;
top-40	top: 10rem;
top-44	top: 11rem;

// Başlarını eksi işareti gelebilir, değer negatife döner
-trbl-0.5	      trbl: -0.125rem; 


// top örneği
top-0.5	      top: 0.125rem; 
top-1	        top: 0.25rem;
top-1.5	      top: 0.375rem;
top-2	        top: 0.5rem;

// Başlarına - gelebilir, değerlerin başına - gelir
inset-1	      top: 0.25rem;right: 0.25rem;bottom: 0.25rem;left: 0.25rem;
inset-x-1	    left: 0.25rem;right: 0.25rem;
inset-y-1	    top: 0.25rem;bottom: 0.25rem;

// örnek
-inset-1	      top: -0.25rem;right: -0.25rem;bottom: -0.25rem;left: -0.25rem;

inset-1.5	    top: 0.375rem;right: 0.375rem;bottom: 0.375rem;left: 0.375rem;
inset-x-1.5	left: 0.375rem;right: 0.375rem;
inset-y-1.5	top: 0.375rem;bottom: 0.375rem;

inset-2	top: 0.5rem;right: 0.5rem;bottom: 0.5rem;left: 0.5rem;
inset-x-2	left: 0.5rem;right: 0.5rem;
inset-y-2	top: 0.5rem;bottom: 0.5rem;

inset-2.5	top: 0.625rem;right: 0.625rem;bottom: 0.625rem;left: 0.625rem;
inset-x-2.5	left: 0.625rem;right: 0.625rem;
inset-y-2.5	top: 0.625rem;bottom: 0.625rem;

inset-3	top: 0.75rem;right: 0.75rem;bottom: 0.75rem;left: 0.75rem;
inset-x-3	left: 0.75rem;right: 0.75rem;
inset-y-3	top: 0.75rem;bottom: 0.75rem;

inset-3.5	top: 0.875rem;right: 0.875rem;bottom: 0.875rem;left: 0.875rem;
inset-x-3.5	left: 0.875rem;right: 0.875rem;
inset-y-3.5	top: 0.875rem;bottom: 0.875rem;

inset-4	top: 1rem;right: 1rem;bottom: 1rem;left: 1rem;
inset-x-4	left: 1rem;right: 1rem;
inset-y-4	top: 1rem;bottom: 1rem;

inset-5	top: 1.25rem;right: 1.25rem;bottom: 1.25rem;left: 1.25rem;
inset-x-5	left: 1.25rem;right: 1.25rem;
inset-y-5	top: 1.25rem;bottom: 1.25rem;

inset-6	top: 1.5rem;right: 1.5rem;bottom: 1.5rem;left: 1.5rem;
inset-x-6	left: 1.5rem;right: 1.5rem;
inset-y-6	top: 1.5rem;bottom: 1.5rem;

inset-7	top: 1.75rem;right: 1.75rem;bottom: 1.75rem;left: 1.75rem;
inset-x-7	left: 1.75rem;right: 1.75rem;
inset-y-7	top: 1.75rem;bottom: 1.75rem;

inset-8	top: 2rem;right: 2rem;bottom: 2rem;left: 2rem;
inset-x-8	left: 2rem;right: 2rem;
inset-y-8	top: 2rem;bottom: 2rem;

inset-9	top: 2.25rem;right: 2.25rem;bottom: 2.25rem;left: 2.25rem;
inset-x-9	left: 2.25rem;right: 2.25rem;
inset-y-9	top: 2.25rem;bottom: 2.25rem;

inset-10	top: 2.5rem;right: 2.5rem;bottom: 2.5rem;left: 2.5rem;
inset-x-10	left: 2.5rem;right: 2.5rem;
inset-y-10	top: 2.5rem;bottom: 2.5rem;

inset-11	top: 2.75rem;right: 2.75rem;bottom: 2.75rem;left: 2.75rem;
inset-x-11	left: 2.75rem;right: 2.75rem;
inset-y-11	top: 2.75rem;bottom: 2.75rem;

inset-12	top: 3rem;right: 3rem;bottom: 3rem;left: 3rem;
inset-x-12	left: 3rem;right: 3rem;
inset-y-12	top: 3rem;bottom: 3rem;

inset-14	top: 3.5rem;right: 3.5rem;bottom: 3.5rem;left: 3.5rem;
inset-x-14	left: 3.5rem;right: 3.5rem;
inset-y-14	top: 3.5rem;bottom: 3.5rem;

inset-16	top: 4rem;right: 4rem;bottom: 4rem;left: 4rem;
inset-x-16	left: 4rem;right: 4rem;
inset-y-16	top: 4rem;bottom: 4rem;

inset-20	top: 5rem;right: 5rem;bottom: 5rem;left: 5rem;
inset-x-20	left: 5rem;right: 5rem;
inset-y-20	top: 5rem;bottom: 5rem;

inset-24	top: 6rem;right: 6rem;bottom: 6rem;left: 6rem;
inset-x-24	left: 6rem;right: 6rem;
inset-y-24	top: 6rem;bottom: 6rem;

inset-28	top: 7rem;right: 7rem;bottom: 7rem;left: 7rem;
inset-x-28	left: 7rem;right: 7rem;
inset-y-28	top: 7rem;bottom: 7rem;

inset-32	top: 8rem;right: 8rem;bottom: 8rem;left: 8rem;
inset-x-32	left: 8rem;right: 8rem;
inset-y-32	top: 8rem;bottom: 8rem;

inset-36	top: 9rem;right: 9rem;bottom: 9rem;left: 9rem;
inset-x-36	left: 9rem;right: 9rem;
inset-y-36	top: 9rem;bottom: 9rem;

inset-40	top: 10rem;right: 10rem;bottom: 10rem;left: 10rem;
inset-x-40	left: 10rem;right: 10rem;
inset-y-40	top: 10rem;bottom: 10rem;

inset-44	top: 11rem;right: 11rem;bottom: 11rem;left: 11rem;
inset-x-44	left: 11rem;right: 11rem;
inset-y-44	top: 11rem;bottom: 11rem;

inset-48	top: 12rem;right: 12rem;bottom: 12rem;left: 12rem;
inset-x-48	left: 12rem;right: 12rem;
inset-y-48	top: 12rem;bottom: 12rem;
top-48	top: 12rem;

inset-52	top: 13rem;right: 13rem;bottom: 13rem;left: 13rem;
inset-x-52	left: 13rem;right: 13rem;
inset-y-52	top: 13rem;bottom: 13rem;
top-52	top: 13rem;

inset-56	top: 14rem;right: 14rem;bottom: 14rem;left: 14rem;
inset-x-56	left: 14rem;right: 14rem;
inset-y-56	top: 14rem;bottom: 14rem;
top-56	top: 14rem;

inset-60	top: 15rem;right: 15rem;bottom: 15rem;left: 15rem;
inset-x-60	left: 15rem;right: 15rem;
inset-y-60	top: 15rem;bottom: 15rem;
top-60	top: 15rem;

inset-64	top: 16rem;right: 16rem;bottom: 16rem;left: 16rem;
inset-x-64	left: 16rem;right: 16rem;
inset-y-64	top: 16rem;bottom: 16rem;
top-64	top: 16rem;

inset-72	top: 18rem;right: 18rem;bottom: 18rem;left: 18rem;
inset-x-72	left: 18rem;right: 18rem;
inset-y-72	top: 18rem;bottom: 18rem;
top-72	top: 18rem;

inset-80	top: 20rem;right: 20rem;bottom: 20rem;left: 20rem;
inset-x-80	left: 20rem;right: 20rem;
inset-y-80	top: 20rem;bottom: 20rem;
top-80	top: 20rem;

inset-96	top: 24rem;right: 24rem;bottom: 24rem;left: 24rem;
inset-x-96	left: 24rem;right: 24rem;
inset-y-96	top: 24rem;bottom: 24rem;
top-96	top: 24rem;

inset-auto	top: auto;right: auto;bottom: auto;left: auto;
// Başlarına - gelebilir
inset-1/2	top: 50%;right: 50%;bottom: 50%;left: 50%;
inset-1/3	top: 33.333333%;right: 33.333333%;bottom: 33.333333%;left: 33.333333%;
inset-2/3	top: 66.666667%;right: 66.666667%;bottom: 66.666667%;left: 66.666667%;
inset-1/4	top: 25%;right: 25%;bottom: 25%;left: 25%;
inset-2/4	top: 50%;right: 50%;bottom: 50%;left: 50%;
inset-3/4	top: 75%;right: 75%;bottom: 75%;left: 75%;
inset-full	top: 100%;right: 100%;bottom: 100%;left: 100%;

inset-x-auto	left: auto;right: auto;
inset-x-1/2	left: 50%;right: 50%;
inset-x-1/3	left: 33.333333%;right: 33.333333%;
inset-x-2/3	left: 66.666667%;right: 66.666667%;
inset-x-1/4	left: 25%;right: 25%;
inset-x-2/4	left: 50%;right: 50%;
inset-x-3/4	left: 75%;right: 75%;
inset-x-full	left: 100%;right: 100%;

inset-y-auto	top: auto;bottom: auto;
inset-y-1/2	top: 50%;bottom: 50%;
inset-y-1/3	top: 33.333333%;bottom: 33.333333%;
inset-y-2/3	top: 66.666667%;bottom: 66.666667%;
inset-y-1/4	top: 25%;bottom: 25%;
inset-y-2/4	top: 50%;bottom: 50%;
inset-y-3/4	top: 75%;bottom: 75%;
inset-y-full	top: 100%;bottom: 100%;

// top bottom left right , - olursa değerin başına eksi gelir
tblr-auto	top: auto;
tblr-1/2	top: 50%;
tblr-1/3	top: 33.333333%;
tblr-2/3	top: 66.666667%;
tblr-1/4	top: 25%;
tblr-2/4	top: 50%;
tblr-3/4	top: 75%;
tblr-full	top: 100%;

// örnek
-top-1/2	top: -50%;
-top-full	top: -100%;

```


- Usage
Use the {top|right|bottom|left|inset}-0 utilities to anchor absolutely positioned elements against any of the edges of the nearest positioned parent.

Combined with Tailwind’s padding and margin utilities, you’ll probably find that these are all you need to precisely control absolutely positioned elements.

```html
<!-- Span top edge -->
<div class="relative h-32 w-32 ...">
  <!-- h-16 , fakat width değer verilmedi,inset-x-0 (left ve right 0) yapıldığı için containing block'unun tüm genişliğini kaplayacaktır -->
  <div class="absolute inset-x-0 top-0 h-16 ...">1</div>
</div>

<!-- Span right edge -->
<div class="relative h-32 w-32 ...">
  <div class="absolute inset-y-0 right-0 w-16 ...">2</div>
</div>

<!-- Span bottom edge -->
<div class="relative h-32 w-32 ...">
  <div class="absolute inset-x-0 bottom-0 h-16 ...">3</div>
</div>

<!-- Span left edge -->
<div class="relative h-32 w-32 ...">
  <div class="absolute inset-y-0 left-0 w-16 ...">4</div>
</div>

<!-- Fill entire parent -->
<div class="relative h-32 w-32 ...">
  <div class="absolute inset-0 ...">5</div>
</div>

<!-- Pin to top left corner -->
<div class="relative h-32 w-32 ...">
  <div class="absolute left-0 top-0 h-16 w-16 ...">6</div>
</div>

<!-- Pin to top right corner -->
<div class="relative h-32 w-32 ...">
  <div class="absolute top-0 right-0 h-16 w-16 ...">7</div>
</div>

<!-- Pin to bottom right corner -->
<div class="relative h-32 w-32 ...">
  <div class="absolute bottom-0 right-0 h-16 w-16 ...">8</div>
</div>

<!-- Pin to bottom left corner -->
<div class="relative h-32 w-32 ...">
  <div class="absolute bottom-0 left-0 h-16 w-16 ...">9</div>
</div>

```

- Responsive

To position an element only at a specific breakpoint, add a {screen}: prefix to any existing positioning utility. For example, adding the class md:inset-y-0 to an element would apply the inset-y-0 utility at medium screen sizes and above.

```html
<div class="relative h-32 ...">
  <div class="absolute inset-0 md:inset-y-0 ..."></div>
</div>

```

## Visibility

Utilities for controlling the visibility of an element.

```html
Class       Properties
visible     visibility: visible;
invisible   visibility: hidden;

```

- Invisible

Use invisible to hide an element, but *still maintain its place in the DOM*, affecting the layout of other elements (compare with .hidden from the display documentation).

```html
<div class="flex justify-center space-x-4">
  <div>1</div>
  <div class="invisible ...">2</div>
  <div>3</div>
</div>

```

- Visible

Use visible to make an element visible. This is mostly useful for undoing the invisible utility at different screen sizes.

```html
<div class="flex justify-center space-x-4">
  <div>1</div>
  <div class="visible ...">2</div>
  <div>3</div>
</div>

```

- Responsive

To apply a visibility utility only at a specific breakpoint, add a {screen}: prefix to the existing class name. For example, adding the class md:invisible to an element would apply the invisible utility at medium screen sizes and above.

```html
<div class="visible md:invisible ..."></div>

```
## Z-Index

Utilities for controlling the stack order of an element.

```
Class     Properties
z-0       z-index: 0;
z-10      z-index: 10;
z-20      z-index: 20;
z-30      z-index: 30;
z-40      z-index: 40;
z-50      z-index: 50;
z-auto	  z-index: auto;

```

- Usage

Control the stack order (or three-dimensional positioning) of an element in Tailwind, regardless of order it has been displayed, using the z-{index} utilities.

```html
<div class="z-40 ...">5</div>
<div class="z-30 ...">4</div>
<div class="z-20 ...">3</div>
<div class="z-10 ...">2</div>
<div class="z-0 ...">1</div>

```

- Responsive

To control the z-index of an element at a specific breakpoint, add a {screen}: prefix to any existing z-index utility. For example, use md:z-50 to apply the z-50 utility at only medium screen sizes and above.

```html
<div class="z-0 md:z-50 ...">
  <!-- ... -->
</div>

```

# FLEXBOX AND GRID

## Flex Direction

Utilities for controlling the direction of flex items.

```
Class             Properties
flex-row	        flex-direction: row;
flex-row-reverse	flex-direction: row-reverse;
flex-col	        flex-direction: column;
flex-col-reverse	flex-direction: column-reverse;
```

- Row

Use flex-row to position flex items horizontally in the same direction as text:

```html
<div class="flex flex-row ...">
  <div>1</div>
  <div>2</div>
  <div>3</div>
</div>
```

- Row reversed

Use flex-row-reverse to position flex items horizontally in the opposite direction:

```html
<div class="flex flex-row-reverse ...">
  <div>1</div>
  <div>2</div>
  <div>3</div>
</div>
```

- Column

Use flex-col to position flex items vertically:

```html
<div class="flex flex-col ...">
  <div>1</div>
  <div>2</div>
  <div>3</div>
</div>
```

- Column reversed

Use flex-col-reverse to position flex items vertically in the opposite direction:

```html
<div class="flex flex-col-reverse ...">
  <div>1</div>
  <div>2</div>
  <div>3</div>
</div>
```

- Responsive

To apply a flex direction utility only at a specific breakpoint, add a {screen}: prefix to the existing class name. For example, adding the class md:flex-row to an element would apply the flex-row utility at medium screen sizes and above.

```html
<div class="flex flex-col md:flex-row ...">
    <!-- ... -->
</div>
```

## Flex Wrap

Utilities for controlling how flex items wrap.

```
Class             Properties
flex-wrap	        flex-wrap: wrap;
flex-wrap-reverse	flex-wrap: wrap-reverse;
flex-nowrap	      flex-wrap: nowrap;
```

- Don't wrap
Use flex-nowrap to prevent flex items from wrapping, causing inflexible items to overflow the container if necessary:

```html
<div class="flex flex-nowrap">
  <div>1</div>
  <div>2</div>
  <div>3</div>
</div>


```

- Wrap Normally

Use flex-wrap to allow flex items to wrap:

```html
<div class="flex flex-wrap ...">
  <div class="w-1/2 bg-red-200">1</div>
  <div class="w-1/2 bg-yellow-50">2</div>
  <div class="w-1/2 bg-yellow-300">3</div>
</div>
```

- Wrap reversed

Use flex-wrap-reverse to wrap flex items in the reverse direction:

```html
<div class="flex flex-wrap-reverse">
  <div>1</div>
  <div>2</div>
  <div>3</div>
</div>
```

Burada alttan devam etmesi yerine,satır atlamayı yukarı doğru yapar.

- Responsive

To control how flex items wrap at a specific breakpoint, add a {screen}: prefix to any existing utility class. For example, use md:flex-wrap-reverse to apply the flex-wrap-reverse utility at only medium screen sizes and above.

```html
<div class="flex flex-wrap md:flex-wrap-reverse ...">
  <!-- ... -->
</div>
```

## Flex

Utilities for controlling how flex items both grow and shrink.

```
Class         Properties
flex-1	      flex: 1 1 0%;
flex-auto	    flex: 1 1 auto;
flex-initial	flex: 0 1 auto;
flex-none	    flex: none;
```

- Note : "flex" 
 
This is the shorthand for flex-grow, flex-shrink and flex-basis combined. The second and third parameters (flex-shrink and flex-basis) are optional. The default is 0 1 auto, but if you set it with a single number value, it’s like 1 0.

```css
.item {
  flex: none | [ <'flex-grow'> <'flex-shrink'>? || <'flex-basis'> ]
}
```

- Note : "flex-basis"
  
This defines the default size of an element before the remaining space is distributed. It can be a length (e.g. 20%, 5rem, etc.) or a keyword. The auto keyword means “look at my width or height property” (which was temporarily done by the main-size keyword until deprecated). The content keyword means “size it based on the item’s content” – this keyword isn’t well supported yet, so it’s hard to test and harder to know what its brethren max-content, min-content, and fit-content do.

```css
.item {
  flex-basis:  | auto; /* default auto */
}
```

If set to 0, the extra space around content isn’t factored in. If set to auto, the extra space is distributed based on its flex-grow value.

- Initial

Use flex-initial to allow a flex item to shrink but not grow, taking into account its initial size:

```html
<div class="flex">
  <div class="flex-initial ...">
    <!-- Won't grow, but will shrink if needed -->
  </div>
  <div class="flex-initial ...">
    <!-- Won't grow, but will shrink if needed -->
  </div>
  <div class="flex-initial ...">
    <!-- Won't grow, but will shrink if needed -->
  </div>
</div>
```

- Flex 1

Use flex-1 to allow a flex item to grow and shrink as needed, ignoring its initial size:

```html
<div class="flex">
  <div class="flex-1 ...">
    <!-- Will grow and shrink as needed without taking initial size into account -->
  </div>
  <div class="flex-1 ...">
    <!-- Will grow and shrink as needed without taking initial size into account -->
  </div>
  <div class="flex-1 ...">
    <!-- Will grow and shrink as needed without taking initial size into account -->
  </div>
</div>
```

- Auto

Use flex-auto to allow a flex item to grow and shrink, taking into account its initial size:


```html
<div class="flex ...">
  <div class="flex-auto ...">
    <!-- Will grow and shrink as needed taking initial size into account -->
  </div>
  <div class="flex-auto ...">
    <!-- Will grow and shrink as needed taking initial size into account -->
  </div>
  <div class="flex-auto ...">
    <!-- Will grow and shrink as needed taking initial size into account -->
  </div>
</div>
```

- None

Use flex-none to prevent a flex item from growing or shrinking:

```html
<div class="flex ...">
  <div class="flex-1 ...">
    <!-- Will grow and shrink as needed -->
  </div>
  <div class="flex-none ...">
    <!-- Will not grow or shrink -->
  </div>
  <div class="flex-1 ...">
    <!-- Will grow and shrink as needed -->
  </div>
</div>
```

- Responsive
 
To control how a flex item both grows and shrinks at a specific breakpoint, add a {screen}: prefix to any existing utility class. For example, use md:flex-1 to apply the flex-1 utility at only medium screen sizes and above.

```html
<div class="flex ...">
  <!-- ... -->
  <div class="flex-none md:flex-1 ...">
    Responsive flex item
  </div>
  <!-- ... -->
</div>
```

- Source

https://tailwindcss.com/docs/flex

## Flex Grow

Utilities for controlling how flex items grow.

```
Class           Properties
flex-grow-0	    flex-grow: 0;
flex-grow       flex-grow: 1;
```

- Grow

Use flex-grow to allow a flex item to grow to fill any available space:

```html
<div class="flex ...">
  <div class="flex-none w-16 h-16 ...">
    <!-- This item will not grow -->
  </div>
  <div class="flex-grow h-16 ...">
    <!-- This item will grow -->
  </div>
  <div class="flex-none w-16 h-16 ...">
    <!-- This item will not grow -->
  </div>
</div>
```
- Don't grow

Use flex-grow-0 to prevent a flex item from growing:

```html
<div class="flex ...">
  <div class="flex-grow h-16 ...">
    <!-- This item will grow -->
  </div>
  <div class="flex-grow-0 h-16 ...">
    <!-- This item will not grow -->
  </div>
  <div class="flex-grow h-16 ...">
    <!-- This item will grow -->
  </div>
</div>
```

- Responsive

To control how a flex item grows at a specific breakpoint, add a {screen}: prefix to any existing utility class. For example, use md:flex-grow-0 to apply the flex-grow-0 utility at only medium screen sizes and above.

```html
<div class="flex ...">
  <!-- ... -->
  <div class="flex-grow md:flex-grow-0 ...">
    Responsive flex item
  </div>
  <!-- ... -->
</div>
```

- Source

https://tailwindcss.com/docs/flex-grow

## Flex Shrink

Utilities for controlling how flex items shrink.

```
Class           Properties
flex-shrink-0   flex-shrink: 0;
flex-shrink     flex-shrink: 1;

```

- Shrink

Use flex-shrink to allow a flex item to shrink if needed:

```html
<div class="flex ...">
  <div class="flex-grow w-16 h-16 ...">
    <!-- This item will grow or shrink as needed -->
  </div>
  <div class="flex-shrink w-64 h-16 ...">
    <!-- This item will shrink -->
  </div>
  <div class="flex-grow w-16 h-16 ...">
    <!-- This item will grow or shrink as needed -->
  </div>
</div>
```

Ortadaki blok küçülebilir ve de tekrar w-64 kadar büyüyebilir, fakat ondan sonra sabit kalır.

- Don't shrink

Use flex-shrink-0 to prevent a flex item from shrinking:


```html
<div class="flex ...">
  <div class="flex-1 h-16 ...">
    <!-- This item will grow or shrink as needed -->
  </div>
  <div class="flex-shrink-0 h-16 w-32 ...">
    <!-- This item will not shrink below its initial size-->
  </div>
  <div class="flex-1 h-16 ...">
    <!-- This item will grow or shrink as needed -->
  </div>
</div>
```

- Responsive

To control how a flex item shrinks at a specific breakpoint, add a {screen}: prefix to any existing utility class. For example, use md:flex-shrink-0 to apply the flex-shrink-0 utility at only medium screen sizes and above.

```html
<div class="flex ...">
  <!-- ... -->
  <div class="flex-shrink md:flex-shrink-0 ...">
    Responsive flex item
  </div>
  <!-- ... -->
</div>
```

## Order

Utilities for controlling the order of flex and grid items.

```
Class     Properties
order-1	    order: 1;
order-2	    order: 2;
order-3	    order: 3;
order-4	    order: 4;
order-5	    order: 5;
order-6	    order: 6;
order-7	    order: 7;
order-8	    order: 8;
order-9	    order: 9;
order-10	  order: 10;
order-11	  order: 11;
order-12	  order: 12;
order-first	order: -9999;
order-last	order: 9999;
order-none	order: 0;
```

- Usage

Use order-{order} to render flex and grid items in a different order than they appear in the DOM.

```html
<div class="flex justify-between ...">
  <div class="order-last">1</div>
  <div>2</div>
  <div>3</div>
</div>
```

- Responsive

To apply an order utility only at a specific breakpoint, add a {screen}: prefix to the existing class name. For example, adding the class md:order-last to an element would apply the order-last utility at medium screen sizes and above.

```html
<div class="flex">
  <div>1</div>
  <div class="order-first md:order-last">2</div>
  <div>3</div>
</div>
```

- Source
  
https://tailwindcss.com/docs/order


## Grid Template Columns

Utilities for specifying the columns in a grid layout.

daha sonra devam edilecek @@@

## Gap

Utilities for controlling *gutters* between *grid and flexbox items*.

```
Class Properties
gap-0	gap: 0px;
gap-x-0	column-gap: 0px;
gap-y-0	row-gap: 0px;
gap-px	gap: 1px;
gap-x-px	column-gap: 1px;
gap-y-px	row-gap: 1px;
gap-0.5	gap: 0.125rem;
gap-x-0.5	column-gap: 0.125rem;
gap-y-0.5	row-gap: 0.125rem;
gap-1	gap: 0.25rem;
gap-x-1	column-gap: 0.25rem;
gap-y-1	row-gap: 0.25rem;
gap-1.5	gap: 0.375rem;
gap-x-1.5	column-gap: 0.375rem;
gap-y-1.5	row-gap: 0.375rem;
gap-2	gap: 0.5rem;
gap-x-2	column-gap: 0.5rem;
gap-y-2	row-gap: 0.5rem;
gap-2.5	gap: 0.625rem;
gap-x-2.5	column-gap: 0.625rem;
gap-y-2.5	row-gap: 0.625rem;
gap-3	gap: 0.75rem;
gap-x-3	column-gap: 0.75rem;
gap-y-3	row-gap: 0.75rem;
gap-3.5	gap: 0.875rem;
gap-x-3.5	column-gap: 0.875rem;
gap-y-3.5	row-gap: 0.875rem;
gap-4	gap: 1rem;
gap-x-4	column-gap: 1rem;
gap-y-4	row-gap: 1rem;
gap-5	gap: 1.25rem;
gap-x-5	column-gap: 1.25rem;
gap-y-5	row-gap: 1.25rem;
gap-6	gap: 1.5rem;
gap-x-6	column-gap: 1.5rem;
gap-y-6	row-gap: 1.5rem;
gap-7	gap: 1.75rem;
gap-x-7	column-gap: 1.75rem;
gap-y-7	row-gap: 1.75rem;
gap-8	gap: 2rem;
gap-x-8	column-gap: 2rem;
gap-y-8	row-gap: 2rem;
gap-9	gap: 2.25rem;
gap-x-9	column-gap: 2.25rem;
gap-y-9	row-gap: 2.25rem;
gap-10	gap: 2.5rem;
gap-x-10	column-gap: 2.5rem;
gap-y-10	row-gap: 2.5rem;
gap-11	gap: 2.75rem;
gap-x-11	column-gap: 2.75rem;
gap-y-11	row-gap: 2.75rem;
gap-12	gap: 3rem;
gap-x-12	column-gap: 3rem;
gap-y-12	row-gap: 3rem;
gap-14	gap: 3.5rem;
gap-x-14	column-gap: 3.5rem;
gap-y-14	row-gap: 3.5rem;
gap-16	gap: 4rem;
gap-x-16	column-gap: 4rem;
gap-y-16	row-gap: 4rem;
gap-20	gap: 5rem;
gap-x-20	column-gap: 5rem;
gap-y-20	row-gap: 5rem;
gap-24	gap: 6rem;
gap-x-24	column-gap: 6rem;
gap-y-24	row-gap: 6rem;
gap-28	gap: 7rem;
gap-x-28	column-gap: 7rem;
gap-y-28	row-gap: 7rem;
gap-32	gap: 8rem;
gap-x-32	column-gap: 8rem;
gap-y-32	row-gap: 8rem;
gap-36	gap: 9rem;
gap-x-36	column-gap: 9rem;
gap-y-36	row-gap: 9rem;
gap-40	gap: 10rem;
gap-x-40	column-gap: 10rem;
gap-y-40	row-gap: 10rem;
gap-44	gap: 11rem;
gap-x-44	column-gap: 11rem;
gap-y-44	row-gap: 11rem;
gap-48	gap: 12rem;
gap-x-48	column-gap: 12rem;
gap-y-48	row-gap: 12rem;
gap-52	gap: 13rem;
gap-x-52	column-gap: 13rem;
gap-y-52	row-gap: 13rem;
gap-56	gap: 14rem;
gap-x-56	column-gap: 14rem;
gap-y-56	row-gap: 14rem;
gap-60	gap: 15rem;
gap-x-60	column-gap: 15rem;
gap-y-60	row-gap: 15rem;
gap-64	gap: 16rem;
gap-x-64	column-gap: 16rem;
gap-y-64	row-gap: 16rem;
gap-72	gap: 18rem;
gap-x-72	column-gap: 18rem;
gap-y-72	row-gap: 18rem;
gap-80	gap: 20rem;
gap-x-80	column-gap: 20rem;
gap-y-80	row-gap: 20rem;
gap-96	gap: 24rem;
gap-x-96	column-gap: 24rem;
gap-y-96	row-gap: 24rem;
```

- Usage

Use gap-{size} to change the gap between both rows and columns in grid and flexbox layouts.

```html
<div class="grid gap-12 grid-cols-2">
  <div class="bg-yellow-300" >1</div>
  <div class="bg-yellow-300">2</div>
  <div class="bg-yellow-300">3</div>
  <div class="bg-yellow-300">4</div>
</div>
```

- Changing row and column gaps independently

Use gap-x-{size} and gap-y-{size} to change the gap between rows and columns independently.

```html
<div class="grid gap-x-8 gap-y-4 grid-cols-3">
  <div>1</div>
  <div>2</div>
  <div>3</div>
  <div>4</div>
  <div>5</div>
  <div>6</div>
</div>
```

- Responsive

To control the gap at a specific breakpoint, add a {screen}: prefix to any existing gap utility. For example, use md:gap-6 to apply the gap-6 utility at only medium screen sizes and above.

```html
<div class="grid gap-4 md:gap-6 ...">
  <!-- ... -->
</div>
```

- Source

https://tailwindcss.com/docs/gap

## Justify Content

Utilities for controlling how flex and grid items are positioned along a container's main axis. 

```
Class Properties
justify-start	  justify-content: flex-start;
justify-end	    justify-content: flex-end;
justify-center	justify-content: center;
justify-between	justify-content: space-between;
justify-around	justify-content: space-around;
justify-evenly	justify-content: space-evenly;
```

- Note : main axis

Flex-row da ana eksen x koordinatıdır (yatayda hizalama - yatayda sağa,sola,ortaya vs...), flex-column da y koordinatıdır (dikey). Flex-row için kutular yatayda sağa yaslı olacak, ortaya konumlandırılacak gibi.

- Start

Use justify-start to justify items against the start of the container’s main axis:

```html
<div class="flex justify-start ...">
  <div>1</div>
  <div>2</div>
  <div>3</div>
</div>
```

- Center

Use justify-center to justify items along the center of the container’s main axis:

```html
<div class="flex justify-center ...">
  <div>1</div>
  <div>2</div>
  <div>3</div>
</div>
```

- End

Use justify-end to justify items against the end of the container’s main axis:

```html
<div class="flex justify-end ...">
  <div>1</div>
  <div>2</div>
  <div>3</div>
</div>
```

- Space between

Use justify-between to justify items along the container’s main axis such that there is an equal amount of space between each item:

```html
<div class="flex justify-between ...">
  <div>1</div>
  <div>2</div>
  <div>3</div>
</div>
```

- Space around
  
Use justify-around to justify items along the container’s main axis such that there is an equal amount of space on each side of each item:

```html
<div class="flex justify-around ...">
  <div>1</div>
  <div>2</div>
  <div>3</div>
</div>
```

- Space evenly

Use justify-evenly to justify items along the container’s main axis such that there is an equal amount of space around each item, but also accounting for the doubling of space you would normally see between each item when using justify-around:

```html
<div class="flex justify-evenly ...">
  <div>1</div>
  <div>2</div>
  <div>3</div>
</div>
```

- Responsive

To justify flex items at a specific breakpoint, add a {screen}: prefix to any existing utility class. For example, use md:justify-between to apply the justify-between utility at only medium screen sizes and above.

```html
<div class="justify-start md:justify-between ...">
  <!-- ... -->
</div>
```

## Justify Items

Utilities for controlling how grid items are aligned along their inline axis.

```
Class Properties
justify-items-start	justify-items: start;
justify-items-end	justify-items: end;
justify-items-center	justify-items: center;
justify-items-stretch	justify-items: stretch;
```

- Start

Use justify-items-start to justify grid items against the start of their inline axis:

```html
<div class="grid justify-items-start ...">
  <div>1</div>
  <div>2</div>
  <div>3</div>
  <div>4</div>
  <div>5</div>
  <div>6</div>
</div>
```

- End

Use justify-items-end to justify grid items against the end of their inline axis:

```html
<div class="grid justify-items-end ...">
  <div>1</div>
  <div>2</div>
  <div>3</div>
  <div>4</div>
  <div>5</div>
  <div>6</div>
</div>
```

- Center

Use justify-items-center to justify grid items along their inline axis:


- Stretch
Use justify-items-stretch to stretch items along their inline axis:

- Responsive

To justify flex items at a specific breakpoint, add a {screen}: prefix to any existing utility class. For example, use md:justify-items-center to apply the justify-items-center utility at only medium screen sizes and above.

```html
<div class="justify-items-start md:justify-items-center">
  <!-- ... -->
</div>

```

https://tailwindcss.com/docs/justify-items

## Justify Self

Utilities for controlling how an individual grid item is aligned along its inline axis.

```
Class Properties
justify-self-auto	justify-self: auto;
justify-self-start	justify-self: start;
justify-self-end	justify-self: end;
justify-self-center	justify-self: center;
justify-self-stretch	justify-self: stretch;

```
- Auto

Use justify-self-auto to align an item based on the value of the grid’s justify-items property:

```html
<div class="grid justify-items-stretch ...">
  <!-- ... -->
  <div class="justify-self-auto ...">1</div>
  <!-- ... -->
  <!-- ... -->
  <!-- ... -->
  <!-- ... -->
</div>
```

- Start

Use justify-self-start to align a grid item to the start its inline axis:


- Center

Use justify-self-center to align a grid item along the center its inline axis:

- End

Use justify-self-end to align a grid item to the end its inline axis:


- Stretch

Use justify-self-stretch to stretch a grid item to fill the grid area on its inline axis:

- Responsive

To control the alignment of a grid item inside its grid area at a specific breakpoint, add a {screen}: prefix to any existing utility class. For example, use md:justify-self-end to apply the justify-self-end utility at only medium screen sizes and above.

https://tailwindcss.com/docs/justify-self

## Align Content

Utilities for controlling how rows are positioned in multi-row flex and grid containers.

```
Class Properties
content-center	align-content: center;
content-start	align-content: flex-start;
content-end	align-content: flex-end;
content-between	align-content: space-between;
content-around	align-content: space-around;
content-evenly	align-content: space-evenly;

```

- Start

Use content-start to pack rows in a container against the start of the cross axis:

```html
<div class="h-48 flex flex-wrap content-start ...">
  <div>1</div>
  <div>2</div>
  <div>3</div>
  <div>4</div>
  <div>5</div>
</div>
```

- Center

Use content-center to pack rows in a container in the center of the cross axis:


- End

Use content-end to pack rows in a container against the end of the cross axis:

- Space between

Use content-between to distribute rows in a container such that there is an equal amount of space between each line:

- Space around

Use content-around to distribute rows in a container such that there is an equal amount of space around each line:

- Space evenly

Use content-evenly to distribute rows in a container such that there is an equal amount of space around each item, but also accounting for the doubling of space you would normally see between each item when using content-around:

- Responsive
To control the alignment of flex content at a specific breakpoint, add a {screen}: prefix to any existing utility class. For example, use md:content-around to apply the content-around utility at only medium screen sizes and above.

```html
<div class="content-start md:content-around ...">
  <!-- ... -->
</div>

```

https://tailwindcss.com/docs/align-content

## Align Items

Utilities for controlling how flex and grid items are positioned along a container's cross axis.

```
Class Properties
items-start	align-items: flex-start;
items-end	align-items: flex-end;
items-center	align-items: center;
items-baseline	align-items: baseline;
items-stretch	align-items: stretch;

```

- Stretch

Use items-stretch to stretch items to fill the container’s cross axis:

```html
<div class="flex items-stretch ...">
  <div class="py-4">1</div>
  <div class="py-12">2</div>
  <div class="py-8">3</div>
</div>
```

- Start

Use items-start to align items to the start of the container’s cross axis:

- Center

Use items-center to align items along the center of the container’s cross axis:

- End

Use items-end to align items to the end of the container’s cross axis:

- Baseline

Use items-baseline to align items along the container’s cross axis such that all of their baselines align:


- Responsive

To control the alignment of flex items at a specific breakpoint, add a {screen}: prefix to any existing utility class. For example, use md:items-center to apply the items-center utility at only medium screen sizes and above.

<div class="items-stretch md:items-center ...">
  <!-- ... -->
</div>

https://tailwindcss.com/docs/align-items

## Align Self

Utilities for controlling how an individual flex or grid item is positioned along its container's cross axis.

```
Class Properties
self-auto	align-self: auto;
self-start	align-self: flex-start;
self-end	align-self: flex-end;
self-center	align-self: center;
self-stretch	align-self: stretch;

```

- Auto

Use self-auto to align an item based on the value of the container’s align-items property:

```html
<div class="flex items-stretch ...">
  <div>1</div>
  <div class="self-auto ...">2</div>
  <div>3</div>
</div>
```

@@@


# SPACING

## Padding

## Margin

## Space Between


# SIZING

## Width

Utilities for setting the width of an element

```
w-auto	    width: auto;
w-full      width: 100%;
w-screen	width: 100vw;
w-min	    width: min-content;
w-max	    width: max-content;
// unit
w-0       width: 0px;
w-5	      width: 1.25rem;
w-px      width: 1px;
w-7	      width: 1.75rem;
w-0.5     width: 0.125rem;
w-9	      width: 2.25rem;
w-1       width: 0.25rem;
w-11      width: 2.75rem;
w-1.5     width: 0.375rem;
w-14      width: 3.5rem;
w-2       width: 0.5rem;
w-20      width: 5rem;
w-2.5     width: 0.625rem;
w-28      width: 7rem;
w-3	      width: 0.75rem;
w-36      width: 9rem;
w-3.5     width: 0.875rem;
w-44	    width: 11rem;
w-4	      width: 1rem;
w-52	    width: 13rem;
w-6	      width: 1.5rem;
w-60	    width: 15rem;
w-8	      width: 2rem;
w-72	    width: 18rem;
w-10      width: 2.5rem;
w-96      width: 24rem;
w-12      width: 3rem;
w-1/3     width: 33.333333%;
w-16      width: 4rem;
w-1/4     width: 25%;
w-24      width: 6rem;
w-3/4     width: 75%;
w-32      width: 8rem;
w-2/5     width: 40%;
w-40      width: 10rem;
w-4/5	    width: 80%;
w-48	    width: 12rem;
w-2/6	    width: 33.333333%;
w-56	    width: 14rem;
w-4/6	    width: 66.666667%;
w-64	    width: 16rem;
w-1/12	  width: 8.333333%;
w-80	    width: 20rem;
w-3/12	  width: 25%;
w-1/2	    width: 50%;
w-5/12	  width: 41.666667%;
w-2/3	    width: 66.666667%;
w-7/12	  width: 58.333333%;
w-2/4	    width: 50%;
w-9/12	  width: 75%;
w-1/5	    width: 20%;
w-11/12	  width: 91.666667%;
w-3/5	    width: 60%;
w-1/6	    width: 16.666667%;
w-3/6	    width: 50%;
w-5/6	    width: 83.333333%;
w-2/12	  width: 16.666667%;
w-4/12	  width: 33.333333%;
w-6/12	  width: 50%;
w-8/12	  width: 66.666667%;
w-10/12	  width: 83.333333%;
```

- Auto

Use w-auto to let the browser calculate and select the width for the element. You can use it to unset a specific width:

```html
<div class="w-24 md:w-auto ..."></div>
```
- Screen Width

Use w-screen to make an element span the entire width of the viewport (100vw). 

```html
<div class="h-12 w-screen"></div>

```

- Fixed Width
Use w-{number} or w-px to set an element to a fixed width

```html
<div>
  <div class="w-8 ..."></div>
  <div class="w-12 ..."></div>
  <div class="w-16 ..."></div>
  <div class="w-24 ..."></div>
</div>
```


- Fluid Width
Use w-{fraction} or w-full to set an element to a percentage based width.

```html
<div class="flex ...">
  <div class="w-1/2 ... ">w-1/2</div>
  <div class="w-1/2 ... ">w-1/2</div>
</div>
<div class="flex ...">
  <div class="w-2/5 ...">w-2/5</div>
  <div class="w-3/5 ...">w-3/5</div>
</div>
<div class="flex ...">
  <div class="w-1/3 ...">w-1/3</div>
  <div class="w-2/3 ...">w-2/3</div>
</div>
<div class="flex ...">
  <div class="w-1/4 ...">w-1/4</div>
  <div class="w-3/4 ...">w-3/4</div>
</div>
<div class="flex ...">
  <div class="w-1/5 ...">w-1/5</div>
  <div class="w-4/5 ...">w-4/5</div>
</div>
<div class="flex ...">
  <div class="w-1/6 ...">w-1/6</div>
  <div class="w-5/6 ...">w-5/6</div>
</div>
<div class="w-full ...">w-full</div>
```

![](https://image.prntscr.com/image/fP7SpIB5Sheu7Z0kJRTmvg.png)

- Responsive

To control the width of an element at a specific breakpoint, add a {screen}: prefix to any existing width utility. For example, adding the class md:w-full to an element would apply the w-full utility at medium screen sizes and above.

```html
<div class="w-1/2 md:w-full ...">
  <!-- ... -->
</div>
```

- Source

https://tailwindcss.com/docs/width

## Min-Width

Utilities for setting the minimum width of an element

```css
Class Properties
min-w-0	min-width: 0px;
min-w-full	min-width: 100%;
min-w-min	min-width: min-content;
min-w-max	min-width: max-content;
```

- Usage

Set the minimum width of an element using the min-w-0 or min-w-full utilities.

```html
<div class="w-24 min-w-full ...">
  min-w-full
</div>
```

- Responsive

To control the min-width of an element at a specific breakpoint, add a {screen}: prefix to any existing min-width utility.

```html
<div class="w-24 min-w-full md:min-w-0 ...">
  <!-- ... -->
</div>

```

- Source

https://tailwindcss.com/docs/min-width


## Max Width

Utilities for setting the maximum width of an element

```
Class             Properties
max-w-0	          max-width: 0rem;
max-w-none	      max-width: none;
max-w-xs	        max-width: 20rem;
max-w-sm	        max-width: 24rem;
max-w-md	        max-width: 28rem;
max-w-lg	        max-width: 32rem;
max-w-xl	        max-width: 36rem;
max-w-2xl	        max-width: 42rem;
max-w-3xl	        max-width: 48rem;
max-w-4xl	        max-width: 56rem;
max-w-5xl	        max-width: 64rem;
max-w-6xl	        max-width: 72rem;
max-w-7xl	        max-width: 80rem;
max-w-full	      max-width: 100%;
max-w-min	        max-width: min-content;
max-w-max	        max-width: max-content;
max-w-prose	      max-width: 65ch;
max-w-screen-sm	  max-width: 640px;
max-w-screen-md	  max-width: 768px;
max-w-screen-lg	  max-width: 1024px;
max-w-screen-xl	  max-width: 1280px;
max-w-screen-2xl	max-width: 1536px;

```

- Usage

Set the maximum width of an element using the max-w-{size} utilities.

```html
<div class="max-w-md mx-auto ...">
  <!-- ... -->
</div>
```

- Reading width

The max-w-prose utility gives an element a max-width optimized for readability and adapts based on the font size.

```html
<div class="text-sm max-w-prose ...">
  <p>Dolore iste eaque molestias. Eius iure ut eaque accusantium. Voluptas repellendus nobis. Saepe nam accusantium magni veniam qui enim mollitia excepturi sapiente.</p>
</div>

<div class="text-base max-w-prose ...">
  <p>Dolore iste eaque molestias. Eius iure ut eaque accusantium. Voluptas repellendus nobis. Saepe nam accusantium magni veniam qui enim mollitia excepturi sapiente.</p>
</div>

<div class="text-xl max-w-prose ...">
  <p>Dolore iste eaque molestias. Eius iure ut eaque accusantium. Voluptas repellendus nobis. Saepe nam accusantium magni veniam qui enim mollitia excepturi sapiente.</p>
</div>
```

- Constraining to your breakpoints

The max-w-screen-{breakpoint} classes can be used to give an element a max-width matching a specific breakpoint. These values are automatically derived from the theme.screens section of your tailwind.config.js file.

```html
<div class="max-w-screen-2xl">
  <!-- ... -->
</div>
```

- Responsive

To control the max-width of an element at a specific breakpoint, add a {screen}: prefix to any existing max-width utility.

```html
<div class="max-w-sm md:max-w-lg ...">
  <!-- ... -->
</div>

```

## Height

Utilities for setting the height of an element

```css
Class
Properties
h-0	height: 0px;
h-px	height: 1px;
h-0.5	height: 0.125rem;
h-1	height: 0.25rem;
h-1.5	height: 0.375rem;
h-2	height: 0.5rem;
h-2.5	height: 0.625rem;
h-3	height: 0.75rem;
h-3.5	height: 0.875rem;
h-4	height: 1rem;
h-5	height: 1.25rem;
h-6	height: 1.5rem;
h-7	height: 1.75rem;
h-8	height: 2rem;
h-9	height: 2.25rem;
h-10	height: 2.5rem;
h-11	height: 2.75rem;
h-12	height: 3rem;
h-14	height: 3.5rem;
h-16	height: 4rem;
h-20	height: 5rem;
h-24	height: 6rem;
h-28	height: 7rem;
h-32	height: 8rem;
h-36	height: 9rem;
h-40	height: 10rem;
h-44	height: 11rem;
h-48	height: 12rem;
h-52	height: 13rem;
h-56	height: 14rem;
h-60	height: 15rem;
h-64	height: 16rem;
h-72	height: 18rem;
h-80	height: 20rem;
h-96	height: 24rem;
h-auto	height: auto;
h-1/2	height: 50%;
h-1/3	height: 33.333333%;
h-2/3	height: 66.666667%;
h-1/4	height: 25%;
h-2/4	height: 50%;
h-3/4	height: 75%;
h-1/5	height: 20%;
h-2/5	height: 40%;
h-3/5	height: 60%;
h-4/5	height: 80%;
h-1/6	height: 16.666667%;
h-2/6	height: 33.333333%;
h-3/6	height: 50%;
h-4/6	height: 66.666667%;
h-5/6	height: 83.333333%;
h-full	height: 100%;
h-screen	height: 100vh;
```

- Auto

Use h-auto to let the browser determine the height for the element.

```html
<div class="h-auto ...">h-auto</div>
```

- Screen height

Use h-screen to make an element span the entire height of the viewport.

```html
<div class="h-screen p-6 ...">h-screen</div>
```

- Fixed height

Use h-{number} or h-px to set an element to a fixed height.

```html
<div>
    <div class="h-8 ..."></div>
    <div class="h-12 ..."></div>
    <div class="h-16 ..."></div>
    <div class="h-24 ..."></div>
</div>

```

- Full height

Use h-full to set an element’s height to 100% of its parent, as long as the parent has a defined height.

```html
<div class="h-48">
  <div class="h-full ...">h-full</div>
</div>

```

- Responsive

To control the height of an element at a specific breakpoint, add a {screen}: prefix to any existing width utility. For example, adding the class md:h-full to an element would apply the h-full utility at medium screen sizes and above.

```html
<div class="h-8 md:h-full"></div>
```

## Min-Height

Utilities for setting the minimum height of an element

```css
Class Properties
min-h-0	min-height: 0px;
min-h-full	min-height: 100%;
min-h-screen	min-height: 100vh;
```

- Usage

Set the minimum height of an element using the min-h-0, min-h-full, or min-h-screen utilities.

```html
<div class="h-48 ...">
  <div class="h-24 min-h-full ...">
    .min-h-full
  </div>
</div>
```

- Responsive

To control the min-height of an element at a specific breakpoint, add a {screen}: prefix to any existing min-height utility.

```html
<div class="h-48 ...">
  <div class="h-24 min-h-0 md:min-h-full ...">
    <!-- ... -->
  </div>
</div>
```

- Source

https://tailwindcss.com/docs/min-height


## Max Height

@@@


# Typography

## Font Family

## Font Size

## Font Smoothing

# Backgrounds

# Borders

# Effects

# Filters

# Tables

# Transitions and Animations

# Transforms

# Interactivity

# SVG

# Accesibility

# Official Plugins


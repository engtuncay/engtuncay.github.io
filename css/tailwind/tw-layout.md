
- [Layout](#layout)
  - [Container](#container)
    - [To center a container](#to-center-a-container)
    - [To Add Horizontal padding To A Container](#to-add-horizontal-padding-to-a-container)
    - [Responsive variants](#responsive-variants)
  - [Box Sizing](#box-sizing)
  - [Display](#display)
  - [Position](#position)
  - [Top / Right / Bottom / Left](#top--right--bottom--left)
  - [Floats](#floats)
  - [Clear](#clear)
  - [Visibility](#visibility)
  - [Z-Index](#z-index)
  - [Isolation ???](#isolation-)
  - [Object Fit](#object-fit)
  - [Object Position](#object-position)
  - [Overflow](#overflow)
  - [Overscroll Behavior](#overscroll-behavior)
  - [Box Decoration Break](#box-decoration-break)
- [Responsive Note](#responsive-note)


# Layout

## Container

A component for fixing an element's width to the current breakpoint.

Class         | Breakpoint | Properties
--------------|------------|-------------------
container     | None       | width: 100%;
sm:container  | sm         | max-width: 640px;
md:container  | md         | max-width: 768px;
lg:container  | lg         | max-width: 1024px;
xl:container  | xl         | max-width: 1280px;
2xl:container | 2xl        | max-width: 1536px;

(tor: Responsive variant'lara max-width tanımlanıyor. max-width aşan kısma margin uygulanıyor. ortalamak için margin auto yapılması gerekir. Md (768-1024px) ekran 768 den 1024'e dogru gittikçe margin oluşturur.)

(tor:breakpoint: kesim noktası)

**Usage**

The container class sets the *max-width* of an element to match the min-width of the current breakpoint. This is useful if you’d prefer to design for a fixed set of screen sizes instead of trying to accommodate a **fully fluid viewport**.

Note that unlike containers you might have used in other frameworks, Tailwind’s container does not center itself automatically and does not have any built-in horizontal padding.

### To center a container

To center a container, use the mx-auto utility (margin-x:auto):

```html
<div class="container mx-auto">
  <!-- ... -->
</div>
```

### To Add Horizontal padding To A Container

To add horizontal padding, use the px-{size} utilities:

```html
<div class="container mx-auto px-4">
  <!-- ... -->
</div>
```

If you’d like to center your containers by default or include default horizontal padding, see the customization options below. 

### Responsive variants

The container class also includes responsive variants like md:container by default that allow you to make something behave like a container at only a certain breakpoint and up:

```html
<!-- Full-width fluid until the `md` breakpoint, then lock to container -->
<div class="md:container md:mx-auto">
  <!-- ... -->
</div>
```
  
https://tailwindcss.com/docs/container

## Box Sizing

Utilities for controlling how the browser should calculate an element's width and height.

Class       | Properties
------------|-------------------------
box-border  | box-sizing: border-box;
box-content | box-sizing: content-box;

Tailwind makes border-box sizing the default for all elements in our preflight base styles.

**Responsive Variants**

```html
<div class="box-border md:box-content ...">
  <!-- ... -->
</div>
```

## Display

Utilities for controlling the display type of an element.

Class              | Properties
-------------------|-----------------------------
block              | display: block;
inline-block       | display: inline-block;
inline             | display: inline;
flex               | display: flex;
inline-flex        | display: inline-flex;
table              | display: table;
inline-table       | display: inline-table;
table-caption      | display: table-caption;
table-cell         | display: table-cell;
table-column       | display: table-column;
table-column-group | display: table-column-group;
table-footer-group | display: table-footer-group;
table-header-group | display: table-header-group;
table-row-group    | display: table-row-group;
table-row          | display: table-row;
flow-root          | display: flow-root;
grid               | display: grid;
inline-grid        | display: inline-grid;
contents           | display: contents;
list-item          | display: list-item;
hidden             | display: none;

Example (1) : block

```html
<div class="space-y-3">
  <span class="block bg-red-200">1</span>
  <span class="block bg-red-200">2</span>
  <span class="block bg-red-200 ">3</span>
</div>
```

Example (2) : Flow-Root ???

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

Example (3) : Inline Block

```html
<div class="space-x-4 ...">
  <div class="inline-block ...">1</div>
  <div class="inline-block ...">2</div>
  <div class="inline-block ...">3</div>
</div>
```

Example (4) Flex

```html
<div class="flex space-x-4 ...">
  <div class="flex-1 bg-red-200 ...">1</div>
  <div class="flex-1 bg-red-200 ...">2</div>
  <div class="flex-1 bg-red-200 ...">3</div>
</div>

```

Example (5) Grid

```html
<div class="grid gap-4 grid-cols-3">
  <!-- ... -->
</div>
```

Example (6) : contents

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

Burada 2 ve 3 sanki üstteki parent'ın child'ı gibi hareket eder.


Example (7) : Table

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

Example (8) : Hidden

Use hidden to set an element to `display: none` and remove it from <span style="color:red">the page layout</span> (compare with .invisible from the visibility documentation).

```html
<div class="flex ...">
  <div class="hidden ...">1</div>
  <div>2</div>
  <div>3</div>
</div>
```

- You can use responsive variants.

```html
<div class="flex md:inline-flex ...">
  <!-- ... -->
</div>
```

- Source : https://tailwindcss.com/docs/display

## Position

Utilities for controlling how an element is positioned in the DOM.

Class    | Properties
---------|--------------------
static   | position: static;
fixed    | position: fixed;
absolute | position: absolute;
relative | position: relative;
sticky   | position: sticky;


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

(???) rev

✏ Note : absolute position without tblr values

then tblr values are auto

top değeri üstündeki blockların yüksekliği kadar olur. ltr sistemde left 0 olur, right bottom ne kadar boşluk varsa o kadar büyüklüğü alır.

- Fixed : Use fixed to position an element relative to *the browser window*.

Offsets are calculated relative to <span style="color:red">the viewport</span> and the element will act as a position reference for absolutely positioned children.

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

Class             | Properties
------------------|----------------------------------------------------------------------
.                 | [trbl] -> top or right or bottom or left
[trbl]-[size_no]  | [trbl] : [size_value];
-[trbl]-[size_no] | [trbl] : -[size_value];
.                 | // Inset
inset-[size_no]   | top:[size_val];right:[size_val];bottom:[size_val];left:[size_val]
-inset-[size_no]  | top:-[size_val];right:-[size_val];bottom:-[size_val];left:-[size_val]
inset-x-[0.5-96]  | left:[size_val];right:[size_val];
inset-y-[0.5-96]  | top:[size_val];bottom:[size_val];
inset-auto        | top: auto;right: auto;bottom: auto;left: auto;
.                 |
.//% values//     |
.                 | // instead of top, right, bottom or left or insert can be used
.                 | // inset (for tblr),
.                 | // inset-x (for lr), inset-y (for tb) can be used
top-1/2           | top: 50%;
top-1/3           | top: 33.333333%;
top top-2/3       | top: 66.666667%;
top-1/4           | top: 25%;
top-2/4           | top: 50%;
top-3/4           | top: 75%;
top-full          | top: 100%;
.                 |
inset-[1/2-3/4]   | trbl: same as top values;
inset-full        | trbl: 100%;
inset-x-auto      | left: auto;right: auto;
inset-y-auto      | top: auto;bottom: auto;
.                 | Examples
top-0.5           | top: 0.125rem;
-top-0.5          | top: -0.125rem;
inset-0.5         | trbl: 0.125rem;
inset-x-0.5       | left: 0.125rem;right: 0.125rem;
inset-y-0.5       | top: 0.125rem; bottomt: 0.125rem;
-inset-x-0.5      | left: -0.125rem; right: -0.125rem;
inset-0           | top: 0px; right: 0px; bottom: 0px; left: 0px;
inset-x-0         | left: 0px; right: 0px;
inset-y-0         | top: 0px; bottom: 0px;

- Basic Usage : Use the {top|right|bottom|left|inset}-0 utilities to anchor absolutely positioned elements against any of the edges of the nearest positioned parent.

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

```html
<div class="relative h-32 ...">
  <div class="absolute inset-0 md:inset-y-0 ..."></div>
</div>

```

## Floats

Utilities for controlling the wrapping of content around an element.

Class       | Properties
------------|--------------
float-right | float: right;
float-left  | float: left;
float-none  | float: none;


Example (1)

```html
<img class="float-right ..." src="http://via.placeholder.com/120x100">

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis et lorem sit amet vehicula. Etiam vel nibh nec nisi euismod mollis ultrices condimentum velit. Proin velit libero, interdum ac rhoncus sit amet, pellentesque ac turpis. Quisque ac luctus turpis, vel efficitur ante. Cras convallis risus vel vehicula dapibus. Donec eget neque fringilla, faucibus mi quis, porttitor magna. Cras pellentesque leo est, et luctus neque rutrum eu. Aliquam consequat velit sed sem posuere, vitae sollicitudin mi consequat. Mauris eget ipsum sed dui rutrum fringilla. Donec varius vehicula magna sit amet auctor. Ut congue vehicula lectus in blandit. Vivamus suscipit eleifend turpis, nec sodales sem vulputate a. Curabitur pulvinar libero viverra, efficitur odio eu, finibus justo. Etiam eu vehicula felis.</p>
```

- Don't float

Use "float-none" to reset any floats that are applied to an element. This is the default value for the float property.

- Responsive

```html
<div class="bg-gray-200 p-4">
  <img class="float-right md:float-left ...">
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis et lorem sit amet vehicula. Etiam vel nibh nec nisi euismod mollis ultrices condimentum velit. Proin velit libero, interdum ac rhoncus sit amet, pellentesque ac turpis. Quisque ac luctus turpis, vel efficitur ante. Cras convallis risus vel vehicula dapibus. Donec eget neque fringilla, faucibus mi quis, porttitor magna. Cras pellentesque leo est, et luctus neque rutrum eu. Aliquam consequat velit sed sem posuere, vitae sollicitudin mi consequat. Mauris eget ipsum sed dui rutrum fringilla. Donec varius vehicula magna sit amet auctor. Ut congue vehicula lectus in blandit. Vivamus suscipit eleifend turpis, nec sodales sem vulputate a. Curabitur pulvinar libero viverra, efficitur odio eu, finibus justo. Etiam eu vehicula felis.</p>
</div>

```

- Source : https://tailwindcss.com/docs/float

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

For example, use md:clear-left to apply the clear-left utility at only medium screen sizes and above.

```html
<p class="clear-right md:clear-left ...">
  <!-- ... -->
</p>
```

- Source : https://tailwindcss.com/docs/clear


## Visibility

Utilities for controlling the visibility of an element.

Class     | Properties
----------|---------------------
visible   | visibility: visible;
invisible | visibility: hidden;


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

- You can use responsive variants.

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

## Box Decoration Break

Utilities for controlling how element fragments should be rendered across multiple lines, columns, or pages.

Class            | Properties
-----------------|-----------------------------
decoration-slice | box-decoration-break: slice;
decoration-clone | box-decoration-break: clone;

(???)

**Usage**

Use the decoration-slice and decoration-clone utilities to control whether properties like background, border, border-image, box-shadow, clip-page, margin, and padding should be rendered as if the element were one continuous fragment, or distinct blocks.

```html
<span class="decoration-clone bg-gradient-to-b from-yellow-400 to-red-500 text-transparent ...">
  Hello<br>
  World
</span>
```

![](https://image.prntscr.com/image/om5zoIXjQVWH9lv3cELOaw.png)


# Responsive Note

To control the box-sizing at a specific breakpoint, add a {screen}: prefix to any existing box-sizing utility. For example, use md:box-content to apply the box-content utility at only medium screen sizes and above.

For more information about Tailwind’s responsive design features, check out the Responsive Design documentation.
(https://tailwindcss.com/docs/responsive-design)


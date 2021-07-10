
- [LAYOUT](#layout)
  - [Container](#container)
  - [Box Decoration Break](#box-decoration-break)
  - [Box Sizing](#box-sizing)
  - [Display](#display)
  - [Floats](#floats)
  - [Clear](#clear)
  - [Isolation](#isolation)
  - [Object Fit](#object-fit)
  - [Object Position](#object-position)
  - [Overflow](#overflow)
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
- [SIZING](#sizing)
  - [Width](#width)
  - [Min-Width](#min-width)
  - [Max Width](#max-width)
  - [Height](#height)
  - [Min-Height](#min-height)
  - [Max Height](#max-height)


# LAYOUT

## Container

A component for fixing an element's width to the current breakpoint.

Default class reference


```
Class Breakpoint Properties
container	None	width: 100%;
sm (640px)	max-width: 640px;
md (768px)	max-width: 768px;
lg (1024px)	max-width: 1024px;
xl (1280px)	max-width: 1280px;
2xl (1536px)	max-width: 1536px;
```

**Usage**

The container class sets the max-width of an element to match the min-width of the current breakpoint. This is useful if you’d prefer to design for a fixed set of screen sizes instead of trying to accommodate a fully fluid viewport.

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

**Customizing**

* Centering by default

To center containers by default, set the center option to true in the theme.container section of your config file:

```js
// tailwind.config.js
module.exports = {
  theme: {
    container: {
      center: true,
    },
  },
}
```

* Horizontal padding

* Disabling responsive variants

* Disabling entirely (disabling container class)


Source
  
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

**Responsive**

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

- Customizing

Variants
Disabling


## Display

Utilities for controlling the display box type of an element.

```css
Class Properties
block	display: block;
inline-block	display: inline-block;
inline	display: inline;
flex	display: flex;
inline-flex	display: inline-flex;
table	display: table;
inline-table	display: inline-table;
table-caption	display: table-caption;
table-cell	display: table-cell;
table-column	display: table-column;
table-column-group	display: table-column-group;
table-footer-group	display: table-footer-group;
table-header-group	display: table-header-group;
table-row-group	display: table-row-group;
table-row	display: table-row;
flow-root	display: flow-root;
grid	display: grid;
inline-grid	display: inline-grid;
contents	display: contents;
list-item	display: list-item;
hidden	display: none;

```

- Block

Use block to create a block-level element.

```html
<div class="space-y-4 ...">
  <span class="block ...">1</span>
  <span class="block ...">2</span>
  <span class="block ...">3</span>
</div>
```

- Flow-Root

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
  <div class="flex-1 ...">1</div>
  <div class="flex-1 ...">2</div>
  <div class="flex-1 ...">3</div>
</div>

```

- Inline Flex

Use inline-flex to create an inline flex container.

```html
<div class="inline-flex space-x-4 ...">
  <div class="flex-1 ...">1</div>
  <div class="flex-1 ...">2</div>
  <div class="flex-1 ...">3</div>
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

For more information about Tailwind’s responsive design features, check out the Responsive Design documentation.

- Customizing 

read doc

Source

https://tailwindcss.com/docs/display

## Floats

Utilities for controlling the wrapping of content around an element.

```css
Class Properties
float-right	float: right;
float-left	float: left;
float-none	float: none;
```
- Float right

Use float-right to float an element to the right of its container.

```html
<img class="float-right ..." src="path/to/image.jpg">

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

For more information about Tailwind’s responsive design features, check out the Responsive Design documentation.

Source

https://tailwindcss.com/docs/float


## Clear

Utilities for controlling the wrapping of content around an element.

```css
Class Properties
clear-left	clear: left;
clear-right	clear: right;
clear-both	clear: both;
clear-none	clear: none;

```

- Clear left

Use clear-left to position an element below any preceding left-floated elements.

for visual explanation, go to source 

```html
<img class="float-left ..." src="path/to/image.jpg">
<img class="float-right ..." src="path/to/image.jpg">
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


## Isolation

Utilities for controlling whether an element should explicitly create a new stacking context.

```txt
Class   Properties
isolate	  isolation: isolate;
isolation-auto	  isolation: auto;
```

- Usage
Use the isolate and isolation-auto utilities to control whether an element should explicitly create a new stacking context.

<div class="isolate ...">
  <!-- ... -->
</div>

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
Class
Properties
object-contain	object-fit: contain;
object-cover	object-fit: cover;
object-fill	object-fit: fill;
object-none	object-fit: none;
object-scale-down	object-fit: scale-down;
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

```css
Class Properties
overflow-auto	overflow: auto;
overflow-hidden	overflow: hidden;
overflow-visible	overflow: visible;
overflow-scroll	overflow: scroll;
overflow-x-auto	overflow-x: auto;
overflow-y-auto	overflow-y: auto;
overflow-x-hidden	overflow-x: hidden;
overflow-y-hidden	overflow-y: hidden;
overflow-x-visible	overflow-x: visible;
overflow-y-visible	overflow-y: visible;
overflow-x-scroll	overflow-x: scroll;
overflow-y-scroll	overflow-y: scroll;

```

devam ediyor

- Source 

https://tailwindcss.com/docs/overflow


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
<div class="flex flex-wrap">
  <div>1</div>
  <div>2</div>
  <div>3</div>
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
Class Properties
flex-1	      flex: 1 1 0%;
flex-auto	    flex: 1 1 auto;
flex-initial	flex: 0 1 auto;
flex-none	    flex: none;

```

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

## Flex Grow

Utilities for controlling how flex items grow.

```
Class Properties
flex-grow-0	  flex-grow: 0;
flex-grow	    flex-grow: 1;
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
Class Properties
flex-shrink-0	flex-shrink: 0;
flex-shrink	  flex-shrink: 1;

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

Utilities for controlling gutters between grid and flexbox items.

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
<div class="grid gap-4 grid-cols-2">
  <div>1</div>
  <div>2</div>
  <div>3</div>
  <div>4</div>
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

Utilities for controlling how flex and grid items are positioned along a container's main ax

```
Class Properties
justify-start	  justify-content: flex-start;
justify-end	    justify-content: flex-end;
justify-center	justify-content: center;
justify-between	justify-content: space-between;
justify-around	justify-content: space-around;
justify-evenly	justify-content: space-evenly;
```

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


# SIZING

## Width

Utilities for setting the width of an element

```css
w-0	width: 0px;
w-px	width: 1px;
w-0.5	width: 0.125rem;
w-1	width: 0.25rem;
w-1.5	width: 0.375rem;
w-2	width: 0.5rem;
w-2.5	width: 0.625rem;
w-3	width: 0.75rem;
w-3.5	width: 0.875rem;
w-4	width: 1rem;
w-5	width: 1.25rem;
w-6	width: 1.5rem;
w-7	width: 1.75rem;
w-8	width: 2rem;
w-9	width: 2.25rem;
w-10	width: 2.5rem;
w-11	width: 2.75rem;
w-12	width: 3rem;
w-14	width: 3.5rem;
w-16	width: 4rem;
w-20	width: 5rem;
w-24	width: 6rem;
w-28	width: 7rem;
w-32	width: 8rem;
w-36	width: 9rem;
w-40	width: 10rem;
w-44	width: 11rem;
w-48	width: 12rem;
w-52	width: 13rem;
w-56	width: 14rem;
w-60	width: 15rem;
w-64	width: 16rem;
w-72	width: 18rem;
w-80	width: 20rem;
w-96	width: 24rem;
w-auto	width: auto;
w-1/2	width: 50%;
w-1/3	width: 33.333333%;
w-2/3	width: 66.666667%;
w-1/4	width: 25%;
w-2/4	width: 50%;
w-3/4	width: 75%;
w-1/5	width: 20%;
w-2/5	width: 40%;
w-3/5	width: 60%;
w-4/5	width: 80%;
w-1/6	width: 16.666667%;
w-2/6	width: 33.333333%;
w-3/6	width: 50%;
w-4/6	width: 66.666667%;
w-5/6	width: 83.333333%;
w-1/12	width: 8.333333%;
w-2/12	width: 16.666667%;
w-3/12	width: 25%;
w-4/12	width: 33.333333%;
w-5/12	width: 41.666667%;
w-6/12	width: 50%;
w-7/12	width: 58.333333%;
w-8/12	width: 66.666667%;
w-9/12	width: 75%;
w-10/12	width: 83.333333%;
w-11/12	width: 91.666667%;
w-full	width: 100%;
w-screen	width: 100vw;
w-min	width: min-content;
w-max	width: max-content;

```

- Auto

Use w-auto to let the browser calculate and select the width for the element. You can use it to unset a specific width:

```html
<div class="w-24 md:w-auto ..."></div>
```
- Screen Width

Use w-screen to make an element span the entire width of the viewport.

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

```css
Class Properties
max-w-0	max-width: 0rem;
max-w-none	max-width: none;
max-w-xs	max-width: 20rem;
max-w-sm	max-width: 24rem;
max-w-md	max-width: 28rem;
max-w-lg	max-width: 32rem;
max-w-xl	max-width: 36rem;
max-w-2xl	max-width: 42rem;
max-w-3xl	max-width: 48rem;
max-w-4xl	max-width: 56rem;
max-w-5xl	max-width: 64rem;
max-w-6xl	max-width: 72rem;
max-w-7xl	max-width: 80rem;
max-w-full	max-width: 100%;
max-w-min	max-width: min-content;
max-w-max	max-width: max-content;
max-w-prose	max-width: 65ch;
max-w-screen-sm	max-width: 640px;
max-w-screen-md	max-width: 768px;
max-w-screen-lg	max-width: 1024px;
max-w-screen-xl	max-width: 1280px;
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



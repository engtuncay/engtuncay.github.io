
- [LAYOUT](#layout)
  - [Container](#container)
  - [Box Decoration Break](#box-decoration-break)
  - [Box Sizing](#box-sizing)
  - [Display](#display)
  - [Floats](#floats)
  - [Clear](#clear)
  - [Isolation](#isolation)
  - [Object Fit](#object-fit)


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



- Source 

https://tailwindcss.com/docs/object-fit
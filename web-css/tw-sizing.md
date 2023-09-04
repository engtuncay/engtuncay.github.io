
- [Sizing](#sizing)
  - [Width and Height](#width-and-height)
    - [Height Examples](#height-examples)
  - [Min-Width and Min-Height](#min-width-and-min-height)
  - [Max Width and Max Height](#max-width-and-max-height)
- [Spacing](#spacing)
  - [Padding](#padding)
  - [Margin](#margin)
  - [Space Between](#space-between)


# Sizing

## Width and Height

Utilities for setting the width and height of an element

```css
/* [width|height] */
[w|h]-[$spacing]
[w|h]-[auto|full|screen|fit]
[w|h]-[min|max]
[w|h]-1/2
[w|h]-[1-2]/3
[w|h]-[1-3]/4
[w|h]-[1-4]/5
[w|h]-[1-5]/6
w-[1-11]/12

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

- Fixed Widths

Use w-{size} or w-px to set an element to a fixed width

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

```html
<div class="w-1/2 md:w-full ...">
  <!-- ... -->
</div>
```

- Source : https://tailwindcss.com/docs/width


### Height Examples

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

```html
<div class="h-8 md:h-full"></div>
```



## Min-Width and Min-Height

Utilities for setting the minimum width or height of an element

```css
min-[ width|height ]
min-h-screen
min-[w|h]-0
min-[w|h]-[full|fit]
min-[w|h]-[min|max]
```

Class      | Properties
-----------|------------------------
min-w-0    | min-width: 0px;
min-w-full | min-width: 100%;
min-w-min  | min-width: min-content;
min-w-max  | min-width: max-content;

- Usage

Set the minimum width of an element using the min-w-0 or min-w-full utilities.

```html
<div class="w-24 min-w-full ...">
  min-w-full
</div>
```

- Responsive

```html
<div class="w-24 min-w-full md:min-w-0 ...">
  <!-- ... -->
</div>

```

- Source : https://tailwindcss.com/docs/min-width


## Max Width and Max Height

Utilities for setting the maximum width or height of an element

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

```css
/* max-width */
max-w-0
max-w-none
max-w-[xs|sm|md|lg|xl]
max-w-[2-7]xl
max-w-prose
max-w-screen-[xs|sm|md]
max-w-screen-[lg|xl|2xl]
max-w-[full|fit]
max-w-[min|max]

/* max-height */
max-h-[full|screen|fit]
max-h-[min|max]
max-h-[$spacing]
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

```html
<div class="max-w-sm md:max-w-lg ...">
  <!-- ... -->
</div>

```

# Spacing

## Padding

```css
/* padding */
p-[$spacing]
p[x|y]-[$spacing]
p[t|r|b|l]-[$spacing]

```

## Margin

```css
/* margin */
m-auto
m-[$spacing]
m[x|y]-[$spacing]
m[t|r|b|l]-[$spacing]
-m-[$spacing]
-m[x|y]-[$spacing]
-m[t|r|b|l]-[$spacing]

```

- Property Details

Class              | Properties
-------------------|----------------------------
m-[$spacing]       | margin : [size_val];
m[x\|y]-[$spacing] | margin-[x\|y] : [size_val];



## Space Between

```css
space between
-space-[x|y]-[$spacing]
space-[x|y]-[$spacing]
space-[x|y]-reverse
```
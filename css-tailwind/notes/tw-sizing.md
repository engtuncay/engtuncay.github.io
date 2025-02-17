
- [Sizing](#sizing)
  - [Width and Height](#width-and-height)
    - [Height Examples](#height-examples)
  - [Min-Width and Min-Height](#min-width-and-min-height)
  - [Max Width and Max Height](#max-width-and-max-height)
- [Spacing](#spacing)
  - [Padding](#padding)
  - [Margin](#margin)
  - [Space Between](#space-between)
- [Size and values](#size-and-values)
  - [Size Table ($spacing)](#size-table-spacing)
  - [Fraction Sizes](#fraction-sizes)
  - [Special Sizes](#special-sizes)
  - [Responsive Sizes](#responsive-sizes)


# Sizing

## Width and Height

Utilities for setting the width and height of an element

- Summary

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

Class      | Properties
-----------|------------------------
min-w-0    | min-width: 0px;
min-w-full | min-width: 100%;
min-w-min  | min-width: min-content;
min-w-max  | min-width: max-content;

```css
/* min-[ width|height ] */
min-h-screen
min-[w|h]-0
min-[w|h]-[full|fit]
min-[w|h]-[min|max]
```

- Basic Usage : Set the minimum width of an element using the min-w-0 or min-w-full utilities.

```html
<div class="w-24 min-w-full ...">
  min-w-full
</div>
```

- Source : https://tailwindcss.com/docs/min-width


## Max Width and Max Height

Utilities for setting the maximum width or height of an element

Class                      | Properties
---------------------------|---------------------------
max-w-0                    | max-width: 0rem;
max-w-none                 | max-width: none;
max-w-[xs\|sm\|md\|lg\|xl] | max_width : [size_value];
max-w-[2-7]xl              |
max-w-full                 | max-width: 100%;
max-w-min                  | max-width: min-content;
max-w-max                  | max-width: max-content;
max-w-prose                | max-width: 65ch;
max-w-screen-[xs\|sm\|md]  | max-width: [size_value]px;
max-w-screen-[lg\|xl\|2xl] | max-width: [size_value]px;
max-h-[full\|screen\|fit]  |
max-h-[min\|max]           |
max-h-[$spacing]           |


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

Utilities for controlling the space between child elements.

Class           | Properties
----------------|---------------------------
space-x-[size]  | margin-left: [size_value];
space-y-[size]  | margin-top: [size_value];
space-y-reverse | --tw-space-y-reverse: 1;
space-x-reverse | --tw-space-x-reverse: 1;


```css
/* space between */
-space-[x|y]-[$spacing]
space-[x|y]-[$spacing]
space-[x|y]-reverse
```

🔔 Basic usage : Add horizontal space between children

Control the horizontal space between elements using the space-x-{amount} utilities.

![image](./img/space-x-1423.png)

```html
<div class="flex space-x-4 ...">
  <div>01</div>
  <div>02</div>
  <div>03</div>
</div>
```

🔔 Add vertical space between children

Control the vertical space between elements using the space-y-{amount} utilities.

![image](./img/space-y-1425.png)

```html
<div class="flex flex-col space-y-4 ...">
  <div>01</div>
  <div>02</div>
  <div>03</div>
</div>
```

🔔 Reversing children order

If your elements are in reverse order (using say flex-row-reverse or flex-col-reverse), use the space-x-reverse or space-y-reverse utilities to ensure the space is added to the correct side of each element.

```html
<div class="flex flex-row-reverse space-x-4 space-x-reverse ...">
  <div>01</div>
  <div>02</div>
  <div>03</div>
</div>

```

🔔 Using negative values

To use a negative space value, prefix the class name with a dash to convert it to a negative value.

```html
<div class="flex -space-x-4 ...">
  <!-- ... -->
</div>

```

🔔 Limitations

These utilities are really just <span style="color:red">a shortcut for adding margin to all-but-the-first-item in a group</span>, and aren’t designed to handle complex cases like grids, layouts that wrap, or situations where the children are rendered in a complex custom order rather than their natural DOM order.

For those situations, it’s better to use the gap utilities when possible, or add margin to every element with a matching negative margin on the parent:

```html
<div class="flow-root">
  <div class="-m-2 flex flex-wrap">
    <div class="m-2 ..."></div>
    <div class="m-2 ..."></div>
    <div class="m-2 ..."></div>
  </div>
</div>

```
​
🔔 Cannot be paired with divide utilities

The space-* utilities are not designed to work together with the divide utilities. (https://tailwindcss.com/docs/divide-width) For those situations, consider adding margin/padding utilities to the children instead.

# Size and values

- [Reference Note](./tw-intro.md)

## Size Table ($spacing)

- 0.25rem (size value) * 4 = 1 ($spacing)
- 1 ($spacing) * 4 = 4px

Size ($spacing) Table

Size | Properties | Pixel
-----|------------|------
0    | 0px;       | 0px
px   | 1px        | 1px
0.5  | 0.125rem;  | 2px
1    | 0.25rem;   | 4px
1.5  | 0.375rem;  | 6px
2    | 0.5rem;    | 8px
2.5  | 0.625rem;  | 10px
3    | 0.75rem;   | 12px
3.5  | 0.875rem;  |
4    | 1rem;      |
5    | 1.25rem;   |
6    | 1.5rem;    |
7    | 1.75rem;   |
8    | 2rem;      |
9    | 2.25rem;   |
10   | 2.5rem;    |
11   | 2.75rem;   |
12   | 3rem;      |
14   | 3.5rem;    |
16   | 4rem;      |
20   | 5rem;      |
24   | 6rem;      |
28   | 7rem;      |
32   | 8rem;      |
36   | 9rem;      |
40   | 10rem;     |
44   | 11rem;     |
48   | 12rem;     |
52   | 13rem;     |
56   | 14rem;     |
60   | 15rem;     |
64   | 16rem;     |
72   | 18rem;     |
80   | 20rem;     |
96   | 24rem;     | 384px

**Examples**

Class | Css Value
------|---------------
w-2   | width: 0.5rem;
w-px  | width: 1px


✏ pixel value is taken from padding table (https://tailwindcss.com/docs/padding)

## Fraction Sizes

Class   | Properties
--------|-------------------
w-1/2   | width: 50%;
w-1/3   | width: 33.333333%;
w-2/3   | width: 66.666667%;
w-1/4   | width: 25%;
w-2/4   | width: 50%;
w-3/4   | width: 75%;
w-1/5   | width: 20%;
w-2/5   | width: 40%;
w-3/5   | width: 60%;
w-4/5   | width: 80%;
w-1/6   | width: 16.666667%;
w-2/6   | width: 33.333333%;
w-3/6   | width: 50%;
w-4/6   | width: 66.666667%;
w-5/6   | width: 83.333333%;
w-1/12  | width: 8.333333%;
w-2/12  | width: 16.666667%;
w-3/12  | width: 25%;
w-4/12  | width: 33.333333%;
w-5/12  | width: 41.666667%;
w-6/12  | width: 50%;
w-7/12  | width: 58.333333%;
w-8/12  | width: 66.666667%;
w-9/12  | width: 75%;
w-10/12 | width: 83.333333%;
w-11/12 | width: 91.666667%;
w-full  | width : 100%

## Special Sizes

Class    | Properties
---------|--------------------
w-auto   | width: auto;
w-screen | width: 100vw;
w-min    | width: min-content;
w-max    | width: max-content;
w-fit    | width: fit-content;

## Responsive Sizes

Size       | Value
-----------|-------
xs         | 20rem
sm         | 24rem
md         | 28rem
lg         | 32rem
xl         | 36rem
2xl        | 42rem
3xl        | 48rem
4xl        | 56rem
5xl        | 64rem
6xl        | 72rem
7xl        | 80rem
screen-sm  | 640px
screen-md  | 768px
screen-lg  | 1024px
screen-xl  | 1280px
screen-2xl | 1536px

Border Sizes

Size       | Value    | Pixel
-----------|----------|------
sm         | 0.125rem | 2px
(woutsize) | 0.25rem  | 4px
md         | 0.375rem | 6px
lg         | 0.5rem   | 8px
xl         | 0.75rem  | 12px
2xl        | 1rem     | 16px
3xl        | 1.5rem   | 24px


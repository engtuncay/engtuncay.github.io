
- [Code Play For Tailwind](#code-play-for-tailwind)
- [Preflight (Reset values)](#preflight-reset-values)
- [Cheatsheet](#cheatsheet)
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

- Tailwind official Code Play : https://play.tailwindcss.com/

- Tailwind Demos : https://8mrjrn.csb.app/

- CodePen : https://codepen.io/engtuncay/pen/vYjgOMy

# Preflight (Reset values)

Source  : https://tailwindcss.com/docs/preflight

# Cheatsheet



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


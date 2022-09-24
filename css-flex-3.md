
- [Intro](#intro)
- [Intro 2](#intro-2)
  - [Color](#color)
- [Layout](#layout)
  - [Flex](#flex)
    - [Properties for the Parent (flex container)](#properties-for-the-parent-flex-container)
      - [display](#display)
      - [flex-direction](#flex-direction)
      - [flex-wrap](#flex-wrap)
      - [flex-flow (sh)](#flex-flow-sh)
      - [justify-content](#justify-content)
      - [align-items](#align-items)
      - [align-content](#align-content)
    - [Properties for the Children (flex items)](#properties-for-the-children-flex-items)
      - [order](#order)
      - [flex-grow](#flex-grow)
      - [flex-shrink](#flex-shrink)
      - [flex-basis](#flex-basis)
      - [flex (sh)](#flex-sh)
      - [align-self](#align-self)
  - [Grid Layout](#grid-layout)
    - [Properties for the Parent (Grid Container)](#properties-for-the-parent-grid-container)
- [Sources](#sources)



# Intro 


# Intro 2


## Color


**RGB**

```css
color: rgb(100,239,239);
/* var ile kullanmak istersek*/
color: rgb(var(--a72));
```

- alpha ile kullanmak istersek

```css
color: rgba(100,239,239,0.5);

```


# Layout


- Birden fazla selector kullanmak için aralarına virgül koyulur
h3, h4 {....}

- W3schools da color tutorial, kullanışlı bilgiler sunuyor 


## Flex

This complete guide explains everything about flexbox, focusing on all the different possible properties for the parent element (the flex container) and the child elements (the flex items). It also includes history, demos, patterns, and a browser support chart.

### Properties for the Parent (flex container)

#### display

This defines a flex container; inline or block depending on the given value. It enables a flex context for all its direct children.

```css
.container {
  display: flex; /* or inline-flex */
}

```

Note that CSS columns have no effect on a flex container.  (%1%) 

#### flex-direction

This establishes the main-axis (ana ekseni tanımlar, satır olunca yatay, sütun olunca dikey), thus defining the direction flex items are placed in the flex container. Flexbox is (aside from optional wrapping) a single-direction layout concept. (Tek yönlü yerleşim kavramı). Think of flex items as primarily laying out either in horizontal rows or vertical columns. (Flex elemanlarını, yatay satırlar veya dikey sütunlar olarak düşün. )

```css
.container {
  flex-direction: row | row-reverse | column | column-reverse;
}

```

```
row (default): left to right in ltr; right to left in rtl
row-reverse: right to left in ltr; left to right in rtl
column: same as row but top to bottom
column-reverse: same as row-reverse but bottom to top

```

#### flex-wrap

By default, flex items will all try to *fit onto one line*. You can change that and allow the items to wrap as needed with this property.

```css
.container {
  flex-wrap: nowrap | wrap | wrap-reverse;
}

```

```
nowrap (default): all flex items will be on one line
wrap: flex items will wrap onto multiple lines, from top to bottom.
wrap-reverse: flex items will wrap onto multiple lines from bottom to top.

```

There are some visual demos of flex-wrap here.
https://css-tricks.com/almanac/properties/f/flex-wrap/

#### flex-flow (sh)

This is a shorthand for the *flex-direction and flex-wrap* properties, which together define the flex container’s main and cross axes. The default value is row nowrap.

```css
.container {
  flex-flow: column wrap;
}

```

#### justify-content

This defines the alignment along the main axis. It helps distribute extra free space leftover when either all the flex items on a line are inflexible, or are flexible but have reached their maximum size. It also exerts some control over the alignment of items when they overflow the line. 

![Justify Content](https://image.prntscr.com/image/fbK4GCidSyCbpBZ-JcyH4g.png)

```css
.container {
  justify-content: flex-start | flex-end | center | space-between | space-around | space-evenly | start | end | left | right ... + safe | unsafe;
}

```

- Note Main Axis (Ana Eksen)

Ana eksende hizalamasını yapar. Row flow ise yatayda hizalamasını ayarlar. Yatayda sola yaslı, ortalanmış, sağa yaslı gibi...

- Values
  
```
flex-start (default): items are packed toward the start of the flex-direction.
flex-end: items are packed toward the end of the flex-direction.
start: items are packed toward the start of the writing-mode direction.
end: items are packed toward the end of the writing-mode direction.
left: items are packed toward left edge of the container, unless that doesn’t make sense with the flex-direction, then it behaves like start.
right: items are packed toward right edge of the container, unless that doesn’t make sense with the flex-direction, then it behaves like end.
center: items are centered along the line
space-between: items are evenly distributed in the line; first item is on the start line, last item on the end line
space-around: items are evenly distributed in the line with equal space around them. Note that visually the spaces aren’t equal, since all the items have equal space on both sides. The first item will have one unit of space against the container edge, but two units of space between the next item because that next item has its own spacing that applies.
space-evenly: items are distributed so that the spacing between any two items (and the space to the edges) is equal.

```
Note that that browser support for these values is nuanced. For example, space-between never got support from some versions of Edge, and start/end/left/right aren’t in Chrome yet. MDN has detailed charts. The safest values are flex-start, flex-end, and center.

(@@@?) 
There are also two additional keywords you can pair with these values: safe and unsafe. Using safe ensures that however you do this type of positioning, you can’t push an element such that it renders off-screen (e.g. off the top) in such a way the content can’t be scrolled too (called “data loss”). 

#### align-items

This defines the default behavior for how flex items are laid out along the cross axis on the current line. Think of it as the justify-content version for the cross-axis (perpendicular to the main-axis). (cross axis - çapraz eksende (resimde y ekseni) konumu nerede olacak, nasıl yerleştirilecek)


```css
.container {
  align-items: stretch | flex-start | flex-end | center | baseline | first baseline | last baseline | start | end | self-start | self-end + ... safe | unsafe;
}

```

- align-item values

```
stretch (default): stretch to fill the container (still respect min-width/max-width)
flex-start / start / self-start: items are placed at the start of the cross axis. The difference between these is subtle, and is about respecting the flex-direction rules or the writing-mode rules.
flex-end / end / self-end: items are placed at the end of the cross axis. The difference again is subtle and is about respecting flex-direction rules vs. writing-mode rules.
center: items are centered in the cross-axis
baseline: items are aligned such as their baselines align

```

The safe and unsafe modifier keywords can be used in conjunction with all the rest of these keywords (although note browser support), and deal with helping you prevent aligning elements such that the content becomes inaccessible.

#### align-content

This aligns a flex container’s lines within when there is extra space in the cross-axis, similar to how justify-content aligns individual items within the main-axis.

Note: This property only takes effect on multi-line flexible containers (!!!), where flex-flow is set to either wrap or wrap-reverse). A single-line flexible container (i.e. where flex-flow is set to its default value, no-wrap) will not reflect align-content.

```css
.container {
  align-content: flex-start | flex-end | center | space-between | space-around | space-evenly | stretch | start | end | baseline | first baseline | last baseline + ... safe | unsafe;
}

```

- Values

```
normal (default): items are packed in their default position as if no value was set.
flex-start / start: items packed to the start of the container. The (more supported) flex-start honors the flex-direction while start honors the writing-mode direction.
flex-end / end: items packed to the end of the container. The (more support) flex-end honors the flex-direction while end honors the writing-mode direction.
center: items centered in the container
space-between: items evenly distributed; the first line is at the start of the container while the last one is at the end
space-around: items evenly distributed with equal space around each line
space-evenly: items are evenly distributed with equal space around them
stretch: lines stretch to take up the remaining space

```

The safe and unsafe modifier keywords can be used in conjunction with all the rest of these keywords (although note browser support), and deal with helping you prevent aligning elements such that the content becomes inaccessible.

### Properties for the Children (flex items) 

#### order

By default, flex items are laid out in the source order. However, the order property controls the order in which they appear in the flex container.

```css
.item {
  order: 5; /* default is 0 */
}

```

#### flex-grow

This defines the ability for a flex item to grow if necessary. It accepts a unitless value that serves as a proportion. It dictates what amount of the available space inside the flex container the item should take up.

If all items have flex-grow set to 1, the remaining space in the container will be distributed equally to all children. If one of the children has a value of 2, the remaining space would take up twice as much space as the others (or it will try to, at least).

```css
.item {
  flex-grow: 4; /* default 0 */
}

```

Negative numbers are invalid.

#### flex-shrink

This defines the ability for a flex item to shrink if necessary.

```css
.item {
  flex-shrink: 3; /* default 1 */
}

```

Negative numbers are invalid.

#### flex-basis

This defines the default size of an element before the remaining space is distributed. It can be a length (e.g. 20%, 5rem, etc.) or a keyword. The auto keyword means “look at my width or height property” (which was temporarily done by the main-size keyword until deprecated). The content keyword means “size it based on the item’s content” – this keyword isn’t well supported yet, so it’s hard to test and harder to know what its brethren max-content, min-content, and fit-content do.

```css
.item {
  flex-basis:  | auto; /* default auto */
}

```

If set to 0, the extra space around content isn’t factored in. If set to auto, the extra space is distributed based on its flex-grow value. See this graphic.

#### flex (sh)

This is the shorthand for flex-grow, flex-shrink and flex-basis combined. The second and third parameters (flex-shrink and flex-basis) are optional. The default is 0 1 auto, but if you set it with a single number value, it’s like 1 0.

```css
.item {
  flex: none | [ <'flex-grow'> <'flex-shrink'>? || <'flex-basis'> ]
}

```

It is recommended that you use this shorthand property rather than set the individual properties. The shorthand sets the other values intelligently.

#### align-self
This allows the default alignment (or the one specified by align-items) to be overridden for individual flex items.

Please see the align-items explanation to understand the available values.

```css
.item {
  align-self: auto | flex-start | flex-end | center | baseline | stretch;
}

```

Note that float, clear and vertical-align have no effect on a flex item.


## Grid Layout

CSS Grid Layout (aka “Grid” or “CSS Grid”), is a two-dimensional grid-based layout system that, compared to any web layout system of the past, completely changes the way we design user interfaces. CSS has always been used to layout our web pages, but it’s never done a very good job of it. First, we used tables, then floats, positioning and inline-block, but all of these methods were essentially hacks and left out a lot of important functionality (vertical centering, for instance). Flexbox is also a very great layout tool, but its one-directional flow has different use cases — and they actually work together quite well! Grid is the very first CSS module created specifically to solve the layout problems we’ve all been hacking our way around for as long as we’ve been making websites.

The intention of this guide is to present the Grid concepts as they exist in the latest version of the specification. So I won’t be covering the out-of-date Internet Explorer syntax (even though you can absolutely use Grid in IE 11) or other historical hacks.


- Important Terminology

Before diving into the concepts of Grid it’s important to understand the terminology. Since the terms involved here are all kinda conceptually similar, it’s easy to confuse them with one another if you don’t first memorize their meanings defined by the Grid specification. But don’t worry, there aren’t many of them.

- Grid Container

The element on which display: grid is applied. It’s the direct parent of all the grid items. In this example container is the grid container.

```html
<div class="container">
  <div class="item item-1"> </div>
  <div class="item item-2"> </div>
  <div class="item item-3"> </div>
</div>
```

- Grid Item
The children (i.e. direct descendants) of the grid container. Here the item elements are grid items, but sub-item isn’t.

```html
<div class="container">
  <div class="item"> </div>
  <div class="item">
    <p class="sub-item"> </p>
  </div>
  <div class="item"> </div>
</div>
```

- Grid Line

The dividing lines that make up the structure of the grid. They can be either vertical (“column grid lines”) or horizontal (“row grid lines”) and reside on either side of a row or column. Here the yellow line is an example of a column grid line.

sütun veya satır çizgileri

- Grid Cell

The space between two adjacent row and two adjacent column grid lines. It’s a single “unit” of the grid. Here’s the grid cell between row grid lines 1 and 2, and column grid lines 2 and 3.

Hücre

- Grid Track

The space between two adjacent grid lines. You can think of them as the columns or rows of the grid. Here’s the grid track between the second and third-row grid lines

- Grid Area

The total space surrounded by four grid lines. A grid area may be composed of any number of grid cells. Here’s the grid area between row grid lines 1 and 3, and column grid lines 1 and 3.

|--|--|--row grid line 1
|--|--|--
|--|--|--row grid line 3

->col grid line 1
|--|--|--
|--|--|--
|--|--|--
       ->col grid line 3

- Properties for the Grid container
display
grid-template-columns
grid-template-rows
grid-template-areas
grid-template
grid-column-gap
grid-row-gap
grid-gap
justify-items
align-items
place-items
justify-content
align-content
place-content
grid-auto-columns
grid-auto-rows
grid-auto-flow
grid

- Properties for Grid items
grid-column-start
grid-column-end
grid-row-start
grid-row-end
grid-column
grid-row
grid-area
justify-self
align-self
place-self

### Properties for the Parent (Grid Container)

- display

Defines the element as a grid container and establishes a new grid formatting context for its contents.

Values:

* grid – generates a block-level grid

* inline-grid – generates an inline-level grid

```css
.container {
  display: grid | inline-grid;
}
```




# Sources

- https://css-tricks.com/snippets/css/a-guide-to-flexbox/

- https://css-tricks.com/snippets/css/complete-guide-grid/


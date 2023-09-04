
- [Sources](#sources)
- [Breakpoints](#breakpoints)
- [Layout](#layout)
- [Background](#background)
- [Border](#border)
- [Sizing](#sizing)
- [Spacing](#spacing)
- [Typography](#typography)
- [Functions \& Directives](#functions--directives)
- [Opacity](#opacity)
- [Colors](#colors)
- [General Concepts](#general-concepts)
  - [Space values ($spacing)](#space-values-spacing)
  - [Fraction Sizes](#fraction-sizes)
  - [Special Sizes](#special-sizes)
- [Flex](#flex)
- [Grid](#grid)
- [Flex/Grid](#flexgrid)
- [Pseudo Class](#pseudo-class)
- [Pseudo Class - Media](#pseudo-class---media)
- [Pseudo Class - Aria](#pseudo-class---aria)
- [Effect](#effect)
- [Table](#table)
- [Svg](#svg)
- [Interactivity](#interactivity)
- [Accessibility](#accessibility)

# Sources 

- https://umeshmk.github.io/Tailwindcss-cheatsheet/


# Breakpoints

Screen        | Pixel  | Class
--------------|--------|----------
mobile        | <640px | .flex
mob or tablet | 640px  | .sm:flex
tablet        | 768px  | .md:flex
screen        | 1024px | .lg:flex
screen        | 1280px | .xl:flex
screen        | 1536px | .2xl:flex

# Layout
```css
/*container*/
container

/*columns*/
columns-[1-12]
columns-auto
columns-[3xs|2xs|xs]
columns-[sm|md|lg|xl]
columns-[2-7]xl

/* box sizing */
box-border
box-content

/* float */
float-[left|right]
float-none

/* clear */
clear-[left|right]
clear-both
clear-none

/* positions */
static
relative
absolute
fixed
sticky

/* visible */
visible
invisible
collapse

/* display */
[block|inline|inline-block]
[flex|inline-flex]
[grid|inline-grid]

/* table */
table-[caption|cell]
table-[row|column]
table-[row|column]-group
table-[header|footer]-group
flow-root
contents
hidden

/* positions-trbl */
[top|right|bottom|left]-[$spacing]
[top|right|bottom|left]-[auto|full]
inset-[$spacing]
inset-[auto|full]
inset-1/2
inset-[1-2]/3
inset-[1-3]/4
inset-[x|y]-[$spacing]
inset-[x|y]-[auto|full]
inset-[x|y]-1/2
inset-[x|y]-[1-2]/3
inset-[x|y]-[1-3]/4

/* break [before|after] */
break-[before|after]-auto
break-[before|after]-all
break-[before|after]-[avoid|avoid-page]
break-[before|after]-page
break-[before|after]-[left|right]
break-[before|after]-column

/* break inside */
break-inside-auto
break-inside-[avoid|avoid-page]
break-inside-avoid-column

/* overflow */
overflow-auto
overflow-[hidden|visible]
overflow-scroll
overflow-[x|y]-auto
overflow-[x|y]-[hidden|visible]
overflow-[x|y]-scroll

/* overscroll-behavior */
overscroll-auto
overscroll-contain
overscroll-none
overscroll-[x|y]-auto
overscroll-[x|y]-contain
overscroll-[x|y]-none

/* aspect ratio */
aspect-auto
aspect-square
aspect-video

box decoration break
box-decoration-clone
box-decoration-slice

isolation
isolate
isolation-auto

object-fit
object-contain
object-cover
object-fill
object-none
object-scale-down

object-positions
object-center
object-[top|bottom]
object-[left|right]
object-[left|right]-[top|bottom]

z-index
z-[0|10|20|30|40|50]
z-auto

```

# Background

```css
bg-attachment
bg-fixed
bg-local
bg-scroll
bg-clip
bg-clip-border
bg-clip-padding
bg-clip-content
bg-clip-text
[bg-color|gradient-color-stops]
[bg|from]-transparent
[bg|from]-[inherit|current]
[bg|from]-[white|black]
[bg|from]-[$color]-[50-900]
bg-position
bg-center
bg-[left|right|top|bottom]
bg-[left|right]-[top|bottom]
bg-image
bg-none
bg-gradient-to-[t|r|b|l]
bg-gradient-to-[tl|tr|bl|br]
bg-repeat
bg-repeat
bg-norepeat
bg-repeat-[x|y]
bg-repeat-round
bg-repeat-space
bg-size
bg-auto
bg-cover
bg-contain
bg-origin
bg-origin-border
bg-origin-padding
bg-origin-content

```

# Border

```css
[border|divide|outline|ring|ring-offset]-color
[border|divide|ring|ring-offset]-transparent
[border|divide|ring|ring-offset]-[inherit|current]
[border|divide|ring|ring-offset]-white
[border|divide|ring|ring-offset]-black
[border|divide|ring|ring-offset]-[$color]-[50-900]
[border|divide|outline]-style
[border|divide]-solid
[border|divide|outline]-dotted
[border|divide|outline]-dashed
[border|divide|outline]-double
[border|divide|outline]-none
border-hidden
outline
border-radius
rounded
rounded-[sm|md|lg|xl|2xl|3xl]
rounded-[full|none]
rounded-[t|r|b|l]
rounded-[t|r|b|l]-[full|none]
rounded-[t|r|b|l]-[sm|md|lg|xl|2xl|3xl]
rounded-[tr|tl|br|bl]
rounded-[tr|tl|br|bl]-[full|none]
rounded-[tr|tl|br|bl]-[sm|md|lg|xl|2xl|3xl]
border-width
border
border-[0|2|4|8]
border-[x|y]
border-[x|y]-[0|2|4|8]
border-[t|r|b|l]
border-[t|r|b|l]-[0|2|4|8]
divide width
divide-[x|y]
divide-[x|y]-reverse
divide-[x|y]-[0|2|4|8]
ring-width
ring
ring-inset
ring-[0|1|2|4|8]
ring-offset-width
ring-offset-[0|1|2|4|8]
outline-width
outline-[0|1|2|4|8]
outline-offset-width
outline-offset-[0|1|2|4|8]

```

# Sizing

```css
[ width|height ]
[w|h]-[$spacing]
[w|h]-[auto|full|screen|fit]
[w|h]-[min|max]
[w|h]-1/2
[w|h]-[1-2]/3
[w|h]-[1-3]/4
[w|h]-[1-4]/5
[w|h]-[1-5]/6
w-[1-11]/12
min-[ width|height ]
min-h-screen
min-[w|h]-0
min-[w|h]-[full|fit]
min-[w|h]-[min|max]
max-width
max-w-0
max-w-none
max-w-[xs|sm|md|lg|xl]
max-w-[2-7]xl
max-w-prose
max-w-screen-[xs|sm|md]
max-w-screen-[lg|xl|2xl]
max-w-[full|fit]
max-w-[min|max]
max-height
max-h-[full|screen|fit]
max-h-[min|max]
max-h-[$spacing]

```

# Spacing

```css
padding
p-[$spacing]
p[x|y]-[$spacing]
p[t|r|b|l]-[$spacing]
margin
m-auto
-m-[$spacing]
-m[x|y]-[$spacing]
-m[t|r|b|l]-[$spacing]
m-[$spacing]
m[x|y]-[$spacing]
m[t|r|b|l]-[$spacing]
space between
-space-[x|y]-[$spacing]
space-[x|y]-[$spacing]
space-[x|y]-reverse

```

# Typography

```css
family
font-sans
font-serif
font-mono
size
text-[xs|sm|lg|xl]
text-base
text-[2-9]xl
line-height
leading-[3-10]
leading-none
leading-tight
leading-snug
leading-normal
leading-relaxed
leading-loose
text-align
text-[left|right]
text-center
text-justify
text-[start|end]
text-transform
uppercase
lowercase
capitalize
normal-case
text-overflow
truncate
text-ellipsis
text-clip
style
italic
not-italic
weight
font-[thin|extralight|light]
font-normal
font-medium
font-[semibold|bold|extrabold]
font-black
font-variant-numeric
ordinal
slashed-zero
[normal|lining|tabular]-nums
[oldstyle|proportional]-nums
[diagonal|stacked]-fractions
letter-spacing
tracking-[tight|tighter]
tracking-normal
tracking-[wide|wider|widest]
[placeholder|text]-color
[placeholder|text]-transparent
[placeholder|text]-current
[placeholder|text]-[white|black]
[placeholder|text]-[$color]-[50-900]
vertical-align
align-baseline
align-[top|middle|bottom]
align-text-[top|bottom]
align-[sub|super]
text-indent
indent-[$spacing]
text-opacity
text-opacity-[$opacity]
text-decoration
underline
no-underline
line-through
overline
text-decoration-color
decoration-inherit
decoration-transparent
decoration-current
decoration-[white/black]
decoration-[$color]-[50-900]
text-decoration-style
decoration-solid
decoration-double
decoration-dashed
decoration-dotted
decoration-wavy
text-decoration-thickness
decoration-auto
decoration-from-font
decoration-[0|1|2|4|8]
text-underline-offset
underline-offset-auto
underline-offset-[0|1|2|4|8]
smoothing
antialiased
subpixel-antialiased
list-style-type
list-none
list-disc
list-decimal
list-style-positions
list-inside
list-outside
white-space
whitespacing-normal
whitespacing-no-wrap
whitespacing-pre
whitespacing-pre-[line|wrap]
word-break
break-normal
break-words
break-all
break-keep
content
content-none

```
# Functions & Directives

```css
@tailwind
@apply
@layer
@config
theme()
screen()

```

# Opacity
0, 5, 10, 20, 25, 30, 40, 50, 60, 70, 75, 80, 90, 95, 100

# Colors
50, 100, 200, 300, 400, 500, 600, 700, 800, 900

# General Concepts

## Space values ($spacing)

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


# Flex

```css
flex basis
basis-[$spacing]
basis-auto
basis-full
basis-1/2
basis-[1-2]/3
basis-[1-3]/4
basis-[1-4]/5
basis-[1-5]/6
basis-[1-11]/12
direction
flex-row
flex-col
flex-row-reverse
flex-col-reverse
wrap
flex-wrap
flex-wrap-reverse
flex-nowrap
flex
flex-initial
flex-1
flex-auto
flex-none
flex-grow
grow
grow-0
flex-shrink
shrink
shrink-0
flex-order
order-first
order-last
order-none
order-[1-12]

```

# Grid

```css
grid-template-rows
grid-rows-[1-6]
grid-rows-none
grid-template-columns
grid-cols-[1-12]
grid-cols-none
grid-column-[start|end]
col-auto
col-span-[1-12]
col-span-full
col-start-[1-13]
col-start-auto
col-end-[1-13]
col-end-auto
grid-row-[start|end]
row-auto
row-span-[1-6]
row-span-full
row-start-[1-7]
row-start-auto
row-end-[1-7]
row-end-auto
grid-auto-flow
grid-flow-row
grid-flow-col
grid-flow-dense
grid-flow-row-dense
grid-flow-col-dense
grid-auto-columns
auto-cols-auto
auto-cols-min
auto-cols-max
auto-cols-fr
grid-auto-rows
auto-rows-auto
auto-rows-min
auto-rows-max
auto-rows-fr

```

# Flex/Grid

```css
gap
gap-[$spacing]
gap-x-[$spacing]
gap-y-[$spacing]
justify-content
justify-start
justify-center
justify-end
justify-between
justify-around
justify-evenly
justify-items
justify-items-start
justify-items-end
justify-items-center
justify-items-stretch
justify-self
justify-self-auto
justify-self-start
justify-self-end
justify-self-center
justify-self-stretch
align-content
content-center
content-start
content-end
content-between
content-around
content-evenly
content-baseline
align-items
items-start
items-end
items-center
items-baseline
items-stretch
align-self
self-auto
self-start
self-end
self-center
self-stretch
self-baseline
place-content
place-content-center
place-content-start
place-content-end
place-content-between
place-content-around
place-content-evenly
place-content-stretch
place-content-baseline
place-items
place-items-auto
place-items-start
place-items-end
place-items-center
place-items-stretch
place-self
place-self-auto
place-self-start
place-self-end
place-self-center
place-self-stretch

```

# Pseudo Class

```css
hover
focus
focus-within
focus-visible
active
visited
target
first
last
only
odd
even
first-of-type
last-of-type
only-of-type
empty
disabled
enabled
checked
indeterminate
default
required
valid
invalid
in-range
out-of-range
placeholder-shown
autofill
read-only
before
after
first-letter
first-line
marker
selection
file
backdrop
placeholder
supports-[…]
data-[…]
rtl
ltr
open

```

# Pseudo Class - Media

```css
sm
md
lg
xl
2xl
min-[…]
max-sm
max-md
max-lg
max-xl
max-2xl
max-[…]
dark
portrait
landscape
motion-safe
motion-reduce
contrast-more
contrast-less
print

```

# Pseudo Class - Aria

```css
aria-checked
aria-disabled
aria-expanded
aria-hidden
aria-pressed
aria-readonly
aria-required
aria-selected
aria-[…]

```



# Effect

```css
[mix|background]-blend-mode
[mix|bg]-blend-normal
[mix|bg]-blend-multiply
[mix|bg]-blend-screen
[mix|bg]-blend-overlay
[mix|bg]-blend-{darken|lighten}
[mix|bg]-blend-color
[mix|bg]-blend-color-{dodge|burn}
[mix|bg]-blend-{soft|hard}-light
[mix|bg]-blend-difference
[mix|bg]-blend-exclusion
[mix|bg]-blend-[hue|saturation]
[mix|bg]-blend-luminosity
[mix|bg]-blend-plus-lighter
box-shadow
shadow
shadow-[sm|md|lg|xl|2xl]
shadow-inner
shadow-none
box-shadow-color
shadow--transparent
shadow--{inherit|current}
shadow--white
shadow--black
shadow--{$color}-{50-900}
opacity
opacity-[$opacity]

```
# Table

```css
border-collapse
border-collapse
border-separate
border-spacing
border-spacing-[$spacing]
border-spacing-[x|y]-[$spacing]
table-layout
table-auto
table-fixed

```

# Svg

```css
[fill|stroke]
[fill|stroke]-none
[fill|stroke]-transparent
[fill|stroke]-[inherit|current]
[fill|stroke]-[white|black]
[fill|stroke]-[$color]-[50-900]
stroke-width
stroke-[0|1|2]

```
# Interactivity

```css
[accent|caret] color
accent-transparent
accent-[inherit|current]
accent-white
accent-black
accent-[$color]-[50-900]
appearance
appearance-none
cursor
cursor-[none|auto|default|pointer]
cursor-[wait|text|move|help]
cursor-[progress|cell|crosshair]
cursor-[alias|copy|no-drop]
cursor-[grab|grabbing]
cursor-not-allowed
cursor-context-menu
cursor-vertical-text
cursor-all-scroll
cursor-[row|col]-resize
cursor-[n|e|s|w]-resize
cursor-[ne|nw|se|sw|ew|ns]-resize
cursor-[nesw|nwse]-resize
cursor-zoom-[in|out]
pointer events
pointer-events-auto
pointer-events-none
scroll behavior
scroll-auto
scroll-smooth
scroll margin
[-]scroll-m-[$spacing]
[-]scroll-m[x|y]-[$spacing]
[-]scroll-m[t|r|b|l]-[$spacing]
scroll padding
[-]scroll-p-[$spacing]
[-]scroll-p[x|y]-[$spacing]
[-]scroll-p[t|r|b|l]-[$spacing]
scroll snap align
snap-start
snap-end
snap-center
snap-align-none
scroll snap stop
snap-normal
snap-always
scroll snap type
snap-none
snap-[x|y]
snap-both
snap-mandatory
snap-proximity
resize
resize
resize-[x/y]
resize-none
touch action
touch-auto
touch-none
touch-pan-[x|y]
touch-pan-[left|right]
touch-pan-[up|down]
touch-pinch-zoom
touch-manipulation
user select
select-none
select-text
select-all
select-auto
will change
will-change-auto
will-change-scroll
will-change-contents
will-change-transform

```

# Accessibility

```css
screen-reader
sr-only
not-sr-only

```





- [Sizing](#sizing)
  - [Width](#width)
  - [Min-Width](#min-width)
  - [Max Width](#max-width)
  - [Height](#height)
  - [Min-Height](#min-height)
  - [Max Height](#max-height)


# Sizing

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


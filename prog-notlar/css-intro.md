




# Intro 


# Intro 2



# Layout


- Birden fazla selector kullanmak için aralarına virgül koyulur
h3, h4 {....}

- W3schools da color tutorial, kullanışlı bilgiler sunuyor 


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




# Source

- https://css-tricks.com/snippets/css/complete-guide-grid/


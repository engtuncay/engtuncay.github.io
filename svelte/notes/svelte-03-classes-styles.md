
Source : https://svelte.dev/tutorial/svelte/classes

[Back](../readme.md)

---

# Classes and styles

## The class directive

Like any other attribute, you can specify classes with a JavaScript attribute. Here, we could add a flipped class to the card:

App

```html
<button
	class="card {flipped ? 'flipped' : ''}"
	onclick={() => flipped = !flipped}
>

<script>
	let flipped = $state(false);
</script>

```
This works as expected — if you click on the card now, it’ll flip.

We can make it nicer though. Adding or removing a class based on some condition is such a common pattern in UI development that Svelte includes a special directive to simplify it:

App

```html
<button
	class="card"
	class:flipped={flipped}
	onclick={() => flipped = !flipped}
>

```

This directive means ‘add the `flipped` class whenever `flipped` is truthy’.

## Shorthand class directive

Often, the name of the class will be the same as the name of the value it depends on:

```html
<button
	class="card"
	class:flipped={flipped}
	onclick={() => flipped = !flipped}
>

```

In those cases we can use a shorthand form:

App

```html
<button
	class="card"
	class:flipped
	onclick={() => flipped = !flipped}
>

```

## The Style Directive

As with class, you can write your inline style attributes literally, because Svelte is really just HTML with fancy bits:

App

```html
<button
	class="card"
	style="transform: {flipped ? 'rotateY(0)' : ''}; --bg-1: palegoldenrod; --bg-2: black; --bg-3: goldenrod"
	onclick={() => flipped = !flipped}
>

<script>
	let flipped = $state(false);
</script>

```

When you have a lot of styles, it can start to look a bit wacky. We can tidy things up by using the `style:` directive:

App

```html
<button
	class="card"
	style:transform={flipped ? 'rotateY(0)' : ''}
	style:--bg-1="palegoldenrod"
	style:--bg-2="black"
	style:--bg-3="goldenrod"
	onclick={() => flipped = !flipped}
>

```

## Component Styles

Often, you need to influence the styles inside a child component. Perhaps we want to make these boxes red, green and blue.

One way to do this is with the `:global` CSS modifier, which allows you to indiscriminately target elements inside other components:

App

```html
<style>
	.boxes :global(.box:nth-child(1)) {
		background-color: red;
	}

	.boxes :global(.box:nth-child(2)) {
		background-color: green;
	}

	.boxes :global(.box:nth-child(3)) {
		background-color: blue;
	}
</style>

```

But there are lots of reasons not to do that. For one thing, it’s extremely verbose. For another, it’s brittle — any changes to the implementation details of `Box.svelte` could break the selector.

Most of all though, it’s rude. Components should be able to decide for themselves which styles can be controlled from ‘outside’, in the same way they decide which variables are exposed as props. `:global` should be used as an escape hatch — a last resort.

Inside Box.svelte, change `background-color` so that it is determined by a CSS custom property :

Box

```html
<style>
	.box {
		width: 5em;
		height: 5em;
		border-radius: 0.5em;
		margin: 0 0 1em 0;
		background-color: var(--color, #ddd);
	}
</style>

```

Any parent element (such as `<div class="boxes">`) can set the value of --color, but we can also set it on individual components:

App

```html
<div class="boxes">
	<Box --color="red" />
	<Box --color="green" />
	<Box --color="blue" />
</div>

<script>
	import Box from './Box.svelte';
</script>

```

The values can be dynamic, like any other attribute.

❗ This feature works by wrapping each component in an element with `display: contents`, where needed, and applying the custom properties to it. If you inspect the elements, you’ll see markup like this:

```html
<svelte-css-wrapper style="display: contents; --color: red;">
	<!-- contents -->
</svelte-css-wrapper>

```

Because of `display: contents` this won’t affect your layout, but the extra element can affect selectors like `.parent > .child`.

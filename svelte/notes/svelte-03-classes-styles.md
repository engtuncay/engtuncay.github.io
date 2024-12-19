
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

When you have a lot of styles, it can start to look a bit wacky. We can tidy things up by using the style: directive:

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




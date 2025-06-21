


# 7 Classes

## The class directive

Like any other attribute, you can specify classes with a JavaScript attribute. Here, we could add a flipped class to the card:

App

```html
<button
	class="card {flipped ? 'flipped' : ''}"
	onclick={() => flipped = !flipped}
>

```

This works as expected — if you click on the card now, it’ll flip.

We can make it nicer though. Adding or removing a class based on some condition is such a common pattern in UI development that Svelte includes a special directive (`class:{className}`) to simplify it:

App

```html
<button
	class="card"
	class:flipped={flipped}
	onclick={() => flipped = !flipped}
>

<script>
	let flipped = $state(false);
</script>

<!-- other stuffs -->

```

This directive means ‘add the flipped class whenever flipped is truthy’.






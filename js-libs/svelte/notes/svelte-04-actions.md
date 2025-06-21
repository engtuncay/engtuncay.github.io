
Source : https://svelte.dev/tutorial/svelte/actions

[Back](../readme.md)

---

- [Actions](#actions)
  - [The use directive](#the-use-directive)
  - [Adding parameters](#adding-parameters)
  - [use: (Svelte doc)](#use-svelte-doc)


# Actions

## The use directive

Actions are essentially element-level lifecycle functions. They’re useful for things like:

- interfacing with third-party libraries
- lazy-loaded images
- tooltips
- adding custom event handlers

In this app, you can scribble on the `<canvas>`, and change colours and brush size via the menu. But if you open the menu and cycle through the options with the Tab key, you’ll soon find that the focus isn’t trapped inside the modal.

We can fix that with an action. Import `trapFocus` from `actions.svelte.js`...

App

```html
<script lang="ts">
	import Canvas from './Canvas.svelte';
	import { trapFocus } from './actions.svelte.js';

	const colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet', 'white', 'black'];

	let selected = $state(colors[0]);
	let size = $state(10);
	let showMenu = $state(true);
</script>

```

...then add it to the menu with the `use:` directive:

App

```html
<div class="menu" use:trapFocus>

```

Let’s take a look at the `trapFocus` function in `actions.svelte.js`. An action function is called with a node — the `<div class="menu">` in our case — when the node is mounted to the DOM. Inside the action, we have an effect.

First, we need to add an event listener that intercepts Tab key presses:

actions.svelte

```js
$effect(() => {
	focusable()[0]?.focus();
	node.addEventListener('keydown', handleKeydown);
});

```

Second, we need to do some cleanup when the node is unmounted — removing the event listener, and restoring focus to where it was before the element mounted:

actions.svelte

```js
$effect(() => {
	focusable()[0]?.focus();
	node.addEventListener('keydown', handleKeydown);

	return () => {
		node.removeEventListener('keydown', handleKeydown);
		previous?.focus();
	};
});

```

Now, when you open the menu, you can cycle through the options with the Tab key.

actions.svelte.js (full)

```js
export function trapFocus(node) {
	const previous = document.activeElement;

	function focusable() {
		return Array.from(node.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'));
	}

	function handleKeydown(event) {
		if (event.key !== 'Tab') return;

		const current = document.activeElement;

		const elements = focusable();
		const first = elements.at(0);
		const last = elements.at(-1)

		if (event.shiftKey && current === first) {
			last.focus();
			event.preventDefault();
		}

		if (!event.shiftKey && current === last) {
			first.focus();
			event.preventDefault();
		}
	}

	$effect(() => {
		focusable()[0]?.focus();
		node.addEventListener('keydown', handleKeydown);

		return () => {
			node.removeEventListener('keydown', handleKeydown);
			previous?.focus();
		};
	});
}

```

App (full)

```html
<script>
	import Canvas from './Canvas.svelte';
	import { trapFocus } from './actions.svelte.js';

	const colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet', 'white', 'black'];

	let selected = $state(colors[0]);
	let size = $state(10);
	let showMenu = $state(true);
</script>

<div class="container">
	<Canvas color={selected} size={size} />

	{#if showMenu}
		<div
			role="presentation"
			class="modal-background"
			onclick={(event) => {
				if (event.target === event.currentTarget) {
					showMenu = false;
				}
			}}
			onkeydown={(e) => {
				if (e.key === 'Escape') {
					showMenu = false;
				}
			}}
		>
			<div class="menu" use:trapFocus>
				<div class="colors">
					{#each colors as color}
						<button
							class="color"
							aria-label={color}
							aria-current={selected === color}
							style="--color: {color}"
							onclick={() => {
								selected = color;
							}}
						></button>
					{/each}
				</div>

				<label>
					small
					<input type="range" bind:value={size} min="1" max="50" />
					large
				</label>
			</div>
		</div>
	{/if}

	<div class="controls">
		<button class="show-menu" onclick={() => showMenu = !showMenu}>
			{showMenu ? 'close' : 'menu'}
		</button>
	</div>
</div>

<style>
/* style stuffs  */
</style>

```

canvas.svelte

```html
<script>
	let { color, size } = $props();

	let canvas = $state();
	let context = $state();
	let coords = $state();

	$effect(() => {
		context = canvas.getContext('2d');

		function resize() {
			canvas.width = window.innerWidth;
			canvas.height = window.innerHeight;
		}

		window.addEventListener('resize', resize);
		resize();

		return () => {
			window.removeEventListener('resize', resize);
		};
	});
</script>

<canvas
	bind:this={canvas}
	onpointerdown={(e) => {
		coords = { x: e.offsetX, y: e.offsetY };

		context.fillStyle = color;
		context.beginPath();
		context.arc(coords.x, coords.y, size / 2, 0, 2 * Math.PI);
		context.fill();
	}}
	onpointerleave={() => {
		coords = null;
	}}
	onpointermove={(e) => {
		const previous = coords;

		coords = { x: e.offsetX, y: e.offsetY };

		if (e.buttons === 1) {
			e.preventDefault();

			context.strokeStyle = color;
			context.lineWidth = size;
			context.lineCap = 'round';
			context.beginPath();
			context.moveTo(previous.x, previous.y);
			context.lineTo(coords.x, coords.y);
			context.stroke();
		}
	}}
></canvas>

{#if coords}
	<div
		class="preview"
		style="--color: {color}; --size: {size}px; --x: {coords.x}px; --y: {coords.y}px"
	></div>
{/if}

<style>
  /* styles */
</style>
```

## Adding parameters

Like transitions and animations, an action can take an argument, which the action function will be called with alongside the element it belongs to.

In this exercise, we want to add a tooltip to the `<button>` using the Tippy.js library (https://atomiks.github.io/tippyjs/). The action is already wired up with `use:tooltip`, but if you hover over the button (or focus it with the keyboard) the tooltip contains no content.

First, the action needs to accept a function that returns some options to pass to Tippy:

App

```js
function tooltip(node, fn) {
	$effect(() => {
		const tooltip = tippy(node, fn());

		return tooltip.destroy;
	});
}

```

We’re passing in a function, rather than the options themselves, because the tooltip function does not re-run when the options change.

Then, we need to pass the options into the action:

App

```html
<button use:tooltip={() => ({ content })}>
	Hover me
</button>

```

In Svelte 4, actions returned an object with update and destroy methods. This still works but we recommend using `$effect` instead, as it provides more flexibility and granularity.

app (full)

```html
<script>
	import tippy from 'tippy.js';

	let content = $state('Hello!');

	function tooltip(node, fn) {
		$effect(() => {
			const tooltip = tippy(node, fn());

			return tooltip.destroy;
		});
	}
</script>

<input bind:value={content} />

<button use:tooltip={() => ({ content })}>
	Hover me
</button>

<style>
	:global {
		[data-tippy-root] {
			--bg: #666;
			background-color: var(--bg);
			color: white;
			border-radius: 0.2rem;
			padding: 0.2rem 0.6rem;
			filter: drop-shadow(1px 1px 3px rgb(0 0 0 / 0.1));

			* {
				transition: none;
			}
		}

		[data-tippy-root]::before {
			--size: 0.4rem;
			content: '';
			position: absolute;
			left: calc(50% - var(--size));
			top: calc(-2 * var(--size) + 1px);
			border: var(--size) solid transparent;
			border-bottom-color: var(--bg);
		}
	}
</style>

```

## use: (Svelte doc)

Source : https://svelte.dev/docs/svelte/use

Actions are functions that are called when an element is mounted. They are added with the `use:` directive, and will typically use an `$effect` so that they can reset any state when the element is unmounted:

App

```html
<script lang="ts">
	import type { Action } from 'svelte/action';

	const myaction: Action = (node) => {
		// the node has been mounted in the DOM

		$effect(() => {
			// setup goes here

			return () => {
				// teardown goes here
			};
		});
	};
</script>

<div use:myaction>...</div>

```

An action can be called with an argument:

App

```html
<script lang="ts">
	import type { Action } from 'svelte/action';

	const myaction: Action = (node, data) => {
		// ...
	};
</script>

<div use:myaction={data}>...</div>

```

The action is only called once (but not during server-side rendering) — it will not run again if the argument changes.

Prior to the `$effect` rune, actions could return an object with update and destroy methods, where update would be called with the latest value of the argument if it changed. Using effects is preferred.

🔔 Typing

The `Action` interface receives three optional type arguments — a node type (which can be Element, if the action applies to everything), a parameter, and any custom event handlers created by the action:

App

```html
<script lang="ts">
	import { on } from 'svelte/events';
	import type { Action } from 'svelte/action';

	const gestures: Action<
		HTMLDivElement,
		null,
		{
			onswiperight: (e: CustomEvent) => void;
			onswipeleft: (e: CustomEvent) => void;
			// ...
	}> = (node) => {
		$effect(() => {
			// ...
			node.dispatchEvent(new CustomEvent('swipeleft'));

			// ...
			node.dispatchEvent(new CustomEvent('swiperight'));
		});
	};
</script>

<div
	use:gestures
	onswipeleft={next}
	onswiperight={prev}
>...</div>

```


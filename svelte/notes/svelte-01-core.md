
- Source : https://svelte.dev/tutorial/svelte/welcome-to-svelte

[Back](../readme.md)

---

**Contents**

- [Introduction](#introduction)
  - [1.1 Welcome to the Svelte](#11-welcome-to-the-svelte)
  - [1.2 Your first Component](#12-your-first-component)
  - [1.3 Dynamic Attributes (String Interpolation)](#13-dynamic-attributes-string-interpolation)
  - [1.4 Styling](#14-styling)
  - [1.5 Nested Components (Parent - Child)](#15-nested-components-parent---child)
  - [1.6 Html Tags](#16-html-tags)
  - [1.7 Extra: Creating Svelte Project](#17-extra-creating-svelte-project)
- [2 Reactivity](#2-reactivity)
  - [2.1 State](#21-state)
  - [2.2 Deep State](#22-deep-state)
  - [2.3 Derived State](#23-derived-state)
  - [2.4 Inspecting State](#24-inspecting-state)
  - [2.5 Effects](#25-effects)
  - [2.6 Universal Reactivity](#26-universal-reactivity)
- [3 Props](#3-props)
  - [2.1 Declaring props](#21-declaring-props)
  - [2.2 Default values](#22-default-values)
  - [2.3 Spread Props](#23-spread-props)
- [4 Logic](#4-logic)
  - [4.1 If blocks](#41-if-blocks)
  - [4.2 Else blocks](#42-else-blocks)
  - [4.3 Each blocks](#43-each-blocks)
  - [e. Keyed each blocks](#e-keyed-each-blocks)
  - [f. Await blocks](#f-await-blocks)

[Back](../readme.md)

# Introduction

## 1.1 Welcome to the Svelte

This will teach you everything you need to know to build fast, small web applications easily.

You can also consult the API docs (https://svelte.dev/docs) and visit the playground (https://svelte.dev/playground), or — if you’re impatient to start hacking on your machine locally — create a project with `npx sv create`.

🔔 What is Svelte

Svelte is a tool for building web applications. Like other user interface frameworks, it allows you to build your app declaratively out of components that combine markup, styles and behaviours.

These components are compiled into small, efficient JavaScript modules that eliminate overhead traditionally associated with UI frameworks.

You can build your entire app with Svelte (for example, using an application framework like SvelteKit, which this tutorial will cover), or you can add it incrementally to an existing codebase. You can also ship components as standalone packages that work anywhere.

## 1.2 Your first Component

In Svelte, an application is composed from one or more components. A component is a reusable self-contained block of code that encapsulates HTML, CSS and JavaScript that belong together, written into a .svelte file. The App.svelte file, open in the code editor to the right, is a simple component.

Adding data
A component that just renders some static markup isn’t very interesting. Let’s add some data.

First, add a script tag to your component and declare a name variable:

App.svelte

```js
<script lang="ts">
	let name = 'Svelte';
</script>

<h1>Hello world!</h1>

```

Then, we can refer to name in the markup:

App

```html
<h1>Hello {name}!</h1>

```

Inside the curly braces, we can put any JavaScript we want. Try changing name to name.toUpperCase() for a shoutier greeting.

App

```html
<h1>Hello {name.toUpperCase()}!</h1>

```

## 1.3 Dynamic Attributes (String Interpolation)

Just like you can use curly braces to control text, you can use them to control element attributes.

Our image is missing a src — let’s add one:

App

```html
<img src={src} />

```

That’s better. But if you hover over the `<img>` in the editor, Svelte is giving us a warning:

`<img>` element should have an alt attribute

When building web apps, it’s important to make sure that they’re accessible to the broadest possible userbase, including people with (for example) impaired vision or motion, or people without powerful hardware or good internet connections. Accessibility (shortened to a11y) isn’t always easy to get right, but Svelte will help by warning you if you write inaccessible markup.

In this case, we’re missing the alt attribute that describes the image for people using screenreaders, or people with slow or flaky internet connections that can’t download the image. Let’s add one:

App

```html
<img src={src} alt="A man dances." />

```

We can use curly braces inside attributes. Try changing it to "{name} dances." — remember to declare a name variable in the `<script>` block.

🔔 Shorthand attributes

It’s not uncommon to have an attribute where the name and value are the same, like `src={src}`. Svelte gives us a convenient shorthand for these cases:

App

```html
<img {src} alt="{name} dances." />

```

## 1.4 Styling

Just like in HTML, you can add a `<style>` tag to your component. Let's add some styles to the `<p>` element:

```html
<p>This is a paragraph.</p>

<style>
	p {
		color: purple;
		font-family: 'Comic Sans MS', cursive;
		font-size: 2em;
	}
</style>

```
Importantly, these rules are `scoped to the component`. You won't accidentally change the style of `<p>` elements elsewhere in your app, as we'll see in the next step.

## 1.5 Nested Components (Parent - Child)

It would be impractical to put your entire app in a single component. Instead, we can import components from other files and then use them as though we were including elements.

We now present you 2 files: `App.svelte and Nested.svelte`.

Add a `<script>` tag to the top of `App.svelte` that imports Nested.svelte (child component)...

```html
<script>
  // importing component
  import Nested from './Nested.svelte';
</script>

```

...and include a <Nested /> component:

App.svelte
```html
<p>This is a paragraph.</p>
<!-- using component in the template -->
<Nested/>

```

*Nested.svelte*

```html
<p>This is another paragraph.</p>

```

Notice that even though Nested.svelte has a `<p>` element, the styles from App.svelte don't leak in. 

📝 Extra: Tag Name Convention

Also notice that the component name Nested is capitalised. This convention has been adopted to allow us to differentiate between user-defined components and regular HTML tags.

Try : https://learn.svelte.dev/tutorial/nested-components

## 1.6 Html Tags

Ordinarily, strings are inserted as plain text, meaning that characters like `<` and `>` have no special meaning.

But sometimes you need to render HTML directly into a component. For example, the words you’re reading right now exist in a markdown file that gets included on this page as a blob of HTML.

In Svelte, you do this with the special `{@html ...}` tag:

App

```html
<p>{@html string}</p>

```

Important: Svelte doesn’t perform any sanitization of the expression inside `{@html ...}` before it gets inserted into the DOM. This isn’t an issue if the content is something you trust like an article you wrote yourself. However if it’s some untrusted user content, e.g. a comment on an article, then it’s critical that you manually escape it, otherwise you risk exposing your users to Cross-Site Scripting (XSS) attacks.


--*REVIEW - improve aşağıdaki f maddesi (from old docs)

## 1.7 Extra: Creating Svelte Project



# 2 Reactivity

## 2.1 State

At the heart of Svelte is a powerful system of reactivity for `keeping the DOM in sync with your application state` — for example, in response to an event.

Make the `count` declaration reactive by wrapping the value with `$state(...)`:

App

```js
let count = $state(0);

```

This is called a `rune`, and it’s how you tell Svelte that count isn’t an ordinary variable. Runes look like functions, but they’re not — when you use Svelte, they’re part of the language itself.

All that’s left is to implement `increment`:

App

```js
function increment() {
	count += 1;
}

```

## 2.2 Deep State

As we saw in the previous exercise, state reacts to reassignments. But it also reacts to `mutations` — we call this deep reactivity.

Make `numbers` a reactive array:

App

```js
let numbers = $state([1, 2, 3, 4]);

```

Now, when we change the array...

App

```js
function addNumber() {
	numbers[numbers.length] = numbers.length + 1;
}

```

...the component updates. Or better still, we can `push` to the array instead:

App

```js
function addNumber() {
	numbers.push(numbers.length + 1);
}

```

❗ Deep reactivity is implemented using proxies, and mutations to the proxy do not affect the original object.

proxies ((https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Proxy))


## 2.3 Derived State

Often, you will need to derive state from other state. For this, we have the `$derived` rune:

App

```js
let numbers = $state([1, 2, 3, 4]);
let total = $derived(numbers.reduce((t, n) => t + n, 0));

```

We can now use this in our markup:

App

```html
<p>{numbers.join(' + ')} = {total}</p>

```

The expression inside the `$derived` declaration will be re-evaluated whenever its dependencies (in this case, just numbers) are updated. Unlike normal state, derived state is read-only.

## 2.4 Inspecting State

It’s often useful to be able to track the value of a piece of state as it changes over time.

Inside the addNumber function, we’ve added a console.log statement. But if you click the button and open the console drawer (using the button to the right of the URL bar), you’ll see a warning, and a message saying the message could not be cloned.

That’s because numbers is a reactive proxy. There are a couple of things we can do. Firstly, we can create a non-reactive snapshot of the state with `$state.snapshot(...)`:

App

```js
function addNumber() {
	numbers.push(numbers.length + 1);
	console.log($state.snapshot(numbers));
}

```

Alternatively, we can use the `$inspect` rune to automatically log a snapshot of the state whenever it changes. This code will automatically be stripped out of your production build:

App

```js
function addNumber() {
	numbers.push(numbers.length + 1);
	console.log($state.snapshot(numbers));
}

$inspect(numbers);

```

You can customise how the information is displayed by using `$inspect(...).with(fn)` — for example, you can use console.trace to see where the state change originated from:

App

```js
$inspect(numbers).with(console.trace);

```

## 2.5 Effects

So far we’ve talked about reactivity in terms of state. But that’s only half of the equation — state is only reactive if something is reacting to it, otherwise it’s just a sparkling variable.

The thing that reacts is called an `effect`. You’ve already encountered effects — the ones that Svelte creates on your behalf to update the DOM in response to state changes — but you can also create your own with the `$effect` rune.

❗ Most of the time, you shouldn’t. `$effect` is best thought of as an escape hatch, rather than something to use frequently. If you can put your side effects in an event handler (https://svelte.dev/tutorial/svelte/dom-events), for example, that’s almost always preferable.

Let’s say we want to use `setInterval` to keep track of how long the component has been mounted. Create the effect:

App

```html
<script lang="ts">
	let elapsed = $state(0);
	let interval = $state(1000);

	$effect(() => {
		setInterval(() => {
			elapsed += 1;
		}, interval);
	});
</script>

```

Click the ‘speed up’ button a few times and notice that `elapsed` ticks up faster, because we’re calling `setInterval` each time `interval` gets smaller.

If we then click the ‘slow down’ button... well, it doesn’t work. That’s because we’re not clearing out the old intervals when the effect updates. We can fix that by returning a cleanup function:

App

```js
$effect(() => {
	const id = setInterval(() => {
		elapsed += 1;
	}, interval);

	return () => {
		clearInterval(id);
	};
});

```
The cleanup function is called immediately before the effect function re-runs when `interval` changes, and also when the component is destroyed.

If the effect function doesn’t read any state when it runs, it will only run once, when the component mounts.

❗ Effects do not run during server-side rendering.

## 2.6 Universal Reactivity

In the preceding exercises, we used runes to add reactivity inside components. But we can also use runes outside components, for example to share some global state.

The `<Counter>` components in this exercise are all importing the `counter` object from `shared.js`. But it’s a normal object, and as such nothing happens when you click the buttons. Wrap the object in `$state(...)`:

shared.js

```js
export const counter = $state({
	count: 0
});

```

This causes an error, because you can’t use runes in normal `.js` files, only `.svelte.js` files. Let’s fix that — rename the file to `shared.svelte.js`.

Then, update the import declaration in `Counter.svelte`:

Counter

```html
<script lang="ts">
	import { counter } from './shared.svelte.js';
</script>

```

Now, when you click any button, all three update simultaneously.

❗ You cannot export a `$state` declaration from a module if the declaration is reassigned (rather than just mutated), because the importers would have no way to know about it.


# 3 Props

## 2.1 Declaring props

So far, we've dealt exclusively with internal state — that is to say, the values are only accessible within a given component.

In any real application, you'll need to `pass data from one component down to its children`. To do that, we need to declare `properties`, generally shortened to 'props'.  In Svelte, we do that with the `$props` rune. Edit the Nested.svelte component:
 
➖ *Nested.svelte*

```js
<script lang="ts">
	let { answer } = $props();
</script>

```

➖ *App.svelte*

```html
<script>
	import Nested from './Nested.svelte';
</script>

<Nested answer={42} />

```

➖ *Nested.Svelte*

```html
<script>
	let { answer } = $props();
</script>

<p>The answer is {answer}</p>

```

## 2.2 Default values

We can easily specify default values for props. 

➖ In Nested.svelte :

```html
<script lang="ts">
	let { answer = 'a mystery' } = $props();
</script>

```

If we now add a second component without an `answer` prop, it will fall back to the default:

App.svelte

```html
<Nested answer={42}/>
<Nested/>

```
*Result*

```
The answer is 42
The answer is a mystery
```

## 2.3 Spread Props

In this exercise, in `App.svelte` we’ve forgotten to pass the `name` prop expected by `PackageInfo.svelte`, meaning the `<code>` element is empty and the npm link is broken.

We could fix it by adding the prop...

App

```html
<PackageInfo
	name={pkg.name}
	version={pkg.version}
	description={pkg.description}
	website={pkg.website}
/>

```
...but since the properties of `pkg` correspond to the component’s expected props, we can ‘spread’ them onto the component instead:

App

```html
<PackageInfo {...pkg} />

```

❗ Conversely, in `PackageInfo.svelte` you can get an object containing all the props that were passed into a component using a rest property...

```js
let { name, ...stuff } = $props();

```

...or by skipping destructuring altogether: 

```js
let stuff = $props();

```

...in which case you can access the properties by their object paths:

```js
console.log(stuff.name, stuff.version, stuff.description, stuff.website);

```

# 4 Logic

## 4.1 If blocks

HTML doesn't have a way of expressing logic, like conditionals and loops. Svelte does.

To conditionally render some markup, we wrap it in an if block:

```html
<button onclick={increment}>
	Clicked {count}
	{count === 1 ? 'time' : 'times'}
</button>

{#if count > 10}
	<p>{count} is greater than 10</p>
{/if}


<script>
	let count = $state(0);

	function increment() {
		count += 1;
	}
</script>
```

## 4.2 Else blocks

Multiple conditions can be ‘chained’ together with `else if`:

App

```html
{#if count > 10}
	<p>{count} is greater than 10</p>
{:else if count < 5}
	<p>{count} is less than 5</p>
{:else}
	<p>{count} is between 5 and 10</p>
{/if}

```

❗ A `#` character always indicates `a block opening tag`. A `/` character always indicates `a block closing tag`. 

❗ A `:` character, as in `{:else}`, indicates `a block continuation tag`. 

## 4.3 Each blocks

When building user interfaces you’ll often find yourself working with lists of data. In this exercise, we’ve repeated the <button> markup multiple times — changing the colour each time — but there’s still more to add.

Instead of laboriously copying, pasting and editing, we can get rid of all but the first button, then use an each block:

App
<div>
	{#each colors as color}
		<button
			style="background: red"
			aria-label="red"
			aria-current={selected === 'red'}
			onclick={() => selected = 'red'}
		></button>
	{/each}
</div>
The expression (colors, in this case) can be any iterable or array-like object — in other words, anything that works with Array.from.

Now we need to use the color variable in place of "red":

App
<div>
	{#each colors as color}
		<button
			style="background: {color}"
			aria-label={color}
			aria-current={selected === color}
			onclick={() => selected = color}
		></button>
	{/each}
</div>
You can get the current index as a second argument, like so:

App
<div>
	{#each colors as color, i}
		<button
			style="background: {color}"
			aria-label={color}
			aria-current={selected === color}
			onclick={() => selected = color}
		>{i + 1}</button>
	{/each}
</div>


## e. Keyed each blocks



By default, when you modify the value of an `each` block, it will add and remove items at the end of the block, and update any values that have changed. That might not be what you want.

It's easier to show why than to explain. (https://svelte.dev/tutorial/keyed-each-blocks ) Click to expand the Console, then click the `'Remove first thing'` button a few times, and notice what happens: it does not remove the first `<Thing>` component, but rather `the last DOM node`. Then it updates the name value in the remaining DOM nodes, but not the emoji.

Instead, we'd like to remove only the first `<Thing>` component and `its DOM node`, and leave the others unaffected.

To do that, we specify `a unique identifier (or "key")` for the each block:

```html
{#each things as thing (thing.id)}
	<Thing name={thing.name}/>
{/each}

```

Here, `(thing.id)` is the key, which tells Svelte how to figure out `which DOM node to change when the component updates`.

📝 You can use any object as the key, as Svelte uses a Map internally — in other words you could do <span style="color:red">(thing) instead of (thing.id)</span>. Using a string or number is generally safer, however, since it means <span style="color:red">identity persists without referential equality</span>, for example when updating with fresh data from an API server.

*app.svelte*

```html
<script>
	import Thing from './Thing.svelte';

	let things = [
		{ id: 1, name: 'apple' },
		{ id: 2, name: 'banana' },
		{ id: 3, name: 'carrot' },
		{ id: 4, name: 'doughnut' },
		{ id: 5, name: 'egg' }
	];

	function handleClick() {
		things = things.slice(1);
	}
</script>

<button on:click={handleClick}> Remove first thing </button>

{#each things as thing (thing.id)}
	<Thing name={thing.name} />
{/each}
```

*thing.svelte*

```html
<script>
	import { onDestroy } from 'svelte';

	const emojis = {
		apple: '🍎',
		banana: '🍌',
		carrot: '🥕',
		doughnut: '🍩',
		egg: '🥚'
	};

	// the name is updated whenever the prop value changes...
	export let name;

	// ...but the "emoji" variable is fixed upon initialisation of the component
	const emoji = emojis[name];

	// observe in the console which entry is removed
	onDestroy(() => {
		console.log('thing destroyed: ' + name);
	});
</script>

<p>
	<span>The emoji for {name} is {emoji}</span>
</p>

<style>
	p {
		margin: 0.8em 0;
	}
	span {
		display: inline-block;
		padding: 0.2em 1em 0.3em;
		text-align: center;
		border-radius: 0.2em;
		color:#333333;
		background-color: #ffdfd3;
	}
</style>
```

## f. Await blocks

Most web applications have to deal with asynchronous data at some point. Svelte makes it easy to await the value of promises directly in your markup:

```html
{#await promise}
	<p>...waiting</p>
{:then number}
	<p>The number is {number}</p>
{:catch error}
	<p style="color: red">{error.message}</p>
{/await}

```

✏ Only the most recent promise is considered, meaning you don't need to worry about race conditions.

If you know that your promise can't reject, you can <span style="color:red">omit the catch block</span>. You can also omit <span style="color:red">the first block</span> if you don't want to show anything until the promise resolves:

```html
{#await promise then number}
	<p>the number is {number}</p>
{/await}

```

*app.svelte*

```html
<script>
	async function getRandomNumber() {
		const res = await fetch(`/tutorial/random-number`);
		const text = await res.text();

		if (res.ok) {
			return text;
		} else {
			throw new Error(text);
		}
	}

	let promise = getRandomNumber();

	function handleClick() {
		promise = getRandomNumber();
	}
</script>

<button on:click={handleClick}> generate random number </button>

{#await promise}
	<p>...waiting</p>
{:then number}
	<p>The number is {number}</p>
{:catch error}
	<p style="color: red">{error.message}</p>
{/await}
```

*Result*

```bash
The number is 87
```

or

```
Failed to generate random number. Please try again
```




- Source : https://svelte.dev/tutorial/basics

[Back](readme.md)

**Contents**

- [Introduction](#introduction)
  - [a. Basics](#a-basics)
  - [b. Adding Data - Declaring Variable](#b-adding-data---declaring-variable)
  - [c. Dynamic Attributes - String Interpolation](#c-dynamic-attributes---string-interpolation)
  - [d. Component Styling](#d-component-styling)
  - [e Using Components - Nested Components (Parent - Child)](#e-using-components---nested-components-parent---child)
  - [f. Creating Svelte Project](#f-creating-svelte-project)
- [2 Reactivity](#2-reactivity)
  - [a. Assignments](#a-assignments)
  - [b. Declarations](#b-declarations)
  - [c. Reactive Statements](#c-reactive-statements)
  - [d. Updating arrays and objects](#d-updating-arrays-and-objects)
- [3 Props](#3-props)
  - [a. Declaring props](#a-declaring-props)
  - [b. Default values](#b-default-values)
  - [c. Spread Props](#c-spread-props)
- [4 Logic](#4-logic)
  - [a. If blocks](#a-if-blocks)
  - [b. Else blocks](#b-else-blocks)
  - [c. Else-if blocks](#c-else-if-blocks)
  - [d. Each blocks](#d-each-blocks)
  - [e. Keyed each blocks](#e-keyed-each-blocks)
  - [f. Await blocks](#f-await-blocks)

[Back](readme.md)

# Introduction

Welcome to the Svelte tutorial. 

This will teach you everything you need to know to build fast, small web applications easily.

You can also consult the API docs (https://svelte.dev/docs) and the examples (https://svelte.dev/examples), or — if you're impatient to start hacking on your machine locally — the 60-second quickstart (https://svelte.dev/docs/introduction).

## a. Basics

Svelte is a tool for building fast web applications.

It is similar to JavaScript frameworks such as React and Vue, which share a goal of making it easy to build slick interactive user interfaces.

But there's a crucial difference: Svelte converts your app into ideal JavaScript *at build time*, rather than interpreting your application code *at run time*. This means you don't pay the performance cost of the framework's abstractions, and you don't incur a penalty when your app first loads.

You can build your entire app with Svelte, or you can add it incrementally to an existing codebase. You can also ship components as standalone packages that work anywhere, without the overhead of a dependency on a conventional framework.

🔔 How to use this tutorial

You'll need to have basic familiarity with HTML, CSS and JavaScript to understand Svelte.

🔔 Understanding components

In Svelte, an application is composed from one or more components. A component is *a reusable self-contained block of code* that encapsulates HTML, CSS and JavaScript that belong together, written into a `.svelte` file. The 'hello world' example below is a simple component.

*App.svelte*

```html
<h1>Hello world!</h1>
```

## b. Adding Data - Declaring Variable

A component that just renders some static markup isn't very interesting. Let's add some data.

First, add a script tag to your component and declare a name variable:

```js
<script>
	let name = 'world';
</script>

<h1>Hello world!</h1>

```

Then, we can refer to name in the markup:

```js
<h1>Hello {name}!</h1>

```

Inside the curly braces, we can put any JavaScript we want. Try changing name to name.toUpperCase() for a shoutier greeting.

## c. Dynamic Attributes - String Interpolation

You can use curly braces to control `element attributes`, just like you use them to control text.

Our image is missing a src attribute — let's add one:

```html
<img src={src}>

```
That's better. But Svelte is giving us a warning:

A11y: <img> element should have an alt attribute

When building web apps, it's important to make sure that they're accessible to the broadest possible userbase, including people with (for example) impaired vision or motion, or people without powerful hardware or good internet connections. Accessibility (shortened to a11y) isn't always easy to get right, but Svelte will help by warning you if you write inaccessible markup.

In this case, we're missing the alt attribute that describes the image for people using screenreaders, or people with slow or flaky internet connections that can't download the image. Let's add one:

```html
<img src={src} alt="A man dances.">

```

We can use curly braces inside attributes. Try changing it to "{name} dances." — remember to declare a name variable in the `<script>` block.

🔔 Shorthand attributes

It's not uncommon to have an attribute where the name and value are the same, like src={src}. Svelte gives us a convenient shorthand for these cases:

```html
<img {src} alt="A man dances.">

```

## d. Component Styling

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
Importantly, these rules are <span style="color:red">scoped to the component</span>. You won't accidentally change the style of `<p>` elements elsewhere in your app, as we'll see in the next step.

## e Using Components - Nested Components (Parent - Child)

It would be impractical to put your entire app in a single component. Instead, we can import components from other files and then use them as though we were including elements.

We now present you 2 files: `App.svelte and Nested.svelte`.

Each `.svelte` file holds a component that is a <span style="color:red">reusable self-contained block of code</span> that encapsulates HTML, CSS, and JavaScript that belong together.

Let's add a `<script>` tag to `App.svelte` that imports the file (our component) Nested.svelte into our app...

```html
<script>
  // importing component
  import Nested from './Nested.svelte';
</script>

```

...then use component Nested in the app markup:

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

➖ Tag Name Convention

Also notice that the component name Nested is capitalised. This convention has been adopted to allow us to differentiate between user-defined components and regular HTML tags.

Try : https://learn.svelte.dev/tutorial/nested-components

--*REVIEW - improve aşağıdaki f maddesi

## f. Creating Svelte Project

This tutorial is designed to get you familiar with the process of writing components. But at some point, you'll want to start writing components in the comfort of your own text editor.

First, you'll need to integrate Svelte with a `build tool`. We recommend using *SvelteKit*, which sets up Vite with vite-plugin-svelte for you...

```bash
npm create svelte@latest myapp
```

There are also a number of community-maintained integrations.

Don't worry if you're relatively new to web development and haven't used these tools before. We've prepared a simple step-by-step guide, Svelte for new developers, which walks you through the process.

You'll also want to configure your text editor. There are plugins for many popular editors as well as an official VS Code extension.

Then, once you've got your project set up, using Svelte components is easy. The compiler turns each component into a regular JavaScript class — just import it and instantiate with new:

```js
import App from './App.svelte';

const app = new App({
	target: document.body,
	props: {
		// we'll learn about props later
		answer: 42
	}
});

```

You can then interact with the app using `the component API` if you need to.

--*REVIEW - component api derken neyi kastetti

# 2 Reactivity

## a. Assignments

At the heart of Svelte is a powerful system of reactivity for `keeping the DOM in sync with your application state` — for example, in response to an event.

➖ Adding click event to button

To demonstrate it, we first need to wire up an event handler :

```html
<button on:click={incrementCount}>

```
Inside the incrementCount function, all we need to do is change the value of count:

```js
function incrementCount() {
  count += 1;
}

```

Svelte 'instruments' this assignment with some code that tells it the DOM will need to be updated.

🍋 Full Solution

```html
<script>
  let count = 0;

  function incrementCount() {
    count += 1;
  }
</script>

<button on:click={incrementCount}>
  Clicked {count}
  {count === 1 ? 'time' : 'times'}
</button>

<style>
  button {
    width:200px;
  }
</style>

```

## b. Declarations

Svelte's reactivity not only keeps the DOM in sync with your application's variables as shown in the previous section, it can also keep variables in sync with each other `using reactive declarations`. They look like this:

```js
let count = 0;
$: doubled = count * 2;

```

Don't worry if this looks a little alien. It's valid (if unconventional) JavaScript, which Svelte interprets to mean 're-run this code whenever any of the referenced values change'. Once you get used to it, there's no going back.

Let's use doubled in our markup:

```html
<p>{count} doubled is {doubled}</p>
```

Of course, you could just write {count * 2} in the markup instead — you don't have to use reactive values. Reactive values become particularly valuable when you need to reference them multiple times, or you have values that depend on other reactive values.

```html
<script>
	let count = 0;
	$: doubled = count * 2;

	function handleClick() {
		count += 1;
	}
</script>

<button on:click={handleClick}>
	Clicked {count}
	{count === 1 ? 'time' : 'times'}
</button>

<p>{count} doubled is {doubled}</p>
```

## c. Reactive Statements

We're not limited to `declaring reactive values` — we can also run arbitrary statements reactively. For example, we can log the value of count whenever it changes:

```js
$: console.log('the count is ' + count);

```

You can easily `group statements together with a block`:

```js
$: {
	console.log('the count is ' + count);
	alert('I SAID THE COUNT IS ' + count);
}

```

You can even put the $: in front of things like if blocks:

```js
$: if (count >= 10) {
  alert('count is dangerously high!');
  count = 9;
}

```

🍋 Full Solution

```html
<script>
	let count = 0;

	$: if (count >= 10) {
		alert('count is dangerously high!');
		count = 0;
	}

	function handleClick() {
		count += 1;
	}
</script>

<button on:click={handleClick}>
  Clicked {count}
  {count === 1 ? 'time' : 'times'}
</button>
```

Try : https://learn.svelte.dev/tutorial/reactive-statements

## d. Updating arrays and objects

Because Svelte's reactivity is triggered by assignments, using array methods like push and splice won't automatically cause updates. For example, clicking the 'Add a number' button doesn't currently do anything, even though we're calling `numbers.push(...)` inside addNumber.

One way to fix that is to add an assignment that would otherwise be redundant:

App.svelte

```js
function addNumber() {
	numbers.push(numbers.length + 1);
	numbers = numbers;
}

```

But there's a more idiomatic solution:

App.svelte

```js
function addNumber() {
	numbers = [...numbers, numbers.length + 1];
}

```

You can use similar patterns to replace pop, shift, unshift and splice.

Assignments to properties of arrays and objects — `e.g. obj.foo += 1 or array[i] = x` — work the same way as assignments to the values themselves.

App.svelte

```js
function addNumber() {
  numbers[numbers.length] = numbers.length + 1;
}

```

❗ A simple rule of thumb: the name of the updated variable must appear on the left hand side of the assignment. For example this...

```js
const obj = { foo: { bar: 1 } };
const foo = obj.foo;
foo.bar = 2;

```

❗ ...won't trigger reactivity on obj.foo.bar, unless you follow it up with `obj = obj`.

Try : https://learn.svelte.dev/tutorial/updating-arrays-and-objects

# 3 Props

## a. Declaring props

So far, we've dealt exclusively with internal state — that is to say, the values are only accessible within a given component.

In any real application, you'll need to `pass data from one component down to its children`. To do that, we need to declare properties, generally shortened to 'props'. In Svelte, we do that with the `export keyword`. Edit the `Nested.svelte` component:
 
➖ *Nested.svelte*

```js
<script>
export let answer;
</script>

```

Just like `$:`, this may feel a little weird at first. That's not how export normally works in JavaScript modules! Just roll with it for now — it'll soon become second nature.

➖ *App.svelte*

```html
<script>
  import Nested from './Nested.svelte';
</script>

<Nested answer={42} /> <!-- sending a prop -->

```

➖ *Nested.Svelte*

```html
<script>
  export let answer; /* accepting/receiving a prop */
</script>

<p>The answer is {answer}</p>

```

Try : https://learn.svelte.dev/tutorial/declaring-props


## b. Default values

We can easily specify default values for props 

➖ In Nested.svelte :

```html
<script>
  export let answer = 'a mystery';
</script>
```

If we now add a second component without an answer prop, it will fall back to the default:

➖ *App.svelte*

```html
<script>
  import Nested from './Nested.svelte';
</script>

<Nested answer={42}/>
<Nested/>

```

*Result*

```
The answer is 42
The answer is a mystery
```

--*REVIEW - variable ın prop olarak gönderildiği örnek eklenir

## c. Spread Props

We can pass an object to a component by 'spreading' them onto a component instead of specifying each one:

*Parent-Component*

```html
<script>
  import PackageInfo from './PackageInfo.svelte';

  const pkg = {
    name: 'svelte',
    speed: 'blazing',
    version: 4,
    website: 'https://svelte.dev'
  };
</script>

<PackageInfo {...pkg} />

```

➖ *PackageInfo.svelte*

```html
<script>
	export let name;
	export let version;
	export let speed;
	export let website;
</script>

<p>
	The <code>{name}</code> package is {speed} fast. Download version {version} from
	<a href="https://www.npmjs.com/package/{name}">npm</a>
	and <a href={website}>learn more here</a>
</p>

```

📝 Conversely, if you need to reference all the props that were passed into a component, including ones that weren't declared with export, you can do so by accessing `$$props` directly. It's not generally recommended, as it's difficult for Svelte to optimise, but it's useful in rare cases.

--*REVIEW - $$props detaylandırılmalı

Try : https://learn.svelte.dev/tutorial/spread-props

--*TBC - SVELTE CORE

# 4 Logic

## a. If blocks

HTML doesn't have a way of expressing logic, like conditionals and loops. Svelte does.

To conditionally render some markup, we wrap it in an if block:

```html
{#if user.loggedIn}
  <button on:click={toggle}>
    Log out
  </button>
{/if}

{#if !user.loggedIn}
  <button on:click={toggle}>
    Log in
  </button>
{/if}

```

*app.svelte*

```html
<script>
  let user = { loggedIn: false };

  function toggle() {
    user.loggedIn = !user.loggedIn;
  }
</script>

{#if user.loggedIn}
  <button on:click={toggle}> Log out </button>
{/if}

{#if !user.loggedIn}
  <button on:click={toggle}> Log in </button>
{/if}

```

## b. Else blocks

Since the two conditions — if `user.loggedIn` and if `!user.loggedI`n — are mutually exclusive, we can simplify this component slightly by using an else block:

```html
{#if user.loggedIn}
	<button on:click={toggle}>
		Log out
	</button>
{:else}
	<button on:click={toggle}>
		Log in
	</button>
{/if}

```

❗ A `#` character always indicates `a block opening tag`. A `/` character always indicates `a block closing tag`. 

❗ A `:` character, as in `{:else}`, indicates `a block continuation tag`. 

Don't worry — you've already learned almost all the syntax Svelte adds to HTML.

## c. Else-if blocks

Multiple conditions can be 'chained' together with else if:

```html
{#if x > 10}
	<p>{x} is greater than 10</p>
{:else if 5 > x}
	<p>{x} is less than 5</p>
{:else}
	<p>{x} is between 5 and 10</p>
{/if}

```

## d. Each blocks

If you need to loop over lists of data, use an each block:

```html
<script>
	let cats = [
		{ id: 'J---aiyznGQ', name: 'Keyboard Cat' },
		{ id: 'z_AbfPXTKms', name: 'Maru' },
		{ id: 'OUtn3pvWmpg', name: 'Henri The Existential Cat' }
	];
</script>

<ul>
	{#each cats as cat}
		<li><a target="_blank" href="https://www.youtube.com/watch?v={cat.id}" rel="noreferrer">
			{cat.name}
		</a></li>
	{/each}
</ul>

```

The expression (cats, in this case) can be `any array or array-like object (i.e. it has a length property)`. You can loop over generic iterables with each [...iterable].

You can get the current index as a second argument, like so:

```html
{#each cats as cat, i}
	<li><a target="_blank" href="https://www.youtube.com/watch?v={cat.id}" rel="noreferrer">
		{i + 1}: {cat.name}
	</a></li>
{/each}

```

If you prefer, you can use destructuring — `each cats as { id, name }` — and replace `cat.id and cat.name with id and name`.

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




- Source : https://svelte.dev/tutorial/basics

- [Introduction](#introduction)
  - [a. Basics](#a-basics)
  - [b. Adding Data - Declaring Variable](#b-adding-data---declaring-variable)
  - [c. Dynamic Attributes](#c-dynamic-attributes)
  - [d Styling](#d-styling)
  - [e Using Components - Nested Components (Parent - Child)](#e-using-components---nested-components-parent---child)
  - [f. Making an app](#f-making-an-app)
- [2 Reactivity](#2-reactivity)
  - [a. Assignments](#a-assignments)
  - [b. Declarations](#b-declarations)
  - [c. Statements](#c-statements)
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

---

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

You can use curly braces to control element attributes, just like you use them to control text.

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

## d Styling

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

(tor:leak in=sız-)

🍋 Tag Name Convention

Also notice that the component name Nested is capitalised. This convention has been adopted to allow us to differentiate between user-defined components and regular HTML tags.

--*REVIEW - improve f madde

## f. Installing a svelte app

This tutorial is designed to get you familiar with the process of writing components. But at some point, you'll want to start writing components in the comfort of your own text editor.

First, you'll need to integrate Svelte with a build tool. We recommend using *SvelteKit*, which sets up Vite with vite-plugin-svelte for you...

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

You can then interact with app using the component API if you need to.

# 2 Reactivity

## a. Assignments

At the heart of Svelte is a powerful system of reactivity for keeping the DOM in sync with your application state — for example, in response to an event.

To demonstrate it, we first need to wire up an event handler. Replace line 9 with this:

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

## b. Declarations

Svelte's reactivity not only keeps the DOM in sync with your application's variables as shown in the previous section, it can also keep variables in sync with each other using reactive declarations. They look like this:

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

## c. Statements

We're not limited to declaring reactive values — we can also run arbitrary statements reactively. For example, we can log the value of count whenever it changes:

```js
$: console.log('the count is ' + count);

```

You can easily group statements together with a block:

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

## d. Updating arrays and objects

Svelte's reactivity is triggered by assignments. Methods that mutate arrays or objects will not trigger updates by themselves.

In this example, clicking the "Add a number" button calls the addNumber function, which appends a number to the array but doesn't trigger the recalculation of sum.

One way to fix that is to assign numbers to itself to tell the compiler it has changed:

```js
function addNumber() {
	numbers.push(numbers.length + 1);
	numbers = numbers; // triggers numbers array changed
}

```

You could also write this more concisely using the ES6 spread syntax:

```js
function addNumber() {
	numbers = [...numbers, numbers.length + 1];
}

```

The same rule applies to array methods such as pop, shift, and splice and to object methods such as Map.set, Set.add, etc.

Assignments to properties of arrays and objects — e.g. obj.foo += 1 or array[i] = x — work the same way as assignments to the values themselves.

```js
function addNumber() {
	numbers[numbers.length] = numbers.length + 1;
}

```

However, indirect assignments to references such as this...

```js
const foo = obj.foo;
foo.bar = 'baz';

```
or

```js
function quox(thing) {
	thing.foo.bar = 'baz';
}
quox(obj);

```

...won't trigger reactivity on obj.foo.bar, unless you follow it up with `obj = obj`.

*A simple rule of thumb*: the updated variable must directly appear on the left hand side of the assignment.

# 3 Props

## a. Declaring props

So far, we've dealt exclusively with internal state — that is to say, the values are only accessible within a given component.

In any real application, you'll need to pass data from one component down to its children. To do that, we need to declare properties, generally shortened to 'props'. In Svelte, we do that with the export keyword. Edit the Nested.svelte component:

```js
<script>
export let answer;
</script>

```

Just like $:, this may feel a little weird at first. That's not how export normally works in JavaScript modules! Just roll with it for now — it'll soon become second nature.

## b. Default values

We can easily specify default values for props in Nested.svelte:

```html
<script>
	export let answer = 'a mystery';
</script>
```

If we now add a second component without an answer prop, it will fall back to the default:

```html
<Nested answer={42}/>
<Nested/>

```

## c. Spread Props

If you have an object of properties, you can 'spread' them onto a component instead of specifying each one:

```html
<Info {...pkg}/>

```

Conversely, if you need to reference all the props that were passed into a component, including ones that weren't declared with export, you can do so by accessing $$props directly. It's not generally recommended, as it's difficult for Svelte to optimise, but it's useful in rare cases.

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

Try it — update the component, and click on the buttons.

## b. Else blocks

Since the two conditions — if user.loggedIn and if !user.loggedIn — are mutually exclusive, we can simplify this component slightly by using an else block:

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

A # character always indicates a block opening tag. A / character always indicates a block closing tag. A : character, as in {:else}, indicates a block continuation tag. Don't worry — you've already learned almost all the syntax Svelte adds to HTML.

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
<ul>
	{#each cats as cat}
		<li><a target="_blank" href="https://www.youtube.com/watch?v={cat.id}" rel="noreferrer">
			{cat.name}
		</a></li>
	{/each}
</ul>

```

The expression (cats, in this case) can be any array or array-like object (i.e. it has a length property). You can loop over generic iterables with each [...iterable].

You can get the current index as a second argument, like so:

```html
{#each cats as cat, i}
	<li><a target="_blank" href="https://www.youtube.com/watch?v={cat.id}" rel="noreferrer">
		{i + 1}: {cat.name}
	</a></li>
{/each}

```

If you prefer, you can use destructuring — each cats as { id, name } — and replace cat.id and cat.name with id and name.

## e. Keyed each blocks

By default, when you modify the value of an each block, it will add and remove items at the end of the block, and update any values that have changed. That might not be what you want.

It's easier to show why than to explain. Click to expand the Console, then click the 'Remove first thing' button a few times, and notice what happens: it does not remove the first <Thing> component, but rather the last DOM node. Then it updates the name value in the remaining DOM nodes, but not the emoji.

Instead, we'd like to remove only the first <Thing> component and its DOM node, and leave the others unaffected.

To do that, we specify a unique identifier (or "key") for the each block:

```html
{#each things as thing (thing.id)}
	<Thing name={thing.name}/>
{/each}

```

Here, (thing.id) is the key, which tells Svelte how to figure out which DOM node to change when the component updates.

You can use any object as the key, as Svelte uses a Map internally — in other words you could do (thing) instead of (thing.id). Using a string or number is generally safer, however, since it means identity persists without referential equality, for example when updating with fresh data from an API server.

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

Only the most recent promise is considered, meaning you don't need to worry about race conditions.

If you know that your promise can't reject, you can omit the catch block. You can also omit the first block if you don't want to show anything until the promise resolves:

```html
{#await promise then number}
	<p>the number is {number}</p>
{/await}

```


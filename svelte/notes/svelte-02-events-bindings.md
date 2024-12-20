
- Source : https://svelte.dev/tutorial/svelte/welcome-to-svelte

[Back](../readme.md)

**Contents**

- [5 Events](#5-events)
  - [5.1 DOM events](#51-dom-events)
  - [5.2 Inline handlers](#52-inline-handlers)
  - [5.3 Capturing](#53-capturing)
  - [5.4 Component events (Event Dispatcher)](#54-component-events-event-dispatcher)
  - [5.5 Spreading Events](#55-spreading-events)
- [6 Bindings](#6-bindings)
  - [6.1 Text inputs](#61-text-inputs)
  - [6.2 Numeric inputs](#62-numeric-inputs)
  - [6.3 Checkbox inputs](#63-checkbox-inputs)
  - [6.4 Select Bindings](#64-select-bindings)
  - [6.5 Group inputs](#65-group-inputs)
  - [6.6 Select Multiple](#66-select-multiple)
  - [6.7 Textarea inputs](#67-textarea-inputs)
- [Art - Data Binding In Svelte By Aagam Vadecha (Svelte 4)](#art---data-binding-in-svelte-by-aagam-vadecha-svelte-4)
  - [One-way vs two-way data binding](#one-way-vs-two-way-data-binding)
  - [Passing props down to a child](#passing-props-down-to-a-child)
  - [Passing props back to a parent](#passing-props-back-to-a-parent)
    - [Using bind](#using-bind)
    - [Using a callback](#using-a-callback)
    - [Dispatching Events](#dispatching-events)
  - [Conclusion](#conclusion)
- [Dynamic Component](#dynamic-component)

[Back](../readme.md)

# 5 Events

## 5.1 DOM events

As we’ve briefly seen already, you can listen to any DOM event on an element (such as click or pointermove) with an `on<name>` function:

App

```html
<div onpointermove={onpointermove}>
	The pointer is at {Math.round(m.x)} x {Math.round(m.y)}
</div>

```
App (script part)

```js
<script>
	let m = $state({ x: 0, y: 0 });

	function onpointermove(event) {
		m.x = event.clientX;
		m.y = event.clientY;
	}
</script>
```

Like with any other property where the name matches the value, we can use the short form:

App

```html
<div {onpointermove}>
	The pointer is at {Math.round(m.x)} x {Math.round(m.y)}
</div>

```

## 5.2 Inline handlers

You can also declare event handlers inline:

App

```html
<script>
	let m = $state({ x: 0, y: 0 });

	function onpointermove(event) {
		m.x = event.clientX;
		m.y = event.clientY;
	}
</script>

<div
	onpointermove={(event) => {
		m.x = event.clientX;
		m.y = event.clientY;
	}}
>
	The pointer is at {m.x} x {m.y}
</div>

```

❗ `In some frameworks` you may see recommendations to `avoid inline event handlers for performance reasons`, particularly inside loops. That advice doesn't apply to Svelte — the compiler will always do the right thing, whichever form you choose.

## 5.3 Capturing 

Normally, event handlers run during the bubbling phase. Notice what happens if you type something into the `<input>` in this example — the inner handler runs first, as the event ‘bubbles’ from the target up to the document, followed by the outer handler.

Sometimes, you want handlers to run during the `capture` phase instead. Add `capture` to the end of the event name:

App

```html
<div onkeydowncapture={(e) => alert(`<div> ${e.key}`)} role="presentation">
	<input onkeydowncapture={(e) => alert(`<input> ${e.key}`)} />
</div>

```

Now, the relative order is reversed. If both capturing and non-capturing handlers exist for a given event, the capturing handlers will run first.


## 5.4 Component events (Event Dispatcher)

You can pass event handlers to components like any other prop. In `Stepper.svelte`, add increment and decrement props...

Stepper

```html
<script>
	let { increment, decrement } = $props();
</script>

```

...and wire them up:

Stepper

```html
<button onclick={decrement}>-1</button>
<button onclick={increment}>+1</button>

```

In App.svelte, define the handlers:

```html
<Stepper
	increment={() => value += 1}
	decrement={() => value -= 1}
/>

<p>The current value is {value}</p>

<script>
	import Stepper from './Stepper.svelte';

	let value = $state(0);
</script>

```

## 5.5 Spreading Events

We can also spread event handlers directly onto elements. Here, we’ve defined an `onclick` handler in App.svelte — all we need to do is pass the props to the `<button>` in BigRedButton.svelte:

BigRedButton

```html
<button {...props}>
	Push
</button>

<script>
	let props = $props();
</script>

```

App

```html
<script>
	import BigRedButton from './BigRedButton.svelte';
	import horn from './horn.mp3';

	const audio = new Audio();
	audio.src = horn;

	function honk() {
		audio.load();
		audio.play();
	}
</script>

<BigRedButton onclick={honk} />
```


# 6 Bindings 

It is a way of `child to parent communications`. For example, input box value in the child component is binded to a variable in the parent component. 

## 6.1 Text inputs

`As a general rule, data flow in Svelte is top down (parent to child)` — a parent component can set props on a child component, and a component can set attributes on an element, but not the other way around.

Sometimes it's useful to break that rule. Take the case of the `<input>` element in this component — we could add an `on:input`event handler that sets the value of name to `event.target.value`, but it's a bit... boilerplatey. It gets even worse with other form elements, as we'll see.

Instead, we can use the bind:value directive :

```html
<input bind:value={name}>
<!-- parent.name = input.value (two-way binding) -->
```

This means that not only will changes to the value of `name` update the input value, but changes to the input value will update `name`.


🔔 Binding to object field

```html
<script>
  let formx = { name : '', surname: ''};
</script>

<input bind:value={formx.name} />
<input bind:value={formx.surname} />

<h1>Hello {formx.name} {formx.surname} !</h1>
```

Try : https://svelte.dev/repl/edc48ddcd0b947c88a80f55ab35f224d?version=4.2.19

## 6.2 Numeric inputs

In the DOM, everything is a string. That's unhelpful when you're dealing with numeric inputs — `type="number" and type="range"` — as it means you have to remember to coerce `input.value` before using it.

With `bind:value`, Svelte takes care of it for you:

```html
<label>
	<input type="number" bind:value={a} min="0" max="10" />
	<input type="range" bind:value={a} min="0" max="10" />
</label>

<label>
	<input type="number" bind:value={b} min="0" max="10" />
	<input type="range" bind:value={b} min="0" max="10" />
</label>

<p>{a} + {b} = {a + b}</p>

<script>
	let a = $state(1);
	let b = $state(2);
</script>
```



## 6.3 Checkbox inputs

Checkboxes are used for toggling between states. Instead of binding to `input.value`, we bind to `input.checked`:

```html
<label>
	<input type="checkbox" bind:checked={yes} />
	Yes! Send me regular email spam
</label>


{#if yes}
	<p>
		Thank you. We will bombard your inbox and sell your personal details.
	</p>
{:else}
	<p>
		You must opt in to continue. If you're not paying, you're the product.
	</p>
{/if}

<script>
	let yes = $state(false);
</script>



```
## 6.4 Select Bindings

We can also use `bind:value` with `<select>` elements:

App

```html
<select
	bind:value={selected}
	onchange={() => answer = ''}
>

```

Note that the `<option>` values are objects rather than strings. Svelte doesn’t mind.

❗ Because we haven’t set an initial value of selected, the binding will set it to the default value (the first in the list) automatically. Be careful though — until the binding is initialised, selected remains undefined, so we can’t blindly reference e.g. `selected.id` in the template.

App (full)

```html
<script>
	let questions = $state([
		{
			id: 1,
			text: `Where did you go to school?`
		},
		{
			id: 2,
			text: `What is your mother's name?`
		},
		{
			id: 3,
			text: `What is another personal fact that an attacker could easily find with Google?`
		}
	]);

	let selected = $state();

	let answer = $state('');

	function handleSubmit(e) {
		e.preventDefault();

		alert(
			`answered question ${selected.id} (${selected.text}) with "${answer}"`
		);
	}
</script>

<h2>Insecurity questions</h2>

<form onsubmit={handleSubmit}>
	<select
		bind:value={selected}
		onchange={() => (answer = '')}
	>
		{#each questions as question}
			<option value={question}>
				{question.text}
			</option>
		{/each}
	</select>

	<input bind:value={answer} />

	<button disabled={!answer} type="submit">
		Submit
	</button>
</form>

<p>
	selected question {selected? selected.id : '[waiting...]'}
</p>

```

## 6.5 Group inputs

If you have multiple type="radio" or type="checkbox" inputs relating to the same value, you can use `bind:group` along with the value attribute. Radio inputs in the same group are mutually exclusive; checkbox inputs in the same group form an array of selected values.

Add `bind:group={scoops}` to the radio inputs...

App

```html
<input
	type="radio"
	name="scoops"
	value={number}
	bind:group={scoops}
/>

```

...and `bind:group={flavours}` to the checkbox inputs:

App

```html
<input
	type="checkbox"
	name="flavours"
	value={flavour}
	bind:group={flavours}
/>

```

App (full)

```html
<script>
	let scoops = $state(1);
	let flavours = $state([]);

	const formatter = new Intl.ListFormat('en', { style: 'long', type: 'conjunction' });
</script>

<h2>Size</h2>

{#each [1, 2, 3] as number}
	<label>
		<input
			type="radio"
			name="scoops"
			value={number}
			bind:group={scoops}
		/>

		{number} {number === 1 ? 'scoop' : 'scoops'}
	</label>
{/each}

<h2>Flavours</h2>

{#each ['cookies and cream', 'mint choc chip', 'raspberry ripple'] as flavour}
	<label>
		<input
			type="checkbox"
			name="flavours"
			value={flavour}
			bind:group={flavours}
		/>

		{flavour}
	</label>
{/each}

{#if flavours.length === 0}
	<p>Please select at least one flavour</p>
{:else if flavours.length > scoops}
	<p>Can't order more flavours than scoops!</p>
{:else}
	<p>
		You ordered {scoops} {scoops === 1 ? 'scoop' : 'scoops'}
		of {formatter.format(flavours)}
	</p>
{/if}

```

## 6.6 Select Multiple

A `<select>` element can have a multiple attribute, in which case it will populate an array rather than selecting a single value.

Replace the checkboxes with a `<select multiple>`:

App

```html
<h2>Flavours</h2>

<select multiple bind:value={flavours}>
	{#each ['cookies and cream', 'mint choc chip', 'raspberry ripple'] as flavour}
		<option>{flavour}</option>
	{/each}
</select>

```

Note that we’re able to omit the value attribute on the `<option>`, since the value is identical to the element’s contents.

📝 Press and hold the control key (or the command key on MacOS) to select multiple options.

App (full)

```html
<script>
	let scoops = $state(1);
	let flavours = $state([]);

	const formatter = new Intl.ListFormat('en', { style: 'long', type: 'conjunction' });
</script>

<h2>Size</h2>

{#each [1, 2, 3] as number}
	<label>
		<input
			type="radio"
			name="scoops"
			value={number}
			bind:group={scoops}
		/>

		{number} {number === 1 ? 'scoop' : 'scoops'}
	</label>
{/each}

<h2>Flavours</h2>

<select multiple bind:value={flavours}>
	{#each ['cookies and cream', 'mint choc chip', 'raspberry ripple'] as flavour}
		<option>{flavour}</option>
	{/each}
</select>

{#if flavours.length === 0}
	<p>Please select at least one flavour</p>
{:else if flavours.length > scoops}
	<p>Can't order more flavours than scoops!</p>
{:else}
	<p>
		You ordered {scoops} {scoops === 1 ? 'scoop' : 'scoops'}
		of {formatter.format(flavours)}
	</p>
{/if}


```

## 6.7 Textarea inputs

The `<textarea>` element behaves similarly to a text input in Svelte — use bind:value:

App

```html
<textarea bind:value={value}></textarea>

```
In cases like these, where the names match, we can also use a shorthand form:

App

```html
<textarea bind:value></textarea>

```

This applies to all bindings, not just `<textarea>` bindings.

App (full)

```html
<script>
	import { marked } from 'marked';

	let value = $state(`Some words are *italic*, some are **bold**\n\n- lists\n- are\n- cool`);
</script>

<div class="grid">
	input
	<textarea bind:value></textarea>

	output
	<div>{@html marked(value)}</div>
</div>

<style>
	.grid {
		display: grid;
		grid-template-columns: 5em 1fr;
		grid-template-rows: 1fr 1fr;
		grid-gap: 1em;
		height: 100%;
	}

	textarea {
		flex: 1;
		resize: none;
	}
</style>
```


# Art - Data Binding In Svelte By Aagam Vadecha (Svelte 4)

➖ Source : https://hygraph.com/blog/data-binding-in-svelte , (some parts may be modified or added) , Oct 11, 2024

## One-way vs two-way data binding

In one-way data binding, the data flow is from `the variable in your script to the UI element`. Changes to the variable will update the UI, but not the other way around. For example

```html
<script>  
  let message = "Hello!";
</script>

<p>{message}</p>

```

In this case, any changes to the message variable in the `<script>` block will be reflected in the UI, but changes in the UI won’t affect the message.

Svelte provides two-way data binding for form elements like `<input>, <textarea>, <select>, and more`, using the bind: directive. This means the variable can updated by the UI elements like input, and it will be reflected in the script tag, and any changes to the variable in the script tag will reflect in the input elements.

```html
<script>  
  let message="How are you?";  
</script>

<input type="text" bind:value={message} />  
<p>Hello, {message}!</p>

```

In the code above, the `bind:value={message}` creates two-way binding:

When the user types into the input field, the message variable in the script will be updated. On other hand, when the message is updated in the script, the input field's value and the p tag UI will be updated accordingly.

## Passing props down to a child

Here's a super simple Parent.svelte that imports the Child.svelte component and passes a prop named message to it. It is almost the same way as we would pass props in React.

➖ Parent.svelte

```html
<script lang="ts">  
  import Child from "./Child.svelte";  
</script>

<div class="parent">  
  <h2>Parent</h2>  
  <Child message="Hello World" />  
</div>

```

To define an incoming prop in Svelte, we need to declare it as a variable in the Child component and export it using the export keyword as shown below.

➖ Child.svelte

```html
<script lang="ts">  
  export let message;  
</script>

<div class="child">  
  <h2>Child</h2>  
  <p>Received message: {message}</p>  
</div>

```

That’s it, here’s how the components will look with some decent styling.

image1.png

## Passing props back to a parent

As a general rule data flow goes from the parent to the child but there can be situations where we want to pass values back from the child to the parent. There are several ways we can achieve this in Svelte.

### Using bind

We can use `the bind component directive` to `bind a parent variable with a child prop`. As we can see in the example below, the firstName variable from parent is bound with firstName prop in child. That’s it, any changes we make in the input box in the child component will reflect in the parent variable as well.

Parent.svelte

```html
<script lang="ts">  
  let parFirstName = "";  
  import Child from "./Child.svelte";  

  function evClick() {
     parFirstName= "changed from parent";
     alert('executed evClick');
  }
</script>

<div class="parent">  
  <h2>Parent</h2>  
  <p>Parent Comp (parFirstName) : {parFirstName} </p>  
  <Child bind:firstName={parFirstName} />
  <!-- $ : parent.parFirstName = child.firstName (reactive two-way)  -->
  <button on:click={evClick}>Change FirstName Value</button>
  
</div>

```

Child.svelte

```html
<script>  
  export let firstName = "";  
</script>

<div class="child">  
  <h2>Child</h2>  
  <input bind:value={firstName} placeholder="Enter Firstname" />  
  <p>  
    Child firstName : {firstName}  
  </p>  
</div>

```

Try : https://svelte.dev/repl/59dc1cecb50e47fabb8f1f8f47f7f03f?version=4.2.19

### Using a callback

This pattern will be familiar if you are coming from React. Here, the parent component creates an onChange handler function and passes it to the child component. The child component accepts the variable, and its change handler function, and invokes it as shown below.

Parent.svelte

```html
<script>  
  let parFirstName = "Write FirstName";  
  import Child from "./Child.svelte";  
  function handleChange(newValue) {  
    parFirstName = newValue;  
  }  
</script>

<div class="parent">  
  <h2>Parent</h2>  
  <p>{parFirstName}</p>  
  <Child firstName={parFirstName} onChange={handleChange} />  
  <!-- child.onChange = parent.handleChange (functions) -->
  <!-- child.firstName = parent.parFirstName  -->
</div>

<div class="parent">  
  <h2>Parent</h2>  
  <p>{firstName}</p>  
  <Child firstName={firstName} onChange={handleChange} />  
  <!-- child.onChange = parent.handleChange -->
  <!-- child.firstName = parent.firstName  -->
</div>


```

Child.svelte

```html
<script>  
  export let firstName = "";  
  export let onChange;  
</script>

<div class="child">  
  <h2>Child</h2>  
  <input  
    placeholder="Enter Firstname"  
    on:input={(e) => onChange(e.target.value)}  
  />  
  <p>{firstName}</p>  
</div>

```

Try : https://svelte.dev/repl/83c47d0fc93a4bd8913606e26a00eb30?version=4.2.19


### Dispatching Events

Last up is the event forwarding in Svelte because `Svelte doesn't use a virtual DOM like Vue and React, component events don't bubble`. In this pattern, we can use the createEventDispatcher from Svelte to create a dispatch function to use in the child component. We can dispatch an update event from child, and capture that event in parent and update the parent variable accordingly as shown below.

Parent.svelte

```html
<script lang="ts">  
  let firstName = "";  
  import Child from "./Child.svelte";

  function handleUpdate(event) {  
    firstName = event.detail;  
  }  
</script>

<div class="parent">  
  <h2>Parent</h2>  
  <!-- Listen for the custom 'update' event from Child component -->  
  <p>{firstName}</p>  
  <Child firstName={firstName} on:update={handleUpdate} />  
</div>

```


Child.svelte

```html
<script>  
  import { createEventDispatcher } from "svelte";  
  export let firstName = "";  
  // Create event dispatcher  
  const dispatch = createEventDispatcher();  
  // Function to dispatch event on input change  
  function handleInput(event) { 
    // trigger the custom update event (function) with the parameter (event.target.value)
    dispatch("update", event.target.value);  
  }  
</script>

<div class="child">  
  <h2>Child</h2>  
  <input  
    bind:value={firstName}  
    on:input={handleInput}  
    placeholder="Enter Firstname"  
  />  
  <p>{firstName}</p>  
</div>

```

You can use any of these three patterns for passing data from child to parent, here’s a short video on how any of these three patterns will look once implemented.

--*REVIEW - link eklenebilir video


## Conclusion

In this article, we understood data binding and how it works in Svelte. We then went through how to implement one-way and two-way data binding. We saw how to pass data as props from parent to child, and finally, we implemented multiple patterns to synchronize data from child to parent.


# Dynamic Component

```html
<script lang="ts">
	import A from './Title1.svelte';
	import B from './Title2.svelte';

	let MyComponent = $state();

	let cmbSelected = $state();

	// manual dynamic component change
	function cmbChange(event) {
		MyComponent = cmbSelected;
	}
</script>

<!-- bind:value={MyComponent} is also valid -->
<select bind:value={cmbSelected} onchange={cmbChange}>
	<option value={A}>A</option>
	<option value={B}>B</option>
</select>

<!-- these are equivalent -->
<MyComponent />
<!-- legacy  -->
<svelte:component this={MyComponent} />
```

- Playgroud, https://svelte.dev/playground/ede463b2dc694cdf9778d361e34ea991?version=5.15.0


[Back](../readme.md)
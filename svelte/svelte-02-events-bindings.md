
<h2>Source</h2>

https://svelte.dev/tutorial/basics

- [5 Events](#5-events)
  - [a. DOM events](#a-dom-events)
  - [b. Inline handlers](#b-inline-handlers)
  - [c. Event modifiers](#c-event-modifiers)
  - [d. Component events (Event Dispatcher)](#d-component-events-event-dispatcher)
  - [e. Event forwarding](#e-event-forwarding)
  - [f. DOM event forwarding](#f-dom-event-forwarding)
- [6 Bindings](#6-bindings)
  - [a. Text inputs](#a-text-inputs)
  - [b. Numeric inputs](#b-numeric-inputs)
  - [c. Checkbox inputs](#c-checkbox-inputs)
  - [d. Group inputs](#d-group-inputs)
  - [e. Textarea inputs](#e-textarea-inputs)
  - [f. Select bindings](#f-select-bindings)


# 5 Events

## a. DOM events

As we've briefly seen already, you can listen to any event on an element with the on: directive:

```html
<div on:mousemove={handleMousemove}>
	The mouse position is {m.x} x {m.y}
</div>

```

## b. Inline handlers

You can also declare event handlers inline:

```html
<div on:mousemove="{e => m = { x: e.clientX, y: e.clientY }}">
	The mouse position is {m.x} x {m.y}
</div>

```

The quote marks are optional, but they're helpful for syntax highlighting in some environments.

In some frameworks you may see recommendations to avoid inline event handlers for performance reasons, particularly inside loops. That advice doesn't apply to Svelte — the compiler will always do the right thing, whichever form you choose.

## c. Event modifiers

DOM event handlers can have modifiers that alter their behaviour. For example, a handler with a once modifier will only run a single time:

```html
<script>
	function handleClick() {
		alert('no more alerts')
	}
</script>

<button on:click|once={handleClick}>
	Click me
</button>

```

The full list of modifiers:

- preventDefault — calls event.preventDefault() before running the handler. Useful for client-side form handling, for example.
- stopPropagation — calls event.stopPropagation(), preventing the event reaching the next element
- passive — improves scrolling performance on touch/wheel events (Svelte will add it automatically where it's safe to do so)
- nonpassive — explicitly set passive: false
- capture — fires the handler during the capture phase instead of the bubbling phase (MDN docs)
- once — remove the handler after the first time it runs
- self — only trigger handler if event.target is the element itself
- trusted — only trigger handler if event.isTrusted is true. I.e. if the event is triggered by a user action.

You can chain modifiers together, e.g. on:click|once|capture={...}.

## d. Component events (Event Dispatcher)

Components can also dispatch events. To do so, they must create an event dispatcher. Update Inner.svelte: (tor:dispatch:gönder-,sevket-)

*inner.svelte*
```html
<script>
	import { createEventDispatcher } from 'svelte';

  // createEventDispatcher() must be called to get dispatch object
	const dispatch = createEventDispatcher();

	function sayHello() {
		dispatch('message', {
			text: 'Hello!'
		});
	}
</script>

```
*app.svelte*
```html
<script>
	import Inner from './Inner.svelte';

	function handleMessage(event) {
		alert(event.detail.text);
	}
</script>

<Inner on:message={handleMessage}/>
```
---

*Note :* createEventDispatcher must be called when the component is first instantiated — you can't do it later inside e.g. a setTimeout callback. This links dispatch to the component instance.

---

Notice that the App component is listening to the messages dispatched by *Inner component* thanks to the on:message directive. This directive is an attribute *prefixed* with "on:" followed by the event name that we are dispatching (in this case, message).

Without this attribute, messages would still be dispatched, but the App would not react to it. You can try removing the "on:message" attribute and pressing the button again.

---

*Try :* You can also try changing the event name to something else. For instance, change dispatch('message') to dispatch('myevent') in inner.svelte component and change the attribute name from on:message to on:myevent in the App.svelte component.

---

## e. Event forwarding

Unlike DOM events, component events don't bubble. If you want to listen to an event on some deeply nested component, the intermediate components must forward the event. (tor:bubble:köpür-,fokurda-)

In this case, we have the same App.svelte and Inner.svelte as in the previous chapter, but there's now an Outer.svelte component that contains `<Inner/>`.

One way we could solve the problem is adding createEventDispatcher to Outer.svelte, listening for the message event, and creating a handler for it:

```html
<script>
	import Inner from './Inner.svelte';
	import { createEventDispatcher } from 'svelte';

	const dispatch = createEventDispatcher();

	function forward(event) {
		dispatch('message', event.detail);
	}
</script>

<Inner on:message={forward}/>

```

But that's a lot of code to write, so Svelte gives us an equivalent shorthand — an on:message event directive without a value means 'forward all message events'.

```html
<script>
	import Inner from './Inner.svelte';
</script>

<Inner on:message/>

```

## f. DOM event forwarding

Event forwarding works for DOM events too.

We want to get notified of clicks on our `<CustomButton> `— to do that, we just need to forward click events on the `<button>` element in CustomButton.svelte:

```html
<button on:click>
	Click me
</button>

```

# 6 Bindings

## a. Text inputs

As a general rule, data flow in Svelte is top down — a parent component can set props on a child component, and a component can set attributes on an element, but not the other way around.

Sometimes it's useful to break that rule. Take the case of the `<input>` element in this component — we could add an on:input event handler that sets the value of name to event.target.value, but it's a bit... boilerplatey. It gets even worse with other form elements, as we'll see.

Instead, we can use the bind:value directive:

```html
<input bind:value={name}>

```

This means that not only will changes to the value of name update the input value, but changes to the input value will update name.

## b. Numeric inputs

In the DOM, everything is a string. That's unhelpful when you're dealing with numeric inputs — type="number" and type="range" — as it means you have to remember to coerce input.value before using it.

With bind:value, Svelte takes care of it for you:

```html
<input type=number bind:value={a} min=0 max=10>
<input type=range bind:value={a} min=0 max=10>

```

## c. Checkbox inputs

Checkboxes are used for toggling between states. Instead of binding to input.value, we bind to input.checked:

```html
<input type=checkbox bind:checked={yes}>

```

## d. Group inputs

If you have multiple inputs relating to the same value, you can use bind:group along with the value attribute. Radio inputs in the same group are mutually exclusive; checkbox inputs in the same group form an array of selected values.

Add bind:group to each input:

```html
<input type=radio bind:group={scoops} name="scoops" value={1}>

```

In this case, we could make the code simpler by moving the checkbox inputs into an each block. First, add a menu variable to the `<script>` block...

```js
let menu = [
	'Cookies and cream',
	'Mint choc chip',
	'Raspberry ripple'
];

```

...then replace the second section:

```html
<h2>Flavours</h2>

{#each menu as flavour}
	<label>
		<input type=checkbox bind:group={flavours} name="flavours" value={flavour}>
		{flavour}
	</label>
{/each}

```

It's now easy to expand our ice cream menu in new and exciting directions.

## e. Textarea inputs

The `<textarea>` element behaves similarly to a text input in Svelte — use bind:value to create a two-way binding between the `<textarea>` content and the value variable:

```html
<textarea bind:value={value}></textarea>

```

In cases like these, where the names match, we can also use a shorthand form:

```html
<textarea bind:value></textarea>

```

This applies to all bindings, not just textareas.

## f. Select bindings

We can also use bind:value with `<select>` elements. Update line 20:

```html
<select bind:value={selected} on:change="{() => answer = ''}">

```

Note that the `<option>` values are objects rather than strings. Svelte doesn't mind.

Because we haven't set an initial value of selected, the binding will set it to the default value (the first in the list) automatically. Be careful though — until the binding is initialised, selected remains undefined, so we can't blindly reference e.g. selected.id in the template. If your use case allows it, you could also set an initial value to bypass this problem.

*Full Example*

```html
<script>
	let questions = [
		{ id: 1, text: `Where did you go to school?` },
		{ id: 2, text: `What is your mother's name?` },
		{ id: 3, text: `What is another personal fact that an attacker could easily find with Google?` }
	];

	let selected;

	let answer = '';

	function handleSubmit() {
		alert(`answered question ${selected.id} (${selected.text}) with "${answer}"`);
	}
</script>

<h2>Insecurity questions</h2>

<form on:submit|preventDefault={handleSubmit}>
	<select value={selected} on:change="{() => answer = ''}">
		{#each questions as question}
			<option value={question}>
				{question.text}
			</option>
		{/each}
	</select>

	<input bind:value={answer}>

	<button disabled={!answer} type=submit>
		Submit
	</button>
</form>

<p>selected question {selected ? selected.id : '[waiting...]'}</p>

<style>
	input {
		display: block;
		width: 500px;
		max-width: 100%;
	}
</style>
```


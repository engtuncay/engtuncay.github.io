
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
  - [d. Group inputs](#d-group-inputs)
  - [e. Textarea inputs](#e-textarea-inputs)
  - [f. Select bindings](#f-select-bindings)
  - [g. Select multiple](#g-select-multiple)
  - [h. Contenteditable bindings](#h-contenteditable-bindings)
  - [i. Each block bindings](#i-each-block-bindings)
  - [j. Media elements](#j-media-elements)
  - [k. Dimensions](#k-dimensions)
  - [l. This](#l-this)
  - [m. Component bindings](#m-component-bindings)
  - [n. Binding to component instances](#n-binding-to-component-instances)
- [Art - Data Binding In Svelte By Aagam Vadecha](#art---data-binding-in-svelte-by-aagam-vadecha)
  - [One-way vs two-way data binding](#one-way-vs-two-way-data-binding)
  - [Passing props down to a child](#passing-props-down-to-a-child)
  - [Passing props back to a parent](#passing-props-back-to-a-parent)
    - [Using bind](#using-bind)
    - [Using a callback](#using-a-callback)
    - [Dispatching Events](#dispatching-events)
  - [Conclusion](#conclusion)

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

## d. Group inputs

If you have multiple inputs relating to the same value, you can use `bind:group` along with the value attribute. Radio inputs in the same group are mutually exclusive; checkbox inputs in the same group form an array of selected values.

Add `bind:group` to each input:

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

The `<textarea>` element behaves similarly to a text input in Svelte — use `bind:value` to create a two-way binding between the `<textarea>` content and the value variable:

```html
<textarea bind:value={value}></textarea>

```

In cases like these, where the names match, we can also use a shorthand form:

```html
<textarea bind:value></textarea>

```

This applies to all bindings, not just textareas.

## f. Select bindings

We can also use `bind:value` with `<select>` elements.

```html
<select bind:value={selected} on:change="{() => answer = ''}">

```

Note that the `<option>` values are objects rather than strings. Svelte doesn't mind.

Because we haven't set an initial value of selected, the binding will set it to the default value (the first in the list) automatically. Be careful though — until the binding is initialized, selected remains undefined, so we can't blindly reference e.g. selected.id in the template. If your use case allows it, you could also set an initial value to bypass this problem.

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

Try : https://learn.svelte.dev/tutorial/select-bindings

- https://svelte.dev/repl/cce6c205ac5743d9b5c11caa75bad477?version=4.2.19

## g. Select multiple

A select can have a multiple attribute, in which case it will populate an array rather than selecting a single value.

Returning to our earlier ice cream example, we can replace the checkboxes with a `<select multiple>`:

```html
<h2>Flavours</h2>

<select multiple bind:value={flavours}>
  {#each menu as flavour}
    <option value={flavour}>
      {flavour}
    </option>
  {/each}
</select>

```

Press and hold the control key (or the command key on MacOS) for selecting multiple options.

*App.svelte*

```js
<script>
  let scoops = 1;
  let flavours = ['Mint choc chip'];

  let menu = [
    'Cookies and cream',
    'Mint choc chip',
    'Raspberry ripple'
  ];

  function join(flavours) {
    if (flavours.length === 1) return flavours[0];
    return `${flavours.slice(0, -1).join(', ')} and ${flavours[flavours.length - 1]}`;
  }
</script>

<h2>Size</h2>

<label>
  <input type=radio bind:group={scoops} value={1}>
  One scoop
</label>

<label>
  <input type=radio bind:group={scoops} value={2}>
  Two scoops
</label>

<label>
  <input type=radio bind:group={scoops} value={3}>
  Three scoops
</label>

<h2>Flavours</h2>

<select multiple bind:value={flavours}>
  {#each menu as flavour}
    <option value={flavour}>
      {flavour}
    </option>
  {/each}
</select>

{#if flavours.length === 0}
  <p>Please select at least one flavour</p>
{:else if flavours.length > scoops}
  <p>Can't order more flavours than scoops!</p>
{:else}
  <p>
    You ordered {scoops} {scoops === 1 ? 'scoop' : 'scoops'}
    of {join(flavours)}
  </p>
{/if}

```

➖ Try : https://svelte.dev/repl/92ad82988bcb42feb17a7abd704a9231?version=4.2.19

## h. Contenteditable bindings

Elements with the contenteditable attribute support the following bindings:

- [innerHTML](https://developer.mozilla.org/en-US/docs/Web/API/Element/innerHTML)
- [innerText](https://developer.mozilla.org/en-US/docs/Web/API/HTMLElement/innerText)
- [textContent](https://developer.mozilla.org/en-US/docs/Web/API/Node/textContent)

There are slight differences between each of these, read more about them here.

```html
<div
  contenteditable="true"
  bind:innerHTML={html}
></div>

```

--*REVIEW - add an example

##  i. Each block bindings

You can even bind to properties inside an each block.

```html
{#each todos as todo}
  <div class:done={todo.done}>
    <input
      type=checkbox
      bind:checked={todo.done}
    >

    <input
      placeholder="What needs to be done?"
      bind:value={todo.text}
    >
  </div>
{/each}

```

---

Note that interacting with these `<input>` elements will mutate the array. If you prefer to work with immutable data, you should avoid these bindings and use event handlers instead.

---

*app.svelte*

```html
<script>
  let todos = [
    { done: false, text: 'finish Svelte tutorial' },
    { done: false, text: 'build an app' },
    { done: false, text: 'world domination' }
  ];

  function add() {
    todos = todos.concat({ done: false, text: '' });
  }

  function clear() {
    todos = todos.filter(t => !t.done);
  }

  $: remaining = todos.filter(t => !t.done).length;
</script>

<h1>Todos</h1>

{#each todos as todo}
  <div class:done={todo.done}>
    <input
      type=checkbox
      bind:checked={todo.done}
    >

    <input
      placeholder="What needs to be done?"
      bind:value={todo.text}
    >
  </div>
{/each}

<p>{remaining} remaining</p>

<button on:click={add}>
  Add new
</button>

<button on:click={clear}>
  Clear completed
</button>

<style>
  .done {
    opacity: 0.4;
  }
</style>

```

➖ Try : https://svelte.dev/repl/b970d91e8b0241079d4fa62d4f9fe403?version=4.2.19

##  j. Media elements

The `<audio>` and `<video>` elements have several properties that you can bind to. This example demonstrates a few of them.

On line 62, add currentTime={time}, duration and paused bindings:

```html
<video
  poster="https://sveltejs.github.io/assets/caminandes-llamigos.jpg"
  src="https://sveltejs.github.io/assets/caminandes-llamigos.mp4"
  on:mousemove={handleMove}
  on:touchmove|preventDefault={handleMove}
  on:mousedown={handleMousedown}
  on:mouseup={handleMouseup}
  bind:currentTime={time}
  bind:duration
  bind:paused>
  <track kind="captions">
</video>

```

---

❗ `bind:duration` is equivalent to `bind:duration={duration} (parent and child reference are same)`   

Now, when you click on the video, it will update time, duration and paused as appropriate. This means we can use them to build custom controls.

➖ Ordinarily on the web, you would track currentTime by listening for timeupdate events. But these events fire too infrequently, resulting in choppy UI. Svelte does better — it checks currentTime using requestAnimationFrame.

➖ The complete set of bindings for `<audio>` and `<video>` is as follows — six readonly bindings...

- duration (readonly) — the total duration of the video, in seconds
- buffered (readonly) — an array of {start, end} objects
- seekable (readonly) — ditto
- played (readonly) — ditto
- seeking (readonly) — boolean
- ended (readonly) — boolean

...and five two-way bindings:

- currentTime — the current point in the video, in seconds
- playbackRate — how fast to play the video, where 1 is 'normal'
- paused — this one should be self-explanatory
- volume — a value between 0 and 1
- muted — a boolean value where true is muted

Videos additionally have readonly videoWidth and videoHeight bindings.

➖ Example

*app.svelte*

```html
<script>
  // These values are bound to properties of the video
  let time = 0;
  let duration;
  let paused = true;

  let showControls = true;
  let showControlsTimeout;

  // Used to track time of last mouse down event
  let lastMouseDown;

  function handleMove(e) {
    // Make the controls visible, but fade out after
    // 2.5 seconds of inactivity
    clearTimeout(showControlsTimeout);
    showControlsTimeout = setTimeout(() => showControls = false, 2500);
    showControls = true;

    if (!duration) return; // video not loaded yet
    if (e.type !== 'touchmove' && !(e.buttons & 1)) return; // mouse not down

    const clientX = e.type === 'touchmove' ? e.touches[0].clientX : e.clientX;
    const { left, right } = this.getBoundingClientRect();
    time = duration * (clientX - left) / (right - left);
  }

  // we can't rely on the built-in click event, because it fires
  // after a drag — we have to listen for clicks ourselves
  function handleMousedown(e) {
    lastMouseDown = new Date();
  }

  function handleMouseup(e) {
    if (new Date() - lastMouseDown < 300) {
      if (paused) e.target.play();
      else e.target.pause();
    }
  }

  function format(seconds) {
    if (isNaN(seconds)) return '...';

    const minutes = Math.floor(seconds / 60);
    seconds = Math.floor(seconds % 60);
    if (seconds < 10) seconds = '0' + seconds;

    return `${minutes}:${seconds}`;
  }
</script>

<h1>Caminandes: Llamigos</h1>
<p>From <a href="https://studio.blender.org/films">Blender Studio</a>. CC-BY</p>

<div>
  <video
    poster="https://sveltejs.github.io/assets/caminandes-llamigos.jpg"
    src="https://sveltejs.github.io/assets/caminandes-llamigos.mp4"
    on:mousemove={handleMove}
    on:touchmove|preventDefault={handleMove}
    on:mousedown={handleMousedown}
    on:mouseup={handleMouseup}
    bind:currentTime={time}
    bind:duration
    bind:paused>
    <track kind="captions">
  </video>

  <div class="controls" style="opacity: {duration && showControls ? 1 : 0}">
    <progress value="{(time / duration) || 0}"/>

    <div class="info">
      <span class="time">{format(time)}</span>
      <span>click anywhere to {paused ? 'play' : 'pause'} / drag to seek</span>
      <span class="time">{format(duration)}</span>
    </div>
  </div>
</div>

<style>
  div {
    position: relative;
  }

  .controls {
    position: absolute;
    top: 0;
    width: 100%;
    transition: opacity 1s;
  }

  .info {
    display: flex;
    width: 100%;
    justify-content: space-between;
  }

  span {
    padding: 0.2em 0.5em;
    color: white;
    text-shadow: 0 0 8px black;
    font-size: 1.4em;
    opacity: 0.7;
  }

  .time {
    width: 3em;
  }

  .time:last-child { text-align: right }

  progress {
    display: block;
    width: 100%;
    height: 10px;
    -webkit-appearance: none;
    appearance: none;
  }

  progress::-webkit-progress-bar {
    background-color: rgba(0,0,0,0.2);
  }

  progress::-webkit-progress-value {
    background-color: rgba(255,255,255,0.6);
  }

  video {
    width: 100%;
  }
</style>
```

➖ Try : https://svelte.dev/repl/7770da3edcf4454a94afb2e289c6f32f?version=4.2.19

## k. Dimensions

Every block-level element has clientWidth, clientHeight, offsetWidth and offsetHeight bindings:

```html
<div bind:clientWidth={w} bind:clientHeight={h}>
  <span style="font-size: {size}px">{text}</span>
</div>

```

These bindings are readonly — changing the values of w and h won't have any effect.

➖ Elements are measured using a technique similar to this one. There is some overhead involved, so it's not recommended to use this for large numbers of elements.

display: inline elements cannot be measured with this approach; nor can elements that can't contain other elements (such as `<canvas>`). In these cases you will need to measure a wrapper element instead.

➖ Example

*app.svelte*

```html
<script>
  let w;
  let h;
  let size = 42;
  let text = 'edit me';
</script>

<input type=range bind:value={size}>
<input bind:value={text}>

<p>size: {w}px x {h}px</p>

<div bind:clientWidth={w} bind:clientHeight={h}>
  <span style="font-size: {size}px">{text}</span>
</div>

<style>
  input { display: block; }
  div { display: inline-block; }
  span { word-break: break-all; }
</style>

```

➖ Try : https://svelte.dev/repl/d6fa682067ea428c8f1f6ab29ba0a476?version=4.2.19

## l. This

The readonly this binding applies to every element (and component) and allows you to obtain a reference to rendered elements. For example, we can get a reference to a `<canvas>` element:

```html
<canvas
  bind:this={canvas}
  width={32}
  height={32}
></canvas>
```

📝 Note that the value of canvas will be undefined until the component has mounted, so we put the logic inside the onMount lifecycle function.

➖ Example

*app.svelte*

```html
<script>
  import { onMount } from 'svelte';

  let canvas;

  onMount(() => {
    const ctx = canvas.getContext('2d');
    let frame = requestAnimationFrame(loop);

    function loop(t) {
      frame = requestAnimationFrame(loop);

      const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);

      for (let p = 0; p < imageData.data.length; p += 4) {
        const i = p / 4;
        const x = i % canvas.width;
        const y = i / canvas.width >>> 0;

        const r = 64 + (128 * x / canvas.width) + (64 * Math.sin(t / 1000));
        const g = 64 + (128 * y / canvas.height) + (64 * Math.cos(t / 1000));
        const b = 128;

        imageData.data[p + 0] = r;
        imageData.data[p + 1] = g;
        imageData.data[p + 2] = b;
        imageData.data[p + 3] = 255;
      }

      ctx.putImageData(imageData, 0, 0);
    }

    return () => {
      cancelAnimationFrame(frame);
    };
  });
</script>

<canvas
  bind:this={canvas}
  width={32}
  height={32}
></canvas>

<style>
  canvas {
    width: 100%;
    height: 100%;
    background-color: #666;
    -webkit-mask: url(/svelte-logo-mask.svg) 50% 50% no-repeat;
    mask: url(/svelte-logo-mask.svg) 50% 50% no-repeat;
  }
</style>
```

##  m. Component bindings

Just as you can bind to properties of DOM elements, you can bind to component props. For example, we can bind to the value prop of this `<Keypad>` component as though it were a form element:

```html
<Keypad bind:value={pin} on:submit={handleSubmit}/>

```

Now, when the user interacts with the keypad, the value of pin in the parent component is immediately updated.

➖ Use component bindings sparingly. It can be difficult to track the flow of data around your application if you have too many of them, especially if there is no 'single source of truth'. (tor:sparingly idareli)

➖ Example

*app.svelte*

```html
<script>
  import Keypad from './Keypad.svelte';

  let pin;
  $: view = pin ? pin.replace(/\d(?!$)/g, '•') : 'enter your pin';

  function handleSubmit() {
    alert(`submitted ${pin}`);
  }
</script>

<h1 style="color: {pin ? '#333' : '#ccc'}">{view}</h1>

<Keypad bind:value={pin} on:submit={handleSubmit}/>
```

*keypad.svelte*

```html
<script>
  import { createEventDispatcher } from 'svelte';

  export let value = '';

  const dispatch = createEventDispatcher();

  const select = num => () => value += num;
  const clear  = () => value = '';
  const submit = () => dispatch('submit');
</script>

<div class="keypad">
  <button on:click={select(1)}>1</button>
  <button on:click={select(2)}>2</button>
  <button on:click={select(3)}>3</button>
  <button on:click={select(4)}>4</button>
  <button on:click={select(5)}>5</button>
  <button on:click={select(6)}>6</button>
  <button on:click={select(7)}>7</button>
  <button on:click={select(8)}>8</button>
  <button on:click={select(9)}>9</button>

  <button disabled={!value} on:click={clear}>clear</button>
  <button on:click={select(0)}>0</button>
  <button disabled={!value} on:click={submit}>submit</button>
</div>

<style>
  .keypad {
    display: grid;
    grid-template-columns: repeat(3, 5em);
    grid-template-rows: repeat(4, 3em);
    grid-gap: 0.5em
  }

  button {
    margin: 0
  }
</style>
```

➖ Try : https://svelte.dev/repl/ac4c84c4c51148b6b9f45a6032cc38fe?version=4.2.19

##  n. Binding to component instances

Just as you can bind to DOM elements, you can bind to component instances themselves. For example, we can bind the instance of `<InputField>` to a variable named field in the same way we did when binding DOM Elements

```html
<script>
  let field;
</script>

```

```html
<InputField bind:this={field} />

```

Now we can programmatically interact with this component using field.

```html
<button on:click="{() => field.focus()}">
  Focus field
</button>

```

❗ Note that we can't do `{field.focus}` since field is undefined when the button is first rendered and throws an error.

➖ Example

*app.svelte*

```html
<script>
  import InputField from './InputField.svelte';

  let field;
</script>

<InputField bind:this={field}/>

<button on:click={() => field.focus()}>Focus field</button>

```

*InputField.svelte*

```html
<script>
  let input;

  export function focus() {
    input.focus();
  }
</script>

<input bind:this={input} />
```

- Try : https://svelte.dev/tutorial/component-this  

# Art - Data Binding In Svelte By Aagam Vadecha

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


[Back](../readme.md)
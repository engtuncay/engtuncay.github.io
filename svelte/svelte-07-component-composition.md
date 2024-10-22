
Source : https://svelte.dev/tutorial/slots

# Component Composition

## Slots

Just like elements can have children...

<div>
  <p>I'm a child of the div</p>
</div>
...so can components. Before a component can accept children, though, it needs to know where to put them. We do this with the <slot> element. Put this inside Box.svelte:

<div class="box">
  <slot />
</div>
You can now put things in the box:

<Box>
  <h2>Hello!</h2>
  <p>This is a box. It can contain anything.</p>
</Box>


➖ app.svelte

```html
<script>
  import Box from './Box.svelte';
</script>

<Box>
  <h2>Hello!</h2>
  <p>This is a box. It can contain anything.</p>
</Box>

```

➖ box.svelte

```html
<div class="box">
  <slot />
</div>

<style>
  .box {
    width: 300px;
    border: 1px solid #aaa;
    border-radius: 2px;
    box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
    padding: 1em;
    margin: 0 0 1em 0;
  }
</style>

```

Try : https://svelte.dev/tutorial/slots

# Slot Fallbacks

A component can specify fallbacks for any slots that are left empty, by putting content inside the `<slot>` element:

```html
<div class="box">
    <slot>
        <em>no content was provided</em>
    </slot>
</div>

```

We can now create instances of <Box> without any children:

```html
<Box>
    <h2>Hello!</h2>
    <p>This is a box. It can contain anything.</p>
</Box>

<Box />

```

➖ App.svelte

```html
<script>
    import Box from './Box.svelte';
</script>

<Box>
    <h2>Hello!</h2>
    <p>This is a box. It can contain anything.</p>
</Box>

<Box />
```

➖ Box.svelte

```html
<div class="box">
    <slot>
        <em>no content was provided</em>
    </slot>
</div>

<style>
    .box {
        width: 300px;
        border: 1px solid #aaa;
        border-radius: 2px;
        box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
        padding: 1em;
        margin: 0 0 1em 0;
    }
</style>
```

## Named Slots

The previous example contained a default slot, which renders the direct children of a component. Sometimes you will need more control over placement, such as with this `<ContactCard>`. In those cases, we can use named slots.

In `ContactCard.svelte`, add a name attribute to each slot:

```html
<article class="contact-card">
    <h2>
        <slot name="name">
            <span class="missing">Unknown name</span>
        </slot>
    </h2>

    <div class="address">
        <slot name="address">
            <span class="missing">Unknown address</span>
        </slot>
    </div>

    <div class="email">
        <slot name="email">
            <span class="missing">Unknown email</span>
        </slot>
    </div>
</article>

```

Then, add elements with corresponding `slot="..."` attributes inside the `<ContactCard>` component:

```html
<ContactCard>
    <span slot="name"> P. Sherman </span>

    <span slot="address">
        42 Wallaby Way<br />
        Sydney
    </span>
</ContactCard>

```

➖ app.svelte

```html
<script>
    import ContactCard from './ContactCard.svelte';
</script>

<ContactCard>
    <span slot="name"> P. Sherman </span>

    <span slot="address">
        42 Wallaby Way<br />
        Sydney
    </span>
</ContactCard>
```

➖ ContactCard

```html
<article class="contact-card">
    <h2>
        <slot name="name">
            <span class="missing">Unknown name</span>
        </slot>
    </h2>

    <div class="address">
        <slot name="address">
            <span class="missing">Unknown address</span>
        </slot>
    </div>

    <div class="email">
        <slot name="email">
            <span class="missing">Unknown email</span>
        </slot>
    </div>
</article>

<style>
    .contact-card {
        width: 300px;
        border: 1px solid #aaa;
        border-radius: 2px;
        box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
        padding: 1em;
    }

    h2 {
        padding: 0 0 0.2em 0;
        margin: 0 0 1em 0;
        border-bottom: 1px solid #ff3e00;
    }

    .address,
    .email {
        padding: 0 0 0 1.5em;
        background: 0 0 no-repeat;
        background-size: 20px 20px;
        margin: 0 0 0.5em 0;
        line-height: 1.2;
    }

    .address {
        background-image: url(/tutorial/icons/map-marker.svg);
    }
    .email {
        background-image: url(/tutorial/icons/email.svg);
    }
    .missing {
        color: #999;
    }
</style>

```

## Checking for slot content

In some cases, you may want to control parts of your component based on whether the parent passes in content for a certain slot. Perhaps you have a wrapper around that slot, and you don't want to render it if the slot is empty. Or perhaps you'd like to apply a class only if the slot is present. You can do this by checking the properties of the special `$$slots` variable.

`$$slots` is an object whose keys are the names of the slots passed in by the parent component. If the parent leaves a slot empty, then $$slots will not have an entry for that slot.

Notice that both instances of <Project> in this example render a container for comments and a notification dot, even though only one has comments. We want to use $$slots to make sure we only render these elements when the parent <App> passes in content for the comments slot.

In Project.svelte, update the class:has-discussion directive on the `<article>`:

```html
<article class:has-discussion={$$slots.comments}>

```

Next, wrap the comments slot and its wrapping `<div>` in an if block that checks `$$slots`:

```html
{#if $$slots.comments}
    <div class="discussion">
        <h3>Comments</h3>
        <slot name="comments" />
    </div>
{/if}

```

Now the comments container and the notification dot won't render when `<App>` leaves the comments slot empty.

➖ app.svelte

```html
<script>
    import Project from './Project.svelte';
    import Comment from './Comment.svelte';
</script>

<h1>Projects</h1>

<ul>
    <li>
        <Project title="Add TypeScript support" tasksCompleted={25} totalTasks={57}>
            <div slot="comments">
                <Comment name="Ecma Script" postedAt={new Date('2020-08-17T14:12:23')}>
                    <p>Those interface tests are now passing.</p>
                </Comment>
            </div>
        </Project>
    </li>
    <li>
        <Project title="Update documentation" tasksCompleted={18} totalTasks={21} />
    </li>
</ul>

<style>
    h1 {
        font-weight: 300;
        margin: 0 1rem;
    }

    ul {
        list-style: none;
        padding: 0;
        margin: 0.5rem;
        display: flex;
    }

    @media (max-width: 600px) {
        ul {
            flex-direction: column;
        }
    }

    li {
        padding: 0.5rem;
        flex: 1 1 50%;
        min-width: 200px;
    }
</style>
```

➖ comment.svelte

```html
<script>
    export let name;
    export let postedAt;

    $: avatar = `https://ui-avatars.com/api/?name=${name.replace(
        / /g,
        '+'
    )}&rounded=true&background=ff3e00&color=fff&bold=true`;
</script>

<article>
    <div class="header">
        <img src={avatar} alt="" height="32" width="32" />
        <div class="details">
            <h4>{name}</h4>
            <time datetime={postedAt.toISOString()}>{postedAt.toLocaleDateString()}</time>
        </div>
    </div>
    <div class="body">
        <slot />
    </div>
</article>

<style>
    article {
        background-color: #fff;
        border: 1px #ccc solid;
        border-radius: 4px;
        padding: 1rem;
    }

    .header {
        align-items: center;
        display: flex;
    }

    .details {
        flex: 1 1 auto;
        margin-left: 0.5rem;
    }

    h4 {
        margin: 0;
    }

    time {
        color: #777;
        font-size: 0.75rem;
        text-decoration: underline;
    }

    .body {
        margin-top: 0.5rem;
    }

    .body :global(p) {
        margin: 0;
    }
</style>

```

➖ project.svelte

```html
<script>
    export let title;
    export let tasksCompleted = 0;
    export let totalTasks = 0;
</script>

<article class:has-discussion={$$slots.comments}>
    <div>
        <h2>{title}</h2>
        <p>{tasksCompleted}/{totalTasks} tasks completed</p>
    </div>
    {#if $$slots.comments}
        <div class="discussion">
            <h3>Comments</h3>
            <slot name="comments" />
        </div>
    {/if}
</article>

<style>
    article {
        border: 1px #ccc solid;
        border-radius: 4px;
        position: relative;
    }

    article > div {
        padding: 1.25rem;
    }

    article.has-discussion::after {
        content: '';
        background-color: #ff3e00;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        height: 20px;
        position: absolute;
        right: -10px;
        top: -10px;
        width: 20px;
    }

    h2,
    h3 {
        margin: 0 0 0.5rem;
    }

    h3 {
        font-size: 0.875rem;
        font-weight: 500;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    p {
        color: #777;
        margin: 0;
    }

    .discussion {
        background-color: #eee;
        border-top: 1px #ccc solid;
    }
</style>

```

## Slot Props

In this app, we have a <Hoverable> component that tracks whether the mouse is currently over it. It needs to pass that data back to the parent component, so that we can update the slotted contents.

For this, we use slot props. In Hoverable.svelte, pass the hovering value into the slot:

<div on:mouseenter={enter} on:mouseleave={leave}>
    <slot hovering={hovering} />
</div>
Remember you can also use the {hovering} shorthand, if you prefer.

Then, to expose hovering to the contents of the <Hoverable> component, we use the let directive:

<Hoverable let:hovering={hovering}>
    <div class:active={hovering}>
        {#if hovering}
            <p>I am being hovered upon.</p>
        {:else}
            <p>Hover over me!</p>
        {/if}
    </div>
</Hoverable>
You can rename the variable, if you want — let's call it active in the parent component:

<Hoverable let:hovering={active}>
    <div class:active>
        {#if active}
            <p>I am being hovered upon.</p>
        {:else}
            <p>Hover over me!</p>
        {/if}
    </div>
</Hoverable>
You can have as many of these components as you like, and the slotted props will remain local to the component where they're declared.

Named slots can also have props; use the let directive on an element with a slot="..." attribute, instead of on the component itself.

```html
<script>
    import Hoverable from './Hoverable.svelte';
</script>

<Hoverable let:hovering={active}>
    <div class:active>
        {#if active}
            <p>I am being hovered upon.</p>
        {:else}
            <p>Hover over me!</p>
        {/if}
    </div>
</Hoverable>

<Hoverable let:hovering={active}>
    <div class:active>
        {#if active}
            <p>I am being hovered upon.</p>
        {:else}
            <p>Hover over me!</p>
        {/if}
    </div>
</Hoverable>

<Hoverable let:hovering={active}>
    <div class:active>
        {#if active}
            <p>I am being hovered upon.</p>
        {:else}
            <p>Hover over me!</p>
        {/if}
    </div>
</Hoverable>

<style>
    div {
        padding: 1em;
        margin: 0 0 1em 0;
        background-color: #eee;
    color: black;
    }

    .active {
        background-color: #ff3e00;
        color: white;
    }
</style>
```

➖ Hoverable.svelte

```html
<script>
    let hovering;

    function enter() {
        hovering = true;
    }

    function leave() {
        hovering = false;
    }
</script>

<div on:mouseenter={enter} on:mouseleave={leave}>
    <slot {hovering} />
</div>

```


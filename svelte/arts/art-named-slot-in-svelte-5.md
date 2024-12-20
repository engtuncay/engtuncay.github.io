
How do we do "named slots" in in Svelte 5?

Source : https://stackoverflow.com/questions/78664060/how-do-we-do-named-slots-in-in-svelte-5

[Back](../readme.md)

--

You just define a `#snippet` inside the component tag.

The snippet will be passed as a prop with the same name. E.g.:

```html
<script>
    import ContactCard from './ContactCard.svelte';
</script>

<ContactCard>
    {#snippet name()} P. Sherman {/snippet}

    {#snippet address()}
        42 Wallaby Way <br>
        Sydney
    {/snippet}
</ContactCard>

```
(If you need the span elements, you can add them inside the snippet.)

```html
<!-- ContactCard.svelte -->
<script>
  let { name, address } = $props();
</script>

<div>
  <div class="name">{@render name()}</div>
  <div class="address">{@render address()}</div>
</div>

```

Playground (https://svelte.dev/playground/c464a84241c741308a65b19a1a0b1915?version=5.1.4)

For fallback content, you can check whether a snippet was passed e.g. using `{#if}` or define a fallback snippet.

```html
<div class="name">
    {@render name?.()}
    {#if !name}
        ...
    {/if}
</div>
<div class="name">
    {#snippet nameUnknown()}...{/snippet}
    {@render (name ?? nameUnknown)()}
</div>

```

Snippets can be defined outside the component and be passed explicitly as well:

```html
{#snippet name()} P. Sherman {/snippet}
{#snippet address()}
    42 Wallaby Way <br>
    Sydney
{/snippet}
<ContactCard {name} {address} />

```

Scoping works similarly to variables; snippets are available on the same level and deeper in their element/block.

📝 Side note: The direct content of a component just implicitly defines a snippet called children. If you need to parameterize the snippet, you will also have to define it more explicitly, e.g.:

```html
<FancyList items={users}>
    {#snippet children(item)}
        {item.lastName}, {item.firstName}
    {/snippet}
</FancyList>

```

At this point you could also just call it something more specific, like maybe `itemTemplate` for this example.

🔔 TypeScript

The type Snippet can be imported from 'svelte', it is generic to support arguments but defaults to snippets without any.

E.g.

```html
<script lang="ts">
    import type { Snippet } from 'svelte';
    let { name, address }: {
        name: Snippet,
        address?: Snippet,
    } = $props();
</script>

```

Use ? for the prop to mark it optional as usual.

Arguments are listed as the generic type parameter in an array.

Example for a generic list component whose item template has an argument for the current item:

```html
<script lang="ts" generics="T">
    import type { Snippet } from 'svelte';
    let { items, itemTemplate }: {
        items: T[],
        itemTemplate: Snippet<[T]>,
    } = $props();
</script>

<div class="list">
    {#each items as item}
        <div class="item">{@render itemTemplate(item)}</div>
    {/each}
</div>

```
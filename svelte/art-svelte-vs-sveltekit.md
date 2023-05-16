
Svelte vs SvelteKit: What's the Difference?
Justin's profile pic
Justin Ahinon

Source : https://www.okupter.com/blog/svelte-vs-sveltekit-the-difference

9 Ocak 2023 Pazartesi
Last updated on 8 Nisan 2023 Cumartesi

Table of Contents
Discovering SvelteKit and the confusions
Svelte, the language
Svelte, the component framework
Reactivity
Reactive statements
Stores
Svelte, the compiler
Enter SvelteKit, the meta-framework
What to get from this blog post

Svelte vs SvelteKit: What's the Difference?

When I first heard about Svelte, I was very excited about it. I liked how easy and fast it helps to build functional web apps. Svelte takes the single file component approach to a whole new level with features like scoped styles, easy to understand loops and JavaScript statements, etc. All these make the Svelte DX really delightful.
But at some point in my journey, I wanted to do more. Things like server-side rendering, API endpoints, customizing responses, etc...; basically, all the things you would expect in a full-stack web framework.
Discovering SvelteKit and the confusionspermalink
This was the point in my research where I found about SvelteKit. But at first its whole concept was very confusing to me. The fact that it's named Svelte"Kit" made me initially think that it was a components' library for Svelte.
If you come from the world of Next.js or Nuxt.js, you'd be familiar with expressions like "meta-frameworks" which are used to describe frameworks that are built on top of other frameworks. SvelteKit is a meta-framework built on top of Svelte. But this was not mentioned anywhere on the website and the docs (and I believe it's still not).
Now that I have more experience and understand of how these two work, this post is my attempt to explain the differences between Svelte and SvelteKit.
Svelte, the languagepermalink
First, Svelte is a programming language, that uses the  .svelte  extension. At its core, the Svelte language is an association of  HTML ,  CSS  and  JavaScript  . This means that in most scenarios, if you know these three languages, you will feel comfortable writing Svelte code.
Very basically, a Svelte code can look like this:
SVELTE

<script>
  const name = "Justin";
</script>
 
<h1>Hello 👋🏽 {name}</h1>
 
<style>
  h1 {
    font-size: 7rem;
    color: #0f172a;
    font-weight: bold;
  }
</style>sv

I know right! Plain old web languages.

Svelte, the component frameworkpermalink

In addition to being a language, Svelte can also be considered as a component framework, like React or Vue.

This gives a set of very interesting features that are useful when building web applications. Think of

Reactivitypermalink

SVELTE

<script>
  let count = 0;
 
  const handleClick = () => {
    // calling this function will trigger an
    // update if the markup references `count`
    count = count + 1;
  };
</script>
 
<button on:click={handleClick}>{count}</button>
Reactive statementspermalink
SVELTE

<script>
  let count = 0;
 
  const handleClick = () => {
    count = count + 1;
  };
 
  // console.log() will be updated everytimes the value
  // of count changes
  $: console.log(count);
</script>
 
<button on:click={handleClick}>{count}</button>
Storespermalink
TYPESCRIPT

import { writable } from "svelte/store";
 
const count = writable(0);
 
count.subscribe((value) => {
  console.log(value);
}); // logs '0'
 
count.set(1); // logs '1'
 
count.update((n) => n + 1); // logs '2'
and much more...
By the way, these examples are mostly pulled from the Svelte official documentation. If you are looking into learning Svelte, it is a great place to look at; alongside with the official tutorial.
Svelte, the compilerpermalink
This is one of the most important part of this ecosystem. Unlike other frontend frameworks, Svelte apps are compiled at build time into JavaScript code. Which means that you are only shipping JavaScript code when you are using Svelte, and not the framework itself. This helps make Svelte applications lightweight and with a true sense of performance.

Compilers can be a very technical topic, but if you want to know more about how the Svelte compiler works, I'd recommend you to read this blog post that goes through the most important aspects.
Enter SvelteKit, the meta-frameworkpermalink
You can see SvelteKit as the steps forward in building web applications. It takes all the good things from Svelte, and on top of that, adds additional features that are needed when building a full stack application for the web.
You get things like server-side rendering, hooks, form actions, API routes or endpoints, etc...
SvelteKit allows doing something like this, for instance:
TYPESCRIPT

// src/routes/api/random-number/+server.ts
 
import { error } from "@sveltejs/kit";
import type { RequestHandler } from "./$types";
 
export const GET = (({ url }) => {
  const min = Number(url.searchParams.get("min") ?? "0");
  const max = Number(url.searchParams.get("max") ?? "1");
 
  const d = max - min;
 
  if (isNaN(d) || d < 0) {
    throw error(
      400,
      "min and max must be numbers, and min must be less than max"
    );
  }
 
  const random = min + Math.random() * d;
 
  return new Response(String(random));
}) satisfies RequestHandler;
When a user navigates to  /api/random-number?min=0&max=100  , the server will respond with a random number between 0 and 100. See +server for more details about API routes.
You also get delightful form handling out of the box with forms actions:
SVELTE

<!-- src/routes/register/+page.svelte -->
 
<script lang="ts">
  import type { ActionData } from "./$types";
  import { enhance } from "$app/forms";
 
  export let form: ActionData;
</script>
 
<form method="post" use:enhance>
  <input type="text" name="username" required />
  <button type="submit">Submit</button>
</form>
 
{#if form?.error}
  <NoticeComponent message={form.message} />
{/if}
TYPESCRIPT

// src/routes/register/+page.server.ts
 
import type { Actions } from "./$types";
import { fail, redirect } from "@sveltejs/kit";
 
export const actions = {
  default: async (event) => {
    const formData = Object.fromEntries(await event.request.formData());
 
    if (!formData.username) {
      return fail(400, { error: true, message: "Please enter a username" });
    }
 
    const username = formData.username as string;
 
    // Do some hypothetic operations
    const user = await registerUser(username);
 
    throw redirect(301, `/user/${user.id}`);
  },
} satisfies Actions;

And I'm only scratching the surface of all the cool things you can do with SvelteKit.

If you want to learn more about SvelteKit, you can follow along with my "SvelteKit Internal" series on this blog.

What to get from this blog postpermalink

The essential part to get from this post is that Svelte is a language, a compiler and a frontend framework, while SvelteKit is the full-stack framework built on top of Svelte.
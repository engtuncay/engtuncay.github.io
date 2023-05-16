
<h1>How to install & setup Vite + Typescript in Svelte</h1>

updated 25/09/22 By frontendshape

Source : https://frontendshape.com/post/how-to-install-setup-vite-typescript-in-svelte

Hello everyone, Today we will see how to install & setup Typescript in Svelte with the help of vite tool. Vite is a build tool that aims to provide a faster and leaner development experience for modern web projects. TypeScript is a strongly typed programming language that builds on JavaScript, giving you better tooling at any scale. lets start...

# Scaffolding Your First Vite Project With Svelte

First you need to create vite project there is three way you can create vite project. you can see below.

With NPM:

npm create vite@latest

With Yarn:

yarn create vite

With PNPM:

pnpm create vite 


Now you need to select svelte framework
✔ Project name: … svelte-ts
? Select a framework: › - Use arrow-keys. Return to submit.
  vanilla
  vue
  react
  preact
  lit
❯  svelte 


Next, Select Typescript with Svelte

✔ Project name: … svelte-ts
✔ Select a framework: › svelte
? Select a variant: › - Use arrow-keys. Return to submit.
  svelte
❯  svelte-ts
Move to project directory and install node dependencies.

cd svelte-ts
npm install
npm run dev
Svelte Typescript structure

run the server

npm run dev 


http://localhost:3000/
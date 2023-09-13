
<h1>How to install Tailwind CSS with Svelte + Vite!</h1> 

by Alti 

Posted on 29 Haz 2022

Source : https://dev.to/altierii/how-to-install-tailwind-css-with-svelte-vite-1kj6

- [How to install Tailwind CSS with Svelte + Vite](#how-to-install-tailwind-css-with-svelte--vite)
  - [Introduction](#introduction)
  - [Step 1](#step-1)
  - [Step 2](#step-2)
  - [Step 3](#step-3)
  - [Step 4](#step-4)


# How to install Tailwind CSS with Svelte + Vite

## Introduction

If you read the title, you know what the post is about. Let's not waste any time here and jump straight into it!

## Step 1

Set up a Vite + Svelte project using documentation on the Vite or Svelte website.

## Step 2

Run the following commands.

```
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init tailwind.config.cjs -p
```

or with yarn 

```
yarn add tailwindcss postcss autoprefixer --dev
npx tailwindcss init tailwind.config.cjs -p
```
(added by tor)

## Step 3

In the newly created tailwind.config.cjs file, add this line of code.

```js
module.exports = {
  content: ['./src/**/*.{html,js,svelte,ts}'],
  theme: {
    extend: {}
  },
  plugins: []
};

```

Then make an app.css file in the src directory with this code in it.

```css
@tailwind base;
@tailwind components;
@tailwind utilities;

```

## Step 4

Then in your main.js file, make sure to include the app.css file using an import statement.

```js
import './app.css'

```

Then all you need to do is run your code and make sure everything is working.

```
npm run dev

```
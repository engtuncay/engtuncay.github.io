

<h1>Get Up & Running with Tailwind and Node.JS By Matt Brice</h1> 

Goodbye Bootstrap. Hello Tailwind!

3 min read, Aug 24, 2020

**Contents**

- [Create a New Project](#create-a-new-project)
- [Install Tailwind, PostCSS, and Autoprefixer](#install-tailwind-postcss-and-autoprefixer)
- [Create a PostCSS Config JavaScript File](#create-a-postcss-config-javascript-file)
- [Create a Tailwind CSS File](#create-a-tailwind-css-file)
- [Update Package.json](#update-packagejson)
- [Link Tailwind](#link-tailwind)
- [Summary](#summary)


Tailwind is a CSS framework that allows developers to easily and quickly build custom components using low-level utility classes. With Tailwind, you can create an element (e.g., button, card, form, etc.) from scratch without fighting predesigned components like you would with Bootstrap.

The remainder of this article provides step by step instructions on how to install and setup Tailwind. Please note, this article assumes you are using Visual Studio, node, npm (automatically installed with node), and Chrome. Now enough chat. Let’s get started.

# Create a New Project

First, let’s start by creating a new directory for our project and initializing it. For this example, I will name the directory “tailwindExample,” but you can use whatever makes the most sense to you.

```sh
mkdir tailwindExample
npm init -y
```

# Install Tailwind, PostCSS, and Autoprefixer

Next, we will want to install Tailwind, PostCSS, and Autoprefixer. Once initialized, this will create an empty tailwind.config.js file in the “tailwindExample” directory.

```sh
pnpm install tailwindcss postcss-cli autoprefixer
npx tailwind init

```

PostCSS is a framework that can process and transform CSS with JavaScript plugins (e.g., unique features/functionality that can be easily accessed in your programs). Tailwind does not include vendor prefixes, so Autoprefixer will automatically compile your CSS and determine if a prefix is needed by using Can I use. This allows CSS features (or properties) to be seen on any browser.

# Create a PostCSS Config JavaScript File

First, create a file named “postcss.config.js”. This is where we will provide the plugins we will be using. The snippet below offers the two packages we will be using.

```js
module.exports = {
plugins: [
require("tailwindcss"),
require("autoprefixer"),
]};

```


# Create a Tailwind CSS File

Now create a new file named “tailwind.css” and add the following code. Tailwind will search the project for these markers and replace them with the base styles, components, and utilities provided by Tailwind.

```css
@tailwind base;
@tailwind components;
@tailwind utilities;

```

# Update Package.json

Navigate to your “package.json” file and update the test script to read what is currently on line 7 below. 

```js
"scripts": {
  "build":"postcss tailwind.css -o dist/scripts/tailwind.css"
}
```
Now run the build script.

```sh
npm run build
``` 

If done correctly, you will see the `dist/scripts/tailwind.css` file path appear in your project.

You’ll notice the newly created “tailwind.css” file has all of the base styles, utilities, and components already added.

# Link Tailwind

Last but not least, head over to your HTML page and, in the head, add a style link. You’re now ready to start using Tailwind in your CSS file. I recommend you go straight to the Tailwind Docs and get going!

```html
<link rel=”stylesheet” href=”dist/scripts/tailwind.css”/>

```

# Summary
Tailwind has some of the best docs I have seen. If this article didn’t answer all of your questions, I recommend using the following links.

- Tailwind homepage (https://tailwindcss.com/) 

- Tailwind Docs on how to use utilities in HTML (https://tailwindcss.com/docs/installation)


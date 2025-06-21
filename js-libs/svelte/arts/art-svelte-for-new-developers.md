
<h1>Svelte for new developers by Rich Harris (2019)</h1> 

Source : https://svelte.dev/blog/svelte-for-new-developers (some parts may be modified or added)  

APR 16 2019

**Contents**

- [Installing Node.js](#installing-nodejs)
- [Installing a text editor](#installing-a-text-editor)
- [Creating a svelte + vite project (javascript)](#creating-a-svelte--vite-project-javascript)
- [Creating a svelte + vite project (typescript)](#creating-a-svelte--vite-project-typescript)
- [Building your app (production)](#building-your-app-production)
- [Installing Tailwind](#installing-tailwind)
- [Online Repl - Svelte Code Play](#online-repl---svelte-code-play)

# Installing Node.js

Node is a way to run JavaScript on the command line. It's used by many tools, including Svelte. If you don't yet have it installed, the easiest way is to download the latest version straight from the website (https://nodejs.org/en/). 

Once installed, you'll have access to three new commands:

- `node my-file.js`

runs the JavaScript in my-file.js

- npm [arguments] 

npm is a way to install 'packages' that your application depends on, such as the svelte package

- npx [arguments] 

a convenient way to run programs available on npm without permanently installing them

# Installing a text editor

To write code, you need a good editor. The most popular choice is Visual Studio Code or VSCode, and justifiably so — it's well-designed and fully-featured, and has a wealth of extensions (including one for Svelte (https://marketplace.visualstudio.com/items?itemName=svelte.svelte-vscode), which provides syntax highlighting and diagnostic messages when you're writing components).

# Creating a svelte + vite project (javascript)

We're going to use the `Svelte + Vite template`. You don't have to use a project template, but it means you have to do a lot less setup work (vite template).

On the command line, navigate to where you want to create a new project, then type the following lines (you can paste the whole lot, but you'll develop better muscle memory if you get into the habit of writing each line out one at a time then running it):

```sh
npm create vite@latest my-svelte-project -- --template svelte`
cd my-svelte-project

npm install

```

# Creating a svelte + vite project (typescript)

If you prefer TypeScript, you can replace `--template svelte` with `--template svelte-ts`.

```sh
npm create vite@latest my-svelte-project -- --template svelte-ts

npm install

```

This creates a new directory, `my-svelte-project`, adds files from the 
`create-vite/template-svelte template` (https://github.com/vitejs/vite/tree/main/packages/create-vite/template-svelte), and installs a number of packages from npm. Open the directory in your text editor and take a look around. The app's 'source code' lives in the `src` directory, while the files your app can load are in public.

In the `package.json` file, there is a section called `"scripts"`. These scripts define shortcuts for working with your application — `dev`, `build` and `preview`. To launch your app in development mode, type the following:

- `npm run dev`

Running the dev script starts a program called `Vite`. Vite's job is to take your application's source files, pass them to other programs (including Svelte, in our case) and convert them into the code that will actually run when you open the application in a browser.

Speaking of which, open a browser and navigate to `http://localhost:5173`. This is your application running on a local web server (hence 'localhost') on port 5173.

Try changing `src/App.svelte` and saving it. The application will update with your changes auto.

# Building your app (production)

In the last step, we were running the app in 'development mode'. In dev mode, Svelte adds extra code that helps with debugging, and Vite skips the final step where your app's JavaScript is compressed.

When you share your app with the world, you want to build it in `'production mode'`, so that it's as small and efficient as possible for end users. To do that, use the build command:

```sh
npm run build
# or
yarn run build

```

Your dist directory now contains `an optimised version` of your app. You can run it like so:

```sh
npm run preview
# or
yarn run preview

```

- `npm run preview`

# Installing Tailwind

Source : https://tailwindcss.com/docs/guides/vite#svelte

➖ 1 Create your project

Start by creating a new Vite project if you don’t have one set up already. The most common approach is to use Create Vite.

```sh
npm create vite@latest my-project -- --template svelte

cd my-project

```

or typescript 

```sh
npm create vite@latest my-project -- --template svelte-ts

cd my-project

npm install

```

➖ Install Tailwind CSS

Install tailwindcss and its peer dependencies, then generate your tailwind.config.js and postcss.config.js files.

```sh
npm install -D tailwindcss postcss autoprefixer
# or
yarn add tailwindcss postcss autoprefixer --dev
npx tailwindcss init -p

```

➖ Configure your template paths

Add the paths to all of your template files in your tailwind.config.js file.

tailwind.config.js

```js
/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{svelte,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

```

➖ Add the Tailwind directives to your CSS

Add the @tailwind directives for each of Tailwind’s layers to your `./src/app.css` file.

app.css

```css
@tailwind base;
@tailwind components;
@tailwind utilities;

```

➖ Start your build process

Run your build process with npm run dev.

```sh
npm run dev
# or
yarn run dev
```

➖ Start using Tailwind in your project

Start using Tailwind’s utility classes to style your content.

App.svelte

```html
<h1 class="text-3xl font-bold underline">
  Hello world!
</h1>

```

# Online Repl - Svelte Code Play

Svelte examples can be prepared from Svelte Repl Editor easily. For example Hello World Repl :

https://svelte.dev/repl/hello-world?version=4.2.19

- Nested Componentes

https://svelte.dev/examples/nested-components

- Dynamic Attributes

https://svelte.dev/examples/dynamic-attributes

- Styling

https://svelte.dev/examples/styling
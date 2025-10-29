
How to develop a Typescript Library

Source : https://medium.com/@rifantechguy55/how-to-develop-a-typescript-library-ade8d329636

4 min read, Jun 24, 2023

- [Step 1: Setup tsconfig.json](#step-1-setup-tsconfigjson)
- [Step 2: Implement your library](#step-2-implement-your-library)
- [Step 3: Create an index.ts file](#step-3-create-an-indexts-file)
- [Step 4: Configure the package.json](#step-4-configure-the-packagejson)
- [Step 5: Publish to npm](#step-5-publish-to-npm)


“I’m a beginner for Typescript, and I’d like to make my first custom TS library. But I don’t know how to do it”. This is you.

Don’t worry about it. Look it further!!! I’m here, and I will teach you one by one. Never mind!!!

## Step 1: Setup tsconfig.json

Create a project folder, in this tutorial we’ll call it hello-world. Then proceed to create a tsconfig.json in hello-world. Your tsconfig.json file should look somewhat like this:

hello-world/tsconfig.json

```js
{
  "compilerOptions": {
    "module": "commonjs",
    "target": "es2015",
    "declaration": true,
    "outDir": "./dist"
  },
  "include": [
    "src/**/*"
  ]
}

```

Pretty much like a setup for a non-library project, but with one important addition: You need to add the "declaration": true flag. This will generate the .d.ts files (aka declaration files) which contain the types of your code. This way, if someone is using your library and they also use TypeScript, they get the benefits of typesafety and autocomplete!

Regarding the other options, let’s quickly go through those: The module compiler option "module": "commonjs" is required if you want your code to run seamlessly with most current node.js applications. Replace this with "module": "esnext" if you're building a library for the browser. "target": "es2015" specifies which version of JavaScript your code will get transpiled to. This needs to be aligned with the oldest version of node.js (or the oldest browser) you want to support. Choosing es2015 as the compile target makes your library compatible with node.js version 8 and upwards. "outDir": "./dist" will write your compiled files into the dist folder and the include option specifies where your source code lives.

## Step 2: Implement your library

Proceed in the same way, as if you weren’t writing a library. Create a src folder and put all the source files of your library (application logic, data, and assets) there.

For this demo, we’ll setup a silly hello-world.ts file, that looks like so:

hello-world/src/hello-world.ts

```ts
export function sayHello() {
  console.log('hi')
}
export function sayGoodbye() {
  console.log('goodbye')
}

```

## Step 3: Create an index.ts file

Add an index.ts file to your src folder. Its purpose is to export all the parts of the library you want to make available for consumers. In our case it would simply be:

hello-world/src/index.ts

```ts
export {sayHello, sayGoodbye} from './hello-world'

```

The consumer would be able to use the library later on like so:

someotherproject/src/somefile.ts

```ts
import {sayHello} from 'hwrld'
sayHello();

```

You see that we have a new name here, “hwrld”, we haven’t seen anywhere yet. What is this name? It’s the name of the library you’re gonna publish to npm also known as the package name!

## Step 4: Configure the package.json

The package name is what the consumer is going to use to import functionality from your library later on. For this demo I have have chosen hwrld since it was still available on npm. The package name is usually right at the top of the package.json. The whole package.json would look like so:

hello-world/package.json

```
{
  "name": "hwrld",
  "version": "1.0.0",
  "description": "Can log \"hello world\" and \"goodbye world\" to the console!",
  "main": "dist/index.js",
  "types": "dist/index.d.ts",
  "files": [
    "/dist"
  ]
}

```

If you don’t have a package yet you can create one with npm init and it will guide you through the process. Remember, the package name you choose will be used by people for their imports, so choose wisely!

There’s also one all-important flag in this package.json: You have to declare where to find the type declarations! This is done using "types": "dist/index.d.ts" Otherwise the consumer won't find your module!

The final property files helps you to whitelist the files you want to ship to the npm registry. This is usually a much easier and safer route than using the `.npmignore` file!

## Step 5: Publish to npm

To publish your first version to npm run:

```
tsc
npm publish

```

Now you’re all set to go! Consume your library anywhere you want by running:

```
npm install --save hwrld

```

and consume it using

```ts
import {sayHello} from 'hwrld'
sayHello();

```

For subsequent releases, use the semvar principle. When you make a patch / bugfix to your library, you can run `npm version patch`, for new features run `npm version minor` and on breaking changes of your api run `npm version major`.

You can also refer this github repo.

https://github.com/CaCaBlocker/ts-sample-modules

The below link will teach you how to create and publish your first npm package, and you will certainly have a good sense of it.

https://www.freecodecamp.org/news/how-to-create-and-publish-your-first-npm-package/

Thanks for your time.
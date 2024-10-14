
How to create a JavaScript library and publish it to npm

Adrian-Gabriel Manduc

Jan 10, 2021

Source : https://adrianmanduc.medium.com/how-to-create-a-js-library-and-publish-it-to-npm-6e6351971984

Did you ever write some amazing code that you wanted to use in all your projects and you ended up manually copying it over ? I did. Even if I knew I could do it in a better way, I thought that the whole process of creating and publishing an npm package is very complicated. However, after doing some research I found out that it is not. It is actually quite simple.

At the end of this article, you should be able to create your own minimal JavaScript utilities library and publish it to npm so that you (and others!) can use it in any project.

This guide assumes that you’ve got Node.js installed on your machine and that you are somewhat familiar with the JavaScript ecosystem.

## Step 1. Creating the project

We will start from scratch and use npm to start a project.

Create a root folder for your project and name it however you want. Throughout this guide I will use agm-awesome-utils-tutorial as the project name, but you should choose your own name and replace it accordingly.

In this folder, create a src folder with an empty index.js file inside it.

Next open a terminal in the root folder and run npm init to generate a package.json file. Do not worry too much about the configuration options for this as we will modify its contents later.

You should end up with the following structure:

agm-awesome-utils-tutorial

```
  ├── src
    ── index.js
  └── package.json

```

## Step 2. Install dev dependencies

Babel

We will write the code using ES6+ syntax, therefore we will use Babel to transpile it for older environments.

```sh
npm i -D @babel/core @babel/preset-env

```

Rollup & Rollup Plugins

We will use Rollup as the JavaScript bundler for this project. If you are not sure what a JavaScript bundler is, why do we need one and what options there are I suggest reading this article. For another good comparison of the most popular JS bundlers as of 2020 check this out.

Additionally, we need some Rollup plugins to make it work with Babel and to produce builds in multiple module formats (UMD, CJS, ESM).

```sh
npm i -D rollup rollup-plugin-babel rollup-plugin-commonjs rollup-plugin-node-resolve

```

## Step 3. Configure Babel & Rollup

Babel

Create a .babelrc file in the root folder.

Babel configuration

Rollup

Create a rollup.config.js file in the root folder. Pay attention to the input and output properties.

Rollup configuration

We also need to update the scripts in package.json and configure the entry point for each module format (CJS, ESM, UMD).

package.json

## Step 4. Write some code

For the purpose of this tutorial, our library will be really simple and contain a single function that capitalizes the first letter of a string.

Add the following code in the index.js file:

src/index.js

## Step 5. Write tests

A very important part of creating a library is testing it, to ensure that the code you are publishing works as expected and has no bugs.

In the root folder, create a test folder with a spec.js file inside it.

```
awesome-utils
  ├── src
    ── index.js
  ├── test
    ── spec.js
  └── package.json

```

In the spec.js file, we will use the Node.js assert API to test our function.

test/spec.js

Run the tests using the test script we previously added in the package.json file.

npm run test

## Step 6. Publish to npm

Create npm account

In order to publish the package to npm you will need an npm account. You can create one here.

Log in to your npm account

After creating an account, open a terminal, navigate to the root folder of your project and use the following command:

npm login

You will be asked for you username, password, and email.

## Publishing

After successfully logging in, simply run the following command:

```sh
npm publish

```

Each npm package must have a unique name, therefore the publish might fail if you have used the same package name as in this tutorial.

That’s it! Your package should now be published on npm and available for everyone to use!

You should now be able to install it in any project similar to how you install any other dependency.

```sh
npm install agm-awesome-utils-tutorial

```

Your package name will be the one you configured in your package.json file

Next Steps

This guide covered a simple example of creating and publishing a very basic package. In a real world scenario, things can (and will) get slightly more complex.

Here are some improvements to consider for the existing solution:

Make your code publicly available on Github. Add a license and documentation for your library

Improve testing using a testing framework such as Mocha or Jest

Automate the publish process. You can take a look at release-it and semantic-release

All the code for this tutorial is available on Github.


Other Articles

- https://medium.com/free-code-camp/how-to-publish-packages-that-can-be-used-in-browsers-and-node-c51274dca77c
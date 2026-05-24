
<h1>Using ECMAScript modules (ESM) with Node.js By Diogo Souza</h1>

Apr 5, 2021

Source : https://blog.logrocket.com/how-to-use-ecmascript-modules-with-node-js 

(some parts may be modified or removed)

[Back](../readme.md)

---

**Content**

- [What are ECMAScript modules (ESM)?](#what-are-ecmascript-modules-esm)


Editor’s Note: This post was updated in April 2021 to include updated and relevant information on ES modules.

Since 2009, right after Kevin Dangoor started the CommonJS project, a new discussion began about how JavaScript would better fit the process of building applications not only to run in web browsers, but amplifying its powers to a wider and broader range of possibilities. And those, of course, had to include the backend universe.

Its key to success is actually due to its API, which brought to the table a rich standard library similar to those we had for other languages like Python, Java, etc. Today, thanks to CommonJS, we have JavaScript in server-side applications, command line tools, desktop GUI-based and hybrid applications (Titanium, Adobe AIR, etc.), and more.

By all means, every time you use a require(), you’re in fact using the implementation of CommonJS modules, which comes within Node.js by default.

# What are ECMAScript modules (ESM)?

CommonJS modules, though ubiquitous thanks to Node.js, are not officially part of the JavaScript language specification. ECMAScript modules (ES modules or ESM, for short), on the other hand, are a relatively recent addition to the JavaScript language specification and are seeking to unify and standardize how modules are loaded in JavaScript applications.

And that’s the first problem of using ES modules along with Node: CommonJS is already a module system, and ESM has to find the best way to live alongside of it. It shouldn’t really be a problem, except for one important fact: ESM is asynchronously loaded, while CommonJS is synchronous.

When it comes to tools like Babel and webpack, the load is also taken by a synchronous process, so considering their isomorphic natures for allowing applications in both browsers and server sides to run without native support, we’ll have some issues.

In this article, we’ll explore how far this journey of supporting both worlds has come in the Node.js universe. We’ll create a couple examples to give you a closer look at how you can migrate your codebase to make use of the power of ESM.

A brief introduction to using ES modules
If you’re a beginner in ES modules, let’s take a closer look at how to use them. If you’ve ever used React or Vue.js, you’ve probably seen something like this:

import React, {Fragment} from 'react';
// or
import Vue from './vue.mjs';
The first example, in particular, is a good one because it demonstrates the difference between default exports and named exports. Consider the following code snippet:

export default React;
We can only have one default module exported per file. That’s why Fragment has to be imported into the { }s because it is not included as a default. Its exportation would look like:

export const Fragment = … ;
And you can, obviously, create your own, like so:

export const itsMine = 'It is my module';
Go and save this code into an mjs extension file, and just as we saw in the React example, you can import it to another file:

import { itsMine } from './myESTest.mjs'

alert(itsMine); // it'll alert 'It is my module' text
The mjs extension can lead to some confusion when we compare its use against js files. For JavaScript specification, there are differences between them. For example, modules are, by definition, strict (as in 'use strict'), so it means that a lot of checks are made and “unsafe” actions are prohibited when implementing your JavaScript modules.

The js vs. mjs distinction is necessary for the JavaScript engine to know if it’s dealing with a module or a script. If you get a CommonJS script, for example, you’re not allowed to use 'import from' in it (just require), so they can force each extension to import the appropriate, respective module script:

mjs import from mjs
js require js
But interoperability is important; so what happens in the following scenario?

mjs import from js
js require mjs
When it comes to ES modules, it’s well known that they’re static — i.e, you can only “go to” them at compilation time, not runtime. That’s why we have to import them in the beginning of the file.

mjs import from js
The first thing to notice here is that you cannot use require in a mjs file. (If you try to, you’ll see an error stating, “require is not defined.”) Instead, we must use the import syntax we’ve previously seen:

import itsMine from './myESTest.js'
But only if the default import (module.exports) has been exported into the CommonJS file (myESTest.js). Simple, isn’t it?

js require mjs
However, when the opposite takes place, we can’t simply use:

const itsMine require('./myESTest.mjs')
Remember, ESM can’t be imported via the require function. On the other side, if you try the import from syntax, we’ll get an error because CommonJS files are not allowed to use it:

import { itsMine } from './myESTest.mjs' // will err
Domenic Denicola proposed a process to dynamically import ES modules via the import() function in various ways. Please refer to the link to read a bit more about it. With it, our code will look like this:

async function myFunc() {
const { itsMine } = await import('./myESTest.mjs')
}
myFunc()
Note, however, that this approach will lead us to make use of an async function. You can also implement this via callbacks, promises, and other techniques described in more detail here.

Note: This type of importing is only available from Node 10+.

Running Node.js with ES modules
There are two main ways for you to run ES modules in Node.js:

By using a version of Node.js greater than 12.0.0.
Via a library that adds ES module support to older versions of Node, in this case, ESM, which bundles all the main parts of the implementation in one single place
In the Node GitHub repo, you can find an archived page called “Plan for New Modules Implementation,” where you can follow the official plan the Node.js team followed to support ECMAScript modules in Node.js. The effort was split up into four phases and took a lot of care and attention to implement correctly.

Using official ES module support
Let’s start with the first (and official) way provided by Node.js io use ES modules in your Node environment.

First, as previously mentioned, make sure to have a version of Node higher than 12 on your machine. You can use the power of NVM to manage and upgrade your current version.

Then, we’re going to create a single example, just to give you a taste of how the modules work out. Create the following structure:

ESM ES modules node project example
Our project structure.
The first file, hi.mjs, will host the code for a single function that’ll concat a string param and return a hello message:

// Code of hi.mjs
export function sayHi(name) {
    return "Hi, " + name + "!"
}
Note that we’re making use of the export feature. The second file, runner.mjs, will take care of importing our function and printing the message to the console:

// Code of runner.mjs
import { sayHi } from './hi.mjs'

console.log(sayHi('LogRocket'))
To run our code, just issue the following command:

node runner.mjs
And this will be the output:

ESM ES modules node runner output
Using the ESM library
While on the frontend, we can make use of Babel, webpack, or similar tools to help us use ES modules in contexts where native support is not yet available, we have another solution for Node.js specifically that is much more succinct in similar situations: it is the ESM package.

Note: this approach is only required for older versions of Node. Recent versions of node support ES modules out of the box.

It basically consists of a module loader that adds support for ES modules on top of the CommonJS module system. No dependencies are required; it allows you to use ES modules in Node.js v6+ super quickly. And, of course, it is totally compliant with the Node ES module specification.

Let’s now consider a different hello world, this time on the web, with Express.js. We’ll make a CJS file to talk with an ESM one.

But first, in the root folder of our project, run the following commands to set up your package.json file:

npm init -y
npm install --save esm
npm install --save express
Once finished, create two new files:

runner.js will be the starting point of execution, but now as a single JavaScript file
hi-web.mjs will store the code for Express to access the hello function
Let’s start with the hi-web.mjs source code:

import express from "express";
import { sayHi } from "./hi.mjs";

const app = express();

app.get("/", (req, res) => res.json({ "message": sayHi("LogRocket") }));

app.listen(8080, () => console.log("Hello ESM with esm !!"));
Note that, here, we’re making use of the previous mjs file that hosts the sayHi() function. That’s no big news once we’ve seen that we can perfectly import mjs files from another one. Take a look at how we import this file to our start script:

// runner.js code
require = require("esm")(module);
module.exports = require("./hi-web.mjs").default;
Once we’re not using the dynamic import, the default must be used. The ESM package rewrites require and also adds functionality to the Node version module being used. It does some inline and on-demand transformations, processing and caching to the executions in real time.


Over 200k developers use LogRocket to create better digital experiences
Learn more →
Before you run the example, make sure to adapt your package.json to understand which file will be the starting point:

...

"scripts": {
    "start": "node runner.js"
},
After running the npm start command, we should see a message in the console when our server starts, and requesting localhost:8080 will show the following output in the browser:

ESM ES modules node browser output
Browser output.
Conclusion
For more details on how ES modules work with Node, please visit their official docs.

When dealing with codebase conversions, remember these important points:

When migrating your js files to mjs, change the basic exports (module.exports) to the new ESM export statement
All the requires must be changed to the respective import statements
If you’re using require dynamically, remember to make the import as well, via await import (or the dynamic import() function we’ve seen)
Also change the other requires in other files that reference what you’re migrating
mjs files, when used in the browser, must be served with the correct Media Type, which is text/javascript or application/javascript. Since browsers don’t care about the extension, Node.js is the only thing that requires the extension to exist. This is the way it can detect whether a file is a CJS or an ES module
Good studies!
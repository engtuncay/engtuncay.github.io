
Source : 

[Back](../readme.md)

---

# What is TypeScript

TypeScript is a superset of JavaScript.

TypeScript builds on top of JavaScript. First, you write the TypeScript code. Then, you compile the TypeScript code into plain JavaScript code using a TypeScript compiler.

Once you have the plain JavaScript code, you can deploy it to any environment that JavaScript runs.

TypeScript files use the .ts extension rather than the .js extension of JavaScript files.

TypeScript uses the JavaScript syntaxes and adds additional syntaxes for supporting Types.

If you have a JavaScript program without any syntax errors, it is a TypeScript program. This means that all JavaScript programs are TypeScript programs. This is very helpful if you migrate an existing JavaScript codebase to TypeScript.

➖ Why TypeScript

The main goals of TypeScript are:

- Introduce optional types to JavaScript.

- Implement planned features of future JavaScript, a.k.a. ECMAScript Next or ES Next to the current JavaScript. (https://www.javascripttutorial.net/es-next/)

1) TypeScript improves your productivity while helping avoid bugs

Types increase productivity by helping you avoid many mistakes. By using types, you can catch bugs at the compile time instead of having them occur at runtime.

For example, the following function adds two numbers x and y:

```js
function add(x, y) {
   return x + y;
}

```

If you get the values from HTML input elements and pass them into the function, you may get an unexpected result:

```js
let result = add(input1.value, input2.value);
console.log(result); // result of concatenating strings

```

For example, if users entered 10 and 20, the add() function would return 1020, instead of 30.

The reason is that input1.value and input2.value are strings, not numbers. When you use the operator + to add two strings, it concatenates them into a single string.

When you use TypeScript to specify the type for the parameters like this explicitly:

```js
function add(x: number, y: number) {
   return x + y;
}

```

In this function, we added the number types to the parameters. The function add() will accept only numbers, not any other values.

When you invoke the function as follows:

```js
let result = add(input1.value, input2.value);

```

… the TypeScript compiler will issue an error if you compile the TypeScript code into JavaScript. Hence, you can prevent the error from happening at runtime.

1) TypeScript brings the future JavaScript to today

TypeScript supports the upcoming features planned in the ES Next for the current JavaScript engines. It means you can use the new JavaScript features before web browsers (or other environments) fully support them.

Every year, TC39 releases several new features for ECMAScript, which is the standard of JavaScript. The feature proposals typically go through five stages:

```
Stage 0: Strawperson
Stage 1: Proposal
Stage 2: Draft
Stage 3: Candidate
Stage 4: Finished

```

And TypeScript generally supports features that are in stage 3. For more information, check out the TC39 process.

Summary

- TypeScript is a superset of JavaScript.
- TypeScript adds type to the JavaScript and helps you avoid potential bugs that occur at runtime.
- TypeScript also implements the future features of JavaScript.

# TypeScript Setup

The following tools you need to set up to start with TypeScript:

- Node.js – Node.js is the environment in which you will run the TypeScript compiler. Note that you don’t need to know Node.js.

- TypeScript compiler – a Node.js module that compiles TypeScript into JavaScript.

- Visual Studio Code or VS Code – a code editor supporting TypeScript. VS Code is highly recommended. However, you can use your favorite editor.

If you use VS Code, you can install the following extension to speed up the development process:

- Live Server – allows you to launch a development local web server with the hot reload feature.
Install Node.js (ritwickdey)

To install node.js, you follow these steps:

- Go to the Node.js download page.

- Download the suitable Node.js version for your platform such as Windows, macOS, or Linux.
- Execute the downloaded Node.js package or execution file. The installation is quite straightforward.
- Verify the installation by opening the Terminal on macOS and Linux or the Command Prompt on Windows and typing the command node -v, you should see the installed version of Node.js.

➖ Install TypeScript compiler

To install the TypeScript compiler, you launch the Terminal on macOS or Linux and Command Prompt on Windows and type the following command:

```sh
npm install -g typescript

```

After the installation, you can type the following command to check the current version of the TypeScript compiler:

```sh
tsc --v

```

It should return the version like this:

```
Version 5.5.3

```

Note that your version is probably newer than this version.

If you’re on Windows and get the following error:

```sh
'tsc' is not recognized as an internal or external command, operable program or batch file.

```

… then you should add the following path C:\Users\<user>\AppData\Roaming\npm to the PATH variable. Notice that you should change the `<user>` to your Windows user.

➖ Install tsx module

If you want to run TypeScript code directly on Node.js without precompiling, you can use the tsx module.

To install the tsx module globally, run the following command from the Terminal on macOS and Linux or Command Prompt on Windows:

```sh
npm install -g tsx

```

➖ Install VS Code

Summary

- A TypeScript compiler compiles the TypeScript into JavaScript.
- Use the tsc command to compile a TypeScript file to a JavaScript file.
- Use the tsx module to run TypeScript directly on Node.js without precompiling it to JavaScript.

# TypeScript “Hello, World!”

➖ TypeScript Hello World program in Node.js

- First, create a new directory to store the code, e.g., helloworld.

- Second, launch VS Code and open that directory.

- Third, create a new TypeScript file called app.ts. The extension of a TypeScript file is .ts.

- Fourth, type the following source code in the app.ts file:

```ts
let message: string = 'Hello, World!';
console.log(message);

```

- Fifth, launch a new Terminal within the VS Code by using the keyboard shortcut Ctrl+` or follow the menu Terminal > New Terminal


- Sixth, type the following command on the Terminal to compile the app.ts file:

```sh
tsc app.ts

```

If everything is fine, you’ll see a new file called app.js is generated by the TypeScript compiler:

To run the app.js file in Node.js, you use the following command:

```sh
node app.js

```

If you installed the tsx module mentioned in the setting up TypeScript development environment, you can use just one command to run the TypeScript file directly on Node.js without precompiling it to JavaScript:

```sh
tsx app.ts

```

➖ TypeScript Hello World program in Web Browsers

The following steps show you how to create a webpage that shows the Hello, World! message on web browsers.

First, create a new file called index.html and include the app.js as follows:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TypeScript: Hello, World!</title>
</head>
<body>
    <script src="app.js"></script>
</body>
</html>

```

Notice that the TypeScript compiler (tsc) will compile the app.ts file into the app.js file.

- Second, change the app.ts code to the following:

```js
let message: string = 'Hello, World!';

// create a new heading 1 element
let heading = document.createElement('h1');
heading.textContent = message;

// add the heading the document
document.body.appendChild(heading);


```

- Third, compile the app.ts file into the app.js file:

```sh
tsc app.ts

```

- Fourth, open the Live Server from the VS code by right-mouse-clicking the index.html and select the Open with Live Server option:

The Live Server will open the index.html.

To make changes, you need to edit the app.ts file. For example:

```ts
let message: string = 'Hello, TypeScript!';
let heading = document.createElement('h1');
heading.textContent = message;

document.body.appendChild(heading);

```

And compile the app.ts file:

```sh
tsc app.ts

```

The TypeScript compiler will generate a new app.js file and the Live Server will automatically reload it on the web browser.

Note that the app.js is the output file of the app.ts file, therefore, you should never directly change its contents, or you’ll lose the changes once you recompile the app.ts file.

# Why TypeScript



➖ Why you should use TypeScript over JavaScript to avoid the problems created by the dynamic types

Why use TypeScript

There are two main reasons to use TypeScript:

- TypeScript adds a type system to help you avoid many problems with dynamic types in JavaScript.
- TypeScript implements the future features of JavaScript a.k.a ES Next so you can use them today.

TBC - 20251101 - 2021 

This tutorial focuses on the first reason.

Understanding dynamic type in JavaScript

JavaScript is dynamically typed. Unlike statically typed languages such as Java or C#, values have types instead of variables. For example:

"Hello"
Code language: TypeScript (typescript)
From the value, you can tell that its type is string.

The following value is a number:

2020
Code language: TypeScript (typescript)
See the following example:

let box;
box = "hello";
box = 100;
Code language: TypeScript (typescript)
The type of the box variable changes based on the value assigned to it.

To find the type of the box variable at runtime, you use the typeof operator:

let box;
console.log(typeof(box)); // undefined

box = "Hello";
console.log(typeof(box)); // string

box = 100;
console.log(typeof(box)); // number
Code language: TypeScript (typescript)
In this example, the first statement defines a variable box without assigning a value. Its type is undefined.

Then, we assign the literal string "Hello" to box variable and show its type. The type of the box variable changes to string.

Finally, we assign 100 to the box variable. This time, the type of the box variable changes to number.

As you can see, as soon as the value is assigned, the type of the variable changes.

And you don’t need to explicitly tell JavaScript the type. JavaScript will automatically infer the type from the value.

Dynamic types offer flexibility. However, they also lead to problems.

Problems with dynamic types
Suppose you have a function that returns a product object based on an id:

function getProduct(id){
  return {
    id: id,
    name: `Awesome Gadget ${id}`,
    price: 99.5
  }
}
Code language: TypeScript (typescript)
The following uses the getProduct() function to retrieve the product with id 1 and show its data:

const product = getProduct(1);
console.log(`The product ${product.Name} costs $${product.price}`);
Code language: TypeScript (typescript)
Output:

The product undefined costs $99.5 
Code language: Shell Session (shell)
It isn’t what we expected.

The issue with this code is that the product object doesn’t have the Name property. It has the name property with the first letter n in lowercase.

However, you can only know it until you run the script.

Referencing a property that doesn’t exist on the object is a common issue when working in JavaScript.

The following example defines a new function that outputs the product information to the console:

const showProduct = (name, price)  => {
  console.log(`The product ${name} costs $${price}.`);
};
Code language: JavaScript (javascript)
The following uses the getProduct() and showProduct() functions:

const product = getProduct(1);
showProduct(product.price, product.name);
Code language: JavaScript (javascript)
Output:

The product 99.5 costs $Awesome Gadget 1 
Code language: PHP (php)
This time we pass the arguments in the wrong order to the showProduct() function. This is another common problem that you often have when working with JavaScript.

This is why TypeScript comes into play.

How Typescript solves problems of dynamic types
To fix the problem of referencing a property that doesn’t exist on an object, you do the following steps:

First, define the “shape” of the product object using an interface. Note that you’ll learn about the interface in a later tutorial.

interface Product{
    id: number,
    name: string,
    price: number
};
Code language: CSS (css)
Second, explicitly use the Product type as the return type of the getProduct() function:

function getProduct(id) : Product{
  return {
    id: id,
    name: `Awesome Gadget ${id}`,
    price: 99.5
  }
}
Code language: JavaScript (javascript)
When you reference a property that doesn’t exist, the code editor will inform you immediately:

const product = getProduct(1);
console.log(`The product ${product.Name} costs $${product.price}`);
Code language: JavaScript (javascript)
The code editor highlighted the following error on the Name property:


And when you hover the mouse cursor over the error, you’ll see a hint that helps you to solve the issue:


To solve the problem of passing the arguments in the wrong order, you explicitly assign types to function parameters:

const showProduct = (name: string, price:number)  => {
  console.log(`The product ${name} costs $${price}.`);
};
Code language: JavaScript (javascript)
And when you pass the arguments of the wrong types to the showProduct() function, you’ll receive an error:

const product = getProduct(1);
showProduct(product.price, product.name);
Code language: JavaScript (javascript)

Summary
JavaScript is dynamically typed, providing flexibility but also leading to many problems.
TypeScript adds an optional type system to JavaScript to solve these problems.




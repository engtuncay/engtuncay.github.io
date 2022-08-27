
This tutorial is mostly prepared from javascript.info website. It is very good. Some sections may be changed or removed.

Source : http://www.javascript.info


- [Fundamentals 1](#fundamentals-1)
  - [An Introduction to JavaScript](#an-introduction-to-javascript)
    - [What is JavaScript?](#what-is-javascript)
    - [Why is it called JavaScript?](#why-is-it-called-javascript)
    - [How do engines work?](#how-do-engines-work)
    - [What can in-browser JavaScript do?](#what-can-in-browser-javascript-do)
    - [What CAN’T in-browser JavaScript do?](#what-cant-in-browser-javascript-do)
    - [What makes JavaScript unique?](#what-makes-javascript-unique)
    - [Languages “over” JavaScript](#languages-over-javascript)
    - [Summary](#summary)
  - [Hello, world!](#hello-world)
    - [Modern markup](#modern-markup)
    - [External scripts](#external-scripts)
    - [Summary](#summary-1)
  - [Code structure](#code-structure)
    - [Statements](#statements)
    - [Semicolons](#semicolons)
    - [Comments](#comments)
    - [Use hotkeys!](#use-hotkeys)
  - [Use Strict](#use-strict)
    - [The modern mode, "use strict"](#the-modern-mode-use-strict)
- [Sources](#sources)


# Fundamentals 1

## An Introduction to JavaScript

### What is JavaScript?

JavaScript was initially created to “make web pages alive”.

The programs in this language are called scripts. They can be written right in a web page’s HTML and run automatically as the page loads.

Scripts are provided and executed as plain text. They don’t need special preparation or compilation to run.

### Why is it called JavaScript?

When JavaScript was created, it initially had another name: “LiveScript”. But Java was very popular at that time, so it was decided that positioning a new language as a “younger brother” of Java would help.

But as it evolved, JavaScript became a fully independent language with its own specification called ECMAScript, and now it has no relation to Java at all.

Today, JavaScript can execute not only in the browser, but also on the server, or actually on any device that has a special program called the JavaScript engine.

The browser has an embedded engine sometimes called a “JavaScript virtual machine”.

Different engines have different “codenames”. For example:

V8 – in Chrome and Opera.
SpiderMonkey – in Firefox.
…There are other codenames like “Chakra” for IE, “ChakraCore” for Microsoft Edge, “Nitro” and “SquirrelFish” for Safari, etc.

The terms above are good to remember because they are used in developer articles on the internet. We’ll use them too. For instance, if “a feature X is supported by V8”, then it probably works in Chrome and Opera.

### How do engines work?

Engines are complicated. But the basics are easy.

The engine (embedded if it’s a browser) reads (“parses”) the script.
Then it converts (“compiles”) the script to the machine language.
And then the machine code runs, pretty fast.
The engine applies optimizations at each step of the process. It even watches the compiled script as it runs, analyzes the data that flows through it, and further optimizes the machine code based on that knowledge.

### What can in-browser JavaScript do?

Modern JavaScript is a “safe” programming language. It does not provide low-level access to memory or CPU, because it was initially created for browsers which do not require it.

JavaScript’s capabilities greatly depend on the environment it’s running in. For instance, Node.js supports functions that allow JavaScript to read/write arbitrary files, perform network requests, etc.

manipulation

In-browser JavaScript can do everything related to webpage manipulation, interaction with the user, and the webserver.

For instance, in-browser JavaScript is able to:

Add new HTML to the page, change the existing content, modify styles.
React to user actions, run on mouse clicks, pointer movements, key presses.
Send requests over the network to remote servers, download and upload files (so-called AJAX and COMET technologies).
Get and set cookies, ask questions to the visitor, show messages.
Remember the data on the client-side (“local storage”).

### What CAN’T in-browser JavaScript do?

JavaScript’s abilities in the browser are limited for the sake of the user’s safety. The aim is to prevent an evil webpage from accessing private information or harming the user’s data.

Examples of such restrictions include:

JavaScript on a webpage may not read/write arbitrary files on the hard disk, copy them or execute programs. It has no direct access to OS functions.

Modern browsers allow it to work with files, but the access is limited and only provided if the user does certain actions, like “dropping” a file into a browser window or selecting it via an <input> tag.

There are ways to interact with camera/microphone and other devices, but they require a user’s explicit permission. So a JavaScript-enabled page may not sneakily enable a web-camera, observe the surroundings and send the information to the NSA.

Different tabs/windows generally do not know about each other. Sometimes they do, for example when one window uses JavaScript to open the other one. But even in this case, JavaScript from one page may not access the other if they come from different sites (from a different domain, protocol or port).

This is called the “Same Origin Policy”. To work around that, both pages must agree for data exchange and contain a special JavaScript code that handles it. We’ll cover that in the tutorial.

This limitation is, again, for the user’s safety. A page from http://anysite.com which a user has opened must not be able to access another browser tab with the URL http://gmail.com and steal information from there.

Such limits do not exist if JavaScript is used outside of the browser, for example on a server. Modern browsers also allow plugin/extensions which may ask for extended permissions.

### What makes JavaScript unique?

There are at least three great things about JavaScript:

- Full integration with HTML/CSS.
- Simple things are done simply.
- Support by all major browsers and enabled by default.

JavaScript is the only browser technology that combines these three things.

That’s what makes JavaScript unique. That’s why it’s the most widespread tool for creating browser interfaces.

That said, JavaScript also allows to create servers, mobile applications, etc.

### Languages “over” JavaScript 

So recently a plethora of new languages appeared, which are transpiled (converted) to JavaScript before they run in the browser.

Modern tools make the transpilation very fast and transparent, actually allowing developers to code in another language and auto-converting it “under the hood”.

Examples of such languages:

CoffeeScript is a “syntactic sugar” for JavaScript. It introduces shorter syntax, allowing us to write clearer and more precise code. Usually, Ruby devs like it.

TypeScript is concentrated on adding “strict data typing” to simplify the development and support of complex systems. It is developed by Microsoft.

Flow also adds data typing, but in a different way. Developed by Facebook.

Dart is a standalone language that has its own engine that runs in non-browser environments (like mobile apps), but also can be transpiled to JavaScript. Developed by Google.

Brython is a Python transpiler to JavaScript that enables the writing of applications in pure Python without JavaScript.

Kotlin is a modern, concise and safe programming language that can target the browser or Node.

There are more. Of course, even if we use one of transpiled languages, we should also know JavaScript to really understand what we’re doing.

### Summary

JavaScript was initially created as a browser-only language, but it is now used in many other environments as well.
Today, JavaScript has a unique position as the most widely-adopted browser language with full integration in HTML/CSS.
There are many languages that get “transpiled” to JavaScript and provide certain features. It is recommended to take a look at them, at least briefly, after mastering JavaScript.

## Hello, world!

This part of the tutorial is about core JavaScript, the language itself.

But we need a working environment to run our scripts and, since this book is online, the browser is a good choice. We’ll keep the amount of browser-specific commands (like alert) to a minimum so that you don’t spend time on them if you plan to concentrate on another environment (like Node.js). We’ll focus on JavaScript in the browser in the next part of the tutorial.

So first, let’s see how we attach a script to a webpage. For server-side environments (like Node.js), you can execute the script with a command like "node my.js".

The “script” tag
JavaScript programs can be inserted almost anywhere into an HTML document using the <script> tag.

For instance:

```html
<!DOCTYPE HTML>
<html>

<body>

  <p>Before the script...</p>

  <script>
    alert( 'Hello, world!' );
  </script>

  <p>...After the script.</p>

</body>

</html>

```

The <script> tag contains JavaScript code which is automatically executed when the browser processes the tag.

### Modern markup

The <script> tag has a few attributes that are rarely used nowadays but can still be found in old code:

The type attribute: <script type=…>

The old HTML standard, HTML4, required a script to have a type. Usually it was type="text/javascript". It’s not required anymore. Also, the modern HTML standard totally changed the meaning of this attribute. Now, it can be used for JavaScript modules. But that’s an advanced topic, we’ll talk about modules in another part of the tutorial.

The language attribute: <script language=…>
This attribute was meant to show the language of the script. This attribute no longer makes sense because JavaScript is the default language. There is no need to use it.

### External scripts

If we have a lot of JavaScript code, we can put it into a separate file.

Script files are attached to HTML with the src attribute:

```html
<script src="/path/to/script.js"></script>

```

Here, /path/to/script.js is an absolute path to the script from the site root. One can also provide a relative path from the current page. For instance, src="script.js" would mean a file "script.js" in the current folder.

We can give a full URL as well. For instance:

```html
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.js"></script>

```

To attach several scripts, use multiple tags:

```html
<script src="/js/script1.js"></script>
<script src="/js/script2.js"></script>

```

Please note:

As a rule, only the simplest scripts are put into HTML. More complex ones reside in separate files.

The benefit of a separate file is that the browser will download it and store it in its cache.

Other pages that reference the same script will take it from the cache instead of downloading it, so the file is actually downloaded only once.

That reduces traffic and makes pages faster.

If src is set, the script content is ignored.

A single <script> tag can’t have both the src attribute and code inside.

This won’t work:


```html
<script src="file.js">
  alert(1); // the content is ignored, because src is set
</script>

```

We must choose either an external <script src="…"> or a regular <script> with code.

The example above can be split into two scripts to work:

```html
<script src="file.js"></script>
<script>
  alert(1);
</script>

```

### Summary

We can use a <script> tag to add JavaScript code to a page.

The type and language attributes are not required.

A script in an external file can be inserted with `<script src="path/to/script.js"></script>` .

## Code structure

The first thing we’ll study is the building blocks of code.

### Statements

Statements are syntax constructs and commands that perform actions.

We’ve already seen a statement, alert('Hello, world!'), which shows the message “Hello, world!”.

We can have as many statements in our code as we want. Statements can be separated with a semicolon.

For example, here we split “Hello World” into two alerts:

```js
alert('Hello'); alert('World');
```

Usually, statements are written on separate lines to make the code more readable:

```js
alert('Hello');
alert('World');

```

### Semicolons

A semicolon may be omitted in most cases when a line break exists.

This would also work:

alert('Hello')
alert('World')

Here, JavaScript interprets the line break as an “implicit” semicolon. This is called an automatic semicolon insertion.

In most cases, a newline implies a semicolon. But “in most cases” does not mean “always”!

There are cases when a newline does not mean a semicolon. For example:

```js
alert(3 +
1
+ 2);

```

The code outputs 6 because JavaScript does not insert semicolons here. It is intuitively obvious that if the line ends with a plus "+", then it is an “incomplete expression”, so the semicolon is not required. And in this case that works as intended.

But there are situations where JavaScript “fails” to assume a semicolon where it is really needed.

Errors which occur in such cases are quite hard to find and fix.

We recommend putting semicolons between statements even if they are separated by newlines. This rule is widely adopted by the community. Let’s note once again – it is possible to leave out semicolons most of the time. But it’s safer – especially for a beginner – to use them.

### Comments

As time goes on, programs become more and more complex. It becomes necessary to add comments which describe what the code does and why.

Comments can be put into any place of a script. They don’t affect its execution because the engine simply ignores them.

One-line comments start with two forward slash characters //.

The rest of the line is a comment. It may occupy a full line of its own or follow a statement.

Like here:

// This comment occupies a line of its own
alert('Hello');

alert('World'); // This comment follows the statement

Multiline comments start with a forward slash and an asterisk /* and end with an asterisk and a forward slash */.

Like this:

/* An example with two messages.
This is a multiline comment.
*/
alert('Hello');
alert('World');

The content of comments is ignored, so if we put code inside /* … */, it won’t execute.

Sometimes it can be handy to temporarily disable a part of code:

/* Commenting out the code
alert('Hello');
*/
alert('World');

### Use hotkeys!

In most editors, a line of code can be commented out by pressing the Ctrl+/ hotkey for a single-line comment and something like Ctrl+Shift+/ – for multiline comments (select a piece of code and press the hotkey). For Mac, try Cmd instead of Ctrl and Option instead of Shift.

Nested comments are not supported!
There may not be /*...*/ inside another /*...*/.

Such code will die with an error:

/*
  /* nested comment ?!? */
*/
alert( 'World' );

Please, don’t hesitate to comment your code.

Comments increase the overall code footprint, but that’s not a problem at all. There are many tools which minify code before publishing to a production server. They remove comments, so they don’t appear in the working scripts. Therefore, comments do not have negative effects on production at all.

Later in the tutorial there will be a chapter Code quality that also explains how to write better comments.  https://javascript.info/code-quality


## Use Strict

### The modern mode, "use strict"

For a long time, JavaScript evolved without compatibility issues. New features were added to the language while old functionality didn’t change.

That had the benefit of never breaking existing code. But the downside was that any mistake or an imperfect decision made by JavaScript’s creators got stuck in the language forever.

This was the case until 2009 when ECMAScript 5 (ES5) appeared. It added new features to the language and modified some of the existing ones. To keep the old code working, most such modifications are off by default. You need to explicitly enable them with a special directive: "use strict".

“use strict”
The directive looks like a string: "use strict" or 'use strict'. When it is located at the top of a script, the whole script works the “modern” way.

For example:

"use strict";

// this code works the modern way
...

Quite soon we’re going to learn functions (a way to group commands), so let’s note in advance that "use strict" can be put at the beginning of a function. Doing that enables strict mode in that function only. But usually people use it for the whole script.

Ensure that “use strict” is at the top
Please make sure that "use strict" is at the top of your scripts, otherwise strict mode may not be enabled.

Strict mode isn’t enabled here:

alert("some code");
// "use strict" below is ignored--it must be at the top

"use strict";

// strict mode is not activated

Only comments may appear above "use strict".

There’s no way to cancel use strict
There is no directive like "no use strict" that reverts the engine to old behavior.

Once we enter strict mode, there’s no going back.

Browser console
When you use a developer console to run code, please note that it doesn’t use strict by default.

Sometimes, when use strict makes a difference, you’ll get incorrect results.

So, how to actually use strict in the console?

First, you can try to press Shift+Enter to input multiple lines, and put use strict on top, like this:

'use strict'; <Shift+Enter for a newline>
//  ...your code
<Enter to run>

It works in most browsers, namely Firefox and Chrome.

If it doesn’t, e.g. in an old browser, there’s an ugly, but reliable way to ensure use strict. Put it inside this kind of wrapper:

(function() {
  'use strict';

  // ...your code here...
})()

Should we “use strict”?

The question may sound obvious, but it’s not so.

One could recommend to start scripts with "use strict"… But you know what’s cool?

Modern JavaScript supports “classes” and “modules” – advanced language structures (we’ll surely get to them), that enable use strict automatically. So we don’t need to add the "use strict" directive, if we use them.

So, for now "use strict"; is a welcome guest at the top of your scripts. Later, when your code is all in classes and modules, you may omit it.

As of now, we’ve got to know about use strict in general.

# Sources

* https://javascript.info/intro




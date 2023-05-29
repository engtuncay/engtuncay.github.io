
Source : https://www.w3schools.com/js/js_async.asp

# JavaScript Async

"async and await make promises easier to write"

async makes a function return a Promise

await makes a function wait for a Promise

*Async Syntax*

The keyword async before a function makes the function return a promise:

Example

```js
async function myFunction() {
  return "Hello";
}

```
Is the same as:

```js
function myFunction() {
  return Promise.resolve("Hello");
}

```
Here is how to use the Promise:

```js
myFunction().then(
  function(value) { /* code if successful */ },
  function(error) { /* code if some error */ }
);

```

Example

```js
async function myFunction() {
  return "Hello";
}
myFunction().then(
  function(value) {myDisplayer(value);},
  function(error) {myDisplayer(error);}
);

```

Or simpler, since you expect a normal value (a normal response, not an error):

Example

```js
async function myFunction() {
  return "Hello";
}
myFunction().then(
  function(value) {myDisplayer(value);}
);

```

Await Syntax

The await keyword can only be used *inside an async function*.

The await keyword makes the function pause the execution and wait for a resolved promise before it continues:

```js
let value = await promise;

```

Example

Let's go slowly and learn how to use it.

Basic Syntax

```js
async function myDisplay() {
  let myPromise = new Promise(function(resolve, reject) {
    resolve("I love You !!");
  });
  document.getElementById("demo").innerHTML = await myPromise;
}

myDisplay();

```

```html
<h2>JavaScript async / await</h2>

<h1 id="demo"></h1>
<h1 id="demo2"></h1>

<script>
async function myDisplay() {
  let myPromise = new Promise(function(resolve) {
  	setTimeout(()=>{
    	resolve("I love You !!");
    },3000);
    
  });
  
  document.getElementById("demo").innerHTML = await myPromise;
  // myPromise resolve etmeden sonraki satıra geçmez bekler.
  document.getElementById("demo2").innerHTML = "işlem bitti.";
  
}

myDisplay();
</script>
```

The two arguments (resolve and reject) are pre-defined by JavaScript.

We will not create them, but call one of them when the executor function is ready.

Very often we will not need a reject function.

Example without reject

```js
async function myDisplay() {
  let myPromise = new Promise(function(resolve) {
    resolve("I love You !!");
  });
  document.getElementById("demo").innerHTML = await myPromise;
}

myDisplay();

```

Waiting for a Timeout

```js
async function myDisplay() {
  let myPromise = new Promise(function(resolve) {
    setTimeout(function() {resolve("I love You !!");}, 3000);
  });
  document.getElementById("demo").innerHTML = await myPromise;
}

myDisplay();

```

Waiting for a File

```js
async function getFile() {
  let myPromise = new Promise(function(resolve) {
    let req = new XMLHttpRequest();
    req.open('GET', "mycar.html");
    req.onload = function() {
      if (req.status == 200) {
        resolve(req.response);
      } else {
        resolve("File not Found");
      }
    };
    req.send();
  });
  document.getElementById("demo").innerHTML = await myPromise;
}

getFile();

```

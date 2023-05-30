
# Asynchronous JavaScript

"I will finish later!"

Functions running in parallel with other functions are called asynchronous

A good example is JavaScript setTimeout()

Asynchronous JavaScript
The examples used in the previous chapter, was very simplified.

The purpose of the examples was to demonstrate the syntax of callback functions:

Example
function myDisplayer(something) {
  document.getElementById("demo").innerHTML = something;
}

function myCalculator(num1, num2, myCallback) {
  let sum = num1 + num2;
  myCallback(sum);
}

myCalculator(5, 5, myDisplayer);

In the example above, myDisplayer is the name of a function.

It is passed to myCalculator() as an argument.

In the real world, callbacks are most often used with asynchronous functions.

A typical example is JavaScript setTimeout().

Waiting for a Timeout
When using the JavaScript function setTimeout(), you can specify a callback function to be executed on time-out:

Example
setTimeout(myFunction, 3000);

function myFunction() {
  document.getElementById("demo").innerHTML = "I love You !!";
}

In the example above, myFunction is used as a callback.

myFunction is passed to setTimeout() as an argument.

3000 is the number of milliseconds before time-out, so myFunction() will be called after 3 seconds.

Note
When you pass a function as an argument, remember not to use parenthesis.

Right: setTimeout(myFunction, 3000);

Wrong: setTimeout(myFunction(), 3000);

Instead of passing the name of a function as an argument to another function, you can always pass a whole function instead:

Example
setTimeout(function() { myFunction("I love You !!!"); }, 3000);

function myFunction(value) {
  document.getElementById("demo").innerHTML = value;
}

In the example above, function(){ myFunction("I love You !!!"); } is used as a callback. It is a complete function. The complete function is passed to setTimeout() as an argument.

3000 is the number of milliseconds before time-out, so myFunction() will be called after 3 seconds.

Waiting for Intervals:
When using the JavaScript function setInterval(), you can specify a callback function to be executed for each interval:

Example
setInterval(myFunction, 1000);

function myFunction() {
  let d = new Date();
  document.getElementById("demo").innerHTML=
  d.getHours() + ":" +
  d.getMinutes() + ":" +
  d.getSeconds();
}

In the example above, myFunction is used as a callback.

myFunction is passed to setInterval() as an argument.

1000 is the number of milliseconds between intervals, so myFunction() will be called every second.

Callback Alternatives
With asynchronous programming, JavaScript programs can start long-running tasks, and continue running other tasks in paralell.

But, asynchronus programmes are difficult to write and difficult to debug.

Because of this, most modern asynchronous JavaScript methods don't use callbacks. Instead, in JavaScript, asynchronous programming is solved using Promises instead.

Note
You will learn about promises in the next chapter of this tutorial.

Source : https://www.javascripttutorial.net/es6/javascript-promises/

(some parts may be modified or removed)

[Back](../readme.md)

---

# Contents

- [Contents](#contents)
- [Promises](#promises)
  - [Creating a promise](#creating-a-promise)
  - [Consuming a Promise: then, catch, finally](#consuming-a-promise-then-catch-finally)
  - [2) The catch() method](#2-the-catch-method)
  - [3) The finally() method](#3-the-finally-method)
- [Promise Chaining](#promise-chaining)
- [Promise.all()](#promiseall)
- [Promise.race()](#promiserace)
- [Promise.any()](#promiseany)

[🔝](#contents)

# Promises

In practice, the getUsers() function may access a database or call an API to get the user list. Therefore, the getUsers() function will have a **delay**

The challenge is how to access the users returned from the getUsers() function after one second. One classical approach is to use the **callback**

➖ Using callbacks to deal with an asynchronous operation

The following example adds a callback argument to the getUsers() and findUser() functions:

```js
function getUsers(callback) {
  setTimeout(() => {
    callback([
      { username: 'john', email: 'john@test.com' },
      { username: 'jane', email: 'jane@test.com' },
    ]);
  }, 1000);
}

function findUser(username, callback) {
  getUsers((users) => {
    const user = users.find((user) => user.username === username);
    callback(user);
  });
}

findUser('john', console.log);

// Output:
// 
// { username: 'john', email: 'john@test.com' }

```

In this example, the getUsers() function accepts a callback function as an argument and invokes it with the users array inside the setTimeout() function. Also, the findUser() function accepts a callback function that processes the matched user.

The callback approach works very well. However, it makes the code more difficult to follow. Also, it adds complexity to the functions with callback arguments.

If the number of functions grows, you may end up with the `callback hell` problem. To resolve this, JavaScript comes up with the concept of promises.

➖ Understanding JavaScript Promises

By definition, a promise is `an object that encapsulates the result of an asynchronous operation`.

A promise object has a state that can be one of the following:

- Pending
- Fulfilled with a value
- Rejected for a reason

In the beginning, the state of a promise is pending, indicating that the asynchronous operation is in progress. Depending on the result of the asynchronous operation, the state changes to either fulfilled or rejected.

The fulfilled state indicates that the asynchronous operation was completed successfully:

➖ JavaScript Promise Fulfilled

The rejected state indicates that the asynchronous operation failed.

## Creating a promise

To create a promise object, you use the Promise() constructor:

```js
const promise = new Promise((resolve, reject) => {
  // contain an operation
  // ...

  // return the state
  if (success) {
    resolve(value);
  } else {
    reject(error);
  }
});

```

The promise constructor accepts `a callback function (with two arguments)` that typically performs an asynchronous operation. This function is often referred to as `an executor`.

In turn, the executor accepts two callback functions (two arguments) with the name `resolve and reject`.

Note that the callback functions passed into the executor are resolve and reject by convention only.

If the asynchronous operation completes successfully, the executor will call the resolve() function to `change the state of the promise from pending to fulfilled with a value`.

In case of an error, the executor will call the reject() function to change the state of the promise from pending to rejected with the error reason.

Once a promise reaches either a fulfilled or rejected state, it stays in that state and can’t go to another state.

In other words, a promise cannot go from the fulfilled state to the rejected state and vice versa. Also, it cannot go back from the fulfilled or rejected state to the pending state.

Once a new Promise object is created, its state is pending. If a promise reaches fulfilled or rejected state, it is resolved.

📝 Note that you will rarely create promise objects in practice. Instead, you will consume promises provided by libraries.

## Consuming a Promise: then, catch, finally

1) then() method

To get the value of a promise when it’s fulfilled, you call the then() method of the promise object. The following shows the syntax of the then() method:

```js
promise.then(onFulfilled,onRejected);

```

The then() method accepts two callback functions: onFulfilled and onRejected.

The then() method calls the onFulfilled() with a value, if the promise is fulfilled or the onRejected() with an error if the promise is rejected.

Note that both onFulfilled and onRejected arguments are optional.

The following example shows how to use then() method of the Promise object returned by the getUsers() function:

```js
function getUsers() {
  
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      // resolve is like emit,trigger function, but for errors, reject function is used
      resolve([
        { username: 'john', email: 'john@test.com' },
        { username: 'jane', email: 'jane@test.com' },
      ]);
    }, 1000);
  });
}

const promise = getUsers();

promise.then((users) => {
  console.log(users);
});

```

In this example:

- First, call the getUsers() function to get a promise object (promise body (executor) is executed).
- Second, define a then operation (resolve) when the promise is fulfilled and output the user list to the console.

Because the getUsers() function returns a promise object, you can chain the function call with the then() method like this:

```js
// getUsers() function
//...

getUsers().then((users) => {
  console.log(users);
});

```

➖ reject usage

In this example, the getUsers() function always succeeds. To simulate the error, we can use a success flag like the following:

```js
let success = true;

function getUsers() {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      if (success) {
        resolve([
          { username: 'john', email: 'john@test.com' },
          { username: 'jane', email: 'jane@test.com' },
        ]);
      } else {
        reject('Failed to the user list');
      }
    }, 1000);
  });
}

function onFulfilled(users) {
  console.log(users);
}
function onRejected(error) {
  console.log(error);
}

const promise = getUsers();
promise.then(onFulfilled, onRejected);

```

How it works.

- First, define the success variable and initialize its value to true.

- If the success is true, the promise in the getUsers() function is fulfilled with a user list. Otherwise, it is rejected with an error message.

- Second, define the onFulfilled and onRejected functions.

- Third, get the promise from the getUsers() function and call the then() method with the onFulfilled and onRejected functions.

The following shows how to use the arrow functions as the arguments of the then() method:

```js
// getUsers() function
// ...

const promise = getUsers();
promise.then(
  (users) => console.log,
  (error) => console.log
);

```

## 2) The catch() method

If you want to get the error only when the state of the promise is rejected, you can use the catch() method of the Promise object:

```js
promise.catch(onRejected);

```

Internally, the catch() method invokes the then(undefined, onRejected) method.

The following example changes the success flag to false to simulate the error scenario:

```js
let success = false;

function getUsers() {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      if (success) {
        resolve([
          { username: 'john', email: 'john@test.com' },
          { username: 'jane', email: 'jane@test.com' },
        ]);
      } else {
        reject('Failed to the user list');
      }
    }, 1000);
  });
}

const promise = getUsers();

promise.catch((error) => {
  console.log(error);
});

```

##  3) The finally() method

Sometimes, you want to execute the same piece of code whether the promise is fulfilled or rejected. For example:

```js
const render = () => {
  //...
};

getUsers()
  .then((users) => {
    console.log(users);
    render();
  })
  .catch((error) => {
    console.log(error);
    render();
  });

```

As you can see, the render() function call is duplicated in both then() and catch() methods.

To remove this duplicate and execute the render() whether the promise is fulfilled or rejected, you use the finally() method, like this:

```js
const render = () => {
  //...
};

getUsers()
  .then((users) => {
    console.log(users);
  })
  .catch((error) => {
    console.log(error);
  })
  .finally(() => {
    render();
  });

```

A practical JavaScript Promise example
The following example shows how to load a JSON file from the server and display its contents on a webpage.

Suppose you have the following JSON file:

```js
https://www.javascripttutorial.net/sample/promise/api.json

```

with the following contents:

```js
{
    "message": "JavaScript Promise Demo"
}

```

The following shows the HTML page that contains a button. When you click the button, the page loads data from the JSON file and shows the message:

```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>JavaScript Promise Demo</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div id="container">
        <div id="message"></div>
        <button id="btnGet">Get Message</button>
    </div>
    <script src="js/promise-demo.js">
    </script>
</body>
</html>

```

The following shows the promise-demo.js file:

```js
function load(url) {
  return new Promise(function (resolve, reject) {
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (this.readyState === 4 && this.status == 200) {
        resolve(this.response);
      } else {
        reject(this.status);
      }
    };
    request.open('GET', url, true);
    request.send();
  });
}

const url = 'https://www.javascripttutorial.net/sample/promise/api.json';
const btn = document.querySelector('#btnGet');
const msg = document.querySelector('#message');

btn.addEventListener('click', () => {
  load(URL)
    .then((response) => {
      const result = JSON.parse(response);
      msg.innerHTML = result.message;
    })
    .catch((error) => {
      msg.innerHTML = `Error getting the message, HTTP status: ${error}`;
    });
});

```

How it works.

First, define the load() function that uses the XMLHttpRequest object to load the JSON file from the server:

```js
function load(url) {
  return new Promise(function (resolve, reject) {
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (this.readyState === 4 && this.status == 200) {
        resolve(this.response);
      } else {
        reject(this.status);
      }
    };
    request.open('GET', url, true);
    request.send();
  });
}

```

In the executor, we call resolve() function with the Response if the HTTP status code is 200. Otherwise, we invoke the reject() function with the HTTP status code.

Second, register the button click event listener, and call the then() method of the promise object. If the load is successful, then we show the message returned from the server. Otherwise, we show the error message with the HTTP status code.

```js
const url = 'https://www.javascripttutorial.net/sample/promise/api.json';
const btn = document.querySelector('#btnGet');
const msg = document.querySelector('#message');

btn.addEventListener('click', () => {
  load(URL)
    .then((response) => {
      const result = JSON.parse(response);
      msg.innerHTML = result.message;
    })
    .catch((error) => {
      msg.innerHTML = `Error getting the message, HTTP status: ${error}`;
    });
});

```

➖ Summary

- A promise is an object that encapsulates the result of an asynchronous operation.
- A promise starts in the pending state and ends in either a fulfilled state or a rejected state.
- Use then() method to schedule a callback to be executed when the promise is fulfilled, and catch() method to schedule a callback to be invoked when the promise is rejected.
- Place the code that you want to execute in the finally() method whether the promise is fulfilled or rejected.

[🔝](#contents)

# Promise Chaining

Sometimes, you want to execute two or more related asynchronous operations, where the next operation starts with the result from the previous one. For example:

(zincirleme operasyonlar)

First, create a new promise that resolves to the number 10 after 3 seconds:

```js
let p = new Promise((resolve, reject) => {
    setTimeout(() => {
        resolve(10);
    }, 3 * 100);
});

```
Note that the setTimeout() function simulates an asynchronous operation.

Then, invoke the then() method of the promise:

```js
p.then((result) => {
    console.log(result);
    return result * 2;
});

```

The callback passed to the then() method executes once the promise is resolved. In the callback, we show the result of the promise and return a new value multiplied by two (result*2).

Because the then() method returns a new Promise with a value resolved to a value, you can call the then() method on the return Promise like this:

```js
let p = new Promise((resolve, reject) => {
    setTimeout(() => {
        resolve(10);
    }, 3 * 100);
});

p.then((result) => {
    console.log(result);
    return result * 2;
}).then((result) => {
    console.log(result);
    return result * 3;
});

// Output:
// 
// 10
// 20
```

In this example, the return value in the first then() method is passed to the second then() method. You can keep calling the then() method successively as follows:

```js
let p = new Promise((resolve, reject) => {
    setTimeout(() => {
        resolve(10);
    }, 3 * 100);
});

p.then((result) => {
    console.log(result); // 10
    return result * 2;
}).then((result) => {
    console.log(result); // 20
    return result * 3;
}).then((result) => {
    console.log(result); // 60
    return result * 4;
});

// Output:
// 
// 10
// 20
// 60

```

The way we call the then() method like this is often referred to as `a promise chain`.

➖ Multiple handlers for a promise

When you call the then() method multiple times on a promise, it is not the promise chaining. For example:

```js
let p = new Promise((resolve, reject) => {
    setTimeout(() => {
        resolve(10);
    }, 3 * 100);
});

p.then((result) => {
    console.log(result); // 10
    return result * 2;
})

p.then((result) => {
    console.log(result); // 10
    return result * 3;
})

p.then((result) => {
    console.log(result); // 10
    return result * 4;
});

// Output:
// 
// 10
// 10
// 10

```

In this example, we have multiple handlers for one promise. These handlers have no relationships. Also, they execute independently and don’t pass the result from one to another like the promise chain above.

In practice, you will rarely use multiple handlers for one promise.

➖ Returning a Promise ❗

When you return a value in the then() method, the then() method returns `a new Promise that immediately resolves to the return value`.

Also, you can return a new promise in the then() method, like this:

```js
let p = new Promise((resolve, reject) => {
    setTimeout(() => {
        resolve(10);
    }, 3 * 100);
});

p.then((result) => {
    console.log(result);
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            resolve(result * 2);
        }, 3 * 1000);
    });
}).then((result) => {
    console.log(result);
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            resolve(result * 3);
        }, 3 * 1000);
    });
}).then(result => console.log(result));

// Output:
// 
// 10
// 20
// 60

```

This example shows 10, 20, and 60 after every 3 seconds. This code pattern allows you to execute some tasks in sequence.

The following modified the above example:

```js
function generateNumber(num) {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      resolve(num);
    }, 3 * 1000);
  });
}

generateNumber(10)
  .then((result) => {
    console.log(result);
    return generateNumber(result * 2);
  })
  .then((result) => {
    console.log(result);
    return generateNumber(result * 3);
  })
  .then((result) => console.log(result));

```

➖ Promise chaining syntax

Sometimes, you have multiple asynchronous tasks you want to execute in sequence. In addition, you need to pass the result of the previous step to the next one. In this case, you can use the following syntax:

```js
step1()
    .then(result => step2(result))
    .then(result => step3(result))
    ...

```

If you need to pass the result of the previous task to the next one without passing the result, you use this syntax:

```js
step1()
    .then(step2)
    .then(step3)
    ...

```

Suppose that you want to perform the following asynchronous operations in sequence:

- First, get the user from the database.
- Second, get the services of the selected user.
- Third, calculate the service cost from the user’s services.

The following functions illustrate the three asynchronous operations:

```js
function getUser(userId) {
    return new Promise((resolve, reject) => {
        console.log('Get the user from the database.');
        setTimeout(() => {
            resolve({
                userId: userId,
                username: 'admin'
            });
        }, 1000);
    })
}

function getServices(user) {
    return new Promise((resolve, reject) => {
        console.log(`Get the services of ${user.username} from the API.`);
        setTimeout(() => {
            resolve(['Email', 'VPN', 'CDN']);
        }, 3 * 1000);
    });
}

function getServiceCost(services) {
    return new Promise((resolve, reject) => {
        console.log(`Calculate the service cost of ${services}.`);
        setTimeout(() => {
            resolve(services.length * 100);
        }, 2 * 1000);
    });
}

```

The following uses the promises to serialize the sequences:

```js
getUser(100)
    .then(getServices)
    .then(getServiceCost)
    .then(console.log);

// Output
// 

```

- Get the user from the database.
- Get the services of admin from the API.
- Calculate the service cost of Email,VPN,CDN.

300

Code language: JavaScript (javascript)

📝 Note that ES2017 introduced the async/await that helps you write code that is cleaner than using the promise chaining technique.

[🔝](#contents)

# Promise.all()

The `Promise.all()` static method takes an iterable of promises:

```js
Promise.all(iterable);

```

The `Promise.all()` method returns a single promise that resolves when all (❗) the input promises have been resolved. The returned promise resolves to an array of the results of the input promises:

In other words, the Promise.all() waits (❗) for all the input promises to resolve and returns a new promise that resolves to an array containing the results of the input promises.

If one of the input promises is rejected, the Promise.all() method immediately (❗) returns a promise that is rejected with an error of the first rejected promise. the Promise.all() doesn’t care about other input promises, whether they will be resolved or rejected (after a rejected promise is realized).

➖ JavaScript Promise.all Rejected

In practice, the Promise.all() is useful to aggregate the results from `multiple asynchronous operations`.

🧲 JavaScript Promise.all() method examples

Let’s take some examples to understand how the Promise.all() method works.

➖ 1) Resolved promises example

The following promises resolve to 10, 20, and 30 after 1, 2, and 3 seconds. We use the setTimeout() to simulate the asynchronous operations:

```js
const p1 = new Promise((resolve, reject) => {
  setTimeout(() => {
    console.log('The first promise has resolved');
    resolve(10);
  }, 1 * 1000);
});
const p2 = new Promise((resolve, reject) => {
  setTimeout(() => {
    console.log('The second promise has resolved');
    resolve(20);
  }, 2 * 1000);
});
const p3 = new Promise((resolve, reject) => {
  setTimeout(() => {
    console.log('The third promise has resolved');
    resolve(30);
  }, 3 * 1000);
});

Promise.all([p1, p2, p3]).then((results) => {
  const total = results.reduce((p, c) => p + c);

  console.log(`Results: ${results}`);
  console.log(`Total: ${total}`);
});

//Output
// 
// The first promise has resolved
// The second promise has resolved
// The third promise has resolved
// Results: 10,20,30
// Total: 60

```

When all promises have been resolved, the values from these promises are passed into the callback of the then() method as an array.

Inside the callback, we use the Array’s reduce() method to calculate the total value and use the console.log to display the array of values as well as the total.

🧲 1) Rejected promises example

The Promise.all() returns a Promise that is rejected if any of the input promises are rejected.

```js
const p1 = new Promise((resolve, reject) => {
    setTimeout(() => {
        console.log('The first promise has resolved');
        resolve(10);
    }, 1 * 1000);

});
const p2 = new Promise((resolve, reject) => {
    setTimeout(() => {
        console.log('The second promise has rejected');
        reject('Failed');
    }, 2 * 1000);
});

const p3 = new Promise((resolve, reject) => {
    setTimeout(() => {
        console.log('The third promise has resolved');
        resolve(30);
    }, 3 * 1000);
});


Promise.all([p1, p2, p3])
    .then(console.log) // never execute
    .catch(console.log);

// Output:
// 
// The first promise has resolved
// The second promise has rejected
// Failed
// The third promise has resolved

```

In this example, we have three promises: the first one is resolved after 1 second, the second is rejected after 2 seconds, and the third one is resolved after 3 seconds.

As a result, the returned promise is rejected because the second promise is rejected. The catch() method is executed to display the reason for the rejected promise.

(URREV ??? üçüncü promise çalışmaya devam etmiş kesmemiş ❗)

Summary

- The Promise.all() method accepts a list of promises and returns a new promise that resolves to an array of results of the input promises if all the input promises are resolved, or rejected with an error of the first rejected promise.

- Use the Promise.all() method to aggregate results from `multiple asynchronous operations`.

[🔝](#contents)

# Promise.race()

TBC - 20251117 - 1155 

The `Promise.race()` static method accepts a list of promises as an iterable object and returns a new promise that fulfills or rejects as soon as there is one promise that fulfills or rejects, with the value or reason from that promise.

Here’s the syntax of the Promise.race() method:

```js
Promise.race(iterable)

```

In this syntax, the iterable is an iterable object that contains a `list` of promises . (Promise.race([promise1, promise2]))

The name of Promise.race() implies that all the promises race against each other with a single winner (❗), either resolved or rejected.

📝 See diagrams from source

🧲 JavaScript Promise.race() examples

Let’s take some examples of using the Promise.race() static method.

➖ 1) Simple JavaScript Promise.race() examples

The following creates two promises: one resolves in 1 second and the other resolves in 2 seconds. Because the first promise resolves faster than the second one, the Promise.race() resolves with the value from the first promise:

```js
const p1 = new Promise((resolve, reject) => {
    setTimeout(() => {
        console.log('The first promise has resolved');
        resolve(10);
    }, 1 * 1000);

});

const p2 = new Promise((resolve, reject) => {
    setTimeout(() => {
        console.log('The second promise has resolved');
        resolve(20);
    }, 2 * 1000);
});


Promise.race([p1, p2])
    .then(value => console.log(`Resolved: ${value}`))
    .catch(reason => console.log(`Rejected: ${reason}`));

// Output:
// 
// The first promise has resolved
// Resolved: 10
// The second promise has resolved

```

The following example creates two promises. The first promise resolves in 1 second while the second one rejects in 2 seconds. Because the first promise is faster than the second one, the returned promise resolves to the value of the first promise:

```js
const p1 = new Promise((resolve, reject) => {
    setTimeout(() => {
        console.log('The first promise has resolved');
        resolve(10);
    }, 1 * 1000);

});

const p2 = new Promise((resolve, reject) => {
    setTimeout(() => {
        console.log('The second promise has rejected');
        reject(20);
    }, 2 * 1000);
});


Promise.race([p1, p2])
    .then(value => console.log(`Resolved: ${value}`))
    .catch(reason => console.log(`Rejected: ${reason}`));

// Output
// 
// The first promise has resolved
// Resolved: 10

```

The second promise has rejected

Note that if the second promise was faster than the first one, the return promise would reject for the reason of the second promise.

➖ 1) Practical JavaScript Promise.race() example

Suppose you have to show a spinner if the data loading process from the server is taking longer than a number of seconds.

To do this, you can use the Promise.race() static method. If a timeout occurs, you show the loading indicator, otherwise, you show the message.

The following illustrates the HTML code:

```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>JavaScript Promise.race() Demo</title>
    <link href="css/promise-race.css" rel="stylesheet">
</head>

<body>
    <div id="container">
        <button id="btnGet">Get Message</button>
        <div id="message"></div>
        <div id="loader"></div>
    </div>
    <script src="js/promise-race.js"></script>
</body>
</html>

```

To create the loading indicator, we use the CSS animation feature. See the promise-race.css for more information. Technically speaking, if an element has the .loader class, it shows the loading indicator.

First, define a new function that loads data. It uses the setTimeout() to emulate an asynchronous operation:

```js
const DATA_LOAD_TIME = 5000;

function getData() {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            const message = 'Promise.race() Demo';
            resolve(message);
        }, DATA_LOAD_TIME);
    });
}

```
Code language: JavaScript (javascript)

Second, develop a function that shows some contents:

```js
function showContent(message) {
    document.querySelector('#message').textContent = message;
}

```

This function can also be used to set the message to blank.

Third, define the timeout() function that returns a promise. The promise will be rejected when a specified TIMEOUT is passed.

```js
const TIMEOUT = 500;

function timeout() {
    return new Promise((resolve, reject) => {
        setTimeout(() => reject(), TIMEOUT);
    });
}

```

Fourth, develop a couple of functions that show and hide the loading indicator:

```js
function showLoadingIndicator() {
    document.querySelector('#loader').className = 'loader';
}

function hideLoadingIndicator() {
    document.querySelector('#loader').className = '';
}

```

Fifth, attach a click event listener to the Get Message button. Inside the click handler, use the Promise.race() static method:

```js
// handle button click event
const btn = document.querySelector('#btnGet');

btn.addEventListener('click', () => {
    // reset UI if users click the 2nd, 3rd, ... time
    reset();
    
    // show content or loading indicator
    Promise.race([getData()
            .then(showContent)
            .then(hideLoadingIndicator), timeout()
        ])
        .catch(showLoadingIndicator);
});

```

We pass two promises to the Promise.race() method:

```js
Promise.race([getData()
            .then(showContent)
            .then(hideLoadingIndicator), timeout()
        ])
        .catch(showLoadingIndicator);

```

The first promise gets data from the server, shows the content, and hides the loading indicator. The second promise sets a timeout.

If the first promise takes more than 500 ms to settle, the catch() is called to show the loading indicator. Once the first promise resolves, it hides the loading indicator.

Finally, develop a reset() function that hides the message and loading indicator if the button is clicked for the second time.

```js
// reset UI
function reset() {
    hideLoadingIndicator();
    showContent('');
}

```

Put it all together.

```js
// after 0.5 seconds, if the getData() has not resolved, then show 
// the Loading indicator
const TIMEOUT = 500;
const DATA_LOAD_TIME = 5000;

function getData() {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            const message = 'Promise.race() Demo';
            resolve(message);
        }, DATA_LOAD_TIME);
    });
}

function showContent(message) {
    document.querySelector('#message').textContent = message;
}

function timeout() {
    return new Promise((resolve, reject) => {
        setTimeout(() => reject(), TIMEOUT);
    });
}

function showLoadingIndicator() {
    document.querySelector('#loader').className = 'loader';
}

function hideLoadingIndicator() {
    document.querySelector('#loader').className = '';
}


// handle button click event
const btn = document.querySelector('#btnGet');

btn.addEventListener('click', () => {
    // reset UI if users click the second time
    reset();

    // show content or loading indicator
    Promise.race([getData()
            .then(showContent)
            .then(hideLoadingIndicator), timeout()
        ])
        .catch(showLoadingIndicator);
});

// reset UI
function reset() {
    hideLoadingIndicator();
    showContent('');
}

```

Summary

- The Promise.race(iterable) method returns a new promise that fulfills or rejects as soon as one of the promises in an iterable fulfills or rejects, with the value or error from that promise.

[🔝](#contents)

# Promise.any()

If one of the promises in the iterable object (list) is fulfilled, the Promise.any() returns a single promise that resolves to a value which is the result of the fulfilled promise:

```js
Promise.any(iterable);

```

In this diagram:

The promise1 resolves to a value v1 at t1.
The promise2 resolves to a value v2 at t2.
The Promise.any() returns a promise that resolves to a value v1, which is the result of the promise1, at t1
The Promise.any() returns a promise that is fulfilled with any first fulfilled promise even if some promises in the iterable object are rejected:

In this diagram:

The promise1 is rejected with an error at t1.
The promise2 is fulfilled to value v2 at t2.
The Promise.any() returns the promise that resolves to a value v2 which is the result of the promise2. Note that the Promise.any() method ignores the rejected promise (promise1).
If all promises in the iterable object are rejected or if the iterable object is empty, the Promise.any() return a promise that is rejected with an AggregateError containing all the rejection reasons. The AggregateError is a subclass of Error.


In this diagram:

The promise1 is rejected for an error1 at t1.
The promise2 is rejected for an error2 at t2.
The Promise.any() returns a promise that is rejected at t2 with an AggregateError containing the error1 and error2 of all the rejected promises.
JavaScript Promise.any() examples
Let’s take some examples of using the Promise.any() method.

1) All promises fulfilled example
The following example demonstrates the Promise.any() method with all promises fulfilled:

const p1 = new Promise((resolve, reject) => {
  setTimeout(() => {
    console.log('Promise 1 fulfilled');
    resolve(1);
  }, 1000);
});

const p2 = new Promise((resolve, reject) => {
  setTimeout(() => {
    console.log('Promise 2 fulfilled');
    resolve(2);
  }, 2000);
});

const p = Promise.any([p1, p2]);
p.then((value) => {
  console.log('Returned Promise');
  console.log(value);
});
Code language: JavaScript (javascript)
Output:

Promise 1 fulfilled
Returned Promise
1
Promise 2 fulfilled
Code language: JavaScript (javascript)
How it works.

First, create a new promise p1 that will resolve to a value 1 after one second.
Second, create a new promise p2 that will resolve to a value 2 after two seconds.
Third, use the Promise.any() method that uses two promises p1 and p2. The Promise.any() returns a promise p that will resolve to the value 1 of the first fulfilled promise (p1) after one second.
2) One promise rejected example
The following example uses the Promise.any() method with a list of promises that have a rejected promise:

const p1 = new Promise((resolve, reject) => {
  setTimeout(() => {
    console.log('Promise 1 rejected');
    reject('error');
  }, 1000);
});

const p2 = new Promise((resolve, reject) => {
  setTimeout(() => {
    console.log('Promise 2 fulfilled');
    resolve(2);
  }, 2000);
});

const p = Promise.any([p1, p2]);
p.then((value) => {
  console.log('Returned Promise');
  console.log(value);
});
Code language: JavaScript (javascript)
Output:

Promise 1 rejected
Promise 2 fulfilled
Returned Promise
2
Code language: JavaScript (javascript)
In this example, the Promise.any() ignores the rejected promise. When the p2 resolves with the value 2, the Promise.any() returns a promise that resolves to the same value as the result of the p2.

3) All promises rejected example
The following example demonstrates how to use the Promise.any() method with all promises rejected:

const p1 = new Promise((resolve, reject) => {
  setTimeout(() => {
    console.log('Promise 1 rejected');
    reject('error1');
  }, 1000);
});

const p2 = new Promise((resolve, reject) => {
  setTimeout(() => {
    console.log('Promise 2 rejected');
    reject('error2');
  }, 2000);
});

const p = Promise.any([p1, p2]);
p.catch((e) => {
  console.log('Returned Promise');
  console.log(e, e.errors);
});
Code language: JavaScript (javascript)
Output:

Promise 1 rejected
Promise 2 rejected
Returned Promise
[AggregateError: All promises were rejected] [ 'error1', 'error2' ]
Code language: JavaScript (javascript)
In this example, both p1 and p2 were rejected with the string error1 and error2. Therefore, the Promise.any() method was rejected with an AggregateError object that has the errors property containing all the errors of the rejected promises.

When to use the JavaScript Promise.any() method
In practice, you use the Promise.any() to return the first fulfilled promise. Once a promise is fulfilled, the Promise.any() method does not wait for other promises to be complete. In other words, the Promise.any() short circuits after a promise is fulfilled.

For example, you have a resource served by two or more content delivery networks (CDN). To dynamically load the first available resource, you can use the Promise.any() method.

The following example uses the Promise.any() method to fetch two images and display the first available image.

The index.html file
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>JavaScript Promise.any() Demo</title>
    </head>
    <body>
        <script src="js/app.js"></script>
    </body>
</html>
Code language: JavaScript (javascript)
The app.js file
function getImageBlob(url) {
  return fetch(url).then((response) => {
    if (!response.ok) {
      throw new Error(`HTTP status: ${response.status}`);
    }
    return response.blob();
  });
}

let cat = getImageBlob(
  'https://upload.wikimedia.org/wikipedia/commons/4/43/Siberian_black_tabby_blotched_cat_03.jpg'
);
let dog = getImageBlob(
  'https://upload.wikimedia.org/wikipedia/commons/a/af/Golden_retriever_eating_pigs_foot.jpg'
);

Promise.any([cat, dog])
  .then((data) => {
    let objectURL = URL.createObjectURL(data);
    let image = document.createElement('img');
    image.src = objectURL;
    document.body.appendChild(image);
  })
  .catch((e) => {
    console.log(e.message);
  });
Code language: JavaScript (javascript)
How it works.

First, define the getImageBlob() function that uses the fetch API to get the image’s blob from a URL. The getImageBlob() returns a Promise object that resolves to the image blob.
Second, define two promises that load the images.
Third, show the first available image by using the Promise.any() method.
Summary
Use the JavaScript Promise.any() method to take a list of promises and return a promise that is fulfilled first.

[🔝](#contents)

> ⚠️ Note: This content is for educational and personal reference purposes only.
> The original source is shown at the top of the document.
>
> All rights and copyrights belong to their respective owners.

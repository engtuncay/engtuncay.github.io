
Section - Promise,Async-Await and Closure

[Back](../readme.md)

---

- [Section - Promise,Async-Await and Closure](#section---promiseasync-await-and-closure)
  - [Promise](#promise)
  - [Callbacks](#callbacks)
    - [Promise constructor](#promise-constructor)
    - [A Promise Example : Fetch API](#a-promise-example--fetch-api)
  - [Async and Await](#async-and-await)
  - [Closure](#closure)



# Section - Promise,Async-Await and Closure

## Promise

A Promise is a way to handle `asynchronous operations` in JavaScript. It allows handlers with an asynchronous action's eventual success value or failure reason. This lets asynchronous methods return values like synchronous methods: instead of immediately returning the final value, the asynchronous method returns a promise to supply the value at some point in the future. (it is like reactive functions)

A Promise is in one of these states:

- pending: *initial state*, neither fulfilled nor rejected.
- fulfilled: meaning that the operation completed *successfully*.
- rejected: meaning that the operation *failed*.

A pending promise can either be fulfilled with a value, or rejected with a reason (error). When either of these options happens, the associated handlers queued up by a promise's then method are called. (If the promise has already been fulfilled or rejected when a corresponding handler is attached, the handler will be called, so there is *no race condition* between an asynchronous operation completing and its handlers being attached.)

As the `Promise.prototype.then()` and `Promise.prototype.catch()` methods return promises, they can be chained.

## Callbacks

To understand promise very well let us understand callback first. Let's see the following callbacks. From the following code blocks you will notice, the difference between callback and promises.

➖ Callback

Let us see a callback function which can take two parameters. The first parameter is err and the second is result. If the err parameter is false, there will not be error otherwise it will return an error.

In this case the err has a value and it will return the err block.

```js
//Callback
const doSomething = fnCallback => {
  setTimeout(() => {
    const skills = ['HTML', 'CSS', 'JS']
    fnCallback('It did not go well', skills)
  }, 2000)
}

const callback = (err, result) => {
  if (err) {
    return console.log(err)
  }
    return console.log(result)
}

doSomething(callback)

```

```js
// after 2 seconds it will print
It did not go well
```

In this case, the err is false and it will return the else block which is the result.

```js
const doSomething = callback => {
  setTimeout(() => {
    const skills = ['HTML', 'CSS', 'JS']
    callback(false, skills)
  }, 2000)
}

doSomething((err, result) => {
  if (err) {
    return console.log(err)
  }
    return console.log(result)
})
```

```js
// after 2 seconds it will print the skills
["HTML", "CSS", "JS"]
```

### Promise constructor

We can create a promise using the Promise constructor. We can create a new `Promise` object. Its constructor takes a `callback` function and the promise callback function has two parameters which are the `resolve` and `reject` functions.

```js
// syntax
const promise = new Promise((resolve, reject) => {
  let success = true;
  if(success){
    resolve('success');
  }else{
    reject('failure');
  }
})

```

```js
// Promise
const doPromise = new Promise((resolve, reject) => {
  setTimeout(() => {
    const skills = ['HTML', 'CSS', 'JS']
    if (skills.length > 0) {
      resolve(skills)
    } else {
      reject('Something wrong has happened')
    }
  }, 2000)
})

doPromise.then(result => {
    console.log(result)
  }).catch(error => console.log(error))
```

```sh
["HTML", "CSS", "JS"]
```

The above promise has been settled with resolve.

Let us another example when the promise is settled with reject.

```js
// Promise
const doPromise = new Promise((resolve, reject) => {
  setTimeout(() => {
    const skills = ['HTML', 'CSS', 'JS']
    if (skills.includes('Node')) {
      resolve('fullstack developer')
    } else {
      reject('Something wrong has happened')
    }
  }, 2000)
})

doPromise.then(result => {
    console.log(result)
  }).catch(error => console.error(error))

```

```js
Something wrong has happened
```

### A Promise Example : Fetch API

The Fetch API provides an interface for fetching resources (including across the network). It will seem familiar to anyone who has used `XMLHttpRequest`, but the new API provides a more powerful and flexible feature set. In this challenge we will use fetch to request url and APIS. In addition to that let us see demonstrate use case of promises in accessing network resources using the fetch API.

```js
const url = 'https://restcountries.com/v2/all' // countries api
fetch(url).then(response => response.json()) // accessing the API data as JSON
  .then(data => {
    // getting the data
    console.log(data)
  })
  .catch(error => console.error(error)) // handling error if something wrong happens
```

## Async and Await

Async and await is an elegant way to handle promises. It is easy to understand and it clean to write.

```js
const square = async function (n) {
  return n * n
}

square(2)
```

```js
Promise {<resolved>: 4}
```

The word `async` in front of a function means that function will return a promise. The above square function instead of a value it returns a promise. ❗

How do we access the value from the promise ? To access the value from the promise, we will use the keyword  `await` .

```js
const square = async function (n) {
  return n * n
}

// await, async fonksiyon içerisinde kullanılır
var start = async function () {
  let value = await square(2);
  console.log("value:", value);
};

start();
```

```js
// Output
// 4
```

Now, as you can see from the above example writing async in front of a function create a promise and to get the value from a promise we use await. Async and await go together, one can not exist without the other.

Let us fetch API data using both promise method and async and await method.

- promise

```js
const url = 'https://restcountries.com/v2/all'
fetch(url)
  .then(response => response.json())
  .then(data => {
    console.log(data)
  })
  .catch(error => console.error(error))
```

- async and await

```js
const url = 'https://restcountries.com/v2/all';
const fetchData = async () => {
  try {
    const response = await fetch(url)
    const countries = await response.json()
    console.log(countries)
  } catch (err) {
    console.error(err)
  }
}
console.log('===== async and await')
fetchData()
```

## Closure

JavaScript allows writing function inside an outer function. We can write as many inner functions as we want. `If inner function access the variables of outer function` then it is called closure. ❗

```js
function outerFunction() {
    let count = 0;
    
    function innerFunction() {
        count++ // inner function accesses count var. of outerFunc.
        return count
    }

    return innerFunction
}

const innerFunc = outerFunction();

console.log(innerFunc());
console.log(innerFunc());
console.log(innerFunc());
```

```js
1
2
3
```

Let us more example of inner functions

```js
function outerFunction() {
    let count = 0;
    function plusOne() {
        count++
        return count
    }
    function minusOne() {
        count--
        return count
    }

    return {
        plusOne:plusOne(),
        minusOne:minusOne()
    }
};

const innerFuncs = outerFunction();

console.log(innerFuncs.plusOne);
console.log(innerFuncs.minusOne);
```

```sh
1
0
```
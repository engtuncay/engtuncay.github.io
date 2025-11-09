
Source : https://www.javascripttutorial.net/web-apis/javascript-cookies/

(some parts may be modified or removed)

[Back](../readme.md)

---

- [Section 1. Client Storage](#section-1-client-storage)
  - [JavaScript Cookies](#javascript-cookies)
    - [1) Get a cookie value](#1-get-a-cookie-value)
    - [2) Set a cookie](#2-set-a-cookie)
    - [3) Remove a cookie](#3-remove-a-cookie)
    - [JavaScript Cookie class utility](#javascript-cookie-class-utility)
    - [View cookies with web browsers (devtools)](#view-cookies-with-web-browsers-devtools)
  - [JavaScript localStorage](#javascript-localstorage)
  - [JavaScript sessionStorage](#javascript-sessionstorage)
  - [JavaScript IndexedDB](#javascript-indexeddb)

# Section 1. Client Storage

## JavaScript Cookies

➖ What is a cookie

An HTTP cookie is a piece of data that a server sends to a web browser. Then, the web browser stores the HTTP cookie on the user’s computer and sends it back to the same server in the later requests.

```js
Server ---> Browser
Server <--- Browser
```

An HTTP cookie is also known as a web cookie or browser cookie. And it is commonly called a cookie.

For example, the header of an HTTP response may look like this:

```sh
HTTP/1.1 200 OK
Content-type: text/html
Set-Cookie:username=admin
...

```

The HTTP response sets a cookie with the name of "username" and value of "admin". The server encodes both name and value when sending the cookie to the web browser.

The web browser stores this information and sends it back to the server via the Cookie HTTP header for the next request as follows:

```js
GET /index.html HTTP/1.1
Cookie: username=admin
...

```

➖ Why cookies

It’s important to understand that HTTP is `stateless`. When you send two subsequent HTTP requests to the server, there is no link between them. In other words, the server cannot know if the two requests are from the same web browser.

Therefore, a cookie is used to tell if the two requests came from the same web browser.

In practice, cookies serve the following purposes:

- Session management – cookies allow you to manage any information that the server should remember. For example, logins, shopping carts, etc.
- Personalization – cookies allow you to store user preferences, themes, and setting specific to a user.
- Tracking – cookies help record and analyze user behaviors in advertising.

➖ Cookie details

A cookie consists of the following information stored by the web browser:

- Name – a unique name that identifies the cookie. The cookie names are case-insensitive. It means that Username and username are the same cookies.
- Value – string value of the cookie. It must be URL-encoded.
- Domain – a domain for which the cookie is valid.
- Path – path without the domain for which the cookie should be sent to the server. For example, you can specify that the cookie is accessible only from the https://www.javascripttutorial.net/dom/ so pages at https://www.javascripttutoiral.net/ won’t send the cookie information.
- Expiration – timestamp that indicates when the web browser should delete the cookie (or when the browser should stop sending the cookie to the server). The expiration date is set as a date in GMT format: Wdy, DD-Mon-YYYY HH:MM:SS GMT. The expiration date allows the cookies to be stored in the user’s web browsers even after users close the web browsers.
- Secure flag – if specified, the web browser only sends the cookie to the server only via an SSL connection (https, not http)

The name, value, domain, path, expiration, and secure flag are separated by `a semicolon and space` . For example:

```sh
HTTP/1.1 200 OK
Content-type: text/html
Set-Cookie:user=john
; expire=Tue, 12-December-2030 12:10:00 GMT; domain=javascripttutorial.net; path=/dom; secure
...

```

Note that the secure flag is the only part that is not a name-value pair.

➖ Cookies in JavaScript

To manage cookies in JavaScript, you use the `document.cookie` property.

### 1) Get a cookie value

The following example returns a string of all cookies available to the page:

```js
const str = document.cookie;

```

The document.cookie returns a series of name-value pairs separated by semicolons like this:

```js
name1=value1;name2=value2;...

```

The following example shows the cookies of a webpage:

```js
"_ga=GA1.2.336374160.1600215156; dwf_sg_task_completion=False; _gid=GA1.2.33408724.1600901684"

```

Since all the names and values are URL-encoded, you need to use the decodeURIComponent() to decode them.

### 2) Set a cookie

To set a value for a cookie, you compose the cookie text in the following format:

```sh
name=value; expires=expirationTime; path=domainPath; domain=domainName; secure

```

…and append it to the cookie:

```js
document.cookie = cookieText;

```

A cookie requires only name and value. For example:

```js
document.cookie = "username=admin";

```

This example creates a cookie called username that has a value of admin. The web browser will send this cookie every time it makes a request to the server.

Since the cookie doesn’t specify the expired time, it will be deleted when the web browser is closed ❗

The cookie text "username=admin" doesn’t have any character that needs to be encoded.

However, it’s a good practice to always use the `encodeURIComponent()` function when setting a cookie like this:

```js
document.cookie = `${encodeURIComponent("username")}=${encodeURIComponent("admin")}`;

```

### 3) Remove a cookie

To remove a cookie, you need to set the cookie again with the same name, path, domain, and secure option. And you need to set the expiration date to some time in the past.

### JavaScript Cookie class utility

The following Cookie class sets, gets, and removes a cookie:

```js
class Cookie {

  static get(name) {
    const cookieName = `${encodeURIComponent(name)}=`;
    const cookie = document.cookie;
    let value = null;

    const startIndex = cookie.indexOf(cookieName);
    if (startIndex > -1) {
      const endIndex = cookie.indexOf(';', startIndex);
      if (endIndex == -1) {
        endIndex = cookie.length;
      }
      value = decodeURIComponent(
        cookie.substring(startIndex + name.length, endIndex)
      );
    }
    return value;
  }

  static set(name, value, expires, path, domain, secure) {
    let cookieText = `${encodeURIComponent(name)}=${encodeURIComponent(value)}`;
    if (expires instanceof Date) {
      cookieText += `; expires=${expires.toGMTString()}`;
    }

    if (path) cookieText += `; path=${path}`;
    if (domain) cookieText += `; domain=${domain}`;
    if (secure) cookieText += `; secure`;

    document.cookie = cookieText;
  }

  static remove(name, path, domain, secure) {
    Cookie.set(name, '', new Date(0), path, domain, secure);
  }
}

```

How it works.

The Cookie class has three static methods: `get(), set(), and remove()`.

➖ 1) The get() method

The get() method returns the value of a cookie with a specified name. To do so, it performs the following steps:

- First, find the occurrence of the cookie name by an equal sign in the document.cookie property.
- Second, if the cookie is available, it uses the indexOf() to find the end of the cookie, which is specified by the next semicolon (;) after that location. If the semicolon isn’t available, this means that the cookie is the last one in the string.
- Third, decode the value of the cookie using the decodeURIComponent() function and return the decoded value.

➖ 2) The set() method

The set() method sets a cookie on the page. It accepts the arguments required to construct a cookie.

The set() method requires the first two arguments: name and value. The other arguments aren’t mandatory.

The set() method composes a cookie text and sets it to the document.cookie property.

➖ 3) The remove() method

To remove a cookie, the remove() method sets the cookie again with the expiration date set to January 1, 1970. Note that the new Date(0) returns a date object whose date is January 1, 1970.

➖ Using the Cookie class

The following shows how to use the Cookie class to set, get, and remove a cookie whose name is username and value is admin:

```js
// set a cookie
Cookie.set('username', 'admin');

// get a cookie
console.log(Cookie.get('username')); // admin

// remove a cookie by a name
Cookie.remove('username');

```

### View cookies with web browsers (devtools)

To view the cookies on the web browser, you use the devtools.

- First, click the application tab.
- Second, select Cookies node under the Storage.

**Summary**

- A cookie is a piece of data that a server sends to a web browser. The web browser then stores it in the user’s computer and sends the cookie back to the same server in the subsequent requests.
- The server uses cookies for identifying if two successive requests came from the same web browser.
- To manage cookies, you use the document.cookie object. To make it more efficient, you can use the Cookie utility class.

Use the `encodeURIComponent()` and `decodeURIComponent()` function to encode and decode the cookie values.

## JavaScript localStorage

The Storage type is designed to store name-value pairs. The Storage type is an Object with the following additional methods:

- setItem(name, value) – set the value for a name
- removeItem(name) – remove the name-value pair identified by name.
- getItem(name) – get the value for a given name.
- key(index) – get the name of the value in the given numeric position.
- clear() – remove all values.

To get the number of name-value pairs in a Storage object, you can use the length property.

The Storage object can store only strings. It’ll automatically convert non-string data into a string before storing it.

When you retrieve data from a Storage object, you’ll always get the string data ❗

➖ The JavaScript localStorage object

HTML5 specification introduces the localStorage as a way to store data with `no expiration date` in web browsers.

In other words, the data stored in the browsers will persist even after you close the browser windows.

The data stored in the localStorage is bound to an origin. It means that the localStorage is unique per protocol://host:port.

➖ localStorage vs. cookies

First, the data stored in the localStorage isn’t sent to the server in every request like cookies. For this reason, you can store more data in the localStorage.

Most modern web browsers allow you to store up to 5MB of data in the localStorage. Note that you can store up to 4KB in cookies.

Second, the data stored in the localStorage can be managed by the client, specifically JavaScript in the web browser. It cannot be accessible by the servers.

However, cookies can be managed by both JavaScript in web browsers and servers.

➖ Accessing the localStorage

You can access the localStorage via the property of the window object:

```js
window.localStorage

```
TBC - 20251107 - 1959 

Since the localStorage is an instance of the Storage type, you can invoke the methods of the Storage type to manage data.

When you type the following code in the Console:

window.localStorage
Code language: JavaScript (javascript)
… you’ll see the following object:

Storage {length: 0}
Code language: CSS (css)
1) The setItem() method
The following uses the setItem() method to store a name-value pair in the localStorage:

window.localStorage.setItem('theme','dark');
Code language: JavaScript (javascript)
2) The length property
To get the number of name-value pairs, you use the length property like this:

console.log(window.localStorage.length); // 1
Code language: JavaScript (javascript)
Since the window object is global, you don’t need to explicitly specify it. For example:

console.log(localStorage.length); // 1
Code language: JavaScript (javascript)
3) The getItem() method
To get the value by a key, you use the getItem() method. The following example uses the getItem() method to get the value of theme key:

localStorage.getItem('theme'); // 'dark'
Code language: JavaScript (javascript)
4) The removeItem() method
To remove a name-value pair by a key, you use the removeItem() method. For example:

localStorage.removeItem('theme');
Code language: JavaScript (javascript)
5) Loop over keys of the localStorage object
The following stores three name-value pairs to the localStorage:

localStorage.setItem('theme','light');
localStorage.setItem('backgroundColor','white');
localStorage.setItem('color','#111');
Code language: JavaScript (javascript)
To iterate over name-value pairs stored in the localStorage, you use the Object.keys() method with for...of loop:

let keys = Object.keys(localStorage);
for(let key of keys) {
  console.log(`${key}: ${localStorage.getItem(key)}`);
}
Code language: JavaScript (javascript)
Output:

color: #111
theme: light
backgroundColor: white
Code language: HTTP (http)
Storing objects
The Storage type stores only string data. To store objects, you need to convert them into strings using the JSON.stringify() method. For example:

const settings = {
    backgroundColor: '#fff',
    color: '#111',
    theme: 'light'
};

localStorage.setItem('settings', JSON.stringify(settings));

console.log(localStorage.getItem('settings'));
Code language: JavaScript (javascript)
Output: (a string)

'{"backgroundColor":"#fff","color":"#111","theme":"light"}'
Code language: JavaScript (javascript)
The following retrieves the value from the localStorage and converts it back to the object using the JSON.parse() method.

let storedSettings = JSON.parse(localStorage.getItem('settings'));
console.log(storedSettings);
Code language: JavaScript (javascript)
The storage event
When you make a change to the Storage object, the storage event is fired on the document.

The storage event occurs in the following scenarios:

Store a name-value pair by calling the setItem() method.
Remove a name-value pair by calling the removeItem() method.
And remove all values by calling the clear() method.
The storage event has the following properties:

domain – the domain which the storage changes for.
key – the key that was set or removed.
newValue – the value that the key was set to or null if the key was removed.
oldValue – the value before the key was set or removed.
To listen for the storage event, you use the addEventListener() method of the window object like this:

addEventListener('storage', function(e){
   console.log(`The value of the ${e.key} changed for the ${e.domain}.`);
});
Code language: JavaScript (javascript)
Summary
The Storage type provides you with the methods for storing and managing data in web browsers.
The localStorage is an instance of the Storage type that allows you to store persistent data in the web browsers.
The localStorage can store only strings. To store objects, you convert them to strings using the JSON.stringify() method. And you convert the strings into objects when you retrieve them from the localStorage using the JSON.parse() method.

## JavaScript sessionStorage
Summary: in this tutorial, you’ll learn how to use the JavaScript sessionStorage to store data only for a session.

Introduction to JavaScript sessionStorage
The sessionStorage object stores data only for a session. It means that the data stored in the sessionStorage will be deleted when the browser is closed.

A page session lasts as long as the web browser is open and survives over the page refresh.

When you open a page in a new tab or window, the web browser creates a new session.

If you open multiple tabs or windows with the same URL, the web browser creates a separate sessionStorage for each tab or window. So data stored in one web browser tab cannot be accessible in another tab.

When you close a tab or window, the web browser ends the session and clears data in the sessionStorage.

Data stored in the sessionStorage is specific to the protocol of the page. For example, the same site javascripttutorial.net has different sessionStorage when accessing with the http and https.

Since the sessionStorage data is tied to a server session, it’s only available when a page is requested from a server. The sessionStorage isn’t available when the page runs locally without a server.

Because the sessionStorage is an instance of the Storage type, you can manage data using the Storage’s methods:

setItem(name, value) – set the value for a name
removeItem(name) – remove the name-value pair identified by name.
getItem(name) – get the value for a given name.
key(index) – get the name of the value in the given numeric position.
clear() – remove all values in the sessionStorage .
Managing data in the JavaScript sessionStorage
1) Accessing the sessionStorage
To access the sessionStorage, you use the sessionStorage property of the window object:

window.sessionStorage
Code language: JavaScript (javascript)
Since the window is the global object, you can simply access the sessionStorage like this:

sessionStorage
2) Storing data in the sessionStorage
The following stores a name-value pair in the sessionStorage:

sessionStorage.setItem('mode','dark');
Code language: JavaScript (javascript)
If the sessionStorage has an item with the name of mode, the setItem() method will update the value for the existing item to dark. Otherwise, it’ll insert a new item.

3) Getting data from the sessionStorage
To get the value of an item by name, you use the getItem() method. The following example gets the value of the item ‘mode‘:

const mode = sessionStorage.getItem('mode');
console.log(mode); // 'dark'
Code language: JavaScript (javascript)
If there is no item with the name mode, the getItem() method will return null.

4) Removing an item by a name
To remove an item by the name, you use the removeItem() method. The following removes the item with the name of 'mode':

sessionStorage.removeItem('mode');
Code language: JavaScript (javascript)
5) Iterating over all items
To iterate over all items stored in the sessionStorage, you follow these steps:

Use Object.keys() to get all keys of the sessionStorage object.
Use for...of to iterate over the keys and get the items by keys.
The following code illustrates the steps:

let keys = Object.keys(sessionStorage);
for(let key of keys) {
  console.log(`${key}: ${sessionStorage.getItem(key)}`);
}
Code language: JavaScript (javascript)
6) Deleting all items in the sessionStorage
The data stored in the sessionStorage are automatically deleted when the web browser tab/window is closed.

In addition, you can use the clear() method to programmatically delete all data stored in the sessionStorage.

sessionStorage.clear();
Code language: CSS (css)
Why JavaScript sessionStorage
The sessionStorage has many practical applications. And the following are the notable ones:j

The sessionStorage can be used to store the state of the user interface of the web application. Later, when the user comes back to the page, you can restore the user interface stored in the sessionStorage.
The sessionStorage can also be used to pass data between pages instead of using the hidden input fields or URL parameters.
JavaScript sessionStorage application
You’ll build a simple web application that allows users to select the mode, either dark or light mode. By default, it has a light mode. And you’ll use the sessionStorage to remember the mode when the page refreshes.

If you refresh the page, the mode that you selected will restore since it’s stored in the sessionStorage.

However, if you close the tab or window, the page will reset to the dark mode, which is the default mode.

1) Creating the project folder structure
First, create a new folder called session-storage. In the session-storage folder, create two subfolders: js and css that will store the JavaScript and CSS files.

Second, create a new index.html in the sessionStorage folder, the app.js file in the js folder, and style.css file in the css folder.

2) Building the HTML page
The following shows the index.html page:

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaScript sessionStorage Demo</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>JavaScript sessionStorage Demo</h1>
        <p>Click the button to switch to the dark/light mode.</p>
        <p>Refresh the page to check if the mode is saved.</p>
        <a id="theme-switcher" class="btn"></a>
    </div>
    <script src="js/app.js"></script>
</body>

</html>
Code language: HTML, XML (xml)
In this index.html file, we place the style.css in the head section and app.js in the body section.

The page has some elements. The most important one is the button with the id theme-switcher.

3) Creating app.js file
First, declare two constants that will be used as the butotn’s label:

const MOON = '🌙';
const SUN = '☀️';
Code language: JavaScript (javascript)
You’ll use the SUN as the label of the theme-switcher button in the dark mode and MOON in the light mode.

Second, declare three constants for the dark, light, and default modes:

const DARK_MODE = 'dark';
const LIGHT_MODE = 'light';
const DEFAULT_MODE = DARK_MODE;
Code language: JavaScript (javascript)
Third, select the button theme-switcher by using the querySelector():

const btn = document.querySelector('#theme-switcher');
Code language: JavaScript (javascript)
Fourth, define a new function setMode() to change the mode:

function setMode(mode = DEFAULT_MODE) {
    if (mode === DARK_MODE) {
        btn.textContent = SUN;
        document.body.classList.add(DARK_MODE);

    } else if (mode === LIGHT_MODE) {
        btn.textContent = MOON;
        document.body.classList.remove(DARK_MODE);
    }
}
Code language: JavaScript (javascript)
In the dark mode, the setMode() changes the button to SUN and adds the DARK_MODE class to the body element

And in the light mode, the setMode() changes the button label to MOON and removes the DARK_MODE class from the body element.

The following shows the CSS of the light mode. The background color is white and the text color is black:


body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-size: 16px;
    background-color: #fff;
    color: #333;
    line-height: 1.7;
    transition: 0.2s ease-in-out;
    padding: 20px;
}
Code language: CSS (css)
In the dark mode, the background color is black and the text color is white:

.dark {
    background-color: black;
    color: #fff;
}
Code language: CSS (css)
To switch from the light to dark mode, you add the .dark class to the body element and vice versa.

Fifth, define the init() function that will run when the page loads:

function init() {
    let storedMode = sessionStorage.getItem('mode');
    if (!storedMode) {
        storedMode = DEFAULT_MODE;
        sessionStorage.setItem('mode', DEFAULT_MODE);
    }
    setMode(storedMode);
}
Code language: JavaScript (javascript)
In this function, we use the getItem() method to retrieve the mode stored in the sessionStorage.

If the sessionStorage doesn’t have the mode item, the init() function will switch the page to the default mode, which is the dark mode. Otherwise, it sets to the mode stored in the sessionStorage.

Sixth, attach a click event handler to the theme-switcher button:

btn.addEventListener('click', function () {
    let mode = sessionStorage.getItem('mode');
    if (mode) {
        let newMode = mode == DARK_MODE ? LIGHT_MODE : DARK_MODE;
        setMode(newMode);
        sessionStorage.setItem('mode', newMode);
    }
});
Code language: JavaScript (javascript)
The click event handler gets the mode stored in the sessionStorage.

If the mode item exists, it toggles the mode. In other words, the light mode becomes the dark mode and vice versa.

It then uses the setItem() method to update the mode item in the sessionStorage to the new one.

The following shows a complete app.js file:

const MOON = '🌙';
const SUN = '☀️';
const DARK_MODE = 'dark';
const LIGHT_MODE = 'light';
const DEFAULT_MODE = DARK_MODE;

const btn = document.querySelector('#theme-switcher');

init();

function init() {
    let storedMode = sessionStorage.getItem('mode');
    if (!storedMode) {
        storedMode = DEFAULT_MODE;
        sessionStorage.setItem('mode', DEFAULT_MODE);
    }
    setMode(storedMode);
}

function setMode(mode = DEFAULT_MODE) {
    if (mode === DARK_MODE) {
        btn.textContent = SUN;
        document.body.classList.add(DARK_MODE);

    } else if (mode === LIGHT_MODE) {
        btn.textContent = MOON;
        document.body.classList.remove(DARK_MODE);
    }
}

btn.addEventListener('click', function () {
    let mode = sessionStorage.getItem('mode');
    if (mode) {
        let newMode = mode == DARK_MODE ? LIGHT_MODE : DARK_MODE;
        setMode(newMode);
        sessionStorage.setItem('mode', newMode);
    }
});
Code language: JavaScript (javascript)
Here is the final application.

First, you select a mode e.g., light mode, the sessionStorage will save it.

Then, you refresh the page. It’ll show the previously selected mode.

To view the data stored in the session storage in the web browser, you click the Application tab and select the Session Storage:


Summary
The sessionStorage allows you to store the data for session only. The browser will delete the sessionStorage data when you close the browser tab or window.
The sessionStorage is an instance of the Storage type, therefore, you can use the methods of the Storage type to manage data in the sessionStorage.

## JavaScript IndexedDB

Summary: in this tutorial, you’ll learn about the IndexedDB and how to use it to persistently store data inside the browser.

What is indexedDB
IndexedDB is a large-scale object store built into the web browser.

IndexedDB allows you to persistently store the data using key-value pairs.

The values can be any JavaScript type including boolean, number, string, undefined, null, date, object, array, regex, blob, and files.

Why indexedDB
IndexedDB allows you to create web applications that can work both online and offline.

It’s useful for applications that store a large amount of data and don’t need a constant internet connection.

For example, Google Docs uses the IndexedDB to store the cached documents in the browser and synchronizes with the server periodically. This improves performance and enhances user experiences.

You’ll also find other types of applications that heavily use IndexedDB, such as online notepads, quizzes, to-do lists, code sandboxes, and CMS.

IndexedDB structure
The following picture illustrates the structure of the IndexedDB:


Databases
A database is the highest level of IndexedDB, which contains one or more object stores.

The IndexedDB can have one or more databases. Generally, you’ll create one database per web application.

Object stores
An object store is a bucket for storing the data and associated indexes. It’s conceptually equivalent to the tables in SQL databases.

An object store contains the records stored as key-value pairs.

Indexes
Indexes allow you to query data by the properties of the objects.

Technically, you create indexes on object stores, which are called parent object stores.

For example, if you store the contact information, you may want to create indexes on email, first name, and last name to query the contacts by these properties.

Basic IndexedDB concepts
The following briefly introduces the basic concepts in the IndexedDB:

1) IndexedDB databases store key-value pairs
Unlike localStorage and sessionStorage, the values stored in the IndexedDB can be complex structures like objects and blobs.

Keys can be the properties of these objects or binary objects.

For quick searching and sorting, you can create indexes using any property of the objects.

2) IndexedDB is transactional
Every read from and write to the IndexedDB databases happens in a transaction.

The transactional model ensures data integrity in case users open the web application in multiple tabs/windows and perform the read from and write to the same database.

3) IndexedDB API is mostly asynchronous
IndexedDB operations are asynchronous. They use DOM events to notify you when an operation completes and the result is available.

4) IndexedDB is a NoSQL system
The IndexedDB is a NoSQL system, meaning it uses queries that return a cursor, which then you can use to iterate through the result set.

5) IndexedDB follows the same-origin policy
An origin consists of the domain, protocol, and port of a URL where the code executes. For example https://www.javascripttutorial.net:

domain: javascripttutorial.net
protocol: https
port: 443
The https://www.javascripttutorial.net/dom/ and https://www.javascripttutorial.net/ are the same origin because they have the same domain, protocol, and port.

However, the http://www.javascripttutorial.net/ and https://www.javascripttutorial.net/ aren’t the same origin since they have different protocols and ports:

https://www.javascripttutorial.net	http://www.javascripttutorial.net
Protocol	https	http
Port	443	80
IndexedDB adheres to the same-origin policy, meaning each origin has its own set of databases. One origin cannot access databases from another origin.

Basic IndexedDB operations
The following describes the basic operations of the IndexedDB databases such as

Opening a connection to a database.
Inserting an object into the object store.
Reading data from the object store.
Using a cursor to iterate over a result set.
Deleting an object from the object store.
Before opening a connection to a database in the IndexedDB, let’s create the project structure first.

1) Create the project structure
First, create a new folder called indexeddb folder. Inside the indexeddb folder, create another subfolder called js.

Second, create the index.html in the indexeddb folder, app.js in the js folder.

Third, place the <script> tag that links to the app.js file in the index.html file like this:

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IndexedDB</title>
</head>
<body>
    <script src="js/app.js"></script>
</body>
</html>
Code language: JavaScript (javascript)
In app.js, you’ll place all the JavaScript code in an IIFE.

(function () {
   // all the code will be here  
   // ...
})();
Code language: JavaScript (javascript)
1) Check if the IndexedDB is supported
The following code checks if a web browser supports the IndexedDB:

if (!window.indexedDB) {
    console.log(`Your browser doesn't support IndexedDB`);
    return;
}
Code language: JavaScript (javascript)
Since most modern web browsers support the IndexedDB, this may not be necessary anymore.

2) Open a database
To open a connection to a database, you use the open() method of the window.indexedDB:

const request = indexedDB.open('CRM', 1);
Code language: JavaScript (javascript)
The open() method accepts two arguments:

The database name (CRM)
The database version (1)
The open() method returns a request object which is an instance of the IDBOpenDBRequest interface.

When you call the open() method, it can succeed or fail. To handle each case, you can assign the corresponding event handler as follows:

request.onerror = (event) => {
    console.error(`Database error: ${event.target.errorCode}`);
};

request.onsuccess = (event) => {
    // add implementation here
};
Code language: JavaScript (javascript)
3) Create object stores
When you open the database for the first time, the onupgradeneeded event will trigger.

If you open the database for the second time with a version higher than the existing version, the onupgradeneeded  event also triggers.

For the first time, you can use the onupgradeneeded event handler to initialize the object stores and indexes.

For example, the following onupgradeneeded event handler creates the Contacts object store and its index.

 // create the Contacts object store and indexes
 request.onupgradeneeded = (event) => {
     let db = event.target.result;

     // create the Contacts object store 
     // with auto-increment id
     let store = db.createObjectStore('Contacts', {
         autoIncrement: true
     });

     // create an index on the email property
     let index = store.createIndex('email', 'email', {
         unique: true
     });
 };
Code language: JavaScript (javascript)
How it works.

First, get the IDBDatabase instance from the event.target.result and assign it to the db variable.
Second, call the createObjectStore() method to create the Contacts object store with the autoincrement key. It means that the IndexedDB will generate an auto-increment number starting at one as the key for every new object inserted into the Contacts object store.
Third, call the createIndex() method to create an index on the email property. Since the email is unique, the index should also be unique. To do so, you specify the third argument of the createIndex() method { unique: true }.
4) Insert data into object stores
Once you open a connection to the database successfully, you can manage data in the onsuccess event handler.

For example, to add an object to an object store, you follow these steps:

First, open a new transaction.
Second, get an object store.
Third, call the put() method of the object store to insert a new record.
Finally, close the connection to the database once the transaction is completed.
The following insertContact() function inserts a new contact into the Contacts object store:

function insertContact(db, contact) {
    // create a new transaction
    const txn = db.transaction('Contacts', 'readwrite');

    // get the Contacts object store
    const store = txn.objectStore('Contacts');
    //
    let query = store.put(contact);

    // handle success case
    query.onsuccess = function (event) {
        console.log(event);
    };

    // handle the error case
    query.onerror = function (event) {
        console.log(event.target.errorCode);
    }

    // close the database once the 
    // transaction completes
    txn.oncomplete = function () {
        db.close();
    };
}
Code language: JavaScript (javascript)
To create a new transaction, you call the transaction() method of the IDBDatabase object.

You can open a transaction in one of two modes: readwrite or readonly.

The readwrite mode allows you to read data from and write data to the database, while the readonly mode allows reading data from the database.

It’s best to open a readonly transaction when you only need to read data from a database.

After defining the insertContact() function, you can call it in the onsuccess event handler of the request to insert one or more contacts like this:

request.onsuccess = (event) => {
     const db = event.target.result;

     insertContact(db, {
         email: 'john.doe@outlook.com',
         firstName: 'John',
         lastName: 'Doe'
     });

     insertContact(db, {
         email: 'jane.doe@gmail.com',
         firstName: 'Jane',
         lastName: 'Doe'
     });
};
Code language: JavaScript (javascript)
Now, if you open the index.html file in the web browser, the code in the app.js will execute to:

Create the CRM database in the IndexedDB.
Create the Contacts object store in the CRM database.
Insert two records into the object store.
If you open the devtools on the web browser, you’ll see the CRM database with the Contacts object store. And in the Contacts object store, you’ll see the data there as shown in the following picture:


5) Read data from the object store by key
To read an object by its key, you use the get() method of the object store. The following getContactById() function finds a contact by an id:

function getContactById(db, id) {
    const txn = db.transaction('Contacts', 'readonly');
    const store = txn.objectStore('Contacts');

    let query = store.get(id);

    query.onsuccess = (event) => {
        if (!event.target.result) {
            console.log(`The contact with ${id} not found`);
        } else {
            console.table(event.target.result);
        }
    };

    query.onerror = (event) => {
        console.log(event.target.errorCode);
    }

    txn.oncomplete = function () {
        db.close();
    };
};
Code language: JavaScript (javascript)
When you call the get() method of the object store, it returns a query that will execute asynchronously.

Because the query can succeed or fail, you need to assign the onsuccess and onerror handlers to handle each case.

If the query succeeds, you’ll get the result in the event.target.result. Otherwise, you’ll get an error code via event.target.errorCode.

The following code closes the connection to the database once the transaction completes:

txn.oncomplete = function () {
   db.close();
};
Code language: JavaScript (javascript)
The database connection is closed only when all the transactions are completed.

The following calls the getContactById() in the onsuccess event handler to get the contact with id 1:

request.onsuccess = (event) => {
    const db = event.target.result;
    getContactById(db, 1);
};
Code language: JavaScript (javascript)
Output:


6) Read data from the object store by an index
The following defines a new function called getContactByEmail() that uses the email index to query data:

function getContactByEmail(db, email) {
    const txn = db.transaction('Contacts', 'readonly');
    const store = txn.objectStore('Contacts');

    // get the index from the Object Store
    const index = store.index('email');
    // query by indexes
    let query = index.get(email);

    // return the result object on success
    query.onsuccess = (event) => {
        console.log(query.result); // result objects
    };

    query.onerror = (event) => {
        console.log(event.target.errorCode);
    }

    // close the database connection
    txn.oncomplete = function () {
        db.close();
    };
}
Code language: JavaScript (javascript)
How it works.

First, get the email index object from the Contacts object store.
Second, use the index to read the data by calling the get() method.
Third, show the result in the onsuccess event handler of the query.
The following illustrates how to use the getContactByEmail() function in the onsuccess event handler:

request.onsuccess = (event) => {
    const db = event.target.result;
    // get contact by email
    getContactByEmail(db, 'jane.doe@gmail.com');
};
Code language: JavaScript (javascript)
Output:


7) Read all data from an object store
The following shows how to use a cursor to read all the objects from the Contacts object store:

function getAllContacts(db) {
    const txn = db.transaction('Contacts', "readonly");
    const objectStore = txn.objectStore('Contacts');

    objectStore.openCursor().onsuccess = (event) => {
        let cursor = event.target.result;
        if (cursor) {
            let contact = cursor.value;
            console.log(contact);
            // continue next record
            cursor.continue();
        }
    };
    // close the database connection
    txn.oncomplete = function () {
        db.close();
    };
}
Code language: JavaScript (javascript)
The objectStore.openCursor() returns a cursor used to iterate over an object store.

To iterate over the objects in an object store using the cursor, you need to assign an onsuccess handler:

objectStore.openCursor().onsuccess = (event) => {
   //...
};
Code language: JavaScript (javascript)
The event.target.result returns the cursor. To get the data, you use the cursor.value property.

The cursor.continue() method advances the cursor to the position of the next record in the object store.

The following calls the getAllContacts() in the onsuccess event handler to show all data from the Contacts object store:

request.onsuccess = (event) => {
    const db = event.target.result;
    // get all contacts
    getAllContacts(db);
};
Code language: JavaScript (javascript)
Output:


8) Delete a contact
To delete a record from the object store, you use the delete() method of the object store.

The following function deletes a contact by its id from the Contacts object store:

function deleteContact(db, id) {
    // create a new transaction
    const txn = db.transaction('Contacts', 'readwrite');

    // get the Contacts object store
    const store = txn.objectStore('Contacts');
    //
    let query = store.delete(id);

    // handle the success case
    query.onsuccess = function (event) {
        console.log(event);
    };

    // handle the error case
    query.onerror = function (event) {
        console.log(event.target.errorCode);
    }

    // close the database once the 
    // transaction completes
    txn.oncomplete = function () {
        db.close();
    };
}
Code language: JavaScript (javascript)
You can call the deleteContact() function in the onsuccess event handler to delete the contact with id 1 as follows:

request.onsuccess = (event) => {
    const db = event.target.result;
    deleteContact(db, 1);
};
Code language: JavaScript (javascript)
If you run the code, you’ll find that the contact with id 1 will be deleted.

Put it all together
The following shows the complete app.js file:

(function () {
    // check for IndexedDB support
    if (!window.indexedDB) {
        console.log(`Your browser doesn't support IndexedDB`);
        return;
    }

    // open the CRM database with the version 1
    const request = indexedDB.open('CRM', 1);

    // create the Contacts object store and indexes
    request.onupgradeneeded = (event) => {
        let db = event.target.result;

        // create the Contacts object store 
        // with auto-increment id
        let store = db.createObjectStore('Contacts', {
            autoIncrement: true
        });

        // create an index on the email property
        let index = store.createIndex('email', 'email', {
            unique: true
        });
    };

    // handle the error event
    request.onerror = (event) => {
        console.error(`Database error: ${event.target.errorCode}`);
    };

    // handle the success event
    request.onsuccess = (event) => {
        const db = event.target.result;

        // insert contacts
        // insertContact(db, {
        //     email: 'john.doe@outlook.com',
        //     firstName: 'John',
        //     lastName: 'Doe'
        // });

        // insertContact(db, {
        //     email: 'jane.doe@gmail.com',
        //     firstName: 'Jane',
        //     lastName: 'Doe'
        // });


        // get contact by id 1
        // getContactById(db, 1);


        // get contact by email
        // getContactByEmail(db, 'jane.doe@gmail.com');

        // get all contacts
        // getAllContacts(db);

        deleteContact(db, 1);

    };

    function insertContact(db, contact) {
        // create a new transaction
        const txn = db.transaction('Contacts', 'readwrite');

        // get the Contacts object store
        const store = txn.objectStore('Contacts');
        //
        let query = store.put(contact);

        // handle success case
        query.onsuccess = function (event) {
            console.log(event);
        };

        // handle the error case
        query.onerror = function (event) {
            console.log(event.target.errorCode);
        }

        // close the database once the 
        // transaction completes
        txn.oncomplete = function () {
            db.close();
        };
    }


    function getContactById(db, id) {
        const txn = db.transaction('Contacts', 'readonly');
        const store = txn.objectStore('Contacts');

        let query = store.get(id);

        query.onsuccess = (event) => {
            if (!event.target.result) {
                console.log(`The contact with ${id} not found`);
            } else {
                console.table(event.target.result);
            }
        };

        query.onerror = (event) => {
            console.log(event.target.errorCode);
        }

        txn.oncomplete = function () {
            db.close();
        };
    };

    function getContactByEmail(db, email) {
        const txn = db.transaction('Contacts', 'readonly');
        const store = txn.objectStore('Contacts');

        // get the index from the Object Store
        const index = store.index('email');
        // query by indexes
        let query = index.get(email);

        // return the result object on success
        query.onsuccess = (event) => {
            console.table(query.result); // result objects
        };

        query.onerror = (event) => {
            console.log(event.target.errorCode);
        }

        // close the database connection
        txn.oncomplete = function () {
            db.close();
        };
    }

    function getAllContacts(db) {
        const txn = db.transaction('Contacts', "readonly");
        const objectStore = txn.objectStore('Contacts');

        objectStore.openCursor().onsuccess = (event) => {
            let cursor = event.target.result;
            if (cursor) {
                let contact = cursor.value;
                console.log(contact);
                // continue next record
                cursor.continue();
            }
        };
        // close the database connection
        txn.oncomplete = function () {
            db.close();
        };
    }


    function deleteContact(db, id) {
        // create a new transaction
        const txn = db.transaction('Contacts', 'readwrite');

        // get the Contacts object store
        const store = txn.objectStore('Contacts');
        //
        let query = store.delete(id);

        // handle the success case
        query.onsuccess = function (event) {
            console.log(event);
        };

        // handle the error case
        query.onerror = function (event) {
            console.log(event.target.errorCode);
        }

        // close the database once the 
        // transaction completes
        txn.oncomplete = function () {
            db.close();
        };

    }
})();
Code language: JavaScript (javascript)
Summary
The IndexedDB is a large-scale object stored in web browsers.
The IndexedDB stores data as key-value pairs. The values can be any data including simple and complex ones.
The IndexedDB consists of one or more databases. Each database has one or more object stores. Typically, you create a database in the IndexedDB per web application.
The IndexedDB is useful for web applications that don’t require a constant internet connection, especially those that work both online and offline.


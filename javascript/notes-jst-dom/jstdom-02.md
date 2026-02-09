
Source : https://www.javascripttutorial.net/javascript-dom

(some parts may be modified or removed)

[Back](../readme.md)

---

- [Section 2. Selecting elements](#section-2-selecting-elements)
  - [getElementById() Method](#getelementbyid-method)
  - [getElementsByName() Method](#getelementsbyname-method)
  - [getElementsByTagName() Method](#getelementsbytagname-method)
  - [getElementsByClassName() Method](#getelementsbyclassname-method)
  - [querySelector() Method](#queryselector-method)


# Section 2. Selecting elements

## getElementById() Method

The getElementById() method of the document object returns an HTML element with the specified id.

Here’s the syntax of the getElementById() method:

```js
const element = document.getElementById(id);

```

In this syntax:

`id` is a string that represents the id of the element to select.

📝 Note that the method matches ID `case-sensitively`. For example, the 'root' and 'Root' are different.

If the document has no element with the specified id, the getElementById() method returns null.

❗ Unlike the querySelector() method, the getElementById() is only available on `the document object`, not on other DOM elements. 

Typically, the id is unique within an HTML document. However, HTML is forgiving, and a non-well-formed HTML may have multiple elements with the same id. In this case, the getElementById() method returns the first element it encounters (❗).
 
➖ JavaScript getElementById() method example

Suppose you have a document with two p elements:

```html
<p id="first">Hi, There!</p>
<p>JavaScript is fun.</p>

```

The following code shows how to get the element with the id first:

```js
const elem = document.getElementById("first");

```

See the following demo:

Note that after selecting the element, you can apply styles, manipulate its attributes, and traverse to parent and child elements (parent ve child elementları arasında gezinebilirsiniz).

➖ Summary

- The document.getElementById() returns a DOM element specified by an id or `null` if no matching element is found.

- If multiple elements have the same id, even though it is invalid, the getElementById() returns the first element it encounters.

 

## getElementsByName() Method

Every element on an HTML document may have a name attribute:

```html
<input type="radio" name="language" value="JavaScript">

```

Unlike the id attribute, multiple HTML elements can share the same value of the name attribute like this:

```html
<input type="radio" name="language" value="JavaScript">
<input type="radio" name="language" value="TypeScript">

```

To get all elements with a specified name, you use the `getElementsByName()` method of the document object:

```js
let elements = document.getElementsByName(name);

```

The `getElementsByName()` accepts a name which is the value of the name attribute of elements and returns a live `NodeList` of elements.

The return collection of elements is live ❗. It means that the return elements are automatically updated when elements with the same name are inserted and/or removed from the document.

➖ JavaScript getElementsByName() example

The following example shows a radio group that consists of radio buttons that have the same name (rate).

When you select a radio button and click the submit button, the page will show the selected value such as Very Poor, Poor, OK, Good, or Very Good:

```html
    <p>Please rate the service:</p>
    <p>
        <label for="very-poor">
            <input type="radio" name="rate" value="Very poor" id="very-poor"> Very poor
        </label>
        <label for="poor">
            <input type="radio" name="rate" value="Poor" id="poor"> Poor
        </label>
        <label for="ok">
            <input type="radio" name="rate" value="OK" id="ok"> OK
        </label>
        <label for="good">
            <input type="radio" name="rate" value="Good"> Good
        </label>
        <label for="very-good">
            <input type="radio" name="rate" value="Very Good" id="very-good"> Very Good
        </label>
    </p>
    <p>
        <button id="btnRate">Submit</button>
    </p>
    <p id="output"></p>
    <script>
        let btn = document.getElementById('btnRate');
        let output = document.getElementById('output');

        btn.addEventListener('click', () => {
            let rates = document.getElementsByName('rate');
            rates.forEach((rate) => {
                if (rate.checked) {
                    output.innerText = `You selected: ${rate.value}`;
                }
            });

        });
    </script>

```

How it works:

- First, select the submit button by its id btnRate using the getElementById() method.
- Second, listen to the click event of the submit button.
- Third, get all the radio buttons using the getElementsByName() and show the selected value in the output element.

🔔 Summary

- The getElementsByName() returns a `live` NodeList of elements with a specified name.

- The NodeList is an array-like object, not an array object.

## getElementsByTagName() Method

The getElementsByTagName() is a method of the document object or a specific DOM element.

Here’s the syntax of the getElementsByTagName() method:

```js
let elements = document.getElementsByTagName(tagName);

```

The getElementsByTagName() method accepts a tag name such as h1, a, and img and returns a live HTMLCollection of elements with the matching tag name.

The HTMLCollection is live means that it is automatically updated when the DOM tree in the document changes.

Note that the HTMLCollection is an `array-like object`.

To create an array of elements from a HTMLCollection, you use the `Array.of()` method like this:

```js
const items = Array.of(...htmlCollection);

```

In this syntax, the spread operator (...) spreads out the items from the htmlCollection and the Array.of() method creates an array of the items.

🧲 JavaScript getElementsByTagName() examples

The following example shows how to use the getElementsByTagName() method to get the number of h2 tags in the document.

When you click the Count H2 button, it shows the number of H2 tags:

```html
  <h1>JavaScript getElementsByTagName() Demo</h1>
  <h2>First heading</h2>
  <p>This is the first paragraph.</p>
  <h2>Second heading</h2>
  <p>This is the second paragraph.</p>
  <h2>Third heading</h2>
  <p>This is the third paragraph.</p>

  <button id="btnCount">Count h2</button>

  <script>
    let btn = document.getElementById('btnCount');
    btn.addEventListener('click', () => {
        let headings = document.getElementsByTagName('h2');
        alert(`The number of H2 tags: ${headings.length}`);
    });
  </script>

```

How it works:

- select a list of h2 tags using `document.getElementsByTagName()` inside the event handler:

```js
let headings = document.getElementsByTagName('h2');

```

- display the number of H2 tags using the `alert()` function:

```js
alert(`The number of H2 tags: ${headings.length}`);

```

➖ Summary

- The `getElementsByTagName()` is a method of the document or element object.

- The `getElementsByTagName()` accepts a tag name and returns a live `HTMLCollection` of elements with the matching tag name.



## getElementsByClassName() Method

The `getElementsByClassName()` method returns an HTMLCollection of elements whose class names match one or more specified class names.

Here’s the syntax of the getElementsByClassName() method:

```js
getElementsByClassName(names)

```

In this syntax:

- `names` represents one or more class names to match. If you use multiple class names, you need to separate them by a space.

The `getElementsByClassName()` method returns a live HTMLCollection of the matched elements. This means that it will automatically update when the document changes.

If no element in the document matches the class names, the `getElementsByClassName()` method returns an empty `HTMLCollection []`.

The `getElementsByClassName()` method is available on both the document element and any other DOM elements.

When you call the `getElementsByClassName()` method on the document element, it will search the entire document and return the matched elements:

```js
let elements = document.getElementsByClassName(names);

```

However, when you call the `getElementsByClassName()` method on a specific element, it will return the `descendants` of that particular element with the given class name:

```js
let elements = element.getElementsByClassName(names);

```

JavaScript `getElementsByClassName()` method examples

Let’s take some examples of using the `getElementsByClassName()` method.

Suppose you have the following HTML document:

```html
  <header>
      <nav>
          <ul id="menu">
              <li class="item">HTML</li>
              <li class="item">CSS</li>
              <li class="item highlight">JavaScript</li>
              <li class="item">TypeScript</li>
          </ul>
      </nav>
      <h1>getElementsByClassName Demo</h1>
  </header>
  <section>
      <article>
          <h2 class="secondary">Example 1</h2>
      </article>
      <article>
          <h2 class="secondary">Example 2</h2>
      </article>
  </section>

```

1) Calling JavaScript getElementsByClassName() on an element example

The following example illustrates how to use the getElementsByClassName() method to select the <li> items which are the descendants of the <ul> element:

```js
let menu = document.getElementById('menu');
let items = menu.getElementsByClassName('item');
console.log(items);

let data = [].map.call(items, (item) => item.textContent);
console.log(data);

```

Output:

```
HTMLCollection(4) [li.item, li.item, li.item.highlight, li.item]
['HTML', 'CSS', 'JavaScript', 'TypeScript']

```

How it works:

- select descendant elements of the ul element with the class name item using the `getElementsByClassName()` method:

```js
let items = menu.getElementsByClassName('item');

```

Then, display the items in the console, which is an HTMLCollection that has four items:

```js
console.log(items);

```

Output:

```
HTMLCollection(4) [li.item, li.item, li.item.highlight, li.item]

```

After that, create an array of items of the HTMLCollection using Array.of() method and returns an array of textContent of the items using the the map() method:

```js
const data = Array.of(...items).map((item) => item.textContent);

```

Finally, display the data to the console:

```js
console.log(data);

```

```text
Output:

['HTML', 'CSS', 'JavaScript', 'TypeScript']

```

1) Calling JavaScript getElementsByClassName() on the document example

To select elements with the class heading-secondary, you use the following code:

```js
const items = document.getElementsByClassName('secondary');
const data = Array.of(...items).map((item) => item.textContent);

console.log(data);

```


```
Output:

['Example 1', 'Example 2']

```

How it works.

First, select elements with the class secondary in the entire document:

```js
const items = document.getElementsByClassName('secondary');

```

Second, create an array of textContent from the items in the HTMLCollection:

```js
const data = Array.of(...items).map((item) => item.textContent);

```

Finally, display the data to the console:

```js
console.log(data);

```

➖ Summary

- Use the JavaScript getElementsByClassName() method to select the elements with one or more class names.

TBC - 20260209 - 2340 

## querySelector() Method

The querySelector() is a method of the Element interface. The querySelector() method allows you to select the first element that matches one or more CSS selectors.

The following illustrates the syntax of the querySelector() method:

let element = parentNode.querySelector(selector);
Code language: JavaScript (javascript)
In this syntax, the selector is a CSS selector or a group of CSS selectors to match the descendant elements of the parentNode.

If the selector is not valid CSS syntax, the method will raise a SyntaxError exception.

If no element matches the CSS selectors, the querySelector() returns null.

The querySelector() method is available on the document object or any Element object.

Besides the querySelector(), you can use the querySelectorAll() method to select all elements that match a CSS selector or a group of CSS selectors:

let elementList = parentNode.querySelectorAll(selector);
Code language: JavaScript (javascript)
The querySelectorAll() method returns a static NodeList of elements that match the CSS selector. If no element matches, it returns an empty NodeList.

Note that the NodeList is an array-like object, not an array object. However, in modern web browsers, you can use the forEach() method or the for...of loop.

To convert the NodeList to an array, you use the Array.from() method like this:

let nodeList = document.querySelectorAll(selector);
let elements = Array.from(nodeList);
Code language: JavaScript (javascript)
Basic selectors
Suppose that you have the following HTML document:

<!DOCTYPE html>
<html lang="en">
<head>
    <title>querySelector() Demo</title>
</head>
<body>
    <header>
        <div id="logo">
            <img src="img/logo.jpg" alt="Logo" id="logo">
        </div>
        <nav class="primary-nav">
            <ul>
                <li class="menu-item current"><a href="#home">Home</a></li>
                <li class="menu-item"><a href="#services">Services</a></li>
                <li class="menu-item"><a href="#about">About</a></li>
                <li class="menu-item"><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Welcome to the JS Dev Agency</h1>

        <div class="container">
            <section class="section-a">
                <h2>UI/UX</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem placeat, atque accusamus voluptas
                    laudantium facilis iure adipisci ab veritatis eos neque culpa id nostrum tempora tempore minima.
                    Adipisci, obcaecati repellat.</p>
                <button>Read More</button>
            </section>
            <section class="section-b">
                <h2>PWA Development</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni fugiat similique illo nobis quibusdam
                    commodi aspernatur, tempora doloribus quod, consectetur deserunt, facilis natus optio. Iure
                    provident labore nihil in earum.</p>
                <button>Read More</button>
            </section>
            <section class="section-c">
                <h2>Mobile App Dev</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi eos culpa laudantium consequatur ea!
                    Quibusdam, iure obcaecati. Adipisci deserunt, alias repellat eligendi odit labore! Fugit iste sit
                    laborum debitis eos?</p>
                <button>Read More</button>
            </section>
        </div>
    </main>
    <script src="js/main.js"></script>
</body>
</html>
Code language: HTML, XML (xml)
1) Universal Selector
The universal selector is denoted by * that matches all elements of any type:

*
The following example uses the querySelector() selects the first element in the document:

let element = document.querySelector('*');
Code language: JavaScript (javascript)
And this selects all elements in the document:

let elements = document.querySelectorAll('*');
Code language: JavaScript (javascript)
2) Type selector
To select elements by node name, you use the type selector e.g., a selects all <a> elements:

elementName
The following example finds the first h1 element in the document:

let firstHeading = document.querySelector('h1');
Code language: JavaScript (javascript)
The following example finds all h2 elements:

let heading2 = document.querySelectorAll('h2');
Code language: JavaScript (javascript)
3) Class selector
To find the element with a given CSS class, you use the class selector syntax:

.className
Code language: CSS (css)
The following example finds the first element with the menu-item class:

let note = document.querySelector('.menu-item');
Code language: JavaScript (javascript)
The following example finds all elements with the menu class:

let notes = document.querySelectorAll('.menu-item');
Code language: JavaScript (javascript)
4) ID Selector
To select an element based on the value of its id, you use the id selector syntax:

#id
Code language: CSS (css)
The following example finds the first element with the id #logo:

let logo = document.querySelector('#logo');
Code language: JavaScript (javascript)
Since the id should be unique in the document, the querySelectorAll() is not relevant.

5) Attribute selector
To select all elements that have a given attribute, you use one of the following attribute selector syntaxes:

[attribute]
[attribute=value]
[attribute~=value]
[attribute|=value]
[attribute^=value]
[attribute$=value]
[attribute*$*=value]
Code language: JSON / JSON with Comments (json)
The following example finds the first element with the attribute [autoplay] with any value:

let autoplay = document.querySelector('[autoplay]');
Code language: JavaScript (javascript)
The following example finds all elements that have [autoplay] attribute with any value:

let autoplays = document.querySelectorAll('[autoplay]');
Code language: JavaScript (javascript)
Grouping selectors
To group multiple selectors, you use the following syntax:

selector, selector, ...
The selector list will match any element with one of the selectors in the group.

The following example finds all <div> and <p> elements:

let elements = document.querySelectorAll('div, p');
Code language: JavaScript (javascript)
Combinators
1) descendant combinator
To find descendants of a node, you use the space ( ) descendant combinator syntax:

selector selector
For example p a will match all <a> elements inside the p element:

let links = document.querySelector('p a');
Code language: JavaScript (javascript)
2) Child combinator
The > child combinator finds all elements that are direct children of the first element:

selector > selector
The following example finds all li elements that are directly inside a <ul> element:

let listItems = document.querySelectorAll('ul > li');
Code language: JavaScript (javascript)
To select all li elements that are directly inside a <ul> element with the class nav:

let listItems = document.querySelectorAll('ul.nav > li');
Code language: JavaScript (javascript)
3) General sibling combinator
The ~ combinator selects siblings that share the same parent:

selector ~ selector
For example, p ~ a will match all <a> elements that follow the p element, immediately or not:

let links = document.querySelectorAll('p ~ a');
Code language: JavaScript (javascript)
4) Adjacent sibling combinator
The + adjacent sibling combinator selects adjacent siblings:

selector + selector
For example, h1 + a matches all elements that directly follow an h1:

let links = document.querySelectorAll('h1 + a');
Code language: JavaScript (javascript)
Select the first <a> that directly follows an h1:

let links = document.querySelector('h1 + a');
Code language: JavaScript (javascript)
Pseudo
1) Pseudo-classes
The : pseudo matches elements based on their states:

element:state
Code language: CSS (css)
For example, the li:nth-child(2) selects the second <li> element in a list:

let listItem = document.querySelectorAll('li:nth-child(2)');
Code language: JavaScript (javascript)
2) Pseudo-elements
The :: represent entities that are not included in the document therefore the querySelector() method cannot select pseudo-elements.

Summary
The querySelector() finds the first element that matches a CSS selector or a group of CSS selectors.
The querySelectorAll() finds all elements that match a CSS selector or a group of CSS selectors.
A CSS selector defines elements to which a CSS rule applies.
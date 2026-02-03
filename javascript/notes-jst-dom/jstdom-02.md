
Source : https://www.javascripttutorial.net/javascript-dom

(some parts may be modified or removed)

[Back](../readme.md)

---

- [Section 2. Selecting elements](#section-2-selecting-elements)
  - [getElementById() Method](#getelementbyid-method)
  - [getElementsByName() Method](#getelementsbyname-method)


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

❗ Unlike the querySelector() method, the getElementById() is only available on the document object, not on other DOM elements. 

Typically, the id is unique within an HTML document. However, HTML is forgiving, and a non-well-formed HTML may have multiple elements with the same id. In this case, the getElementById() method returns the first element it encounters.
 
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

Note that after selecting the element, you can apply styles, manipulate its attributes, and traverse to parent and child elements.

Summary

- The document.getElementById() returns a DOM element specified by an id or null if no matching element is found.
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

The getElementsByName() accepts a name which is the value of the name attribute of elements and returns a live `NodeList` of elements.

The return collection of elements is live ❗. It means that the return elements are automatically updated when elements with the same name are inserted and/or removed from the document.

➖ JavaScript getElementsByName() example

The following example shows a radio group that consists of radio buttons that have the same name (rate).

When you select a radio button and click the submit button, the page will show the selected value such as Very Poor, Poor, OK, Good, or Very Good:

```html
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>JavaScript getElementsByName Demo</title>
</head>

<body>
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
</body>

</html>

```

How it works:

- First, select the submit button by its id btnRate using the getElementById() method.
- Second, listen to the click event of the submit button.
- Third, get all the radio buttons using the getElementsByName() and show the selected value in the output element.

📝 Notice that you will learn about events like click later. For now, you need to focus on the getElementsByName() method.

🔔 Summary

- The getElementsByName() returns a `live` NodeList of elements with a specified name.

- The NodeList is an array-like object, not an array object.


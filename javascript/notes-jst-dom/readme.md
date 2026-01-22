
Source : https://www.javascripttutorial.net/javascript-dom/

(some parts may be modified or removed)

[Back](../readme.md)

---

# Contents

- [Contents](#contents)
- [Section 1. Getting started](#section-1-getting-started)
- [Section 2. Selecting elements](#section-2-selecting-elements)
- [Section 3. Traversing elements](#section-3-traversing-elements)
- [Section 4. Manipulating elements](#section-4-manipulating-elements)
- [Section 5. Working with Attributes](#section-5-working-with-attributes)
- [Section 6. Manipulating Element’s Styles](#section-6-manipulating-elements-styles)
- [Section 7. Working with Events](#section-7-working-with-events)
- [Section 8. Scripting Web Forms](#section-8-scripting-web-forms)



**JavaScript DOM**

This section covers the JavaScript Document Object Model (DOM) and shows you how to manipulate DOM elements effectively.

# Section 1. Getting started

Understanding the Document Object Model in JavaScript

# Section 2. Selecting elements
- getElementById() – select an element by id.
- getElementsByName() – select elements by name.
- getElementsByTagName()  – select elements by a tag name.
- getElementsByClassName() – select elements by one or more class names.
- querySelector()  – select elements by CSS selectors.
# Section 3. Traversing elements
- Get the parent element – get the parent node of an element.
- Get child elements – get children of an element.
- Get siblings of an element – get siblings of an element.
# Section 4. Manipulating elements
- createElement() – create a new element.
- appendChild()  – append a node to a list of child nodes of a specified parent node.
- textContent – get and set the text content of a node.
- innerHTML – get and set the HTML content of an element.
- innerHTML vs. createElement – explain the differences between innerHTML and createElement when it comes to creating new elements.
- DocumentFragment – learn how to compose DOM nodes and insert them into the active DOM tree.
- after() – insert a node after an element.
- append() – insert a node after the last child node of a parent node.
- prepend() – insert a node before the first child node of a parent node.
- insertAdjacentHTML() – parse a text as HTML and insert the resulting nodes into the document at a specified position.
- replaceChild() – replace a child element by a new element.
- cloneNode() – clone an element and all of its descendants.
- removeChild() – remove child elements of a node.
- insertBefore() – insert a new node before an existing node as a child node of a specified parent node.
- insertAfter() helper function – insert a new node after an existing node as a child node of a specified parent node.
# Section 5. Working with Attributes
HTML Attributes & DOM Object’s Properties – understand the relationship between HTML attributes & DOM object’s properties.
- setAttribute() – set the value of a specified attribute on a element.
- getAttribute() – get the value of an attribute on an element.
- removeAttribute() – remove an attribute from a specified element.
- hasAttribute() – check if an element has a specified attribute or not.

# Section 6. Manipulating Element’s Styles

- style property – get or set inline styles of an element.
- getComputedStyle() – return the computed style of an element.
- className property – return a list of space-separated CSS classes.
- classList property – manipulate CSS classes of an element.

Element’s width & height – get the width and height of an element.

# Section 7. Working with Events
- JavaScript events – introduce you to the JavaScript events, the event models, and how to handle events.
- Handling events – show you three ways to handle events in JavaScript.
- Page Load Events – learn about the page load and unload events.
load event – walk you through the steps of handling the load event originating from the document, image, and script elements.
- DOMContentLoaded – learn how to use the DOMContentLoaded event correctly.
- beforeunload event – guide you on how to show a confirmation dialog before users leave the page.
- unload event – show you how to handle the unload event that fires when the page is completely unloaded.
- Mouse events – how to handle mouse events.
- Keyboard events – how to deal with keyboard events.
- Scroll events – how to handle scroll events effectively.
- scrollIntoView – learn how to scroll an element into view.
- Focus Events – cover the focus events.
- haschange event – learn how to handle the event when URL hash changes.
- Event Delegation – is a technique of levering event bubbling to handle events at a higher level in the DOM than the element on which the event originated.
- dispatchEvent – learn how to generate an event from code and trigger it.
- Custom Events – define a custom JavaScript event and attach it to an element.
- MutationObserver – monitor the DOM changes and invoke a callback when the changes occur.

# Section 8. Scripting Web Forms

- JavaScript Form – learn how to handle form submit event and perform a simple validation for a web form.
- Radio Button – show you how to write the JavaScript for radio buttons.
- Checkbox – guide you on how to manipulate checkbox in JavaScript.
- Select box – learn how to handle the select box and its option in JavaScript.
- Add / Remove Options – show you how to dynamically add options to and remove options from a select box.
- Removing Items from <select> element conditionally – show you how to remove items from a <select> element conditionally.
- Handling change event – learn how to handle the change event of the input text, radio button, checkbox, and select elements.
- Handling input event – handle the input event when the value of the input element changes.


> ⚠️ Note: This content is for educational and personal reference purposes only.
> The original source is shown at the top of the document.
>
> All rights and copyrights belong to their respective owners.
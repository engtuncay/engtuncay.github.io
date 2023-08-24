
<h2>XPATH TUTOR</h2>

- [XPath Intro](#xpath-intro)
  - [What is XPath?](#what-is-xpath)
  - [Path Expressions](#path-expressions)
  - [Standard Functions](#standard-functions)
  - [XPath is Used in XSLT](#xpath-is-used-in-xslt)
  - [XPath is a W3C Recommendation](#xpath-is-a-w3c-recommendation)
- [XPath Nodes](#xpath-nodes)
  - [XPath Terminology](#xpath-terminology)
    - [Nodes](#nodes)
    - [Atomic values](#atomic-values)
    - [Items](#items)
  - [Relationship of Nodes](#relationship-of-nodes)
    - [Parent](#parent)
    - [Children](#children)
    - [Siblings](#siblings)
    - [Ancestors](#ancestors)
    - [Descendants](#descendants)
- [XPath Syntax](#xpath-syntax)
  - [Selecting Nodes](#selecting-nodes)
  - [Predicates](#predicates)
  - [Selecting Unknown Nodes](#selecting-unknown-nodes)
  - [Selecting Several Paths](#selecting-several-paths)
- [XPath Axes](#xpath-axes)
  - [XPath Axes](#xpath-axes-1)
  - [Location Path Expression](#location-path-expression)
- [XPath Operators](#xpath-operators)
  - [XPath Operators](#xpath-operators-1)
- [XPath Examples](#xpath-examples)
  - [Loading the XML Document](#loading-the-xml-document)
  - [Selecting Nodes](#selecting-nodes-1)
  - [Select all the titles](#select-all-the-titles)
  - [Select the title of the first book](#select-the-title-of-the-first-book)
  - [Select all the prices](#select-all-the-prices)
  - [Select price nodes with price\>35](#select-price-nodes-with-price35)
  - [Select title nodes with price\>35](#select-title-nodes-with-price35)


# XPath Intro

Source : https://www.w3schools.com/xml/xpath_intro.asp

## What is XPath?

XPath can be used to navigate through elements and attributes in an XML document.

XPath is a major element in the <span style="color:red">XSLT standard</span>.

![image](./img/xml-tech1-1152.png)

XPath	

- XPath stands for XML Path Language
- XPath uses "path like" syntax to identify and navigate nodes in an XML document
- XPath contains over 200 built-in functions
- XPath is a major element in the XSLT standard
- XPath is a W3C recommendation

## Path Expressions

XPath uses path expressions to select nodes or node-sets in an XML document.

These path expressions look very much like the path expressions you use with traditional computer file systems:


## Standard Functions

XPath includes over 200 built-in functions.

There are functions for string values, numeric values, booleans, date and time comparison, node manipulation, sequence manipulation, and much more.

Today XPath expressions can also be used in JavaScript, Java, XML Schema, PHP, Python, C and C++, and lots of other languages.

## XPath is Used in XSLT

XPath is a major element in the XSLT standard.

With XPath knowledge you will be able to take great advantage of your XSLT knowledge.

## XPath is a W3C Recommendation

XPath 1.0 became a W3C Recommendation on November 16, 1999.

XPath 2.0 became a W3C Recommendation on January 23, 2007.

XPath 3.0 became a W3C Recommendation on April 8, 2014.

# XPath Nodes

## XPath Terminology

### Nodes

In XPath, there are seven kinds of nodes: <span style="color:red">element, attribute, text, namespace, processing-instruction, comment, and root nodes</span>.

❗ Attribute are also a kind of nodes.

XML documents are treated as trees of nodes. The topmost element of the tree is called the root element.

Look at the following XML document:

```xml
<?xml version="1.0" encoding="UTF-8"?>

<bookstore>
  <book>
    <title lang="en">Harry Potter</title>
    <author>J K. Rowling</author>
    <year>2005</year>
    <price>29.99</price>
  </book>
</bookstore>

```

Example of *nodes* in the XML document above:

```xml
<bookstore> (root element node)

<author>J K. Rowling</author> (element node)

lang="en" (attribute node)

```

### Atomic values

Atomic values are nodes with no children or parent.

Example of atomic values:

```
J K. Rowling

"en"

```

### Items

Items are <span style="color:red">atomic values or nodes</span>.

## Relationship of Nodes

### Parent

Each element and attribute has one parent.

In the following example; the book element is the parent of the title, author, year, and price:

```xml
<book>
  <title>Harry Potter</title>
  <author>J K. Rowling</author>
  <year>2005</year>
  <price>29.99</price>
</book>

```

### Children

Element nodes may have zero, one or more children.

In the following example; the title, author, year, and price elements are all children of the book element:

```xml
<book>
  <title>Harry Potter</title>
  <author>J K. Rowling</author>
  <year>2005</year>
  <price>29.99</price>
</book>

```

### Siblings

Nodes that have the same parent.

In the following example; the title, author, year, and price elements are all siblings:

```xml
<book>
  <title>Harry Potter</title>
  <author>J K. Rowling</author>
  <year>2005</year>
  <price>29.99</price>
</book>

```

### Ancestors

A node's parent, parent's parent, etc.

In the following example; the ancestors of the title element are the book element and the bookstore element:

```xml
<bookstore>

<book>
  <title>Harry Potter</title>
  <author>J K. Rowling</author>
  <year>2005</year>
  <price>29.99</price>
</book>

</bookstore>

```

### Descendants

A node's children, children's children, etc.

In the following example; descendants of the bookstore element are the book, title, author, year, and price elements:

```xml
<bookstore>

<book>
  <title>Harry Potter</title>
  <author>J K. Rowling</author>
  <year>2005</year>
  <price>29.99</price>
</book>

</bookstore>

```

# XPath Syntax

XPath uses path expressions to select nodes or node-sets in an XML document. The node is selected by following a path or steps.

🔔 **The XML Example Document**

We will use the following XML document in the examples below.

```xml
<?xml version="1.0" encoding="UTF-8"?>

<bookstore>

<book>
  <title lang="en">Harry Potter</title>
  <price>29.99</price>
</book>

<book>
  <title lang="en">Learning XML</title>
  <price>39.95</price>
</book>

</bookstore>

```

## Selecting Nodes

XPath uses path expressions to select nodes in an XML document. The node is selected by following a path or steps. The most useful path expressions are listed below:


Expression | Description
-----------|------------------------------------------------------------------------------------------------------
nodename   | Selects all nodes with the name "nodename"
/          | Selects from the root node
//         | Selects nodes in the document from the current node that match the selection no matter where they are
.          | Selects the current node
..         | Selects the parent of the current node
@          | Selects attributes

*Example*

In the table below we have listed some path expressions and the result of the expressions:

Path Expression | Result
----------------|-----------------------------------------------------------------------------------------------------------------------------------------
bookstore       | Selects all nodes with the name "bookstore"
/bookstore      | Selects the root element bookstore <br/>Note: If the path starts with a slash ( / ) it always represents an absolute path to an element!
bookstore/book  | Selects *all book elements* that are children of bookstore
//book          | Selects *all book elements* no matter where they are in the document
bookstore//book | Selects all book elements that are *descendant* of the bookstore element, no matter where they are under the bookstore element
//@lang         | Selects all attributes that are named lang

## Predicates

Predicates are used to find a specific node or a node that contains a specific value.

Predicates are always embedded in square brackets.

In the table below we have listed some path expressions with predicates and the result of the expressions:

Path Expression                    | Result
-----------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
/bookstore/book[1]                 | Selects *the first book element* that is the child of the bookstore element. <br/>Note: In IE 5,6,7,8,9 first node is[0], but according to W3C, it is [1]. To solve this problem in IE, set the SelectionLanguage to XPath: <br/> In JavaScript: xml.setProperty("SelectionLanguage","XPath");
/bookstore/book[last()]            | Selects the last book element that is the child of the bookstore element
/bookstore/book[last()-1]          | Selects the last but one book element that is the child of the bookstore element
/bookstore/book[position()<3]      | Selects the first two book elements that are children of the bookstore element
//title[@lang]                     | Selects all the title elements that have an attribute named lang
//title[@lang='en']                | Selects all the title elements that have a "lang" attribute with a value of "en"
/bookstore/book[price>35.00]       | Selects all the book elements of the bookstore element that have a price element with a value greater than 35.00
/bookstore/book[price>35.00]/title | Selects all the title elements of the book elements of the bookstore element that have a price element with a value greater than 35.00

## Selecting Unknown Nodes

XPath wildcards can be used to select unknown XML nodes.

Wildcard | Description
---------|-----------------------------
`*`      | Matches any element node
@*       | Matches any attribute node
node()   | Matches any node of any kind

In the table below we have listed some path expressions and the result of the expressions:

Path Expression | Result
----------------|-------------------------------------------------------------------------
/bookstore/*    | Selects all the child element nodes of the bookstore element
//*             | Selects all elements in the document
//title[@*]     | Selects all title elements which have at least one attribute of any kind

## Selecting Several Paths

By using the `|` operator in an XPath expression you can select several paths.

In the table below we have listed some path expressions and the result of the expressions:

Path Expression                    | Result
-----------------------------------|-----------------------------------------------------------------------------------------------------------------------
`//book/title \| //book/price`     | Selects all the title AND price elements of all book elements
`//title \| //price`               | Selects all the title AND price elements in the document
`/bookstore/book/title \| //price` | Selects all the title elements of the book element of the bookstore element AND all the price elements in the document

# XPath Axes

🔔 The XML Example Document

We will use the following XML document in the examples below.

```xml
<?xml version="1.0" encoding="UTF-8"?>

<bookstore>

<book>
  <title lang="en">Harry Potter</title>
  <price>29.99</price>
</book>

<book>
  <title lang="en">Learning XML</title>
  <price>39.95</price>
</book>

</bookstore>

```
--*LINK - tbc

## XPath Axes

An axis represents a relationship to the context (current) node, and is used to locate nodes relative to that node on the tree.

AxisName           | Result
-------------------|-----------------------------------------------------------------------------------------------------------------------------
ancestor           | Selects all ancestors (parent, grandparent, etc.) of the current node
ancestor-or-self   | Selects all ancestors (parent, grandparent, etc.) of the current node and the current node itself
attribute          | Selects all attributes of the current node
child              | Selects all children of the current node
descendant         | Selects all descendants (children, grandchildren, etc.) of the current node
descendant-or-self | Selects all descendants (children, grandchildren, etc.) of the current node and the current node itself
following          | Selects everything in the document after the closing tag of the current node
following-sibling  | Selects all siblings after the current node
namespace          | Selects all namespace nodes of the current node
parent             | Selects the parent of the current node
preceding          | Selects all nodes that appear before the current node in the document, except ancestors, attribute nodes and namespace nodes
preceding-sibling  | Selects all siblings before the current node
self               | Selects the current node


## Location Path Expression

A location path can be absolute or relative.

An absolute location path starts with a slash ( / ) and a relative location path does not. In both cases the location path consists of one or more steps, each separated by a slash:

An absolute location path:

/step/step/...

A relative location path:

step/step/...
Each step is evaluated against the nodes in the current node-set.

A step consists of:

an axis (defines the tree-relationship between the selected nodes and the current node)
a node-test (identifies a node within an axis)
zero or more predicates (to further refine the selected node-set)
The syntax for a location step is:

axisname::nodetest[predicate]
Examples
Example	Result
child::book	Selects all book nodes that are children of the current node
attribute::lang	Selects the lang attribute of the current node
child::*	Selects all element children of the current node
attribute::*	Selects all attributes of the current node
child::text()	Selects all text node children of the current node
child::node()	Selects all children of the current node
descendant::book	Selects all book descendants of the current node
ancestor::book	Selects all book ancestors of the current node
ancestor-or-self::book	Selects all book ancestors of the current node - and the current as well if it is a book node
child::*/child::price	Selects all price grandchildren of the current nodeXPath Axes
The XML Example Document
We will use the following XML document in the examples below.

<?xml version="1.0" encoding="UTF-8"?>

<bookstore>

<book>
  <title lang="en">Harry Potter</title>
  <price>29.99</price>
</book>

<book>
  <title lang="en">Learning XML</title>
  <price>39.95</price>
</book>

</bookstore>
XPath Axes
An axis represents a relationship to the context (current) node, and is used to locate nodes relative to that node on the tree.

AxisName	Result
ancestor	Selects all ancestors (parent, grandparent, etc.) of the current node
ancestor-or-self	Selects all ancestors (parent, grandparent, etc.) of the current node and the current node itself
attribute	Selects all attributes of the current node
child	Selects all children of the current node
descendant	Selects all descendants (children, grandchildren, etc.) of the current node
descendant-or-self	Selects all descendants (children, grandchildren, etc.) of the current node and the current node itself
following	Selects everything in the document after the closing tag of the current node
following-sibling	Selects all siblings after the current node
namespace	Selects all namespace nodes of the current node
parent	Selects the parent of the current node
preceding	Selects all nodes that appear before the current node in the document, except ancestors, attribute nodes and namespace nodes
preceding-sibling	Selects all siblings before the current node
self	Selects the current node
ADVERTISEMENT

Location Path Expression
A location path can be absolute or relative.

An absolute location path starts with a slash ( / ) and a relative location path does not. In both cases the location path consists of one or more steps, each separated by a slash:

An absolute location path:

/step/step/...

A relative location path:

step/step/...
Each step is evaluated against the nodes in the current node-set.

A step consists of:

an axis (defines the tree-relationship between the selected nodes and the current node)
a node-test (identifies a node within an axis)
zero or more predicates (to further refine the selected node-set)
The syntax for a location step is:

axisname::nodetest[predicate]
Examples
Example	Result
child::book	Selects all book nodes that are children of the current node
attribute::lang	Selects the lang attribute of the current node
child::*	Selects all element children of the current node
attribute::*	Selects all attributes of the current node
child::text()	Selects all text node children of the current node
child::node()	Selects all children of the current node
descendant::book	Selects all book descendants of the current node
ancestor::book	Selects all book ancestors of the current node
ancestor-or-self::book	Selects all book ancestors of the current node - and the current as well if it is a book node
child::*/child::price	Selects all price grandchildren of the current node


# XPath Operators

An XPath expression returns either a node-set, a string, a Boolean, or a number.

## XPath Operators

Below is a list of the operators that can be used in XPath expressions:

Operator | Description                  | Example
---------|------------------------------|---------------------------
\|       | Computes two node-sets       | `//book \| //cd`
\+       | Addition                     | 6 + 4
\-       | Subtraction                  | 6 - 4
\*       | Multiplication               | 6 * 4
div      | Division                     | 8 div 4
=        | Equal                        | price=9.80
!=       | Not equal                    | price!=9.80
\<       | Less than                    | price<9.80
\<=      | Less than or equal to        | price<=9.80
\>       | Greater than                 | price>9.80
\>=      | Greater than or equal to     | price>=9.80
or       | or                           | price=9.80 or price=9.70
and      | and                          | price>9.00 and price\<9.90
mod      | Modulus (division remainder) | 5 mod 2

# XPath Examples

Let's try to learn some basic XPath syntax by looking at some examples.

🔔 The XML Example Document

We will use the following XML document in the examples below.

"books.xml":

```xml
<?xml version="1.0" encoding="UTF-8"?>

<bookstore>

<book category="cooking">
  <title lang="en">Everyday Italian</title>
  <author>Giada De Laurentiis</author>
  <year>2005</year>
  <price>30.00</price>
</book>

<book category="children">
  <title lang="en">Harry Potter</title>
  <author>J K. Rowling</author>
  <year>2005</year>
  <price>29.99</price>
</book>

<book category="web">
  <title lang="en">XQuery Kick Start</title>
  <author>James McGovern</author>
  <author>Per Bothner</author>
  <author>Kurt Cagle</author>
  <author>James Linn</author>
  <author>Vaidyanathan Nagarajan</author>
  <year>2003</year>
  <price>49.99</price>
</book>

<book category="web">
  <title lang="en">Learning XML</title>
  <author>Erik T. Ray</author>
  <year>2003</year>
  <price>39.95</price>
</book>

</bookstore>

```

View the "books.xml" file in your browser. (https://www.w3schools.com/xml/books.xml)

## Loading the XML Document

Using an XMLHttpRequest object to load XML documents is supported in all modern browsers.

```js
var xmlhttp = new XMLHttpRequest();

```

## Selecting Nodes

Unfortunately, there are different ways of dealing with XPath in different browsers.

Chrome, Firefox, Edge, Opera, and Safari use the evaluate() method to select nodes:

```js
xmlDoc.evaluate(xpath, xmlDoc, null, XPathResult.ANY_TYPE,null);

//Internet Explorer uses the selectNodes() method to select node:
xmlDoc.selectNodes(xpath);

```

## Select all the titles

The following example selects all the title nodes:

Example

```xpath
/bookstore/book/title

```

Try : https://www.w3schools.com/xml/tryit.asp?filename=try_xpath_select_cdnodes

```text
// Output
Everyday Italian
Harry Potter
XQuery Kick Start
Learning XML
```

## Select the title of the first book

The following example selects the title of the first book node under the bookstore element:

Example

```html
/bookstore/book[1]/title

```

```js
// Output
Everyday Italian
```

Try : https://www.w3schools.com/xml/tryit.asp?filename=try_xpath_select_cdnodes_first

## Select all the prices

The following example selects the text from all the price nodes:

Example

```html
/bookstore/book/price[text()]

```

## Select price nodes with price>35

The following example selects all the price nodes with a price higher than 35:

Example

```html
/bookstore/book[price>35]/price

```
## Select title nodes with price>35

The following example selects all the title nodes with a price higher than 35:

Example

```html
/bookstore/book[price>35]/title

```

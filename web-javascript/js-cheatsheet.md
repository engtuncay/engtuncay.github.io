

- [Objects](#objects)
- [Function](#function)
  - [Function Declaration](#function-declaration)
  - [Function Expression](#function-expression)
  - [Calling Function](#calling-function)
  - [Arrow Function](#arrow-function)
- [Modules](#modules)


# Objects

- Objects are *associative arrays* with several special features.

- They store properties (key-value pairs)
  - Property keys must be strings or symbols (usually strings)
  - Values can be of any type.

To access a property, we can use:
- The dot notation: `obj.property`.
- Square brackets notation `obj["property"]`. Square brackets allow to take the key from a variable, like `obj[varWithKey]`.

Additional operators:
- To delete a property: `delete obj.prop`.
- To check if a property with the given key exists: `"key" in obj`.
- To iterate over an object: `for (let key in obj)` loop.

What we've studied in this chapter is called a "plain object", or just `Object`.

There are many other kinds of objects in JavaScript:

- `Array` to store ordered data collections,
- `Date` to store the information about the date and time,
- `Error` to store the information about an error.
- ...And so on.

# Function

## Function Declaration

```js
function sayHi() {
  alert( "Hello" );
}
```

## Function Expression

```js
let sayHi = function() {
  alert( "Hello" );
};
```

## Calling Function

```js
  sayHi();
```

## Arrow Function

```js
let func = (arg1, arg2, ..., argN) => expression
```

```js
let func = function(arg1, arg2, ..., argN) {
  return expression;
};
```

[detail](./js-intro-02-04-functions.md)

# Modules

- Before declaration of a class/function/..:
  - `export [default] class/function/variable ...`
- Standalone export:
  - `export {x [as y], ...}`.
- Re-export:
  - `export {x [as y], ...} from "module"`
  - `export * from "module"` (doesn't re-export default).
  - `export {default [as y]} from "module"` (re-export default).

Import:

- Importing named exports:
  - `import {x [as y], ...} from "module"`
- Importing the default export:  
  - `import x from "module"`
  - `import {default as x} from "module"`
- Import all:
  - `import * as obj from "module"`
- Import the module (its code runs), but do not assign any of its exports to variables:
  - `import "module"`

We can put `import/export` statements at the top or at the bottom of a script, that doesn't matter.
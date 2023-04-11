

- [Function](#function)
  - [Function Declaration](#function-declaration)
  - [Function Expression](#function-expression)
  - [Calling Function](#calling-function)
  - [Arrow Function](#arrow-function)
- [Modules](#modules)


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

- [Js Refreshing](#js-refreshing)
  - [Destructing](#destructing)
  - [Reference and Primitive Types](#reference-and-primitive-types)

# Js Refreshing

## Destructing

Easily extract array elements or object properties and store them in variables

**Array Destructing**

```js
[a,b] = ['Hello','Max'];
console.log(a); // Hello
console.log(b); // Max
```

**Object Destructing**

```js
{name} = { name: "John", age: 25};
console.log(name); // John
console.log(age); // undefined

```

## Reference and Primitive Types

- Number,Strings and boolean are so called primitive types.

```js
const number1= 10;
const number2 = number1; // number1 value is copied to number2.

```

- Object, arrays are reference types.

```js
const person = { name: "John"};
const person2 = person; // person pointer is copied to person2. Both indicate same object.
person.name = 'Max';
console.log(person2.name); // Max

```

- for copying an object spread operator is used.

```js
const person2 = { ...person};

```


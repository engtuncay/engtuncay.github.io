
- [Js Refreshing](#js-refreshing)
  - [Class](#class)
  - [Spread And Rest Operator](#spread-and-rest-operator)
  - [Destructing](#destructing)
  - [Reference and Primitive Types](#reference-and-primitive-types)
  - [Array Functions](#array-functions)

# Js Refreshing

## Class

person.js
```js
cont person = { name:'Ali' }
export default person;
```

utility.js
```js
export const clean = () => { /*...*/ }
export const baseData = 10;
```

app.js
```js
import person from './person.js'
//or
import prs from './person.js'

import {baseData} from './utility.js'
import {clean} from './utility.js'
```

**Class kullanımı**

```js
class Person {
  name = 'Ali'; // property
  call = () => { /*...*/ } // method
}
```

- ES6'da propert değer ataması constructor içerisinden yapılabiliyordu. ES7'de direk atama yapılabiliyor.
- method klasik şekilde de yazılabilir. (es6) , fakat kullanılmamalı.

```js
myperson = new Person();
myperson.call();
console.log(myperson.name);
```

**Inheritance**

```js
class Person extends Master {
  construct() {
    super(); // must use to call upper class constructor
    /* ... */
  }
}

```

-- code play de ES6/BABEL interpreter seçilmeli çalıştırmak için.

## Spread And Rest Operator

Spread is used to split up array elements or object properties.

```js
const newArray = [...oldArray,1,2];
const newObject = { ...oldObject, newProp:5 };
```

Rest is used to merge a list of function arguments into an array.

```js
function sortArgs(...args) {
  return args.sort();
}
```



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

- For copying an object spread operator is used.

```js
const person2 = { ...person};

```

---
**Concepts**

- Mutable
- Immutable

---

## Array Functions

```js
const numbers = [1,2,3]
const doubleNum = numbers.map( (number) => number*2);
console.log(numbers); // [1,2,3]
console.log(doubleNum); // [2,4,6]

```





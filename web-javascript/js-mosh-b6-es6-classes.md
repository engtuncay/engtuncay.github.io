

# Es6 Classes

```js
class {
  // body of class
  constructor(radius){
    this.radius = radius;
  }

  draw(){
    console.log("draw");
  }
}

```

- in js , class is syntactic sugar

- type of Circle --> "function"

- Babel compiles ES6 to ES5.

- invoking Circle class without new 

```js
const c = Circle(1);

// gives error that Class constructor Circle cannot be invoked without new.

```

# 2 Hoisting

- function declarations are hoisted. (function tanımından önce call edilebilir.)

```js
sayHello();

// function declaration
function sayHello(){
  
}

// function expression
const sayGoodBye = function(){ }


```

- same for classes. class declarations are hoisted.

```js
const c = new Circle();

// class declaration
class Circle {

}

// class expression
const Square = class {

};

```
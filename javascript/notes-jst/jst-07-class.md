
Source : https://www.javascripttutorial.net/javascript-class/

(some parts may be modified or removed)

[Back](../readme.md)

---

# Contents

- [Contents](#contents)
- [Class](#class)
  - [ES6 class declaration](#es6-class-declaration)
- [Getters and Setters](#getters-and-setters)
- [Class Expressions](#class-expressions)
- [Computed Properties (dynamic property)](#computed-properties-dynamic-property)
- [Inheritance Using extends \& super](#inheritance-using-extends--super)
  - [Shadowing methods (overriding)](#shadowing-methods-overriding)
  - [Inheriting static members](#inheriting-static-members)
  - [Inheriting from built-in types](#inheriting-from-built-in-types)
- [new.target Metaproperty](#newtarget-metaproperty)
- [Static Methods](#static-methods)
- [Static Properties](#static-properties)
- [Private Fields](#private-fields)
- [Private Methods](#private-methods)
- [instanceof](#instanceof)
- [Recap of Class Section](#recap-of-class-section)
  - [ES6 class declaration](#es6-class-declaration-1)
  - [Getter and Setter](#getter-and-setter)


# Class

A JavaScript class is a blueprint for creating objects. A class encapsulates data and functions (methods) that manipulate data.

Unlike other programming languages such as Java and C#, JavaScript classes are `syntactic sugar` over the prototypal inheritance. In other words, ES6 classes are just special functions.

➖ Classes before ES6 revisited

Before ES6, JavaScript had no concept of classes. To mimic a class, you often use the `constructor/prototype pattern` as shown in the following example:

```js
function Person(name) {
    this.name = name;
}

Person.prototype.getName = function () {
    return this.name;
};

var john = new Person("John Doe");
console.log(john.getName());

// Output:
// 
// John Doe
// How it works.

```

First, create the Person as a constructor function that has a property name called name. The getName() function is assigned to the prototype so that it can be `shared by all instances of the Person type`.

Then, create a new instance of the Person type using the new operator. The john object, hence, is an instance of `the Person and Object through prototypal inheritance`.

The following statements use the instanceof operator to check if john is an instance of the Person and Object type:

```js
console.log(john instanceof Person); // true
console.log(john instanceof Object); // true

```

## ES6 class declaration

ES6 introduced a new syntax for declaring a class as shown in this example:

```js
class Person {
    constructor(name) {
        this.name = name;
    }
    getName() {
        return this.name;
    }
}

```

This Person class behaves like the Person type in the previous example. However, instead of using a `constructor/prototype` pattern, it uses the `class keyword`.

In the Person class, the constructor() is where you can initialize the properties of an instance. JavaScript automatically calls the constructor() method when you instantiate an object of the class.

The following creates a new Person object, which will automatically call the constructor() of the Person class:

```js
let john = new Person("John Doe");

```

The getName() is called a method of the Person class. Like a constructor function, you can call the methods of a class using the following syntax:

```js
objectName.methodName(args)

```

For example:

```js
let name = john.getName();
console.log(name); // "John Doe"

```

To verify the fact that classes are `special functions`, you can use the `typeof operator` of to check the type of the Person class ❗

```js
console.log(typeof Person); // function

```

It returns function as expected.

The john object is also an instance of the Person and Object types:

```js
console.log(john instanceof Person); // true
console.log(john instanceof Object); // true


```
➖ Class vs. Custom type

Despite the similarities between a class and a custom type defined via a constructor function, there are some important differences.

First, class declarations are not `hoisted` like function declarations.

For example, if you place the following code above the Person class declaration section, you will get a ReferenceError.

```js
let john = new Person("John Doe");

// Error:
// 
// Uncaught ReferenceError: Person is not defined

```

Second, all the code inside a class automatically executes in the strict mode. And you cannot change this behavior. (???)

Third, class methods are `non-enumerable`. If you use a constructor/prototype pattern, you have to use the `Object.defineProperty()` method to make a property non-enumerable. (???)

Finally, calling the class constructor `without the new operator` will result in an error as shown in the following example.

```js
let john = Person("John Doe");

// Error:
// 
// Uncaught TypeError: Class constructor Person cannot be invoked without 'new'

```

Note that it’s possible to call the constructor function without the new operator. In this case, the constructor function behaves like a regular function.

➖ Summary

- Use the JavaScript class keyword to declare a new class.
- A class declaration is syntactic sugar over prototypal inheritance with additional enhancements.

[🔝](#contents)

# Getters and Setters

The following example defines a class called Person:

```js
class Person {
    constructor(name) {
        this.name = name;
    }
}

let person = new Person("John");
console.log(person.name); // John

```

The Person class has a property name and a constructor. The constructor initializes the name property to a string.

Sometimes, you don’t want the name property to be accessed directly like this:

```js
person.name

```

To do that, you may come up with a pair of methods that manipulate the name property. For example:

```js
class Person {
    constructor(name) {
        this.setName(name);
    }
    getName() {
        return this.name;
    }
    setName(newName) {
        newName = newName.trim();
        if (newName === '') {
            throw 'The name cannot be empty';
        }
        this.name = newName;
    }
}

let person = new Person('Jane Doe');
console.log(person); // Jane Doe

person.setName('Jane Smith');
console.log(person.getName()); // Jane Smith

```

In this example, the Person class has the name property. Also, it has two additional methods `getName() and setName()`.

The getName() method returns the value of the name property.

The setName() method assigns an argument to the name property. The setName() removes the whitespaces from both ends of the newName argument and throws an exception if the newName is empty.

The constructor() calls the setName() method to initialize the name property:

```js
constructor(name) {
    this.setName(name);
}

```

The getName() and setName() methods are known as `getter and setter` in other programming languages such as Java and C++.

ES6 provides a specific syntax for defining the getter and setter using the get and set keywords. For example:

```js
class Person {
    constructor(name) {
        this._name = name;
    }
    get name() {
        return this._name;
    }
    set name(newName) {
        newName = newName.trim();
        if (newName === '') {
            throw 'The name cannot be empty';
        }
        this._name = newName;
    }
}

```

How it works.

- First, the name property is changed to _name to avoid the name collision with the getter and setter.

- Second, the getter uses the get keyword followed by the method name:

```js
get name() {
    return this._name;
}

```

To call the getter (❗), you use the following syntax:

```js
let name = person.name;

```

When JavaScript sees the access to name property of the Person class, it checks if the Person class has any `name property`.

If not, JavaScript checks if the Person class has any method that `binds to the name property`. In this example, the `name()` method binds to the name property via the get keyword. Once JavaScript finds the getter method, it executes the getter method and returns a value ❗

Third, the setter uses the set keyword followed by the method name:

```js
set name(newName) {
    newName = newName.trim();
    if (newName === '') {
        throw 'The name cannot be empty';
    }
    this._name = newName;
}

```

JavaScript will call the `name()` setter when you assign a value to the name property like this:

```js
person.name = 'Jane Smith';

```

If a class has only a getter but not a setter and you attempt to use the setter, the change won’t take any effect (❗). See the following example:

```js
class Person {
    constructor(name) {
        this._name = name;
    }
    get name() {
        return this._name;
    }
}

let person = new Person("Jane Doe");
console.log(person.name);

// attempt to change the name, but cannot
person.name = 'Jane Smith';
console.log(person.name); // Jane Doe

```

In this example, the Person class has the name getter but not the name setter. It attempts to call the setter. However, the change doesn’t take effect since the Person class doesn’t have the name setter.

➖ Using getter in an object literal

The following example defines a getter called latest to return the latest attendee of the meeting object:

```js
let meeting = {
    attendees: [],
    add(attendee) {
        console.log(`${attendee} joined the meeting.`);
        this.attendees.push(attendee);
        return this;
    },
    get latest() {
        let count = this.attendees.length;
        return count == 0 ? undefined : this.attendees[count - 1];
    }
};

meeting.add('John').add('Jane').add('Peter');
console.log(`The latest attendee is ${meeting.latest}.`);

// Output:
// 
// John joined a meeting.
// Jane joined a meeting.
// Peter joined a meeting.
// The latest attendee is Peter.

```
➖ Summary

- Use the get and set keywords to define the JavaScript getters and setters for a class or an object.
- The get keyword binds an object property to a method that will be invoked when that property is looked up.
- The set keyword binds an object property to a method that will be invoked when that property is assigned.

[🔝](#contents)

TBC - 20251126 - 0911 

# Class Expressions

Similar to functions, classes have `expression forms`. A class expression provides you with an alternative way to define a new class.

A class expression doesn’t require an identifier after the class keyword. You can use a class expression in a variable declaration and pass it into a function as an argument.

For example, the following defines a class expression:

```js
let Person = class {
    constructor(name) {
        this.name = name;
    }
    getName() {
        return this.name;
    }
}

```

How it works.

On the left side of the expression is the Person variable. It’s assigned to a class expression.

The class expression starts with the keyword `class` followed by `the class definition`.

A class expression may have a name or not. In this example, we have an unnamed class expression ❗

If a class expression has a name, its name can be local to the class body.

The following creates an instance of the Person class expression. Its syntax is the same as if it were a class declaration.

```js
let person = new Person('John Doe');

```
Like a class declaration, the type of a class expression is also a function:

```js
console.log(typeof Person); // function

```

Similar to function expressions, class expressions are `not hoisted` ❗ It means that you cannot create an instance of the class before defining the class expression.

➖ First-class citizen

JavaScript classes are first-class citizens. It means that you can pass a class into a function, return it from a function, and assign it to a variable ❗

See the following example:

```js
function factory(aClass) {
    return new aClass();
}

let greeting = factory(class {
    sayHi() { console.log('Hi'); }
});

greeting.sayHi(); // 'Hi'

```

How it works.

First, define a factory() function that takes a class expression as an argument and returns the instance of the class:

```js
function factory(aClass) {
    return new aClass();
}

```

Second, pass an unnamed class expression to the factory() function and assign its result to the greeting variable:

```js
let greeting = factory(class {
    sayHi() { console.log('Hi'); }
});

```

The class expression has a method called `sayHi()`. And the greeting variable is an instance of the class expression.

Third, call the sayHi() method on the greeting object:

```js
greeting.sayHi(); // 'Hi'

```

➖ Singleton

Singleton is a design pattern that limits the instantiation of a class to a single instance. It ensures that only one instance of a class can be created throughout the system.

Class expressions can be used to create a singleton by calling the class constructor immediately.

To do that, you use the new operator with a class expression and include the parentheses at the end of the class declaration as shown in the following example:

```js
let app = new class {
    constructor(name) {
        this.name = name;
    }
    start() {
        console.log(`Starting the ${this.name}...`);
    }
}('Awesome App');

app.start(); // Starting the Awesome App...
```

How it works.

The following is an unnamed class expression:

```js
new class {
    constructor(name) {
        this.name = name;
    }
    start() {
        console.log(`Starting the ${this.name}...`);
    }
}

```

The class has a constructor() that accepts an argument. It also has a method called `start()`.

The class expression evaluates to a class. Therefore, you can call its constructor immediately by placing parentheses after the expression:

```js
new class {
    constructor(name) {
        this.name = name;
    }
    start() {
        console.log(`Starting the ${this.name}...`);
    }
}('Awesome App')

```

This expression returns an instance of the class expression which is assigned to the app variable.

The following calls the start() method on the app object:

```js
app.start(); // Starting the Awesome App...

```

Summary

- ES6 provides you with an alternative way to define a new class using a class expression.
- Class expressions can be named or unnamed.
- The class expression can be used to create a singleton object.

[🔝](#contents)

# Computed Properties (dynamic property)

Computed properties allow you to create object properties dynamically using an expression in square brackets `[]`.

Here’s the syntax of the computed property:

```js
let propertyName = 'dynamicPropertyName';
const obj = {
    [propertyName] : value
}

```

In this syntax:

`propertyName` is a variable that stores the property name.

`[propertyName]` is a computed property name of the object literal obj . The property name is derived from the value of the propertyName variable.

value is the value of the computed property, which can be any valid JavaScript expression.
Once you define a computed property, you can access it as follows:

```js
obj.dynamicPropertyName

```

🧲 JavaScript Computed Property examples

Let’s take some examples of using the JavaScript computed properties.

➖ 1) Basic JavaScript computed property example

The following example shows how to use a computed property name:

```js
let propName = 'c';

const rank = {
  a: 1,
  b: 2,
  [propName]: 3,
};

console.log(rank.c); // 3

```

In this example, the `[propName]` is a computed property of the rank object. The property name is derived from the value of the propName variable.

When you access `c property` of the rank object, JavaScript evaluates propName and returns the property’s value.

➖ 2) Using a computed property in a class

Like an object literal, you can use computed properties for getters and setters of a class. For example:

```js
const name = 'fullName';

class Person {
  constructor(firstName, lastName) {
    this.firstName = firstName;
    this.lastName = lastName;
  }
  get [name]() {
    return `${this.firstName} ${this.lastName}`;
  }
}

let person = new Person('John', 'Doe');
console.log(person.fullName);

// Output:
// 
// John Doe
// How it works:

```

The `get[name]` is a computed property name of a getter of the Person class. At runtime, when you access the fullName property, the person object calls the getter and returns the full name.

➖ 3) Creating an object from a key/value pair

The following example shows how to use computed properties to create an object from a key/value pair:

```js
const createObject = (key, value) => {
  return {
    [key]: value,
  };
};

const person = createObject('name', 'John');
console.log(person);

// Output:
// 
// { name: 'John' }

```

Note that without computed property, you have to create an object first, and use bracket notation to assign property to value like this:

```js
const createObject = (key, value) => {
  let obj = {};
  obj[key] = value;
  return obj;
};

const person = createObject('name', 'John');
console.log(person);

// Output:
// 
// { name: 'John' }

```

Summary
- Computed properties allow you to use the values of expressions as property names of an object.

[🔝](#contents)

# Inheritance Using extends & super

Prior to ES6, implementing a proper inheritance required multiple steps. One of the most commonly used strategies is prototypal inheritance. 

The following illustrates how the Bird inherits properties from the Animal using the prototypal inheritance technique:

```js
function Animal(legs) {
    this.legs = legs;
}

Animal.prototype.walk = function() {
    console.log('walking on ' + this.legs + ' legs');
}

function Bird(legs) {
    Animal.call(this, legs);
}

Bird.prototype = Object.create(Animal.prototype);
Bird.prototype.constructor = Animal;


Bird.prototype.fly = function() {
    console.log('flying');
}

var pigeon = new Bird(2);
pigeon.walk(); // walking on 2 legs
pigeon.fly();  // flying

```
(???)

ES6 simplified these steps by using the `extends` and `super` keywords.

The following example defines the Animal and Bird classes and establishes the inheritance through the extends and super keywords.

```js
class Animal {
    constructor(legs) {
        this.legs = legs;
    }
    walk() {
        console.log('walking on ' + this.legs + ' legs');
    }
}

class Bird extends Animal {
    constructor(legs) {
        super(legs);
    }
    fly() {
        console.log('flying');
    }
}


let bird = new Bird(2);

bird.walk();
bird.fly();

```

How it works.

First, use the extends keyword to make the Bird class inheriting from the Animal class:

```js
class Bird extends Animal {
   // ...
}

```

➖ base,parent and derived class

The Animal class is called a `base` class or `parent` class while the Bird class is known as a `derived class` or child class. By doing this, the Bird class inherits all methods and properties of the Animal class.

Second, in the Bird‘s constructor, call `super()` to invoke the Animal‘s constructor with the legs argument.

JavaScript requires the child class to call super() if it has a constructor. As you can see in the Bird class, the super(legs) is equivalent to the following statement in ES5: (???)

```js
Animal.call(this, legs);

```

If the Bird class doesn’t have a constructor, you don’t need to do anything else:

```js
class Bird extends Animal {
    fly() {
        console.log('flying');
    }
}

```

It is equivalent to the following class:

```js
class Bird extends Animal {
    constructor(...args) {
        super(...args);
    }
    fly() {
        console.log('flying');
    }
}

```

However, the child class has a constructor, it needs to call super(). For example, the following code results in an error:

```js
class Bird extends Animal {
    constructor(legs) {
    }
    fly() {
        console.log('flying');
    }
}

//Error:
//
// ReferenceError: Must call super constructor in derived class before accessing 'this' or returning from derived constructor
```

Because the super() initializes the this object, you need to call the super() before accessing the this object. Trying to access this before calling `super()` also results in an error.

For example, if you want to initialize the color property of the Bird class, you can do it as follows:

```js
class Bird extends Animal {
	constructor(legs, color) {
		super(legs);
		this.color = color;
	}
	fly() {
		console.log("flying");
	}
	getColor() {
		return this.color;
	}
}

let pegion = new Bird(2, "white");
console.log(pegion.getColor());

```

## Shadowing methods (overriding)

ES6 allows the child class and parent class to have methods with the same name. In this case, when you call the method of an object of the child class, the method in the child class will shadow the method in the parent class.

The following Dog class extends the Animal class and redefines the walk() method:

```js
class Dog extends Animal {
    constructor() {
        super(4);
    }
    walk() {
        console.log(`go walking`);
    }
}

let bingo = new Dog();
bingo.walk(); // go walking

```

To call the method of the parent class in the child class, you use super.method(arguments) like this:

```js
class Dog extends Animal {
    constructor() {
        super(4);
    }
    walk() {
        super.walk();
        console.log(`go walking`);
    }
}

let bingo = new Dog();
bingo.walk();

// walking on 4 legs
// go walking

```

## Inheriting static members

Besides the properties and methods, the child class also inherits all static properties and methods of the parent class. For example:

```js
class Animal {
    constructor(legs) {
        this.legs = legs;
    }
    walk() {
        console.log('walking on ' + this.legs + ' legs');
    }
    static helloWorld() {
        console.log('Hello World');
    }
}

class Bird extends Animal {
    fly() {
        console.log('flying');
    }
}

```

In this example, the Animal class has the `helloWorld()` static method and this method is available as Bird.`helloWorld()` and behaves the same as the `Animal.helloWorld()` method:

```js
Bird.helloWorld(); // Hello World

```

##  Inheriting from built-in types

JavaScript allows you to extend a built-in type such as Array, String, Map, and Set through inheritance.

The following Queue class `extends the Array reference type`. The syntax is much cleaner than the Queue implemented using the constructor/prototype pattern.

```js
class Queue extends Array {
    enqueue(e) {
        super.push(e);
    }
    dequeue() {
        return super.shift();
    }
    peek() {
        return !this.empty() ? this[0] : undefined;
    }
    empty() {
        return this.length === 0;
    }
}

var customers = new Queue();
customers.enqueue('A');
customers.enqueue('B');
customers.enqueue('C');

while (!customers.empty()) {
    console.log(customers.dequeue());
}

```

➖ Summary

- Use the extends keyword to implement the inheritance in ES6. The class to be extended is called a base class or parent class. The class that extends the base class or parent class is called the derived class or child class.
- Call the super(arguments) in the child class’s constructor to invoke the parent class’s constructor.
- Use super keyword to call methods of the parent class in the methods of the child class.

[🔝](#contents)

# new.target Metaproperty

ES6 provides a `metaproperty` named `new.target` that allows you to detect whether a function or constructor was called using the new operator.

The new.target is available in all functions. However, in arrow functions, the new.target is the one that belongs to the surrounding function.

The new.target is very useful to inspect at runtime whether a function is being executed as a function or as a constructor. It is also handy to determine a specific derived class that was called by using the new operator from within a parent class.

JavaScript new.target in functions

Let’s see the following Person constructor function:

```js
function Person(name) {
    this.name = name;
}

```

You can create a new object from the Person function by using the new operator as follows:

```js
let john = new Person('John');
console.log(john.name); // john

```

Or you can call the Person as a function:

```js
Person('Lily');

```

Because the this is set to the global object i.e., the window object when you run JavaScript in the web browser, the name property is added to the window object (❗) as follows:

```js
console.log(window.name); //Lily

```

To help you detect whether a function was called using the new operator, you use the new.target metaproperty.

In a regular function call, the new.target returns undefined. If the function was called with the new operator, the new.target returns a reference to the function.

Suppose you don’t want the Person to be called as a function, you can use the new.target as follows:

```js
function Person(name) {
    if (!new.target) {
        throw "must use new operator with Person";
    }
    this.name = name;
}

```

Now, the only way to use Person is to instantiate an object from it by using the new operator. If you try to invoke it like a regular function, you will encounter an error.

➖ JavaScript new.target in constructors

In a class constructor, the new.target refers to the constructor that was invoked directly by the new operator. It is true if the constructor is in the parent class and was delegated from the constructor of the child class:

```js
class Person {
    constructor(name) {
        this.name = name;
        console.log(new.target.name);
    }
}

class Employee extends Person {
    constructor(name, title) {
        super(name);
        this.title = title;
    }
}

let john = new Person('John Doe'); // Person
let lily = new Employee('Lily Bush', 'Programmer'); // Employee

```

In this example, new.target.name is the human-friendly name of the constructor reference of new.target

[🔝](#contents)

# Static Methods

By definition, static methods are bound to a class, not the instances of that class. Therefore, static methods are useful for defining helper or utility methods.

To define a static method before ES6, you add it directly to the constructor of the class. For example, suppose you have a Person type as follows:

(before ES6)

```js
function Person(name) {
    this.name = name;
}

Person.prototype.getName = function () {
    return this.name;
};

```

The following adds a static method called `createAnonymous()` to the Person type:

```js
Person.createAnonymous = function (gender) {
    let name = gender == "male" ? "John Doe" : "Jane Doe";
    return new Person(name);
};

```

The createAnonymous() method is considered a static method because it doesn’t depend on any instance of the Person type for its property values.

To call the createAnonymous() method, you use the Person type instead of its instances:

```js
var anonymous = Person.createAnonymous();

```

➖ JavaScript static methods in ES6

In ES6, you define static methods using the `static` keyword. The following example defines a static method called createAnonymous() for the Person class:

```js
class Person {
	constructor(name) {
		this.name = name;
	}
	getName() {
		return this.name;
	}
	static createAnonymous(gender) {
		let name = gender == "male" ? "John Doe" : "Jane Doe";
		return new Person(name);
	}
}

```

To invoke the static method, you use the following syntax:

```js
let anonymous = Person.createAnonymous("male");

```

If you attempt to call the static method from an instance of the class, you’ll get an error. For example:

```js
let person = new Person('James Doe');
let anonymous = person.createAnonymous("male");

// Error:
// 
// TypeError: person.createAnonymous is not a function
```

➖ Calling a static method from the class constructor or an instance method

To call a static method from a class constructor or an instance method, you use the class name, followed by the . and the static method:

```js
className.staticMethodName();

```

Alternatively, you can use the following syntax:

```js
this.constructor.staticMethodName();

```

Summary
- JavaScript static methods are shared among instances of a class. Therefore, they are bound to the class.
- Call the static methods via the class name, not the instances of that class.
- Use the className.staticMethodName() or this.constructor.staticMethodName() to call a static method in a class constructor or an instance method.

[🔝](#contents)

# Static Properties

Like a static method, a static property is shared by all instances of a class. To define static property, you use the static keyword followed by the property name like this:

```js
class Item {
  static count = 0;
}

```

To access a static property, you use the class name followed by the . operator and the static property name. For example:

```js
console.log(Item.count); // 0

```

To access the static property in a static method, you use the class name followed by the . operator and the static property name. For example:

```js
class Item {
  static count = 0;

  static getCount() {
    return Item.count;
  }
}

console.log(Item.getCount()); // 0

```

To access a static property in a class constructor or instance method, you use the following syntax:

```js
className.staticPropertyName;

```

Or

```js
this.constructor.staticPropertyName;

```

The following example increases the count static property in the class constructor:

```js
class Item {
  constructor(name, quantity) {
    this.name = name;
    this.quantity = quantity;
    this.constructor.count++;
  }
  static count = 0;
  static getCount() {
    return Item.count;
  }
}

```

When you create a new instance of the Item class, the following statement increases the count static property by one:

```js
this.constructor.count++;

```

For example:

```js
// Item class ...

let pen = new Item("Pen", 5);
let notebook = new Item("notebook", 10);

console.log(Item.getCount()); // 2

```

This example creates two instances of the Item class, which calls the class constructor. Since the class constructor increases the count property by one each time it’s called, the value of the count is two.

Put it all together.

```js
class Item {
  constructor(name, quantity) {
    this.name = name;
    this.quantity = quantity;
    this.constructor.count++;
  }
  static count = 0;
  static getCount() {
    return Item.count;
  }
}

let pen = new Item('Pen', 5);
let notebook = new Item('notebook', 10);

console.log(Item.getCount()); // 2

```

➖ Summary

- A static property of a class is shared by all instances of that class.
- Use the static keyword to define a static property.
- Use the `className.staticPropertyName` to access the static property in a static method.
- Use the this.constructor.staticPropertyName or className.staticPropertyName to access the static property in a constructor.

[🔝](#contents)

# Private Fields

ES2022 allows you to define private fields for a class. To define a private field, you prefix the field name with the `#` sign.

For example, the following defines the Circle class with a private field radius:

```js
class Circle {
  #radius;
  constructor(value) {
    this.#radius = value;
  }
  get area() {
    return Math.PI * Math.pow(this.#radius, 2);
  }
}

```

In this example:

- First, define the private field `#radius` in the class body.
- Second, initialize the `#radius` field in the constructor with an argument.
- Third, calculate the area of the circle by accessing the `#radius` private field in the getter method.

The following creates a new instance of the Circle class and calculates its area:

```js
let circle = new Circle(10);
console.log(circle.area); // 314.1592653589793

```

Because the `#radius` is a private field, you can only access it inside the Circle class. In other words, the `#radius` field is invisible outside of the Circle class.

➖ Using getter and setter to access private fields

The following redefines the Circle class by adding the radius getter and setter to provide access to the `#radius` private field:

```js
class Circle {
  #radius = 0;
  
  constructor(radius) {
    this.radius = radius; // calling setter
  }
  
  get area() {
    return Math.PI * Math.pow(this.#radius, 2);
  }

  set radius(value) {
    if (typeof value === 'number' && value > 0) {
      this.#radius = value;
    } else {
      throw 'The radius must be a positive number';
    }
  }

  get radius() {
    return this.#radius;
  }
}

```

How it works.

The radius setter validates the argument before assigning it to the `#radius` private field. If the argument is not a positive number, the radius setter throws an error.

The radius getter returns the value of the `#radius` private field.

The constructor calls the radius setter to assign the argument to the `#radius` private field.

➖ Private fields and subclasses

Private fields are only accessible inside the class where they’re defined. Also, they’re not accessible from the subclasses. For example, the following defines the Cylinder class that extends the Circle class:

```js
class Cylinder extends Circle {
  #height;
  constructor(radius, height) {
    super(radius);
    this.#height = height;

    // cannot access the #radius of the Circle class here
  }
}

```

If you attempt to access the `#radius` private field in the Cylinder class, you’ll get a SyntaxError.

➖ The in operator: check private fields exist

To check if an object has a private field inside a class, you use the in operator:

```js
fieldName in objectName

```

For example, the following adds the `hasRadius()` static method to the Circle class that uses the in operator to check if the circle object has the `#radius` private field:

```js
class Circle {

  #radius = 0;
  
  constructor(radius) {
    this.radius = radius;
  }
  
  get area() {
    return Math.PI * Math.pow(this.radius, 2);
  }
  
  set radius(value) {
    if (typeof value === 'number' && value > 0) {
      this.#radius = value;
    } else {
      throw 'The radius must be a positive number';
    }
  }
  
  get radius() {
    return this.#radius;
  }
  
  static hasRadius(circle) {
    return #radius in circle;
  }
}

let circle = new Circle(10);

console.log(Circle.hasRadius(circle));

// Output:
// 
// true

```

➖ Static private fields

The following example shows how to use a static private field:

```js
class Circle {
  #radius = 0;
  static #count = 0;

  constructor(radius) {
    this.radius = radius; // calling setter
    Circle.#count++;
  }

  get area() {
    return Math.PI * Math.pow(this.radius, 2);
  }

  set radius(value) {
    if (typeof value === 'number' && value > 0) {
      this.#radius = value;
    } else {
      throw 'The radius must be a positive number';
    }
  }

  get radius() {
    return this.#radius;
  }

  static hasRadius(circle) {
    return #radius in circle;
  }

  static getCount() {
    return Circle.#count;
  }
}

let circles = [new Circle(10), new Circle(20), new Circle(30)];

console.log(Circle.getCount());

```

How it works.

First, add a private static field #count to the Circle class and initialize its value to zero:

```js
static #count = 0;

```

Second, increase the #count by one in the constructor:

```js
Circle.#count++;

```

Third, define a static method that returns the value of the #count private static field:

```js
static getCount() {
    return Circle.#count;
}

```

Finally, create three instances of the Circle class and output the count value to the console:

```js
let circles = [new Circle(10), new Circle(20), new Circle(30)];
console.log(Circle.getCount());

```

Summary
- Prefix the field name with # sign to make it private.
- Private fields are accessible only inside the class, not from outside of the class or subclasses.
- Use the `in` operator to check if an object has a private field.

[🔝](#contents)

# Private Methods

you’ll learn about JavaScript private methods including private instance methods, private static methods, and private getter/setter.

By default, members of a class are public. `ES2020` introduced the private members that include private fields and methods.

To make a public method private, you prefix its name with a hash `#`. JavaScript allows you to define private methods for instance methods, static methods, and getter/setters.

The following shows the syntax of defining a private instance method:

```js
class MyClass {
  #privateMethod() {
    //...
  }
}

```

In this syntax, the `#privateMethod` is a private instance method. It can only be called inside the MyClass. In other words, it cannot be called from outside the class or in the subclasses of the MyClass.

To call the `#privateMethod` inside the MyClass, you use the this keyword as follows:

```js
this.#privateMethod();

```

The following illustrates the syntax of defining a private static method:

```js
class MyClass {
  static #privateStaticMethod() {
    //...
  }
}

```

To call the `#privateStaticMethod()` inside the MyClass, you use the class name instead of the this keyword:

```js
MyClass.#privateStaticMethod();

```

The following shows the syntax of the private getters/setters:

```js
class MyClass {
  #field;
  get #myField() {
      return #field;
  }
  set #myField(value){
      #field = value;
  }
}

```

In this example, the `#myField` is the private getter and setter that provides access to the private field `#field`.

In practice, you use private methods to minimize the number of methods that the object exposes.

As a rule of thumb, you should make all class methods private by default first. And then you make a method public whenever the object needs to use that method to interact with other objects.

🧲 JavaScript private method examples

Let’s take some examples of using private methods

➖ 1) Private instance method example

The following illustrates how to define the Person class with `private instance methods`:

```js
class Person {
  #firstName;
  #lastName;
  constructor(firstName, lastName) {
    this.#firstName = firstName;
    this.#lastName = lastName;
  }
  getFullName(format = true) {
    return format ? this.#firstLast() : this.#lastFirst();
  }

  // private instance method
  #firstLast() {
    return `${this.#firstName} ${this.#lastName}`;
  }
  
  // private instance method
  #lastFirst() {
    return `${this.#lastName}, ${this.#firstName}`;
  }
}

let person = new Person('John', 'Doe');
console.log(person.getFullName());

// Output:
// 
// John Doe

```

In this example:

First, define two private fields `#firstName` and `#lastName` in the Person class body.

Second, define the private methods `#firstLast()` and `#lastFirst()`. These methods return the full name in different formats.

Third, define the public instance method `getFullName()` that returns a person’s full name. The `getFullName()` method calls the private method `#firstLast()` and `#lastFirst()` to return the full name.

Finally, create a new person object and output the full name to the console.

🧲 1) Private static method example

The following adds the `#validate()` private static method to the Person class:

```js
class Person {
  // private fields
  #firstName;
  #lastName;

  constructor(firstName, lastName) {
    this.#firstName = Person.#validate(firstName);
    this.#lastName = Person.#validate(lastName);
  }

  getFullName(format = true) {
    return format ? this.#firstLast() : this.#lastFirst();
  }
  
  // private static method
  static #validate(name) {
    if (typeof name === 'string') {
      let str = name.trim();
      if (str.length >= 3) {
        return str;
      }
    }
    throw 'The name must be a string with at least 3 characters';
  }
  // private instance method
  #firstLast() {
    return `${this.#firstName} ${this.#lastName}`;
  }
  // private instance method
  #lastFirst() {
    return `${this.#lastName}, ${this.#firstName}`;
  }
}

let person = new Person('John', 'Doe');
console.log(person.getFullName());

// Output:
// 
// John Doe

```

How it works.

- First, define the static method `#validate()` that returns a value if it is a string with at least three characters. The method raises an exception otherwise.

- Second, call the `#validate()` private static method in the constructor to validate the `firstName` and `lastName` arguments before assigning them to the corresponding private attributes.

➖ Summary

- Prefix a method name the # to make it private.
- Private methods can be called inside the class, not from outside of the class or in the subclasses.

# instanceof

The instanceof operator returns true if a prototype of a constructor (constructor.prototype) appears in the prototype chain of an object.

The following shows the syntax of the instanceof operator:

```js
object instanceof contructor

```

In this syntax:

- object is the object to test.
- constructor is a function to test against.

🧲 JavaScript instanceof operator example

The following example defines the Person type and uses the instanceof operator to check if an object is an instance of that type:

```js
function Person(name) {
  this.name = name;
}

let p1 = new Person('John');

console.log(p1 instanceof Person); // true

```

How it works.

First, define a Person type using the constructor function pattern:

```js
function Person(name) {
  this.name = name;
}

```

Second, create a new object of the Person type:

```js
let p1 = new Person('John Doe');

```

Third, check if the person is an instance of the Person type:

```js
console.log(p1 instanceof Person); // true

```

It returns true because the `Person.prototype` appears on the prototype chain of the p1 object. The prototype chain of the p1 is the link between p1, Person.prototype, and Object.prototype (❗):

The following also returns true because the `Object.prototype` appears on the prototype chain of the p1 object:

```js
console.log(p1 instanceof Object); // true

```

➖ ES6 class and instanceof operator

The following example defines the Person class and uses the instanceof operator to check if an object is an instance of the class:

```js
class Person {
  constructor(name) {
    this.name = name;
  }
}

let p1 = new Person('John');

console.log(p1 instanceof Person); // true

```

How it works.

First, define the Person class:

```js
class Person {
  constructor(name) {
    this.name = name;
  }
}

```

Second, create a new instance of the Person class:

```js
let p1 = new Person('John');

```

Third, check if p1 is an instance of the Person class:

```js
console.log(p1 instanceof Person); // true

```

➖ The instanceof operator and inheritance

The following example defines the Employee class that extends the Person class:

```js
class Person {
  constructor(name) {
    this.name = name;
  }
}

class Employee extends Person {
  constructor(name, title) {
    super(name);
    this.title = title;
  }
}

let e1 = new Employee();

console.log(e1 instanceof Employee); // true
console.log(e1 instanceof Person); // true
console.log(e1 instanceof Object); // true

```

Since e1 is an instance of the `Employee class`, it’s also an instance of the Person and Object classes (base classes).

➖ Symbol.hasInstance

In ES6, the instanceof operator uses the `Symbol.hasInstance` function to check the relationship. The Symbol.hasInstance() accepts an object and returns true if a type has that object as an instance. For example:

```js
class Person {
  constructor(name) {
    this.name = name;
  }
}

let p1 = new Person('John');

console.log(Person[Symbol.hasInstance](p1)); // true

```

Since the `Symbol.hasInstance` is defined on the Function prototype, it’s automatically available by default in all functions and classes

You can redefine the Symbol.hasInstance on a subclass as a static method. For example:

```js
class Person {
  constructor(name) {
    this.name = name;
  }
}

class Android extends Person {
  static [Symbol.hasInstance]() {
    return false;
  }
}

let a1 = new Android('Sonny');

console.log(a1 instanceof Android); // false
console.log(a1 instanceof Person); // false

```

URREV symbol has instance

➖ Summary

- Use the instanceof operator to check if the constructor.protoype in object’s prototype chain.

[🔝](#contents)

# Recap of Class Section

## ES6 class declaration

```js
class Person {
    constructor(name) {
        this.name = name;
    }
    getName() {
        return this.name;
    }
}

```


## Getter and Setter

```js
class Person {
    
    // used _name to avoid conflict with the name property
    constructor(name) {
        this._name = name;
    }

    get name() {
        return this._name;
    }
    set name(newName) {
        newName = newName.trim();
        if (newName === '') {
            throw 'The name cannot be empty';
        }
        this._name = newName;
    }
}

```

➖ Without Setter

```js
class Person {
    constructor(name) {
        this._name = name;
    }
    get name() {
        return this._name;
    }
}

let person = new Person("Jane Doe");
console.log(person.name);

// attempt to change the name, but cannot ❗
person.name = 'Jane Smith';
console.log(person.name); // Jane Doe

```

[🔝](#contents)






> ⚠️ Note: This content is for educational and personal reference purposes only.
> The original source is shown at the top of the document.
>
> All rights and copyrights belong to their respective owners.

Source : https://www.javascripttutorial.net/javascript-class/

(some parts may be modified or removed)

[Back](../readme.md)

---

# JavaScript Class

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

This Person class behaves like the Person type in the previous example. However, instead of using a constructor/prototype pattern, it uses the `class keyword`.

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

# JavaScript Getters and Setters

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

The getName() and setName() methods are known as getter and setter in other programming languages such as Java and C++.

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

First, the name property is changed to _name to avoid the name collision with the getter and setter.

Second, the getter uses the get keyword followed by the method name:

```js
get name() {
    return this._name;
}

```

To call the getter, you use the following syntax:

```js
let name = person.name;

```

When JavaScript sees the access to name property of the Person class, it checks if the Person class has any `name property`.

TBC - 20251121 - 2002 

If not, JavaScript checks if the Person class has any method that binds to the name property. In this example, the name() method binds to the name property via the get keyword. Once JavaScript finds the getter method, it executes the getter method and returns a value.

Third, the setter uses the set keyword followed by the method name:

set name(newName) {
    newName = newName.trim();
    if (newName === '') {
        throw 'The name cannot be empty';
    }
    this._name = newName;
}
Code language: JavaScript (javascript)
JavaScript will call the name() setter when you assign a value to the name property like this:

person.name = 'Jane Smith';
Code language: JavaScript (javascript)
If a class has only a getter but not a setter and you attempt to use the setter, the change won’t take any effect. See the following example:

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
Code language: JavaScript (javascript)
In this example, the Person class has the name getter but not the name setter. It attempts to call the setter. However, the change doesn’t take effect since the Person class doesn’t have the name setter.

Using getter in an object literal
The following example defines a getter called latest to return the latest attendee of the meeting object:

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
Code language: JavaScript (javascript)
Output:

John joined a meeting.
Jane joined a meeting.
Peter joined a meeting.
The latest attendee is Peter.
Summary
Use the get and set keywords to define the JavaScript getters and setters for a class or an object.
The get keyword binds an object property to a method that will be invoked when that property is looked up.
The set keyword binds an object property to a method that will be invoked when that property is assigned.
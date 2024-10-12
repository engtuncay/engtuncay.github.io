
- [Section - OOP (Classes)](#section---oop-classes)
  - [Classes](#classes)
    - [Defining a class](#defining-a-class)
    - [Creating Object (Class Instantiation)](#creating-object-class-instantiation)
    - [Class Constructor](#class-constructor)
    - [Default values for parameters](#default-values-for-parameters)
    - [Class methods](#class-methods)
    - [Properties with initial value](#properties-with-initial-value)
    - [Getter](#getter)
    - [Setter](#setter)
    - [Static method](#static-method)
  - [Inheritance](#inheritance)
    - [Overriding methods](#overriding-methods)

[Back - Home](README.md)

# Section - OOP (Classes)

Object Oriented Programming

## Classes

Source : https://github.com/Asabeneh/30-Days-Of-JavaScript/blob/master/15_Day_Classes/15_day_classes.md (some parts may be modified)

JavaScript is an object oriented programming language (??). Everything in JavaScript is an object, with its properties and methods. We create class to create an object. A Class is like `an object constructor, or a blueprint for creating objects`. We instantiate a class to create an object. The class defines attributes and methods (the behavior of the object).

(instantiate:örneklendirmek)

Creating an object from a class is called `class instantiation`.

In the object section, we saw how to create `an object literal`. Object literal is a singleton. If we want to get a similar object , we have to write it. However, class allows to create many objects. This helps to reduce amount of code and repetition of code.

### Defining a class

To define a class in JavaScript we need the keyword _class_ , the name of a class in **CamelCase** and block code(two curly brackets). Let us create a class name Person.

```js
// syntax
class ClassName {
    //  code goes here
}

```

🧲 Example

```js
class Person {
  // code goes here
}
```

We have created a Person class but it does not have any thing inside...



### Creating Object (Class Instantiation)

Instantiation class means creating an object from a class. We need the keyword `new`.

Let us create a object from our Person class previously defined.

```js
const person = new Person();
console.log(person)

// -- Output --
// Person {}
```

As you can see, we have created a person object. Since the class did not have any properties yet the object is also empty.

Let use the class constructor to pass different properties for the class.

### Class Constructor

The constructor is `a builtin function`. The constructor function starts with a keyword `constructor` followed by a parenthesis. Constructor method may have parameters. `this` keyword refers the created object.

The following Person class constructor has firstName and lastName parameters. These parameters are attached to the Person object using _this_ keyword.

```js
class Person {
  constructor(firstName, lastName) {
    console.log(this)
    this.firstName = firstName
    this.lastName = lastName
  }
}

const person = new Person()

console.log(person)

// -- Output --
// Person {}
// Person {firstName: undefined, lastName:undefined}
```

All the keys of the object are undefined. Let us pass value at this time when we instantiate the class.

```js
class Person {
  constructor(firstName, lastName) {
    this.firstName = firstName
    this.lastName = lastName
  }
}

const person2 = new Person('Asabeneh', 'Yetayeh')

console.log(person2)

// -- Output --
// Person {firstName: "Asabeneh", lastName: "Yetayeh"}
```

Once we define a class, we can create many object using the class. Now, let us create many person objects using the Person class.

```js
const person1 = new Person('Asabeneh', 'Yetayeh')
const person2 = new Person('Lidiya', 'Tekle')
const person3 = new Person('Abraham', 'Yetayeh')

console.log(person1)
console.log(person2)
console.log(person3)

// -- Output --
// Person {firstName: "Asabeneh", lastName: "Yetayeh"}
// Person {firstName: "Lidiya", lastName: "Tekle"}
// Person {firstName: "Abraham", lastName: "Yetayeh"}
```

### Default values for parameters

The constructor function properties may have a default value like other regular functions.

```js
class Person {
  constructor( firstName = 'Asabeneh', lastName = 'Yetayeh',) 
  {
    this.firstName = firstName
    this.lastName = lastName
  }
}

const person1 = new Person() // it will take the default values
const person2 = new Person('Lidiya', 'Tekle')

console.log(person1)
console.log(person2)

// -- Output --
// Person {firstName: "Asabeneh", lastName: "Yetayeh"}
// Person {firstName: "Lidiya", lastName: "Tekle"}

```
### Class methods

In a class we can create class methods. Methods are JavaScript functions inside the class. Let us create some class methods.

```js
class Person {
  constructor(firstName, lastName, age, country, city) {
    this.firstName = firstName
    this.lastName = lastName
    this.age = age
    this.country = country
    this.city = city
  }

  getFullName() {
    const fullName = this.firstName + ' ' + this.lastName;
    return fullName;
  }
}

const person1 = new Person('Asabeneh', 'Yetayeh', 250, 'Finland', 'Helsinki')
const person2 = new Person('Lidiya', 'Tekle', 28, 'Finland', 'Espoo')

console.log(person1.getFullName())
console.log(person2.getFullName())

// -- Output --
// Asabeneh Yetayeh
// test.js:19 Lidiya Tekle
```

### Properties with initial value

If you want to give initial value for fields of a class, you can do it in  the constructor method.

```js
class Person {
  constructor(firstName, lastName) {
    this.firstName = firstName
    this.lastName = lastName
    this.score = 0
    this.skills = []
  }

  getFullName() {
    const fullName = this.firstName + ' ' + this.lastName
    return fullName
  }
}

const person1 = new Person('Asabeneh', 'Yetayeh')

console.log(person1.score)
console.log(person1.skills)

// -- Output --
// 0
// []
```

A method could be regular method or a getter or a setter. Let us see, getter and setter.

### Getter

The get method allow us to access value from the object. We write a get method using keyword _get_ followed by a function. Instead of accessing properties directly from the object we use getter to get the value. See the example bellow

```js
class Person {
  constructor(firstName, lastName) {
    this.firstName = firstName
    this.lastName = lastName
    this.score = 0
    this.skills = []
  }
  getFullName() {
    const fullName = this.firstName + ' ' + this.lastName
    return fullName
  }
  get getScore() {
    return this.score
  }
  get getSkills() {
    return this.skills
  }
}

const person1 = new Person('Asabeneh', 'Yetayeh')
const person2 = new Person('Lidiya', 'Tekle')

console.log(person1.getScore) // We do not need parenthesis to call a getter method
console.log(person2.getScore)

console.log(person1.getSkills)
console.log(person2.getSkills)

// -- Output --
// 0
// 0
// []
// []
```

### Setter

The setter method allow us to modify the value of certain properties. We write a setter method using keyword _set_ followed by a function. See the example bellow.

```js

class Person {
  constructor(firstName, lastName) {
    this.firstName = firstName
    this.lastName = lastName
    this.score = 0
    this.skills = []
  }

  getFullName() {
    const fullName = this.firstName + ' ' + this.lastName
    return fullName
  }

  get getScore() {
    return this.score
  }

  get getSkills() {
    return this.skills
  }

  set setScore(score) {
    this.score += score
  }

  set setSkill(skill) {
    this.skills.push(skill)
  }

}

const person1 = new Person('Asabeneh', 'Yetayeh')
const person2 = new Person('Lidiya', 'Tekle')

person1.setScore = 1
person1.setSkill = 'HTML'
person1.setSkill = 'CSS'
person1.setSkill = 'JavaScript'

person2.setScore = 1
person2.setSkill = 'Planning'
person2.setSkill = 'Managing'
person2.setSkill = 'Organizing'

console.log(person1.score)
console.log(person2.score)

console.log(person1.skills)
console.log(person2.skills)
```

```js
// 1
// 1
// ["HTML", "CSS", "JavaScript"]
// ["Planning", "Managing", "Organizing"]
```

Do not be puzzled by the difference between regular method and a getter. If you know how to make a regular method you are good. Let us add regular method called getPersonInfo in the Person class.

```js
class Person {
  constructor(firstName, lastName) {
    this.firstName = firstName
    this.lastName = lastName
    this.score = 0
    this.skills = []
  }
  getFullName() {
    const fullName = this.firstName + ' ' + this.lastName
    return fullName
  }
  get getScore() {
    return this.score
  }
  get getSkills() {
    return this.skills
  }
  set setScore(score) {
    this.score += score
  }
  set setSkill(skill) {
    this.skills.push(skill)
  }

  getPersonInfo() {
    let fullName = this.getFullName()
    let skills =
      this.skills.length > 0 &&
      this.skills.slice(0, this.skills.length - 1).join(', ') +
        ` and ${this.skills[this.skills.length - 1]}`
    let formattedSkills = skills ? `He knows ${skills}` : ''

    let info = `${fullName} is ${this.age}. He lives ${this.city}, ${this.country}. ${formattedSkills}`
    return info
  }
}

const person1 = new Person('Asabeneh', 'Yetayeh', 250, 'Finland', 'Helsinki')
const person2 = new Person('Lidiya', 'Tekle', 28, 'Finland', 'Espoo')
const person3 = new Person('John', 'Doe', 50, 'Mars', 'Mars city')

person1.setScore = 1
person1.setSkill = 'HTML'
person1.setSkill = 'CSS'
person1.setSkill = 'JavaScript'

person2.setScore = 1
person2.setSkill = 'Planning'
person2.setSkill = 'Managing'
person2.setSkill = 'Organizing'

console.log(person1.getScore)
console.log(person2.getScore)

console.log(person1.getSkills)
console.log(person2.getSkills)
console.log(person3.getSkills)

console.log(person1.getPersonInfo())
console.log(person2.getPersonInfo())
console.log(person3.getPersonInfo())
```

```js
// 1
// 1
// ["HTML", "CSS", "JavaScript"]
// ["Planning", "Managing", "Organizing"]
// []
// Asabeneh Yetayeh is 250. He lives Helsinki, Finland. He knows HTML, CSS and JavaScript
// Lidiya Tekle is 28. He lives Espoo, Finland. He knows Planning, Managing and Organizing
// John Doe is 50. He lives Mars city, Mars.
```

### Static method

`The static keyword` defines a static method for a class. 

Static methods are not called on instances of the class. Instead, they are called on the class itself. 

These are often utility functions, such as functions to create or clone objects. An example of static method is `Date.now()`. The _now_ method is called directly from the class.

```js
class UtilDate {
  
  static showDateTime() {
    let now = new Date()
    return now;
  }

}

console.log(UtilDate.showDateTime())

// -- Output --
// 2024-10-11T11:24:11.767Z
```

## Inheritance

Using inheritance we can access all the properties and the methods of the parent class. This reduces repetition of code. If you remember, we have a Person parent class and we will create children from it. Our children class could be student, teach etc.

```js
// syntax
class ChildClass extends ParentClass {
 // code goes here
}
```

Let us create a Student child class from Person parent class.

```js
class Student extends Person {
  saySomething() {
    console.log('I am a child of the person class')
  }
}

const s1 = new Student('Asabeneh', 'Yetayeh')
console.log(s1)
console.log(s1.saySomething())
console.log(s1.getFullName())
console.log(s1.getPersonInfo())
```

```js
// Student {firstName: "Asabeneh", lastName: "Yetayeh", age: "Finland", country: 250, city: "Helsinki", …}
// I am a child of the person class
// Asabeneh Yetayeh
// Student {firstName: "Asabeneh", lastName: "Yetayeh", age: "Finland", country: 250, city: "Helsinki", …}
// Asabeneh Yetayeh is Finland. He lives Helsinki, 250.
```

### Overriding methods

As you can see, we manage to access all the methods in the Person Class and we used it in the Student child class. We can customize the parent methods, we can add additional properties to a child class. If we want to customize, the methods and if we want to add extra properties, we need to use the constructor function the child class too. Inside the constructor function we call the super() function to access all the properties from the parent class. The Person class didn't have gender but now let us give gender property for the child class, Student. If the same method name used in the child class, the parent method will be overridden.

```js
class Student extends Person {
  constructor(firstName, lastName, gender) {
    super(firstName, lastName)
    this.gender = gender
  }

  saySomething() {
    console.log('I am a child of the person class')
  }
  getPersonInfo() {
    let fullName = this.getFullName()
    let skills =
      this.skills.length > 0 &&
      this.skills.slice(0, this.skills.length - 1).join(', ') +
        ` and ${this.skills[this.skills.length - 1]}`

    let formattedSkills = skills ? `He knows ${skills}` : ''
    let pronoun = this.gender == 'Male' ? 'He' : 'She'

    let info = `${fullName} is ${this.age}. ${pronoun} lives in ${this.city}, ${this.country}. ${formattedSkills}`
    return info
  }
}

const s1 = new Student('Asabeneh','Yetayeh','Male')
const s2 = new Student('Lidiya', 'Tekle', 'Female')

s1.setScore = 1
s1.setSkill = 'HTML'
s1.setSkill = 'CSS'
s1.setSkill = 'JavaScript'

s2.setScore = 1
s2.setSkill = 'Planning'
s2.setSkill = 'Managing'
s2.setSkill = 'Organizing'

console.log(s1)

console.log(s1.saySomething())
console.log(s1.getFullName())
console.log(s1.getPersonInfo())

console.log(s2.saySomething())
console.log(s2.getFullName())
console.log(s2.getPersonInfo())
```

```js
// Student {firstName: "Asabeneh", lastName: "Yetayeh", age: 250, country: "Finland", city: "Helsinki", …}
// Student {firstName: "Lidiya", lastName: "Tekle", age: 28, country: "Finland", city: "Helsinki", …}
// I am a child of the person class
// Asabeneh Yetayeh
// Student {firstName: "Asabeneh", lastName: "Yetayeh", age: 250, country: "Finland", city: "Helsinki", …}
// Asabeneh Yetayeh is 250. He lives in Helsinki, Finland. He knows HTML, CSS and JavaScript
// I am a child of the person class
// Lidiya Tekle
// Student {firstName: "Lidiya", lastName: "Tekle", age: 28, country: "Finland", city: "Helsinki", …}
// Lidiya Tekle is 28. She lives in Helsinki, Finland. He knows Planning, Managing and Organizing
```

Now, the getPersonInfo method has been overridden and it identifies if the person is male or female.


```js
class Person {
  constructor(firstName, lastName) {
    this.firstName = firstName
    this.lastName = lastName
    this.score = 0
    this.skills = []
  }

  getFullName() {
    const fullName = this.firstName + ' ' + this.lastName
    return fullName
  }

  get getScore() {
    return this.score
  }

  get getSkills() {
    return this.skills
  }

  set setScore(score) {
    this.score += score
  }

  set setSkill(skill) {
    this.skills.push(skill)
  }

  getPersonInfo() {
    let fullName = this.getFullName()
    let skills =
      this.skills.length > 0 &&
      this.skills.slice(0, this.skills.length - 1).join(', ') +
        ` and ${this.skills[this.skills.length - 1]}`

    let formattedSkills = skills ? `He knows ${skills}` : ''

    let info = `${fullName} is ${this.age}. He lives ${this.city}, ${this.country}. ${formattedSkills}`
    return info
  }
  
  static favoriteSkill() {
    const skills = ['HTML', 'CSS', 'JS', 'React', 'Python', 'Node']
    const index = Math.floor(Math.random() * skills.length)
    return skills[index]
  }

  static showDateTime() {
    let now = new Date()
    let year = now.getFullYear()
    let month = now.getMonth() + 1
    let date = now.getDate()
    let hours = now.getHours()
    let minutes = now.getMinutes()
    if (hours < 10) {
      hours = '0' + hours
    }
    if (minutes < 10) {
      minutes = '0' + minutes
    }

    let dateMonthYear = date + '.' + month + '.' + year
    let time = hours + ':' + minutes
    let fullTime = dateMonthYear + ' ' + time
    return fullTime
  }
}

console.log(Person.favoriteSkill())
console.log(Person.showDateTime())
```
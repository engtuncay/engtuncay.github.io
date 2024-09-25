
- [Classes and Objects](#classes-and-objects)
  - [Define a Class](#define-a-class)
  - [Define Objects](#define-objects)
  - [The $this Keyword](#the-this-keyword)
  - [instanceof operator](#instanceof-operator)
  - [Article - Typed Properties in PHP 7.4](#article---typed-properties-in-php-74)
- [Other Articles](#other-articles)

Source : https://www.w3schools.com/php/php_oop_classes_objects.asp

# Classes and Objects

A class is `a template for objects`, and an object is `an instance of class`.

Let's assume we have a class named Fruit. A Fruit can have properties like name, color, weight, etc. We can define variables like $name, $color, and $weight to hold the values of these properties.

When the individual objects (apple, banana, etc.) are created, they inherit all the properties and behaviors from the class, but each object will have different values for the properties.

## Define a Class

A class is defined by using the class keyword and class block.

Syntax

```php
<?php
class Fruit {
  // class block
  // code goes here...
}
?>

```

Below we declare a class named Fruit consisting of two properties ($name and $color) and two methods set_name() and get_name() for setting and getting the $name property:

```php
<?php
class Fruit {
  // Properties / Fields
  public $name;
  public $color;

  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
}
?>

```

✏ *Note:* In a class, variables are called properties and functions are called methods!

## Define Objects

Classes are nothing without objects! We can create multiple objects from a class. Each object has all the properties and methods defined in the class, but they will have different property values.

Objects of a class are created using the `new` keyword.

In the example below, $apple and $banana are instances (objects) of the class Fruit:

Example

```php
<?php
// using previous example Fruit class
$apple = new Fruit();
$banana = new Fruit();
$apple->set_name('Apple');
$banana->set_name('Banana');

echo $apple->get_name();
echo "<br>";
echo $banana->get_name();
?>

```

In the example below, we add two more methods to class Fruit, for setting and getting the $color property:

Example

```php
<?php
class Fruit {
  // Properties
  public $name;
  public $color;

  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
  function set_color($color) {
    $this->color = $color;
  }
  function get_color() {
    return $this->color;
  }
}

$apple = new Fruit();
$apple->set_name('Apple');
$apple->set_color('Red');
echo "Name: " . $apple->get_name();
echo "<br>";
echo "Color: " . $apple->get_color();
?>

```

## The $this Keyword

The $this keyword refers to the current object, and is only available inside methods.

Look at the following example:

Example

```php
<?php
class Fruit {
  public $name;
}
$apple = new Fruit();
?>

```

So, where can we change the value of the $name property? There are two ways:

1. Inside the class (by adding a set_name() method and use $this):

Example

```php
<?php
class Fruit {
  public $name;
  function set_name($name) {
    $this->name = $name;
  }
}
$apple = new Fruit();
$apple->set_name("Apple");

echo $apple->name;
?>

```

2. Outside the class (by directly changing the property value):

Example

```php
<?php
class Fruit {
  public $name;
}
$apple = new Fruit();
$apple->name = "Apple";

echo $apple->name;
?>

```

## instanceof operator

You can use the instanceof keyword to check if an object belongs to a specific class :

Example

```php
<?php
class Fruit {
  public $name;
}

$apple = new Fruit();
var_dump($apple instanceof Fruit);
?>

// Output
// bool(true)
```

--end of w3--

## Article - Typed Properties in PHP 7.4

Source : https://php.watch/versions/7.4/typed-properties

PHP 7.4 finally brings typed properties. With typed properties, you can set a type for all class properties. When a type is set, PHP engine prevents anyone from setting a different type to the class property.

```php
class Example {
  public string $name;
  public DateTime $birthday;
}

```

The snippet above will make sure that `Example::$birthday property` will always be a DateTime object. Prior to PHP 7.4, this sort of strict data patterns would have required to have `setBirthDate(DateTime $birthdate): void` and `getBirthDate(): DateTime` methods to enforce the data integrity.

🔔 Supported property types

Types supported for class properties.

- Scalar types: int, string, bool, and float.

- Compound types: array, iterable and object.

- Any class or interface name (such as DateTime, Foo\Bar) and stdClass.

- References to parent and own objects: self and parent.

Types not supported for class properties

- void: Having a void property wouldn't make sense.

- callable: Not supported because its behavior is unpredictable. Take a look at consistent callables RFC (https://wiki.php.net/rfc/consistent_callables) for more background. This basically becomes troublesome when callables can be declared with array syntax, e.g. as [$this, 'buildForm'].

🔔 The uninitialized state

This will be where most of the hair pulling might occur. With PHP 7.4 typed properties, class properties have an uninitialized state. This simply means that the property is not initialized yet. This is not the same as `null`.

If there is no type is declared, properties have null as their uninitialized value:

```php
class Example {
  public $name;
}

$foo = new Example();
var_dump($foo->name === null); // true

```

When a type is declared, all properties will have an uninitialized state. It is not allowed to access class properties prior to assigning an explicit value.

```php
class Example {
  public string $name;
}

$foo = new Example();
var_dump($foo->name === null);

```

In this snippet, the `$name property` is *uninitialized*. This is not the same as null, and the snippet above will throw an error:

```
Fatal error: Uncaught Error: Typed property Example::$name must not be accessed before initialization in ...

```

🔔 Check uninitialized state ❗

You can check if a class property is uninitialized using `isset($foo->name)`. Because this value is not the same as null, you cannot use `$foo->name === null` to check if the property is uninitialized.

🔔 Reset property to uninitialized state

To reset a property back to its uninitialized state, use `unset($foo->name)`. Once unset, trying to access the property without assigning it a value will throw the same `Typed property ... must not be accessed before initialization ...` error.

🔔 Nullable types ❗

Similar to PHP 7.1's nullable types, property types can be marked nullable as well. To mark a property can be null, prefix its type with a question mark, e.g: `?string`.


```php
class Example {
  public ?string $name;
}

$foo = new Example();
$foo->name = 'Ayesh'; // Valid
$foo->name = null; // Valid

```

Even if a property is marked nullable, its uninitialized value will not be null. For example, the snippet below will still throw an error:

```php
class Example {
  public ?string $name;
}

$foo = new Example();
var_dump($foo->name);
// Fatal error: Uncaught Error: Typed property Example::$name must not be accessed before initialization

```

While this can appear cumbersome to work with, this provides a brilliant feature that you can be certain that the class property will always be of that type. If the value is not initialized, PHP will give up and throw an error instead of returning null, as it would for untyped properties.

🔔 Strict types

Class properties also support the strict type declaration with `declare(strict_types=1)` at the top of the file's PHP block. Without strict types, PHP will cast the values to the property type.

```php
class Example {
  public string $name;
}

$foo = new Example();
$foo->name = 420;
var_dump($foo->name);
// string(3) "420"

```

Notice how we set an integer to the string property, and var_dump() call returns "420" as a string. When assigning the value, the engine casts the value to the declared type.

To minimize the problems with type juggling and to take the full benefits of typed properties, I recommend that you test your classes with `declare(strict_types=1)`. It is easy to overlook when PHP is being helpful when it casts to a type for you, but this can be the root of some bug downstream. It's easier to debug an error that pops up immediately than a bug that only happens on Friday evenings at 6:28PM, only when DST is in effect.

🔔 Static properties and references

Static properties can have types declared too. This may seem like an obvious detail, but the former proposals for typed properties did not include static properties. In PHP 7.4, you can declare types for static properties too.

Furthermore, you can return a reference to a typed property, and the types will be still honored:

```php
class Example {
  public string $name;
}

$foo = new Example();
$foo->name = 'Apple';
$bar =& $foo->name;
$bar = []; // Not allowed

```

This will throw an error:

```php
Fatal error: Uncaught TypeError: Cannot assign ... to reference held by property Example::$name of type ... in ...

```

🔔 Default values in constructors and property declaration

For historical reasons, PHP allows you to set a default value for function arguments in its declaration even if the type is not nullable.

```php
class Example {
  public function __construct(string $name = null) {
      var_dump($name);
  }
}

$foo = new Example();
// NULL

```

In the constructor, we explicitly mark that the `$name` argument is not nullable, and yet PHP accepts null as the default value. This behavior only applies to null default values. Although this is semantically invalid, this behavior is allowed for historical and implementation reasons.

With typed properties, this is not allowed:

```php
class Example {
    private string $name = null;
}

$foo = new Example();
// NULL

```

This will promptly throw an error:

```
Fatal error: Default value for property of type ... may not be null. Use the nullable type ?... to allow null default value in ...

```
🔔 Type Variance

PHP 7.4 comes with return type variance, which means a child class can return a more specific instance. This is not yet supported for property types. For example:

```php
class A {}
class B extends A {}

class Fruits {
    public B $foo;
}
class Banana extends Fruits {
    public A $foo;
}

```

Code above would not work. Although B is a subset of A class, changing the type declaration of `Banana::$foo` is not allowed. You can still assign an instance of A to Banana::$foo. This is called `covariance`, and it is now supported for return types.

Trying the above will throw an error like the following:

```
Fatal error: Type of Banana::$foo must be B (as in class Fruits) in W:\localhost\test\test.php on line 11

```

The following code is still valid:

```php
class A {}
class B extends A {}

class Fruits {
    public A $foo;
}
class Banana extends Fruits {
    public A $foo;
}

$banana = new Banana();
$banana->foo = new B();

```

Notice how the property declaration in `Fruits::$foo` and `Banana::$foo` is A, but we assign an instance B to it.

To summarize:

- You cannot substitute a child class for the property.
- You cannot add types to child classes if the parent does not have types enforced.
- You cannot mark a non-nullable type as nullable in a child class.
- You cannot mark a nullable type as non-nullable in a child class.

To visualize this, take a look at the following inheritance chain. None of the following are allowed:

```php
class A {}
class B extends A{}

class Fruits {
    public $no_type;
    public A $strict_type;
    public ?string $nullable;
    public string $non_nullable;
}
class Banana extends Fruits {
    public A $no_type; // Not allowed to add types in a subclass.
    public $strict_type; // Not allowed to remove type in a childclass.
    public string $nullable; // Not allowed to make non-nullable
    public ?string $non_nullable; // Not allowed to make nullable
}

```

Above will throw the following errors (not at the same time):

```
Fatal error: Type of Banana::$no_type must not be defined (as in class Fruits) in ... on line ...
Fatal error: Type of Banana::$strict_type must be A (as in class Fruits) in ... on line 17
Fatal error: Type of Banana::$nullable must be ?string (as in class Fruits) in ... on line 17
Fatal error: Type of Banana::$non_nullable must be string (as in class Fruits) in ... on line 17

```

🔔 Backwards compatibility

Declaring property types is optional, and all your existing code should work. If you plan to upgrade an existing code base to typed properties, keep an eye on the uninitialized state, and inheritance where rules are enforced rather strictly. Further, property types do not carry the legacy behavior of allowing null values in their function/method arguments, and it can come as a surprise.

🔔 Final Thoughts

Property types is a feature that I was personally excited about, and now that it's finally here, I have spent some time adding property types to my existing private projects. PHPStorm 2019.3 comes with support for all PHP 7.4 features, and there is a quick-fix to add property types if it can be gathered from property docblock comments or from the constructor.

Even in projects that had 100% test coverage, I still discovered a few bugs that were there all the time, but property types bring them front and center!

Open source projects might take some time to require PHP 7.4 as the minimum version, but it wouldn't prevent you from using them in your private projects.

# Other Articles

➖ https://www.php.net/manual/en/language.types.declarations.php


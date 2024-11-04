
- [PHP OOP - Static Methods](#php-oop---static-methods)
  - [self keyword](#self-keyword)
- [PHP OOP - Static Properties](#php-oop---static-properties)
  - [self keyword](#self-keyword-1)


# PHP OOP - Static Methods

*PHP - Static Methods*

Static methods can be called directly - without creating an instance of the class first.

Static methods are declared with the static keyword:

Syntax

```php
<?php
class ClassName {
  public static function staticMethod() {
    echo "Hello World!";
  }
}
?>

```

To access a static method use the class name, double colon (::), and the method name:

Syntax

```php
ClassName::staticMethod();

```

Let's look at an example:

Example

```php
<?php
class greeting {
  public static function welcome() {
    echo "Hello World!";
  }
}

// Call static method
greeting::welcome();
?>

```

*Example Explained*

Here, we declare a static method: welcome(). Then, we call the static method by using the class name, double colon (::), and the method name (without creating an instance of the class first).

## self keyword

A class can have both static and non-static methods. A static method can be accessed from a method in the same class using the self keyword and double colon (::) :

Example

```php
<?php
class greeting {
  public static function welcome() {
    echo "Hello World!";
  }

  public function __construct() {
    self::welcome();
  }
}

new greeting();
?>

```

Static methods can also be called from methods in other classes. To do this, the static method should be public:

Example

```php
<?php
class A {
  public static function welcome() {
    echo "Hello World!";
  }
}

class B {
  public function message() {
    A::welcome();
  }
}

$obj = new B();
echo $obj -> message();
?>

```

To call a static method from a child class, use the parent keyword inside the child class. Here, the static method can be public or protected.

Example

```php
<?php
class domain {
  protected static function getWebsiteName() {
    return "W3Schools.com";
  }
}

class domainW3 extends domain {
  public $websiteName;
  public function __construct() {
    $this->websiteName = parent::getWebsiteName();
  }
}

$domainW3 = new domainW3;
echo $domainW3 -> websiteName;
?>

```

# PHP OOP - Static Properties

Static properties can be called directly - without creating an instance of a class.

Static properties are declared with the static keyword:

Syntax

```php
<?php
class ClassName {
  public static $staticProp = "W3Schools";
}
?>

```

To access a static property use the class name, double colon (::), and the property name:

Syntax

```php
ClassName::$staticProp;

```

Let's look at an example:

Example

```php
<?php
class pi {
  public static $value = 3.14159;
}

// Get static property
echo pi::$value;
?>

```

*Example Explained*

Here, we declare a static property: $value. Then, we echo the value of the static property by using the class name, double colon (::), and the property name (without creating a class first).

## self keyword

A class can have both static and non-static properties. A static property can be accessed from a method in the same class using the self keyword and double colon (::) :

Example

```php
<?php
class pi {
  public static $value=3.14159;
  public function staticValue() {
    return self::$value;
  }
}

$pi = new pi();
echo $pi->staticValue();
?>

```

- To call a static property from a child class, use the parent keyword inside the child class:

*Example*

```php
<?php
class pi {
  public static $value=3.14159;
}

class x extends pi {
  public function xStatic() {
    return parent::$value;
  }
}

// Get value of static property directly via child class
echo x::$value;

// or get value of static property via xStatic() method
$x = new x();
echo $x->xStatic();
?>

```

--end--
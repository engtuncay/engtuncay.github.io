

PHP if Statements
Conditional statements are used to perform different actions based on different conditions.

PHP Conditional Statements
Very often when you write code, you want to perform different actions for different conditions. You can use conditional statements in your code to do this.

In PHP we have the following conditional statements:

if statement - executes some code if one condition is true
if...else statement - executes some code if a condition is true and another code if that condition is false
if...elseif...else statement - executes different codes for more than two conditions
switch statement - selects one of many blocks of code to be executed
PHP - The if Statement
The if statement executes some code if one condition is true.

Syntax
if (condition) {
  // code to be executed if condition is true;
}
ExampleGet your own PHP Server
Output "Have a good day!" if 5 is larger than 3:

if (5 > 3) {
  echo "Have a good day!";
}
We can also use variables in the if statement:

Example
Output "Have a good day!" if $t is less than 20:

$t = 14;

if ($t < 20) {
  echo "Have a good day!";
}

# PHP if Operators
Comparison Operators
If statements usually contain conditions that compare two values.

ExampleGet your own PHP Server
Check if $t is equal to 14:

$t = 14;

if ($t == 14) {
  echo "Have a good day!";
}
To compare two values, we need to use a comparison operator.

Here are the PHP comparison operators to use in if statements:

Operator	Name	Result	Try it
==	Equal	Returns true if the values are equal	
===	Identical	Returns true if the values and data types are identical	
!=	Not equal	Returns true if the values are not equal	
<>	Not equal	Returns true if the values are not equal	
!==	Not identical	Returns true if the values or data types are not identical	
>	Greater than	Returns true if the first value is greater than the second value	
<	Less than	Returns true if the first value is less than the second value	
>=	Greater than or equal to	Returns true if the first value is greater than, or equal to, the second value	
<=	Less than or equal to	Returns true if the first value is less than, or equal to, the second value	
Logical Operators
To check more than one condition, we can use logical operators, like the && operator:

Example
Check if $a is greater than $b, AND if $a is less than $c:

$a = 200;
$b = 33;
$c = 500;

if ($a > $b && $a < $c ) {
  echo "Both conditions are true";
}
Here are the PHP logical operators to use in if statements:

Operator	Name	Description	Try it
and	And	True if both conditions are true	
&&	And	True if both conditions are true	
or	Or	True if either condition is true	
||	Or	True if either condition is true	
xor	Xor	True if either condition is true, but not both	
!	Not	True if condition is not true	
We can compare as many conditions as we like in one if statement:

Example
Check if $a is either 2, 3, 4, 5, 6, or 7:

$a = 5;

if ($a == 2 || $a == 3 || $a == 4 || $a == 5 || $a == 6 || $a == 7) {
  echo "$a is a number between 2 and 7";
}

# PHP if...else Statements
PHP - The if...else Statement
The if...else statement executes some code if a condition is true and another code if that condition is false.

Syntax
if (condition) {
  // code to be executed if condition is true;
} else {
  // code to be executed if condition is false;
}
ExampleGet your own PHP Server
Output "Have a good day!" if the current time is less than 20, and "Have a good night!" otherwise:

$t = date("H");

if ($t < "20") {
  echo "Have a good day!";
} else {
  echo "Have a good night!";
}
PHP - The if...elseif...else Statement
The if...elseif...else statement executes different codes for more than two conditions.

Syntax
if (condition) {
  code to be executed if this condition is true;
} elseif (condition) {
  // code to be executed if first condition is false and this condition is true;
} else {
  // code to be executed if all conditions are false;
}
Example
Output "Have a good morning!" if the current time is less than 10, and "Have a good day!" if the current time is less than 20. Otherwise it will output "Have a good night!":

$t = date("H");

if ($t < "10") {
  echo "Have a good morning!";
} elseif ($t < "20") {
  echo "Have a good day!";
} else {
  echo "Have a good night!";
}

# PHP Shorthand if Statements
Short Hand If
To write shorter code, you can write if statements on one line.

ExampleGet your own PHP Server
One-line if statement:

$a = 5;

if ($a < 10) $b = "Hello";

echo $b
Short Hand If...Else
if...else statements can also be written in one line, but the syntax is a bit different.

Example
One-line if...else statement:

$a = 13;

$b = $a < 10 ? "Hello" : "Good Bye";

echo $b;
This technique is known as Ternary Operators, or Conditional Expressions.

# PHP Nested if Statement
Nested If
You can have if statements inside if statements, this is called nested if statements.

ExampleGet your own PHP Server
An if inside an if:

$a = 13;

if ($a > 10) {
  echo "Above 10";
  if ($a > 20) {
    echo " and also above 20";
  } else {
    echo " but not above 20";
  }
}

# PHP switch Statement
The switch statement is used to perform different actions based on different conditions.

The PHP switch Statement
Use the switch statement to select one of many blocks of code to be executed.

Syntax
switch (expression) {
  case label1:
    //code block
    break;
  case label2:
    //code block;
    break;
  case label3:
    //code block
    break;
  default:
    //code block
}
This is how it works:

The expression is evaluated once
The value of the expression is compared with the values of each case
If there is a match, the associated block of code is executed
The break keyword breaks out of the switch block
The default code block is executed if there is no match
ExampleGet your own PHP Server
$favcolor = "red";

switch ($favcolor) {
  case "red":
    echo "Your favorite color is red!";
    break;
  case "blue":
    echo "Your favorite color is blue!";
    break;
  case "green":
    echo "Your favorite color is green!";
    break;
  default:
    echo "Your favorite color is neither red, blue, nor green!";
}
The break Keyword
When PHP reaches a break keyword, it breaks out of the switch block.

This will stop the execution of more code, and no more cases are tested.

The last block does not need a break, the block breaks (ends) there anyway.

Warning: If you omit the break statement in a case that is not the last, and that case gets a match, the next case will also be executed even if the evaluation does not match the case!

Example
What happens if we remove the break statement from case "red"?

$favcolor is red, so the code block from case "red" is executed, but since it has no break statement, the code block from case "blue" will also be executed:

$favcolor = "red";

switch ($favcolor) {
  case "red":
    echo "Your favorite color is red!";
  case "blue":
    "Your favorite color is blue!";
    break;
  case "green":
    echo "Your favorite color is green!";
    break;
  default:
    echo "Your favorite color is neither red, blue, nor green!";
}
The default Keyword
The default keyword specifies the code to run if there is no case match:

Example
If no cases get a match, the default block is executed:

$d = 4;

switch ($d) {
  case 6:
    echo "Today is Saturday";
    break;
  case 0:
    echo "Today is Sunday";
    break;
  default:
    echo "Looking forward to the Weekend";
}
The default case does not have to be the last case in a switch block:

Example
Putting  the default block elsewhere than at the end of the switch block is allowed, but not recommended.

$d = 4;

switch ($d) {
  default:
    echo "Looking forward to the Weekend";
    break;
  case 6:
    echo "Today is Saturday";
    break;
  case 0:
    echo "Today is Sunday";
}
Note: If default is not the last block in the switch block, remember to end the default block with a break statement.

Common Code Blocks
If you want multiple cases to use the same code block, you can specify the cases like this:

Example
More than one case for each code block:

$d = 3;

switch ($d) {
  case 1:
  case 2:
  case 3:
  case 4:
  case 5:  
    echo "The weeks feels so long!";
    break;
  case 6:
  case 0:
    echo "Weekends are the best!";
    break;
  default:
    echo "Something went wrong";
}

# PHP Loops
In the following chapters you will learn how to repeat code by using loops in PHP.

PHP Loops
Often when you write code, you want the same block of code to run over and over again a certain number of times. So, instead of adding several almost equal code-lines in a script, we can use loops.

Loops are used to execute the same block of code again and again, as long as a certain condition is true.

In PHP, we have the following loop types:

while - loops through a block of code as long as the specified condition is true
do...while - loops through a block of code once, and then repeats the loop as long as the specified condition is true
for - loops through a block of code a specified number of times
foreach - loops through a block of code for each element in an array
The following chapters will explain and give examples of each loop type.

# PHP while Loop
The while loop - Loops through a block of code as long as the specified condition is true.

The PHP while Loop
The while loop executes a block of code as long as the specified condition is true.

ExampleGet your own PHP Server
Print $i as long as $i is less than 6:

$i = 1;
while ($i < 6) {
  echo $i;
  $i++;
}
Note: remember to increment $i, or else the loop will continue forever.

The while loop does not run a specific number of times, but checks after each iteration if the condition is still true.

The condition does not have to be a counter, it could be the status of an operation or any condition that evaluates to either true or false.

The break Statement
With the break statement we can stop the loop even if the condition is still true:

Example
Stop the loop when $i is 3:

$i = 1;
while ($i < 6) {
  if ($i == 3) break;
  echo $i;
  $i++;
}
The continue Statement
With the continue statement we can stop the current iteration, and continue with the next:

Example
Stop, and jump to the next iteration if $i is 3:

$i = 0;
while ($i < 6) {
  $i++;
  if ($i == 3) continue;
  echo $i;
}
Alternative Syntax
The while loop syntax can also be written with the endwhile statement like this

Example
Print $i as long as $i is less than 6:

$i = 1;
while ($i < 6):
  echo $i;
  $i++;
endwhile;
Step 10
If you want the while loop count to 100, but only by each 10, you can increase the counter by 10 instead 1 in each iteration:

Example
Count to 100 by tens:

$i = 0;
while ($i < 100) {
  $i+=10;
  echo $i "<br>";
}

# PHP do while Loop
The do...while loop - Loops through a block of code once, and then repeats the loop as long as the specified condition is true.

The PHP do...while Loop
The do...while loop will always execute the block of code at least once, it will then check the condition, and repeat the loop while the specified condition is true.

ExampleGet your own PHP Server
Print $i as long as $i is less than 6:

$i = 1;

do {
  echo $i;
  $i++;
} while ($i < 6);
Note: In a do...while loop the condition is tested AFTER executing the statements within the loop. This means that the do...while loop will execute its statements at least once, even if the condition is false. See example below.

Let us see what happens if we set the $i variable to 8 instead of 1, before execute the same do...while loop again:

Example
Set $i = 8, then print $i as long as $i is less than 6:

$i = 8;

do {
  echo $i;
  $i++;
} while ($i < 6);
The code will be executed once, even if the condition is never true.

The break Statement
With the break statement we can stop the loop even if the condition is still true:

Example
Stop the loop when $i is 3:

$i = 1;

do {
  if ($i == 3) break;
  echo $i;
  $i++;
} while ($i < 6);
The continue Statement
With the continue statement we can stop the current iteration, and continue with the next:

Example
Stop, and jump to the next iteration if $i is 3:

$i = 0;

do {
  $i++;
  if ($i == 3) continue;
  echo $i;
} while ($i < 6);

# PHP for Loop
The for loop - Loops through a block of code a specified number of times.

The PHP for Loop
The for loop is used when you know how many times the script should run.

Syntax
for (expression1, expression2, expression3) {
  // code block
}
This is how it works:

expression1 is evaluated once
expression2 is evaluated before each iteration
expression3 is evaluated after each iteration
ExampleGet your own PHP Server
Print the numbers from 0 to 10:

for ($x = 0; $x <= 10; $x++) {
  echo "The number is: $x <br>";
}
Example Explained
The first expression, $x = 0;, is evaluated once and sets a counter to 0.
The second expression, $x <= 10;, is evaluated before each iteration, and the code block is only executed if this expression evaluates to true. In this example the expression is true as long as $x is less than, or equal to, 10.
The third expression, $x++;, is evaluated after each iteration, and in this example, the expression increases the value of $x by one at each iteration.
The break Statement
With the break statement we can stop the loop even if the condition is still true:

Example
Stop the loop when $x is 3:

for ($x = 0; $x <= 10; $x++) {
  if ($x == 3) break;
  echo "The number is: $x <br>";
}
The continue Statement
With the continue statement we can stop the current iteration, and continue with the next:

Example
Stop, and jump to the next iteration if $x is 3:

for ($x = 0; $x <= 10; $x++) {
  if ($x == 3) continue;
  echo "The number is: $x <br>";
}
Step 10
This example counts to 100 by tens:

Example
for ($x = 0; $x <= 100; $x+=10) {
  echo "The number is: $x <br>";
}

# PHP foreach Loop
The foreach loop - Loops through a block of code for each element in an array or each property in an object.

The foreach Loop on Arrays
The most common use of the foreach loop, is to loop through the items of an array.

ExampleGet your own PHP Server
Loop through the items of an indexed array:

$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) {
  echo "$x <br>";
}
For every loop iteration, the value of the current array element is assigned to the variabe $x. The iteration continues until it reaches the last array element.

Keys and Values
The array above is an indexed array, where the first item has the key 0, the second has the key 1, and so on.

Associative arrays are different, associative arrays use named keys that you assign to them, and when looping through associative arrays, you might want to keep the key as well as the value.

This can be done by specifying both the key and value in the foreach defintition, like this:

Example
Print both the key and the value from the $members array:

$members = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

foreach ($members as $x => $y) {
  echo "$x : $y <br>";
}
You will learn more about arrays in the PHP Arrays chapter.

The foreach Loop on Objects
The foreach loop can also be used to loop through properties of an object:

Example
Print the property names and values of the $myCar object:

class Car {
  public $color;
  public $model;
  public function __construct($color, $model) {
    $this->color = $color;
    $this->model = $model;
  }
}

$myCar = new Car("red", "Volvo");

foreach ($myCar as $x => $y) {
  echo "$x: $y <br>";
}
You will learn more about objects in the PHP Objects and Classes chapter.

The break Statement
With the break statement we can stop the loop even if it has not reached the end:

Example
Stop the loop if $x is "blue":

$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) {
  if ($x == "blue") break;
  echo "$x <br>";
}
The continue Statement
With the continue statement we can stop the current iteration, and continue with the next:

Example
Stop, and jump to the next iteration if $x is "blue":

$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) {
  if ($x == "blue") continue;
  echo "$x <br>";
}
Foreach Byref
When looping through the array items, any changes done to the array item will, by default, NOT affect the original array:

Example
By default, changing an array item will not affect the original array:

$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) {
  if ($x == "blue") $x = "pink";
}

var_dump($colors);
BUT, by using the & character in the foreach declaration, the array item is assigned by reference, which results in any changes done to the array item will also be done to the original array:

Example
By assigning the array items by reference, changes will affect the original array:

$colors = array("red", "green", "blue", "yellow");

foreach ($colors as &$x) {
  if ($x == "blue") $x = "pink";
}

var_dump($colors);
 
Alternative Syntax
The foreach loop syntax can also be written with the endforeach statement like this

Example
Loop through the items of an indexed array:

$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) :
  echo "$x <br>";
endforeach;

# PHP Break
The break statement can be used to jump out of different kind of loops.

Break in For loop
The break statement can be used to jump out of a for loop.

ExampleGet your own PHP Server
Jump out of the loop when $x is 4:

for ($x = 0; $x < 10; $x++) {
  if ($x == 4) {
    break;
  }
  echo "The number is: $x <br>";
}
Break in While Loop
The break statement can be used to jump out of a while loop.

Break Example
$x = 0;

while($x < 10) {
  if ($x == 4) {
    break;
  }
  echo "The number is: $x <br>";
  $x++;
}
Break in Do While Loop
The break statement can be used to jump out of a do...while loop.

Example
Stop the loop when $i is 3:

$i = 1;

do {
  if ($i == 3) break;
  echo $i;
  $i++;
} while ($i < 6);
Break in For Each Loop
The break statement can be used to jump out of a foreach loop.

Example
Stop the loop if $x is "blue":

$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) {
  if ($x == "blue") break;
  echo "$x <br>";
}

# PHP Continue
The continue statement can be used to jump out of the current iteration of a loop, and continue with the next.

Continue in For Loops
The continue statement stops the current iteration in the for loop and continue with the next.

ExampleGet your own PHP Server
Move to next iteration if $x = 4:

for ($x = 0; $x < 10; $x++) {
  if ($x == 4) {
    continue;
  }
  echo "The number is: $x <br>";
}
Continue in While Loop
The continue statement stops the current iteration in the while loop and continue with the next.

Continue Example
Move to next iteration if $x = 4:

$x = 0;

while($x < 10) {
  if ($x == 4) {
    continue;
  }
  echo "The number is: $x <br>";
  $x++;
}
Continue in Do While Loop
The continue statement stops the current iteration in the do...while loop and continue with the next.

Example
Stop, and jump to the next iteration if $i is 3:

$i = 0;

do {
  $i++;
  if ($i == 3) continue;
  echo $i;
} while ($i < 6);
Continue in For Each Loop
The continue statement stops the current iteration in the foreach loop and continue with the next.

Example
Stop, and jump to the next iteration if $x is "blue":

$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) {
  if ($x == "blue") continue;
  echo "$x <br>";
}


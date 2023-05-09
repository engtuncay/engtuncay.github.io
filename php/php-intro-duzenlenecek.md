- [Düzenlenecek Notlar](#düzenlenecek-notlar)

# Düzenlenecek Notlar

```php

- EOD String sytax

$str = <<<EOD
	The customers name is
	$usersName and they
live at $streetAddress
	in $cityAddress</br>
EOD;

echo $str;

- INCREMENTS

$randNum = 5;

echo $randNum += 10;
echo "</br>";

echo "++randNum = " . ++$randNum . "</br>";
echo "randNum++ = " . $randNum++ . "</br>";
echo \$randNum;


- MULTI-DIMENSIONAL ARRAYS

\$customers = array(array('Derek', '123 Main', '15212'),
array('Derek', '123 Main', '15212'),
array('Derek', '123 Main', '15212'));

for ($row=0; $row < 3; $row++) { 
	for ($col=0; $col < 3; $col++) {
echo $customers[$row][$col] . ', ';
}
echo '</br>';
}

// Common Array Functions
// sort($yourArray) : Sorts in ascending alphabetical order or
// if you add , SORT_NUMERIC or , SORT_STRING
// asort($yourArray) : sorts arrays with keys
// ksort(\$yourArray) : sorts by the key
// Put a r infront of the above to sort in reverse order

- STRING FUNCTIONS & FORMATTING

\$randString = " Random String ";

echo strlen("$randString") . "</br>";
echo strlen(ltrim("$randString")) . "</br>";
echo strlen(rtrim("$randString")) . "</br>";
echo strlen(trim("$randString")) . "</br>";

- Conversion Codes (printf)

echo "The randomString is $randString </br>";
printf("The randomString is %s </br>", $randString);

\$decimalNum = 2.3456;

printf("decimal num = %.2f </br>", \$decimalNum);

// Other conversion codes
// b : integer to binary
// c : integer to character
// d : integer to decimal
// f : double to float
// o : integer to octal
// s : string to string
// x : integer to hexadecimal\*/

\$randString = "Random String";

echo strtoupper($randString) . "</br>";
echo strtolower($randString) . "</br>";
echo ucfirst(\$randString) . "</br>";

$arrayForString = explode(' ', $randString, 2);
$stringToArray = implode(' ', $arrayForString);
\$partOfString = substr("Random String", 0, 6);

echo "</br>";

echo \$partOfString;

echo "</br>";

$man = "Man";
$manhole = "Manhole";

echo strcmp($man, $manhole);
echo strcasecmp($man, $manhole);

echo "The String " . strstr($randString, "String");
echo "</br>";
echo "Loc the String " . strpos($randString, "String");
echo "</br>";

$newString = str_replace("String", "Stuff", $randString);
echo \$newString;
echo "</br>";

- FUNCTION

function addNumbers($num1, $num2) {
return $num1 + $num2;
}

echo "3 + 4 = " . addNumbers(3, 4);

/\*

- Above is the opening php tag. Include it in a normal html file (ending in
- .php), and inject whatever code you want.
  
  
  
  \*/
  // ^That was a multi-line comment. This line is a single-line comment.
  // Comments are completely ignored when running a .php file.


- BASIC STUFF
  \*/

- Print the words Hello World
    
        echo "Hello World";

- Create a variable and assign a value
    
        $name = "John Doe";

- Change the value of an existing variable
    
        $name = "Adam Smith"; // HA! There is no difference!

- Variables can hold more than just strings
        
        $number = 12;

- Add two strings together and print
echo "My name is " . "Adam Smith";

- Works with variables too

        echo "My name is " . $name;
        echo "My name is $name"; // shorter syntax, does the same thing


- LOGIC STUFF

// If statement
if(1 < 2) {
// The below code is never executed because 1 < 2 is a lie
echo "This should never happen!!!";
}

if($name === "Adam Smith") {
    // The below code is executed because we set $name to Adam Smith earlier
echo "This line is executed";
}

// Else statement
$something = False;
if($something) {
echo "This isn't executed";
}
else {
// Only executed if \$something evaluates to false
echo "But this is";
}

// Elseif statement
$somethingElse = True;
if($something) {
echo "Not used";
}
elseif($something || $somethingElse) {
echo "This block is triggered!";
}
else {
echo "Not used because we've already found a matching condition above.";
}


// Sample Uses of Logical Evaluators

echo "2" == 2; // True because == will try to convert types
echo "2" === 2; // False because they are not the same type
echo !True; // Returns False
echo !False; // Returns True
echo $number > 5 && $number < 42; // Returns True if number is between 5 and 42
echo $name === "A. S." || $name === "Mr. Q"; // True if name is A. S. or Mr. Q
echo !($name === "Minchow"); // Returns True as long as $name is not "Minchow"

echo !($number > 12); // Returns True if number is not greater than 12.
//This^ could be rewritten as $number <= 12


- LOOPS
  \*/

// Executes the code between the {}s as long as the condition between the ()s is true.
$number = 5;
while($number > 0) {
echo "Your number is $number. ";
    $number --;
}
// Prints: "Your number is 5. Your number is 4. Your number is 3. Your number
// is 2. Your number is 1.

// Does the same thing as the above while loop.
// within the ()s, first statement sets initial code before the loop starts,
// second checks that the condition is true before it loops again,
// third executes after every loop.
for($number = 5; $number > 0; $number --) {
    echo "Your number is $number. ";
\$number --;
}

- WORKING WITH DATABASES

// Connect to database, store conneciton info in $mysqli
$connection = new mysqli("hostname", "user", "password", "database_name");

// Execute query on the conncted database
$queryResult = $connection->query("SELECT \* FROM USERS;"); // Any query can go here.

// TODO add get first row from result as array

?>

```
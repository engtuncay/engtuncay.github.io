
- [GET, POST And Session](#get-post-and-session)
  - [Post Variables](#post-variables)


# GET, POST And Session 

## Post Variables

```php
$usersName = $_POST['username'];
$streetAddress = $_POST['streetaddress'];
$cityAddress = $_POST['cityaddress'];

echo $usersName . "</br>";
echo $streetAddress . "</br>";
echo \$cityAddress . "</br></br>";
```

- Remember, GET and POST are for getting data from the client.

GET - visible in URL

POST - not visible in URL

- SESSION is for keeping data persistet between pages, for example, the ID of a logged in user.

// Retrieve data from a GET method
// (ie method="get" in an HTML form from the previous page.)
$username = $_GET['username'];

// Same thing for a POST method but use $_POST instead of $_GET
$color = $_POST['favorite_color'];

// Session works the same way except that you have to call...
session_start();

// ...before you can do anything.

// also, session variables you set on your own, whereas GET and POST are set on the client side.

$_SESSION['favorite_MLP_character'] = "PewDiePie";

// The string between the []s (AKA the Key) can be whatever you want it to be,
// and you can use that string whenever to retrieve or modify the value that
// $_SESSION['string'] holds, even on a different page entirely.

$pony = $_SESSION['favorite_MLP_character'];
echo $pony; 
// prints 'PewDiePie'

// Each session is unique to that user. If you want to delete all session variables stored for this user, do this:

session_unset();

---


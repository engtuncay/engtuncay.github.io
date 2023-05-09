
- [Database Connection](#database-connection)
  - [PDO Connection](#pdo-connection)


# Database Connection

## PDO Connection

```php

try {
    $db = new PDO('mysql:host=localhost;dbname=uyeler', 'root', 'root'); // connectionUrl,user,pass
    //printf("Baglantı kuruldu");
} catch (PDOException $e){
    echo $e->getMessage();
}

```


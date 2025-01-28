
Source : https://mariadb.com/resources/blog/using-json-in-mariadb/

[Back](../readme.md)

---

# Using JSON in MariaDB

Posted on February 23, 2022 by Rob Hedgpeth

You’re likely familiar with MariaDB as your run-of-the-mill relational database. Heck, you may have even used it to create a database, a couple tables, and even executed a few queries. I mean, why not? After all, MariaDB is a rock solid relational database solution, and has been for some time now. But, diving deeper into its capabilities, you’ll quickly discover that it’s more than that.

Much, much more.

One of those capabilities is its ability to handle JavaScript Object Notation (JSON) formatted data, completely free and out-of-the-box. OK, but why is that important? Well, in the context of databases, JSON has often been thought of as something you’d use with NoSQL solutions. And that makes sense as one of the problems the NoSQL Revolution set out to solve was flexibility, or having the ability to create, update and remove data and the structures they’re housed in without having to modify things like those pesky relational schemas.

## Externally-described relational table vs self-described JSON table

Keying off of the success that NoSQL solutions have been able to achieve by using semi-structured data in that time, over the past few years JSON integrations have made their way into the relational world. And for good reason. The ability to store JSON documents within a relational database allows you to create hybrid data models, containing both structured and semi-structured data, and enjoy all of the benefits of JSON without having to sacrifice the advantages of relational databases (e.g. SQL and all things data integrity).

OK, enough of this “setting the stage” business. Let’s check out some of the JSON functionality that’s available in MariaDB and how you can use it!

Tip: If you’d like to jump right into a MariaDB database and use the same dataset I’ll be using for the examples in this article be sure to check out this MariaDB JSON Quickstart Guide!

## Structured Data + Semi-Structured Data

There are a multitude of use cases where it may make sense to combine structured and semi-structured data. That’s just the world of software development for ya. However, I’ve always found it easiest to consume new technologies by focusing on a simple, (hopefully) relatable use case that you can then use to get your own creative juices flowing.

To help walk-through the JSON capabilities that are available within MariaDB I’m going to be using a hypothetical application. This application will only contain one table, called locations, that will store, yep, you guessed it, locations. Simple enough, right?

We won’t be using any kind of front-end management, but imagine that the locations could be represented on some kind of map like the following.

Map with 2 locations highlighted

From the simplest standpoint, geographic locations, no matter the type, contain foundational information such as the name, type, longitude and latitude. But, depending on the type, each location could have different details.

Location details

Enter JSON that can be used to manage the different information per location type. So, the locations table will contain both structured and semi-structured data.

For example:

Table with structured and semi-structured data

Table Creation
Using JSON within MariaDB is as easy as enabling the ability to store JSON data within a table. In fact, the SQL used to create a new location table should look very familiar.

CREATE TABLE locations (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,  
    type CHAR(1) NOT NULL,
    latitude DECIMAL(9,6) NOT NULL,
    longitude DECIMAL(9,6) NOT NULL,
    attr JSON, 
    PRIMARY KEY (id)
);

Note that the attr column included within the locations table is defined with a JSON data type. More specifically the column is using a JSON alias datatype. That means there’s no actual JSON data type, but, instead, the JSON specified datatype assures that added data is valid JSON by adding a check constraint to the columns.

Taking a closer look, we can use the SHOW CREATE query to inspect the details of what’s actually been created.

SHOW CREATE TABLE locations;

Executing the previous statement will yield the following result.

CREATE TABLE locations (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,  
    type CHAR(1) NOT NULL,
    latitude DECIMAL(9,6) NOT NULL,
    longitude DECIMAL(9,6) NOT NULL,
    attr LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL 
    CHECK (JSON_VALID(`attr`)
     PRIMARY KEY (id)
);

Notice that the data type for the attr column is LONGTEXT. Beyond that you’ll see that there are a few constraints added to the field for the character set and collation. Most importantly, however, is the CHECK constraint, which indicates a function that will be executed when the data in attr has been modified, either through insertion or updating.

The JSON_VALID() function is a predefined function that serves to receive JSON data (in the form of a string) and validate whether or not it’s valid. Valid meaning properly formed JSON data.

JSON VALID () function and table

Inserting Data

The JSON data that you insert is contained within quotes, just like any other string-based information you’d insert. The only difference is that the string must be valid JSON.

INSERT INTO locations (type, name, latitude, longitude, attr) VALUES 
    ('R', 'Lou Malnatis', 42.0021628, -87.7255662,
      '{"details": {"foodType": "Pizza", "menu": 
    "https://www.loumalnatis.com/our-menu"}, 
    "favorites": [{"description": "Pepperoni deep dish", "price": 18.75}, 
         {"description": "The Lou", "price": 24.75}]}');

Note that you can specify different JSON data, with completely different structures, within the insert to the same table. Which makes sense, of course, because that’s the entire point!

INSERT INTO locations (type, name, latitude, longitude, attr) VALUES 
    ('A', 'Cloud Gate', 41.8826572, -87.6233039, 
          '{"category": "Landmark", "lastVisitDate": "11/10/2019"}');

## Querying JSON Data

You’ve probably picked up on it by now but managing JSON data within MariaDB really boils down to using predefined functions. For the rest of this article we’ll be taking a look at several of the functions that are available to you.

## Reading Scalar Data

The JSON_VALUE() function returns a JSON scalar value from the specified path in the specified data. In the following example I’ve used the attr column as the “specified data”, but note that the JSON supplied to the function could just as well be a raw string of JSON data.

```sql
SELECT name, latitude, longitude,
    JSON_VALUE(attr, '$.details.foodType') AS food_type
FROM locations
WHERE type = 'R';

```

```
SELECT name, latitude, longitude, JSON_VALUE(attr, '$.favorites.price')
as price FROM locations where type='R';

```

| {"details": {"menu": "https://www.loumalnatis.com/our-menu", "foodType": "Pizza"}, "favorites": [{"price": 18.75, "description": "Pepperoni deep dish"}, {"price": 24.75, "description": "The Lou"}]}
| {"category": "Landmark", "lastVisitDate": "11/10/2019"}  


Which, depending on the data previously inserted into the locations table, could yield a result similar to the following.

Table with Name, Latitude, Longitude, and Food Type column labels

And if you’re wondering “what about handling null/non-existent values?”, because, due to the nature and, really, the purpose of semi-structured, that’s kind of the point. Yep, the JSON_VALUE() function handles that.

Table with Type, Name, Latitude, Longitude, and Food Type column labels

Note: This whole query then tabular results flow is something I’ll keep going with throughout this article.

You’re also not limited to using the JSON functions strictly as part of the SELECT clause. You can just as easily use them within the filtering portions.

SELECT id, name, latitude, longitude
FROM locations
WHERE type = 'S' AND
    JSON_VALUE(attr, '$.details.yearOpened') = 1924;
Reading Object Data
The JSON_QUERY() function accepts JSON data and a JSON path and returns JSON data. The difference between JSON_VALUE() and JSON_QUERY() is that JSON_QUERY() returns entire JSON object data.

SELECT name, description,
    JSON_QUERY(attr, '$.details') AS details
FROM locations
WHERE type = 'R'
Table with Name, Description and Details column labels

The JSON_QUERY() function can also return arrays.

SELECT name, description,
    JSON_QUERY(attr, '$.teams') AS home_teams
FROM locations
WHERE type = 'S';
Table with Name, Description and Home Teams column labels

 

Creating Indexes
At this point you may be wondering with all this querying going on, what about being able to create (performance enhancing) indexes? Is that even possible? You’re damn right it is!

It all starts with the creation of a virtual column.

ALTER TABLE locations ADD COLUMN 
    food_type VARCHAR(25) AS (JSON_VALUE(attr, '$.details.foodType')) VIRTUAL;
Then you can use the virtual column, in combination with other virtual or persistent columns, to create a new index.

CREATE INDEX foodtypes ON locations(food_type);
Modifying JSON Data
As you know, reading data is really only half the battle. To really get the value out of being able to store JSON data within a relational database you also need to be able to modify, or write, it. Luckily, MariaDB provides a bunch of functionality for this as well.

Inserting Fields
The JSON_INSERT() function returns JSON data created by inserting one or more path/value pairs to JSON data.

UPDATE locations
SET attr = JSON_INSERT(attr,'$.nickname','The Bean')
WHERE id = 8;
Inserting Arrays
You can also create new arrays using the JSON_ARRAY() function. Then, within the JSON_INSERT() function, the new array can be inserted into the specified JSON data (in this case the attr field).

UPDATE locations
    SET attr = JSON_INSERT(attr,
                             '$.foodTypes',
        JSON_ARRAY('Asian', 'Mexican'))
WHERE id = 1;
Adding Array Elements
Using the JSON_ARRAY_APPEND() function you can modify an existing array by adding one or more elements.

UPDATE locations
    SET attr = JSON_ARRAY_APPEND(attr,
                '$.foodTypes', 'German’)
WHERE id = 1;
Removing Array Elements
The JSON_REMOVE() can be used to remove an array element, specified by index.

UPDATE locations
    SET attr = JSON_REMOVE(attr,
                '$.foodTypes[2]')
WHERE id = 1;
Note: The JSON_REMOVE() function is so powerful that it can be used to return a resulting JSON document after removing any JSON data (i.e. array element, object, etc.) at the specified path(s) from JSON data.

Hybrid Data Querying
It may be the case that you want to create JSON data from structured data. For that you can use the JSON_OBJECT() function.

SELECT
     JSON_OBJECT('name', name, 'latitude', latitude, 'longitude', longitude) AS data
FROM locations
WHERE type = 'S';
Hybrid data query example

Merging Data
You can merge the data returned from the JSON_OBJECT() function and merge it with existing JSON data by using the JSON_MERGE() function. Notice below, that you can create an entirely new JSON object, using the JSON_OBJECT() function, and then use the JSON_MERGE() function to combine, or merge, it with the value of the attr field.

SELECT
  JSON_MERGE(
    JSON_OBJECT(
        'name', name,
        'latitude', latitude,
        'Longitude', longitude),
    attr) AS data
FROM locations
WHERE type = 'R';
Example of merging data

JSON to Tabular Data

In MariaDB Enterprise Server 10.6 the JSON_TABLE() function was added. This new function enables you to transform JSON data directly into tabular format, which can even be used directly within a FROM clause to join to other tables (or tabular data) or to retrieve data from a JSON field when migrating to other data types.

SELECT l.name, d.food_type, d.menu
FROM
      locations AS l,
      JSON_TABLE(l.attr,
                  ‘$’ COLUMNS(
                         food_type VARCHAR(25) PATH ‘$.foodType’,
                         menu VARCHAR(200) PATH ‘$.menu’)
                  ) AS d
WHERE id = 2;

Example of JSON to tabular data

Enforcing Data Integrity
Lastly, I’d like to touch on the ability you have to be able to enforce data integrity within JSON data that exists within MariaDB. In more plain English that means that you can create constraints, or requirements, for the types of JSON that is allowed to exist within your tables.

Below is an example of how you can create a new CONSTRAINT, in this case named check_attr, that specifies that for each location of type ‘S’ the JSON data within it has to fit particular criteria. Namely you can control things like the data types for properties or values, whether a property must exist, and even the length of the values within a specified property. This is all accomplished using the JSON functions within MariaDB. As you can see it’s extremely flexible and powerful.

ALTER TABLE locations ADD CONSTRAINT check_attr
   CHECK(
       type != 'S' OR (type = 'S' AND
           JSON_TYPE(JSON_QUERY(attr, '$.details')) = 'OBJECT' AND
           JSON_TYPE(JSON_QUERY(attr, '$.details.events')) = 'ARRAY' AND
           JSON_TYPE(JSON_VALUE(attr, '$.details.yearOpened')) = 'INTEGER' AND
           JSON_TYPE(JSON_VALUE(attr, '$.details.capacity')) = 'INTEGER' AND
           JSON_EXISTS(attr, '$.details.yearOpened') = 1 AND
           JSON_EXISTS(attr, '$.details.capacity') = 1 AND
           JSON_LENGTH(JSON_QUERY(attr, '$.details.events')) > 0));
Next Steps
Thanks so much for reading this article on how you can combine the power of MariaDB with the flexibility of JSON. But we’ve only scratched the surface of what’s available within MariaDB.

The full list of JSON functions currently available within MariaDB Enterprise Server 10.6:

Full list of JSON functions

Ultimately, we all learn in different ways. If you’d like to learn even more about the JSON functionality that’s available, and how you can start creating hybrid data models using MariaDB, please check out the following resources I’ve also put together.

Webinar – Hybrid Data Model Best Practices: JSON + Relational

MariaDB JSON Quick Start using Docker

Sample web applications for tracking different types of location, which take advantage of semi-structured JSON data:

Node.js (using MariaDB Connector/Node.js)
Python (using MariaDB Connector/Python)
JDBC + Spring Data (using MariaDB Connector)
R2DBC + Spring Data (using MariaDB Connector)
Learn even more
If you’d like to learn even more about what’s possible with MariaDB be sure to check out the Developer Hub and our new Developer Code Central GitHub organization. There you can find much more content just like this spanning a variety of technologies, use cases and programming languages.

You can also dive even deeper into MariaDB capabilities in the official documentation.

And, as always, we’d be nothing without our awesome community! If you’d like to help contribute you can find us on GitHub, send feedback directly to us at developers@mariadb.com, or join the conversation in the new MariaDB Community Slack!

Happy coding!

Tags: JSON
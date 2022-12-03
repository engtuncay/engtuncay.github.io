
<h2>Source Link to the Article</h2>

https://www.baeldung.com/jdbi

<h1>A Guide to Jdbi</h1> 

Last modified: February 12, 2020

- [1. Introduction](#1-introduction)
- [2. Jdbi Setup](#2-jdbi-setup)
- [3. Connecting to the Database](#3-connecting-to-the-database)
  - [3.1. Additional Parameters](#31-additional-parameters)
  - [3.2. Using a DataSource](#32-using-a-datasource)
  - [3.3. Working With Handles](#33-working-with-handles)
- [4. Simple Statements](#4-simple-statements)
- [5. Querying the Database](#5-querying-the-database)
  - [5.1. Creating a Query](#51-creating-a-query)
  - [5.2. Mapping the Results](#52-mapping-the-results)
  - [5.3. Iterating Over the Results](#53-iterating-over-the-results)
  - [5.4. Getting a Single Result](#54-getting-a-single-result)
- [6. Binding Parameters](#6-binding-parameters)
- [7. Issuing More Complex Statements](#7-issuing-more-complex-statements)
  - [7.1. Extracting Auto-Increment Column Values](#71-extracting-auto-increment-column-values)
- [8. Transactions](#8-transactions)
  - [8.1. Manual Transaction Management](#81-manual-transaction-management)
- [9. Conclusions and Further Reading](#9-conclusions-and-further-reading)


# 1. Introduction

In this article, we're going to look at how to query a relational database with jdbi.

Jdbi is an open source Java library (Apache license) that uses lambda expressions and reflection to provide a friendlier, higher level interface than JDBC to access the database.

Jdbi, however, isn't an ORM; even though it has an optional SQL Object mapping module, it doesn't have a session with attached objects, a database independence layer, and any other bells and whistles of a typical ORM.

# 2. Jdbi Setup

Jdbi is organized into a core and several optional modules.

To get started, we just have to include the core module in our dependencies:

```xml
<dependencies>
    <dependency>
        <groupId>org.jdbi</groupId>
        <artifactId>jdbi3-core</artifactId>
        <version>3.1.0</version>
    </dependency>
</dependencies>
```

Over the course of this article, we'll show examples using the HSQL database:

```xml
<dependency>
    <groupId>org.hsqldb</groupId>
    <artifactId>hsqldb</artifactId>
    <version>2.4.0</version>
    <scope>test</scope>
</dependency>
```

We can find the latest version of jdbi3-core, HSQLDB and the other Jdbi modules on Maven Central.

# 3. Connecting to the Database
   
First, we need to connect to the database. To do that, we have to specify the connection parameters.

The starting point is the Jdbi class:

```java
Jdbi jdbi = Jdbi.create("jdbc:hsqldb:mem:testDB", "sa", "");
```

Here, we're specifying the connection URL, a username, and, of course, a password.

## 3.1. Additional Parameters

If we need to provide other parameters, we use an overloaded method accepting a Properties object:

```java
Properties properties = new Properties();
properties.setProperty("username", "sa");
properties.setProperty("password", "");
Jdbi jdbi = Jdbi.create("jdbc:hsqldb:mem:testDB", properties);
```
In these examples, we've saved the Jdbi instance in a local variable. That's because we'll use it to send statements and queries to the database.

In fact, merely calling create doesn't establish any connection to the DB. It just saves the connection parameters for later.

## 3.2. Using a DataSource

If we connect to the database using a DataSource, as is usually the case, we can use the appropriate create overload:

```java
Jdbi jdbi = Jdbi.create(datasource);
```

## 3.3. Working With Handles

Actual connections to the database are represented by instances of the Handle class.

The easiest way to work with handles, and have them automatically closed, is by using lambda expressions:

```java
jdbi.useHandle(handle -> {
    doStuffWith(handle);
});
```

We call useHandle when we don't have to return a value.

Otherwise, we use withHandle:

```java
jdbi.withHandle(handle -> {
    return computeValue(handle);
});
```

It's also possible, though not recommended, to manually open a connection handle; in that case, we have to close it when we're done:

```java
Jdbi jdbi = Jdbi.create("jdbc:hsqldb:mem:testDB", "sa", "");
try (Handle handle = jdbi.open()) {
    doStuffWith(handle);
}
```

Luckily, as we can see, Handle implements Closeable, so it can be used with try-with-resources.(!!!)

# 4. Simple Statements

Now that we know how to obtain a connection let's see how to use it.

In this section, we'll create a simple table that we'll use throughout the article.

To send statements such as create table to the database, we use the execute method:

```java
handle.execute(
  "create table project "
  + "(id integer identity, name varchar(50), url varchar(100))");
```

execute returns the number of rows that were affected by the statement:

```java
int updateCount = handle.execute(
  "insert into project values "
  + "(1, 'tutorials', 'github.com/eugenp/tutorials')");

assertEquals(1, updateCount);
```

Actually, execute is just a convenience method.

We'll look at more complex use cases in later sections, but before doing that, we need to learn how to extract results from the database.

# 5. Querying the Database

The most straightforward expression that produces results from the DB is a SQL query.

To issue a query with a Jdbi Handle, we have to, at least:

- create the query
- choose how to represent each row
- iterate over the results

We'll now look at each of the points above.

## 5.1. Creating a Query

Unsurprisingly, Jdbi represents queries as instances of the Query class.

We can obtain one from a handle:

```java
Query query = handle.createQuery("select * from project");
```

## 5.2. Mapping the Results

Jdbi abstracts away from the JDBC ResultSet, which has a quite cumbersome API.

Therefore, it offers several possibilities to access the columns resulting from a query or some other statement that returns a result. We'll now see the simplest ones.

We can represent each row as a map:

```java
query.mapToMap();
```

The keys of the map will be the selected column names.

Or, when a query returns a single column, we can map it to the desired Java type:

```java
handle.createQuery("select name from project").mapTo(String.class);
```

Jdbi has built-in mappers for many common classes. Those that are specific to some library or database system are provided in separate modules.

Of course, we can also define and register our mappers. We'll talk about it in a later section.

Finally, we can map rows to a bean or some other custom class. Again, we'll see the more advanced options in a dedicated section.

## 5.3. Iterating Over the Results

Once we've decided how to map the results by calling the appropriate method, we receive a ResultIterable object.

We can then use it to iterate over the results, one row at a time.

Here we'll look at the most common options.

We can merely accumulate the results in a list:

```java
List<Map<String, Object>> results = query.mapToMap().list();
```

Or to another Collection type:

```java
List<String> results = query.mapTo(String.class).collect(Collectors.toSet());
```

Or we can iterate over the results as a stream:

```java
query.mapTo(String.class).useStream((Stream<String> stream) -> {
    doStuffWith(stream)
});
```

Here, we explicitly typed the stream variable for clarity, but it's not necessary to do so.

## 5.4. Getting a Single Result

As a special case, when we expect or are interested in just one row, we have a couple of dedicated methods available.

If we want at most one result, we can use findFirst:

Optional<Map<String, Object>> first = query.mapToMap().findFirst();

As we can see, it returns an Optional value, which is only present if the query returns at least one result.

If the query returns more than one row, only the first is returned.

If instead, we want one and only one result, we use findOnly:

```java
Date onlyResult = query.mapTo(Date.class).findOnly();
```

Finally, if there are zero results or more than one, findOnly throws an IllegalStateException.

# 6. Binding Parameters

Often, queries have a fixed portion and a parameterized portion. This has several advantages, including:

- security: by avoiding string concatenation, we prevent SQL injection
- ease: we don't have to remember the exact syntax of complex data types such as timestamps
- performance: the static portion of the query can be parsed once and cached

Jdbi supports both positional and named parameters.

We insert positional parameters as question marks in a query or statement:

```java
Query positionalParamsQuery =
  handle.createQuery("select * from project where name = ?");

```
Named parameters, instead, start with a colon:

```java
Query namedParamsQuery =
  handle.createQuery("select * from project where url like :pattern");
```

In either case, to set the value of a parameter, we use one of the variants of the bind method:

```java
positionalParamsQuery.bind(0, "tutorials");
namedParamsQuery.bind("pattern", "%github.com/eugenp/%");

```

Note that, unlike JDBC, indexes start at 0.

6.1. Binding Multiple Named Parameters at Once

We can also bind multiple named parameters together using an object.

Let's say we have this simple query:

```java
Query query = handle.createQuery(
  "select id from project where name = :name and url = :url");
Map<String, String> params = new HashMap<>();
params.put("name", "REST with Spring");
params.put("url", "github.com/eugenp/REST-With-Spring");
```

Then, for example, we can use a map:

```java
query.bindMap(params);
```

Or we can use an object in various ways. Here, for example, we bind an object that follows the JavaBean convention:

```java
query.bindBean(paramsBean);
```

But we could also bind an object's fields or methods; for all the supported options, see the Jdbi documentation.

# 7. Issuing More Complex Statements

Now that we've seen queries, values, and parameters, we can go back to statements and apply the same knowledge.

Recall that the execute method we saw earlier is just a handy shortcut.

In fact, similarly to queries, DDL and DML statements are represented as instances of the class Update.

We can obtain one by calling the method createUpdate on a handle:

```java
Update update = handle.createUpdate(
  "INSERT INTO PROJECT (NAME, URL) VALUES (:name, :url)");

```

Then, on an Update we have all the binding methods that we have in a Query, so section 6. applies for updates as well.

Statements are executed when we call, surprise, execute:

```java
int rows = update.execute();
```

As we have already seen, it returns the number of affected rows.

## 7.1. Extracting Auto-Increment Column Values

As a special case, when we have an insert statement with auto-generated columns (typically auto-increment or sequences), we may want to obtain the generated values.

Then, we don't call execute, but executeAndReturnGeneratedKeys:

```java
Update update = handle.createUpdate(
  "INSERT INTO PROJECT (NAME, URL) "
  + "VALUES ('tutorials', 'github.com/eugenp/tutorials')");
ResultBearing generatedKeys = update.executeAndReturnGeneratedKeys();

```

ResultBearing is the same interface implemented by the Query class that we've seen previously, so we already know how to use it:

```java
generatedKeys.mapToMap()
  .findOnly().get("id");

```

# 8. Transactions

We need a transaction whenever we have to execute multiple statements as a single, atomic operation.

As with connection handles, we introduce a transaction by calling a method with a closure:

```java
handle.useTransaction((Handle h) -> {
    haveFunWith(h);
});

```

And, as with handles, the transaction is automatically closed when the closure returns.

However, we must commit or rollback the transaction before returning:

```java
handle.useTransaction((Handle h) -> {
    h.execute("...");
    h.commit();
});

```

If, however, an exception is thrown from the closure, Jdbi automatically rolls back the transaction.

As with handles, we have a dedicated method, inTransaction, if we want to return something from the closure:

```java
handle.inTransaction((Handle h) -> {
    h.execute("...");
    h.commit();
    return true;
});

```
## 8.1. Manual Transaction Management

Although in the general case it's not recommended, we can also begin and close a transaction manually:

```java
handle.begin();
// ...
handle.commit();
handle.close();

```

# 9. Conclusions and Further Reading

In this tutorial, we've introduced the core of Jdbi: queries, statements, and transactions.

We've left out some advanced features, like custom row and column mapping and batch processing.

We also haven't discussed any of the optional modules, most notably the SQL Object extension.

Everything is presented in detail in the Jdbi documentation.

The implementation of all these examples and code snippets can be found in the GitHub project – this is a Maven project, so it should be easy to import and run as is.

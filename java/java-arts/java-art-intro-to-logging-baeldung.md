
<h2>Source Link to the Article</h2>

https://www.baeldung.com/java-logging-intro

<h2>Introduction to Java Logging</h2> 

Last modified: October 24, 2021

- [1. Overview](#1-overview)
- [2. Enabling Logging](#2-enabling-logging)
- [3. Log4j 2](#3-log4j-2)
  - [3.1. Configuration](#31-configuration)
  - [3.2. Logging to File](#32-logging-to-file)
  - [3.3. Asynchronous Logging](#33-asynchronous-logging)
  - [3.4. Usage](#34-usage)
  - [3.5. Package Level Configuration](#35-package-level-configuration)
- [4. Logback](#4-logback)
  - [4.1. Configuration](#41-configuration)
  - [4.2. SLF4J](#42-slf4j)
- [5. Log4J](#5-log4j)
  - [5.1. Configuration](#51-configuration)
  - [5.2. Usage](#52-usage)
- [6. Conclusion](#6-conclusion)


# 1. Overview

Logging is a powerful aid for understanding and debugging program's run-time behavior. Logs capture and persist the important data and make it available for analysis at any point in time.

This article discusses the most popular java logging framewloorks, Log4j 2 and Logback, along with their predecessor Log4j, and briefly touches upon SLF4J, a logging facade that provides a common interface for different logging frameworks.

# 2. Enabling Logging

All the logging frameworks discussed in the article share the notion of loggers, appenders and layouts. Enabling logging inside the project follows three common steps:

- Adding needed libraries
- Configuration
- Placing log statements

The upcoming sections discuss the steps for each framework individually.

# 3. Log4j 2

Log4j 2 is new and improved version of the Log4j logging framework. The most compelling improvement is the possibility of asynchronous logging. Log4j 2 requires the following libraries:

```xml
<dependency>
    <groupId>org.apache.logging.log4j</groupId>
    <artifactId>log4j-api</artifactId>
    <version>2.6.1</version>
</dependency>
<dependency>
    <groupId>org.apache.logging.log4j</groupId>
    <artifactId>log4j-core</artifactId>
    <version>2.6.1</version>
</dependency>
```

Latest version of log4j-api you can find here and log4j-core – here.

## 3.1. Configuration

Configuring Log4j 2 is based on the main configuration log4j2.xml file. The first thing to configure is the appender.

These determine where the log message will be routed. Destination can be a console, a file, socket, etc.

Log4j 2 has many appenders for different purposes, you can find more information on the official Log4j 2 site.

Lets take a look at a simple config example:

```xml
<Configuration status="debug" name="baeldung" packages="">
    <Appenders>
        <Console name="stdout" target="SYSTEM_OUT">
            <PatternLayout pattern="%d{yyyy-MM-dd HH:mm:ss} %p %m%n"/>
        </Console>
    </Appenders>
</Configuration>
```

You can set a name for each appender, for example use name console instead of stdout.

Notice the PatternLayout element – this determines how message should look like. In our example, the pattern is set based on the pattern param, where %d determines date pattern, %p – output of log level, %m – output of logged message and %n – adds new line symbol. More info about pattern you can find on official Log4j 2 page.

Finally – to enable an appender (or multiple) you need to add it to <Root> section:

<Root level="error">
    <AppenderRef ref="STDOUT"/>
</Root>

## 3.2. Logging to File

Sometimes you will need to use logging to a file, so we will add fout logger to our configuration:

<Appenders>
    <File name="fout" fileName="baeldung.log" append="true">
        <PatternLayout>
            <Pattern>%d{yyyy-MM-dd HH:mm:ss} %-5p %m%nw</Pattern>
        </PatternLayout>
    </File>
</Appenders>

The File appender have several parameters that can be configured:

* file – determines file name of the log file

* append – The default value for this param is true, meaning that by default a File appender will append to an existing file and not truncate it.

PatternLayout that was described in previous example.

In order to enable File appender you need to add it to <Root> section:

```xml
<Root level="INFO">
    <AppenderRef ref="stdout" />
    <AppenderRef ref="fout"/>
</Root>
```

## 3.3. Asynchronous Logging

If you want to make your Log4j 2 asynchronous you need to add LMAX disruptor library to your pom.xml. LMAX disruptor is a lock-free inter-thread communication library.

Adding disruptor to pom.xml:

```xml
<dependency>
    <groupId>com.lmax</groupId>
    <artifactId>disruptor</artifactId>
    <version>3.3.4</version>
</dependency>

```
Latest version of disruptor can be found here.

If you want to use LMAX disruptor you need to use <asyncRoot> instead of <Root> in your configuration.

```xml
<AsyncRoot level="DEBUG">
    <AppenderRef ref="stdout" />
    <AppenderRef ref="fout"/>
</AsyncRoot>
```

Or you can enable asynchronous logging by setting the system property Log4jContextSelector to org.apache.logging.log4j.core.async.AsyncLoggerContextSelector.

You can of course read more about the configuration of the Log4j2 async logger and see some performance diagrams on the Log4j2 official page .

## 3.4. Usage

The following is a simple example that demonstrates the use of Log4j for logging:

```java
import org.apache.logging.log4j.Logger;
import org.apache.logging.log4j.LogManager;

public class Log4jExample {

    private static Logger logger = LogManager.getLogger(Log4jExample.class);

    public static void main(String[] args) {
        logger.debug("Debug log message");
        logger.info("Info log message");
        logger.error("Error log message");
    }
}
```

After running, the application will log the following messages to both console and file named baeldung.log:

```text
2016-06-16 17:02:13 INFO  Info log message
2016-06-16 17:02:13 ERROR Error log message

```
If you elevate the root log level to ERROR:

```xml
<level value="ERROR" />
```

The output will look like the following:

```txt
2016-06-16 17:02:13 ERROR Error log message
```

As you can see, changing the log level to upper parameter causes the messages with lower log levels will not be print to appenders.

Method logger.error can be also used to log an exception that occurred:

```java
try {
    // Here some exception can be thrown
} catch (Exception e) {
    logger.error("Error log message", throwable);
}
```

## 3.5. Package Level Configuration

Let's say you need to show messages with the log level TRACE – for example from a specific package such as com.baeldung.log4j2:

```java
logger.trace("Trace log message");
```

For all other packages you want to continue logging only INFO messages.

Keep in mind that TRACE is lower than the root log level INFO that we specified in configuration.

To enable logging only for one of packages you need to add the following section before <Root> to your log4j2.xml:

```xml
<Logger name="com.baeldung.log4j2" level="debug">
    <AppenderRef ref="stdout"/>
</Logger>
```

It will enable logging for com.baeldung.log4j package and your output will look like:

```txt
2016-06-16 17:02:13 TRACE Trace log message
2016-06-16 17:02:13 DEBUG Debug log message
2016-06-16 17:02:13 INFO  Info log message
2016-06-16 17:02:13 ERROR Error log message
```

# 4. Logback

Logback is meant to be an improved version of Log4j, developed by the same developer who made Log4j.

Logback also has a lot more features compared to Log4j, with many of them being introduced into Log4j 2 as well. Here's a quick look at all of the advantages of Logback on the official site.

Let's start by adding the following dependency to the pom.xml:

```xml
<dependency>
    <groupId>ch.qos.logback</groupId>
    <artifactId>logback-classic</artifactId>
    <version>1.2.6</version>
</dependency>
```

This dependency will transitively pull in another two dependencies, the logback-core and slf4j-api. Note that the latest version of Logback can be found here.

## 4.1. Configuration

Let's now have a look at a Logback configuration example:

```xml
<configuration>
  # Console appender
  <appender name="stdout" class="ch.qos.logback.core.ConsoleAppender">
    <layout class="ch.qos.logback.classic.PatternLayout">
      # Pattern of log message for console appender
      <Pattern>%d{yyyy-MM-dd HH:mm:ss} %-5p %m%n</Pattern>
    </layout>
  </appender>

  # File appender
  <appender name="fout" class="ch.qos.logback.core.FileAppender">
    <file>baeldung.log</file>
    <append>false</append>
    <encoder>
      # Pattern of log message for file appender
      <pattern>%d{yyyy-MM-dd HH:mm:ss} %-5p %m%n</pattern>
    </encoder>
  </appender>

  # Override log level for specified package
  <logger name="com.baeldung.log4j" level="TRACE"/>

  <root level="INFO">
    <appender-ref ref="stdout" />
    <appender-ref ref="fout" />
  </root>
</configuration>
```

Logback uses SLF4J as an interface, so you need to import SLF4J's Logger and LoggerFactory.

## 4.2. SLF4J

SLF4J provides a common interface and abstraction for most of the Java logging frameworks. It acts as a facade and provides standardized API for accessing the underlying features of the logging framework.

Logback uses SLF4J as native API for its functionality. Following is the example using Logback logging:

```java
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

public class Log4jExample {

    private static Logger logger = LoggerFactory.getLogger(Log4jExample.class);

    public static void main(String[] args) {
        logger.debug("Debug log message");
        logger.info("Info log message");
        logger.error("Error log message");
    }
}
```

The output will remain the same as in previous examples.

# 5. Log4J

Finally, let's have a look at the venerable Log4j logging framework.

At this point it's of course outdated, but worth discussing as it lays the foundation for its more modern successors.

Many of the configuration details match those discussed in Log4j 2 section.

## 5.1. Configuration

First of all you need to add Log4j library to your projects pom.xml:

```xml
<dependency>
    <groupId>log4j</groupId>
    <artifactId>log4j</artifactId>
    <version>1.2.17</version>
</dependency>
```

Here you should be able to find latest version of Log4j.

Lets take a look at a complete example of simple Log4j configuration with only one console appender:

```xml
<!DOCTYPE log4j:configuration SYSTEM "log4j.dtd" >
<log4j:configuration debug="false">

    <!--Console appender-->
    <appender name="stdout" class="org.apache.log4j.ConsoleAppender">
        <layout class="org.apache.log4j.PatternLayout">
            <param name="ConversionPattern" 
              value="%d{yyyy-MM-dd HH:mm:ss} %p %m%n" />
        </layout>
    </appender>

    <root>
        <level value="INFO" />
        <appender-ref ref="stdout" />
    </root>

</log4j:configuration>
```

`<log4j:configuration debug=”false”>` is open tag of whole configuration which has one property – debug. It determines whether you want to add Log4j debug information to logs.

## 5.2. Usage

After you have added Log4j library and configuration you can use logger in your code. Lets take a look at a simple example:

```java
import org.apache.log4j.Logger;

public class Log4jExample {
    private static Logger logger = Logger.getLogger(Log4jExample.class);

    public static void main(String[] args) {
        logger.debug("Debug log message");
        logger.info("Info log message");
        logger.error("Error log message");
    }
}
```

# 6. Conclusion

This article shows very simple examples of how you can use different logging framework such as Log4j, Log4j2 and Logback. It covers simple configuration examples for all of the mentioned frameworks.

The examples that accompany the article can be found over on GitHub.
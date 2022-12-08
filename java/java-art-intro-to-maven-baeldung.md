<h2>Source Link to the Article</h2>

https://www.baeldung.com/maven

<h1>Apache Maven Tutorial</h1> 

Last modified: July 5, 2022

- [1. Introduction](#1-introduction)
- [2. Why Use Maven?](#2-why-use-maven)
- [3. Project Object Model](#3-project-object-model)
  - [3.1. Project Identifiers](#31-project-identifiers)
  - [3.2. Dependencies](#32-dependencies)
  - [3.3. Repositories](#33-repositories)
  - [3.4. Properties](#34-properties)
  - [3.5. Build](#35-build)
  - [3.6. Using Profiles](#36-using-profiles)
- [4. Maven Build Lifecycles](#4-maven-build-lifecycles)
  - [4.1. Lifecycle Phases](#41-lifecycle-phases)
  - [4.2. Plugins and Goals](#42-plugins-and-goals)
- [5. Your First Maven Project](#5-your-first-maven-project)
  - [5.1. Generating a Simple Java Project](#51-generating-a-simple-java-project)
  - [5.2. Compiling and Packaging a Project](#52-compiling-and-packaging-a-project)
  - [5.3. Executing an Application](#53-executing-an-application)
- [6. Conclusion](#6-conclusion)


# 1. Introduction

Building a software project typically consists of such tasks as downloading dependencies, putting additional jars on a classpath, compiling source code into binary code, running tests, packaging compiled code into deployable artifacts such as JAR, WAR, and ZIP files, and deploying these artifacts to an application server or repository.

Apache Maven automates these tasks, minimizing the risk of humans making errors while building the software manually and separating the work of compiling and packaging our code from that of code construction.

In this tutorial, we're going to explore this powerful tool for describing, building, and managing Java software projects using a central piece of information — the Project Object Model (POM) — that is written in XML.

# 2. Why Use Maven?

The key features of Maven are:

- simple project setup that follows best practices: Maven tries to avoid as much configuration as possible, by supplying project templates (named archetypes)

- dependency management: it includes automatic updating, downloading and validating the compatibility, as well as reporting the dependency closures (known also as transitive dependencies)

- isolation between project dependencies and plugins: with Maven, project dependencies are retrieved from the dependency repositories while any plugin's dependencies are retrieved from the plugin repositories, resulting in fewer conflicts when plugins start to download additional dependencies

- central repository system: project dependencies can be loaded from the local file system or public repositories, such as Maven Central
In order to learn how to install Maven on your system, please check this tutorial on Baeldung.

# 3. Project Object Model

The configuration of a Maven project is done via a Project Object Model (POM), represented by a pom.xml file. The POM describes the project, manages dependencies, and configures plugins for building the software.

The POM also defines the relationships among modules of multi-module projects. Let's look at the basic structure of a typical POM file:

```xml
<project>
    <modelVersion>4.0.0</modelVersion>
    <groupId>com.baeldung</groupId>
    <artifactId>baeldung</artifactId>
    <packaging>jar</packaging>
    <version>1.0-SNAPSHOT</version>
    <name>com.baeldung</name>
    <url>http://maven.apache.org</url>
    <dependencies>
        <dependency>
            <groupId>org.junit.jupiter</groupId>
            <artifactId>junit-jupiter-api</artifactId>
            <version>5.8.2</version>
            <scope>test</scope>
        </dependency>
    </dependencies>
    <build>
        <plugins>
            <plugin>
            //...
            </plugin>
        </plugins>
    </build>
</project>
```

Let's take a closer look at these constructs.

## 3.1. Project Identifiers

Maven uses a set of identifiers, also called coordinates, to uniquely identify a project and specify how the project artifact should be packaged:

* groupId – a unique base name of the company or group that created the project

* artifactId – a unique name of the project

* version – a version of the project

* packaging – a packaging method (e.g. WAR/JAR/ZIP)

The first three of these (groupId:artifactId:version) combine to form the unique identifier and are the mechanism by which you specify which versions of external libraries (e.g. JARs) your project will use.

## 3.2. Dependencies

These external libraries that a project uses are called dependencies. The dependency management feature in Maven ensures the automatic download of those libraries from a central repository, so you don't have to store them locally.

This is a key feature of Maven and provides the following benefits:

- uses less storage by significantly reducing the number of downloads off remote repositories

- makes checking out a project quicker

- provides an effective platform for exchanging binary artifacts within your organization and beyond without the need for building artifacts from source every time

In order to declare a dependency on an external library, you need to provide the groupId, artifactId, and version of the library. Let's take a look at an example:

```xml
<dependency>
    <groupId>org.springframework</groupId>
    <artifactId>spring-core</artifactId>
    <version>5.3.16</version>
</dependency>
```

As Maven processes the dependencies, it will download the Spring Core library into your local Maven repository.

## 3.3. Repositories

A repository in Maven is used to hold build artifacts and dependencies of varying types. The default local repository is located in the .m2/repository folder under the home directory of the user.

If an artifact or a plugin is available in the local repository, Maven uses it. Otherwise, it is downloaded from a central repository and stored in the local repository. The default central repository is Maven Central.

Some libraries, such as the JBoss server, are not available at the central repository but are available at an alternate repository. For those libraries, you need to provide the URL to the alternate repository inside the pom.xml file:

```xml
<repositories>
    <repository>
        <id>JBoss repository</id>
        <url>http://repository.jboss.org/nexus/content/groups/public/</url>
    </repository>
</repositories>

```
Please note that you can use multiple repositories in your projects.

## 3.4. Properties

Custom properties can help to make your pom.xml file easier to read and maintain. In the classic use case, you would use custom properties to define versions for your project's dependencies.

Maven properties are value-placeholders and are accessible anywhere within a pom.xml by using the notation ${name}, where name is the property.

Let's see an example:

```xml
<properties>
    <spring.version>5.3.16</spring.version>
</properties>

<dependencies>
    <dependency>
        <groupId>org.springframework</groupId>
        <artifactId>spring-core</artifactId>
        <version>${spring.version}</version>
    </dependency>
    <dependency>
        <groupId>org.springframework</groupId>
        <artifactId>spring-context</artifactId>
        <version>${spring.version}</version>
    </dependency>
</dependencies>
```

Now if you want to upgrade Spring to a newer version, you only have to change the value inside the<spring.version> property tag and all the dependencies using that property in their <version> tags will be updated.

Properties are also often used to define build path variables:

<properties>
    <project.build.folder>${project.build.directory}/tmp/</project.build.folder>
</properties>

<plugin>
    //...
    <outputDirectory>${project.resources.build.folder}</outputDirectory>
    //...
</plugin>

## 3.5. Build

The build section is also a very important section of the Maven POM. It provides information about the default Maven goal, the directory for the compiled project, and the final name of the application. The default build section looks like this:

<build>
    <defaultGoal>install</defaultGoal>
    <directory>${basedir}/target</directory>
    <finalName>${artifactId}-${version}</finalName>
    <filters>
      <filter>filters/filter1.properties</filter>
    </filters>
    //...
</build>

The default output folder for compiled artifacts is named target, and the final name of the packaged artifact consists of the artifactId and version, but you can change it at any time.

## 3.6. Using Profiles

Another important feature of Maven is its support for profiles. A profile is basically a set of configuration values. By using profiles, you can customize the build for different environments such as Production/Test/Development:

<profiles>
    <profile>
        <id>production</id>
        <build>
            <plugins>
                <plugin>
                //...
                </plugin>
            </plugins>
        </build>
    </profile>
    <profile>
        <id>development</id>
        <activation>
            <activeByDefault>true</activeByDefault>
        </activation>
        <build>
            <plugins>
                <plugin>
                //...
                </plugin>
            </plugins>
        </build>
     </profile>
 </profiles>

As you can see in the example above, the default profile is set to development. If you want to run the production profile, you can use the following Maven command:

mvn clean install -Pproduction

# 4. Maven Build Lifecycles
Every Maven build follows a specified lifecycle. You can execute several build lifecycle goals, including the ones to compile the project’s code, create a package, and install the archive file in the local Maven dependency repository.

## 4.1. Lifecycle Phases

The following list shows the most important Maven lifecycle phases:

* validate – checks the correctness of the project
* compile – compiles the provided source code into binary artifacts
* test – executes unit tests
* package – packages compiled code into an archive file
* integration-test – executes additional tests, which require the packaging
* verify – checks if the package is valid
* install – installs the package file into the local Maven repository
* deploy – deploys the package file to a remote server or repository

## 4.2. Plugins and Goals

A Maven plugin is a collection of one or more goals. Goals are executed in phases, which helps to determine the order in which the goals are executed.

The rich list of plugins that are officially supported by Maven is available here. There is also an interesting article on how to build an executable JAR on Baeldung using various plugins.

To gain a better understanding of which goals are run in which phases by default, take a look at the default Maven lifecycle bindings.

To go through any one of the above phases, we just have to call one command:

mvn <phase>

For example, mvn clean install will remove the previously created jar/war/zip files and compiled classes (clean) and execute all the phases necessary to install the new archive (install).

Please note that goals provided by plugins can be associated with different phases of the lifecycle.

# 5. Your First Maven Project

In this section, we will use the command line functionality of Maven to create a Java project.

## 5.1. Generating a Simple Java Project

In order to build a simple Java project, let's run the following command:

mvn archetype:generate \
  -DgroupId=com.baeldung \
  -DartifactId=baeldung \
  -DarchetypeArtifactId=maven-archetype-quickstart \
  -DarchetypeVersion=1.4 \
  -DinteractiveMode=false

The groupId is a parameter indicating the group or individual that created a project, which is often a reversed company domain name. The artifactId is the base package name used in the project, and we use the standard archetype. Here we are using the latest archetype version to ensure our project is created with updated and latest structure.

Since we didn't specify the version and the packaging type, these will be set to default values — the version will be set to 1.0-SNAPSHOT, and the packaging will be jar by default.

If you don't know which parameters to provide, you can always specify interactiveMode=true, so that Maven asks for all the required parameters.

After the command completes, we have a Java project containing an App.java class, which is just a simple “Hello World” program, in the src/main/java folder.

We also have an example test class in src/test/java. The pom.xml of this project will look similar to this:

<project>
    <modelVersion>4.0.0</modelVersion>
    <groupId>com.baeldung</groupId>
    <artifactId>baeldung</artifactId>
    <version>1.0-SNAPSHOT</version>
    <name>baeldung</name>
    <url>http://www.example.com</url>
    <dependencies>
        <dependency>
            <groupId>junit</groupId>
            <artifactId>junit</artifactId>
            <version>4.11</version>
            <scope>test</scope>
        </dependency>
    </dependencies>
</project>
As you can see, the JUnit dependency is provided by default.

## 5.2. Compiling and Packaging a Project

The next step is to compile the project:

mvn compile
Maven will run through all lifecycle phases needed by the compile phase to build the project's sources. If you want to run only the test phase, you can use:

mvn test
Now let's invoke the package phase, which will produce the compiled archive jar file:

mvn package

## 5.3. Executing an Application

Finally, we are going to execute our Java project with the exec-maven-plugin. Let's configure the necessary plugins in the pom.xml:

<build>
    <sourceDirectory>src</sourceDirectory>
    <plugins>
        <plugin>
            <artifactId>maven-compiler-plugin</artifactId>
            <version>3.6.1</version>
            <configuration>
                <source>1.8</source>
                <target>1.8</target>
            </configuration>
        </plugin>
        <plugin>
            <groupId>org.codehaus.mojo</groupId>
            <artifactId>exec-maven-plugin</artifactId>
            <version>3.0.0</version>
            <configuration>
                <mainClass>com.baeldung.java.App</mainClass>
            </configuration>
        </plugin>
    </plugins>
</build>

The first plugin, maven-compiler-plugin, is responsible for compiling the source code using Java version 1.8. The exec-maven-plugin searches for the mainClass in our project.

To execute the application, we run the following command:

mvn exec:java

# 6. Conclusion

In this article, we discussed some of the more popular features of the Apache Maven build tool.

All code examples on Baeldung are built using Maven, so you can easily check our GitHub project website to see various Maven configurations.


Apache Maven Guide - book cover
Apache Maven - icon
Get Started with Apache Maven
Download the E-book

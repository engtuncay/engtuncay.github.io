
**MAVEN**

Java Build Tool

- [What is Maven](#what-is-maven)
- [Maven Project Structure or Convention over Configuration ( Proje Dizin Yapısı)](#maven-project-structure-or-convention-over-configuration--proje-dizin-yapısı)
- [Maven Specify Source and Resource Folders and File Types](#maven-specify-source-and-resource-folders-and-file-types)

---

## What is Maven

- Build Tool : Aşağıdaki işlemleri maven ile yapabiliriz.
  - Compile
  - Run Tests
  - Package Jar
  - Package War
  - Deploy to Server
- Project Management Tool
- ​

POM : Project Object Model

ModelVersion : version of pom model.

groupId : grup ismi ( genellikle organizasyon ismi , ya da başına com getiriyorlar)
artifactId : project name  ( jar dosyasının ismi oluyor )










----

## Maven Project Structure or Convention over Configuration ( Proje Dizin Yapısı)

- myproject
  - src/main/java
  - src/main/resources
  - src/test/java
  - src/test/resources


  ## Maven Specify Source and Resource Folders and File Types

```XML
<build>
  <resources>
      <resource>
          <directory>src/main/resources</directory>
      </resource>
      <resource>
          <directory>src/main/java</directory>
          <includes>
              <include>**/*.xml</include>
              <include>**/*.fxml</include>
          </includes>
      </resource>
  </resources>
</build>
```



- ​
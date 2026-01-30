

## Maven Projesini Vscode'da Çalıştırma

Visual Studio Code'da Maven tabanlı bir projeyi çalıştırmak için aşağıdaki adımları izleyebilirsiniz:

### 1. **Gerekli Uzantıları Yükleyin**
- Visual Studio Code'da Maven projeleri için aşağıdaki uzantıları yükleyin:
  - **Java Extension Pack** (Java desteği için)
  - **Maven for Java** (Maven desteği için)

### 2. **Proje Yapılandırmasını Kontrol Edin**
- Maven projesinin kök dizininde pom.xml dosyasının bulunduğundan emin olun.
- pom.xml dosyasını açarak bağımlılıkların doğru şekilde tanımlandığını kontrol edin.

### 3. **Maven Bağımlılıklarını İndirin**
- Terminali açın (`Ctrl + `) ve aşağıdaki komutu çalıştırarak bağımlılıkları indirin:
  ```sh
  mvn clean install
  ```

### 4. **Proje Yapılandırmasını Yapın**
- Visual Studio Code'da sol taraftaki **Explorer** bölümünde projenizi açın.
- Eğer Maven uzantısı yüklüyse, sol tarafta Maven sekmesi görünecektir. Buradan Maven hedeflerini çalıştırabilirsiniz.

### 5. **Proje Çalıştırma**
- Terminalde aşağıdaki komutu çalıştırarak projeyi başlatabilirsiniz:
  ```sh
  mvn spring-boot:run
  ```
  Eğer proje Spring Boot kullanmıyorsa, `mvn exec:java` komutunu kullanabilirsiniz:
  ```sh
  mvn exec:java -Dexec.mainClass="ozpasyazilim.entegrefx.gui.ModPanoIskProYukleme"
  ```
  (Ana sınıfı pom.xml veya projenizin yapısına göre değiştirin.)

### 6. **Debug Modunda Çalıştırma**
- Visual Studio Code'da **Run and Debug** sekmesine gidin.
- `launch.json` dosyasını oluşturun ve aşağıdaki gibi yapılandırın:
  ```json
  {
    "version": "0.2.0",
    "configurations": [
      {
        "type": "java",
        "request": "launch",
        "mainClass": "ozpasyazilim.entegrefx.gui.ModPanoIskProYukleme",
        "projectName": "ozpasentegrefx"
      }
    ]
  }
  ```
  Ardından **Start Debugging** düğmesine basarak projeyi çalıştırabilirsiniz.

### 7. **Sorun Giderme**
- Eğer bağımlılıklarla ilgili bir sorun yaşarsanız, `mvn dependency:tree` komutunu çalıştırarak bağımlılıkları kontrol edin.
- Hata mesajlarını terminalde kontrol edin ve gerekirse pom.xml dosyasını düzenleyin.

Projeniz artık çalışmaya hazır!

### 8. **Java Console Application Örneği**

Basit bir Java konsol uygulaması oluşturmak için aşağıdaki adımları izleyin:

#### a. **Maven ile Proje Oluşturun**
- Terminalde aşağıdaki komutu çalıştırarak basit bir Java konsol projesi oluşturun:
  
```sh
mvn archetype:generate -DgroupId=com.example -DartifactId=console-app -DarchetypeArtifactId=maven-archetype-quickstart -DinteractiveMode=false
```

Bu komut, temel bir Maven projesi yapısı oluşturur ve `App.java` sınıfını otomatik olarak ekler.

#### b. **pom.xml Dosyası**
Oluşturulan pom.xml dosyasını aşağıdaki gibi düzenleyin (veya benzer şekilde bırakın):
```xml
<?xml version="1.0" encoding="UTF-8"?>
<project xmlns="http://maven.apache.org/POM/4.0.0"
         xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:schemaLocation="http://maven.apache.org/POM/4.0.0 http://maven.apache.org/xsd/maven-4.0.0.xsd">
    <modelVersion>4.0.0</modelVersion>

    <groupId>com.example</groupId>
    <artifactId>console-app</artifactId>
    <version>1.0-SNAPSHOT</version>

    <properties>
        <maven.compiler.source>11</maven.compiler.source>
        <maven.compiler.target>11</maven.compiler.target>
    </properties>

    <build>
        <plugins>
            <plugin>
                <groupId>org.codehaus.mojo</groupId>
                <artifactId>exec-maven-plugin</artifactId>
                <version>3.0.0</version>
                <configuration>
                    <mainClass>com.example.App</mainClass>
                </configuration>
            </plugin>
        </plugins>
    </build>
</project>
```

#### c. **App.java Dosyası**
Oluşturulan `src/main/java/com/example/App.java` dosyasını aşağıdaki gibi düzenleyin:
```java
package com.example;

public class App {
    public static void main(String[] args) {
        System.out.println("Merhaba, Dünya!");
    }
}
```

#### d. **Uygulamayı Çalıştırın**
- Terminalde `mvn clean compile exec:java` komutunu çalıştırarak uygulamayı başlatın.

#### e. **Uygulamayı Paketleyin ve Kurun**
- Uygulamayı JAR dosyası olarak paketlemek için terminalde `mvn clean package` komutunu çalıştırın.
- Oluşturulan JAR dosyasını `java -jar target/console-app-1.0-SNAPSHOT.jar` komutu ile çalıştırabilirsiniz.

Bu örnek, basit bir konsol uygulamasıdır. Daha karmaşık uygulamalar için bağımlılıkları pom.xml'e ekleyebilirsiniz.
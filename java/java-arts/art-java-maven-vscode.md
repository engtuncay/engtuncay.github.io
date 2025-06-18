


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
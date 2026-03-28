
- [`pom.xml` Açıklaması ve Maven Komutları](#pomxml-açıklaması-ve-maven-komutları)
  - [Yapılacaklar (Kontrol Listesi)](#yapılacaklar-kontrol-listesi)
  - [Kısa Özet](#kısa-özet)
  - [`pom.xml` Üst Düzey Alanlar](#pomxml-üst-düzey-alanlar)
  - [Dependencies (Bağımlılıklar) — Ne işe yarar ve notlar](#dependencies-bağımlılıklar--ne-işe-yarar-ve-notlar)
  - [`build` Bölümü](#build-bölümü)
  - [Plugin'ler ve Ne Yaptıkları](#pluginler-ve-ne-yaptıkları)
  - [Lifecycle ve Plugin İlişkisi (Kısa)](#lifecycle-ve-plugin-i̇lişkisi-kısa)
  - [Potansiyel Sorunlar \& Öneriler](#potansiyel-sorunlar--öneriler)
  - [Sık Kullanılan Maven Komutları (PowerShell örnekleri)](#sık-kullanılan-maven-komutları-powershell-örnekleri)
  - [Örnek Güvenli Build Akışı](#örnek-güvenli-build-akışı)
  - [Önerilen Değişiklikler (Kısa)](#önerilen-değişiklikler-kısa)
  - [Nerelere Bakmalısınız (Build çıktısı)](#nerelere-bakmalısınız-build-çıktısı)
  - [Sonuç](#sonuç)


# `pom.xml` Açıklaması ve Maven Komutları

## Yapılacaklar (Kontrol Listesi)
- [x] `pom.xml` üst (parent), koordinatlar ve `properties` açıklanacak
- [x] `dependencies` tek tek açıklanacak (ne işe yarar, notlar)
- [x] `build` alanları (`finalName`, `resources`) açıklanacak
- [x] Kullanılan plugin'ler (maven-resources-plugin, maven-compiler-plugin, maven-assembly-plugin, maven-antrun-plugin, exec-maven-plugin) detaylı açıklanacak
- [x] Lifecycle ile plugin ilişkilendirilecek (hangi komut ne tetikler)
- [x] Sık kullanılan `mvn` komutları ve PowerShell örnekleri verilecek
- [x] Potansiyel sorunlar, öneriler ve kısa çözüm yolları belirtilecek

---

## Kısa Özet
- Proje `Spring Boot` parent POM (`org.springframework.boot:spring-boot-starter-parent:2.7.18`) kullanıyor.
- Java 1.8 hedeflenmiş (`<java.version>1.8</java.version>`).
- Amaç: hem `jar-with-dependencies` (fat jar) üretimi hem de Windows EXE üretmek için Launch4j çağrısı.

---

## `pom.xml` Üst Düzey Alanlar
- `parent`:
  - `org.springframework.boot:spring-boot-starter-parent:2.7.18` — Spring Boot parent; bağımlılık ve plugin versiyon yönetimi sağlar.
- `groupId`, `artifactId`, `version`, `name`, `description`: Maven koordinatları.
- `properties`: `<java.version>` ve `<spring-boot.version>` gibi konfigürasyon property'leri tanımlanmış.

---

## Dependencies (Bağımlılıklar) — Ne işe yarar ve notlar
- `org.springframework.boot:spring-boot-starter-web:${spring-boot.version}`
  - Spring MVC, gömülü Tomcat ve web için gerekli altyapı.
- `org.springframework.boot:spring-boot-starter-logging:${spring-boot.version}`
  - Spring Boot'un logging starter'ı (Logback + SLF4J). `spring-boot-starter-web` zaten bunu transitif getirir; explicit eklemeye genelde gerek yok.
- `io.jsonwebtoken:jjwt:0.9.1`
  - JWT işleme kütüphanesi. 0.9.1 eski bir sürümdür; 0.11.x (jjwt-api/jjwt-impl/jjwt-jackson) daha güncel ve güvenli.
- `org.springframework.boot:spring-boot-starter-security:${spring-boot.version}`
  - Spring Security starter.
- `ch.qos.logback:logback-classic:1.2.11`
  - Logback implementasyonu. Dikkat: parent zaten uygun logback versiyonunu sağlar; tekrar eklemek çakışma yaratabilir.
- `org.slf4j:slf4j-api:1.7.36`
  - SLF4J API. Yine starter transitif getirir; explicit eklemek çakışmaya neden olabilir.
- `ozpasyazilim:tunc-utils-java:0.1` ve `ozpasyazilim:ozpasmikro:0.1`
  - Organizasyonunuza ait iç artefaktlar. Bu artefaktlar kendi bağımlılıklarını getirebilir — çakışma kontrolü için `mvn dependency:tree` çalıştırın.

Öneri: Logback/SLF4J ile ilgili explicit bağımlılıkları kaldırıp Spring Boot parent versiyon yönetimine bırakın veya gerektiğinde `<exclusions>` kullanın.

---

## `build` Bölümü
- `<finalName>entegre-rest-api</finalName>`
  - `target/` içindeki üretilen artifactin temel adı.
- `<resources>`
  - `src/main/resources` içeriği derleme çıktısına kopyalanır. Ayrıca `maven-resources-plugin` ile bu dosyalar `target/` köküne de kopyalanır (pom'da konfigüre edilmiş).

---

## Plugin'ler ve Ne Yaptıkları
Aşağıda pom'daki plugin'lerin açıklamaları ve hangi fazda çalıştıkları var.

1) `maven-resources-plugin` (3.3.1)
- Amaç: kaynak dosyalarını `target/` içine kopyalamak.
- Konfigürasyon: `id=copy-resources-to-target-root`, `phase=process-resources`, `goal=copy-resources`. `outputDirectory` `${project.build.directory}`.
- Lifecycle: `process-resources` fazında çalışır — build sırasında kaynakların kopyalanmasını sağlar.

2) `maven-compiler-plugin` (3.13.0)
- Amaç: Java kaynaklarını derlemek.
- Konfigürasyon: `<source>${java.version}</source>` ve `<target>${java.version}</target>` (1.8).
- Lifecycle: `compile` fazında çalışır.

3) `maven-assembly-plugin`
- Amaç: "jar-with-dependencies" (fat jar) oluşturmak.
- Konfigürasyon: `phase=package`, `goal=single`, `descriptorRef=jar-with-dependencies`; manifest içine `mainClass` eklenmiş.
- Not: Spring Boot projelerinde tipik tercih `spring-boot-maven-plugin` ile repackage etmektir; `assembly` farklı bir jar yapısı üretebilir.

4) `maven-antrun-plugin` (3.1.0)
- Amaç: Ant task'ları çalıştırmak.
- Burada `create-launch4j-config` execution'ı `package` fazında çalışır ve `target/launch4j-config.xml` dosyasını oluşturur. Dosya içinde Launch4j konfigürasyonu (jar yolu, outfile vb.) yer alır.

5) `exec-maven-plugin` (3.1.0)
- Amaç: Harici executable çalıştırmak (Launch4j `launch4jc.exe`).
- Konfigürasyon: `executable` olarak sabit Windows yolu (`Y:\ozpasjavaexe\launch4j-3.8-win32\launch4j\launch4jc.exe`) verilmiş; argüman olarak `target/launch4j-config.xml` aktarılıyor.
- Lifecycle: `package` fazında çalışır — exe üretimi bu aşamada tetiklenir.

6) (Yorumda) `spring-boot-maven-plugin`
- Eğer etkinleştirilirse `repackage` goal'ı ile Spring Boot uyumlu çalıştırılabilir jar üretir. Genelde Spring Boot uygulamaları için daha uygun ve önerilen yaklaşımdır.

---

## Lifecycle ve Plugin İlişkisi (Kısa)
- `process-resources`: `maven-resources-plugin` (kopyalama)
- `compile`: `maven-compiler-plugin`
- `package`: `maven-assembly-plugin` (jar-with-dependencies), `maven-antrun-plugin` (launch4j config oluşturma), `exec-maven-plugin` (launch4j çalıştırma -> exe)

Sonuç: `mvn clean package` ile hem fat-jar hem de (eğer Launch4j bulunduysa) exe oluşturulmaya çalışılır.

---

## Potansiyel Sorunlar & Öneriler
1. Logging çakışmaları
- `spring-boot-starter-logging` zaten Logback ve SLF4J getirir; `logback-classic` ve `slf4j-api`'ı ayrı eklemek çoğu zaman gereksiz ve çakışma yaratabilir. "Multiple SLF4J bindings" gibi uyarılar alabilirsiniz.
- Çözüm: explicit `logback-classic` ve `slf4j-api` bağımlılıklarını kaldırın veya organizasyon içi paketlerden (`ozpasmikro`, `tunc-utils-java`) gelen kütüphaneler için `<exclusions>` kullanın.

2. `jjwt:0.9.1` eski sürüm
- Güvenlik/yapısal nedenlerle 0.11.x sürümüne geçiş düşünülmeli (jjwt-api, jjwt-impl, jjwt-jackson).

3. Assembly vs Spring Boot repackage
- `maven-assembly-plugin` ile oluşturulan jar, Spring Boot'un `repackage` ettiği jar'dan farklı olabilir. Eğer uygulamayı `java -jar` ile çalıştırıyorsanız `spring-boot-maven-plugin` genelde daha uyumludur.

4. Launch4j yolu sabit
- `exec-maven-plugin` içinde `executable` sabit bir yerel yol gösteriyor. Bu yol başka makinelerde/CI'de olmayabilir. Daha taşınabilir yapı için:
  - Launch4j Maven plugin (`net.sf.launch4j:launch4j-maven-plugin`) kullanın veya
  - bir Maven property (`<launch4j.home>`) tanımlayıp bu property'i kullanın.

5. CI ortamı
- Eğer CI üzerinde `mvn clean package` çalıştıracaksanız ve Launch4j yoksa package fazında hata alabilirsiniz. Bu durumda `assembly:single` veya `-DskipExe=true` gibi profile tabanlı çözümler oluşturun.

---

## Sık Kullanılan Maven Komutları (PowerShell örnekleri)
Aşağıda projeniz için en sık kullanacağınız `mvn` komutları ve açıklamaları var.

1) Full build (exe de üretmeye çalışır)
```powershell
mvn -DskipTests clean package
```
- `clean` önce `target/` klasörünü temizler.
- `package` lifecycle'ı tetikler; pom'daki package bağlı executions (assembly, antrun, exec) çalışır.

2) Sadece fat-jar (exe atlanır)
```powershell
mvn -DskipTests assembly:single -DdescriptorId=jar-with-dependencies
```
- Sadece assembly goal'ını direkt çalıştırır; package fazına bağlı diğer plugin'leri tetiklemez.

3) Sadece kaynak kopyalama (process-resources)
```powershell
mvn process-resources
```

4) Sadece derleme
```powershell
mvn compile
```

5) Lokal repository'ye yükleme
```powershell
mvn clean install
```
- Üretilen artifact yerel Maven deposuna (`%USERPROFILE%\.m2\repository`) yüklenir.

6) Debug / detaylı çıktı
```powershell
mvn -X clean package
```

7) Etkin POM'u görmek
```powershell
mvn help:effective-pom
```

8) Spring Boot uygulamasını doğrudan çalıştırmak
- Eğer `spring-boot-maven-plugin` etkinse:
```powershell
mvn org.springframework.boot:spring-boot-maven-plugin:2.7.18:run
```
- Veya build edilmiş jar'ı çalıştırmak için:
```powershell
java -jar target\entegre-rest-api-jar-with-dependencies.jar
```

9) Bağımlılık ağacını incelemek
```powershell
mvn dependency:tree
```
- SLF4J veya logback ile ilgili çakışmaları aramak için kullanın.

10) Testleri atlamak için
```powershell
mvn -DskipTests clean package
```
- Ya da test derlemelerini de atmak isterseniz:
```powershell
mvn -Dmaven.test.skip=true clean package
```

---

## Örnek Güvenli Build Akışı
1. Bağımlılık ağacını kontrol et:
```powershell
mvn dependency:tree > deps.txt; code deps.txt
```
2. Sadece assembly ile jar üret (exe atlanır):
```powershell
mvn -DskipTests assembly:single -DdescriptorId=jar-with-dependencies
```
3. Üretilen jar'ı çalıştır:
```powershell
java -jar target\entegre-rest-api-jar-with-dependencies.jar
```

---

## Önerilen Değişiklikler (Kısa)
- `logback-classic` ve `slf4j-api` explicit bağımlılıklarını kaldırın veya transitifleri yönetin.
- `jjwt`'yi modern 0.11.x yapılarına güncelleyin.
- Launch4j çalıştırmasını `profile` içine alın veya `launch4j-maven-plugin` kullanın; sabit yolları kaldırın.
- Eğer Spring Boot jar'ı tercih ediyorsanız `spring-boot-maven-plugin`'i etkinleştirip `assembly`'yi kaldırmayı düşünün.

---

## Nerelere Bakmalısınız (Build çıktısı)
- `target/` içinde beklenenler:
  - `entegre-rest-api-jar-with-dependencies.jar` (assembly ile üretildiyse)
  - `launch4j-config.xml` (antrun ile oluşturulduysa)
  - `entegre-rest-api.exe` (Launch4j çalıştıysa)

Hata durumunda:
- `mvn -X clean package` ile detaylı log alın.
- "multiple SLF4J bindings" benzeri uyarılara dikkat edin.
- Launch4j hatalarında `target/launch4j-config.xml` dosyasını kontrol edin.

---

## Sonuç

Bu dosya `pom.xml`'inizin davranışını, kullanılan plugin'leri ve sık kullanılan Maven komutlarını (PowerShell örnekleriyle) özetlemektedir. Dosyayı workspace'e ekledim: `Y:\devrepo-ozpas\entegre-rest-api\POM-explanation.md`.

İsterseniz şimdi:
- Bu dosyada değişiklik yapayım (kısalaştırma, Türkçe/İngilizce çeviri vb.), veya
- `pom.xml` üzerinde önerdiğim değişiklikleri uygulayıp `mvn -DskipTests clean package` komutunu çalıştırıp build çıktısını kontrol edeyim.

Hangi adımı istersiniz?


- [`pom.xml` Açıklaması ve Maven Komutları](#pomxml-açıklaması-ve-maven-komutları)
  - [Yapılacaklar (Kontrol Listesi)](#yapılacaklar-kontrol-listesi)
  - [Kısa Özet](#kısa-özet)
  - [`pom.xml` Üst Düzey Alanlar](#pomxml-üst-düzey-alanlar)
  - [Dependencies (Bağımlılıklar) — Ne işe yarar ve notlar](#dependencies-bağımlılıklar--ne-işe-yarar-ve-notlar)
  - [`build` Bölümü](#build-bölümü)
  - [Plugin'ler ve Ne Yaptıkları](#pluginler-ve-ne-yaptıkları)
  - [Lifecycle ve Plugin İlişkisi (Kısa)](#lifecycle-ve-plugin-i̇lişkisi-kısa)
  - [Maven Lifecycle, Phase ve Goal Kavramları — Detaylı Açıklama](#maven-lifecycle-phase-ve-goal-kavramları--detaylı-açıklama)
    - [Lifecycle (Yaşam Döngüsü) Nedir?](#lifecycle-yaşam-döngüsü-nedir)
      - [Default Lifecycle'daki Fazlar (Sıra Önemli!)](#default-lifecycledaki-fazlar-sıra-önemli)
    - [Phase (Faz) Nedir?](#phase-faz-nedir)
      - [Pom'da Phase ve Goal Bağlaması Örneği:](#pomda-phase-ve-goal-bağlaması-örneği)
    - [Goal (Hedef) Nedir?](#goal-hedef-nedir)
      - [Goal'ların Kullanım Yolları:](#goalların-kullanım-yolları)
    - [Lifecycle, Phase, Goal Arasındaki İlişki (Hiyerarşi)](#lifecycle-phase-goal-arasındaki-i̇lişki-hiyerarşi)
    - [Pratik Örnekler](#pratik-örnekler)
      - [Örnek 1: `mvn compile` Komutunu Çalıştırdığınızda](#örnek-1-mvn-compile-komutunu-çalıştırdığınızda)
      - [Örnek 2: `mvn clean package` Komutunu Çalıştırdığınızda](#örnek-2-mvn-clean-package-komutunu-çalıştırdığınızda)
      - [Örnek 3: Doğrudan Goal Çalıştırmak](#örnek-3-doğrudan-goal-çalıştırmak)
    - [Hangi Goal'lar Hangi Plugin'e Ait?](#hangi-goallar-hangi-plugine-ait)
    - [Özet Tablo](#özet-tablo)
  - [Potansiyel Sorunlar \& Öneriler](#potansiyel-sorunlar--öneriler)
  - [Sık Kullanılan Maven Komutları (PowerShell örnekleri)](#sık-kullanılan-maven-komutları-powershell-örnekleri)
  - [Örnek Güvenli Build Akışı](#örnek-güvenli-build-akışı)
  - [Önerilen Değişiklikler (Kısa)](#önerilen-değişiklikler-kısa)
  - [Nerelere Bakmalısınız (Build çıktısı)](#nerelere-bakmalısınız-build-çıktısı)
  - [Maven Antrun Plugin ve Ant Task Nedir? — Detaylı Açıklama](#maven-antrun-plugin-ve-ant-task-nedir--detaylı-açıklama)
    - [Ant Nedir?](#ant-nedir)
      - [Ant'ın Temel Özellikleri:](#antın-temel-özellikleri)
    - [Maven Antrun Plugin Nedir?](#maven-antrun-plugin-nedir)
      - [Çalışma Prensibi:](#çalışma-prensibi)
    - [Ant Task Nedir?](#ant-task-nedir)
      - [Sık Kullanılan Ant Task'ları:](#sık-kullanılan-ant-taskları)
    - [Pom.xml'deki Antrun Kullanımı (Launch4j Örneği)](#pomxmldeki-antrun-kullanımı-launch4j-örneği)
      - [Bu Kod Ne Yapar?](#bu-kod-ne-yapar)
      - [Sonuç:](#sonuç)
    - [Pratik Antrun Örnekleri](#pratik-antrun-örnekleri)
      - [Örnek 1: Dosya Kopyalama](#örnek-1-dosya-kopyalama)
      - [Örnek 2: Shell Komutunu Çalıştırma (Windows)](#örnek-2-shell-komutunu-çalıştırma-windows)
      - [Örnek 3: Dosya Silme (Temizlik)](#örnek-3-dosya-silme-temizlik)
      - [Örnek 4: Koşullu İşlem](#örnek-4-koşullu-i̇şlem)
      - [Örnek 5: Maven Property'lerini Kullanma](#örnek-5-maven-propertylerini-kullanma)
    - [Antrun Ne Zaman Kullanılır?](#antrun-ne-zaman-kullanılır)
    - [Antrun vs Diğer Plugin'ler](#antrun-vs-diğer-pluginler)
    - [Antrun Debugging](#antrun-debugging)
    - [Özet](#özet)
  - [Maven Exec Plugin Nedir? — Detaylı Açıklama](#maven-exec-plugin-nedir--detaylı-açıklama)
    - [Exec Plugin Nedir?](#exec-plugin-nedir)
      - [Temel Özellikleri:](#temel-özellikleri)
    - [Exec Plugin'in iki temel goal'u vardır:](#exec-pluginin-iki-temel-goalu-vardır)
    - [Pom.xml'deki Exec Kullanımı (Launch4j Örneği)](#pomxmldeki-exec-kullanımı-launch4j-örneği)
      - [Bu Kod Ne Yapar?](#bu-kod-ne-yapar-1)
      - [İş Akışı:](#i̇ş-akışı)
    - [Exec Plugin'in Pratik Kullanım Örnekleri](#exec-pluginin-pratik-kullanım-örnekleri)
      - [Örnek 1: Harici Programı Çalıştırma (Windows batch dosyası)](#örnek-1-harici-programı-çalıştırma-windows-batch-dosyası)
      - [Örnek 2: Python Script'ini Çalıştırma](#örnek-2-python-scriptini-çalıştırma)
      - [Örnek 3: Java Programını Doğrudan Çalıştırma](#örnek-3-java-programını-doğrudan-çalıştırma)
      - [Örnek 4: Çalışma Dizinini Değiştirerek Komut Çalıştırma](#örnek-4-çalışma-dizinini-değiştirerek-komut-çalıştırma)
      - [Örnek 5: Environment Variable'ları Ayarlayarak Çalıştırma](#örnek-5-environment-variableları-ayarlayarak-çalıştırma)
      - [Örnek 6: Komut Satırı Parametresiyle Çalıştırma](#örnek-6-komut-satırı-parametresiyle-çalıştırma)
    - [Antrun vs Exec Plugin Karşılaştırması](#antrun-vs-exec-plugin-karşılaştırması)
    - [Exec Plugin'de Hata Yönetimi](#exec-pluginde-hata-yönetimi)
    - [Exec Plugin'le İlişkili Sorunlar ve Çözümler](#exec-pluginle-i̇lişkili-sorunlar-ve-çözümler)
    - [Özet Tablo](#özet-tablo-1)
    - [Pratik Kullanım Örneği: Projenizde Launch4j](#pratik-kullanım-örneği-projenizde-launch4j)
  - [Sonuç](#sonuç-1)


# `pom.xml` Açıklaması ve Maven Komutları

- Örnek maven xml

```xml

<project xmlns="http://maven.apache.org/POM/4.0.0"
         xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:schemaLocation="http://maven.apache.org/POM/4.0.0 http://maven.apache.org/xsd/maven-4.0.0.xsd">
  <modelVersion>4.0.0</modelVersion>

  <!-- Spring Boot parent POM eklenmeli -->
  <parent>
    <groupId>org.springframework.boot</groupId>
    <artifactId>spring-boot-starter-parent</artifactId>
    <version>2.7.18</version>
  </parent>

  <groupId>oraksoft</groupId>
  <artifactId>entegre-rest-api</artifactId>
  <version>0.0.2</version>
  <name>entegre-rest-api</name>
  <description>Spring Boot (Java 8 console REST API)</description>

  <properties>
    <java.version>1.8</java.version>
    <spring-boot.version>2.7.18</spring-boot.version>
  </properties>

  <dependencies>

    <dependency>
      <groupId>org.springframework.boot</groupId>
      <artifactId>spring-boot-starter-web</artifactId>
      <version>${spring-boot.version}</version>
    </dependency>

    <dependency>
      <groupId>org.springframework.boot</groupId>
      <artifactId>spring-boot-starter-logging</artifactId>
      <version>${spring-boot.version}</version>
    </dependency>

    <dependency>
      <groupId>io.jsonwebtoken</groupId>
      <artifactId>jjwt</artifactId>
      <version>0.9.1</version>
    </dependency>

    <dependency>
      <groupId>org.springframework.boot</groupId>
      <artifactId>spring-boot-starter-security</artifactId>
      <version>${spring-boot.version}</version>
    </dependency>
    <!-- Diğer bağımlılıklar -->

    <!-- Logback için açık bağımlılık ekleyin -->
    <dependency>
      <groupId>ch.qos.logback</groupId>
      <artifactId>logback-classic</artifactId>
      <version>1.2.11</version>
    </dependency>

    <!-- SLF4J API -->
    <dependency>
      <groupId>org.slf4j</groupId>
      <artifactId>slf4j-api</artifactId>
      <version>1.7.36</version>
    </dependency>

    <!-- custom libs (3) -->

    <dependency>
      <groupId>ozpasyazilim</groupId>
      <artifactId>tunc-utils-java</artifactId>
      <version>0.1</version>
      <!--<exclusions>
          <exclusion>
              <groupId>org.slf4j</groupId>
              <artifactId>slf4j-api</artifactId>
          </exclusion>
      </exclusions>-->
    </dependency>

    <dependency>
      <groupId>ozpasyazilim</groupId>
      <artifactId>ozpasmikro</artifactId>
      <version>0.1</version>
      <!--<exclusions>
          <exclusion>
              <groupId>org.slf4j</groupId>
              <artifactId>slf4j-api</artifactId>
          </exclusion>
      </exclusions>-->
    </dependency>
  </dependencies>

  <!-- ***BUILD***  -->

  <build>
    <finalName>entegre-rest-api</finalName>

    <resources>
      <resource>
        <directory>src/main/resources</directory>
      </resource>
    </resources>

    <plugins>

      <plugin>
        <artifactId>maven-resources-plugin</artifactId>
        <version>3.3.1</version>
        <executions>
<!--          <execution>-->
<!--            <id>copy-bat-to-target</id>-->
<!--            <phase>package</phase>-->
<!--            <goals>-->
<!--              <goal>copy-resources</goal>-->
<!--            </goals>-->
<!--            <configuration>-->
<!--              <outputDirectory>${project.build.directory}</outputDirectory>-->
<!--              <resources>-->
<!--                <resource>-->
<!--                  <directory>${project.basedir}</directory>-->
<!--                  <includes>-->
<!--                    <include>entegre-rest-api-service-install.bat</include>-->
<!--                    <include>entegre-rest-api-service-start.bat</include>-->
<!--                    <include>entegre-rest-api-service-stop.bat</include>-->
<!--                    <include>entegre-rest-api-service-uninstall.bat</include>-->
<!--                  </includes>-->
<!--                </resource>-->
<!--              </resources>-->
<!--            </configuration>-->
<!--          </execution>-->
          <execution>
            <id>copy-resources-to-target-root</id>
            <phase>process-resources</phase>
            <goals>
              <goal>copy-resources</goal>
            </goals>
            <configuration>
              <outputDirectory>${project.build.directory}</outputDirectory>
              <resources>
                <resource>
                  <directory>src/main/resources</directory>
                  <filtering>false</filtering>
                </resource>
              </resources>
            </configuration>
          </execution>
        </executions>
      </plugin>

      <!--            <plugin>-->
      <!--                <groupId>org.springframework.boot</groupId>-->
      <!--                <artifactId>spring-boot-maven-plugin</artifactId>-->
      <!--                <version>${spring-boot.version}</version>-->
      <!--                <executions>-->
      <!--                    <execution>-->
      <!--                        <goals>-->
      <!--                            <goal>repackage</goal>-->
      <!--                        </goals>-->
      <!--                    </execution>-->
      <!--                </executions>-->
      <!--                <configuration>-->
      <!--                    <mainClass>ozpasyazilim.entegrerestapi.EntegreRestApplication</mainClass>-->
      <!--                </configuration>-->
      <!--            </plugin>-->

      <plugin>
        <groupId>org.apache.maven.plugins</groupId>
        <artifactId>maven-compiler-plugin</artifactId>
        <version>3.13.0</version> <!--3.7.0-->
        <configuration>
          <source>${java.version}</source>
          <target>${java.version}</target>
        </configuration>
      </plugin>

      <plugin>
        <artifactId>maven-assembly-plugin</artifactId>
        <executions>
          <execution>
            <phase>package</phase>
            <goals>
              <goal>single</goal>
            </goals>
          </execution>
        </executions>
        <configuration>
          <descriptorRefs>
            <descriptorRef>jar-with-dependencies</descriptorRef>
          </descriptorRefs>
          <archive>
            <manifest>
              <mainClass>ozpasyazilim.entegrerestapi.EntegreRestApplication</mainClass>
            </manifest>
          </archive>
        </configuration>
      </plugin>

      <plugin>
        <groupId>org.apache.maven.plugins</groupId>
        <artifactId>maven-antrun-plugin</artifactId>
        <version>3.1.0</version>
        <executions>
          <execution>
            <id>create-launch4j-config</id>
            <phase>package</phase>
            <goals>
              <goal>run</goal>
            </goals>
            <configuration>
              <target>
                <echo>Creating Launch4j configuration file...</echo>
                <echo file="${project.build.directory}/launch4j-config.xml"><![CDATA[<?xml version="1.0" encoding="UTF-8"?>
<launch4jConfig>
  <dontWrapJar>false</dontWrapJar>
  <headerType>console</headerType>
  <jar>Y:\devrepo-ozpas\entegre-rest-api\target\entegre-rest-api-jar-with-dependencies.jar</jar>
  <outfile>Y:\devrepo-ozpas\entegre-rest-api\target\entegre-rest-api.exe</outfile>
  <errTitle>Error</errTitle>
  <cmdLine></cmdLine>
  <chdir>.</chdir>
  <priority>normal</priority>
  <downloadUrl>http://java.com/download</downloadUrl>
  <supportUrl></supportUrl>
  <stayAlive>false</stayAlive>
  <restartOnCrash>false</restartOnCrash>
  <jre>
    <path></path>
    <bundledJre64Bit>false</bundledJre64Bit>
    <bundledJreAsFallback>false</bundledJreAsFallback>
    <minVersion>1.8.0</minVersion>
    <maxVersion></maxVersion>
    <jdkPreference>preferJre</jdkPreference>
    <runtimeBits>64/32</runtimeBits>
  </jre>
</launch4jConfig>]]></echo>
                <echo>Launch4j configuration created at ${project.build.directory}/launch4j-config.xml</echo>
              </target>
            </configuration>
          </execution>
        </executions>
      </plugin>

      <plugin>
        <groupId>org.codehaus.mojo</groupId>
        <artifactId>exec-maven-plugin</artifactId>
        <version>3.1.0</version>
        <executions>
          <execution>
            <id>launch4j-build-exe</id>
            <phase>package</phase>
            <goals>
              <goal>exec</goal>
            </goals>
            <configuration>
              <executable>Y:\ozpasjavaexe\launch4j-3.8-win32\launch4j\launch4jc.exe</executable>
              <arguments>
                <argument>${project.build.directory}/launch4j-config.xml</argument>
              </arguments>
            </configuration>
          </execution>
        </executions>
      </plugin>

    </plugins>


  </build>
</project>

```

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
  - Organizasyonunuza ait iç artifekler. Bu artifekler kendi bağımlılıklarını getirebilir — çakışma kontrolü için `mvn dependency:tree` çalıştırın.

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

## Maven Lifecycle, Phase ve Goal Kavramları — Detaylı Açıklama

Maven'in build sistemi üç temel kavram üzerine kuruludur: **Lifecycle**, **Phase** (Faz) ve **Goal**. Bu bölüm bu kavramlar arasındaki ilişkiyi detaylı açıklamaktadır.

### Lifecycle (Yaşam Döngüsü) Nedir?

Lifecycle, Maven'in build sürecinin önceden tanımlanmış, sıralı aşamalarının grubudur. Maven'de üç temel lifecycle vardır:

1. **default (veya build)**: Projede `derleme, test, paketleme ve deployment` yapılır.
2. **clean**: Önceki build çıktılarını (`target/` klasörü vb.) temizler.
3. **site**: Proje için documentation sitesi oluşturur.

Bir lifecycle, ardışık olarak çalışacak faz (phase) içerir ve bu fazlar sırayla yürütülür.

#### Default Lifecycle'daki Fazlar (Sıra Önemli!)

En sık kullanılan default lifecycle'da, fazlar (phases) şu sırada çalışır:

```
1. validate          — pom.xml ve kaynak kodun geçerliliğini kontrol et
2. initialize        — build state'i başlat, property'leri tanımla
3. generate-sources  — derleme öncesi kaynak kodu üret
4. process-sources   — kaynak kodları işle (filtreleme vb.)
5. generate-resources— derleme öncesi resource'ları üret
6. process-resources — resource'ları işle, hedef klasöre kopyala
--maven-resources-plugin--
7. compile           — Java kaynaklarını derle
--maven-compiler-plugin--
8. process-classes   — derlenmiş class'ları işle
9. generate-test-sources — test kaynaklarını üret
10. process-test-sources  — test kaynaklarını işle
11. generate-test-resources — test resource'larını üret
12. process-test-resources  — test resource'larını işle
13. test-compile     — test class'larını derle
14. process-test-classes — test class'larını işle
15. test             — unit test'leri çalıştır (JUnit, TestNG vb.)
16. prepare-package  — paketleme öncesi hazırlık yap
17. package          — derlenmiş kodu jar, war, zip vb. formata paketle
--maven-assembly-plugin--
18. pre-integration-test  — integration test öncesi hazırlık
19. integration-test — integration test'leri çalıştır
20. post-integration-test — integration test sonrası temizlik
21. verify           — package'in kalitesini kontrol et
22. install          — artifact'ı lokal repository'ye kopyala
23. deploy           — artifact'ı remote repository'ye yükle
```

**Önemli**: Bir faz çalıştırırsanız, o fazdan önceki tüm fazlar da sırayla çalışır. Örneğin `mvn package` komutunu çalıştırsanız, phase 1'den 17'ye kadar tüm fazlar yürütülür.

### Phase (Faz) Nedir?

Phase, bir lifecycle içindeki bir adım ile ilgili bir amacı temsil eder. Örneğin:

- `compile`: Java kodunu derle
- `test`: Testleri çalıştır
- `package`: Artifact'ı paketle (jar, war vb.)
- `process-resources`: Resource dosyalarını işle ve hedef klasöre kopyala

**Bir faz kendi başına hiçbir şey yapmaz!** Bir faz, o faza bağlı bir veya birden fazla goal'ı tetikleyerek işini gerçekleştirir.

#### Pom'da Phase ve Goal Bağlaması Örneği:

```xml
<plugin>
  <groupId>org.apache.maven.plugins</groupId>
  <artifactId>maven-resources-plugin</artifactId>
  <version>3.3.1</version>
  <executions>
    <execution>
      <id>copy-resources-to-target-root</id>
      <phase>process-resources</phase>        <!-- Bu faz tetiklenince -->
      <goals>
        <goal>copy-resources</goal>           <!-- Bu goal çalışsın -->
      </goals>
      <!-- ... konfigürasyon ... -->
    </execution>
  </executions>
</plugin>
```

Yukarıdaki örnekte:
- **Phase**: `process-resources` — build'in hangi aşamasında bu goal'u çalıştır?
- **Goal**: `copy-resources` — maven-resources-plugin'in ne yapması gerekir?

### Goal (Hedef) Nedir?

Goal, bir plugin tarafından sağlanan belirli, yapılabilir bir işlemdir. Her goal, bir maven plugin'e aittir ve şu formatla adlandırılır:

```
<groupId>:<artifactId>:<goal>

Örnek:
org.apache.maven.plugins:maven-compiler-plugin:compile
org.apache.maven.plugins:maven-surefire-plugin:test
org.apache.maven.plugins:maven-assembly-plugin:single
```

#### Goal'ların Kullanım Yolları:

**1) Doğrudan Goal Çalıştırma** (phase bağlı olmadan):

```powershell
# Compiler plugin'in compile goal'unu çalıştır
mvn compiler:compile

# Assembly plugin'in single goal'unu çalıştır
mvn assembly:single

# Execute plugin'in exec goal'unu çalıştır
mvn exec:exec
```

**2) Pom.xml ile Phase'e Bağlama** (execution içinde):

```xml
<execution>
  <phase>package</phase>
  <goals>
    <goal>run</goal>
  </goals>
</execution>
```

Yukarıdaki örnekte `maven-antrun-plugin`'in `run` goal'u `package` fazından (phase) otomatik çalıştırılır.

### Lifecycle, Phase, Goal Arasındaki İlişki (Hiyerarşi)

```
Lifecycle (Default)
│
├─ Phase 1: validate
│  └─ (bağlı goal yoksa hiçbir şey yapılmaz)
│
├─ Phase 2: initialize
│  └─ (bağlı goal yoksa hiçbir şey yapılmaz)
│
├─ Phase 6: process-resources
│  └─ Goal: maven-resources-plugin:copy-resources
│     └─ (resource dosyalarını kopyala)
│
├─ Phase 7: compile
│  └─ Goal: maven-compiler-plugin:compile
│     └─ (Java kodunu derle)
│
├─ Phase 17: package
│  ├─ Goal: maven-assembly-plugin:single
│  │  └─ (fat jar oluştur)
│  ├─ Goal: maven-antrun-plugin:run
│  │  └─ (Launch4j config oluştur)
│  └─ Goal: exec-maven-plugin:exec
│     └─ (Launch4j çalıştırarak exe oluştur)
│
└─ Phase 22: install
   └─ Goal: install:install
      └─ (artifact'ı lokal repo'ya kopyala)
```

### Pratik Örnekler

#### Örnek 1: `mvn compile` Komutunu Çalıştırdığınızda

```powershell
mvn compile
```

Yapılanlar:
1. **Phase validate** → çalış
2. **Phase initialize** → çalış
3. ... (tüm önceki fazlar)
4. **Phase compile** çalıştır
   - Bağlı goal'ları tetikle:
     - `maven-compiler-plugin:compile` (Java kodunu derle)
5. Durdur (sonraki fazlar çalışmaz)

#### Örnek 2: `mvn clean package` Komutunu Çalıştırdığınızda

```powershell
mvn clean package
```

Yapılanlar:
1. **Clean Lifecycle**:
   - **Phase: pre-clean**
   - **Phase: clean** → `maven-clean-plugin:clean` (target/ klasörünü sil)
   - **Phase: post-clean**

2. **Default Lifecycle**:
   - Phase: validate → initialize → ... → process-resources (resource'ları kopyala)
   - Phase: compile (Java kodunu derle)
   - Phase: test (testleri çalıştır)
   - Phase: package → üç goal tetiklenir:
     - `maven-assembly-plugin:single` (fat jar oluştur)
     - `maven-antrun-plugin:run` (Launch4j config oluştur)
     - `exec-maven-plugin:exec` (exe oluştur)
   - Durdur

#### Örnek 3: Doğrudan Goal Çalıştırmak

```powershell
# Assembly goal'unu DOĞRUDAN çalıştır (pom'da phase bağlamasını yoksay)
mvn assembly:single
```

Bu komut:
- Sadece `assembly:single` goal'unu çalıştırır
- Pom'da `phase=package` olsa bile, diğer package phase goal'ları çalışmaz
- Hazırlık fazları (compile vb.) yine çalışır ❗

### Hangi Goal'lar Hangi Plugin'e Ait?

Pom'daki plugin'lerin sağladığı goal'lar:

| Plugin | Goal | İşlem |
|--------|------|-------|
| maven-resources-plugin | copy-resources | Resource'ları kopyala |
| maven-compiler-plugin | compile | Java kodunu derle |
| maven-surefire-plugin | test | Testleri çalıştır |
| maven-assembly-plugin | single | Fat jar oluştur |
| maven-antrun-plugin | run | Ant task'larını çalıştır |
| exec-maven-plugin | exec | Harici executable çalıştır |
| maven-jar-plugin | jar | JAR dosyası oluştur |
| maven-install-plugin | install | Artifact'ı lokal repo'ya kopyala |

### Özet Tablo

| Kavram | Ne Olduğu | Örnek | Tetiklemesi |
|--------|-----------|-------|-------------|
| **Lifecycle** | Build'in önceden tanımlanmış aşamaları | Default, Clean, Site | `mvn clean` veya `mvn package` |
| **Phase** | Bir lifecycle içindeki bir adım | `compile`, `test`, `package` | Lifecycle başlatıldığında otomatik sıra ile |
| **Goal** | Bir plugin'in yapılabilir işlemi | `maven-compiler-plugin:compile` | Phase içine bağla VEYA doğrudan `mvn plugin:goal` |

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

➖ (1) Full build (exe de üretmeye çalışır)
```powershell
mvn -DskipTests clean package
```
- `clean` önce `target/` klasörünü temizler.
- `package` lifecycle'ı tetikler; pom'daki package bağlı executions (assembly, antrun, exec) çalışır.

➖ (2) Sadece fat-jar (exe atlanır)

```powershell
mvn -DskipTests assembly:single -DdescriptorId=jar-with-dependencies
```
Sadece assembly goal'ını direkt çalıştırır; package fazına bağlı diğer plugin'leri tetiklemez.

➖ (3) Sadece kaynak dosyaları kopyalama (process-resources)

```powershell
mvn process-resources
```

➖ (4) Sadece derleme

```powershell
mvn compile
```

➖ (5) Lokal repository'ye yükleme

```powershell
mvn clean install
```

Üretilen artifact yerel Maven deposuna (`%USERPROFILE%\.m2\repository`) yüklenir.

➖ (6) Debug / detaylı çıktı

```powershell
mvn -X clean package
```

➖ (7) Etkin POM'u görmek

```powershell
mvn help:effective-pom
```

➖ (8) Spring Boot uygulamasını doğrudan çalıştırmak

- Eğer `spring-boot-maven-plugin` etkinse:

```powershell
mvn org.springframework.boot:spring-boot-maven-plugin:2.7.18:run
```
- Veya build edilmiş jar'ı çalıştırmak için:

```powershell
java -jar target\entegre-rest-api-jar-with-dependencies.jar
```

➖ (9) Bağımlılık ağacını incelemek

```powershell
mvn dependency:tree
```

- SLF4J veya logback ile ilgili çakışmaları aramak için kullanın.
 
➖ (10) Testleri atlamak için

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

## Maven Antrun Plugin ve Ant Task Nedir? — Detaylı Açıklama

Pom.xml dosyasında kullanılan `maven-antrun-plugin` ve içerdeki Ant task'ları, Maven build sürecine esnek ve güçlü özellikleri ekleyen araçlardır. Bu bölüm bu kavramları detaylı bir şekilde açıklamaktadır.

### Ant Nedir?

**Ant** (Another Neat Tool), Java tabanlı bir build automation aracıdır. Maven'den çok daha eski (1998'lerden beri) ve oldukça basit ancak güçlü bir araçtır. Ant, XML tabanlı konfigürasyon dosyaları (`build.xml`) kullanarak build işlemlerini otomatikleştirir.

#### Ant'ın Temel Özellikleri:
- Dosya işlemleri (kopyalama, silme, taşıma)
- Shell komutları çalıştırma
- Basit kontrol akışı (if-else)
- Platform bağımsız script yazma
- Sistemde kurulu herhangi bir programı tetikleme

### Maven Antrun Plugin Nedir?

`maven-antrun-plugin`, Maven build lifecycle'ının içinde Ant task'larını çalıştırmayı sağlayan bir bridge (köprü) plugin'idir.

**Amaç**: Maven, compile, test, package gibi standart işlemleri yapar. Ancak özel, teknik işlemler (mesela Launch4j konfigürasyon dosyası oluşturma) yapmak istiyorsak, Ant'ın gücünden faydalanırız.

#### Çalışma Prensibi:

```
Maven Lifecycle Phase → maven-antrun-plugin tetiklenir → Ant task'ları çalışır → İş yapılır
```

Örneğin pom.xml'deki şu bölüm:

```xml
<plugin>
  <groupId>org.apache.maven.plugins</groupId>
  <artifactId>maven-antrun-plugin</artifactId>
  <version>3.1.0</version>
  <executions>
    <execution>
      <id>create-launch4j-config</id>
      <phase>package</phase>                  <!-- Package fazında tetiklensin -->
      <goals>
        <goal>run</goal>                      <!-- Ant task'larını çalıştır -->
      </goals>
      <configuration>
        <target>
          <!-- Buraya Ant task'ları yazılır -->
        </target>
      </configuration>
    </execution>
  </executions>
</plugin>
```

### Ant Task Nedir?

**Ant Task**, Ant'ın yapabileceği belirli işlemleri ifade eden XML komutlarıdır. Her task, bir işlemi gerçekleştirir.

#### Sık Kullanılan Ant Task'ları:

| Task | İşlemi | Örnek |
|------|--------|-------|
| `<echo>` | Ekrana yazı yazdır | `<echo>Merhaba Dünya</echo>` |
| `<copy>` | Dosya/klasör kopyala | `<copy file="a.txt" tofile="b.txt"/>` |
| `<delete>` | Dosya/klasör sil | `<delete dir="target"/>` |
| `<mkdir>` | Klasör oluştur | `<mkdir dir="build"/>` |
| `<exec>` | Harici program çalıştır | `<exec executable="cmd.exe"/>` |
| `<move>` | Dosya taşı | `<move file="src" tofile="dst"/>` |
| `<chmod>` | Dosya permission değiştir | `<chmod file="script.sh" perm="+x"/>` |
| `<zip>` | ZIP dosyası oluştur | `<zip destfile="app.zip" basedir="src"/>` |
| `<unzip>` | ZIP dosyasını aç | `<unzip src="app.zip" dest="target"/>` |
| `<property>` | Property tanımla | `<property name="foo" value="bar"/>` |
| `<condition>` | Koşul kontrolü | `<condition property="isWindows">...</condition>` |

### Pom.xml'deki Antrun Kullanımı (Launch4j Örneği)

Projenizin pom.xml'inde şu blok vardır:

```xml
<plugin>
  <groupId>org.apache.maven.plugins</groupId>
  <artifactId>maven-antrun-plugin</artifactId>
  <version>3.1.0</version>
  <executions>
    <execution>
      <id>create-launch4j-config</id>
      <phase>package</phase>
      <goals>
        <goal>run</goal>
      </goals>
      <configuration>
        <target>
          <echo>Creating Launch4j configuration file...</echo>
          <echo file="${project.build.directory}/launch4j-config.xml"><![CDATA[
            <?xml version="1.0" encoding="UTF-8"?>
            <launch4jConfig>
              <dontWrapJar>false</dontWrapJar>
              <headerType>console</headerType>
              <jar>Y:\devrepo-ozpas\entegre-rest-api\target\entegre-rest-api-jar-with-dependencies.jar</jar>
              <outfile>Y:\devrepo-ozpas\entegre-rest-api\target\entegre-rest-api.exe</outfile>
              <!-- ... diğer konfigürasyon ... -->
            </launch4jConfig>
          ]]></echo>
          <echo>Launch4j configuration created at ${project.build.directory}/launch4j-config.xml</echo>
        </target>
      </configuration>
    </execution>
  </executions>
</plugin>
```

#### Bu Kod Ne Yapar?

1. **`<phase>package</phase>`** → `package` fazında çalışsın
2. **`<echo>Creating Launch4j...</echo>`** → Ekrana "Creating Launch4j configuration file..." yaz
3. **`<echo file="..."><![CDATA[...]]></echo>`** → İçerisindeki metni bir dosyaya yaz:
   - **Hedef dosya**: `${project.build.directory}/launch4j-config.xml` (yani `target/launch4j-config.xml`)
   - **İçerik**: Launch4j XML konfigürasyonu
   - **`<![CDATA[...]]>`**: XML özel karakterlerini escape etmeden doğrudan yazabilmek için
4. **Son `<echo>`** → Işlem tamamlandığını ekrana yaz

#### Sonuç:
`package` fazında `target/` klasörüne `launch4j-config.xml` dosyası otomatik oluşturulur, sonra diğer plugin (`exec-maven-plugin`) bu config dosyasını okur ve Launch4j'i çalıştırır.

### Pratik Antrun Örnekleri

#### Örnek 1: Dosya Kopyalama

```xml
<plugin>
  <groupId>org.apache.maven.plugins</groupId>
  <artifactId>maven-antrun-plugin</artifactId>
  <executions>
    <execution>
      <phase>package</phase>
      <goals>
        <goal>run</goal>
      </goals>
      <configuration>
        <target>
          <!-- src/main/resources klasörünün tamamını target/ köküne kopyala -->
          <copy todir="${project.build.directory}">
            <fileset dir="src/main/resources"/>
          </copy>
        </target>
      </configuration>
    </execution>
  </executions>
</plugin>
```

#### Örnek 2: Shell Komutunu Çalıştırma (Windows)

```xml
<target>
  <!-- Windows'ta cmd.exe ile bir komut çalıştır -->
  <exec executable="cmd.exe">
    <arg value="/c"/>
    <arg value="echo Merhaba Maven!"/>
  </exec>
</target>
```

#### Örnek 3: Dosya Silme (Temizlik)

```xml
<target>
  <!-- Build öncesi eski dosyaları sil -->
  <delete>
    <fileset dir="${project.build.directory}/old-files" includes="*.bak"/>
  </delete>
</target>
```

#### Örnek 4: Koşullu İşlem

```xml
<target>
  <!-- Eğer Build Windows'ta yapılıyorsa -->
  <condition property="isWindows">
    <os family="windows"/>
  </condition>
  
  <echo message="OS: Windows detected!" if="isWindows"/>
</target>
```

#### Örnek 5: Maven Property'lerini Kullanma

```xml
<target>
  <!-- Maven property'lerini Ant'ın içinde kullan -->
  <echo>Project Name: ${project.name}</echo>
  <echo>Project Version: ${project.version}</echo>
  <echo>Build Directory: ${project.build.directory}</echo>
  <echo>Java Version: ${java.version}</echo>
</target>
```

### Antrun Ne Zaman Kullanılır?

**Ant task'ları şu durumlarda kullanılır:**

✅ **Kullanılmalı:**
- Basit dosya işlemleri (kopyala, sil, taşı)
- Build sırasında doğrudan komut çalıştırmak (şifreler, script'ler)
- Konfigürasyon dosyaları dinamik olarak oluşturmak
- Harici tool'ları tetiklemek (Launch4j, InnoSetup vb.)
- Platform bağımsız script yazma (Windows/Linux)
- Basit koşullu işlemler

❌ **Kullanılmaması gerekenler:**
- Komplex Java lojiği (Maven plugin yazın)
- Bağımlılık yönetimi (Maven bunu zaten yapar)
- Test framework yazma (TestNG/JUnit kullanın)
- Proje yapısını radikal değiştirmek

### Antrun vs Diğer Plugin'ler

| Plugin | Amaç | Karmaşıklık | Esneklik |
|--------|------|-------------|----------|
| **maven-antrun-plugin** | Basit işlemler, dış tool'lar | Düşük | Yüksek |
| **maven-assembly-plugin** | JAR/WAR paketleme | Orta | Orta |
| **exec-maven-plugin** | Harici program çalıştır | Düşük | Orta |
| **maven-plugin** (custom) | Özel Maven logic | Yüksek | Çok Yüksek |

### Antrun Debugging

Eğer Ant task'larında hata alırsanız:

```powershell
# Detaylı çıktı görmek için
mvn -X clean package

# Sadece antrun'ı çalıştırmak için
mvn antrun:run

# Pom'dan bir specific execution çalıştırmak için
# antrun konfigürasyon dosyası oluşturup elle çalıştırabilirsiniz
```

### Özet

| Kavram | Ne Olduğu | Amaç |
|--------|-----------|------|
| **Ant** | Eski Java build tool'u | XML ile basit build işlemleri |
| **Ant Task** | Ant'ın yapabileceği belirli işlem | `<echo>`, `<copy>`, `<exec>` vb. |
| **maven-antrun-plugin** | Maven içinde Ant çalıştıran plugin | Maven build lifecycle'ında Ant task'larını tetiklemek |

Projenizin `maven-antrun-plugin` bloku, `package` fazında Launch4j config XML dosyasını otomatik oluşturmak için kullanılmaktadır. Bu sayede elleriyle config yazmanıza gerek kalmıyor, build sırasında Maven otomatik yapıyor.

---

## Maven Exec Plugin Nedir? — Detaylı Açıklama

`exec-maven-plugin`, Maven build lifecycle'ı içinde **harici programları ve command'ları çalıştırmak** için kullanılan bir plugin'dir. Pom.xml'inizde Launch4j'i tetiklemek için kullanılmaktadır.

### Exec Plugin Nedir?

**Temel Amaç**: Maven build sırasında Java programını çalıştırmak veya sistemde kurulu herhangi bir executable (bash, python, exe, cmd vb.) çalıştırmak.

#### Temel Özellikleri:
- Windows/Linux/Mac platform'da executable çalıştırır
- Maven property'lerini parametre olarak geçebilir
- Komut satırı argümanlarını belirleyebilir
- Çalıştırma dizinini (working directory) değiştirebilir
- Çıkış kodunun başarılı / başarısız olmasını kontrol edebilir
- Environment variable'ları ayarlayabilir

### Exec Plugin'in iki temel goal'u vardır:

1. **`exec:exec`** — Harici program/command çalıştırır
2. **`exec:java`** — Bir Java class'ının main() method'u çalıştırır

### Pom.xml'deki Exec Kullanımı (Launch4j Örneği)

Projenizin pom.xml'inde exec-maven-plugin şu şekilde kullanılıyor:

```xml
<plugin>
  <groupId>org.codehaus.mojo</groupId>
  <artifactId>exec-maven-plugin</artifactId>
  <version>3.1.0</version>
  <executions>
    <execution>
      <id>launch4j-build-exe</id>
      <phase>package</phase>                    <!-- Package fazında tetiklensin -->
      <goals>
        <goal>exec</goal>                       <!-- Harici program çalıştır -->
      </goals>
      <configuration>
        <executable>Y:\ozpasjavaexe\launch4j-3.8-win32\launch4j\launch4jc.exe</executable>
        <arguments>
          <argument>${project.build.directory}/launch4j-config.xml</argument>
        </arguments>
      </configuration>
    </execution>
  </executions>
</plugin>
```

#### Bu Kod Ne Yapar?

1. **`<phase>package</phase>`** → `package` fazında çalışsın
2. **`<goal>exec</goal>`** → `exec:exec` goal'u (harici program)
3. **`<executable>...</executable>`** → Çalıştırılacak program:
   - Windows yolu: `Y:\ozpasjavaexe\launch4j-3.8-win32\launch4j\launch4jc.exe`
   - Bu, Launch4j'nin command-line interface'i
4. **`<arguments>`** → Programa geçilecek argümanlar:
   - `${project.build.directory}/launch4j-config.xml` → `target/launch4j-config.xml`
   - Bu, Launch4j'ye hangi config dosyasını okuduğunu söylüyor

#### İş Akışı:

```
Package fazı
   │
   ├─ maven-assembly-plugin:single → fat jar yarat
   ├─ maven-antrun-plugin:run → Launch4j config dosyası oluştur
   └─ exec-maven-plugin:exec  → Launch4j programını çalıştır
                              │
                              └─ launch4jc.exe çalışır
                                   │
                                   ├─ config'i okur
                                   └─ fat jar'dan exe yaratır
```

### Exec Plugin'in Pratik Kullanım Örnekleri

#### Örnek 1: Harici Programı Çalıştırma (Windows batch dosyası)

```xml
<plugin>
  <groupId>org.codehaus.mojo</groupId>
  <artifactId>exec-maven-plugin</artifactId>
  <executions>
    <execution>
      <phase>package</phase>
      <goals>
        <goal>exec</goal>
      </goals>
      <configuration>
        <executable>cmd.exe</executable>
        <arguments>
          <argument>/c</argument>
          <argument>build.bat</argument>
        </arguments>
      </configuration>
    </execution>
  </executions>
</plugin>
```

#### Örnek 2: Python Script'ini Çalıştırma

```xml
<configuration>
  <executable>python</executable>
  <arguments>
    <argument>scripts/build-app.py</argument>
    <argument>--version</argument>
    <argument>${project.version}</argument>
  </arguments>
</configuration>
```

#### Örnek 3: Java Programını Doğrudan Çalıştırma

```xml
<plugin>
  <groupId>org.codehaus.mojo</groupId>
  <artifactId>exec-maven-plugin</artifactId>
  <executions>
    <execution>
      <goals>
        <goal>java</goal>                       <!-- exec:java goal'u -->
      </goals>
      <configuration>
        <mainClass>com.example.MyApp</mainClass>
        <arguments>
          <argument>arg1</argument>
          <argument>arg2</argument>
        </arguments>
      </configuration>
    </execution>
  </executions>
</plugin>
```

#### Örnek 4: Çalışma Dizinini Değiştirerek Komut Çalıştırma

```xml
<configuration>
  <executable>gradle</executable>
  <arguments>
    <argument>build</argument>
  </arguments>
  <workingDirectory>${project.basedir}/submodule</workingDirectory>  <!-- Farklı dizinde çalıştır -->
</configuration>
```

#### Örnek 5: Environment Variable'ları Ayarlayarak Çalıştırma

```xml
<configuration>
  <executable>build.sh</executable>
  <environmentVariables>
    <BUILD_VERSION>${project.version}</BUILD_VERSION>
    <BUILD_NAME>${project.artifactId}</BUILD_NAME>
    <JAVA_HOME>${java.home}</JAVA_HOME>
  </environmentVariables>
</configuration>
```

#### Örnek 6: Komut Satırı Parametresiyle Çalıştırma

```xml
<configuration>
  <executable>InnoSetup compiler</executable>
  <arguments>
    <argument>/F"MyApp-${project.version}"</argument>  <!-- Versiyon numarası ekle -->
    <argument>installer-script.iss</argument>
  </arguments>
</configuration>
```

### Antrun vs Exec Plugin Karşılaştırması

| Özellik | Maven Antrun | Maven Exec |
|---------|------------------|----------------|
| **Amaç** | Ant task'ları çalıştırır | Harici program çalıştırır |
| **Dosya İşlemleri** | ✅ Evet (copy, delete, vb.) | ❌ Yok |
| **Koşullu İşlem** | ✅ Evet | ⚠️ Limited |
| **Program Çalıştırma** | ✅ Evet (<exec> task'u) | ✅ Evet (asıl amacı) |
| **Basitlik** | Orta (XML'de Ant yazma) | Yüksek (sadece executable ve arg) |
| **Platform Bağımsızlık** | ✅ Çok iyi | ✅ Çok iyi |
| **Hata Yönetimi** | ✅ Basit | ✅ Basit |

### Exec Plugin'de Hata Yönetimi

Exec plugin hatalarını kontrol etmek istiyorsanız:

```xml
<configuration>
  <executable>launch4jc.exe</executable>
  <arguments>
    <argument>config.xml</argument>
  </arguments>
  <!-- Eğer program hata döndürürse Maven başarısız sayılır -->
  <!-- Bunu kontrol etmek istiyorsanız: -->
  <executableDependency>
    <groupId>org.codehaus.mojo</groupId>
    <artifactId>exec-maven-plugin</artifactId>
  </executableDependency>
</configuration>
```

### Exec Plugin'le İlişkili Sorunlar ve Çözümler

**Sorun 1: Executable bulunamıyor**
```powershell
# Çözüm: Tam yol kullanın
<executable>C:\Program Files\MyApp\app.exe</executable>
```

**Sorun 2: Çevre değişkenleri tanınmıyor**
```xml
<!-- Çözüm: environmentVariables bölümü ekleyin -->
<environmentVariables>
  <PATH>/usr/local/bin:${env.PATH}</PATH>
</environmentVariables>
```

**Sorun 3: Programın çıktısı görülmüyor**
```powershell
# Çözüm: Maven verbose modunu kullanın
mvn -X clean package
```

**Sorun 4: Geriye dönüş kodu önemli değil**
```xml
<configuration>
  <skip>false</skip>  <!-- Yine de devam et, hata görmezden gel -->
</configuration>
```

### Özet Tablo

| Özellik | Açıklama | Örnek |
|---------|----------|-------|
| **executable** | Çalıştırılacak program | `launch4jc.exe`, `python`, `cmd.exe` |
| **arguments** | Program argümanları | `<argument>config.xml</argument>` |
| **workingDirectory** | Çalışma dizini | `${project.basedir}/build` |
| **environmentVariables** | Çevre değişkenleri | `<BUILD_VERSION>${project.version}</BUILD_VERSION>` |
| **phase** | Hangi build fazında çalışsın | `package`, `verify`, `install` |

### Pratik Kullanım Örneği: Projenizde Launch4j

Projeninizde exec-maven-plugin şu amaçla kullanılıyor:

```
1. maven-assembly-plugin
   ↓ (fat jar oluştur)
   ↓ entegre-rest-api-jar-with-dependencies.jar
   ↓
2. maven-antrun-plugin  
   ↓ (Launch4j config oluştur)
   ↓ target/launch4j-config.xml
   ↓
3. exec-maven-plugin
   ↓ (launch4jc.exe çalıştır)
   ↓ entegre-rest-api.exe OLUŞUR
```

**Sonuç**: Build sırasında Maven otomatik olarak Windows EXE dosyası oluşturuyor. Bunun için antrun config dosyasını oluşturur, exec ise Launch4j'i tetikler.

---

## Sonuç

Bu dokümantasyon `pom.xml`'in tüm yönlerini kapsamaktadır:
- Maven Lifecycle, Phase ve Goal kavramları
- Plugin'lerin detaylı açıklaması (Assembly, Antrun, Exec)
- Sık kullanılan Maven komutları
- Antrun ve Ant task'ları
- Exec Maven Plugin'i

Eğer Maven build sürecinde sorun yaşarsanız veya pom.xml'i optimize etmek istiyorsanız, bu dokümantasyon iyi bir referans kaynağıdır.



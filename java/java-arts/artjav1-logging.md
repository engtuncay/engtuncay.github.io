
# Java Logging: Logback ve Log4j2 Kullanımı

Bu doküman, Java projelerinde sık kullanılan iki logging kütüphanesi olan **Logback** ve **Log4j2** için temel kurulum, yapılandırma ve kullanım notlarını içerir. Ayrıca SLF4J aracılığıyla ortak kullanım, yaygın tuzaklar ve pratik ipuçları da yer almaktadır.

➖ Kısa Özet

- SLF4J: Soyutlama (API). Uygulama kodunuz `org.slf4j.Logger` kullanır.
- Logback: SLF4J'nin referans uygulaması, basit ve güçlü.
- Log4j2: Performans ve esneklik odaklı, gelişmiş appenders/async seçenekleri.
  

# Contents

- [Java Logging: Logback ve Log4j2 Kullanımı](#java-logging-logback-ve-log4j2-kullanımı)
- [Contents](#contents)
  - [1. Bağımlılıklar (Maven / Gradle)](#1-bağımlılıklar-maven--gradle)
  - [2. Temel Kod Kullanımı (SLF4J ile)](#2-temel-kod-kullanımı-slf4j-ile)
  - [3. Logback Yapılandırması (logback.xml)](#3-logback-yapılandırması-logbackxml)
  - [4. Log4j2 Yapılandırması (log4j2.xml)](#4-log4j2-yapılandırması-log4j2xml)
  - [5. Yaygın Yapılandırma ve Bağlama Notları](#5-yaygın-yapılandırma-ve-bağlama-notları)
  - [6. Performans ve Asenkron Logging](#6-performans-ve-asenkron-logging)
  - [7. Hata Ayıklama ve Sorunlar](#7-hata-ayıklama-ve-sorunlar)
  - [8. Geçiş / Migrasyon İpuçları](#8-geçiş--migrasyon-i̇puçları)
  - [9. Hızlı Örnekler](#9-hızlı-örnekler)
  - [10. Kaynaklar ve Daha Fazla Okuma](#10-kaynaklar-ve-daha-fazla-okuma)

---

## 1. Bağımlılıklar (Maven / Gradle)

Örnek Maven bağımlılıkları:

- Logback (SLF4J API ile birlikte):

```xml
<dependency>
	<groupId>ch.qos.logback</groupId>
	<artifactId>logback-classic</artifactId>
	<version>1.4.11</version>
</dependency>
<dependency>
	<groupId>org.slf4j</groupId>
	<artifactId>slf4j-api</artifactId>
	<version>2.0.9</version>
</dependency>
```

- Log4j2 (SLF4J bağlayıcı ile):

```xml
<!-- log4j-slf4j2 -->
<dependency>
	<groupId>org.apache.logging.log4j</groupId>
	<artifactId>log4j-slf4j2-impl</artifactId>
	<version>2.20.0</version>
</dependency>
<!-- log4j core -->
<dependency>
	<groupId>org.apache.logging.log4j</groupId>
	<artifactId>log4j-core</artifactId>
	<version>2.20.0</version>
</dependency>
<!-- slf4j -->
<dependency>
	<groupId>org.slf4j</groupId>
	<artifactId>slf4j-api</artifactId>
	<version>2.0.9</version>
</dependency>
```

Gradle (Kotlin DSL) örneği:

```kotlin
implementation("org.slf4j:slf4j-api:2.0.9")
// Logback
implementation("ch.qos.logback:logback-classic:1.4.11")
// veya Log4j2
implementation("org.apache.logging.log4j:log4j-core:2.20.0")
implementation("org.apache.logging.log4j:log4j-slf4j2-impl:2.20.0")
```

Not: Projede yalnızca tek bir logging implementasyonu olmalıdır. Birden fazla implementasyon (örn. hem logback hem log4j2) sınıf yolu çatışmalarına ve beklenmeyen davranışa yol açar.

---

## 2. Temel Kod Kullanımı (SLF4J ile)

Uygulama kodu her zaman SLF4J API'sını kullanmalı:

```java
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

public class MyClass {
		private static final Logger logger = LoggerFactory.getLogger(MyClass.class);

		public void doWork() {
				logger.info("Başlıyor: doWork");
				try {
						// iş
				} catch (Exception e) {
						logger.error("Hata oluştu", e);
				}
		}
}
```

Avantaj: SLF4J ile yazılan kod, Logback veya Log4j2 gibi farklı implementasyonlarla bağlanabilir.

---

## 3. Logback Yapılandırması (logback.xml)

Basit bir `logback.xml` örneği (src/main/resources içinde):

```xml
<configuration>
	<appender name="CONSOLE" class="ch.qos.logback.core.ConsoleAppender">
		<encoder>
			<pattern>%d{yyyy-MM-dd HH:mm:ss} [%thread] %-5level %logger{36} - %msg%n</pattern>
		</encoder>
	</appender>

	<appender name="FILE" class="ch.qos.logback.core.rolling.RollingFileAppender">
		<file>logs/app.log</file>
		<rollingPolicy class="ch.qos.logback.core.rolling.TimeBasedRollingPolicy">
			<fileNamePattern>logs/app.%d{yyyy-MM-dd}.log.gz</fileNamePattern>
			<maxHistory>30</maxHistory>
		</rollingPolicy>
		<encoder>
			<pattern>%d{ISO8601} %-5level %logger{36} - %msg%n</pattern>
		</encoder>
	</appender>

	<root level="INFO">
		<appender-ref ref="CONSOLE" />
		<appender-ref ref="FILE" />
	</root>
</configuration>
```

İleri seviye ipuçları:
- `AsyncAppender` kullanarak IO maliyetini asenkron hale getirin.
- `scan` ve `scanPeriod` ile konfigürasyonun runtime'da yeniden yüklenmesini sağlayabilirsiniz.

---

## 4. Log4j2 Yapılandırması (log4j2.xml)

Basit `log4j2.xml` örneği:

```xml
<Configuration status="WARN">
	<Appenders>
		<Console name="Console" target="SYSTEM_OUT">
			<PatternLayout pattern="%d{yyyy-MM-dd HH:mm:ss} [%t] %-5level %c{1} - %msg%n"/>
		</Console>

		<RollingFile name="File" fileName="logs/app.log" filePattern="logs/app-%d{yyyy-MM-dd}.log.gz">
			<PatternLayout pattern="%d{ISO8601} %-5level %logger{36} - %msg%n"/>
			<Policies>
				<TimeBasedTriggeringPolicy />
			</Policies>
		</RollingFile>
	</Appenders>

	<Loggers>
		<Root level="info">
			<AppenderRef ref="Console"/>
			<AppenderRef ref="File"/>
		</Root>
	</Loggers>
</Configuration>
```

Log4j2 performans ve thread pool özellikleriyle büyük uygulamalarda tercih edilir. Async logging için `AsyncAppender` veya disruptor tabanlı `AsyncLogger` konfigürasyonu kullanılabilir.

---

## 5. Yaygın Yapılandırma ve Bağlama Notları

- Bir projede yalnızca bir logging implementasyonu bulunmalı; Maven/Gradle ile diğerlerini exclude edin.
- Log4j2 kullanırken SLF4J bağlayıcısı (`log4j-slf4j2-impl`) ile bağlayın.
- Logback kullanırken `logback-classic` SLF4J bağlayıcısıdır.
- Eğer eski `commons-logging` veya `java.util.logging` gibi araçlar varsa bridge kütüphaneleri kullanarak (örn. `jul-to-slf4j`) merkezi logging'e yönlendirebilirsiniz.

Örnek: Log4j2 yerine Logback kullanan projede `log4j-over-slf4j` veya `log4j-slf4j2-impl` gibi çatışmaları dikkatle yönetin.

---

## 6. Performans ve Asenkron Logging

- Disk IO veya uzak log sunucuları performansı etkileyebilir; `AsyncAppender` veya Log4j2 `AsyncLogger` tercih edin.
- Asenkron yazma, uygulama thread'lerinin IO beklemesini engeller fakat veri kaybı riskini artırabilir (shutdown sırasında flush önemlidir).

---

## 7. Hata Ayıklama ve Sorunlar

- "Multiple bindings" hatası: classpath'te birden fazla SLF4J implementasyonu var.
- Duplicate loglar: aynı log birden fazla appender veya bridge nedeniyle iki kez yazdırılıyor olabilir.
- Statik initializer'larda logger kullanımı: sınıf yüklemesi sırasında logging beklenmedik davranış gösterebilir.

Sorun giderme ipucu: uygulamayı `-Dorg.slf4j.simpleLogger.defaultLogLevel=DEBUG` veya Log4j2/Logback `status`/`debug` seçenekleri ile başlatıp konfigürasyonun yüklenmesini izleyin.

---

## 8. Geçiş / Migrasyon İpuçları

- Mevcut Logback kurulumundan Log4j2'ye geçişte SLF4J kullanımı işleri kolaylaştırır.
- Bağımlılıkları güncellerken eski implementasyonları exclude edin.
- Test ortamında konfigürasyonlarınızı doğrulayın ve rolling, appenders, pattern çıktısını kontrol edin.

---

## 9. Hızlı Örnekler

- Basit log çağrıları: `logger.debug("x={}", x);` (SLF4J parametreleme tercih edin, string concat yerine).
- Log seviyeleri: `TRACE < DEBUG < INFO < WARN < ERROR`.

---

## 10. Kaynaklar ve Daha Fazla Okuma

- SLF4J: https://www.slf4j.org/
- Logback: https://logback.qos.ch/
- Log4j2: https://logging.apache.org/log4j/2.x/

---

Bu rehber temel ve pratik adımları içerir; isterseniz örnek bir Maven projesi ya da daha ayrıntılı asenkron konfigürasyon örnekleri ekleyebilirim.


SLF4J / logback / reload4j içeren bağımlılıkları görmek için:

```
mvn -f Y:\devrepo-ozpas\entegre-rest-api\pom.xml dependency:tree -Dverbose | Select-String -Pattern 'slf4j|logback|reload4j|log4j'
```

Sadece belirli artifact'leri listelemek:

```
mvn -f Y:\devrepo-ozpas\entegre-rest-api\pom.xml dependency:list -DincludeArtifactIds=logback-classic,slf4j-reload4j,log4j-slf4j-impl


```
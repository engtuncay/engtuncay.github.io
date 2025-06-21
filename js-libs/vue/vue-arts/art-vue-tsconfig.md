
- [Me](#me)
- [AI Assistant](#ai-assistant)
  - [1. `tsconfig.json` (Ana Yapılandırma)](#1-tsconfigjson-ana-yapılandırma)
  - [2. `tsconfig.app.json` (Uygulama İçin)](#2-tsconfigappjson-uygulama-i̇çin)
  - [3. `tsconfig.node.json` (Node.js İçin)](#3-tsconfignodejson-nodejs-i̇çin)
  - [Neden Birden Fazla `tsconfig` Kullanılıyor?](#neden-birden-fazla-tsconfig-kullanılıyor)
    - [1. **Modülerlik Sağlamak**](#1-modülerlik-sağlamak)
    - [2. **Performansı Artırmak**](#2-performansı-artırmak)
    - [3. **Farklı Ayarlar Gerekmesi**](#3-farklı-ayarlar-gerekmesi)
  - [Özet:](#özet)


## Me
Projede tsconfig.app.json ve tsconfig.node.json ve tsconfig.json dosyalarını açıklar mısın ?

## AI Assistant
Projede birden fazla `tsconfig` dosyasının olması, büyük projelerde farklı ihtiyaçlara göre farklı TypeScript yapılandırmaları kullanmayı mümkün kılmak içindir. Her bir dosyanın farklı bir amacı vardır ve bu, projeyi daha esnek, modüler ve organize bir şekilde yönetmenize yardımcı olur. Şimdi her bir dosyanın neden var olduğunu ve hangi işleve sahip olduğunu açıklayalım:

---

### 1. `tsconfig.json` (Ana Yapılandırma)
Bu genellikle proje için **ana yapılandırma dosyasıdır**. İçerisinde global TypeScript ayarları yer alır ve diğer `tsconfig` dosyaları bu yapılandırmayı genişletebilir.

- **Amaç:**
  - Projeye genel ayarlar sağlayan, diğer `tsconfig` dosyalarına referans veren bir dosyadır.
  - Büyük projelerde alt projeleri/parçaları referans almak için `references` alanı kullanılır. Bu, "Project References" (Proje Referansları) özelliğini destekler.

- **Örnek:**
```json
{
    "files": [],
    "compilerOptions": {
      "baseUrl": "./",
      "paths": {
        "@/*": ["src/*"]
      }
    },
    "references": [
      {
        "path": "./tsconfig.node.json"
      },
      {
        "path": "./tsconfig.app.json"
      }
    ]
  }
```

  - `references`: Çalışma zamanında alt projeleri tanımlar (`tsconfig.app.json` ve `tsconfig.node.json`). Bu, modüler bir yapı kurar ve TypeScript'in derleme sürecindeki performansı artırır.

---

### 2. `tsconfig.app.json` (Uygulama İçin)
Bu dosya, genellikle uygulamanın (frontend veya backend işlevleri) kodlarını kapsar. Özel ayarlarla geliştirme veya üretim sırasında kodların nasıl işleneceğini tanımlar.

- **Amaç:**
  - **Vue.js uygulaması** veya `src/` klasörü gibi projenin uygulama kodlarına odaklanır.
  - TypeScript'in yalnızca uygulama ile ilgili kısmını derlemesi ve anlaması için özelleştirilmiştir.

- **Önemli Noktalar:**
  - **`extends`:** Vue için özel ayarları içeren `@vue/tsconfig/tsconfig.dom.json` dosyasını miras alır. Bu, Vue ile uyumluluğu artırır.
  - **`include`:** Hangi dosyaların TypeScript derleyicisi tarafından dahil edilmesi gerektiğini tanımlar.
  - **`composite`:** Bu ayar açık olduğunda, dosya bir alt proje (subproject) olarak davranır ve TypeScript "Incremental Compilation" (artımlı derleme) yapabilir.
  - **`tsBuildInfoFile`:** Derleme bilgilerini depolamak için geçici bir dosya yolu tanımlar.

- **Örnek:**
```json
{
    "extends": "@vue/tsconfig/tsconfig.dom.json",
    "include": ["env.d.ts", "src/**/*", "src/**/*.vue"],
    "exclude": ["src/**/__tests__/*"],
    "compilerOptions": {
      "composite": true,
      "tsBuildInfoFile": "./node_modules/.tmp/tsconfig.app.tsbuildinfo",
      "paths": {
        "@/*": ["./src/*"]
      }
    }
  }
```

---

### 3. `tsconfig.node.json` (Node.js İçin)
Bu dosya, Node.js ile ilgili yapılandırma ayarlarını içerir. Özellikle `vite.config.ts`, `cypress.config.ts` gibi Node.js ortamında çalıştırılan yapılandırma dosyalarına odaklanır.

- **Amaç:**
  - **Node.js ortamı** için özel ayar sağlar.
  - Uygulamadaki yalnızca Node.js ile ilgili kısmı derlemek için optimize edilmiştir (örn: yapılandırma dosyaları, script'ler).
  - `module` ve `moduleResolution` gibi Node.js modül sistemiyle uyumlu ayarlar içerir.

- **Önemli Noktalar:**
  - **`extends`:** Node.js için resmi TypeScript yapılandırma dosyasını (`@tsconfig/node22/tsconfig.json`) miras alır.
  - **`types`:** Yalnızca `node` tiplerini dahil eder (`node_modules/@types/node`).
  - **`noEmit`:** Bu ayar, aslında TypeScript'in JS çıktısını üretmeyeceğini belirtir. Yalnızca tip kontrolü yapılır.
  - **`include`:** Hangi node dosyalarının dahil edilmesi gerektiğini tanımlar (örneğin, `vite.config.ts`).

- **Örnek:**
```json
{
    "extends": "@tsconfig/node22/tsconfig.json",
    "include": [
      "vite.config.*",
      "vitest.config.*",
      "cypress.config.*",
      "nightwatch.conf.*",
      "playwright.config.*"
    ],
    "compilerOptions": {
      "composite": true,
      "noEmit": true,
      "tsBuildInfoFile": "./node_modules/.tmp/tsconfig.node.tsbuildinfo",

      "module": "ESNext",
      "moduleResolution": "Bundler",
      "types": ["node"]
    }
  }
```


---

### Neden Birden Fazla `tsconfig` Kullanılıyor?

#### 1. **Modülerlik Sağlamak**
Projede farklı görevler için ayrı `tsconfig` dosyaları tanımlanmış:
- `tsconfig.app.json`: Uygulamanın asıl kodları için.
- `tsconfig.node.json`: Node.js ortamındaki dosyalar için (örneğin, `vite.config.ts` gibi).

Bu, karmaşık projelerde her bir kısmı farklı ayarlarla yönetmeyi kolaylaştırır.

---

#### 2. **Performansı Artırmak**
TypeScript'in **Incremental Compilation** (artımlı derleme) özelliğiyle, yalnızca ilgili kısmı derlemek mümkün olur. Bu, proje boyutu büyüdükçe derleme süresini ciddi şekilde azaltır. 

---

#### 3. **Farklı Ayarlar Gerekmesi**
Node.js ve tarayıcı (frontend) ortamları genellikle farklı TypeScript ayarlarına ihtiyaç duyar:
- Tarayıcı: DOM'la çalışır ve farklı modül yükleme yöntemlerine ihtiyaç duyar.
- Node.js: Sunucu tarafında çalıştığından farklı modüllerle uyumluluk gerekir (örneğin, ESNext veya CommonJS).

Bu nedenle farklı `tsconfig` dosyaları kullanılır.

---

### Özet:
- **`tsconfig.json`:** Ana yapılandırma ve diğer yapılandırma dosyalarına referans veren bir dosya.
- **`tsconfig.app.json`:** Uygulama kodları (Vue veya tarayıcı için).
- **`tsconfig.node.json`:** Node.js için yapılandırma (örneğin, `vite.config.ts` gibi dosyalar).

Bu yapı, büyük projeler için daha iyi bir organizasyon sağlar ve derleme performansını artırır. Her `tsconfig` dosyası kendi görevine odaklanır ve ihtiyaçlara göre özelleştirilir.

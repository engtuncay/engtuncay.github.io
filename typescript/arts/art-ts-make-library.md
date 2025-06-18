
- [Me](#me)
- [AI Assistant](#ai-assistant)
  - [1. **Proje Yapısını Belirleme**](#1-proje-yapısını-belirleme)
  - [2. **Dosya ve Klasör Yapısı**](#2-dosya-ve-klasör-yapısı)
  - [3. **Kodunuzu Yazın**](#3-kodunuzu-yazın)
  - [4. **TypeScript ile Library (Opsiyonel)**](#4-typescript-ile-library-opsiyonel)
  - [5. **Build (Derleme) Yapımı**](#5-build-derleme-yapımı)
  - [6. **Testlerinizi Yazın**](#6-testlerinizi-yazın)
  - [7. **Library Yayınlama**](#7-library-yayınlama)
  - [8. **Important Paketler**](#8-important-paketler)
  - [Örnek `package.json`](#örnek-packagejson)
  - [9. Vite ile Ek Yapılandırma (Opsiyonel)](#9-vite-ile-ek-yapılandırma-opsiyonel)
- [Me](#me-1)
- [AI Assistant](#ai-assistant-1)
- [1. **tsconfig.json**](#1-tsconfigjson)
  - [Temel Özellikler](#temel-özellikler)
    - [Genel Bir Örnek:](#genel-bir-örnek)
  - [Önemli `compilerOptions` Ayarları:](#önemli-compileroptions-ayarları)
  - [Diğer Ayarlar:](#diğer-ayarlar)
- [2. **vite.config.ts**](#2-viteconfigts)
  - [Temel Özellikler](#temel-özellikler-1)
    - [Genel Bir Örnek:](#genel-bir-örnek-1)
  - [Önemli Ayarlar:](#önemli-ayarlar)
    - [1. **`plugins`**](#1-plugins)
    - [2. **`build`**](#2-build)
    - [3. **`resolve`**](#3-resolve)
    - [4. **`server`**](#4-server)
  - [`tsconfig.json` ile `vite.config.ts` Arasındaki Fark](#tsconfigjson-ile-viteconfigts-arasındaki-fark)


## Me
Bir library nasıl oluştururuz

## AI Assistant
Bir **library** oluşturmak, özel bir yazılım veya bileşeni paylaşabilir ve birçok projede kullanıma açabilir hale getirmek anlamına gelir. Aşağıda, bir JavaScript/TypeScript tabanlı bir library oluşturma adımları bulunmaktadır.

### 1. **Proje Yapısını Belirleme**

Library'nizi oluşturmak için temiz bir klasör başlangıcı yapın:

```shell script
pnpm init
```


Yukarıdaki komut, bir `package.json` dosyası oluşturacaktır. `package.json` içerisinde **name**, **version**, **description** gibi bilgileri düzenleyin.

### 2. **Dosya ve Klasör Yapısı**
Önerilen klasör yapısı şu şekildedir:

```
├── src/
│   ├── index.ts  // Giriş dosyası
│   ├── helpers/  // Yardımcı fonksiyonlar
├── tests/        // Test dosyaları
├── package.json
├── tsconfig.json // TypeScript kullanıyorsanız
├── .gitignore
```


### 3. **Kodunuzu Yazın**
`src/index.ts` dosyasında temel işlevselliği sunmaya başlayabilirsiniz. Örneğin, bir toplama fonksiyonu yazalım:

```typescript
// src/index.ts
export function add(a: number, b: number): number {
  return a + b;
}
```


### 4. **TypeScript ile Library (Opsiyonel)**
TypeScript kullanıyorsanız, bir `tsconfig.json` dosyası eklemeniz gerekecek:

```json
{
  "compilerOptions": {
    "target": "ES6",
    "module": "ES6",
    "declaration": true,
    "outDir": "lib",
    "strict": true
  },
  "include": ["src/**/*"]
}
```


### 5. **Build (Derleme) Yapımı**
Derlemek ve üretim için kullanılabilir hale getirmek için bir `build` script'i ekleyin:

`package.json` içine eklenir:

```json
"scripts": {
  "build": "tsc"
}
```


Derleme komutunu çalıştırın:

```shell script
pnpm build
```


Bu komut `src` içeriğini `lib` klasörüne dönüştürecektir (aynı klasör yapısını oluşturur).

### 6. **Testlerinizi Yazın**
Test etmek için bir test framework ekleyin. Örneğin, **Vitest** kullanabilirsiniz:

```shell script
pnpm add -D vitest
```


Ardından `tests` klasöründe bir test dosyası oluşturun:

```typescript
// tests/add.test.ts
import { describe, it, expect } from "vitest";
import { add } from "../src";

describe("add function", () => {
  it("should add two numbers", () => {
    expect(add(1, 2)).toBe(3);
  });
});
```


### 7. **Library Yayınlama**
Library'nizi paylaşmak için aşağıdaki adımları takip edebilirsiniz:
1. **`package.json` Güncellemesi:**
   - **main**: Derlenmiş dosyanın `main` kısmını belirleyin, örneğin:
```json
"main": "lib/index.js",
     "types": "lib/index.d.ts"
```

2. **NPM İçin Yayınlama:**
   Eğer kendi library’nizi NPM'e yayınlamak istiyorsanız:
   - Önce giriş yapın:
```shell script
npm login
```

   - Ardından yayınlayın:
```shell script
npm publish
```


### 8. **Important Paketler**
Bazı temel bağımlılıklar:
- Derleme: **typescript**, **vite**, veya **rollup**
- Test: **vitest**, **jest**
- Linter: **eslint**, **prettier**

### Örnek `package.json`
```json
{
  "name": "my-library",
  "version": "1.0.0",
  "description": "A modular library",
  "main": "lib/index.js",
  "types": "lib/index.d.ts",
  "scripts": {
    "build": "tsc",
    "test": "vitest run"
  },
  "dependencies": {},
  "devDependencies": {
    "typescript": "^5.6.2",
    "vitest": "^2.1.2"
  }
}
```


### 9. Vite ile Ek Yapılandırma (Opsiyonel)
Eğer modern paketleme için Vite kullanıyorsanız, `vite.config.ts` şöyle yapılandırılabilir:

```typescript
import { defineConfig } from "vite";
import dts from "vite-plugin-dts";

export default defineConfig({
  build: {
    lib: {
      entry: "src/index.ts",
      name: "MyLibrary",
      fileName: "my-library"
    }
  },
  plugins: [dts()]
});
```


Ardından, build:
```shell script
pnpm build
```


Artık projeniz bir **library** haline gelebilir!

## Me
tsconfig.json ve vite.config.ts 'ni açıklar mısın

## AI Assistant
Tabii ki! Hem `tsconfig.json` hem de `vite.config.ts` dosyaları bir projeyi yapılandırmak için kullanılır, ancak farklı amaçlara hizmet eder. Şimdi bunları detaylıca açıklayalım:

---

## 1. **tsconfig.json**

Bu dosya, **TypeScript** derleyicisinin (compiler) nasıl çalışacağını kontrol eden yapılandırma dosyasıdır. Eğer TypeScript kullanıyorsanız, projenizde `tsconfig.json` dosyası mutlaka bulunmalıdır.

### Temel Özellikler
`tsconfig.json`, TypeScript'in neyi, nasıl derlemesi gerektiğini belirler. İşte önemli alanlar:

#### Genel Bir Örnek:
```json
{
  "compilerOptions": {
    "target": "ES6",
    "module": "ES6",
    "declaration": true,
    "outDir": "lib",
    "strict": true,
    "esModuleInterop": true,
    "skipLibCheck": true
  },
  "include": ["src/**/*"],
  "exclude": ["node_modules", "dist"]
}
```


### Önemli `compilerOptions` Ayarları:
1. **`target`**
   - TypeScript kodunun hangi JavaScript versiyonuna çevrileceğini gösterir. Örneğin:
     - `ES5`: Eski tarayıcılar için.
     - `ES6` veya `ESNext`: Modern JavaScript kullanımı.

2. **`module`**
   - Modül sistemini belirtir. Örneğin:
     - `CommonJS`: Node.js projeleri için.
     - `ES6`: Modern JavaScript modül formatı (ESM).

3. **`declaration`**
   - Eğer bu true olarak ayarlanırsa, TypeScript her `.ts` dosyasına karşılık bir `.d.ts` dosyası üretir. Bu, library projelerinde yazılan kodun TypeScript desteği sunabilmesi için önemlidir.

4. **`outDir`**
   - Derlenmiş dosyaların nereye çıkacağını belirtir. Mesela `lib` klasörüne almak için `"outDir": "lib"` yazılır.

5. **`strict`**
   - TypeScript'in tüm katı modlarını (`strictNullChecks`, `noImplicitAny`, vs.) aktif eder.

6. **`esModuleInterop`**
   - CommonJS ve ESM modülleri arasındaki uyumluluğu sağlar (özellikle `import`/`require` senaryolarında işe yarar).

7. **`skipLibCheck`**
   - Kütüphanelerdeki tip tanımlarına bakılmasını devre dışı bırakır. Bu, bazı kütüphanelerdeki (örneğin eski paketlerdeki yanlış yazılmış) hatalar için faydalıdır.

### Diğer Ayarlar:
- **`include` ve `exclude`:**
  - `include`: Hangi dosya/dosya yollarının derleneceğini belirtir.
  - `exclude`: Hangi dosyaların derleme dışı bırakıldığını belirtir (örneğin `node_modules` ve `dist`).

---

## 2. **vite.config.ts**

Bu dosya, bir **Vite** projesinin nasıl yapılandırılacağını kontrol eder. Vite, hızlı bir geliştirme sunucusu ve modern ön uç araç zinciri sağlar. `vite.config.ts` projenizin geliştirme sürecinde (ör. Hot Module Replacement yani HMR) ve derleme aşamasında (build) nasıl davranacağını ayarlar.

### Temel Özellikler
`vite.config.ts` dosyası genellikle bir TypeScript dosyasıdır ve JavaScript dosyalarınızı paketlemek, optimize etmek veya frontend geliştirme için yollar belirler.

#### Genel Bir Örnek:
```typescript
import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
  plugins: [vue()],
  build: {
    lib: {
      entry: "src/index.ts",
      name: "MyLibrary",
      fileName: (format) => `my-library.${format}.js`
    },
    rollupOptions: {
      external: ["vue"], // vue dışarıda bırakılır (external)
      output: {
        globals: {
          vue: "Vue"
        }
      }
    }
  },
  resolve: {
    alias: {
      "@": "/src"
    }
  },
  server: {
    port: 8080,
    open: true
  }
});
```


---

### Önemli Ayarlar:
#### 1. **`plugins`**
   - Vite'in desteklemesi için kullanılacak eklentileri belirtir.
   - Örneğin `@vitejs/plugin-vue` eklentisi, Vue dosyalarını çalıştırmak için kullanılır.

#### 2. **`build`**
   - Üretim ortamındaki derleme ile ilgili ayarları belirler.
   - **`lib`:** Kütüphane (library) olarak çıktıyı optimize etmek için kullanılır.
     - `entry`: Projenizin giriş dosyasını belirtir (örneğin: `src/index.ts`).
     - `name`: Kendi library’nizin global bir ismini belirler (örneğin: `"MyLibrary"`).
     - `fileName`: Derlenen dosyanın ad formatını ayarlamak için kullanılır.
   - **`rollupOptions`:**
     - **`external`:** Belirli bağımlılıkların derlemeye dahil edilmemesi için kullanılır. Örneğin, Vue zaten dışarıda bırakılır çünkü bu tür bağımlılıklar projeye harici olarak eklenir.
     - **`output`:** Uygulamanın çıktısını kontrol eder.
       - `globals`: Harici bağımlılıklar için global değişken isimleri tanımlanır. Örnek: **Vue** için `Vue`.

#### 3. **`resolve`**
   - Kullanılacak dosya yollarını daha kolay hale getirir.
   - Örneğin alias: `@` -> `/src`

#### 4. **`server`**
   - Geliştirme sunucusunu kontrol eder.
     - `port`: Geliştirme sunucusunun çalışacağı port numarasını belirler.
     - `open`: Tarayıcıyı otomatik açmak için `true` yapılabilir.

---

### `tsconfig.json` ile `vite.config.ts` Arasındaki Fark
| **`tsconfig.json`**                                 | **`vite.config.ts`**                           |
|-----------------------------------------------------|-----------------------------------------------|
| **TypeScript** özelinde ayarlar içerir.              | **Vite** yapılandırma ayarlarını içerir.       |
| Hangi dosyaların derleneceğini, hedefi ve modülü belirler.| Derleme süreci ile ilgili yapılandırma sağlar. |
| `include`, `exclude`, `outDir` gibi ayarlar sunar.   | Eklentiler, sunucu portu, dış bağımlılıklar.   |
| TypeScript kodunun JavaScript'e çevrilmesini kontrol eder. | Üretim için optimize edilmiş build'ler sunar. |

Her iki dosya da aynı projede birlikte çalışır. **TypeScript**, kodunuzu yazmanıza ve kontrol etmenize yardımcı olurken, **Vite**, onu hızlı bir şekilde bir tarayıcıya veya build dosyasına hazırlar.

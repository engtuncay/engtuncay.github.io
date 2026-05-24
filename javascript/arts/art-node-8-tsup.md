
Tsup ile TypeScript kütüphanesi oluşturma sürecini ve ayarlarını açıklayan rehber.

# Contents

- [Contents](#contents)
  - [**Tsup Nedir?**](#tsup-nedir)
  - [**Sizin Config Dosyasının Bölümleri**](#sizin-config-dosyasının-bölümleri)
    - [**1. Giriş Noktası (Entry)**](#1-giriş-noktası-entry)
    - [**2. Format Seçenekleri (3 çıktı türü)**](#2-format-seçenekleri-3-çıktı-türü)
    - [**3. Diğer Önemli Ayarlar**](#3-diğer-önemli-ayarlar)
  - [**Minifikasyon Süreci (onSuccess Hook)**](#minifikasyon-süreci-onsuccess-hook)
  - [**Build Çalıştırma**](#build-çalıştırma)
  - [**Kütüphanemi Nasıl Kullanırım?**](#kütüphanemi-nasıl-kullanırım)
  - [**package.json'da Ayarlar**](#packagejsonda-ayarlar)
- [Exports Alanı Nedir ve Neden Önemlidir?](#exports-alanı-nedir-ve-neden-önemlidir)
  - [**Exports Olmadan (Eski Yöntem)**](#exports-olmadan-eski-yöntem)
  - [**Exports İle (Modern Yöntem)**](#exports-i̇le-modern-yöntem)
  - [**Örnekler**](#örnekler)
  - [**Özet**](#özet)
- [Dependencies vs DevDependencies](#dependencies-vs-devdependencies)
    - [**Dependencies** 📦](#dependencies-)
    - [**DevDependencies** 🛠️](#devdependencies-️)
  - [**Sizin Durumunuz (Doğru!)**](#sizin-durumunuz-doğru)
  - [**Hangi Paketi Nereye?**](#hangi-paketi-nereye)
  - [**Neden Önemli?**](#neden-önemli)


User: typescript (tsup) ile library oluşturma hakkında bana bilgi verir misin ?

Evet, sizin tsup.config.ts dosyasını inceledim. TypeScript ile library oluşturma sürecini ve ayarlarını açıklayacağım:

## **Tsup Nedir?**

Tsup, TypeScript projelerini hızlı bir şekilde bundle etmeye yarar. Webpack veya Rollup'tan daha basit ve otomatik bir çözümdür.

---

## **Sizin Config Dosyasının Bölümleri**

### **1. Giriş Noktası (Entry)**
```typescript
entry: { "orak-util-ts": "src/index.ts" }
```
- **index.ts** dosyası kütüphanenizin ana giriş noktasıdır
- `orak-util-ts` çıktı dosyasının adıdır

### **2. Format Seçenekleri (3 çıktı türü)**
```typescript
format: ["cjs", "esm", "iife"]
```
- **ESM** (ES Module): Modern JavaScript (orak-util-ts.js)
  - Import/export söz dizimi
  - Tree-shaking destekler (kullanılmayan kodu çıkarır)
  
- **CJS** (CommonJS): Node.js için (orak-util-ts.cjs)
  - `require()` ile kullanılır
  
- **IIFE** (Immediately Invoked Function Expression): Tarayıcı için (orak-util-ts.global.js)
  - `<script>` tagıyla doğrudan yüklenebilir
  - Global `OrakUtilTs` objesi oluşturur

### **3. Diğer Önemli Ayarlar**
| Ayar                       | Açıklama                                       |
|----------------------------|------------------------------------------------|
| `globalName: "OrakUtilTs"` | IIFE formatında global değişken adı            |
| `dts: true`                | TypeScript tip tanımları dosyası oluştur       |
| `minify: false`            | Tsup'ın minify'ını kapat (Terser kullanacağız) |
| `clean: true`              | Build öncesi dist klasörünü temizle            |
| `outDir: "dist"`           | Çıktı dosyaları dizini                         |

---

## **Minifikasyon Süreci (onSuccess Hook)**

```typescript
async onSuccess() {
    const files = [
        "dist/orak-util-ts.global.js",
        "dist/orak-util-ts.cjs",
        "dist/orak-util-ts.js",
    ];
    // Her dosyayı Terser ile minify et
}
```

**Neden böyle yapılıyor?**
- Build başarılı olduktan sonra tetiklenir
- Terser'in daha gelişmiş minifikasyon seçenekleri kullanılır
- Sınıf ve fonksiyon isimlerini koru (`keep_classnames`, `keep_fnames`)

---

## **Build Çalıştırma**

```bash
npm run build
# veya
pnpm build
```

**Çıktı (dist klasöründe):**
```
dist/
├── orak-util-ts.js          (ESM - modern)
├── orak-util-ts.cjs         (CommonJS - Node.js)
├── orak-util-ts.global.js   (IIFE - tarayıcı)
├── orak-util-ts.d.ts        (TypeScript tipleri)
└── package.json             (exports tanımı)
```

---

## **Kütüphanemi Nasıl Kullanırım?**

**Node.js (ESM):**
```typescript
import { FiCol, FiMeta } from "orak-util-ts";
```

**Node.js (CommonJS):**
```javascript
const { FiCol, FiMeta } = require("orak-util-ts");
```

**Tarayıcı:**
```html
<script src="dist/orak-util-ts.global.js"></script>
<script>
  const { FiCol, FiMeta } = window.OrakUtilTs;
</script>
```

---

## **package.json'da Ayarlar**

Kütüphanenizi yayımlamak için package.json'da olması gerekenler:

```json
{
  "name": "@oraksoft/orak-util-ts",
  "version": "1.0.0",
  "exports": {
    ".": {
      "import": "./dist/orak-util-ts.js",
      "require": "./dist/orak-util-ts.cjs",
      "types": "./dist/orak-util-ts.d.ts"
    }
  },
  "main": "./dist/orak-util-ts.cjs",
  "module": "./dist/orak-util-ts.js",
  "types": "./dist/orak-util-ts.d.ts",
  "files": ["dist"]
}
```

Başka sorularınız varsa sorabilirsiniz! 🚀

# Exports Alanı Nedir ve Neden Önemlidir?

`exports` alanı, paketinizi **doğru dosyaya yönlendirir**. Kullanıcının ortamına göre otomatik olarak hangi dosyayı alacağını belirler:

## **Exports Olmadan (Eski Yöntem)**

```json
"main": "dist/orak-util-ts.cjs"
"module": "dist/orak-util-ts.js"
```

- Bundler'lar (Webpack, Vite) `module` alanını okuyabilir mi, okuyamaz mı belli değil
- Bazı araçlar yanlış dosya kullanabilir
- Tip tanımı yolu açık değil

---

## **Exports İle (Modern Yöntem)**

```json
"exports": {
  ".": {
    "import": "./dist/orak-util-ts.js",
    "require": "./dist/orak-util-ts.cjs",
    "types": "./dist/orak-util-ts.d.ts"
  }
}
```

Paketinizi kullanan kişi ne yapsa:

| Durum | Dosya |
|-------|-------|
| **`import`** kullanırsa | → `orak-util-ts.js` (ESM) |
| **`require()`** kullanırsa | → `orak-util-ts.cjs` (CommonJS) |
| **TypeScript** ise | → `orak-util-ts.d.ts` (Tip tanımları) |

---

## **Örnekler**

**Proje A (Vite + ESM):**
```typescript
import { FiCol } from "orak-util-ts";
// → orak-util-ts.js dosyasını alır (tree-shakeable)
```

**Proje B (Node.js + CommonJS):**
```javascript
const { FiCol } = require("orak-util-ts");
// → orak-util-ts.cjs dosyasını alır
```

**VS Code IntelliSense:**
```typescript
import { FiCol } from "orak-util-ts";
// → orak-util-ts.d.ts dosyasından tipleri okur
```

---

## **Özet**

`exports` **her kullanıcıya en doğru dosya verir** ve paketinizin:
- ✅ Modern (ESM)
- ✅ Klasik (CommonJS)  
- ✅ TypeScript destekli

olmasını garantiler.

# Dependencies vs DevDependencies

Library projesinde dependencies ve devDependencies ne için kullanılır ? kütüphane içinde kullandıklarımı dependencies içine mi almalıyım ?


### **Dependencies** 📦
Kütüphanenizin **çalışması için gerekli** paketler. Son kullanıcı paketi kurunca **otomatik indirilir**.

```bash
pnpm install orak-util-ts
# → axios da indirilir
```

### **DevDependencies** 🛠️
**Sadece geliştirme sırasında** gerekli paketler. Son kullanıcıya gitmez.

```bash
pnpm install orak-util-ts
# → tsup, vitest, typescript, terser İNDİRİLMEZ
```

---

## **Sizin Durumunuz (Doğru!)**

```json
"dependencies": {
  "axios": "^1.8.4"              // ✅ Kütüphane axios kullanıyor
},
"devDependencies": {
  "terser": "^5.39.0",           // ✅ Build tool
  "tsup": "^8.3.0",              // ✅ Build tool
  "typescript": "^5.2.2",        // ✅ Derleyici
  "vitest": "^2.1.2"             // ✅ Test tool
}
```

---

## **Hangi Paketi Nereye?**

| Paket          | Dependencies | DevDependencies |
|----------------|--------------|-----------------|
| **axios**      | ✅            | ❌               |
| **lodash**     | ✅            | ❌               |
| **date-fns**   | ✅            | ❌               |
| **tsup**       | ❌            | ✅               |
| **typescript** | ❌            | ✅               |
| **vitest**     | ❌            | ✅               |
| **eslint**     | ❌            | ✅               |
| **prettier**   | ❌            | ✅               |

**Kural:** Kodunuzda **`import`** ettiğiniz paketler → `dependencies`  
Sadece **build/test/linting** için kullanılan paketler → `devDependencies`

---

## **Neden Önemli?**

Eğer axios'u yanlışlıkla devDependencies'e koyarsanız:

```json
"devDependencies": {
  "axios": "^1.8.4"  // ❌ YANLIŞ
}
```

Son kullanıcı paketinizi kurunca:
```bash
pnpm install orak-util-ts
# → axios İNDİRİLMEZ
# → Kodunuz çalışmaz! 💥
```



<h5>Brief Guide for tsconfig.json</h5> 

- [Örnek tsconfig.json dosyasının satır satır açıklaması](#örnek-tsconfigjson-dosyasının-satır-satır-açıklaması)
- [Her ts dosyasının olduğu yerde js dosyası oluşturma](#her-ts-dosyasının-olduğu-yerde-js-dosyası-oluşturma)
- [declaration, declarationMap ve sourceMap](#declaration-declarationmap-ve-sourcemap)
- [dist klasörüne ekstra dosya ve klasörler eklemek](#dist-klasörüne-ekstra-dosya-ve-klasörler-eklemek)
- [target ve module alanları](#target-ve-module-alanları)
- [module değerleri](#module-değerleri)
- [Seçim Önerileri](#seçim-önerileri)
- [moduleResolution](#moduleresolution)
- [ES2015 ile EsNext arasında farklar](#es2015-ile-esnext-arasında-farklar)
- [lib alanı](#lib-alanı)
- [tsup.config.ts](#tsupconfigts)
- [tsup.config example 2](#tsupconfig-example-2)


## Örnek tsconfig.json dosyasının satır satır açıklaması

```json
{
  "compilerOptions": {
    "target": "ES2020",
    "module": "ESNext",
    "moduleResolution": "bundler",
    "lib": ["ES2020"],
    "esModuleInterop": true,
    "types": ["node"],
    "declaration": true,
    "declarationMap": true,
    "sourceMap": true,
    "outDir": "./dist",
    "rootDir": "./entegre_node",
    "strict": true,
    "skipLibCheck": true,
    "forceConsistentCasingInFileNames": true,
    "resolveJsonModule": true
  },
  "include": ["entegre_node/**/*.ts"],
  "exclude": ["node_modules", "dist", "logs"]
}

```

GitHub Copilot: # tsconfig.json Açıklaması

Satır satır açıklamalar:

➖ compilerOptions (TypeScript Derleyici Seçenekleri)

- `"target": "ES2020"` | TypeScript kodunun ES2020 JavaScript standardına derlenecek 
- `"module": "ESNext"` | Modern ES modülü formatı kullanılacak (import/export) 
- `"moduleResolution": "bundler"` | Modül çözümlemesi için bundler stratejisi (webpack, vite gibi araçlarla uyumlu)
- `"lib": ["ES2020"]` | Derleme sırasında ES2020 kütüphanelerinin tip tanımları kullanılacak 
- `"esModuleInterop": true` | CommonJS modüleriyle ES modüllerinin uyumluluğu sağlanacak 
- `"types": ["node"]` | Node.js tipleri otomatik olarak dahil edilecek 
- `"declaration": true` | Her `.ts` dosyası için `.d.ts` (tip tanım) dosyası oluşturulacak 
- `"declarationMap": true` | `.d.ts.map` dosyaları oluşturulacak (kaynak dosyaya geri izleme) 
- `"sourceMap": true` | `.js.map` dosyaları oluşturulacak (debug sırasında orijinal TS kodunu görmek için) 
- `"outDir": "./dist"` | Derlenmiş `.js` dosyaları dist klasörüne yazılacak 
- `"rootDir": "./entegre_node"` | Kaynak dosyaların kök dizini (derlenmesi gereken TypeScript dosyaları buradan alınacak) 
- `"strict": true"` | Katı tip kontrolü etkin (daha güvenli kod) |
- `"skipLibCheck": true` | `.d.ts` dosyalarının tip kontrolü atlanacak (derleme hızı artar) |
- `"forceConsistentCasingInFileNames": true` | Dosya adlarında harf büyüklüğü tutarlılığı zorunlu kılınacak |
- `"resolveJsonModule": true` | `.json` dosyaları modül olarak import edilebilecek |


➖ include & exclude (Dosya Seçimi)

- `"include": ["entegre_node/**/*.ts"]` | entegre_node klasörü altındaki tüm `.ts` dosyaları derlenmesi için işaretlenir |
- `"exclude": ["node_modules", "dist", "logs"]` | Bu klasörler derlenmeyecek |

**Özet:** Bu konfigürasyon modern TypeScript projesi için optimize edilmiş, ES2020 hedefli, sıkı tip kontrollü ve npm paketleri oluşturmak için (`declaration: true`) hazırlanmış bir ayardır.


## Her ts dosyasının olduğu yerde js dosyası oluşturma

TypeScript derleyicisinin (tsc) her TypeScript (.ts) dosyasını kendi bulunduğu dizinde JavaScript (.js) dosyasına çevirmesi için tsconfig.json dosyasında aşağıdaki ayarları yapmalısınız:

1. outDir ayarını kaldırın veya belirtmeyin. (outDir varsa, derlenmiş dosyalar tek bir klasöre gider.)
2. rootDir ayarını kaldırın veya belirtmeyin. (rootDir varsa, kaynak dosyalarınızın kökünü belirler.)
3. tsconfig.json dosyanızda aşağıdaki gibi olmalı:

```json
{
  "compilerOptions": {
    "target": "ES2020",
    "module": "ESNext",
    "moduleResolution": "bundler",
    "lib": ["ES2020"],
    "strict": true,
    "esModuleInterop": true,
    "skipLibCheck": true,
    "forceConsistentCasingInFileNames": true,
    "resolveJsonModule": true,
    "declaration": true,
    "declarationMap": true,
    "sourceMap": true,
    "types": ["node"]
  },
  "include": ["entegre_node/**/*.ts"],
  "exclude": ["node_modules", "dist", "logs"]
}
```

Bu şekilde, tsc her .ts dosyasının yanına aynı isimde .js dosyası oluşturur.  

Kısacası: `outDir ve rootDir` olmamalı veya kaldırılmalı.

## declaration, declarationMap ve sourceMap

TypeScript’te:

➖ declaration: true  

Bu ayar, her .ts dosyası için bir .d.ts (declaration, tip bildirim) dosyası üretir. Bu dosyalar, JavaScript çıktısının yanında, TypeScript tip bilgisini dışa aktarır. Özellikle kütüphane geliştirirken, başkalarının sizin kodunuzun tiplerini kullanabilmesi için gereklidir.

➖ declarationMap: true  

Bu ayar, .d.ts dosyaları için harita (source map) dosyası (.d.ts.map) üretir. Böylece, `tip bildirim dosyasında bir tipin nereden geldiğini`, orijinal TypeScript dosyasına kolayca izleyebilirsiniz. Özellikle büyük projelerde ve IDE desteğinde faydalıdır.

Özetle:
- declaration: .d.ts dosyası üretir (tip bilgisini dışa açar)
- declarationMap: .d.ts dosyası ile orijinal kaynak arasında bağlantı kurar (debug ve IDE için)
  
➖ sourceMap: true 

Bu ayarı, her derlenen .js dosyası için bir .js.map dosyası üretir. Bu dosya, derlenmiş JavaScript kodunu orijinal TypeScript koduna eşler.

- Hata ayıklama (debugging) sırasında, tarayıcı veya IDE, .js dosyasındaki bir hatanın aslında hangi .ts satırında olduğunu gösterir.
- Kodunuzu derledikten sonra bile, orijinal TypeScript dosyalarınız üzerinden hata ayıklayabilirsiniz.
- Özellikle büyük projelerde, hata bulmayı ve kod takibini çok kolaylaştırır.

Kısacası: sourceMap, derlenmiş kod ile kaynak kod arasında köprü kurar ve hata ayıklamayı kolaylaştırır.


## dist klasörüne ekstra dosya ve klasörler eklemek

Evet, TypeScript derlemesiyle dist klasörüne ek olarak başka dosya veya klasörler de kopyalamak mümkündür, fakat TypeScript derleyicisi (tsc) sadece .ts dosyalarını derler ve kopyalar. Diğer dosya ve klasörleri (örneğin .json, .env, statik dosyalar) dist klasörüne eklemek için genellikle ek araçlar veya scriptler kullanılır.

Yaygın yöntemler:

1. package.json içinde bir script ile kopyalama:
- Örneğin, npm paketlerinden cp, cpy, veya robocopy (Windows) kullanabilirsiniz. Örnek script:

```json
"scripts": {
  "build": "tsc && npm run copy-files",
  "copy-files": "cpy \"entegre_node/**/*.json\" dist --parents"
}
```
- Windows için:

```json
"copy-files": "robocopy entegre_node dist *.json /S"
```

1. Ek araçlar:
   - npm paketleri: cpy, copyfiles, fs-extra gibi araçlar ile dosya ve klasörleri dist’e kopyalayabilirsiniz.

2. tsc’nin include/exclude ayarları:
   - Sadece TypeScript dosyalarını etkiler, diğer dosyaları kopyalamaz.

## target ve module alanları

Tsconfig.json dosyasındaki bu iki ayar, TypeScript kodunun nasıl derleneceğini kontrol eder:

➖ `target: "ES2020"`

TypeScript kodunuzun `hangi JavaScript sürümüne derlenecağini` belirtir.
- **ES2020** = ECMAScript 2020 (ES11) standardına göre derle
- Bu, `async/await`, `nullish coalescing (??)`  ve `optional chaining (?.)` gibi modern JavaScript özelliklerini kullanabileceğiniz anlamına gelir
- Daha eski tarayıcıları desteklemeniz gerekirse, `target` değerini `ES2015` veya `ES2018` gibi daha düşük bir sürüme ayarlayabilirsiniz

➖ `module: "node16"`

Derlenmiş JavaScript kodunun `modülleri nasıl yükleyeceğini` belirtir.

- **node16** = Node.js 16+ için CommonJS ve ES modules desteğini kullanır
- TypeScript, import/export ifadelerini uygun şekilde çevirir
- Node.js ortamında (`entegre-node` gibi projelerde) ve modern paket yöneticileriyle (pnpm) uyumlu olup, hem `.cjs` hem de `.mjs` dosyalarını doğru şekilde işler

**Özet:** Bu ayarlar, kodunuzun modern JavaScript özellikleri kullanarak yazılıp, Node.js 16+ ortamında çalışması için optimize edildiğini gösterir.

🔔 Kullanılabilecek diğer değerler 

➖ `target` Değerleri

TypeScript hangi JavaScript sürümüne derlenecek:

| Değer            | Açıklama                                                 |
| ---------------- | -------------------------------------------------------- |
| `ES3`            | İlk JavaScript standardı (eski tarayıcılar)              |
| `ES5`            | IE9+ için uyumlu                                         |
| `ES2015` / `ES6` | Modern JavaScript özelliği (const, let, arrow functions) |
| `ES2016` / `ES7` | Async/await desteği                                      |
| `ES2017`         | Daha fazla async/await iyileştirmesi                     |
| `ES2018`         | `...` spread operator                                    |
| `ES2019`         | `Array.flat()`, `String.trimStart()`                     |
| `ES2020`         | `??` (nullish coalescing), `?.` (optional chaining)      |
| `ES2021`         | `??=`, `&&=`, `\|\|=` logical assignment operators       |
| `ES2022`         | Class fields, private methods, static blocks             |
| `ESNext`         | En son ve gelecek özellikleri (unstable)                 |

## module değerleri

Modüller nasıl yüklenecek: (import ve export nasıl yapacak)

| Değer            | Açıklama                                                                    |
| ---------------- | --------------------------------------------------------------------------- |
| `CommonJS`       | Node.js `require()` sistemi                                                 |
| `ES6` / `ES2015` | Standard `import/export`                                                    |
| `ESNext`         | En son modül standardı                                                      |
| `UMD`            | Browser ve Node.js uyumlu                                                   |
| `AMD`            | Eski web standartı (RequireJS)                                              |
| `System`         | SystemJS modül yükleyici                                                    |
| `Node16`         | Node.js 16+ için dual package (`.ts` dosyalarından `.cjs` ve `.mjs` üretir) |

## Seçim Önerileri

- **Web uygulaması** → `target: "ES2015"` veya `ES2020`, `module: "ES2015"`
- **Node.js 14+** → `target: "ES2020"`, `module: "CommonJS"`
- **Modern Node.js 16+** → `target: "ES2020"`, `module: "node16"` ✓ (Mevcut ayarınız)
- **Browser compatibility** → `target: "ES5"`, `module: "UMD"`


## moduleResolution 

`moduleResolution` nedir? (modül çözümlendirme)

TypeScript'e `bir modülü import ettiğinde, o modül dosyasını nasıl bulacağını` söyleyen ayardır.

Yani `import { foo } from "bar"` yazdığında TS, bar'ın yerini bu ayara göre arar.

🔔 Seçenekler

➖ node (klasik, eski)

Node.js'in CommonJS algoritmasını taklit eder.

```
node_modules/bar/index.js
node_modules/bar/package.json → "main" alanına bakar

```

Eski projeler, CJS tabanlı yapılar için uygundur.
exports alanını okumaz → modern paketlerle sorun çıkarabilir.


➖ bundler ⭐ (modern, önerilen)

Vite, esbuild, Webpack gibi `bundler kullanan projeler` için tasarlanmıştır.

`package.json → "exports"` alanını okur

`moduleResolution: "bundler" + module: "ESNext"` kombinasyonu SolidJS/Vite projelerinde standarttır.

Uzantısız importlara izin verir (`import Foo from "./Foo"` — bundler halleder).

➖ node16 / nodenext

Node.js'in `ESM modül sistemi` için kullanılır.

- package.json "exports" alanını okur.
- Zorunlu uzantı ister: `import Foo from "./Foo.js"` gibi yazman gerekir.
- `Saf Node.js ESM` projelerinde (bundler yok) tercih edilir.


➖ classic (çok eski, kullanma)

TypeScript'in kendi eski algoritması. node_modules'a bile düzgün bakmaz. Sadece legacy kodda kalıntı olarak görürsün.

🔔 Hangi projeye ne?

Proje tipi | Öneri :

- Vite / SolidJS / React | bundler
- Next.js | bundler veya node16
- Saf Node.js ESM | node16 / nodenext
- Eski CJS projesi | node

Tipik `Vite + SolidJS` için tsconfig örneği

```json
json{
  "compilerOptions": {
    "target": "ESNext",
    "module": "ESNext",
    "moduleResolution": "bundler",
    "strict": true
  }
}

```

Kısacası: bundler kullanıyorsan → "bundler", saf Node.js ESM → "node16", başka şeye ihtiyacın yok.

📝 bundler yöntemi `import Foo from "./Foo.js"` yerine `import Foo from "./Foo"` şeklinde yazmamızı sağlar.

bundler modunda TypeScript uzantısız yazımı kabul eder çünkü "zaten bir bundler var, o halleder" diye varsayar. Vite, esbuild vs. uzantısız importu kendi başına çözümlüyor zaten.

`node16 / nodenext` modunda ise Node.js ESM spec'i birebir taklit edildiği için .js uzantısını sen yazman zorunlu — bundler yok, Node doğrudan dosyaya bakıyor.

Yani fark şu:

```ts
// bundler → geçerli ✅

import Foo from "./Foo"

// node16 → hata ❌, şöyle yazman lazım:
import Foo from "./Foo.js"

```

Pratik özet: `Vite` kullanıyorsan bundler seç, uzantı yazmakla uğraşma.

📝 tsup da bir bundler'dır.

tsup — esbuild'in üzerine kurulmuş, npm kütüphaneleri yapmak için optimize edilmiş hafif bir bundler'dır.

Bundler özellikleri:

✅ Kodu bundle ediyor (ESM, CJS, IIFE formatlarında)
✅ Tree-shaking yapıyor
✅ Minification desteği
✅ Multiple entry points
✅ Source maps
✅ TypeScript native desteği

- tsup.config.ts - bundler konfigürasyonu
- mouleResolution: "bundler" - bundler uyumlu modül çözümleme

📝 moduleResolution'da bundler veya node16 veya nodenext kullanmak neyi değiştirir ?

İşte farklar:

| Seçenek | Kullanım Alanı | Özellikleri |
|---------|---------------|-----------|
| **bundler** | Vite, Webpack 5+, esbuild gibi modern bundler'lar | Paket çözümlemesi en esnektir; ES modules prioritesi |
| **node16** | Node.js 16+ ile ESM desteği | package.json'daki `exports` alanını respektler |
| **nodenext** | En yeni Node.js sürümlerine göre | `node16`'dan daha yeni ve daha esnek |

**Sizin durumunuzda:**
- **tsup.config.ts** çalıştırmak için → `node` veya `nodenext` kullanmalı
- **`bundler`** olursa Node.js built-in modülleri (`fs`, `path` vb.) zor bulabilir

tsup.config.ts bir Node.js config dosyası olduğu için **`nodenext`** en iyidir:

```json
"moduleResolution": "nodenext"
```

Bu, tsup konfigürasyonunun Node.js modüllerini doğru şekilde çözmesini sağlar.

📝 import yazımında değişim olur mu ?

**`moduleResolution` import yazımını doğrudan değiştirmez**, ama modüllerin **nasıl çözüldüğünü** değiştirir. Farklılık package.json'da `exports` alanı varsa ortaya çıkar:

```json
// package.json örneği
"exports": {
  ".": "./dist/index.js",
  "./utils": "./dist/utils.js"
}
```

➖ import yazımı farkları:

| Durum | bundler | node16 / nodenext |
|-------|---------|------------------|
| `import { x } from "mypackage"` | ✅ Çalışır | ✅ Çalışır |
| `import { x } from "mypackage/utils"` | ✅ Çalışır | ✅ Çalışır |
| `import { x } from "mypackage/dist/index.js"` | ✅ Çalışır | ❌ **Hata** (exports'ta yok) |

**Özet:**
- **bundler**: Daha esnek, node_modules içindeki dosyaları doğrudan import edebilirsin
- **node16 / nodenext**: Katı, **sadece** `exports`'ta tanımlanmış yolları kabul eder

Sizin durumunuzda tsup.config.ts'nin Node.js modüllerini (`fs`, `terser`) doğru bulması için **`nodenext`** idealdir.

## ES2015 ile EsNext arasında farklar

Önemli farklar şunlardır:

* ES2015 (ES6)

module: "ES2015" seçeneği, TypeScript'in çıktısını sadece ES6 modül sözdizimini destekleyen bir formata derler. Yani:

- import / export ifadeleri korunur
- ES6 sonrasında gelen modül özellikleri (dynamic import(), import.meta gibi) dönüştürülmez veya desteklenmez
- Hedef: 2015 standardını tam destekleyen ortamlar

* ESNext
module: "ESNext" ise TypeScript'in her zaman en güncel ECMAScript modül standardını hedefler. Şu anki farkları:

Özellik | ES2015 | ESNext :

- import() dynamic import | ❌ | ✅
- import.meta | ❌ | ✅
- Top-level await | ❌ | ✅ 
- (ES2022+)import assertions | ❌ | ✅

🔔 Pratikte Ne Seçmeli? (module olarak)

- Vite, modern bundler veya Node 18+ kullanıyorsan → `ESNext` tercih et. 

Bundler zaten gerekli dönüşümleri yapacağı için en geniş özellik setine sahip olmak avantajlıdır.

- Doğrudan tarayıcıya veya eski ortama göndereceksen → `ES2015` 

Daha güvenli olabilir, ama bu senaryoda zaten target değeri daha belirleyici rol oynar.

Önemli not: module değeri output modül formatını, target değeri ise JavaScript sözdizimini (arrow function, class vs.) kontrol eder. İkisi birbirinden bağımsızdır.

SolidJS/Vite projende kullanıyorsan `ESNext` doğru seçim - Vite zaten bunu bekler.

## lib alanı 

TypeScript'e "hangi ortamın built-in API'larını tanıyorsun?" diye söylersin. Yani `document, Promise, fetch, Array.prototype.map` gibi şeylerin `tip tanımlarını` hangi kütüphanelerden alacağını belirtir.

Bunu yazmazsan TS, `target`'a göre varsayılan bir set seçer.

Mantığı

```ts
document.getElementById("app") //← bu "DOM" lib'inden geliyor
Promise.resolve()              //← bu "ES2015" lib'inden geliyor
fetch("/api")                  //← bu "DOM" lib'inden geliyor

```

Eğer ilgili lib yoksa TS `"Cannot find name 'document'"` gibi hata verir — kodun çalışıp çalışmamasıyla alakası yok, sadece `tip sistemi` için.

➖ Başlıca seçenekler

ES sürümleri

Değer	İçerik
- ES5	| Temel JS
- ES2015 / ES6	| Promise, Map, Set, Symbol...
- ES2016	| Array.includes...
- ES2017	| async/await tipleri, Object.entries...
- ES2018	| Rest/spread, async iteration...
- ES2020	| BigInt, optional chaining...
- ES2022	| Array.at, Object.hasOwn...
- ESNext	| En güncel, henüz kararlı olmayan özellikler dahil

Bunları tek tek yazmak yerine ES2022 yazarsan altındaki her şeyi de kapsar.

➖ Ortam lib'leri

Değer	| Ne zaman :

- DOM |	Tarayıcı projesi — document, window, fetch...
- DOM.Iterable	| NodeList gibi DOM koleksiyonlarını for...of ile dolaşmak için
- WebWorker	| Web Worker ortamı

➖ Özel lib'ler

Değer	| Ne zaman :

- ESNext.Decorators	| Decorator kullanıyorsan
- ESNext.Disposable	| using keyword (yeni)

🔔 Tipik kombinasyonlar

Vite + SolidJS / React (tarayıcı):

```json
"lib": ["ES2020", "DOM", "DOM.Iterable"]

```

Node.js backend (tarayıcı API'ı yok):

```json
"lib": ["ES2022"]

```

> Node projelerinde DOM ekleme — document gibi şeyleri yanlışlıkla kullanırsın, hata görmezsin.

`target` ile ilişkisi: lib yazmazsan TS, 
`target: "ES2020"` → `lib: ["ES2020", "DOM"]` gibi varsayılan seçer. 
Ama açıkça yazman her zaman daha güvenli.

## tsup.config.ts 

tsup.config.ts, bu TypeScript projesinin **build konfigürasyon** dosyasıdır. Tsup, TypeScript kodunu JavaScript'e derleyen ve bundle eden bir araçtır.

```js
import { defineConfig } from 'tsup';

export default defineConfig({
  entry: ['src/index.ts'],
  format: ['esm', 'cjs'],
  dts: true,
  sourcemap: false,
  clean: true,
  outDir: 'dist',
});

```

Bu ayarlar şunları yapıyor:

| Ayar | Anlamı :

-  `entry: ['src/index.ts']` | Derlemeye index.ts dosyasından başlar 
-  `format: ['esm', 'cjs']` | Hem ES Module hem CommonJS formatlarında çıktı üretir 
-  `dts: true` | TypeScript type definition dosyaları (`.d.ts`) oluşturur 
- `sourcemap: false` | Debug için sourcemap dosyaları oluşturmaz 
-  `clean: true` | Her build'den önce dist klasörünü temizler 
-  `outDir: 'dist'` | Derlenmiş dosyaları dist klasörüne koyar 

**Kısaca**: Proje build edildiğinde, index.ts içindeki TypeScript kodu dist klasörüne ES Module ve CommonJS formatlarında derlenmiş JavaScript dosyaları olarak çıktı verir.

## tsup.config example 2

```js
import { defineConfig } from "tsup";
import { minify } from "terser";
//import fs from "fs/promises";
import { promises as fs } from "fs";
//alternatif tanımlama
//import { promises as fs } from "fs";

export default defineConfig([
    {
        entry: { "orak-util-ts": "src/index.ts" },
        format: ["cjs", "esm", "iife"],
        globalName: "OrakUtilTs",
        dts: true,
        minify: false, // `tsup`'un minify işlemini kapatıyoruz
        clean: true,
        outDir: "dist",
        async onSuccess() {
            const files = [
                "dist/orak-util-ts.global.js",
                "dist/orak-util-ts.cjs",
                "dist/orak-util-ts.js",
            ];

            for (const file of files) {
                try {
                    let code = await fs.readFile(file, "utf8");

                    // Terser ile minify işlemi yapıyoruz
                    let result = await minify(code, {
                        compress: true,
                        mangle: {
                            keep_classnames: true, // Sınıf isimlerini koru
                            keep_fnames: true, // Fonksiyon isimlerini koru
                        },
                    });

                    // Minify edilmiş dosyayı yazıyoruz
                    await fs.writeFile(file, result.code, "utf8");
                    console.log(`✅ ${file} minify edildi.`);
                } catch (error) {
                    console.error(`❌ Minify işlemi başarısız: ${file}`, error);
                }
            }
        },
    },
]);

```

Bu config dosyası **daha ileri bir kurulum**. Adım adım açıklayalım:

➖ Ana Konfigürasyon

```typescript
entry: { "orak-util-ts": "src/index.ts" }
```
- Giriş dosyası: index.ts
- Çıktı dosyasının adı: `orak-util-ts`

```typescript
format: ["cjs", "esm", "iife"]
```
- **3 format** oluşturur:
  - `cjs` - CommonJS (Node.js)
  - `esm` - ES Module
  - `iife` - Tarayıcıda global variable olarak kullanılabilir

```typescript
globalName: "OrakUtilTs"
```
- IIFE formatında global variable adı: `window.OrakUtilTs` (tarayıcıda)

➖ Özel İşlem: `onSuccess` Hook'u

Build başarılı olduktan sonra **ekstra minify** işlemi yapıyor:

1. **Üç dosyayı işler:**
   - orak-util-ts.global.js (IIFE formatı)
   - orak-util-ts.cjs (CommonJS)
   - orak-util-ts.js (ES Module)

2. **Her dosya için:**
   - Dosyayı oku
   - **Terser** kütüphanesiyle minify et
   - Sınıf ve fonksiyon isimlerini **koru** (debugging için)
   - Minify edilmiş kodu üzerine yaz

3. **Sonuç mesajı:** Başarılı ✅ veya hatalı ❌ durumunu göster

**Kısaca:** Tsup normal build yapıyor, sonra `onSuccess` hook'u Terser ile daha agresif minify işlemi uygulayıp dosyaları daha da küçültüyor.


# emitDeclarationOnly

**`emitDeclarationOnly": true`** anlamı:

TypeScript derleyicisine sadece **`.d.ts` (type declaration) dosyaları** üretmesini, JavaScript (`.js`) dosyaları üretmemesini söyler.

TypeScript derleyicisi varsayılan olarak .d.ts üretmez. Bunun için gerekli:

- "declaration": true → TypeScript'e .d.ts üretmesini söyler
- "emitDeclarationOnly": true → TypeScript'e SADECE .d.ts üret, .js üretme söyler

**Özellikleri:**
- 📄 **Çıktı**: Sadece TypeScript tip tanımlarını içeren `.d.ts` dosyaları oluşturur
- ❌ **Dışlama**: JavaScript dosyalarını (dist klasörüne) yazmaz
- ✅ **Kontrol**: Yine de TypeScript'i çalıştırır ve tip hatalarını kontrol eder

**Neden kullanılır:**
1. **Kütüphane geliştirme**: TypeScript yazıp, başka bir araçla (esbuild, swc, Babel vb.) derlenmek üzere hazırlama
2. **Sadece tipler sağlamak**: Kullanıcılara tip desteği sunmak ama JavaScript derlemeyi başka yerde yapma
3. **Build pipeline**: Derleme işlemini bölüştürmek


➖ "noEmit": true ne anlama gelir

TypeScript derleyicisine **JavaScript çıktı dosyaları oluşturmamasını** söyler.

**Ne yapar:**
- TypeScript kodunuzu yine de ayrıştırır ve tip kontrolü yapar
- Hata ve uyarıları gösterir
- Ancak `.js` dosyaları oluşturmaz

**Kullanım senaryoları:**
- Sadece tip kontrolü ve doğrulama istediğinizde
- Başka bir araç (esbuild, tsup, webpack vb.) derlemeden sorumlu olacaksa
- Geliştirme ortamında hızlı feedback istediğinizde

Bu projede (`orak-util-node`) tsup (bundler) zaten derlemeden sorumlu, bu yüzden TypeScript derleyicisinin çıktı oluşturmasına gerek yok. Derleyici sadece tür denetlemesi yapar.

## TypeScript derleyicisi (tsc vs tsup)

TypeScript derleyicisi `tsc` komutu ile çalıştırılır.

`tsup`, TypeScript'i derleyen bir bundler'dır. İçinde TypeScript derleyicisini kullanır.

**Doğrudan tsc kullanmak isterseniz:**

```bash
tsc
```

Ama bu projede `noEmit: true` olduğu için `tsc` herhangi bir dosya oluşturmaz. Sadece tür denetlemesi yapar. Asıl derleme tsup tarafından yapılır.

**tsc vs tsup:**
- `tsc`: Sadece TypeScript → JavaScript dönüşümü
- `tsup`: TypeScript derlemesi + bundling (paketleme) + minification

## Hata Çözümlemeleri

### Cannot find name 'fs' hatası 

Sorun tsconfig.json'da. include ayarı sadece entegre_node/**/*.ts dosyalarını dahil ediyor, ama tsup.config.ts kök klasörde. Bunu düzeltmeliyim:

Tamam! `tsconfig.json`'da *.config.ts dosyalarını include array'ine ekledim. Artık tsup.config.ts dosyası TypeScript compilation'a dahil olacak ve fs hatasını vermeyecek.

```json
  "include": ["entegre_node/**/*.ts", "*.config.ts"],

```
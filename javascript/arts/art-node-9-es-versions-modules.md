
- [EcmaScript Versiyonları](#ecmascript-versiyonları)
  - [1. **ECMAScript 1 (ES1) – 1997**](#1-ecmascript-1-es1--1997)
  - [2. **ECMAScript 2 (ES2) – 1998**](#2-ecmascript-2-es2--1998)
  - [3. **ECMAScript 3 (ES3) – 1999**](#3-ecmascript-3-es3--1999)
  - [4. **ECMAScript 4 (İptal Edildi)**](#4-ecmascript-4-i̇ptal-edildi)
  - [5. **ECMAScript 5 (ES5) – 2009**](#5-ecmascript-5-es5--2009)
  - [6. **ECMAScript 6 (ES6 / ES2015) – 2015**](#6-ecmascript-6-es6--es2015--2015)
  - [7. **ECMAScript 2016 (ES7 / ES2016)**](#7-ecmascript-2016-es7--es2016)
  - [8. **ECMAScript 2017 (ES8 / ES2017)**](#8-ecmascript-2017-es8--es2017)
  - [9. **ECMAScript 2018 (ES9 / ES2018)**](#9-ecmascript-2018-es9--es2018)
  - [10. **ECMAScript 2019 (ES10 / ES2019)**](#10-ecmascript-2019-es10--es2019)
  - [11. **ECMAScript 2020 (ES11 / ES2020)**](#11-ecmascript-2020-es11--es2020)
  - [12. **ECMAScript 2021 (ES12 / ES2021)**](#12-ecmascript-2021-es12--es2021)
  - [13. **ECMAScript 2022 ve Sonrası**](#13-ecmascript-2022-ve-sonrası)
  - [Özet](#özet)
- [Js Modules (CommonJs-Esm-EsNext)](#js-modules-commonjs-esm-esnext)
    - [1. **ESM (ECMAScript Modules)**](#1-esm-ecmascript-modules)
    - [2. **CommonJS (CJS)**](#2-commonjs-cjs)
    - [3. **ESNext**](#3-esnext)
    - [4. **Farklılıkları**](#4-farklılıkları)
    - [5. **Hangi Durumda Hangisi Kullanılır?**](#5-hangi-durumda-hangisi-kullanılır)
    - [Özet](#özet-1)
- [🧠 ECMAScript (ES2015 ve Sonrası) Önemli Gelişmeler](#-ecmascript-es2015-ve-sonrası-önemli-gelişmeler)
    - [ES2015 (ES6) – Büyük Dönüm Noktası](#es2015-es6--büyük-dönüm-noktası)
    - [ES2016 (ES7)](#es2016-es7)
    - [ES2017 (ES8)](#es2017-es8)
    - [ES2018 (ES9)](#es2018-es9)
    - [ES2019 (ES10)](#es2019-es10)
    - [ES2020 (ES11)](#es2020-es11)
    - [ES2021 (ES12)](#es2021-es12)
    - [ES2022 (ES13)](#es2022-es13)
    - [ES2023 (ES14)](#es2023-es14)
    - [ES2024 (ES15) – (Yeni ve kademeli destekleniyor)](#es2024-es15--yeni-ve-kademeli-destekleniyor)
    - [En Önemli Modern Özellikler (Pratikte sık kullanılır)](#en-önemli-modern-özellikler-pratikte-sık-kullanılır)


# EcmaScript Versiyonları

JavaScript, ES (ECMAScript) adlı bir standart üzerine inşa edilmiştir. ECMAScript'in sürümleri, JavaScript'in özelliklerini belirler. Aşağıda ECMAScript versiyonları (ES) ve her sürümün özelliklerini ana hatlarıyla bulabilirsiniz:

---

## 1. **ECMAScript 1 (ES1) – 1997**

- **Tanım**: İlk standart sürümdür. JavaScript'in temelini oluşturur.
- **Özellikler**:
  - Temel dil yapıları.
  - İlk veri tipleri (String, Number, Object).
  - Basit kontrol yapılarını (if, for, while) destekler.

---

## 2. **ECMAScript 2 (ES2) – 1998**
- **Tanım**: ES1'in küçük bir revizyonudur. ISO standardına uyumluluk sağlamak için yapılan eklemelerle gelir.
- **Yeni Özellik**:
  - Teknik hata düzeltmeleri içerir, dil özelliklerine yeni büyük bir şey eklenmedi.

---

## 3. **ECMAScript 3 (ES3) – 1999**
- **Tanım**: JavaScript'in gerçek anlamda popülerleştiği sürümdür. Çoğu tarayıcı bu sürümle uyumluluk sağladı.
- **Özellikler**:
  - **Regular Expressions** (Regex) desteği.
  - **try-catch exception handling** (Hata yakalama mekanizması).
  - **string.trim()** ve benzeri string yönetim özellikleri.
  - **better Array methods** (daha gelişmiş array işlevleri).
  - **Function Improvements**: Daha fazla esneklik ve kullanım kolaylığı sağladı.

---

## 4. **ECMAScript 4 (İptal Edildi)**  
Bu sürüm üzerinde bazı çalışmalar yapılmış olsa da, topluluk içindeki anlaşmazlıklar nedeniyle geliştirme durduruldu. Bazı özellikler daha sonraki sürümlere aktarıldı.

---

## 5. **ECMAScript 5 (ES5) – 2009**
- **Tanım**: JavaScript standartlarını büyük ölçüde geliştiren ve modern tarayıcı uyumluluğunu sağlayan bir sürümdür.
- **Özellikler**:
  - **Strict Mode**: Daha güvenli bir kod yazımı için "katı mod".
  - **JSON**: Dahili JSON desteği.
  - Diziler için yeni yöntemler: (ör. `map()`, `filter()`, `reduce()`).
  - **Object.defineProperty** ve diğer Object API'leri.
  - Tüm modern tarayıcılar tarafından desteklenir.
  
**Örnek – Strict Mode**:
```javascript
'use strict';
x = 3.14; // Strict mode nedeniyle hata verir. (Değişken tanımlanmadı!)
```

---

## 6. **ECMAScript 6 (ES6 / ES2015) – 2015**
- **Tanım**: JavaScript'in en büyük güncellemelerindendir ve modern JavaScript'in temelidir.
- **Anahtar Özellikler**:
  - **ES Modules**: `import` ve `export` ile yerleşik modül sistemi.
  - **Arrow Functions**: Daha kısa ve bağlam güvenli fonksiyon ifadeleri.
  - **let** ve **const**: Yeni değişken tanımlama yöntemleri.
  - **Template Literals**: Gelişmiş string yazımı (``Backtick kullanımına dayalı``).
  - **Classes**: Daha kolay nesne yönelimli programlama yapma imkânı.
  - Promise: Asenkron işlemler için yerleşik destek.
  - Spread/rest operatörleri (`...`).
  
**Örnek – let ve const**:
```javascript
let x = 5;   // Değiştirilebilir bir değişken.
const y = 10; // Sabit değişken, tekrar atanamaz.
```

---

## 7. **ECMAScript 2016 (ES7 / ES2016)**
- **Tanım**: Daha küçük kapsamlı bir güncellemedir.
- **Özellikler**:
  - **Array.prototype.includes()**: Array'de bir öğenin varlığını test eder.
  - **Exponentiation Operator**: Üs alma operatörü (`**`).
  
**Örnek**:
```javascript
const arr = [1, 2, 3];
console.log(arr.includes(2)); // true
console.log(2 ** 3); // 8
```

---

## 8. **ECMAScript 2017 (ES8 / ES2017)**
- **Özellikler**:
  - **async/await**: Promiseları daha okunabilir hale getiren bir yapı.
  - **Object.entries() ve Object.values()**: Nesneler üzerinde daha kolay işlem.
  - **String padding**: `padStart()` ve `padEnd()` ile string manipülasyonları.

**Örnek – async/await**:
```javascript
async function fetchData() {
  const result = await fetch('https://api.example.com');
  console.log(await result.json());
}
fetchData();
```

---

## 9. **ECMAScript 2018 (ES9 / ES2018)**
- **Özellikler**:
  - Rest/spread operatörleri nesnelere uygulanabilir.
  - **Promise.finally()**: Promise zincirinin sonunda işlemi temizleme.
  - **Regex Improvements**: RegExp'te çok satır desteği.

---

## 10. **ECMAScript 2019 (ES10 / ES2019)**
- **Özellikler**:
  - **Array.flat() ve Array.flatMap()**: Çok seviyeli dizileri düzleştirme.
  - **Optional Catch Binding**: Hata yakalamalarda bind gerekmez.

---

## 11. **ECMAScript 2020 (ES11 / ES2020)**
- **Özellikler**:
  - **BigInt**: Büyük sayılar (Number.MAX_SAFE_INTEGER’dan fazla).
  - **Nullish Coalescing Operator (??)**: `null` ve `undefined` ile daha iyi işlem yapma.
  - Optional Chaining (`?.`): Hata vermeyen zincirleme.

**Örnek – Optional Chaining**:
```javascript
let user = {};
console.log(user?.profile?.address); // tanımlı değil, hata yok
```

---

## 12. **ECMAScript 2021 (ES12 / ES2021)**
- **Özellikler**:
  - **String.prototype.replaceAll()**: String içinde tüm eşleşen kısımları değiştirme.
  - **Logical Assignment Operators**: `&&=`, `||=`, `??=` gibi kısayollar.

---

## 13. **ECMAScript 2022 ve Sonrası**
- **Tanıtılanlar**:
  - **Top-level await**: Doğrudan modül düzeyinde `await` kullanımı.
  - Daha fazla string ve array özelliği.

---

## Özet

ES6 ile modern JavaScript’in temeli atıldı ve bu sürüm sonrası eklenen özellikler JavaScript'i daha güçlü, okunabilir ve işlevsel hale getirdi. Eğer bir modern JavaScript projesi yapıyorsanız en az **ES6** standartlarına uygun bir yaklaşımla başlamanızı öneririm! 😊

# Js Modules (CommonJs-Esm-EsNext)

JavaScript programlarında modülerlik, kodların daha okunabilir, düzenli ve yeniden kullanılabilir olması adına önemli bir konsepttir. JavaScript'te modül sistemleri, kodun farklı parçalarını yönetmek ve birbirlerine bağlamak için tasarlanmıştır. Bu sistemler arasında **ESM (ECMAScript Modules)**, **CommonJS**, ve **ESNext Modules** gibi önemli seçenekler bulunmaktadır. Aşağıda bu sistemler ve farkları hakkında bilgi bulabilirsiniz:

### 1. **ESM (ECMAScript Modules)**
- **Tanım**: Modern tarayıcılar ve Node.js için tasarlanmış yerleşik bir modül formatıdır. 2015 yılında ECMAScript standardıyla birlikte gelen bir özelliktir (ES6).
- **Kullanımı**: `import` ve `export` anahtar kelimeleri aracılığıyla modüller tanımlanır ve dahil edilir.
- **Özellikler**:
  - Tarayıcı ve Node.js'de desteklenir.
  - **Statik Bağlantı (Static Linking)** kullanır: `import` ifadeleri, dosya çalıştırılmadan önce çözülür.
  - Asenkron modül yüklemeyi destekler (dynamically imported modüller için `import()` fonksiyonu kullanılabilir).

**Avantajlar**:
  - Yerleşik olarak tarayıcılar tarafından desteklenir.
  - Ağ üzerinden yüklenebilen modülleri (HTTP/HTTPS) destekler.
  - Çapraz platformlarda çalışması daha kolaydır.

**Örnek**:
```javascript
// math.js
export function add(a, b) {
  return a + b;
}

import { add } from './math.js';
console.log(add(2, 3)); // Çıktı: 5
```

---

### 2. **CommonJS (CJS)**

- **Tanım**: Node.js'in varsayılan modül sistemidir (Node.js yapılmadan önce oluşturulmuştur).
- **Kullanımı**: `require()` ve `module.exports` anahtar kelimeleriyle modül tanımlanır ve dahil edilir.
- **Özellikler**:
  - Modüller senkron şekilde yüklenir.
  - Tarayıcılar, yerel destek sağlamaz. (Tarayıcı tabanlı projelerde ek araçlar gereklidir, örneğin Webpack ya da Browserify).
  - Dinamik modül yükleme için uygundur.

**Avantajlar**:
  - Node.js projelerinde çok yaygın bir şekilde kullanılır.
  - Dinamik modül yüklemeyi iyi destekler.

**Örnek**:
```javascript
// math.js
function add(a, b) {
  return a + b;
}

module.exports = { add };

// main.js
const { add } = require('./math.js');
console.log(add(2, 3)); // Çıktı: 5
```

---

### 3. **ESNext**
- **Tanım**: Henüz tüm JavaScript ortamlarında standartlaşmamış olan, fakat gelecekte ECMAScript standardına dahil edilecek modül özelliklerini ifade eder.
- **Kullanımı**: Genelde gelecekteki JavaScript özellikleri için kullanılan bir terimdir. Örneğin, `top-level await` ya da dinamik `import` gibi yeni özellikler ESNext kategorisine girer.

**Örnek**:
```javascript
// Dinamik import (ESNext özelliği)
import('./math.js').then(module => {
  console.log(module.add(2, 3));
});
```

---

### 4. **Farklılıkları**
| **Özellik**        | **ESM**               | **CommonJS**      | **ESNext**          |
|---------------------|-----------------------|-------------------|---------------------|
| **Kullanıldığı Ortam** | Tarayıcı, Node.js    | Node.js (tarayıcı uyumluluğu ek araç ister) | Tarayıcı/Node.js (henüz standartlaşmamış bazı özellikler) |
| **Yükleme Şekli**   | Statik               | Dinamik/Senkron   | Dinamik/Statik      |
| **export/import**  | `export`/`import`    | `module.exports`/`require` | Esnek, gelecekteki standartlara dayalı |
| **Performans**     | Daha hızlı (statik)   | Daha yavaş (senkron) | Performans iyileştirmeleri devam ediyor |

---

### 5. **Hangi Durumda Hangisi Kullanılır?**
| Kullanım Durumu                                   | Önerilen Modül Formatı |
|--------------------------------------------------|------------------------|
| Modern bir tarayıcı uyumlu proje                | **ESM**               |
| Node.js uygulaması                              | **CommonJS** veya **ESM** |
| Dinamik modül yükleme gereken bir yapı kurma     | **ESNext (Dynamic import)** |
| Eski tarayıcı ve platformlarla uyumluluk sağlama | **CommonJS**           |

---

### Özet
- **ESM:** Modern JavaScript ekosisteminde öncelikli olarak tercih edilmelidir.
- **CommonJS:** Node.js ile uyumluluk gereken eski projelerde yaygındır.
- **ESNext:** Modern projelerin gelecekteki ihtiyaçlarını karşılar.

# 🧠 ECMAScript (ES2015 ve Sonrası) Önemli Gelişmeler

### ES2015 (ES6) – Büyük Dönüm Noktası
İlk büyük modernleşme dalgası:
- `let` ve `const`
- Arrow functions (`() => {}`)
- Template literals (\`Merhaba ${isim}\`)
- Classes (`class`)
- Modules (`import`, `export`)
- Promises
- Destructuring
- Default parameters
- Spread/rest syntax (`...`)
- `Map`, `Set`, `WeakMap`, `WeakSet`
- `Symbol`

---

### ES2016 (ES7)
- `Array.prototype.includes()`
- Exponentiation operator: `**`

---

### ES2017 (ES8)
- `async` / `await`
- `Object.entries()`, `Object.values()`
- `String.prototype.padStart()` / `padEnd()`
- Shared memory & Atomics

---

### ES2018 (ES9)
- `Rest/Spread` ile nesne kopyalama (`{ ...obj }`)
- Asynchronous iteration (`for await...of`)
- RegExp iyileştirmeleri
- `Promise.prototype.finally()`

---

### ES2019 (ES10)
- `Array.prototype.flat()` ve `flatMap()`
- `Object.fromEntries()`
- `String.prototype.trimStart()` / `trimEnd()`
- Optional `catch` binding (`catch {}`)
- Symbol `description`

---

### ES2020 (ES11)
- Optional chaining: `obj?.a?.b`
- Nullish coalescing: `??`
- `Promise.allSettled()`
- `globalThis`
- Dynamic import: `import('./modul.js')`
- `BigInt`

---

### ES2021 (ES12)
- Logical assignment: `&&=`, `||=`, `??=`
- Numeric separators: `1_000_000`
- `Promise.any()`
- WeakRef & FinalizationRegistry
- `String.prototype.replaceAll()`

---

### ES2022 (ES13)
- Top-level `await`
- Class private fields: `#myPrivate`
- Static initialization blocks
- `Array.at()` (örn: `arr.at(-1)`)

---

### ES2023 (ES14)
- `findLast()` / `findLastIndex()`
- Immutable array methods: `toSorted()`, `toReversed()` vb.
- Hashbang desteği (`#!/usr/bin/env node`)

---

### ES2024 (ES15) – (Yeni ve kademeli destekleniyor)
- `Set.prototype.union()`, `intersection()`, vs.
- `Array.groupBy()` / `Map.groupBy()`
- `Promise.withResolvers()`
- Module import attributes

---

### En Önemli Modern Özellikler (Pratikte sık kullanılır)

📌

| Kategori       | Özellikler                                   |
|----------------|-----------------------------------------------|
| Yapısal        | `import`/`export`, class, async/await         |
| Yazım kolaylığı| `?.`, `??`, `??=`, `Object.fromEntries`       |
| Performans     | `Promise.allSettled`, `Promise.any`           |
| Koleksiyonlar  | `Set`, `Map`, `flat()`, `at()`                |
| Büyük veri     | `BigInt`, WeakRef                             |



- [Örnek tsconfig.json dosyasının satır satır açıklaması](#örnek-tsconfigjson-dosyasının-satır-satır-açıklaması)
  - [compilerOptions (TypeScript Derleyici Seçenekleri)](#compileroptions-typescript-derleyici-seçenekleri)
  - [include \& exclude (Dosya Seçimi)](#include--exclude-dosya-seçimi)
- [her ts dosyasını olduğu yerde js dosyası oluşturma](#her-ts-dosyasını-olduğu-yerde-js-dosyası-oluşturma)
- [declaration, declarationMap ve sourceMap çıktıları ne işe yarar](#declaration-declarationmap-ve-sourcemap-çıktıları-ne-işe-yarar)
- [dist klasörüne ayrıca dosya ve klasörde eklemesini belirtebilir miyiz](#dist-klasörüne-ayrıca-dosya-ve-klasörde-eklemesini-belirtebilir-miyiz)


# Örnek tsconfig.json dosyasının satır satır açıklaması

```json
{
  "compilerOptions": {
    "target": "ES2020",
    "module": "ESNext",
    "lib": ["ES2020"],
    "moduleResolution": "bundler",
    "outDir": "./dist",
    "rootDir": "./entegre_node",
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

GitHub Copilot: # tsconfig.json Açıklaması

Satır satır açıklamalar:

## compilerOptions (TypeScript Derleyici Seçenekleri)


- **3** | `"target": "ES2020"` | TypeScript kodunun ES2020 JavaScript standardına derlenecek 
- **4** | `"module": "ESNext"` | Modern ES modülü formatı kullanılacak (import/export) |
- **5** | `"lib": ["ES2020"]` | Derleme sırasında ES2020 kütüphanelerinin tip tanımları kullanılacak |
- **6** | `"moduleResolution": "bundler"` | Modül çözümlemesi için bundler stratejisi (webpack, vite gibi araçlarla uyumlu) |
- **7** | `"outDir": "./dist"` | Derlenmiş `.js` dosyaları dist klasörüne yazılacak |
- **8** | `"rootDir": "./entegre_node"` | Kaynak dosyaların kök dizini (derlenmesi gereken TypeScript dosyaları buradan alınacak) |
- **9** | `"strict": true"` | Katı tip kontrolü etkin (daha güvenli kod) |
- **10** | `"esModuleInterop": true` | CommonJS modüleriyle ES modüllerinin uyumluluğu sağlanacak |
- **11** | `"skipLibCheck": true` | `.d.ts` dosyalarının tip kontrolü atlanacak (derleme hızı artar) |
- **12** | `"forceConsistentCasingInFileNames": true` | Dosya adlarında harf büyüklüğü tutarlılığı zorunlu kılınacak |
- **13** | `"resolveJsonModule": true` | `.json` dosyaları modül olarak import edilebilecek |
- **14** | `"declaration": true` | Her `.ts` dosyası için `.d.ts` (tip tanım) dosyası oluşturulacak |
- **15** | `"declarationMap": true` | `.d.ts.map` dosyaları oluşturulacak (kaynak dosyaya geri izleme) |
- **16** | `"sourceMap": true` | `.js.map` dosyaları oluşturulacak (debug sırasında orijinal TS kodunu görmek için) |
- **17** | `"types": ["node"]` | Node.js tipleri otomatik olarak dahil edilecek |

## include & exclude (Dosya Seçimi)

- **19** | `"include": ["entegre_node/**/*.ts"]` | entegre_node klasörü altındaki tüm `.ts` dosyaları derlenmesi için işaretlenir |
- **20** | `"exclude": ["node_modules", "dist", "logs"]` | Bu klasörler derlenmeyecek |

**Özet:** Bu konfigürasyon modern TypeScript projesi için optimize edilmiş, ES2020 hedefli, sıkı tip kontrollü ve npm paketleri oluşturmak için (`declaration: true`) hazırlanmış bir ayardır.


# her ts dosyasını olduğu yerde js dosyası oluşturma

GitHub Copilot: TypeScript derleyicisinin (tsc) her TypeScript (.ts) dosyasını kendi bulunduğu dizinde JavaScript (.js) dosyasına çevirmesi için tsconfig.json dosyasında aşağıdaki ayarları yapmalısınız:

1. outDir ayarını kaldırın veya belirtmeyin. (outDir varsa, derlenmiş dosyalar tek bir klasöre gider.)
2. rootDir ayarını kaldırın veya belirtmeyin. (rootDir varsa, kaynak dosyalarınızın kökünü belirler.)
3. tsconfig.json dosyanızda aşağıdaki gibi olmalı:

```json
{
  "compilerOptions": {
    "target": "ES2020",
    "module": "ESNext",
    "lib": ["ES2020"],
    "moduleResolution": "bundler",
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
Kısacası: outDir ve rootDir olmamalı veya kaldırılmalı.

Ek bilgi: Eğer mevcutta dist gibi bir klasöre çıkış alıyorsanız, onu kaldırınca dosyalar kaynaklarının yanına derlenir.

# declaration, declarationMap ve sourceMap çıktıları ne işe yarar

TypeScript’te:

* declaration: true  
Bu ayar, her .ts dosyası için bir .d.ts (declaration, tip bildirim) dosyası üretir. Bu dosyalar, JavaScript çıktısının yanında, TypeScript tip bilgisini dışa aktarır. Özellikle kütüphane geliştirirken, başkalarının sizin kodunuzun tiplerini kullanabilmesi için gereklidir.

* declarationMap: true  
Bu ayar, .d.ts dosyaları için harita (source map) dosyası (.d.ts.map) üretir. Böylece, tip bildirim dosyasında bir tipin nereden geldiğini, orijinal TypeScript dosyasına kolayca izleyebilirsiniz. Özellikle büyük projelerde ve IDE desteğinde faydalıdır.

Özetle:
- declaration: .d.ts dosyası üretir (tip bilgisini dışa açar)
- declarationMap: .d.ts dosyası ile orijinal kaynak arasında bağlantı kurar (debug ve IDE için)
sourceMap: true ayarı, her derlenen .js dosyası için bir .js.map dosyası üretir. Bu dosya, derlenmiş JavaScript kodunu orijinal TypeScript koduna eşler.

* sourceMap : true

- Hata ayıklama (debugging) sırasında, tarayıcı veya IDE, .js dosyasındaki bir hatanın aslında hangi .ts satırında olduğunu gösterir.
- Kodunuzu derledikten sonra bile, orijinal TypeScript dosyalarınız üzerinden hata ayıklayabilirsiniz.
- Özellikle büyük projelerde, hata bulmayı ve kod takibini çok kolaylaştırır.

Kısacası: sourceMap, derlenmiş kod ile kaynak kod arasında köprü kurar ve hata ayıklamayı kolaylaştırır.


# dist klasörüne ayrıca dosya ve klasörde eklemesini belirtebilir miyiz

Evet, TypeScript derlemesiyle dist klasörüne ek olarak başka dosya veya klasörler de kopyalamak mümkündür, fakat TypeScript derleyicisi (tsc) sadece .ts dosyalarını derler ve kopyalar. Diğer dosya ve klasörleri (örneğin .json, .env, statik dosyalar) dist klasörüne eklemek için genellikle ek araçlar veya scriptler kullanılır.

Yaygın yöntemler:
1. package.json içinde bir script ile kopyalama:
   - Örneğin, npm paketlerinden cp, cpy, veya robocopy (Windows) kullanabilirsiniz.
   - Örnek script:
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

2. Ek araçlar:
   - npm paketleri: cpy, copyfiles, fs-extra gibi araçlar ile dosya ve klasörleri dist’e kopyalayabilirsiniz.

3. tsc’nin include/exclude ayarları:
   - Sadece TypeScript dosyalarını etkiler, diğer dosyaları kopyalamaz.

Özet:  
TypeScript derleyicisi dışında, ek dosya ve klasörleri dist’e kopyalamak için genellikle ek script veya araç kullanılır.

Örnek tsconfig.json dosyasının satır satır açıklaması

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

- [Typescript vite projesi nasıl hazırlanır (pnpm)](#typescript-vite-projesi-nasıl-hazırlanır-pnpm)
  - [1. Yeni Proje Oluşturma](#1-yeni-proje-oluşturma)
  - [2. Proje Dizinine Geçin ve Bağımlılıkları Yükleyin](#2-proje-dizinine-geçin-ve-bağımlılıkları-yükleyin)
  - [3. Proje Yapısı](#3-proje-yapısı)
  - [4. Geliştirme Sunucusunu Başlatın](#4-geliştirme-sunucusunu-başlatın)
  - [5. Build İşlemi](#5-build-i̇şlemi)
  - [6. Preview (Opsiyonel)](#6-preview-opsiyonel)
- [src klasörü kullanmadan direk rootdan nasıl hazırlarım](#src-klasörü-kullanmadan-direk-rootdan-nasıl-hazırlarım)
  - [1. Boş Dizin Oluşturun ve Geçin](#1-boş-dizin-oluşturun-ve-geçin)
  - [2. package.json Oluşturun](#2-packagejson-oluşturun)
  - [3. Vite ve TypeScript Bağımlılıklarını Yükleyin](#3-vite-ve-typescript-bağımlılıklarını-yükleyin)
  - [4. Temel Dosyaları Oluşturun](#4-temel-dosyaları-oluşturun)
  - [5. package.json'a Scripts Ekleyin](#5-packagejsona-scripts-ekleyin)
  - [6. Çalıştırın](#6-çalıştırın)


# Typescript vite projesi nasıl hazırlanır (pnpm)

TypeScript Vite projesi hazırlamak için şu adımları takip edebilirsiniz:

## 1. Yeni Proje Oluşturma

```bash
pnpm create vite my-ts-project --template vanilla-ts
```

veya interaktif olarak:

```bash
pnpm create vite
```
Sonra proje adını girin ve "Vanilla" → "TypeScript" seçin.

## 2. Proje Dizinine Geçin ve Bağımlılıkları Yükleyin

```bash
cd my-ts-project
pnpm install
```

## 3. Proje Yapısı

Oluşturulan proje şu yapıda olacak:
```
my-ts-project/
├── index.html
├── package.json
├── tsconfig.json
├── vite.config.ts
├── src/
│   ├── main.ts
│   ├── style.css
│   └── vite-env.d.ts
└── public/
```

## 4. Geliştirme Sunucusunu Başlatın

```bash
pnpm dev
```

## 5. Build İşlemi

```bash
pnpm build
```

## 6. Preview (Opsiyonel)

```bash
pnpm preview
```

Bu komutlar ile TypeScript destekli bir Vite projesi hazır hale gelir. Proje otomatik olarak TypeScript konfigürasyonu, hot reload ve modern build araçları ile gelir.

# src klasörü kullanmadan direk rootdan nasıl hazırlarım

GitHub Copilot: Vite projesini src klasörü olmadan doğrudan root'tan hazırlamak için şu adımları takip edebilirsiniz:

## 1. Boş Dizin Oluşturun ve Geçin

```bash
mkdir my-ts-project
cd my-ts-project
```

## 2. package.json Oluşturun

```bash
pnpm init
```

## 3. Vite ve TypeScript Bağımlılıklarını Yükleyin

```bash
pnpm add -D vite typescript
pnpm add -D @types/node
```

## 4. Temel Dosyaları Oluşturun

- tsconfig.json

````typescript
{
  "compilerOptions": {
    "target": "ES2020",
    "useDefineForClassFields": true,
    "lib": ["ES2020", "DOM", "DOM.Iterable"],
    "module": "ESNext",
    "skipLibCheck": true,
    "moduleResolution": "bundler",
    "allowImportingTsExtensions": true,
    "resolveJsonModule": true,
    "isolatedModules": true,
    "noEmit": true,
    "strict": true,
    "noUnusedLocals": true,
    "noUnusedParameters": true,
    "noFallthroughCasesInSwitch": true
  },
  "include": ["*.ts", "*.tsx"]
}
````

- vite.config.ts

````typescript
import { defineConfig } from 'vite'

export default defineConfig({
  root: '.',
  build: {
    outDir: 'dist'
  }
})
````

````html
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vite + TS</title>
  </head>
  <body>
    <div id="app"></div>
    <script type="module" src="/main.ts"></script>
  </body>
</html>
````

````typescript
document.querySelector<HTMLDivElement>('#app')!.innerHTML = `
  <div>
    <h1>Vite + TypeScript</h1>
    <p>Edit main.ts and save to test HMR</p>
  </div>
`
````

## 5. package.json'a Scripts Ekleyin

````json
{
  // ...existing code...
  "scripts": {
    "dev": "vite",
    "build": "tsc && vite build",
    "preview": "vite preview"
  }
  // ...existing code...
}
````

## 6. Çalıştırın

```bash
pnpm dev
```

Bu şekilde src klasörü olmadan doğrudan root dizininde TypeScript dosyalarınızla çalışabilirsiniz.

Similar code found with 2 license types
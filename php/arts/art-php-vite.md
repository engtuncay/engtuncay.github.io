

Source : https://chatgpt.com/share/67a9a0fe-7b14-800e-9ff6-6bb2c937dc0c

[Back](../readme.md)

---

- [PHP ile Vite ve TypeScript (tsc) Entegrasyonu](#php-ile-vite-ve-typescript-tsc-entegrasyonu)
  - [Adım 1: Proje Yapısını Oluşturun](#adım-1-proje-yapısını-oluşturun)
  - [Adım 2: PHP Backend'i Kurun](#adım-2-php-backendi-kurun)
  - [Adım 3: Frontend (Vite + TypeScript) Kurulumunu Yapın](#adım-3-frontend-vite--typescript-kurulumunu-yapın)
  - [Adım 4: Vite ve PHP Entegrasyonunu Yapın](#adım-4-vite-ve-php-entegrasyonunu-yapın)
  - [Adım 5: Geliştirme ve Yapı](#adım-5-geliştirme-ve-yapı)
  - [Adım 6: Üretim (Production) İçin Derleme](#adım-6-üretim-production-i̇çin-derleme)
  - [Sonuç](#sonuç)


# PHP ile Vite ve TypeScript (tsc) Entegrasyonu

PHP ile Vite ve TypeScript (tsc) projelerini birlikte kullanmak için aşağıdaki adımları izleyebilirsiniz. Bu süreç, PHP backend ve Vite frontend geliştirme iş akışlarını birleştirmenize olanak sağlar.

## Adım 1: Proje Yapısını Oluşturun

Projenizde PHP backend ve Vite/TypeScript frontend için ayrı dizinler oluşturabilirsiniz. Örnek bir proje yapısı şöyle olabilir:


```
/my-project
|-- /backend
|   |-- /public
|   |-- /src
|   |-- index.php
|
|-- /frontend
|   |-- /src
|   |-- /dist
|   |-- vite.config.ts
|   |-- tsconfig.json

```

## Adım 2: PHP Backend'i Kurun

PHP ile backend'inizi geliştirebilirsiniz. index.php dosyasını şu şekilde başlatabilirsiniz:

```php
<?php
// backend/index.php
echo "PHP Backend is working!";

```

Ardından PHP'nin kurulu olduğundan emin olun ve projenizi çalıştırmak için şu komutu kullanabilirsiniz:

```sh
php -S localhost:8000 -t backend/public

```
## Adım 3: Frontend (Vite + TypeScript) Kurulumunu Yapın

frontend klasörüne gidin ve Vite + TypeScript projesini başlatın.

```sh
cd frontend
npm create vite@latest . --template vue-ts

```

Bu komut, Vite ile Vue.js ve TypeScript kullanarak yeni bir frontend yapılandırması oluşturacaktır.

Gerekli bağımlılıkları yükleyin:

```sh
npm install

```

Vite yapılandırmasını özelleştirebilirsiniz. Örneğin, Vite'yi PHP backend'inizle uyumlu hale getirecek şekilde yapılandırabilirsiniz.
vite.config.ts dosyasını şu şekilde değiştirebilirsiniz:

```js
import { defineConfig } from 'vite';

export default defineConfig({
  base: '/dist/', // PHP ile uyumlu hale getirmek için
  build: {
    outDir: '../backend/public/dist', // Çıktıları PHP'nin public dizinine yönlendirin
  },
});

```

## Adım 4: Vite ve PHP Entegrasyonunu Yapın

Vite, geliştirici modunda frontend'i dinamik olarak derler. PHP backend'iniz, frontend dosyalarınızı dist klasöründen alacaktır.

PHP backend, Vite tarafından üretilen dist dosyalarını gösterecek şekilde ayar yapmalısınız.

PHP sayfasında, frontend dosyasına şu şekilde referans verebilirsiniz:

```html
<!-- backend/public/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP + Vite</title>
    <script type="module" src="/dist/assets/index.js"></script>
</head>
<body>
    <h1>Hello from PHP + Vite!</h1>
</body>
</html>

```

## Adım 5: Geliştirme ve Yapı

Vite geliştirme sunucusunu başlatın:

```sh
npm run dev

```

PHP backend sunucusunu başlatın:

```sh
php -S localhost:8000 -t backend/public

```

Bu aşamada, frontend geliştirme için Vite'in sağladığı hız ve özelliklerden faydalanırken, PHP backend'inizle uyumlu bir şekilde çalışabilirsiniz.

## Adım 6: Üretim (Production) İçin Derleme

Üretim için, Vite projenizi aşağıdaki komutla derleyebilirsiniz:

```sh
npm run build

```

Bu, dist klasöründe derlenmiş frontend dosyalarını oluşturur. Ardından PHP backend'iniz bu dosyaları public/dist altında sunabilir.

## Sonuç

Bu kurulum ile, PHP backend ve Vite + TypeScript frontend'i entegre bir şekilde kullanabilirsiniz. Geliştirme aşamasında Vite'in HMR (Hot Module Replacement) özelliklerinden yararlanabilirken, üretim aşamasında ise frontend'i PHP'nin public dizinine yönlendirerek sunabilirsiniz.
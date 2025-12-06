
engtuncay: solidjs kurulumu ve proje oluşturulması hakkında bilgi verir misin

GitHub Copilot: SolidJS kurulumu ve yeni bir proje oluşturmak için aşağıdaki adımları izleyebilirsiniz:

- [1. SolidJS Projesi Oluşturma](#1-solidjs-projesi-oluşturma)
- [6. Geliştirme Sunucusunu Başlatın](#6-geliştirme-sunucusunu-başlatın)
- [2. Tailwind CSS Kurulumu](#2-tailwind-css-kurulumu)
- [4. Tailwind’i Yapılandırma](#4-tailwindi-yapılandırma)
- [5. Tailwind’i CSS’e Ekleyin](#5-tailwindi-csse-ekleyin)
- [6. Projeyi Çalıştırın](#6-projeyi-çalıştırın)
- [3. Tailwind CSS Kurulumu with pnpm](#3-tailwind-css-kurulumu-with-pnpm)
- [Resmi Dökümantasyon](#resmi-dökümantasyon)


### 1. SolidJS Projesi Oluşturma

SolidJS projeleri için en yaygın yol, `npm` veya `yarn` ile `create-solid` komutunu kullanmaktır.

Terminalde aşağıdaki komutu çalıştırın:

```
pnpm create solid@latest
```

➖ Komut çalıştıktan sonra sizden proje adı ve opsiyonel seçenekleri girmenizi ister.

Proje Klasörüne Girin

```
cd <proje-adı>
```

Bağımlılıkları Yükleyin

```
pnpm install
```

veya

```
yarn
```

### 6. Geliştirme Sunucusunu Başlatın

```
pnpm run dev
```

veya

```
yarn dev
```

Tarayıcınızda genellikle `http://localhost:3000` adresinde çalışan SolidJS uygulamanızı görebilirsiniz.

çıkmazsa terminalde `o+enter` yaparak tarayıcıda açar.

---

### 2. Tailwind CSS Kurulumu

Terminalde aşağıdaki komutları çalıştırın:
```
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
```

---

### 4. Tailwind’i Yapılandırma

**tailwind.config.js** dosyasını açın ve `content` kısmını aşağıdaki gibi güncelleyin:

````js
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
````

---

### 5. Tailwind’i CSS’e Ekleyin

`src/index.css` dosyasının en üstüne şu satırları ekleyin:

```css
/* filepath: src/index.css */
@tailwind base;
@tailwind components;
@tailwind utilities;
/* ...varsa diğer css kodlarınız... */
```

---

### 6. Projeyi Çalıştırın

```
pnpm run dev
```

---

**Özet:**  
- Proje oluştururken TypeScript şablonunu seçin.  
- Tailwind’i kurup yapılandırın.  
- CSS dosyanıza Tailwind direktiflerini ekleyin.

Daha fazla bilgi için:  
- [SolidJS + Tailwind Kurulum Dokümanı](https://www.solidjs.com/guides/styling#tailwind-css)  
- [Tailwind CSS Dokümantasyonu](https://tailwindcss.com/docs/guides/vite)


### 3. Tailwind CSS Kurulumu with pnpm

```sh
pnpm add -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
```

Diğer adımlar (Tailwind yapılandırması ve CSS ekleme) aynıdır.

### Resmi Dökümantasyon

- SolidJS Resmi Dokümanları, https://www.solidjs.com/docs/latest/getting-started

# Tailwind + SSR (PHP) — Kısa ve uygulanebilir rehber ✅

**Kısaca:** SSR bir PHP sitesinde Tailwind’i *build-time* olarak üretip statik CSS dosyası olarak sunmak en sağlam yöntemdir. (Tailwind v3+ JIT zaten içeride, ama içerik taraması için PHP dosyalarını `content` dizisine eklemelisiniz.)

---

## 1) Hızlı kurulum adımları 🔧

1. Node kurun, proje kökünde:

```bash
npm init -y
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
```

2. `src/input.css` oluşturun:

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

3. `tailwind.config.js` içine **PHP şablonlarını** ekleyin:

```js
module.exports = {
  content: [
    "./**/*.php",
    "./templates/**/*.twig",
    "./src/**/*.html"
  ],
  theme: {},
  safelist: [], // dinamik sınıflar için
}
```

4. `package.json` script örnekleri:

```json
"scripts": {
  "build:css": "tailwindcss -i ./src/input.css -o ./public/css/tailwind.css --minify",
  "watch:css": "tailwindcss -i ./src/input.css -o ./public/css/tailwind.css --watch"
}
```

5. PHP şablonunda CSS'i dahil edin:

```html
<link href="/css/tailwind.css" rel="stylesheet">
```

---

## 2) Dinamik sınıflar (örn. `"bg-" + color`) ⚠️

Tailwind, kaynak dosyalarını tarayarak kullanılan sınıfları üretir; dinamik oluşturulan sınıfları göremez. Bu tür sınıflar için `tailwind.config.js` içindeki `safelist` kullanın:

```js
safelist: [
  'bg-red-500', 'bg-green-500',
  { pattern: /text-(red|green|blue)-(400|500)/ }
]
```

---

## 3) Geliştirme vs Production 💡

- Geliştirme: `npm run watch:css` ile hızlı geri bildirim alın.
- Production/CI: `npm run build:css` çalıştırıp üretilen `public/css/tailwind.css` dosyasını sunucuda dağıtın (asset pipeline'a ekleyin).

---

## 4) Hızlı prototip istiyorsanız

- CDN (sadece prototip/dev): `<script src="https://cdn.tailwindcss.com"></script>` — üretimde önerilmez, çünkü tüm utility’ler yüklenecektir.

---

**Özet:** PHP dosyalarınızı `content`/globlara ekleyin, build-time CSS üretin, dinamik sınıfları `safelist` ile güvene alın. ✅

## Plain PHP örnek 🧩

Proje içinde bir örnek klasör oluşturdum: `js-libs/alpinejs/arts/examples/tailwind-plain-php/`. İçinde:

- `package.json` — build/watch script'leri
- `tailwind.config.js` — içerik globları ve `safelist`
- `postcss.config.js`
- `src/input.css`
- `public/index.php` — basit bir kullanım örneği (dinamik sınıf gösterimi)

Kullanım:

1. Örnek klasörde `npm install` çalıştırın.
2. `npm run build:css` ile CSS üretin (veya `npm run watch:css` geliştirirken).
3. `public/css/tailwind.css` dosyasını sunucunuza yerleştirin veya örnek `index.php`'i bir PHP sunucusunda çalıştırın.

Not: Dinamik sınıf (örn. `bg-{$color}-500`) kullanıyorsanız `tailwind.config.js` içindeki `safelist`'e ekleyin veya pattern kullanın.

## CodeIgniter 4 ile entegrasyon ⚙️

1. Proje kökünde Node kurup gerekli paketleri ekleyin (genellikle proje kökünde `package.json`):

```bash
npm init -y
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
```

2. `src/input.css` dosyanızı oluşturun (aynı yol veya `assets/src` gibi bir yerde tutabilirsiniz):

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

3. `tailwind.config.js` içinde CodeIgniter view'larını tarayın (genelde `app/Views`):

```js
module.exports = {
  content: [
    "./app/Views/**/*.php",
    "./app/Views/**/*.html",
    "./public/**/*.php"
  ],
  safelist: [],
  theme: {},
  plugins: [],
}
```

4. `package.json` script'leri (CSS'i `public/css` altına yazmak iyi çalışır):

```json
"scripts": {
  "build:css": "tailwindcss -i ./src/input.css -o ./public/css/tailwind.css --minify",
  "watch:css": "tailwindcss -i ./src/input.css -o ./public/css/tailwind.css --watch"
}
```

5. View içinde CSS'i dahil edin (`app/Views/layout.php` ya da benzeri):

```php
<link rel="stylesheet" href="<?= base_url('css/tailwind.css') ?>">
```

6. Dinamik sınıflar için `safelist` kullanın veya pattern ekleyin. Örneğin controller'da renk değiştiriliyorsa:

```php
$color = 'red';
// view: <div class="bg-<?= $color ?>-500"> ... </div>
```

7. Deploy/CI: CI pipeline'ınızda `npm ci` ve `npm run build:css` çalıştırıp `public/css/tailwind.css`'i hedef sunucuya deploy edin.

---

İstersen örnek bir CodeIgniter 4 dizin şablonu ve bir GitHub Actions workflow örneği ekleyeyim.

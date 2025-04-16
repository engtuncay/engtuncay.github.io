
- [Me](#me)
- [AI Assistant](#ai-assistant)
  - [1. **Inline Styles**](#1-inline-styles)
  - [2. **Class Kullanımı**](#2-class-kullanımı)
  - [3. **Dinamik İfadeler ile Style Güncellemesi**](#3-dinamik-i̇fadeler-ile-style-güncellemesi)
  - [4. **CSS Modülleri ile Çalışma**](#4-css-modülleri-ile-çalışma)
  - [5. **Global CSS Kullanımı**](#5-global-css-kullanımı)
  - [6. **Scoped CSS (Shadow DOM Olmadan)**](#6-scoped-css-shadow-dom-olmadan)
  - [7. **Stil Kütüphaneleri Kullanımı (Bootstrap vb.)**](#7-stil-kütüphaneleri-kullanımı-bootstrap-vb)
  - [8. **Tematik Styling (Theme Uygulaması)**](#8-tematik-styling-theme-uygulaması)
  - [SolidJS'de CSS'nin Avantajları:](#solidjsde-cssnin-avantajları)
- [Solid Playground](#solid-playground)


## Me
Style ile ilgili bilgi ver.

## AI Assistant
Haklısınız, SolidJS'nin **stil uygulamaları** hakkında bilgi vermeyi atlamışım. Şimdi SolidJS'de **stil** ve **CSS kullanımı** konularını örnekler ile birlikte açıklayayım.

---

### 1. **Inline Styles**

SolidJS'de elementlere doğrudan `style` özelliği ile CSS uygulanabilir (inline style). `style` bir obje ({ }) olarak tanımlanır.

**Örnek:**
```js
function App() {
  return (
    <div style={{ color: "red", "font-size": "20px" }}>
      Bu bir kırmızı yazıdır.
    </div>
  );
}
```

- `style` içinde javaScript objesi ile CSS yazılır.

- CSS özellikleri `kebap-case` ile yazılırken, JavaScript objesinde `"tireli"` özellikler tırnak içine alınır (`"font-size"` gibi).

📝 https://playground.solidjs.com/anonymous/3e64ba7a-700c-40b1-baa1-42e4c80f600a

---

### 2. **Class Kullanımı**

HTML'deki gibi `class` özelliği yerine, SolidJS'de dinamik olarak `classList` kullanılabilir. Bu yöntemle sınıf ekleme/çıkarma kolayca kontrol edilebilir.

**Örnek:**
```js
function App() {
  const [isActive, setIsActive] = createSignal(false);

  return (
    <div>
      <div classList={{ active: isActive(), inactive: !isActive() }}>
        Bu bir dinamik sınıf uygulamasıdır.
      </div>
      <button onClick={() => setIsActive(!isActive())}>Durumu Değiştir</button>
    </div>
  );
}
```

- `classList`, sınıf isimlerini bir obje olarak alır (`{ active: true, inactive: false }`).
- Sınıfın aktif olup olmayacağı değerlerle belirlenir: `true` => sınıf eklenir, `false` => sınıf kaldırılır.

**CSS (örnek):**
```css
.active {
  color: green;
}
.inactive {
  color: red;
}
```

📝 https://playground.solidjs.com/anonymous/2d9e4773-1fe5-4dc6-9b6d-1bcf3a1a1fca

---

### 3. **Dinamik İfadeler ile Style Güncellemesi**
`style` ya da `classList` reactive sinyallerle güncellenebilir.

**Örnek:**
```js
function App() {
  const [size, setSize] = createSignal(16);

  return (
    <div>
      <p style={{ "font-size": `${size()}px` }}>
        Yazı boyutu: {size()}px
      </p>
      <button onClick={() => setSize(size() + 2)}>Boyutu Artır</button>
    </div>
  );
}
```

- `style`'da JavaScript ifadeleri kullanılabilir.
- Örnekte, yazının boyutunu artıran bir stil tanımı yapılmıştır.

📝 https://playground.solidjs.com/anonymous/68957ed0-618b-4adf-afaa-8540945283c3

---

### 4. **CSS Modülleri ile Çalışma**

SolidJS, modern projelerde **CSS Modülleri** ile stil tanımlamalarını destekler. CSS modülleri, kapsülleme sağlayarak global isim çakışmalarını önler.

**CSS (örneği - `App.module.css`):**
```css
.title {
  font-size: 24px;
  color: blue;
}

.highlight {
  background-color: yellow;
}
```

**JSX (CSS modül kullanımı):**
```js
import styles from "./App.module.css";

function App() {
  return (
    <div>
      <h1 class={styles.title}>Merhaba, CSS Modülleri!</h1>
      <p class={styles.highlight}>Bu sarı arka planlı bir yazıdır.</p>
    </div>
  );
}
```

- CSS modülleri doğrudan `import` edilir ve her sınıf adı, `styles.sınıfAdı` ile çağrılır.
- Modül kullanımı, projelerde stil organizasyonunu kolaylaştırır.

➖ Bootstrap sınıf ile beraber kullanmak için (div class'ı)

```js
import styles from "./App.module.css";

function App() {
  return (
    <div class={`container ${styles.myCustomStyle}`}>
      <h1 class="text-danger">Bootstrap and Custom CSS Modules!</h1>
    </div>
  );
}
export default App;

```

---

### 5. **Global CSS Kullanımı**
Global CSS dosyaları SolidJS projesine import edilerek kullanılabilir.

**Örnek (global CSS import):**

**`global.css`:**
```css
body {
  font-family: Arial, sans-serif;
  background-color: #f5f5f5;
}

.container {
  padding: 20px;
}
```

**`index.tsx`:**

```js
import "./global.css";

function App() {
  return (
    <div class="container">
      <h1>Global CSS Örneği</h1>
    </div>
  );
}
```

- `import "./global.css";` ile proje girişinde global CSS dosyası yüklenir.
- Tüm proje genelinde geçerli olur.

---

### 6. **Scoped CSS (Shadow DOM Olmadan)**

SolidJS, gömülü şekliyle bileşen bazlı stili destekler. Ancak bu, Shadow DOM gibi tarayıcı özelliklerinden yararlanmaz.

**Bileşen İçi CSS (Scoped):**
```js
function App() {
  return (
    <>
      <style>
        {`
          .scoped-title {
            color: purple;
          }
        `}
      </style>
      <h1 class="scoped-title">Bileşen İçi Stil Örneği</h1>
    </>
  );
}
```

- `<style>` içinde yazılan CSS yalnızca bu bileşen için geçerlidir.
- Böylece kapsama (scoping) sağlanır.

---

### 7. **Stil Kütüphaneleri Kullanımı (Bootstrap vb.)**
SolidJS, herhangi bir **CSS kütüphanesi** ile kolayca entegre olabilir. Örneğin, **Bootstrap** kullanılabilir.

**Bootstrap Entegrasyonu:**

```js
import "bootstrap/dist/css/bootstrap.min.css";

function App() {
  return (
    <div class="container">
      <button class="btn btn-primary">Bootstrap Butonu</button>
    </div>
  );
}
```

- Kütüphane CSS'si projeye dahil edilir.
- HTML sınıf isimleri (`btn btn-primary`) doğrudan kullanılabilir.

---

### 8. **Tematik Styling (Theme Uygulaması)**
Projelerde tema değişiklikleri yapmak için ortak stilleri saklayabilir ve dinamik olarak değiştirebilirsiniz.

**Örnek:**
```js
const themes = {
  light: {
    background: "white",
    color: "black",
  },
  dark: {
    background: "black",
    color: "white",
  },
};

function App() {
  const [theme, setTheme] = createSignal(themes.light);

  return (
    <div style={theme()}>
      <button onClick={() => setTheme(theme() === themes.light ? themes.dark : themes.light)}>
        Tema Değiştir
      </button>
    </div>
  );
}
```

- Tema bilgilerinin saklandığı obje (ör: `themes`) kullanılır.
- O tema bilgileri otomatik olarak stile uygulanır.

---

### SolidJS'de CSS'nin Avantajları:
1. Hızlı reaksiyonlu yapıda CSS değişimi kolaydır (reactive style).
2. Modül yapısı global çakışmaları önler.
3. Stil yönetimi React ve diğer framework’lere göre sezgiseldir.

Bu örneklerle SolidJS'de stil uygulamalarını kapsamlı şekilde anlattım. Başka bir konuda daha detay ister misiniz? 😊


## Solid Playground

- Share basarak kodumuzu kaydetmiş oluruz.

- https://playground.solidjs.com/anonymous/625ba1ca-abcb-41a3-b945-e10f4fd20c45


➖ Props 1

https://playground.solidjs.com/anonymous/0140c628-af43-4526-9115-58033bfbbfa5




Source : 

(some parts may be modified or removed)

[Back](../readme.md)

---

# Contents

- [Contents](#contents)
- [SolidJS Tutorial](#solidjs-tutorial)
  - [1. Reactivity (Tepkisel Yapı)](#1-reactivity-tepkisel-yapı)
  - [2. JSX Kullanımı](#2-jsx-kullanımı)
  - [3. Computed Values (Türetilmiş Değerler)](#3-computed-values-türetilmiş-değerler)
    - [4. Effect (Yan Etki Tanımı)](#4-effect-yan-etki-tanımı)
    - [5. Component Composition (Bileşenlerin Kullanımı)](#5-component-composition-bileşenlerin-kullanımı)
  - [6. Props ve Çocuk Elemanlar (Children)](#6-props-ve-çocuk-elemanlar-children)
  - [7. Control Flow (If ve For Kullanımı)](#7-control-flow-if-ve-for-kullanımı)
    - [8. Store Kullanımı (State Management)](#8-store-kullanımı-state-management)
    - [9. **Context API**](#9-context-api)
    - [10. **Signal ve Bileşenlerin Optimizasyonu**](#10-signal-ve-bileşenlerin-optimizasyonu)
    - [11. **Lifecycle Metotları**](#11-lifecycle-metotları)


# SolidJS Tutorial

**SolidJS**'in [resmi eğitim sitesinde](https://www.solidjs.com/tutorial/) bulunan temel konseptler


## 1. Reactivity (Tepkisel Yapı)

SolidJS, tepkisel bir yapı (reactive) kullanır ve bu, bileşenlerin daha hızlı ve verimli çalışmasını sağlar.

**Örnek:**

```js
import { createSignal } from "solid-js";

function Counter() {
  const [getCount, setCount] = createSignal(0);

  return (
    <div>
      <p>Değer: {getCount()}</p>
      <button onClick={() => setCount(getCount() + 1)}>Artır</button>
    </div>
  );
}
```

- `createSignal` React'teki `useState`'e benzer ancak daha doğrudandır.
- Değerler `()` kullanılarak alınır: `count()`.

---

## 2. JSX Kullanımı

SolidJS, React gibi **JSX** kullanır ancak doğrudan DOM güncellemesi yaparak çalışır.

🧲

```js
function App() {
  const name = "SolidJS";
  return <h1>Merhaba, {name}!</h1>;
}
```

- JSX kullanımı kolaydır ve dinamik içerikler `{}` içine alınır.

---

## 3. Computed Values (Türetilmiş Değerler)

SolidJS, reactive değerlerden (sinyallerden) otomatik türetme değerleri oluşturmanıza olanak tanır.

(Reactive Türetilmiş Değerler)

🧲

```js
import { createSignal, createMemo } from "solid-js";

function App() {
  const [count, setCount] = createSignal(2);
  const doubleCount = createMemo(() => count() * 2);

  return (
    <div>
      <p>Değer: {count()}</p>
      <p>İki Katı: {doubleCount()}</p>
      <button onClick={() => setCount(count() + 1)}>Artır</button>
    </div>
  );
}
```

- `createMemo` türetilmiş bir değeri saklar ve gereksiz yeniden hesaplamaları önler.

---

### 4. Effect (Yan Etki Tanımı)

SolidJS'de yan etkiler için `createEffect` kullanılır. Tepkiselliğe dayalı işlemler tanımlanır.

**Örnek:**
```js
import { createSignal, createEffect } from "solid-js";

function App() {
  const [count, setCount] = createSignal(0);

  createEffect(() => {
    console.log("Sayısal Değer Güncellendi:", count());
  });

  return <button onClick={() => setCount(count() + 1)}>Artır</button>;
}
```

- Bu kodda, her `count` değiştiğinde `console.log` çalışır.

---

### 5. Component Composition (Bileşenlerin Kullanımı)

SolidJS'de bileşenler, başka bileşenler içinde kullanılabilir, bu da modüler bir yapı sağlar.

🧲

```js
function Header(props) {
  return <h1>Başlık: {props.title}</h1>;
}

function App() {
  return (
    <div>
      <Header title="SolidJS Örneği" />
    </div>
  );
}
```

- Props yardımıyla bileşene veri aktarılır.

---

## 6. Props ve Çocuk Elemanlar (Children)

Bileşenlere çocuk elemanlar ve özel değerler gönderilebilir.
  
🧲

```js
function App() {
  return (
    <Card title="Bilgilendirme Kartı">
      Bu, bir kart bileşenidir.
    </Card>
  );
}

function Card(props) {
  return (
    <div>
      <h2>{props.title}</h2>
      <p>{props.children}</p>
    </div>
  );
}

```

- `props.children` bileşenin içine eklenen içerikleri ifade eder.

---

## 7. Control Flow (If ve For Kullanımı)

SolidJS, koşullu render ve listeleme için özel yapılar sağlar.

🧲

➖ If Kullanımı:

```js
function App() {
  const [loggedIn, setLoggedIn] = createSignal(false);

  return (
    <div>
      {loggedIn() ? <p>Hoş geldiniz!</p> : <p>Lütfen giriş yapın</p>}
      <button onClick={() => setLoggedIn(!loggedIn())}>Giriş Değiştir</button>
    </div>
  );
}
```

➖ For
 
```js
function App() {
  const items = ["Elma", "Armut", "Portakal"];
  
  return (
    <ul>
      {items.map(item => (
        <li>{item}</li>
      ))}
    </ul>
  );
}
```
- React'teki `map()` metoduna oldukça benzerdir.

---

### 8. Store Kullanımı (State Management)

SolidJS, `createStore` ile merkezi bir durum depoları oluşturulabilir. (Merkezi Durum Yönetimi)

🧲

```js
import { createStore } from "solid-js/store";

function App() {
  const [state, setState] = createStore({ count: 0 });
  
  return (
    <div>
      <p>Count: {state.count}</p>
      <button onClick={() => setState("count", state.count + 1)}>Artır</button>
    </div>
  );
}
```

- `createStore` objelerdeki değişiklikleri reactive olarak izler ❗

---

### 9. **Context API**

Durumları bileşen ağacı boyunca geçirmek için `Context` kullanılabilir.

🧲

```js
import { createContext, useContext } from "solid-js";

const UserContext = createContext();

function App() {
  return (
    <UserContext.Provider value={{ username: "solid_user" }}>
      <Profile />
    </UserContext.Provider>
  );
}

function Profile() {
  const user = useContext(UserContext);
  return <p>Hoş geldin, {user.username}!</p>;
}
```
- `createContext` ve `useContext` ile global bir yapı oluşturabilirsiniz.

---

### 10. **Signal ve Bileşenlerin Optimizasyonu**
SolidJS, performans optimizasyonu için yalnızca değiştirilmesi gereken kısmı günceller, yeniden render etmek gerekmez.

**Örnek:**
```js
function App() {
  const [count, setCount] = createSignal(0);

  return (
    <div>
      <button onClick={() => setCount(count() + 1)}>Artır</button>
      <ExpensiveComponent />
    </div>
  );
}

function ExpensiveComponent() {
  console.log("Zor iş hesaplandı!");
  return <p>Bu bileşen zor bir hesaplama yapıyor!</p>;
}
```
- Burada, `ExpensiveComponent` değiştirilmeden **yalnızca güncellenen kısım** etkilenir.

---

### 11. **Lifecycle Metotları**
SolidJS, bileşen yaşam döngüsünü yönetmek için özel metotlar sağlar.

**Örnek:**
```js
import { onMount, onCleanup } from "solid-js";

function App() {
  onMount(() => {
    console.log("Bileşen yüklendi!");
  });

  onCleanup(() => {
    console.log("Bileşen kaldırıldı!");
  });

  return <div>Merhaba!</div>;
}
```
- `onMount` bileşen yüklendiğinde, `onCleanup` bileşen kaldırıldığında çağrılır.

---

SolidJS'nin temel konseptleri bu şekilde özetlenebilir. Her adım, pratik örneklerle kolayca uygulanabilir ve SolidJS'nin performans odaklı yaklaşımı sayesinde verimlidir.


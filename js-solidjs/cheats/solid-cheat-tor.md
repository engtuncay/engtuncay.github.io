
SolidJs Cheat Sheet By Oraksoft

[Back](../readme.md)

---

# Contents

- [Contents](#contents)
- [Proje Oluşturma](#proje-oluşturma)
  - [1. Installations](#1-installations)
  - [2. App Component (Entry)](#2-app-component-entry)
  - [15. JSX Özellikleri](#15-jsx-özellikleri)
- [Reactivity Basics](#reactivity-basics)
  - [3. createSignal](#3-createsignal)
  - [6. createStore](#6-createstore)
  - [4. createEffect](#4-createeffect)
  - [5. createMemo](#5-creatememo)
- [Rendering Controls](#rendering-controls)
  - [9. show](#9-show)
  - [10.  For](#10--for)
  - [11.  Suspense](#11--suspense)
- [Modularity](#modularity)
  - [7. Components](#7-components)
- [Other Useful Features](#other-useful-features)
  - [8. onCleanup](#8-oncleanup)
  - [12.  Lazy](#12--lazy)
  - [13.  Context](#13--context)
  - [14.  onError](#14--onerror)
  - [16. Event Binding](#16-event-binding)
  - [17.  Two-Way Binding (Çift Yönlü Veri Bağlama)](#17--two-way-binding-çift-yönlü-veri-bağlama)
  - [18. Event Modifiers (Etkinlik Modifikatörleri) (Event Bubbling)](#18-event-modifiers-etkinlik-modifikatörleri-event-bubbling)
  - [19. bind (Bağlama) - SolidJS'ye özel değil, ancak alternatifler ile yapılabilir](#19-bind-bağlama---solidjsye-özel-değil-ancak-alternatifler-ile-yapılabilir)
  - [20. Event Binding (Etkinlik Bağlama)](#20-event-binding-etkinlik-bağlama)
  - [17. Two-Way Binding (Çift Yönlü Veri Bağlama)](#17-two-way-binding-çift-yönlü-veri-bağlama)
  - [18 Event Modifiers](#18-event-modifiers)
  - [19 Two way binding](#19-two-way-binding)
- [Child to parent Communications](#child-to-parent-communications)
  - [Me](#me)
  - [AI Assistant](#ai-assistant)
    - [SolidJS Tutorial Özeti (https://www.solidjs.com/tutorial/)](#solidjs-tutorial-özeti-httpswwwsolidjscomtutorial)
  - [Me](#me-1)
  - [AI Assistant](#ai-assistant-1)
    - [**SolidJS Özeti (Maddeler ve Örnekler)**](#solidjs-özeti-maddeler-ve-örnekler)
      - [**1. Signal'ler**](#1-signaller)
      - [**2. `createEffect` ile Reaktif Güncellemeler**](#2-createeffect-ile-reaktif-güncellemeler)
      - [**3. Komponentler**](#3-komponentler)
      - [**4. Props Kullanımı**](#4-props-kullanımı)
      - [**5. `createMemo` ile Hesaplamalar**](#5-creatememo-ile-hesaplamalar)
      - [**6. Koşullu Render (Control Flow)**](#6-koşullu-render-control-flow)
      - [**7. Context API**](#7-context-api)
      - [**8. Store Kullanımı**](#8-store-kullanımı)
      - [**9. Lifecycle İşlevleri**](#9-lifecycle-i̇şlevleri)
      - [**10. Routing (Yönlendirme)**](#10-routing-yönlendirme)
      - [**11. Server-Side Rendering (SSR)**](#11-server-side-rendering-ssr)
      - [**12. Performans ve Doğrudan DOM Manipülasyonu**](#12-performans-ve-doğrudan-dom-manipülasyonu)
- [Extensions](#extensions)
  - [Tailwind Installation](#tailwind-installation)

# Proje Oluşturma

## 1. Installations

SolidJS projesi oluşturma:

```sh
pnpm create solid

```

alternatifler

```sh
npm init solid@latest
# veya
yarn create solid

```

[🔝](#contents)

## 2. App Component (Entry)

SolidJS ile basit bir bileşen oluşturmak için:

```js
import { createSignal } from "solid-js";

function App() {
  const [count, setCount] = createSignal(0);
  
  return (
    <div>
      <p>Count: {count()}</p>
      <button onClick={() => setCount(count() + 1)}>Increment</button>
    </div>
  );
}

export default App;

```

➖ index.tsx'de render function ile App componentini render ederek uygulamamız başlayacaktır.

```ts
// index.tsx
render(() => <App />, root!);

```

## 15. JSX Özellikleri

JSX ifadeleri JavaScript ifadeleri gibi yazılır: `{}` içinde.

- class yerine className kullanılır.
- for yerine htmlFor kullanılır.

[🔝](#contents)

# Reactivity Basics

## 3. createSignal

Bir reactive değişken oluşturmak için kullanılır. reactive değişkene state'de adı verilir. Durum takibi manasında.

```js
const [getValue, setValue] = createSignal(initialValue);

// common usage
// const [value, setValue] = createSignal(initialValue);

```

- getValue() - değişkeni getirir (getter)
- setValue(newValue) - değişkeni günceller. (setter)

[🔝](#contents)

## 6. createStore

Reactif obje oluşturmak için kullanılır. 

```js
import { createStore } from "solid-js/store";

const [state, setState] = createStore({ count: 0 });

setState("count", 1); // count değerini güncelle

```

[🔝](#contents)

## 4. createEffect

Yan etkiler (side effects) için kullanılır:

```js
import { createEffect } from "solid-js";

createEffect(() => {
  console.log("Durum değişti: ", value());
});

```

[🔝](#contents)

## 5. createMemo

Hesaplanmış değerler (computed values) oluşturmak için kullanılır:

```js
import { createMemo } from "solid-js";

const doubleCount = createMemo(() => count() * 2);

```


[🔝](#contents)

# Rendering Controls

## 9. show

Koşullu render için kullanılır:

```js
import { Show } from "solid-js";

function App() {
  const [isVisible, setIsVisible] = createSignal(true);
  
  return (
    <div>
      <Show when={isVisible()} fallback={<p>Hidden</p>}>
        <p>Visible</p>
      </Show>
    </div>
  );
}

```

## 10.  For

Liste render etmek için kullanılır:

```js
import { For } from "solid-js";

function List() {
  const items = ["Apple", "Banana", "Cherry"];
  
  return (
    <ul>
      <For each={items}>
      { (item) => 
        <li>{item}</li>
      }
      </For>
    </ul>
  );
}

```

## 11.  Suspense

Yavaş yüklenen bileşenler için bekleme (loading) durumu:

```js
import { Suspense } from "solid-js";

function App() {
  return (
    <Suspense fallback={<div>Loading...</div>}>
      <LazyComponent />
    </Suspense>
  );
}

```

# Modularity

## 7. Components

Components JSX içinde tanımlanır:

```js
function MyComponent(props) {
  return <div>{props.message}</div>;
}

```

# Other Useful Features

## 8. onCleanup

Temizlik (cleanup) işlemleri için kullanılır:

```js
import { onCleanup } from "solid-js";

const timer = setInterval(() => console.log("Tick"), 1000);
onCleanup(() => clearInterval(timer));

```


## 12.  Lazy

Dinamik bileşen yükleme:

```js
import { lazy } from "solid-js";

const LazyComponent = lazy(() => import("./LazyComponent"));

```

## 13.  Context

Veri paylaşımı için context kullanımı:

```js
import { createContext, useContext } from "solid-js";

const MyContext = createContext();

function Parent() {
  return (
    <MyContext.Provider value="Hello World">
      <Child />
    </MyContext.Provider>
  );
}

function Child() {
  const value = useContext(MyContext);
  return <div>{value}</div>;
}

```

## 14.  onError

Hata yakalama için kullanılır:

```js
import { onError } from "solid-js";

onError((error) => {
  console.error("An error occurred:", error);
});

```

## 16. Event Binding

SolidJS'de olaylar, JSX üzerinde doğrudan bağlanabilir. Olaylar için kullanılan sözdizimi, HTML ile benzerdir, ancak işlevler on ile başlar.

🧲

➖ Click Event:

```js
import { createSignal } from "solid-js";

function App() {
  const [count, setCount] = createSignal(0);
  
  const increment = () => setCount(count() + 1);
  
  return (
    <div>
      <p>Count: {count()}</p>
      <button onClick={increment}>Increment</button>
    </div>
  );
}

```

➖ Input Change Event: (two way binding)

```js
function App() {
  
  const [value, setValue] = createSignal("");

  return (
    <div>
      <input 
        type="text" 
        value={value()} 
        onInput={(e) => setValue(e.target.value)} 
      />
      <p>{value()}</p>
    </div>
  );
}

```

➖ Submit Event:


```js
function App() {
  
  const [input, setInput] = createSignal("");

  const handleSubmit = (e) => {
    e.preventDefault();
    alert(`Form submitted with input: ${input()}`);
  };

  return (
    <form onSubmit={handleSubmit}>
      <input 
        type="text" 
        value={input()} 
        onInput={(e) => setInput(e.target.value)} 
      />
      <button type="submit">Submit</button>
    </form>
  );

}

```

## 17.  Two-Way Binding (Çift Yönlü Veri Bağlama)

SolidJS'de iki yönlü veri bağlama, React'deki gibi doğrudan value ve onInput olaylarını bağlayarak yapılır. Ancak, two-way binding için manuel olarak bağlama yapılması gerekir. bind gibi bir özellik yoktur.

Örnek:

```js
import { createSignal } from "solid-js";

function App() {
  const [inputValue, setInputValue] = createSignal("");

  return (
    <div>
      <input 
        type="text" 
        value={inputValue()} 
        onInput={(e) => setInputValue(e.target.value)} 
      />
      <p>Input Value: {inputValue()}</p>
    </div>
  );

}

```

Burada, `<input />` bileşeni, inputValue state'ini okur ve onInput ile değeri günceller.

## 18. Event Modifiers (Etkinlik Modifikatörleri) (Event Bubbling)

SolidJS, etkinliklere modifikatörler eklemek için basit bir yöntem sunmaz. Ancak, fonksiyonları ve olayları yönetmek için standart JavaScript yöntemleri kullanılabilir.

Örneğin:

➖ Stop Propagation:

```js
function App() {
  const handleClick = (e) => {
    e.stopPropagation();
    alert("Click stopped from bubbling.");
  };

  return (
    <div onClick={() => alert("Div clicked!")}>
      <button onClick={handleClick}>Click me</button>
    </div>
  );
}

```

➖ Prevent Default:

```js
function App() {
  const handleSubmit = (e) => {
    e.preventDefault();
    alert("Form submission prevented");
  };

  return (
    <form onSubmit={handleSubmit}>
      <input type="text" />
      <button type="submit">Submit</button>
    </form>
  );
}

```

## 19. bind (Bağlama) - SolidJS'ye özel değil, ancak alternatifler ile yapılabilir

SolidJS'de bind kullanımı olmadığı için iki yönlü veri bağlama işlemi için value ve onInput olayları manuel olarak yönetilmelidir. Ancak, birkaç çözüm önerilebilir.

Çift Yönlü Bağlama için Manual Binding (State ile):

```js
import { createSignal } from "solid-js";

function App() {
  const [value, setValue] = createSignal("Hello");

  return (
    <div>
      <input 
        type="text" 
        value={value()} 
        onInput={(e) => setValue(e.target.value)} 
      />
      <p>{value()}</p>
    </div>
  );
}

```

SolidJS'deki veri bağlama ve etkinlik yönetimi, sade ve güçlüdür. Özellikle manuel bağlama, bileşenlerinizin kontrolünü size tamamen bırakır.

## 20. Event Binding (Etkinlik Bağlama)

SolidJS'de etkinlikler, JSX üzerinde doğrudan bağlanabilir. Etkinlikler için kullanılan sözdizimi, HTML ile benzerdir, ancak işlevler on ile başlar.

Örnekler:

➖ Click Event:

```js
import { createSignal } from "solid-js";

function App() {
  const [count, setCount] = createSignal(0);
  
  const increment = () => setCount(count() + 1);
  
  return (
    <div>
      <p>Count: {count()}</p>
      <button onClick={increment}>Increment</button>
    </div>
  );
}

```

➖ Input Change Event:

```js
function App() {
  const [value, setValue] = createSignal("");

  return (
    <div>
      <input 
        type="text" 
        value={value()} 
        onInput={(e) => setValue(e.target.value)} 
      />
      <p>{value()}</p>
    </div>
  );
}

```

➖ Submit Event:

```js
function App() {
  const [input, setInput] = createSignal("");

  const handleSubmit = (e) => {
    e.preventDefault();
    alert(`Form submitted with input: ${input()}`);
  };

  return (
    <form onSubmit={handleSubmit}>
      <input 
        type="text" 
        value={input()} 
        onInput={(e) => setInput(e.target.value)} 
      />
      <button type="submit">Submit</button>
    </form>
  );
}

```

## 17. Two-Way Binding (Çift Yönlü Veri Bağlama)

SolidJS'de iki yönlü veri bağlama, React'deki gibi doğrudan value ve onInput olaylarını bağlayarak yapılır. Ancak, two-way binding için manuel olarak bağlama yapılması gerekir. bind gibi bir özellik yoktur.

```js
import { createSignal } from "solid-js";

function App() {
  const [inputValue, setInputValue] = createSignal("");

  return (
    <div>
      <input 
        type="text" 
        value={inputValue()} 
        onInput={(e) => setInputValue(e.target.value)} 
      />
      <p>Input Value: {inputValue()}</p>
    </div>
  );
}

```

Burada, `<input />` bileşeni, inputValue state'ini okur ve onInput ile değeri günceller.

## 18 Event Modifiers 

(tr:Etkinlik Modifikatörleri)

SolidJS, etkinliklere modifikatörler eklemek için basit bir yöntem sunmaz. Ancak, fonksiyonları ve olayları yönetmek için standart JavaScript yöntemleri kullanılabilir.

Örneğin:

➖ Stop Propagation:

```js
function App() {
  const handleClick = (e) => {
    e.stopPropagation();
    alert("Click stopped from bubbling.");
  };

  return (
    <div onClick={() => alert("Div clicked!")}>
      <button onClick={handleClick}>Click me</button>
    </div>
  );
}

```

➖ Prevent Default:

```js
function App() {
  const handleSubmit = (e) => {
    e.preventDefault();
    alert("Form submission prevented");
  };

  return (
    <form onSubmit={handleSubmit}>
      <input type="text" />
      <button type="submit">Submit</button>
    </form>
  );
}

```

## 19 Two way binding

SolidJS'ye özel değil, ancak alternatifler ile yapılabilir

SolidJS'de bind kullanımı olmadığı için iki yönlü veri bağlama işlemi için value ve onInput olayları manuel olarak yönetilmelidir. Ancak, birkaç çözüm önerilebilir.

➖ Çift Yönlü Bağlama için Manual Binding (State ile):

```js
import { createSignal } from "solid-js";

function App() {
  const [value, setValue] = createSignal("Hello");

  return (
    <div>
      <input 
        type="text" 
        value={value()} 
        onInput={(e) => setValue(e.target.value)} 
      />
      <p>{value()}</p>
    </div>
  );
}

```

SolidJS'deki veri bağlama ve etkinlik yönetimi, sade ve güçlüdür. Özellikle manuel bağlama, bileşenlerinizin kontrolünü size tamamen bırakır.

# Child to parent Communications

SolidJS'de child-to-parent iletişimi için birkaç yaygın yöntem vardır. İşte en etkili yollar:

1️⃣ Props ile Callback Fonksiyonu Gönderme (En Yaygın Yöntem)

Parent bileşeni, bir callback fonksiyonunu child bileşenine prop olarak gönderir. Child bileşeni bu fonksiyonu çağırarak parent'a veri iletir.

Örnek

```js
import { createSignal } from "solid-js";

function Child(props: { sendData: (data: string) => void }) {
  return (
    <button onClick={() => props.sendData("Merhaba Parent!")}>
      Parent'a Gönder
    </button>
  );
}

function Parent() {
  const [message, setMessage] = createSignal("");

  return (
    <div>
      <h2>Child'dan Gelen Mesaj: {message()}</h2>
      <Child sendData={setMessage} />
    </div>
  );
}

export default Parent;
```



⏩ Nasıl Çalışıyor?

Parent, sendData adında bir callback fonksiyonunu Child bileşenine gönderir.
Child, butona tıklandığında sendData("Merhaba Parent!") çağırarak parent bileşeninin state'ini günceller.

2️⃣ Context API Kullanımı (Daha Büyük Projeler İçin)

Context API, state'i global olarak paylaşmak için idealdir. Bu yöntem özellikle birden fazla child bileşen arasında veri paylaşmak için kullanışlıdır.

```js
import { createSignal, createContext, useContext } from "solid-js";

// Context oluştur
const MessageContext = createContext();

export function Parent() {
  const [message, setMessage] = createSignal("");

  return (
    <MessageContext.Provider value={{ message, setMessage }}>
      <h2>Child'dan Gelen Mesaj: {message()}</h2>
      <Child />
    </MessageContext.Provider>
  );
}

function Child() {
  const ctx = useContext(MessageContext);

  return (
    <button onClick={() => ctx.setMessage("Context ile veri gönderildi!")}>
      Context ile Gönder
    </button>
  );
}

```

⏩ Nasıl Çalışıyor?

Parent, `MessageContext.Provider` kullanarak message ve setMessage değerlerini tüm child bileşenlere sağlar.

Child, `useContext(MessageContext)` ile bu değerlere erişebilir ve state'i güncelleyebilir.

➖ 3. Store Kullanımı (Daha Karmaşık Durumlar İçin)

SolidJS'in createStore fonksiyonuyla bir global store oluşturup child bileşenler üzerinden güncellemek mümkündür.

🧲

```js
import { createStore } from "solid-js/store";

function Parent() {
  const [state, setState] = createStore({ message: "" });

  return (
    <div>
      <h2>Child'dan Gelen Mesaj: {state.message}</h2>
      <Child updateMessage={(msg) => setState("message", msg)} />
    </div>
  );
}

function Child(props: { updateMessage: (msg: string) => void }) {
  return (
    <button onClick={() => props.updateMessage("Store ile güncellendi!")}>
      Store ile Gönder
    </button>
  );
}

export default Parent;

```

⏩ Nasıl Çalışıyor?

createStore ile reactive bir store oluşturulur. Child bileşeni, parent'tan aldığı updateMessage fonksiyonunu çağırarak store'u günceller.

**Summary**

- Callback ile Props (1. yöntem) → En basit ve performanslı yöntem. Küçük projeler için ideal.
- Context API (2. yöntem) → Birden fazla child bileşeni arasında veri paylaşımı gerektiğinde iyi bir çözüm.
- Store (3. yöntem) → Daha büyük ve yönetilmesi gereken karmaşık state'ler için önerilir.



## Me

https://www.solidjs.com/tutorial/ anlatılanları özetler misin madde madde


## AI Assistant
Tabii! SolidJS'in resmi kaynaklarında anlatılan temel öğreticiyi aşağıdaki gibi maddeler halinde özetleyebilirim:

---

### SolidJS Tutorial Özeti (https://www.solidjs.com/tutorial/)

1. **SolidJS Nedir?**
   - Solid, performans odaklı ve reaktif bir JavaScript framework'üdür.
   - React'e benzer bir yapı kullanır, ancak DOM güncellemelerinde çok daha etkili bir yaklaşım sergiler.
   - Komponent tabanlıdır ve reaktivite sistemi sayesinde hızlı kullanıcı arayüzleri oluşturmayı hedefler.

2. **Başlangıç Çalışmaları: "Signals" Kavramı**
   - Signal'ler Solid'ın reaktivite modelinin temelidir.
   - Signal'ler, değişkenlerin (state'lerin) izlenmesini ve değişiklik sırasında otomatik güncellenmesini sağlar.

3. **Effect ve Reactive Güncellemeler**
   - Reaktif sistemde `createEffect` kullanarak Signal'lere bağlı olarak kod parçacıkları çalıştırılabilir.
   - Signal değiştiğinde otomatik olarak `createEffect` ile bağlı olan reaksiyon yenilenir.

4. **Komponentler**
   - SolidJS'de her şey bir fonksiyon komponenti olarak tanımlanır.
   - JSX kullanılır (React'te olduğu gibi) ve statik verilerle dinamik kullanıcı arayüzleri oluşturulabilir.
   - Komponentler küçük, yeniden kullanılabilir yapılar olarak tasarlanır.

5. **Props Kullanımı**
   - Komponentler arası veri paylaşımı "props" ile gerçekleştirilir.
   - Veri bir üst komponentten alınıp alt komponentlere aktarılabilir.

6. **Computed Reaktivite**
   - `createMemo` ile bir Signal'in başka bir Signal'den türetilmiş versiyonunu oluşturarak hesaplamaları optimize edebilirsiniz.
   - Yalnızca bağımlı Signal'ler değiştiğinde bu hesaplama tetiklenir.

7. **Control Flow (Akış Kontrolleri)**
   - `show` veya `For` gibi yardımcı işlevler ile koşullu render işlemleri gerçekleştirilir.
   - Örnek: `For` döngü ile listelerin render edilmesini sağlar, `Show` ise koşullu render işlemi için kullanılır.

8. **Context API Kullanımı**
   - Global state yönetimi için Context API kullanılır.
   - Props drilling yerine, Context ile verileri daha derin komponentlere doğrudan ulaştırabilirsiniz.

9. **Store Kullanımı**
   - `createStore` API'siyle merkezi bir state yönetimi sağlanır.
   - SolidJS, reaktif bir şekilde değişen ve nested yapılara uygun olan bir state modeli sunar.

10. **Lifecycle İşlevleri**
    - SolidJS'de farklı komponent olayları için lifecycle işlevleri tanımlanabilir.
    - Örneğin, `onMount` ve `onCleanup` gibi işlevler, component mount/destroy aşamalarında çağrılır.

11. **Router ile Navigasyon**
    - SolidJS, yönlendirme işlemleri için `@solidjs/router` paketini sunar.
    - SPA (Tek Sayfa Uygulamaları) yapısını kolayca kurabilirsiniz.

12. **Modüller ve Code Splitting**
    - Solid, performansı artırmak için modüler bir yapıya sahiptir.
    - Vite ile entegrasyonu sayesinde hızlı geliştirme süreci ve kolayca "code splitting" yapılabilir.

13. **Performans Optimizasyonu**
    - Direct DOM manipülasyonu sayesinde Solid, sanal DOM'a olan ihtiyacı ortadan kaldırır.
    - İhtiyaç duyulmayan kodları çalıştırmayarak hafif ve reaktif bir performans elde eder.

14. **SSR (Server-Side Rendering)**
    - SolidJS, uygulamaları sunucu tarafında render edebilmenizi destekler.
    - Bu özellik SEO dostu uygulamalar geliştirmek için önemlidir.

15. **Signal ve Ref Mantığı**
    - State yönetiminde Solid'in "reactive primitives" (örneğin Signals) kullandığı belirtilir.
    - Bu, DOM referanslarını manipüle etmenin ve state yönetmenin kolay bir yolu sunar.

16. **Uncontrolled ve Controlled Input**
    - Form elemanları için controlled veya uncontrolled yapılar tercih edilebilir.
    - Solid, React gibi her iki yöntemi de destekler.

17. **Kütüphane Desteği ve Ekosistemi**
    - SolidJS ekosistemi; modal, animasyon gibi third-party kütüphane desteğiyle genişletilebilir.

---

Eğitim boyunca örnek kodlarla SolidJS özelliklerini anlamanız hedeflenir. Eğer spesifik bir konu hakkında detaylı açıklama veya örnek isterseniz, size daha çok yardımcı olabilirim! 😊

## Me
her maddede örnekte ver

## AI Assistant
Tabii ki! Aşağıda SolidJS resmi eğitim sitesindeki bilgileri her madde için açıklayıp örneklerle tekrar özetledim:

---

### **SolidJS Özeti (Maddeler ve Örnekler)**

---

#### **1. Signal'ler**
- **Signal'ler**, SolidJS'in temelinde reaktif state yönetimi için kullanılır. React'teki `useState`'e benzer şekilde çalışır.

**Örnek:**
```textmate
import { createSignal } from "solid-js";

function Counter() {
  const [count, setCount] = createSignal(0); // Signal tanımlandı.

  return (
    <button onClick={() => setCount(count() + 1)}>
      Tıklama Sayısı: {count()} {/* Signal bir fonksiyon gibi çağrılarak okunur */}
    </button>
  );
}
```

---

#### **2. `createEffect` ile Reaktif Güncellemeler**
- **Effect**, Signal'lerle reaktif bir şekilde çalışan yan etkileri oluşturmak için kullanılır.
- Signal değiştiğinde, bağlı effect otomatik olarak çalışır.

**Örnek:**
```textmate
import { createSignal, createEffect } from "solid-js";

function App() {
  const [name, setName] = createSignal("");

  createEffect(() => {
    console.log(`Ad değişti: ${name()}`); // Signal her değiştiğinde bu tetiklenir.
  });

  return (
    <input
      placeholder="Adınızı girin"
      onInput={(e) => setName(e.target.value)}
    />
  );
}
```

---

#### **3. Komponentler**
- SolidJS'de tüm yapılar **fonksiyon komponenti** olarak tanımlanır.
- JSX ile kullanıcı arayüzleri oluşturulur.

**Örnek:**
```textmate
function Greeting(props) {
  return <h1>Merhaba, {props.name}!</h1>; // Props kullanımı.
}

export default function App() {
  return <Greeting name="SolidJS" />;
}
```

---

#### **4. Props Kullanımı**
- Komponentler arasında veri aktarımı props ile gerçekleşir.

**Örnek:**
```textmate
function Child(props) {
  return <p>Merhaba, {props.data}!</p>;
}

function Parent() {
  return <Child data="SolidJS'ten"/>; // Veri "data" prop'u ile aktarıldı.
}
```

---

#### **5. `createMemo` ile Hesaplamalar**
- `createMemo`, Signal'lardan türetilmiş verileri hesaplamak için kullanılır. Yalnızca bağımlı olduğu Signal'ler değiştiğinde yeniden hesaplanır.

**Örnek:**
```textmate
import { createSignal, createMemo } from "solid-js";

function App() {
  const [price, setPrice] = createSignal(100);
  const [discount, setDiscount] = createSignal(0.2);

  const finalPrice = createMemo(() => price() * (1 - discount())); // Memo kullanılabilir.

  return <p>Son Fiyat: {finalPrice()} TL</p>;
}
```

---

#### **6. Koşullu Render (Control Flow)**
- JSX ile `Show` veya `For` gibi işlemler kullanılarak şartlara göre render yapılır.

**Örnek:**
```textmate
import { createSignal, For, Show } from "solid-js";

function App() {
  const [items, setItems] = createSignal(["Elma", "Armut", "Muz"]);

  return (
    <div>
      <For each={items()}> {/* Listeyi döngüyle render ediyor */}
        {(item) => <p>{item}</p>}
      </For>

      <Show when={items().length > 0} fallback={<p>Liste boş!</p>}>
        <p>Liste boş değil.</p>
      </Show>
    </div>
  );
}
```

---

#### **7. Context API**
- Tüm uygulama genelinde veri paylaşımı için kullanışlıdır. Props drilling sorununu çözer.

**Örnek:**
```textmate
import { createContext, useContext } from "solid-js";

const UserContext = createContext();

function App() {
  return (
    <UserContext.Provider value={{ name: "Ali", age: 25 }}>
      <User />
    </UserContext.Provider>
  );
}

function User() {
  const user = useContext(UserContext); // Context'ten veri alınıyor.
  return <p>Kullanıcı: {user.name}, Yaş: {user.age}</p>;
}
```

---

#### **8. Store Kullanımı**
- Çoklu state'leri reaktif bir şekilde yönetmek için `createStore` kullanılır.

**Örnek:**
```textmate
import { createStore } from "solid-js/store";

function App() {
  const [state, setState] = createStore({ count: 0 });

  return (
    <div>
      <p>Sayac: {state.count}</p>
      <button onClick={() => setState("count", state.count + 1)}>Arttır</button>
    </div>
  );
}
```

---

#### **9. Lifecycle İşlevleri**
- Komponentin "mount" ve "destroy" aşamaları için `onMount` ve `onCleanup` kullanılır.

**Örnek:**

```js
import { onMount, onCleanup } from "solid-js";

function App() {
  onMount(() => {
    console.log("Component yüklendi!");
  });

  onCleanup(() => {
    console.log("Component kaldırıldı!");
  });

  return <div>Merhaba!</div>;
}
```

---

#### **10. Routing (Yönlendirme)**
- SolidJS yönlendirme için `@solidjs/router` kullanır.

**Örnek:**
```textmate
import { Router, Routes, Route, Link } from "@solidjs/router";

function Page1() {
  return <h1>Sayfa 1</h1>;
}

function Page2() {
  return <h1>Sayfa 2</h1>;
}

export default function App() {
  return (
    <Router>
      <nav>
        <Link href="/">Sayfa 1</Link>
        <Link href="/page2">Sayfa 2</Link>
      </nav>

      <Routes>
        <Route path="/" component={Page1} />
        <Route path="/page2" component={Page2} />
      </Routes>
    </Router>
  );
}
```

---

#### **11. Server-Side Rendering (SSR)**
- SSR ile SEO dostu uygulamalar oluşturabilirsiniz. Bunun için SolidJS'in SSR desteği aktifleştirilir.

**Özet Örnek:**
```textmate
// SSR için Solid Start framework'üyle özel bir yapılandırma yapılır.
```

(Solid Start belgelerine bakmanız gerekir)

---

#### **12. Performans ve Doğrudan DOM Manipülasyonu**

- Sanal DOM kullanılmaz, SolidJS doğrudan gerçek DOM üzerinde çalışır, bu da performansı artırır.

**Örnek:**
```js
function App() {
  let ref;

  return (
    <div>
      <button ref={ref}>Ben bir HTML düğmesiyim!</button>
    </div>
  );
}
```

---

SolidJS'in güçlü yanları olan reaktivite ve performansı desteklemek için küçük ve basit parçalı yapılar üzerinde çalışmak gereklidir.

# Extensions

## Tailwind Installation

solidjs uygulamama (solidjs+vite+ts) tailwind nasıl eklerim

Tailwind v4 ile kurulum oldukça basit:

1. Paketi yükle

```bash
pnpm add -D tailwindcss @tailwindcss/vite

```   
2. vite.config.ts güncelle
   
```ts
import { defineConfig } from "vite";
import solid from "vite-plugin-solid";
// eklenecek import
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
  plugins: [
    tailwindcss(),
    solid(),
  ],
});

```

3. CSS dosyasına ekle

src/index.css (yoksa oluştur):

```css
@import "tailwindcss";

```

4. CSS'i index.tsx'e import et

```tsx
import "./index.css";

```

5. Test et

```tsx
<h1 class="text-3xl font-bold text-blue-500">Merhaba</h1>

```

Not: SolidJS'te className değil class kullanılır.

```bash
pnpm dev

```

Tailwind sınıfları çalışıyorsa kurulum tamam.
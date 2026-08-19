
SolidJs Cheat Sheet 

[Back](../readme.md)

---

# Contents

- [Contents](#contents)
- [Proje Oluşturma](#proje-oluşturma)
  - [Installations](#installations)
  - [App Component (Entry)](#app-component-entry)
  - [JSX Özellikleri](#jsx-özellikleri)
- [Reactivity Basics](#reactivity-basics)
  - [createSignal](#createsignal)
  - [createStore (Reactive object)](#createstore-reactive-object)
  - [createEffect](#createeffect)
  - [createMemo](#creatememo)
- [Rendering Controls](#rendering-controls)
  - [show (conditional rendering)](#show-conditional-rendering)
  - [For (loops)](#for-loops)
  - [Suspense (deprecated at solid2)](#suspense-deprecated-at-solid2)
  - [Suspense'e Alternatif show](#suspensee-alternatif-show)
- [Modularity](#modularity)
  - [Components](#components)
- [Other Useful Features](#other-useful-features)
  - [8. onCleanup](#8-oncleanup)
  - [Lazy](#lazy)
  - [Context](#context)
  - [onError](#onerror)
- [Event Binding](#event-binding)
  - [Click Event:](#click-event)
  - [Input Change Event: (two way binding)](#input-change-event-two-way-binding)
  - [Submit Event:](#submit-event)
  - [Two-Way Binding (Çift Yönlü Veri Bağlama)](#two-way-binding-çift-yönlü-veri-bağlama)
  - [Event Modifiers (Etkinlik Modifikatörleri) (Event Bubbling)](#event-modifiers-etkinlik-modifikatörleri-event-bubbling)
  - [bind (Bağlama)](#bind-bağlama)
  - [Event Binding (Etkinlik Bağlama)](#event-binding-etkinlik-bağlama)
  - [Two-Way Binding (Çift Yönlü Veri Bağlama)](#two-way-binding-çift-yönlü-veri-bağlama-1)
  - [Event Modifiers](#event-modifiers)
  - [Two way binding](#two-way-binding)
- [Child to parent Communications](#child-to-parent-communications)
- [Popup pencere ile ana pencere arasında postMessage API kullanılması](#popup-pencere-ile-ana-pencere-arasında-postmessage-api-kullanılması)
- [SolidJS Tutorial Özeti](#solidjs-tutorial-özeti)
  - [Örnekler](#örnekler)
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

## Installations

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

## App Component (Entry)

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

- Componentler, referans olarak da tanımlanabilir (lambda syntax)

➖ index.tsx'de render function ile App componentini render ederek uygulamamız başlayacaktır.

```ts
// index.tsx
render(() => <App />, root!);

```

## JSX Özellikleri

JSX ifadeleri JavaScript ifadeleri gibi yazılır: `{}` içinde.

- class yerine className kullanılır.
- for yerine htmlFor kullanılır.

[🔝](#contents)

# Reactivity Basics

## createSignal

Bir reactive değişken oluşturmak için kullanılır. reactive değişkene state'de adı verilir. Durum takibi manasında.

```js
const [getValue, setValue] = createSignal(initialValue);

// common usage
// const [value, setValue] = createSignal(initialValue);

```

- getValue() - değişkeni getirir (getter)
- setValue(newValue) - değişkeni günceller. (setter)

[🔝](#contents)

## createStore (Reactive object)

Reaktif obje oluşturmak için kullanılır. 

```js
import { createStore } from "solid-js/store";

const [state, setState] = createStore({ count: 0 });

setState("count", 1); // count değerini güncelle

```

[🔝](#contents)

## createEffect

Yan etkiler (side effects) için kullanılır:

```js
import { createEffect } from "solid-js";

createEffect(() => {
  console.log("Durum değişti: ", getValue());
});

```

[🔝](#contents)

## createMemo

Hesaplanmış değerler (computed values) oluşturmak için kullanılır:

```js
import { createMemo } from "solid-js";

const doubleCount = createMemo(() => count() * 2);

```


[🔝](#contents)

# Rendering Controls

## show (conditional rendering)

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

## For (loops)

Liste render etmek için kullanılır:

```js
import { For } from "solid-js";

function List() {
  const items = ["Apple", "Banana", "Cherry"];
  
  return (
    <ul>
      <For each={items}>
      { (item) => <li>{item}</li>
      }
      </For>
    </ul>
  );
}

```

## Suspense (deprecated at solid2)

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

📝 Not : Suspense'in "yükleniyor mu" kararı, içindeki bileşenlerin reactive okuma sırasında bir Promise fırlatıp fırlatmadığına bakarak veriliyor. SolidJS'in resource/lazy sistemine bağlı bir mekanizma.

Nasıl çalışıyor

➖ 1. lazy() ile import edilen component

```jsx
const LazyComponent = lazy(() => import("./LazyComponent"));

```

lazy(), component'i render etmeye çalıştığında dinamik import() promise'i henüz resolve olmamışsa, SolidJS'in reactive sistemine bu bilgiyi bildirir (internal olarak bir "suspense kaynağı" işaretlenir). Promise resolve olana kadar Suspense fallback'i gösterir, resolve olunca gerçek component'i render eder.

➖ 2. createResource kullanan component

Eğer LazyComponent içinde createResource ile async veri çekiliyorsa, o resource henüz "pending" durumdaysa ve component render sırasında o resource'un değerine (signal'ine) erişiliyorsa, Suspense bunu yakalar ve fallback gösterir.

➖ Kritik nokta: "tracking context" içinde olmalı

Suspense'in bunu anlayabilmesi için, promise'in render/tracking sırasında oluşması gerekiyor — yani component fonksiyonu çalışırken bir resource okunmalı veya lazy() component'i mount edilmeye çalışılmalı. SolidJS bunu global bir "suspense context" ile yakalar: en yakın üst `<Suspense>` bileşeni, kendi altındaki ağaçta pending bir kaynak olup olmadığını izler.

Sizin örneğinizde

```html
<Suspense fallback={<div>Loading...</div>}>
  <LazyComponent />
</Suspense>

```

Eğer LazyComponent, `lazy(() => import(...))` ile tanımlanmışsa: modül import promise'i resolve olana kadar fallback gösterilir. Eğer düz bir component (lazy olmadan import edilmiş) ise ve içinde createResource kullanıyorsa: o resource pending olduğu sürece fallback gösterilir. Component'in kendisi zaten senkron import edilmişse ve içinde hiçbir async kaynak yoksa, Suspense'in burada pratik bir etkisi olmaz — direkt render edilir.

Kısacası: Suspense component'in "network'ten indirilip indirilmediğine" değil, render sırasında fırlatılan promise'lere göre karar veriyor.

## Suspense'e Alternatif show



# Modularity

## Components

Components JSX içinde tanımlanır:

➖ 1. callback ile tanımlanabilir. Tipi belirtilebilir.

```js
import { For, type Component } from 'solid-js';

export const MyComponent: Component = (props) => {
  return <div>{props.message}</div>;
};
```

props tipi belirtilebilir. Component tipine generic olarak tanımlanır.

```js
import { For, type Component } from 'solid-js';

type MyCompProps = {
  message: string|undefined;
};

export const MyComponent: Component<MyCompProp> = (props) => {
  return <div>{props.message}</div>;
};

```


➖ 2. function olarak tanımlanabilir. daha basit bir tanımlamadır.


```js
function MyComponent(props) {
  return <div>{props.message}</div>;
}

```

🧲 Örnek bir component tanımı

```js
import { For, type Component } from 'solid-js';

type RemoteSelectProps = {
  remotes: any[];
  id?: string;
  class?: string;
};

export const FiSelectRemote: Component<RemoteSelectProps> = (props) => {
  const remoteItems = () => props.remotes ?? [];
  const selectId = () => props.id;
  const selectClass = () => props.class ?? 'select w-full max-w-xs';

  return (
    <select id={selectId()} class={selectClass()}>
      <option value="">Remote seçiniz</option>

      <For each={remoteItems()}>
        {(remote) => {
          const label = remote?.bc1TxRemoteName ?? remote?.name ?? 'Unknown';
          return <option value={label}>{label}</option>;
        }}
      </For>
    </select>
  );
};

```

# Other Useful Features

## 8. onCleanup

Temizlik (cleanup) işlemleri için kullanılır:

```js
import { onCleanup } from "solid-js";

const timer = setInterval(() => console.log("Tick"), 1000);
onCleanup(() => clearInterval(timer));

```


## Lazy

Dinamik bileşen yükleme:

```js
import { lazy } from "solid-js";

const LazyComponent = lazy(() => import("./LazyComponent"));

```

## Context

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

## onError

Hata yakalama için kullanılır:

```js
import { onError } from "solid-js";

onError((error) => {
  console.error("An error occurred:", error);
});

```

# Event Binding

SolidJS'de olaylar, JSX üzerinde doğrudan bağlanabilir. Olaylar için kullanılan sözdizimi, HTML ile benzerdir, ancak işlevler on ile başlar.

🧲

## Click Event:

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

## Input Change Event: (two way binding)

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

## Submit Event:


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

## Two-Way Binding (Çift Yönlü Veri Bağlama)

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

## Event Modifiers (Etkinlik Modifikatörleri) (Event Bubbling)

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

## bind (Bağlama) 

SolidJS'ye özel değil, ancak alternatifler ile yapılabilir

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

## Event Binding (Etkinlik Bağlama)

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

## Two-Way Binding (Çift Yönlü Veri Bağlama)

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

## Event Modifiers 

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

## Two way binding

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

Parent, sendData adında bir callback fonksiyonunu Child bileşenine gönderir. Child, butona tıklandığında `sendData("Merhaba Parent!")` çağırarak parent bileşeninin state'ini günceller.

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

createStore ile reactive bir store oluşturulur. Child bileşeni, parent'tan aldığı updateMessage fonksiyonunu (callback) çağırarak store'u günceller.

**Summary**

- Callback ile Props (1. yöntem) → En basit ve performanslı yöntem. Küçük projeler için ideal.
- Context API (2. yöntem) → Birden fazla child bileşeni arasında veri paylaşımı gerektiğinde iyi bir çözüm.
- Store (3. yöntem) → Daha büyük ve yönetilmesi gereken karmaşık state'ler için önerilir. Reaktif olarak takip etmek için kullanılabilir.


# Popup pencere ile ana pencere arasında postMessage API kullanılması

Popup pencere ile ana pencere arasında postMessage API kullanarak veri gönderebilirsiniz:

Ana Sayfa (Home.tsx)

```js
import { createSignal } from "solid-js";

export default function Home() {
  const [formData, setFormData] = createSignal(null);

  // Popup'tan gelen mesajları dinle
  window.addEventListener("message", (event) => {
    if (event.origin !== window.location.origin) return;
    
    // Popup'tan veri aldı
    console.log("Popup'tan gelen veri:", event.data);
    setFormData(event.data);
  });

  return (
    <div>
      <button 
        onClick={() => window.open("/form", "popup", "width=400,height=300")}
      >
        Form Aç
      </button>

      {formData() && (
        <div>
          <h3>Alınan Veriler:</h3>
          <pre>{JSON.stringify(formData(), null, 2)}</pre>
        </div>
      )}
    </div>
  );
}

```

Popup Sayfası (/form)

```js
export default function Form() {
  const handleSave = (e) => {
    e.preventDefault();
    
    const formData = {
      name: document.querySelector("input[name='name']").value,
      email: document.querySelector("input[name='email']").value,
    };

    // Ana pencereye veri gönder
    window.opener.postMessage(formData, window.location.origin);
    
    // Popup'ı kapat
    window.close();
  };

  return (
    <form onSubmit={handleSave}>
      <input type="text" name="name" placeholder="Ad" required />
      <input type="email" name="email" placeholder="Email" required />
      <button type="submit">Kaydet</button>
    </form>
  );
}

```

Akış:
1.Ana sayfa → popup açar
2.Popup'ta form doldurulur
3."Kaydet" tıklandı → postMessage ile veri gönderilir
4.Ana sayfa veri alır ve gösterir
5.Popup kapatılır

Bu şekilde güvenli ve rahat şekilde veri alış-verişi yapabilirsiniz!



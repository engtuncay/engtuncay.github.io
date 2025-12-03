
Source : https://chatgpt.com/c/67b61423-5080-800e-867b-5186bf4e0634

[Back](../readme.md)

---

# Contents

- [Contents](#contents)
  - [1. Proje Oluşturma](#1-proje-oluşturma)
  - [2. Başlangıç](#2-başlangıç)
  - [3. createSignal](#3-createsignal)
  - [4. createEffect](#4-createeffect)
  - [5. createMemo](#5-creatememo)
  - [6. createStore](#6-createstore)
  - [7. Bileşenler](#7-bileşenler)
  - [8. onCleanup](#8-oncleanup)
  - [9. show](#9-show)
  - [10.  For](#10--for)
  - [11.  Suspense](#11--suspense)
  - [12.  Lazy](#12--lazy)
  - [13.  Context](#13--context)
  - [14.  onError](#14--onerror)
  - [15. JSX Özellikleri](#15-jsx-özellikleri)
  - [16. Event Binding (Olay Bağlama)](#16-event-binding-olay-bağlama)
  - [17.  Two-Way Binding (Çift Yönlü Veri Bağlama)](#17--two-way-binding-çift-yönlü-veri-bağlama)
  - [18. Event Modifiers (Etkinlik Modifikatörleri) (Event Bubbling)](#18-event-modifiers-etkinlik-modifikatörleri-event-bubbling)
  - [19. bind (Bağlama) - SolidJS'ye özel değil, ancak alternatifler ile yapılabilir](#19-bind-bağlama---solidjsye-özel-değil-ancak-alternatifler-ile-yapılabilir)
  - [20. Event Binding (Etkinlik Bağlama)](#20-event-binding-etkinlik-bağlama)
  - [17. Two-Way Binding (Çift Yönlü Veri Bağlama)](#17-two-way-binding-çift-yönlü-veri-bağlama)
  - [18 Event Modifiers (Etkinlik Modifikatörleri)](#18-event-modifiers-etkinlik-modifikatörleri)
  - [19 bind (Bağlama) - SolidJS'ye özel değil, ancak alternatifler ile yapılabilir](#19-bind-bağlama---solidjsye-özel-değil-ancak-alternatifler-ile-yapılabilir-1)
- [solid js child to parent communication nasıl yapılır](#solid-js-child-to-parent-communication-nasıl-yapılır)


## 1. Proje Oluşturma

SolidJS, npm veya yarn üzerinden kurulabilir:

```sh
pnpm create solid
```

```sh
npm init solid@latest
# veya
yarn create solid

```

## 2. Başlangıç

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

- index.tsx aşağıdaki render function çalıştırılmalı.

```ts
render(() => <App />, root!);
```

## 3. createSignal

Bir durum (state) oluşturmak için kullanılır:

```js
const [value, setValue] = createSignal(initialValue);

```

- value() - Durumu okur. (getter)
- setValue(newValue) - Durumu günceller. (setter)

## 4. createEffect

Yan etkiler (side effects) için kullanılır:

```js
import { createEffect } from "solid-js";

createEffect(() => {
  console.log("Durum değişti: ", value());
});

```

## 5. createMemo

Hesaplanmış değerler (computed values) oluşturmak için kullanılır:

```js
import { createMemo } from "solid-js";

const doubleCount = createMemo(() => count() * 2);

```

## 6. createStore

Daha karmaşık durum yönetimi için kullanılır:

```js
import { createStore } from "solid-js/store";

const [state, setState] = createStore({ count: 0 });

setState("count", 1); // count değerini güncelle

```

## 7. Bileşenler

Bileşenler JSX içinde tanımlanır:

```js
function MyComponent(props) {
  return <div>{props.message}</div>;
}

```
## 8. onCleanup

Temizlik (cleanup) işlemleri için kullanılır:

```js
import { onCleanup } from "solid-js";

const timer = setInterval(() => console.log("Tick"), 1000);
onCleanup(() => clearInterval(timer));

```

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
      <For each={items}>{(item) => <li>{item}</li>}</For>
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
## 15. JSX Özellikleri

JSX ifadeleri JavaScript ifadeleri gibi yazılır: `{}` içinde.

class yerine className kullanılır.

for yerine htmlFor kullanılır.

## 16. Event Binding (Olay Bağlama)

SolidJS'de olaylar, JSX üzerinde doğrudan bağlanabilir. Olaylar için kullanılan sözdizimi, HTML ile benzerdir, ancak işlevler on ile başlar.

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

## 18 Event Modifiers (Etkinlik Modifikatörleri)

SolidJS, etkinliklere modifikatörler eklemek için basit bir yöntem sunmaz. Ancak, fonksiyonları ve olayları yönetmek için standart JavaScript yöntemleri kullanılabilir.

Örneğin:

Stop Propagation:


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

## 19 bind (Bağlama) - SolidJS'ye özel değil, ancak alternatifler ile yapılabilir

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

Bu örneklerle event binding ve two-way binding konusunda temel bilgileri öğrenmiş oldunuz. 

SolidJS'deki veri bağlama ve etkinlik yönetimi, sade ve güçlüdür. Özellikle manuel bağlama, bileşenlerinizin kontrolünü size tamamen bırakır.

Bu cheatsheet, SolidJS kullanmaya başlamak için temel bilgilere sahip olmanıza yardımcı olacaktır. Her bir özellik hakkında daha fazla detay ve örnekler için SolidJS resmi dokümantasyonunu inceleyebilirsiniz.

# solid js child to parent communication nasıl yapılır

ChatGPT: SolidJS'de child-to-parent iletişimi için birkaç yaygın yöntem vardır. İşte en etkili yollar:

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

Context Tanımlama
tsx
Kopyala
Düzenle
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

⏩ Nasıl Çalışıyor?

Parent, MessageContext.Provider kullanarak message ve setMessage değerlerini tüm child bileşenlere sağlar.

Child, useContext(MessageContext) ile bu değerlere erişebilir ve state'i güncelleyebilir.

3️⃣ Store Kullanımı (Daha Karmaşık Durumlar İçin)

SolidJS'in createStore fonksiyonuyla bir global store oluşturup child bileşenler üzerinden güncellemek mümkündür.

Store Kullanımı
tsx
Kopyala
Düzenle
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
⏩ Nasıl Çalışıyor?

createStore ile reactive bir store oluşturulur.
Child bileşeni, parent'tan aldığı updateMessage fonksiyonunu çağırarak store'u günceller.
Sonuç
Callback ile Props (1. yöntem) → En basit ve performanslı yöntem. Küçük projeler için ideal.
Context API (2. yöntem) → Birden fazla child bileşeni arasında veri paylaşımı gerektiğinde iyi bir çözüm.
Store (3. yöntem) → Daha büyük ve yönetilmesi gereken karmaşık state'ler için önerilir.
Hangi yöntemi kullanacağını projene göre seçebilirsin. 🚀
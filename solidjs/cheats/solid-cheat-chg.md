
Source : https://chatgpt.com/c/67b61423-5080-800e-867b-5186bf4e0634

[Back](../readme.md)

---

- [1. Kurulum](#1-kurulum)
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
- [16. Event Binding (Etkinlik Bağlama)](#16-event-binding-etkinlik-bağlama)
- [17.  Two-Way Binding (Çift Yönlü Veri Bağlama)](#17--two-way-binding-çift-yönlü-veri-bağlama)
- [18. Event Modifiers (Etkinlik Modifikatörleri)](#18-event-modifiers-etkinlik-modifikatörleri)
- [19. bind (Bağlama) - SolidJS'ye özel değil, ancak alternatifler ile yapılabilir](#19-bind-bağlama---solidjsye-özel-değil-ancak-alternatifler-ile-yapılabilir)


## 1. Kurulum
SolidJS, npm veya yarn üzerinden kurulabilir:

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

## 3. createSignal

Bir durum (state) oluşturmak için kullanılır:

```js
const [value, setValue] = createSignal(initialValue);

```

- value() - Durumu okur.
- setValue(newValue) - Durumu günceller.

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

JSX ifadeleri JavaScript ifadeleri gibi yazılır: {} içinde.

class yerine className kullanılır.

for yerine htmlFor kullanılır.

Bu cheatsheet, SolidJS kullanmaya başlamak için temel bilgilere sahip olmanıza yardımcı olacaktır. Her bir özellik hakkında daha fazla detay ve örnekler için SolidJS resmi dokümantasyonunu inceleyebilirsiniz.


## 16. Event Binding (Etkinlik Bağlama)

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

## 18. Event Modifiers (Etkinlik Modifikatörleri)

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

js
Kopyala
Düzenle
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

## 19. bind (Bağlama) - SolidJS'ye özel değil, ancak alternatifler ile yapılabilir

SolidJS'de bind kullanımı olmadığı için iki yönlü veri bağlama işlemi için value ve onInput olayları manuel olarak yönetilmelidir. Ancak, birkaç çözüm önerilebilir.

Çift Yönlü Bağlama için Manual Binding (State ile):
js
Kopyala
Düzenle
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

Bu örneklerle event binding ve two-way binding konusunda temel bilgileri öğrenmiş oldunuz. SolidJS'deki veri bağlama ve etkinlik yönetimi, sade ve güçlüdür. Özellikle manuel bağlama, bileşenlerinizin kontrolünü size tamamen bırakır.

16. Event Binding (Etkinlik Bağlama)
SolidJS'de etkinlikler, JSX üzerinde doğrudan bağlanabilir. Etkinlikler için kullanılan sözdizimi, HTML ile benzerdir, ancak işlevler on ile başlar.

Örnekler:
Click Event:

js
Kopyala
Düzenle
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
Input Change Event:

js
Kopyala
Düzenle
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
Submit Event:

js
Kopyala
Düzenle
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

17. Two-Way Binding (Çift Yönlü Veri Bağlama)

SolidJS'de iki yönlü veri bağlama, React'deki gibi doğrudan value ve onInput olaylarını bağlayarak yapılır. Ancak, two-way binding için manuel olarak bağlama yapılması gerekir. bind gibi bir özellik yoktur.

Örnek:
js
Kopyala
Düzenle
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
Burada, <input /> bileşeni, inputValue state'ini okur ve onInput ile değeri günceller.

18. Event Modifiers (Etkinlik Modifikatörleri)
SolidJS, etkinliklere modifikatörler eklemek için basit bir yöntem sunmaz. Ancak, fonksiyonları ve olayları yönetmek için standart JavaScript yöntemleri kullanılabilir.

Örneğin:

Stop Propagation:

js
Kopyala
Düzenle
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
Prevent Default:

js
Kopyala
Düzenle
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
19. bind (Bağlama) - SolidJS'ye özel değil, ancak alternatifler ile yapılabilir
SolidJS'de bind kullanımı olmadığı için iki yönlü veri bağlama işlemi için value ve onInput olayları manuel olarak yönetilmelidir. Ancak, birkaç çözüm önerilebilir.

Çift Yönlü Bağlama için Manual Binding (State ile):
js
Kopyala
Düzenle
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
Bu örneklerle event binding ve two-way binding konusunda temel bilgileri öğrenmiş oldunuz. SolidJS'deki veri bağlama ve etkinlik yönetimi, sade ve güçlüdür. Özellikle manuel bağlama, bileşenlerinizin kontrolünü size tamamen bırakır.

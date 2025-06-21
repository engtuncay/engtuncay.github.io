
Source : https://chatgpt.com/c/67b671e2-a038-800e-9101-0da05cc7a6c7

[Back](../readme.md)

---

- [Intro](#intro)


# Intro

SolidJS'de child-to-parent iletişimi için birkaç yaygın yöntem vardır. İşte en etkili yollar:

## 1 Props ile Callback Fonksiyonu Gönderme (En Yaygın Yöntem)

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

Parent, sendData adında bir callback fonksiyonunu Child bileşenine gönderir. Child, butona tıklandığında sendData("Merhaba Parent!") çağırarak parent bileşeninin state'ini günceller.

## 2️⃣ Context API Kullanımı (Daha Büyük Projeler İçin)

Context API, state'i global olarak paylaşmak için idealdir. Bu yöntem özellikle birden fazla child bileşen arasında veri paylaşmak için kullanışlıdır.

Context Tanımlama

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

## Sonuç

- Callback ile Props (1. yöntem) → En basit ve performanslı yöntem. Küçük projeler için ideal.

- Context API (2. yöntem) → `Birden fazla bileşen` arasında veri paylaşımı gerektiğinde iyi bir çözüm.

- Store (3. yöntem) → Daha büyük ve yönetilmesi gereken karmaşık state'ler için önerilir.

Hangi yöntemi kullanacağını projene göre seçebilirsin. 🚀


# Intro 2

bileşen function olarak tanımlandığında nasıl olur

ChatGPT:

SolidJS bileşenini function olarak tanımladığında da props'u opsiyonel yapabilir veya varsayılan değer atayabilirsin. İşte iki yöntem:

## 1 Props'u Opsiyonel Yapma (? Kullanımı)
Fonksiyon bileşeninde props'un opsiyonel olması için sendData? kullanılır.

tsx
Kopyala
Düzenle
import { createSignal } from "solid-js";

function ChildComp(props: { sendData?: (data: string) => void }) {
  return (
    <button onClick={() => props.sendData?.("Merhaba Parent!")}>
      Parent'a Gönder
    </button>
  );
}

function Parent() {
  const [message, setMessage] = createSignal("");

  return (
    <div>
      <h2>Child'dan Gelen Mesaj: {message()}</h2>
      <ChildComp sendData={setMessage} />
      <ChildComp /> {/* Prop olmadan da çağırılabilir */}
    </div>
  );
}

export default Parent;
✅ sendData? opsiyonel olduğu için ChildComp bileşeni props olmadan da çağrılabilir.
✅ props.sendData?.(...) ile güvenli çağrı yapıldığından, hata almadan çalışır.

2️⃣ Varsayılan Değer Kullanma
Eğer sendData undefined olduğunda varsayılan bir işlem yapmak istiyorsan:

🎯 Yöntem 1: || Operatörü ile
tsx
Kopyala
Düzenle
function ChildComp(props: { sendData?: (data: string) => void }) {
  const defaultSendData = (data: string) => console.log("Varsayılan:", data);

  return (
    <button onClick={() => (props.sendData || defaultSendData)("Merhaba Parent!")}>
      Parent'a Gönder
    </button>
  );
}
✅ Eğer sendData tanımlıysa onu kullanır, değilse defaultSendData çağrılır.

🎯 Yöntem 2: Destructuring ile Varsayılan Değer Atama
tsx
Kopyala
Düzenle
function ChildComp({ sendData = (msg: string) => console.log("Varsayılan:", msg) }: { sendData?: (data: string) => void }) {
  return (
    <button onClick={() => sendData("Merhaba Parent!")}>
      Parent'a Gönder
    </button>
  );
}
✅ sendData tanımlı değilse, varsayılan fonksiyon atanır ve console.log ile mesaj yazdırılır.

📌 Sonuç
🔹 Opsiyonel yapmak istiyorsan: sendData? ve props.sendData?.(...) kullan.
🔹 Varsayılan bir fonksiyon belirlemek istiyorsan: || defaultFunction veya destructuring ile sendData = defaultFunction kullan.

Her iki yöntem de performans açısından hızlı ve SolidJS için uygundur. 🚀
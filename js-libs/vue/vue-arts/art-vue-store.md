
- [Me](#me)
- [AI Assistant](#ai-assistant)
  - [1. **Store Tanımı ve `defineStore`**](#1-store-tanımı-ve-definestore)
  - [2. **State**](#2-state)
  - [3. **Actions**](#3-actions)
    - [`actions` Nedir?](#actions-nedir)
    - [a) **`getCart()`**](#a-getcart)
    - [b) **`addToCart()`**](#b-addtocart)
    - [c) **`updateCartItem()`**](#c-updatecartitem)
    - [d) **`removeCartItem()`**](#d-removecartitem)
  - [4. **Kullanımı**](#4-kullanımı)
  - [5. **Notiflix ve Axios Kütüphaneleri**](#5-notiflix-ve-axios-kütüphaneleri)
  - [Kısaca Pinia ile Store Yönetimi:](#kısaca-pinia-ile-store-yönetimi)
- [Me](#me-1)
- [AI Assistant](#ai-assistant-1)
  - [Store'u Daha Yakından İnceleyelim:](#storeu-daha-yakından-i̇nceleyelim)
    - [1. **Reaktif (Reactive) Yapı**](#1-reaktif-reactive-yapı)
    - [2. **Global Erişim**](#2-global-erişim)
    - [3. **State Yönetimindeki Katı Kurallar**](#3-state-yönetimindeki-katı-kurallar)
    - [4. **Store Reaktif Ama Daha Güçlüdür**](#4-store-reaktif-ama-daha-güçlüdür)
  - [Statik Değişken ve Store Arasındaki Farklar](#statik-değişken-ve-store-arasındaki-farklar)
  - [Özet](#özet)

--- Question 1

## Me
buradaki store kullanımı açıklarmısın ?

## AI Assistant
Bu kodda **Pinia** kullanılarak bir Vue uygulaması için bir "Cart" (Sepet) mağazası tanımlanmış. Vue Store, bir Vue.js projesinde global state yönetimi için kullanılır ve Pinia, Vuex'in modern bir alternatifi olarak geliştirilmiştir. Aşağıda kodu adım adım açıklıyorum:

---

### 1. **Store Tanımı ve `defineStore`**

Pinia'da store'ları tanımlamak için `defineStore` fonksiyonu kullanılır. Bu fonksiyon, bir store'un adını, state'ini, actions'larını ve gerekirse getters'larını tanımlamaya olanak sağlar:

```typescript
export const useCartStore = defineStore("cart", {
    state: () => ({
        cart: null as CartResponse | null,
    }),
    actions: {
        // Buraya action'lar gelecektir.
    }
});
```


- `defineStore("cart", {...})`: Burada *"cart"* adında bir store tanımlanmıştır.
- `state`: Store'un durumunu (state) tutar. Bu durumda `cart` isminde bir state vardır ve tipi ya **CartResponse** tipi ya da `null` olabilir.
  - **State**, global bir değişken gibi tüm bileşenlerden erişilebilir.
- `actions`: State'i değiştirebilecek, API çağrıları ya da herhangi bir asenkron işlem yapabilecek fonksiyonları barındırır.

---

### 2. **State**

State kısmında sepetle ilgili temel bilgi tutuluyor.

```typescript
state: () => ({
    cart: null as CartResponse | null,
}),
```


- `cart`: Uygulamanızdaki kullanıcı sepeti. API'den gelen veriler burada saklanır.

---

### 3. **Actions**

#### `actions` Nedir?
Actions, state üzerinde değişiklikler yapmak için kullanılır ve genellikle dış kaynaklarla (örneğin bir API) iletişim kurar. **Asenkron işlemler** action'lar içinde yapılır. Bu kodda dört farklı action tanımlanmış:

#### a) **`getCart()`**
Bu action, kullanıcı sepetini (cart) sunucudan (`/cart`) alır ve state'e kaydeder.

```typescript
async getCart() {
    try {
        await $axios.get("/cart").then((response) => {
            if (response.data.status === 200) {
                this.cart = response.data.data;
            } else {
                Notiflix.Notify.failure(response.data.message);
            }
        });
    } catch (error) {
        console.error("Error fetching cart:", error);
    }
}
```


- **Ne yapar?**
  1. `$axios` ile `GET` isteği yapılarak, sunucudan (API) sepet bilgisi alınır.
  2. Eğer `status === 200` ise (`if (response.data.status === 200)`), API'den dönen veri (`response.data.data`) `cart` state'ine atanır.
  3. Aksi takdirde hata mesajı bildirilir (`Notiflix.Notify.failure` ile).

---

#### b) **`addToCart()`**
Bu action, seçilen ürünü sepete eklemek için API'yi çağırır ve ardından güncellenmiş sepeti alır.

```typescript
async addToCart(urnLNGKOD: string, quantity: number, urnTXTBIRIM: "AD" | "PK" | "KL", notiflix: boolean = true) {
    try {
        const response = await $axios.post("/cart/add", {
            urnLNGKOD,
            quantity,
            urnTXTBIRIM
        });
        if (response.data.status === 200) {
            await this.getCart();
            if (!notiflix) return
            Notiflix.Notify.success(response.data.message);
        } else {
            Notiflix.Notify.failure(response.data.message);
        }
    } catch (error) {
        console.error("Error adding to cart:", error);
    }
}
```


- `urnLNGKOD`: Ürün ID'sini temsil ediyor (string).
- `quantity`: Sepete eklenmek istenen ürün miktarı.
- `urnTXTBIRIM`: Ürünün birim türünü ifade eder: (örneğin **adet** (*AD*), **paket** (*PK*), **kilo** (*KL*)).
- 
- **Ne yapar?**
  1. **POST** isteği ile `/cart/add` endpoint'ine ürün detaylarını gönderir.
  2. Eğer durum `200` ise, `getCart()` action'ını çağırarak sepeti günceller.
  3. Başarılı bir işlem olması durumunda kullanıcıya bilgi mesajı gösterir (*Notiflix* kütüphanesi kullanılarak).

---

#### c) **`updateCartItem()`**

Bu action, sepette bulunan bir ürünün miktarını günceller:

```typescript
async updateCartItem(cart_id: number, quantity: number) {
    try {
        const response = await $axios.post(`cart/item/${cart_id}`, { quantity });
        if (response.data.status === 200) {
            await this.getCart();
            Notiflix.Notify.success(response.data.message);
        } else {
            Notiflix.Notify.failure(response.data.message);
        }
    } catch (error) {
        console.error("Error updating cart item:", error);
    }
}
```


- `cart_id`: Sepette değişiklik yapılmak istenen ürünün ID'si.
- `quantity`: Yeni ürün miktarı.
- **Ne yapar?**
  1. `/cart/item/:cart_id` endpoint'ine ürün miktarını güncellemek için `POST` isteği gönderir.
  2. Başarılı olursa, sepeti günceller (`getCart()`).

---

#### d) **`removeCartItem()`**
Sepetten bir ürünü siler.

```typescript
async removeCartItem(cart_id: string, notiflix: boolean = true) {
    try {
        const response = await $axios.delete(`cart/item/${cart_id}`);
        if (response.data.status === 200) {
            await this.getCart();
            if (!notiflix) return
            Notiflix.Notify.success(response.data.message);
        } else {
            Notiflix.Notify.failure(response.data.message);
        }
    } catch (error) {
        console.error("Error removing cart item:", error);
    }
}
```


- `cart_id`: Silinmek istenen ürün ID'si.
- **Ne yapar?**
  1. `/cart/item/:cart_id` endpoint'ine `DELETE` isteği gönderir.
  2. Başarılı olursa, sepet güncellenir ve kullanıcıya bilgi mesajı gösterilir.

---

### 4. **Kullanımı**
Bu **store** uygulama genelindeki tüm bileşenlerden kullanılabilir. Örneğin:

```typescript
import { useCartStore } from "@/store/cart";

const cartStore = useCartStore();

// Sepeti getir
await cartStore.getCart();

// Ürün ekle
await cartStore.addToCart("12345", 3, "AD");

// Ürünü güncelle
await cartStore.updateCartItem(1, 5);

// Ürünü sil
await cartStore.removeCartItem("12345");
```


- **State erişimi**:
```typescript
console.log(cartStore.cart); // Sepet (state)
```


---

### 5. **Notiflix ve Axios Kütüphaneleri**
- **Notiflix**: Kullanıcıya görsel bildirimler göstermek için kullanılıyor. Örneğin:
  - `Notiflix.Notify.success`: Başarılı işlem mesajı.
  - `Notiflix.Notify.failure`: Hata mesajı.
- **Axios (`$axios`)**: HTTP isteklerini göndermek için kullanılan bir araçtır. Burada API çağrıları için kullanılmış.

---

### Kısaca Pinia ile Store Yönetimi:
Bu kod, Pinia kullanarak bir alışveriş sepeti sistemini global olarak yönetmek için bir örnek oluşturuyor. Uygulamanın her yerinden sepete erişim, değişiklik ve API entegrasyonu sağlamak amacıyla tasarlanmış. Mesela bir ürün listeleme bileşeninden ürün eklemek istediğinizde `addToCart` metodu, bir sepet bileşeninden ürünleri göstermek için de `cart` state'i kullanılabilir.


--- Question 2

## Me
store dediğimiz aslında reactive bir statik değişken veya referans gibi değil mi

## AI Assistant
Evet, tam olarak öyle düşünebilirsin! Vue'daki **store** kavramı (örneğin Pinia veya Vuex ile kullandığın), uygulama genelinde kullanılabilen **reactive** bir state yönetim yapısıdır. Teknik olarak, store'u bir **reactive global state** veya bir tür **paylaşılan referans** olarak tanımlayabiliriz. 

Vue'nun reaktif sistemine dayanarak çalışır, yani store'da tutulan verilerde (state) bir değişiklik olduğunda ilgili bileşenler otomatik olarak güncellenir.

---

### Store'u Daha Yakından İnceleyelim:
Pinia (ve diğer state yönetim araçları) ile tanımladığın store bir bileşenden diğerine aktarılabilir ve bunları yöneten araçlarla birlikte kullanılır. Ancak **reaktif olma** ve **global erişim** gibi bazı temel farklar vardır.

#### 1. **Reaktif (Reactive) Yapı**
Vue'nun normal `reactive()` veya `ref()` özelliklerine benzer şekilde, store state'i de reaktiftir. Yani, bir bileşen içinde store'daki bir state'e bağlıysanız, bu veriler herhangi bir yerde değiştirildiğinde, bağlı bileşen de otomatik olarak güncellenir.

**Örnek:**

```typescript
import { useCartStore } from "@/store/cart";

const cartStore = useCartStore();

// Store'daki "cart" verisine erişim
console.log(cartStore.cart); 

// Store bir yerden güncellendiğinde:
await cartStore.getCart(); // API'den yeni veri çekiliyor
console.log(cartStore.cart); // Bu otomatik olarak güncellenmiş olacak
```


Diğer bileşenlerde de otomatik olarak güncellenmiş veriye erişebilirsin, çünkü `cartStore.cart` reaktif bir yapıdır.

---

#### 2. **Global Erişim**
Normalde Vue bileşenleri arasında veri aktarmak için `props` ve `emit` yöntemlerini kullanırız. Ancak veri birden fazla bileşen arasında paylaşılacaksa, bu yöntemler karmaşık bir yapıya yol açabilir. Store, global bir değişken gibi davranarak bu sorunu çözer.

**Prop aktarımı olmadan state kullanımı:**

```typescript
import { useCartStore } from "@/store/cart";

const cartStore = useCartStore();

// Yeni ürün ekle
await cartStore.addToCart("12345", 3, "AD");

// Sepeti görüntüle
console.log(cartStore.cart);
```


Farklı bir bileşende:

```typescript
import { useCartStore } from "@/store/cart";

const cartStore = useCartStore();

console.log(cartStore.cart); // global olarak güncellenmiş state
```


Her iki bileşen de aynı **store**'u kullanır ve aynı reaktif state'e sahiptir. Yani bir bileşen veriyi güncellemişse, diğer bileşen otomatik olarak bundan haberdar olur.

---

#### 3. **State Yönetimindeki Katı Kurallar**
Store, klasik "statik değişken" davranışından farklı olarak bazı kurallar içerir:
1. **Doğrudan Güncelleme Yasağı:** 
   Store'daki **state**'i doğrudan değiştiremezsin. Bunun yerine, bir **action** kullanman gerekir.
   
   **Doğrudan değişim (HATALI):**
```typescript
const cartStore = useCartStore();
   cartStore.cart = { id: 1, total: 10 }; // Hata! State korunmaz.
```


   **Action ile değişim (DOĞRU):**
```typescript
const cartStore = useCartStore();
   await cartStore.getCart(); // Güncellenmiş state'i çek
```


2. **Reaktif Sistem:** 
   Vue'nun reaktif sistemi ile entegredir. Bu sayede değişiklikler otomatik olarak bileşenlere iletilir.

---

#### 4. **Store Reaktif Ama Daha Güçlüdür**
Vue'nun `ref()` veya `reactive()` yöntemleri yalnızca bir bileşen içinde kullanılır. Ancak store'lar bu reaktifliği uygulamanın tamamına taşır. State yönetim araçları (örneğin Pinia) ile:
- Uygulamanın tamamında reaktif bir veri yapısını kontrol edebilirsin.
- Veri (state) üzerinde çalışan **getter** ve **action** gibi büyük yapılar oluşturabilirsin.

---

### Statik Değişken ve Store Arasındaki Farklar
| **Statik Değişken**           | **Pinia Store**                                                                                          |
|-------------------------------|----------------------------------------------------------------------------------------------------------|
| Sadece bir bellekte tutulur (genellikle merkezi bir yerde kullanılmaz). | Global olarak tüm bileşenlere reaktif olarak bağlanabilir.                                              |
| Reaktif değildir. Bir değişiklik olduğunda diğer yerlere yansımaz.  | Reaktiftir, değişiklikler otomatik olarak bileşenlere yansır.                                          |
| Veri güncelleme mantığı yoktur. Doğrudan değiştirilir.              | State sadece actions ile değiştirilebilir. Bu, iyi bir kontrol ve hata önleme mekanizması sağlar.      |
| Büyük projelerde yönetimi zorlaşır.                                | Büyük projelere ölçeklenebilir bir state yönetim çözümü sunar.                                         |

---

### Özet
Evet, **store**'u bir nevi **reactive global bir değişken veya referans** gibi görebilirsin. Ancak Pinia veya Vuex gibi state yönetim araçlarının getirdiği prensipler (örneğin **action kullanımı**, **doğrudan değişim yasaklama**) sayesinde her şey kontrollü ve hatasız bir şekilde işleyebilir. Reactivity, global erişim ve yönetim kolaylığı bir araya gelerek uygulama geliştirmeyi çok daha pratik hale getirir.

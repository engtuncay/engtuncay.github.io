
- [Me](#me)
- [AI Assistant](#ai-assistant)
  - [1. **Request Interceptor (İstek Yakalama)**](#1-request-interceptor-i̇stek-yakalama)
  - [2. **Response Interceptor (Yanıt Yakalama)**](#2-response-interceptor-yanıt-yakalama)
  - [3. **Genel Kullanım Durumu**](#3-genel-kullanım-durumu)
- [Me](#me-1)
- [AI Assistant](#ai-assistant-1)
  - [1. **Error Callback'in Kullanımı**](#1-error-callbackin-kullanımı)
  - [2. **Neden `error callback` kullanılıyor?**](#2-neden-error-callback-kullanılıyor)
    - [a. **Global Özel Davranış Ekleme**](#a-global-özel-davranış-ekleme)
    - [b. **Retry Mekanizması (Özellikle `request` tarafında)**](#b-retry-mekanizması-özellikle-request-tarafında)
    - [c. **Uygulama Spesifik Kullanım Durumları**](#c-uygulama-spesifik-kullanım-durumları)
  - [3. **Hata Yakalama Neden Yeniden Yönlendiriliyor?**](#3-hata-yakalama-neden-yeniden-yönlendiriliyor)
  - [Alternatif: Basitleştirilmiş Yapı](#alternatif-basitleştirilmiş-yapı)
  - [Genel Özet:](#genel-özet)


## Me
Bu kodu açıklar mısın ?


```typescript
$axios.interceptors.request.use(
  (config) => {
    const authStore = useAuthStore();
    const token = authStore.token;
    if (token) {
      config.headers['Authorization'] = `Bearer ${token}`;
    }

    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);
$axios.interceptors.response.use(
  (response) => response,
  (error) => {
    if (error.response && error.response.status === 401) {
      const authStore = useAuthStore();
      authStore.logout();
    }
    return Promise.reject(error);
  }
);
```


## AI Assistant
Bu kod, Axios HTTP istek kütüphanesi üzerine özelleştirilmiş `$axios` örneği üzerinde `request` ve `response` **interceptor (yakalayıcı)** kullanımı için iki ayarlamayı göstermektedir. Bu ayarlar, HTTP istek gönderilmeden veya yanıt alınmadan önce ya da sonra özelleştirilmiş işlemler gerçekleştirilmesine olanak sağlar. Şimdi bu kodun anlamını açıklayalım:

### 1. **Request Interceptor (İstek Yakalama)**

```typescript
$axios.interceptors.request.use(
  (config) => {
    const authStore = useAuthStore();
    const token = authStore.token;
    if (token) {
      config.headers['Authorization'] = `Bearer ${token}`;
    }

    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);
```


Bu interceptor, bir HTTP isteği gönderilmeden hemen önce çalışır:
- `useAuthStore()` ile Pinia'nın `authStore` isimli veri deposu kullanılır. Bu depodan kullanıcı oturum bilgileri (`token`) alınır.
- Eğer bir **token** mevcutsa (`authStore.token`), istek başlığına (`headers`) `Authorization: Bearer {token}` eklenir. Bu, genelde kullanıcının kimliğini doğrulamak için kullanılır.
- Eğer bir hata oluşursa, bu hata bir `Promise.reject()` ile yakalanır ve üst katmana iletilir.

Bu mekanizma ile tüm istekler otomatik olarak yetkilendirme bilgilerine eklenir.

---

### 2. **Response Interceptor (Yanıt Yakalama)**

```typescript
$axios.interceptors.response.use(
  (response) => response,
  (error) => {
    if (error.response && error.response.status === 401) {
      const authStore = useAuthStore();
      authStore.logout();
    }
    return Promise.reject(error);
  }
);
```


Bu interceptor, bir HTTP yanıtı alındığında çalışır:

- Eğer yanıt başarılıysa (`response`), olduğu gibi geri döner.
- Eğer hata oluşursa ve HTTP hata kodu `401` ise (yetkisiz erişim):
  - `authStore.logout()` metodu tetiklenir. Bu, kullanıcının oturumunu kapatır:
    - `token`, `tokenExpiry` bilgileri sıfırlanır.
    - Kullanıcı verileri tarayıcıdaki `localStorage`'dan silinir.
    - Kullanıcı `/login` rotasına yönlendirilir.
- Son olarak, hata aynı şekilde `Promise.reject()` ile üst katmana iletilir.

---

### 3. **Genel Kullanım Durumu**

- Bu kod, genelde oturum yönetimi ve API isteklerinde merkezi bir kontrol sağlamak için kullanılır.
- **Request Interceptor** yetkilendirme (Authorization) ekler.
- **Response Interceptor** yetkisiz bir erişim olduğunda (401), oturumu kapatıp kullanıcıyı giriş sayfasına yönlendirir.

Bu yapı, özellikle güvenlik gerektiren uygulamalar için kritik bir öneme sahiptir. Örneğin:
- **Token** olmadan backend API istekleri reddedilecek.
- Yetkisiz bir erişim durumunda kullanıcı yeniden giriş yapmak zorunda kalacak.

--- 

Eğer bu yapı ile ilgili daha fazla açıklamaya ya da geliştirme önerilerine ihtiyacınız varsa, çekinmeden sorabilirsiniz! 😊

## Me
- Eğer bir hata oluşursa, bu hata bir `Promise.reject()` ile yakalanır ve üst katmana iletilir. zaten axios ile hataları yakalıyoruz aslında , ne gerek var ki error callback'e

## AI Assistant
Haklı bir nokta üzerinde duruyorsunuz. Axios, doğal olarak ortaya çıkan hataları `catch` veya `try...catch` bloklarında yakalamanıza olanak tanır, dolayısıyla `error callback` (hata yakalama geri çağrısı) bu tür durumlarda isteğe bağlı hale gelebilir. Ancak yine de `error callback`'i kullanmanın belli avantajları bulunuyor. İşte bu konuyu detaylandıran açıklamalar:

### 1. **Error Callback'in Kullanımı**

```typescript
$axios.interceptors.request.use(
  (config) => {
    const authStore = useAuthStore();
    const token = authStore.token;

    if (token) {
      config.headers['Authorization'] = `Bearer ${token}`;
    }

    return config;
  },
  (error) => {
    return Promise.reject(error); // Bu satır
  }
);
```


`Promise.reject(error)` kısmı, doğrudan oluşan hatanın üst katmana (yani çağıran tarafın `catch` bloğuna) iletilmesini sağlıyor. Bu önemli olabilir çünkü:

- **Global hata yönetimi sağlanabilir:** Burada tanımlanan `error callback`, yalnızca mevcut interceptor çalışırken oluşan hataları işlemek için kullanılır, ancak bu hatalar bir "tek hata yakalama noktası"na aktarılabilir (`Promise.reject` yoluyla).
- **İsteğe bağlı özelleştirme:** Hangi hataların farklı şekillerde ele alınması gerektiği konusunda kontrol sağlanabilir.

Eğer `Promise.reject` ile hata yeniden iletilmezse, bu hatalar Axios'un hata yönetim mekanizmalarından tamamen saklanır ve uygulamanız düzgün çalışmayabilir.

---

### 2. **Neden `error callback` kullanılıyor?**

Her ne kadar Axios doğal olarak hataları işler olsa da, birkaç özel kullanım durumu `error callback`'in kullanılmasını gerektirebilir:

#### a. **Global Özel Davranış Ekleme**
Herhangi bir istek sırasında oluşan hatalar için ortak bir davranışınızı merkezi olarak `interceptor`lara taşıyabilirsiniz. Bazı örnekler:
- Belirli hata durumunu loglama.
- `Snackbar`, `Toaster` veya benzeri hata mesajı gösterme.
- Gelişmiş hata yönetimi stratejileri için merkezi bir günceleme oluşturma.

Örnekte aşağıdaki kod, global hata yönetimi kullanımı için açıktır:
```typescript
(error) => {
  console.error("Hata detayları:", error);
  return Promise.reject(error);
}
```


#### b. **Retry Mekanizması (Özellikle `request` tarafında)**
Bazı durumlarda, bir hata olsa bile isteğin tekrar denenmesi gerekebilir. `error callback` ile bu tarz olaylar kolayca ele alınabilir:
```typescript
$error.interceptors.request.use(
  (config) => {
    // Normal ayarlar
    return config;
  },
  (error) => {
    // Örnek: Retry mekanizması ekleme
    if (error.config && !error.config.__isRetryRequest) {
      error.config.__isRetryRequest = true;
      return $axios.request(error.config);
    }
    return Promise.reject(error);
  }
);
```


#### c. **Uygulama Spesifik Kullanım Durumları**
Farklı türden talepler için merkezi olmayan bazı hata yönetiminin uygulanması gerekebilir. Örneğin 500-599 arası hata kodları için sadece loglama yapmak isteyebilirsiniz:
```typescript
(error) => {
  if (error.response?.status >= 500) {
    console.log("Server hatası:", error.response.status);
  }
  return Promise.reject(error);
}
```


---

### 3. **Hata Yakalama Neden Yeniden Yönlendiriliyor?**

Bir `Promise.reject()` ya da başarılı yanıtın `return response` ile iletilmesi, hatayı kontrole açık hale getirdiği için önemlidir. Aksi takdirde:

- Hataları yapan istek çağırıcıları herhangi bir kontrol fırsatına sahip olamaz.
- Eğer global hata yönetimi veya özelleştirilmiş Axios yapılandırması olmadan bırakılırsa, sorunlar sessizce gözden kaçabilir veya kontrolsüz hatalar uygulamanızda crash'e yol açabilir.

---

### Alternatif: Basitleştirilmiş Yapı

Eğer yukarıdaki `error callback`'e (hata geri çağrısına) ihtiyacınız yoksa, aşağıdaki gibi kullanılabilir:
```typescript
$axios.interceptors.request.use(
  (config) => {
    const authStore = useAuthStore();
    const token = authStore.token;
    if (token) config.headers['Authorization'] = `Bearer ${token}`;
    return config;
  } // Hata callback olmadan
);
```


---

### Genel Özet:

Eğer Axios'un varsayılan hata yönetim mekanizmaları sizin ihtiyaçlarınıza tamamen uyarsa, `error callback`'i çıkartabilirsiniz. Ancak, aşağıdaki durumlar mevcutsa bırakmanız tavsiye edilir:
- Global bir hata yönetim stratejisi kurmak isterseniz.
- Özel aksiyonlar (loglama, yeniden deneme, kullanıcı mesajları gibi) gerçekleştirmek için bir yönetim noktası gerekli.
- Güvenilir bir "tek hata noktası" yaratmak istiyorsanız.

Yani, ihtiyaçlarınıza bağlı olarak bu callback'ler opsiyoneldir veya kritik hale gelebilir.

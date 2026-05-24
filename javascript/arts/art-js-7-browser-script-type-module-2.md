
- [`<script type="module">`](#script-typemodule)
  - [Özellikleri:](#özellikleri)
  - [Ne Zaman Kullanılır:](#ne-zaman-kullanılır)
  - [Örnek:](#örnek)
  - [Avantajları:](#avantajları)
  - [Destek:](#destek)


## `<script type="module">` 

`<script type="module">` etiketi HTML'de, JavaScript kodunu *ES6 modülleri* (ES Modules) olarak çalıştırmak için kullanılır. Bu özellik, modern JavaScript kodunu daha düzenli bir şekilde organize etmek, kodun farklı dosyalara bölünmesine olanak tanımak ve başka dosyaları **import (ithal etmek)** gibi işlemleri güvenli bir şekilde gerçekleştirmek için geliştirilmiştir.

### Özellikleri:

1. **Modüler Yapı**:
   - JavaScript kodu başka dosyalara bölünebilir ve gerektiğinde bir dosyadan diğerine `import` mekanizmasıyla aktarılabilir.
   - Örneğin:

```javascript
// module.js
     export function greet(name) {
         console.log(`Merhaba, ${name}!`);
     }
```


```html
<!-- index.html -->
     <script type="module">
         import { greet } from './module.js';
         greet('Ahmet'); // Çıktı: Merhaba, Ahmet!
     </script>
```


1. **Otomatik Modül Çalıştırma**:
   - `type="module"` kullanıldığında tarayıcı, her dosyayı otomatik olarak bir **modül kapsamı** içinde çalıştırır. Bu, global değişkenlerin modüller arasında karışmasını engeller.
   - Yani, klasik `<script>` etiketiyle doğrudan küresel etkiye sahip olabilecek kodlardan farklı olarak modüller, kendi kapsamlarına sahiptir.

2. **Varsayılan Strict Mode**:
   - Modüller otomatik olarak *strict mode* ile çalışır. Bu, JavaScript'te daha güvenli ve hataları önleyici bir moddur.

3. **Asenkron Yükleme**:
   - Modül dosyaları asenkron şekilde yüklenir, yani aynı anda birden çok modül indirilebilir ve işler daha hızlı hale gelir.

4. **CORS İle Yükleme**:
   - Modül dosyaları yüklenirken standart *CORS (Cross-Origin Resource Sharing)* politikaları geçerlidir. Bu nedenle, modüllerin çalışması için doğru bir şekilde servis edilen dosyalar kullanıldığından emin olunmalıdır.

### Ne Zaman Kullanılır:

- Daha büyük projelerde, kodu modüler bir yapıda düzenlemek istiyorsanız,
- Kodunuzu yeniden kullanılabilir hale getirmek için **export** ve **import** kavramlarını kullanmak istiyorsanız,
- Daha modern bir JavaScript çalışma ortamı kullanıyorsanız.

### Örnek:

```html
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Script Module Örneği</title>
</head>
<body>
    <script type="module">
        // Bir modülden veri almak
        import { greet } from './module.js';

        greet('Dünya'); // Çıktı: Merhaba, Dünya!
    </script>
</body>
</html>
```


**`module.js`** dosyası:

```javascript
export function greet(name) {
    console.log(`Merhaba, ${name}!`);
}
```


### Avantajları:
- Kodun yeniden kullanımı kolaylaşır.
- Daha düzenli bir yapı sağlar.
- ES modu sayesinde tarayıcıda yerel olarak modern özellikleri kullanma imkanı tanır.

### Destek:
Modern tarayıcıların tümü bu özelliği destekler (Chrome, Firefox, Safari vb.). Ancak eski tarayıcılarda çalıştırmak için bir *bundler* (ör. Webpack, Vite) veya bir dönüşüm aracı (Babel) kullanmak gerekebilir.

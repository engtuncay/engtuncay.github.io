
- [Component Oluşturma Yöntemleri](#component-oluşturma-yöntemleri)
  - [1. Global Component (Global Bileşen)](#1-global-component-global-bileşen)
  - [2. Local Component (Yerel Bileşen)](#2-local-component-yerel-bileşen)
  - [3. Single File Component (SFC) - `.vue` Dosyası](#3-single-file-component-sfc---vue-dosyası)
  - [4. Render Fonksiyonu ile Component](#4-render-fonksiyonu-ile-component)
  - [5. Functional Component (Fonksiyonel Bileşen)](#5-functional-component-fonksiyonel-bileşen)
- [Composition ve Options Api](#composition-ve-options-api)
  - [1. Options API (Obje Tabanlı Yöntem)](#1-options-api-obje-tabanlı-yöntem)
  - [2. Composition API (Fonksiyon Tabanlı Yöntem)](#2-composition-api-fonksiyon-tabanlı-yöntem)
- [Component Refs On Vs Code](#component-refs-on-vs-code)
  - [1. Sağ Tık → “Find All References” (Tüm Başvuruları Bul)](#1-sağ-tık--find-all-references-tüm-başvuruları-bul)
  - [2. “Go to Definition” (Tanıma Git)](#2-go-to-definition-tanıma-git)
  - [3. Proje Genelinde Arama](#3-proje-genelinde-arama)
  - [4. Vetur veya Volar Eklentisi](#4-vetur-veya-volar-eklentisi)
- [Component Refs 2](#component-refs-2)
  - [1. **Script Kısmında**](#1-script-kısmında)
  - [2. **Template Kısmında**](#2-template-kısmında)
  - [3. **Name Alanı**](#3-name-alanı)
  - [**Kısacası:**](#kısacası)

## Component Oluşturma Yöntemleri

vue.js component oluşturma yöntemleri nelerdir ? avantajları nedir ?

GitHub Copilot: Vue.js'de component oluşturmanın başlıca yöntemleri şunlardır:

### 1. Global Component (Global Bileşen)
```javascript
Vue.component('my-component', {
  // options
});
```
**Avantajları:**
- Uygulamanın her yerinde kullanılabilir.
- Tek seferde tanımlanır, tekrar tekrar import etmeye gerek yoktur.

**Dezavantajları:**
- Büyük projelerde isim çakışmalarına yol açabilir.
- Gereksiz yere tüm uygulamaya yük bindirebilir.

---

### 2. Local Component (Yerel Bileşen)
```javascript
export default {
  components: {
    MyComponent
  }
}
```
**Avantajları:**
- Sadece ilgili parent component içinde kullanılır.
- Daha iyi kapsülleme ve yönetim sağlar.
- İsim çakışmalarını önler.

---

### 3. Single File Component (SFC) - `.vue` Dosyası
```vue
// MyComponent.vue
<template>
  <div>...</div>
</template>
<script>
export default { /* options */ }
</script>
<style>
/* styles */
</style>
```
**Avantajları:**
- Template, script ve stil bir arada, okunabilirlik ve bakım kolaylığı sağlar.
- Modern Vue projelerinde standarttır.
- Otomatik tip kontrolü ve derleme desteği sunar.

---

### 4. Render Fonksiyonu ile Component
```javascript
export default {
  render(h) {
    return h('div', 'Hello');
  }
}
```
**Avantajları:**
- Dinamik ve programatik olarak içerik oluşturmak için uygundur.
- Şablonun yetmediği durumlarda esneklik sağlar.

---

### 5. Functional Component (Fonksiyonel Bileşen)
```javascript
export default {
  functional: true,
  render(h, ctx) {
    return h('div', ctx.props.msg);
  }
}
```
**Avantajları:**
- Durumsuz ve hızlıdır.
- Hafif bileşenler için idealdir.

---

Her yöntemin avantajı, projenin büyüklüğüne, yönetim şekline ve kullanım amacına göre değişir. Modern Vue projelerinde genellikle SFC (Single File Component) yöntemi tercih edilir.

## Composition ve Options Api

SFC de composition ve obje türünde component oluşturma yöntemleri vardı

GitHub Copilot: Evet, doğru! Vue Single File Component (SFC) içinde iki ana component oluşturma yaklaşımı vardır:

---

### 1. Options API (Obje Tabanlı Yöntem)

```vue
<script>
export default {
  data() {
    return {
      count: 0
    }
  },
  methods: {
    increment() {
      this.count++
    }
  }
}
</script>
```
**Avantajları:**
- Öğrenmesi kolaydır, Vue 2’den alışık olanlar için uygundur.
- Küçük ve orta ölçekli projelerde hızlı geliştirme sağlar.

---

### 2. Composition API (Fonksiyon Tabanlı Yöntem)

```vue
<script setup>
import { ref } from 'vue'

const count = ref(0)
function increment() {
  count.value++
}
</script>
```
veya klasik şekilde:
```vue
<script>
import { ref } from 'vue'
export default {
  setup() {
    const count = ref(0)
    function increment() {
      count.value++
    }
    return { count, increment }
  }
}
</script>
```
**Avantajları:**
- Kodun tekrar kullanılabilirliğini ve okunabilirliğini artırır.
- Büyük ve karmaşık projelerde daha iyi mantık ayrımı sağlar.
- TypeScript ile daha uyumludur.

---

**Özet:**  
- **Options API:** Geleneksel, kolay, küçük projeler için ideal.  
- **Composition API:** Modern, esnek, büyük projeler ve tekrar kullanılabilir mantık için önerilir.  
Her iki yöntem de SFC içinde kullanılabilir ve birlikte de çalışabilirler.

engtuncay: options Api export default dan sonra component ismini yazabilir miyiz

GitHub Copilot: Hayır, Vue Options API’de `export default` ifadesinden sonra doğrudan component ismini yazamazsınız. Yani aşağıdaki gibi bir kullanım **yanlıştır**:

```javascript
export default MyComponent = {
  // Hatalı kullanım!
}
```

Doğru kullanım şu şekildedir:

```javascript
export default {
  // Options API özellikleri burada
}
```

Eğer component’e bir isim vermek isterseniz, obje içinde `name` alanını kullanmalısınız:

```javascript
export default {
  name: 'MyComponent',
  // diğer özellikler
}
```

**Özet:**  
`export default` ifadesinden sonra doğrudan component ismi yazılmaz, component ismi obje içinde `name` ile belirtilir.

## Component Refs On Vs Code

Bu component nerelerede kullanıldığını vscode nasıl bulabilirim

GitHub Copilot: VS Code’da bir Vue componentinin nerelerde kullanıldığını bulmak için şu yöntemleri kullanabilirsiniz:

### 1. Sağ Tık → “Find All References” (Tüm Başvuruları Bul)
- Component dosya adının veya `name` property'sinin üzerine sağ tıklayın.
- **Find All References** seçeneğini tıklayın.
- VS Code, projenizde bu componentin kullanıldığı tüm yerleri listeler.

### 2. “Go to Definition” (Tanıma Git)
- Component adının üzerine gelin ve `F12` tuşuna basın veya sağ tıklayıp **Go to Definition** seçin.
- Componentin tanımlandığı yere hızlıca gidebilirsiniz.

### 3. Proje Genelinde Arama
- `Ctrl + Shift + F` tuşlarına basın.
- Component adını (örneğin, `<MyComponent>` veya `'MyComponent'`) arama kutusuna yazın.
- Tüm dosyalarda bu componentin geçtiği yerler listelenir.

### 4. Vetur veya Volar Eklentisi
- Vue projelerinde **Vetur** veya **Volar** eklentileri kuruluysa, referans bulma ve tanıma gitme özellikleri daha iyi çalışır.

---

**Not:**  
Componentin kullanıldığı yerler, genellikle `<MyComponent />` şeklinde template içinde veya `import MyComponent from ...` şeklinde script kısmında olur. Arama yaparken her iki durumu da göz önünde bulundurun.

## Component Refs 2

Component adının üzerine nereden geleceğim

GitHub Copilot: Component adının üzerine gelmek için şu adımları izleyebilirsiniz:

### 1. **Script Kısmında**
Eğer bir componenti import ettiyseniz, örneğin:
```javascript
import MyComponent from './MyComponent.vue'
```
Burada `MyComponent` isminin üzerine mouse ile gelin veya imleci getirip sağ tıklayın.

---

### 2. **Template Kısmında**
Componenti template içinde kullanıyorsanız:
```vue
<template>
  <MyComponent />
</template>
```
Burada `<MyComponent />` etiketi üzerinde imleci konumlandırın.

---

### 3. **Name Alanı**
Componentin kendi dosyasında:
```javascript
export default {
  name: 'MyComponent',
  // ...
}
```
Buradaki `'MyComponent'` isminin üzerine gelmek genellikle referans bulmak için kullanılmaz, daha çok import edilen veya template’te kullanılan isimler üzerinden arama yapılır.

---

### **Kısacası:**
- **Script** veya **template** kısmında component adının üzerine gelin.
- Sağ tıklayın ve “Find All References” veya “Go to Definition” seçeneğini kullanın.
- Alternatif olarak, component adını seçip `Ctrl+Shift+F` ile proje genelinde arayın.

> Eğer component adının üzerine gelince bir menü çıkmıyorsa, **Vetur** veya **Volar** eklentisinin kurulu ve aktif olduğundan emin olun.

engtuncay: composition api kullandığımızda import nasıl yapacağız

GitHub Copilot: Composition API kullandığınızda component import etmek için klasik şekilde import edip, `components` alanında belirtmeniz gerekir. Örnek:

```vue
<script setup>
import MyComponent from './MyComponent.vue'
</script>

<template>
  <MyComponent />
</template>
```

Eğer `<script setup>` kullanmıyorsanız:

```vue
<script>
import MyComponent from './MyComponent.vue'

export default {
  components: {
    MyComponent
  },
  setup() {
    // composition api kodları burada
  }
}
</script>

<template>
  <MyComponent />
</template>
```

**Özet:**  
- `<script setup>` ile sadece import etmeniz yeterli.
- Klasik Composition API’de hem import edip hem de `components` içinde tanımlamanız gerekir.
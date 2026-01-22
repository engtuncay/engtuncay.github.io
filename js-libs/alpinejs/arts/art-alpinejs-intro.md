## Alpine.js — Temel Direktifler ve Kısa Örnekler 🔧

**Kısa tanım:** Alpine.js, HTML içine küçük, deklaratif ve reaktif etkileşimler eklemek için kullanılan minimal bir JS kütüphanesidir.

### Kurulum
```html
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
```

### `x-data` — Reaktif veri başlangıcı 💡
```html
<div x-data="{ open: false }">
  ...
</div>
```

### `x-on` / `@` — Olay dinleyicileri (kısa: `@click`) ⚡
```html
<button @click="open = !open">Toggle</button>
```

### `x-show` — Görünürlük kontrolü 👀
```html
<div x-show="open">Gizli içerik</div>
```

### `x-model` — İki yönlü bağlama 📝
```html
<div x-data="{ name: '' }">
  <input x-model="name" placeholder="Adınız">
  <p x-text="name"></p>
</div>
```

### `x-bind` / `:` — Attribute bağlama 🔗
```html
<button :class="open ? 'is-open' : ''">Buton</button>
```

### `x-for` — Döngü 🌀
```html
<ul x-data="{ items: ['a','b','c'] }">
  <li x-for="item in items" x-text="item"></li>
</ul>
```

### `x-init` — Başlangıç çalıştırma ▶️
```html
<div x-data="{ ready: false }" x-init="ready = true"></div>
```

### `x-ref` — Element referansları 🔍
```html
<div x-data>
  <input x-ref="email">
  <button @click="$refs.email.focus()">Focus</button>
</div>
```

### `x-transition` — Basit geçişler ✨
```html
<div x-show="open" x-transition>Geçişli içerik</div>
```

> Not: CDN yüklerken `defer` kullanın; Alpine DOM hazır olduğunda çalışır. Büyük uygulamalar için merkezi durum yönetimi veya bir framework tercih edilebilir; Alpine küçük etkileşimler için idealdir.

---

## Tailwind entegrasyonu (hızlı) 🎨
Hızlı denemeler için Tailwind Play CDN kullanılabilir:

```html
<script src="https://cdn.tailwindcss.com"></script>
```

Tailwind ile birlikte Alpine, stil ve davranışı hızlıca birleştirerek küçük interaktif parçalar oluşturmayı çok kolaylaştırır.

## Modal örneği (Tailwind + Alpine) 💬
Basit, erişilebilir ve geçişli bir modal örneği:

```html
<!-- Trigger -->
<div x-data="{ open: false }">
  <button @click="open = true" class="px-4 py-2 bg-blue-600 text-white rounded">Modal Aç</button>

  <!-- Backdrop + Modal -->
  <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black/50 flex items-center justify-center" @keydown.escape.window="open = false">
    <div x-show="open" x-transition class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6" @click.away="open = false" x-ref="modal">
      <h2 class="text-lg font-semibold">Basit Modal</h2>
      <p class="mt-2 text-sm">Alpine ile yapılmış basit bir modal örneği.</p>
      <div class="mt-4 flex justify-end">
        <button @click="open = false" class="px-4 py-2 bg-gray-200 rounded">Kapat</button>
      </div>
    </div>
  </div>
</div>
```
Not: Açıldığında odaklanma (`$refs.modal.focus()`) ve ESC ile kapatma gibi erişilebilirlik iyileştirmeleri ekleyebilirsiniz.

## Form doğrulama — basit örnek ✅
Aşağıdaki örnek, arayüz seviyesinde temel doğrulama yapar (örneğin; boş alan ve e-posta formatı):
```html
<form x-data="{ name: '', email: '', validEmail() { return /\S+@\S+\.\S+/.test(this.email) }, isValid() { return this.name.trim().length > 0 && this.validEmail() } }" @submit.prevent="if (isValid()) alert('Gönderildi!');">
  <div class="mb-2">
    <label class="block text-sm">İsim</label>
    <input x-model="name" class="border p-2 w-full" placeholder="İsminiz">
    <p x-show="name.trim().length == 0" class="text-xs text-red-600">İsim gerekli.</p>
  </div>

  <div class="mb-2">
    <label class="block text-sm">E-posta</label>
    <input x-model="email" class="border p-2 w-full" placeholder="mail@ornek.com">
    <p x-show="email && !validEmail()" class="text-xs text-red-600">Geçerli bir e-posta girin.</p>
  </div>

  <button :disabled="!isValid()" :class="isValid() ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-500'" class="px-4 py-2 rounded">Gönder</button>
</form>
```
> Not: Client-side doğrulama UX için iyidir ama güvenlik için sunucu tarafında da doğrulama yapmayı unutmayın.

---

## Dropdown örneği 📂

Klavye ve fare ile erişilebilir basit bir dropdown örneği:
```html
<div x-data="{ open: false }" class="relative inline-block">
  <button @click="open = !open" class="px-3 py-2 bg-gray-100 rounded" @keydown.arrow-down.prevent="open = true; $nextTick(() => $refs.menu.querySelector('a')?.focus())">Menü</button>

  <div x-show="open" x-transition class="absolute mt-2 bg-white border rounded shadow" @click.away="open = false" @keydown.escape.window="open = false" x-ref="menu">
    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Öğe 1</a>
    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Öğe 2</a>
    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Öğe 3</a>
  </div>
</div>
```
> İpucu: `x-ref` ile menü öğelerine odaklanmayı ve `@keydown` ile klavye destekli gezinmeyi kolayca ekleyin.

## Toast (bildirim) örneği 🔔
Kısa süreli bildirim (toast) ekleme örneği:
```html
<div x-data="{ toasts: [], addToast(msg){ const id = Date.now(); this.toasts.push({id,msg}); setTimeout(()=>{ this.toasts = this.toasts.filter(t=>t.id !== id) }, 3000); } }">
  <button @click="addToast('Kaydedildi')" class="px-3 py-2 bg-green-600 text-white rounded">Toast Göster</button>

  <div class="fixed bottom-4 right-4 space-y-2">
    <template x-for="toast in toasts" :key="toast.id">
      <div x-text="toast.msg" x-transition class="bg-gray-800 text-white px-4 py-2 rounded shadow"></div>
    </template>
  </div>
</div>
```

## Erişilebilir Focus Trap (basit) ♿
Modal veya dialog açıldığında odaklanmayı modala sabitlemek için basit bir yöntem:
```html
<div x-data="{ open:false, lastActive: null }">
  <button @click="lastActive = $el; open = true; $nextTick(()=> $refs.first.focus())" class="px-3 py-2 bg-blue-600 text-white rounded">Modal Aç</button>

  <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black/50" @keydown.escape.window="open = false; $nextTick(()=> lastActive?.focus())">
    <div role="dialog" aria-modal="true" class="bg-white p-4 rounded" @click.away="open = false">
      <button x-ref="first" class="px-2 py-1 bg-gray-100 rounded">İlk Odak</button>
      <p class="my-2">İçerik...</p>
      <button x-ref="last" @click="open = false" class="px-2 py-1 bg-gray-100 rounded">Kapat</button>
    </div>
  </div>
</div>
```
> Not: Bu basit örnek temel odak yönetimini gösterir; üretimde `focus-trap` gibi test edilmiş kütüphaneler tercih edilmelidir.

---

**Sonraki adım:** İsterseniz bu örnekleri genişletip her biri için canlı demo, daha iyi keyboard erişimi ve test edilmiş focus-trap implementasyonu ekleyebilirim.

## Suspense Kullanımı

**Suspense** Solid JS'de asynchronous işlemleri handle eden bir wrapper component'dir. Ama önemli nokta: **sadece belirli şeyleri bekler**. Açıklayım:

Suspense Nasıl Çalışır

```tsx
<Suspense fallback={<div>Yükleniyor...</div>}>
  <Router>
    {/* İçerik */}
  </Router>
</Suspense>
```

**Beklediği şeyler:**
1. ✅ **Lazy import edilen component'ler** - `lazy(() => import(...))`
2. ✅ **`createResource` ile wrap edilen Promise'ler**
3. ❌ **Normal Promise'ler** - direkt JSX'e geçilen Promise'ler BEKLENMEZ

🧲 Örnek

Sizin kodda şu döngü olur:

```tsx
// FiCard'da - Bu BEKLENMEZ!
amount: new Promise<number>((resolve) =>
  setTimeout(() => resolve(3420.75), 5000)
),

// FiCard renderlanır (hemen)
// Promise'i görmez, bekleme state'i yok
// 5 saniye sonra değer gösterilir (skeleton loading'i görmezsiniz)
```

Çözüm

**FiCard'ı `createResource` ile wrap etmeliyiz** - böylece Suspense da beklenir:

```tsx
// FiCard.tsx
const [amountData] = createResource(() => props.amount);

// Artık Suspense bunu bekler!
```

veya EwpHome'u Suspense ile sarmalamalıyız:

```tsx
// ewpHome.tsx
<div class="p-1">
  <Suspense fallback={<div>Veriler yükleniyor...</div>}>
    {props.children}  {/* Dashboard'un promise'lerini bekler */}
  </Suspense>
</div>
```

**Kısaca:** Suspense, lazy component'ler ve `createResource` ile wrap edilen Promise'leri bekler. Normal Promise'ler beklenmez - direkt gösterilir. 🎯

max-lg:flex-col , tailwind'da ne anlama geliyor

GitHub Copilot: `max-lg:flex-col` Tailwind CSS'de **responsive breakpoint** kullanımıdır.

## Anlamı:
- **`max-lg:`** = "large ekran boyutundan küçük olan tüm ekranlarda" (1024px ve altı)
- **`flex-col`** = `flex-direction: column` (flexbox öğelerini dikey olarak sırala)

## Nasıl Çalışır:
```css
/* Tailwind bu CSS'i üretir: */
@media (max-width: 1023px) {
  .max-lg\:flex-col {
    flex-direction: column;
  }
}
```

## Örnek Kullanım:
````html
<div class="flex flex-row max-lg:flex-col">
  <div>Sol/Üst içerik</div>
  <div>Sağ/Alt içerik</div>
</div>
````

**Sonuç:**
- **Large ekranlarda (1024px+):** Öğeler yan yana (flex-row)
- **Medium, small, mobile ekranlarda:** Öğeler alt alta (flex-col)

Bu responsive tasarım için çok yaygın kullanılan bir pattern'dir - masaüstünde yan yana, mobilde alt alta düzen.

# flex-auto

`flex-auto`, CSS'deki bir shorthand özelliğidir ve aşağıdakilere eşittir:

```css
flex: 1 1 auto;
```

**Ne işe yarar:**

- **`flex-grow: 1`** → Eleman, kullanılmayan boş alanı doldurur (eşit şekilde diğer flex-auto öğeleriyle paylaşır)
- **`flex-shrink: 1`** → Eleman, gerekirse içeriğin altına kadar küçülebilir
- **`flex-basis: auto`** → Başlangıç boyutu içeriğin doğal boyutu olur

**Pratik örnek:**

```html
<div class="flex gap-4">
  <div class="flex-auto">Eleman 1 - boş alanı doldurur</div>
  <div class="flex-auto">Eleman 2 - boş alanı doldurur</div>
  <div class="w-32">Sabit genişlik</div>
</div>
```

Burada ilk iki eleman kalan boş alanı eşit şekilde paylaşırken, üçüncü eleman sabit genişlikte kalır.

**Tailwind'de kullanımı:** `flex-auto` sınıfı tam bu işlemi yapar - esnek, responsive tasarımlar oluştururken çok kullanışlıdır.
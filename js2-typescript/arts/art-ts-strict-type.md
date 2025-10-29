
## Me
Burayı açıklar mısın ? yani as'den sonra iki tip nasıl yazılmış 


```typescript
activeAccount: null as unknown as Customer
```



## AI Assistant
`activeAccount: null as unknown as Customer` ifadesini açıklamak için, TypeScript'teki "type assertion" (tip atama) işlemi ve bu özel kullanımın amacı üzerinde durmamız gerekiyor.

---

### Kodun Bölümleri:
1. **`null as unknown`**
   - Burada `null` değeri `unknown` tipine dönüştürülüyor.
   - `unknown`, TypeScript'te "herhangi bir tipe dönüşebilecek bilinmeyen bir değer" anlamına gelir. Yani `unknown`, tür güvenliğini korurken daha sonra farklı bir tipe atanabilecek bir ara tiptir.

2. **`unknown as Customer`**
   - Daha sonra, `unknown` tipi doğrudan `Customer` tipine dönüştürülüyor. Bu da, `activeAccount`'ın başlangıçta bir `Customer` türü olarak ele alınabilmesini sağlıyor.

---

### `as` Operatörü
`as` operatörü, bir değeri belirli bir türe dönüştürmek (Type Assertion) için kullanılır. Bu işlem, TypeScript'e "Ben bu değeri bu türe çevirebilirim ve güvenlidir" diye ifade eder.

Fakat burada iki farklı `as` operatörünün birleştirilmiş kullanılmasının sebebine bakalım.

---

### Neden İki Aşamalı `as` Kullanılmış?
1. **`null as Customer` kullanılamıyor:**
   - Birçok TypeScript ayar dosyasında (`strict` tipi desteği açık olduğunda), `null` veya başka bir değeri doğrudan karmaşık bir tipe (`Customer`) dönüştürmek mümkün değildir. TypeScript bunu sık sık bir hata olarak görür çünkü `null` hiçbir özellik veya metot içermez. Bu, kod güvenliğini sağlar.
   
   Örnek olarak:
```typescript
activeAccount: null as Customer; // Hata verir.
```


2. **`unknown` bir ara tiptir:**
   - `null`, önce `unknown` olarak belirtilir. Çünkü `unknown` türü, özellik ve tür güvenlik kontrollerinin aşılması için bir ara adım gibidir.
   - Daha sonra, `unknown as Customer` ifadesiyle bu, `Customer` türüne "dönüştürülmüş" olur.

---

### Özet Neden Kullanılmış?
- **Başlangıçta `null` değerine sahip olmak:** `activeAccount` değişkeni başlangıçta `null` olarak tanımlanıyor. Ancak daha sonra bir `Customer` nesnesine dönüştürülüp kullanılacak.
- **TypeScript kuralları:** `null` doğrudan karmaşık bir nesneye atanamadığından, karma bir çözüm bulunmuş: `null` → `unknown` → `Customer`.

---

### Daha Basit Bir Çözüm Var mı?
Eğer proje ayarları izin veriyorsa, `null` ve karmaşık tiplerin doğrudan birlikte çalışması için seçim yapılabilir:
- `strictNullChecks` ayarı kapalıysa:
```typescript
activeAccount: Customer | null = null;
```

  Böylece `activeAccount` hem `null` hem de `Customer` tipi olarak tanımlanabilir, ve yukarıdaki iç içe `as` kullanımına gerek kalmaz.

---

### Kısacası:
```typescript
activeAccount: null as unknown as Customer;
```

şu işlevi görür:
1. `activeAccount` başlangıçta `null` olur.
2. Daha sonra TypeScript'e bu değişkenin `Customer` türünden bir nesneyle çalışacağını bildirir.
3. Bunun için önce `unknown` ara tipi üzerinden bir dönüştürme yapar (`null as unknown`), sonra `Customer` tipine dönüşüm yapılır (`unknown as Customer`).

Bu tarz bir tür atama, genellikle katı TypeScript kurallarını (örneğin `strict` veya `strictNullChecks`) atlatmak için kullanılır.

## Me
strictNullChecks ayarı nereden yapılıyro

## AI Assistant
TypeScript’te `strictNullChecks` ayarı, `tsconfig.json` dosyasından yapılır. Bu ayar, TypeScript'in "strict mode" (katı mod) kurallarından biridir ve `null` ve `undefined` değerlerinin kullanımıyla ilgili daha sıkı kontroller sağlar.

---

### `strictNullChecks` Ayarını Yapmak:

1. **`tsconfig.json` Dosyasını Bul veya Oluştur**  
   Projede bir `tsconfig.json` dosyası yoksa, TypeScript otomatik olarak bazı varsayılan ayarlarla çalışır. Eğer yoksa oluşturabilirsiniz:
```json
{
     "compilerOptions": {
       "strictNullChecks": true
     }
   }
```


2. **Ayarı Düzenle**
   Eğer bir `tsconfig.json` dosyası zaten varsa, aşağıdaki gibi `compilerOptions` bölmesine `strictNullChecks` ayarını ekleyebilirsiniz:

```json
{
     "compilerOptions": {
       "strictNullChecks": true
     }
   }
```


3. **`strict` Ayarını Kontrol Et**
   Eğer `strict: true` ayarı etkinse (`true` olarak ayarlanmışsa), bu zaten `strictNullChecks` dahil birçok sıkı TypeScript ayarını etkinleştirir. Bu durumda `strictNullChecks`’i ayrı olarak belirtmek zorunda kalmazsınız.

   Örnek:
```json
{
     "compilerOptions": {
       "strict": true
     }
   }
```

   Ancak, yalnızca `strictNullChecks` özelliğini açmak istiyorsanız `strict` bayrağını kapatabilirsiniz.

---

### Ayarları Kontrol Etmek İçin:
- **`strictNullChecks` Açık Olduğunda:**
  - `null` ve `undefined` yalnızca belirtilen türlere atanabilir.
```typescript
let value: string = null; // Hata verir
  let value2: string | null = null; // Geçerli
```


- **`strictNullChecks` Kapalı Olduğunda:**
  - `null` ve `undefined`, tüm türlerin alt türü gibi davranır ve herhangi bir tipe atanabilir.
```typescript
let value: string = null; // Hata vermez
```


---

### Özet:
- `strictNullChecks`, doğrudan `tsconfig.json` dosyasındaki ayarlar üzerinden düzenlenir.
- Eklemeye veya düzenlemeye ihtiyacınız varsa:
```json
{
    "compilerOptions": {
      "strictNullChecks": true
    }
  }
```

- Eğer tüm `strict` kurallarını etkinleştirdiyseniz (`strict: true`), bu ayar zaten etkin olacaktır. Farklı ihtiyaçlar için `strict` opsiyonunu bireysel olarak devre dışı bırakabilirsiniz.

Bu düzenleme sonrasında, proje derlenirken bu ayarlar geçerli olur.



### C#'ta Extension Method Nedir ve Nasıl Kullanılır?

**Extension Metodu**, C#'ta mevcut bir sınıfa (örneğin `DataTable`, `string`, vb.) yeni özellikler/metotlar eklemek için kullanılan bir tekniktir. Bu yöntem, sınıfın kaynak kodunu değiştirmeden, yeni işlevler eklemenizi sağlar. Özellikle değiştiremediğiniz (örneğin, .NET framework içindeki) sınıfları genişletmek istediğinizde çok faydalıdır. Aşağıda, açıklamalar ve örneklerle detaylı bir rehber sunulmuştur.

---

### Extension Method Nedir?
Extension metotları, statik bir sınıf içinde tanımlanır ve ilgili sınıflara/metodlara doğal metotlar gibi yeni davranışlar kazandırır. Önceden oluşturulmuş bir sınıf ya da kütüphane ile çalışırken, kod tekrarını azaltmak ve işlevselliği artırmak için sıkça kullanılır.

---

### Bir Extension Metod Yazmanın Kuralları
1. Extension metotlar, **statik bir sınıf** içinde tanımlanmalıdır.
2. Extension metodun kendisi de **statik bir metot olmalıdır**.
3. Extension metotta, genişletmek istediğiniz sınıfı temsil eden ilk parametre başında `this` anahtar kelimesi ile belirtilmelidir.

---

### Örnek: Basit Bir Extension Metot Yazımı

Bu örnekte, bir `string` üzerinde kelime sayısını hesaplayan bir extension metodu yazalım:

```csharp
using System;

namespace MyExtensions
{
    public static class StringExtensions
    {
        public static int WordCount(this string str)
        {
            if (string.IsNullOrWhiteSpace(str))
                return 0;

            return str.Split(new char[] { ' ', '\t', '\n' }, StringSplitOptions.RemoveEmptyEntries).Length;
        }
    }
}
```

**Detaylı Açıklama**:
- `public static int WordCount(this string str)`: Bu satırda `string` sınıfını genişletiyoruz. `this` ile metodu string nesnesine doğal olarak ekliyoruz.
- Artık `string` nesnelerinde direkt `WordCount()` metodu varmış gibi kullanılabilir.

#### Kullanım:
```csharp
using System;
using MyExtensions;

class Program
{
    static void Main(string[] args)
    {
        string text = "C# dilini öğrenmek harika bir deneyim!";
        Console.WriteLine($"Kelime sayısı: {text.WordCount()}"); // Çıktı: 6
    }
}
```

---

### DataTable için Extension Method Yazalım

Bir `DataTable` nesnesinin satır içerip içermediğini kontrol eden örnek bir extension metot oluşturalım:

```csharp
using System;
using System.Data;

namespace MyExtensions
{
    public static class DataTableExtensions
    {
        public static bool HasRows(this DataTable dataTable)
        {
            return dataTable != null && dataTable.Rows.Count > 0;
        }
    }
}
```

**Kullanım**:
```csharp
using System;
using System.Data;
using MyExtensions;

class Program
{
    static void Main(string[] args)
    {
        DataTable dt = new DataTable();
        dt.Columns.Add("Name");
        dt.Rows.Add("Ali");

        Console.WriteLine($"Tablo veri içeriyor mu? {dt.HasRows()}"); // Çıktı: True
    }
}
```

---

### Extension Methodların Aktif Olması
Bir extension metodu kullanabilmek için tanımlandığı **namespace**'i `using` ile eklemelisiniz. Örneğin, yukarıdaki extension'lar `MyExtensions` isim alanında tanımlı.

Eğer kodda şu şekilde `using` yazarsanız extension metotlar aktif hale gelir:
```csharp
using MyExtensions;
```

Eğer dosya içine gerekli **namespace (`using MyExtensions;`) eklenmezse**, extension metot çağrılamaz ve derleyici şu hatayı verir:



---

### C# Extension Methods Hangi Sürümden İtibaren Var?

**Extension Method (Genişletme Metodu)** C# 3.0 sürümüyle birlikte tanıtılmıştır ve **.NET Framework 3.5** veya daha yeni sürümlerinde kullanılabilir. C# 3.0 ve sonrası tüm sürümler ile uyumludur. Günümüzdeki projelerde modern platform (örneğin .NET 5, .NET 6, .NET 7) veya **.NET Framework 4.8** kullanıyorsanız, zaten extension metotları destekler.

---

### Falza Extension Method Kullanımına Dikkat
- Her sınıfa extension metot eklemek mantıklı değildir. Genişletme metotları, yalnızca kod okuma kolaylığı sağlar ve sıklıkla kullanılan işlemler için kullanılmalıdır.
- Namespace çakışmalarına dikkat! İki farklı extension metot, aynı isimle tanımlanırsa `using` sırasına bağlı olarak bir çakışma yaşayabilirsiniz.

---

### Özet: Adım Adım Extension Metod Yazma

1. **Statik sınıf** oluşturun:
   ```csharp
   public static class DataTableExtensions { ... }
   ```
2. Metot oluştururken türü başında `this` ile belirtin:
   ```csharp
   public static bool HasRows(this DataTable dataTable) { ... }
   ```
3. Projenizde metotları kullanacağınız dosyaya ilgili namespace'i `using` ile ekleyin:
   ```csharp
   using MyExtensions;
   ```
4. Yeni eklenen metotları, hedef sınıfın doğal bir metoduymuş gibi çağırın.

Artık kendi extension metotlarınızı yazabilir, projelerinizi daha temiz ve okunabilir hale getirebilirsiniz! 😊
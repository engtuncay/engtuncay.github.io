


# csharp da datatable değerleri arasında nasıl döngü kurabilirim

Source : ChatGPT

C#'ta bir DataTable içindeki verileri döngü ile gezmek için birkaç yöntem kullanabilirsin. İşte yaygın kullanılan yöntemler:

1. foreach Döngüsü ile

```cs
using System;
using System.Data;

class Program
{
    static void Main()
    {
        // DataTable oluştur ve veriler ekle
        DataTable dt = new DataTable();
        dt.Columns.Add("ID", typeof(int));
        dt.Columns.Add("Ad", typeof(string));

        dt.Rows.Add(1, "Ahmet");
        dt.Rows.Add(2, "Mehmet");

        // DataTable içindeki satırları gez
        foreach (DataRow row in dt.Rows)
        {
            Console.WriteLine($"ID: {row["ID"]}, Ad: {row["Ad"]}");
        }
    }
}

```

💡 Avantajı: foreach döngüsüyle DataRow nesneleri üzerinde kolayca gezebilirsin.

1. for Döngüsü ile

```cs
for (int i = 0; i < dt.Rows.Count; i++)
{
    Console.WriteLine($"ID: {dt.Rows[i]["ID"]}, Ad: {dt.Rows[i]["Ad"]}");
}

```

💡 Avantajı: i indeksini kullanarak belirli bir satıra erişebilir, gerektiğinde atlamalar yapabilirsin.

1. LINQ ile Döngü

csharp
Kopyala
Düzenle
using System.Linq;

var rows = dt.AsEnumerable();
foreach (var row in rows)
{
    Console.WriteLine($"ID: {row.Field<int>("ID")}, Ad: {row.Field<string>("Ad")}");
}
💡 Avantajı: LINQ ile veri filtreleme ve işlem yapma imkânı sunar.

4. While Döngüsü ile
csharp
Kopyala
Düzenle
int index = 0;
while (index < dt.Rows.Count)
{
    Console.WriteLine($"ID: {dt.Rows[index]["ID"]}, Ad: {dt.Rows[index]["Ad"]}");
    index++;
}
💡 Avantajı: Belirli bir koşula bağlı olarak döngüyü kontrol etmek için kullanılabilir.

Hangi yöntemin daha iyi olduğu kullanım senaryona bağlı. Eğer sıralı gezmek istiyorsan foreach, belirli bir satıra atlamak istiyorsan for, LINQ kullanarak veri manipülasyonu yapmak istiyorsan LINQ yöntemini tercih edebilirsin. 🚀
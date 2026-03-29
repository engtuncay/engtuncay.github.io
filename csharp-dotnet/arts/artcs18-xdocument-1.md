Source : https://chatgpt.com/c/67a3e03e-45c4-800e-9859-66a120450cba

[Back](../readme.md)

---

- [XML Dosyasını Okuma (XDocument.Load)](#xml-dosyasını-okuma-xdocumentload)
- [XML'yi String Olarak Parse Etme (XDocument.Parse)](#xmlyi-string-olarak-parse-etme-xdocumentparse)
- [XML İçeriğini Okuma ve Düğümleri Listeleme](#xml-i̇çeriğini-okuma-ve-düğümleri-listeleme)
- [Belirli Bir Öğeyi veya Özniteliği Seçme](#belirli-bir-öğeyi-veya-özniteliği-seçme)
- [Yeni Öğeler ve Öznitelikler Ekleme](#yeni-öğeler-ve-öznitelikler-ekleme)
- [XML Öğesini Silme](#xml-öğesini-silme)
- [Bir Öğeyi Güncelleme](#bir-öğeyi-güncelleme)

C#'ta XDocument sınıfı ile XML parse etmek için LINQ to XML kullanılır. İşte nasıl yapabileceğinize dair bazı örnekler:

# XML Dosyasını Okuma (XDocument.Load)
  
Eğer XML bir dosyada ise XDocument.Load() metoduyla okuyabilirsiniz:

```cs
using System;
using System.Xml.Linq;

class Program
{
    static void Main()
    {
        XDocument xdoc = XDocument.Load("example.xml");

        Console.WriteLine(xdoc);
    }
}

```

#  XML'yi String Olarak Parse Etme (XDocument.Parse)

XML içeriği bir string olarak geliyorsa XDocument.Parse() ile parse edebilirsiniz:

```cs
using System;
using System.Xml.Linq;

class Program
{
    static void Main()
    {
        string xmlString = @"<Root><Item id='1'>Değer 1</Item><Item id='2'>Değer 2</Item></Root>";

        XDocument xdoc = XDocument.Parse(xmlString);

        Console.WriteLine(xdoc);
    }
}

```

# XML İçeriğini Okuma ve Düğümleri Listeleme

Bir XML dokümanındaki öğeleri (Element) veya öznitelikleri (Attribute) okumak için LINQ kullanabilirsiniz:

Örnek XML (example.xml)

```xml
<Books>
    <Book id="1">
        <Title>Clean Code</Title>
        <Author>Robert C. Martin</Author>
    </Book>
    <Book id="2">
        <Title>The Pragmatic Programmer</Title>
        <Author>Andrew Hunt</Author>
    </Book>
</Books>

```

C# ile XML Verisini Okuma

```cs
using System;
using System.Linq;
using System.Xml.Linq;

class Program
{
    static void Main()
    {
        XDocument xdoc = XDocument.Load("example.xml");

        var books = xdoc.Descendants("Book");

        foreach (var book in books)
        {
            string id = book.Attribute("id")?.Value;
            string title = book.Element("Title")?.Value;
            string author = book.Element("Author")?.Value;

            Console.WriteLine($"ID: {id}, Title: {title}, Author: {author}");
        }
    }
}

```

Çıktı

```yaml
ID: 1, Title: Clean Code, Author: Robert C. Martin
ID: 2, Title: The Pragmatic Programmer, Author: Andrew Hunt

```
# Belirli Bir Öğeyi veya Özniteliği Seçme

Belirli bir öğeyi almak için FirstOrDefault() veya Where() kullanılabilir:

```cs
XElement firstBook = xdoc.Descendants("Book").FirstOrDefault();
if (firstBook != null)
{
    string title = firstBook.Element("Title")?.Value;
    Console.WriteLine($"First book title: {title}");
}

```
# Yeni Öğeler ve Öznitelikler Ekleme

Mevcut bir XML belgesine yeni öğeler ekleyebilirsiniz:


```cs
XDocument xdoc = XDocument.Load("example.xml");

// Yeni kitap ekleme
XElement newBook = new XElement("Book",
    new XAttribute("id", "3"),
    new XElement("Title", "C# in Depth"),
    new XElement("Author", "Jon Skeet")
);

xdoc.Root?.Add(newBook);

// Değişiklikleri kaydet
xdoc.Save("example.xml");

```
#  XML Öğesini Silme

Örneğin, id=2 olan kitabı silmek için:

```cs
XDocument xdoc = XDocument.Load("example.xml");

var bookToRemove = xdoc.Descendants("Book")
                       .FirstOrDefault(b => (string)b.Attribute("id") == "2");

if (bookToRemove != null)
{
    bookToRemove.Remove();
    xdoc.Save("example.xml");
}

```

# Bir Öğeyi Güncelleme

Örneğin, id=1 olan kitabın başlığını değiştirelim:

```cs
XDocument xdoc = XDocument.Load("example.xml");

var bookToUpdate = xdoc.Descendants("Book")
                       .FirstOrDefault(b => (string)b.Attribute("id") == "1");

if (bookToUpdate != null)
{
    bookToUpdate.Element("Title")?.SetValue("The Clean Coder");
    xdoc.Save("example.xml");
}

```

Bu şekilde XDocument kullanarak XML içeriğini kolayca parse edebilir, okuyabilir, güncelleyebilir ve değiştirebilirsiniz.
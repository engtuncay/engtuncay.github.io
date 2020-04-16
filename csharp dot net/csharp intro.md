# CSharp Introduction (English and Turkish)

- [CSharp Introduction (English and Turkish)](#csharp-introduction-english-and-turkish)
- [OOP Mechanism](#oop-mechanism)
  - [Namespace](#namespace)
  - [Class ( Sınıf )](#class--s%c4%b1n%c4%b1f)
    - [Sınıflara (Class) property ekleme](#s%c4%b1n%c4%b1flara-class-property-ekleme)
  - [Encapsulation](#encapsulation)
  - [Method](#method)
    - [Method Modifiers ( Method Erişim Belirteçleri )](#method-modifiers--method-eri%c5%9fim-belirte%c3%a7leri)
    - [Method sentaksı](#method-sentaks%c4%b1)
      - [Sınıf Methodu Tanımlama](#s%c4%b1n%c4%b1f-methodu-tan%c4%b1mlama)
      - [Static Method Tanımı](#static-method-tan%c4%b1m%c4%b1)
    - [Out Keyword](#out-keyword)
    - [Ref Keyword ile çalışmak](#ref-keyword-ile-%c3%a7al%c4%b1%c5%9fmak)
    - [Default Parameter](#default-parameter)
    - [Params](#params)
    - [Method Overloading](#method-overloading)
- [REGULAR EXPRESSION](#regular-expression)
- [ADO (DB)](#ado-db)
  - [Disconnected Mimari](#disconnected-mimari)

---
# OOP Mechanism

## Namespace

- Bir proje oluşturduğumuzda proje ismimizde namespace oluşturulur. Java package kavramına benzer.

- Açtığımız yeni klasör namespace alt alanı olmuş oluyor, ama zorunlu değil. demoproj.yeniklasor gibi




## Class ( Sınıf )


- Genel Yapısı

````csharp
class CustomerManager
{
    public void Add(){ Console.WriteLine(“Customer Added”); }
}
````

- Kullanmak ve Çağırmak için ( Call a method of a class )

```csharp
CustomerManager customerManager = new CustomerManager()
customerManager.add();
```

### Sınıflara (Class) property ekleme

iki şekilde tanım yapabiliriz.
- Propery

```csharp
class Customer
{
//properties
public int Id { get; set; }
public string FirstName { get; set; }
}
```

- Field ise

```csharp
class Customer
{
    // fields
public string FirstName;
public int no;
}
```

```csharp
Customer customer = new Customer ();
customer.Id = 1;
customer.FirstName = "tuncay";
veya
Customer customer2 = new Customer
{
Id=2, FirstName="tuncay"
};
```
----
## Encapsulation
## Method
### Method Modifiers ( Method Erişim Belirteçleri )
+++
### Method sentaksı



#### Sınıf Methodu Tanımlama



#### Static Method Tanımı

```csharp
static int Add ( int number1, int number2) {
var result = number1 + number2
return result;
}
```

### Out Keyword
Method sentaksı
static int Add (out int number1, int number2)
Çağrılması
Add(out num1, num2)

### Ref Keyword ile çalışmak
Method tanımı
static int Add ( ref int number1, int number2)
- cağırırken de ref anahtarını yazarız. öncesinde atama yapılmış olması lazım
int num1=34
Add(ref num1, num2)

### Default Parameter
static int Add ( int number1, int number2 = 30 )
////

### Params
static int Add ( int number1, params int[] numbers) {
return number1 + numbers.sum();
}
Çağrılması
Add(2,3,4,5,6)

### Method Overloading
static int Add ( int number1, int number2)
static int Add ( int number1, int number2, int number3)

---

# REGULAR EXPRESSION

# ADO (DB)

## Disconnected Mimari

|-- Command -- Reader -- List<T>
|
Database -- Connection |-- Adapter -- DataSet--|-- DataTable
|-- DataTable


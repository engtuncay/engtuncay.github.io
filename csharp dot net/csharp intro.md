# CSharp Intro Tutorial (English and Turkish)

- [CSharp Intro Tutorial (English and Turkish)](#csharp-intro-tutorial-english-and-turkish)
- [OOP Mechanism](#oop-mechanism)
  - [Class ( Sınıflar )](#class--s%C4%B1n%C4%B1flar)
    - [Sınıflara (Class) property ekleme](#s%C4%B1n%C4%B1flara-class-property-ekleme)
  - [Encapsulation](#encapsulation)
  - [Method](#method)
    - [Method Modifiers ( Method Erişim Belirteçleri )](#method-modifiers--method-eri%C5%9Fim-belirte%C3%A7leri)
    - [method sentaksı](#method-sentaks%C4%B1)
    - [Out Keyword](#out-keyword)
    - [Ref Keyword ile çalışmak](#ref-keyword-ile-%C3%A7al%C4%B1%C5%9Fmak)
    - [Default Parameter](#default-parameter)
    - [Params](#params)
    - [Method Overloading](#method-overloading)
- [ADO (DB)](#ado-db)
  - [Disconnected Mimari](#disconnected-mimari)


---



# OOP Mechanism

## Class ( Sınıflar )

- Bir proje oluşturduğumuzda proje ismimizde namespace oluşturulur. Java package kavramına benzer.

- Genel Yapısı

````csharp
class CustomerManager 

{ 

	public void Add(){ Console.WriteLine(“Customer Added”); } 
}
````



Kullanmak/Çağırmak için ( Call a method of a class )

```csharp
CustomerManager customerManager = new CustomerManager() 
customerManager.add();
```

---

### Sınıflara (Class) property ekleme

    class Customer
    {
    	//property
        public int Id { get; set; }
        public string FirstName { get; set; }
    
    }

iki şekilde tanım yapabiliriz.



Not : Field ise

```
class Customer
{
	// fields
    public string FirstName;
    public int no;

}
```
​    

    Customer customer = new Customer ();
    customer.Id = 1;
    customer.FirstName = "tuncay";

veya

    Customer customer2 = new Customer
    {
        Id=2, FirstName="tuncay"
    };

----

## Encapsulation


## Method

### Method Modifiers ( Method Erişim Belirteçleri )

+++

### method sentaksı

Sınıf Methodu Tanımlama



Static Method Tanımı

static int Add ( int number1, int number2) {
 var result = number1 + number2
 return result;
 } 


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


------


------






# ADO  (DB)

## Disconnected Mimari

                        |-- Command -- Reader -- List<T>
                        |                      
Database -- Connection  |-- Adapter -- DataSet--|-- DataTable
                                                |-- DataTable











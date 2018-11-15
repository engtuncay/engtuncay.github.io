# CSharp Intro Tutorial (English and Turkish)

- [CSharp Intro Tutorial (English and Turkish)](#csharp-intro-tutorial-english-and-turkish)
- [OOP Mechanism](#oop-mechanism)
    - [Class ( Sınıflar )](#class--s%C4%B1n%C4%B1flar)
        - [Sınıflara (Class) property ekleme](#s%C4%B1n%C4%B1flara-class-property-ekleme)
    - [Encapsulation](#encapsulation)
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



# ADO  (DB)

## Disconnected Mimari

                        |-- Command -- Reader -- List<T>
                        |                      
Database -- Connection  |-- Adapter -- DataSet--|-- DataTable
                                                |-- DataTable






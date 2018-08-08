# C Sharp Notlar

[TOC]



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

## Sınıflara (Class) property ekleme

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

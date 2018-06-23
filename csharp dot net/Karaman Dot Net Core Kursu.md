






## Proje Oluşturma


- Asp.Net Core Web Api projesini seçeriz.


- Dependencies : Bağımlılıklar


- Controllers Klasörü


- appsetting.json : uygulama ayarlar


- Startup.cs : startup sınıfı


- nuget.config : nuget ayarlarını yapabiliriz.


## Proje Çalıştırma

  - 

 

## Model


- Model klasörü oluştururuz.


- Product.cs oluşturduk. Product entity oluşturuz.

  - 


  - 

## Http Post


- public void Post ( [FromBody] Product product ) { ... }

  - 


  - 

## Http Put


- Anno: [HttpPut("{id}")]


- p.v. Put ( int id, [FromBody] Product newProduct ) { .... }




Note : productList.FirstOrDefault( x => x.ProductId = id );


## Http Delete


- Anno: [HttpDelete("{id}")]


- p.v. Delete(int id) { .. }

- 


- 

## Postman Setup


- Vs çalıştırdıktan sonra breakpoint ekleyip , debug yapabiliriz

## 




<!--stackedit_d  ata:
eyJoaXN0b3J5IjpbNTQ5NDUzOTc0XX0=
-->## 



an sonra breakpoint ekleyip , debug yapabiliriz

## 



<!--stackedit_data:
eyJoaXN0b3J5IjpbLTY1MzE5OTQ3NV19
-->
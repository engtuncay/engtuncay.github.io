

Asp## .Net Core ## 8.0 ile Sıfırdan İleri Seviye Web Geliştirme - Sadık Turan 

# Section 8 - Web Api

## 144. WEB API Nedir?


## 145. Ne Öğreneceğiz?


## 146. WEB API Projesi


## 147. ApiController

➖ Yeni bir controller oluşturalım.

Burada `Route("api/products")` da yazılabilir, controller yazarak dinamik format kullanmak daha iyi.

```cs
// localhost:5000/api/products
[ApiController]
[Route("api/[controller]")]
public class ProductsController:ControllerBase {

  private static readonly string[] Products = {
    "a1","a2","a3"
  };

  // localhost:5000/api/products => GET
  [HttpGet]
  public string[] GetProducts(){
    return Products;  
  }
  
  // localhost:5000/api/products/1 => GET
  // [HttpGet("api/[controller]/{id}")] şeklinde de yazılabilir
  [HttpGet("{id}")]
  public string[] GetProduct(int id){
    return Products[id];
  }

  
}

```


## 148. Models


## 149. HTTP Status Codes


## 150. Ef Core Kurulumu


## 151. Veri Sorgulama


## 152. Veri Ekleme


## 153. Veri Güncelleme


## 154. Veri Silme


## 155. Data Transfer Object - DTO


## 156. Asp## .Net Identity Kurulumu


## 157. Create User


## 158. Login


## 159. Json Web Token - JWT


## 160. JWT Verification


## 161. Javascript ile Api Testi


## 162. Enable Cors


## 163. Javascript Projesinde Token ile Çalışma


## 164. Asp## .Net Core ile Api Testi




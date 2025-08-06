

javascriptde string içinde json veriyi , nasıl kullanırım

GitHub Copilot: JavaScript'te string içindeki JSON veriyi kullanmak için `JSON.parse()` metodunu kullanabilirsiniz:

## JSON String'i Parse Etme

````javascript
// JSON string
const jsonString = '{"name": "Ahmet", "age": 25, "city": "Istanbul"}';

// String'i JavaScript objesine çevirme
const obj = JSON.parse(jsonString);

console.log(obj.name); // "Ahmet"
console.log(obj.age);  // 25
console.log(obj.city); // "Istanbul"
````

## Dizi İçinde JSON

````javascript
const jsonArrayString = '[{"id": 1, "name": "Ahmet"}, {"id": 2, "name": "Mehmet"}]';

const users = JSON.parse(jsonArrayString);
console.log(users[0].name); // "Ahmet"
console.log(users.length);  // 2
````

## Try-Catch ile Güvenli Parse

````javascript
const jsonString = '{"name": "Ahmet", "age": 25}';

try {
    const obj = JSON.parse(jsonString);
    console.log(obj);
} catch (error) {
    console.error('Geçersiz JSON:', error.message);
}
````

## JavaScript Objesini JSON String'e Çevirme

````javascript
const obj = { name: "Ahmet", age: 25 };
const jsonString = JSON.stringify(obj);

console.log(jsonString); // '{"name":"Ahmet","age":25}'
````

**Not:** JSON.parse() metodu geçersiz JSON formatında hata fırlatır, bu yüzden try-catch kullanmak önerilir.
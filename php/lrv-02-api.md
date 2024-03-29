
- [Laravel Web Routes](#laravel-web-routes)
- [Route Yapısında Parametre Kullanımı](#route-yapısında-parametre-kullanımı)
- [Laravel Api Routes](#laravel-api-routes)


# Laravel Web Routes

- default index web rutu, view template sisteminde welcome view'ni açar. (resources/views/welcome.blade.php)

```php
Route::get('/', function () {
    return view('welcome');
});

```

- routes/web.php dosyasına rut eklediğimizde text olarak dönüş yapabiliriz. (http://127.0.0.1:8000/merhaba)

```php
Route::get('/merhaba', function () {
    return 'Merhaba';
});
```

- json dönüş yapabiliriz.

```php
Route::get('/merhaba-json', function () {
    return ['message' => 'Merhaba API'];
});
```

- json dönüşünü Laravel fonksiyonları ile de yapabiliriz.

```php
Route::get('/merhaba-json2', function () {
    return response(['message' => 'Merhaba API Json2'], 200);
});
```

- laravel metodları ile response header ları dönüş yapabiliriz.

```php
Route::get('/merhaba-json3', function () {
    return response(['message' => 'Merhaba API JSON3'], 200)
        ->header('Content-Type', 'application/json'); // text/plain
});

```

# Route Yapısında Parametre Kullanımı

```php
Route::get('/product/$id', function ($id) {
    return "Product Id:$id";
});

Route::get('/product/$id/$type', function ($id, $typeParam) {
    return "Product Id:$id Type: $typeParam";
});
```

- opsiyonel parametre kullanımı, callback function'ında ilgili argumana default değer verilmesi gerekir.

```php
Route::get('/product/{$id}/{$type?}', function ($id, $typeParam = '') {
    return "Product Id:$id Type: $typeParam";
});

```









# Laravel Api Routes

- routes klasörünün altında api.php dosyasından api rutları ayarlanır.

- api tanımları `/api` alt dizinde belirtilir.

- return olarak factory fonksiyonunu kullanabiliriz.

```php

```





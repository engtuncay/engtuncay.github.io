
engtuncay: isset fonksiyonu ne işe yarar

GitHub Copilot: `isset()` fonksiyonu PHP'de çok yaygın kullanılan bir fonksiyondur ve şu işlevleri yerine getirir:

## Ana İşlevi
`isset()` fonksiyonu, bir değişkenin **tanımlı olup olmadığını** ve **null olmadığını** kontrol eder.

## Kullanım Şekli
```php
isset($variable)
isset($var1, $var2, $var3) // Birden fazla değişken kontrol edebilir
```

## Döndürdüğü Değerler
- **true**: Değişken tanımlıysa ve null değilse
- **false**: Değişken tanımlı değilse veya null ise

## Örnekler

### Temel Kullanım
```php
$name = "Ahmet";
if (isset($name)) {
    echo "Name değişkeni tanımlı"; // Bu çalışır
}

$undefined_var;
if (isset($undefined_var)) {
    echo "Bu çalışmaz"; // Değişken tanımsız
}
```

### Dizi Elemanları için
```php
$user = ['name' => 'Ali', 'age' => 25];

if (isset($user['name'])) {
    echo $user['name']; // Güvenli şekilde erişim
}

if (isset($user['email'])) {
    echo $user['email']; // Bu çalışmaz, 'email' anahtarı yok
}
```

### Form Verilerinde
```php
// POST verisini kontrol etme
if (isset($_POST['username'])) {
    $username = $_POST['username'];
} else {
    $username = '';
}

// Kısa yazım
$username = isset($_POST['username']) ? $_POST['username'] : '';

// PHP 7+ ile null coalescing operator
$username = $_POST['username'] ?? '';
```

### Birden Fazla Değişken
```php
if (isset($var1, $var2, $var3)) {
    // Tüm değişkenler tanımlıysa çalışır
    echo "Hepsi tanımlı";
}
```

## Önemli Notlar

1. **null değerler**: `isset()` null değerler için false döner
```php
$var = null;
var_dump(isset($var)); // false
```

2. **empty() ile farkı**: `empty()` fonksiyonundan farklıdır
```php
$var = '';
var_dump(isset($var)); // true (tanımlı ama boş)
var_dump(empty($var)); // true (boş)
```

3. **Unset edilmiş değişkenler**:
```php
$var = "test";
unset($var);
var_dump(isset($var)); // false
```

## Yaygın Kullanım Alanları
- Form verilerini güvenli şekilde kontrol etme
- Dizi anahtarlarının varlığını kontrol etme
- Değişken tanımlılığını kontrol etme
- Notice/Warning hatalarını önleme

`isset()` fonksiyonu PHP'de güvenli kod yazmanın temel taşlarından biridir ve tanımsız değişkenlere erişim hatalarını önlemek için sıkça kullanılır.

engtuncay: unset fonksiyonu ne işe yarar

GitHub Copilot: `unset()` fonksiyonu PHP'de değişkenleri ve dizi elemanlarını silmek için kullanılan bir fonksiyondur.

## Ana İşlevi
`unset()` fonksiyonu, belirtilen değişkeni veya dizi elemanını **tamamen siler** ve bellekten kaldırır.

## Kullanım Şekli
```php
unset($variable)
unset($var1, $var2, $var3) // Birden fazla değişken silebilir
unset($array['key']) // Dizi elemanı silme
```

## Örnekler

### Değişken Silme
```php
$name = "Ahmet";
echo $name; // "Ahmet"

unset($name);
echo $name; // Notice: Undefined variable hatası
```

### Dizi Elemanı Silme
```php
$users = [
    'ali' => 25,
    'veli' => 30,
    'ayşe' => 28
];

unset($users['veli']); // 'veli' anahtarını siler

print_r($users);
// Çıktı:
// Array
// (
//     [ali] => 25
//     [ayşe] => 28
// )
```

### İndeksli Dizilerde
```php
$colors = ['kırmızı', 'yeşil', 'mavi', 'sarı'];

unset($colors[1]); // 'yeşil'i siler

print_r($colors);
// Çıktı:
// Array
// (
//     [0] => kırmızı
//     [2] => mavi
//     [3] => sarı
// )
// Not: İndeks 1 kayboldu, diğerleri yerinde kaldı
```

### Birden Fazla Eleman Silme
```php
$data = ['a', 'b', 'c', 'd', 'e'];

unset($data[1], $data[3]); // 'b' ve 'd'yi siler

print_r($data);
// Çıktı:
// Array
// (
//     [0] => a
//     [2] => c
//     [4] => e
// )
```

### Nesne Özelliklerini Silme
```php
class Person {
    public $name = "Ali";
    public $age = 25;
}

$person = new Person();
unset($person->age); // age özelliğini siler

var_dump($person);
// Artık sadece $name özelliği var
```

## Önemli Notlar

### 1. Global Değişkenler
```php
$x = 100;

function test() {
    global $x;
    unset($x); // Sadece lokal referansı siler, global değişkeni silmez
}

test();
echo $x; // Hala 100
```

### 2. Referanslar
```php
$a = 'test';
$b = &$a; // $b, $a'ya referans

unset($a); // Sadece $a'yı siler, $b hala 'test' değerini tutar
echo $b; // 'test'
```

### 3. isset() ile İlişkisi
```php
$var = "test";
var_dump(isset($var)); // true

unset($var);
var_dump(isset($var)); // false
```

### 4. Süper Global Değişkenler
```php
// Süper global değişkenler unset edilemez
unset($_POST); // Bu çalışmaz, hata verir

// Ama elemanları silinebilir
unset($_POST['username']); // Bu çalışır
```

## Yaygın Kullanım Alanları

### Bellek Yönetimi
```php
$large_array = range(1, 1000000);
// ... işlemler ...
unset($large_array); // Belleği serbest bırak
```

### Form Verilerini Temizleme
```php
// Hassas verileri silme
if (isset($_POST['password'])) {
    $password = $_POST['password'];
    unset($_POST['password']); // Güvenlik için sil
}
```

### Geçici Değişkenleri Temizleme
```php
$temp_data = processData();
$result = formatData($temp_data);
unset($temp_data); // Artık gerekli değil
```

### Dizi Filtreleme
```php
$products = [
    'laptop' => 5000,
    'mouse' => 50,
    'keyboard' => 200
];

// Belirli bir fiyatın üzerindeki ürünleri kaldır
foreach ($products as $key => $price) {
    if ($price > 1000) {
        unset($products[$key]);
    }
}
```

## `unset()` vs Diğer Yöntemler

```php
// unset() - Değişkeni tamamen siler
$var = "test";
unset($var);
// $var artık mevcut değil

// null atama - Değişken mevcut ama değeri null
$var = "test";
$var = null;
// $var hala mevcut ama değeri null

// Boş string atama
$var = "test";
$var = "";
// $var hala mevcut ama boş string
```

`unset()` fonksiyonu, bellek yönetimi, güvenlik ve kod temizliği açısından çok önemli bir PHP fonksiyonudur.
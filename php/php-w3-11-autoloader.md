
<h1>Article - PSR-4 Autoloader Standardı ve Composer ile Kullanımı</h1>

Source : https://www.erbilen.net/etiket/php-autoloading-islemi/

- [Composer ile Kullanımı?](#composer-ile-kullanımı)


Bilmiyorum daha önce PHP-FIG.org’u duydunuz mu? Bu arkadaşlar, PHP yapısı kuran kişilere standart olmayı öncülüyorlar. Yani diyorlar ki, bir yapı kuracaksan en azından belirlediğimiz standartlara göre yap ki, bi boka benzesin ???? Bende sizlere en basiti olan PSR-4 autoloading olayını anlatacağım.

Sınıflara yeni başladıysanız namespace’ler size çok anlamlı gelmemiş olabilir. Neden kullanayım ki? Şimdi çok fazla sınıfın kullanıldığı projelerde, sınıf isimlerinin çakışmaması için sınıflara namespace tanımlanır yani nickname gibi düşünün. Benim adım Tayfun, ve aynı sınıfta 2 tayfun daha var. Birbirimizi karıştırmamak için Ben Prototürk Tayfun, Bir diğeri Yufka Yürek Tayfun, bir diğeri Yakışıklı Tayfun ????

Bu şekilde her Tayfun’un nickname’i olunca kimse birbirini karıştırmıyor. İşte namespace’lerde bu amaçla kullanılıyor. Şimdi bu ne alaka diyebilirsiniz, bende bilmiyorum ufaktan bi bilgi vereyim dedim ???? Bizim asıl konumuz, sınıflarımızı nasıl otomatik yükleteceğiz.

Normalde yaptığımız

Eskiden __autoload() fonksiyonunu kullanıyorduk, ancak bu PHP 7.2 ile önerilmemeye başlandı. Yerini spl_autoload_register() fonksiyonu aldı. Bunu nasıl kullanıyoruz;

```php
spl_autoload_register(function($class){
    $file = __DIR__ . '/src/classes/' . strtolower($class) . '.php';
    if (file_exists($file))
        require $file;
});

```

Fakat bu yeterli gelmiyor. Ve çokta doğru bir mantık sayılmaz. Başka klasörlerde başka sınıflarımda olabilir. Dolayısı ile bunu sadece biz sorun etmemişiz belli ki, bu FIG bizim için PSR-4 adını verdikleri autoloading standardını belirtmişler. Onlara göre bu işlemi yaparken şunlar olmalı;

```php
\<NamespaceName>(\<SubNamespaceNames>)*\<ClassName>

```

Yani sınıflar bir top-level namespace’e sahip olmalılar. Ayrıca vendor namespace olarakta biliniyormuş bu.
Ve ek olarak 1 ya da daha fazla alt namespace’e sahip olması gerekiyormuş.

E tabi birde sınıf ismi ????

Bu arkadaşların mantığına göre işlemimi şöyle yaparsak;

```php
spl_autoload_register(function($class){

    // top-level namespace
    $prefix = 'Erbilen\\';

    // namespace için ana dizin
    $base_dir = __DIR__ . '/src/libraries/';

    // çağırılan sınıf prefix'i içermiyorsa bir sonraki yükleme işlemine geç
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0){
        return;
    }

    // prefix hariç sınıfın kalanı
    $relative_class = substr($class, $len);

    // hepsini birleştirip dizin yolunu oluştur
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // sınıf dosyası var ise yükle
    if (file_exists($file))
        require $file;

});

// Aslında bu sınıf şurada yer alıyor
// src/libraries/validators/testvalidator.php
$test = new Erbilen\Validators\TestValidator();

// src/libraries/database/testdatabase.php
$db = new Erbilen\Database\TestDatabase();

```
## Composer ile Kullanımı?

Eğer bu işlemi composer ile yapmak isterseniz, composer.json dosyasını açın yoksa bir tane oluşturun anadizinde ve içine şu kodları yazın;

```php
{
  "autoload": {
    "psr-4": {
      "Erbilen\": "src/libraries"
    }
  }
}

```

Burada yine gördüğünüz gibi ilk değerimiz top-level namespace’imiz ve karşılığı olarak namespace’in bulunduğu ana dizini belirttik. Terminale gidip composer update komutunu çalıştırdığınızda ana dizinde vendoradında bir klasör ve onun içinde autoload.php olduğunu göreceksiniz. Ayrıca birde composer diye klaör var, işlemleri burada yapıyor ancak biz index dosyamızda bu autoload.php’yi çağırıyoruz. Ve sınıflarımızı kullanmayı deniyoruz.

```php
<?php
require __DIR__ . '/vendor/autoload.php';

$test = new Erbilen\Validators\TestValidator();
$db = new Erbilen\Database\TestDatabase();

```

Sonuç? Evet, çalışıyor. Tebrik ederim, ilk standardı kullanmayı başardık, darısı diğerlerinin başına.

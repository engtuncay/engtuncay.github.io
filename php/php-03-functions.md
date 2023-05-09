
- [Functions](#functions)
  - [Functions](#functions-1)
  - [Anonymous Functions](#anonymous-functions)
  - [get\_args() function](#get_args-function)
  - [Recursive Functions](#recursive-functions)
  - [function\_exists](#function_exists)
  - [Yield Function](#yield-function)
  - [Static variable in a function](#static-variable-in-a-function)
  - [Php 7 Feature - Parameter ad Return Type](#php-7-feature---parameter-ad-return-type)

# Functions


## Functions



```php
// a function without parameter
function test() {
    return "test";
}

$a = test();
//echo $a;

```

- Function with parameters

```php

function topla($sayi1 = 2, $sayi2 = 10)
{
    return ($sayi1 + $sayi2);
}

$toplam = topla();
//echo $toplam;

```

- Using global variable in a function

```php

$ad = 'ali';

/*
    global
    $GLOBALS
*/

function adsoyad($soyad)
{
    // $GLOBALS['ad']
    global $ad;
    return $ad . ' ' . $soyad;
}

//echo adsoyad('veli');

$yazi = "ali";

//echo substr($yazi, 0, 10) . '..';

function kisalt($str, $limit = 10)
{
    $karakterSayisi = strlen($str);
    if ($karakterSayisi > $limit){
       $str = substr($str, 0, $limit) . '..';
    }
    return $str;
}

echo kisalt($yazi, 5);
```

## Anonymous Functions

- Basit Fonksiyon Kullanımı

```php
function test(){
    return 'test';
}

//echo test();

```
- Anonim fonksiyon kullanımı

```php

$test = function($par){
    return 'test ' . $par;
};

$test2 = function() use ($test){
    return 'test2 ' .  $test('test3');
};

echo $test2();

//echo $test('ali');

```

- function assignment to an Array ( it s defined as closure)

```php

$arr = [
    function(){
        return '1. fonksiyon';
    },
    function(){
        return '2. fonksiyon';
    },
    function(){
        return '3. fonksiyon';
    }
];

//echo $arr[rand(0,2)]();

```



```php
$soyad = 'veli';

function filtrele($isim)
{
    global $soyad;
    return $isim . ' ' . $soyad; 
}

$arr = ['ali','Güner','Meltem','Zeynep'];
$arr = array_map(function($isim) use($soyad){
    return $isim . ' ' . $soyad; 
}, $arr);

// Another usage
// array_map ( 'filtrele',$arr) 

print_r($arr);



```

## get_args() function

```php
/*
    func_num_args()
    func_get_args()
    func_get_arg()
*/

function test()
{
    echo func_num_args() . '<br>';
    print_r(func_get_args()) . '<br>';
    echo func_get_arg(2);
}

test('ali', 'udemy', 'prototurk', '93academy');

// Output


```

## Recursive Functions

```php
function say($sayi)
{
    echo $sayi;
    if ($sayi < 10) {
        say($sayi + 1);
    }
}

//say(1);

$kategoriler = [
    [
        'id' => 1,
        'parent' => 0,
        'ad' => 'Dersler'
    ],
    [
        'id' => 2,
        'parent' => 0,
        'ad' => 'Güncel'
    ]
];

function kategoriListele($kategoriler, $parent = 0)
{
    $html = '';
    $html .= '<ul>';
    foreach ($kategoriler as $kategori) {
        if ($kategori['parent'] == $parent) {
            $html .= '<li>' . $kategori['ad'];
            $html .= kategoriListele($kategoriler, $kategori['id']);
            $html .= '</li>';
        }
    }
    $html .= '</ul>';
    return $html;
}

//echo kategoriListele($kategoriler);

$arr = [
    'ad' => 'ali',
    'soyad' => 'veli',
    'sporlar' => [
        'yuzme' => 'evet',
        'kosma' => 'hayır',
        'savunma_sporlari' => [
            'jeetkunedo' => 'evet',
            'judo' => 'hayır'
        ]
    ]
];

function dizide_bul($dizi, $anahtar)
{
    foreach ($dizi as $key => $val) {
        if ($key == $anahtar) {
            return $val;
        }
        if (is_array($val)) {
            $sonuc = dizide_bul($val, $anahtar);
            if ($sonuc) {
                return $sonuc;
            }
        }
    }
    return false;
}

print_r(dizide_bul($arr, 'savunma_sporlari'));
```

## function_exists

```php
function test2(){
    return 'test';
}

if (function_exists('test')){
    echo 'test fonksiyonu vardır';
} else {
    echo 'test fonksiyonu yoktur';
}

function kisalt($str, $limit = 10)
{
    $karakterSayisi = strlen($str);
    if ($karakterSayisi > $limit){
        if (function_exists('mb_substr')){
            $str = mb_substr($str, 0, $limit, 'utf8') . '..';
        } else {
            $str = substr($str, 0, $limit) . '..';
        }
    }
    return $str;
}

```


## Yield Function

```php

// memory_get_usage()
// number_format()

function byteToMB($byte)
{
    return number_format($byte / 1048576, 2);
}

$sayilar = range(0, 1000000);

echo byteToMB(memory_get_usage()) . ' MB bellek kullanıldı<br>';

function say($baslangic, $limit)
{
    for ($i = $baslangic; $i <= $limit; $i++) {
        yield $i;
    }
}

$sayilar = say(0, 1000000);

echo byteToMB(memory_get_usage()) . ' MB bellek kullanıldı';
```
##  Static variable in a function


```php

function say(){
    static $sayi = 1;
    echo $sayi . '<br>';
    $sayi++;
}

function yukle($deger){
    static $yuklenenler = [];
    $yuklenenler[] = $deger;
    return $yuklenenler;
}

yukle('test.php');
yukle('a.php');
$yuklenenler = yukle('b.php');

print_r($yuklenenler);

```

## Php 7 Feature - Parameter ad Return Type

```php

declare(strict_types = 1);

function topla(int $sayi1, int $sayi2): string
{
    return (string) ($sayi1 + $sayi2);
}

function arr(array $arr): string
{
    return implode(',', $arr);
}

//echo topla(1,3);

print_r(arr(["test","test2"]));

```

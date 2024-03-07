


- isset() fonksiyonu tanımlı olup olmadığı kontrol edilir

```php
if(isset($_GET['sayfa'])){
  
}
```

## 87 Pdo ile Baglantı

```php
try {
  $db = new PDO('mysql:host=localhost;dbname=uyeler', 'root', '');
  //printf("Baglantı kuruldu");
} catch (PDOException $e){
    echo $e->getMessage();
}
```

## 88 Pdo Insert

- insert

```php
$sorgu = $db->prepare('INSERT INTO dersler2 SET
baslik = ?,
icerik = ?,
onay = ?');
$ekle = $sorgu->execute([
    'deneme başlık', 'içerik', 1
]);

if ($ekle){
    echo 'verilerini eklendi!';
} else {
    $hata = $sorgu->errorInfo();
    echo 'MySQL Hatası: '. $hata[2];
    // print_r($sorgu->errorInfo());
}
```

- direk insert yapmak için, query metodu kullanılır.

```php
$db->query('INSERT INTO dersler SET baslik = "başlık", icerik = "deneme içerikk", onay = 1');
```

## 89 Pdo Select

```php
$kategoriler = $db->query('SELECT kategoriler.*, COUNT(dersler.id) as toplamDers FROM kategoriler
LEFT JOIN dersler ON FIND_IN_SET(kategoriler.id, dersler.kategori_id)
GROUP BY kategoriler.id')->fetchAll(PDO::FETCH_ASSOC);
```


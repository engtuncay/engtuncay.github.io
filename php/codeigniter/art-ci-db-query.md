
- [CodeIgniter 4'te `$db->query()` kullanımı ve hata kontrolü:](#codeigniter-4te-db-query-kullanımı-ve-hata-kontrolü)
  - [Temel Kullanım](#temel-kullanım)
  - [Sonuç Alma ve Hata Kontrolü](#sonuç-alma-ve-hata-kontrolü)
  - [Try-Catch ile Hata Yönetimi](#try-catch-ile-hata-yönetimi)
  - [Sonuç Kontrolleri](#sonuç-kontrolleri)
  - [Affected Rows ve Insert ID](#affected-rows-ve-insert-id)



engtuncay: ci4'de $db->query nasıl kullanılıyor. dbresult , hata nasıl kontrol ediliyor

# CodeIgniter 4'te `$db->query()` kullanımı ve hata kontrolü:

## Temel Kullanım

````php
$db = \Config\Database::connect();
$query = $db->query("SELECT * FROM users WHERE status = ?", [1]);
````

## Sonuç Alma ve Hata Kontrolü

````php
// Query çalıştırma
$query = $db->query("SELECT * FROM users WHERE id = ?", [$userId]);

// Hata kontrolü
if ($query === false) {
    // Hata var
    $error = $db->error();
    log_message('error', 'Database error: ' . $error['message']);
    return false;
}

// Sonuçları alma
$results = $query->getResult();        // Object array
$results = $query->getResultArray();   // Associative array
$row = $query->getRow();              // Tek satır object
$rowArray = $query->getRowArray();    // Tek satır array
````

## Try-Catch ile Hata Yönetimi

````php
try {
    $query = $db->query("INSERT INTO users (name, email) VALUES (?, ?)", [$name, $email]);
    
    if ($query) {
        echo "Kayıt başarılı. ID: " . $db->insertID();
    }
} catch (\Exception $e) {
    log_message('error', 'Database error: ' . $e->getMessage());
    echo "Hata oluştu: " . $e->getMessage();
}
````

## Sonuç Kontrolleri

````php
$query = $db->query("SELECT * FROM users");

if ($query) {
    // Kayıt sayısı kontrolü
    if ($query->getNumRows() > 0) {
        $users = $query->getResultArray();
        foreach ($users as $user) {
            echo $user['name'];
        }
    } else {
        echo "Kayıt bulunamadı";
    }
}
````

## Affected Rows ve Insert ID

````php
// INSERT/UPDATE/DELETE için
$query = $db->query("UPDATE users SET status = 1 WHERE id = ?", [$id]);

if ($query) {
    echo "Etkilenen satır sayısı: " . $db->affectedRows();
}

// INSERT için
$query = $db->query("INSERT INTO users (name) VALUES (?)", [$name]);
if ($query) {
    echo "Yeni kayıt ID: " . $db->insertID();
}
````

Bu yöntemlerle hem sorgu sonuçlarını alabilir hem de hataları güvenli şekilde kontrol edebilirsiniz.
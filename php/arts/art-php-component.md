

- [PHP’de `ob_start`, Template Best Practices ve XSS-Safe Component Yazımı](#phpde-ob_start-template-best-practices-ve-xss-safe-component-yazımı)
  - [1️⃣ `ob_start()` NASIL ÇALIŞIR?](#1️⃣-ob_start-nasil-çalişir)
    - [Normal PHP Çıkışı](#normal-php-çıkışı)
    - [`ob_start()` ile Çıkış Buffer’ı](#ob_start-ile-çıkış-bufferı)
    - [HTML içinde kullanım (asıl amaç)](#html-içinde-kullanım-asıl-amaç)
    - [Output Buffer Fonksiyonları](#output-buffer-fonksiyonları)
  - [2️⃣ PHP TEMPLATE BEST PRACTICES](#2️⃣-php-template-best-practices)
    - [❌ Yanlış Kullanım](#-yanlış-kullanım)
    - [✅ Doğru Yaklaşım](#-doğru-yaklaşım)
      - [Controller / hazırlık katmanı](#controller--hazırlık-katmanı)
      - [Template](#template)
    - [Template İçin Altın Kurallar](#template-i̇çin-altın-kurallar)
      - [Template içinde OLABİLİR](#template-içinde-olabi̇li̇r)
      - [Template içinde OLMAMALI](#template-içinde-olmamali)
    - [Önerilen Dosya Yapısı](#önerilen-dosya-yapısı)
  - [3️⃣ XSS-SAFE COMPONENT NASIL YAZILIR?](#3️⃣-xss-safe-component-nasil-yazilir)
    - [Kural 1️⃣: Asla ham veri basma](#kural-1️⃣-asla-ham-veri-basma)
    - [Kural 2️⃣: Tek bir escape fonksiyonu kullan](#kural-2️⃣-tek-bir-escape-fonksiyonu-kullan)
    - [Kural 3️⃣: Varsayılan ESCAPED, özel durum RAW](#kural-3️⃣-varsayılan-escaped-özel-durum-raw)
    - [Kural 4️⃣: Attribute içinde escape zorunlu](#kural-4️⃣-attribute-içinde-escape-zorunlu)
    - [Kural 5️⃣: Component seviyesinde XSS koruması](#kural-5️⃣-component-seviyesinde-xss-koruması)
      - [❌ Yanlış](#-yanlış)
      - [✅ Doğru](#-doğru)
  - [4️⃣ Profesyonel `view()` Helper](#4️⃣-profesyonel-view-helper)
    - [Kullanım](#kullanım)
  - [5️⃣ Performans Notları](#5️⃣-performans-notları)
  - [6️⃣ KISA ÖZET (BEST PRACTICE)](#6️⃣-kisa-özet-best-practice)
  - [7️⃣ Bundan Sonraki Seviye Konular](#7️⃣-bundan-sonraki-seviye-konular)


**`ob_start` çalışma mantığı**, **PHP template best practices** ve **XSS-safe component yazımı** konularının detaylı anlatımı.

# PHP’de `ob_start`, Template Best Practices ve XSS-Safe Component Yazımı

---

## 1️⃣ `ob_start()` NASIL ÇALIŞIR?

### Normal PHP Çıkışı

```php
echo "Merhaba";
```

* Çıktı **anında** tarayıcıya gönderilir.

---

### `ob_start()` ile Çıkış Buffer’ı

```php
ob_start();

echo "Merhaba";
echo " Dünya";

$html = ob_get_clean();
```

* Çıktı RAM’de **buffer** içinde tutulur.
* Tarayıcıya gönderilmez.
* `ob_get_clean()` → buffer içeriğini **string** olarak alır ve buffer’ı kapatır.


```php
$html === "Merhaba Dünya";
```

---

### HTML içinde kullanım (asıl amaç)

```php
function card(string $title): string
{
    ob_start();
    ?>
    <div class="card">
        <h3><?= $title ?></h3>
    </div>
    <?php
    return ob_get_clean();
}
```

**Avantajlar**

* Okunabilir HTML
* PHP logic + template birlikte
* `echo` karmaşası yok

---

### Output Buffer Fonksiyonları

| Fonksiyon           | Açıklama               |
| ------------------- | ---------------------- |
| `ob_start()`        | Buffer açar            |
| `ob_get_contents()` | İçeriği alır, kapatmaz |
| `ob_end_clean()`    | İçeriği siler          |
| `ob_get_clean()`    | Alır ve kapatır ⭐      |

> ⚠️ Buffer açıp kapatmamak hafıza sorunlarına yol açar.

---

## 2️⃣ PHP TEMPLATE BEST PRACTICES

---

### ❌ Yanlış Kullanım

```php
<?php if ($user['active']) { ?>
    <span><?= strtoupper(htmlspecialchars($user['name'])) ?></span>
<?php } ?>
```

**Sorunlar**

* Logic + format + escape iç içe
* Okunmaz
* Bakımı zor

---

### ✅ Doğru Yaklaşım

#### Controller / hazırlık katmanı

```php
$isActive = $user['active'];
$name = strtoupper($user['name']);
```

#### Template

```php
<?php if ($isActive): ?>
    <span><?= e($name) ?></span>
<?php endif; ?>
```

---

### Template İçin Altın Kurallar

#### Template içinde OLABİLİR

* `<?= ?>`
* `if`, `foreach`
* basit karşılaştırmalar

#### Template içinde OLMAMALI

* Veritabanı çağrısı
* API çağrısı
* ağır string işlemleri
* iş kuralları
* yetkilendirme

---

### Önerilen Dosya Yapısı

```
/views
  /components
    table.php
    card.php
    badge.php
  /pages
    users.php
```

---

## 3️⃣ XSS-SAFE COMPONENT NASIL YAZILIR?

---

### Kural 1️⃣: Asla ham veri basma

```php
<?= $user['name'] ?>
```

❌ **XSS açığı**

---

### Kural 2️⃣: Tek bir escape fonksiyonu kullan

```php
function e($value): string
{
    return htmlspecialchars(
        (string)$value,
        ENT_QUOTES | ENT_SUBSTITUTE,
        'UTF-8'
    );
}
```

> Laravel Blade `{{ }}` mantığı

---

### Kural 3️⃣: Varsayılan ESCAPED, özel durum RAW

```php
<?= e($title) ?>
```

RAW gerekiyorsa bilinçli şekilde:

```php
<?= raw($html) ?>
```

```php
function raw(string $html): string
{
    return $html;
}
```

---

### Kural 4️⃣: Attribute içinde escape zorunlu

```php
<a href="<?= e($url) ?>">Link</a>
```

⚠️ **Asla** JavaScript event basma:

```php
onclick="<?= $js ?>"
```

❌ Büyük güvenlik açığı

---

### Kural 5️⃣: Component seviyesinde XSS koruması

#### ❌ Yanlış

```php
function badge($text): string
{
    return "<span>$text</span>";
}
```

#### ✅ Doğru

```php
function badge(string $text, string $type = 'info'): string
{
    ob_start();
    ?>
    <span class="badge badge-<?= e($type) ?>">
        <?= e($text) ?>
    </span>
    <?php
    return ob_get_clean();
}
```

---

## 4️⃣ Profesyonel `view()` Helper

```php
function view(string $file, array $data = []): string
{
    extract($data, EXTR_SKIP);

    ob_start();
    require __DIR__ . "/views/{$file}.php";
    return ob_get_clean();
}
```

### Kullanım

```php
echo view('pages/users', [
    'users' => $users
]);
```

---

## 5️⃣ Performans Notları

* `ob_start` **yavaş değildir**
* `echo` ile yarışır
* Gerçek performans problemleri:

  * Kötü SQL
  * Gereksiz loop
  * String concat spam

---

## 6️⃣ KISA ÖZET (BEST PRACTICE)

* `ob_start` = HTML output buffer
* Logic → controller
* View → sadece render
* Varsayılan escape
* RAW bilinçli
* `echo` spam → teknik borç

---

## 7️⃣ Bundan Sonraki Seviye Konular

* Mini Blade template engine yazmak
* PHP component cache (OPcache uyumlu)
* Slot’lu component sistemi
* JS’siz interaktif tablo

---

```php
echo Table::make($users)
    ->column('id', 'ID')
    ->column('name', 'Ad Soyad')
    ->column('email', 'E-Posta')
    ->column('created_at', 'Kayıt Tarihi', fn($v) => date('d.m.Y', strtotime($v)))
    ->actions(fn($row) => "<a href='edit.php?id={$row['id']}'>Düzenle</a>")
    ->render();

```


---


```php
class Table
{
    private array $data;
    private array $columns = [];
    private $actions = null;

    public static function make(array $data): self
    {
        return new self($data);
    }

    private function __construct(array $data)
    {
        $this->data = $data;
    }

    public function column(string $key, string $label, ?callable $formatter = null): self
    {
        $this->columns[] = [
            'key' => $key,
            'label' => $label,
            'formatter' => $formatter
        ];
        return $this;
    }

    public function actions(callable $callback): self
    {
        $this->actions = $callback;
        return $this;
    }

    public function render(): string
    {
        ob_start();
        ?>
        <table class="table">
            <thead>
            <tr>
                <?php foreach ($this->columns as $col): ?>
                    <th><?= htmlspecialchars($col['label']) ?></th>
                <?php endforeach; ?>
                <?php if ($this->actions): ?>
                    <th>İşlem</th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($this->data as $row): ?>
                <tr>
                    <?php foreach ($this->columns as $col): ?>
                        <td>
                            <?php
                            $value = $row[$col['key']] ?? null;
                            echo $col['formatter']
                                ? call_user_func($col['formatter'], $value, $row)
                                : htmlspecialchars((string)$value);
                            ?>
                        </td>
                    <?php endforeach; ?>

                    <?php if ($this->actions): ?>
                        <td><?= call_user_func($this->actions, $row) ?></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php
        return ob_get_clean();
    }
}

```

---

```php
$users = [
    ['id' => 1, 'name' => 'Ali', 'email' => 'ali@test.com', 'created_at' => '2025-01-01'],
    ['id' => 2, 'name' => 'Ayşe', 'email' => 'ayse@test.com', 'created_at' => '2025-01-05'],
];

echo Table::make($users)
    ->column('id', 'ID')
    ->column('name', 'Ad')
    ->column('email', 'E-posta')
    ->column('created_at', 'Tarih', fn($v) => date('d.m.Y', strtotime($v)))
    ->actions(fn($r) => "<a href='edit.php?id={$r['id']}'>Düzenle</a>")
    ->render();

```
---

PHP’den çık–HTML’ye gir (en temiz yöntem)

Gerçek cevap burada.

```php
function renderCard(string $title, string $content): string
{
    ob_start();
    ?>
    <div class="card">
        <h3><?= htmlspecialchars($title) ?></h3>
        <p><?= nl2br(htmlspecialchars($content)) ?></p>
    </div>
    <?php
    return ob_get_clean();
}

```

Kullanım:

```php
echo renderCard('Başlık', 'Burası içerik');

```

✔ Okunur
✔ Editörde HTML gibi görürsün
✔ En yaygın profesyonel PHP yaklaşımı

PHP component / partial yazan herkes bunu kullanır.

7 Altın kural (bunu ezberle)

- PHP logic yukarıda, HTML aşağıda olmalı.
- HTML içinde sadece <?= ?> olmalı.

- 8 Bonus: function + parametreli template mantığı

```php
function view(string $file, array $data = []): string
{
    extract($data, EXTR_SKIP);

    ob_start();
    require $file;
    return ob_get_clean();
}

```

kullanım:

```php
echo view('table.php', [
    'rows' => $users
]);

```

Bu noktadan sonra mini framework yazmaya başlarsın 😉

----

Bu üç konu aynı zincirin halkaları.

Bunları doğru anlarsan PHP’de gerçek template/component yazmaya başlarsın. Net ve dürüst anlatıyorum.

1️⃣ ob_start() NASIL ÇALIŞIR?

Normal PHP akışı

```php
echo "Merhaba";

```

📤 Çıktı hemen tarayıcıya gider.

ob_start() ile

```php
ob_start();

echo "Merhaba";
echo " Dünya";

$html = ob_get_clean();

```

📥 Çıktı tarayıcıya gitmez, RAM’de bir buffer’da tutulur.
📦 ob_get_clean() → içeriği string olarak alır ve buffer’ı kapatır.

Sonuç:

```php
$html === "Merhaba Dünya";

```

HTML içinde neden işe yarar?

```php
function card($title)
{
    ob_start();
    ?>
    <div class="card">
        <h3><?= $title ?></h3>
    </div>
    <?php
    return ob_get_clean();
}

```

✔ PHP logic var
✔ HTML okunabilir
✔ echo karmaşası yok

Hayati detaylar

Fonksiyon	Ne yapar

- ob_start()	Buffer açar
- ob_get_contents()	İçeriği alır, kapatmaz
- ob_end_clean()	Buffer’ı siler
- ob_get_clean()	Alır ve kapatır ⭐

⚠️ ob_start() açıp kapatmazsan hafıza şişer.

2️⃣ PHP TEMPLATE BEST PRACTICES (EZBERLETİLİR)

🔴 Asla yapma

```php
<?php if ($user['active']) { ?>
    <span><?= strtoupper(htmlspecialchars($user['name'])) ?></span>
<?php } ?>

```

❌ Logic + format + escape iç içe
❌ Okunmaz
❌ Hata üretir

🟢 Doğru yaklaşım

Controller / hazırlık katmanı

```php
$isActive = $user['active'];
$name = strtoupper($user['name']);

```

Template

```php
<?php if ($isActive): ?>
    <span><?= e($name) ?></span>
<?php endif; ?>

```


Altın kurallar

✅ Template içinde:


- <?= ?>

- if / foreach

- basit karşılaştırma

❌ Template dışında:

- DB
- API
- formatlama logic
- yetkilendirme

➖ Dosya düzeni

```
/views
  /components
    table.php
    card.php
    badge.php
  /pages
    users.php

```

3️⃣ XSS-SAFE COMPONENT NASIL YAZILIR?

➖ Kural 1: Asla ham veri basma

```php
<?= $user['name'] ?>

```


❌ XSS açık daveti

➖ Kural 2: Tek bir escape fonksiyonu kullan

```php
function e($value): string
{
    return htmlspecialchars(
        (string)$value,
        ENT_QUOTES | ENT_SUBSTITUTE,
        'UTF-8'
    );
}

```

Blade’deki {{ }} mantığı.

➖ Kural 3: Varsayılan ESCAPED, özel durum RAW

```php
<?= e($title) ?>

```

RAW gerekiyorsa bilinçli çağır:

```php
<?= raw($html) ?>

```

```php
function raw(string $html): string
{
    return $html;
}

```


📌 İsmi bile “raw” → hata fark edilir.

Kural 4: Attribute’larda ESCAPE zorunlu
<a href="<?= e($url) ?>">


⚠️ JS event’leri ASLA basma:

onclick="<?= $js ?>"


❌ büyük güvenlik açığı

Kural 5: Component seviyesinde XSS
❌ Yanlış
function badge($text)
{
    return "<span>$text</span>";
}

✅ Doğru
function badge(string $text, string $type = 'info'): string
{
    ob_start();
    ?>
    <span class="badge badge-<?= e($type) ?>">
        <?= e($text) ?>
    </span>
    <?php
    return ob_get_clean();
}

4️⃣ Mini ama PROFESYONEL view() helper
function view(string $file, array $data = []): string
{
    extract($data, EXTR_SKIP);

    ob_start();
    require __DIR__ . "/views/{$file}.php";
    return ob_get_clean();
}


Kullanım:

echo view('pages/users', [
    'users' => $users
]);

5️⃣ Performans endişesi?

“ob_start yavaş mı?”

✔ Hayır.
✔ echo ile yarışır.
✔ DB / IO yanında önemsiz.

Gerçek performans kaybı:

kötü SQL

gereksiz loop

string concat

6️⃣ Net özet (bunu çerçevelet)

ob_start = HTML buffer

Logic dışarıda, HTML içeride

Varsayılan escape

RAW bilinçli

echo spam = teknik borç

Bir sonraki adımda istersen:

- Laravel Blade motorunu sıfırdan yazalım

- PHP component cache (OPcache uyumlu)

- Slot’lu component (<x-card>)

- JS framework’süz interaktif tablo


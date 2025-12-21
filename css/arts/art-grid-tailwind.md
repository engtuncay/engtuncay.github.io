
- [Tailwind 4 ile Grid Kullanımı](#tailwind-4-ile-grid-kullanımı)
  - [Tailwind 4 Grid Özellikleri ve Kullanımı](#tailwind-4-grid-özellikleri-ve-kullanımı)
    - [1. **Temel Grid Container Oluşturma**](#1-temel-grid-container-oluşturma)
    - [2. **Grid Kolon Sayısı - grid-cols-**](#2-grid-kolon-sayısı---grid-cols-)
    - [3. **Satır Sayısı - grid-rows-**](#3-satır-sayısı---grid-rows-)
    - [4. **Boşluk Ayarı - gap-**](#4-boşluk-ayarı---gap-)
    - [5. **Item Yerleşimi - col-span ve row-span**](#5-item-yerleşimi---col-span-ve-row-span)
    - [6. **Otomatik Kolon - auto-cols ve grid-auto-flow**](#6-otomatik-kolon---auto-cols-ve-grid-auto-flow)
    - [7. **Elemanların Hizalanması - Justify \& Align**](#7-elemanların-hizalanması---justify--align)
    - [8. **Pratik Örnek - Responsive Dashboard Layoutu**](#8-pratik-örnek---responsive-dashboard-layoutu)
    - [9. **En Önemli Tailwind 4 Grid Sınıfları**](#9-en-önemli-tailwind-4-grid-sınıfları)
- [Dinamik Grid Kolon Paylaşımı Sorunu ve Çözümleri](#dinamik-grid-kolon-paylaşımı-sorunu-ve-çözümleri)
  - [Çözüm 1: **auto-cols-fr kullanımı**](#çözüm-1-auto-cols-fr-kullanımı)
  - [Özet: En İyi Çözümler](#özet-en-i̇yi-çözümler)


# Tailwind 4 ile Grid Kullanımı

Tailwind 4 ile Grid kullanımını detaylı şekilde anlatacağım:

## Tailwind 4 Grid Özellikleri ve Kullanımı

### 1. **Temel Grid Container Oluşturma**

```html
<!-- grid sınıfıyla grid container oluştur -->
<div class="grid">
  <div>Kolon 1</div>
  <div>Kolon 2</div>
  <div>Kolon 3</div>
</div>
```

### 2. **Grid Kolon Sayısı - grid-cols-**

```html
<!-- 3 kolonlu grid ve aralarında boşluklu -->
<div class="grid grid-cols-3 gap-4">
  <div class="bg-blue-500">Kolon 1</div>
  <div class="bg-blue-500">Kolon 2</div>
  <div class="bg-blue-500">Kolon 3</div>
</div>

<!-- Farklı kolon sayıları -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
  <!-- responsive tasarım -->
</div>
```

### 3. **Satır Sayısı - grid-rows-**

```html
<div class="grid grid-rows-3 h-96">
  <div>Satır 1</div>
  <div>Satır 2</div>
  <div>Satır 3</div>
</div>
```

### 4. **Boşluk Ayarı - gap-**

```html
<div class="grid grid-cols-3 gap-4">
  <!-- 4 birim boşluk (16px) -->
</div>

<div class="grid grid-cols-3 gap-x-6 gap-y-2">
  <!-- X: 6 birim, Y: 2 birim boşluk -->
</div>
```

### 5. **Item Yerleşimi - col-span ve row-span**

```html
<div class="grid grid-cols-3 gap-4">
  <div class="col-span-2">2 kolonu kaplayan</div>
  <div>Normal</div>
  <div class="row-span-2">2 satırı kaplayan</div>
  <div>Normal</div>
  <div>Normal</div>
</div>
```

### 6. **Otomatik Kolon - auto-cols ve grid-auto-flow**

```html
<!-- Otomatik kolon genişliği -->
<div class="grid auto-cols-max gap-4">
  <div>Min genişlik</div>
  <div>Min genişlik</div>
</div>

<div class="grid auto-cols-fr gap-4">
  <!-- Eşit dağılım (fraction units) -->
</div>
```

### 7. **Elemanların Hizalanması - Justify & Align**

```html
<!-- Yatay hizalama -->
<div class="grid grid-cols-3 justify-items-center">
  <!-- Tüm itemler merkeze hizalanır -->
</div>

<!-- Dikey hizalama -->
<div class="grid grid-cols-3 items-center h-96">
  <!-- Tüm itemler dikey merkeze hizalanır -->
</div>

<!-- Grid'in kendisinin hizalanması -->
<div class="grid grid-cols-3 justify-center items-center h-96">
  <!-- Grid'in kendisi merkeze hizalanır -->
</div>
```

### 8. **Pratik Örnek - Responsive Dashboard Layoutu**

```html
<!doctype html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 p-6">
  
  <!-- Header -->
  <header class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="md:col-span-2 bg-blue-600 text-white p-6 rounded">
      <h1 class="text-2xl font-bold">Dashboard</h1>
    </div>
    <div class="bg-green-600 text-white p-6 rounded">
      <p>Profil</p>
    </div>
  </header>

  <!-- İçerik Grid -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    <!-- Sidebar -->
    <aside class="md:col-span-1 bg-white p-4 rounded shadow">
      <nav class="space-y-2">
        <p class="font-bold">Menu</p>
        <p>Anasayfa</p>
        <p>Ayarlar</p>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="md:col-span-3">
      <!-- Kart Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded shadow">
          <h3 class="font-bold mb-2">Kart 1</h3>
          <p>İçerik</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
          <h3 class="font-bold mb-2">Kart 2</h3>
          <p>İçerik</p>
        </div>
        <div class="bg-white p-4 rounded shadow col-span-1 md:col-span-2 lg:col-span-1">
          <h3 class="font-bold mb-2">Kart 3</h3>
          <p>İçerik</p>
        </div>
      </div>
    </main>
  </div>

</body>
</html>
```

### 9. **En Önemli Tailwind 4 Grid Sınıfları**

| Sınıf | Açıklama |
|-------|----------|
| grid | Container'ı grid haline getir |
| `grid-cols-{n}` | n kadar kolon (1-12) |
| `grid-rows-{n}` | n kadar satır |
| `gap-{n}` | Boşluk ekle |
| `col-span-{n}` | n kadar kolonu kapla |
| `row-span-{n}` | n kadar satırı kapla |
| `col-start-{n}` | Kolona belirli pozisyonda başla |
| `col-end-{n}` | Kolonun bitişi |
| `justify-items-{value}` | Yatay item hizalaması |
| `items-{value}` | Dikey item hizalaması |
| `auto-cols-{value}` | Otomatik kolon genişliği |

Tailwind 4'ün browser tabanlı çalışması sayesinde bu sınıfları doğrudan HTML'de kullanabilir ve anlık sonuç görebilirsiniz. Responsive tasarım için `md:`, `lg:`, `xl:` breakpoint'lerini kullanarakiller aynı sınıfları kullanabilirsiniz.

# Dinamik Grid Kolon Paylaşımı Sorunu ve Çözümleri

Bu sorun Tailwind Grid'de `grid-cols-{n}` sınıfı kullanıldığında ortaya çıkar. Bir sütun silindiğinde, diğer sütunlar otomatik olarak alanı paylaşmaz çünkü grid yapısı sabit kalır.

Bu sorunu çözmek için `auto-cols-fr` (fraction units) veya `grid-cols-subgrid` gibi özellikleri kullanabilirsiniz:

## Çözüm 1: **auto-cols-fr kullanımı**

```html
<!-- SABİT KOLON: 3 kolon belirli -->
<div class="mb-8">
  <h2 class="font-bold mb-2">Sorunlu: grid-cols-3 (1. silinince boş kalır)</h2>
  <div class="grid grid-cols-3 gap-4">
    <!-- <div class="bg-red-500 p-4">Sütun 1</div> SİLİNDİ -->
    <div class="bg-blue-500 p-4">Sütun 2</div>
    <div class="bg-green-500 p-4">Sütun 3</div>
  </div>
</div>

<!-- ÇÖZÜM 1: Dinamik grid (eşit dağılım) -->
<div class="mb-8">
  <h2 class="font-bold mb-2">Çözüm 1: auto-cols-fr (eşit dağılım)</h2>
  <div class="grid auto-cols-fr gap-4">
    <!-- <div class="bg-red-500 p-4">Sütun 1</div> SİLİNDİ -->
    <div class="bg-blue-500 p-4">Sütun 2</div>
    <div class="bg-green-500 p-4">Sütun 3</div>
  </div>
</div>

<!-- ÇÖZÜM 2: Flex kullanımı (çok daha kolay) -->
<div class="mb-8">
  <h2 class="font-bold mb-2">Çözüm 2: flex (önerilen)</h2>
  <div class="flex gap-4">
    <!-- <div class="bg-red-500 p-4">Sütun 1</div> SİLİNDİ -->
    <div class="bg-blue-500 p-4 flex-1">Sütun 2</div>
    <div class="bg-green-500 p-4 flex-1">Sütun 3</div>
  </div>
</div>

<!-- ÇÖZÜM 3: grid-auto-flow -->
<div class="mb-8">
  <h2 class="font-bold mb-2">Çözüm 3: grid-cols-[repeat(auto-fit,minmax(200px,1fr))]</h2>
  <div class="grid gap-4" style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
    <!-- <div class="bg-red-500 p-4">Sütun 1</div> SİLİNDİ -->
    <div class="bg-blue-500 p-4">Sütun 2</div>
    <div class="bg-green-500 p-4">Sütun 3</div>
  </div>
</div>

```

## Özet: En İyi Çözümler

| Yöntem | Avantaj | Dezavantaj |
|--------|---------|-----------|
| `flex flex-1` | Basit, her zaman çalışır | Grid özelliklerini kaybedersiniz |
| `auto-cols-fr` | Grid'in gücünü korur | Sayı belirtmelisiniz |
| `grid-cols-[repeat(auto-fit,minmax(200px,1fr))]` | Responsive ve dinamik | CSS kodu gerekli |

**En önerilen:** Eğer sütunları dinamik olarak gösterecekseniz, `flex` kullanın. Grid özellikleri isterseniz `auto-cols-fr` tercih edin.

Source : https://chatgpt.com/c/67b2eebf-d158-800e-b31a-d46c26672414

[Back](../readme.md)

---

# Bootstrapde data-bs-toggle, data-bs-target alanları ne işe yarıyor

data-bs-toggle ve data-bs-target, Bootstrap'in JavaScript bileşenlerini etkinleştirmek için kullanılan HTML veri (data) öznitelikleridir. Navbar gibi bileşenlerde dropdown menüler, offcanvas menüler veya modallar gibi öğeleri açmak/kapatmak için kullanılırlar.

## data-bs-toggle

Bu öznitelik, belirli bir Bootstrap bileşenini tetiklemek için kullanılır. Örneğin:

- data-bs-toggle="collapse" → Bir öğeyi açıp kapatır (genişletir/daraltır).
- data-bs-toggle="dropdown" → Dropdown menüyü açar.
- data-bs-toggle="offcanvas" → Offcanvas menüyü açar.

data-bs-target : Bu öznitelik, hangi öğenin hedefleneceğini belirtir. CSS seçici (id veya class) ile belirlenir.

## Örnek 1: Navbar'da Responsive Menü

Aşağıdaki örnekte, data-bs-toggle="collapse" ile mobil menü açılır/kapanır.

```html
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="#">Anasayfa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Hakkında</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

```

📌 Ne oluyor?

button öğesi, data-bs-toggle="collapse" ve data-bs-target="#navbarNav" ile id="navbarNav" olan öğeyi açıp kapatıyor.

Küçük ekranlarda (lg boyutundan küçük) menü kapanabilir hale geliyor.

## Örnek 2: Dropdown Menü

Bu örnekte, data-bs-toggle="dropdown" kullanarak açılır menü yapıyoruz.

```html
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
    Menü
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Seçenek 1</a></li>
    <li><a class="dropdown-item" href="#">Seçenek 2</a></li>
  </ul>
</div>

```

📌 Ne oluyor?

button içinde data-bs-toggle="dropdown" olduğu için tıklandığında altındaki .dropdown-menu açılıyor.

## Örnek 3: Offcanvas Menü

Bu örnekte, ekranın yanından açılan bir menü yapıyoruz.

```html
<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
  Menü Aç
</button>

<div class="offcanvas offcanvas-start" id="offcanvasExample">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Başlık</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    İçerik buraya gelir.
  </div>
</div>

```

📌 Ne oluyor?

button öğesi `data-bs-toggle="offcanvas"` ve `data-bs-target="#offcanvasExample"` ile `id="offcanvasExample"` olan offcanvas menüyü açıyor.

Sonuç

data-bs-toggle, hangi Bootstrap bileşeninin tetikleneceğini belirler.
data-bs-target, bu etkileşimin hangi öğe üzerinde gerçekleşeceğini belirtir.

Bunları kullanarak Navbar'da dropdown, responsive menü veya offcanvas gibi etkileşimli bileşenler oluşturabilirsin. 🚀


# data-bs-toggle göre div alanına show class'ı verip , geri mi alıyor ?

Evet, data-bs-toggle belirli bir bileşeni açıp kapatırken ilgili öğeye show sınıfını ekleyip kaldırarak çalışır. Bootstrap'in JavaScript bileşenleri, iç mantığında bu sınıfı dinamik olarak yönetir.

Nasıl Çalışıyor?

Bir örnek üzerinden inceleyelim:

1. collapse için:

```html
<button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#myContent">
  Aç/Kapat
</button>

<div id="myContent" class="collapse">
  Bu içerik açılıp kapanacak.
</div>

```

📌 Ne oluyor?

Butona tıkladığında id="myContent" olan div öğesine show sınıfı ekleniyor ve içerik görünür hale geliyor.

Tekrar tıklanınca show sınıfı kaldırılıyor ve içerik kapanıyor.

Normalde:

```html
<div id="myContent" class="collapse">

```

Tıklandıktan sonra:

```html
<div id="myContent" class="collapse show">

```

## 1. dropdown için:

```html
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
    Menü
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Seçenek 1</a></li>
    <li><a class="dropdown-item" href="#">Seçenek 2</a></li>
  </ul>
</div>

```

📌 Ne oluyor?

Butona tıklanınca .dropdown-menu içine show sınıfı ekleniyor ve menü açılıyor.

Boş bir yere tıklayınca show sınıfı kaldırılıyor ve menü kapanıyor.

Normalde:

```html
<ul class="dropdown-menu">

```

Tıklandıktan sonra:

```html
<ul class="dropdown-menu show">

```

## offcanvas için:

```html
<button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
  Menüyü Aç
</button>

<div id="sidebar" class="offcanvas offcanvas-start">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Başlık</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    İçerik buraya gelir.
  </div>
</div>

```
📌 Ne oluyor?

Butona tıklanınca id="sidebar" olan div içine show sınıfı ekleniyor ve menü ekrana geliyor.

Kapatma butonuna veya dışarıya tıklanınca show sınıfı kaldırılıyor.

Normalde:

```html
<div id="sidebar" class="offcanvas offcanvas-start">

```
Tıklandıktan sonra:

```html
<div id="sidebar" class="offcanvas offcanvas-start show">

```

Sonuç

Evet, Bootstrap'in JavaScript kodları data-bs-toggle ile ilgili öğeye show sınıfını ekleyip kaldırıyor`.

- Açılınca show sınıfı eklenir.
- Kapanınca show sınıfı kaldırılır.

Eğer elle show sınıfını ekleyip kaldırmak istersen JavaScript ile manuel olarak da kontrol edebilirsin:
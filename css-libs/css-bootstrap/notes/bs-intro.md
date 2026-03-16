
- [container](#container)
- [container-fluid](#container-fluid)
- [card ve card-body](#card-ve-card-body)



## container

Bootstrap’ta `.container` sınıfının temel CSS çıktısı aşağıdaki gibidir:

````css
/* .container */
.container {
  width: 100%;
  padding-right: var(--bs-gutter-x, 0.75rem);
  padding-left: var(--bs-gutter-x, 0.75rem);
  margin-right: auto;
  margin-left: auto;
  /* Responsive olarak max-width değerleri eklenir */
  /* Örneğin Bootstrap 5 için: */
  @media (min-width: 576px) {
    max-width: 540px;
  }
  @media (min-width: 768px) {
    max-width: 720px;
  }
  @media (min-width: 992px) {
    max-width: 960px;
  }
  @media (min-width: 1200px) {
    max-width: 1140px;
  }
  @media (min-width: 1400px) {
    max-width: 1320px;
  }
}
````

Kısaca:  
- Yatayda ortalar (`margin-right: auto; margin-left: auto;`)
- Sağ ve soldan padding bırakır (`padding`)
- Ekran boyutuna göre maksimum genişliği değişir (responsive)


## container-fluid

GitHub Copilot: Bootstrap’ta `.container-fluid` sınıfı, genişliği her zaman %100 olan ve ekran boyutuna göre kenarlık bırakmayan bir kapsayıcı oluşturur. Yani, sayfanın tamamına yayılır.

CSS çıktısı (Bootstrap 5 için örnek):

````css
.container-fluid {

}
````

Bu sınıfı kullandığınızda, içerik ekranın tamamına yayılır ve responsive (duyarlı) olur.

## card ve card-body 

Bootstrap’ta `.card` ve `.card-body` sınıflarının temel CSS çıktısı aşağıdaki gibidir:

````css
/* .card */
.card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid rgba(0,0,0,.125);
  border-radius: 0.25rem;
}

/* .card-body */
.card-body {
  flex: 1 1 auto;
  padding: 1rem 1rem;
}
````

Bu kodlar Bootstrap 5 sürümünden alınmıştır.  
`.card` kartın ana kapsayıcısıdır, kenarlık ve arka plan rengi tanımlar.  
`.card-body` ise kartın içeriğini saran ve iç boşluk (padding) ekleyen bölümdür.

📝 `flex: 1 1 auto;` özelliği, bir flex container (esnek kutu) içindeki öğenin nasıl büyüyüp küçüleceğini belirler.  

Bu özellik üç değerden oluşur:

- **1** (flex-grow): Genişleyebilme katsayısı. Diğer öğelerle birlikte boş alanı paylaşır.
- **1** (flex-shrink): Küçülebilme katsayısı. Alan daraldığında diğer öğelerle birlikte küçülür.
- **auto** (flex-basis): Başlangıçta alacağı ana boyut. İçeriğine göre otomatik belirlenir.

Yani, `flex: 1 1 auto;` demek:
- Öğenin genişliği içeriğine göre başlar,
- Gerekirse büyüyebilir,
- Gerekirse küçülebilir,
- Boş alanı diğer `flex: 1 1 auto;` olan öğelerle eşit paylaşır.

🧲 Örnek Card

```html
<div class="card">
  <img src="https://picsum.photos/400" class="card-img-top">
  <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

```

📝 DevTools’ta align-content: normal görüyorsanız, bu varsayılan değerdir ve çoğu zaman stretch gibi davranır.
Kendi değerini atayarak (align-content: center, flex-end vs.) davranışı değiştirebilirsiniz.

- align-content: normal => stretch
- justify-content: normal => flex-start
- align-items: normal => stretch

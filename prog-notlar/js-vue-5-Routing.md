

# B5 Routing

vid1 

-  Sayfa içerisinde belirlediğimiz bir alana, gezinme sonucunda değişen url göre istedğimiz component i yüklediğimiz sisteme routing denir.

Vue js <router-view> blogu içerisine yükler.

Örneğin hakkımızda linkini tıkladığımız router-view blogu içerisine yüklenmesini istiyoruz.

vid2

## Routing Installation

- Direct Download or Cdn

<script src="/path/to/vue.js"></script>
<script src="/path/to/vue-router.js"></script>

- Npm ile

```js
npm install vue-router
```


## Router Tanimlama

- index script alanında routes arrayi tanımlamamız gerekir.

```js
const routes = [
    { path: '/', component: Page_Anasayfa },
    { path: '/hakkimizda', component: Page_Hakkimizda },
    { path: '/urunler', component: Page_Urunler },
    { path: '/iletisim', component: Page_Iletisim },
];

```

- demo yapmak için değişken üzerinden component dogrudan tanımlayabiliriz.

```js
const Page_Anasayfa = {
        template: '<h1>Hoşgeldiniz</h1>'
    };
const Page_Hakkimizda = {
        template: '<h1>Hakkımızda</h1>'
};

```

- kütüphaneye devreye alırız. Yukarıda tanımladığımız routes tanımını vuerouter'a belirtiriz. 

```js
const router = new VueRouter({
    routes
})
```

- Vue app tanımımızda vue routerı belirtiriz.

```js
const app = new Vue({
        router, /* or router:router */
        /* other stuffs*/
    })
```

- Sayfamızda router ile yüklediğimiz componentlerin nerede görüneceğini belirtiriz.

```html
<div id="app">
<!-- other stuff -->
    <router-view></router-view>
<!-- other stuff -->
</div>
```

uvd71

## Route Bağlantıları Verme

- Router Mod (#) Yöntemi
  
Baglantıları href="#/hakkimizda" şeklinde hedef verirsek açılır.

- Router Link Yöntemi

```html
<router-link to="/hakkimizda" class="nav-link" active-class="active">Hakkımızda</router-link>
```

- RouterLink kullanılırken to attribute'nu :to şeklinde data binding de yapabiliriz.


```html
<router-link :to="urunlerAdresi" class="nav-link" active-class="active">Ürünler</router-link>
```

urunlerAdresi degiskenin degerini to attribute değeri olarak basar.

- RouterLink 'to' attibute'na object olarak da tanımlayabiliriz.

```html
<router-link :to="{ path: 'iletisim' }" tag="span" class="nav-link" active-class="active">İletişim</router-link>
```

- routelink'te a dışında farklı bir html elemanına da render yapabilir.

```html
<router-link :to="{ path: 'iletisim' }" tag="span" class="nav-link" active-class="active">İletişim</router-link>
```

Router-Link componenti, bu linki <span> etiketiyle html'e basar.

uvd72 end

## Aktif Route Baglantisini Tespit Etme

- RouterLink ile oluşturulan link tıklandığında otomatik olarak vue router-link-active classını ekler.

```html
<a class=".... router-link-active">Hakkımızda</a>
```

- router-link-active class ı yerine sadece active kullanmak istersek active-class olarak istediğimiz class ı belirtebiliriz.

```html
<router-link active-class="active">İletişim</router-link>
```

uvd-73

## Route Parametreleri

- Tarayıcıdan url olarak girilen örneğin urunler/detay/2 adresinde 2 route parametresidir.

- routes tanımıda parametreleri belirtmemiz gerekir.

```js
 const routes = [
        /*...*/
        { path: '/urunler/detay/:id', component: Page_Urunler },
    ];
```

- baglantilarimiza name de tanımlayabiliriz.

```js
const routes = [
        /*...*/
        { path: '/urunler/detay/:id', component: Page_Urunler, name: 'urun-detay' },
    ];
```

- baglantı link verirken de parametreyi belirtmemiz gerekir. params property'sinde obje içerisinde id 1 olarak verildi.

```html

<router-link :to="{ name: 'urun-detay', params: { id: 1 } }" class="btn btn-primary">Detay</router-link>

```

- routerlink te verilen parametreyi component'de kullanabiliriz.

```html
<h1>Ürün {{ $route.params.id }} Detayı</h1>
```

uvd-74

## Programatik Route Degisimi

- router üzerinden geçişler için ileri ve geri yapabiliriz. Örnekte 1 geriye gidiş gösterildi.

```js
this.$router.go(-1);
```

- anasayfaya döndürmek için (açtırmak için)

```js
this.$router.push('/');
```
- router-link ismi üzerinden açtırılabilir

```js
this.$router.push({ name: 'urun-detay', params: { id: 2 } });
```

component de kullanımı

```html
const Page_Urun_Detay = {
        template: `
            <div>
                <a href="#" class="btn btn-sm btn-primary float-right" @click="geriDon">Geri Dön</a>
                <a href="#" class="btn btn-sm btn-primary float-right" @click="anasayfayaDon">Anasayfaya Dön</a>
                <h1>Ürün {{ $route.params.id }} Detayı</h1>
            </div>`,
        methods: {
            geriDon() {
                this.$router.go(-1);
            },
            anasayfayaDon() {
                this.$router.push('/');
                //this.$router.push({ name: 'urun-detay', params: { id: 2 } });
            }
        }
    };

```

uvd-75


## Hash / History Modu

- Normal routing işlemizde adresler "#" hash ile gösteriliyordu. History modu kullanınca hash'siz adres kullanılabilir.

- History modunun aktif etmek için router objemizin argümanına mode özelliğini (property) tanımlamamız gerekir.

```js
const router = new Router({
    /*...*/
    mode: 'history'
});
```

- Hash moduna almak için

```js
const router = new Router({
    /*...*/
    mode: 'hash'
});
```

- History modunda dosya çalıştırarak test edemeyiz, lokal sunucuda test edebiliriz.

uvd-76

## Route Yönlendirme ve Alias Kullanımı

- Rut tanımlarında yönlendirme de yapabiliriz. Aşağıda root dizini açıldığında iletisim sayfasına yönlenir.

```js
const routes = [
        {
            path: '/', component: Page_Anasayfa,
            redirect: '/iletisim'
        },
        /* ... */
        { path: '/iletisim', component: Page_Iletisim },
    ];
```

- Aktif link gösterilirken burada hata olabilir. iletisim sayfasındayken anasayfa linkide aktif görünebilir. Bunu düzeltmek için "exact" özniteliği (attribute) kullanılır. Böylelikle adres "/" sonrasında bir şey gelirse routerlinki active özelliği almaz.

```js
<router-link to="/" class="nav-link" active-class="active" exact>Anasayfa</router-link>
```

- redirect özelliği kullanırken component özelliğini kullanmamız gerekmez.

- redirect'i name özelliğine göre yapabiliriz.

```js
const routes = [
        {
            path: '/', component: Page_Anasayfa,
            //redirect: '/iletisim'
            redirect: { name: 'iletisim' }
        },
        /* ... */
        { path: '/iletisim', component: Page_Iletisim, name: 'iletisim' },
    ];
```

- mevcut adresinin yanında ikinci bir adresle rut tanımlayabiliriz. "/iletisim" ile açılıyorken , bir de "/communication" ile açılmasını sağlayabiliriz.

```js
const routes = [
        /* ... */
        { path: '/iletisim', component: Page_Iletisim, alias : '/communication' },
    ];
```

uvd-77

## İç içe Rut Tanımlama (Nested Route)

- Örneğin hakkımızda sayfasını açtık. Bu sayfada da misyonumuz tıklayınca belli bir bölge misyonun açılmasını istiyoruz. Bunu nested route ile yaparız.

- Örneğe göre hakkımızda component'in template'nde router-view etiketiyle alt rut alanını belirtiriz.

```html
    const Page_Hakkimizda = {
        template: `
            <!-- ... -->
            <router-view></router-view>
            <!-- .... -->
            </div>`
    };
```

- route tanımlamamızda alt rutların tanımını yaparız.

```js
const routes = [
        /* ... */
        {
            path: '/hakkimizda',
            component: Page_Hakkimizda,
            children: [
                { path: '', component: Page_Hakkimizda_Giris, name: 'hakkimizda-giris' },
                { path: 'giris', component: Page_Hakkimizda_Giris, name: 'hakkimizda-giris' },
                { path: 'sayfa1', component: Page_Hakkimizda_Sayfa1, name: 'hakkimizda-sayfa1' },
                { path: 'sayfa2', component: Page_Hakkimizda_Sayfa2, name: 'hakkimizda-sayfa2' },
            ]
        },
        /* ... */
    ];
```

- Hakkımızda template'nde alt route linklerini ekleriz.

```html
<router-link to="/hakkimizda/giris">Hakkımızda Giriş</router-link>

<router-link :to="{ name: 'hakkimizda-sayfa1' }">Sayfa 1</router-link>

<router-link :to="{ name: 'hakkimizda-sayfa2' }">Sayfa 2</router-link>
```

- Alt rutlarımız için örnek template aşağıdadır.

```html
const Page_Hakkimizda_Giris = { template: '<div class="jumbotron">Hakkımızda</div>'};
const Page_Hakkimizda_Sayfa1 = { template: '<div class="jumbotron">Sayfa 1</div>'};
const Page_Hakkimizda_Sayfa2 = { template: '<div class="jumbotron">Sayfa 2</div>'};
```

uvd-78

## Vue Cli ile Oluşturulan Projede Route Yapısının Kullanımı

- Vue router cli projemize sonradan kurmak için:

```bash
npm install vue-router --save
```

- cli projede route objemizi ayrı bir dosyada tanımlarsak import ile çekebiliriz.

```js
import router from './router'
```

- Router'ı vue app aktif etmek için, Router sınıfını use ile kayıt ederiz.

```js
import Vue from 'vue'
/* ... */
import Router from 'vue-router'
/*...*/
Vue.use(Router)
```

- Örnek bir route objesi :

```js
const router = new Router({
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/photos/:id',
            name: 'photos',
            component: Photos
        },
        {
            path: '*',
            component: NotFound,
            //redirect: '/'
        }
    ]
});
```
uvd-79

## Hatalı Route Tanımlarını Yakalama

- adres çubugunda olmayan bir sayfa erişmeye çalışıldığında belli bir yönlendirme yapabiliriz. Rut tanımlarının en sonuna  `path : '*'` şeklinde bir rut tanımlarsak bulamadığında bu rutu aktif eder.

```js
const router = new Router({
    routes: [
        /* diger rut tanımları */
        /* en sona yazılacak */
        {
            path: '*',
            component: NotFound,
            //redirect: '/'
        }
    ]
});
```

- Farklı bir sayfayada redirect özelliği ile yönlendirme yapılabilir

```js
const router = new Router({
    routes: [
        /* diger rut tanımları */
        /* en sona yazılacak */
        {
            path: '*',
            component: NotFound,
            redirect: '/'
        }
    ]
});
```
uvd-80


## Route Degisimlerini izleme

- url değişimleri izleyebilmek için componentin watch özelliğinin, $route özelliğini tanımlamamız gerekir. Örnek rut watch tanımı :

```js
<script>
    export default {
        data() {
            /* ... */
        },
        watch: {
            // rut değişimi olduğunda fetchData metodunu çalıştır.
            $route: "fetchData"
        },
        methods: {
            fetchData() {
                /* ... */
            }
        }
    }
</script>
```

- Örnek olarak photos componenti aşağıdaki gibidir.

```html
//  Photos.vue
<template>
    <div class="container">
        <h1>Photos</h1>
        <div class="card" style="width: 18rem" v-if="photo">
            <img :src="photo.url" class="card-img-top">
            <div class="card-body">
                <p class="card-text">{{ photo.title }}</p>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                photo: null
            }
        },
        created() {
            this.fetchData();
        },
        watch: {
            $route: "fetchData"
        },
        methods: {
            fetchData() {
                fetch('http://jsonplaceholder.typicode.com/photos/' + this.$route.params.id)
                    .then(response => response.json())
                    .then(json => {
                        this.photo = json;
                    });
            }
        }

    }
</script>
```

uvd-81

## Route Navigation Guard

- Rut değişim yaparken öncesinde veya sonrasında bir kod çalıştırmak istiyorsak global navigation guard tanımlayabiliriz. Router objemizi tanımladıktan sonra tanımlayabiliriz.

Bir route bağlantısına tıklandığı anda önce beforeEach , daha sonra beforeResolve guard tanımları çalıştırılır. Sonrasında tıklanan rut sayfası yüklenir ve yükleme tamamladıktan sonra afterEach guard tanımları çalıştırılır.

```js
const router = new Router(/*...*/);

router.beforeEach((to, from, next) => {
    // to : sonraki rut (gidilecek)
    // from : önceki rut
    // next geçiş metodu

    /*...*/

    // bir sonraki rut geçirmek için next metodunu çağırırız.
    next();
});

router.beforeResolve((to, from, next) => {
    /* ... */
    });

router.afterEach((to, from) => {
    /* ... */
    });
```

- Örnek uygulama olarak route geçişlerinde animasyon oluşturalım.

```js
npm install nprogress --save
```

- nprogress kütüphanesini route obje tanımladığımızda yerde kullanacağız. öncelikle import ederiz. beforeResolve durumunda (state) NProgress başlatırız, yükleme tamamlanınca NProgress i bitiririz.

```js
import NProgress from 'nprogress'

const router = new Router(/*...*/);

router.beforeResolve((to, from, next) => {
    if (to.name) {
        NProgress.start();
    }
    next();
});

router.afterEach((to, from) => {
    NProgress.done();
});


```

- App.vue içinde global stil dosyasını güncelleriz.

```css
@import '../node_modules/nprogress/nprogress.css';
```

- App.vue içinde bootstrap direk import ile stile ekleyebiliriz.

```css
@import 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css';
```

uvd-82

## Router Full Example (1)

```html
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
        <div class="container">
            <a href="#" class="navbar-brand">Routing App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <router-link to="/hakkimizda" class="nav-link" active-class="active">Hakkımızda</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="urunlerAdresi" class="nav-link" active-class="active">Ürünler</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ path: 'iletisim' }" tag="span" class="nav-link" active-class="active">İletişim</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <router-view></router-view>
    </div>
</div>

<script src="../assets/js/vue.js"></script>
<script src="../assets/js/vue-router.js"></script>

<script>
    const Page_Anasayfa = {
        template: '<h1>Hoşgeldiniz</h1>'
    };
    const Page_Hakkimizda = {
        template: '<h1>Hakkımızda</h1>'
    };
    const Page_Urunler = {
        template: '<h1>Ürünler</h1>'
    };
    const Page_Iletisim = {
        template: '<h1>İletişim</h1>'
    };

    const routes = [
        { path: '/', component: Page_Anasayfa },
        { path: '/hakkimizda', component: Page_Hakkimizda },
        { path: '/urunler', component: Page_Urunler },
        { path: '/iletisim', component: Page_Iletisim },
    ];

    const router = new VueRouter({
        routes
    });

    const app = new Vue({
        router,
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            urunlerAdresi: '/urunler'
        }
    })
</script>

```

## Router Full Ex 2

```html
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
        <div class="container">
            <a href="#" class="navbar-brand">Routing App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <router-link to="/" class="nav-link" active-class="active" exact>Anasayfa</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/hakkimizda" class="nav-link" active-class="active">Hakkımızda</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/aboutus" class="nav-link" active-class="active">About Us</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="urunlerAdresi" class="nav-link" active-class="active">Ürünler</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ path: 'iletisim' }" tag="span" class="nav-link" active-class="active">İletişim</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <router-view></router-view>
    </div>
</div>

<script src="../assets/js/vue.js"></script>
<script src="../assets/js/vue-router.js"></script>

<script>
    const Page_Anasayfa = {
        template: '<h1>Hoşgeldiniz</h1>'
    };
    const Page_Hakkimizda = {
        template: '<h1>Hakkımızda</h1>'
    };
    const Page_Urunler = {
        template: `
            <div>
                <h1>Ürünler</h1>
                <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ürün 1</h5>
                            <p class="card-text">Açıklama</p>
                            <router-link :to="{ name: 'urun-detay', params: { id: 1 } }" class="btn btn-primary">Detay</router-link>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ürün 2</h5>
                            <p class="card-text">Açıklama</p>
                            <router-link :to="{ name: 'urun-detay', params: { id: 2 } }" class="btn btn-primary">Detay</router-link>
                        </div>
                    </div>
                </div>
            </div>
            </div>`
    };
    const Page_Urun_Detay = {
        template: `
            <div>
                <a href="#" class="btn btn-sm btn-primary float-right" @click="geriDon">Geri Dön</a>
                <a href="#" class="btn btn-sm btn-primary float-right" @click="anasayfayaDon">Anasayfaya Dön</a>
                <h1>Ürün {{ $route.params.id }} Detayı</h1>
            </div>`,
        methods: {
            geriDon() {
                this.$router.go(-1);
            },
            anasayfayaDon() {
                this.$router.push('/');
                //this.$router.push({ name: 'urun-detay', params: { id: 2 } });
            }
        }
    };

    const Page_Iletisim = {
        template: '<h1>İletişim</h1>'
    };

    const routes = [
        {
            path: '/', component: Page_Anasayfa,
            //redirect: '/iletisim'
            redirect: { name: 'iletisim' }
        },
        { path: '/hakkimizda', component: Page_Hakkimizda, alias: '/aboutus' },
        { path: '/urunler', component: Page_Urunler },
        { path: '/urunler/detay/:id', component: Page_Urun_Detay, name: 'urun-detay' },
        { path: '/iletisim', component: Page_Iletisim, name: 'iletisim' },
    ];

    const router = new VueRouter({
        routes,
        mode: 'hash' // hash, history
    });

    const app = new Vue({
        router,
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            urunlerAdresi: '/urunler'
        }
    })
</script>

```

## Ex 3

```html

<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
        <div class="container">
            <a href="#" class="navbar-brand">Routing App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <router-link to="/" class="nav-link" active-class="active" exact>Anasayfa</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/hakkimizda" class="nav-link" active-class="active">Hakkımızda</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="urunlerAdresi" class="nav-link" active-class="active">Ürünler</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ path: 'iletisim' }" tag="span" class="nav-link" active-class="active">İletişim</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <router-view></router-view>
    </div>
</div>

<script src="../assets/js/vue.js"></script>
<script src="../assets/js/vue-router.js"></script>

<script>
    const Page_Anasayfa = {
        template: '<h1>Hoşgeldiniz</h1>'
    };

    const Page_Hakkimizda = {
        template: `
            <div class="row">
                <div class="col-9">
                    <h1>Hakkımızda</h1>
                    <router-view></router-view>
                </div>
                <div class="col-3">
                    <div class="list-group">
                        <router-link to="/hakkimizda/giris" class="list-group-item list-group-item-action">Hakkımızda Giriş</router-link>
                        <router-link :to="{ name: 'hakkimizda-sayfa1' }" class="list-group-item list-group-item-action">Sayfa 1</router-link>
                        <router-link :to="{ name: 'hakkimizda-sayfa2' }" class="list-group-item list-group-item-action">Sayfa 2</router-link>
                    </div>
                </div>
            </div>`
    };

    const Page_Hakkimizda_Giris = { template: '<div class="jumbotron">Hakkımızda</div>'};
    const Page_Hakkimizda_Sayfa1 = { template: '<div class="jumbotron">Sayfa 1</div>'};
    const Page_Hakkimizda_Sayfa2 = { template: '<div class="jumbotron">Sayfa 2</div>'};

    const Page_Urunler = {
        template: `
            <div>
                <h1>Ürünler</h1>
                <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ürün 1</h5>
                            <p class="card-text">Açıklama</p>
                            <router-link :to="{ name: 'urun-detay', params: { id: 1 } }" class="btn btn-primary">Detay</router-link>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ürün 2</h5>
                            <p class="card-text">Açıklama</p>
                            <router-link :to="{ name: 'urun-detay', params: { id: 2 } }" class="btn btn-primary">Detay</router-link>
                        </div>
                    </div>
                </div>
            </div>
            </div>`
    };
    const Page_Urun_Detay = {
        template: `
            <div>
                <a href="#" class="btn btn-sm btn-primary float-right" @click="geriDon">Geri Dön</a>
                <a href="#" class="btn btn-sm btn-primary float-right" @click="anasayfayaDon">Anasayfaya Dön</a>
                <h1>Ürün {{ $route.params.id }} Detayı</h1>
            </div>`,
        methods: {
            geriDon() {
                this.$router.go(-1);
            },
            anasayfayaDon() {
                this.$router.push('/');
                //this.$router.push({ name: 'urun-detay', params: { id: 2 } });
            }
        }
    };
    const Page_Iletisim = {
        template: '<h1>İletişim</h1>'
    };

    const routes = [
        { path: '/', component: Page_Anasayfa },
        {
            path: '/hakkimizda',
            component: Page_Hakkimizda,
            children: [
                { path: '', component: Page_Hakkimizda_Giris, name: 'hakkimizda-giris' },
                { path: 'giris', component: Page_Hakkimizda_Giris, name: 'hakkimizda-giris' },
                { path: 'sayfa1', component: Page_Hakkimizda_Sayfa1, name: 'hakkimizda-sayfa1' },
                { path: 'sayfa2', component: Page_Hakkimizda_Sayfa2, name: 'hakkimizda-sayfa2' },
            ]
        },
        { path: '/urunler', component: Page_Urunler },
        { path: '/urunler/detay/:id', component: Page_Urun_Detay, name: 'urun-detay' },
        { path: '/iletisim', component: Page_Iletisim, name: 'iletisim' },
    ];

    const router = new VueRouter({
        routes,
        mode: 'hash' // hash, history
    });

    const app = new Vue({
        router,
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            urunlerAdresi: '/urunler'
        }
    })
</script>


```

## Ornek Proje Otobus Rez Sistemi

- Proje cli dan oluştururuz.

```js
vue create demo-otobus
```

- eski bir projenin üzerine yazıyorsanız:

```js
overwrite : eskisini siler yenisini yazar
merge : birleştirme yapar

```

- kullanacağımız özellikler

```text
babel
vue-router
css preprocessor

history mode:yex
css preprocessor: scss/sass
in dedicated config files
```

- şimdi çalıştırarak deneriz

```
npm run serve
```

- projemize bootstrap ekleriz

```
npm install bootstrap --save
```

- bootstrap global css 'e dahil (import) ederiz.

```css
/* App.vue */
/* ... */
<style lang="scss">
/* ... */
@import '~bootstrap/scss/bootstrap';
</style>
```

- assets klasörünü src altında kullandığımızda img etiketinde yoluna "./assets/..." olarak belirtmemiz gerekir. public klasöründe olursa "assets/..." olarak yazabiliriz.

**Sefer Arama Formunu Hazırlama**

- router path parametrenin sonuna eklenen "?" soru işareti optional olduğunu belirtir.
  

```js
{
    path: '/koltuksecimi/:sefer_id?'
    /* ... */
}
```









uvd-83

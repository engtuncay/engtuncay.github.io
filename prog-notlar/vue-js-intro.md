Vue 2 - Tutorial

- [B1 Vue Intro](#b1-vue-intro)
- [B2 Vue Basic](#b2-vue-basic)
  - [2-1 Instance](#2-1-instance)
  - [2-2 Lifecycle](#2-2-lifecycle)
  - [2-3 Data Binding (or code Binding)](#2-3-data-binding-or-code-binding)
  - [2-4 Attribue Binding](#2-4-attribue-binding)
  - [2-5 Class and Style Binding](#2-5-class-and-style-binding)
  - [2-6 List Items with v-for](#2-6-list-items-with-v-for)
  - [2-7 Event Handling](#2-7-event-handling)
  - [2-8 Conditional Rendering](#2-8-conditional-rendering)
  - [2-9 Computed Property](#2-9-computed-property)
  - [2-10 Watchers](#2-10-watchers)
  - [2-11 Forms](#2-11-forms)
  - [2-12 Form Validation](#2-12-form-validation)
  - [2-12 Filters](#2-12-filters)
  - [2-13 Custom Directive](#2-13-custom-directive)
- [B3 Vue Cli](#b3-vue-cli)
  - [Installation](#installation)
  - [Create a Project](#create-a-project)
  - [Project Template](#project-template)
  - [Serve Project](#serve-project)
  - [Install Modules](#install-modules)
  - [Build Command](#build-command)
- [B4 Component Structure](#b4-component-structure)
  - [4-1 Global vs Local Component](#4-1-global-vs-local-component)
    - [Global Component](#global-component)
    - [Local Component](#local-component)
    - [Cli Projesinde Component Kullanımı](#cli-projesinde-component-kullanımı)
  - [4-2 Slot Tag](#4-2-slot-tag)
  - [4-3 Props](#4-3-props)
  - [4-4 Prop Validation](#4-4-prop-validation)
  - [4-5 Child Parent Emit](#4-5-child-parent-emit)
  - [4-6 Parent to Child Invoke (Refs)](#4-6-parent-to-child-invoke-refs)
  - [4-7 Event Bus](#4-7-event-bus)
  - [4-8 Inline Template](#4-8-inline-template)
  - [4-9 Ornek Uygulama - Envanter Takip Sistemi](#4-9-ornek-uygulama---envanter-takip-sistemi)
- [B5 Routing](#b5-routing)
  - [Routing Installation](#routing-installation)
  - [Router Tanimlama](#router-tanimlama)
  - [Route Bağlantıları Verme](#route-bağlantıları-verme)
  - [Aktif Route Baglantisini Tespit Etme](#aktif-route-baglantisini-tespit-etme)
  - [Route Parametreleri](#route-parametreleri)
  - [Programatik Route Degisimi](#programatik-route-degisimi)
  - [Hash / History Modu](#hash--history-modu)
  - [Route Yönlendirme ve Alias Kullanımı](#route-yönlendirme-ve-alias-kullanımı)
  - [İç içe Rut Tanımlama (Nested Route)](#i̇ç-içe-rut-tanımlama-nested-route)
  - [Vue Cli ile Oluşturulan Projede Route Yapısının Kullanımı](#vue-cli-ile-oluşturulan-projede-route-yapısının-kullanımı)
  - [Hatalı Route Tanımlarını Yakalama](#hatalı-route-tanımlarını-yakalama)
  - [Route Degisimlerini izleme](#route-degisimlerini-izleme)
  - [Route Navigation Guard](#route-navigation-guard)
  - [Router Full Example (1)](#router-full-example-1)
  - [Router Full Ex 2](#router-full-ex-2)
  - [Ex 3](#ex-3)
  - [Ornek Proje Otobus Rez Sistemi](#ornek-proje-otobus-rez-sistemi)
- [B6 Vue Fetch from Api](#b6-vue-fetch-from-api)
  - [6-1 Fetch Todos](#6-1-fetch-todos)
  - [6-2 Vue Resources Todos](#6-2-vue-resources-todos)
  - [6-3 Fetch Products](#6-3-fetch-products)
  - [6-4 Fetch Omdb Api](#6-4-fetch-omdb-api)
  - [6-5 Axios](#6-5-axios)
- [Terimler ve Kısaltmalar](#terimler-ve-kısaltmalar)
- [Kaynaklar](#kaynaklar)

Önsöz

Bu öğreticide kaynak olarak Cem Gündüzoğlu Vue Js udemy kursu baz alınmıştır ve webden çeşitli kaynaklar kullanılmıştır. Kursu tavsiye ederim.

# B1 Vue Intro

Öğreticideki örneklerde kullanılan temel şablon aşağıda gösterilmektedir.

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vue.js</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/app.css">
</head>
<body>
<div id="app"></div>

<script src="../assets/js/vue.js"></script>
<script>
    const app = new Vue({
        el: '#app',
        name: 'Vue App',
        data: {
            mesaj: 'Merhaba Vue!'
        }
    })
</script>
</body>
</html>
```

app.css içeriği

```css

@import url('https://fonts.googleapis.com/css?family=Raleway:400,700,700i&subset=latin-ext');
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

body {
  font-family: 'Segoe UI Light';
  font-size: 18px;
}

h1, h2, h3, h4, h5, h6 {
  font-weight: 600;
}

.form-control:focus {
  outline: none;
  box-shadow: none;
}

.navbar {
	margin-bottom: 20px;
}

```

# B2 Vue Basic


## 2-1 Instance

Vue objesini oluştururak vue'yu aktif ederiz. Vue objesine parametre olarak gönderdiğimiz objede "el" alanında (property) vuejs'ye container olacak html elementi belirtiriz. Örnekte app id'li html elementi container olarak seçildi.

```html
<div id="app"></div>

<script src="../assets/js/vue.js"></script>
<script>
    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            mesaj: 'Merhaba Vue!'
        }
    })
</script>
```


## 2-2 Lifecycle

Lifecyle methods uygulamanın yaşam döngüsündeki bazı state değişimlerinde trigger edilen metodlar.

Lifecycle
- created : instance (vue) oluşturulunca tetikler.
- mounted : dom'a eklenince tetikler.
- updated : dom'u güncelleyince tetikler.
- destroyed : instance silinince (pasiflenince) tetikler.


```html
<div id="app">
    <span class="badge badge-success">{{ sayi }}</span>
	<hr>
	<button @click="change" class="btn btn-success">Değiştir</button>
    <button @click="destroy"  class="btn btn-danger">Instance Sil</button>
</div>

<script src="../assets/js/vue.js"></script>
<script>
    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            sayi: 5
        },
		methods: {
            // button events
			change() {
				this.sayi = Math.floor(Math.random() * 49) + 1;
			},
			destroy() {
				app.$destroy();
			}
        },
        created() {
            console.log('Instance oluşturuldu.');
        },
        mounted() {
            console.log("DOM'a eklendi");
            this.sayi = Math.floor(Math.random() * 49) + 1;
        },
        updated() {
            console.log('DOM güncellendi');
        },
        destroyed() {
            console.log('Instance silindi');
        }
    });
</script>
```

```
// First output
Instance oluşturuldu.
DOM'a eklendi
DOM güncellendi

// Change Event
DOM güncellendi

// Destroy Event (bundan sonra change event çalışmaz,sonlandığı için)
Instance silindi
```

## 2-3 Data Binding (or code Binding)

- String interpolation `{{ /*...*/ }}`  kullanarak template içerisinde data binding yapabiliriz. : içinde yazılan değeri basar. Text kullanılacaksa tırnak içinde ('text') kullanılır.

```html
<template>
    <div>
        {{ title }}
    </div>
</template>
```

- Html etiketinde kullanılan öznitelikler (attributes)

1. v-text  : text olarak elementin içine yazar
2. v-html : html olarak elementin içine yazar
3. v-model[.number] : elementin değerini, belirtilen property'e bind eder
4. v-once : bir defa basıp ilgili variable değişirse güncellemez

```html
<div id="app">
    <p>{{ mesaj }}</p>
    <p v-text="mesaj_html"></p>
    <p v-html="mesaj_html"></p>
    <hr>
    <div>
        <label>Mesaj</label>
        <input type="text" v-model="mesaj_html" class="form-control">
    </div>
    <hr>
    <div>
        <label>Fiyat</label>
        <input type="text" v-model.number="fiyat" class="form-control">
        <p>KDV Tutarı: {{ fiyat * 18 / 100 }}</p>
        <p>{{ (fiyat * 18 / 100)<5 ? 'KDV Düşük' : 'KDV Yüksek' }}</p>
        <p v-once>{{ (fiyat * 18 / 100)<5 ? 'KDV Düşük' : 'KDV Yüksek' }}</p>
    </div>


</div>

<script src="../assets/js/vue.js"></script>
<script>
    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            mesaj: 'Merhaba Vue!',
            mesaj_html: 'Merhaba <b>Cem</b>',
            fiyat: 12
        }
    })
</script>


```

## 2-4 Attribue Binding 

Bir elementin attribute değerini bir değişkene bağlar (bind). Değişkenin değerini bu attribute'a atar (assign).

Syntax
* v-bind:attributeName
* :attributeName 

- "v-bind:" kısayolu ":" iki noktadır.

**Örnekler**
```
v-bind:href
v-bind:title
:title
:href
:id
```

Örnek Uygulama
```html
<div id="app">
    <p><a v-bind:href="linkSite" v-bind:title="linkAciklama">{{ linkAciklama }}</a></p>
    <p><a :href="linkSite" :title="linkAciklama">{{ linkAciklama }}</a></p>
    <hr>
    <div :id="'kurs' + id">Kurs {{ id }}</div>
</div>

<script src="../assets/js/vue.js"></script>
<script>
    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            linkSite: 'http://www.uzaktankurs.com',
            linkAciklama: 'Uzaktan Kurs',
            id: 5
        }
    })
</script>

```

## 2-5 Class and Style Binding

Bir elementin class attribute'na değer atamak için kullanılır. Direk string olarak verilecek tırnak içinde yazılır, tırnak içinde olmayanlar değişken olarak kabul edilirler.

**Class Binding Kullanımları**

- :class="localVariable"
- :class=" 'className' "
- :class="[localVariable,'className']"
- :class="{ 'badge badge-success': kullanici.rol == 'Admin', 'badge badge-warning': kullanici.rol == 'User' }"

**Style Binding Kullanımlar**

- :style="varStyleExample"
  
varStyleExample örnek 

`varStyleExample = { color: 'red', fontSize: '18px' }`


**Örnek**

```html

<div id="app">
    <select v-model="secilenStil" class="form-control">
        <option>alert alert-success</option>
        <option>alert alert-warning</option>
        <option>alert alert-info</option>
        <option>alert alert-danger</option>
    </select>
    <div :class="secilenStil">Merhaba</div>
    <hr>
    <div :class="[bgBasarili, yaziBeyaz, 'jumbotron']">Merhaba</div>
    <hr>
    <div class="form-group row">
        <label for="isim" class="col-sm-2">İsim</label>
        <div class="col-sm-10">
            <input type="text" id="isim" v-model="kullanici.isim"
                   :class="{ 'form-control is-valid': kullanici.isim, 'form-control is-invalid': !kullanici.isim }">
            <span>{{ kullanici.isim.length }} karakter</span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2">Rol</label>
        <div class="col-sm-10">
            <span :class="{ 'badge badge-success': kullanici.rol == 'Admin', 'badge badge-warning': kullanici.rol == 'User' }">
                {{ kullanici.rol }}
            </span>
        </div>
    </div>
    <hr>
    <div :style="styleOrnek">Merhaba</div>

</div>

<script src="../assets/js/vue.js"></script>
<script>
    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            secilenStil: 'alert alert-success',
            bgBasarili: 'bg-success',
            yaziBeyaz: 'text-white',
            kullanici: {
                id: 1,
                isim: 'Cem',
                rol: 'Admin'
            },
            styleOrnek: {
                color: 'red',
                fontSize: '18px'
            }
        }
    })
</script>

```

## 2-6 List Items with v-for

```html
<!-- this tag repeats -->
<tag v-for="(element,index) in arrayVar">
    <!--  -->
</tag>
```


```html

<div id="app">
    <h1>Kullanıcılar ({{ kullanicilar.length }} kullanıcı)</h1>
    <hr>
    <table class="table table-bordered table-hover">
        <tr class="bg-success text-white">
            <th>index</th>
            <th>id</th>
            <th>isim</th>
            <th>rol</th>
        </tr>
        <tr v-for="(kullanici, index) in kullanicilar">
            <td>{{ index }}</td>
            <td>{{ kullanici.id }}</td>
            <td>{{ kullanici.isim }}</td>
            <td>{{ kullanici.rol }}</td>
        </tr>
    </table>
</div>

<script src="../assets/js/vue.js"></script>
<script>
    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            kullanicilar: [
                {
                    id: 25,
                    isim: 'Cem',
                    rol: 'Admin'
                },
                {
                    id: 32,
                    isim: 'Esra',
                    rol: 'Admin'
                }
                ]
        }
    })
</script>

```

## 2-7 Event Handling

* v-on:eventName 
* @eventName
  
Not : "v-on:" = "@" 


**Örnekler**

```
v-on:click or @click
v-on:keypress.enter
```

```html

<div id="app">
    <div class="alert alert-success">
        {{ mesaj }}
    </div>
    <button class="btn btn-sm btn-info" v-on:click="karsila">Karşıla</button>
    <button class="btn btn-sm btn-danger" @click="ugurla">Uğurla</button>
    <hr>
    <form @submit.prevent="true">
        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="email" v-model="email"
                       v-on:keypress.enter="emailKaydet">
            </div>
        </div>
    </form>
</div>

<script src="../assets/js/vue.js"></script>
<script>
    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            mesaj: 'Merhaba'
        },
        methods: {
            karsila() {
                this.mesaj = 'Hoşgeldiniz';
            },
            ugurla() {
                this.mesaj = 'Güle güle';
            },
            emailKaydet() {
                if (this.email != null)
                    this.mesaj = 'Email adresiniz kaydedildi.';
            }
        }
    })
</script>


```

## 2-8 Conditional Rendering

* v-if="boolConditionOrBoolVar"
* v-show="boolConditionOrBoolVar"

**Örnekler**

```
v-if="isim.length>0"
v-if="isVisibleDetaylar"
```

```html

<div id="app">
    <input type="text" class="form-control" v-model="isim">
    <span v-if="isim.length>0">{{ isim.length }} karakter</span>
    <hr>
    <div v-if="isVisibleDetaylar">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aperiam autem consequatur error id ipsa, itaque minima nam natus nihil pariatur quidem quos sunt! Asperiores blanditiis doloremque in perferendis ratione!
    </div>
    <div v-show="isVisibleDetaylar">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aperiam autem consequatur error id ipsa, itaque minima nam natus nihil pariatur quidem quos sunt! Asperiores blanditiis doloremque in perferendis ratione!
    </div>
    <button class="btn btn-primary" @click="gostergizle">Göster/Gizle</button>
    <hr>
    <select v-model="kullaniciTipi" class="form-control">
        <option value="">Seçiniz</option>
        <option>Müşteri</option>
        <option>Yönetici</option>
    </select>
    <div v-if="kullaniciTipi === 'Müşteri'">
        <h1>Müşteri Bilgileri</h1>
        ...
    </div>
    <div v-else-if="kullaniciTipi === 'Yönetici'">
        <h1>Yönetici Bilgileri</h1>
        ...
    </div>
    <div v-else>
        <h1>Diğer Bilgileri</h1>
        ...
    </div>
</div>

<script src="../assets/js/vue.js"></script>
<script>
    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            isVisibleDetaylar: false,
            isim: 'Cem',
            kullaniciTipi: ''
        },
        methods: {
            gostergizle() {
                this.isVisibleDetaylar = !this.isVisibleDetaylar;
            }
        }
    })
</script>

```
## 2-9 Computed Property

```html

<div id="app">
    <input v-model="ad" class="form-control">
    <input v-model="soyad" class="form-control">
    <p>{{ adsoyad }}</p>
    <hr>
    <input v-model="urun_fiyati" class="form-control">
    <p>{{ urun_kdv_fiyati }}</p>
    <hr>
    <p>{{ adsoyad2 }}</p>
    <hr>
    <p>{{ adsoyad }}</p>
    <p>{{ adsoyad }}</p>
    <p>{{ adsoyad }}</p>
    <hr>
    <p>{{ adsoyad3() }}</p>
    <p>{{ adsoyad3() }}</p>
    <p>{{ adsoyad3() }}</p>
    <hr>
    <ul>
        <li v-for="kullanici in c_ile_baslayan_kullanicilar">
            {{ kullanici}}
        </li>
    </ul>

</div>

<script src="../assets/js/vue.js"></script>
<script>
    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            ad: 'cem',
            soyad: 'gündüzoğlu',
            urun_fiyati: 12,
            kullanicilar: ['cem', 'esra', 'ceyda', 'murat', 'ebru']
        },
        methods: {
            adsoyad3() {
                console.log('Metot Çalıştı');
                return this.ad + ' ' + this.soyad;
            }
        },
        computed: {
            adsoyad() {
                console.log('Computed Çalıştı');
                return this.ad + ' ' + this.soyad;
            },
            urun_kdv_fiyati() {
                return this.urun_fiyati * 18 / 100;
            },
            adsoyad2: {
                get: function() {
                    return this.ad + ' ' + this.soyad;
                },
                set: function(value) {
                    let parts = value.split(' ');
                    this.ad = parts[0];
                    this.soyad = parts[1];
                }
            },
            c_ile_baslayan_kullanicilar() {
                return this.kullanicilar.filter(k => k.startsWith('c'));
            }
        }
    })
</script>

```

## 2-10 Watchers

```html
<div id="app">
    <form>
        Odun:
        <input type="number" v-model="odun" class="form-control col-2">

        Taş:
        <input type="number" v-model="tas" class="form-control col-2">

        Toplam Kullanılan Malzeme: {{ toplam }}

        Toplam Kullanılan Malzeme: {{ toplam2 }}
    </form>
</div>

<script src="../assets/js/vue.js"></script>
<script>
    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            odun: 0,
            tas: 0,
            toplam: 0
        },
        watch: {
            odun(newValue, oldValue) {
                console.log('Değerler:', oldValue, newValue);
                this.toplam = parseInt(this.odun) + parseInt(this.tas);
            },
            tas(newValue, oldValue) {
                console.log('Değerler:', oldValue, newValue);
                this.toplam = parseInt(this.odun) + parseInt(this.tas);
            }
        },
        computed: {
            toplam2() {
                return parseInt(this.odun) + parseInt(this.tas);
            }
        }
    })
</script>

```

## 2-11 Forms

```html

<div id="app">
    <form action="">
        <label>Adınız</label>
        <input type="text" v-model="kullanici.ad" class="form-control col-4">

        <label>Adres</label>
        <textarea v-model="kullanici.adres" class="form-control col-4"></textarea>

        <hr>

        <label>
            <input type="checkbox" v-model="kullanici.aktif_mi"> Aktif Mi
        </label>
        <pre class="form-text text-muted">{{ kullanici.aktif_mi }}</pre>

        <hr>

        <label>
            <input type="checkbox" v-model="kullanici.secilen_roller" value="Yönetici"> Yönetici
        </label>
        <label>
            <input type="checkbox" v-model="kullanici.secilen_roller" value="Editör"> Editör
        </label>
        <label>
            <input type="checkbox" v-model="kullanici.secilen_roller" value="Müşteri"> Müşteri
        </label>
        <select v-model="kullanici.secilen_roller" class="form-control col-4" multiple>
            <option>Yönetici</option>
            <option>Editör</option>
            <option>Müşteri</option>
        </select>
        <pre class="form-text text-muted">{{ kullanici.secilen_roller }}</pre>

        <hr>

        <label>
            <input type="radio" v-model="kullanici.cinsiyet" value="E"> Erkek
        </label>
        <label>
            <input type="radio" v-model="kullanici.cinsiyet" value="K"> Kadın
        </label>
        <pre class="form-text text-muted">{{ kullanici.cinsiyet }}</pre>

        <hr>
        <label>Doğum Yeri</label>
        <select v-model="kullanici.dogum_yeri" class="form-control col-4">
            <option value="">Seçiniz</option>
            <option v-for="sehir in sehirler" :value="sehir.value">
                {{ sehir.text }}
            </option>
        </select>
        <pre class="form-text text-muted">{{ kullanici.dogum_yeri }}</pre>
    </form>
</div>

<script src="../assets/js/vue.js"></script>
<script>
    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            kullanici: {
                ad: 'Cem',
                adres: 'Ankara',
                aktif_mi: false,
                secilen_roller: [],
                cinsiyet: 'E',
                dogum_yeri: 6
            },
            sehirler: [
                { text: 'Ankara', value: 6 },
                { text: 'İstanbul', value: 34 },
                { text: 'İzmir',  value: 35 }
            ]
        }
    })
</script>

```

## 2-12 Form Validation

```html
<div id="app">
    <h2>Kullanıcı Kayıt Formu</h2>
    <hr>
    <div v-if="errors.length>0" class="alert alert-danger">
        <p>Lütfen form verilerini düzeltiniz:</p>
        <ul>
            <li v-for="error in errors">{{ error }}</li>
        </ul>
    </div>

    <form action="#" method="post" @submit="kaydet" novalidate="true">
        <div class="form-group">
            <label for="adsoyad">Ad Soyad</label>
            <input type="text" id="adsoyad" v-model="adsoyad" class="form-control col-4">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" v-model="email" class="form-control col-4">
        </div>

        <div class="form-group">
            <label for="sifre">Şifre</label>
            <input type="password" id="sifre" v-model="sifre" class="form-control col-4">
        </div>

        <div class="form-group">
            <label for="sifre2">Şifre Tekrarı</label>
            <input type="password" id="sifre2" v-model="sifre2" class="form-control col-4">
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" v-model="ilgi_alanlari" value="1"> Teknoloji
            </label>
            <label>
                <input type="checkbox" v-model="ilgi_alanlari" value="2"> Sinema
            </label>
            <label>
                <input type="checkbox" v-model="ilgi_alanlari" value="3"> Spor
            </label>
        </div>
        <input type="submit" value="Kaydol" class="btn btn-primary">
    </form>
</div>

<script src="../assets/js/jquery-2.2.4.min.js"></script>
<script src="../assets/js/toastr.min.js"></script>
<script src="../assets/js/vue.js"></script>
<script>
    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            errors: [],
            adsoyad: '',
            sifre: '',
            sifre2: '',
            email: '',
            ilgi_alanlari: []
        },
        methods: {
            kaydet(e) {
                e.preventDefault();
                this.errors = [];
                if (!this.adsoyad) this.errors.push('Adsoyad alanı gerekli');
                if (!this.email) this.errors.push('Email alanı gerekli');
                if (!this.validEmail(this.email)) this.errors.push('Email alanı geçerli değil');
                if (!this.sifre && !this.sifre2) this.errors.push('Şifre alanı gerekli');
                if (this.sifre !== this.sifre2) this.errors.push('Şifre ve tekrarı aynı olmalıdır');

                if (this.errors.length === 0) {
                    let msg = 'Form verileri kaydedildi.';
                    console.log(msg);
                    toastr.success(msg);
                } else {
                    console.log('Form hatalı');

                    let msg = '';
                    this.errors.forEach(value => {
                        msg += value + "<br>";
                    });
                    toastr.error(msg);
                }
            },
            validEmail:function(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }
        }
    })
</script>

```

## 2-12 Filters

```html
<div id="app">
    <p>{{ baslik | buyukharf }}</p>
    <p>{{ baslik | kucukharf }}</p>
    <p>{{ baslik | ilkharfbuyuk }}</p>
    <p>{{ baslik | ilkharflerbuyuk }}</p>
    <p>{{ baslik | terstenyaz }}</p>
    <p>{{ baslik | truncate(8) }}</p>
    <p>{{ baslik | terstenyaz | truncate(8) }}</p>
    <p :title="baslik | terstenyaz">Tersten yaz filtresi</p>
    <hr>
    <input type="text" v-model.trim="baslik" class="form-control">
    <pre class="alert alert-info">{{ baslik }}</pre>
    <hr>
    <input type="text" v-model.number="sayi" class="form-control">
    <pre class="alert alert-info">{{ sayi+sayi }}</pre>
</div>

<script src="../assets/js/vue.js"></script>
<script>
    Vue.filter('terstenyaz', function(value) {
        return value.toString().split('').reverse().join('');
    });

    Vue.filter('truncate', function(value, length) {
        if (value.length < length) {
            return value;
        }
        length = length - 3;

        return value.substring(0, length) + '...';
    });

    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            baslik: 'lorem ipsum dolor sit amet',
            sayi: 10
        },
        filters: {
            buyukharf(value) {
                return value.toString().toUpperCase();
            },
            kucukharf(value) {
                return value.toString().toLowerCase();
            },
            ilkharfbuyuk(value) {
                return value.toString().charAt(0).toUpperCase() + value.slice(1);
            },
            ilkharflerbuyuk(value) {
                let kelimeler = value.toString().split(' ');
                let donenDeger = '';
                kelimeler.forEach(kelime => {
                    donenDeger += kelime.toString().charAt(0).toUpperCase() + kelime.slice(1) + ' ';
                });
                return donenDeger;
            }
        }
    })
</script>

```

## 2-13 Custom Directive

```html

<div id="app">
    <div v-alert="'success'">{{ baslik }}</div>
    <div v-bg="{ type: 'info' }" class="p-2 mb-4 text-white">{{ baslik }}</div>
    <input type="text" v-model="tarihsaat" class="form-control col-4">
    <input type="text" v-model="tarihsaat" v-datetime:date="tarihsaat" class="form-control col-4">
    <input type="text" v-model="tarihsaat" v-datetime:time="tarihsaat" class="form-control col-4">
</div>

<script src="../assets/js/vue.js"></script>
<script>
    Vue.directive('datetime', function(el, binding) {
        if (binding.arg === 'date')
            el.value = new Date(binding.value).toLocaleDateString();
        else
            el.value = new Date(binding.value).toLocaleTimeString();
    });
    
    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            baslik: 'lorem ipsum dolar sit amet',
            tarihsaat: '2018-06-24 10:12:00'
        },
        directives: {
            alert: function(el, binding) {
                el.setAttribute('class', 'alert alert-' + binding.value);
            },
            bg: function(el, binding) {
                el.setAttribute('class', el.getAttribute('class') + ' bg-' + binding.value.type);
            }
        }
    })
</script>


```


# B3 Vue Cli

## Installation

Vue cli komut satırı aracının yüklenmesi :

```js
npm install -g @vue/cli
//or yarn
yarn global add @vue/cli
```

After installing required packages you can use “vue” command globally and create new project. To test the installation is successfully finished, run the following command:

```js
vue --version
```

It will show you the version of Vue. If you successfully see these information this means that Vue is now working globally in your system.

## Create a Project

To create new project, we will run this command vue create “project_name” in appropriate directory for your wishes. Let’s start by creating a new project by marking the project’s name as vue-app

```js
vue create vue-app
```


## Project Template

Proje oluştururken yüklenecek eklentiler sorulur.

**Example Template**

```
babel
css pre-processors -> SCSS/SASS ! , LESS , Stylus
linter-formatter
in dedicated config files->true
```

preset(template) şablon manasına gelir

## Serve Project

Projemizi ayağa kaldırır, lokalde uygulama sunucusunu çalıştırır.

```js
yarn run serve
// veya
npm run serve
```

## Install Modules

Package json dosyasındaki bağımlılıkları(kütüphaneleri) yüklemek için

```js
npm install === yarn 
// Install is the default behavior of yarn.
```


## Build Command



```js
yarn build
// veya
npm build
```




# B4 Component Structure


## 4-1 Global vs Local Component

### Global Component

- Component definition

```js
Vue.component( strComponentName, componentObj ); {
``` 

Methods and Properties of Component Object
- data()
- template


```js
Vue.component('AlertCount', {
        data() {
            return {
                count: 0
            }
        },
        template: `
            <div class="alert alert-success">
                Merhaba
                <button @click="count++" class="btn btn-sm btn-primary">
                    {{ count }} kez tıkladın
                </button>
            </div>`
    });

```

- Component usage

```html
<alert-count></alert-count>
```

### Local Component

```js

var AlertCount2 = {
    data() {
        return {
            count: 0
        }
    },
    template: `
        <div class="alert alert-success">
            Merhaba
            <button @click="count++" class="btn btn-sm btn-primary">
                {{ count }} kez tıkladın
            </button>
        </div>`
};

//... vue objesinde(instance) component kayıt edilir
const app = new Vue({
        //...
        components: {
            'alert-count2': AlertCount2
        }
    });

```

- Component Usage 

```html
<alert-count2></alert-count2>

```

### Cli Projesinde Component Kullanımı

- Vue uzantılı component dosyamızda üç blok bulunur.
  - Template : html template
  - Script : Js codes
  - Style : style definitions


**HelloWorld component**

```html
<template>
    <div>
        <h1>{{ msg }}</h1>
        <hr>
    </div>
</template>

<script>
    export default {
        name: 'HelloWorld',
        props: {
            msg: String
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
    h3 {
        margin: 40px 0 0;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        display: inline-block;
        margin: 0 10px;
    }

    a {
        color: #42b983;
    }
</style>

<!-- İkinci bir stil (global) tanımlanabilir.Tavsiye edilmez. -->
<style>
    // genel stil tanımları
</style>

```

**AlerCount Component**

AlertCount.vue

```html
<template>
  <div class="alert alert-success">
    Merhaba
    <button @click="count++" class="btn btn-sm btn-primary">
      {{ count }} kez tıkladın
    </button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      count: 0
    }
  }
}
</script>

```

- Vue app component i eklemek için import ile dosyayı ekliyoruz. Daha sonra da components tanımlamalarına component'in tag ismi ve import adını tanımlarız.

- Component tanımı şu şekillerde yapılabilir
  - hello: HelloWorld
  - 'alert-count': AlertCount (tag isminde tire (-) varsa, tırnak içinde yazmamız gerekir.)
  - HelloWorld  (bunu kullanabilmek için comp dosyasında name değeri olarak HelloWorld girilmesi lazım, ayrıca app dosyasında <HelloWorld> veya <hello-world> şeklinde kullanılabilir.) 
  - HelloWorld : HelloWorld

**App.Vue**

```html

<template>
    <div id="app">
        <img src="./assets/logo.png">
        <!-- msg comp'nin prop'u -->
        <hello msg="Welcome to Your Vue.js App"/>
        <alert-count></alert-count>
    </div>
</template>

<script>
    import HelloWorld from './components/HelloWorld.vue'
    import AlertCount from './components/AlertCount.vue'

    export default {
        name: 'app',
        components: {
            hello: HelloWorld,
            'alert-count': AlertCount
        }
    }
</script>


```

## 4-2 Slot Tag

- alert component tag'inin içine yazılan değeri, component template tanımındaki slot tag içerisine yazılır. Comp tanımında slot etiketinin içerisine yazacağımız değer varsayılan değer olacaktır. ( Örnek card componenti <slot>Merhaba</slot>)

- birden fazla slot açabiliriz. name attribute tanımlarız. Vue Appde bu slotları doldurmak için component etiketinden sonra <template slot="slotName">...</template> etiketini (tag) içine yazarız. (örnek card-with-header componenti)


```html

<div id="app">
    <alert>Merhaba</alert>
    <alert>Nasılsın</alert>

    <card>Lorem ipsum</card>
    <card></card>

    <card-with-header>
        <template slot="header">Üye Girişi</template>

        Kullanıcı adı-Şifre

        <template slot="footer">
            <button class="btn btn-sm btn-primary">Giriş Yap</button>
        </template>
    </card-with-header>

</div>

<script src="../assets/js/vue.js"></script>
<script>
    Vue.component('Alert', {
        template: `
            <div class="alert alert-success">
                <slot></slot>
            </div>`
    });

    Vue.component('Card', {
        template: `
            <div class="card">
                <div class="card-body">
                    <div class="card-text">
                        <slot>Merhaba</slot>
                    </div>
                </div>
            </div>`
    });

    Vue.component('CardWithHeader', {
        template: `
            <div class="card">
                <div class="card-header">
                    <slot name="header">Başlık</slot>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <slot>İçerik</slot>
                    </div>
                </div>
                <div class="card-footer">
                    <slot name="footer">Alt kısım</slot>
                </div>
            </div>`
    });

    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {}
    })
</script>

```


## 4-3 Props

Componentlere özellik (attribute) ekleme.

- Comp tanımında propsları belirtmeliyiz.
    
    props: ['header', 'body', 'footerButtonText']

- Comp etiketinde bu özelliklere (attribute) değer ataması yaparız.

- Comp template'inde string interpolation ile kullanırız. ({})

- props değeri girilirken başına : eklersek degerin data'dan alınacağını belirtiriz. Örnekte (:body) propsunda kullanıldı.body propsun değeri data'daki bodyIcerigi değişkenin değerine eşit olur.
  
- html değeri bastırmak için comp template'inde değeri v-html attribute yazarız. Örneğin v-html="footer" ( footer props 'ın adı)
  
```html

<div id="app">
    <card-with-header
        header="Üye Girişi"
        :body="bodyIcerigi"
        footer-button-text="Giriş yap"
    >
    </card-with-header>
</div>

<script src="../assets/js/vue.js"></script>
<script>
    Vue.component('CardWithHeader', {
        props: ['header', 'body', 'footerButtonText'],
        template: `
            <div class="card">
                <div class="card-header">
                    {{ header }}
                </div>
                <div class="card-body">
                    {{ body }}
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary">{{ footerButtonText }}</button>
                </div>
            </div>`
    });

    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            bodyIcerigi: 'Kullanıcı adı-şifre'
        }
    })
</script>


```

## 4-4 Prop Validation

- component tanımında props property sinde belirtiriz. type (String,Boolean,Array,Object,Date,Function,Symbol) ve required validationları yapabiliriz.

Örnek

```js
Vue.component('Modal', {
props: { 'id': { type: String, required: true }, }
//...
});
```

- Örnek Uygulama

```html

<div id="app">
    <modal :id="modalId" :title="modalTitle" :body="modalBody"></modal>

    <a href="javascript:" class="btn btn-primary" data-toggle="modal" data-target="#ornekModal">
        Modal Aç
    </a>
</div>

<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/vue.js"></script>
<script>
    // type: String, Boolean, Array, Object
    Vue.component('Modal', {
        props: {
            'id': { type: String, required: true },
            'title': { type: String, required: false, default: 'Modal Title' },
            'body': { type: String, required: false, default: '-' }
        },
        template: `
            <div class="modal fade" :id="id" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">{{ title }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ body }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                        </div>
                    </div>
                </div>
            </div>`
    });

    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            modalId: 'ornekModal',
            modalTitle: 'Örnek Başlık',
            modalBody: 'Örnek İçerik'
        }
    })
</script>

```

## 4-5 Child Parent Emit 

* this/ref Yöntemiyle

this objesinin $parent property si üzerinden parent component'e ulaşırız.


```js
this.$parent.$data.parentMessage = this.childMessage;
```
![ParentChild](https://image.prntscr.com/image/RS1Q8z1IQaW6sk1kUmngYQ.png)


* Emit Yöntemiyle

![Emit Yöntimi](https://image.prntscr.com/image/5qYgnLWSROyKJYuDf8NzyA.png)

1- Parent component template'nde tanımlanan child component'e onChange event eklenir. Child component içerisinden burası (childChanged metodu) trigger edilecek.

```html
<child @onChange="childChanged"></child>
```

2- Child componentde onChange event trigger edilir. Örnekte Arguman olarak this.childMessage gönderiliyor.

```js
this.$emit('onChange', this.childMessage);
```

- Console'den app vue instance'dan parent ve child degerlerini görebiliriz. ($parent,$children) property 'silerine incelenebilir.
  
Örneğin app.$children[0] app'nin ilk componentine erişmiş oluruz.



- Örnek Uygulama

```html
<div id="app">
    <parent></parent>
</div>

<script src="../assets/js/vue.js"></script>
<script>
    Vue.component('Parent', {
        template: `
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">Parent</div>
                <div class="card-body">
                    Parent Message: {{ parentMessage }}
                    <hr>
                    <h3>Child Comp</h3>
                    <child @onChange="childChanged"></child>
                </div>
            </div>
        `, // childChange fonksiyonu, onChange event'a observer oluyor.
        data() {
            return {
                parentMessage: ''
            }
        },
        methods: {
            childChanged(msg) {
                this.parentMessage = msg;
            }
        }
    });

    Vue.component('Child', {
        template: `
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Child</div>
                <div class="card-body">
                    Child Message: {{ childMessage }}
                    <div class="form-inline">
                        <input v-model="childMessage" class="form-control">
                        <button @click="changeParentMessage" class="btn btn-warning">
                            Change Parent Message (by this ref)
                        </button>
                        <button @click="changeParentMessage2" class="btn btn-warning">
                            Change Parent Message (by emit)
                        </button>
                    </div>
                </div>
            </div>
        `,
        data() {
            return {
                childMessage: ''
            }
        },
        methods: {
            changeParentMessage() {
                this.$parent.$data.parentMessage = this.childMessage;
            },
            changeParentMessage2() {
                this.$emit('onChange', this.childMessage);
            }
        }
    })

    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {}
    })
</script>

```

## 4-6 Parent to Child Invoke (Refs)

- Parent içerisinde child metodu çağırma

1. Parent template'inde child componente ref attibute tanımı yaparız. `<child ref="child1"></child>` Burada child componente reference olarak child1 verdik.

2. Parent kodumuzda child componente ref ile erişim sağlarız. `this.$refs.child1.childMethod();`
   
- Child içerisinde parent methodu çağırma

1. Child component kodunda `this.$parent.parentMethod()` şeklinde erişebiliriz.

- Örnek Uygulama

```html

<div id="app">
    <parent></parent>
</div>

<script src="../assets/js/vue.js"></script>
<script>
    Vue.component('Parent', {
        template: `
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">Parent</div>
                <div class="card-body">
                    <button @click="callChildMethod" class="btn btn-danger">
                        Call Child Method
                    </button>
					<child ref="child1"></child>
                </div>
            </div>`,
        methods: {
            callChildMethod() {
                this.$refs.child1.childMethod();
            },
            parentMethod() {
                console.log('Parent method called...');
            }
        }
    });

    Vue.component('Child', {
        template: `
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Child</div>
                <div class="card-body">
                    <button @click="callParentMethod" class="btn btn-danger">
                        Call Parent Method
                    </button>
                </div>
            </div>`,
        methods: {
            childMethod() {
                console.log('Child method called...');
            },
            callParentMethod() {
                this.$parent.parentMethod();
            }
        }
    });

    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {}
    })
</script>


```

## 4-7 Event Bus

- Herhangi bir component'deki değişikliği dinleyip, diger comp'larda reactive olarak işlemler yapmak istiyorsak kullanırız.

- EventBus için Vue objesine ihtiyacımız. window objesine property olarak eklersek global olarak kullanabiliriz.

```js
window.EventBus = new Vue();

```

- Olayı trigger etmek için (emit ~ trigger), olayı trigger ederken deger (argüman) gönderebiliriz.

```js
window.EventBus.$emit('showDetailInModal', this.item);
```

- Olayı dinlemek için (componentin created life cycle ekleriz..) , item objesi trigger edilirken gönderilir.

```js
created() {
    window.EventBus.$on('showDetailInModal', (item) => {
    this.title = item.title;
    this.body = item.detail;
    });
}
```

- Örnek Uygulama

```html
<!-- Main Template  -->
<div id="app">
    <div class="row">
        <card-item :item="sampleItem"></card-item>
    </div>
    <modal></modal>

    <card-list :title="'Kurslar'" :cards="sampleItems"></card-list>
</div>

<!-- Script Block -->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/vue.js"></script>
<script>
    window.EventBus = new Vue();

    Vue.component('CardItem', {
        props: {
            item: {required: true, default: {}}
        },
        template: `
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="card" style="height: 400px">
                    <img class="card-img-top img-fluid" :src="item.imageUrl" alt="Card image cap" style="height: 180px">
                    <div class="card-body">
                        <h3 class="card-title" v-text="item.title"></h3>
                        <p class="card-text" v-text="item.description"></p>
                    </div>
                    <div class="card-footer">
                        <a href="javascript:" class="btn btn-primary" @click="showDetail">Detay</a>
                    </div>
                </div>
            </div>`,
        methods: {
            showDetail() {
                $('#itemModalDetail').modal();
                window.EventBus.$emit('showDetailInModal', this.item);
            }
        }
    });

    Vue.component('Modal', {
        props: {
            title: {required: false, default: 'Modal Title'},
            body: {required: false, default: 'Modal Body'}
        },
        template: `
            <div class="modal fade" id="itemModalDetail" tabindex="-1" role="dialog" aria-labelledby="itemModalDetailLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">{{ title }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" v-html="body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                        </div>
                    </div>
                </div>
            </div>`,
        created() {
            window.EventBus.$on('showDetailInModal', (item) => {
                this.title = item.title;
                this.body = item.detail;
            });
        }
    });

    Vue.component('CardList', {
        props: {
            title: { type: String, required: false, default: 'Card List' },
            cards: { type: Array, required: true, default: [] }
        },
        template: `
            <div class="card-list">
                <h2>{{ title }}</h2>
                <div class="row">
                    <card-item :item="card" v-for="(card, index) in cards" :key="card.title"></card-item>
                </div>
            </div>`
    });

    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            sampleItem: {
                imageUrl: '../assets/img/pic2.jpg',
                title: 'Sample Title',
                description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                detail: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
            },
            sampleItems: [
            {
                title: 'JavaScript Kursu',
                description: 'JavaScript ile web uygulamaları yapın',
                detail: 'JavaScript ile web uygulamaları yapın<br><b>Fiyatı:</b> 29',
                price: 29,
                imageUrl: '../assets/img/coverJS101.jpg'
            }, {
                title: 'Vue.js Kursu',
                description: 'Vue.js ile web uygulamaları yapın',
                detail: 'Vue.js ile web uygulamaları yapın<br><b>Fiyatı:</b> 39',
                price: 39,
                imageUrl: '../assets/img/coverVUE101.jpg'
            }, {
                title: 'Laravel Kursu',
                description: 'Laravel ile web uygulamaları yapın',
                detail: 'Laravel ile web uygulamaları yapın<br><b>Fiyatı:</b> 59',
                price: 59,
                imageUrl: '../assets/img/coverLRV101.jpg'
            }, {
                title: 'Ionic ile Mobil Uygulama Geliştirme Kursu',
                description: 'Ionic ile mobil uygulamalar geliştirin',
                detail: 'Ionic ile mobil uygulamalar geliştirin<br><b>Fiyatı:</b> 59',
                price: 59,
                imageUrl: '../assets/img/coverIONIC.jpg'
            }]
        }
    })
</script>

```

## 4-8 Inline Template

- Component template'ni template property si yerine, direk kullandığımız yerde tanımlayabiliriz.

```html

<div id="app">
    <course-progress inline-template>
        <div>
            <div class="progress">
                <div class="progress-bar" :style="{ width: degree + '%' }">
                    {{ degree }}
                </div>
            </div>
            <hr>
            <button @click="degree += 5" class="btn btn-primary">Increment</button>
            <button @click="degree -= 5" class="btn btn-primary">Decrement</button>
        </div>
    </course-progress>
</div>

<script src="../assets/js/vue.js"></script>
<script>
    Vue.component('CourseProgress', {
        data() {
            return {
                degree: 75
            }
        }
    });

    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {}
    })
</script>

```
## 4-9 Ornek Uygulama - Envanter Takip Sistemi



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






uvd-83

# B6 Vue Fetch from Api

## 6-1 Fetch Todos

```html

<div id="app">
    <h2>Yapılacak Listesi ({{list.length}} kayıt)</h2>
    <hr>
    <div v-if="isLoading">Yükleniyor...</div>
    <p v-if="list.length===0">Yapılacak yok.</p>
    <table class="table table-bordered table-hover" v-if="list.length>0">
        <thead>
        <tr class="bg-success text-white">
            <td>index</td>
            <td>başlık</td>
            <td>yapıldı</td>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(item, index) in list">
            <td>{{ index }}</td>
            <td>{{ item.title }}</td>
            <td>{{ item.completed }}</td>
        </tr>
        </tbody>
    </table>
</div>

<script src="../assets/js/vue.js"></script>
<script>
    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            isLoading: true,
            list: []
        },
        created() {
            fetch('https://jsonplaceholder.typicode.com/todos')
                .then((res) => {
                    return res.json();
                })
                .then((res) => {
                    this.isLoading = false;
                    this.list = res;
                })
        }
    })
</script>

```

## 6-2 Vue Resources Todos

```html

<div id="app">
    <h2>Yapılacak Listesi ({{list.length}} kayıt)</h2>
    <hr>
    <div v-if="isLoading">Yükleniyor...</div>
    <p v-if="list.length===0">Yapılacak yok.</p>
    <table class="table table-bordered table-hover" v-if="list.length>0">
        <thead>
        <tr class="bg-success text-white">
            <td>index</td>
            <td>başlık</td>
            <td>yapıldı</td>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(item, index) in list">
            <td>{{ index }}</td>
            <td>{{ item.title }}</td>
            <td>{{ item.completed }}</td>
        </tr>
        </tbody>
    </table>
</div>

<script src="../assets/js/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>
<script>
    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            isLoading: true,
            list: []
        },
        created() {
            this.$http.get('https://jsonplaceholder.typicode.com/todos')
                .then(res => {
                    this.isLoading = false;
                    this.list = res.body;
                }, response => {
                    // error callback
                });
        }
    })
</script>

```

## 6-3 Fetch Products

```html

<div id="app">
    <h2>Ürünler</h2>
    <hr>
    <p v-if="!products.length">Ürün bulunamadı!</p>

    <b>Toplam Adet:</b> {{products.length}},
    <b>Toplam Tutar:</b> {{paymentTotal}},
    <b>Toplam Kdv:</b> {{paymentTotalTax}}

    <div class="row" v-if="products.length">
        <div class="col-3" v-for="(item, index) in products">
            <div class="card">
                <img class="card-img-top" style="height: 230px;" :src="item.resim" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ item.baslik }}</h5>
                    <p class="card-text">
                        <b>Kategori:</b> {{ item.kategori }},
                        <b>Tutar:</b> {{ item.tutar }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/vue.js"></script>
<script>
    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            products: []
        },
        created() {
            fetch('db-products.json')
                .then((res) => {
                    return res.json();
                })
                .then((res) => {
                    this.products = res.products;
                })
        },
        computed: {
            paymentTotal() {
                let total = 0;
                this.products.forEach((product) => {
                    total += parseFloat(product.tutar);
                });
                return total.toFixed(2);
            },
            paymentTotalTax() {
                return (this.paymentTotal * 18 / 100).toFixed(2);
            }
        }
    })
</script>

```

## 6-4 Fetch Omdb Api

```html

<div id="app">
    <div class="container">
        <p v-if="isLoading">Yükleniyor.</p>
        <h2>Filmler</h2>
        <hr>
        <form class="form-inline" @submit.prevent="true">
            <input type="text" class="form-control col-4" v-model="search">
            <button class="btn btn-primary" @click="searchFilm">Ara</button>
        </form>
        <table class="table table-hover" v-if="films.length">
            <tr v-if="films.length">
                <td colspan="2">{{films.length}} kayıt bulundu</td>
            </tr>
            <tr v-if="!films.length">
                <td colspan="2">Kayıt yok</td>
            </tr>
            <tr v-for="(item, index) in films">
                <td>
                    <img class="img-responsive" v-bind:src="item.Poster" style="height: 150px">
                </td>
                <td>
                    <h4>{{item.Title}} <small>{{item.Year}}</small></h4>
                </td>
            </tr>
        </table>
    </div>
</div>

<script src="../assets/js/vue.js"></script>
<script>
    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            isLoading: false,
            search: '',
            films: []
        },
        methods: {
            searchFilm() {
                this.isLoading = true;
                fetch('http://www.omdbapi.com/?s=' + this.search +'&page=1&apikey=68ca10bc')
                    .then((res) => {
                        return res.json();
                    })
                    .then((res) => {
                        this.films = res.Search;
                        this.isLoading = false;
                    })
            }
        }
    })
</script>

```

## 6-5 Axios

```html

<div id="app">
    <div class="container">
        <button class="btn btn-info float-right" @click="itemNew">Yeni Ürün</button>

        <div class="modal fade" tabindex="-1" role="dialog" id="itemModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form @submit.prevent="itemSave">
                        <div class="modal-header">
                            <h5 class="modal-title">Ürün Kaydı</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="baslik">Başlık</label>
                                <input type="text" name="baslik" id="baslik" v-model="formItem.baslik" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <input type="text" name="kategori" id="kategori" v-model="formItem.kategori" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="tutar">Tutar</label>
                                <input type="text" name="tutar" id="tutar" v-model="formItem.tutar" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" :value="formItem.id>0?'Güncelle':'Kaydet'">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <h2>Ürünler ({{list.length}})</h2>
        <table class="table table-bordered table-hover">
            <tr v-if="!list.length">
                <td>Kayıt yok</td>
            </tr>
            <tr v-for="item in list">
                <td>{{item.id}}</td>
                <td><img :src="item.resim" style="height: 120px;"></td>
                <td>{{item.baslik}}</td>
                <td>{{item.kategori}}</td>
                <td>{{item.tutar}}</td>
                <td>
                    <button class="btn btn-success btn-sm" @click="itemEdit(item.id)">Düzenle</button>
                </td>
                <td>
                    <button class="btn btn-danger btn-sm" @click="itemDelete(item.id)">Sil</button>
                </td>
            </tr>
        </table>
    </div>
</div>

<script src="../assets/js/vue.js"></script>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/sweetalert2.all.js"></script>
<script src="../assets/js/axios.min.js"></script>
<script>
    const app = new Vue({
        el: '#app',
        name: 'Uzaktan Kurs',
        data: {
            formItem: {},
            list: []
        },
        created() {
            this.getProducts();
        },
        methods: {
            getProducts() {
                axios.get('http://localhost:3001/products')
                    .then((res) => {
                        this.list = res.data;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            itemNew() {
                this.formItem = {};
                $('#itemModal').modal('show');
            },
            itemSave() {
                if (this.formItem.id > 0) {
                    axios.put('http://localhost:3001/products/' + this.formItem.id, this.formItem)
                        .then((res) => {
                            swal('Ürün', 'Güncellendi', 'success');
                            this.getProducts();

                            this.formItem = {};
                            $('#itemModal').modal('hide');
                        })
                        .catch((err) => {
                            console.log(err);
                        });
                } else {
                    axios.post('http://localhost:3001/products', this.formItem)
                        .then((res) => {
                            swal('Ürün', 'Kaydedildi', 'success');
                            this.getProducts();

                            this.formItem = {};
                            $('#itemModal').modal('hide');
                        })
                        .catch((err) => {
                            console.log(err);
                        });
                }
            },
            itemEdit(id) {
                axios.get('http://localhost:3001/products/' + id)
                    .then((res) => {
                        this.formItem = res.data;

                        $('#itemModal').modal('show');
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            itemDelete(id) {
                swal({
                    title: 'Emin misiniz?',
                    text: 'Silmek istediğinize emin misiniz?',
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'İptal',
                    confirmButtonText: 'Sil'
                }).then((result)=> {
                    if (result.value) {
                        axios.delete('http://localhost:3001/products/' + id).
                            then((res) => {
                                swal('Ürün', 'Silindi', 'success');
                                this.getProducts();
                            });
                    }
                })
            }
        }
    })
</script>

```



# Terimler ve Kısaltmalar

**Terimler**

* Öznitelik : Attibute
* Özellik : Property

**Kısaltmalar**

* var : Variable
* str : String
* obj : Object


# Kaynaklar

- Udemy Cem Gündüzoğlu Kursu (Vue.js ile Sıfırdan Uygulama Geliştirme)

Kursu satın almanızı tavsiye ederim. Kaliteli ve güzel anlatım.

- vue.js dökümantasyonu ()

- genel web siteleri



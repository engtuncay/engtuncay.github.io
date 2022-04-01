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

# Kaynaklar

- Udemy Cem Gündüzoğlu Kursu (Vue.js ile Sıfırdan Uygulama Geliştirme)

Kursu satın almanızı tavsiye ederim. Kaliteli ve güzel anlatım.

- vue.js dökümantasyonu ()

- genel web siteleri



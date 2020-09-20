

- [B1 Vue Intro](#b1-vue-intro)
- [B2 Vue Basic](#b2-vue-basic)
  - [1-1 Instance](#1-1-instance)
  - [1-2 Lifecycle](#1-2-lifecycle)
  - [1-3 Databinding](#1-3-databinding)
  - [1-4 Attribue Binding](#1-4-attribue-binding)
  - [1-5 Style Binding](#1-5-style-binding)
  - [1-6 Listmodel](#1-6-listmodel)
  - [1-7 Events](#1-7-events)
  - [1-8 Conditionals](#1-8-conditionals)
  - [1-9 Computed](#1-9-computed)
  - [1-10 Watchers](#1-10-watchers)
  - [1-11 Forms](#1-11-forms)
  - [1-12 Form Validation](#1-12-form-validation)
  - [1-12 Filters](#1-12-filters)
  - [1-13 Custom Directive](#1-13-custom-directive)
- [B3 Vue Cli](#b3-vue-cli)
- [B4 Component Structure](#b4-component-structure)
  - [4-1 Global vs Local Component](#4-1-global-vs-local-component)
    - [Global Component](#global-component)
    - [Local Component](#local-component)
  - [4-2 Slots](#4-2-slots)
  - [4-3 Props](#4-3-props)
  - [4-4 Prop Validation](#4-4-prop-validation)
  - [4-5 Child Parent Emit](#4-5-child-parent-emit)
  - [4-6 Refs Parents](#4-6-refs-parents)
  - [4-7 Event Bus](#4-7-event-bus)
  - [4-8 Inline Template](#4-8-inline-template)

Önsöz

Bu öğreticide kaynak olarak Cem Gündüzoğlu Vue Js udemy kursu baz alınmıştır ve webden çeşitli kaynaklar kullanılmıştır.

# B1 Vue Intro

Öğreticideki örneklerde kullanılan temel şablon aşağıdaki örnekte gösterildi.

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
        name: 'Uzaktan Kurs',
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

## 1-1 Instance

Vue constructor json objesi ile oluştururuz. json objesinde el , vue js 'ye container olacak elementi belirtiriz. Örnekte app id'li html elementi seçildi.

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


## 1-2 Lifecycle

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

## 1-3 Databinding

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

## 1-4 Attribue Binding 

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

## 1-5 Style Binding

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

## 1-6 Listmodel

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
                },
                {
                    id: 54,
                    isim: 'Ceyda',
                    rol: 'User'
                }]
        }
    })
</script>

```

## 1-7 Events

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

## 1-8 Conditionals

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
## 1-9 Computed

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

## 1-10 Watchers

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

## 1-11 Forms

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

## 1-12 Form Validation

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

## 1-12 Filters

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

## 1-13 Custom Directive

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


# B4 Component Structure


## 4-1 Global vs Local Component

### Global Component

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

Template içinde kullanımı :

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

//... vue instance kayıt edilir
const app = new Vue({
        //...
        components: {
            'alert-count2': AlertCount2
        }
    });

```

Template'de kullanımı

```html
<alert-count2></alert-count2>
```

## 4-2 Slots

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

* Emit Yöntemiyle

Parent componentde onChange event'ına childChanged fonksiyonu eklenir.

```html
<child @onChange="childChanged"></child>
```

Child componentde onChange event trigger edilir.

```js
this.$emit('onChange', this.childMessage);
```

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
                            Change Parent Message (with this ref)
                        </button>
                        <button @click="changeParentMessage2" class="btn btn-warning">
                            Change Parent Message (emit)
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

## 4-6 Refs Parents

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

```html

<div id="app">
    <div class="row">
        <card-item :item="sampleItem"></card-item>
    </div>
    <modal></modal>

    <card-list :title="'Kurslar'" :cards="sampleItems"></card-list>
</div>

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


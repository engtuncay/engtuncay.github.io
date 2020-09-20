

- [B1](#b1)
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
- [B4 Component Structure](#b4-component-structure)
  - [4-1 Global vs Local Component](#4-1-global-vs-local-component)
    - [Global Component](#global-component)
    - [Local Component](#local-component)
  - [4-5 Child Parent Emit](#4-5-child-parent-emit)

# B1

## 1-1 Instance

Öğreticideki örneklerde kullanılan temel şablon ve vue instance oluşturulması aşağıdaki örnekte gösterildi.

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



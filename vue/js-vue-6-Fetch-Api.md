

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

- Paket kurulumu

```js
yarn add axios
// or
npm install axios
```

@@@video 101 de kaldım

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

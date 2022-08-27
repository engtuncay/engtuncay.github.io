


# B11 - Servisler, Mixin ve Interceptor Yapısı

- Öncelikle servis dosyamızı oluştururuz. Burada örnek olarak api.service.js oluştururuz.

File api.service.js  

```js
import axios from 'axios'

export default axios.create({
    baseUrl : 'http://',
    timeout: 5000,
    headers : {
        'Content-Type' : 'application/json'
    }
})

// headers eklenebilir
// 'Authorization':'Bearer xxxx'
```

- Servisin kullanımı

```js

```





- Örnek Uygulama

```html
<div id="app">
Mesaj: {{message}}
</div>

<script src="../assets/js/vue.js"></script>
<script>
    /*Vue.mixin({
        data() {
            return {
                message: 'Merhaba Mixin!'
            }
        },
        created() {
            console.log('Mixin oluşturuldu.');
        },
        methods: {
            getDate() {
                var tarih = new Date();
                console.log('Mixin:', tarih.toLocaleDateString());
            }
        }
    });*/

    var ortakMixin = {
        data: {
            message: 'Merhaba Mixin!'
        },
        created() {
            console.log('Mixin oluşturuldu.');
        },
        methods: {
            getDate() {
                var tarih = new Date();
                console.log('Mixin:', tarih.toLocaleDateString());
            }
        }
    };

    const app = new Vue({
        el: '#app',
        mixins: [ortakMixin],
        name: 'Uzaktan Kurs',
        data: {
            message: 'Merhaba Vue Instance!'
        },
        created() {
            console.log('Instance oluşturuldu.');
        },
        methods: {
            getDate() {
                var tarih = new Date();
                console.log('Instance:', tarih.toLocaleDateString());
            }
        }
    })
</script>
```

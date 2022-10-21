

- [Component Communication](#component-communication)
  - [Props Kullanımı](#props-kullanımı)
  - [Prop Behavior and Changing Props](#prop-behavior-and-changing-props)
  - [Validating Props (Required,Validation)](#validating-props-requiredvalidation)
  - [Supported Prop Values](#supported-prop-values)
  - [Dynamic Prop Values](#dynamic-prop-values)
  - [Emitting Custom Events (Child => Parent Communication)](#emitting-custom-events-child--parent-communication)
- [B4 Component Structure (Vue 2)](#b4-component-structure-vue-2)
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


# Component Communication

## Props Kullanımı

Props is short for properties

- Propsları nasıl tanımlarız ve kullanırız ?

Prop'lar component elementinde attribute olarak tanımladığımız değerlerdir. Burada friend-contact componentine name,phone-number ve email-address olarak üç tane props tanımladık.

```html
<!-- App.vue Component Template -->
<template>
  <section>
    <header>
      <h1>My Friends</h1>
    </header>
    <ul>
      <friend-contact name="Ali" phone-number="0090555" email-address="ali@domain.com"></friend-contact>
    </ul>
  </section>
</template>
```

You basically should make Vue aware of the attributes (props). In the simplest form, we define props property and pass an array,and in here, we should now specify all the props. We should use camel case notation in here. Vue automatically translates props defined like this

```javascript
// FriendContact.vue
<script>
export default {
  props : ['name','phoneNumber','emailAddress'],
  data() {
    return {
      /* ... */
    };
  },
  methods: {
    /* ... */
  }
};
</script>
```

So, we could now refer to this with the "this" keyword. Here in the method if we needed it, we could refer to this phone number for example. 

```javascript
// FriendContact.vue
<script>
export default {
  /* ... */ 
  methods: {
    toggleDetails() {
      this.detailsAreVisible = !this.detailsAreVisible;
      console.log(this.phoneNumber)
    }
  }
};
</script>
```

And indeed, in your HTML template, you should use this kebab case notation. (phone dash number)

- Props lar string interpolation olarak kullanılır mı ? 

Evet, kullanılır.

```html
<template>
  <li>
    <p>{{ phoneNumber }}</p>
    <!-- ... -->
  </li>
</template>

```

- side note : data properties ve computed properties 'de props ile aynı isimde property tanımlamamalıyız.

And therefore, as a side note, you should of course make sure that you don't have any name clashes there. If you define something as a prop, you shouldn't use the exact same name in your data properties or computed properties. That's just a side note.

v92-end

## Prop Behavior and Changing Props

Props are super important and we use props for something which is also called *parent child communication*. We use props to communicate from the parent to the child. Parent comp. communicates with child comp. So to pass data from the parent to the child component

Props typically should not be mutated. And what do I mean by that?

Vue uses a concept which is called unidirectional data flow. Data passed from app to friend contact should only be changed in app, not in friend contact. We just pass data down to friend contact. And once the data is passed down, friend contact cannot change the data we manage an app view, So if we change data inside of friend contact like here, when I tried to change isFavorite, this is not allowed by Vue, because we violate this pattern of having a unidirectional data flow.

Now, if we want to change this, there are two ways of doing that. 

- The first way of doing it, is that we let the parent know that we'd like to change this. Then the parent can go ahead and change the data in itself and pass the updated data back to friend contact. That's a pattern we'll explore later.

- The other approach is that we simply take the received data as the initial data, inside of friend contact, and then we changed that data instead of friend contact, but we are aware of the fact that we only change it there and that this won't affect the data in App.vue. To implement this pattern, all we need to do is we need to add a new data property in our component.

```javascript
// FriendContact.vue
<script>
export default {
  props : ['name','phoneNumber','emailAddress','isFavorite'],
  data() {
    return {
      /* ... */
      friendIsFavorite : this.isFavorite
    };
  },
  methods: {
    /* ... */
  }
};
</script>
```

v93-end

## Validating Props (Required,Validation)

Proplara detaylı şekilde tanımlama yapabiliriz. Tür kısıtı koyabiliriz.

```javascript
// FriendContact.vue
<script>
export default {
  // props : ['name','phoneNumber','emailAddress','isFavorite'],
  props : {
    name: {
      type: String,
      required: true,
    },  // instead of name: String,
    phoneNumber : {
      type: String,
      required: true,
    },
    emailAddress: {
      type: String,
      required: true,
    },
    isFavorite : {
      type: String,
      required: false,
      default:'0'
      validator: function (value) {
        return value==='1' || value==='0';
      }
    } 

  }
  data() {
    return {
      /* ... */
      friendIsFavorite : this.isFavorite
    };
  },
  methods: {
    /* ... */
  }
};
</script>
```

For example , if we dont give a email-address , we get error : missing required prop name.


## Supported Prop Values

In general, you can learn all about prop validation in the official docs: https://v3.vuejs.org/guide/component-props.html

Specifically, the following value types (type property) are supported:

String,Number,Boolean,Array,Object,Date,Function,Symbol

But type can also be any constructor function (built-in ones like Date or custom ones).

## Dynamic Prop Values

We can also bind variable to prop value.

*App.vue*

```js
<template>
  <section>
    <header>
      <h1>My Friends</h1>
    </header>
    <ul>
      <friend-contact
        v-for="friend in friends"
        :key="friend.id"
        :name="friend.name"
        :phone-number="friend.phone"
        :email-address="friend.email"
        :is-favorite="true" /* if we convert its prop type to boolean , we couldnt pass string value */
      ></friend-contact>
    </ul>
  </section>
</template>

<script>
export default {
  data() {
    return {
      friends: [
        {
          id: 'manuel',
          name: 'Manuel Lorenz',
          phone: '0123 45678 90',
          email: 'manuel@localhost.com',
        },
        {
          id: 'julie',
          name: 'Julie Jones',
          phone: '0987 654421 21',
          email: 'julie@localhost.com',
        },
      ],
    };
  },
};
</script>
```

*FriendContact.vue*
```html
<template>
  <li> <!-- prop values used in string interpolation -->
    <h2>{{ name }} {{ friendIsFavorite ? '(Favorite)' : ''}}</h2>
    <button @click="toggleFavorite">Toggle Favorite</button>
    <button @click="toggleDetails">{{ detailsAreVisible ? 'Hide' : 'Show' }} Details</button>
    <ul v-if="detailsAreVisible">
      <li>
        <strong>Phone:</strong>
        {{ phoneNumber }}
      </li>
      <li>
        <strong>Email:</strong>
        {{ emailAddress }}
      </li>
    </ul>
  </li>
</template>

<script>
export default {
  // props: ['name', 'phoneNumber', 'emailAddress', 'isFavorite'],
  props: {
    name: {
      type: String,
      required: true,
    },
    phoneNumber: {
      type: String,
      required: true
    },
    emailAddress: {
      type: String,
      required: true
    },
    isFavorite: {
      type: Boolean,
      required: false,
      default: false,
      // validator removed cos of boolean type
    },
  },
  data() {
    return {
      detailsAreVisible: false,
      friendIsFavorite: this.isFavorite,
    };
  },
  methods: {
    toggleDetails() {
      this.detailsAreVisible = !this.detailsAreVisible;
    },
    // we updated here,now it is boolean.
    toggleFavorite() {
      this.friendIsFavorite = !this.friendIsFavorite;
    },
  },
};
</script>
```

we got a even more reusable component.

## Emitting Custom Events (Child => Parent Communication)









# B4 Component Structure (Vue 2)

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

1- Parent componentında, child component etiketine onChange event eklenir. Child component içerisinde onChange event trigger edilir ve trigger edilmesiyle burada belirtilen parent bileşinindeki childChanged metodu çağrılır, trigger edilirken gönderilin datayı da argüman olarak da alabilir.

```html
<child @onChange="childChanged"></child>
```

2- Child componentde onChange event 'ın tetiklenmesi 

```js
this.$emit('onChange', this.childMessage);
```

Örnekte arguman olarak this.childMessage gönderiliyor.

- Console'den app vue instance'dan parent ve child degerlerini görebiliriz. ($parent,$children) property'leri incelenebilir.
  
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




- [Forms](#forms)
  - [Two way Binding](#two-way-binding)



# Forms

## Two way Binding

- v-model ile input elementlerinde two way binding yapabiliriz.

```html
<input id="user-name" name="user-name" type="text" v-model="userName" />
```

```js
<script>
export default {
  data() {
    return {
      userName: '',
    };
  },
  /* ... */
};
</script>
```

Böylelikle input içerisinde veya değişken değeri değiştiğinde birbirini günceller.

- Note : Formların içerisinde button elementlerine baasılınca otomatik submit yapar, bunu engellemek için `@submit.prevent` event binding'i kullanırız. Değer olarak submit metodu belirtiriz.

```html
<template>
  <form @submit.prevent="submitForm">
  <!-- ... -->
  </form>
</template>

<script>
export default {
  /* ... */
  methods: {
    submitForm() {
      console.log('UserName: ' + this.userName);
      this.userName = '';
    },
  },
};
</script>
```



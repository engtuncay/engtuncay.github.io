Vue 2 - Tutorial


- [Vue 3](#vue-3)
  - [What is vue.js](#what-is-vuejs)
  - [Imperative Approach Example](#imperative-approach-example)
  - [Installation](#installation)
    - [Cdn Usage](#cdn-usage)
  - [Tavsiye Edilen Eklentiler](#tavsiye-edilen-eklentiler)
  - [What You Learn](#what-you-learn)

Önsöz

- Bu öğreticide kaynak olarak Cem Gündüzoğlu Vue Js udemy kursu baz alınmıştır ve webden çeşitli kaynaklar kullanılmıştır. Kursu tavsiye ederim.

# Vue 3

## What is vue.js

Vue.js (Vue) is a JavaScript *framework* that makes building *interactive* and *reactive* web frontends (= browser-side web applications) easier. (M.)

## Imperative Approach Example

## Installation

vuejs.org 'dan installation bölümüne bakılır. 


### Cdn Usage

- Not : aşağıda bir obje function tanımlama görünüyor. ikiside aynı. a property named data which has a function as a value.

```css
ab = { 
  data : function () { }
}
```

```js
ab = { 
  data () { }
}
```

- Aşağıda vue 'nun cdn olarak yüklendiği bir sayfa örneği

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>A First App</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <div id="app">
      <div>
        <label for="goal">Goal</label>
        <input type="text" id="goal" v-model="enteredValue" />
        <button v-on:click="addGoal">Add Goal</button>
      </div>
      <ul>
        <li v-for="goal in goals">{{ goal }}</li>
      </ul>
    </div>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="app.js"></script>
  </body>
</html>

```

```js
Vue.createApp({
  data() {
    return {
      goals: [],
      enteredValue: ''
    };
  },
  methods: {
    addGoal() {
      this.goals.push(this.enteredValue);
      this.enteredValue = '';
    }
  }
}).mount('#app');
```

- vue config objemizde (createApp gönderdiğimiz obje) data alanındaki değişkenleri vue takip eder. (vue are aware of these variables)

Burada kullanılan vue özel fonksiyonları

- v-modal

- v-on

- v-for : Vue get the v-for attribute, which we can add on an element to replicate this element multiple times.

- {{ }} (string interpolation)

- with mount method, and let Vue know which element (or part) of the page should be controlled by that Vue app.

- vue ile declarative approach kullanılmıştır.


## Tavsiye Edilen Eklentiler

- Prettier - Code Formmatter by Prettierr

Note: default formmater kontrol edilmeli. prettier seçilmemişse, ayarlardan seçilince aktif olur.

## What You Learn

- Basics: Core Syntax, Templates, Directive, Data, Methods,Computed Props, Watchers

- Intermediate : Components, Component Communication, Behind the Scenes, Forms, Http, Routing, Animations

- Advanced : Vues, Authentication, Deployment , Optimization, Composition API, Re-using Code




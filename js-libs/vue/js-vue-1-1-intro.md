Vue 2 - Tutorial


- [Vue 3](#vue-3)
  - [What is vue.js](#what-is-vuejs)
  - [Imperative Approach Example](#imperative-approach-example)
  - [Installation](#installation)
    - [Cdn Usage](#cdn-usage)
  - [Tavsiye Edilen Eklentiler](#tavsiye-edilen-eklentiler)
  - [What You Will Learn](#what-you-will-learn)
  - [Try Vue Online​](#try-vue-online)

Önsöz

- Bu öğreticide kaynak olarak Cem Gündüzoğlu Vue Js udemy kursu baz alınmıştır ve webden çeşitli kaynaklar kullanılmıştır. Kursu tavsiye ederim.

# Vue 3

## What is vue.js

Vue.js (Vue) is a JavaScript *framework* that makes building *interactive* and *reactive* web frontends (= browser-side web applications) easier. (M.)

## Imperative Approach Example

## Installation

vuejs.org 'dan installation bölümüne bakılır. (https://vuejs.org/guide/quick-start.html#creating-a-vue-application)


### Cdn Usage

- Not : aşağıda bir obje function tanımlama görünüyor. ikiside aynı. a property named data which has a function as a value.

```js
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

## What You Will Learn

- Basics: Core Syntax, Templates, Directive, Data, Methods,Computed Props, Watchers

- Intermediate : Components, Component Communication, Behind the Scenes, Forms, Http, Routing, Animations

- Advanced : Vues, Authentication, Deployment , Optimization, Composition API, Re-using Code


## Try Vue Online​

To quickly get a taste of Vue, you can try it directly in our Playground. (https://sfc.vuejs.org/#eNo9j01qAzEMha+iapMWOjbdDm6gu96gG2/cjJJM8B+2nBaGuXvlpBMwtj4/JL234EfO6toIRzT1UObMexvpN6fCMNHRNc+w2AgwOXbPL/caoBC3EjcCCPU0wu6TvE/wlYqfnnZ3ae2PXHKMfiwQYArZOyYhAHN+2y9LnwLrarTQ7XeOuTFch5Am8u8WRbcoktGPbnzFOXS3Q3BZXWqKkuRmy/4L1eK4GbUoUTtbPDPnOmpdj4ee/1JVKictlSot8hxIUQ3Dd0k/lYoMtrglwfUPkXdoJg==)

If you prefer a plain HTML setup without any build steps, you can use this JSFiddle as your starting point. (https://jsfiddle.net/yyx990803/2ke1ab0z/)

If you are already familiar with Node.js and the concept of build tools, you can also try a complete build setup right within your browser on StackBlitz. (https://vite.new/vue)




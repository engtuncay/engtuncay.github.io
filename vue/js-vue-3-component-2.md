
<h2>Advanced Component Communication</h2>


- [Global vs Local Components](#global-vs-local-components)
- [Scoped Styles](#scoped-styles)
- [Introducing slots](#introducing-slots)
- [Named Slots](#named-slots)
- [Slot Styles & Compilation](#slot-styles--compilation)
- [More on Slots](#more-on-slots)
- [Scoped slots](#scoped-slots)
- [Dynamic Components](#dynamic-components)
- [Keeping Dynamic Components Alive](#keeping-dynamic-components-alive)
- [Teleporting Elements](#teleporting-elements)
- [Working with fragments](#working-with-fragments)
- [Vue Style Guide](#vue-style-guide)
- [Folder Style](#folder-style)


## Global vs Local Components

Global components are registered to the main app object.

*main.js*
```js
const app = createApp(App);

// these are global components
app.component('the-header', TheHeader);
app.component('base-badge', BaseBadge);
app.component('badge-list', BadgeList);
app.component('user-info', UserInfo);
```

Global components are used anywhere in your vue app - ie in any template.

- Lokal components are registered to the component config object.

Now components wants an object, and then we need a key-value pair, where the key is our custom HTML element. So TheHeader for example, the tag we wanna use for this element, so to say, and then the value is the imported component config object, we're pointing at.

```js
<script>
import TheHeader from './components/TheHeader.vue';
import BadgeList from './components/BadgeList.vue';
import UserInfo from './components/UserInfo.vue';

export default {
  components: {
    TheHeader, /* or 'the-header': TheHeader  */
    BadgeList,
    UserInfo
  },
  /* ... */
}
```

## Scoped Styles

*Note:* Now maybe you remember that earlier in the course. I mentioned that no matter where you added your styling, it would always be treated as global styling that affects the entire app. 

Vue component'imizde style etiketimize/elementine scoped attribute'ı ekleriz.

```html
<style scoped>
section {
  margin: 2rem auto;
  max-width: 30rem;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
  padding: 1rem;
}

section header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
</style>
```

## Introducing slots

They allow us to receive HTML content which also may be using Vue features from outside of the component.

Basically just like props but where props are meant to be used for data, which a component needs, slots are meant to be used for HTML code.

*UserInfo.vue*
```html
<base-card>
  <header>
    <h3>{{ fullName }}</h3>
    <base-badge :type="role" :caption="role.toUpperCase()"></base-badge>
  </header>
  <p>{{ infoText }}</p>
</base-card>
```

*BaseCard.vue*
```html
<template>
  <div>
    <slot></slot>
  </div>
</template>

<script>
export default {
}
</script>
```

## Named Slots

In the component, we defined two slots. one of them is named with 'header'

*BaseCard.vue*
```html
<template>
  <div>
    <header>
      <slot name="header"></slot>
    </header>
    <slot></slot>
  </div>
</template>

<script>
export default {};
</script>
```

- Usage of the component that used named slots.

*BadgeList.vue*
```html
<base-card>
  <template v-slot:header> <!-- header slot content -->
    <h2>Available Badges</h2>
  </template>
  <template v-slot:default> <!-- optional added v-slot attribute -->
    <ul>
      <li>
        <base-badge type="admin" caption="ADMIN"></base-badge>
      </li>
      <li>
        <base-badge type="author" caption="AUTHOR"></base-badge>
      </li>
    </ul>
  </template>
</base-card>
```

## Slot Styles & Compilation

But Vue.js will analyze, compile and evaluate this template before it sends to content to the other component so to say. So therefore, here we have access
to whatever is defined inside of UserInfo, and to styling defined here also affects this markup, but *not the markup of any component we might be sending our content to* (that is, styles is not valid for slot contents.).

*UserInfo.vue*
```html
<template>
  <section>
    <base-card>
      <template v-slot:header>
        <h3>{{ fullName }}</h3>
        <base-badge :type="role" :caption="role.toUpperCase()"></base-badge>
      </template>
      <template v-slot:default>
        <p>{{ infoText }}</p>
      </template>
    </base-card>
  </section>
</template>
<script>
export default {
  props: ['fullName', 'infoText', 'role'],
};
</script>
```

- Yani header alınının style tanımları baseCard component'da yapılmalı. header style tanımı baseCard component'de yapıldı.

*BaseCard.vue*
```html
<template>
  <div>
    <header>
      <slot name="header"></slot>
    </header>
    <slot></slot>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
div {
  margin: 2rem auto;
  max-width: 30rem;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
  padding: 1rem;
}
</style>
```

## More on Slots

BaseCard componentini header slotu olmadan kullandığımızda source 'a header elementi ekler. Örnek aşağıdaki şekilde kullanırsak.

*BaseCard.vue*
```html
<template>
  <div>
    <header>
      <slot name="header">
        <!-- <h2>The Default</h2> -->
      </slot>
    </header>
    <slot></slot>
  </div>
</template>
```

- Bunu önlemek için header elementinde header slot olduğunda ekle şeklinde bir yapıya aşağıdaki şekilde yaparız.

*BaseCard.vue*
```html
<template>
  <div>
    <header v-if="$slots.header">
      <slot name="header">
        <!-- <h2>The Default</h2> -->
      </slot>
    </header>
    <slot></slot>
  </div>
</template>

<script>
export default {
  mounted() {
    // for information purposes
    console.log(this.$slots.header);
  }
};
</script>
```

- v-slot:header yerine #header şeklinde de kullanabiliriz.

*UserInfo.vue*
```html
<template>
  <section>
    <base-card>
      <template #header>
        <!-- ... -->
      </template>
      <template #default>
        <!-- ... -->
      </template>
    </base-card>
  </section>
</template>
```

## Scoped slots

ßß Sorun

li içerisinde slot bir alan kullandığımızda goal değişkenine , slotu kullanan componentde goal değişkenine nasıl ulaşacağız.

*CourseGoals.vue*
```html
<template>
  <ul>
    <li v-for="goal in goals" :key="goal">
      <slot></slot>
    </li>
  </ul>
</template>

<script>
export default {
  data() {
    return {
      goals: ['Finish the course', 'Learn Vue'],
    };
  },
};
</script>
```

ßß Çözüm

- slot elementine v-bind ile degiskeni bind ederiz. slot içerisine goal değişkenini item olarak bind et demiş oluruz.

*CourseGoals.vue*
```html
<template>
  <ul>
    <li v-for="goal in goals" :key="goal">
      <slot :item="goal" another-prop="..."></slot>
    </li>
  </ul>
</template>

<script>
export default {
  data() {
    return {
      goals: ['Finish the course', 'Learn Vue'],
    };
  },
};
</script>
```

- bind edilen değişkene #default="slotProps" default slotu slotProps'a baglar. bunun üzerinden değişkenlere ulaşırız.

*App.vue(partial)*
```html
<course-goals #default="slotProps">
  <h2>{{ slotProps.item }}</h2>
  <p>{{ slotProps['another-prop'] }}</p>
</course-goals>
```
- Note

template ile de kullanılabilir.

*App.vue(partial)*
```html
<course-goals>
  <template #default="slotProps">
    <h2>{{ slotProps.item }}</h2>
    <p>{{ slotProps['another-prop'] }}</p>
  </template>
</course-goals>
```

## Dynamic Components

vue ya özel component elementi ile istediğimiz component'i dinamik olarak yerleştirebiliriz. hangi component'in yerleşeceğine is attribute ile belirlenir. burada is attribute na binding yapılmış.

```html
<template>
  <div>
    <the-header></the-header>
    <!-- <TheHeader /> -->
    <button @click="setSelectedComponent('active-goals')">Active Goals</button>
    <button @click="setSelectedComponent('manage-goals')">Manage Goals</button>
    <!-- old way -->
    <!-- <active-goals v-if="selectedComponent === 'active-goals'"></active-goals>
    <manage-goals v-if="selectedComponent === 'manage-goals'"></manage-goals>-->
    <component :is="selectedComponent"></component>
  </div>
</template>
<!-- partial config object -->
<script>
// imports
export default {
  components: {
    TheHeader,
    ActiveGoals,
    ManageGoals,
  },
  data() {
    return {
      selectedComponent: 'active-goals'
    };
  },
  methods: {
    setSelectedComponent(cmp) {
      this.selectedComponent = cmp;
    },
  },
};
</script>

```

*ManageGoals.vue*

```html
<template>
  <div>
    <h2>Manage Goals</h2>
    <input type="text" />
  </div>
</template>
```

- Note : ManageGoals componentinde olduğu gibi vue'ya config object vermezsek, otomatik kendisi oluşturur.


## Keeping Dynamic Components Alive

Yukarıdaki örnekte dinamik component'i değiştirip, tekrar eski component'e dönersek text input ların içerisi sıfırlanıyordu. aynı kalmasını istersek keep-alive özel elementini kullanırız.

*App.vue(partial)*
```html
<manage-goals v-if="selectedComponent === 'manage-goals'"></manage-goals>-->
<keep-alive>
  <component :is="selectedComponent"></component>
</keep-alive>

```

böylelikle keep-alive component'in state'ni koruruz. arka planda vue destroy etmez.

## Teleporting Elements

eğer bir dialog penceresi kodlarımızında ortasında açarsak semantik olarak dogru olmaz. dogru olan body elementinin başında veya sonunda olmalı. bunu yapmak vue nun özel teleport elementini kullanırız. aşağıdaki örnek body'nin sonuna taşıyor dialog elementini.

```html
<template>
  <div>
    <h2>Manage Goals</h2>
    <input type="text" ref="goal" />
    <button @click="setGoal">Set Goal</button>
    <teleport to="body">
      <error-alert v-if="inputIsInvalid">
        <h2>Input is invalid!</h2>
        <p>Please enter at least a few characters...</p>
        <button @click="confirmError">Okay</button>
      </error-alert>
    </teleport>
  </div>
</template>

<script>
import ErrorAlert from './ErrorAlert.vue';

export default {
  components: {
    ErrorAlert
  },
  data() {
    return {
      inputIsInvalid: false
    };
  },
  methods: {
    setGoal() {
      const enteredValue = this.$refs.goal.value;
      if (enteredValue === '') {
        this.inputIsInvalid = true;
      }
    },
    confirmError() {
      this.inputIsInvalid = false;
    }
  }
}
</script>
```

*ErrorAlert.vue*

```html
<template>
  <dialog open>
    <slot></slot>
  </dialog>
</template>

<style scoped>
dialog {
  margin: 0;
  position: fixed;
  top: 20vh;
  left: 30%;
  width: 40%;
  background-color: white;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
  padding: 1rem;
}
</style>
```


## Working with fragments

önceki vue versiyonda bir component de sadece bir tane top element olurdu , bu da div olurdu. vue 3 ile beraber birden fazla top element olabiliyor.

*ManageGoals.vue*
```html
<template>
  <h2>Manage Goals</h2>
  <input type="text" ref="goal" />
  <button @click="setGoal">Set Goal</button>
  <teleport to="body">
    <error-alert v-if="inputIsInvalid">
      <h2>Input is invalid!</h2>
      <p>Please enter at least a few characters...</p>
      <button @click="confirmError">Okay</button>
    </error-alert>
  </teleport>
</template>
```

## Vue Style Guide

vue.js official documentation 'daki style guide mutlaka okunmalı. Strongly recommended kısmı daha öncelikli okunmalı.

- Temel component'lerin başına Base veya App eklenmeli. BaseButton,BaseIcon,BaseTable veya AppButton, AppIcon gibi...

- eğer component tek bir yerde kullanılıyorsa başına The konulmalı. 
  

## Folder Style

- Componentleri ilgili dizinleri ayrıştırırsak daha düzenli olur. örneğin UI veya Base , Layout , cart , checkout (checkout ile ilgili comp'lar koyulur) gibi...

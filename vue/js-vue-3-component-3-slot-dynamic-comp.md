
<h2>Advanced Component Communication</h2>


- [Global vs Local Components](#global-vs-local-components)
- [Scoped Styles](#scoped-styles)
- [Introducing slots](#introducing-slots)
- [Named Slots](#named-slots)
- [Slot Styles \& Compilation](#slot-styles--compilation)
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
const app = createApp(App); // main application object

// these are global components
app.component('the-header', TheHeader);
app.component('base-badge', BaseBadge);
app.component('badge-list', BadgeList);
app.component('user-info', UserInfo);
```

Global components are used anywhere in your vue app - ie in any template.

- Local components are expressed in the component config object.

Components property is an object which has a key defines  our custom HTML element and a value which is the imported component config object. So TheHeader for example, the tag for that component should be the-header.

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

**Note:** 

No matter where you added your styling, it would always be treated as global styling that affects the entire app unless it is defined with scoped attribute. 

(tor:Vue component'imizde style etiketine scoped attribute eklemezsek stiller global olarak kabul eder. Her yerde geçerli olur.)

```html
<style scoped>
section {
  margin: 2rem auto;
  max-width: 30rem;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
  padding: 1rem;
}
/* ... */
</style>
```

## Introducing slots

They allow us to receive HTML content which also may be using *Vue features from outside of the component*.

Basically just like props but where *props* are meant to be used *for data* which a component needs, slots are meant to be used for *HTML code*.

*UserInfo.vue*
```html
<base-card>
  <!-- below base-card component content -->
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
  <div class="bg-red-300">
    <slot></slot>
  </div>
</template>

<script>
export default {
  /* ... */
}
</script>
```

## Named Slots

You can give name to slots. In the component below, we defined two slots. one of them is named with 'header'

- Definition of named slots

*BaseCard.vue*
```html
<template>
  <div>
    <header>
      <!-- first slot -->
      <slot name="header"></slot>
    </header>
    <!-- second slot -->
    <slot></slot>
  </div>
</template>

<script>
export default {};
</script>
```

- Usage of named slots `v-slot:[slotName]`.

*BadgeList.vue*
```html
<base-card>
  <!-- header slot content -->
  <template v-slot:header> 
    <h2>Available Badges</h2>
  </template>
  <!-- v-slot:default is optional -->
  <template v-slot:default> 
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

Vue.js will analyze, compile and evaluate this template before it sends to content to the other component.So therefore, here we have access to whatever is defined inside of UserInfo, and to styling defined here also affects this markup, but *not the markup of any component we might be sending our content to* (that is, styles is not valid for slot contents.).

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

(tor:Yani header slot alanının style tanımları baseCard component'inde yapılmalı.)

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

BaseCard componentini header slotu olmadan kullandığımızda sayfa kaynağına (source) header elementi ekler. Örnek aşağıdaki şekilde kullanırsak.

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

- `v-slot:header` yerine `#header` şeklinde de kullanabiliriz.

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

- Problem : for döngüsü kullanılan bir element içerisinde slot bir alan kullandığımızda döngü değişkenine, slotu kullanan componentde nasıl ulaşacağız ?

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

*Çözüm*

slot elementine v-bind ile degiskeni bind ederiz. slot içerisine goal değişkenini item olarak bind et demiş oluruz.

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

- bind edilen değişkene #default="slotProps" default slotu slotProps'a baglar. bunun üzerinden değişkenlere ulaşırız.???

*App.vue(partial)*
```html
<course-goals #default="slotProps">
  <h2>{{ slotProps.item }}</h2>
  <p>{{ slotProps['another-prop'] }}</p>
</course-goals>
```
**Note**

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

--*LINK TBC

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

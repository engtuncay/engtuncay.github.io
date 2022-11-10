



- [Global vs Local Components](#global-vs-local-components)
- [Scoped Styles](#scoped-styles)
- [Introducing slots](#introducing-slots)
- [Named Slots](#named-slots)
- [Slot Styles & Compilation](#slot-styles--compilation)
- [More on Slots](#more-on-slots)


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
<base-card>
  <template #header>
    <h3>{{ fullName }}</h3>
    <base-badge :type="role" :caption="role.toUpperCase()"></base-badge>
  </template>
  <template #default>
    <p>{{ infoText }}</p>
  </template>
</base-card>
```

- Yani header alınının style'nı baseCard component'de yapar. header style tanımı baseCard component'de yapıldı.

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
    console.log(this.$slots.header);
  }
};
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



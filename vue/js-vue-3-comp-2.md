

- [Global vs Local Components](#global-vs-local-components)
- [Scoped Styles](#scoped-styles)
- [Introducing slots](#introducing-slots)




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





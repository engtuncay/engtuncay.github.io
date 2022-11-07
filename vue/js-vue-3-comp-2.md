

- [Global vs Local Components](#global-vs-local-components)




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
    TheHeader, {  /* or 'the-header': TheHeader  */}
    BadgeList,
    UserInfo
  },
  /* ... */
}
```





<h2>Component Communication - 1 (Vue 3)</h2>

- [Component Communication (Vue 3)](#component-communication-vue-3)
  - [Props Kullanımı](#props-kullanımı)
  - [Prop Behavior and Changing Props](#prop-behavior-and-changing-props)
  - [Validating Props (Required,Validation)](#validating-props-requiredvalidation)
  - [Supported Prop Values](#supported-prop-values)
  - [Dynamic Prop Values](#dynamic-prop-values)
  - [Emitting Custom Events (Child =\> Parent Communication)](#emitting-custom-events-child--parent-communication)
  - [Defining \& Validating Custom Events](#defining--validating-custom-events)
  - [Prop / Event Fallthrough \& Binding All Props](#prop--event-fallthrough--binding-all-props)
  - [Demo](#demo)
  - [Demo 2](#demo-2)

# Component Communication (Vue 3)

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

Props typically should not be mutated (changed). And what do I mean by that?

Vue uses a concept which is called *unidirectional data flow*. Data passed from app to friend contact should only be changed in app, not in friend contact. We just pass data down to friend contact. And once the data is passed down, friend contact cannot change the data we manage an app view, So if we change data inside of friend contact like here, when I tried to change isFavorite, *this is not allowed by Vue*, because we violate this pattern of having a unidirectional data flow.

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

```text
String,Number,Boolean,Array,Object,Date,Function,Symbol
```

But type can also be any constructor function (built-in ones like Date or custom ones). ($$md)

## Dynamic Prop Values

We can also bind variable to prop value. (with binding operator(:))

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

Try https://vue-ajcgnv.stackblitz.io

## Emitting Custom Events (Child => Parent Communication)

FriendContact component konfigurasyon objesinin emit property'sinde toggle-favorite olayının emit edilebileceği (trigger) tanımlanır.

```js
<script>
export default {
  emits: ['toggle-favorite'],
  /*...*/
  }
```

FriendContact comp'da herhangi bir yerden toggle-favorite emit(trigger) edilebilir. this objesinin $emit metodu kullanılarak `this.$emit('emitName', arguments)` event emit edilir. Emit yaparken beraber gönderilecek argumanlar da belirtilir.

*FriendContact.vue*

```html
<template>
    <!-- ... -->
    <button @click="toggleFavorite">Toggle Favorite</button>
</template>

<script>
export default {
  props: /* ... */,
  emits: ['toggle-favorite'],
  // emits: {
  //   'toggle-favorite': function(id) {
  //     if (id) {
  //       return true;
  //     } else {
  //       console.warn('Id is missing!');
  //       return false;
  //     }
  //   } 
  // },
  data() : /* ... */,
  methods: {
    /*...*/,
    toggleFavorite() {
      /* toggle-favorite event triggered */
      this.$emit('toggle-favorite', this.id);
    },
  },
};
</script>
```

- App.vue'da friend-contact elementinde toggle-favorite event'ını dinleme olacağı tanımlar. friend-contact elementinde emit olayına event binding yaparız.

*App.vue*

```html
<template>
      <!-- ... -->
      <friend-contact
        /*...*/
        @toggle-favorite="toggleFavoriteStatus" 
      ></friend-contact>
      <!-- ... -->
</template>

<script>
export default {
  /* ... */
  methods: {
    toggleFavoriteStatus(friendId) {
      const identifiedFriend = this.friends.find(
        (friend) => friend.id === friendId
      );
      identifiedFriend.isFavorite = !identifiedFriend.isFavorite;
    },
  },
};
</script>
```

*Anothter emit example*

- You can send multiple arguments while emitting.

```js
this.$emit(
  'add-contact',
  this.enteredName,
  this.enteredPhone,
  this.enteredEmail
);
```

## Defining & Validating Custom Events

Emits is the counterpart to props.

In props you will define which props this component receives. In emits, you will define which custom events your component will eventually at some point emit. And you're doing this to document your component, to make it obvious to other developers, how your component works, and to which events they can listen. This is simply useful. It makes it easier to understand your component.

Because otherwise I have to look through all your code to see that there is some code where you emit toggle-favorite.

*FriendContact.vue*

```html
<template>
    <!-- ... -->
    <button @click="toggleFavorite">Toggle Favorite</button>
</template>

<script>
export default {
  props: /* ... */,
  emits: ['toggle-favorite'],
  data() : /* ... */,
  methods: /*...*/,
};
</script>
```

- I'm doing that to make it obvious that "toggle-favorite" is an event that should be handled by a function that expects an ID. Because I will emit an ID here. You can then also add validation here to make sure that when the event is emitted, this data, which should be part of the event is not forgotten.

*FriendContact.vue*

```html
<template>
    <!-- ... -->
    <button @click="toggleFavorite">Toggle Favorite</button>
</template>

<script>
export default {
  props: /* ... */,
  emits: {
    'toggle-favorite': function(id) {
      if (id) {
        return true;
      } else {
        console.warn('Id is missing!');
        return false;
      }
    } 
  },
  data() : /* ... */,
  methods: /*...*/,
};
</script>
```

emit yaparken id'yi göndermezse hata alınır burada.

## Prop / Event Fallthrough & Binding All Props

There are two advanced concepts you also should have heard about:

- Prop Fallthrough
- Binding All Props on a Component

**Prop Fallthrough**

You can set props (and listen to events) on a component which you haven't registered inside of that component.

For example:

BaseButton.vue

```html
<template>  
  <button>
    <slot></slot>
  </button>
</template>

<script>export default {}</script>
```

This button component (which might exist to set up a button with some default styling) has no special props that would be registered.

Yet, you can use it like this:

```html
<base-button type="submit" @click="doSomething">Click me</base-button>
```

Neither the type prop nor a custom click event are defined or used in the BaseButton component. Yet, this code would work. Because Vue has built-in support for prop (and event) "fallthrough".

Props and events added on a custom component tag automatically fall through to the root component in the template of that component. In the above example, type and @click get added to the `<button>` in the BaseButton component.

You can get access to these fallthrough props on a built-in `$attrs` property (e.g. `this.$attrs`).

This can be handy to build "utility" or pure presentational components where you don't want to define all props and events individually.

You can learn more about this behavior here: 

https://v3.vuejs.org/guide/component-attrs.html

**Binding all Props (Binding Entity)**

There is another built-in feature/behavior related to props.

If you have this component:

*UserData.vue*

```html
<template>
  <h2>{‌{ firstname }} {‌{ lastname }}</h2>
</template>
 
<script>
  export default {
    props: ['firstname', 'lastname']
  }
</script>

```
You could use it like this:

```html
<template>
  <user-data :firstname="person.firstname" :lastname="person.lastname"></user-data>
</template>
 
<script>
  export default {
    data() {
      return {
        person: { firstname: 'Max', lastname: 'Schwarz' }
      };
    }
  }
</script>
```

But if you have an object which holds the props you want to set as properties, you can also shorten the code a bit:

```html
<template>
  <user-data v-bind="person"></user-data>
</template>
 
<script>
  export default {
    data() {
      return {
        person: { firstname: 'Max', lastname: 'Schwarz' }
      };
    }
  }
</script>

```

With v-bind="person" you pass all key-value pairs inside of person as props to the component. That of course requires person to be a JavaScript object.

This is purely optional but it's a little convenience feature that could be helpful.

## Demo

- Note: since a button is inside of a form when it's clicked, that form will be submitted. ((Eğer bir button form içinde ise tıklanırsa form submit edilir.))

- Note : yeni component'mizi app.vue içerisinde register etmeliyiz.

## Demo 2

- Remember : When binding to an event , you can either point at a method, execute a method or execute any other basic js code.

```html
<button @click="$emit('delete',id)">Delete</button>
```

- Js remove etmenin ayrı bir yolu, mevcut array'de filter yapıp yeni bir array oluşturmaktır.

```js
 this.friends = this.friends.filter( friend => friend.id !== friendId ) // burada true dönerse tutar, false döner remove eder,tutmaz.
```


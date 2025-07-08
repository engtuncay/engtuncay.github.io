
<h1>A definitive guide to Vue 3 components</h1>

By Oduah Chigozie 

February 9, 2022  8 min read 

https://blog.logrocket.com/definitive-guide-vue-3-components



Components in Vue web applications are very important because they can be used in very simple ways to make very complex applications. In this article, we’ll cover the basics of Vue 3 components and how to use them.

- [What are components in Vue 3?](#what-are-components-in-vue-3)
- [Creating a component in Vue 3](#creating-a-component-in-vue-3)
- [CDN \<project](#cdn-project)
- [Command line interface project](#command-line-interface-project)
- [Vue 3 createApp](#vue-3-createapp)
- [Creating a root component](#creating-a-root-component)
- [Creating a simple component](#creating-a-simple-component)
- [Conclusion](#conclusion)

Jump ahead:

- What are components in Vue 3?
- Creating a component in Vue 3
- CDN project
- CLI project
- Vue 3 createApp
- Creating a root component
- Creating a simple component
- Adding state to Vue 3 components
- Handling single component props in Vue 3
- Handling multiple component props
- Nested components in Vue 3
- Using defineComponent and TypeScript

# What are components in Vue 3?

Components are reusable pieces of UI code that build functional web applications. They can either be used as building blocks of complex applications, or as reusable pieces to prevent rewriting similar pieces of code repeatedly.

Vue applications usually consist of a root component and any number of other components. All components are actually component objects that hold the state variables, component logic, and a template that specifies the component rendering.

# Creating a component in Vue 3

Before we start creating components, we must first set up our project. There are two types of Vue 3 projects that we can create:

- CDN, which is integrated with HTML pages
- CLI, which is developed and built using Node.js

# CDN <project

A CDN project is the simplest type of Vue 3 project.

To set up an empty CDN project, we first import the CDN into our HTML page:

```js
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.2.37/vue.global.min.js"></script>
```

Next, we create a div element, to render the Vue application:

```html
<div id="app"></div>
```

Then, we create an empty script tag at the bottom of the body tag:

```html
<script>

</script>

```

Finally, we create and mount an empty app, inside the new script tag:

```js
Vue.createApp({}).mount("#app");
```

After completing the above steps, the HTML code should look like this:

```html
<script src="https://unpkg.com/vue@3"></script>

<div id="app"></div>

<script>
  Vue.createApp({}).mount("#app");
</script>
```

# Command line interface project

Setting up a CLI project is more complex than creating a CDN project. Start by installing the following:

Node.js

npm or Yarn

Next, install Vue CLI with any of the below commands:

```bash
# for npm
npm install -g @vue/cli

# for yarn 1.x
yarn global add @vue/cli
```

Now, create a project vue-tutorial, like so:

```
vue create vue-tutorial
```

Then, select Vue 3:

N.B., if you’re using Yarn v2 or later, you’ll have to use 

yarn dlx @vue/cli create vue-tutorial 

to create the project; Yarn v2+ does not support global installation

After Vue CLI creates the project, its tree structure should look like this:


```
.
├── babel.config.js
├── jsconfig.json
├── package.json
├── package-lock.json
├── public
│   ├── favicon.ico
│   └── index.html
├── README.md
├── src
│   ├── App.vueThe v
│   ├── assets
│   │   └── logo.png
│   ├── components
│   │   └── HelloWorld.vue
│   └── main.js
└── vue.config.js
```

The root of a Vue 3 project is src/main.js:

```js
import { createApp } from 'vue'
import App from './App.vue'

createApp(App).mount('#app')
```

In the above code, the createApp function, from vue, creates an app instance and mounts it to an HTML element with ID app. createApp takes a component as the argument, in this case from the ./App.vue file.

# Vue 3 createApp

Vue 3 provides a createApp function for creating application instances. The function takes a component as an argument to become the root of the instance.

The application instance provides a mount method that mounts the instance to an HTML element.

```js
import { createApp } from "vue";
import App from "./App.vue";

createApp(App).mount('#app');  // the element has an id "app"
```

The createApp function only exists in Vue 3. Vue 2 provides a Vue constructor function to create application instances.

```js
import Vue from 'vue'
import App from './App.vue' 

new Vue({
  render: h => h(App),
}).$mount('#app')
```

The Vue constructor takes an object that should include a render method to render the root component. The constructed instance has a *$mount method* that allows us to mount the instance to an HTML element. The $mount method also uses a CSS selector to reference the element.

Vue allows us to create directives in both v2 and v3. Directives enable us to add functionality to a Vue application instance. To create directives in Vue 2, we need to use the Vue object.

Any directives created using the Vue object will be usable by all application instances. This becomes a problem when our web app uses more than one Vue application instance but we want to limit certain functionality to specific instances.

// The only way to create a directive in Vue 2
Vue.directive('directive', {
    // ...
});

// Both of the application instances can access the directive
const appOne = new Vue(App1).mount('#app1');
const appTwo = new Vue(App2).mount('#app2');

The Vue 3 createApp function solves this problem by providing instance APIs for customizing the instance. One of API methods,directive, creates custom directives for the instance:

// Both of the application instances can access the directive
const appOne = Vue.createApp(App1);
appOne.directive('directive', {
    // only availalble "appOne" instance */
});
appOne.mount('#app1');

const appTwo = Vue.createApp(App2);
appTwo.directive('directive', {
    // only availalble to "appTwo"
});
appTwo.mount('#app2');

# Creating a root component

All Vue web applications start with a root component. The createApp function binds this component to an HTML element.

To create a root component, we start with an empty object and call it RootComponent by convention. To register the object as the root, we pass it to the Vue.createApp() function:

<script>
    const RootComponent = {};
    const app = Vue.createApp(RootComponent);
    app.mount("#app");
</script>

In Vue CLI, the root component is just like any other component and is at src/App.vue.

# Creating a simple component

To create a component in Vue, we start with an empty object, just like the root component. But, instead of passing it to the Vue.createApp() function, we register it to the component we want to use it in.

To register a new component in the root component, we create a components property in the object. Here’s an example of registering a CustomButton component in the root:

<script>
    const CustomButton = {};
    const RootComponent = {
        components: {
            CustomButton,
        },
    };
    const app = Vue.createApp(RootComponent);
    app.mount("#app");
</script>

A component needs a template that it renders to the view. A template is usually in a script tag with type of vue-template to prevent the browser from executing it as JavaScript code.

The template should have an ID, which allows the component object to reference its script. Here’s a simple template script for the CustomButton component. In this example, the template script ID is "``custom-button``":

<script type="vue-template" id="custom-button">
    <button>Click Me!</button>
</script>
To bind the template to the component, we add a template property to the component object, and pass the reference to the script:

<script>
    const CustomButton = {
        template: "#custom-button"
    };
...
</script>
Now, we can use the CustomButton component in the root component:

<div id="app">
    <CustomButton />
</div>
In the CLI version, components have a different structure. Each component is in a .vue file. All components must include a template tag and a script. A style tag may also be added to style the template.

Here’s an example of a simple Vue component created with Vue CLI:

><template>
  Hello, World!
</template>

<script>
  export default {}
</script>
The object after export default is just like the component object in the CDN version. The only differences between simple components created by the CLI and CDN are as follows:

With the CDN version, there’s no need to specify the template script for the object
With the CDN version, we can separate components into different files
To use a component in another component, follow the below steps:

Import the .vue file into the component script tag
Add the default export to the component property
import HelloWorld from './components/HelloWorld.vue'export default {
components: {
HelloWorld
}
}
Adding state to Vue 3 components
To add state variables to Vue components, create a data method in the component object. The data method should return an object, which contains the state variables.

In the below example, the CustomButton component contains a buttonText state, which has a string value: "``Click me!``":

<script>
    const CustomButton = {
        template: "#custom-button",
        data: function () {
            return {
                'buttonText': "Click me!"
            }
        }
    }
    // some lines are hidden
</script>
We use the state variable inside the template script’s button tag by surrounding it with double curly braces, {{ }}, like so:

<script type="vue-template" id="custom-button">
    <button>{{ buttonText }}</button>
</script>
Handling Vue 3 component props
Props in Vue are attributes that are passed to components, just like HTML elements. They promote the flexibility and reusability of components, which makes it possible to use the same piece of code for slightly different scenarios, making the UI more efficient.

We pass props to components in the same way that we pass attributes to HTML elements:

<component prop="value"></component>
We can then update the custom-button component by adding a text prop that contains the button text:

<div id="app">
    {{ greeting }}, {{ name }}
    <CustomButton text="Click me!"></CustomButton>
</div>
To make the text prop work, we register it to the CustomButton component:

<script>
    const CustomButton = {
        template: "#custom-button",
        data: function () {
            return {
                'buttonText': "Click me!"
            }
        },
>       props: ['text']
    }

    // some lines are hidden
</script>
Then, we replace {{ buttonText }} with {{ text }} in the template:

<script type="vue-template" id="custom-button">
    <button>{{ text }}</button>
</script>
Next, we remove buttonText state variable, since it is no longer needed:

<script>
    const CustomButton = {
        template: "#custom-button",
        props: ['text'],
    }

    // some lines are hidden
</script>
Handling multiple component props
It’s possible to use multiple props in a Vue component. The more props a component has the more flexible and usable it becomes. To add more props to a component, append the name of the prop to the component’s prop array:

<script>
    const CustomButton = {
        template: "#custom-button",
>       props: ['text', 'label'],
    }

    // some lines are hidden
</script>
But, take care when adding more props to a Vue component. Too many props can make a Vue component unnecessarily complex and hard to maintain.

Now, the CustomButton component has two props:text and label.

After adding the label prop, we modify the template to use this prop as well:

<script type="vue-template" id="custom-button">
    {{ label }}: <button>{{ text }}</button>
</script>
Using multiple props with components created with Vue CLI works the same way.

Nested components
Vue 3 allows us to nest components in other components. This nesting leads to composition, where one large or complex component is composed of smaller components. Composition helps make the user interface more efficient and easier to maintain.

Here’s a simple example of nested components. The StartStopButton contains two CustomButton components:

<script type='vue-template' id="start-stop-button">
  
Now, we can add the StartStopButton component to the root components:

{{ greeting }}, {{ name }}
<script>
    // ...
    const RootComponent = {
        data: function () {
            return {
                greeting: "Hello",
                name: "John",
            }
        },
        components: {
            StartStopButton
        },
    };

    // ...
</script>
Using defineComponent and TypeScript
Both Vue 2 and Vue 3 allow us to build Vue applications using TypeScript. The TypeScript language is a powerful superset of JavaScript, offering optional static typing and supporting more IDEs.

TypeScript support in Vue 2 is really poor compared to Vue 3. To create components in Vue 2 with TypeScript, we need to either use the standard syntax or the class component. Each method has tradeoffs; let’s take a look.

In this example, we create a component in Vue 2 with TypeScript using the standard syntax:

<template>
  <div>
    {{ name }}: {{ msg }}
  </div>
</template>

<script lang="ts">
  import Vue from "vue";
  export default Vue.extend({
    name: "HelloVue",
    props: {
      msg: String
    },
    data () {
      return {
        name: "LogRocket"
      }
    }
  })
</script>
In the above code, we can see that the component created with standard syntax is similar to a component object, but lacks support for features like Vuex.

In this example, we create a component in Vue 2 with TypeScript using a class component:

<template>
  <div>
    {{ name}}: {{ msg }}
  </div>
</template>

<script lang="ts">
  import { Component, Prop, Vue } from "vue-property-decorator";
  @Component
  export default class HelloVue extends Vue {
    @Prop() public msg!: string;
    public name: string = "LogRocket";
  }
</script>
In the above code, we can see that the component created with the class component is very different from a component object, although it does support additional features.

Vue 3 resolves these drawbacks by providing a defineComponent function. This function allows us to create a TypeScript component that is similar to a component object and also supports extra features.

<template>
  <div>
    {{ name }}: {{ msg }}
  </div>
</template>

<script lang="ts">
  import { defineComponent } from "vue";
  export default defineComponent({
    props: {
      msg: {
        type: String,
        required: true
      }
    },
    data() {
      return {
        name: "LogRocket",
      }
    }
  });
</script>

# Conclusion

I hope this article helped you understand the process of creating components in Vue 3 and using them to build complex applications. But, if you still do not find any of the sections clear or could not follow along, let me know in the comments.

Thank you for reading and have a nice day!
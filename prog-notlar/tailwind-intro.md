




## Container
A component for fixing an element's width to the current breakpoint.

Default class reference


```
Class Breakpoint Properties
container	None	width: 100%;
sm (640px)	max-width: 640px;
md (768px)	max-width: 768px;
lg (1024px)	max-width: 1024px;
xl (1280px)	max-width: 1280px;
2xl (1536px)	max-width: 1536px;
```

**Usage**

The container class sets the max-width of an element to match the min-width of the current breakpoint. This is useful if you’d prefer to design for a fixed set of screen sizes instead of trying to accommodate a fully fluid viewport.

Note that unlike containers you might have used in other frameworks, Tailwind’s container does not center itself automatically and does not have any built-in horizontal padding.

* To center a container, use the mx-auto utility:

```html
<div class="container mx-auto">
  <!-- ... -->
</div>
```

* To add horizontal padding, use the px-{size} utilities:

```html
<div class="container mx-auto px-4">
  <!-- ... -->
</div>
```

If you’d like to center your containers by default or include default horizontal padding, see the customization options below. 

**Responsive variants**

The container class also includes responsive variants like md:container by default that allow you to make something behave like a container at only a certain breakpoint and up:

**Customizing**

* Centering by default

To center containers by default, set the center option to true in the theme.container section of your config file:

```js
// tailwind.config.js
module.exports = {
  theme: {
    container: {
      center: true,
    },
  },
}
```

* Horizontal padding

* Disabling responsive variants

* Disabling entirely (disabling container class)


Source
  
https://tailwindcss.com/docs/container


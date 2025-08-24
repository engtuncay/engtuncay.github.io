
- [Icons](#icons)
  - [Css Icons](#css-icons)
  - [Font Awesome 5 (draft)](#font-awesome-5-draft)
  - [Google Icons](#google-icons)


# Icons

Extra Source : https://www.tutorialspoint.com/web_icons/web_icons_introduction.htm



## Css Icons

How To Add Icons

The simplest way to add an icon to your HTML page, is with an icon library, such as Font Awesome.

Add the name of the specified icon class to any inline HTML element (like <i> or <span>).

All the icons in the icon libraries below, are scalable vectors that can be customized with CSS (size, color, shadow, etc.)

Font Awesome Icons

To use the Font Awesome icons, go to fontawesome.com, sign in, and get a code to add in the <head> section of your HTML page:

<script src="https://kit.fontawesome.com/yourcode.js"></script>

Read more about how to get started with Font Awesome in our Font Awesome 5 tutorial.
https://www.w3schools.com/icons/fontawesome5_intro.asp

Note: No downloading or installation is required!

Example
<!DOCTYPE html>
<html>
<head>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>

<i class="fas fa-cloud"></i>
<i class="fas fa-heart"></i>
<i class="fas fa-car"></i>
<i class="fas fa-file"></i>
<i class="fas fa-bars"></i>

</body>
</html>

For a complete reference of all Font Awesome icons, visit our Icon Reference.

## Font Awesome 5 (draft)



## Google Icons

🔔 *Basic Icons*

To use the Google icons, add the following line inside the <head> section of your HTML page:

```html
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

```

Note: No downloading or installation is required!

Add the material-icons class to an inline element and insert the icon's name:

Example

The following code:

```html
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

<i class="material-icons">cloud</i>
<i class="material-icons" style="font-size:48px;">cloud</i>
<i class="material-icons" style="font-size:60px;color:red;">cloud</i>

</body>
</html>

```
Results in:

cloud cloud cloud

Google icons are designed to be used with inline elements. The `<i>` and `<span>` elements are widely used for icons.

Note: Material icons are 24px by default.

Also note that if you change the color of the icon's container, the color of the icon changes too. Same things goes for shadow, and anything else that gets inherited using CSS. The exception is the CSS font-size property, which is always 24px, unless something else is specified.

🔔 Sizable Icons

Although the material icons can be scaled to any size, the recommended font-size is either 18, 24, 36 or 48px:

Example

The following code:

```html
<style>
/* Rules for icon sizes: */
.material-icons.md-18 { font-size: 18px; }
.material-icons.md-24 { font-size: 24px; } /* Default */
.material-icons.md-36 { font-size: 36px; }
.material-icons.md-48 { font-size: 48px; }
</style>

<i class="material-icons md-18">cloud</i>
<i class="material-icons md-24">cloud</i>
<i class="material-icons md-36">cloud</i>
<i class="material-icons md-48">cloud</i>

```

Results in:

cloud cloud cloud cloud


# Ek

## Tailwind Kurulumu


### Error: PostCSS plugin tailwindcss requires PostCSS 8

**Solution : PostCSS 7 compatibility build**

As of v2.0, Tailwind CSS depends on PostCSS 8. Because PostCSS 8 is only a few months old, many other tools in the ecosystem haven’t updated yet, which means you might see an error like this in your terminal after installing Tailwind and trying to compile your CSS:

Error: PostCSS plugin tailwindcss requires PostCSS 8.
To help bridge the gap until everyone has updated, we also publish a PostCSS 7 compatibility build as @tailwindcss/postcss7-compat on npm.

If you run into the error mentioned above, uninstall Tailwind and re-install using the compatibility build instead:

```js
yarn remove tailwindcss postcss autoprefixer
yarn add -D tailwindcss@npm:@tailwindcss/postcss7-compat postcss@^7 autoprefixer@^9
```

The compatibility build is identical to the main build in every way, so you aren’t missing out on any features or anything like that.

Once the rest of your tools have added support for PostCSS 8, you can move off of the compatibility build by re-installing Tailwind and its peer-dependencies using the latest tag:

```js
npm uninstall tailwindcss
npm install -D tailwindcss@latest postcss@latest autoprefixer@latest
```

# Terimler ve Kısaltmalar

**Terimler**

* Öznitelik : Attibute
* Özellik : Property

**Kısaltmalar**

* var : Variable
* str : String
* obj : Object



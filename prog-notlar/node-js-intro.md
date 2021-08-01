


[TOC]
- [Introduction to Node Js](#introduction-to-node-js)
- [Executing Js File with Node](#executing-js-file-with-node)
- [Bölüm 8 Node Paket Yöneticisi (NPM)](#bölüm-8-node-paket-yöneticisi-npm)
  - [45 Paket Nedir](#45-paket-nedir)
  - [46 Paket Yükleme ve Kullanma](#46-paket-yükleme-ve-kullanma)
  - [47 Yerel ve Global Paketler](#47-yerel-ve-global-paketler)
  - [48 package.json ve güncelleme işlemleri](#48-packagejson-ve-güncelleme-işlemleri)
  - [49 Bağımlılık Yönetimi](#49-bağımlılık-yönetimi)
  - [50 Script Tanımlama](#50-script-tanımlama)
  - [51 Paket Kaldırma](#51-paket-kaldırma)
- [Extra - Npm vs Yarn](#extra---npm-vs-yarn)
- [Bölüm 12 - Express Framework](#bölüm-12---express-framework)
  - [66 Express Nedir](#66-express-nedir)
  - [67 Merhabe Express](#67-merhabe-express)
  - [68 Pug: Pug Nedir](#68-pug-pug-nedir)
  - [69-76 Pug Konular](#69-76-pug-konular)
  - [77 Express Statik Klasör Belirleme](#77-express-statik-klasör-belirleme)
  - [](#)


# Introduction to Node Js


# Executing Js File with Node

Node ile js dosyasını çalıştırma

```cmd
node app
```

# Bölüm 8 Node Paket Yöneticisi (NPM)

## 45 Paket Nedir


## 46 Paket Yükleme ve Kullanma


## 47 Yerel ve Global Paketler



## 48 package.json ve güncelleme işlemleri

- package.json dosyasını detaylı oluşturmak için kullanılacak komut (Tanımlamaları teker teker sorar) :

```js
npm init
```

- varsayılan tanımlı package.json oluşturacak komut:

```js
npm init -y 
```

- Örnek modül kurulumu (lokal olarak module klasörümüze ekler)

```js
npm install nodemailer --save
```

Kurulan modüller package json da dependencies alanında tutulur.

```js
//....
"dependencies" : { "module":"versiyon" , ... }
```

- Bağımlılıkları kurmak için komut :

```js
npm install
// or
yarn 
// yarn default is install command
```

- Belli bir versiyonu kurmak için :

```js
npm install underscore@1.8.2
```

- Son versiyonlarını listelemek için

```js
npm outdated
```

- Son versiyona güncellemek için

```js
npm update underscore
```

- Tamamını güncelemek için

```js
npm update
```

## 49 Bağımlılık Yönetimi

- Canlı ortamda (production) kullanmayıp , geliştirme  (development) ortamında kullanmak için

```js
npm install gulp --save-dev
```

- Geliştirme ortamı modülleri devDependencies anahtarının objesine tanımlanır.

Not: Canlı ortamında kurmak için komut

```js
npm install gulp --save
```



## 50 Script Tanımlama

- Başlangıç package.json dosyası oluşturulur.

```js
npm init -y 
```


---

- package.json da scripts alanına aşapıdaki anahtar eklenir.

```js
"start" : "node app"
```    

Bu komutu çalıştırmak için aşağıdaki komutu yazarız.

```js
npm run start 
```

## 51 Paket Kaldırma

Paket kaldırma komutu

    npm uninstall mongoose

Hem node_modules dizininden hem de package.json dosyasındaki tanımını kaldırır

---
Aynı şekilde global paketleri de kaldırabiliriz.

- global paketleri listelemek için

        npm list -g --depth=0

- Kaldırmak için

        npm uninstall -g gtop 

---

package json dosyasından tanımını kaldırmasını istemezsek

    node uninstall mongoose --no-save

---

**Ek Note**

Çoklu paket kurulumu

    npm install nodemailer underscore --save 

---

# Extra - Npm vs Yarn

- npm install === yarn  
 
Install is the default behavior of yarn.

- npm install taco --save === yarn add taco

The Taco package is saved to your package.json immediately.

- npm uninstall taco --save === yarn remove taco

--save can be defaulted in NPM by npm config set save true but this is non-obvious to most developers. Adding and removing from package.json is default in Yarn.

- npm install taco --save-dev === yarn add taco --dev

- npm update --save === yarn upgrade

Great call on upgrade vs update, since that is exactly what it is doing! Version number moves, upgrade is happening!

*WARNING* npm update --save seems to be kinda broken in 3.11

- npm install taco@latest --save === yarn add taco

- npm install taco --global === yarn global add taco


- Developer paket yükleme

```js
npm i -D vue-svg-loader vue-template-compiler
 
yarn add --dev vue-svg-loader vue-template-compiler
```

yarn komutunda --dev yerine -D kullanılabilir.


As always, use global flag with care.

You can use this to use yarn to update itself with 

yarn self-update

The packages are the same as on the NPM registry. Yarn is basically a new installer, where NPM structure and registry is the same.

```js
npm init === yarn init
npm link === yarn link
npm outdated === yarn outdated
npm publish === yarn publish
npm run === yarn run
npm cache clean === yarn cache clean
npm login === yarn login (and logout)
npm test === yarn test
npm install --production === yarn --production
```

- Things yarn has that NPM doesn’t

I’m skipping the items that they warn against using like yarn clean

yarn licenses ls — Allows you to inspect the licenses of your dependencies

yarn licenses generate-disclaimer — Automatically create your license dependency disclaimer

yarn why taco — Identify why ‘taco’ package is installed, detailing which other packages depend upon it (thanks Olivier Combe).

- yarn upgrade-interactive 

Allows you to selectively upgrade specific packages in a simple way

# Bölüm 12 - Express Framework

## 66 Express Nedir

## 67 Merhabe Express

## 68 Pug: Pug Nedir

## 69-76 Pug Konular

## 77 Express Statik Klasör Belirleme

## 


- [B3 Vue Cli (Vue 2)](#b3-vue-cli-vue-2)
  - [Installation](#installation)
  - [Creating a Project](#creating-a-project)
  - [Project Template](#project-template)
  - [Serve Project](#serve-project)
  - [Update modules in package.json](#update-modules-in-packagejson)
  - [Adding new modules](#adding-new-modules)
  - [Build Command](#build-command)


# B3 Vue Cli (Vue 2)

## Installation

Vue cli komut satırı aracının yüklenmesi :

```js
npm install -g @vue/cli
//or yarn
yarn global add @vue/cli
```

After installing required packages you can use “vue” command globally and create new project. To test the installation is successfully finished, run the following command for showing the version of Vue :

```js
vue --version
```

If you successfully see these information this means that Vue is now working globally in your system.

## Creating a Project

To create new project, we will run this command vue create “project_name” in appropriate directory for your wishes. Let’s start by creating a new project by marking the project’s name as vue-app

```js
vue create vue-app-name
```


## Project Template

Proje oluştururken yüklenecek eklentiler sorulur.

**Example Preset Template** (Şablon)

```
babel
css pre-processors -> SCSS/SASS ! , LESS , Stylus
linter-formatter
in dedicated config files->true
```

- 


## Serve Project

Projemizi ayağa kaldırır, lokalde uygulama sunucusunu çalıştırır.

```js
yarn run serve
// veya
npm run serve
```

## Update modules in package.json

Package json dosyasındaki bağımlılıkları(kütüphaneleri) yüklemek için

```js
npm install 
// or with Yarn (Install is the default behavior of yarn)
yarn 

```

## Adding new modules 




## Build Command



```js
yarn build
// veya
npm build
```

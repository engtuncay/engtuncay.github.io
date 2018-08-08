
<!-- TOC -->

- [QUICK GUIDE](#quick-guide)
    - [Step 1. Set up the Development Environment](#step-1-set-up-the-development-environment)
        - [Install Node Js](#install-node-js)
        - [Install Angular CLI](#install-angular-cli)
    - [Step 2. Create a new project](#step-2-create-a-new-project)
    - [Step 3: Serve the application](#step-3-serve-the-application)
    - [Step 4: Edit your first Angular component](#step-4-edit-your-first-angular-component)
    - [Project file review](#project-file-review)
- [Angular Notes](#angular-notes)
    - [Module](#module)
        - [Module Nedir](#module-nedir)
        - [Örnek](#örnek)
    - [Compenent](#compenent)
        - [Örnek](#örnek-1)
        - [Selectors](#selectors)
        - [Template](#template)
        - [Styles](#styles)
        - [Tip](#tip)

<!-- /TOC -->

---

# QUICK GUIDE

## Step 1. Set up the Development Environment 

### Install Node Js

Install Node.js® and npm if they are not already on your machine.

### Install Angular CLI

Then install the Angular CLI globally. (-g) argumanı verilir. Global yükleme yapar.

npm install -g @angular/cli

Note: Global Yükleme Nereye Yapılıyor ? *-*  

## Step 2. Create a new project 

```
ng new my-app
```
my-app : application name 

The Angular CLI installs the necessary npm packages, creates the project files, and populates the project with a simple default app. This can take some time.

## Step 3: Serve the application 

Uygulamayı hizmete al.

```
cd my-app
ng serve --open
```

The ng serve command launches the server, watches your files, and rebuilds the app as you make changes to those files.

- Using the --open (or just -o) option will automatically open your browser on http://localhost:4200/.

- Your app greets you with a message:

angular-app (https://angular.io/generated/images/guide/cli-quickstart/app-works.png)


## Step 4: Edit your first Angular component 

The CLI created the first Angular component for you. This is **the root component and** it is named **app-root**. You can find it in **./src/app/app.component.ts**.

- Open the component file and change the title property from 'app' to 'My First Angular App!'.

```
src/app/app.component.ts

export class AppComponent {
  title = 'My First Angular App!';
}

```
The browser reloads automatically with the revised title. That's nice, but it could look better.

```
Open src/app/app.component.css and give the component some style.
h1 {
  color: #369;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 250%;
}
```

## Project file review

An Angular CLI project is the foundation for both quick experiments and enterprise solutions.

The first file you should check out is README.md. It has some basic information on how to use CLI commands. Whenever you want to know more about how Angular CLI works make sure to visit the Angular CLI repository and Wiki.

Some of the generated files might be unfamiliar to you.

# Angular Notes

## Module

### Module Nedir

- Cevap: 

### Örnek

```angular

import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms';

import { AppComponent } from './app.component';
import { HelloComponent } from './hello.component';

@NgModule({
imports: [ BrowserModule, FormsModule ],
declarations: [ AppComponent, HelloComponent ],  // component tanımlaması
bootstrap: [ AppComponent ] // main class , açılış componenti
})
export class AppModule { }



```

## Compenent

- Componentleri @Component annotasyonu ile belirtmek lazım. Annotasyon, json objesi içinde üç argüman vermeliyiz: selector , template ve styles.

### Örnek

```
import { Component, Input } from '@angular/core';

@Component({
selector: 'hello',
template: `<h1>Hello {{name}}! (hello component)</h1>`,
styles: [`h1 { font-family: Lato; }`]
})
export class HelloComponent {
@Input() name: string;
}

```

### Selectors

selector: 'hello'
<hello> </hello> tag ile seçer

selector: '[hello]'
attribu ile seçer
<div hello> </div>

selector: '.hello'
class ile seçer
<div class='hello'></div>

### Template



### Styles

Component annotation da :

- Direk stili verebiliriz 

```
styles: [`h1 { font-family: Lato; }`]
```

- Url ile adres verebiliriz.

```
styleUrls: ['./app.component.css']
```

Not: array olduğu için birden fazla css dosyası tanımlayabiliriz.




### Tip

` (back tick) ile string tanımlarsak multi line yapabiliriz.






https://angular.io/guide/quickstart


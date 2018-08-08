
<!-- TOC -->

- [QUICK GUIDE](#quick-guide)
    - [Step 1. Set up the Development Environment](#step-1-set-up-the-development-environment)
    - [Step 2. Create a new project](#step-2-create-a-new-project)
    - [Step 3: Serve the application](#step-3-serve-the-application)
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

Install Node.js® and npm if they are not already on your machine.


Then install the Angular CLI globally.

npm install -g @angular/cli

## Step 2. Create a new project 

ng new my-app

The Angular CLI installs the necessary npm packages, creates the project files, and populates the project with a simple default app. This can take some time.

## Step 3: Serve the application 

```
cd my-app
ng serve --open
```

The ng serve command launches the server, watches your files, and rebuilds the app as you make changes to those files.

Using the --open (or just -o) option will automatically open your browser on http://localhost:4200/.

Your app greets you with a message:

angular-app (https://angular.io/generated/images/guide/cli-quickstart/app-works.png)


Step 4: Edit your first Angular component 

The CLI created the first Angular component for you. This is the root component and it is named app-root. You can find it in ./src/app/app.component.ts.

Open the component file and change the title property from 'app' to 'My First Angular App!'.

src/app/app.component.ts

export class AppComponent {
  title = 'My First Angular App!';
}

The browser reloads automatically with the revised title. That's nice, but it could look better.

Open src/app/app.component.css and give the component some style.

h1 {
  color: #369;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 250%;
}

Project file review

An Angular CLI project is the foundation for both quick experiments and enterprise solutions.

The first file you should check out is README.md. It has some basic information on how to use CLI commands. Whenever you want to know more about how Angular CLI works make sure to visit the Angular CLI repository and Wiki.

Some of the generated files might be unfamiliar to you.

The src folder
Y

Your app lives in the src folder. All Angular components, templates, styles, images, and anything else your app needs go here. Any files outside of this folder are meant to support building your app.

src
app
app.component.css
app.component.html
app.component.spec.ts
app.component.ts
app.module.ts
assets
.gitkeep
environments
environment.prod.ts
environment.ts
browserslist
favicon.ico
index.html
karma.conf.js
main.ts
polyfills.ts
styles.css
test.ts
tsconfig.app.json
tsconfig.spec.json
tslint.json

File	Purpose
app/app.component.{ts,html,css,spec.ts}

Defines the AppComponent along with an HTML template, CSS stylesheet, and a unit test. It is the root component of what will become a tree of nested components as the application evolves.

app/app.module.ts

Defines AppModule, the root module that tells Angular how to assemble the application. Right now it declares only the AppComponent. Soon there will be more components to declare.

assets/*

A folder where you can put images and anything else to be copied wholesale when you build your application.

environments/*

This folder contains one file for each of your destination environments, each exporting simple configuration variables to use in your application. The files are replaced on-the-fly when you build your app. You might use a different API endpoint for development than you do for production or maybe different analytics tokens. You might even use some mock services. Either way, the CLI has you covered.

browserslist

A configuration file to share target browsers between different front-end tools.

favicon.ico

Every site wants to look good on the bookmark bar. Get started with your very own Angular icon.

index.html

The main HTML page that is served when someone visits your site. Most of the time you'll never need to edit it. The CLI automatically adds all js and css files when building your app so you never need to add any <script> or <link> tags here manually.

karma.conf.js

Unit test configuration for the Karma test runner, used when running ng test.

main.ts

The main entry point for your app. Compiles the application with the JIT compiler and bootstraps the application's root module (AppModule) to run in the browser. You can also use the AOT compiler without changing any code by appending the--aot flag to the ng build and ng serve commands.

polyfills.ts

Different browsers have different levels of support of the web standards. Polyfills help normalize those differences. You should be pretty safe with core-js and zone.js, but be sure to check out the Browser Support guide for more information.

styles.css

Your global styles go here. Most of the time you'll want to have local styles in your components for easier maintenance, but styles that affect all of your app need to be in a central place.

test.ts

This is the main entry point for your unit tests. It has some custom configuration that might be unfamiliar, but it's not something you'll need to edit.

tsconfig.{app|spec}.json

TypeScript compiler configuration for the Angular app (tsconfig.app.json) and for the unit tests (tsconfig.spec.json).

tslint.json

Additional Linting configuration for TSLint together with Codelyzer, used when running ng lint. Linting helps keep your code style consistent.

The root folder


The src/ folder is just one of the items inside the project's root folder. Other files help you build, test, maintain, document, and deploy the app. These files go in the root folder next to src/.


my-app
e2e
src
app.e2e-spec.ts
app.po.ts
tsconfig.e2e.json
protractor.conf.js
node_modules/...
src/...
karma.conf.js
.editorconfig
.gitignore
angular.json
package.json
README.md
tsconfig.json
tslint.json

File	Purpose
e2e/

Inside e2e/ live the end-to-end tests. They shouldn't be inside src/ because e2e tests are really a separate app that just so happens to test your main app. That's also why they have their own tsconfig.e2e.json.

node_modules/

Node.js creates this folder and puts all third party modules listed in package.json inside of it.

.editorconfig

Simple configuration for your editor to make sure everyone that uses your project has the same basic configuration. Most editors support an .editorconfig file. See http://editorconfig.org for more information.

.gitignore

Git configuration to make sure autogenerated files are not committed to source control.

angular.json

Configuration for Angular CLI. In this file you can set several defaults and also configure what files are included when your project is built. Check out the official documentation if you want to know more.

package.json

npm configuration listing the third party packages your project uses. You can also add your own custom scripts here.

protractor.conf.js

End-to-end test configuration for Protractor, used when running ng e2e.

README.md

Basic documentation for your project, pre-filled with CLI command information. Make sure to enhance it with project documentation so that anyone checking out the repo can build your app!

tsconfig.json

TypeScript compiler configuration for your IDE to pick up and give you helpful tooling.

tslint.json

Linting configuration for TSLint together with Codelyzer, used when running ng lint. Linting helps keep your code style consistent.





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


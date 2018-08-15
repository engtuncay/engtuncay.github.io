
<!-- TOC -->

- [Quick Guide](#quick-guide)
    - [Step 1. Set up the Development Environment](#step-1-set-up-the-development-environment)
        - [Install Node Js](#install-node-js)
        - [Install Angular CLI](#install-angular-cli)
    - [Step 2. Create a new project](#step-2-create-a-new-project)
    - [Step 3: Serve the application](#step-3-serve-the-application)
    - [Step 4: Edit your first Angular component](#step-4-edit-your-first-angular-component)
    - [Project file review](#project-file-review)
- [Angular Tutorial](#angular-tutorial)
    - [Module](#module)
        - [Module Nedir](#module-nedir)
        - [Örnek](#örnek)
    - [Services](#services)
    - [Create the HeroService](#create-the-heroservice)
    - [Compenent](#compenent)
        - [Cli Command](#cli-command)
        - [Örnek Component Sınıfı](#örnek-component-sınıfı)
        - [Selectors](#selectors)
        - [Template](#template)
        - [Styles](#styles)
        - [Tip](#tip)
    - [Angular - Component Interaction](#angular---component-interaction)
        - [Pass data from parent to child with input binding](#pass-data-from-parent-to-child-with-input-binding)
        - [Intercept input property changes with a setter](#intercept-input-property-changes-with-a-setter)
        - [Parent listens for child event](#parent-listens-for-child-event)
        - [Intercept input property changes with ngOnChanges()](#intercept-input-property-changes-with-ngonchanges)
        - [Parent calls an @ViewChild()](#parent-calls-an-viewchild)
        - [Parent interacts with child via local variable](#parent-interacts-with-child-via-local-variable)
    - [Directives](#directives)
        - [ngIf](#ngif)
- [Sources](#sources)

<!-- /TOC -->

---

# Quick Guide

## Step 1. Set up the Development Environment 

### Install Node Js

Install Node.js® and npm (node package manager) if they are not already on your machine.

### Install Angular CLI

Then install the Angular CLI globally. (-g) argumanı verilir. Global yükleme yapar.

npm install -g @angular/cli

Note: Windowsta global Yükleme Nereye Yapılıyor ? *-*  

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

# Angular Tutorial

## Module

### Module Nedir

- Cevap: 

### Örnek

```typescript

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

## Services

## Create the HeroService



## Compenent

- Componentleri @Component annotasyonu ile belirtmek lazım. Annotasyon, json objesi içinde üç argüman vermeliyiz: selector , template ve styles.

### Cli Command

Generate a new component named heroes.

`ng generate component heroes` 

### Örnek Component Sınıfı

```typescript
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

- styleUrls prm.siyle adres verebiliriz.

```
styleUrls: ['./app.component.css']
```

Not: array olduğu için birden fazla css dosyası tanımlayabiliriz.




### Tip

` (back tick) ile string tanımlarsak multi line kullanabiliriz.

## Angular - Component Interaction 
  - Kaynak : https://angular.io/guide/component-interaction


###  Pass data from parent to child with input binding

**Syntax**: <child_component [child_field]="parent.field" ></child_component>

Note: - "nests" "iç içe koymak "

```typescript
<app-hero-child *ngFor="let hero of heroes"
      [hero]="hero"
      [master]="master">
</app-hero-child>
```

### Intercept input property changes with a setter

(Intercept: yakalamak,catch,durdurmak,alıkoymak,engelleme)

Use an input property setter to intercept and act upon a value from the parent

```typescript
@Input()
set name(name: string) { 
    
}
```

### Parent listens for child event

Child Compenent
```typescript
import { Component, EventEmitter, Input, Output } from '@angular/core';

@Component({
  selector: 'app-voter',
  template: `
    <button (click)="vote(true)"  [disabled]="didVote">Agree</button>`
})
export class VoterComponent {
  @Input()  name: string;
  @Output() voted = new EventEmitter<boolean>();
  didVote = false;
 
  vote(agreed: boolean) {
    this.voted.emit(agreed);
    this.didVote = true;
  }
}
```

Parent Component
```typescript
@Component({
  selector: 'app-vote-taker',
  template: `
    <app-voter *ngFor="let voter of voters"
      [name]="voter"
      (voted)="onVoted($event)">
    </app-voter>`
})
export class VoteTakerComponent {
  agreed = 0;
  disagreed = 0;
  voters = ['Mr. IQ', 'Ms. Universe', 'Bombasto'];
 
  onVoted(agreed: boolean) {
    agreed ? this.agreed++ : this.disagreed++;
  }
}

```

- child comp deki name fieldına , parent comp deki voter objesi bağlanmış.
    - [child_input_field] = "parent_field"
- (voted)  = "onVoted($event)"
    - (child_output_field)="parent_method(T)"
    - child comp da voted output fieldı var. (child_output_field)
    - voted a tanımlı emitter objesinin, parent daki onVoted($event) methodu ,abonesi(subscribe) olur. emitter objesine callback olarak tanımlanır. parent method gelecek argüman , event emittera tanımlanan generic objedir.


###  Intercept input property changes with ngOnChanges() 
Detect and act upon changes to input property values with the ngOnChanges() method of the OnChanges lifecycle hook interface.  

input property değişikliklerini yakalanması

### Parent calls an @ViewChild()

### Parent interacts with child via local variable

Cc: a template reference variable for the child element"
"concept "

- "You can place a local variable, #timer, on the tag <countdown-timer> representing the child component"



## Directives

### ngIf

- Şarta göre DOMa ekleme

ngif şartı gerçekleştiği an (observable), angular html elementini dom a ekler ve gösterir, şart gerçekleşmezse doma eklenmez ve göstermez.

```typescript
<div *ngIf="courses.length>0">
    if ngif true, then angular add this div to DOM
</div>

```

- Şarta göre Template Refaransını aktif etme

```typescript
<div *ngIf="courses.length>0;else #noCourses">
    List of Courses
    (couse sayısı 0 dan büyükse bu div doma eklenir, yoksa
    , #noCourse template refaransı doma eklenir,gösterilir.)
</div>

<ng-template #noCourses>
  No courses yet.
</ng-template>

```




# Sources

https://angular.io/guide/quickstart


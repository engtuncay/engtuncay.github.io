
- [Angular Official Quick Guide](#angular-official-quick-guide)
    - [Step 1. Set up the Development Environment](#step-1-set-up-the-development-environment)
        - [Install Node Js](#install-node-js)
        - [Install Angular CLI](#install-angular-cli)
    - [Step 2. Create a new project](#step-2-create-a-new-project)
    - [Step 3: Serve the application](#step-3-serve-the-application)
    - [Step 4: Edit your first Angular component](#step-4-edit-your-first-angular-component)
    - [Project file review](#project-file-review)
- [Angular Official Tutorial](#angular-official-tutorial)
    - [Services](#services)
        - [Why Services](#why-services)
        - [Create the HeroService](#create-the-heroservice)
        - [@Injectable() services](#injectable-services)
        - [Get hero data](#get-hero-data)
        - [Provide the HeroService](#provide-the-heroservice)
- [Angular Official Guides](#angular-official-guides)
    - [Angular - Component Interaction](#angular---component-interaction)
        - [Pass data from parent to child with input binding](#pass-data-from-parent-to-child-with-input-binding)
        - [Intercept input property changes with a setter](#intercept-input-property-changes-with-a-setter)
        - [Parent listens for child event](#parent-listens-for-child-event)
        - [Intercept input property changes with ngOnChanges()](#intercept-input-property-changes-with-ngonchanges)
        - [Parent calls an @ViewChild()](#parent-calls-an-viewchild)
        - [Parent interacts with child via local variable](#parent-interacts-with-child-via-local-variable)
- [Angular Notes](#angular-notes)
    - [Vscode Plugins](#vscode-plugins)
    - [Cheatsheet](#cheatsheet)
    - [Module](#module)
        - [Örnek](#%C3%B6rnek)
    - [Compenent](#compenent)
        - [Cli Command](#cli-command)
        - [Örnek Component Sınıfı](#%C3%B6rnek-component-s%C4%B1n%C4%B1f%C4%B1)
        - [Selectors](#selectors)
        - [Template](#template)
        - [Styles](#styles)
        - [Tip](#tip)
    - [Directives](#directives)
        - [ngIf](#ngif)
- [Mosh Course Style](#mosh-course-style)
    - [4 - Displaying Data and Handling Events](#4---displaying-data-and-handling-events)
        - [String Interpolation](#string-interpolation)
        - [Property Binding](#property-binding)
        - [Attribute Binding](#attribute-binding)
        - [Class Binding](#class-binding)
        - [Style Binding](#style-binding)
        - [Event Binding](#event-binding)
        - [Event Bubbling](#event-bubbling)
        - [Event Filtering](#event-filtering)
        - [Template Variables](#template-variables)
        - [Two Way Binding](#two-way-binding)
        - [Pipes](#pipes)
            - [Uppercase](#uppercase)
            - [Lowercase](#lowercase)
            - [Decimal](#decimal)
            - [Currency](#currency)
            - [Percent](#percent)
            - [Date](#date)
        - [Creating Custom Pipes](#creating-custom-pipes)
        - [Ara Konular](#ara-konular)
        - [Dependency Ekleme](#dependency-ekleme)
        - [styles.css Global css](#stylescss-global-css)
    - [5 - Component API](#5---component-api)
        - [Input Properties](#input-properties)
- [Sources](#sources)


---

# Angular Official Quick Guide

This chapter is from https://angular.io/guide/quickstart

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

Some of the generated files might be unfamiliar to you. You can get more information at the bottom of the web page

https://angular.io/guide/quickstart


# Angular Official Tutorial




## Services

This chapter is from https://angular.io/tutorial/toh-pt4


### Why Services

Components shouldn't fetch or save data directly and they certainly shouldn't knowingly present fake data. They should focus on presenting data and delegate data access to a service.

Services are a great way to share information among classes that don't know each other. You'll create a MessageService and inject it in two places:

1 in HeroService which uses the service to send a message.
2 in MessagesComponent which displays that message.



### Create the HeroService

Using the Angular CLI, create a service called hero.

    ng generate service hero

The command generates skeleton HeroService class in src/app/hero.service.ts The HeroService class should look like the following example.

src/app/hero.service.ts

```
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root',
})
export class HeroService {

  constructor() { }

}
```

###  @Injectable() services

Notice that the new service imports the Angular Injectable symbol and annotates the class with the @Injectable() decorator. This marks the class as one that participates in the dependency injection system. The HeroService class is going to provide an injectable service, and it can also have its own injected dependencies. It doesn't have any dependencies yet, but it will soon.

The @Injectable() decorator accepts a metadata object for the service, the same way the @Component() decorator did for your component classes.

### Get hero data

The HeroService could get hero data from anywhere—a web service, local storage, or a mock data source.

Removing data access from components means you can change your mind about the implementation anytime, without touching any components. They don't know how the service works.

The implementation in this tutorial will continue to deliver mock heroes.

Import the Hero and HEROES.

    import { Hero } from './hero';
    import { HEROES } from './mock-heroes';

Add a getHeroes method to return the mock heroes.

    getHeroes(): Hero[] {
    return HEROES;
    }


### Provide the HeroService

You must make the HeroService available to the dependency injection system before Angular can inject it into the HeroesComponent, as you will do below. You do this by registering a provider. A provider is something that can create or deliver a service; in this case, it instantiates the HeroService class to provide the service.

If you look at the @Injectable() statement right before the HeroService class definition, you can see that the providedIn metadata value is 'root':





# Angular Official Guides



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





# Angular Notes

## Vscode Plugins

Auto Import 1.2 By Steoates

## Cheatsheet

https://angular.io/guide/cheatsheet


## Module

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


## Compenent

- Componentleri @Component annotasyonu ile belirtmek lazım. Annotasyon, json objesi içinde üç argüman vermeliyiz: selector , template ve styles.

### Cli Command

Generate a new component named heroes.

    ng generate component heroes

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





# Mosh Course Style

## 4 - Displaying Data and Handling Events

### String Interpolation

```angular
{{ field_name }}
```


### Property Binding

```
<img [src]="imageUrl"/>

```

- Burada src, img html element bir property'sidir.

- imageUrl, componentin içindeki field'dır.

```angular
export class CourseComponent {
    imageUrl="http://lorempixel.com/400/200";
}
```

### Attribute Binding

- Şöyle bir ifade çalışmayacaktır.

```
<td [colspan]="colspan"></td>
```


td 'nin colspan diye bir propertsi yoktur.

Not : html elementinin attribute ile dom img objesinin property'si çoğu zaman birbirinin tutar. bazı istisnalar vardır. Bunlardır biri de colspan dır.

<img src="">  : burada src attribute

dom:    img class
        src --> property

<h1 [textContent]="title"></h1>

- Bunun için şu şekilde yapılmalıdır (attribute binding) :

```
<td [attr.colspan]="colspan"></td>
```

### Class Binding

<button class="btn btn-primary" [class.active]="isActive" >
Coomand </button>

- component objesinde isActive true ise html elementinin class tanımlamasına active ekler.

### Style Binding

<button [style.backgroundColor]="isActive?'blue':'white'">
Command </button>

comp objesinde isActive true ise blue,false ise white background color tanımlar.

true ise html elemetinin style="background-color: blue;"
tanımlanır.


### Event Binding

<button (click)="onSave()">Save</button>

click evenet ı, comp classındaki onSave metoduna bağlanır.

---

<button (click)="onSave($event)">Save</button>

metoda mouse event objesi gönderir.


### Event Bubbling

```html
<div (click)="onDivClicked()">
    <button (click)="onSave($event)">Save</button>
</div>
```

button tıkladığımızda aynı zamanda div de tıklanmış oluyor.
geriye dogru tıklanmayı pasife almak için 
    
    $event.stopPropagation();

kullanırız.

---

comp class:

    onSave($event) {
        $event.stopPropagation();
        console.log('button clicked');
    }

    onDivClicked() {
        console.log('div clicked');
    }


### Event Filtering

İki yolla yapılır

    <button (keyup)="onAction($event)">Save</button>

comp class:

    onAction($event){
        if($event.keyCode===13) console.log("Enter was pressed");
    }


---

Kısa Yöntem

    <button (keyup.enter)="onEnter($event)">Save</button>

### Template Variables

$event objesinden elementin değerine ulaşmak için

$event.target.value değişkenini kullanırız.

Template Variable kullanarak daha kısa yöntemle ulaşabiliriz.

    <input #email (keyup.enter)="onKeyUp(email.value)"/>

    // comp class

    onKeyUp(email){
        console.log(email);
    }

değişkenimiz email, input dom objesini gösterir. bunu (email değişkenini) yalnızca templatede kullanbiliriz.



### Two Way Binding

Two Way Alternative Way

    <input [value]="email" (keyup.enter)="email=$event.target.value;onKeyUp()" >

Two Way Binding

    <input [(ngModel)]="email" (keyup.enter)="onKeyUp()"/>

Comp class email değişkeni ile , input elementinin value sı birbirine bağlanmış oldu.

    [(Banana in a box)] syntax

**two way binding kullanmak için** Forms Module yüklemek lazım. Bunun için de

app Module içine

    import { FormsModule } from '@angular/forms';

ve ngmodule dekaratörünün imports anahtarına, FormsModule eklenir.

### Pipes

Built-in Pipes

#### Uppercase

{{ fieldname | uppercase | lowercase }}


#### Lowercase

#### Decimal

{{ fieldname| number }}

30123 --> 30,123 şeklinde gösterilir

{{ fieldname| number:'2.1-1'}}

4.9745 --> 05.0 şeklinde gösterilir


#### Currency

{{ fieldname| currency }}

190.95 --> 190.95 para işareti ile gösterir. Örneğin, USD190.95

{{ fieldname| currency:'AUD'}}

190.95 --> AUD190.95

#### Percent


#### Date

    {{ fieldname | date:'shortDate' }}

    4/1/2016 şeklinde tarihi gösterir.

For more info about Date Pipe 

https://angular.io/api/common/DatePipe



### Creating Custom Pipes

```

import { Pipe,PipeTransform } from '@angular//core';

export class SummaryPipe implements PipeTransform {

    transform(value:any, args?:any){

        if(!value)return null;

        return value.substr(0,50)+'...';

    }

}

```
---

Bu pipe projeye dahil etmemiz gerekir.

app module içerisinde ngmodule dekaratorünün declarations key ine SummaryPipe ekleriz.

@NgModule({
    declarations: [
        ....,
        SummaryPipe
    ],
    ...
})


---

Kullanımı

{{ fieldname | summary:10}}


---

Multiple Argument For Custom pipe

```

import { Pipe,PipeTransform } from '@angular//core';

export class SummaryPipe implements PipeTransform {

    transform(value:any, limit?:number){

        if(!value)return null;

        let actualLimit = (limit) ? limit : 50;

        return value.substr(0,actualLimit) +'...';

    }

}

```

### Ara Konular

### Dependency Ekleme

package.json dosyasında dependencies key , objesine 
eklenir:

"bootstrap":"^3.3.7"

^ latest version gösterir

dependency eklendikten sonra yüklemek için 
npm install komutu çalıştırılır.


### styles.css Global css

farklı css dosyaları da eklenir. @import annotasyonu ile:

    @import "~bootstrap/dist/css/bootsrap.css";


## 5 - Component API

Örnek Component

---

Ana component app.component.ts


    @Component({
        selector: 'app-root',
        templateUrl: './app.component.html',
        styleUrls: ['./app.component.css']
    })
    export class AppComponent {

        post={
            title:"Title",
            isFavorite:true
        }

    }

---

app.component.html

    <favorite [isFavorite]="post.isFavorite" (change)="onFavoriteChange()"></favorite>

Burada favorite.isFavorite = AppComponent.post.isFavorite bağlanmış oluyor.

[isFavorite] input property , (change) ise output property dir.



    state --> (input) Component (output) --> Event
                          {}

---

favorite.component.ts

```typescript
    @Component({
        selector: 'favorite',
        templateUrl: './favorite.component.html',
        styleUrl: ['./favorite.component.css']
    })   
    export class FavoriteComponent implements OnInit {

        @Input() isFavorite: boolean;

        constructor(){}

        ngOnInit(){

        }

        onClick(){
            
        }
        
    }

```

---

favorite.component.html

```typescript

<span 
    class="glyphicon"
    [class.glyphicon-star]="isSelected"
    [class.glyphicon-star-empty]="!isSelected"
    (click)="onClick()"
></span>

```





### Input Properties




















































# Sources

- Quick Start Guide, https://angular.io/guide/quickstart
- Angular Official Tutorial, https://angular.io/tutorial
- Mosh Hamadani Angular Course on Udemy





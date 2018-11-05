
- [Angular Official Quick Guide](#angular-official-quick-guide)
    - [Step 1. Set up the Development Environment](#step-1-set-up-the-development-environment)
        - [Install Node Js](#install-node-js)
        - [Install Angular CLI](#install-angular-cli)
    - [Step 2. Create a new project](#step-2-create-a-new-project)
    - [Step 3: Serve the application](#step-3-serve-the-application)
    - [Step 4: Edit your first Angular component](#step-4-edit-your-first-angular-component)
    - [Project file review](#project-file-review)
- [Angular Official Tutorial : Tour of Heroes](#angular-official-tutorial--tour-of-heroes)
    - [Intro](#intro)
        - [What you'll build](#what-youll-build)
    - [The Application Shell](#the-application-shell)
    - [The Hero Editor](#the-hero-editor)
    - [Display a Heroes List](#display-a-heroes-list)
    - [Master/Detail Components](#masterdetail-components)
    - [Services](#services)
        - [Why Services](#why-services)
        - [Create the HeroService](#create-the-heroservice)
            - [@Injectable() services](#injectable-services)
            - [Get hero data](#get-hero-data)
        - [Provide the HeroService](#provide-the-heroservice)
        - [Update HeroesComponent](#update-heroescomponent)
            - [Inject the HeroService](#inject-the-heroservice)
            - [Add getHeroes()](#add-getheroes)
            - [Call it in ngOnInit](#call-it-in-ngoninit)
        - [Observable data](#observable-data)
            - [Observable HeroService](#observable-heroservice)
            - [Subscribe in HeroesComponent](#subscribe-in-heroescomponent)
        - [Show messages](#show-messages)
            - [Create MessagesComponent](#create-messagescomponent)
            - [Create the MessageService](#create-the-messageservice)
            - [Inject it into the HeroService](#inject-it-into-the-heroservice)
            - [Send a message from HeroService](#send-a-message-from-heroservice)
            - [Bind to the MessageService](#bind-to-the-messageservice)
        - [Summary](#summary)
    - [Routing](#routing)
    - [HTTP](#http)
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

Note: Windowta global yükleme alanı : @?@

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

https://angular.io/guide/quickstart#project-file-review


# Angular Official Tutorial : Tour of Heroes

This chapter is from https://angular.io/tutorial

## Intro

The Tour of Heroes tutorial covers the fundamentals of Angular.

This basic app has many of the features you'd expect to find in a data-driven application. It acquires and displays a list of heroes, edits a selected hero's detail, and navigates among different views of heroic data.

By the end of the tutorial you will be able to do the following:

Use built-in Angular directives to show and hide elements and display lists of hero data.

Create Angular components to display hero details and show an array of heroes.

Use one-way data binding for read-only data.

Add editable fields to update a model with two-way data binding.

Bind component methods to user events, like keystrokes and clicks.

Enable users to select a hero from a master list and edit that hero in the details view.

Format data with pipes.

Create a shared service to assemble the heroes.
Use routing to navigate among different views and their components.

After completing all tutorial steps, the final app will look like this live example (https://angular.io/generated/live-examples/toh-pt6/stackblitz.html) / download example (https://angular.io/generated/zips/toh-pt6/toh-pt6.zip).

### What you'll build

https://angular.io/tutorial#what-youll-build


## The Application Shell


## The Hero Editor


## Display a Heroes List


## Master/Detail Components














## Services

This chapter is from https://angular.io/tutorial/toh-pt4


### Why Services

Components shouldn't fetch or save data directly and they certainly shouldn't knowingly present fake data. They should focus on presenting data and delegate data access to a service.

Services are a great way to share information among classes that don't know each other. You'll create a MessageService and inject it in two places:

1. in HeroService which uses the service to send a message.
2. in MessagesComponent which displays that message.



### Create the HeroService

Using the Angular CLI, create a service called hero.

    ng generate service hero

The command generates skeleton HeroService class in **src/app/** hero.service.ts The HeroService class should look like the following example.

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

####  @Injectable() services

Notice that the new service imports the Angular Injectable symbol and annotates the class with the **@Injectable()** decorator. This marks the class as one that participates in the dependency injection system. The HeroService class is going to provide an injectable service, and it can also have its own injected dependencies. It doesn't have any dependencies yet, but it will soon.

The @Injectable() decorator accepts **a metadata object** (argüman olarak aldığı json objesi) for the service, the same way the @Component() decorator did for your component classes.

#### Get hero data

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

    @Injectable({
    providedIn: 'root',
    })

When you provide the service **at the root level**, Angular creates **a single, shared instance** of HeroService and injects into any class that asks for it. Registering the provider in the @Injectable metadata also allows Angular to optimize an app by removing the service if it turns out not to be used after all (##).

To learn more about providers, see the Providers section (https://angular.io/guide/providers). To learn more about injectors, see the Dependency Injection guide (https://angular.io/guide/dependency-injection).

The HeroService is now ready to plug into the HeroesComponent.

### Update HeroesComponent

Import the HeroService.

    import { HeroService } from '../hero.service';

Replace the definition of the heroes property with a simple declaration.

    heroes: Hero[];

####  Inject the HeroService

Add a **private heroService parameter** of type HeroService to **the constructor**.

```typescript
constructor(private heroService: HeroService) { }
```

The parameter simultaneously defines a private heroService property (property tanımlar ##) and identifies it as a HeroService injection site.

When Angular creates a HeroesComponent, the Dependency Injection system sets the heroService parameter to the singleton instance of HeroService.

#### Add getHeroes()

Create a function to retrieve the heroes from the service.

    getHeroes(): void {
    this.heroes = this.heroService.getHeroes();
    }

#### Call it in ngOnInit

While you could call getHeroes() in the constructor, that's not the best practice.

**Reserve the constructor for simple initialization** such as wiring constructor parameters to properties. The constructor shouldn't do anything. **It certainly shouldn't call a function that makes HTTP requests to a remote server as a real data service would**.

Instead, call getHeroes() inside **the ngOnInit lifecycle hook** and let Angular call ngOnInit at an appropriate time after constructing a HeroesComponent instance.

    ngOnInit() {
    this.getHeroes();
    }

### Observable data

The HeroService.getHeroes() method has **a synchronous signature**, which implies that the HeroService can fetch heroes synchronously. The HeroesComponent consumes the getHeroes() result as if heroes could be fetched synchronously.

    this.heroes = this.heroService.getHeroes();

This will not work in a real app. You're getting away with it now because the service currently returns mock heroes. But soon the app will fetch heroes from a remote server, which is an inherently (kalıtımsal,göbekten :) asynchronous operation.

The HeroService must wait for the server to respond, getHeroes() cannot return immediately with hero data, and the browser will not block while the service waits.

HeroService.getHeroes() must have an asynchronous signature of some kind.

**It can take a callback. It could return a Promise. It could return an Observable.**

In this tutorial, HeroService.getHeroes() will return an Observable in part because it will eventually use the Angular 'HttpClient.get' method to fetch the heroes and HttpClient.get() returns an Observable.

#### Observable HeroService

Observable is one of the key classes in the RxJS library. (http://reactivex.io/rxjs/)

In a later tutorial on HTTP, you'll learn that Angular's HttpClient methods return **RxJS Observables**. In this tutorial, you'll simulate getting data from the server with the RxJS of() function.

Open **the HeroService** file and **import the Observable and of symbols from RxJS**.

src/app/hero.service.ts (Observable imports)

    import { Observable, of } from 'rxjs';

Replace the getHeroes method with this one.

    getHeroes(): Observable<Hero[]> {
    return of(HEROES);
    }

of(HEROES) returns an Observable<Hero[]> that emits a single value, the array of mock heroes.

Note:
> In the HTTP tutorial (https://angular.io/tutorial/toh-pt6), you'll call HttpClient.get<Hero[]>() which also returns an Observable<Hero[]> that emits a single value, an array of heroes from the body of the HTTP response.

#### Subscribe in HeroesComponent

The HeroService.getHeroes method used to return a **Hero[].** Now it returns an **Observable<Hero[]>.**

You'll have to adjust to that difference in HeroesComponent.

Find the getHeroes method and replace it with the following code 

heroes.component.ts (Observable)

    getHeroes(): void {
    this.heroService.getHeroes()
        .subscribe(heroes => this.heroes = heroes);
    }

heroes.component.ts (Original) (Old situation) (for comparing)

    getHeroes(): void {
    this.heroes = this.heroService.getHeroes();
    }

**Observable.subscribe()** is the critical difference.

The previous version assigns an array of heroes to the component's heroes property. The assignment occurs synchronously, as if the server could return heroes instantly or the browser could freeze the UI while it waited for the server's response.

That won't work when the HeroService is actually making requests of a remote server.

The new version waits for the Observable to emit (distribute,provide,spread (to)) the array of heroes— which could happen now or several minutes from now. Then subscribe passes the emitted array (dağıtılacak dizi) to the callback (geri çağrılacak fonksiyon,abonman fonk(to) ), which sets (kuran,hazırlayan) the component's heroes property.

This asynchronous approach will work when the HeroService requests heroes from the server.

### Show messages

In this section you will

    add a MessagesComponent that displays app messages at the bottom of the screen.
    create an injectable, app-wide MessageService for sending messages to be displayed
    inject MessageService into the HeroService
    display a message when HeroService fetches heroes successfully.

#### Create MessagesComponent

Use the CLI to create the MessagesComponent.

    ng generate component messages


The CLI creates the component files in the src/app/messages folder and declare MessagesComponent in AppModule.

Modify the AppComponent template to display the generated MessagesComponent

/src/app/app.component.html

    <h1>{{title}}</h1>
    <app-heroes></app-heroes>
    <app-messages></app-messages>

You should see the default paragraph from MessagesComponent at the bottom of the page.

#### Create the MessageService

Use the CLI to create the MessageService in src/app.

    ng generate service message

Open MessageService and replace its contents with the following.

/src/app/message.service.ts

    import { Injectable } from '@angular/core';
    
    @Injectable({
    providedIn: 'root',
    })
    export class MessageService {
    messages: string[] = [];
    
    add(message: string) {
        this.messages.push(message);
    }
    
    clear() {
        this.messages = [];
    }
    }


The service exposes its cache of messages and two methods: one to add() a message to the cache and another to clear() the cache.

####  Inject it into the HeroService

Re-open the HeroService and import the MessageService.

/src/app/hero.service.ts (import MessageService)

    import { MessageService } from './message.service';


Modify the constructor with a parameter that declares a private messageService property. Angular will inject the singleton MessageService into that property when it creates the HeroService.

    constructor(private messageService: MessageService) { }

>This is a typical "service-in-service" scenario: you inject the MessageService into the HeroService which is injected into the HeroesComponent.

####  Send a message from HeroService

Modify the getHeroes method to send a message when the heroes are fetched.

    getHeroes(): Observable<Hero[]> {
    // TODO: send the message _after_ fetching the heroes
    this.messageService.add('HeroService: fetched heroes');
    return of(HEROES);
    }

/src/app/messages/messages.component.ts (import MessageService)

    import { MessageService } from '../message.service';

Modify the constructor with a parameter that declares a public messageService property. Angular will inject the singleton MessageService into that property when it creates the MessagesComponent.

    constructor(public messageService: MessageService) {}

The messageService property must be public because you're about to bind to it in the template.

>Angular only binds to public component properties.

#### Bind to the MessageService

Replace the CLI-generated MessagesComponent template with the following.

src/app/messages/messages.component.html

    <div *ngIf="messageService.messages.length">
    
    <h2>Messages</h2>
    <button class="clear"
            (click)="messageService.clear()">clear</button>
    <div *ngFor='let message of messageService.messages'> {{message}} </div>
    
    </div>


This template binds directly to the component's messageService.

- The *ngIf only displays the messages area if there are messages to show.
- An *ngFor presents the list of messages in repeated <div> elements.
- An Angular event binding binds the button's click event to MessageService.clear().

The messages will look better when you add the private CSS styles to messages.component.css as listed in one of the "final code review" tabs (https://angular.io/tutorial/toh-pt4#final-code-review).

### Summary

- You refactored data access to the HeroService class.
- You registered the HeroService as the provider of its service at the root level so that it can be injected anywhere in the app.
- You used Angular Dependency Injection to inject it into a component.
- You gave the HeroService get data method an asynchronous signature.
- You discovered Observable and the RxJS Observable library.
- You used RxJS of() to return an observable of mock heroes (Observable<Hero[]>).
- The component's ngOnInit lifecycle hook calls the HeroService method, not the constructor.
- You created a MessageService for loosely-coupled communication between classes.
- The HeroService injected into a component is created with another injected service, MessageService.

**End of services chapter**


## Routing



## HTTP



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


# Sources

- Quick Start Guide, https://angular.io/guide/quickstart
- Angular Official Tutorial, https://angular.io/tutorial
- Mosh Hamadani Angular Course on Udemy


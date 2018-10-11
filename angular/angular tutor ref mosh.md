
- [Mosh Course Style](#mosh-course-style)
    - [1 Introduction](#1-introduction)
    - [2 Typescript](#2-typescript)
    - [3 Angular Fundamentals](#3-angular-fundamentals)
    - [4 Displaying Data and Handling Events](#4-displaying-data-and-handling-events)
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
        - [Aliaing Input Properties](#aliaing-input-properties)
        - [Output Properties](#output-properties)
        - [Passing Event Data](#passing-event-data)
        - [Aliasing Output Properties](#aliasing-output-properties)
        - [Templates](#templates)
        - [Styles](#styles)
        - [View Encapsulation](#view-encapsulation)
        - [ngContent](#ngcontent)
        - [ngContainer](#ngcontainer)
    - [6 - Directives ( Dom Manipulation )](#6---directives--dom-manipulation-)
        - [ngIf](#ngif)
        - [Hidden Property](#hidden-property)
        - [ngSwitchCase](#ngswitchcase)
        - [ngFor](#ngfor)
        - [ngFor and Change Detection](#ngfor-and-change-detection)
        - [ngFor and TrackBy](#ngfor-and-trackby)
        - [The Leading Asterisk](#the-leading-asterisk)
        - [ngClass](#ngclass)
        - [ngStyle](#ngstyle)
        - [Safe Traversal Operator](#safe-traversal-operator)
        - [Custom Directives](#custom-directives)

---

# Mosh Course Style

## 1 Introduction

## 2 Typescript

## 3 Angular Fundamentals

## 4 Displaying Data and Handling Events

### String Interpolation

```angular
{{ field_name }}
```

### Property Binding

```html
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

- Farklı yollardan da input parametresi alınabilir.

- Component decoratorü üzerinden...

```typescript

@Component({
    ....
    inputs:['isFavorite']
})
export class FavoriteComponent{

    isFavorite : boolean;
    ....

}


```

### Aliaing Input Properties

- @Input annotasyonu üzerinden de parametre alınabilir

```typescript

@Component({
    ....
})
export class FavoriteComponent{

    @Input('is-favorite) isFavorite : boolean;
    ....

}

```

- Bu yöntem daha iyi daha sonra değişkenimizin ismini değiştirsekte bağlantı bozulmaz.


### Output Properties

- Bir nevi parent component , child componentden event listener durumundadır.

```html
app.component.html

    <favorite [isFavorite]="post.isFavorite" (change)="onFavoriteChange()"></favorite>

```

- Burada şöyle bir durum vardır

` favorite.change.subscribe( () -> onFavoriteChanged())  

parent component onfavoritechange metodu ile dinler, change event emitter objesine abone olur.

app component ts
```typescript

export class AppComponent{

    ....

    onFavoriteChanged(){
        ....
    }

}

```

### Passing Event Data

- Örnek

```typescript

export class FavoriteComponent implements OnInit {

    @Input('isFavorite') isSelected: boolean;
    @Output() change = new EventEmitter();

    constructor(){}

    ngOnInit(){

    }

    onClick(){
        this.isSelected = !this.isSelected;
        ' dinleyen metodlara arguman göndererek çalıştırır.
        this.change.emit(this.isSelected);


    }

    

}


export class AppComponent{

    
    post = {
        title: "Title",
        isFavorite: true
    }
    
    ....

    onFavoriteChanged(isFavorite){

        console.log("Favorite changed:", isFavorite);
        
    }

}



Parent Html Dosyası

<favorite [isFavorite]="post.isFavorite" (change)="onFavoriteChange($event)"></favorite>



```


- Child componentden obje olarak da gönderebiliriz.


```typescript

child component onClick metodu

onClick(){
        this.isSelected = !this.isSelected;
        ' dinleyen metodlara arguman göndererek çalıştırır.
        ' dinleyen metodlara obje gönderiyor
        this.change.emit({ newValue: this.isSelected });


    }


parent component dinleyici metod

onFavoriteChanged(eventArgs : { newValue: boolean }){

        console.log("Favorite changed:", eventArgs);
        
    }


```

- interface tanımlayıp interface üzerinden de alabiliriz.

```typescript

export interface FavoriteChangedEventArgs {
    newValue: boolean;
}


Bunu da parent component de kullanabiliriz.

    import FavoriteChangedEventArgs ....;

    onFavoriteChanged( eventArgs: FavoriteChangedEventArgs) {
        console.log("Favorite changed:", eventArgs);
    }

```

### Aliasing Output Properties

- Output propertisine alias ile gönderme yapabiliriz.

```typescript

child comp.da

@Output('change') click = new EventEmitter();

```


### Templates

```typescript

@Component({
        selector: 'favorite',
        templateUrl: './favorite.component.html',                  <-----------------------
        styleUrl: ['./favorite.component.css']
    })   
    export class FavoriteComponent implements OnInit {
    ....
    }

```

### Styles

```typescript

@Component({
        selector: 'favorite',
        templateUrl: './favorite.component.html',
        styleUrl: ['./favorite.component.css'],                 <-----------------------
        styles: [
            
        ]
    })   
    export class FavoriteComponent implements OnInit {
    ....
    }

```

- Bir yolda template içerisinde style tanımlayabiliriz.


```typescript

<style>

    .glyphicon { color: blue; }

</style>

<span 
    class="glyphicon"
    [class.glyphicon-star]="isSelected"
    [class.glyphicon-star-empty]="!isSelected"
    (click)="onClick()"
></span>

```

### View Encapsulation

Shadow Dom : Allows us to apply scoped styles to elements without bleeding out to the outer world.

+++


### ngContent

```html
panel component html
<div class="panel panel-default">
    <div class="panel-heading">
        <ng-content></ng-content>
    </div>
    <div class="panel-body">
        <ng-content></ng-content>
    </div>
</div>

parent component

<bootstrap-panel [body]="body"></bootstrap-panel>

```

- ikinci yöntem

```html
panel component html
<div class="panel panel-default">
    <div class="panel-heading">
        <ng-content></ng-content>
    </div>
    <div class="panel-body">
        <ng-content></ng-content>
    </div>
</div>

parent component

<bootstrap-panel>
    <div class="heading">Heading</div>
    <div class="body">
        <h2>Body</h2>
        <p>some content...</p>
    </div>
</bootstrap-panel>

```

- You dont need a selector if you have only one ng-content

### ngContainer

```html

panel component html
<div class="panel panel-default">
    <div class="panel-heading">
        <ng-content></ng-content>
    </div>
    <div class="panel-body">
        <ng-content></ng-content>
    </div>
</div>


parent component html

<bootstrap-panel>
    
    <ng-container class="heading">Heading</ng-container>
    
    <div class="body">
        <h2>Body</h2>
        <p>some content...</p>
    </div>

</bootstrap-panel>

```

---

## 6 - Directives ( Dom Manipulation )

### ngIf

- Şarta göre DOMa ekleme

ngif şartı gerçekleştiği an (observable), angular html elementini dom a ekler ve gösterir, şart gerçekleşmezse doma eklenmez ve göstermez.

reaktifdir (yeniden aktif olabilen).

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

- Örnek

```angular

<div *ngIf="courses.length>0;then courseList else #noCourses">
    List of Courses
    (couse sayısı 0 dan büyükse bu div doma eklenir, yoksa
    , #noCourse template refaransı doma eklenir,gösterilir.)
</div>

<ng-template #courseList>
  No courses yet.
</ng-template>


<ng-template #noCourses>
  No courses yet.
</ng-template>

```

### Hidden Property

- Örnek

```angular

<div [hidden]="courses.length ==0">

List of courses

</div>


<div [hidden]="courses.length > 0">

No courses yet

</div>

```

Not : Burada ngifden farkı , dom bu elementi gizlemiş olduğumuz için , kaynaklar görünür , fakat hidden özelliği aktiftir.

Not : hidden elementi , küçük eleman ağacları için
ngIf ise geniş eleman ağaçları için 

for small element trees
for large element trees


### ngSwitchCase

- Örnek

```angular

<ul class="nav nav-pills">

    <li [class.active]="viewMode=='map'"> <a (click)="viewMode='map'">Map View</a> </li>
    <li> <a (click)="viewMode='list'">List View</a> </li>

</ul>


<div [ngSwitch]="viewMode">

    <div *ngSwitchCase="'map'"> Map View Content </div>
    <div *ngSwitchCase="'list'"> List View Content </div>
    <div *ngSwitchDefault> Otherwise </div>

</div>


```

### ngFor

- Örnek

```angular

<ul>

<li *ngFor="let course of courses;index as i"> 
    {{i}}  - {{course.name}} 
</li>

</ul>

```
- Örnek

```angular

<ul>

<li *ngFor="let course of courses;even as isEven">
    {{course.name}}  <span *ngIf="isEven">(Even)</span>
</li>

</ul>

```

### ngFor and Change Detection

- ngFor reaktiftir, bağlı olduğu data değiştiğinde otomatik değişecektir.

### ngFor and TrackBy

- Örnek

```angular

<button (click)="loadCourses()"> Load Courses </button>

<ul>
<li *ngFor="let course of courses; trackBy: trackCourse> 
    {{ course.name }}
</li>

</ul>

```

```angular

    trackCoutse(index, course){
        return course ? course.id : undefined;
    }

```


### The Leading Asterisk

we use the leading asterisk with our structural directives, like ngIf



```angular

<ng-template [ngIf]="courses.length > 0">

     <div>
            List of Courses
     </div>

</ng-template>

```



### ngClass

- Class Binding example

```angular

<span
    [class.glypicon-star]="isSelected"
    [class.glypicon-star-empty]="!isSelected"
    (click)="onClick()"
></span>

```

- ngClass example

```angular

<span
    [ngClass]="{
        'glyphicon-star': isSelected,
        'glyphicon-star-empty': !isSeleced
    }"
    (click)="onClick()"
></span>


```

### ngStyle

- Style Binding

```angular

<button
    [style.backgroundColor]=" canSave ? 'blue' : 'gray'"
    [style.color]=" canSave ? 'white' : 'black'"
    [style.fontWeight]= " canSave ? 'bold' : 'normal'"

>Save</button>

```

ts dosyasındaki canSave alanına stillendirmiş oluruz.


- ngStyle

```angular

<button
    [ngStyle]= "{
        'backgroundColor': canSave ? 'blue' : 'gray'
        ,'color' : canSave ? 'white' : 'black'
        ,'fontWeight' : canSave ? 'bold' : 'normal'
    }"
>Save</button>

```

### Safe Traversal Operator

```angular

export class AppComponent {

    task= {
        title : 'Review apps',
        assignee: {
            name: 'Arif Demir'
        }
    }

}


html dosyasında

<span>
    {{ task.assignee.name}}
</span>


```

Burada şöyle durum var assignee objesi olmayabilir

İki çözüm yolu var.

```angular

<span *ngIf ="task.assignee">
    {{ task.assignee.name}}
</span>

```

- 2 yol

```angular

<span>
    {{ task.assignee?.name}}
</span>


```
Burada assignee olmazsa span içi boş olarak basılır.



### Custom Directives

- Direktif cli dan oluşturmak için

` ng g d mydirectivename

Bu işlemde src/app klasörüne

mydirecivename.directive.spec.ts
mydirecivename.directive.ts

dosyalarını oluşturur.

ve app.module.ts içerisindeki gerekli eklemeleri yapar.

???

declarations dizisine Mydirectivename ekleriz.


- Öncelikle directive class ını oluştururuz.

```angular

import { Directive } from '@angular/core';

@Directive({
    selector: '[appInputFormat]'
})
export class InputFormatDirective {

    constructor(){ }

}

```

directif classımıza @Directive decorator tanımlamasını (decorated with the directive decorator function)

- Düzenlemer

```typescript

import { Directive, HostListener,ElementRef } from '@angular/core';

@Directive({
    selector: '[appInputFormat]'
})
export class InputFormatDirective {

     // @Input('format') format; // usage 2 : format attribute ile değer alınması

    @Input ('appInputFormat') format;   // usage 3 : appInputFormat attribute ile alınması

    @HostListener('focus') onFocus() {
        console.log("on Focus");

    }

    @HostListener('blur') onBlur() {
        //console.log("on Blur");

        // let value:string = this.el.nativeElement.value;
        // this.el.nativeElement.value = value.toLowerCase();

        if(this.format =='lowercase')
            this.el.nativeElement.value = value.toLowerCase();
        else
            this.el.nativeElement.value = value.toUpperCase();



    }

    constructor( private el: ElementRef){ }

}

```

```angular

@NgModule({
    ....
    InputFormatDirective
})

```

- usage of the component

```html
<input type="text" appInputFormat>

```

- usage of the component (2)

```html
<input type="text" appInputFormat [format]="'uppercase'">

```

- usage of the component (3)

```html
<input type="text" [appInputFormat]="'uppercase'">

```


























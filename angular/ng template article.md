
- [Everything you need to know about ng-template, ng-content, ng-container and *ngTemplateOutlet](#everything-you-need-to-know-about-ng-template-ng-content-ng-container-and-ngtemplateoutlet)
  - [1 - ng-template](#1---ng-template)




Everything you need to know about <ng-template>, <ng-content>, <ng-container> and *ngTemplateOutlet
https://medium.freecodecamp.org/everything-you-need-to-know-about-ng-template-ng-content-ng-container-and-ngtemplateoutlet-4b7b51223691

# Everything you need to know about ng-template, ng-content, ng-container and *ngTemplateOutlet

## 1 - ng-template

As the name suggests the <ng-template> is a template element that Angular uses with structural directives (*ngIf, *ngFor, [ngSwitch] and custom directives).

These template elements only work in the presence of structural directives. Angular wraps the host element (to which the directive is applied) inside <ng-template> and consumes the <ng-template> in the finished DOM by replacing it with diagnostic comments.

Consder a simple example of *ngIf


```javascript
<div *ngIf="shouldSayHello" class="hello-world">Hello World</div>

<!-- Converted element -->
<ng-template [ngIf]="shouldSayHello">
    <div class="hello-world">Hello World</div>
</ng-template>

```

Usage:
We have seen how Angular uses <ng-template> but what if we want to use it? As these elements work only with a structural directive, we can write as:


```javascript
<ng-template *ngIf="home">Go Home!</ng-template>
```

Here home is a boolean component variable set to true value. The output of the above code in DOM:

Nothing got rendered! :(

This was the expected result. As we have already discussed, Angular replaces the <ng-template> with diagnostic comments. No doubt the above code would not generate any error, as Angular is perfectly fine with your use case. You would never get to know what exactly happened behind the scenes.

Let’s compare the above two DOMs that were rendered by Angular:

If you watch closely, there is one extra comment tag in the final DOM of Example 2. The code that Angular interpreted was:

Angular wrapped up your host <ng-template> within another <ng-template> and converted not only the outer <ng-template> to diagnostic comments but also the inner one! This is why you could not see any of your message.

To get rid of this there are two ways to get your desired result:

Method 1:

In this method you are providing Angular the de-sugared format that needs no further processing. This time Angular would only convert <ng-template> to comments but leaves the content inside it untouched (they are no longer inside any <ng-template> as they were in the previous case). Thus, it will render the content correctly.

To know more about how to use this format with other structural directives refer to this article.

This is a quite unseen format and is seldom used (using two sibling <ng-template>). Here we are giving a template reference to the *ngIf in its then to tell it which template should be used if the condition is true.

2. <ng-container>

The reason why many of us write this code is the inability to use multiple structural directives on a single host element in Angular. Now this code works fine but it introduces several extra empty <div> in the DOM if item.id is a falsy value which might not be required.

One may not be concerned for a simple example like this but for a huge application that has a complex DOM (to display tens of thousands of data) this might become troublesome as the elements might have listeners attached to them which will still be there in the DOM listening to events.

What’s even worse is the level of nesting that you have to do to apply your styling (CSS)!

No worries, we have <ng-container> to the rescue!

The Angular <ng-container> is a grouping element that doesn't interfere with styles or layout because Angular doesn't put it in the DOM.

So if we write our Example 1 with <ng-container>:

See we got rid of those empty <div>s. We should use <ng-container> when we just want to apply multiple structural directives without introducing any extra element in our DOM.

For more information refer to the docs. There’s another use case where it is used to inject a template dynamically into a page. I’ll cover this use case in the last section of this article.

3. <ng-content>

They are used to create configurable components. This means the components can be configured depending on the needs of its user. This is well known as Content Projection. Components that are used in published libraries make use of <ng-content> to make themselves configurable.

Consider a simple <project-content> component:

The HTML content passed within the opening and closing tags of <project-content> component is the content to be projected. This is what we call Content Projection.

The content will be rendered inside the <ng-content> within the component. This allows the consumer of <project-content> component to pass any custom footer within the component and control exactly how they want it to be rendered.

Multiple Projections:

What if you could decide which content should be placed where? Instead of every content being projected inside a single <ng-content>, you can also control how the contents will get projected with the select attribute of <ng-content>

It takes element selector to decide which content to project inside a particular <ng-content>.

We have modified the <project-content> definition to perform Multi-content projection. The select attribute selects the type of content that will be rendered inside a particular <ng-content>. Here we have first select to render header h1 element. If the projected content has no h1 element it won’t render anything. Similarly the second select looks for a div. The rest of the content gets rendered inside the last <ng-content> with no select.

Calling the component will look like:

4. *ngTemplateOutlet

…They are used as a container to templates that can be reused at multiple places. We will cover more on this in a later section of this article.

…There’s another use case where it is used to inject a template dynamically into a page. I’ll cover this use case in the last section of this article.

This is the section where we will discuss the above two points mentioned before

*ngTemplateOutlet is used for two scenarios — to insert a common template in various sections of a view irrespective of loops or condition and to make a highly configured component.

Template reuse:

Consider a view where you have to insert a template at multiple places. For example, a company logo to be placed within a website. We can achieve it by writing the template for the logo once and reusing it everywhere within the view.

Following is the code snippet:

As you can see we just wrote the logo template once and used it three times on the same page with single line of code!

*ngTemplateOutlet also accepts a context object which can be passed to customize the common template output. For more information about the context object refer to the official docs.

Customizable components:

The second use case for *ngTemplateOutlet is highly customized components. Consider our previous example of <project-content> component with some modifications:

Above is the modified version of <project-content> component which accepts three input properties — headerTemplate, bodyTemplate, footerTemplate.

Following is the snippet for project-content.ts:

What we are trying to achieve here is to show header, body and footer as received from the parent component of <project-content>.

If any one of them is not provided, our component will show the default template in its place. Thus, creating a highly customized component.

To use our recently modified component:

This is how we are going to pass the template refs to our component. If any one of them is not passed then the component will render the default template.

ng-content vs. *ngTemplateOutlet

They both help us to achieve highly customized components but which to choose and when?

It can clearly be seen that *ngTemplateOutlet gives us some more power of showing the default template if none is provided.

This is not the case with ng-content. It renders the content as is. At the maximum you can split the content and render them at different locations of your view with the help of select attribute. You cannot conditionally render the content within ng-content. You have to show the content that is received from the parent with no means to make decisions based on the content.

However, the choice of selecting among the two completely depends on your use case. At least now we have a new weapon *ngTemplateOutlet in our arsenal which provides more control on the content in addition to the features of ng-content!



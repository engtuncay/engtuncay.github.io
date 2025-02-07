
Source : https://wpf-tutorial.com/data-binding/introduction/

[Back](../readme.md)

---

- [9 Data binding](#9-data-binding)
  - [Introduction to WPF data binding](#introduction-to-wpf-data-binding)
  - [Hello, bound world!](#hello-bound-world)
  - [Using the DataContext](#using-the-datacontext)
  - [Data binding via Code-behind](#data-binding-via-code-behind)
  - [The UpdateSourceTrigger property](#the-updatesourcetrigger-property)
  - [Responding to changes](#responding-to-changes)
  - [Value conversion with IValueConverter](#value-conversion-with-ivalueconverter)
  - [The StringFormat property](#the-stringformat-property)
  - [Debugging data bindings](#debugging-data-bindings)


# 9 Data binding

Source : https://wpf-tutorial.com/data-binding/introduction/

## Introduction to WPF data binding

Wikipedia describes the concept of data binding very well: (http://en.wikipedia.org/wiki/Data_binding)

Data binding is general technique that binds two data/information sources together and maintains `synchronization` of data. (it is like `a <=> b` (two way sides equation, a=b and b=a))

With WPF, Microsoft has put data binding in the front seat and once you start learning WPF, you will realize that it's an important aspect of pretty much everything you do. If you come from the world of WinForms, then the huge focus on data binding might scare you a bit, but once you get used to it, you will likely come to love it, as it makes a lot of things cleaner and easier to maintain.

Data binding in WPF is the preferred way to bring data from your code to the UI layer. Sure, you can set properties on a control manually or you can populate a ListBox by adding items to it from a loop, but the cleanest and purest WPF way is to add a binding between the source and the destination UI element.

🔔 Summary

In the next chapter, we'll look into a simple example where data binding is used and after that, we'll talk some more about all the possibilities. The concept of data binding is included pretty early in this tutorial, because it's such an integral part of using WPF, which you will see once you explore the rest of the chapters, where it's used almost all of the time.

However, the more theoretical part of data binding might be too heavy if you just want to get started building a simple WPF application. In that case I suggest that you have a look at the "Hello, bound world!" article to get a glimpse of how data binding works, and then save the rest of the data binding articles for later, when you're ready to get some more theory.

--*TBC - 20250103 - 0903 

## Hello, bound world!
## Using the DataContext
## Data binding via Code-behind
## The UpdateSourceTrigger property
## Responding to changes
## Value conversion with IValueConverter
## The StringFormat property
## Debugging data bindings


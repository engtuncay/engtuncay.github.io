
Source : https://wpf-tutorial.com/data-binding/introduction/

[Back](../readme.md)

---

- [9 Data binding](#9-data-binding)
  - [Introduction to WPF data binding](#introduction-to-wpf-data-binding)
  - [Hello, bound world!](#hello-bound-world)
    - [The syntax of a Binding](#the-syntax-of-a-binding)
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

The more theoretical part of data binding might be too heavy if you just want to get started building a simple WPF application. In that case I suggest that you have a look at the "Hello, bound world!" article to get a glimpse of how data binding works, and then save the rest of the data binding articles for later, when you're ready to get some more theory.

--*TBC - 20250103 - 0903 

## Hello, bound world!

We'll show you how easy it is to use data binding in WPF with a "Hello, bound world!" example.

```xml
<Window x:Class="WpfTutorialSamples.DataBinding.HelloBoundWorldSample"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="HelloBoundWorldSample" Height="110" Width="280">
    <StackPanel Margin="10">
		<TextBox Name="txtValue" />
		<WrapPanel Margin="0,10">
			<TextBlock Text="Value: " FontWeight="Bold" />
			<TextBlock Text="{Binding Path=Text, ElementName=txtValue}" />
		</WrapPanel>
	</StackPanel>
</Window>

```

![A simple data binding between controls](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/data-binding/hello_bound_world.png)

This simple example shows how we bind the value of the TextBlock to match the Text property of the TextBox. As you can see from the screenshot, the TextBlock is automatically updated when you enter text into the TextBox. In a non-bound world, this would require us to listen to an event on the TextBox and then update the TextBlock each time the text changes, but with data binding, this connection can be established just by using markup.

### The syntax of a Binding

All the magic happens between the curly braces, which in XAML encapsulates a Markup Extension. For data binding, we use the Binding extension, which allows us to describe the binding relationship for the Text property. In its most simple form, a binding can look like this:

```cs
{Binding}

```

This simply returns the current data context (more about that later). This can definitely be useful, but in the most common situations, you would want to bind a property to another property on the data context. A binding like that would look like this:

```cs
{Binding Path=NameOfProperty}

```

The Path notes the property that you want to bind to, however, since Path is the default property of a binding, you may leave it out if you want to, like this:

```cs
{Binding NameOfProperty}

```

You will see many different examples, some of them where Path is explicitly defined and some where it's left out. In the end it's really up to you though.

A binding has many other properties though, one of them being the ElementName which we use in our example. This allows us to connect directly to another UI element as the source. Each property that we set in the binding is separated by a comma:

```cs
{Binding Path=Text, ElementName=txtValue}

```

🔔 Summary

This was just a glimpse of all the binding possibilities of WPF. In the next chapters, we'll discover more of them, to show you just how powerful data binding is.

## Using the DataContext

The DataContext property is the default source of your bindings, unless you specifically declare another source, like we did in the previous chapter with the ElementName property. It's defined on the FrameworkElement class, which most UI controls, including the WPF Window, inherits from. Simply put, it allows you to specify a basis for your bindings

There's no default source for the DataContext property (it's simply null from the start), but since a DataContext is inherited down through the control hierarchy, you can set a DataContext for the Window itself and then use it throughout all of the child controls. Let's try illustrating that with a simple example:

```xml
<Window x:Class="WpfTutorialSamples.DataBinding.DataContextSample"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="DataContextSample" Height="130" Width="280">
	<StackPanel Margin="15">
		<WrapPanel>
			<TextBlock Text="Window title:  " />
			<TextBox Text="{Binding Title, UpdateSourceTrigger=PropertyChanged}" Width="150" />
		</WrapPanel>
		<WrapPanel Margin="0,10,0,0">
			<TextBlock Text="Window dimensions: " />
			<TextBox Text="{Binding Width}" Width="50" />
			<TextBlock Text=" x " />
			<TextBox Text="{Binding Height}" Width="50" />
		</WrapPanel>
	</StackPanel>
</Window>

```

```cs
using System;
using System.Windows;

namespace WpfTutorialSamples.DataBinding
{
	public partial class DataContextSample : Window
	{
		public DataContextSample()
		{
			InitializeComponent();
			this.DataContext = this;
		}
	}
}

```

![Several data bindings using the DataContext](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/data-binding/datacontext.png)

The Code-behind for this example only adds one line of interesting code: After the standard InitalizeComponent() call, we assign the "this" reference to the DataContext, which basically just tells the Window that we want itself to be the data context.

In the XAML, we use this fact to bind to several of the Window properties, including Title, Width and Height. Since the window has a DataContext, which is passed down to the child controls, we don't have to define a source on each of the bindings - we just use the values as if they were globally available.

Try running the example and resize the window - you will see that the dimension changes are immediately reflected in the textboxes. You can also try writing a different title in the first textbox, but you might be surprised to see that this change is not reflected immediately. Instead, you have to move the focus to another control before the change is applied. Why? Well, that's the subject for the next chapter.

Summary

Using the DataContext property is like setting the basis of all bindings down through the hierarchy of controls. This saves you the hassle of manually defining a source for each binding, and once you really start using data bindings, you will definitely appreciate the time and typing saved.


However, this doesn't mean that you have to use the same DataContext for all controls within a Window. Since each control has its own DataContext property, you can easily break the chain of inheritance and override the DataContext with a new value. This allows you to do stuff like having a global DataContext on the window and then a more local and specific DataContext on e.g. a panel holding a separate form or something along those lines.

## Data binding via Code-behind

Data binding via Code-behind
As we saw in the previous data binding examples, defining a binding by using XAML is very easy, but for certain cases, you may want to do it from Code-behind instead. This is pretty easy as well and offers the exact same possibilities as when you're using XAML. Let's try the "Hello, bound world" example, but this time create the required binding from Code-behind:

```xml
<Window x:Class="WpfTutorialSamples.DataBinding.CodeBehindBindingsSample"
    xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
    xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
    Title="CodeBehindBindingsSample" Height="110" Width="280">
    <StackPanel Margin="10">
    <TextBox Name="txtValue" />
    <WrapPanel Margin="0,10">
        <TextBlock Text="Value: " FontWeight="Bold" />
        <TextBlock Name="lblValue" />
    </WrapPanel>
    </StackPanel>
</Window>

```

```cs
using System;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;

namespace WpfTutorialSamples.DataBinding
{
    public partial class CodeBehindBindingsSample : Window
    {
    public CodeBehindBindingsSample()
    {
        InitializeComponent();

        Binding binding = new Binding("Text");
        binding.Source = txtValue;
        lblValue.SetBinding(TextBlock.TextProperty, binding);
    }
    }
}

```
![Data binding from Code-behind](https://wpf-tutorial.com/Images/ArticleImages/1/data-binding/hello_bound_world_codebehind.png)

It works by creating a Binding instance. We specify the path we want directly in the constructor, in this case "Text", since we want to bind to the Text property. We then specify a Source, which for this example should be the TextBox control. Now WPF knows that it should use the TextBox as the source control, and that we're specifically looking for the value contained in its Text property.


In the last line, we use the SetBinding method to combine our newly created Binding object with the destination/target control, in this case the TextBlock (lblValue). The SetBinding() method takes two parameters, one that tells which dependency property that we want to bind to, and one that holds the binding object that we wish to use.

Summary

As you can see, creating  bindings in C# code is easy, and perhaps a bit easier to grasp for people new to data bindings, when compared to the syntax used for creating them inline in XAML. Which method you use is up to you though - they both work just fine.

## The UpdateSourceTrigger property


## Responding to changes


## Value conversion with IValueConverter


## The StringFormat property


## Debugging data bindings



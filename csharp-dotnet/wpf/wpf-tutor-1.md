
<h1>The complete WPF tutorial</h1> 

Source : https://wpf-tutorial.com/getting-started/hello-wpf/

[Home](readme.md)

<h2>Contents</h2>  

- [1 About  WPF](#1-about--wpf)
  - [Hello, WPF!](#hello-wpf)
  - [What is XAML?](#what-is-xaml)
- [2 Getting started](#2-getting-started)
- [3 XAML](#3-xaml)
- [4 A WPF application](#4-a-wpf-application)


# 1 About  WPF

What is WPF?
WPF vs. WinForms

## Hello, WPF!

- MainWindow.xaml. This is the applications primary window

```xml
<Window x:Class="WpfApplication1.MainWindow"
    xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
    xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
    Title="MainWindow" Height="350" Width="525">
    <Grid>

    </Grid>
</Window>

```

This is the base XAML that Visual Studio creates for our window, all parts of it explained in the chapters on XAML and "The Window". You can actually run the application now (select Debug -> Start debugging or press F5) to see the empty window that our application currently consists of, but now it's time to get our message on the screen.

We'll do it by adding a TextBlock control to the Grid panel, with our aforementioned message as the content:

```xml
<Window x:Class="WpfApplication1.MainWindow"
    xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
    xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
    Title="MainWindow" Height="350" Width="525">
    <Grid>
        <TextBlock HorizontalAlignment="Center" VerticalAlignment="Center" FontSize="72">
            Hello, WPF!
        </TextBlock>
    </Grid>
</Window>
```

## What is XAML?

XAML, which stands for eXtensible Application Markup Language, is Microsoft's variant of XML for describing a GUI. In previous GUI frameworks, like WinForms, a GUI was created in the same language that you would use for interacting with the GUI, e.g. C# or VB.NET and usually maintained by the designer (e.g.  Visual Studio), but with XAML, Microsoft is going another way. Much like with HTML, you are able to easily write and edit your GUI.

This is not really a XAML tutorial, but I will briefly tell you about how you use it, because it's such an essential part of WPF. Whether you're creating a Window or a Page, it will consist of a XAML document and a CodeBehind file, which together creates the Window/Page. The XAML file describes the interface with all its elements, while the CodeBehind handles all the events and has access to manipulate with the XAML controls.

In the next chapters, we will have a look at how XAML works and how you use it to create your interface.

Basic XAML

In the previous chapter, we talked about what XAML is and what you use it for, but how do you create a control in XAML? As you will see from the next example, creating a control in XAML is as easy as writing it's name, surrounded by angle brackets. For instance, a Button looks like this:

```xml
<Button>

```

XAML tags has to be ended, either by writing the end tag or by putting a forward slash at the end of the start tag:

```xml
<Button></Button>

```

Or

```xml
<Button />

```

A lot of controls allow you to put content between the start and end tags, which is then the content of the control. For instance, the Button control allows you to specify the text shown on it between the start and end tags:

```xml
<Button>A button</Button>

```

HTML is not case-sensitive, but XAML is, because the control name has to correspond to a type in the .NET framework. The same goes for attribute names, which corresponds to the properties of the control. Here's a button where we define a couple of properties by adding attributes to the tag:

```xml
<Button FontWeight="Bold" Content="A button" />

```

We set the FontWeight property, giving us bold text, and then we set the Content property, which is the same as writing the text between the start and end tag. However, all attributes of a control may also be defined like this, where they appear as child tags of the main control, using the Control-Dot-Property notation:

```xml
<Button>
    <Button.FontWeight>Bold</Button.FontWeight>
    <Button.Content>A button</Button.Content>
</Button>

```

The result is exactly the same as above, so in this case, it's all about syntax and nothing else. However, a lot of controls allow content other than text, for instance other controls. Here's an example where we have text in different colors on the same button by using several TextBlock controls inside of the Button:

```xml
<Button>
    <Button.FontWeight>Bold</Button.FontWeight>
    <Button.Content>
        <WrapPanel>
            <TextBlock Foreground="Blue">Multi</TextBlock>
            <TextBlock Foreground="Red">Color</TextBlock>
            <TextBlock>Button</TextBlock>
        </WrapPanel>
    </Button.Content>
</Button>

```

The Content property only allows for a single child element, so we use a WrapPanel to contain the differently colored blocks of text. Panels, like the WrapPanel, plays an important role in WPF and we will discuss them in much more details later on - for now, just consider them as containers for other controls.

➖ Code vs. XAML

Hopefully the above examples show you that XAML is pretty easy to write, but with a lot of different ways of doing it, and if you think that the above example is a lot of markup to get a button with text in different colors, then try comparing it to doing the exact same thing in `C#`:

```xml
Button btn = new Button();
btn.FontWeight = FontWeights.Bold;

WrapPanel pnl = new WrapPanel();

TextBlock txt = new TextBlock();
txt.Text = "Multi";
txt.Foreground = Brushes.Blue;
pnl.Children.Add(txt);

txt = new TextBlock();
txt.Text = "Color";
txt.Foreground = Brushes.Red;
pnl.Children.Add(txt);

txt = new TextBlock();
txt.Text = "Button";
pnl.Children.Add(txt);

btn.Content = pnl;
pnlMain.Children.Add(btn);

```

Of course the above example could be written less explicitly and using more syntactical sugar, but I think the point still stands: XAML is pretty short and concise for describing interfaces.

# 2 Getting started

Visual Studio Community

Hello, WPF!

# 3 XAML

What is XAML?

Basic XAML

Events in XAML

# 4 A WPF application

A WPF Application - Introduction

The Window

Working with App.xaml

Command-line parameters in WPF

Resources

Handling exceptions in WPF

Application Culture / UICulture


[Back](readme.md)


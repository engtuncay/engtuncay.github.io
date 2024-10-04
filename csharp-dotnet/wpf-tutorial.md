
<h1>The complete WPF tutorial</h1> 

Source : https://wpf-tutorial.com/getting-started/hello-wpf/

<h2>Contents</h2>  

- [1 About  WPF](#1-about--wpf)
  - [Hello, WPF!](#hello-wpf)
  - [What is XAML?](#what-is-xaml)
- [2 Getting started](#2-getting-started)
- [3 XAML](#3-xaml)
- [4 A WPF application](#4-a-wpf-application)
- [5 Basic controls](#5-basic-controls)
- [6 Control concepts](#6-control-concepts)
- [7 Panels](#7-panels)
  - [Introduction to WPF panels](#introduction-to-wpf-panels)
  - [The Grid Control](#the-grid-control)
    - [The Grid - Rows \& columns](#the-grid---rows--columns)
    - [The Grid - Units](#the-grid---units)
    - [The Grid - Spanning](#the-grid---spanning)
    - [The GridSplitter](#the-gridsplitter)
    - [Using the Grid: A contact form](#using-the-grid-a-contact-form)
  - [The WrapPanel control](#the-wrappanel-control)
  - [The StackPanel control](#the-stackpanel-control)
  - [The DockPanel control](#the-dockpanel-control)
  - [The Canvas control](#the-canvas-control)
- [8 UserControls \& CustomControls](#8-usercontrols--customcontrols)
- [9 Data binding](#9-data-binding)
- [10 Commands](#10-commands)
- [11 Dialogs](#11-dialogs)
- [12 Common interface controls](#12-common-interface-controls)
- [13 Rich Text controls](#13-rich-text-controls)
- [14 Misc. controls](#14-misc-controls)
  - [The Border control](#the-border-control)
  - [The Slider control](#the-slider-control)
  - [The ProgressBar control](#the-progressbar-control)
  - [The WebBrowser control](#the-webbrowser-control)
  - [The WindowsFormsHost control](#the-windowsformshost-control)
  - [The GroupBox control](#the-groupbox-control)
  - [The Calendar control](#the-calendar-control)
  - [The DatePicker control](#the-datepicker-control)
  - [The Expander control](#the-expander-control)
- [15 The TabControl](#15-the-tabcontrol)
- [16 List controls](#16-list-controls)
- [17 The ListView control](#17-the-listview-control)
- [18 The TreeView control](#18-the-treeview-control)
- [19 The DataGrid control](#19-the-datagrid-control)
- [20 Styles](#20-styles)
- [21 Audio \& Video](#21-audio--video)
- [22 Misc.](#22-misc)
- [23 Creating a Game: SnakeWPF](#23-creating-a-game-snakewpf)
- [The WPF Menu control](#the-wpf-menu-control)
- [Introduction to WPF Rich Text controls](#introduction-to-wpf-rich-text-controls)
- [Using the WPF TabControl](#using-the-wpf-tabcontrol)
- [Multi Items Controls](#multi-items-controls)
  - [The Items Controls](#the-items-controls)
  - [The ListBox control](#the-listbox-control)
  - [The Combobox Control](#the-combobox-control)
- [List View Control](#list-view-control)
- [Tree View Control](#tree-view-control)
- [Data Grid Control](#data-grid-control)


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

Code vs. XAML

Hopefully the above examples show you that XAML is pretty easy to write, but with a lot of different ways of doing it, and if you think that the above example is a lot of markup to get a button with text in different colors, then try comparing it to doing the exact same thing in C#:

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

# 5 Basic controls

The TextBlock control

The TextBlock control - Inline formatting

The Label control

The TextBox control

The Button control

The CheckBox control

The RadioButton control

The PasswordBox control

The Image control

# 6 Control concepts

Control ToolTips

WPF text rendering

Tab Order

Access Keys

# 7 Panels

## Introduction to WPF panels

Source : https://wpf-tutorial.com/panels/introduction-to-wpf-panels/

Panels are one of the most important control types of WPF. They act as containers for other controls and control the  layout of your windows/pages. Since a window can only contain ONE child control, a panel is often used to divide up the space into areas, where each area can contain a control or another panel (which is also a control, of course).

Panels come in several different flavors, with each of them having its own way of dealing with layout and child controls. Picking the right panel is therefore essential to getting the behavior and layout you want, and especially in the start of your WPF career, this can be a difficult job. The next section will describe each of the panels shortly and give you an idea of when to use it. After that, move on to the next chapters, where each of the panels will be described in detail.

- Grid

The Grid is probably the most complex of the panel types. A Grid can contain multiple rows and columns. You define a height for each of the rows and a width for each of the columns, in either an absolute amount of pixels, in a percentage of the available space or as auto, where the row or column will automatically adjust its size depending on the content. Use the Grid when the other panels doesn't do the job, e.g. when you need multiple columns and often in combination with the other panels.

- WrapPanel

The WrapPanel will position each of its child controls next to the other, horizontally (default) or vertically, until there is no more room, where it will wrap to the next line and then continue. Use it when you want a vertical or horizontal list controls that automatically wraps when there's no more room.


- StackPanel
 
The StackPanel acts much like the WrapPanel, but instead of wrapping if the child controls take up too much room, it simply expands itself, if possible. Just like with the WrapPanel, the orientation can be either horizontal or vertical, but instead of adjusting the width or height of the child controls based on the largest item, each item is stretched to take up the full width or height. Use the StackPanel when you want a list of controls that takes up all the available room, without wrapping.

- Canvas

A simple panel, which mimics the WinForms way of doing things. It allows you to assign specific coordinates to each of the child controls, giving you total control of the layout. This is not very flexible though, because you have to manually move the child controls around and make sure that they align the way you want them to. Use it (only) when you want complete control of the child control positions.

- DockPanel

The DockPanel allows you to dock the child controls to the top, bottom, left or right. By default, the last control, if not given a specific dock position, will fill the remaining space. You can achieve the same with the Grid panel, but for the simpler situations, the DockPanel will be easier to use. Use the DockPanel whenever you need to dock one or several controls to one of the sides, like for dividing up the window into specific areas.

- UniformGrid

The UniformGrid is just like the Grid, with the possibility of multiple rows and columns, but with one important difference: All rows and columns will have the same size! Use this when you need the Grid behavior without the need to specify different sizes for the rows and columns.

## The Grid Control

Source : https://wpf-tutorial.com/panels/grid/

The Grid is probably the most complex of the panel types. A Grid can contain multiple rows and columns. You define a height for each of the rows and a width for each of the columns, in either an absolute amount of pixels, in a percentage of the available space or as auto, where the row or column will automatically adjust its size depending on the content. Use the Grid when the other panels doesn't do the job, e.g. when you need multiple columns and often in combination with the other panels.

In its most basic form, the Grid will simply take all of the controls you put into it, stretch them to use the maximum available space and place it on top of each other:

```xml
<Window x:Class="WpfTutorialSamples.Panels.Grid"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="Grid" Height="300" Width="300">
    <Grid>
		<Button>Button 1</Button>
		<Button>Button 2</Button>
	</Grid>
</Window>

```

![A simple Grid](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/panels/grid_simple.png)

As you can see, the last control gets the top position, which in this case means that you can't even see the first button. Not terribly useful for most situations though, so let's try dividing the space, which is what the grid does so well. We do that by using ColumnDefinitions and RowDefinitions. 

In the first example, we'll stick to columns:

```xml
<Window x:Class="WpfTutorialSamples.Panels.Grid"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="Grid" Height="300" Width="300">
    <Grid>
		<Grid.ColumnDefinitions>
			<ColumnDefinition Width="*" />
			<ColumnDefinition Width="*" />
		</Grid.ColumnDefinitions>
		<Button>Button 1</Button>
		<Button Grid.Column="1">Button 2</Button>
	</Grid>
</Window>

```

![](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/panels/grid_two_columns.png)

In this example, we have simply divided the available space into two columns, which will share the space equally, using a "star width" (this will be explained later). On the second button, I use a so-called Attached property to place the button in the second column (0 is the first column, 1 is the second and so on). I could have used this property on the first button as well, but it automatically gets assigned to the first column and the first row, which is exactly what we want here.

As you can see, the controls take up all the available space, which is the default behavior when the grid arranges its child controls. It does this by setting the `HorizontalAlignment and VerticalAlignment` on its child controls to Stretch.

In some situations you may want them to only take up the space they need though and/or control how they are placed in the Grid. The easiest way to do this is to set the HorizontalAlignment and VerticalAlignment directly on the controls you wish to manipulate. Here's a modified version of the above example:

```xml
<Window x:Class="WpfTutorialSamples.Panels.Grid"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="Grid" Height="300" Width="300">
    <Grid>
		<Grid.ColumnDefinitions>
			<ColumnDefinition Width="*" />
			<ColumnDefinition Width="*" />
		</Grid.ColumnDefinitions>		
		<Button VerticalAlignment="Top" HorizontalAlignment="Center">Button 1</Button>
		<Button Grid.Column="1" VerticalAlignment="Center" HorizontalAlignment="Right">Button 2</Button>
	</Grid>
</Window>

```

![text](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/panels/grid_two_columns_alignment.png)


As you can see from the resulting screenshot, the first button is now placed in the top and centered. The second button is placed in the middle, aligned to the right.

### The Grid - Rows & columns

First of all, let's throw in more columns and even some rows, for a true tabular  layout:

```xml
<Window x:Class="WpfTutorialSamples.Panels.TabularGrid"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="TabularGrid" Height="300" Width="300">
    <Grid>
		<Grid.ColumnDefinitions>
			<ColumnDefinition Width="2*" />
			<ColumnDefinition Width="1*" />
			<ColumnDefinition Width="1*" />
		</Grid.ColumnDefinitions>
		<Grid.RowDefinitions>
			<RowDefinition Height="2*" />
			<RowDefinition Height="1*" />
			<RowDefinition Height="1*" />
		</Grid.RowDefinitions>
		<Button>Button 1</Button>
		<Button Grid.Column="1">Button 2</Button>
		<Button Grid.Column="2">Button 3</Button>
		<Button Grid.Row="1">Button 4</Button>
		<Button Grid.Column="1" Grid.Row="1">Button 5</Button>
		<Button Grid.Column="2" Grid.Row="1">Button 6</Button>
		<Button Grid.Row="2">Button 7</Button>
		<Button Grid.Column="1" Grid.Row="2">Button 8</Button>
		<Button Grid.Column="2" Grid.Row="2">Button 9</Button>
	</Grid>
</Window>

```

![text](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/panels/grid_tabular.png)

A total of nine buttons, each placed in their own cell in a grid containing three rows and three columns. We once again use a star based width, but this time we assign a number as well - the first row and the first column has a width of 2*, which basically means that it uses twice the amount of space as the rows and columns with a width of 1* (or just * - that's the same).

You will also notice that I use the Attached properties Grid.Row and Grid.Column to place the controls in the grid, and once again you will notice that I have omitted these properties on the controls where I want to use either the first row or the first column (or both). This is essentially the same as specifying a zero. This saves a bit of typing, but you might prefer to assign them anyway for a better overview - that's totally up to you!

### The Grid - Units

Source : https://wpf-tutorial.com/panels/grid-units/

So far we have mostly used the star width/height, which specifies that a row or a column should take up a certain percentage of the combined space. However, there are two other ways of specifying the width or height of a column or a row: Absolute units and the Auto width/height. Let's try creating a Grid where we mix these:

```xml
<Window x:Class="WpfTutorialSamples.Panels.GridUnits"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="GridUnits" Height="200" Width="400">
	<Grid>
		<Grid.ColumnDefinitions>
			<ColumnDefinition Width="1*" />
			<ColumnDefinition Width="Auto" />
			<ColumnDefinition Width="100" />
		</Grid.ColumnDefinitions>
		<Button>Button 1</Button>
		<Button Grid.Column="1">Button 2 with long text</Button>
		<Button Grid.Column="2">Button 3</Button>
	</Grid>
</Window>

```

![text](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/panels/grid_units_simple.png)

In this example, the first button has a star width, the second one has its width set to Auto and the last one has a static width of 100 pixels.

The result can be seen on the screenshot, where the second button only takes exactly the amount of space it needs to render its longer text, the third button takes exactly the 100 pixels it was promised and the first button, with the variable width, takes the rest.


In a Grid where one or several columns (or rows) have a variable (star) width, they automatically get to share the width/height not already used by the columns/rows which uses an absolute or Auto width/height. This becomes more obvious when we resize the window:

![text](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/panels/grid_units_small.png)

![text](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/panels/grid_units_large.png)

On the first screenshot, you will see that the Grid reserves the space for the last two buttons, even though it means that the first one doesn't get all the space it needs to render properly. On the second screenshot, you will see the last two buttons keeping the exact same amount of space, leaving the surplus space to the first button.

This can be a very useful technique when designing a wide range of dialogs. For instance, consider a simple contact form where the user enters a name, an e-mail address and a comment. The first two fields will usually have a fixed height, while the last one might as well take up as much space as possible, leaving room to type a longer comment. In one of the next chapters, we will try building a contact form, using the grid and rows and columns of different heights and widths.

### The Grid - Spanning

The default Grid behavior is that each control takes up one cell, but sometimes you want a certain control to take up more rows or columns. Fortunately the Grid makes this very easy, with the Attached properties ColumnSpan and RowSpan. The default value for this property is obviously 1, but you can specify a bigger number to make the control span more rows or columns.

Here's a very simple example, where we use the ColumnSpan property:

```xml
<Window x:Class="WpfTutorialSamples.Panels.GridColRowSpan"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="GridColRowSpan" Height="110" Width="300">
	<Grid>
		<Grid.ColumnDefinitions>			
			<ColumnDefinition Width="1*" />
			<ColumnDefinition Width="1*" />
		</Grid.ColumnDefinitions>
		<Grid.RowDefinitions>
			<RowDefinition Height="*" />
			<RowDefinition Height="*" />
		</Grid.RowDefinitions>
		<Button>Button 1</Button>
		<Button Grid.Column="1">Button 2</Button>
		<Button Grid.Row="1" Grid.ColumnSpan="2">Button 3</Button>
	</Grid>
</Window>

```

![text](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/panels/grid_col_span.png)

We just define two columns and two rows, all of them taking up their equal share of the place. The first two buttons just use the columns normally, but with the third button, we make it take up two columns of space on the second row, using the ColumnSpan attribute.

This is all so simple that we could have just used a combination of panels to achieve the same effect, but for just slightly more advanced cases, this is really useful. Let's try something which better shows how powerful this is:

```xml
<Window x:Class="WpfTutorialSamples.Panels.GridColRowSpanAdvanced"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="GridColRowSpanAdvanced" Height="300" Width="300">
    <Grid>
		<Grid.ColumnDefinitions>
			<ColumnDefinition Width="*" />
			<ColumnDefinition Width="*" />
			<ColumnDefinition Width="*" />
		</Grid.ColumnDefinitions>
		<Grid.RowDefinitions>
			<RowDefinition Height="*" />
			<RowDefinition Height="*" />
			<RowDefinition Height="*" />
		</Grid.RowDefinitions>
		<Button Grid.ColumnSpan="2">Button 1</Button>
		<Button Grid.Column="3">Button 2</Button>
		<Button Grid.Row="1">Button 3</Button>
		<Button Grid.Column="1" Grid.Row="1" Grid.RowSpan="2" Grid.ColumnSpan="2">Button 4</Button>
		<Button Grid.Column="0" Grid.Row="2">Button 5</Button>
	</Grid>
</Window>

```

![text](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/panels/grid_col_row_span.png)

With three columns and three rows we would normally have nine cells, but in this example, we use a combination of row and column spanning to fill all the available space with just five buttons. As you can see, a control can span either extra columns, extra rows or in the case of button 4: both.

So as you can see, spanning multiple columns and/or rows in a Grid is very easy. In a later article, we will use the spanning, along with all the other Grid techniques in a more practical example.


### The GridSplitter

Source : https://wpf-tutorial.com/panels/gridsplitter/

As you saw in the previous articles, the Grid panel makes it very easy to divide up the available space into individual cells. Using column and row definitions, you can easily decide how much space each row or column should take up, but what if you want to allow the user to change this? This is where the GridSplitter control comes into play.

The GridSplitter is used simply by adding it to a column or a row in a Grid, with the proper amount of space for it, e.g. 5 pixels. It will then allow the user to drag it from side to side or up and down, while changing the size of the column or row on each of the sides of it. Here's an example:

```xml
<Window x:Class="WpfTutorialSamples.Panels.GridSplitterSample"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="GridSplitterSample" Height="300" Width="300">
    <Grid>
        <Grid.ColumnDefinitions>
            <ColumnDefinition Width="*" />
            <ColumnDefinition Width="5" />
            <ColumnDefinition Width="*" />
        </Grid.ColumnDefinitions>
        <TextBlock FontSize="55" HorizontalAlignment="Center" VerticalAlignment="Center" TextWrapping="Wrap">Left side</TextBlock>
        <GridSplitter Grid.Column="1" Width="5" HorizontalAlignment="Stretch" />
        <TextBlock Grid.Column="2" FontSize="55" HorizontalAlignment="Center" VerticalAlignment="Center" TextWrapping="Wrap">Right side</TextBlock>
    </Grid>
</Window>

```

![text](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/panels/grid_splitter_vertical_centered.png)

![text](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/panels/grid_splitter_vertical_not_centered.png)

As you can see, I've simply created a Grid with two equally wide columns, with a 5 pixel column in the middle. Each of the sides are just a TextBlock control to illustrate the point. As you can see from the screenshots, the GridSplitter is rendered as a dividing line between the two columns and as soon as the mouse is over it, the cursor is changed to reflect that it can be resized.

➖ Horizontal GridSplitter

The GridSplitter is very easy to use and of course it supports horizontal splits as well. In fact, you hardly have to change anything to make it work horizontally instead of vertically, as the next example will show:

```xml
<Window x:Class="WpfTutorialSamples.Panels.GridSplitterHorizontalSample"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="GridSplitterHorizontalSample" Height="300" Width="300">
    <Grid>
        <Grid.RowDefinitions>
            <RowDefinition Height="*" />
            <RowDefinition Height="5" />
            <RowDefinition Height="*" />
        </Grid.RowDefinitions>
        <TextBlock FontSize="55" HorizontalAlignment="Center" VerticalAlignment="Center" TextWrapping="Wrap">Top</TextBlock>
        <GridSplitter Grid.Row="1" Height="5" HorizontalAlignment="Stretch" />
        <TextBlock Grid.Row="2" FontSize="55" HorizontalAlignment="Center" VerticalAlignment="Center" TextWrapping="Wrap">Bottom</TextBlock>
    </Grid>
</Window>

```

![text](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/panels/grid_splitter_horizontal_not_centered.png)

As you can see, I simply changed the columns into rows and on the GridSplitter, I defined a Height instead of a Width. The GridSplitter figures out the rest on its own, but in case it doesn't, you can use the ResizeDirection property on it to force it into either Rows or Columns mode.

### Using the Grid: A contact form

Source : https://wpf-tutorial.com/panels/grid-usage-example-contact-form/

You can read the article above

## The WrapPanel control

## The StackPanel control


## The DockPanel control

## The Canvas control


# 8 UserControls & CustomControls

Source : https://wpf-tutorial.com/usercontrols-and-customcontrols/introduction

Introduction
Creating & using a UserControl

# 9 Data binding

Source : https://wpf-tutorial.com/data-binding/introduction/

Introduction to WPF data binding
Hello, bound world!
Using the DataContext
Data binding via Code-behind
The UpdateSourceTrigger property
Responding to changes
Value conversion with IValueConverter
The StringFormat property
Debugging data bindings

# 10 Commands

Source : https://wpf-tutorial.com/commands/introduction/

Introduction to WPF Commands
Using WPF commands
Implementing a custom WPF Command

# 11 Dialogs

The MessageBox

Source : https://wpf-tutorial.com/dialogs/the-messagebox/

The OpenFileDialog
The SaveFileDialog
The other dialogs
Creating a custom input dialog

# 12 Common interface controls
The WPF Menu control
The WPF ContextMenu
The WPF ToolBar control
The WPF StatusBar control
The Ribbon control

# 13 Rich Text controls
Introduction to WPF Rich Text controls
The FlowDocumentScrollViewer control
The FlowDocumentPageViewer control
The FlowDocumentReader control
Creating a FlowDocument from Code-behind
Advanced FlowDocument content
The RichTextBox control
How-to: Creating a Rich Text Editor

# 14 Misc. controls

## The Border control

Source : https://wpf-tutorial.com/misc-controls/the-border-control/


## The Slider control
## The ProgressBar control
## The WebBrowser control
## The WindowsFormsHost control
## The GroupBox control
## The Calendar control
## The DatePicker control
## The Expander control

# 15 The TabControl
Using the WPF TabControl
WPF TabControl: Tab positions
WPF TabControl: Styling the TabItems

# 16 List controls
The ItemsControl
The ListBox control
The ComboBox control

# 17 The ListView control
Introduction to the ListView control
A simple ListView example
ListView, data binding and ItemTemplate
ListView with a GridView
How-to: ListView with left aligned column names
ListView grouping
ListView sorting
How-to: ListView with column sorting
ListView filtering

# 18 The TreeView control
TreeView introduction
A simple TreeView example
TreeView, data binding and multiple templates
TreeView - Selection/Expansion state
Lazy loading TreeView items

# 19 The DataGrid control
The DataGrid control
DataGrid columns
DataGrid with row details

# 20 Styles
Introduction to WPF styles
Using WPF styles
Trigger, DataTrigger & EventTrigger
WPF MultiTrigger and MultiDataTrigger
Trigger animations

# 21 Audio & Video
Playing audio
Playing video
How-to: Creating a complete Audio/Video player
Speech synthesis (making WPF talk)
Speech recognition (making WPF listen)

# 22 Misc.
The DispatcherTimer
Multi-threading with the BackgroundWorker
Cancelling the BackgroundWorker

# 23 Creating a Game: SnakeWPF
Introduction
Creating the game area
Creating & moving the Snake
Continuous movement with DispatcherTimer
Adding food for the Snake
Controlling the Snake
Collision Detection
Improving SnakeWPF: Making it look more like a game
Improving SnakeWPF: Adding a high score list
Improving SnakeWPF: Adding sound
Full game & final words



# The WPF Menu control

Source : https://wpf-tutorial.com/common-interface-controls/menu-control/

# Introduction to WPF Rich Text controls

Source :  https://wpf-tutorial.com/rich-text-controls/introduction/


# Using the WPF TabControl

Source : https://wpf-tutorial.com/tabcontrol/using-the-tabcontrol/

# Multi Items Controls

## The Items Controls

Source : https://wpf-tutorial.com/list-controls/itemscontrol/

## The ListBox control

Source : https://wpf-tutorial.com/list-controls/listbox-control/

## The Combobox Control

Source : https://wpf-tutorial.com/list-controls/combobox-control/


# List View Control

Source : https://wpf-tutorial.com/listview-control/introduction/

# Tree View Control

Source : https://wpf-tutorial.com/treeview-control/introduction/

# Data Grid Control

Source : https://wpf-tutorial.com/datagrid-control/introduction/

Source : https://wpf-tutorial.com/getting-started/hello-wpf/

[Back](readme.md)

---

**Contents**

- [5 Basic controls](#5-basic-controls)
  - [The TextBlock control](#the-textblock-control)
  - [The TextBlock control - Inline formatting](#the-textblock-control---inline-formatting)
  - [The Label control](#the-label-control)
  - [The TextBox control](#the-textbox-control)
  - [The Button control](#the-button-control)
  - [The CheckBox control](#the-checkbox-control)
  - [The RadioButton control](#the-radiobutton-control)
  - [The PasswordBox control](#the-passwordbox-control)
  - [The Image control](#the-image-control)
- [6 Control concepts](#6-control-concepts)
  - [Control ToolTips](#control-tooltips)
  - [WPF text rendering](#wpf-text-rendering)
  - [Tab Order](#tab-order)
  - [Access Keys](#access-keys)
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
  - [Introduction](#introduction)
  - [Creating \& using a UserControl](#creating--using-a-usercontrol)
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
- [10 Commands](#10-commands)
  - [Introduction to WPF Commands](#introduction-to-wpf-commands)
  - [Using WPF commands](#using-wpf-commands)
  - [Implementing a custom WPF Command](#implementing-a-custom-wpf-command)
- [11 Dialogs](#11-dialogs)
  - [The OpenFileDialog](#the-openfiledialog)
  - [The SaveFileDialog](#the-savefiledialog)
  - [The other dialogs](#the-other-dialogs)
  - [Creating a custom input dialog](#creating-a-custom-input-dialog)
- [12 Common interface controls](#12-common-interface-controls)
  - [The WPF Menu control](#the-wpf-menu-control)
  - [The WPF ContextMenu](#the-wpf-contextmenu)
  - [The WPF ToolBar control](#the-wpf-toolbar-control)
  - [The WPF StatusBar control](#the-wpf-statusbar-control)
  - [The Ribbon control](#the-ribbon-control)
- [13 Rich Text controls](#13-rich-text-controls)
  - [Introduction to WPF Rich Text controls](#introduction-to-wpf-rich-text-controls)
  - [The FlowDocumentScrollViewer control](#the-flowdocumentscrollviewer-control)
  - [The FlowDocumentPageViewer control](#the-flowdocumentpageviewer-control)
  - [The FlowDocumentReader control](#the-flowdocumentreader-control)
  - [Creating a FlowDocument from Code-behind](#creating-a-flowdocument-from-code-behind)
  - [Advanced FlowDocument content](#advanced-flowdocument-content)
  - [The RichTextBox control](#the-richtextbox-control)
  - [How-to: Creating a Rich Text Editor](#how-to-creating-a-rich-text-editor)


# 5 Basic controls



## The TextBlock control

Source : https://wpf-tutorial.com/basic-controls/the-textblock-control/

## The TextBlock control - Inline formatting

## The Label control

## The TextBox control

## The Button control

## The CheckBox control

## The RadioButton control

## The PasswordBox control

## The Image control

# 6 Control concepts

## Control ToolTips

## WPF text rendering

## Tab Order

## Access Keys

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

A total of nine buttons, each placed in their own cell in a grid containing three rows and three columns. We once again use a star based width, but this time we assign a number as well - the first row and the first column has a width of `2*`, which basically means that it uses twice the amount of space as the rows and columns with a width of `1*` (or just * - that's the same).

You will also notice that I use the Attached properties Grid.Row and Grid.Column to place the controls in the grid, and once again you will notice that I have omitted these properties on the controls where I want to use either the first row or the first column (or both). This is essentially the same as specifying a zero. This saves a bit of typing, but you might prefer to assign them anyway for a better overview - that's totally up to you!

### The Grid - Units

Source : https://wpf-tutorial.com/panels/grid-units/

So far we have mostly used the star width/height, which specifies that a row or a column should take up a certain percentage of the combined space. However, there are two other ways of specifying the width or height of a column or a row: `Absolute units and the Auto width/height`. Let's try creating a Grid where we mix these:

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

The default Grid behavior is that each control takes up one cell, but sometimes you want a certain control to take up more rows or columns. Fortunately the Grid makes this very easy, with the attached properties `ColumnSpan and RowSpan`. The default value for this property is obviously 1, but you can specify a bigger number to make the control span more rows or columns.

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

The WrapPanel will position each of its child controls next to the other, `horizontally (default)` or vertically, until there is no more room, where it will wrap to the next line and then continue. Use it when you want a vertical or horizontal list controls that automatically wraps when there's no more room.

When the WrapPanel uses the Horizontal orientation, the child controls will be given the same height, based on the tallest item. When the WrapPanel is the Vertical orientation, the child controls will be given the same width, based on `the widest item`.

In the first example, we'll check out a WrapPanel with the default (Horizontal) orientation:

```xml
<Window x:Class="WpfTutorialSamples.Panels.WrapPanel"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="WrapPanel" Height="300" Width="300">
	<WrapPanel>
		<Button>Test button 1</Button>
		<Button>Test button 2</Button>
		<Button>Test button 3</Button>
		<Button Height="40">Test button 4</Button>
		<Button>Test button 5</Button>
		<Button>Test button 6</Button>
	</WrapPanel>
</Window>

```

![](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/panels/wrappanel_horizontal.png)

Notice how I set a specific height on one of the buttons in the second row. In the resulting screenshot, you will see that this causes the entire row of buttons to have the same height instead of the height required, as seen on the first row. You will also notice that the panel does exactly what the name implies: It wraps the content when it can't fit any more of it in. In this case, the fourth button couldn't fit in on the first line, so it automatically wraps to the next line.


Should you make the window, and thereby the available space, smaller, you will see how the panel immediately adjusts to it:

![text](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/panels/wrappanel_horizontal_smaller.png)

All of this behavior is also true when you set the Orientation to Vertical. Here's the exact same example as before, but with a Vertical WrapPanel:

```xml
<Window x:Class="WpfTutorialSamples.Panels.WrapPanel"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="WrapPanel" Height="120" Width="300">
	<WrapPanel Orientation="Vertical">
		<Button>Test button 1</Button>
		<Button>Test button 2</Button>
		<Button>Test button 3</Button>
		<Button Width="140">Test button 4</Button>
		<Button>Test button 5</Button>
		<Button>Test button 6</Button>
	</WrapPanel>
</Window>

```

![text](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/panels/wrappanel_vertical.png)

You can see how the buttons go vertical instead of horizontal, before they wrap because they reach the bottom of the window. In this case, I gave a wider width to the fourth button, and you will see that the buttons in the same column also gets the same width, just like we saw with the button height in the Horizontal example.

Please be aware that while the Horizontal WrapPanel will match the height in the same row and the Vertical WrapPanel will match the width in the same column, height is not matched in a Vertical WrapPanel and width is not matched in a Horizontal WrapPanel. Take a look in this example, which is the Vertical WrapPanel but where the fourth button gets a custom width AND height:

```xml
<Button Width="140" Height="44">Test button 4</Button>

```

It will look like this:

![text](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/panels/wrappanel_vertical_width_and_height.png)

Notice how button 5 only uses the width - it doesn't care about the height, although it causes the sixth button to be pushed to a new column.

## The StackPanel control



## The DockPanel control

## The Canvas control


# 8 UserControls & CustomControls

Source : https://wpf-tutorial.com/usercontrols-and-customcontrols/introduction

## Introduction

So far in this tutorial, we have only used the built-in controls found in the WPF framework. They will get you a VERY long way, because they are so extremely flexible and can be styled and templated to do almost anything. However, at some point, you will likely benefit from creating your own controls. In other UI frameworks, this can be quite cumbersome, but WPF makes it pretty easy, offering you two ways of accomplishing this task: UserControls and Custom controls.

➖ UserControls

A WPF UserControl inherits the UserControl class and acts very much like a WPF Window: You have a XAML file and a Code-behind file. In the XAML file, you can add existing WPF controls to create the look you want and then combine it with code in the Code-behind file, to achieve the functionality you want. WPF will then allow you to embed this collection of functionality in one or several places in your application, allowing you to easily group and re-use functionality across your application(s).

➖ Custom controls

A Custom control is more low-level than a UserControl. When you create a Custom control, you inherit from an existing class, based on how deep you need to go. In many cases, you can inherit the Control class, which other WPF controls inherits from (e.g. the TextBox), but if you need to go even deeper, you can inherit the FrameworkElement or even the UIElement. The deeper you go, the more control you get and the less functionality is inherited.

The look of the Custom control is usually controlled through styles in a theme file, while the look of the User control will follow the look of the rest of the application. That also highlights one of the major differences between a UserControl and a Custom control: The Custom control can be styled/templated, while a UserControl can't.

➖ Summary

Creating re-usable controls in WPF is very easy, especially if you take the UserControl approach. In the next article, we'll look into just how easy it is to create a UserControl and then use it in your own application.

## Creating & using a UserControl

User controls, in WPF represented by the UserControl class, is the concept of grouping markup and code into a reusable container, so that the same interface, with the same functionality, can be used in several different places and even across several applications.

A user control acts much like a WPF Window - an area where you can place other controls, and then a Code-behind file where you can interact with these controls. The file that contains the user control also ends with .xaml, and the Code-behind ends with .xaml.cs - just like a Window. The starting markup looks a bit different though:

```xml
<UserControl x:Class="WpfTutorialSamples.User_Controls.LimitedInputUserControl"
         xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
         xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
         xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" 
         xmlns:d="http://schemas.microsoft.com/expression/blend/2008" 
         mc:Ignorable="d" 
         d:DesignHeight="300" d:DesignWidth="300">
    <Grid>
        
    </Grid>
</UserControl>

```

Nothing too strange though - a root UserControl element instead of the Window element, and then the DesignHeight and DesignWidth properties, which controls the size of the user control in design-time (in runtime, the size will be decided by the container that holds the user control). You will notice the same thing in Code-behind, where it simply inherits UserControl instead of Window.

➖ Creating a User Control

Add a user control to your project just like you would add another Window, by right-clicking on the project or folder name where you want to add it, as illustrated on this screenshot (things might look a bit different, depending on the version of Visual Studio you're using):

![Add a UserControl to the project](https://wpf-tutorial.com/Images/ArticleImages/1/usercontrols-customcontrols/add_user_control.png)

For this article, we'll be creating a useful User control with the ability to limit the amount of text in a TextBox to a specific number of characters, while showing the user how many characters have been used and how many may be used in total. This is very simple to do, and used in a lot of web applications like Twitter. It would be easy to just add this functionality to your regular Window, but since it could be useful to do in several places in your application, it makes sense to wrap it in an easily reusable UserControl.

Before we dive into the code, let's have a look at the end result that we're going for:

![Limited Input UserControl](https://wpf-tutorial.com/Images/ArticleImages/1/usercontrols-customcontrols/limited_input_sample.png)

Here's the code for the user control itself:

```xml
<UserControl x:Class="WpfTutorialSamples.User_Controls.LimitedInputUserControl"
         xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
         xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
         xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" 
         xmlns:d="http://schemas.microsoft.com/expression/blend/2008" 
         mc:Ignorable="d" 
         d:DesignHeight="300" d:DesignWidth="300">
    <Grid>
    <Grid.RowDefinitions>
        <RowDefinition Height="Auto" />
        <RowDefinition Height="*" />
    </Grid.RowDefinitions>      
    <Grid.ColumnDefinitions>
        <ColumnDefinition Width="*" />
        <ColumnDefinition Width="Auto" />
    </Grid.ColumnDefinitions>
    <Label Content="{Binding Title}" />
    <Label Grid.Column="1">
        <StackPanel Orientation="Horizontal">
        <TextBlock Text="{Binding ElementName=txtLimitedInput, Path=Text.Length}" />
        <TextBlock Text="/" />
        <TextBlock Text="{Binding MaxLength}" />
        </StackPanel>
    </Label>
    <TextBox MaxLength="{Binding MaxLength}" Grid.Row="1" Grid.ColumnSpan="2" Name="txtLimitedInput" ScrollViewer.VerticalScrollBarVisibility="Auto" TextWrapping="Wrap" />
    </Grid>
</UserControl>

```

```cs
using System;
using System.Windows.Controls;

namespace WpfTutorialSamples.User_Controls
{
    public partial class LimitedInputUserControl : UserControl
    {
    public LimitedInputUserControl()
    {
        InitializeComponent();
        this.DataContext = this;
    }

    public string Title { get; set; }

    public int MaxLength { get; set; }
    }
}

```
The markup is pretty straight forward: A Grid, with two columns and two rows. The upper part of the Grid contains two labels, one showing the title and the other one showing the stats. Each of them use data binding for all of the information needed - the Title and MaxLength comes from the Code-behind properties, which we have defined in as regular properties on a regular class.

The current character count is obtained by binding to the Text.Length property directly on the TextBox control, which uses the lower part of the user control. The result can be seen on the screenshot above. Notice that because of all these bindings, we don't need any C# code to update the labels or set the MaxLength property on the TextBox - instead, we just bind directly to the properties.

➖ Consuming/using the User Control

With the above code in place, all we need is to consume (use) the User control within our Window. We'll do that by adding a reference to the namespace the UserControl lives in, in the top of the XAML code of your Window:

`xmlns:uc="clr-namespace:WpfTutorialSamples.User_Controls"`
After that, we can use the uc prefix to add the control to our Window like it was any other WPF control:

`<uc:LimitedInputUserControl Title="Enter title:" MaxLength="30" Height="50" />`
Notice how we use the Title and MaxLength properties directly in the XAML. Here's the full code sample for our window:

```xml
<Window x:Class="WpfTutorialSamples.User_Controls.LimitedInputSample"
    xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
    xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
    xmlns:uc="clr-namespace:WpfTutorialSamples.User_Controls"
    Title="LimitedInputSample" Height="200" Width="300">
    <Grid Margin="10">
    <Grid.RowDefinitions>
        <RowDefinition Height="Auto" />
        <RowDefinition Height="*" />
    </Grid.RowDefinitions>
    
    <uc:LimitedInputUserControl Title="Enter title:" MaxLength="30" Height="50" />
    <uc:LimitedInputUserControl Title="Enter description:" MaxLength="140" Grid.Row="1" />
    
    </Grid>
</Window>

```

With that, we can reuse this entire piece of functionality in a single line of code, as illustrated in this example where we have the limited text input control two times. As already shown, the final result looks like this:

![Limited Input UserControl in action](https://wpf-tutorial.com/Images/ArticleImages/1/usercontrols-customcontrols/limited_input_sample.png)

➖ Summary

Placing commonly used interfaces and functionality in User Controls is highly recommended, and as you can see from the above example, they are very easy to create and use.

# 9 Data binding

Source : https://wpf-tutorial.com/data-binding/introduction/

## Introduction to WPF data binding

Wikipedia describes the concept of data binding very well: (http://en.wikipedia.org/wiki/Data_binding)

Data binding is general technique that binds two data/information sources together and maintains synchronization of data.

With WPF, Microsoft has put data binding in the front seat and once you start learning WPF, you will realize that it's an important aspect of pretty much everything you do. If you come from the world of WinForms, then the huge focus on data binding might scare you a bit, but once you get used to it, you will likely come to love it, as it makes a lot of things cleaner and easier to maintain.

Data binding in WPF is the preferred way to bring data from your code to the UI layer. Sure, you can set properties on a control manually or you can populate a ListBox by adding items to it from a loop, but the cleanest and purest WPF way is to add a binding between the source and the destination UI element.

Summary
In the next chapter, we'll look into a simple example where data binding is used and after that, we'll talk some more about all the possibilities. The concept of data binding is included pretty early in this tutorial, because it's such an integral part of using WPF, which you will see once you explore the rest of the chapters, where it's used almost all of the time.

However, the more theoretical part of data binding might be too heavy if you just want to get started building a simple WPF application. In that case I suggest that you have a look at the "Hello, bound world!" article to get a glimpse of how data binding works, and then save the rest of the data binding articles for later, when you're ready to get some more theory.


## Hello, bound world!
## Using the DataContext
## Data binding via Code-behind
## The UpdateSourceTrigger property
## Responding to changes
## Value conversion with IValueConverter
## The StringFormat property
## Debugging data bindings

# 10 Commands

Source : https://wpf-tutorial.com/commands/introduction/

## Introduction to WPF Commands
## Using WPF commands
## Implementing a custom WPF Command

# 11 Dialogs

The MessageBox

Source : https://wpf-tutorial.com/dialogs/the-messagebox/

## The OpenFileDialog
## The SaveFileDialog
## The other dialogs
## Creating a custom input dialog

# 12 Common interface controls

## The WPF Menu control
## The WPF ContextMenu
## The WPF ToolBar control
## The WPF StatusBar control
## The Ribbon control

# 13 Rich Text controls

## Introduction to WPF Rich Text controls
## The FlowDocumentScrollViewer control
## The FlowDocumentPageViewer control
## The FlowDocumentReader control
## Creating a FlowDocument from Code-behind
## Advanced FlowDocument content
## The RichTextBox control
## How-to: Creating a Rich Text Editor


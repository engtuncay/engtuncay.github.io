
Source : https://wpf-tutorial.com/common-interface-controls/menu-control/

[Back](../readme.md)

---

# 12 Common interface controls

## The WPF Menu control

One of the most common parts of a Windows application is the menu, sometimes referred to as the main menu because only one usually exists in the application. The menu is practical because it offers a lot of options, using only very little space, and even though Microsoft is pushing the Ribbon as a replacement for the good, old menu and toolbars, they definitely still have their place in every good developer's toolbox.

WPF comes with a fine control for creating menus called... Menu. Adding items to it is very simple - you simply add MenuItem elements to it, and each MenuItem can have a range of sub-items, allowing you to create hierarchical menus as you know them from a lot of Windows applications. Let's jump straight to an example where we use the Menu:

A simple WPF Menu sample

```xml
<Window x:Class="WpfTutorialSamples.Common_interface_controls.MenuSample"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="MenuSample" Height="200" Width="200">
    <DockPanel>
        <Menu DockPanel.Dock="Top">
            <MenuItem Header="_File">
                <MenuItem Header="_New" />
                <MenuItem Header="_Open" />
                <MenuItem Header="_Save" />
                <Separator />
                <MenuItem Header="_Exit" />
            </MenuItem>
        </Menu>
        <TextBox AcceptsReturn="True" />
    </DockPanel>
</Window>

```

As in most Windows applications, my menu is placed in the top of the window, but in keeping with the enormous flexibility of WPF, you can actually place a Menu control wherever you like, and in any width or height that you may desire.

I have defined a single top-level item, with 4 child items and a separator. I use the Header property to define the label of the item, and you should notice `the underscore before the first character of each label`. It tells WPF to `use that character as the accelerator key`, which means that the user can press the Alt key followed by the given character, to activate the menu item. This works all the way from the top-level item and down the hierarchy, meaning that in this example I could press Alt, then F and then N, to activate the New item.

🔔 Icons and checkboxes

Two common features of a menu item is the icon, used to more easily identify the menu item and what it does, and the ability to have checkable menu items, which can toggle a specific feature on and off. The WPF MenuItem supports both, and it's very easy to use:

A WPF Menu control with checkable items and icons

```xml
<Window x:Class="WpfTutorialSamples.Common_interface_controls.MenuIconCheckableSample"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="MenuIconCheckableSample" Height="150" Width="300">
    <DockPanel>
        <Menu DockPanel.Dock="Top">
            <MenuItem Header="_File">
                <MenuItem Header="_Exit" />
            </MenuItem>
            <MenuItem Header="_Tools">
                <MenuItem Header="_Manage users">
                    <MenuItem.Icon>
                        <Image Source="/WpfTutorialSamples;component/Images/user.png" />
                    </MenuItem.Icon>
                </MenuItem>
                <MenuItem Header="_Show groups" IsCheckable="True" IsChecked="True" />
            </MenuItem>
        </Menu>
        <TextBox AcceptsReturn="True" />
    </DockPanel>
</Window>

```

For this example I've created a secondary top-level item, where I've added two items: One with an icon defined, using the Icon property with a standard Image control inside of it, and one where we use the IsCheckable property to allow the user to check and uncheck the item. I even used the IsChecked property to have it checked by default. From Code-behind, this is the same property that you can read to know whether a given menu item is checked or not.

### Handling clicks

When the user clicks on a menu item, you will usually want something to happen. The easiest way is to simply add a click event handler to the MenuItem, like this:

```xml
<MenuItem Header="_New" Click="mnuNew_Click" />

```

In Code-behind you will then need to implement the `mnuNew_Click` method, like this:

```cs
private void mnuNew_Click(object sender, RoutedEventArgs e)
{
	MessageBox.Show("New");
}

```

This will suffice for the more simple applications, or when prototyping something, but the WPF way is to use a Command for this.

### Keyboard shortcuts and Commands

You can easily handle the Click event of a menu item like we did above, but the more common approach is to use WPF commands. There's a lot of theory on using and creating commands, so they have their own category of articles here on the site, but for now, I can tell you that they have a couple of advantages when used in WPF, especially in combination with a Menu or a Toolbar.

First of all, they ensure that you can have the same action on a toolbar, a menu and even a context menu, without having to implement the same code in multiple places. They also make the handling of keyboard shortcuts a whole lot easier, because unlike with WinForms, WPF is not listening for keyboard shortcuts automatically if you assign them to e.g. a menu item - you will have to do that manually.

However, when using commands, WPF is all ears and will respond to keyboard shortcuts automatically. The text (Header) of the menu item is also set automatically (although you can overwrite it if needed), and so is the InputGestureText, which shows the user which keyboard shortcut can be used to invoke the specific menu item. Let's jump straight to an example of combining the Menu with WPF commands:

A WPF Menu using commands

```xml
<Window x:Class="WpfTutorialSamples.Common_interface_controls.MenuWithCommandsSample"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="MenuWithCommandsSample" Height="200" Width="300">
    <Window.CommandBindings>
        <CommandBinding Command="New" CanExecute="NewCommand_CanExecute" Executed="NewCommand_Executed" />
    </Window.CommandBindings>
    <DockPanel>
        <Menu DockPanel.Dock="Top">
            <MenuItem Header="_File">
                <MenuItem Command="New" />
                <Separator />
                <MenuItem Header="_Exit" />
            </MenuItem>
            <MenuItem Header="_Edit">
                <MenuItem Command="Cut" />
                <MenuItem Command="Copy" />
                <MenuItem Command="Paste" />
            </MenuItem>
        </Menu>

        <TextBox AcceptsReturn="True" Name="txtEditor" />
    </DockPanel>
</Window>

```

```cs
using System;
using System.Windows;
using System.Windows.Input;

namespace WpfTutorialSamples.Common_interface_controls
{
	public partial class MenuWithCommandsSample : Window
	{
		public MenuWithCommandsSample()
		{
			InitializeComponent();
		}

		private void NewCommand_CanExecute(object sender, CanExecuteRoutedEventArgs e)
		{
			e.CanExecute = true;
		}

		private void NewCommand_Executed(object sender, ExecutedRoutedEventArgs e)
		{
			txtEditor.Text = "";
		}
	}
}

```

It might not be completely obvious, but by using commands, we just got a whole bunch of things for free: Keyboard shortcuts, text and InputGestureText on the items and WPF automatically enables/disables the items depending on the active control and its state. In this case, Cut and Copy are disabled because no text is selected, but Paste is enabled, because my clipboard is not empty!

And because WPF knows how to handle certain commands in combination with certain controls, in this case the Cut/Copy/Paste commands in combination with a text input control, we don't even have to handle their Execute events - they work right out of the box! We do have to handle it for theNew command though, since WPF has no way of guessing what we want it to do when the user activates it. This is done with the CommandBindings of the Window, all explained in detail in the chapter on commands.

🔔 Summary

Working with the WPF Menu control is both easy and fast, making it simple to create even complex menu hierarchies, and when combining it with WPF commands, you get so much functionality for free.

## The WPF ContextMenu



## The WPF ToolBar control

The toolbar is a row of commands, usually sitting right below the main  menu of a standard Windows application. This could in fact be a simple panel with buttons on it, but by using the WPF ToolBar control, you get some extra goodies like automatic overflow handling and the possibility for the end-user to re-position your toolbars.

A WPF ToolBar is usually placed inside of a ToolBarTray control. The ToolBarTray will handle stuff like placement and sizing, and you can have multiple ToolBar controls inside of the ToolBarTray element. Let's try a pretty basic example, to see what it all looks like:

```xml
<Window x:Class="WpfTutorialSamples.Common_interface_controls.ToolbarSample"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="ToolbarSample" Height="200" Width="300">
    <Window.CommandBindings>
        <CommandBinding Command="New" CanExecute="CommonCommandBinding_CanExecute" />
        <CommandBinding Command="Open" CanExecute="CommonCommandBinding_CanExecute" />
        <CommandBinding Command="Save" CanExecute="CommonCommandBinding_CanExecute" />
    </Window.CommandBindings>
    <DockPanel>
        <ToolBarTray DockPanel.Dock="Top">
            <ToolBar>
                <Button Command="New" Content="New" />
                <Button Command="Open" Content="Open" />
                <Button Command="Save" Content="Save" />
            </ToolBar>
            <ToolBar>
                <Button Command="Cut" Content="Cut" />
                <Button Command="Copy" Content="Copy" />
                <Button Command="Paste" Content="Paste" />
            </ToolBar>
        </ToolBarTray>
        <TextBox AcceptsReturn="True" />
    </DockPanel>
</Window>

```

```cs
using System;
using System.Windows;
using System.Windows.Input;

namespace WpfTutorialSamples.Common_interface_controls
{
	public partial class ToolbarSample : Window
	{
		public ToolbarSample()
		{
			InitializeComponent();
		}

		private void CommonCommandBinding_CanExecute(object sender, CanExecuteRoutedEventArgs e)
		{
			e.CanExecute = true;
		}
	}
}

```
A simple WPF ToolBar control
Notice how I use commands for all the buttons. We discussed this in the previous chapter and using commands definitely gives us some advantages. Take a look at the Menu chapter, or the articles on commands, for more information.

In this example, I add a ToolBarTray to the top of the screen, and inside of it, two ToolBar controls. Each contains some buttons and we use commands to give them their behavior. In Code-behind, I make sure to handle the CanExecute event of the first three buttons, since that's not done automatically by WPF, contrary to the Cut, Copy and Paste commands, which WPF is capable of fully handling for us.

Try running the example and place the cursor over the left part of one of the toolbars (the dotted area). If you click and hold your left mouse button, you can now re-position the toolbar, e.g. below the other or even make them switch place.

Images
While text on the toolbar buttons is perfectly okay, the normal approach is to have icons or at least a combination of an icon and a piece of text. Because WPF uses regular Button controls, adding icons to the toolbar items is very easy. Just have a look at this next example, where we do both:

Download & run this example
<Window x:Class="WpfTutorialSamples.Common_interface_controls.ToolbarIconSample"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="ToolbarIconSample" Height="200" Width="300">
    <DockPanel>
        <ToolBarTray DockPanel.Dock="Top">
            <ToolBar>
                <Button Command="Cut" ToolTip="Cut selection to Windows Clipboard.">
                    <Image Source="/WpfTutorialSamples;component/Images/cut.png" />
                </Button>
                <Button Command="Copy" ToolTip="Copy selection to Windows Clipboard.">
                    <Image Source="/WpfTutorialSamples;component/Images/copy.png" />
                </Button>
                <Button Command="Paste" ToolTip="Paste from Windows Clipboard.">
                    <StackPanel Orientation="Horizontal">
                        <Image Source="/WpfTutorialSamples;component/Images/paste.png" />
                        <TextBlock Margin="3,0,0,0">Paste</TextBlock>
                    </StackPanel>
                </Button>
            </ToolBar>
        </ToolBarTray>
        <TextBox AcceptsReturn="True" />
    </DockPanel>
</Window>
A WPF ToolBar with icons
By specifying an Image control as the Content of the first two buttons, they will be icon based instead of text based. On the third button, I combine an Image control and a TextBlock control inside of a StackPanel, to achieve both icon and text on the button, a commonly used technique for buttons which are extra important or with a less obvious icon.

Notice how I've used the ToolTip property on each of the buttons, to add an explanatory text. This is especially important for those buttons with only an icon, because the purpose of the button might not be clear from only looking at the icon. With the ToolTip property, the user can hover the mouse over the button to get a description of what it does, as demonstrated on the screenshot.

Overflow
As already mentioned, a very good reason for using the ToolBar control instead of just a panel of buttons, is the automatic overflow handling. It means that if there's no longer enough room to show all of the buttons on the toolbar, WPF will put them in a menu accessible by clicking on the arrow to the right of the toolbar. You can see how it works on this screenshot, which shows the first example, but with a smaller window, thereby leaving less space for the toolbars:

A WPF ToolBar showing off the overflow functionality
WPF even allows you to decide which items are suitable for overflow hiding and which should always be visible. Usually, when designing a toolbar, some items are less important than the others and some of them you might even want to have in the overflow  menu all the time, no matter if there's space enough or not.


This is where the attached property ToolBar.OverflowMode comes into play. The default value is AsNeeded, which simply means that a toolbar item is put in the overflow menu if there's not enough room for it. You may use Always or Never instead, which does exactly what the names imply: Puts the item in the overflow menu all the time or prevents the item from ever being moved to the overflow menu. Here's an example on how to assign this property:

Download & run this example
<ToolBar>
    <Button Command="Cut" Content="Cut" ToolBar.OverflowMode="Always" />
    <Button Command="Copy" Content="Copy" ToolBar.OverflowMode="AsNeeded" />
    <Button Command="Paste" Content="Paste" ToolBar.OverflowMode="Never" />
</ToolBar>
Position
While the most common position for the toolbar is indeed in the top of the screen, toolbars can also be found in the bottom of the application window or even on the sides. The WPF ToolBar of course supports all of this, and while the bottom placed toolbar is merely a matter of docking to the bottom of the panel instead of the top, a vertical toolbar requires the use of the Orientation property of the ToolBar tray. Allow me to demonstrate with an example:

Download & run this example
<Window x:Class="WpfTutorialSamples.Common_interface_controls.ToolbarPositionSample"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="ToolbarPositionSample" Height="200" Width="300">
	<DockPanel>
		<ToolBarTray DockPanel.Dock="Top">
			<ToolBar>
				<Button Command="Cut" ToolTip="Cut selection to Windows Clipboard.">
					<Image Source="/WpfTutorialSamples;component/Images/cut.png" />
				</Button>
				<Button Command="Copy" ToolTip="Copy selection to Windows Clipboard.">
					<Image Source="/WpfTutorialSamples;component/Images/copy.png" />
				</Button>
				<Button Command="Paste" ToolTip="Paste from Windows Clipboard.">
					<StackPanel Orientation="Horizontal">
						<Image Source="/WpfTutorialSamples;component/Images/paste.png" />
						<TextBlock Margin="3,0,0,0">Paste</TextBlock>
					</StackPanel>
				</Button>
			</ToolBar>
		</ToolBarTray>
		<ToolBarTray DockPanel.Dock="Right" Orientation="Vertical">
			<ToolBar>
				<Button Command="Cut" ToolTip="Cut selection to Windows Clipboard.">
					<Image Source="/WpfTutorialSamples;component/Images/cut.png" />
				</Button>
				<Button Command="Copy" ToolTip="Copy selection to Windows Clipboard.">
					<Image Source="/WpfTutorialSamples;component/Images/copy.png" />
				</Button>
				<Button Command="Paste" ToolTip="Paste from Windows Clipboard.">
					<Image Source="/WpfTutorialSamples;component/Images/paste.png" />
				</Button>
			</ToolBar>
		</ToolBarTray>
		<TextBox AcceptsReturn="True" />
	</DockPanel>
</Window>
WPF ToolBars in various positions
The trick here lies in the combination of the DockPanel.Dock property, that puts the ToolBarTray to the right of the application, and the Orientation property, that changes the orientation from horizontal to vertical. This makes it possible to place toolbars in pretty much any location that you might think of.

Custom controls on the ToolBar
As you have seen on all of the previous examples, we use regular WPF Button controls on the toolbars. This also means that you can place pretty much any other WPF control on the toolbars, with no extra effort. Of course, some controls works better on a toolbar than others, but controls like the ComboBox and TextBox are commonly used on the toolbars in e.g. older versions of Microsoft Office, and you can do the same on your own WPF toolbars.

Another thing introduced in this example is the Separator element, which simply creates a separator between two sets of toolbar items. As you can see from the example, it's very easy to use!

Download & run this example
<Window x:Class="WpfTutorialSamples.Common_interface_controls.ToolbarCustomControlsSample"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="ToolbarCustomControlsSample" Height="200" Width="300">
	<DockPanel>
		<ToolBarTray DockPanel.Dock="Top">
			<ToolBar>
				<Button Command="Cut" ToolTip="Cut selection to Windows Clipboard.">
					<Image Source="/WpfTutorialSamples;component/Images/cut.png" />
				</Button>
				<Button Command="Copy" ToolTip="Copy selection to Windows Clipboard.">
					<Image Source="/WpfTutorialSamples;component/Images/copy.png" />
				</Button>
				<Button Command="Paste" ToolTip="Paste from Windows Clipboard.">
					<StackPanel Orientation="Horizontal">
						<Image Source="/WpfTutorialSamples;component/Images/paste.png" />
						<TextBlock Margin="3,0,0,0">Paste</TextBlock>
					</StackPanel>
				</Button>
				<Separator />
				<Label>Font size:</Label>
				<ComboBox>
					<ComboBoxItem>10</ComboBoxItem>
					<ComboBoxItem IsSelected="True">12</ComboBoxItem>
					<ComboBoxItem>14</ComboBoxItem>
					<ComboBoxItem>16</ComboBoxItem>
				</ComboBox>
			</ToolBar>
		</ToolBarTray>
		<TextBox AcceptsReturn="True" />
	</DockPanel>
</Window>

A WPF ToolBar with custom controls
Summary
Creating interfaces with toolbars is very easy in WPF, with the flexible ToolBar control. You can do things that previously required 3rd party toolbar controls and you can even do it without much extra effort.


## The WPF StatusBar control



## The Ribbon control
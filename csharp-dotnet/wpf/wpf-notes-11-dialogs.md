
Source : https://wpf-tutorial.com/dialogs/the-messagebox/

[Back](../readme.md)

---

- [11 Dialogs](#11-dialogs)
  - [The MessageBox](#the-messagebox)
  - [The OpenFileDialog](#the-openfiledialog)
  - [The SaveFileDialog](#the-savefiledialog)
  - [The other dialogs](#the-other-dialogs)
  - [Creating a custom input dialog](#creating-a-custom-input-dialog)

# 11 Dialogs

## The MessageBox

Source : https://wpf-tutorial.com/dialogs/the-messagebox/

WPF offers several dialogs for your application to utilize, but the simplest one is definitely the MessageBox. Its sole purpose is to show a message to the user, and then offer one or several ways for the user to respond to the message.

The MessageBox is used by calling the static `Show()` method, which can take a range of different parameters, to be able to look and behave the way you want it to. We'll be going through all the various forms in this article, with each variation represented by the `MessageBox.Show()` line and a screenshot of the result. In the end of the article, you can find a complete example which lets you test all the variations.

In its simplest form, the MessageBox just takes a single parameter, which is the message to be displayed:

```cs
MessageBox.Show("Hello, world!");

```

![A simple image](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/dialogs/messagebox_simple.png)

🔔 MessageBox with a title

The above example might be a bit too bare minimum - a title on the window displaying the message would probably help. Fortunately, the second and optional parameter allows us to specify the title:

```cs
MessageBox.Show("Hello, world!", "My App");

```

[A MessageBox with a title](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/dialogs/messagebox_title.png)

🔔 MessageBox with extra buttons

By default, the MessageBox only has the one Ok button, but this can be changed, in case you want to ask your user a question and not just show a piece of information. Also notice how I use multiple lines in this message, by using a line break character (`\n`):

```cs
MessageBox.Show("This MessageBox has extra options.\n\nHello, world?", "My App", MessageBoxButton.YesNoCancel);

```

You control which buttons are displayed by using a value from the MessageBoxButton enumeration - in this case, a Yes, No and Cancel button is included. The following values, which should be self-explanatory, can be used:

- OK
- OKCancel
- YesNoCancel
- YesNo

Now with multiple choices, you need a way to be able to see what the user chose, and fortunately, the `MessageBox.Show()` method always returns a value from the MessageBoxResult enumeration that you can use. Here's an example:

```cs
MessageBoxResult result = MessageBox.Show("Would you like to greet the world with a \"Hello, world\"?", "My App", MessageBoxButton.YesNoCancel);
switch(result)
{
	case MessageBoxResult.Yes:
		MessageBox.Show("Hello to you too!", "My App");
		break;
	case MessageBoxResult.No:
		MessageBox.Show("Oh well, too bad!", "My App");
		break;
	case MessageBoxResult.Cancel:
		MessageBox.Show("Nevermind then...", "My App");
		break;
}

```

By checking the result value of the MessageBox.Show() method, you can now react to the user choice, as seen in the code example as well as on the screenshots.

🔔 MessageBox with an icon

The MessageBox has the ability to show a pre-defined icon to the left of the text message, by using a fourth parameter:

```cs
MessageBox.Show("Hello, world!", "My App", MessageBoxButton.OK, MessageBoxImage.Information);

```

![](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/dialogs/messagebox_icon.png)

Using the `MessageBoxImage` enumeration, you can choose between a range of icons for different situations. Here's the complete list:

- Asterisk
- Error
- Exclamation
- Hand
- Information
- None
- Question
- Stop
- Warning

The names should say a lot about how they look, but feel free to experiment with the various values or have a look at this MSDN article, where each value is explained and even illustrated: http://msdn.microsoft.com/en-us/library/system.windows.messageboximage.aspx

🔔 MessageBox with a default option

The MessageBox will select a button as the default choice, which is then the button invoked in case the user just presses Enter once the dialog is shown. For instance, if you display a MessageBox with a "Yes" and a "No" button, "Yes" will be the default answer. You can change this behavior using a fifth parameter to the MessageBox.Show() method though:

```cs
MessageBox.Show("Hello, world?", "My App", MessageBoxButton.YesNo, MessageBoxImage.Question, MessageBoxResult.No);

```

![A MessageBox with a default option](https://wpf-tutorial.com/Images/ArticleImages/1/chapters/dialogs/messagebox_default_button.png)

Notice on the screenshot how the "No" button is slightly elevated, to visually indicate that it is selected and will be invoked if the Enter or Space button is pressed.

## The OpenFileDialog
## The SaveFileDialog
## The other dialogs
## Creating a custom input dialog




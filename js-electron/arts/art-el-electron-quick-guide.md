
Source : https://dev.to/kiraaziz/electronjs-tutorial-1cb3 , By kiraaziz
on Jun 30, 2023

(some parts may be modified or removed)

[Back](../readme.md)

---

# Contents

- [Contents](#contents)
- [Electron.js Tutorial](#electronjs-tutorial)
  - [1. Introduction to Electron.js](#1-introduction-to-electronjs)
  - [2. Setting Up the Development Environment](#2-setting-up-the-development-environment)
  - [1. Creating a Basic Electron Application](#1-creating-a-basic-electron-application)
  - [4. Working with Main and Renderer Processes](#4-working-with-main-and-renderer-processes)
    - [4.1. Communicating between Main and Renderer Processes](#41-communicating-between-main-and-renderer-processes)
    - [4.2. Running Code in the Main Process](#42-running-code-in-the-main-process)


# Electron.js Tutorial

Welcome to the Electron.js tutorial! In this tutorial, we will learn how to build desktop applications using Electron.js. Electron.js is an open-source framework developed by GitHub that allows you to build cross-platform desktop applications using web technologies such as HTML, CSS, and JavaScript.

Table of Contents
Introduction to Electron.js
Setting Up the Development Environment
Creating a Basic Electron Application
Working with Main and Renderer Processes
Building Native UI Elements
Inter-Process Communication (IPC)
Packaging and Distributing Your Electron Application
Advanced Topics
Using Electron with React
Using Electron with Angular
Using Electron with Vue.js
Adding Electron Plugins
Conclusion
Additional Resources

## 1. Introduction to Electron.js

Electron.js is a framework that allows developers to build desktop applications using web technologies. It combines the Chromium rendering engine and Node.js runtime, enabling developers to leverage the power of web technologies to create cross-platform desktop applications.

➖ Key features of Electron.js:

- Cross-platform: Electron.js applications can be built for Windows, macOS, and Linux operating systems.
- Native capabilities: Electron.js allows you to access native operating system APIs and build applications with native UI elements.
- Easy development workflow: Electron.js simplifies the development process by providing a rich set of APIs and tools.
- Large community and ecosystem: Electron.js has a thriving community and a wide range of libraries and plugins available.

## 2. Setting Up the Development Environment

Before we start building Electron.js applications, we need to set up our development environment. Follow these steps to get started:

- Install Node.js: Electron.js requires Node.js, so make sure you have it installed on your system. You can download Node.js from the official website: https://nodejs.org

- Install a code editor: You can use any code editor of your choice. Some popular options are Visual Studio Code, Atom, and Sublime Text.

- Create a new directory for your Electron.js project: Open your terminal or command prompt and navigate to the desired location. Use the following command to create a new directory:

Initialize a new Node.js project: Inside the project directory, run the following command to initialize a new Node.js project:
This command creates a package.json file that will track the dependencies and settings of your project.

```sh
mkdir electron-app
cd electron-app
npm init -y

```

- Install Electron.js: Run the following command to install Electron.js as a development dependency in your project:

```sh
npm install electron --save-dev

```

Electron.js will be installed locally in your project directory.

Congratulations! You have set up your development environment for building Electron.js applications.

## 1. Creating a Basic Electron Application

In this section, we will create a basic Electron application to display a simple window.

Create a new file named main.js in the root of your project directory.

Open main.js, in your code editor and add the following code:

```js
// Import the Electron module
const { app, BrowserWindow } = require('electron');

// Function to create the main window
function createMainWindow() {
  // Create a new browser window
  const mainWindow = new BrowserWindow();

  // Load an HTML file into the window
  mainWindow.loadFile('index.html');
}

// Event handler for when Electron has finished initialization
app.whenReady().then(createMainWindow);

```

This code imports the necessary modules from Electron and defines a function to create the main window. The `createMainWindow` function creates a new browser window and loads an HTML file called index.html into it. The `app.whenReady().then`(createMainWindow) line ensures that the createMainWindow function is called when Electron has finished initialization.

Create a new file named index.html in the root of your project directory.

Open index.html in your code editor and add the following code:

```html
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Electron App</title>
</head>
<body>
  <h1>Hello, Electron!</h1>
</body>
</html>

```

This is a basic HTML file that contains a `<h1>` heading element.

Open your terminal or command prompt and navigate to your project directory.

Start your Electron application by running the following command:

```sh
npx electron .

```

This command runs Electron using the `main.js` file as the entry point (❗).

You should see a new Electron window displaying the "Hello, Electron!" message.

Congratulations! You have created your first Electron application.

## 4. Working with Main and Renderer Processes

Electron applications consist of two types of processes: `the main process` and `renderer processes`. The main process runs in a Node.js environment and is responsible for managing the lifecycle of the application and interacting with the operating system. Renderer processes run in separate browser-like windows and handle the user interface.

Let's explore how to work with main and renderer processes in Electron.js.

### 4.1. Communicating between Main and Renderer Processes

Electron provides a mechanism called `Inter-Process Communication (IPC)` to enable communication between the main process and renderer processes.

Here's an example of how to send a message from the main process to a renderer process:

Update the createMainWindow function in main.js as follows:

```js
function createMainWindow() {
  const mainWindow = new BrowserWindow();
  mainWindow.loadFile('index.html');

  // Send a message to the renderer process
  mainWindow.webContents.send('message', 'Hello from main process!');
}

```

This code uses the `webContents.send()` method to send a message with the channel name 'message' and the payload 'Hello from main process!' to the renderer process.

Update index.html as follows:

```html
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Electron App</title>
  <script>
    // Receive messages from the main process
    const { ipcRenderer } = require('electron');
    ipcRenderer.on('message', (event, message) => {
      console.log(message); // Output the message to the console
    });
  </script>
</head>
<body>
  <h1>Hello, Electron!</h1>
</body>
</html>

```
This code uses the `ipcRenderer module` to receive messages on the 'message' channel from the main process. The received message is logged to the console.

Restart your Electron application by stopping and re-running the npx electron . command.

Open the developer console (press Ctrl+Shift+I or Cmd+Option+I).

You should see the message 'Hello from main process!' logged to the console.

This example demonstrates how to send a message from the main process to a renderer process using IPC. You can also send messages from renderer processes to the main process using a similar approach.

### 4.2. Running Code in the Main Process

In some cases, you may need to run code in the main process. Electron provides several ways to accomplish this.

Here's an example of running code in the main process:

Update main.js as follows:

```js
function createMainWindow() {
  const mainWindow = new BrowserWindow();
  mainWindow.loadFile('index.html');

  // Execute code in the main process
  mainWindow.webContents.executeJavaScript(`
    console.log('Running code in the main process!');
  `);
}

```

This code uses the `webContents.executeJavaScript()` method to run JavaScript code in the main process. In this case, it logs a message to the console.

Restart your Electron application.

Open the developer console.

You should see the message 'Running code in the main process!' logged to the console.

This example demonstrates how to execute JavaScript code in the main process using `webContents.executeJavaScript()`.

 1. Building Native UI Elements

Electron.js allows you to build desktop applications with native UI elements. This means you can create windows, menus, dialog boxes, and other UI components that match the look and feel of the user's operating system.

Let's explore how to build native UI elements in Electron.js.

5.1. Creating Menu Bar

A common UI element in desktop applications is the menu bar. Electron provides a Menu module to create and customize menu bars.

Here's an example of creating a menu bar:

Update main.js as follows:
   const { app, BrowserWindow, Menu } = require('electron');

   // Create a menu template
   const menuTemplate = [
     {
       label: 'File',
       submenu: [
         {
           label: 'Open',
           click() {
             console.log('Open clicked!');
           }
         },
         {
           label: 'Save',
           click() {
             console.log('Save clicked!');
           }
         },
         {
           label: 'Quit',
           click() {
             app.quit();
           }
         }
       ]
     },
     {
       label: 'Edit',
       submenu: [
         {
           label: 'Cut',
           role: 'cut'
         },
         {
           label: 'Copy',
           role: 'copy'
         },
         {
           label: 'Paste',
           role: 'paste'
         }
       ]
     }
   ];

   // Function to create the main window
   function createMainWindow() {
     const mainWindow = new BrowserWindow();
     mainWindow.loadFile('index.html');

     // Create the menu from the template
     const menu = Menu.buildFromTemplate(menuTemplate);
     Menu.setApplicationMenu(menu);
   }

   app.whenReady().then(createMainWindow);
This code defines a menuTemplate that specifies the structure and behavior of the menu. The menu has two top-level items, "File" and "Edit," each with their respective submenus. The "File" submenu has items with custom

click handlers, and the "Edit" submenu uses built-in roles.

The createMainWindow function creates the main window as before, but it now also creates the menu using Menu.buildFromTemplate() and sets it as the application menu using Menu.setApplicationMenu().

Restart your Electron application.

Click on the "File" menu and explore the submenus and items. When you click on "Open" or "Save," you should see the corresponding messages logged to the console.

Click on the "Edit" menu and try the "Cut," "Copy," and "Paste" items. They should perform the respective actions as expected.

This example demonstrates how to create a menu bar with custom items and built-in roles using Electron's Menu module.

5.2. Displaying Dialog Boxes
Dialog boxes are commonly used to interact with the user and display messages or prompts. Electron provides a dialog module to create and customize dialog boxes.

Here's an example of displaying a dialog box:

Update main.js as follows:
   const { app, BrowserWindow, dialog } = require('electron');

   // Function to create the main window
   function createMainWindow() {
     const mainWindow = new BrowserWindow();
     mainWindow.loadFile('index.html');

     // Show a dialog box
     dialog.showMessageBox(mainWindow, {
       type: 'info',
       title: 'Dialog Box',
       message: 'This is an example dialog box.',
       buttons: ['OK']
     });
   }

   app.whenReady().then(createMainWindow);
This code uses the dialog.showMessageBox() method to display an information dialog box. The dialog box has a title, a message, and an "OK" button.

Restart your Electron application.

The dialog box should appear when the application starts, displaying the specified title and message.

This example demonstrates how to show a dialog box using Electron's dialog module.

6. Inter-Process Communication (IPC)
As mentioned earlier, Electron provides IPC to facilitate communication between the main process and renderer processes. IPC allows you to send messages, transfer data, and trigger actions between different parts of your application.

Let's explore some examples of using IPC in Electron.js.

6.1. Sending Messages from Renderer to Main Process
Here's an example of sending a message from a renderer process to the main process:

Update index.html as follows:
   <!DOCTYPE html>
   <html>
   <head>
     <meta charset="UTF-8">
     <title>Electron App</title>
     <script>
       const { ipcRenderer } = require('electron');

       // Send a message to the main process
       ipcRenderer.send('message', 'Hello from renderer process!');
     </script>
   </head>
   <body>
     <h1>Hello, Electron!</h1>
   </body>
   </html>
This code uses the ipcRenderer.send() method to send a message with the channel name 'message' and the payload 'Hello from renderer process!' to the main process.

Update main.js as follows:
   const { app, BrowserWindow, ipcMain } = require('electron');

   function createMainWindow() {
     const mainWindow = new BrowserWindow();
     mainWindow.loadFile('index.html');
   }

   app.whenReady().then(() => {
     createMainWindow();

     // Handle messages from renderer processes
     ipcMain.on('message', (event, message) => {
       console.log(message); // Output the message to the console


 });
   });
This code adds an event listener to the ipcMain module to handle messages on the 'message' channel from renderer processes. The received message is logged to the console.

Restart your Electron application.

Open the developer console.

You should see the message 'Hello from renderer process!' logged to the console.

This example demonstrates how to send a message from a renderer process to the main process using IPC.

6.2. Sharing Data between Main and Renderer Processes
You can also share data between the main process and renderer processes using IPC. Here's an example:

Update index.html as follows:
   <!DOCTYPE html>
   <html>
   <head>
     <meta charset="UTF-8">
     <title>Electron App</title>
     <script>
       const { ipcRenderer } = require('electron');

       // Send data to the main process
       ipcRenderer.send('data', { name: 'John', age: 30 });
     </script>
   </head>
   <body>
     <h1>Hello, Electron!</h1>
   </body>
   </html>
This code sends an object { name: 'John', age: 30 } to the main process using the 'data' channel.

Update main.js as follows:
   const { app, BrowserWindow, ipcMain } = require('electron');

   function createMainWindow() {
     const mainWindow = new BrowserWindow();
     mainWindow.loadFile('index.html');
   }

   app.whenReady().then(() => {
     createMainWindow();

     // Handle data from renderer processes
     ipcMain.on('data', (event, data) => {
       console.log(data.name); // Output the name to the console
       console.log(data.age); // Output the age to the console
     });
   });
This code adds an event listener to the ipcMain module to handle data on the 'data' channel from renderer processes. The received data is logged to the console.

Restart your Electron application.

Open the developer console.

You should see the name 'John' and age 30 logged to the console.

This example demonstrates how to share data between the main process and renderer processes using IPC.

7. Packaging and Distributing Your Electron Application
Once you have finished developing your Electron application, you can package it into an executable file and distribute it to users. Electron provides several tools to help you package and distribute your application.

Here's an example of packaging and distributing an Electron application using the electron-builder package:

Install the electron-builder package as a development dependency by running the following command in your project directory:
   npm install electron-builder --save-dev
Update package.json to include the necessary scripts for packaging:
   {
     "name": "electron-app",
     "version": "1.0.0",
     "main": "main.js",
     "scripts": {
       "start": "electron .",
       "package": "electron-builder"
     },
     "devDependencies": {
       "electron": "^13.1.7",
       "electron-builder": "^22.13.2"
     }
   }
This code adds a "package" script that runs electron-builder to package the application.

Open your terminal or command prompt and run the following command to package your Electron application:
   npm run package
This command will build your

application for the current platform and generate the packaged files in a dist directory.

You can distribute the packaged files to users by sharing the contents of the dist directory. The exact distribution method will depend on your target platform (e.g., creating an installer, creating an app bundle, or providing a downloadable archive).
Note: The packaging process may vary depending on your specific requirements and target platforms. Make sure to refer to the official documentation and guidelines for packaging and distributing Electron applications.

Congratulations! You have learned how to package and distribute your Electron application using electron-builder.

Conclusion
In this tutorial, you learned the basics of building desktop applications with Electron.js. You learned how to set up a new Electron project, create main and renderer processes, build native UI elements, and use IPC for communication between processes. You also learned how to package and distribute your Electron application.

Electron.js provides a powerful framework for developing cross-platform desktop applications using web technologies. With the knowledge gained from this tutorial, you can continue exploring the rich capabilities of Electron and build even more advanced applications.

Remember to refer to the official Electron.js documentation and resources for more in-depth information and advanced topics. Happy coding!
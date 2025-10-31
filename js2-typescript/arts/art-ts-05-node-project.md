

A Step-by-Step Guide to Setting Up a Node.js Project with TypeScript
Pabath Induwara

5 min read, Feb 10, 2024

Integrating TypeScript with Node.js enhances the development process by improving code readability and maintainability. While it doesn’t increase runtime efficiency, TypeScript’s static typing helps detect errors early, simplifying the management of complex applications.

Prerequisites: Install Node.js and Postman

Before starting, ensure you have Node.js installed on your machine. Download it from the official website: Node.js.

Additionally, for API testing, install Postman. You can download it from the official website: Postman

Step 1: Create a new project folder
Create a new folder for your project and navigate to it using the terminal.

mkdir nodejs-typescript-guide
cd nodejs-typescript-guide

Step 2: Initialize a new Node.js project

Run the following command to initialize a new Node.js project and create a package.json file.

npm init -y
Step 3: Install TypeScript
Install TypeScript as a development dependency:

npm install --save-dev typescript
Step 4: Configure TypeScript
Once TypeScript is installed, you’ll need to create and configure the tsconfig.json file, which is essential for defining compiler options and project settings. To generate a basic tsconfig.json file, execute the command:

npx tsc --init
After initializing the tsconfig.json file, it's time to tailor it to your project's needs. Open the tsconfig.json file and modify it to resemble the configuration below. This example provides a solid foundation for most projects, ensuring strict type-checking, consistent casing in filenames, and compatibility with common module systems:

{
  "compilerOptions": {
    "target": "es2016",
    "module": "commonjs",
    "rootDir": "./src",
    "outDir": "./dist",
    "esModuleInterop": true,
    "forceConsistentCasingInFileNames": true,  
    "strict": true,
    "skipLibCheck": true
  }
}
"target": "es2016":Sets ECMAScript target version for output JavaScript to ES2016.
"module": "commonjs": Use CommonJS module system for module loading compatibility.
"rootDir": "./src": Source files located in ./src directory for compilation.
"outDir": "./dist": Compiled JavaScript output to ./dist directory.
"esModuleInterop": true: Enables compatibility with ES6 module imports.
"forceConsistentCasingInFileNames": true: Ensures case sensitivity in file names.
"strict": true: Enables all strict type-checking options.
"skipLibCheck": true: Skip type checking of declaration files (`.d.ts`).
Step 5: Install Express and @types/express @types/node
Install Express and TypeScript definitions for Express:

npm install express
npm install --save-dev @types/express @types/node
(Optional) Install the touch-cli globally using npm to create files quickly from the command line

npm install touch-cli -g 
Step 6: Create the Project Structure and Initialize the Express Server Without Types
First, create a src folder and inside it, a server.ts file for your project. This file will contain the source code for your Express server.

mkdir src
touch src/server.ts
Open the src/server.ts file and write the initial setup code for an Express server:

// Import the 'express' module
import express from 'express';

// Create an Express application
const app = express();

// Set the port number for the server
const port = 3000;

// Define a route for the root path ('/')
app.get('/', (req, res) => {
  // Send a response to the client
  res.send('Hello, TypeScript + Node.js + Express!');
});

// Start the server and listen on the specified port
app.listen(port, () => {
  // Log a message when the server is successfully running
  console.log(`Server is running on http://localhost:${port}`);
});
Step 7: Update package.json and Run the Project
Modify your package.json file to include TypeScript compilation scripts

"scripts": {
  "start": "node dist/server.js",
  "build": "tsc"
},
The "start" script starts the server using the compiled JavaScript file in the 'dist' directory.
The "build" script builds the TypeScript files to JavaScript using the TypeScript compiler.
Execute the following commands in your terminal to compile the TypeScript code and start your server:

npm run build
npm start
This will work, but the code lacks type annotations. Visit http://localhost:3000 in your browser, and you should see "Hello, TypeScript + Node.js + Express!"

Step 8: Add types gradually
Now, let’s add types incrementally:

// Import the 'express' module along with 'Request' and 'Response' types from express
import express, { Request, Response } from 'express';

// Create an Express application
const app = express();

// Specify the port number for the server
const port: number = 3000;

// Define a route for the root path ('/')
app.get('/', (req: Request, res: Response) => {
  // Send a response to the client
  res.send('Hello, TypeScript + Node.js + Express!');
});

// Start the server and listen on the specified port
app.listen(port, () => {
  // Log a message when the server is successfully running
  console.log(`Server is running on http://localhost:${port}`);
});
Here, we’ve added types for the port variable and the req (Request) and res (Response) parameters in the route handler.

Run the project:

npm run build
npm start

Now, you have types for the port variable. Continue adding types to other parts of your code as needed. This approach allows you to gradually introduce TypeScript into your project.

Step 9: Testing Your Application with Postman

After setting up your application, you can use Postman to send requests to your server and test its responses. This is crucial for ensuring your API behaves as expected.

Open Postman: Launch the Postman application.

Create a New Request: Set up a new request in Postman by specifying the request type GET and the endpoint URL http://localhost:3000
Send the Request: Hit send and view the response from your server.
Analyze the Response: Check the status code, response body, and headers to ensure your API behaves correctly.

Step 10: Understanding the ‘dist’ Folder

The dist folder is the directory where TypeScript transpiles the .ts files into .js files. The dist folder and server.js are generated after running the npm run build command, which compiles the TypeScript code to JavaScript as per the configuration in tsconfig.json. This folder is not directly created or modified by the developer; it's managed through the build process controlled by the TypeScript compiler.

That’s the complete guide to setting up a Node.js project with TypeScript. This setup gives you a strong foundation for building robust and maintainable server-side applications.

Explore the Complete Code

If you’d like to explore the complete codebase , you can find it on GitHub: https://github.com/pabath99/FullStackFables


Creating and Publishing a Node.js Library to npm - Saurabh Pandey

May 9, 2023

Source : https://dextrop.medium.com/creating-and-publishing-a-node-js-library-to-npm-6b541854983e

Node.js is an incredibly popular platform that allows developers to create server-side applications and utilities using JavaScript. One of the reasons for its popularity is the rich ecosystem of libraries available through the npm registry. In this article, we’ll walk you through the process of creating a Node.js library and publishing it to npm. As an example, we’ll create a simple library that can add two numbers together. By the end of this guide, you’ll be able to create, package, and publish your own Node.js libraries with ease.

Prerequisites:

- Basic understanding of JavaScript and Node.js
- Node.js and npm installed on your local machine
- An npm account

➖ Step 1: Create Your Node.js Library

- 1.1: Start by creating a new folder for your Node.js library. Open a terminal and run the following commands:

```
$ mkdir adder-library
$ cd adder-library

```
- 1.2: Initialize a new Node.js package:

```
$ npm init -y

```

- 1.3: Create an index.js file that exports the library's main function:

```js
function add(a, b) {
  return a + b;
}

module.exports = add;

```

➖ Step 2: Set Up Your Package for Publishing

- 2.1: Open your package.json file and add the following fields:

```
description: A brief description of your library.
keywords: An array of relevant keywords to improve the discoverability of your library on npm.
repository: An object containing information about your library's code repository.
bugs: An object containing the URL to your library's issue tracker.
homepage: The URL to your library's homepage or documentation.

```

Here’s an example of a package.json file with these fields:

```
{
  "name": "adder-library",
  "version": "1.0.0",
  "description": "A simple library to add two numbers",
  "main": "index.js",
  "scripts": {
    "test": "echo \"Error: no test specified\" && exit 1"
  },
  "keywords": [
    "adder",
    "addition",
    "math"
  ],
  "repository": {
    "type": "git",
    "url": "https://github.com/<your-username>/adder-library.git"
  },
  "bugs": {
    "url": "https://github.com/<your-username>/adder-library/issues"
  },
  "homepage": "https://github.com/<your-username>/adder-library#readme",
  "author": "<Your Name> <your.email@example.com>",
  "license": "MIT"
}

```

Replace <your-username> with your GitHub username and update the author field with your name and email address.

➖ Step 3: Create an npm Account

Before you can publish your library to npm, you need to have an npm account. If you don’t have one yet, follow these steps:

- 3.1: Go to the npm website (https://www.npmjs.com/) and click on “Sign Up” in the top-right corner.

- 3.2: Fill in the required information, including your username, password, and email address.

- 3.3: Complete the registration process by following the instructions sent to your email.

Step 4: Log in to Your npm Account

4.1: Open your terminal and log in to your npm account by running the following command:

$ npm login
4.2: Enter your npm username, password, and email address when prompted. Once you have successfully logged in, you are ready to publish your library.

Step 5: Publish Your Library to npm

5.1: Ensure that you are inside the project directory (adder-library), then run the following command to publish your library:

$ npm publish
Your library is now published on the npm registry. You can verify this by going to the npm website and searching for your library by its name.

Step 6: Update and Republish Your Library

If you make changes to your library and want to publish a new version, you need to update the version number in your package.json file before publishing. Use semantic versioning (major.minor.patch) to manage your library's version numbers.

6.1: Update the version field in your package.json file:

{
  "name": "adder-library",
  "version": "1.0.1",
  ...
}
6.2: Commit and push your changes to the remote repository (if you have one):

$ git add .
$ git commit -m "Update version to 1.0.1"
$ git push
6.3: Publish the updated library to npm:

$ npm publish
Your updated library is now published on the npm registry with the new version number.

Step 7: Add a License to Your Library

Including a license in your library is important, as it defines the terms under which your code can be used, modified, and distributed. In this example, we’ll use the MIT License.

7.1: Create a new file called LICENSE in your project directory and paste the following text into it:

MIT License
Copyright (c) [year] [Your Full Name]

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
Replace [year] with the current year and [Your Full Name] with your name.

7.2: Commit and push your changes to the remote repository:

$ git add LICENSE
$ git commit -m "Add MIT License"
$ git push
About the Author
Author Name: Saurabh Pandey

Saurabh Pandey is a passionate Software Engineer from India. With years of experience in the industry, Saurabh has honed his skills in various programming languages and technologies, allowing him to effectively lead and contribute to complex projects.

To connect with Saurabh and learn more about his work, you can visit his LinkedIn profile at https://www.linkedin.com/in/dextrop/.

Here are some useful resources to help you learn more about Node.js, npm, and building and publishing libraries:

Node.js Official Website: https://nodejs.org/, The official website of Node.js offers extensive documentation, guides, and resources to help you get started with Node.js development.
npm Official Website: https://www.npmjs.com/, npm is the package manager for Node.js and the world’s largest software registry. The official website provides documentation and resources for using npm to manage packages and publish your libraries.
Node.js Documentation: https://nodejs.org/en/docs/, Official Node.js documentation provides in-depth information on various Node.js features, APIs, and guides.
npm Documentation: https://docs.npmjs.com/, Official npm documentation covers various topics, including creating and publishing packages, managing package dependencies, and working with package scripts and configurations.
Understanding Semantic Versioning: https://semver.org/, This resource helps you understand the semantic versioning specification, which is widely used to manage version numbers for software libraries and packages.
Choosing an Open Source License: https://choosealicense.com/, This resource helps you understand and choose an appropriate open source license for your projects.
GitHub Actions Documentation: https://docs.github.com/en/actions, Official GitHub Actions documentation provides detailed information on how to create and manage workflows, use pre-built actions, and create custom actions.
Creating and Publishing Node.js Modules: https://nodesource.com/blog/eleven-npm-tricks-that-will-knock-your-wombat-socks-off, This article provides a comprehensive guide on creating and publishing Node.js modules using npm, with helpful tips and tricks for managing your projects.
With these resources, you’ll be well-equipped to develop and publish your Node.js libraries, manage your project dependencies, and automate your workflows using GitHub Actions.
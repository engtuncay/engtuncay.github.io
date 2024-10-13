
<h1>How to install Typescript and create a simple webpage by Jaeho Kim</h1> 

Source : https://medium.com/@jaeho.kim/how-to-install-typescript-and-create-a-simple-webpage-cd60371a4bb3

5 min read, Jul 26, 2022

# Install Typescript

There are two ways to install Typescript in your computer.

- using NPM(Node.js Package Manager)

For NPM users, install the type script with the command below.

```sh
> npm install -g typescript

```

- The Visual Studio Plug-in for TypeScript

Visual Studio 2017 and Visual Studio 2015 Update 3 include Typescript by default.

---

# Steps

## 1. Create the folder where you want to create the type script

## 2. Create package.json file with the command below

```sh
> npm init

```

After entering the command, write down the project name and continue press Enter key and typing yes and press enter.(-y argument for fast creation)

The package.json file is created in the working folder.

## 3. install Typescript

```sh
> npm install typescript

```

At the end of the installation, the node_modules folder is created in the working folder and the following is added to the package.json file

```
"dependencies" : {
  "typescript":"^4.7.4"
}
```

## 4. Install a runtime that allows Typescript to run on node

```sh
> npm install ts-node --save-dev

```

When the installation is complete, the following is added to the package.json file, just as you installed the Typescript

```
"devDependencies" : {
  "ts-node":"^10.9.1"
}
```

## 5. Create tsconfig.json in the working folder

Create a file named tsconfig.json and paste the code below.

```js
{
"compilerOptions": {
  "target": "es5",
  "lib": ["dom", "dom.iterable", "esnext"],
  "allowJs": true,
  "skipLibCheck": true,
  "allowSyntheticDefaultImports": true,
  "strict": true,
  "forceConsistentCasingInFileNames": true,
  "noFallthroughCasesInSwitch": true,
  "module": "commonjs",
  "outDir": "dist",
  "rootDir": "src"
},
"include": ["src/**/*"],
"exclude": ["node_modules"]
}

```

A brief description of each command is as follows

- strict: Strictly inspect the type. If false, there is no meaning to use. Typescript.
- include: Specify a folder to compile Typescript files into Javascript
- exclude: Specifying the Javascript Compile Exclusion Folder
- target: Compile Javascript version. It is usually based on es5.
- lib: List of libraries to be included when compiling
- outDir: Path to which compiled Javascript is created
- roodDir: Start Path
- allowJs: Sets whether to include Javascript files when compiling Typescript files. It is useful when applying as Typescript in an existing JavaScript project
- esModuleInterop: Libraries without export default can also be loaded without * as.

## 6. Create a test file

Create an src folder in the working folder and create an index.ts file in it. After that writes this code.

```js
console.log('Hello Typescript')

```

## 7. Complie and Run

It can compile and run the code at the same time by writing it in a script in a package.json file.

```sh
"scripts": {
"start": "tsc && node dist/index.js"
}

```

After entering, enter the following command in the command window and output “Hello Typescript” as shown in the picture.

```sh
> npm start

```

Use the above methods to set up a TypeScript environment and run a simple test. Next, let’s create a simple webpage with TypeScript.


# Create a simple webpage with TypeScript

This time, let’s create a web page that display greeting with user name using TypeScript.

Create index.html and greeter.ts files in the working folder. After that, write these codes in the index.html and greeter.ts files.

- index.html

```html
<!doctype html>
<html>
  <body>
  	<script src="../dist/greeter.js"></script>
  </body>
</html>

```

- greeter.ts

```ts
function greeter(person) {
	return "Hello, " + person;
}

let user = "Joe Kim";

document.body.textContent = greeter(user);

```

As you can see from the code above, it is not much different from JavaScript. We will change this code to Typescript.

greeter.ts (Typescript)

```js
function greeter(person: string) {
	return "Hello, " + person;
}

let user = "Joe Kim";

document.body.textContent = greeter(user);

```

The parameter person has been set to a type string. In this case, the parameter person can now declare only variables of type string. If you declare the number type or the boolean type instead of the string type in person and compile it, the following error will occur.

```
Argument of type 'number' is not assignable to parameter of type 'string'.
```

If you want to use the object as a parameter, you can specify the type using the interface.

```ts
interface Person {  //A
    firstName: string; //B
    lastName: string; //C
}

function greeter(person: Person) { //D
    return "Hello, " + person.firstName + " " + person.lastName;
}

let user = { firstName: "Joe", lastName: "Kim"};

document.body.textContent = greeter(user);

```

- A. Define the type of Person name with interface.

- B. Define the type of firstName with string.

- C. Define the type of lastName with string.

- D. The type used as a parameter uses Person.

After that, you can enter “npm start” command in the command window and run index.html file with web browser. Finally, the screen is displayed as follows.


Conclusion

Unlike JavaScript, TypeScript has a lot of work to be prepared in advance, and there is an inconvenience of not being able to use it immediately and having to compile it. Nevertheless, the reason why people use TypeScripts is that they can easily check errors during the code writing stage and use object-oriented programming, which was not shown in this blog. It is also compatible with languages such as React, Vue.js, and Angular, which are emerging front-end frameworks these days, and many programmers who use them choose TypeScript instead of JavaScript. As such, it is recommended to learn TypeScript that many programmers choose.

Watch Vidoe : https://youtu.be/veLnrUrPW_U
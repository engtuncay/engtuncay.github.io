
<h1>How to Create Your Own TypeScript Library in 2024: A Step-by-Step Guide by Simon Boisset</h1>

Source : https://simonboisset.com/blog/create-typescript-library-tsup (some parts may be modified)

24/07/2024, 4 minutes

**Content**

- [Step 1: Project Initialization](#step-1-project-initialization)
- [Step 2: Installing Dependencies](#step-2-installing-dependencies)
- [Step 3: TypeScript Configuration](#step-3-typescript-configuration)
- [Step 4: tsup Configuration](#step-4-tsup-configuration)
- [Step 5: Vitest Configuration](#step-5-vitest-configuration)
- [Step 6: Updating package.json](#step-6-updating-packagejson)
- [Step 7: Writing Library Code](#step-7-writing-library-code)
- [Step 8: Writing Tests](#step-8-writing-tests)
- [Step 9: Build and Test](#step-9-build-and-test)
- [Step 10: Preparing for Publication](#step-10-preparing-for-publication)
- [Step 11: Publishing to npm](#step-11-publishing-to-npm)
- [Conclusion](#conclusion)


In this tutorial, we'll walk through the process of creating a TypeScript library from scratch. We'll cover project setup, compilation, testing, and publishing. This guide is designed to be accessible for developers with basic knowledge of TypeScript and npm.

# Step 1: Project Initialization

Let's start by creating a new folder for our project and initializing an npm project.


```sh
mkdir my-ts-library
cd my-ts-library
npm init -y
```

This command creates a basic package.json file. We'll modify it later.

# Step 2: Installing Dependencies

Let's install TypeScript and the necessary tools for our project:

```sh
npm install --save-dev typescript tsup vitest

```

- typescript: The TypeScript compiler
- tsup: A build tool for TypeScript
- vitest: A fast test framework

# Step 3: TypeScript Configuration

Create a tsconfig.json file in the project root:

```js
{
  "include": ["src"],
  "exclude": ["**/*.test.ts"],
  "compilerOptions": {
    "module": "esnext",
    "target": "esnext",
    "lib": ["esnext"],
    "declaration": true,
    "strict": true,
    "moduleResolution": "node",
    "skipLibCheck": true,
    "esModuleInterop": true,
    "outDir": "dist",
    "rootDir": "src"
  }
}

```

This configuration tells TypeScript how to compile our code.

# Step 4: tsup Configuration

Create a tsup.config.ts file to configure our build:

```js
import { defineConfig } from "tsup";

export default defineConfig({
  entry: ["src/index.ts"],
  clean: true,
  format: ["cjs", "esm"],
  dts: true,
});

```

This configuration generates CommonJS and ES module builds, as well as TypeScript declaration files.

# Step 5: Vitest Configuration

Create a vitest.config.ts file to configure our tests:

```js
import { defineConfig } from "vitest/config";

export default defineConfig({
  test: {
    globals: true,
    environment: "node",
  },
});

```

# Step 6: Updating package.json

Let's update our package.json with the necessary information:

```js
{
  "name": "my-ts-library",
  "version": "0.1.0",
  "description": "My TypeScript Library",
  "main": "dist/index.js",
  "module": "dist/index.mjs",
  "types": "dist/index.d.ts",
  "files": ["dist"],
  "scripts": {
    "build": "tsup",
    "dev": "tsup --watch",
    "test": "vitest run",
    "test:watch": "vitest"
  },
  "keywords": ["typescript", "library"],
  "author": "Your Name",
  "license": "MIT",
  "repository": {
    "type": "git",
    "url": "https://github.com/your-username/my-ts-library"
  },
  "bugs": {
    "url": "https://github.com/your-username/my-ts-library/issues"
  },
  "homepage": "https://github.com/your-username/my-ts-library#readme"
}

```

# Step 7: Writing Library Code

Create a src folder and an index.ts file inside it:

```sh
mkdir src
touch src/index.ts

```

In `src/index.ts`, let's write a simple function:

```js
export function greet(name: string): string {
  return `Hello, ${name}!`;
}

```

# Step 8: Writing Tests

Create a test file src/index.test.ts:

```js
import { expect, test } from "vitest";
import { greet } from "./index";

test("greet function", () => {
  expect(greet("World")).toBe("Hello, World!");
});

```

# Step 9: Build and Test

Let's run our scripts to build and test our library:

```sh
npm run build
npm test

```

If everything goes well, you should see that the test passes and the build files are generated in the dist folder.

# Step 10: Preparing for Publication

Before publishing, make sure your package.json is up to date with the correct version, description, and other metadata.

# Step 11: Publishing to npm

If you're ready to publish your library to npm, follow these steps:

Create an account on npmjs.com if you don't already have one.

Log in to npm via the terminal:

```sh
npm login

```

➖ Publish your package:

```sh
npm publish

```

Congratulations! You have now created and published your own TypeScript library!

# Conclusion

This tutorial has guided you through the steps of creating a basic TypeScript library. Remember to add documentation, usage examples, and keep your library up to date. Good luck with your future projects!

[Back](../readme.md)

---

# Article Package.json Guide




## Local Dependencies

- Local dependencies are packages that are stored on your local file system rather than being fetched from a remote registry like npm.

- They are useful for development purposes, allowing you to work on multiple packages simultaneously without needing to publish them to a registry.

```json
"dependencies": {
    "oraksoft-ui": "file:../oraksoft-ui"
  }
```

- In this example, the `oraksoft-ui` package is referenced as a local dependency located in the parent directory.
- When you run `npm install` or `yarn install`, the package manager will create a symlink to the local package, allowing you to use it as if it were installed from a remote registry.
- This approach is particularly useful for monorepos or when developing libraries that you want to test in a local project before publishing them.
- Local dependencies can be a powerful tool for managing and developing packages in a more efficient manner during the development process.
- By leveraging local dependencies, you can streamline your development process and maintain better control over your package versions and updates.


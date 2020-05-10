
- [Component](#component)
- [Adding New Component](#adding-new-component)

# Component

- App component is the root component and first door for the app.

```js
class App extends Component {
  render() {
    return (
      <div className="App">
        <h1>Hello, React!</h1>
      </div>
    );
  }
}
```

# Adding New Component

- We create firstComponent.js

```js
// firstComponent.js

class FirstComponent extends Component {
  render() {
    return (
      <div>
        <h1>First Component</h1>
      </div>
    );
  }
}

export default FirstComponent;
```

- We add the new component to the App root component

```js
// App.js
class App extends Component {
  render() {
    return (
      <div className="App">
        <h1>Hello, React!</h1>
        <FirstComponent />
      </div>
    );
  }
}
```

# Prop Usage

- We assign variable to the App components.

```js

// App.js
class App extends Component {
  const propsabit = "ilk prop örneği";

  render() {
    return (
      <div className="App">
        <h1>Hello, React!</h1>
        <FirstComponent ilkprop={propsabit} />
      </div>
    )
  }
}

```



- usage of prop variable in the component

```js
// firstComponent.js

// in jsx
{
  this.props.ilkprop;
}
```

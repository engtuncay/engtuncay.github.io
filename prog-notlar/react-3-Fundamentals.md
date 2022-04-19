




## Analyzing a standard React Project

```js
import './index.css';
// regular js de olmaz, react eklediği bir feature'dır. css dosyasını yükleme yapar.

```

```js
// root react app objesini gösterir, app componenti dom'a render eder.
root.render(<App/>); // render metoduna verilen jsx parametrede React getirdiği bir feature'dır.

```

```
react ve react-dom dependency'ler react library gösterir.

```

```js
import REACT from 'react-dom/client'

// main entry point
ReactDOM.creatteRoot(document.getElementById('root'))

```

**public/index.html**

single html file in a react app. 


**App.js** is a function that returns a jsx 

```js
function App() {
  return (
    <div>
      <h2>Let's get started!</h2>
    </div>
  );
}

export default App;

```

(vid30)

## Introducing Jsx

Jsx is javascript xml.

- Build your own, custom html elements.
- React is all about components

React allows you to create *re-usable* and *reactive* components consisting of HTML and JS (and CSS)

-> Declareative Approach -> Define the desired target state(s) and let React figure out the actual JS Dom instructions.

- imperative appproach : step by step instructions

Example

```js
const para = document.createElement('p');
para.textContent = 'this is also visible';
document.getElementById('root').apppend(para);
```

## Building first 


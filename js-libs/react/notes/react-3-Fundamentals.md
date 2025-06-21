

## React

- Component Driven User Interfaces

- Building interactive & scalale UIs

React is a javascript library for building user interfaces

Html, Css and Js are about building user interfaces as well.

React makes building complex, interactive and reactive user interfaces simple.

(vid25)

React is all about components because all user interfaces in the end are made up of components

**Why Components**

- a) Reusability -> Dont Repeat Yourself

- b) Seperation of concerns -> Dont do too many things in one and same place. (function)

a,b -> split big chunks of code into muliple smaller functions. (small seperated units)

**How is a component built**

React allows you to create reusable and reactive components consisting of Html, Js (and CSS).

-> Declarative Approach -> Define the desired target state(s) and let React figure out the actual JS Dom instructions.

## Build your own custom Html Elements

- creating a new react app, create-react-app tools is used.

- githubda dokumantasyon ve kaynak kodları mevcut.

```
npx create-react-app app-name

```

- Bağımlılıkları indirmek için

```js
yarn 
//or 
npm install
```

- çalıştırmak için

```js
yarn start
//or
npm start
```

Note : create-react-app global olarak kaldırmanız gerekebilir.

```js
yarn global remove create-react-app
//or
npm uninstall -g create-react-app
```

- proje çalışınca script olarak ilk index.js çalıştırılır.

- you cant import css into Js, but React enables it for us.

```js
import './index.css'
```

- you cant html in Js, but react offers it via jsx. App component is rendered by root object of React.

```js
root.render(<App/>); // passing html (jsx) argument
```

- App component import edilmesi gerekir.

```js
import App from './App';
```

- React app için root objesi oluşturulur.

```js
import ReactDOM from 'react-dom/client';

const root = ReactDOM.createRoot(document.getElementById('root'));
```

- App componenti basit bir jsx döndüren bir function.

**App Component**

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


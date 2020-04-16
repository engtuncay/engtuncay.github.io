


# NextJs



## Kurulum

npm ile üç paket kurulur : next, react ve react-dom paketleri

    npm install next react react-dom

node projesi oluşturulur. -y parametresi default bilgilerle package.json dosyası oluşturulur.

    npm init -y

next.js script'leri ekleriz package.json dosyasına.

```js
"scripts": {
    "dev":"next",
    "build":"next build",
    "start":"next start"
}
```

projenin çalıştırılması

    yarn dev

Bundan önce "pages" dizini oluşturulur. Pages klasörüne index.js dosyası oluşturulur.

```js
function HomePage(){
    return <div> Welcome to NextJs </div>
}

export default HomePage

```



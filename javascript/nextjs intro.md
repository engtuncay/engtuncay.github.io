# NextJs

## Kurulum

* npm ile üç paket kurulur : next, react ve react-dom paketleri

        npm install next react react-dom

* node projesi oluşturulur. -y parametresi default bilgilerle package.json dosyası oluşturulur.

        npm init -y

* Package.json dosyasına next.js script'leri ekleriz 

```js
"scripts": {
    "dev":"next",
    "build":"next build",
    "start":"next start"
}
```

* "pages" dizini oluşturulur. Pages klasörüne index.js dosyası oluşturulur.

```js
function HomePage(){
    return <div> Welcome to NextJs </div>
}

export default HomePage
```

* Projenin çalıştırılması

        yarn dev


* About sayfası ekleme

pages klasörüne about.js dosyası ekleriz.

```js
function about(){
    return <div> About Page </div>
}

export default about
```

## Sayfalar Arası Linkleme







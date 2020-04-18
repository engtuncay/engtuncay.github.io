# NextJs'ye Giriş

# Table of Contents

- [NextJs'ye Giriş](#nextjsye-giri%c5%9f)
- [Table of Contents](#table-of-contents)
- [NextJs Nedir](#nextjs-nedir)
- [Kurulum](#kurulum)
- [Next Js Örnekler](#next-js-%c3%96rnekler)
  - [Sayfalar Arası Linkleme](#sayfalar-aras%c4%b1-linkleme)
  - [Component Oluşturma](#component-olu%c5%9fturma)
  - [Master - Detail Uygulaması](#master---detail-uygulamas%c4%b1)
- [Kaynaklar](#kaynaklar)


# NextJs Nedir

# Kurulum

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

# Next Js Örnekler

## Sayfalar Arası Linkleme

```js
// index.js
import Link from 'next/Link'
...
// html alanımıza eklenir
<Link href="/about">
<a>Hakkında</a>
</Link>
```

```js
// about.js
import Link from 'next/Link'
...
// html alanımıza eklenir
<Link href="/">
    <a>Anasayfa</a>
</Link>
```

## Component Oluşturma

* root klasörüne **components** klasörü açarız. içerisine navigation.js oluşturun. navigasyon componentimizi hazırlayacağız.

```js
import Link from 'next/Link'

function Navigation(){
    return <nav> 
            <Link href="/"><a>Anasayfa</a></Link>
            <Link href="/about"><a>Hakkında</a></Link>
    </nav>
}

export default Navigation
```

* index ve about.js dosyalarına navigation tag'imizi ekleriz.

```js
import Navigation from '../components/Navigation'
...
// html alanına
<Navigation/>

```

 
## Master - Detail Uygulaması

* Components klasörüne layout.js dosyası ekleriz.

```js
import Navigation from '../components/Navigation'

function Layout({children}){
    return <div>
        <Navigation/>
        <main>{children}</main>
        <footer>Footer Alanımız</footer>
    </div>
}

export default Layout;
```



# Kaynaklar

* Adem İlter Youtube NextJs Kursu










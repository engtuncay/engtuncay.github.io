
Source : https://chatgpt.com/c/67af92df-e050-800e-8b48-089cf37f7d3d

[Back](../readme.md)

---

package.json ile indirilen paketler nasıl belli bir klasöre kopyalanır ?

# 1. Basit Bir Script ile Kopyalama (Node.js)

package.json içinde bir postinstall veya özel bir script ekleyerek fs modülüyle kütüphaneleri dist klasörüne kopyalayabilirsin.

Örneğin, scripts/copy-deps.js dosyası oluştur:

```js
const fs = require('fs');
const path = require('path');

const modulesToCopy = ['axios', 'lodash']; // Kopyalanacak modüller
const srcDir = path.join(__dirname, '../node_modules');
const destDir = path.join(__dirname, '../dist/libs');

// Klasörü oluştur
if (!fs.existsSync(destDir)) {
    fs.mkdirSync(destDir, { recursive: true });
}

// Modülleri kopyala
modulesToCopy.forEach((mod) => {
    const modPath = path.join(srcDir, mod);
    const destPath = path.join(destDir, mod);
    
    fs.cpSync(modPath, destPath, { recursive: true });
    console.log(`Copied ${mod} to dist/libs`);
});

```

Sonrasında package.json içine şu script'i ekleyebilirsin:

```js
"scripts": {
  "copy-deps": "node scripts/copy-deps.js"
}

```

Ve çalıştırmak için:

```sh
npm run copy-deps

```

# 2. rsync veya cp ile Terminal Üzerinden Kopyalama

Linux/macOS için:

```sh
mkdir -p dist/libs && cp -r node_modules/axios dist/libs/

```

Windows (PowerShell) için:

```sh
New-Item -ItemType Directory -Force dist/libs
Copy-Item -Recurse node_modules/axios dist/libs/

```

# 3. Vite veya Webpack Kullanmak Gerekir mi?

Eğer kütüphaneleri statik olarak (CDN gibi) kullanmayıp build sürecinde toplamak istiyorsan, Vite veya Webpack gibi bir paketleyici işini kolaylaştırabilir. Ama sadece dosya kopyalama için fazla ağır kaçabilir.

Özet: Basit bir Node.js scripti veya cp/rsync gibi terminal komutları, işini daha verimli şekilde halledebilir.
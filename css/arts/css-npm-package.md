
- [pnpm ile CSS paketi yayınlama:](#pnpm-ile-css-paketi-yayınlama)
- [Yerelde test:](#yerelde-test)
- [package.json script'lerinde pnpm:](#packagejson-scriptlerinde-pnpm)
- [pnpm'in avantajları CSS paketleri için:](#pnpmin-avantajları-css-paketleri-için)
- [Workspace örneği (birden fazla CSS paketi):](#workspace-örneği-birden-fazla-css-paketi)


engtuncay: css paketimi npm de sunabilir miyim

GitHub Copilot: Evet — CSS paketinizi npm'de yayınlayabilirsiniz. Kısa adımlar ve örneklerle:

1) Paket yapısı oluşturun: derlenmiş CSS (örn. dist/styles.css), README, package.json, lisans.
2) package.json içinde "name", "version", "license", ve alıcıların doğrudan kullanması için "style" veya "module" alanını ekleyin.
3) .npmignore veya "files" ile hangi dosyaların yayınlanacağını kontrol edin.
4) npm login -> npm publish (scoped paketler için --access public).
5) Yayınlamadan önce npm pack ile .tgz oluşturup yerelde test edin.

Örnek package.json:

````json
{
  "name": "tunc-css-demo",
  "version": "1.0.0",
  "description": "Basit bir CSS dağıtımı",
  "main": "dist/styles.css",
  "style": "dist/styles.css",
  "keywords": [
    "css",
    "ui",
    "styles"
  ],
  "author": "Adınız <you@example.com>",
  "license": "MIT",
  "files": [
    "dist/",
    "README.md"
  ],
  "scripts": {
    "build": "postcss src/*.css -d dist/",
    "prepublishOnly": "npm run build"
  },
  "devDependencies": {
    "postcss-cli": "^10.0.0",
    "autoprefixer": "^10.0.0"
  }
}
````

Örnek .npmignore:
````text
src/
.vscode/
node_modules/
*.log
````

Yayınlama (PowerShell/CMD):
````bash
# giriş yap
npm login

# paket sürümünü artır (opsiyonel)
npm version patch

# scoped paket ise:
npm publish --access public

# scope yoksa:
npm publish
````

Yerelde test:
````bash
# paket dosyası oluştur
npm pack

# başka bir projede .tgz'yi kurarak test et
npm install ../tunc-css-demo-1.0.0.tgz
````

Dikkat etmeniz gerekenler:
- Paket isminin benzersiz olması gerekir.
- Scoped paket (örn. @kullanici/isim) yapıyorsanız public erişim belirtin.
- Lisans ve telif haklarına dikkat edin (başkalarının CSS'lerini izinsiz yayımlamayın).

İsterseniz package.json'ınızı veya dosya yapınızı buraya yapıştırın; ben doğrudan düzenlemeler veya öneriler yaparım.

engtuncay: pnpm ile de yapabiliriz değil mi

GitHub Copilot: Evet, kesinlikle! pnpm ile de CSS paketinizi yayınlayabilirsiniz. pnpm, npm registry'sini kullandığı için komutlar çok benzer:

## pnpm ile CSS paketi yayınlama:

````bash
# giriş yap
pnpm login

# paket sürümünü artır (opsiyonel)
pnpm version patch

# yayınla
pnpm publish

# scoped paket ise:
pnpm publish --access public
````

## Yerelde test:

````bash
# paket dosyası oluştur
pnpm pack

# başka bir projede test et
pnpm add ../tunc-css-demo-1.0.0.tgz
````

## package.json script'lerinde pnpm:

````json
{
  "scripts": {
    "build": "postcss src/*.css -d dist/",
    "prepublishOnly": "pnpm run build",
    "test:pack": "pnpm pack",
    "dev": "pnpm run build --watch"
  },
  "packageManager": "pnpm@8.0.0"
}
````

## pnpm'in avantajları CSS paketleri için:

- **Daha hızlı kurulum**: Bağımlılık yönetimi daha verimli
- **Disk tasarrufu**: Hard link kullanımı
- **Workspace desteği**: Monorepo'larda CSS paketlerini yönetmek için ideal
- **Strict mode**: Phantom dependencies'i önler

## Workspace örneği (birden fazla CSS paketi):

````yaml
packages:
  - 'packages/*'
  - 'css-themes/*'
````

````json
{
  "name": "@tunc/base-styles",
  "version": "1.0.0",
  "main": "dist/base.css"
}
````

pnpm, npm ile %100 uyumlu olduğu için tüm npm registry işlemleri aynı şekilde çalışır. Sadece komutlarda `npm` yerine `pnpm` kullanıyorsunuz.
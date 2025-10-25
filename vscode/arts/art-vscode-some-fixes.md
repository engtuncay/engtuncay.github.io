
- [Çözüm Özeti:](#çözüm-özeti)
- [Sorunun Açıklaması:](#sorunun-açıklaması)
  - [Önceki Durum:](#önceki-durum)
  - [Düzeltilmiş Durum:](#düzeltilmiş-durum)
  - [VS Code Uzantı Kuralları:](#vs-code-uzantı-kuralları)

engtuncay: cannot find module vscode , hatası veriyor

GitHub Copilot: VS Code uzantı geliştirmede "cannot find module vscode" hatası yaygın bir sorundur. Bu hatayı çözmek için birkaç adım takip edelim.

Önce mevcut durumu kontrol etmek için package.json dosyasını ve proje yapısını inceleyelim: 

Read [](file:///y%3A/devrepo-oraksoft-web/tunc-web-demo/js/vscode-extension/ex1/package.json)

Şimdi `extension.ts` dosyasını kontrol edelim: 

Read [](file:///y%3A/devrepo-oraksoft-web/tunc-web-demo/js/vscode-extension/ex1/src/extension.ts)

tsconfig.json dosyasını da kontrol edelim: 

Read [](file:///y%3A/devrepo-oraksoft-web/tunc-web-demo/js/vscode-extension/ex1/tsconfig.json)

Şimdi node_modules klasörünün ve gerekli bağımlılıkların yüklü olup olmadığını kontrol edelim: 

Ran terminal command: ls node_modules

`@types/vscode` paketinin doğru yüklendiğini kontrol edelim: 

Ran terminal command: ls node_modules/@types

Şimdi mevcut hatalar varsa bunları kontrol edelim: 

Checked workspace, 3 problems found in [](file:///y%3A/devrepo-oraksoft-web/tunc-web-demo/js/vscode-extension/ex1/src/extension.ts), [](file:///y%3A/devrepo-oraksoft-web/tunc-web-demo/js/vscode-extension/ex1/tsconfig.json)

Problemleri çözelim. İlk olarak tsconfig.json dosyasını güncelleyelim - eksik olan bazı TypeScript ayarlarını ekleyelim: 

Using "Replace String in File"


```

```
Şimdi bağımlılıkları yeniden yükleyelim: 

Ran terminal command: pnpm install

VS Code'un TypeScript dilinin sunucusunu yeniden başlatalım: 

Running command `TypeScript Server'ı yeniden başlat`

Şimdi projeyi derleyelim: 

Ran terminal command: pnpm run compile

Şimdi hataları tekrar kontrol edelim: 

Checked workspace, no problems found

Mükemmel! "Cannot find module vscode" hatası çözüldü. Sorun aşağıdaki nedenlerdendi:

## Çözüm Özeti:

1. **TypeScript konfigürasyonu eksikti**: tsconfig.json dosyasında eksik olan önemli ayarlar vardı:
   - `moduleResolution`: Node.js modül çözümlemesi için gerekli
   - `esModuleInterop`: ES modül uyumluluğu için
   - `forceConsistentCasingInFileNames`: Farklı işletim sistemlerindeki dosya adı tutarlılığı için
   - `allowSyntheticDefaultImports`: Default import'lar için
   - `skipLibCheck`: Tip kontrolünü hızlandırmak için

2. **TypeScript server yenilenmesi**: VS Code'un TypeScript sunucusunu yeniden başlatmak konfigürasyon değişikliklerinin algılanmasını sağladı.

Artık VS Code uzantınız düzgün şekilde çalışmalı. package.json dosyasında tanımlanan `tnt1.helloWorld` komutunu test edebilirsiniz, ancak extension.ts dosyasında komut adının `tnt1.helloWorldTnt` olarak farklı tanımlandığını fark ettim. Bunu da düzeltmek isterseniz söyleyin.

Made changes.

engtuncay: run/debug yaptığım registerCommand değişiyor neden

GitHub Copilot: Bu durumu anlamak için önce package.json ve extension.ts dosyalarındaki komut tanımlarını karşılaştıralım: 

Read [](file:///y%3A/devrepo-oraksoft-web/tunc-web-demo/js/vscode-extension/ex1/package.json#10-10), lines 10 to 30

Read [](file:///y%3A/devrepo-oraksoft-web/tunc-web-demo/js/vscode-extension/ex1/src/extension.ts#13-13), lines 13 to 23

İşte sorunun kaynağını buldum! package.json ve extension.ts dosyalarındaki komut isimleri eşleşmiyor:

- **package.json**: `tnt1.helloWorld`
- **extension.ts**: `tnt1.helloWorldTnt`

VS Code uzantılarında, package.json dosyasındaki `contributes.commands` bölümünde tanımlanan komut ismi ile extension.ts dosyasındaki `registerCommand` fonksiyonunda kullanılan komut ismi **tam olarak aynı** olmalıdır.

Bu tutarsızlığı düzeltelim. extension.ts dosyasındaki komut ismini package.json'daki ile eşleşecek şekilde değiştirelim: 

Using "Replace String in File"


```

```
Şimdi projeyi yeniden derleyelim: 

Ran terminal command: pnpm run compile

## Sorunun Açıklaması:

**"registerCommand değişiyor" sorununuzun nedeni**, package.json ve extension.ts dosyalarındaki komut isimlerinin eşleşmemesiydi:

### Önceki Durum:
- package.json: `"command": "tnt1.helloWorld"`
- extension.ts: `vscode.commands.registerCommand('tnt1.helloWorldTnt', ...)`

### Düzeltilmiş Durum:
- package.json: `"command": "tnt1.helloWorld"`  
- extension.ts: `vscode.commands.registerCommand('tnt1.helloWorld', ...)`

### VS Code Uzantı Kuralları:

1. **Komut Tanımı**: package.json dosyasının `contributes.commands` bölümünde komut tanımlanır
2. **Komut Uygulaması**: extension.ts dosyasında `registerCommand` ile komutun implementasyonu yazılır
3. **İsim Eşleşmesi**: Bu iki yerdeki komut isimleri **birebir aynı** olmalıdır

Artık uzantınızı debug/run ettiğinizde komut düzgün çalışacaktır. Command Palette'te (Ctrl+Shift+P) "Hello World" yazarak komutunuzu test edebilirsiniz.

Made changes.
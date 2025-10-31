

Tabii! Önce global olarak güncelleyelim ve sonra `orak-env-change` komutunu test edelim: 

Ran terminal command: 

pnpm install -g .

Global install çalışmamış gibi görünüyor. Direkt node ile çalıştıralım: 

Ran terminal command: 

node bin/orak-env-change.js --help

Harika! Help mesajı çalışıyor. Şimdi dev ortamını test edelim: 

Ran terminal command: 

node bin/orak-env-change.js dev


Önce mevcut global paketleri kontrol edelim: 

Ran terminal command: 

pnpm list -g | findstr oraksoft

Eski versiyon (0.0.2) yüklü. Önce eski versiyonu kaldıralım ve yeni versiyonu yükleyelim: 

Ran terminal command: 

pnpm uninstall -g oraksoft-node-tools

Şimdi yeni versiyonu yükleyelim: 

Ran terminal command: 

pnpm install -g .

Global yükleme tamamlandı. Şimdi komutları test edelim: 

Ran terminal command: 

pnpm list -g | findstr oraksoft

Paket listede görünmüyor. Farklı bir yaklaşım deneyelim. PNPM'in global binary path'ini kontrol edelim: 

Ran terminal command: 

pnpm bin -g

Global bin klasörünü kontrol edelim: 

Ran terminal command: 

dir "C:\Users\yzmtuncay\AppData\Local\pnpm" | findstr orak

Direkt global install yerine pnpm link kullanalım: 

Ran terminal command: pnpm link

Şimdi komutları test edelim: 

Ran terminal command: orak-env-change --help

Şimdi yeni değişiklikleri tekrar link edelim: 

Ran terminal command: pnpm link

Made changes.

# Introduction to Node Js

[TOC]
- [Introduction to Node Js](#introduction-to-node-js)
- [Bölüm 8 Node Paket Yöneticisi (NPM)](#b%c3%b6l%c3%bcm-8-node-paket-y%c3%b6neticisi-npm)
  - [45 Paket Nedir](#45-paket-nedir)
  - [46 Paket Yükleme ve Kullanma](#46-paket-y%c3%bckleme-ve-kullanma)
  - [47 Yerel ve Global Paketler](#47-yerel-ve-global-paketler)
  - [48  package.json ve güncelleme işlemleri](#48-packagejson-ve-g%c3%bcncelleme-i%c5%9flemleri)
  - [49 Bağımlılık Yönetimi](#49-ba%c4%9f%c4%b1ml%c4%b1l%c4%b1k-y%c3%b6netimi)
  - [50 Script Tanımlama](#50-script-tan%c4%b1mlama)
  - [51 Paket Kaldırma](#51-paket-kald%c4%b1rma)
- [Bölüm 12 - Express Framework](#b%c3%b6l%c3%bcm-12---express-framework)
  - [66 Express Nedir](#66-express-nedir)
  - [67 Merhabe Express](#67-merhabe-express)
  - [68 Pug: Pug Nedir](#68-pug-pug-nedir)
  - [69-76 Pug Konular](#69-76-pug-konular)
  - [77 Express Statik Klasör Belirleme](#77-express-statik-klas%c3%b6r-belirleme)
  - [](#)

Node ile js dosyasını çalıştırma

    node app


# Bölüm 8 Node Paket Yöneticisi (NPM)

## 45 Paket Nedir


## 46 Paket Yükleme ve Kullanma


## 47 Yerel ve Global Paketler



## 48  package.json ve güncelleme işlemleri

package.json dosyasını detaylı (tanımlamaları teker teker sorar) oluşturmak için kullanılacak komut :

npm init

---

varsayılan tanımlı package.json oluşturacak komut:

    npm init -y 

---

Örnek modül kurulumu (lokal olarak module klasörümüze ekler)

    npm install nodemailer --save

Kurulan modüller package json da dependencies anahtarında bir obje ile tutulur.

    "dependencies" : { "module":"versiyon" , ... }

---

bağımlılıkları kurmak için komut :

    npm install

---

belli bir versiyonda kurmak için :

    npm install underscore@1.8.2

---

son versiyonlarını listelemek için

    npm outdated

---

son versiyona güncellemek için

    npm update underscore

---

tamamını güncelemek için

    npm update

---

## 49 Bağımlılık Yönetimi

canlı ortamda (production) kullanmayıp , geliştirme  (development) ortamında kullanmak için

    npm install gulp --save-dev

Geliştirme ortamı modülleri devDependencies anahtarının objesine tanımlanır.

Not: Canlı ortamında kurmak için komut

    npm install gulp --save



## 50 Script Tanımlama

    npm init -y 

ile başlangıç package.json dosyası oluşturulur.

---

package.json da scripts alanına aşapıdaki anahtar eklenir.

    "start" : "node app"

Bu komutu çalıştırmak için aşağıdaki komutu yazarız.

    npm run start 

## 51 Paket Kaldırma

Paket kaldırma komutu

    npm uninstall mongoose

Hem node_modules dizininden hem de package.json dosyasındaki tanımını kaldırır

---
Aynı şekilde global paketleri de kaldırabiliriz.

- global paketleri listelemek için

        npm list -g --depth=0

- Kaldırmak için

        npm uninstall -g gtop 

---

package json dosyasından tanımını kaldırmasını istemezsek

    node uninstall mongoose --no-save

---

**Ek Note**

Çoklu paket kurulumu

    npm install nodemailer underscore --save 

---

# Bölüm 12 - Express Framework

## 66 Express Nedir

## 67 Merhabe Express

## 68 Pug: Pug Nedir

## 69-76 Pug Konular

## 77 Express Statik Klasör Belirleme

## 

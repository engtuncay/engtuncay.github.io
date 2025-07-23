
- [install pnpm](#install-pnpm)
- [uninstall](#uninstall)
- [where installation locations](#where-installation-locations)


# pnpm ile temel komutlar

GitHub Copilot: # PNPM Temel Komutları

## Kurulum ve Başlangıç

### Proje başlatma
````bash
# Yeni bir package.json oluştur
pnpm init

# TypeScript projesi için
pnpm create next-app@latest my-app
pnpm create react-app my-app
````

## Paket Yönetimi

### Paket kurma
````bash
# Üretim bağımlılığı olarak kur
pnpm add express
pnpm add react react-dom

# Geliştirme bağımlılığı olarak kur
pnpm add -D typescript @types/node
pnpm add --save-dev eslint prettier

# Belirli versiyon kur
pnpm add lodash@4.17.21

# Global kurulum
pnpm add -g typescript
````

### Paket kaldırma
````bash
# Paketi kaldır
pnpm remove express
pnpm rm lodash

# Global paketi kaldır
pnpm remove -g typescript
````

### Paket güncelleme
````bash
# Tüm paketleri güncelle
pnpm update

# Belirli paketi güncelle
pnpm update react

# En son versiyonlara güncelle
pnpm update --latest
````

## Bağımlılık Kurulumu

````bash
# package.json'daki tüm bağımlılıkları kur
pnpm install
pnpm i

# Sadece üretim bağımlılıklarını kur
pnpm install --prod

# node_modules'ü temizleyip yeniden kur
pnpm install --frozen-lockfile
````

## Script Çalıştırma

````bash
# package.json'daki scripti çalıştır
pnpm run dev
pnpm run build
pnpm run test

# Script kısayolu (run kelimesi olmadan)
pnpm dev
pnpm build
pnpm test

# Birden fazla script paralel çalıştır
pnpm run build && pnpm run start
````

## Workspace Komutları

````bash
# Workspace'teki tüm paketleri kur
pnpm install

# Belirli workspace'te komut çalıştır
pnpm --filter my-app dev
pnpm --filter @myorg/utils build

# Tüm workspace'lerde komut çalıştır
pnpm -r run build
pnpm --recursive test
````

## Bilgi ve Listeleme

````bash
# Kurulu paketleri listele
pnpm list
pnpm ls

# Global paketleri listele
pnpm list -g

# Paket bilgilerini göster
pnpm info react
pnpm view express

# Outdated paketleri göster
pnpm outdated
````

## Cache ve Temizlik

````bash
# Cache'i temizle
pnpm store prune

# node_modules'ü sil ve yeniden kur
rm -rf node_modules pnpm-lock.yaml
pnpm install

# Store durumunu kontrol et
pnpm store status
````

## Örnek Kullanım Senaryosu

````bash
# 1. Yeni React projesi oluştur
pnpm create react-app my-project
cd my-project

# 2. Geliştirme bağımlılıkları ekle
pnpm add -D eslint prettier husky

# 3. UI kütüphanesi ekle
pnpm add @mui/material @emotion/react @emotion/styled

# 4. Projeyi çalıştır
pnpm start

# 5. Build al
pnpm run build
````

## Faydalı Flagler

- `--save-exact`: Tam versiyon numarası ile kaydet
- `--save-peer`: Peer dependency olarak ekle
- `--ignore-scripts`: Post-install scriptlerini çalıştırma
- `--frozen-lockfile`: Lock dosyasını değiştirme
- `--prefer-offline`: Önce cache'ten kontrol et

## install pnpm

```sh
npm install -g pnpm

```

## uninstall

```sh
npm rm -g pnpm

```

## where installation locations

```sh
where pnpm

```
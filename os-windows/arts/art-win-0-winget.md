<h2>Winget Guide</h2>

[Back](../readme.md)

# Contents

- [Contents](#contents)
- [Windows Winget Kullanımı](#windows-winget-kullanımı)
- [Güncellenebilir Uygulamaları Listeleme](#güncellenebilir-uygulamaları-listeleme)
- [Temel Komutlar](#temel-komutlar)
  - [1. Winget Kurulu mu Kontrol Etme](#1-winget-kurulu-mu-kontrol-etme)
  - [2. Uygulama Arama](#2-uygulama-arama)
  - [3. Uygulama Yükleme](#3-uygulama-yükleme)
  - [4. Yüklü Uygulamaları Listeleme](#4-yüklü-uygulamaları-listeleme)
  - [5. Uygulama Güncelleme](#5-uygulama-güncelleme)
  - [6. Uygulama Kaldırma](#6-uygulama-kaldırma)
- [Ekstra Bilgiler](#ekstra-bilgiler)
- [Winget ile yüklü uygulamalardan d ile başlayanlar](#winget-ile-yüklü-uygulamalardan-d-ile-başlayanlar)
- [Belirli Bir Yazılımı Güncelleme](#belirli-bir-yazılımı-güncelleme)
- [winget in powershell or in cmd and using admin rights](#winget-in-powershell-or-in-cmd-and-using-admin-rights)
- [Örnek Uygulamalar](#örnek-uygulamalar)
  - [ImageMagick](#imagemagick)


[🔝](#contents)

# Windows Winget Kullanımı

> **Winget** (Windows Package Manager), Windows 10 ve üzeri sürümlerde kullanılabilen, komut satırı tabanlı bir paket yöneticisidir. Yazılım yükleme, güncelleme, kaldırma ve arama işlemlerini kolaylaştırır.

# Güncellenebilir Uygulamaları Listeleme

Bilgisayarında yüklü olup yeni versiyonu çıkan uygulamaları listelemek için şu komutu kullanabilirsin:

```powershell
winget upgrade
```

Bu komut, güncellenebilir tüm uygulamaları ve mevcut/yeni sürüm bilgilerini gösterir.

# Temel Komutlar

## 1. Winget Kurulu mu Kontrol Etme

```powershell
winget --version
```

## 2. Uygulama Arama

```powershell
winget search <uygulama-adı>
# Örnek:
winget search vscode
```

## 3. Uygulama Yükleme

```powershell
winget install <paket-adı>
# Örnek:
winget install Microsoft.VisualStudioCode
```

## 4. Yüklü Uygulamaları Listeleme

```powershell
winget list
```

## 5. Uygulama Güncelleme

```powershell
winget upgrade <paket-adı>
# Tüm güncellemeleri yapmak için:
winget upgrade --all
```

➖ Powershell güncelleme

```sh
winget upgrade --id Microsoft.PowerShell

```

## 6. Uygulama Kaldırma

```powershell
winget uninstall <paket-adı>
```

# Ekstra Bilgiler

- Winget ile yüklenebilecek paketlerin tam listesi için: [winget-pkgs](https://github.com/microsoft/winget-pkgs)
- Komutlar PowerShell veya Komut İstemi'nde çalıştırılabilir.
- Daha fazla bilgi için: [Microsoft Docs - Winget](https://learn.microsoft.com/tr-tr/windows/package-manager/winget/)


# Winget ile yüklü uygulamalardan d ile başlayanlar

winget ile yüklü uygulamalardan "d" harfi ile başlayanları listelemek için şu komutu kullanabilirsin:

```powershell
winget list | findstr /i "^d"
```

# Belirli Bir Yazılımı Güncelleme

İstediğin bir yazılımı güncellemek için aşağıdaki komutu kullanabilirsin:

```powershell
winget upgrade <paket-adı>
# Örnek:
winget upgrade Microsoft.VisualStudioCode
```

Bu komut, belirttiğin paketi en son sürüme günceller. Paket adını öğrenmek için `winget list` komutunu kullanabilirsin.

```powershell
  winget list | findstr /i "^d"
```

Bu komut, yüklü uygulama listesini alır ve satır başı "d" ile başlayanları filtreler. İstersen bu bilgiyi markdown dosyana da ekleyebilirim. Eklememi ister misin?

# winget in powershell or in cmd and using admin rights

winget hem PowerShell hem de CMD'de çalışır, ikisi arasında fark yok.winget hem PowerShell hem de CMD'de çalışır, ikisi arasında fark yok.

Yönetici yetkisi konusunda ise şöyle:

Çoğu kurulum için gerekmez — winget kendi kullanıcı scope'unda kurabilir
Sistem genelinde kurulum istiyorsan (--scope machine) yönetici gerekir
Bazı uygulamalar zaten kendi installer'larında yönetici ister, winget bunu otomatik UAC ile halleder — terminal'i yönetici açmasan bile UAC penceresi çıkar

Pratik öneri: Normal kullanıcı PowerShell'de aç, yeterli. Bir şey hata verirse o zaman yönetici olarak aç.

# Örnek Uygulamalar

## ImageMagick

magick cli komutu yükler. imajları resolution'u değiştirir.

```sh
winget install --id ImageMagick.ImageMagick -e
```

💡 Örnek komut

```
magick convert favicon.svg -resize 32x32 favicon.ico

```
## Güncellenebilir Uygulamaları Listeleme

Bilgisayarında yüklü olup yeni versiyonu çıkan uygulamaları listelemek için şu komutu kullanabilirsin:

```powershell
winget upgrade
```

Bu komut, güncellenebilir tüm uygulamaları ve mevcut/yeni sürüm bilgilerini gösterir.

# Windows Winget Kullanımı

> **Winget** (Windows Package Manager), Windows 10 ve üzeri sürümlerde kullanılabilen, komut satırı tabanlı bir paket yöneticisidir. Yazılım yükleme, güncelleme, kaldırma ve arama işlemlerini kolaylaştırır.

## Temel Komutlar

### 1. Winget Kurulu mu Kontrol Etme

```powershell
winget --version
```

### 2. Uygulama Arama

```powershell
winget search <uygulama-adı>
# Örnek:
winget search vscode
```

### 3. Uygulama Yükleme

```powershell
winget install <paket-adı>
# Örnek:
winget install Microsoft.VisualStudioCode
```

### 4. Yüklü Uygulamaları Listeleme

```powershell
winget list
```

### 5. Uygulama Güncelleme

```powershell
winget upgrade <paket-adı>
# Tüm güncellemeleri yapmak için:
winget upgrade --all
```

### 6. Uygulama Kaldırma

```powershell
winget uninstall <paket-adı>
```

## Ekstra Bilgiler

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

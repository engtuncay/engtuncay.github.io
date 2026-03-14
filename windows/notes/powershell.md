

➖ powershell ile command terminal arasındaki fark nedir ? command'da bat kullanıyoruz, powershell'de karşılığı nedir

GitHub Copilot: Command Prompt (cmd) ve PowerShell, Windows’ta komut çalıştırmak için kullanılan iki farklı terminal uygulamasıdır. Temel farklar:

- Command Prompt (cmd): Daha eski, temel komutlar ve toplu iş dosyaları (.bat/.cmd) için kullanılır. Sadece metin tabanlı komutları ve basit scriptleri çalıştırır.

- PowerShell: Daha modern, nesne tabanlıdır ve gelişmiş otomasyon, sistem yönetimi için tasarlanmıştır. .ps1 uzantılı PowerShell scriptlerini çalıştırır ve cmdlet’ler ile çok daha fazla fonksiyon sunar.

BAT dosyalarının PowerShell karşılığı genellikle .ps1 dosyalarıdır. PowerShell’de BAT dosyasındaki komutların çoğu çalışır, ancak bazı komutların PowerShell’e özgü karşılıkları vardır. Örneğin:

BAT (cmd):

```
echo Merhaba Dünya
dir
set VAR=deger
```

PowerShell:
```
Write-Output "Merhaba Dünya"
Get-ChildItem
$VAR = "deger"
```

PowerShell’de BAT dosyasını doğrudan çalıştırmak için:
```
.\dosyaadi.bat
```
veya
```
Start-Process dosyaadi.bat
```

Kısaca: BAT dosyaları cmd için, PS1 dosyaları PowerShell için uygundur. PowerShell, cmd komutlarının çoğunu destekler ama daha gelişmiş ve farklı bir sözdizimine sahiptir.

## Powershell Genel Komutlar

PowerShell (.ps1) scriptlerinde sıkça kullanılan temel komutlara bazı örnekler:

- Dosya ve klasör işlemleri:
  - Get-ChildItem (klasör içeriğini listele)
  - Copy-Item (dosya/kopyalama)
  - Move-Item (dosya/taşıma)
  - Remove-Item (dosya/silme)
  - New-Item (yeni dosya/klasör oluşturma)

- Değişken tanımlama:
  - $isim = "değer"

- Ekrana yazdırma:
  - Write-Output "Merhaba"
  - Write-Host "Merhaba"

- Koşul ve döngü:
  - if ($a -eq $b) { ... }
  - foreach ($item in $liste) { ... }

- Komut çalıştırma:
  - Start-Process "notepad.exe"
  - & "C:\yol\script.bat"

- Servis ve işlem yönetimi:
  - Get-Service
  - Start-Service
  - Stop-Process

- Sistem bilgisi:
  - Get-Process
  - Get-Date
  - Get-Content "dosya.txt" (dosya okuma)

- Modül yükleme:
  - Import-Module ModülAdı

Kısa örnek:
```powershell
# Dosya listesini al
$dosyalar = Get-ChildItem "C:\Temp"

# Her dosyanın adını yazdır
foreach ($dosya in $dosyalar) {
    Write-Output $dosya.Name
}
```

Daha fazla örnek istersen, belirli bir işlem için örnek komutlar da sunabilirim.

User: bu temel komutların hepsine örnek verebilir misin 

GitHub Copilot: Elbette! Aşağıda PowerShell’de sık kullanılan temel komutların her birine kısa örnekler bulabilirsin:

1. Klasör içeriğini listele:
```powershell
Get-ChildItem "C:\Temp"
```

2. Dosya kopyala:
```powershell
Copy-Item "C:\Temp\dosya.txt" "C:\Backup\dosya.txt"
```

3. Dosya/klasör taşı:
```powershell
Move-Item "C:\Temp\dosya.txt" "C:\Backup\dosya.txt"
```

4. Dosya/klasör sil:
```powershell
Remove-Item "C:\Temp\dosya.txt"
```

5. Yeni dosya/klasör oluştur:
```powershell
New-Item -Path "C:\Temp\yeni.txt" -ItemType File
New-Item -Path "C:\Temp\YeniKlasor" -ItemType Directory
```

6. Değişken tanımla:
```powershell
$isim = "Ali"
```

7. Ekrana yazdır:
```powershell
Write-Output "Merhaba"
Write-Host "Merhaba"
```

8. Koşul:
```powershell
$a = 5
$b = 5
if ($a -eq $b) {
    Write-Output "Eşit"
}
```

9. Döngü:
```powershell
$liste = 1..5
foreach ($item in $liste) {
    Write-Output $item
}
```

10. Komut çalıştır:
```powershell
Start-Process "notepad.exe"
& "C:\Temp\script.bat"
```

11. Servisleri listele:
```powershell
Get-Service
```

12. Servis başlat:
```powershell
Start-Service -Name "wuauserv"
```

13. İşlem sonlandır:
```powershell
Stop-Process -Name "notepad"
```

14. Sistem bilgisi (işlem listesi):
```powershell
Get-Process
```

15. Tarih al:
```powershell
Get-Date
```

16. Dosya içeriğini oku:
```powershell
Get-Content "C:\Temp\dosya.txt"
```

17. Modül yükle:
```powershell
Import-Module Az
```

Her komutun başında kısa bir açıklama da ekledim. Belirli bir komutun daha detaylı örneğini istersen, ayrıca yardımcı olabilirim!

User: koşul ve döngü için de örnek ver

GitHub Copilot: Tabii, PowerShell’de koşul ve döngü örnekleri:

Koşul (if-else):
```powershell
$a = 10
if ($a -gt 5) {
    Write-Output "a, 5'ten büyük"
} else {
    Write-Output "a, 5 veya daha küçük"
}
```

Döngü (foreach):
```powershell
$liste = @("elma", "armut", "muz")
foreach ($meyve in $liste) {
    Write-Output $meyve
}
```

Döngü (for):
```powershell
for ($i = 1; $i -le 5; $i++) {
    Write-Output $i
}
```

Döngü (while):
```powershell
$sayi = 1
while ($sayi -le 3) {
    Write-Output $sayi
    $sayi++
}
```

Bu örneklerle PowerShell’de temel koşul ve döngü yapısını görebilirsin. Başka bir örnek istersen belirtmen yeterli!

User: kullanıcıdan prompt nasıl alınır

GitHub Copilot: PowerShell’de kullanıcıdan veri almak için Read-Host komutu kullanılır. Örnek:

```powershell
$isim = Read-Host "Lütfen adınızı girin"
Write-Output "Merhaba, $isim"
```

Bu komut, ekrana bir mesaj gösterir ve kullanıcının girdiği değeri $isim değişkenine atar. Şifre gibi gizli giriş için:

```powershell
$sifre = Read-Host "Şifrenizi girin" -AsSecureString
```

Kısacası, Read-Host ile kullanıcıdan kolayca veri alabilirsin.Kısacası, Read-Host ile kullanıcıdan kolayca veri alabilirsin.


# exe dosyayı start ile çalıştırmanın farkı nedir

PowerShell’de bir exe dosyasını doğrudan (ör: entegre.exe) çalıştırmak ile Start-Process komutunu kullanmak arasında bazı farklar vardır:

1. Doğrudan çalıştırma:
- Script, exe dosyasını başlatır ve exe kapanana kadar script bekler.
- Çıktı doğrudan PowerShell’e gelir.
- Örnek: ozpasentegre.exe

2. Start-Process ile çalıştırma:
- Uygulama arka planda veya yeni bir pencerede başlatılabilir.
- Script, exe’yi başlattıktan sonra hemen devam eder (beklemez).
- Ek parametrelerle (çalışma dizini, argümanlar, gizli başlatma vb.) daha fazla kontrol sağlar.
- Örnek: Start-Process ".\entegre\entegre.exe"

Kısaca: Start-Process daha esnek ve gelişmiş seçenekler sunar, doğrudan çalıştırma ise daha basittir ve scriptin akışını exe’nin bitişine kadar durdurur. İhtiyacına göre ikisinden birini seçebilirsin.


# Windows'ta kısayol oluşturma (ps script icin)

Windows’ta bir .ps1 PowerShell scriptini kısayol ile çalıştırmak için şu adımları izleyebilirsin:

1. Masaüstünde sağ tıkla → Yeni → Kısayol oluştur.
2. Konum kısmına aşağıdaki komutu yaz:
```
powershell.exe -ExecutionPolicy Bypass -File "Y:\ozpasjavaexe\test-entegre-release.ps1"
```
3. İleri → Kısayol adını yaz → Bitir.

Artık bu kısayola çift tıklayarak PowerShell scriptini çalıştırabilirsin.  
Not: -ExecutionPolicy Bypass parametresi, scriptin çalışmasını engelleyen politikaları geçici olarak devre dışı bırakır.
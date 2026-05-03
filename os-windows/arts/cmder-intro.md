# Cmder Kullanımı

Cmder, Windows için geliştirilmiş, taşınabilir ve güçlü bir komut satırı emülatörüdür. Özellikle geliştiriciler için pratik ve özelleştirilebilir bir terminal deneyimi sunar.

## Temel Özellikler
- **Taşınabilir**: Kurulum gerektirmez, doğrudan çalıştırılabilir.
- **Unix benzeri komutlar**: `ls`, `cat`, `grep` gibi komutlar desteklenir.
- **Sekmeli arayüz**: Birden fazla terminal sekmesi açılabilir.
- **Kopyala-yapıştır kolaylığı**: Seçimi kopyalamak için `Ctrl + C`, yapıştırmak için `Ctrl + V` kullanılır.
- **Git, PowerShell, CMD, Bash** desteği.

## Kurulum
1. [cmder.net](https://cmder.net/) adresinden Cmder indirilir.
2. Zip dosyası açılır ve istenen bir klasöre çıkarılır.
3. `Cmder.exe` çalıştırılır.

## Temel Kısayollar
- `Ctrl + T` : Yeni sekme açar
- `Ctrl + W` : Aktif sekmeyi kapatır
- `Ctrl + Tab` : Sekmeler arası geçiş
- `Ctrl + Alt + U` : Kopyala
- `Ctrl + Alt + V` : Yapıştır
- `Win + Alt + P` : Ayarlar menüsü

## Sık Kullanılan Komutlar
- `ls` : Klasör içeriğini listeler
- `cd` : Dizin değiştirir
- `cls` : Ekranı temizler
- `alias` : Kısa yol komutları tanımlar
- `ssh` : SSH bağlantısı başlatır

## İpuçları
- Sağ tıklayarak hızlıca kopyala/yapıştır yapılabilir.
- Kendi alias'larınızı tanımlamak için `aliases` dosyasını düzenleyin.
- CMD, PowerShell veya Git Bash arasında kolayca geçiş yapabilirsiniz.

## Kaynaklar
- [Resmi Site](https://cmder.net/)
- [GitHub](https://github.com/cmderdev/cmder)
- [Belgeler](https://github.com/cmderdev/cmder/wiki)

# Aliases

```ini
clear=cls
clink="Y:\apps\cmder_mini\vendor\clink\clink_x64.exe" $*
cmderr=cd /d "%CMDER_ROOT%"
e.=explorer .
gl=git log --oneline --all --graph --decorate  $*
history="Y:\apps\cmder_mini\vendor\clink\clink_x64.exe" history $*
l=ls --show-control-chars -CFGNhp --color --ignore={"NTUSER.DAT*","ntuser.dat*"} $*

ls=ls --show-control-chars -F --color $*
projweb=Y:&&cd Y:\devrepo-oraksoft-web
pwd=cd
pwsh=%SystemRoot%/System32/WindowsPowerShell/v1.0/powershell.exe -ExecutionPolicy Bypass -NoLogo -NoProfile -NoExit -Command "Invoke-Expression '. ''%CMDER_ROOT%/vendor/profile.ps1'''"
unalias=alias /d $1
vi=vim $*

```

Cmder aliases ne işe yarıyor ? 

➖ Bunlar Cmder içinde komut kısayolları (alias). Uzun komutları kısa isimlerle çalıştırmanı sağlar.

Ne yaptıkları:

- clear=cls  
  clear yazınca cls çalışır, ekran temizlenir.

- clink="Y:\apps\cmder_mini\vendor\clink\clink_x64.exe" $*  
  clink komutunu doğrudan o exe ile çalıştırır. $* yazdığın tüm ek parametreleri aynen iletir.

- cmderr=cd /d "%CMDER_ROOT%"  
  Cmder kurulu klasöre gider. /d olduğu için sürücü değişimini de yapar.

- e.=explorer .  
  Bulunduğun klasörü Windows Explorer ile açar.

- gl=git log --oneline --all --graph --decorate $*  
  Kısa/şekilli git geçmişini gösterir. Ek parametre verebilirsin.

- history="Y:\apps\cmder_mini\vendor\clink\clink_x64.exe" history $*  
  Clink üzerinden komut geçmişini gösterir/işletir.

- l=ls --show-control-chars -CFGNhp --color --ignore={"NTUSER.DAT*","ntuser.dat*"} $*  
  Daha detaylı ls görünümü verir, renkli listeler, NTUSER.DAT dosyalarını gizler.

- ls=ls --show-control-chars -F --color $*  
  ls için varsayılanı renkli ve tip işaretli (ör. klasör sonuna /) hale getirir.

- projweb=Y:&&cd Y:\devrepo-oraksoft-web  
  Y sürücüsüne geçip ilgili proje klasörünü açar.

- pwd=cd  
  pwd yazınca mevcut dizini gösteren cd çalışır (Windows cmd tarzı).

- pwsh=%SystemRoot%/System32/WindowsPowerShell/v1.0/powershell.exe ...  
  Belirli ayarlarla PowerShell başlatır, Cmder profile.ps1 dosyasını yükler.

- unalias=alias /d $1  
  Verilen alias adını siler. $1 ilk parametre demek.

- vi=vim $*  
  vi yazınca vim çalışır; ek parametreleri aktarır.

Ek not:
- $* = tüm argümanlar
- $1 = ilk argüman

İstersen bir sonraki adımda bu alias listesini daha temiz bir profile biçimine dönüştürüp (yorum satırlarıyla) sana düzenli bir şablon da hazırlayabilirim.
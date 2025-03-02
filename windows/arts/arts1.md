
Source : https://chatgpt.com/c/67c3acfb-56dc-800e-ac52-9b9270e31e68

[Back](../readme.md)

---

Rclone, komut satırı tabanlı bir dosya senkronizasyon ve yönetim aracıdır. Bulut depolama hizmetleriyle (Google Drive, OneDrive, Dropbox, Amazon S3, vb.) yerel diskler arasında dosya transferi yapmanıza, senkronizasyon işlemlerini otomatikleştirmenize ve uzaktaki depolama alanlarını yerel bir disk gibi bağlamanıza olanak tanır.

---

# Rclone'un Temel Özellikleri
- Bulut Depolama Desteği: Google Drive, Dropbox, OneDrive, Amazon S3, Backblaze B2, Yandex Disk, MEGA ve daha birçok servisi destekler.
- Senkronizasyon ve Kopyalama: Yerel diskten buluta, buluttan buluta veya buluttan yerel diske dosya ve klasör senkronizasyonu yapabilir.
- Şifreleme: Verilerinizi güvenli bir şekilde şifreleyerek saklayabilirsiniz.
- Mount Desteği: Bulut depolama alanlarını bir disk sürcüsü gibi bağlayarak kullanabilirsiniz.
- Cache ve Chunking: Büyük dosyaları parçalara bölerek yükleme yapabilir ve cache mekanizmasıyla daha hızlı erişim sağlayabilirsiniz.
- GUI (Web Arayüzü): Komut satırı yerine Rclone'un web arayüzünü kullanabilirsiniz.
- Script Desteği: Otomatik yedekleme ve senkronizasyon için cron job veya batch scriptlerle entegre edebilirsiniz.

---

# Rclone Nasıl Kurulur?
## Windows İçin
1. [Resmi Rclone sitesinden](https://rclone.org/downloads/) uygun sürümü indir.
2. ZIP dosyasını çıkar ve `rclone.exe` dosyasını kullan.

## Linux İçin
```sh
curl https://rclone.org/install.sh | sudo bash
```

## MacOS İçin
```sh
brew install rclone
```

---

# Temel Komutlar
## Bağlantı Ayarlama (Remote Eklemek)
```sh
rclone config
```
- Yeni bir bağlantı eklemek için `"n"` seçeneğini kullan.
- Bulut sağlayıcısını seç ve giriş bilgilerini gir.

## Dosya Listeleme
```sh
rclone ls remote:
```
- `remote:` yerine bağladığın bulut servisini yaz.

## Dosya Kopyalama
```sh
rclone copy local_folder remote:/backup
```
- `local_folder` → Yerel klasör
- `remote:/backup` → Buluta yedekleme

## Dosya Senkronizasyonu (İki Yönlü)
```sh
rclone sync local_folder remote:/backup
```
- Yereldeki dosyalar ile buluttaki dosyaları eşitler.

## Bulutu Mount Etme (Yerel Disk Gibi)
```sh
rclone mount remote:/backup X: --vfs-cache-mode full
```
- Windows'ta **X:** sürcücüsünü bağlar.
- Linux için:
  ```sh
  rclone mount remote:/backup /mnt/backup --daemon
  ```
- `fusermount -u /mnt/backup` ile bağlantıyı kaldırabilirsin.

## Şifrelenmiş Depolama Kullanma
- `rclone config` ile yeni bir **kriptolu remote** ekleyebilirsin.
```sh
rclone copy local_folder crypt:/secure-backup
```

---

# Google Drive ile Temel Rclone Komutları
## Google Drive İçeriğini Listeleme
```sh
rclone ls gdrive:
```
Sadece klasörleri listelemek için:
```sh
rclone lsd gdrive:
```

## Google Drive'a Dosya Yükleme
```sh
rclone copy ~/yerel_klasor gdrive:/yedek
```
Windows için:
```sh
rclone copy C:\Dosyalar gdrive:/Backup
```

## Google Drive'dan Dosya İndirme
```sh
rclone copy gdrive:/Backup ~/yerel_yedek
```
Windows için:
```sh
rclone copy gdrive:/Backup C:\Yedek
```

## Google Drive ile Senkronizasyon
```sh
rclone sync ~/yerel_klasor gdrive:/yedek
```
Silme işlemi yapmadan önizlemek için:
```sh
rclone sync ~/yerel_klasor gdrive:/yedek --dry-run
```

---

# Google Drive'ı Yerel Disk Gibi Bağlama (Mount)
```sh
rclone mount gdrive:/ X: --vfs-cache-mode full
```
Linux için:
```sh
rclone mount gdrive:/ ~/GoogleDrive --daemon
```
Mount’u kaldırmak için:
Windows:
```sh
net use X: /delete
```
Linux:
```sh
fusermount -u ~/GoogleDrive
```

---

# Rclone Web Arayüzü ile Google Drive Yönetimi
```sh
rclone rcd --rc-web-gui
```
Bu komut, tarayıcıda bir web paneli açar.

---

# Otomatik Yedekleme ve Senkronizasyon
Linux için:
```sh
crontab -e
```
Ve şunu ekle:
```sh
0 2 * * * rclone sync ~/yerel_klasor gdrive:/yedek
```

Windows’ta bir `.bat` dosyası oluşturup Görev Zamanlayıcı'ya ekleyebilirsin:
```bat
@echo off
rclone sync C:\Dosyalar gdrive:/Backup
exit
```

---

# Özet
| İşlem | Komut |
|-----------|----------|
| Google Drive bağlantısı ekleme | `rclone config` |
| Drive’daki dosyaları listeleme | `rclone ls gdrive:` |
| Dosya yükleme | `rclone copy ~/yerel_klasor gdrive:/yedek` |
| Dosya indirme | `rclone copy gdrive:/yedek ~/yerel_yedek` |
| Drive’ı senkronize etme | `rclone sync ~/yerel_klasor gdrive:/yedek` |
| Google Drive'ı mount etme | `rclone mount gdrive:/ X: --vfs-cache-mode full` |
| Web arayüzü açma | `rclone rcd --rc-web-gui` |


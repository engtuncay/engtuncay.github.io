
rclone google drive ile kullanmak istiyorum, rcloud nasıl kullanırım , windows ve ubuntu için (vps) anlatır mısın ? klasör üzerinden kullanmak istiyorum

2:05 PM, Claude 

Rclone ile Google Drive — Windows & Ubuntu VPS Rehberi

# Genel Bakış

Rclone, Google Drive'ı yerel bir klasör gibi bağlamanı sağlayan güçlü bir CLI aracıdır. İki farklı kullanım şekli var:

- rclone mount → Drive'ı klasör olarak bağla (sanki yerel disk gibi)
- rclone sync/copy → Dosya senkronizasyonu / kopyalama


# WINDOWS — Kurulum ve Yapılandırma

Adım 1: Gerekli Araçları Kur

Windows'ta rclone mount kullanmak için WinFsp gereklidir. Rcloneview

```
WinFsp kur → winfsp.net/rel
Rclone indir → rclone.org/downloads (Windows zip)
ZIP'i aç, örneğin C:\rclone\ klasörüne koy
Bu klasörü PATH'e ekle (isteğe bağlı)

```

- Adım 2: Google Drive Remote Oluştur

```sh
rclone config
Sırasıyla:
n  → New remote
name> gdrive
Storage> drive   (ya da listedeki numarasını gir)
client_id>       (Enter — boş bırak)
client_secret>   (Enter — boş bırak)
scope> 1         (full access)
root_folder_id>  (Enter)
service_account_file> (Enter)
Edit advanced config? n
Use auto config? y   ← tarayıcı açılır, Google hesabını onayla
Is it a Shared Drive? n
y  → Yes, this is OK
q  → Quit config

```
Adım 3: Drive'ı Klasör Olarak Bağla

Rclone, Google Drive'ı Windows'ta G: gibi bir sürücü harfi olarak bağlayabilir. DevGenius
cmd
```
rclone mount gdrive: G: --vfs-cache-mode full

```

veya belirli bir alt klasörü bağlamak için:

```
cmdrclone mount gdrive:/Projeler G: --vfs-cache-mode full

```

Arka planda çalıştırmak için (yeni pencere açar):

```
cmdstart /B rclone mount gdrive: G: --vfs-cache-mode full --log-file C:\rclone\rclone.log

```

Adım 4: Windows Başlangıcında Otomatik Bağlama

```
Görev Zamanlayıcı (Task Scheduler) ile:

taskschd.msc aç
"Create Basic Task" → Trigger: "When computer starts"
Action: Program → C:\rclone\rclone.exe
Arguments: mount gdrive: G: --vfs-cache-mode full
"Run whether user is logged on or not" seç

```

# UBUNTU VPS — Kurulum ve Yapılandırma

Adım 1: Rclone Kur

```bash
curl https://rclone.org/install.sh | sudo bash

```

Sonra FUSE kur (mount için şart):

```bash
sudo apt install fuse3 -y
/etc/fuse.conf dosyasında şu satırın yorum işaretini kaldır:
bashsudo nano /etc/fuse.conf
# user_allow_other  →  user_allow_other (başındaki # sil)

```

Adım 2: Remote Yapılandır (Headless — Tarayıcısız)

VPS'te tarayıcı olmadığı için token'ı yerel makinende alıp VPS'e taşırsın.
Yerel Windows makinesinde (rclone kuruluysa):

```sh cmd
rclone authorize "drive"

```
Tarayıcı açılır, Google hesabını onayla. Terminal'de bir token JSON'u çıkar — bunu kopyala.

VPS SSH oturumunda:
bashrclone config
n → New remote
name> gdrive
Storage> drive
client_id>       (Enter)
client_secret>   (Enter)
scope> 1
root_folder_id>  (Enter)
Edit advanced config? n
Use auto config? n   ← headless olduğu için n seçiyoruz
Çıkan token JSON'unu buraya yapıştır → Enter → y → q
Adım 3: Mount Klasörü Oluştur
bashsudo mkdir -p /mnt/gdrive
sudo chown $USER:$USER /mnt/gdrive
Adım 4: Manuel Bağlama (Test)
bashrclone mount gdrive: /mnt/gdrive \
  --vfs-cache-mode full \
  --allow-other \
  --daemon
Test et:
bashls /mnt/gdrive
Bağlamayı kaldır:
bashfusermount -u /mnt/gdrive
Adım 5: Systemd ile Otomatik Başlatma
Systemd servis dosyası oluşturarak sistem açılışında otomatik bağlanmasını sağlayabilirsin. HamRadio.my
bashsudo nano /etc/systemd/system/rclone-gdrive.service
İçeriği:
ini[Unit]
Description=rclone: Google Drive
After=network-online.target
Wants=network-online.target

[Service]
Type=notify
User=YOUR_USERNAME
Group=YOUR_USERNAME
ExecStart=/usr/bin/rclone mount gdrive: /mnt/gdrive \
  --config=/home/YOUR_USERNAME/.config/rclone/rclone.conf \
  --vfs-cache-mode full \
  --vfs-cache-max-size 5G \
  --vfs-cache-max-age 24h \
  --vfs-read-chunk-size 32M \
  --buffer-size 32M \
  --allow-other \
  --log-level INFO \
  --syslog
ExecStop=/bin/fusermount -u /mnt/gdrive
Restart=always
RestartSec=10

[Install]
WantedBy=multi-user.target

YOUR_USERNAME → kendi kullanıcı adınla değiştir.

Servisi etkinleştir:

```bash
sudo systemctl daemon-reload
sudo systemctl enable rclone-gdrive.service
sudo systemctl start rclone-gdrive.service
sudo systemctl status rclone-gdrive.service

```

# Yararlı Rclone Komutları

Komut Açıklama
- `rclone ls gdrive:`  | Drive içeriğini listele
- `rclone lsd gdrive:` | Sadece klasörleri listele
- `rclone copy /local/path gdrive:/backup`  | Yerel → Drive kopyala
- `rclone sync gdrive:/Projeler /local/Projeler` | Senkronize et
- `rclone size gdrive:` | Toplam kullanım alanı
- `rclone check gdrive: /local` | Karşılaştır

Önemli Notlar

`--vfs-cache-mode` seçenekleri:

- off → Önbellek yok, sadece oku (en az kaynak)
- minimal → Küçük önbellek
- writes → Yazma önbelleği (önerilir)
- full → Tam önbellek, en iyi uyumluluk ama disk kullanır

➖ VPS için tavsiye: 
Disk alanı kısıtlıysa `--vfs-cache-mode writes` yeterlidir. 
`--vfs-cache-max-size` ile de önbellek limitini belirle.

Token yenileme sorununu önlemek için servis dosyasına `Restart=always` eklemek önemlidir — rclone token expires durumunda servisi otomatik yeniden başlatır.
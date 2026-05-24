

Windows IIS geçmişi olan biri olarak Ubuntu/Linux dünyasına giriş için temel bilgileri aşağıda özetliyorum:

---

### 1. Linux Dizinlerinin Görevleri

- `/` : Kök dizin, her şey buradan başlar.
- `/home` : Kullanıcıların kişisel dosyaları burada tutulur. Örn: `/home/tuncay`
- `/etc` : Sistem yapılandırma dosyaları.
- `/var` : Değişken veriler (loglar, spool, cache).
- `/usr` : Kullanıcı programları ve kütüphaneleri.
- `/bin` : Temel komutlar (ls, cp, mv, rm, bash vs).
- `/sbin` : Sistem yönetim komutları (root için).
- `/tmp` : Geçici dosyalar.
- `/root` : Root kullanıcısının ana dizini.

---

### 2. Temel Komutlar

- `ls` : Dizin içeriğini listele (`ls -l`, `ls -a`)
- `cd` : Dizin değiştir (`cd /home/tuncay`)
- `pwd` : Bulunduğun dizini göster
- `cp` : Dosya kopyala (`cp kaynak hedef`)
- `mv` : Dosya/dizin taşı veya yeniden adlandır
- `rm` : Dosya sil (`rm dosya.txt`)
- `mkdir` : Dizin oluştur
- `rmdir` : Boş dizin sil
- `cat` : Dosya içeriğini göster
- `nano`, `vim` : Metin editörleri

---

### 3. Home Dizinleri

Her kullanıcının kendi dizini `/home/kullaniciadi` altında bulunur. Kişisel dosyalar, ayarlar burada tutulur.

---

### 4. Symbolic Link (Sembolik Bağlantı)

Windows’daki "kısayol"un Linux karşılığıdır.

- Oluşturmak için:  

```
ln -s /kaynak/dosya /hedef/link
```

Örnek:  

```
ln -s /var/www/html /home/tuncay/html-link
```

---

### 5. Sistemi Kontrol Eden Komutlar

- `ps aux` : Tüm çalışan işlemleri listeler
- `top` : Canlı olarak işlem ve kaynak kullanımını gösterir
- `htop` : Daha gelişmiş, renkli işlem yöneticisi (önce `sudo apt install htop`)
- `kill PID` : Belirtilen işlemi sonlandırır
- `df -h` : Disk kullanımını gösterir
- `free -h` : Bellek kullanımını gösterir
- `uptime` : Sistem ne kadar süredir açık

---

### 6. BAT Karşılığı Bash Dosyası mı?

Windows’taki `.bat` dosyalarının karşılığı Linux’ta Bash scriptleridir (`.sh` uzantılı olabilir ama zorunlu değil).

---

### 7. Bash Script Temel Komutları

- Dosya başına genellikle şu satır eklenir:

```bash
#!/bin/bash
```

- Çalıştırılabilir yapmak için:

```
chmod +x scriptadi.sh
```

- Çalıştırmak için:

```
./scriptadi.sh
```

- Temel komutlar:
  
```bash
echo "Merhaba Dünya"
ls -l
cd /home
for dosya in *; do
  echo $dosya
done
```

---


➖ Linux'ta dolu (içinde dosya veya alt dizin olan) bir dizini silmek için şu komutu kullanabilirsin:

```
rm -r dizin_adi
```

Açıklama:
- `-r` (veya `--recursive`): Dizin içindeki tüm dosya ve alt dizinleriyle birlikte siler.


Eğer silme işlemini onaylamak istersen:

```
rm -ri dizin_adi
```

Dikkat: Bu işlem geri alınamaz, önemli dosyaları silmemeye dikkat et!

➖ Linux’ta Windows’taki gibi bir “Çöp Kutusu” (Recycle Bin) sistemi terminalde doğrudan yoktur. `rm` komutu ile silinen dosyalar geri alınamaz. Ancak, masaüstü ortamlarında (GNOME, KDE gibi) dosya yöneticileriyle sildiğinde dosyalar “Çöp” klasörüne taşınır.

Terminalde çöp kutusu mantığı için:
- `trash-cli` gibi araçlar kullanılabilir.  
Kurulum:

```
sudo apt install trash-cli
```

Kullanım:

```
trash-put dosya_adi
```

Bu komut dosyayı çöp kutusuna taşır, doğrudan silmez.

Çöpü listelemek:
```
trash-list
```
Çöpü boşaltmak:
```
trash-empty
```

Yani, terminalde de çöp kutusu mantığı eklenebilir!

<h5>Vps'ye Hestia Panel Kurulumu</h5>

- [1. Root Yetkisi Alın](#1-root-yetkisi-alın)
- [2. Sistem Güncellemesi](#2-sistem-güncellemesi)
- [3. Gerekli Paketleri Kurun](#3-gerekli-paketleri-kurun)
- [4. Hestia Kurulum Script’ini İndirin](#4-hestia-kurulum-scriptini-i̇ndirin)
- [5. Kurulum Script’ini Çalıştırın](#5-kurulum-scriptini-çalıştırın)
- [6. Kurulum Sonrası](#6-kurulum-sonrası)
- [Notlar](#notlar)
- [1. Yazılım Bileşenleri Seçimi](#1-yazılım-bileşenleri-seçimi)
- [2. Hostname (Sunucu Adı)](#2-hostname-sunucu-adı)
- [3. Admin E-posta Adresi](#3-admin-e-posta-adresi)
- [4. Admin Şifresi](#4-admin-şifresi)
- [5. Kurulum Onayı](#5-kurulum-onayı)
- [Özetle:](#özetle)

User: ubuntu 24 vps'eme hestia nasıl kurarım (normal kullanıcı ile giriş yaptım)

GitHub Copilot: Ubuntu 24 VPS’inize Hestia Control Panel’i normal (root olmayan) bir kullanıcı ile kurmak için aşağıdaki adımları izleyebilirsiniz:

### 1. Root Yetkisi Alın
Hestia kurulumu için root yetkisi gereklidir. Normal kullanıcı ile giriş yaptıysanız, aşağıdaki komutla root’a geçin:
```sh
sudo -i
```
veya sadece kurulum komutlarında başına `sudo` ekleyin.

---

### 2. Sistem Güncellemesi
```sh
sudo apt update && sudo apt upgrade -y
```

---

### 3. Gerekli Paketleri Kurun
```sh
sudo apt install wget curl sudo -y
```

---

### 4. Hestia Kurulum Script’ini İndirin
```sh
wget https://raw.githubusercontent.com/hestiacp/hestiacp/release/install/hst-install.sh
```

---

### 5. Kurulum Script’ini Çalıştırın
```sh
sudo bash hst-install.sh
```
Kurulum sırasında size bazı sorular sorulacak, tercihinize göre yanıtlayabilirsiniz.

---

### 6. Kurulum Sonrası
Kurulum tamamlandığında, size Hestia paneline erişim için bir adres, kullanıcı adı ve şifre verilecektir. Bu bilgileri not edin.

---

### Notlar
- Hestia, root yetkisi olmadan kurulamaz. Sadece normal kullanıcı ile giriş yaptıysanız, yukarıdaki gibi `sudo` veya `sudo -i` kullanmanız gerekir.
- Sunucunuzda başka bir kontrol paneli kuruluysa, çakışma olmaması için kaldırmanız önerilir.

---

Daha fazla yardıma ihtiyacınız olursa, hangi adımda takıldığınızı belirtin.

User: hestia script'i çalıştırdığımda benden hangi bilgileri isteyecek (oraksoft.tr domain üzerine kurmak istiyorum)

GitHub Copilot: Hestia kurulum script’ini (hst-install.sh) çalıştırdığınızda, genellikle aşağıdaki bilgileri ister veya seçenekler sunar:

### 1. Yazılım Bileşenleri Seçimi
- Web sunucusu (Nginx, Apache)
- Veritabanı sunucusu (MariaDB, PostgreSQL)
- Mail sunucusu (Exim, Dovecot)
- Ek servisler (FTP, Firewall, vs.)

Kurulum script’i, çoğu zaman bu bileşenleri otomatik olarak önerir ve isterseniz özelleştirmenize izin verir.

---

### 2. Hostname (Sunucu Adı)
- Sizden bir hostname girmenizi ister.  
  **oraksoft.tr** domainini kullanmak istiyorsanız, hostname olarak örneğin:  
  ```
  panel.oraksoft.tr
  ```
  gibi bir alt alan adı girmeniz önerilir.

---

### 3. Admin E-posta Adresi
- Yönetici e-posta adresinizi ister.  
  (Örn: admin@oraksoft.tr)

---

### 4. Admin Şifresi
- Size otomatik bir şifre üretir, isterseniz kendiniz de belirleyebilirsiniz.

---

### 5. Kurulum Onayı
- Seçimlerinizi özetler ve kuruluma başlamak için onay ister.

---

### Özetle:
- Hostname (panel.oraksoft.tr gibi)
- Admin e-posta adresi
- (İsteğe bağlı) admin şifresi
- Kurmak istediğiniz servisler (çoğu otomatik seçili gelir)

---

Kurulumdan sonra, Hestia paneline erişmek için verdiğiniz hostname’i kullanırsınız.  
Eğer özel bir yapılandırma yapmak isterseniz, script’i şu şekilde başlatabilirsiniz:
```sh
sudo bash hst-install.sh --interactive
```
Bu şekilde tüm adımları tek tek özelleştirebilirsiniz.

Başka bir sorunuz olursa detay verebilirim!

User: admin epostasını oraksoft olarak mı yoksa gmail adresi mi vermeliyim

GitHub Copilot: Hestia admin e-posta adresi olarak iki seçeneğiniz var:

1. **oraksoft.tr alan adınıza ait bir e-posta (örn: admin@oraksoft.tr):**  
   - Eğer alan adınız için e-posta servisi kuracaksanız veya Hestia ile birlikte mail sunucusu da kuruyorsanız, bu adresi kullanabilirsiniz.
   - Avantajı: Sunucu bildirimleri doğrudan kendi alan adınıza gelir.
   - Dezavantajı: Mail sunucusu düzgün yapılandırılmamışsa, iletiler spam’e düşebilir veya ulaşmayabilir.

2. **Gmail gibi harici bir e-posta adresi (örn: oraksoft@gmail.com):**  
   - Eğer sunucunuzda mail servisi kurmayacaksanız veya bildirimlerin kesin ulaşmasını istiyorsanız, Gmail gibi bir adres kullanmak daha güvenlidir.
   - Avantajı: Bildirimlerin ulaşma garantisi daha yüksektir.

**Öneri:**  
Sunucunuzda mail servisi kurulu değilse veya mail yapılandırmasına hâkim değilseniz, Gmail gibi harici bir adres kullanmanız daha güvenli olur.  
Eğer mail servisini doğru şekilde kurup kullanacaksanız, admin@oraksoft.tr gibi kendi alan adınızı da kullanabilirsiniz.

Her iki adresi de daha sonra Hestia panelinden değiştirebilirsiniz.
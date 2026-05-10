
Hestia Panel’i kurduğunuzda, panelin web arayüzü dosyaları ve eklenti geliştirme yolları aşağıdaki gibidir:

1. Panel Web Kaynak Kodu Nerede?
- Hestia Panel’in web arayüzü dosyaları genellikle şurada bulunur:
  - /usr/local/hestia/web/  
  - Ana PHP dosyaları, şablonlar ve statik dosyalar (CSS, JS) bu dizindedir.
  - Özellikle /usr/local/hestia/web/templates/ ve /usr/local/hestia/web/inc/ klasörleri arayüz ve fonksiyonlar için kullanılır.

2. Hestia Panel Eklentisi Nasıl Yazılır?
- Hestia Panel’de doğrudan “plugin” sistemi yoktur, ancak:
  - Bash scriptleri ile komutlar ekleyebilir, hook’lar (önceden tanımlı tetikleyiciler) ile kendi scriptlerinizi çalıştırabilirsiniz.
  - /usr/local/hestia/data/hooks/ dizininde, örneğin user_create, domain_create gibi olaylara özel scriptler ekleyebilirsiniz.
  - Web arayüzüne yeni sayfa veya buton eklemek için /usr/local/hestia/web/ dizinindeki PHP dosyalarını düzenleyebilirsiniz (güncellemede üzerine yazılabilir, dikkatli olun).

Kısaca:
- Web arayüzü: /usr/local/hestia/web/
- Hook/eklenti scriptleri: /usr/local/hestia/data/hooks/
- Resmi dökümantasyon ve örnekler için: https://docs.hestiacp.com/

Daha detaylı örnek veya adım adım eklenti örneği ister misiniz?

# Hestia Panel Web Kaynak Kodu ve Eklenti (Hook) Yazımı

## Panel Web Kaynak Kodu Nerede?

Hestia Panel’in web arayüzü dosyaları genellikle şurada bulunur:
- `/usr/local/hestia/web/`
- Ana PHP dosyaları, şablonlar ve statik dosyalar (CSS, JS) bu dizindedir.
- Özellikle `/usr/local/hestia/web/templates/` ve `/usr/local/hestia/web/inc/` klasörleri arayüz ve fonksiyonlar için kullanılır.

## Hestia Panel Eklentisi (Hook) Nasıl Yazılır?

Hestia Panel’de doğrudan “plugin” sistemi yoktur, ancak hook (tetikleyici) scriptleri ile özelleştirme yapılabilir.
- Hook scriptleri şurada bulunur:
  - `/usr/local/hestia/data/hooks/`
- Burada, belirli olaylar için (ör: user_create, domain_create) scriptler ekleyebilirsiniz.

### Örnek: Kullanıcı Oluşturulunca Çalışan Basit Hook
1. Script dosyasını oluşturun:

```bash
sudo nano /usr/local/hestia/data/hooks/user_create/myhook.sh
```

2. İçeriği örnek olarak şöyle olabilir:
```bash
#!/bin/bash
# Kullanıcı oluşturulunca tetiklenir
USER=$1
EMAIL=$2
/home/myuser/scripts/yapilacaklar.sh "$USER" "$EMAIL"
```

3. Scripti çalıştırılabilir yapın:
```bash
sudo chmod +x /usr/local/hestia/data/hooks/user_create/myhook.sh
```

### Notlar

- Her olay için (user_create, domain_create, vs.) ilgili klasöre script ekleyebilirsiniz.

---

## Hestia Panel Login Sayfası (View) Nerede?

Hestia Panel’in login (giriş) sayfası ve diğer arayüz sayfaları doğrudan HTML dosyaları olarak değil, PHP şablonları olarak bulunur.

- Login sayfası için ana dosya genellikle şuradadır:
  - `/usr/local/hestia/web/login/`
    - `index.php` → Login işlemlerinin başladığı dosya.
    - `template.html` veya `template.tpl` → Görsel şablon (bazı sürümlerde olabilir).
- Ayrıca, genel şablonlar ve stiller:
  - `/usr/local/hestia/web/templates/` → Tema ve genel şablonlar
  - `/usr/local/hestia/web/inc/` → Ortak fonksiyonlar ve parça şablonlar

### İnceleme için örnek dosya yolları:
- `/usr/local/hestia/web/login/index.php`  (login formu ve işleyiş)
- `/usr/local/hestia/web/templates/default/login.html` veya benzeri (görsel şablon, tema)

> Not: Hestia Panel’de çoğu sayfa PHP ile dinamik olarak üretilir, saf HTML dosyası azdır. Görünümü değiştirmek için ilgili PHP veya şablon dosyalarını düzenleyebilirsiniz.

Daha fazla detay veya belirli bir dosya içeriği ister misiniz?

- Web arayüzüne yeni sayfa veya buton eklemek için `/usr/local/hestia/web/` altındaki PHP dosyalarını düzenleyebilirsiniz (güncellemelerde üzerine yazılabilir, dikkatli olun).

### Kaynaklar

- [HestiaCP Hook Documentation](https://docs.hestiacp.com/admin_docs/advanced/hooks.html)

- [HestiaCP Github](https://github.com/hestiacp/hestiacp)

Daha gelişmiş örnek veya özel bir senaryo ister misiniz?

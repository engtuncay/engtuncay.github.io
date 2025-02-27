

- [Node.js ile FTP Yükleme ve ZIP Açma](#nodejs-ile-ftp-yükleme-ve-zip-açma)
  - [FTP ile Node.js İle Yükleme](#ftp-ile-nodejs-i̇le-yükleme)
    - [basic-ftp ile FTP Yükleme](#basic-ftp-ile-ftp-yükleme)
  - [Dosya Zipleyip FTP'ye Yükleme](#dosya-zipleyip-ftpye-yükleme)
  - [FTP Sunucusunda ZIP Dosyasını Açma](#ftp-sunucusunda-zip-dosyasını-açma)
    - [1. SSH ile ZIP Dosyasını Açma](#1-ssh-ile-zip-dosyasını-açma)
    - [2. PHP Script ile ZIP Dosyasını Açma](#2-php-script-ile-zip-dosyasını-açma)
  - [Sonuç](#sonuç)
- [FTP Yükleme, PHP ve Node.js ile Script Çalıştırma](#ftp-yükleme-php-ve-nodejs-ile-script-çalıştırma)
    - [PHP ile Composer Tabanlı Yükleme](#php-ile-composer-tabanlı-yükleme)
- [Node.js ile FTP Yükleme ve Dosya Transferi](#nodejs-ile-ftp-yükleme-ve-dosya-transferi)
    - [basic-ftp ile FTP Yükleme](#basic-ftp-ile-ftp-yükleme-1)
- [PHP ile Belirli Bir Klasör Hariç Tüm Dosyaları Silme](#php-ile-belirli-bir-klasör-hariç-tüm-dosyaları-silme)


# Node.js ile FTP Yükleme ve ZIP Açma

Windows üzerinde FTP ile dosya yükleme ve ZIP dosyasını açma işlemleri için çeşitli yöntemler bulunmaktadır. Aşağıda bu işlemleri **PHP**, **Node.js** ve **SSH** ile nasıl gerçekleştirebileceğinizi detaylı bir şekilde açıklıyorum.

## FTP ile Node.js İle Yükleme

### basic-ftp ile FTP Yükleme
Önce `basic-ftp` paketini yükleyin:
```sh
npm install basic-ftp
```

Ardından, aşağıdaki kod ile dosya yükleme işlemi yapabilirsiniz:
```js
const ftp = require("basic-ftp");
const fs = require("fs");

async function upload() {
    const client = new ftp.Client();
    client.ftp.verbose = true;

    try {
        await client.access({
            host: "ftp.siteniz.com",
            user: "ftp_kullanici",
            password: "ftp_sifre",
            secure: false,
        });

        console.log("Bağlantı başarılı, dosya yükleniyor...");
        await client.uploadFrom("dosya.txt", "public_html/dosya.txt");
        console.log("Dosya başarıyla yüklendi!");

    } catch (err) {
        console.error(err);
    }

    client.close();
}

upload();
```

## Dosya Zipleyip FTP'ye Yükleme

Eğer FTP sunucusunda dosyaları zipleyip yüklemek isterseniz, önce **`archiver`** ile ZIP dosyası oluşturabilir ve sonra FTP'ye yükleyebilirsiniz.

Önce gerekli paketleri yükleyin:

```sh
npm install archiver basic-ftp
```

Aşağıdaki kodu kullanarak ZIP dosyasını oluşturabilir ve FTP'ye yükleyebilirsiniz:

```js
const fs = require("fs");
const archiver = require("archiver");
const ftp = require("basic-ftp");

function createZip(zipFileName, sourceDir) {
    return new Promise((resolve, reject) => {
        const output = fs.createWriteStream(zipFileName);
        const archive = archiver("zip", { zlib: { level: 9 } });

        output.on("close", () => resolve(zipFileName));
        archive.on("error", (err) => reject(err));

        archive.pipe(output);
        archive.directory(sourceDir, false);
        archive.finalize();
    });
}

async function uploadZip(zipFileName) {
    const client = new ftp.Client();
    client.ftp.verbose = true;

    try {
        await client.access({
            host: "ftp.siteniz.com",
            user: "ftp_kullanici",
            password: "ftp_sifre",
            secure: false,
        });

        console.log("FTP bağlantısı başarılı. ZIP yükleniyor...");
        await client.uploadFrom(zipFileName, "public_html/proje.zip");
        console.log("ZIP dosyası başarıyla yüklendi!");

    } catch (err) {
        console.error(err);
    }

    client.close();
}

const zipFileName = "deploy.zip";
const sourceDir = "./build";

createZip(zipFileName, sourceDir)
    .then(uploadZip)
    .catch(console.error);
```

## FTP Sunucusunda ZIP Dosyasını Açma

### 1. SSH ile ZIP Dosyasını Açma

Eğer **SSH erişiminiz varsa**, terminal üzerinden ZIP dosyasını açabilirsiniz:
```sh
ssh kullanıcı_adı@ftp.siteniz.com
cd public_html
unzip proje.zip
```

Eğer `unzip` komutu yoksa, şu komut ile yükleyebilirsiniz:
```sh
sudo apt install unzip   # Ubuntu/Debian
sudo yum install unzip   # CentOS
```

ZIP dosyasını açtıktan sonra silebilirsiniz:
```sh
rm proje.zip
```

### 2. PHP Script ile ZIP Dosyasını Açma

Eğer **SSH erişiminiz yoksa**, PHP kullanarak ZIP dosyasını açabilirsiniz. Aşağıdaki PHP scriptini FTP'ye yükleyin ve çalıştırın:

```php
<?php
$zipFile = 'proje.zip';
$extractTo = './';

if (file_exists($zipFile)) {
    $zip = new ZipArchive;
    if ($zip->open($zipFile) === TRUE) {
        $zip->extractTo($extractTo);
        $zip->close();
        echo "Dosyalar başarıyla çıkarıldı!";
        
        // ZIP dosyasını silme işlemi
        unlink($zipFile);
        echo "ZIP dosyası başarıyla silindi!";
    } else {
        echo "ZIP dosyası açılamadı!";
    }
} else {
    echo "ZIP dosyası bulunamadı!";
}
?>
```

Bu scripti **FTP ile `public_html` dizinine** yükledikten sonra, tarayıcıda şu URL’yi açarak çalıştırabilirsiniz:

```
https://siteniz.com/unzip.php
```

İşiniz bittikten sonra, `unzip.php` dosyasını silmeyi unutmayın:

```sh
rm public_html/unzip.php
```

## Sonuç

| Yöntem                  | Gereksinim          | Avantajlar                                                                 |
|-------------------------|---------------------|---------------------------------------------------------------------------|
| **SSH ile ZIP Açma**    | SSH erişimi gerekli | Hızlı ve güvenli, terminal üzerinden yönetim.                             |
| **PHP ile ZIP Açma**    | PHP desteği yeterli | SSH gerektirmez, her sunucuda çalışır. ZIP çıkarma işlemi basit ve hızlıdır. |

- **SSH erişiminiz varsa**, `unzip` komutunu kullanmak daha hızlı ve güvenli olacaktır.
- **SSH erişiminiz yoksa**, PHP scripti ile ZIP dosyasını açabilirsiniz.

Umarım yardımcı olabilmişimdir! Herhangi bir sorunuz olursa, çekinmeden sorabilirsiniz. 🚀

---

# FTP Yükleme, PHP ve Node.js ile Script Çalıştırma

### PHP ile Composer Tabanlı Yükleme

Eğer Composer kullanarak PHP uygulamanızı yüklemek istiyorsanız, aşağıdaki adımları izleyebilirsiniz:

1. **Composer ve PHP Kurulumu:**
   - PHP ve Composer'ı doğru şekilde yüklediğinizden emin olun.

2. **Composer ile Paketleri Yükleyin:**
   - Projeye Composer ile bağımlılıkları yüklemek için:
     ```bash
     composer install
     ```

3. **Dosyaları FTP'ye Yükleyin:**
   - FTP ile projeyi yüklemek için FTP istemcisi ya da `ftp-deploy` gibi bir araç kullanabilirsiniz.

4. **PHP ve SSH ile ZIP Açma:**
   - PHP scripti ile ZIP dosyasını açmak için aşağıdaki adımları izleyebilirsiniz:
     ```php
     <?php
     $zipFile = 'proje.zip';
     $extractTo = './';
     
     if (file_exists($zipFile)) {
         $zip = new ZipArchive;
         if ($zip->open($zipFile) === TRUE) {
             $zip->extractTo($extractTo);
             $zip->close();
             echo "Dosyalar başarıyla çıkarıldı!";
             unlink($zipFile);
         } else {
             echo "ZIP dosyası açılamadı!";
         }
     } else {
         echo "ZIP dosyası bulunamadı!";
     }
     ?>
     ```
---

# Node.js ile FTP Yükleme ve Dosya Transferi

Eğer Node.js kullanarak FTP'ye dosya yüklemek istiyorsanız, aşağıdaki adımları izleyebilirsiniz:

### basic-ftp ile FTP Yükleme

Node.js projesinde FTP yüklemek için `basic-ftp` kütüphanesini kullanabilirsiniz:

```bash
npm install basic-ftp
```

Ardından, aşağıdaki gibi FTP işlemlerinizi yapabilirsiniz:
```js
const ftp = require("basic-ftp");

async function upload() {
    const client = new ftp.Client();
    client.ftp.verbose = true;

    try {
        await client.access({
            host: "ftp.siteniz.com",
            user: "ftp_kullanici",
            password: "ftp_sifre",
            secure: false,
        });

        console.log("Bağlantı başarılı, dosya yükleniyor...");
        await client.uploadFrom("dosya.txt", "public_html/dosya.txt");
        console.log("Dosya başarıyla yüklendi!");
    } catch (err) {
        console.error(err);
    }

    client.close();
}

upload();
```

---

# PHP ile Belirli Bir Klasör Hariç Tüm Dosyaları Silme

PHP ile belirli bir klasör hariç tüm dosyaları silmek için aşağıdaki kodu kullanabilirsiniz. Bu örnek, bir dizindeki tüm dosya ve alt klasörleri siler, ancak belirttiğiniz klasörü (örneğin, `keep_folder`) korur.

```php
<?php

function deleteFilesExcept($dir, $exceptDir) {
    // Klasör var mı kontrol et
    if (!is_dir($dir)) {
        echo "Geçersiz klasör yolu.";
        return;
    }

    // Klasördeki dosya ve alt klasörleri listele
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );

    foreach ($files as $fileinfo) {
        $filePath = $fileinfo->getRealPath();
        $relativePath = str_replace($dir . DIRECTORY_SEPARATOR, '', $filePath);

        // Eğer silinmesi gereken dosya, belirtilen klasörün içinde değilse
        if ($relativePath !== $exceptDir && strpos($relativePath, $exceptDir) === false) {
            // Dosyayı sil
            if ($fileinfo->isDir()) {
                rmdir($filePath);  // Alt klasörü sil
            } else {
                unlink($filePath);  // Dosyayı sil
            }
        }
    }

    echo "Tüm dosyalar ve alt klasörler silindi, belirtilen klasör korunuyor.";
}

// Kullanım
deleteFilesExcept('/path/to/your/directory', 'keep_folder');
?>
```

🔔 Açıklamalar:

1. **`deleteFilesExcept` fonksiyonu:** Bu fonksiyon, verilen bir dizindeki tüm dosya ve klasörleri siler, ancak **`keep_folder`** adlı klasörü korur.
2. **`RecursiveDirectoryIterator`:** Bu sınıf, dizindeki tüm dosya ve alt klasörleri döngüyle kontrol etmemizi sağlar.
3. **`RecursiveIteratorIterator::CHILD_FIRST`:** Bu seçenek, önce alt klasörleri, sonra ana dizini işlememizi sağlar (daha güvenli bir silme işlemi için).
4. **`unlink`:** Dosyaları siler.
5. **`rmdir`:** Klasörleri siler (boş olmalıdır).

🔔 Kullanım:

- Bu komutla **belirli bir klasör hariç** tüm dosya ve klasörleri silebilirsiniz. Kendi dizin yolunuzu ve korumak istediğiniz klasörü uygun şekilde değiştirin.

Herhangi bir sorunuz olursa sormaktan çekinmeyin!



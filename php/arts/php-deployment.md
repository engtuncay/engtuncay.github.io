

[Back](../readme.md)

---

- [Composer Kullanan PHP Uygulamasını Deploy Etme ve FTP ile Yükleme](#composer-kullanan-php-uygulamasını-deploy-etme-ve-ftp-ile-yükleme)
  - [1. Composer Kullanan PHP Uygulamasını Deploy Etme](#1-composer-kullanan-php-uygulamasını-deploy-etme)
    - [**1. Gerekli dosyaları hazırlayın**](#1-gerekli-dosyaları-hazırlayın)
    - [**2. Vendor klasörünü oluşturun (Sunucuda)**](#2-vendor-klasörünü-oluşturun-sunucuda)
    - [**3. FTP veya SSH ile dosyaları yükleyin**](#3-ftp-veya-ssh-ile-dosyaları-yükleyin)
  - [2. Windows Üzerinde FTP ile Yükleme Seçenekleri](#2-windows-üzerinde-ftp-ile-yükleme-seçenekleri)
    - [**Yöntem 1: FileZilla ile Manuel Yükleme**](#yöntem-1-filezilla-ile-manuel-yükleme)
    - [**Yöntem 2: `basic-ftp` ile Node.js Üzerinden Yükleme**](#yöntem-2-basic-ftp-ile-nodejs-üzerinden-yükleme)
      - [**Gerekli Paketi Yükleyin**](#gerekli-paketi-yükleyin)
      - [**FTP Yükleme Scripti**](#ftp-yükleme-scripti)
  - [3. ZIP Dosyasını FTP'ye Yükleme ve Açma](#3-zip-dosyasını-ftpye-yükleme-ve-açma)
    - [**ZIP Dosyasını Oluştur ve Yükle**](#zip-dosyasını-oluştur-ve-yükle)
      - [**Gerekli paketleri yükleyin:**](#gerekli-paketleri-yükleyin)
      - [**ZIP oluştur ve FTP'ye yükle**](#zip-oluştur-ve-ftpye-yükle)
  - [4. ZIP Dosyasını FTP Sunucusunda Açma](#4-zip-dosyasını-ftp-sunucusunda-açma)
    - [**PHP Script ile ZIP Dosyasını Açma**](#php-script-ile-zip-dosyasını-açma)
  - [5. PHP ile Belirli Bir Klasör Hariç Tüm Dosyaları Silme](#5-php-ile-belirli-bir-klasör-hariç-tüm-dosyaları-silme)
  - [6. Sonuç ve Özet](#6-sonuç-ve-özet)


# Composer Kullanan PHP Uygulamasını Deploy Etme ve FTP ile Yükleme

Bu döküman, **Composer kullanan bir PHP uygulamasını deploy etme**, **FTP ile yükleme**, **ZIP ile yükleme**, **PHP ve Node.js kullanarak FTP işlemleri yapma** ve **belirli klasörleri hariç tutarak dosya silme** gibi işlemleri kapsar.

---

## 1. Composer Kullanan PHP Uygulamasını Deploy Etme

Eğer **Composer ile bağımlılıkları yöneten bir PHP uygulamasını** başka bir sunucuya deploy etmek istiyorsanız, aşağıdaki adımları izleyebilirsiniz:

### **1. Gerekli dosyaları hazırlayın**
Uygulamanızı deploy etmeden önce aşağıdaki dosyaların hazır olduğundan emin olun:
- `composer.json`
- `composer.lock`
- `vendor` klasörü
- Uygulama kaynak kodları

### **2. Vendor klasörünü oluşturun (Sunucuda)**
Eğer **FTP ile yükleme yapıyorsanız**, `vendor` klasörünü yüklememek daha hızlı bir çözüm olabilir. Bunun yerine, `composer install` komutunu kullanabilirsiniz:

```sh
composer install --no-dev --optimize-autoloader
```

Bu komut:
- `composer.json` ve `composer.lock` içindeki bağımlılıkları yükler.
- `--no-dev` ile geliştirme bağımlılıklarını yüklemeyi engeller.
- `--optimize-autoloader` ile autoload işlemini optimize eder.

### **3. FTP veya SSH ile dosyaları yükleyin**
Eğer SSH erişiminiz varsa, `rsync` veya `scp` ile yükleme yapabilirsiniz:

```sh
rsync -avz --exclude 'vendor' ./ kullanıcı@sunucu:/var/www/proje
```

Eğer sadece FTP kullanıyorsanız, `vendor` klasörü hariç diğer tüm dosyaları FTP ile yükleyip, **sunucu tarafında** `composer install` çalıştırabilirsiniz.

---

## 2. Windows Üzerinde FTP ile Yükleme Seçenekleri

Windows üzerinde **Composer kullanan bir PHP uygulamasını FTP ile yüklemek için** aşağıdaki yöntemleri kullanabilirsiniz:

### **Yöntem 1: FileZilla ile Manuel Yükleme**
1. **FileZilla’yı açın** ve FTP bilgilerinizi girerek bağlanın.
2. `public_html` veya uygun dizine girin.
3. Proje dosyalarınızı (vendor hariç) sürükleyip bırakın.
4. **Sunucuya giriş yapıp `composer install` çalıştırın** (SSH erişiminiz varsa).

### **Yöntem 2: `basic-ftp` ile Node.js Üzerinden Yükleme**
Eğer FTP işlemlerini otomatik hale getirmek isterseniz, **Node.js ile FTP yüklemesi yapabilirsiniz**.

#### **Gerekli Paketi Yükleyin**
```sh
npm install basic-ftp
```

#### **FTP Yükleme Scripti**
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

## 3. ZIP Dosyasını FTP'ye Yükleme ve Açma

### **ZIP Dosyasını Oluştur ve Yükle**
Eğer dosyaları **ZIP yapıp** FTP'ye yüklemek isterseniz, aşağıdaki gibi yapabilirsiniz.

#### **Gerekli paketleri yükleyin:**
```sh
npm install archiver basic-ftp
```

#### **ZIP oluştur ve FTP'ye yükle**

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

---

## 4. ZIP Dosyasını FTP Sunucusunda Açma

### **PHP Script ile ZIP Dosyasını Açma**
```php
<?php
$zipFile = 'proje.zip';
$extractTo = './';

if (file_exists($zipFile)) {
    $zip = new ZipArchive;
    if ($zip->open($zipFile) === TRUE) {
        $zip->extractTo($extractTo);
        $zip->close();
        echo "Dosyalar başarıyla çıkarıldı!<br>";
        
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

---

## 5. PHP ile Belirli Bir Klasör Hariç Tüm Dosyaları Silme

```php
<?php

function deleteFilesExcept($dir, $exceptDir) {
    if (!is_dir($dir)) {
        echo "Geçersiz klasör yolu.";
        return;
    }

    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );

    foreach ($files as $fileinfo) {
        $filePath = $fileinfo->getRealPath();
        $relativePath = str_replace($dir . DIRECTORY_SEPARATOR, '', $filePath);

        if ($relativePath !== $exceptDir && strpos($relativePath, $exceptDir) === false) {
            if ($fileinfo->isDir()) {
                rmdir($filePath);
            } else {
                unlink($filePath);
            }
        }
    }

    echo "Tüm dosyalar ve alt klasörler silindi, belirtilen klasör korunuyor.";
}

deleteFilesExcept('/path/to/your/directory', 'keep_folder');
?>
```

---

## 6. Sonuç ve Özet

- **Composer kullanan PHP projelerini** deploy etmek için **`composer install --no-dev --optimize-autoloader`** kullanabilirsiniz.
- **FTP ile yükleme için** `basic-ftp` veya **manuel FileZilla** yöntemi kullanılabilir.
- **ZIP ile yükleme yapabilir ve PHP ile açabilirsiniz.**
- **Belirli klasörleri hariç tutarak dosya silme işlemi PHP ile yapılabilir.**

Tüm işlemler hakkında sorularınız olursa bana bildirin! 🚀

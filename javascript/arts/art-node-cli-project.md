
### Kullanım:

Yayınladıktan sonra herkes şu şekilde kurabilir:

```bash
# Global kurulum
pnpm install -g oraksoft-node-tools

# Sonra komutları kullanabilir
fi-copy-deps
fi-deploy-ftp
fi-deploy-zip
fi-env-change --help
```

### Proje Yapısı:
```
oraksoft-node-tools/
├── bin/           # CLI wrapper'ları
├── lib/           # Ana fonksiyonlar  
├── package.json   # NPM konfigürasyonu
├── README.md      # Kullanım talimatları
└── .npmignore     # NPM'de yayınlanacak dosyalar
```

- GitHub Copilot: Global olarak kurulu olan npm paketini güncellemek için birkaç yöntem var:

## 🔄 Global Paketi Güncelleme Yöntemleri

### 1. **npm update ile güncelleme (önerilen)**
```bash
npm update -g oraksoft-node-tools
```

### 2. **npm install ile güncelleme**
```bash
npm install -g oraksoft-node-tools@latest
```

### 3. **Önce kaldır, sonra yeniden kur**
```bash
npm uninstall -g oraksoft-node-tools
npm install -g oraksoft-node-tools
```

### 4. **pnpm kullanıyorsanız**
```bash
pnpm update -g oraksoft-node-tools
# veya
pnpm add -g oraksoft-node-tools@latest
```

## 📋 Kontrol Komutları

### Kurulu versiyonu kontrol edin:
```bash
npm list -g oraksoft-node-tools
# veya
fi-copy-deps --version  # (eğer version komutu eklediyseniz)
```

### NPM'deki son versiyonu kontrol edin:
```bash
npm view oraksoft-node-tools version
```

### Hangi global paketlerin güncellemesi olduğunu görmek için:
```bash
npm outdated -g
```

## 💡 İpucu

Eğer package.json'da version'ı artırmadıysanız, npm aynı versiyonu tekrar yayınlamanıza izin vermez. Yeni değişiklikler için version'ı artırmanız gerekir:

```bash
# Version'ı otomatik artır
npm version patch  # 0.0.1 -> 0.0.2
npm version minor  # 0.0.2 -> 0.1.0
npm version major  # 0.1.0 -> 1.0.0

# Sonra yayınla
npm publish
```

En basit yöntem **`npm update -g oraksoft-node-tools`** komutunu kullanmaktır! 🚀
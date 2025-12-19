
globalde yüklü paketi bilgisayarımda, nasıl güncellerim

Checked background terminal output

Global olarak yüklü `oraksoft-node-tools`'ı güncellemek için iki yol var:

**1. Yerel dev kopyasından link etmek (hızlı):**
```powershell
cd Y:\devrepo-oraksoft-web\oraksoft-node-tools
pnpm link --global
```
Bu, global yüklüyü yerel dev kopyasına yönlendirir. Geliştirme sırasında yapılan değişiklikler hemen aktif olur.

**2. npm registry'ye yayınlamak ve güncellemek (resmi):**
Önce package.json'da sürümü güncelleyin:
```powershell
# Sürüm increment et
npm version patch  # 1.0.0 → 1.0.1
# veya
npm version minor  # 1.0.0 → 1.1.0
```

Sonra yayınlayın:
```powershell
pnpm run pn-publish
```

Ardından global sürümü güncelleyin:
```powershell
npm install -g oraksoft-node-tools
# veya
pnpm add -g oraksoft-node-tools
```

**Hangi yöntemi önereyim?**
- Geliştirme aşamasındaysanız → `pnpm link --global` kullanın
- Kararlı sürümse → sürümü incrementle, yayınla, sonra güncelleyin

Hangi yöntem tercihinidir?
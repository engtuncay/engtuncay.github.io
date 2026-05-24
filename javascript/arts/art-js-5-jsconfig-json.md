

jsconfig.json dosyası ne işe yarar — kısa özet:

- **Editör / IntelliSense**: jsconfig.json VS Code'un JS/TS dil sunucusuna proje kökünü ve ayarları bildirir; otomatik tamamlama, go-to-definition ve import önerileri düzgün çalışır.  
- **Yol eşlemeleri (paths)**: `baseUrl` ve `paths` ile kısa/alias import'lar (`import x from "src/..."`) mümkün olur.  
- **Type-check / JS davranışı**: `allowJs`, `checkJs` gibi seçeneklerle JS dosyalarında basit tip denetimi ve JS dosyalarının dil sunucusu tarafından işlenmesi sağlanır.  
- **Proje kapsamı**: `include` / `exclude` ile hangi dosyaların dil sunucusu tarafından ele alınacağını sınırlandırırsınız (performans için faydalı).  
- **Derleme aracı değil, editör konfigürasyonu**: Bu dosya doğrudan Node veya bundler tarafından çalıştırılmaz; ancak bundler/tsconfig ile uyumlu ayarlanırsa geliştirme deneyimini ve bazen build sürecini kolaylaştırır.

# jsconfig ayarları

```
{
  "compilerOptions": {
    "target": "ES2020",
    "module": "ESNext",
    "allowJs": true,
    "checkJs": true,
    "moduleResolution": "node",
    "baseUrl": ".",
    "paths": {
      "orak_modules/*": ["public/orak_modules/*"]
    }
  },
  "include": ["app/**/*", "public/**/*", "assets/**/*"]
}

```

jsconfig.json içeriğini analiz edip açıklayacağım; önce bir kısa plan kaydı bırakıyorum.

şimdi içerikteki ana ayarları madde madde açıklıyorum.

- **`compilerOptions.target`**: ES2020 — VS Code dil sunucusuna hangi JS özellik setinin hedeflendiğini söyler (editor önerileri/analizi için). Bu dosya doğrudan kodu dönüştürmez.

- **`compilerOptions.module`**: ESNext — modül söz dizimi/çeşidine dair bilgi (import/export önerileri ve çözümlemede etki). Build aracınız farklıysa (ör. CommonJS) uyumlu hale getirin.

- **`compilerOptions.allowJs`**: true — `.js` dosyalarının proje kapsamında işlenmesine izin verir (dil sunucusu JS dosyalarını da görür).

- **`compilerOptions.checkJs`**: true — JS dosyalarında temel tip/işlem kontrollerini etkinleştirir; VS Code hata/uyarı gösterebilir. Çok fazla uyarı çıkarsa `false` yapabilirsiniz veya dosyalarda JSDoc kullanarak iyileştirebilirsiniz.

- **`compilerOptions.moduleResolution`**: node — modül çözümlemesini Node tarzında yapar (node_modules, package.json gibi kuralları kullanır).

- **`compilerOptions.baseUrl`**: "." — proje kökünü baz alır; `paths` içinde verilen kısa importlar buraya göre çözülür.

- **`compilerOptions.paths`**:
  - `"orak_modules/*": ["public/orak_modules/*"]` — editör seviyesinde `import X from "orak_modules/foo"` ifadelerini `public/orak_modules/foo` içine yönlendirir. 
  - Örnek kullanım: `import Ui from "orak_modules/oraksoft-ui/oraksoft-ui"` — VS Code bu yolu çözerek otomatik tamamlama ve go-to-definition sağlar.
  - Önemli: Bu yalnızca editör içi çözümleme içindir; runtime veya bundler (webpack/rollup/tsc) için aynı alias'ı yapılandırmanız gerekir.

- **`include`**: `["app/**/*", "public/**/*", "assets/**/*"]` — dil sunucusunun hangi dosyaları işleyeceğini sınırlar (performans ve kapsam). Diğer klasörler hariç tutulur.

Kısa öneriler:
- Eğer build sırasında alias çalışmıyorsa, bundler veya Node için ek yapı (webpack `resolve.alias`, tsconfig `paths` + `tsc`/`webpack` entegrasyonu veya Node `"imports"`/`module-alias`) ekleyin.
- `checkJs` uyarılarını azaltmak için kritik dosyalarda JSDoc tipi ekleyin veya `// @ts-nocheck` kullanın.
- Eğer TypeScript kullanmaya geçmeyi düşünürseniz, tsconfig.json oluşturmak daha doğru olur (aynı ayarlar orada da çalışır).

İstersen şimdi bu alias'ı build/bundler tarafında nasıl eşleştireceğini göstereyim (webpack/tsconfig/Node örnekleri). Hangi bundler kullanılıyor?
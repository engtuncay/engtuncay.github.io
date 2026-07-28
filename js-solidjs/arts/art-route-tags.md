

## Nested Route

URL yapısında hierarchy oluşturur. Açıklayım:

Mevcut Yapı 

📝 File: app.tsx

```tsx
<Route path="/" component={EwpHomeGuard}>
  <Route path="" component={EwpDashboard} />
  <Route path="cari-ekstre" component={EwpEkstre} />
  <Route path="test-panel" component={EwpDemoPanel} />
  <Route path="bakiye-denge-rapor" component={EwpBakiyeDengRapor} />
</Route>
<Route path="/login" component={EwpLogin} />
```

## URL Eşleşmeleri

| URL                                        | Açılan Component                      |
|--------------------------------------------|---------------------------------------|
| `http://localhost:3000/`                   | `EwpHomeGuard` + `EwpDashboard`       |
| `http://localhost:3000/cari-ekstre`        | `EwpHomeGuard` + `EwpEkstre`          |
| `http://localhost:3000/test-panel`         | `EwpHomeGuard` + `EwpDemoPanel`       |
| `http://localhost:3000/bakiye-denge-rapor` | `EwpHomeGuard` + `EwpBakiyeDengRapor` |

## Nasıl Çalışır

1. **Parent Route** (`/`) → `EwpHomeGuard` render ediliyor
2. **Child Route** (`cari-ekstre`, `test-panel` vs) → child component render ediliyor
3. **Her sayfada** `EwpHomeGuard` kalıyor (menu, navbar gibi ortak layout)
4. **İçerik kısmı** değişiyor (DashBoard, Ekstre, vs)

## Outlet Gerekir

Sizin `EwpHomeGuard` component'inde **`<Outlet />`** olması gerekir:

```tsx
// ewpHomeGuard.tsx
import { Outlet } from "@solidjs/router";

export default function EwpHomeGuard() {
  return (
    <div>
      {/* Menu, Header vs */}
      <Outlet /> {/* Child routes buraya render olur */}
    </div>
  );
}
```

**Kısaca:** Nested route = URL yolunun hiyerarşik yapı olması + parent component'in kalması, child değişmesi. 🎯

## Standalone Route

`/login` route'u **sadece `EwpLogin` gösterir**. Nested değil, standalone route:

```tsx
<Route path="/login" component={EwpLogin} />

```

| URL | Açılan Component |
|---|---|
| `http://localhost:3000/login` | **Sadece** `EwpLogin` |
| `http://localhost:3000/` | `EwpHomeGuard` + child |
| `http://localhost:3000/cari-ekstre` | `EwpHomeGuard` + child |

**Fark:**
- `/login` → Standalone (menu, layout vs. yok)
- `/` ve alt sayfalar → `EwpHomeGuard` wrapper'ında (menu, layout var)

Bu tasarım doğru - login sayfasında menu ve layout görünmemesi istenir. ✅
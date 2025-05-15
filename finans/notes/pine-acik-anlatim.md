
- [🔰 Pine Script'e Temel Giriş – Açık Anlatım](#-pine-scripte-temel-giriş--açık-anlatım)
  - [📌 1. Pine Script Nasıl Başlar?](#-1-pine-script-nasıl-başlar)
  - [📌 2. Fiyat Verilerine Erişim](#-2-fiyat-verilerine-erişim)
  - [📌 3. Göstergelere Örnek: Basit Hareketli Ortalama](#-3-göstergelere-örnek-basit-hareketli-ortalama)
  - [📌 4. Koşullu İşlem: Eğer / ise](#-4-koşullu-i̇şlem-eğer--ise)
  - [📌 5. Kullanıcıdan Değer Almak (input)](#-5-kullanıcıdan-değer-almak-input)
  - [📌 6. AL/SAT Stratejisi – Temel Mantık](#-6-alsat-stratejisi--temel-mantık)
  - [📌 7. Uyarı (Alarm) Eklemek](#-7-uyarı-alarm-eklemek)
  - [🤔 Özetle Pine Script Nasıl Çalışır?](#-özetle-pine-script-nasıl-çalışır)


# 🔰 Pine Script'e Temel Giriş – Açık Anlatım

TradingView üzerindeki **Pine Script**, mum grafik verileri üzerinden çalışan, **tek tek her bar (mum) için hesaplama yapan** bir dildir.  
Her bar = bir satır çalışması gibi düşünebilirsin.

---

## 📌 1. Pine Script Nasıl Başlar?

```pinescript
//@version=5
indicator("Benim Göstergem", overlay=true)
```

- `"Benim Göstergem"` → Göstergenin adı  
- `overlay=true` → Gösterge mumların üstüne çizilir (örneğin: EMA)  
  `false` olursa ayrı bir panelde gösterilir (örneğin: RSI)

---

## 📌 2. Fiyat Verilerine Erişim

TradingView her bar (mum) için şu verileri sağlar:

| Değişken | Açıklama              |
|----------|-----------------------|
| `close`  | Mumun kapanış fiyatı  |
| `open`   | Mumun açılış fiyatı   |
| `high`   | Mumun en yüksek fiyatı |
| `low`    | Mumun en düşük fiyatı |
| `volume` | Hacim (işlem miktarı) |

Örneğin:

```pinescript
yeniKapanis = close
birOncekiKapanis = close[1]
```

---

## 📌 3. Göstergelere Örnek: Basit Hareketli Ortalama

```pinescript
//@version=5
indicator("Basit Ortalama", overlay=true)
ortalama = ta.sma(close, 14)
plot(ortalama, color=color.blue)
```

Açıklama:

- `ta.sma()` → Basit hareketli ortalama hesaplar.
- `close` → kapanış fiyatları kullanılır.
- `14` → son 14 bar dikkate alınır.
- `plot()` → çizgiyi grafikte gösterir.

---

## 📌 4. Koşullu İşlem: Eğer / ise

```pinescript
if close > open
    label.new(bar_index, high, "Yeşil mum", style=label.style_label_up)
```

- `close > open` → mum yeşilse  
- `label.new()` → grafiğe yazı kutusu (etiket) ekler  
- `bar_index` → şu anki bar (mum) numarası

---

## 📌 5. Kullanıcıdan Değer Almak (input)

```pinescript
süre = input.int(14, title="Ortalama Süresi")
```

Artık bu `süre` değeri, ayarlar panelinden değiştirilebilir.

---

## 📌 6. AL/SAT Stratejisi – Temel Mantık

```pinescript
//@version=5
strategy("Basit Strateji", overlay=true)

emaKisa = ta.ema(close, 9)
emaUzun = ta.ema(close, 21)

// emaKisa, emaUzun üstüne çıkarsa (9 günlük ortalama > 21 gün ortalama)
alKosulu = ta.crossover(emaKisa, emaUzun)
// emaKisa, emaUzun altına inerse ( 9 günlük ortalama < 21 gün ortalama)
satKosulu = ta.crossunder(emaKisa, emaUzun)

if alKosulu
    strategy.entry("AL", strategy.long)

if satKosulu
    strategy.close("AL")

plot(emaKisa, color=color.yellow)
plot(emaUzun, color=color.purple)

```

---

## 📌 7. Uyarı (Alarm) Eklemek

```pinescript
alertcondition(alKosulu, title="Alım Sinyali", message="EMA kesişti, alım sinyali!")
```

Bu sayede kullanıcı alarm kurabilir, webhook bile çalıştırabilir.

---

## 🤔 Özetle Pine Script Nasıl Çalışır?

- Her bar için satırlar sırayla çalışır (geçmiş dahil)
- Her şey zaman serisidir: `close[0]`, `close[1]`, ...
- Döngü yok; her barda hesap yaparsın
- `plot()`, `label.new()`, `alertcondition()` ile kullanıcıya sinyal veya görsel bilgi verirsin
- `strategy.entry()` gibi komutlarla backtest yapılır

---

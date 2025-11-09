

# 📘 Pine Script'e Giriş (TradingView Pine Editor)

## 🧠 1. Temel Konseptler

Pine Script bir zaman serisi dilidir. Her satır, her bar (mum) için çalışır.

- `close`, `open`, `high`, `low`, `volume`: her biri zaman serisidir
- `close[1]` → bir önceki barın kapanışı
- `high[3]` → 3 bar önceki en yüksek fiyat

```pinescript
diff = close - close[1]
```

---

## 📌 2. Veri Tipleri

| Tip       | Açıklama                             |
|-----------|--------------------------------------|
| `float`   | Sayılar (ondalıklı)                  |
| `int`     | Tam sayılar                          |
| `bool`    | Doğru/yanlış                         |
| `color`   | Renk değeri                          |
| `string`  | Metin                                |
| `label`   | Grafik üstüne yazı kutusu ekler      |
| `line`    | Grafik üstüne çizgi çizer            |
| `series`  | Zaman serisi (bar-bazlı değişken)    |

---

## 🛠️ 3. Temel Yapılar

### Değişken Tanımı

```pinescript
length = input.int(14)
src = input.source(close, "Source")
```

### Koşul Kullanımı
```pinescript
bullish = close > open
if bullish
    label.new(bar_index, high, "Bullish")
```

### Döngü Kullanılmaz

Zaman akışı her bar için otomatik çalıştığından, döngüler yoktur ❗

---

## ⚙️ 4. Fonksiyonlar

### Yerleşik Fonksiyonlar
```pinescript
ta.ema(close, 21)
math.round(high)
```

### Kendi Fonksiyonunu Yaz
```pinescript
mySma(src, len) =>
    sum = 0.0
    for i = 0 to len - 1
        sum := sum + src[i]
    sum / len
```

---

## 🎛️ 5. Kullanıcı Girdisi (Input)

```pinescript
length = input.int(14, title="Süre")
src = input.source(close, title="Veri Kaynağı")
```

---

## 📈 6. Gösterim (Plot)

```pinescript
plot(ta.sma(close, 14), color=color.red)
plotshape(close > open, style=shape.triangleup)
```

---

## 📊 7. Indicator ve Strategy

```pinescript
// Gösterge
indicator("My Indicator", overlay=true)

// Strateji
strategy("My Strategy", overlay=true)
```

---

## 🚨 8. Alert Condition

```pinescript
longCondition = ta.crossover(close, ta.sma(close, 20))
alertcondition(longCondition, title="Alım Sinyali", message="Fırsat Geldi!")
```

---

## 🔒 9. Script Sınırlamaları

- Maksimum 5000 bar geçmişe erişim
- Döngü yok, işlem başına bar bazlı mantık
- `var` ile sadece bir kez çalışan global değişkenler tanımlanabilir

```pinescript
var int counter = 0
if close > open
    counter += 1
```

---

## 🧪 10. Debug İçin

- `plot()`, `plotshape()` ve `label.new()` ile grafikte veri gösterilebilir
- `table.new()` ile özel tablo/istatistik de sunulabilir

---

## ✅ Başlarken Ne Yapmalı?

1. RSI veya EMA gibi hazır göstergeleri taklit ederek başla
2. Kendi mantığını koda dök (örneğin “2 kırmızı mumdan sonra yeşil mum alım sinyali olsun”)
3. Alert condition ekle
4. Backtest için strategy kullan

---

İlk örneğini birlikte yazmak istersen hazırım! 🚀

Harika! O zaman sana temel mantığı gösteren basit bir EMA Crossover Stratejisi örneğiyle başlayalım. Bu script:

İki EMA (hızlı ve yavaş) hesaplar,

Hızlı EMA, yavaş EMA'nın üstüne çıktığında ALIM sinyali üretir,

Geri keserse POZİSYON KAPATIR.

```
//@version=5
strategy("EMA Crossover Strategy", overlay=true)

// Kullanıcıdan EMA sürelerini al
fastLen = input.int(9, title="Hızlı EMA")
slowLen = input.int(21, title="Yavaş EMA")

// EMA hesapla
fastEMA = ta.ema(close, fastLen)
slowEMA = ta.ema(close, slowLen)

// Alım & Satım Koşulları
longCondition = ta.crossover(fastEMA, slowEMA)
exitCondition = ta.crossunder(fastEMA, slowEMA)

// İşlem sinyalleri
if longCondition
    strategy.entry("Buy", strategy.long)

if exitCondition
    strategy.close("Buy")

// Grafik üzerine çiz
plot(fastEMA, color=color.orange, title="Hızlı EMA")
plot(slowEMA, color=color.blue, title="Yavaş EMA")

// Uyarı için koşul
alertcondition(longCondition, title="ALIM Sinyali", message="EMA kesişimi: AL")

```


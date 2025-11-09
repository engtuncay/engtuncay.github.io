`request.security()` fonksiyonu Pine Script'te çok güçlü bir fonksiyondur. Bu fonksiyon ile:

## Ana İşlevleri:

1. **Farklı zaman dilimlerinden veri çekme** (Multi-timeframe analysis)
2. **Farklı sembollerden veri alma** (Cross-symbol analysis)
3. **Farklı borsalardan veri çekme**

## Syntax:
```pine
request.security(symbol, timeframe, expression, gaps, lookahead, ignore_invalid_symbol)
```

## Parametreler:
- `symbol`: Hangi sembolden veri alınacak ("AAPL", "BTCUSD", vb.)
- `timeframe`: Hangi zaman dilimi ("1D", "4H", "1W", vb.)
- `expression`: Ne tür veri alınacak (close, high, low, bir gösterge değeri, vb.)

## Örnek Kullanımlar: 

Created [](file:///y%3A/devrepo-github/engtuncay.github.io/diger/finans/pine-scripts/request-security-examples.pine)

## Pratik Kullanım Senaryoları:

1. **Higher Timeframe Trend**: 1 dakikalık grafikte günlük trendi görmek
2. **Multi-Symbol Analysis**: Bir hisse senedini S&P 500 ile karşılaştırmak  
3. **Sector Analysis**: Bir hisse senedini sektör ETF'i ile karşılaştırmak
4. **Crypto Correlation**: Altcoin'leri Bitcoin ile karşılaştırmak

## Önemli Notlar:

- **Repaint**: `lookahead=barmerge.lookahead_off` kullanın
- **Gaps**: `gaps=barmerge.gaps_off` boşlukları doldurur
- **Performance**: Çok fazla `request.security` kullanımı performansı etkileyebilir
- **Limits**: Pine Script'te maksimum 40 adet `request.security` çağrısı yapabilirsiniz

Bu fonksiyon ile çok güçlü multi-timeframe ve cross-market analizler yapabilirsiniz!

Made changes.



- Basit bir Ema Göstergesi

```js
//@version=5
indicator("My EMA", overlay=true)
length = input.int(21, title="EMA Length")
src = input.source(close, title="Source")
ema_val = ta.ema(src, length)
plot(ema_val, title="EMA", color=color.orange)

```

- Strateji Örneği (Al/Sat Backtest)

```
//@version=5
strategy("EMA Cross", overlay=true)
fast = ta.ema(close, 9)
slow = ta.ema(close, 21)

longCondition = ta.crossover(fast, slow)
shortCondition = ta.crossunder(fast, slow)

strategy.entry("Buy", strategy.long, when=longCondition)
strategy.close("Buy", when=shortCondition)
plot(fast, color=color.green)
plot(slow, color=color.red)


```

- Alert Sistemi

```
alertcondition(longCondition, title="Buy Signal", message="Long signal on {{ticker}}")

```



```
//@version=4
//inspired by: @mavilim0732 on twitter
//creator&author: KIVANÇ ÖZBİLGİÇ
study("MavilimW", overlay=true)
mavilimold = input(false, title="Show Previous Version of MavilimW?")
fmal=input(3,"First Moving Average length")
smal=input(5,"Second Moving Average length")
tmal=fmal+smal
Fmal=smal+tmal
Ftmal=tmal+Fmal
Smal=Fmal+Ftmal

M1= wma(close, fmal)
M2= wma(M1, smal)
M3= wma(M2, tmal)
M4= wma(M3, Fmal)
M5= wma(M4, Ftmal)
MAVW= wma(M5, Smal)
col1= MAVW>MAVW[1]
col3= MAVW<MAVW[1]
colorM = col1 ? color.blue : col3 ? color.red : color.yellow

plot(MAVW, color=colorM, linewidth=2, title="MAVW")

M12= wma(close, 3)
M22= wma(M12, 5)
M32= wma(M22, 8)
M42= wma(M32, 13)
M52= wma(M42, 21)
MAVW2= wma(M52, 34)

plot(mavilimold and MAVW2 ? MAVW2 : na, color=color.blue, linewidth=2, title="MavWOld")

alertcondition(crossover(MAVW,MAVW[1]), title="MAVW BUY", message="MAVW BUY!")
alertcondition(crossunder(MAVW,MAVW[1]), title="MAVW SELL", message="MAVW SELL!")

alertcondition(cross(MAVW,MAVW[1]), title="Color ALARM", message="MavilimW has changed color!")

```







[TOC]


# Java Core

###Atomic Reference

Anonim sınıf veya Lambda bloklarında metodun lokal değişkenlerini kullanabilmek için atomic reference nesnesini kullanabiliriz.

```java
AtomicReference<List<MkCARI_HESAP_HAREKETLERI>> atomref = new AtomicReference<>();
    
    Thread t = new Thread(() -> {
        // atomic ref set ediyoruz
        atomref.set(new RepoTblCariHareketler().getBankaEkste());
    });

     List<MkCARI_HESAP_HAREKETLERI> listEkstre = atomref.get();
```

----

#JavaFx



## Layout Sistemleri

- alignment : bir üst node içerisinde nasıl konumlanacak
- x ve y koordinat sistemindeki gibidir: x ekseni yatay eksen (<-->) ve y ekseni dikey eksendir (|).  

### Gridpane
  - hgap:
  - vgap:
  - gridLinesVisable : ızgaraları gösterir
  - columnConstraints child element eklenebilir. Column yani sütunun percentWidth attribute ile yüzdelik olarak ne kadar kapsayacağını belirleriz.
  - ​
  - **Compenentinin attribute yazılacak özellikler:**
  - Gridpane.rowIndex : konumunun satır indeksi   
  - Gridpane.columnIndex : konumunun sütun indeksi


----



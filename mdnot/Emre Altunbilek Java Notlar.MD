



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


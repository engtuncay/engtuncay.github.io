
Web Servis Bilgi

- [Belgeler (Evraklar)](#belgeler-evraklar)
  - [TBLMSDBELGEDETAY](#tblmsdbelgedetay)
- [Genel Alanlar ve Anlamı](#genel-alanlar-ve-anlamı)
  - [BYTTUR Tinyint](#byttur-tinyint)
  - [Kayittip](#kayittip)
  - [Stoktip Tinyint](#stoktip-tinyint)
  - [Odemetip tinyint](#odemetip-tinyint)
  - [FiyatHesaplamaTipi Tinyint](#fiyathesaplamatipi-tinyint)
  - [BYTDURUM](#bytdurum)
  - [AcikKapali Tinyint](#acikkapali-tinyint)
  - [Belgetip Tinyint](#belgetip-tinyint)
  - [Belgekod int](#belgekod-int)

# Belgeler (Evraklar)

## TBLMSDBELGEDETAY

Satış faturası mesela 800 Koli Su (12x1) girilmişse , bu tabloda lngstoktip -1 , dblmiktar 800 ve dblcevrim 12 olarak kayıt edilir.

Her kl sinde 12 adet olduğu için çevrim 12'dir. Birim 1 üzerinden 800 x 12 x -1 miktarında haraket olmuştur (- çıkış olduğunu gösterir.)

Birim sırası da BYTBIRIMSIRA da kayıt edilir.


# Genel Alanlar ve Anlamı

## BYTTUR Tinyint 

Belge türü 

Versiyona göre farklılık gösterebilir.

```
0  - Satis 
1  - Alis 
2  - MIadeSaglam  (Müşteriden İade Sağlam)
3  - SIade (Satıcıya İade)
4  - MIadeBozuk 
5  - HizmetVerilen 
6  - HizmetAlinan 
7  - Diger 
8  - DepozitoIade 
9  - KonsinyeSatis 
10 - KonsinyeAlis 

```

## Kayittip 

Tinyint Kayit tip bilgisidir. 

```
0  - Urun 
1  - Promosyon 
2  - KKAnaUrun 
3  - KKDetayUrun 
4  - GenelPromosyon 
5  - KapakPromosyonu 
6  - UrunIskProMuaf 
7  - Depozito 
8  - DepozitoSatis 
9  - DepozitoIade 
10 - DepozitoIadeManuel 

```




## Stoktip Tinyint 

Stok Hareket tipi bilgisidir

```
-1 - Cikis 
 0 - HareketYok
 1 - Giris  

```
## Odemetip tinyint 

Ödeme tip bilgisidir

```
0 - Pesin 
1 - Cek 
2 - Senet 
3 - KrediKarti 
4 - AcikHesap 
5 - TicariKart 
6 - DBS 
7 - HavaleEFT 

```

## FiyatHesaplamaTipi Tinyint 

Fiyat hesaplama tip bilgisidir

```
0 - Uygulama 
1 - Satis 
2 - Alis 
3 - BozukIade 
4 - SaglamIade 
5 - TavsiyeFiyat 

```

## BYTDURUM 

```
0 - Aktif   
1 - Pasif   
2 - İptal   
3 - Silindi   
4 - Potansiyel Pasif   
5 - Potansiyel Aktif 
```

## AcikKapali Tinyint 

Belgenin açık/kapalı

```
0 - Acik 
1 – Kapali 
```

## Belgetip Tinyint 

Dış sistemden gelen belge tipidir. 

```
Fatura = 0 
Siparis = 1 
Irsaliye = 2 
```

## Belgekod int

Panorama sistemindeki belge numarası değeridir. Dış sistemler bu numarayı bilemeyeceklerinden değer göndermemelidir.  



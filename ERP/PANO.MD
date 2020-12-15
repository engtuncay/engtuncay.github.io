
Web Servis Bilgi

- [Belgeler (Evraklar)](#belgeler-evraklar)
  - [TBLMSDBELGEDETAY](#tblmsdbelgedetay)
- [Genel Alanlar ve Anlamı](#genel-alanlar-ve-anlamı)
  - [BytTur alanın açıklaması](#byttur-alanın-açıklaması)
  - [Kayittip](#kayittip)
  - [Tur Tinyint Belge türü](#tur-tinyint-belge-türü)
  - [Stoktip Tinyint Stok tip bilgisidir](#stoktip-tinyint-stok-tip-bilgisidir)
  - [Odemetip tinyint Ödeme tip bilgisidir](#odemetip-tinyint-ödeme-tip-bilgisidir)
  - [FiyatHesaplamaTipi Tinyint Fiyat hesaplama tip bilgisidir](#fiyathesaplamatipi-tinyint-fiyat-hesaplama-tip-bilgisidir)
  - [BYTDURUM](#bytdurum)
  - [AcikKapali Tinyint Belgenin açık/kapalı](#acikkapali-tinyint-belgenin-açıkkapalı)
  - [Belgetip Tinyint Dış sistemden gelen belge tipidir.](#belgetip-tinyint-dış-sistemden-gelen-belge-tipidir)
  - [Belgekod int](#belgekod-int)

# Belgeler (Evraklar)

## TBLMSDBELGEDETAY

Satış faturası mesela 800 kl su (12x1) girilmişse , bu tabloda lngstoktip -1 , dblmiktar 800 ve dblcevrim 12 olarak kayıt edilir.
Her kl sinde 12 adet olduğu için çevrim 12. 800*12*-1 Adet (Birim 1) haraket olmuştur (- çıkış olduğunu gösterir.)
Birim sırası da BYTBIRIMSIRA da kayıt edilir.



# Genel Alanlar ve Anlamı

## BytTur alanın açıklaması

 0 → Satış 
 1 → Alış 
 2 → Müşteriden İade Sağlam 
 3 → Satıcıya İade 
 4 → Müşteriden İade Bozuk 
 5 → Verilen Hizmet 
 6 → Alınan Hizmet 


## Kayittip 

Tinyint Kayit tip bilgisidir. 
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



## Tur Tinyint Belge türü 
0  – Satis 
1- 1 - Alis 
2  - MIadeSaglam 
3  - SIade 
4  - MIadeBozuk 
5  - HizmetVerilen 
6  - HizmetAlinan 
7  - Diger 
8  - DepozitoIade 
9  - KonsinyeSatis 
10 - KonsinyeAlis 

## Stoktip Tinyint Stok tip bilgisidir
-1 - Cikis 
 0 - HareketYok
 1 - Giris  

## Odemetip tinyint Ödeme tip bilgisidir
0 - Pesin 
1 - Cek 
2 - Senet 
3 - KrediKarti 
4 - AcikHesap 
5 - TicariKart 
6 - DBS 
7 - HavaleEFT 


## FiyatHesaplamaTipi Tinyint Fiyat hesaplama tip bilgisidir
0 - Uygulama 
1 - Satis 
2 - Alis 
3 - BozukIade 
4 - SaglamIade 
5 - TavsiyeFiyat 


## BYTDURUM 

0 - Aktif   
1 - Pasif   
2 - İptal   
3 - Silindi   
4 - Potansiyel Pasif   
5 - Potansiyel Aktif 


## AcikKapali Tinyint Belgenin açık/kapalı
0 - Acik 
1 – Kapali 

## Belgetip Tinyint Dış sistemden gelen belge tipidir. 
Fatura = 0 
Siparis = 1 
Irsaliye = 2 

## Belgekod int 

EnRoutePanorama sistemindeki Belge numarası değeridir. Dış sistemler bu numarayı bilemeyeceklerinden 
değer göndermemelidir.  





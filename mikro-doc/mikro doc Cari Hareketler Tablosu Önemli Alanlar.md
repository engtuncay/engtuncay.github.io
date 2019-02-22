

<!-- TOC -->

- [cha_cinsi](#chacinsi)
- [36 cha_cari_cins Tinyint Cari Cinsi](#36-chacaricins-tinyint-cari-cinsi)
- [24 cha_tip Tinyint Hareket Tipi](#24-chatip-tinyint-hareket-tipi)
- [26 cha_normal_Iade Tinyint Normal/Iade?](#26-chanormaliade-tinyint-normaliade)
- [27 cha_tpoz Tinyint Cari Pozisyonu](#27-chatpoz-tinyint-cari-pozisyonu)
- [28 cha_ticaret_turu Tinyint Dış Ticaret Türü](#28-chaticaretturu-tinyint-d%C4%B1%C5%9F-ticaret-t%C3%BCr%C3%BC)
- [Seri, Sıra ve Satır No](#seri-s%C4%B1ra-ve-sat%C4%B1r-no)
- [20 cha_evrakno_seri nvarchar_evrakseri Evrak Seri No](#20-chaevraknoseri-nvarcharevrakseri-evrak-seri-no)
- [21 cha_evrakno_sira Integer Evrak Sıra No](#21-chaevraknosira-integer-evrak-s%C4%B1ra-no)
- [22 cha_satir_no Integer - Hareket Satır No](#22-chasatirno-integer---hareket-sat%C4%B1r-no)
- [23 cha_tarihi DateTime - İşlem Tarihi](#23-chatarihi-datetime---i%CC%87%C5%9Flem-tarihi)
- [111 cha_sntck_poz Tinyint - Senet Çek Pozisyonu](#111-chasntckpoz-tinyint---senet-%C3%A7ek-pozisyonu)
- [137 cha_e_islem_turu Tinyint - e-İşlem Türü](#137-chaeislemturu-tinyint---e-i%CC%87%C5%9Flem-t%C3%BCr%C3%BC)
- [138 cha_fatura_belge_turu Tinyint - Fatura Belge Türü](#138-chafaturabelgeturu-tinyint---fatura-belge-t%C3%BCr%C3%BC)
- [cha Evrak Tip](#cha-evrak-tip)
- [Indeks Tablosu](#indeks-tablosu)

<!-- /TOC -->

---

## cha_cinsi 
- cari hareket cinsi (nakit,kredi kartı,çek,toptan fatura ....)

```
0:Nakit  (havalede nakit içerisinde gelen,gideni chatipe göre belirleriz)

1:Müşteri Çeki
2:Müşteri Senedi

3:Firma Çeki 
4:Firma Senedi 
5:Dekont 

6:Toptan Fatura 
7:Perakende Faturası   (satış ve alış faturaları toptan faturalarına girer)
8:Hizmet Faturası

9:Serbest Meslek Makbuzu
10:Vade Farkı Faturası 
11:Kur Farkı Faturası 
12:Fason Faturası 
13:Dış Ticaret Faturası 
14:Demirbaş Faturası 
15:Değer Farkı Faturası 

16:Cari Açılış 
17:Müşteri Havale Sözü 
18:Müşteri Ödeme Sözü 

19:Müşteri Kredi Kartı

20:Firma Havale Emri 
21:Firma Ödeme Emri 

22:Firma Kredi Kartı 

23:Vade Farkı Sıfırlama 

24:Hal Faturası 
25:Müstahsil Fatura 
26:Stok Gider Pusulası 

27:Gider Makbuzu 

28:İthalat Masraf Faturası 
29:Gümrük Beyannamesi 
30:Finansal Kiralama Sözleşmesi 
31:Finansal Kira Faturası 
32:FUTURE_2 
33:Avans Makbuzu 
34:Müstahsil Değer Farkı Faturası 
35:Kabzımal Faturası 
36:Hediye Çeki Faturası 
37:Müşteri Teminat Mektubu 
38:Firma Teminat Mektubu 
39:Depozito Çeki 
40:Depozito Senedi 
41:Firma Reel Kredi Kartı

```



## 36 cha_cari_cins Tinyint Cari Cinsi

```
0:Carimiz 1:Cari Personelimiz 2:Bankamız 3:Hizmetimiz 4:Kasamız` 
5:Giderimiz 6:Muhasebe Hesabımız 7:Personelimiz 

8:Demirbaşımız 9:İthalat Dosyamız 10:Finansal Sözleşmemiz 
11:Kredi Sözleşmemiz 12:Dönemsel Hizmetimiz 
13:Kredi Kartımız

```

## 24 cha_tip Tinyint Hareket Tipi	

```
0:Borç 1:Alacak
```

## 26 cha_normal_Iade Tinyint Normal/Iade?	

iade faturalarında 1 olması lazım. örnek: satıcıya iade fat.,müşteriden alınan iade faturası

```
0:Normal 1:İade
```

## 27 cha_tpoz Tinyint Cari Pozisyonu	

Cari Pozisyon nedir ???

```
0:Açık 1:Kapalı
```

## 28 cha_ticaret_turu Tinyint Dış Ticaret Türü	

```
0:Toptan Yurt İçi Ticaret 
1:Perakende Yurt İçi Ticaret 
2:İhraç kayıtlı Yurt İçi Ticaret 
3:Yurt Dışı Ticaret 
4:Yurt Dışı Nitelikli İhraç Kayıtlı Ticaret 
5:Yurt Dışı Nitelikli Yurt İçi Ticaret
```

## Seri, Sıra ve Satır No

## 20 cha_evrakno_seri nvarchar_evrakseri Evrak Seri No

## 21 cha_evrakno_sira Integer Evrak Sıra No

## 22 cha_satir_no Integer - Hareket Satır No

evrak no seri , sira , satir no üçü birlikte unique dir.

## 23 cha_tarihi DateTime - İşlem Tarihi
Hareket veya İşlem Tarihi

## 111 cha_sntck_poz Tinyint - Senet Çek Pozisyonu

```
0:Portföyde 1:Ciro 2:Tahsilde 3:Teminatta 4:İade Edilen 5:Diğer3
6:Ödenmedi Portföyde 7:Ödenmedi İade 8:İcrada 9:Kısmen Ödendi 10:Ödendi
```

## 137 cha_e_islem_turu Tinyint - e-İşlem Türü

```
0:Tanımsız 1:e-Belge 2:e-Arşiv
```

## 138 cha_fatura_belge_turu Tinyint - Fatura Belge Türü

```
0:Fatura 1:Masraf Listesi 2:Perakende Fiş 3:Z Raporu 4:Navlun 5:Bilet 6:Poliçe 7:Zeyilname 8:Fon 9:Kontrat 10:Müstahsil 11:Diğer 12:Serbest Bölge Faturası
```


## cha Evrak Tip

```
0:Alış Faturası
1:Tahsilat Makbuzu
2:Kasa Tahsilat Fişi
3:Senet Giriş Bordrosu
4:Çek Giriş Bordrosu
5:Portföydeki Çek Karşılığı Nakit Kasa Tahsilat Makbuzu
6:Portföydeki Senet Karşılığı Nakit Tahsilat Makbuzu
7:Bankadan Kasaya Nakit Çekme Makbuzu
8:Kasadan Bankaya Nakit Yatırma Makbuzu
9:Kredi Virman Fişi
10:Kredi Kabul Fişi
11:Takas Çek Çıkış Bordrosu
12:Takas Çek Karşılıksız İade Bordrosu
13:Takas Çek İade Bordrosu
14:Takas Çek Ödeme Bordrosu
15:Tahsile Senet Çıkış Bordrosu
16:Tahsilden Protestolu Portföye Senet İade Bordrosu
17:Tahsil Senet İade Bordrosu
18:Tahsildeki Senet Ödeme Bordrosu
19:Teminata Çek Çıkış Bordrosu
20:Teminat Çek Karşılıksız İade Bordrosu
21:Teminat Çek İade Bordrosu
22:Teminattaki Çek Ödeme Bordrosu
23:Teminata Senet Çıkış Bordrosu
24:Teminatdan Protestolu Portföye Senet İade Bordrosu
25:Teminat Senet İade Bordrosu
26:Teminat Senet Ödeme Bordrosu
27:Verilen Firma Çeki Ödeme Bordrosu
28:Verilen Firma Senedi Ödeme Bordrosu
29:Açılış Fişi
30:Değerli Kağıtlar Açılış Fişi
31:Borç Dekontu
32:Alacak Dekontu
33:Genel Virman Dekontu
34:Gelen Havale
35:Gonderilen Havale
36:Bankadan Firma Senet ödeme
37:Kasa Masraf Fişi
38:Bankadan Firma Çek Ödeme
39:Protestolu Senet İade Giriş Bordrosu
40:Karşılıksız Çek İade Giriş Bordrosu
41:Mevduat Çek Karşılıksız İade
42:Mevduat Senet prot İade
43:Çek İade Giriş Bordrosu
44:Senet İade Giriş Bordrosu
45:Protestolu Senet İade Çıkış Bordrosu
46:Karşılıksız Çek İade Çıkış Bordrosu
47:Çek İade Çıkış Bordrosu
48:Senet İade Çıkış Bordrosu
49:Kasadan Kendi Ödeme Emrimizi Kapatma
50:Bankadan Kendi Ödeme Emrimizi Kapatma
51:Firma Kredi Kartı Ödeme
52:Kasadan Müşteri Ödeme Sözü Kapatma
53:Bankadan Müşteri Ödeme Sözü Kapatma
54:Cari Hesap Kredi Kartı Ödeme
55:Giriş Gider Makbuzu
56:Giriş Serbest Meslek Makbuzu
57:Müşteri Satıcı Virman Dekontu
58:Bankalar Virman Dekontu
59:Kur Farkı Virman Dekontu
60:Pos Satış Virman Dekontu
61:Stok Gider Pusulası
62:Karşılıksız Portföyden Portföye Transfer
63:Satış Faturası
64:Tediye Makbuzu
65:Kasa Tediye Fişi
66:Senet Çıkış Bordrosu
67:Çek Çıkış Bordrosu
68:Protestolu Portföydeki Senet Karşılığı Nakit
68:Karşılıksız Portföydeki Çek Karşılığı Nakit
70:Kasalar Arası Çek Transfer Bordrosu
71:Kasalar Arası Senet Transfer Bordrosu
72:Kasalar Arası Karşılıksız Çek Transfer Bordrosu
73:Kasalar Arası Protestolu Senet Transfer Bordrosu
74:Karşılıksız Çıkan Çek Transfer Bordrosu
75:Ödenmeyen Senet Transfer Bordrosu
76:Açılış Çek Portföye Giriş Bordrosu
77:Kredi Kartı Masraf Virman Dekontu
78:Bankada Tahsildeki Senedi Cariye İade Bordrosu
79:Bankada Teminattaki Senedi Cariye İade Bordrosu
80:Bankada Tahsildeki Çeki Cariye İade Bordrosu
81:Bankada Teminattaki Çeki Cariye İade Bordrosu
82:Ödeme Emri Giriş Bordrosu
83:Ödeme Emri Çıkış Bordrosu
84:Bankada Tahsildeki Protestolu Senedi Cariye İade Bordrosu
85:Bankada Teminattaki Protestolu Senedi Cariye İade Bordrosu
86:Bankada Tahsildeki Karşılıksız Çeki Cariye İade Bordrosu
87:Bankada Teminattaki Karşılıksız Çeki Cariye İade Bordrosu
88:Satis Serbest Meslek Makbuzu
89:Döviz Alış Belgesi
90:Döviz Satış Belgesi
91:Grup Şirketler Arası Virman Dekontu
92:Firma Havale Emri Kapatma
93:Müşteri Havale Sözü Kapatma
94:Personel Tahakkuk Virman Dekontu
95:İthalat Masraf Yansıtma Dekontu
96:Finansal Kiralama Sözleşme Evrağı
97:Cari Vade Farkı Sıfırlama Fişi
98:Tahsil Edilen Avans Makbuzu
99:Ödenen Avans Makbuzu
100:Cari Borç Dekontu
101:Cari Alacak Dekontu
102:Cari Değerli Kağıt Değerleme Virman Dekontu
103:Müşteri Kredi Kartı İade Çıkış Bordrosu
104:Bankalar Arası Kredi Kartı Transferi
105:Alternatif Döviz Dönüşüm Farkı Virman Dekontu
106:Amortisman Giderleştirme Virman Dekontu
107:Hizmet Maliyeti Yansıtma Virman Dekontu
108:Kredi Sözleşmesi Kabul Fişi
109:Kredi Sözleşmesi Taksit Ödeme Fişi
110:Kasalar Arası Virman Dekontu
111:Kredi Kabul Virman Dekontu
112:Kredi Geri Ödeme Virman Dekontu
113:Kredi Gider Tahakkuku Dekontu
114:Kredi Ana Para Vadesi Değişim Dekontu
115:Kredi Gider Vadesi Değişim Dekontu
116:Dönemsel Hizmet Giderleştirme Gelirleştirme Dekontu
117:Dönemsel Hizmet Gelecek Yıldan Gelecek Aya Aktarma Dekontu
118:Firma Kredi Kartı İade Giriş Bordrosu
119:Teminat Mektubu Giriş Bordrosu
120:Teminat Mektubu Çıkış Bordrosu
121:Depozito Giriş Bordrosu
122:Depozito Çıkış Bordrosu
123:Depozito Çekleri Portföye Transfer
124:Depozito Senetleri Portföye Transfer
125:Teminat Mektubu İade Çıkış Bordrosu
126:Teminat Mektubu İade Giriş Bordrosu
127:Depozito İade Çıkış Bordrosu
128:Depozito İade Giriş Bordrosu
129:Ödendiden Tahsile Müşteri Kredi Kartı İade Bordrosu
130:Firma Reel Kredi Kartı Kesinleştirme Virman Dekontu
131:Firma Reel Kredi Kartı Ödeme Virman Dekontu
132:Müşteri Ödeme Sözü İade Çıkış Bordrosu
133:Kısmen Ödenen Senet Transfer Bordrosu
134:Müşteri Havale Sözü İade Çıkış Bordrosu
135:Kısmen Ödenen Çek Kasaları Arası Transfer
136:Kısmen Ödenen Karşılıksız Çek Kasaları Arası Transfer
```



## Indeks Tablosu
- Indeks	Özellik	Alanlar

```

NDX_CARI_HESAP_HAREKETLERI_00	CONSTRAINT PRIMARY KEY	cha_RECno
NDX_CARI_HESAP_HAREKETLERI_01	UNIQUE	cha_RECid_DBCno, cha_RECid_RECno
NDX_CARI_HESAP_HAREKETLERI_02		cha_tarihi
NDX_CARI_HESAP_HAREKETLERI_03		cha_cari_cins, cha_kod, cha_tarihi
NDX_CARI_HESAP_HAREKETLERI_04	UNIQUE	cha_evrak_tip, cha_evrakno_seri, cha_evrakno_sira, cha_satir_no
NDX_CARI_HESAP_HAREKETLERI_05		cha_kasa_hizmet, cha_kasa_hizkod, cha_tarihi
NDX_CARI_HESAP_HAREKETLERI_06		cha_vardiya_evrak_ti, cha_vardiya_tarihi, cha_vardiya_no, cha_satici_kodu
NDX_CARI_HESAP_HAREKETLERI_07		cha_evrak_tip, cha_cari_cins, cha_kod, cha_belge_no
NDX_CARI_HESAP_HAREKETLERI_08		cha_EXIMkodu
NDX_CARI_HESAP_HAREKETLERI_09		cha_ciro_cari_kodu
NDX_CARI_HESAP_HAREKETLERI_10		cha_trefno
NDX_CARI_HESAP_HAREKETLERI_11		cha_sip_recid_dbcno, cha_sip_recid_recno

```


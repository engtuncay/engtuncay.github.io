
Fihrist

- [Tablo Adı : STOK_HAREKETLERI	Tablo : Stok Hareketleri](#tablo-ad%C4%B1--stokhareketleri-tablo--stok-hareketleri)
    - [0	sth_RECno	Integer IDENTITY](#0-sthrecno-integer-identity)
    - [1	sth_RECid_DBCno	Smallint](#1-sthreciddbcno-smallint)
    - [2	sth_RECid_RECno	Integer](#2-sthrecidrecno-integer)
    - [3	sth_SpecRECno	Integer](#3-sthspecrecno-integer)
    - [4	sth_iptal	Bit](#4-sthiptal-bit)
    - [7	sth_kilitli	Bit](#7-sthkilitli-bit)
    - [17	sth_firmano	Integer	Firma No](#17-sthfirmano-integer-firma-no)
    - [18	sth_subeno	Integer	Şube No](#18-sthsubeno-integer-%C5%9Fube-no)
    - [19	sth_tarih	DateTime	Hareket Tarihi](#19-sthtarih-datetime-hareket-tarihi)
    - [20	sth_tip	Tinyint	Hareket Tipi	0:Giriş 1:Çıkış 2:Depo Transfer](#20-sthtip-tinyint-hareket-tipi-0giri%C5%9F-1%C3%A7%C4%B1k%C4%B1%C5%9F-2depo-transfer)
    - [21	sth_cins	Tinyint	Hareket Cinsi](#21-sthcins-tinyint-hareket-cinsi)
    - [22	sth_normal_iade	Tinyint	Normal / İade ?	0:Normal 1:İade](#22-sthnormaliade-tinyint-normal--i%CC%87ade--0normal-1i%CC%87ade)
    - [23	sth_evraktip	Tinyint	Evrak Tipi](#23-sthevraktip-tinyint-evrak-tipi)
    - [24	sth_evrakno_seri	dbo.nvarchar_evrakseri	Evrak Seri No](#24-sthevraknoseri-dbonvarcharevrakseri-evrak-seri-no)
    - [25	sth_evrakno_sira	Integer	Evrak Sıra No](#25-sthevraknosira-integer-evrak-s%C4%B1ra-no)
    - [26	sth_satirno	Integer	Hareket Satır No](#26-sthsatirno-integer-hareket-sat%C4%B1r-no)
    - [27	sth_belge_no	dbo.nvarchar_belgeno	Hareket Belge No](#27-sthbelgeno-dbonvarcharbelgeno-hareket-belge-no)
    - [28	sth_belge_tarih	DateTime	Hareket Belge Tarihi](#28-sthbelgetarih-datetime-hareket-belge-tarihi)
    - [29	sth_stok_kod	Nvarchar(25)	Stok Kodu](#29-sthstokkod-nvarchar25-stok-kodu)
    - [30	sth_isk_mas1	Tinyint	İskonto Masraf Tipi](#30-sthiskmas1-tinyint-i%CC%87skonto-masraf-tipi)
    - [40	sth_sat_iskmas1	Bit	Satır İskonto Masraf mı?](#40-sthsatiskmas1-bit-sat%C4%B1r-i%CC%87skonto-masraf-m%C4%B1)
    - [52	sth_cari_cinsi	Tinyint	Cari Cinsi](#52-sthcaricinsi-tinyint-cari-cinsi)
    - [53	sth_cari_kodu	Nvarchar(25)	Cari Kodu](#53-sthcarikodu-nvarchar25-cari-kodu)
    - [64	sth_birim_pntr	Tinyint	Barkodun ilgili stoğun hangi birimine ait olduğunu gösterir.	Bkz. Tablo STOKLAR](#64-sthbirimpntr-tinyint-barkodun-ilgili-sto%C4%9Fun-hangi-birimine-ait-oldu%C4%9Funu-g%C3%B6sterir-bkz-tablo-stoklar)
    - [65	sth_tutar	Float	Hareket Tutarı](#65-sthtutar-float-hareket-tutar%C4%B1)
    - [66	sth_iskonto1	Float	1.İskonto Miktarı](#66-sthiskonto1-float-1i%CC%87skonto-miktar%C4%B1)
    - [72	sth_masraf1	Float	1.Masraf Miktarı](#72-sthmasraf1-float-1masraf-miktar%C4%B1)
    - [76	sth_vergi_pntr	Tinyint	Hareketle İlgili Vergi Bağlantısı](#76-sthvergipntr-tinyint-hareketle-i%CC%87lgili-vergi-ba%C4%9Flant%C4%B1s%C4%B1)
    - [77	sth_vergi	Float	Hareket Vergi Oranı](#77-sthvergi-float-hareket-vergi-oran%C4%B1)
    - [78	sth_masraf_vergi_pntr	Tinyint	Masraf Vergisiyle İlgili Vergi Bağlantısı](#78-sthmasrafvergipntr-tinyint-masraf-vergisiyle-i%CC%87lgili-vergi-ba%C4%9Flant%C4%B1s%C4%B1)
    - [79	sth_masraf_vergi	Float	Masraf Vergi Oranı](#79-sthmasrafvergi-float-masraf-vergi-oran%C4%B1)
    - [NDX_STOK_HAREKETLERI_00	CONSTRAINT PRIMARY KEY	sth_RECno](#ndxstokhareketleri00-constraint-primary-key-sthrecno)
    - [NDX_STOK_HAREKETLERI_01	UNIQUE	sth_RECid_DBCno, sth_RECid_RECno](#ndxstokhareketleri01-unique-sthreciddbcno-sthrecidrecno)
    - [NDX_STOK_HAREKETLERI_05	UNIQUE	sth_evraktip, sth_evrakno_seri, sth_evrakno_sira, sth_satirno](#ndxstokhareketleri05-unique-sthevraktip-sthevraknoseri-sthevraknosira-sthsatirno)
  

---


Tablo No : 16
# Tablo Adı : STOK_HAREKETLERI	Tablo : Stok Hareketleri

No	Alan Adı	Tip	Açıklama	Detay
## 0	sth_RECno	Integer IDENTITY	 	 
## 1	sth_RECid_DBCno	Smallint	 	 
## 2	sth_RECid_RECno	Integer	 	 
## 3	sth_SpecRECno	Integer	 	 
## 4	sth_iptal	Bit	 	 
5	sth_fileid	Smallint	 	 
6	sth_hidden	Bit	 	 
## 7	sth_kilitli	Bit	 	 
8	sth_degisti	Bit	 	 
9	sth_checksum	Integer	 	 
10	sth_create_user	Smallint	 	 
11	sth_create_date	DateTime	 	 
12	sth_lastup_user	Smallint	 	 
13	sth_lastup_date	DateTime	 	 
14	sth_special1	Nvarchar(4)	 	 
15	sth_special2	Nvarchar(4)	 	 
16	sth_special3	Nvarchar(4)	 	 
## 17	sth_firmano	Integer	Firma No	 
## 18	sth_subeno	Integer	Şube No	 
## 19	sth_tarih	DateTime	Hareket Tarihi	 
## 20	sth_tip	Tinyint	Hareket Tipi	0:Giriş 1:Çıkış 2:Depo Transfer
## 21	sth_cins	Tinyint	Hareket Cinsi	
0:Toptan 1:Perakende 2:Dış Ticaret 3:Stok Virman 4:Fire 5:Sarf 6:Transfer 7:Üretim 8:Fason 9:Değer Farkı 10:Sayım 11:Stok Açılış 12:İthalat-İhracat 13:Hal 14:Müstahsil 15:Müstahsil Değer Farkı 14:Kabzımal 15:Gider Pusulası
## 22	sth_normal_iade	Tinyint	Normal / İade ?	0:Normal 1:İade

## 23	sth_evraktip	Tinyint	Evrak Tipi	
2:Depo Transfer Fişi 
12:Depo Giriş Fişi 
0:Depo Çıkış Fişi 

3:Giriş Faturası 
4:Çıkış Faturası

13:Giriş İrsaliyesi 
1:Çıkış İrsaliyesi 

---
5:Stoklara İthalat Masraf Yansıtma Dekontu 
6:Stok Virman Fişi 
7:Üretim Fişi 
8:İlave Enflasyon Maliyet Fişi 
9:Stoklara İlave Maliyet Yedirme Fişi 
10:Antrepolardan Mal Millileştirme Fişi 
11:Antrepolar Arası Transfer Fişi 
14:Fason Giriş Çıkış Fişi 
15:Depolar Arası Satış Fişi 
16:Stok Gider Pusulası Fişi 
17:Depolar Arası Nakliye Fişi

## 24	sth_evrakno_seri	dbo.nvarchar_evrakseri	Evrak Seri No	 
## 25	sth_evrakno_sira	Integer	Evrak Sıra No	 
## 26	sth_satirno	Integer	Hareket Satır No	 
## 27	sth_belge_no	dbo.nvarchar_belgeno	Hareket Belge No	 
## 28	sth_belge_tarih	DateTime	Hareket Belge Tarihi	 
## 29	sth_stok_kod	Nvarchar(25)	Stok Kodu	 
## 30	sth_isk_mas1	Tinyint	İskonto Masraf Tipi	
0:Brüt toplamdan yüzde, 1:Ara toplamdan yüzde, 2:Tutar iskonto masraf, 3:Miktar başına tutar, 4:Miktar2 başına tutar, 5:Miktar3 başına tutar, 6:Bedelsiz miktar, 7:İskonto1 yuzde, 8:İskonto1 aratop yüzde, 9:İskonto2 yüzde, 10:İskonto2 aratop yüzde, 11:İskonto3 yüzde, 12:İskonto3 aratop yüzde, 13:İskonto4 yüzde, 14:İskonto4 aratop yüzde, 15:İskonto5 yüzde, 16:İskonto5 aratop yüzde, 17:İskonto6 yüzde, 18:İskonto6 aratop yüzde, 19:Masraf1 yüzde, 20:Masraf1 aratop yüzde, 21:Masraf2 yüzde, 22:Masraf2 aratop yüzde, 23:Masraf3 yüzde, 24:Masraf3 aratop yüzde
31	sth_isk_mas2	Tinyint	İskonto Masraf Tipi	Yukardaki ile Aynı
32	sth_isk_mas3	Tinyint	İskonto Masraf Tipi	Yukardaki ile Aynı
33	sth_isk_mas4	Tinyint	İskonto Masraf Tipi	Yukardaki ile Aynı
34	sth_isk_mas5	Tinyint	İskonto Masraf Tipi	Yukardaki ile Aynı
35	sth_isk_mas6	Tinyint	İskonto Masraf Tipi	Yukardaki ile Aynı
36	sth_isk_mas7	Tinyint	İskonto Masraf Tipi	Yukardaki ile Aynı
37	sth_isk_mas8	Tinyint	İskonto Masraf Tipi	Yukardaki ile Aynı
38	sth_isk_mas9	Tinyint	İskonto Masraf Tipi	Yukardaki ile Aynı
39	sth_isk_mas10	Tinyint	İskonto Masraf Tipi	Yukardaki ile Aynı
## 40	sth_sat_iskmas1	Bit	Satır İskonto Masraf mı?	 
41	sth_sat_iskmas2	Bit	Satır İskonto Masraf mı?	 
42	sth_sat_iskmas3	Bit	Satır İskonto Masraf mı?	 
43	sth_sat_iskmas4	Bit	Satır İskonto Masraf mı?	 
44	sth_sat_iskmas5	Bit	Satır İskonto Masraf mı?	 
45	sth_sat_iskmas6	Bit	Satır İskonto Masraf mı?	 
46	sth_sat_iskmas7	Bit	Satır İskonto Masraf mı?	 
47	sth_sat_iskmas8	Bit	Satır İskonto Masraf mı?	 
48	sth_sat_iskmas9	Bit	Satır İskonto Masraf mı?	 
49	sth_sat_iskmas10	Bit	Satır İskonto Masraf mı?	 
50	sth_pos_satis	Bit	Pos Satışı mı?	 
51	sth_promosyon_fl	Bit	Promosyon Var mı?	 
## 52	sth_cari_cinsi	Tinyint	Cari Cinsi	
0:Carimiz 1:Cari Personelimiz 2:Bankamız 3:Hizmetimiz 4:Kasamız 5:Giderimiz 6:Muhasebe Hesabımız 7:Personelimiz 8:Demirbaşımız 9:İthalat Dosyamız 10:Finansal Sözleşmemiz 11:Kredi Sözleşmemiz 12:Dönemsel Hizmetimiz 13:Kredi Kartımız
## 53	sth_cari_kodu	Nvarchar(25)	Cari Kodu	 
54	sth_cari_grup_no	Tinyint	Cari Grup No	 
55	sth_isemri_gider_kodu	Nvarchar(10)	İşemri Gider Kodu	 
56	sth_plasiyer_kodu	Nvarchar(25)	Plasiyer Kodu	 
57	sth_har_doviz_cinsi	Tinyint	Hareket Döviz Cinsi	Bkz. DOVIZ_KURLARI
58	sth_har_doviz_kuru	Float	Hareket Döviz Kuru	Bkz. DOVIZ_KURLARI
59	sth_alt_doviz_kuru	Float	Alternatif Döviz Kuru	Bkz. DOVIZ_KURLARI
60	sth_stok_doviz_cinsi	Tinyint	Stok Döviz Cinsi	Bkz. DOVIZ_KURLARI
61	sth_stok_doviz_kuru	Float	Stok Döviz Kuru	Bkz. DOVIZ_KURLARI
62	sth_miktar	Float	Hareket Miktarı	 
63	sth_miktar2	Float	Hareket 2. Miktarı	 
## 64	sth_birim_pntr	Tinyint	Barkodun ilgili stoğun hangi birimine ait olduğunu gösterir.	Bkz. Tablo STOKLAR
## 65	sth_tutar	Float	Hareket Tutarı	 
## 66	sth_iskonto1	Float	1.İskonto Miktarı	 
67	sth_iskonto2	Float	2.İskonto Miktarı	 
68	sth_iskonto3	Float	3.İskonto Miktarı	 
69	sth_iskonto4	Float	4.İskonto Miktarı	 
70	sth_iskonto5	Float	5.İskonto Miktarı	 
71	sth_iskonto6	Float	6.İskonto Miktarı	 
## 72	sth_masraf1	Float	1.Masraf Miktarı	 
73	sth_masraf2	Float	2.Masraf Miktarı	 
74	sth_masraf3	Float	3.Masraf Miktarı	 
75	sth_masraf4	Float	4.Masraf Miktarı	 
## 76	sth_vergi_pntr	Tinyint	Hareketle İlgili Vergi Bağlantısı	 
## 77	sth_vergi	Float	Hareket Vergi Oranı	 
## 78	sth_masraf_vergi_pntr	Tinyint	Masraf Vergisiyle İlgili Vergi Bağlantısı	 
## 79	sth_masraf_vergi	Float	Masraf Vergi Oranı	 
80	sth_netagirlik	Float	Net Ağırlık	 
81	sth_odeme_op	Integer	Ödeme Planı	 
82	sth_aciklama	Nvarchar(50)	Hareketle İlgili Açıklama	 
83	sth_sip_recid_dbcno	Smallint	Sipariş Rec Id Dbc No	Bkz. SIPARISLER
84	sth_sip_recid_recno	Integer	Sipariş Rec Id Rec No	Bkz. SIPARISLER
85	sth_fat_recid_dbcno	Smallint	Fatura Rec Id Dbc No	Bkz. CARI_HESAP_HAREKETLERI
86	sth_fat_recid_recno	Integer	Fatura Rec Id Rec No	Bkz. CARI_HESAP_HAREKETLERI
87	sth_giris_depo_no	Integer	Giriş Depo No	 
88	sth_cikis_depo_no	Integer	Çıkış Depo No	 
89	sth_malkbl_sevk_tarihi	DateTime	Mal Kabul Sevkiyat Tarihi	 
90	sth_cari_srm_merkezi	Nvarchar(25)	Cari Sorumluluk Merkezi	Bkz. SORUMLULUK_MERKEZLERI
91	sth_stok_srm_merkezi	Nvarchar(25)	Stok Sorumluluk Merkezi	Bkz. SORUMLULUK_MERKEZLERI
92	sth_fis_tarihi	DateTime	Fiş Tarihi	 
93	sth_fis_sirano	Integer	Fiş Sıra No	Bkz. MUHASEBE_FISLERI
94	sth_vergisiz_fl	Bit	Vergisiz Mi ?	 
95	sth_maliyet_ana	Float	Ana Maliyet	 
96	sth_maliyet_alternatif	Float	Alternatif Maliyet	 
97	sth_maliyet_orjinal	Float	Orjinal Maliyet	 
98	sth_adres_no	Integer	Adres No	 
99	sth_parti_kodu	Nvarchar(25)	Parti Kodu	Bkz. PARTILOT
100	sth_lot_no	Integer	Parti Lot No	Bkz. PARTILOT
101	sth_kons_recid_dbcno	Smallint	Konsinye Rec Id Dbc No	Bkz. KONSINYE_HAREKETLERI
102	sth_kons_recid_recno	Integer	Konsinye Rec Id Rec No	Bkz. KONSINYE_HAREKETLERI
103	sth_proje_kodu	Nvarchar(25)	Proje Kodu	Bkz. PROJELER
104	sth_exim_kodu	Nvarchar(25)	Exim Kodu	 
105	sth_otv_pntr	Tinyint	ÖTV İle İlgili Bağlantıısı	 
106	sth_otv_vergi	Float	ÖTV Vergisi	 
107	sth_brutagirlik	Float	Brüt Ağırlık	 
108	sth_disticaret_turu	tinyint	Dış Ticaret Türü	
0:Toptan Yurtiçi Ticaret 1:Perakende Yurtiçi Ticaret 2:İhraç Kayıtlı Yurtiçi Ticaret 3:Yurtdışı Ticaret 4:Yurtdışı Nitelikli İhraç Kayıtlı Ticaret 5:Yurtdışı Nitelikli Yurtiçi Ticaret
109	sth_otvtutari	Float	Ötv Tutarı	 
110	sth_otvvergisiz_fl	Bit	Ötv Vergili Mi ?	0:Vergili 1:Vergisiz
111	sth_oiv_pntr	Tinyint	 	 
112	sth_oiv_vergi	Float	 	 
113	sth_oivvergisiz_fl	Bit	 	 
114	sth_fiyat_liste_no	Integer	Fiyat Liste No	 
115	sth_oivtutari	Float	Özel İletişim Vergisi Tutarı	 
116	sth_Tevkifat_turu	Tinyint	Tevkifat Türü	0:Tevkifat Yok 1:Tevkifat 31 2:Tevkifat 91 3:Tevkifat 21 4:Tevkifat 32 5:Tevkifat 61 6:Tevkifat 45 7:Tevkifat Tam
117	sth_nakliyedeposu	Integer	Nakliye Deposu	 
118	sth_nakliyedurumu	Tinyint	Nakliye Durumu	0:Yolda 1:Teslim Edildi
119	sth_yetkili_recid_dbcno	Smallint	Yetkili Rec Id Dbc No	 
120	sth_yetkili_recid_recno	Integer	Yetkili Rec Id Rec No	 
121	sth_taxfree_fl	Bit	 	 
122	sth_ilave_edilecek_kdv	Float	İlave Edilecek Kdv	 
123	sth_ismerkezi_kodu	Nvarchar(25)	İş Merkezi Kodu	 

Indeks Tablosu
Indeks	Özellik	Alanlar

## NDX_STOK_HAREKETLERI_00	CONSTRAINT PRIMARY KEY	sth_RECno
## NDX_STOK_HAREKETLERI_01	UNIQUE	sth_RECid_DBCno, sth_RECid_RECno
NDX_STOK_HAREKETLERI_02		sth_tarih
NDX_STOK_HAREKETLERI_03		sth_cari_cinsi, sth_cari_kodu, sth_tarih
NDX_STOK_HAREKETLERI_04		sth_stok_kod, sth_tarih
## NDX_STOK_HAREKETLERI_05	UNIQUE	sth_evraktip, sth_evrakno_seri, sth_evrakno_sira, sth_satirno
NDX_STOK_HAREKETLERI_06		sth_plasiyer_kodu, sth_tarih
NDX_STOK_HAREKETLERI_07		sth_fat_recid_dbcno, sth_fat_recid_recno
NDX_STOK_HAREKETLERI_08		sth_sip_recid_dbcno, sth_sip_recid_recno
NDX_STOK_HAREKETLERI_10		sth_cari_cinsi, sth_cari_kodu, sth_stok_kod, sth_tarih
NDX_STOK_HAREKETLERI_11		sth_stok_kod, sth_cari_cinsi, sth_cari_kodu, sth_tarih<
NDX_STOK_HAREKETLERI_12		sth_exim_kodu
NDX_STOK_HAREKETLERI_13		sth_isemri_gider_kodu
NDX_STOK_HAREKETLERI_14	NONCLUSTERED	sth_stok_kod, sth_cins INCLUDE (sth_tarih, sth_tip, sth_miktar, sth_giris_depo_no, sth_cikis_depo_no)
NDX_STOK_HAREKETLERI_15		sth_kons_recid_dbcno, sth_kons_recid_recno

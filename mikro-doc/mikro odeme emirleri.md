Tablo No : 54

Tablo Adı : ODEME_EMIRLERI	Tablo : Senet Çek Kartları

No	Alan Adı	Tip	Açıklama	Detay

```
0	sck_RECno	Integer IDENTITY	 	 
1	sck_RECid_DBCno	Smallint	 	 
2	sck_RECid_RECno	Integer	 	 
3	sck_SpecRECno	Integer	 	 
4	sck_iptal	Bit	 	 
5	sck_fileid	Smallint	 	 
6	sck_hidden	Bit	 	 
7	sck_kilitli	Bit	 	 
8	sck_degisti	Bit	 	 
9	sck_checksum	Integer	 	 
10	sck_create_user	Smallint	 	 
11	sck_create_date	DateTime	 	 
12	sck_lastup_user	Smallint	 	 
13	sck_lastup_date	DateTime	 	 
14	sck_special1	Nvarchar(4)	 	 
15	sck_special2	Nvarchar(4)	 	 
16	sck_special3	Nvarchar(4)	 	 
17	sck_firmano	Integer	Firma No	 
18	sck_subeno	Integer	Şube No	 
19	sck_tip	Tinyint	Senet Çek Tipi	0:Müşteri Çeki 1:Müşteri Senedi 2:Kendi Çekimiz 3:Kendi Senedimiz 4:Müşteri Havale Sözü 5:Müşteri Ödeme Sözü 6:Müşteri Kredi Kartı 7:Kendi Havale Emrimiz 8:Kendi Ödeme Emrimiz 9:Kendi Kredi Kartımız 10:Müşteri Teminat Mektubu 11:Firma Teminat Mektubu 12:Depozito Çeki 13:Depozito Senedi
20	sck_refno	Nvarchar(25)	Senet Çek Referans No	 
21	sck_bankano	Nvarchar(25)	Banka No	Bkz. BANKALAR
22	sck_borclu	Nvarchar(50)	Borçlu Adı	 
23	sck_vdaire_no	Nvarchar(40)	Vergi Daire Numarası	 
24	sck_vade	DateTime	Vade Tarihi	 
25	sck_tutar	Float	Tutar	 
26	sck_doviz	Tinyint	Döviz Cinsi	Bkz. DOVIZ_KURLARI
27	sck_odenen	Float	Ödenen Miktar	 
28	sck_degerleme_islendi	Tinyint	Değerleme işlendi mi?	0:Kur farkı değerlenmedi 1:Kur farkı hesaba işlendi
29	sck_banka_adres1	Nvarchar(50)	Banka Adresi	 
30	sck_sube_adres2	Nvarchar(50)	Şube Adresi	 
31	sck_borclu_tel	Nvarchar(15)	Borçlı Telefon Numarası	 
32	sck_hesapno_sehir	Nvarchar(30)	Hesap No (Şehir)	 
33	sck_no	Nvarchar(25)	Senet Çek No	 
34	sck_duzen_tarih	DateTime	Düzenlenme Tarihi	 
35	sck_sahip_cari_cins	Tinyint	Senet-Çek Sahibi Cari Cinsi	0:Carimiz 1:Cari Personelimiz 2:Bankamız 3:Hizmetimiz 4:Kasamız 5:Giderimiz 6:Muhasebe Hesabımız 7:Personelimiz 8:Demirbaşımız 9:İthalat Dosyamız 10:Finansal Sözleşmemiz 11:Kredi Sözleşmemiz 12:Dönemsel Hizmetimiz 13:Kredi Kartımız
36	sck_sahip_cari_kodu	Nvarchar(25)	Senet-Çek Sahibi Cari Kodu	Bkz. CARI_HESAPLAR
37	sck_sahip_cari_grupno	Tinyint	Senet-Çek Sahibi Grup No	 
38	sck_nerede_cari_cins	Tinyint	Nerede Cari Cinsi	0:Carimiz 1:Cari Personelimiz 2:Bankamız 3:Hizmetimiz 4:Kasamız 5:Giderimiz 6:Muhasebe Hesabımız 7:Personelimiz 8:Demirbaşımız 9:İthalat Dosyamız 10:Finansal Sözleşmemiz 11:Kredi Sözleşmemiz 12:Dönemsel Hizmetimiz 13:Kredi Kartımız
39	sck_nerede_cari_kodu	Nvarchar(25)	Nerede Cari Kodu	 
40	sck_nerede_cari_grupno	Tinyint	Nerede Grup No	 
41	sck_ilk_hareket_tarihi	DateTime	İlk Hareket Tarihi	 
42	sck_ilk_evrak_seri	dbo.nvarchar_evrakseri	İlk Evrak Seri No	 
43	sck_ilk_evrak_sira_no	Integer	İlk Evrak Sıra No	 
44	sck_ilk_evrak_satir_no	Integer	İlk Evrak Satır No	 
45	sck_son_hareket_tarihi	DateTime	Son Hareket Tarihi	 
46	sck_doviz_kur	Float	Döviz Kuru	Bkz. DOVIZ_KURLARI
47	sck_sonpoz	Tinyint	Senet Çek Pozisyonu	0:Portföyde 1:Ciro 2:Tahsilde 3:Teminatta 4:İade Edilen 5:Diğer3 6:Ödenmedi Portföyde 7:Ödenmedi İade 8:İcrada 9:Kısmen Ödendi 10:Ödendi
48	sck_imza	Tinyint	İmza Sahibi	0:Kendisi 1:Müşterisi
49	sck_srmmrk	Nvarchar(25)	Sorumluluk Merkezi	Bkz. SORUMLULUK_MERKEZLERI
50	sck_kesideyeri	Nvarchar(14)	Keşide Yeri	 
51	Sck_TCMB_Banka_kodu	Nvarchar(4)	TCMB Banka Kodu	 
52	Sck_TCMB_Sube_kodu	Nvarchar(8)	TCMB Şube Kodu	 
53	Sck_TCMB_İL_kodu	Nvarchar(3)	TCMB İl Kodu	 
54	SckTasra_fl	Bit	Senet Çek Taşra mı?	 
55	sck_projekodu	Nvarchar(25)	Proje Kodu	 
56	sck_masraf1	Float	Masraf1	 
57	sck_masraf1_isleme	Tinyint	Masraf1 İşleme	0:Müşteri Ödeyecek 1:Masrafa İşlenecek
58	sck_masraf2	Float	Masraf2	 
59	sck_masraf2_isleme	Tinyint	Masraf2 İşleme	0:Müşteri Ödeyecek 1:Masrafa İşlenecek
60	sck_odul_katkisi_tutari	Float	Ödül Katkısı Tutarı	 
61	sck_servis_komisyon_tutari	Float	Servis Komisyon Tutarı	 
62	sck_erken_odeme_faiz_tutari	Float	Erken Ödeme Faiz Tutarı	 
63	sck_odul_katkisi_tutari_islendi_fl	Bit	Ödül Katkısı Tutarı İşlendi Mi?	 
64	sck_servis_komisyon_tutari_islendi_fl	Bit	Servis Komisyon Tutarı İşlendi Mi?	 
65	sck_erken_odeme_faiz_tutari_islendi_fl	Bit	Erken Ödeme Faiz Tutarı İşlendi Mi?	 
66	sck_kredi_karti_tipi	Tinyint	Kredi Kartı Tipi	0:Kendi Kredi Kartı 1:Başka Banka Kredi Kartı 2:Bonus Puan Kullanımı
67	sck_taksit_sayisi	Smallint	Taksit Sayısı	 
68	sck_kacinci_taksit	Smallint	Kaçıncı Taksit	 
69	sck_uye_isyeri_no	Nvarchar(25)	Üye İş Yeri No	 
70	sck_kredi_karti_no	Nvarchar(16)	Kredi Kartı No	 
71	sck_provizyon_kodu	Nvarchar(10)	Provizyon Kodu	
```
 

Indeks Tablosu

```
Indeks	Özellik	Alanlar

NDX_ODEME_EMIRLERI_00	CONSTRAINT PRIMARY KEY	sck_RECno
NDX_ODEME_EMIRLERI_01	UNIQUE	sck_RECid_DBCno, sck_RECid_RECno
NDX_ODEME_EMIRLERI_02	UNIQUE	sck_tip, sck_refno
NDX_ODEME_EMIRLERI_03		sck_tip, sck_sonpoz, sck_vade
NDX_ODEME_EMIRLERI_04		sck_vade
NDX_ODEME_EMIRLERI_05		sck_tip, sck_sahip_cari_cins, sck_sahip_cari_kodu, sck_sonpoz, sck_vade
NDX_ODEME_EMIRLERI_06		Sck_TCMB_Banka_kodu, Sck_TCMB_Sube_kodu, sck_no
NDX_ODEME_EMIRLERI_07		sck_srmmrk
NDX_ODEME_EMIRLERI_08		sck_sahip_cari_cins, sck_sahip_cari_kodu, sck_vade
```



Database Yapısı

Başlık (Header) Kısmı Açıklaması ve Genel Notlar İçin Tıklayın
Tablo No : 31

Tablo Adı : CARI_HESAPLAR	Tablo : Cari Kartları

No	Alan Adı	Tip	Açıklama	Detay
0	cari_RECno	Integer IDENTITY	 	 

1	cari_RECid_DBCno	Smallint	 	 

2	cari_RECid_RECno	Integer	 	 

3	cari_SpecRECno	Integer	 	 

4	cari_iptal	Bit	 	 

5	cari_fileid	Smallint	 	 

6	cari_hidden	Bit	 	 

7	cari_kilitli	Bit	 	 

8	cari_degisti	Bit	 	 

9	cari_checksum	Integer	 	 
10	cari_create_user	Smallint	 	 
11	cari_create_date	DateTime	 	 
12	cari_lastup_user	Smallint	 	 
13	cari_lastup_date	DateTime	 	 
14	cari_special1	Nvarchar(4)	 	 
15	cari_special2	Nvarchar(4)	 	 
16	cari_special3	Nvarchar(4)	 	 
17	cari_kod	Nvarchar(25)	Cari Kodu	 
18	cari_unvan1	Nvarchar(50)	Ünvan 1	 
19	cari_unvan2	Nvarchar(50)	Ünvan 2	 

20	cari_hareket_tipi	Tinyint	Cari Hareket Tipi	0:Mal ve Hizmet Alınır ve Satılır 1:Mal ve Hizmet Sadece Satılır 2:Mal ve Hizmet Sadece Alınır 3:Sadece Parasal Hareket Yapılır 4:Cari Hareket Yapılmaz

21	cari_baglanti_tipi	Tinyint	Cari Bağlantı Tipi	0:Müşteri 1:Satıcı 2:Diğer Cari 3:Dağıtıcı 4:Bayi 5:Hedef Müşteri 6:Hedef Bayi 7:Alt Bayi 8:Bağlı Ortaklık

22	cari_stok_alim_cinsi	Tinyint	Stok Alım Cinsi	0:Toptan ve Perakende 1:Toptan 2:Perakende

23	cari_stok_satim_cinsi	Tinyint	Stok Satım Cinsi	0:Toptan ve Perakende 1:Toptan 2:Perakende

24	cari_muh_kod	Nvarchar(40)	Cari Hesap Muhasebe Kodu	Bkz. MUHASEBE_HESAP_PLANI

25	cari_muh_kod1	Nvarchar(40)	Cari Hesap Muhasebe Kodu1	Bkz. MUHASEBE_HESAP_PLANI

26	cari_muh_kod2	Nvarchar(40)	Cari Hesap Muhasebe Kodu2	Bkz. MUHASEBE_HESAP_PLANI

27	cari_doviz_cinsi	Tinyint	Döviz Cinsi	Bkz. DOVIZ_KURLARI
28	cari_doviz_cinsi1	Tinyint	Döviz Cinsi1	Bkz. DOVIZ_KURLARI
29	cari_doviz_cinsi2	Tinyint	Döviz Cinsi2	Bkz. DOVIZ_KURLARI

30	cari_vade_fark_yuz	Float	Vade Fark Yüzdesi	 
31	cari_vade_fark_yuz1	Float	Vade Fark Yüzdesi 1	 
32	cari_vade_fark_yuz2	Float	Vade Fark Yüzdesi 2	 

33	cari_KurHesapSekli	Tinyint	Kur Hesaplama Şekli	1:Döviz Alış 2:Döviz Satış
3:Efektif Alış 4:Efektif Satış

34	cari_vdaire_adi	Nvarchar(50)	Vergi Dairesi	 
35	cari_vdaire_no	Nvarchar(15)	Vergi Dairesi No	 
36	cari_sicil_no	Nvarchar(15)	Sicil No	 
37	cari_VergiKimlikNo	Nvarchar(10)	Cari Vergi Kimlik No	 
38	cari_satis_fk	Integer	Cari Satış Fiyat Kodu	Satışlarda hangi stok satış fiyatının uygulanacağını belirtir.
Bkz. STOKLAR
39	cari_odeme_cinsi	Tinyint	Cari Ödeme Cinsi	0:Serbest 1:Haftalık 2:Aylık 3:15 Günlük
40	cari_odeme_gunu	Tinyint	Ödeme Günü	 
41	cari_odemeplan_no	Integer	Ödeme Plan No	Bkz. ODEME_PLANLARI
42	cari_opsiyon_gun	Integer	Cari Opsiyon Gün	 
43	cari_cariodemetercihi	Tinyint	Cari Ödeme Tercihi	0:Nakit 1:Müşteri Çeki 2:Firma Çeki 
3:Müşteri Senedi 4:Firma Senedi 5:Havale 6:Ödeme Emri 7:Doğrudan Havale
44	cari_fatura_adres_no	Integer	Fatura Adres No	Bkz. CARI_HESAP_ADRESLERI
45	cari_sevk_adres_no	Integer	Sevk Adres No	Bkz. CARI_HESAP_ADRESLERI
46	cari_banka_tcmb_kod1	Nvarchar(4)	Banka Kodu 1	 
47	cari_banka_tcmb_subekod1	Nvarchar(8)	Banka Şube Kodu 1	 
48	cari_banka_tcmb_ilkod1	Nvarchar(3)	Banka İl Kodu 1	 
49	cari_banka_hesapno1	Nvarchar(30)	Banka Hesap No 1	 
50	cari_banka_tcmb_kod2	Nvarchar(4)	Banka Kodu 2	 
51	cari_banka_tcmb_subekod2	Nvarchar(8)	Banka Şube Kod 2	 
52	cari_banka_tcmb_ilkod2	Nvarchar(3)	Banka İl Kodu 2	 
53	cari_banka_hesapno2	Nvarchar(30)	Banka Hesap No 2	 
54	cari_banka_tcmb_kod3	Nvarchar(4)	Banka Kodu 3	 
55	cari_banka_tcmb_subekod3	Nvarchar(8)	Banka Şube Kodu 3	 
56	cari_banka_tcmb_ilkod3	Nvarchar(3)	Banka İl Kodu 3	 
57	cari_banka_hesapno3	Nvarchar(30)	Banka Hesap No 3	 
58	cari_EftHesapNum	Tinyint	Cari Eft Hesap Numarası	 
59	cari_Ana_cari_kodu	Nvarchar(25)	Ana Cari Kodu	 
60	cari_satis_isk_kod	Nvarchar(4)	Cari Satış İskonto Kodu	Bkz. STOK_CARI_ISKONTO_TANIMLARI
61	cari_sektor_kodu	Nvarchar(25)	Sektör Kodu	Bkz. STOK_SEKTORLERI
62	cari_bolge_kodu	Nvarchar(25)	Cari Bölge Kodu	Bkz. CARI_HESAP_BOLGELERI
63	cari_grup_kodu	Nvarchar(25)	Cari Grup Kodu	Bkz. CARI_HESAP_GRUPLARI
64	cari_temsilci_kodu	Nvarchar(25)	Cari Temsilci Kodu	Bkz. PERSONELLER
65	cari_muhartikeli	Nvarchar(10)	Muhasebe Kod Artikeli	Bkz. MUHASEBE_FISLERI
66	cari_firma_acik_kapal	Bit	Firma Açık / Kapalı?	0:Açık 1:Kapalı
67	cari_BUV_tabi_fl	Bit	 	 
68	cari_cari_kilitli_flg	Bit	Cari Kilitli Mi?	 
69	cari_etiket_bas_fl	Bit	Etiket Basılsın Mı ?	 
70	cari_Detay_incele_flg	Bit	Detay İncelensin Mi ?	 
71	cari_efatura_fl	Bit	e-Fatura ?	 
72	cari_POS_ongpesyuzde	Float	POS Öngörülen Peşinat Yüzdesi	 
73	cari_POS_ongtaksayi	Float	POS Öngörülen Taksit Sayısı	 
74	cari_POS_ongIskOran	Float	POS Öngörülen İskonto Oranı	 
75	cari_kaydagiristarihi	DateTime	Kayıt Tarihi	 
76	cari_KabEdFCekTutar	Float	Kabul Ed. Firma Çek Tutarı	 
77	cari_hal_caritip	Tinyint	Hal Cari Tipi	0:Tüccar 1:Müstahsil 2:Çiftçi
78	cari_HalKomYuzdesi	Float	Hal Komisyon Yüzdesi	 
79	cari_TeslimSuresi	Smallint	Cari Teslim Süresi	 
80	cari_wwwadresi	Nvarchar(30)	Cari Web Adresi	 
81	cari_EMail	Nvarchar(80)	Cari e-Mail Adresi	 
82	cari_CepTel	Nvarchar(20)	Cari Cep Telefonu	 
83	cari_VarsayilanGirisDepo	Integer	Varsayılan Giriş Depo	 
84	cari_VarsayilanCikisDepo	Integer	Varsayılan Çıkış Depo	 
85	cari_Portal_Enabled	Bit	Portal erişimi açık mı?	 
86	cari_Portal_PW	Nvarchar(127)	Portal Ulaşım Şifresi	 
87	cari_BagliOrtaklisa_Firma	Integer	Bağlı Ortaklık İse Firma No	 
88	cari_kampanyakodu	Nvarchar(4)	Kampanya Kodu	 
89	cari_b_bakiye_degerlendirilmesin_fl	Bit	Borç Bakiye Değerlendirilmesin ?	 
90	cari_a_bakiye_degerlendirilmesin_fl	Bit	Alacak Bakiye Değerlendirilmesin ?	 
91	cari_b_irsbakiye_degerlendirilmesin_fl	Bit	Borç İrsaliye Bakiye Değerlendirilmesin ?	 
92	cari_a_irsbakiye_degerlendirilmesin_fl	Bit	Alacak İrsaliye Bakiye Değerlendirilmesin ?	 
93	cari_b_sipbakiye_degerlendirilmesin_fl	Bit	Borç Sipariş Bakiye Değerlendirilmesin ?	 
94	cari_a_sipbakiye_degerlendirilmesin_fl	Bit	Alacak Sipariş Bakiye Değerlendirilmesin ?	 
95	cari_AvmBilgileri1KiraKodu	Nvarchar(25)	Kira Kodu	 
96	cari_AvmBilgileri1TebligatSekli	Tinyint	Tebligat Şekli	0:Elden 1:Mail 2:Kargo 3:Kurye
97	cari_AvmBilgileri2KiraKodu	Nvarchar(25)	Kira Kodu	 
98	cari_AvmBilgileri2TebligatSekli	Tinyint	Tebligat Şekli	0:Elden 1:Mail 2:Kargo 3:Kurye
99	cari_AvmBilgileri3KiraKodu	Nvarchar(25)	Kira Kodu	 
100	cari_AvmBilgileri3TebligatSekli	Tinyint	Tebligat Şekli	0:Elden 1:Mail 2:Kargo 3:Kurye
101	cari_AvmBilgileri4KiraKodu	Nvarchar(25)	Kira Kodu	 
102	cari_AvmBilgileri4TebligatSekli	Tinyint	Tebligat Şekli	0:Elden 1:Mail 2:Kargo 3:Kurye
103	cari_AvmBilgileri5KiraKodu	Nvarchar(25)	Kira Kodu	 
104	cari_AvmBilgileri5TebligatSekli	Tinyint	Tebligat Şekli	0:Elden 1:Mail 2:Kargo 3:Kurye
105	cari_AvmBilgileri6KiraKodu	Nvarchar(25)	Kira Kodu	 
106	cari_AvmBilgileri6TebligatSekli	Tinyint	Tebligat Şekli	0:Elden 1:Mail 2:Kargo 3:Kurye
107	cari_AvmBilgileri7KiraKodu	Nvarchar(25)	Kira Kodu	 
108	cari_AvmBilgileri7TebligatSekli	Tinyint	Tebligat Şekli	0:Elden 1:Mail 2:Kargo 3:Kurye
109	cari_AvmBilgileri8KiraKodu	Nvarchar(25)	Kira Kodu	 
110	cari_AvmBilgileri8TebligatSekli	Tinyint	Tebligat Şekli	0:Elden 1:Mail 2:Kargo 3:Kurye
111	cari_AvmBilgileri9KiraKodu	Nvarchar(25)	Kira Kodu	 
112	cari_AvmBilgileri9TebligatSekli	Tinyint	Tebligat Şekli	0:Elden 1:Mail 2:Kargo 3:Kurye
113	cari_AvmBilgileri10KiraKodu	Nvarchar(25)	Kira Kodu	 
114	cari_AvmBilgileri10TebligatSekli	Tinyint	Tebligat Şekli	0:Elden 1:Mail 2:Kargo 3:Kurye
115	cari_KrediRiskTakibiVar_flg	Bit	Kredi Risk Takibi Var Mı ?	 
116	cari_ufrs_fark_muh_kod	Nvarchar(40)	Ufrs Fark Muhasebe Kodu	 
117	cari_ufrs_fark_muh_kod1	Nvarchar(40)	Ufrs Fark Muhasebe Kodu	 
118	cari_ufrs_fark_muh_kod2	Nvarchar(40)	Ufrs Fark Muhasebe Kodu	 
119	cari_odeme_sekli	Tinyint	Ödeme Şekli	0:Vadeye Göre 1:Satış Üzerinden
120	cari_TeminatMekAlacakMuhKodu	Nvarchar(40)	Teminat Mektubu Alacak Muhasebe Kodu	 
121	cari_TeminatMekAlacakMuhKodu1	Nvarchar(40)	Teminat Mektubu Alacak Muhasebe Kodu	 
122	cari_TeminatMekAlacakMuhKodu2	Nvarchar(40)	Teminat Mektubu Alacak Muhasebe Kodu	 
123	cari_TeminatMekBorcMuhKodu	Nvarchar(40)	Teminat Mektubu Borç Muhasebe Kodu	 
124	cari_TeminatMekBorcMuhKodu1	Nvarchar(40)	Teminat Mektubu Borç Muhasebe Kodu	 
125	cari_TeminatMekBorcMuhKodu2	Nvarchar(40)	Teminat Mektubu Borç Muhasebe Kodu	 
126	cari_VerilenDepozitoTeminatMuhKodu	Nvarchar(40)	Verilen Depozito Teminat Muhasebe Kodu	 
127	cari_VerilenDepozitoTeminatMuhKodu1	Nvarchar(40)	Verilen Depozito Teminat Muhasebe Kodu	 
128	cari_VerilenDepozitoTeminatMuhKodu2	Nvarchar(40)	Verilen Depozito Teminat Muhasebe Kodu	 
129	cari_AlinanDepozitoTeminatMuhKodu	Nvarchar(40)	Alınan Depozito Teminat Muhasebe Kodu	 
130	cari_AlinanDepozitoTeminatMuhKodu1	Nvarchar(40)	Alınan Depozito Teminat Muhasebe Kodu	 
131	cari_AlinanDepozitoTeminatMuhKodu2	Nvarchar(40)	Alınan Depozito Teminat Muhasebe Kodu	 
132	cari_def_efatura_cinsi	Tinyint	Varsayılan e-Fatura Cinsi	0:Temel Fatura 1:Ticari Fatura 2:Yolcu Beraberinde Fatura 3:İhracat
133	cari_otv_tevkifatina_tabii_fl	Bit	Ötv Tevkifatına Tabi Mi ?	 
134	cari_KEP_adresi	Nvarchar(80)	Kayıtlı e-Posta (KEP) Adresi	 
135	cari_efatura_baslangic_tarihi	DateTime	e-Fatura Başlangıç Tarihi	 
136	cari_mutabakat_mail_adresi	Nvarchar(80)	Mutabakat e-Posta Adresi	 
137	cari_mersis_no	Nvarchar(25)	Mersis Numarası	 
138	cari_istasyon_cari_kodu	Nvarchar(25)	Akaryakıt İstasyonu Cari Kodu	 
139	cari_gonderionayi_sms	Bit	Sms Gönderme Onayı Var Mı ?	 
140	cari_gonderionayi_email	Bit	e-Posta Gönderme Onayı Var Mı ?	 
141	cari_eirsaliye_fl	Bit	e-İrsaliye Mi ?	 
142	cari_eirsaliye_baslangic_tarihi	DateTime	e-İrsaliye Başlangıç Tarihi	 
143	cari_vergidairekodu	Nvarchar(10)	Vergi Dairesi Kodu	 
144	cari_kamu_kurumu_fl	Bit	e-Fatura Uygulamasına Tabi Kamu Kurumu Mu ?	 
Indeks Tablosu
Indeks	Özellik	Alanlar
NDX_CARI_HESAPLAR_00	CONSTRAINT PRIMARY KEY	cari_RECno
NDX_CARI_HESAPLAR_01	UNIQUE	cari_RECid_DBCno, cari_RECid_RECno
NDX_CARI_HESAPLAR_02	UNIQUE	cari_kod
NDX_CARI_HESAPLAR_03		cari_unvan1
NDX_CARI_HESAPLAR_04	UNIQUE	cari_sektor_kodu, cari_kod
NDX_CARI_HESAPLAR_05	UNIQUE	cari_grup_kodu, cari_kod
NDX_CARI_HESAPLAR_06	UNIQUE	cari_temsilci_kodu, cari_kod
NDX_CARI_HESAPLAR_07	UNIQUE	cari_bolge_kodu, cari_kod
NDX_CARI_HESAPLAR_08	UNIQUE	cari_kaydagiristarihi, cari_kod
NDX_CARI_HESAPLAR_09		cari_Ana_cari_kodu
NDX_CARI_HESAPLAR_10		cari_vdaire_no
NDX_CARI_HESAPLAR_11		cari_VergiKimlikNo
Güncellenme Tarihi : 28.02.2019 - Bu doküman ile ilgili bize yazın
©2019 Mikro Yazılımevi A.Ş. Tüm Hakları Saklıdır.
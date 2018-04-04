36	**cha_cari_cins**	 Tinyint	Cari Cinsi	

0:Carimiz 1:Cari Personelimiz 2:Bankamız 3:Hizmetimiz 4:Kasamız 

5:Giderimiz 6:Muhasebe Hesabımız 7:Personelimiz 8:Demirbaşımız 

9:İthalat Dosyamız 10:Finansal Sözleşmemiz 11:Kredi Sözleşmemiz 12:Dönemsel Hizmetimiz 

13:Kredi Kartımız



24	**cha_tip**	Tinyint	Hareket Tipi	0:Borç 1:Alacak

26	**cha_normal_Iade**	Tinyint	Normal/Iade?	0:Normal 1:İade

27	**cha_tpoz**	Tinyint	Cari Pozisyonu	0:Açık 1:Kapalı

28	cha_ticaret_turu	Tinyint	Dış Ticaret Türü	
0:Toptan Yurt İçi Ticaret 1:Perakende Yurt İçi Ticaret 2:İhraç kayıtlı Yurt İçi Ticaret 3:Yurt Dışı Ticaret 4:Yurt Dışı Nitelikli İhraç Kayıtlı Ticaret 5:Yurt Dışı Nitelikli Yurt İçi Ticaret


20	cha_evrakno_seri	dbo.nvarchar_evrakseri	Evrak Seri No	 
21	cha_evrakno_sira	Integer	Evrak Sıra No	 
22	cha_satir_no	Integer	Hareket Satır No	 
23	cha_tarihi	DateTime	Hareket Tarihi


111	cha_sntck_poz	Tinyint	Senet Çek Pozisyonu	0:Portföyde 1:Ciro 2:Tahsilde 3:Teminatta 4:İade Edilen 5:Diğer3
6:Ödenmedi Portföyde 7:Ödenmedi İade 8:İcrada 9:Kısmen Ödendi 10:Ödendi

137	cha_e_islem_turu	Tinyint	e-İşlem Türü	0:Tanımsız 1:e-Belge 2:e-Arşiv

138	cha_fatura_belge_turu	Tinyint	Fatura Belge Türü	0:Fatura 1:Masraf Listesi 2:Perakende Fiş 3:Z Raporu 4:Navlun 5:Bilet 6:Poliçe 7:Zeyilname 8:Fon 9:Kontrat 10:Müstahsil 11:Diğer 12:Serbest Bölge Faturası


Indeks Tablosu
Indeks	Özellik	Alanlar
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
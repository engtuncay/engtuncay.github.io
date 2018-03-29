
RETURN
(

### -- Cari kod indeksine göre olan kayıtlar

SELECT  TOP 100 PERCENT
cha_RECno AS [msg_S_0088], -- KAYIT NO
cha_RECid_DBCno AS [#msg_S_0720], --DBCNO
cha_RECid_RECno AS [#msg_S_0998], --DATABASE NO
cha_kod AS [#msg_S_0200], -- CARİ KODU
dbo.fn_CarininIsminiBul(cha_cari_cins, cha_kod) AS [#msg_S_0201], -- CARİ İSMİ
(select fir_unvan from dbo.FIRMALAR WITH (NOLOCK) where fir_sirano=cha_firmano) AS [#msg_S_0879], -- FİRMA UNVANI
cha_tarihi AS [msg_S_0089], -- TARİH
cha_evrakno_seri AS [msg_S_0090], -- SERİ
cha_evrakno_sira AS [msg_S_0091], -- SIRA
cha_belge_tarih AS [#msg_S_0092], -- BELGE TARİHİ
cha_belge_no AS [#msg_S_0093], -- BELGE NO
CHEvrUzunIsim AS [msg_S_0094], -- EVRAK TİPİ
CHCinsIsim AS [msg_S_0003], -- CİNSİ
cha_cinsi AS [#msg_S_0158], -- HAREKET CİNSİ
NORMALCARIGRUP AS [#msg_S_0096], -- GRUBU
cha_grupno AS [#msg_S_1712], -- CARİ HESAP GRUP NO
cha_srmrkkodu AS [msg_S_0118], -- SRM.MRK.KODU
dbo.fn_SorumlulukMerkeziIsmi(cha_srmrkkodu) AS [msg_S_0119], -- SRM.MRK.İSMİ
NIIsim AS [msg_S_0097], -- N/İ
cha_aciklama AS [#msg_S_0085], -- AÇIKLAMA
cha_satici_kodu AS [msg_S_1129], -- SORUMLU KODU
dbo.fn_CarininIsminiBul(1,cha_satici_kodu) AS [msg_S_1130], -- SORUMLU İSMİ
CHA_VADE_TARIHI AS [msg_S_0098], -- VADE TARİH
DATEDIFF(Day,cha_tarihi,CHA_VADE_TARIHI) AS [msg_S_0099], -- VADE GÜN
'' AS [#msg_S_0159], -- DEPO
cha_miktari AS [#msg_S_0165], -- MİKTAR
CHTipIsim AS [msg_S_0100], -- B/A
CASE WHEN CHA_CARI_BORC_ALACAK_TIP in (0,2) THEN CHA_CARI_MEBLAG_ANA ELSE 0 END AS [msg_S_0101\T], -- ANA DÖVİZ BORÇ
CASE WHEN CHA_CARI_BORC_ALACAK_TIP in (1,2) THEN CHA_CARI_MEBLAG_ANA ELSE 0 END AS [msg_S_0102\T], -- ANA DÖVİZ ALACAK
CASE WHEN CHA_CARI_BORC_ALACAK_TIP=0 THEN CHA_CARI_MEBLAG_ANA
WHEN CHA_CARI_BORC_ALACAK_TIP=1 THEN CHA_CARI_MEBLAG_ANA * (-1.0)
ELSE 0
END AS [#msg_S_0103\T], -- ANA DÖVİZ TUTAR
CAST ( 0 AS FLOAT ) AS [msg_S_1706], -- ANA DÖVİZ BORÇ BAKİYE
CAST ( 0 AS FLOAT ) AS [msg_S_1707], -- ANA DÖVİZ ALACAK BAKİYE
CAST ( 0 AS FLOAT ) AS [#msg_S_0957], -- ANA DÖVİZ BAKİYE
cha_altd_kur AS [msg_S_0104], -- ALT.DOVİZ KUR
CASE WHEN CHA_CARI_BORC_ALACAK_TIP in (0,2) THEN CHA_CARI_MEBLAG_ALT ELSE 0 END AS [msg_S_0105\T], -- ALT. DÖVİZ BORÇ
CASE WHEN CHA_CARI_BORC_ALACAK_TIP in (1,2) THEN CHA_CARI_MEBLAG_ALT ELSE 0 END AS [msg_S_0106\T], -- ALT. DÖVİZ ALACAK
CASE WHEN CHA_CARI_BORC_ALACAK_TIP=0 THEN CHA_CARI_MEBLAG_ALT
WHEN CHA_CARI_BORC_ALACAK_TIP=1 THEN CHA_CARI_MEBLAG_ALT * (-1.0)
ELSE 0
END AS [#msg_S_0107\T], -- ALT. DÖVİZ TUTAR
CAST ( 0 AS FLOAT ) AS [msg_S_1708], -- Alternatif DÖVİZ BORÇ BAKİYE
CAST ( 0 AS FLOAT ) AS [msg_S_1709], -- Alternatif DÖVİZ ALACAK BAKİYE
CAST ( 0 AS FLOAT ) AS [#msg_S_1714], -- Alternatif DÖVİZ BAKİYE
cha_d_kur AS [msg_S_0108], -- ORJ.DOVİZ KUR
CASE WHEN CHA_CARI_BORC_ALACAK_TIP in (0,2) THEN CHA_CARI_MEBLAG_ORJ ELSE 0 END AS [msg_S_0109\T], -- ORJ. DÖVİZ BORÇ
CASE WHEN CHA_CARI_BORC_ALACAK_TIP in (1,2) THEN CHA_CARI_MEBLAG_ORJ ELSE 0 END AS [msg_S_0110\T], -- ORJ. DÖVİZ ALACAK
CASE WHEN CHA_CARI_BORC_ALACAK_TIP=0 THEN CHA_CARI_MEBLAG_ORJ
WHEN CHA_CARI_BORC_ALACAK_TIP=1 THEN CHA_CARI_MEBLAG_ORJ * (-1.0)
ELSE 0
END AS [#msg_S_0111\T], -- ORJ. DÖVİZ TUTAR
CAST ( 0 AS FLOAT ) AS [msg_S_1710], -- ORJINAL DÖVİZ BORÇ BAKİYE
CAST ( 0 AS FLOAT ) AS [msg_S_1711], -- ORJINAL DÖVİZ ALACAK BAKİYE
CAST ( 0 AS FLOAT ) AS [#msg_S_1715], -- ORJINAL DÖVİZ BAKİYE
CHA_NORMAL_CARI_DOVIZ_SEMBOLU AS [msg_S_0112], -- ORJ.DOVİZ
CASE
WHEN cha_kasa_hizkod<>'' THEN KARSICARICINS
ELSE ''
END AS [msg_S_0113], -- KARŞI HESAP CİNSİ
cha_kasa_hizkod AS [msg_S_0114], -- KARŞI HESAP KODU
dbo.fn_CarininIsminiBul(cha_kasa_hizmet,cha_kasa_hizkod) AS [msg_S_0115], -- KARŞI HESAP İSMİ
KARSICARIGRUP AS [#msg_S_1115], -- GRUBU
cha_karsisrmrkkodu AS [msg_S_1420], -- SRM.MRK.KODU
dbo.fn_SorumlulukMerkeziIsmi(cha_karsisrmrkkodu) AS [msg_S_1116], -- SRM.MRK.İSMİ
cha_projekodu AS [#msg_S_0116], -- PROJE KODU
CHPROJEADI AS [#msg_S_0117], -- PROJE ADI
cha_trefno AS [#msg_S_0298], -- REFERANS NO
HEIsim AS [#msg_S_0120], -- KİLİTLİ
'' AS  [#msg_S_0161] , -- PARTİ
0 AS [#msg_S_0162] ,   -- LOT
cha_ciro_cari_kodu AS [#msg_S_1998], --CİRO CARİ KODU
dbo.fn_CarininIsminiBul(0,cha_ciro_cari_kodu) AS [#msg_S_1999] --CİRO CARİ İSMİ
FROM dbo.CARI_HESAP_HAREKETLERI_VIEW_WITH_INDEX_03 WITH (NOLOCK)
**WHERE** (cha_cari_cins=@caricins) AND
((@carikod='') OR (cha_kod=@carikod)) AND
(cha_kod<>'') AND
((cha_grupno=@grupno) OR (@grupno is NULL)) AND
((cha_tarihi>=@ilktar) or (@ilktar is NULL)) AND
((cha_tarihi<=@sontar) or (@sontar is NULL)) AND
(dbo.fn_no_ok(cha_firmano,@firmalar)=1) AND
(dbo.fn_str_ok(cha_srmrkkodu,@SomStr)=1) AND
(dbo.fn_str_ok(cha_projekodu,@ProjeStr)=1)

### -- Föye CariHesaplar ile ilgili kapalı hareketleride koyalım

UNION

SELECT  TOP 100 PERCENT
cha_RECno ,
cha_RECid_DBCno,
cha_RECid_RECno,
cha_kod  ,
dbo.fn_CarininIsminiBul(cha_cari_cins,cha_kod ) ,
(select fir_unvan from dbo.FIRMALAR WITH (NOLOCK) where fir_sirano=cha_firmano) ,
cha_tarihi ,
cha_evrakno_seri ,
cha_evrakno_sira ,
cha_belge_tarih ,
cha_belge_no ,
CHEvrUzunIsim ,
CHCinsIsim ,
cha_cinsi ,
NORMALCARIGRUP ,
0 ,
cha_srmrkkodu ,
dbo.fn_SorumlulukMerkeziIsmi(cha_srmrkkodu) ,
NIIsim ,
cha_aciklama ,
cha_satici_kodu ,
dbo.fn_CarininIsminiBul(1,cha_satici_kodu) ,
CHA_VADE_TARIHI ,
DATEDIFF(Day,cha_tarihi,CHA_VADE_TARIHI),
'' ,
cha_miktari ,
KAPALITIP ,
CHA_CARI_MEBLAG_ANA,
CHA_CARI_MEBLAG_ANA,
CAST ( 0 AS FLOAT )  ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
cha_altd_kur ,
CHA_CARI_MEBLAG_ALT,
CHA_CARI_MEBLAG_ALT,
CAST ( 0 AS FLOAT )  ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
cha_d_kur ,
CHA_CARI_MEBLAG_ORJ,
CHA_CARI_MEBLAG_ORJ,
CAST ( 0 AS FLOAT )  ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
CHA_NORMAL_CARI_DOVIZ_SEMBOLU ,
CASE
WHEN cha_kasa_hizkod<>'' THEN KARSICARICINS
ELSE ''
END ,
cha_kasa_hizkod ,
dbo.fn_CarininIsminiBul(cha_kasa_hizmet,cha_kasa_hizkod) ,
KARSICARIGRUP ,
cha_karsisrmrkkodu ,
dbo.fn_SorumlulukMerkeziIsmi(cha_karsisrmrkkodu) ,
cha_projekodu ,
CHPROJEADI ,
cha_trefno ,
HEIsim,
'',
0,
cha_ciro_cari_kodu,
dbo.fn_CarininIsminiBul(0,cha_ciro_cari_kodu)
FROM dbo.CARI_HESAP_HAREKETLERI_VIEW_WITH_INDEX_09 WITH (NOLOCK)
**WHERE** (@caricins=0) AND (cha_ciro_cari_kodu<>'') AND
(cha_cari_cins<>@caricins) AND
((cha_ciro_cari_kodu=@carikod)OR(@carikod='')) AND
(cha_tpoz=1) AND
(@grupno is NULL) AND
((cha_tarihi>=@ilktar) or (@ilktar is NULL)) AND
((cha_tarihi<=@sontar) or (@sontar is NULL)) AND
(dbo.fn_no_ok(cha_firmano,@firmalar)=1) AND
(dbo.fn_str_ok(cha_srmrkkodu,@SomStr)=1) AND
(dbo.fn_str_ok(cha_projekodu,@ProjeStr)=1)

### -- İthalat, Demirbaş/hizmet/masraf faturaları veya döviz satış belgeleri

UNION

SELECT  TOP 100 PERCENT
cha_RECno AS [msg_S_0088], -- KAYIT NO
cha_RECid_DBCno AS [#msg_S_0720], --DBCNO
cha_RECid_RECno AS [#msg_S_0998], --DATABASE NO
cha_kod AS [#msg_S_0200], -- CARİ KODU
dbo.fn_CarininIsminiBul(cha_cari_cins, cha_kod) AS [#msg_S_0201], -- CARİ İSMİ
(select fir_unvan from dbo.FIRMALAR WITH (NOLOCK) where fir_sirano=cha_firmano) AS [#msg_S_0879], -- FİRMA UNVANI
cha_tarihi AS [msg_S_0089], -- TARİH
cha_evrakno_seri AS [msg_S_0090], -- SERİ
cha_evrakno_sira AS [msg_S_0091], -- SIRA
cha_belge_tarih AS [#msg_S_0092], -- BELGE TARİHİ
cha_belge_no AS [#msg_S_0093], -- BELGE NO
CHEvrUzunIsim AS [msg_S_0094], -- EVRAK TİPİ
CHCinsIsim AS [msg_S_0003], -- CİNSİ
cha_cinsi AS [#msg_S_0158], -- HAREKET CİNSİ
NORMALCARIGRUP AS [#msg_S_0096], -- GRUBU
cha_grupno AS [#msg_S_1712], -- CARİ HESAP GRUP NO
cha_srmrkkodu AS [msg_S_0118], -- SRM.MRK.KODU
dbo.fn_SorumlulukMerkeziIsmi(cha_srmrkkodu) AS [msg_S_0119], -- SRM.MRK.İSMİ
NIIsim AS [msg_S_0097], -- N/İ
cha_aciklama AS [#msg_S_0085], -- AÇIKLAMA
cha_satici_kodu AS [msg_S_1129], -- SORUMLU KODU
dbo.fn_CarininIsminiBul(1,cha_satici_kodu) AS [msg_S_1130], -- SORUMLU İSMİ
CHA_VADE_TARIHI AS [msg_S_0098], -- VADE TARİH
DATEDIFF(Day,cha_tarihi,CHA_VADE_TARIHI) AS [msg_S_0099], -- VADE GÜN
'' AS [#msg_S_0159], -- DEPO
cha_miktari AS [#msg_S_0165], -- MİKTAR
CHTipIsim AS [msg_S_0100], -- B/A
CASE WHEN CHA_CARI_BORC_ALACAK_TIP in (0,2) THEN CHA_CARI_MEBLAG_ANA ELSE 0 END AS [msg_S_0101\T], -- ANA DÖVİZ BORÇ
CASE WHEN CHA_CARI_BORC_ALACAK_TIP in (1,2) THEN CHA_CARI_MEBLAG_ANA ELSE 0 END AS [msg_S_0102\T], -- ANA DÖVİZ ALACAK
CASE WHEN CHA_CARI_BORC_ALACAK_TIP=0 THEN CHA_CARI_MEBLAG_ANA
WHEN CHA_CARI_BORC_ALACAK_TIP=1 THEN CHA_CARI_MEBLAG_ANA * (-1.0)
ELSE 0
END AS [#msg_S_0103\T], -- ANA DÖVİZ TUTAR
CAST ( 0 AS FLOAT ) AS [msg_S_1706], -- ANA DÖVİZ BORÇ BAKİYE
CAST ( 0 AS FLOAT ) AS [msg_S_1707], -- ANA DÖVİZ ALACAK BAKİYE
CAST ( 0 AS FLOAT ) AS [#msg_S_0957], -- ANA DÖVİZ BAKİYE
cha_altd_kur AS [msg_S_0104], -- ALT.DOVİZ KUR
CASE WHEN CHA_CARI_BORC_ALACAK_TIP in (0,2) THEN CHA_CARI_MEBLAG_ALT ELSE 0 END AS [msg_S_0105\T], -- ALT. DÖVİZ BORÇ
CASE WHEN CHA_CARI_BORC_ALACAK_TIP in (1,2) THEN CHA_CARI_MEBLAG_ALT ELSE 0 END AS [msg_S_0106\T], -- ALT. DÖVİZ ALACAK
CASE WHEN CHA_CARI_BORC_ALACAK_TIP=0 THEN CHA_CARI_MEBLAG_ALT
WHEN CHA_CARI_BORC_ALACAK_TIP=1 THEN CHA_CARI_MEBLAG_ALT * (-1.0)
ELSE 0
END AS [#msg_S_0107\T], -- ALT. DÖVİZ TUTAR
CAST ( 0 AS FLOAT ) AS [msg_S_1708], -- Alternatif DÖVİZ BORÇ BAKİYE
CAST ( 0 AS FLOAT ) AS [msg_S_1709], -- Alternatif DÖVİZ ALACAK BAKİYE
CAST ( 0 AS FLOAT ) AS [#msg_S_1714], -- Alternatif DÖVİZ BAKİYE
cha_d_kur AS [msg_S_0108], -- ORJ.DOVİZ KUR
CASE WHEN CHA_CARI_BORC_ALACAK_TIP in (0,2) THEN CHA_CARI_MEBLAG_ORJ ELSE 0 END AS [msg_S_0109\T], -- ORJ. DÖVİZ BORÇ
CASE WHEN CHA_CARI_BORC_ALACAK_TIP in (1,2) THEN CHA_CARI_MEBLAG_ORJ ELSE 0 END AS [msg_S_0110\T], -- ORJ. DÖVİZ ALACAK
CASE WHEN CHA_CARI_BORC_ALACAK_TIP=0 THEN CHA_CARI_MEBLAG_ORJ
WHEN CHA_CARI_BORC_ALACAK_TIP=1 THEN CHA_CARI_MEBLAG_ORJ * (-1.0)
ELSE 0
END AS [#msg_S_0111\T], -- ORJ. DÖVİZ TUTAR
CAST ( 0 AS FLOAT ) AS [msg_S_1710], -- ORJINAL DÖVİZ BORÇ BAKİYE
CAST ( 0 AS FLOAT ) AS [msg_S_1711], -- ORJINAL DÖVİZ ALACAK BAKİYE
CAST ( 0 AS FLOAT ) AS [#msg_S_1715], -- ORJINAL DÖVİZ BAKİYE
CHA_NORMAL_CARI_DOVIZ_SEMBOLU AS [msg_S_0112], -- ORJ.DOVİZ
CASE
WHEN cha_kasa_hizkod<>'' THEN KARSICARICINS
ELSE ''
END AS [msg_S_0113], -- KARŞI HESAP CİNSİ
cha_kasa_hizkod AS [msg_S_0114], -- KARŞI HESAP KODU
dbo.fn_CarininIsminiBul(cha_kasa_hizmet,cha_kasa_hizkod) AS [msg_S_0115], -- KARŞI HESAP İSMİ
KARSICARIGRUP AS [#msg_S_1115], -- GRUBU
cha_karsisrmrkkodu AS [msg_S_1420], -- SRM.MRK.KODU
dbo.fn_SorumlulukMerkeziIsmi(cha_karsisrmrkkodu) AS [msg_S_1116], -- SRM.MRK.İSMİ
cha_projekodu AS [#msg_S_0116], -- PROJE KODU
CHPROJEADI AS [#msg_S_0117], -- PROJE ADI
cha_trefno AS [#msg_S_0298], -- REFERANS NO
HEIsim AS [#msg_S_0120], -- KİLİTLİ
'' AS  [#msg_S_0161] , -- PARTİ
0 AS [#msg_S_0162] ,   -- LOT
cha_ciro_cari_kodu AS [#msg_S_1998], --CİRO CARİ KODU
dbo.fn_CarininIsminiBul(0,cha_ciro_cari_kodu) AS [#msg_S_1999] --CİRO CARİ İSMİ
FROM dbo.CARI_HESAP_HAREKETLERI_VIEW_WITH_INDEX_08 WITH (NOLOCK)
**WHERE** (@caricins=9) And
((@carikod='')or(cha_EXIMkodu=@carikod)) AND
(cha_EXIMkodu<>'')  AND
((cha_evrak_tip=90)OR     --döviz satış belgesi
((cha_evrak_tip=0) AND   --Demirbaş/hizmet/masraf ithalat faturası
(cha_tip=1) AND
(cha_cinsi=29) AND
(cha_kasa_hizmet IN (3,5,8)) AND
(cha_normal_Iade=0) ) )AND
((@grupno is NULL) OR (@grupno=0)) AND
((cha_tarihi>=@ilktar) or (@ilktar is NULL)) AND
((cha_tarihi<=@sontar) or (@sontar is NULL)) AND
(dbo.fn_no_ok(cha_firmano,@firmalar)=1) AND
(dbo.fn_str_ok(cha_srmrkkodu,@SomStr)=1) AND
(dbo.fn_str_ok(cha_projekodu,@ProjeStr)=1)

###-- Karşı Cari indeksine göre olan kayıtlar

UNION

SELECT  TOP 100 PERCENT
cha_RECno ,
cha_RECid_DBCno,
cha_RECid_RECno,
cha_kasa_hizkod  ,
dbo.fn_CarininIsminiBul(cha_kasa_hizmet, cha_kasa_hizkod) ,
(select fir_unvan from dbo.FIRMALAR WITH (NOLOCK) where fir_sirano=cha_firmano) ,
cha_tarihi ,
cha_evrakno_seri ,
cha_evrakno_sira ,
cha_belge_tarih ,
cha_belge_no ,
CHEvrUzunIsim ,
CHCinsIsim ,
cha_cinsi ,
KARSICARIGRUP ,
cha_karsidgrupno ,
cha_karsisrmrkkodu ,
dbo.fn_SorumlulukMerkeziIsmi(cha_karsisrmrkkodu) ,
NIIsim ,
cha_aciklama ,
cha_satici_kodu ,
dbo.fn_CarininIsminiBul(1,cha_satici_kodu) ,
CHA_VADE_TARIHI ,
DATEDIFF(Day,cha_tarihi,CHA_VADE_TARIHI),
'' ,
cha_miktari ,
KARSITIP ,
CASE WHEN CHA_KARSI_CARI_BORC_ALACAK_TIP in (0,2) THEN CHA_KARSI_CARI_MEBLAG_ANA ELSE 0 END ,
CASE WHEN CHA_KARSI_CARI_BORC_ALACAK_TIP in (1,2) THEN CHA_KARSI_CARI_MEBLAG_ANA ELSE 0 END ,
CASE WHEN CHA_KARSI_CARI_BORC_ALACAK_TIP=0 THEN CHA_KARSI_CARI_MEBLAG_ANA
WHEN CHA_KARSI_CARI_BORC_ALACAK_TIP=1 THEN CHA_KARSI_CARI_MEBLAG_ANA * (-1.0)
ELSE 0
END ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
cha_altd_kur ,
CASE WHEN CHA_KARSI_CARI_BORC_ALACAK_TIP in (0,2) THEN CHA_KARSI_CARI_MEBLAG_ALT ELSE 0 END ,
CASE WHEN CHA_KARSI_CARI_BORC_ALACAK_TIP in (1,2) THEN CHA_KARSI_CARI_MEBLAG_ALT ELSE 0 END ,
CASE WHEN CHA_KARSI_CARI_BORC_ALACAK_TIP=0 THEN CHA_KARSI_CARI_MEBLAG_ALT
WHEN CHA_KARSI_CARI_BORC_ALACAK_TIP=1 THEN CHA_KARSI_CARI_MEBLAG_ALT * (-1.0)
ELSE 0
END ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
cha_karsid_kur ,
CASE WHEN CHA_KARSI_CARI_BORC_ALACAK_TIP in (0,2) THEN CHA_KARSI_CARI_MEBLAG_ORJ ELSE 0 END ,
CASE WHEN CHA_KARSI_CARI_BORC_ALACAK_TIP in (1,2) THEN CHA_KARSI_CARI_MEBLAG_ORJ ELSE 0 END ,
CASE WHEN CHA_KARSI_CARI_BORC_ALACAK_TIP=0 THEN CHA_KARSI_CARI_MEBLAG_ORJ
WHEN CHA_KARSI_CARI_BORC_ALACAK_TIP=1 THEN CHA_KARSI_CARI_MEBLAG_ORJ * (-1.0)
ELSE 0
END ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
CHA_KARSI_CARI_DOVIZ_SEMBOLU ,
CASE
WHEN cha_kod<>'' THEN NORMALCARICINS
ELSE ''
END ,
cha_kod ,
dbo.fn_CarininIsminiBul(cha_cari_cins,cha_kod) ,
NORMALCARIGRUP ,
cha_srmrkkodu ,
dbo.fn_SorumlulukMerkeziIsmi(cha_srmrkkodu)  ,
cha_projekodu ,
CHPROJEADI ,
cha_trefno ,
HEIsim,
'',
0,
cha_ciro_cari_kodu,
dbo.fn_CarininIsminiBul(0,cha_ciro_cari_kodu)
**FROM** dbo.CARI_HESAP_HAREKETLERI_VIEW_WITH_INDEX_05 WITH (NOLOCK)
**WHERE** (cha_kasa_hizmet=@caricins) AND
((@carikod='') OR (cha_kasa_hizkod=@carikod)) AND
(cha_kasa_hizkod<>'') AND
((cha_karsidgrupno=@grupno) or (@grupno is NULL)) AND
((cha_tarihi>=@ilktar) or (@ilktar is NULL)) AND
((cha_tarihi<=@sontar) or (@sontar is NULL)) AND
(dbo.fn_no_ok(cha_firmano,@firmalar)=1) AND
(dbo.fn_str_ok(cha_karsisrmrkkodu,@SomStr)=1) AND
(dbo.fn_str_ok(cha_projekodu,@ProjeStr)=1)

### -- Stoktaki gider kayıtları

UNION
SELECT  TOP 100 PERCENT
(-1 * sth_RECno) ,
(-1 * sth_RECid_DBCno),
(-1 * sth_RECid_RECno),
sth_isemri_gider_kodu ,
dbo.fn_CarininIsminiBul(5,sth_isemri_gider_kodu) ,
(select fir_unvan from dbo.FIRMALAR WITH (NOLOCK) where fir_sirano=sth_firmano) ,
sth_tarih ,
sth_evrakno_seri ,
sth_evrakno_sira ,
sth_belge_tarih ,
sth_belge_no ,
SHEvrIsim ,
SHCinsIsim ,
CAST(sth_cins AS tinyint) ,
'' ,
0 ,
sth_cari_srm_merkezi ,
dbo.fn_SorumlulukMerkeziIsmi(sth_cari_srm_merkezi) ,
NIIsim ,
sth_aciklama ,
sth_plasiyer_kodu ,
dbo.fn_CarininIsminiBul(1,sth_plasiyer_kodu) ,
dbo.fn_OpVadeTarih(sth_odeme_op,sth_tarih) ,
dbo.fn_OpVadeGun(sth_odeme_op,sth_tarih) ,
dbo.fn_DepoIsmi(sth_cikis_depo_no) ,
sth_miktar ,
CHTipIsim ,
CASE WHEN STH_STOK_BORC_ALACAK_TIP in (0,2) THEN STH_NET_DEGER_ANA ELSE 0 END ,
CASE WHEN STH_STOK_BORC_ALACAK_TIP in (1,2) THEN STH_NET_DEGER_ANA ELSE 0 END ,
CASE WHEN STH_STOK_BORC_ALACAK_TIP = 0 THEN STH_NET_DEGER_ANA
WHEN STH_STOK_BORC_ALACAK_TIP = 1 THEN STH_NET_DEGER_ANA * (-1.0)
ELSE 0
END ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
sth_alt_doviz_kuru ,
CASE WHEN STH_STOK_BORC_ALACAK_TIP in (0,2) THEN STH_NET_DEGER_ALT ELSE 0 END ,
CASE WHEN STH_STOK_BORC_ALACAK_TIP in (1,2) THEN STH_NET_DEGER_ALT ELSE 0 END ,
CASE WHEN STH_STOK_BORC_ALACAK_TIP = 0 THEN STH_NET_DEGER_ALT
WHEN STH_STOK_BORC_ALACAK_TIP = 1 THEN STH_NET_DEGER_ALT * (-1.0)
ELSE 0
END ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
sth_stok_doviz_kuru ,
CASE WHEN STH_STOK_BORC_ALACAK_TIP in (0,2) THEN STH_NET_DEGER_STOK_ORJ ELSE 0 END ,
CASE WHEN STH_STOK_BORC_ALACAK_TIP in (1,2) THEN STH_NET_DEGER_STOK_ORJ ELSE 0 END ,
CASE WHEN STH_STOK_BORC_ALACAK_TIP = 0      THEN STH_NET_DEGER_STOK_ORJ
WHEN STH_STOK_BORC_ALACAK_TIP = 1      THEN STH_NET_DEGER_STOK_ORJ * (-1.0)
ELSE 0
END ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
STH_STOK_DOVIZ_SEMBOLU ,
'STOKLAR',
sth_stok_kod,
dbo.fn_StokIsmi(sth_stok_kod),
'',
sth_stok_srm_merkezi,
dbo.fn_SorumlulukMerkeziIsmi(sth_stok_srm_merkezi),
sth_proje_kodu,
SHPROJEADI,
'',
HEIsim,
sth_parti_kodu,
sth_lot_no,
'',
''
**FROM** dbo.STOK_HAREKETLERI_VIEW_WITH_INDEX_13 WITH (NOLOCK)
**WHERE** (@caricins=5) AND
((@carikod='') OR (sth_isemri_gider_kodu=@carikod)) AND
(sth_cins in (4,5,9,10)) AND
((sth_tarih>=@ilktar) or (@ilktar is NULL)) AND
((sth_tarih<=@sontar) or (@sontar is NULL)) AND
(dbo.fn_no_ok(sth_firmano,@firmalar)=1) AND
(dbo.fn_str_ok(sth_cari_srm_merkezi,@SomStr)=1) AND
(dbo.fn_str_ok(sth_proje_kodu,@ProjeStr)=1)

###-- İthalat için ithalat faturası ile girişler ve antrepo mal millileştirme ile ilgili milllileştirmeler

UNION
SELECT  TOP 100 PERCENT
(-1 * sth_RECno) ,
(-1 * sth_RECid_DBCno),
(-1 * sth_RECid_RECno),
sth_exim_kodu ,
dbo.fn_CarininIsminiBul(9,sth_exim_kodu) ,
(select fir_unvan from dbo.FIRMALAR WITH (NOLOCK) where fir_sirano=sth_firmano) ,
sth_tarih ,
sth_evrakno_seri ,
sth_evrakno_sira ,
sth_belge_tarih ,
sth_belge_no ,
SHEvrIsim ,
SHCinsIsim ,
CAST(sth_cins AS tinyint) ,
CASE
WHEN sth_evraktip in (3,13) THEN  RTrim(dbo.fn_ResourceSplit ('P',406, 1, DEFAULT))
WHEN sth_evraktip=10 THEN RTrim(dbo.fn_ResourceSplit ('P',406, 2, DEFAULT))
WHEN sth_evraktip=11 THEN RTrim(dbo.fn_ResourceSplit ('P',406, 3, DEFAULT))
WHEN sth_evraktip=12 THEN RTrim(dbo.fn_ResourceSplit ('P',406, 4, DEFAULT))
ELSE RTrim(dbo.fn_ResourceSplit ('P',406, 5, DEFAULT))
END ,
0 ,
sth_stok_srm_merkezi ,
dbo.fn_SorumlulukMerkeziIsmi(sth_stok_srm_merkezi) ,
NIIsim ,
sth_aciklama ,
sth_plasiyer_kodu ,
dbo.fn_CarininIsminiBul(1,sth_plasiyer_kodu) ,
dbo.fn_OpVadeTarih(sth_odeme_op,sth_tarih) ,
dbo.fn_OpVadeGun(sth_odeme_op,sth_tarih) ,
CASE
WHEN sth_tip=0 THEN ' --> ' + dbo.fn_DepoIsmi(sth_giris_depo_no)
WHEN sth_tip=1 THEN dbo.fn_DepoIsmi(sth_cikis_depo_no) + ' --> '
ELSE dbo.fn_DepoIsmi(sth_cikis_depo_no) + ' --> ' + dbo.fn_DepoIsmi(sth_giris_depo_no)
END ,
CASE
WHEN sth_evraktip=10 THEN ( sth_miktar * (-1.0) )
WHEN 0=dbo.fn_MaliEnvanterHariciDepo(sth_giris_depo_no) THEN 0
ELSE sth_miktar
END ,
CASE
WHEN sth_evraktip=10 THEN ATIP.CHTipIsim
WHEN 0=dbo.fn_MaliEnvanterHariciDepo(sth_giris_depo_no) THEN BATIP.CHTipIsim
ELSE BTIP.CHTipIsim
END ,
CASE WHEN sth_evraktip<>10 THEN STH_NET_DEGER_ANA ELSE 0 END ,
CASE WHEN (0=dbo.fn_MaliEnvanterHariciDepo(sth_giris_depo_no)) OR (sth_evraktip=10) THEN STH_NET_DEGER_ANA ELSE 0 END ,
CASE WHEN (sth_evraktip=10) THEN STH_NET_DEGER_ANA * (-1.0)
WHEN 1=dbo.fn_MaliEnvanterHariciDepo(sth_giris_depo_no) THEN STH_NET_DEGER_ANA
ELSE 0
END ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
sth_alt_doviz_kuru ,
CASE WHEN sth_evraktip<>10 THEN STH_NET_DEGER_ALT ELSE 0 END ,
CASE WHEN (0=dbo.fn_MaliEnvanterHariciDepo(sth_giris_depo_no)) OR (sth_evraktip=10) THEN STH_NET_DEGER_ALT ELSE 0 END ,
CASE WHEN (sth_evraktip=10) THEN STH_NET_DEGER_ALT * (-1.0)
WHEN 1=dbo.fn_MaliEnvanterHariciDepo(sth_giris_depo_no) THEN STH_NET_DEGER_ALT
ELSE 0
END ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
sth_har_doviz_kuru,
CASE WHEN sth_evraktip<>10 THEN  STH_NET_DEGER_CARI_ORJ ELSE 0 END ,
CASE WHEN (0=dbo.fn_MaliEnvanterHariciDepo(sth_giris_depo_no)) OR (sth_evraktip=10) THEN STH_NET_DEGER_CARI_ORJ ELSE 0 END ,
CASE WHEN (sth_evraktip=10) THEN STH_NET_DEGER_CARI_ORJ * (-1.0) --- Mal millileştirme fişi daima ithalat hesabı için alacak olur
WHEN 1=dbo.fn_MaliEnvanterHariciDepo(sth_giris_depo_no) THEN STH_NET_DEGER_CARI_ORJ
ELSE 0
END ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
STH_HAR_DOVIZ_SEMBOLU ,
'STOKLAR',
sth_stok_kod,
dbo.fn_StokIsmi(sth_stok_kod),
'',
sth_stok_srm_merkezi,
dbo.fn_SorumlulukMerkeziIsmi(sth_stok_srm_merkezi),
sth_proje_kodu,
SHPROJEADI,
'',
HEIsim,
sth_parti_kodu,
sth_lot_no,
'',
''
**FROM** dbo.STOK_HAREKETLERI_VIEW_WITH_INDEX_12 WITH (NOLOCK)
LEFT OUTER JOIN dbo.vw_Cari_Hareket_Tip_Isimleri BTIP ON BTIP.CHTipNo= 0
LEFT OUTER JOIN dbo.vw_Cari_Hareket_Tip_Isimleri ATIP ON ATIP.CHTipNo= 1
LEFT OUTER JOIN dbo.vw_Cari_Hareket_Tip_Isimleri BATIP ON BATIP.CHTipNo= 2
**WHERE** (@caricins=9) And
(sth_exim_kodu=@carikod) AND
(
(sth_evraktip in (3,10,11,12,13)) OR        -- Giris Faturasi,Antrepo mal milli, atropo transfer, giris irsaliyesi
((sth_evraktip=5) AND (1=dbo.fn_MaliEnvanterHariciDepo(sth_giris_depo_no)))
)  AND                                       --  Giris hareketi veya antrepolar arasi mal millileştirme fişi ise
(sth_normal_iade=0) AND
((@grupno is NULL) OR (@grupno=0)) AND
((sth_tarih>=@ilktar) or (@ilktar is NULL)) AND
((sth_tarih<=@sontar) or (@sontar is NULL)) AND
(dbo.fn_str_ok(sth_cari_srm_merkezi,@SomStr)=1) AND
(dbo.fn_str_ok(sth_proje_kodu,@ProjeStr)=1)

### -- Ödeme emri değerlemeleri

UNION
SELECT  TOP 100 PERCENT
0 ,
0 ,
0 ,
@carikod  ,
dbo.fn_CarininIsminiBul(@caricins, @carikod) ,
'' ,
@sontar ,
'' ,
0 ,
@sontar ,
'' ,
'' ,
'' ,
0 ,
CGCariGrupIsmi ,
sck_sahip_cari_grupno ,
'' ,
'' ,
'' ,
'Ödeme Emri Değerleme' ,
'',
'',
sck_vade ,
0 ,
'' ,
0 ,
CHTipIsim ,
CASE
WHEN dbo.fn_OdemeEmriDegerFarki ( 0,
sck_tutar,
sck_doviz,
dbo.fn_CariDovizCinsi(@caricins,@carikod,sck_sahip_cari_grupno),
sck_ilk_hareket_tarihi,
sck_son_hareket_tarihi,
sck_vade,
@carikod ) >= 0
THEN dbo.fn_OdemeEmriDegerFarki ( 0,
sck_tutar,
sck_doviz,
dbo.fn_CariDovizCinsi(@caricins,@carikod,sck_sahip_cari_grupno),
sck_ilk_hareket_tarihi,
sck_son_hareket_tarihi,
sck_vade,
@carikod )
ELSE 0
END ,
CASE
WHEN dbo.fn_OdemeEmriDegerFarki ( 0,
sck_tutar,
sck_doviz,
dbo.fn_CariDovizCinsi(@caricins,@carikod,sck_sahip_cari_grupno),
sck_ilk_hareket_tarihi,
sck_son_hareket_tarihi,
sck_vade,
@carikod ) < 0
THEN dbo.fn_OdemeEmriDegerFarki ( 0,
sck_tutar,
sck_doviz,
dbo.fn_CariDovizCinsi(@caricins,@carikod,sck_sahip_cari_grupno),
sck_ilk_hareket_tarihi,
sck_son_hareket_tarihi,
sck_vade,
@carikod ) * (-1.0)
ELSE 0
END ,
dbo.fn_OdemeEmriDegerFarki (0,
sck_tutar,
sck_doviz,
dbo.fn_CariDovizCinsi(@caricins,@carikod,sck_sahip_cari_grupno),
sck_ilk_hareket_tarihi,
sck_son_hareket_tarihi,
sck_vade,
@carikod ) ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT )  ,
CAST ( 0 AS FLOAT )  ,
CAST ( 0 AS FLOAT )  ,
CAST ( 0 AS FLOAT )  ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
0 ,
CASE
WHEN dbo.fn_OdemeEmriDegerFarki ( 2,
sck_tutar,
sck_doviz,
dbo.fn_CariDovizCinsi(@caricins,@carikod,sck_sahip_cari_grupno),
sck_ilk_hareket_tarihi,
sck_son_hareket_tarihi,
sck_vade,
@carikod ) >= 0
THEN dbo.fn_OdemeEmriDegerFarki (2,
sck_tutar,
sck_doviz,
dbo.fn_CariDovizCinsi(@caricins,@carikod,sck_sahip_cari_grupno),
sck_ilk_hareket_tarihi,
sck_son_hareket_tarihi,
sck_vade,
@carikod )
ELSE 0
END ,
CASE
WHEN dbo.fn_OdemeEmriDegerFarki ( 2,
sck_tutar,
sck_doviz,
dbo.fn_CariDovizCinsi(@caricins,@carikod,sck_sahip_cari_grupno),
sck_ilk_hareket_tarihi,
sck_son_hareket_tarihi,
sck_vade,
@carikod ) < 0
THEN dbo.fn_OdemeEmriDegerFarki (2,
sck_tutar,
sck_doviz,
dbo.fn_CariDovizCinsi(@caricins,@carikod,sck_sahip_cari_grupno),
sck_ilk_hareket_tarihi,
sck_son_hareket_tarihi,
sck_vade,
@carikod ) * (-1.0)
ELSE 0
END ,
dbo.fn_OdemeEmriDegerFarki (2,
sck_tutar,
sck_doviz,
dbo.fn_CariDovizCinsi(@caricins,@carikod,sck_sahip_cari_grupno),
sck_ilk_hareket_tarihi,
sck_son_hareket_tarihi,
sck_vade,
@carikod ) ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
CAST ( 0 AS FLOAT ) ,
dbo.fn_DovizSembolu(dbo.fn_CariDovizCinsi(@caricins,@carikod,sck_sahip_cari_grupno)) ,
'' ,
'' ,
'' ,
'' ,
'' ,
'' ,
'' ,
'' ,
sck_refno ,
'',
'',
0,
'',
''
**FROM** dbo.ODEME_EMIRLERI WITH (NOLOCK, INDEX=NDX_ODEME_EMIRLERI_08)
LEFT OUTER JOIN dbo.vw_Cari_Hareket_Tip_Isimleri ON CHTipNo= 1
LEFT OUTER JOIN dbo.vw_Cari_Grup_Isimleri ON CGCariCins=0 AND CGCariGrupNo=sck_sahip_cari_grupno
**WHERE** (@odemeemridegerlemedok=1) AND
(@caricins=0) AND
(@carikod<>'') AND
(sck_degerleme_islendi=0) AND
(dbo.fn_no_ok(sck_firmano,@firmalar)=1) AND
(sck_sahip_cari_cins=0) AND
(sck_sahip_cari_kodu=@carikod) AND
((@grupno is NULL) OR (@grupno=sck_sahip_cari_grupno)) AND
((sck_ilk_hareket_tarihi<=@sontar) or (@sontar is NULL)) AND
((sck_doviz>0) OR (sck_doviz<>dbo.fn_CariDovizCinsi(@caricins,@carikod,sck_sahip_cari_grupno))) and
(not (sck_sonpoz in (4,5,7)))
)
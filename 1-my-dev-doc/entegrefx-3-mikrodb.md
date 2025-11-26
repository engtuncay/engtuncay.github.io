
# Contents

- [Contents](#contents)
- [Enm Tablolar - Firma Mikro Veritabanındaki](#enm-tablolar---firma-mikro-veritabanındaki)
  - [EnmCariEvrak](#enmcarievrak)
  - [EnmCariEvrakEk](#enmcarievrakek)
  - [EnmCariHareketEk](#enmcarihareketek)
  - [EnmCariEvrakSeriSiraTip](#enmcarievrakserisiratip)
  - [EnmEkstreMutabakat](#enmekstremutabakat)
  - [EnmEkstreMutabakatCari](#enmekstremutabakatcari)
  - [EnmEttn](#enmettn)
  - [EnmLogTest](#enmlogtest)
  - [EdmCariHareketBaslik](#edmcarihareketbaslik)
  - [CARI\_HESAP\_HAREKETLERI\_ENTEGRE](#cari_hesap_hareketleri_entegre)
  - [EmtMikroEvrTip](#emtmikroevrtip)

[🔝](#contents)

# Enm Tablolar - Firma Mikro Veritabanındaki

## EnmCariEvrak

## EnmCariEvrakEk


## EnmCariHareketEk

## EnmCariEvrakSeriSiraTip

## EnmEkstreMutabakat

## EnmEkstreMutabakatCari

## EnmEttn

## EnmLogTest

## EdmCariHareketBaslik

[🔝](#contents)

## CARI_HESAP_HAREKETLERI_ENTEGRE

```sql
SELECT TOP (1000) [ecbId] ,[cha_evrakno_seri] ,[cha_evrakno_sira] ,[cha_evrak_tip] ,[cha_kod] ,[cha_cari_cins] ,[cha_RECno] ,[cha_uuid] ,[cha_meblag] ,[cha_ft_iskontoTop] ,[cha_vergiTop] ,[cha_belge_no] ,[cha_srmrkkodu] ,[cha_tarihi] ,[cha_tip] ,[cha_cinsi] ,[cha_normal_Iade] ,[cha_belge_tarih] ,[cha_aciklama] ,[cha_kasa_hizmet] ,[cha_kasa_hizkod] ,[cari_unvan1] 
FROM [MikroDB_V15_KRAFT].[dbo].[CARI_HESAP_HAREKETLERI_ENTEGRE]

```

[🔝](#contents)

## EmtMikroEvrTip

```sql
SELECT TOP (1000) [metLnKod]
      ,[cha_evrak_tip]
      ,[cha_cinsi]
      ,[cha_normal_Iade]
      ,[cha_tip]
      ,[metTxEvrakAdi]
FROM [MikroDB_V15_KRAFT].[dbo].[EmtMikroEvrTip]

```

➖ ENM_CARI_HAREKET_LOG

➖ ENM_HIZMET_KAPATMA




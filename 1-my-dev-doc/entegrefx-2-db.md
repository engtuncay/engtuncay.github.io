
- [Db İşlemler](#db-i̇şlemler)
  - [Oto Select Sorgular](#oto-select-sorgular)
    - [Select Count Where Id In List (Toplu Kayıt Sayısı Kontrolü)](#select-count-where-id-in-list-toplu-kayıt-sayısı-kontrolü)
  - [Oto Update Sorgular](#oto-update-sorgular)
    - [Update Where Id In List (Toplu Güncelleme)](#update-where-id-in-list-toplu-güncelleme)
  - [Sorgu Teknikleri](#sorgu-teknikleri)
    - [Insert - Update İkili İşlem](#insert---update-i̇kili-i̇şlem)
  - [FiQuery](#fiquery)
    - [FiQueryTools metodlar](#fiquerytools-metodlar)
- [Db Aktarım](#db-aktarım)
  - [Lokal Aktarım Sablon 1](#lokal-aktarım-sablon-1)
  - [Lokal Aktarım Sablon 2](#lokal-aktarım-sablon-2)
- [FiQuery Metodları](#fiquery-metodları)
  - [convertUserParamsToValue()](#convertuserparamstovalue)
- [FiKeyBean Metodlar](#fikeybean-metodlar)
  - [Entity'nin FiKeyBean'e çevrilmesi](#entitynin-fikeybeane-çevrilmesi)
- [Hata Çözümleri](#hata-çözümleri)
  - [Sorgularda Db Collation CS CI cakismasi](#sorgularda-db-collation-cs-ci-cakismasi)


# Db İşlemler

## Oto Select Sorgular

### Select Count Where Id In List (Toplu Kayıt Sayısı Kontrolü)

Verilen Id listesindeki, kayıtların sayısını verir. Böylelikle olan kayıtlar 1 çıkar (çünkü aşağıdaki örnekte primary key alanını verdik), olmayanlar listeye de girmez (0 göstermez). Çoklu kayıtlarında tabloda olup olmadığı kontrol edilir.

```java
FiColList fiCols = new FiColList();
fiCols.add(FiColsMikro.cheChaRecNo().buiColValue(listRecNo));

String sqlQuery = FiQueryGenerator.selectQueryCountIdByFiColListWhereIdList(EnmCariHareketEk.class, fiCols);

System.out.println(sqlQuery);

// SELECT cheChaRecNo, count( cheChaRecNo ) lnCount
// FROM EnmCariHareketEk
// WHERE cheChaRecNo IN ( @cheChaRecNo )
// GROUP BY cheChaRecNo
```

## Oto Update Sorgular

### Update Where Id In List (Toplu Güncelleme)

Verilen Id Listesindeki kayıtlara toplu güncelleme yapmak için kullanılır. Aşağıdaki örnekte id listesindeki kayıtların , txHesaplasmaOnayKodu ve cheDtLastUp alanları güncelleniyor.

```java
FiColList fiCols2 = new FiColList();

fiCols2.add(FiColsMikro.cheChaRecNo().buiColValue(listRecNo));
fiCols2.add(FiColsMikro.cheTxHesaplasmaOnayKodu().buiColValue("txHesaplasmaGrupKod"));
fiCols2.add(FiColsMikro.cheDtLastup().buiColValue(new Date()));

String sqlQuery2 = FiQueryGenerator.updateQueryWithFiColListByIdList(EnmCariHareketEk.class, fiCols2);

System.out.println(sqlQuery2);

// UPDATE EnmCariHareketEk SET cheTxHesaplasmaOnayKodu = @cheTxHesaplasmaOnayKodu, cheDtLastup = @cheDtLastup WHERE cheChaRecNo IN ( @cheChaRecNo )


```

## Sorgu Teknikleri

### Insert - Update İkili İşlem

- jdUpdate işleminde '@__' ile başlayan değişkenleri java değişkenlerine (:named_var) değiştirmez.

```java
/**
	 * insup : Insert - Update (update öncesi yoksa, tabloya ekler ve update yapar)
	 *
	 * @param fkbParams
	 * @return
	 */
	public Fdr insupAktarilmayanBelge(FiKeyBean fkbParams) {

		//sq202311301609
		String sql = "--sq202311301609\n" +
				"--$ver 1\n" +
				"DECLARE @__countKasaUser AS int = 0\n" +
				"\n" +
				"SELECT @__countKasaUser = count(maeId) FROM EntMaeMikroAktarilmayan\n" +
				"WHERE maeTxFirmaKodu = @maeTxFirmaKodu\n" +
				"and maeTxSorMer = @maeTxSorMer\n" +
				"and maeLnEvrakId = @maeLnEvrakId\n" +
				"and maeBoFatura = @maeBoFatura\n" +
				"\n" +
				"--PRINT @__countKasaUser\n" +
				"\n" +
				"IF @__countKasaUser = 0 \n" +
				"BEGIN\n" +
				"  INSERT INTO EntMaeMikroAktarilmayan (maeTxFirmaKodu,maeTxSorMer,maeLnEvrakId,maeBoFatura)\n" +
				"  VALUES (@maeTxFirmaKodu,@maeTxSorMer,@maeLnEvrakId,@maeBoFatura);\n" +
				"END\n" +
				"\n" +
				"UPDATE EntMaeMikroAktarilmayan SET maeDtCreated= @maeDtCreated, maeDtEvrakIslem = @maeDtEvrakIslem, maeTxFailReason = @maeTxFailReason\n" +
				"WHERE maeTxFirmaKodu = @maeTxFirmaKodu\n" +
				"and maeTxSorMer = @maeTxSorMer\n" +
				"and maeLnEvrakId = @maeLnEvrakId\n" +
				"and maeBoFatura = @maeBoFatura";

		return jdUpdateBindMapMain(sql, fkbParams);
	}
```



## FiQuery

### FiQueryTools metodlar

💡 Sorgu içerisindeki optional param nedir ?


🔔 FiqueryTools Metod Listesi

Method                 | Açıklama
-----------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
activateParamsMain     | mapParams bulunan parametreler yorum satırını alınmışsa yorumu kaldırır,aktif eder.<br/>Sadece dolu olanlar aktif edilsin belirtilirse, dolu olanlar aktive edilir,boş olanları ise pasif eder.
activateOptParamMain   | tek bir tane opt param'ı aktif etmek için
deActivateOptParamMain | tek bir tane opt param'ı deaktif etmek için
activateNamedParamsMain
///
activateSqlAtParamMain
deactivateSqlAtParamMain
///
activateAndUpdateOptParam
///
deActivateAllOptParams
///
makeMultiParamTemplate
///
convertSqlForMultiParamByTemplate
convertSqlForMultiParamByTemplate2
///
convertSqlParamToListJdbiParamMain
convertSqlParamToCommentMain
convertSqlParamToJdbiParamMain
///
convertListParamToMultiParams
///
stoj
fixSqlProblems
///
checkParamsEmpty
checkOptParamExist
findParamsOptional
findParams
///
getMultiParamStartIndex




# Db Aktarım

## Lokal Aktarım Sablon 1

Mikroya entegreden veri ekleme ayarları için kullanılır. Cari Kart kontrolü yoktur, otomatik sıra numarası verir, yeni kart açılışı yoktur, satici boş geçilebilir.

```java
MikroAktarimConfig lokalAktarim2 = MikroAktarimConfig.instanceLokalAktarim();
```

- Lokal aktarım ayarları

```java
public static MikroAktarimConfig instanceLokalAktarim() {
		MikroAktarimConfig mikroAktarimConfig = new MikroAktarimConfig();
		mikroAktarimConfig.setBoAutoEvrakSiraNo(true);
		mikroAktarimConfig.setBoCariKartKontrolEnable(false);
		mikroAktarimConfig.setBoYeniKartAcilisEnable(false);
		mikroAktarimConfig.setBoSaticiNullable(true);
		return mikroAktarimConfig;
	}

```

## Lokal Aktarım Sablon 2 

```java
MikroAktarimConfig lokalAktarim2 = MikroAktarimConfig.instanceLokalAktarim2(dtTime);
```

```java
public static MikroAktarimConfig instanceLokalAktarim2(Date dtAktarim) {
		MikroAktarimConfig mikroAktarimConfig = MikroAktarimConfig.instanceLokalAktarim();
		mikroAktarimConfig.setBoHizmetFatBaslikToplamlariniKontrolEtme(true);
		mikroAktarimConfig.setBoKarsiKodNullableForFinans(true);
		mikroAktarimConfig.setDtAktarim(dtAktarim);
		mikroAktarimConfig.setDtLastUp(dtAktarim);
		return mikroAktarimConfig;
	}
```

# FiQuery Metodları

## convertUserParamsToValue()

Sorguda bulunan __userParam şeklindeki user parametrelerini bulur. Bu parametreler eğer mapParams'da var ise, değeri ile yer değiştirir.

```java
String sql = "--sq202212291130\n" +
    "--$ver 1\n" +
    "CREATE DATABASE __txDbName";

FiKeyBean fkbQuery = new FiKeyBean();
fkbQuery.putObj(FiColsEntegre.txDbName(), txDbName);

FiQuery fiQuery = new FiQuery(sql, fkbQuery);
fiQuery.convertUserParamsToValue();

return jdUpdateBindMapMain(fiQuery);
```

# FiKeyBean Metodlar

## Entity'nin FiKeyBean'e çevrilmesi

```java
FiKeyBean fkbUpdate = FiReflection.convertEntityToFiKeybean(EntMikroAktarilmayanBelge.class, entMikroAktarilmayanBelge);
```


# Hata Çözümleri

## Sorgularda Db Collation CS CI cakismasi

varchar alanın sonuna `collate Turkish_CS_AI` eklenir.

```sql
LEFT JOIN MikroDB_V15_OZPAS.dbo.CARI_HESAP_HAREKETLERI chh 
    ON kko.cha_evrakno_seri = chh.cha_evrakno_seri collate Turkish_CS_AI
```







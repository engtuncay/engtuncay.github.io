
<h1>Entegre Uygulaması Geliştirici Dökümantasyonu</h1>

Java Fx ile geliştirdiğim uygulama için aldığım notlar. 

- [Kısaltmalar](#kısaltmalar)
- [Meta Datalar](#meta-datalar)
  - [FiColsEntegre - Entegre Sütun Objeleri](#ficolsentegre---entegre-sütun-objeleri)
  - [MetaEntConst (String vs sabitler)](#metaentconst-string-vs-sabitler)
- [Layout](#layout)
  - [Hide Component](#hide-component)
- [Module Oluşturma](#module-oluşturma)
  - [Form Module](#form-module)
  - [Table Module](#table-module)
- [Module Helper (modüllerde kullanılacak yardımcı metodlar)](#module-helper-modüllerde-kullanılacak-yardımcı-metodlar)
  - [Listede eleman sayısı 1 den fazla var mı ortak kontolü](#listede-eleman-sayısı-1-den-fazla-var-mı-ortak-kontolü)
- [Dialog Pencereleri](#dialog-pencereleri)
  - [Pop Dialog - Info Warn Error](#pop-dialog---info-warn-error)
  - [String deger Alan Dialog](#string-deger-alan-dialog)
- [Special Components](#special-components)
  - [Şablon Exceli Oluşturma](#şablon-exceli-oluşturma)
  - [Form Dialog](#form-dialog)
  - [Excel Dosya Seçimi ve Yüklemesi](#excel-dosya-seçimi-ve-yüklemesi)
- [Table](#table)
- [Formlar](#formlar)
  - [Form elemanlarının otomatik kontrolü](#form-elemanlarının-otomatik-kontrolü)
  - [Form Kontrol Helper](#form-kontrol-helper)
  - [Form verilerinin fikeybean olarak almak](#form-verilerinin-fikeybean-olarak-almak)
  - [Form Elements](#form-elements)
    - [ComboBox Element](#combobox-element)
- [Db İşlemler](#db-i̇şlemler)
  - [Oto Select Sorgular](#oto-select-sorgular)
    - [Select Count Where Id In List (Toplu Kayıt Sayısı Kontrolü)](#select-count-where-id-in-list-toplu-kayıt-sayısı-kontrolü)
  - [Oto Update Sorgular](#oto-update-sorgular)
    - [Update Where Id In List (Toplu Güncelleme)](#update-where-id-in-list-toplu-güncelleme)
  - [FiQuery](#fiquery)
    - [FiQueryTools metodlar](#fiquerytools-metodlar)
- [Db Aktarım](#db-aktarım)
  - [Lokal Aktarım Sablon 1](#lokal-aktarım-sablon-1)
  - [Lokal Aktarım Sablon 2](#lokal-aktarım-sablon-2)
- [FiQuery Metodları](#fiquery-metodları)
  - [convertUserParamsToValue()](#convertuserparamstovalue)
- [Hata Çözümleri](#hata-çözümleri)
  - [Sorgularda Db Collation CS CI cakismasi](#sorgularda-db-collation-cs-ci-cakismasi)
- [Karalama Notlar - İnceleneecek](#karalama-notlar---i̇nceleneecek)


# Kısaltmalar

Kısaltma | Açıklama
---------|-----------------------------------------------------------------------------------------------
Ntn      | Not Null (null değer dönmez, string ise boş string döner) (metod isimlerinin sonuna yazılıyor)
Init     | Initialize (Referansın objesini oluşturur.) (metod isminde)
Vim      | view modal (Class isminde)
Ehp      | Entegre Fx Helper (Class isminde)
Esr      | EntegreServer
Emk      | Entegre Mikro

# Meta Datalar

## FiColsEntegre - Entegre Sütun Objeleri

- FiColsEntegre : Entegre ile ilgili alanlar burada tutulur.
  
- FiColsMikro : Mikro alanları burada tutulur.

örnek alan objesi dönen metod :

```java
public static FiCol aucTxValue() {
  FiCol fiCol = new FiCol("aucTxValue", "Header");
  fiCol.buildColType(OzColType.String);
  return fiCol;
}
```

## MetaEntConst (String vs sabitler)

String sabitler burada tutulur.

Örneğin SOAPaction;

```java
public String soapAction(){
		return "SOAPaction";
  }
```

# Layout

## Hide Component

```java
//
getModView().getFxTableMig().setVisible(false);
//
getModView().getFxTableMig().setManaged(false);

```


# Module Oluşturma

## Form Module



## Table Module



# Module Helper (modüllerde kullanılacak yardımcı metodlar)

EfxhpModHelper : sınıfı EntegreFx Module Helper : modüllerde kullanılacak ortak,yardımcı metodlar sunar.

## Listede eleman sayısı 1 den fazla var mı ortak kontolü

Tablolu pencerelerde seçim yapılırken, 1 den fazla seçilme kontrolü.

```java
if (!EfxhpModHelper.checkKayitlarSecilmisMi(itemsChecked)) return;
```




# Dialog Pencereleri

İlgili Sınıflar

- FxDialogShow
- FxSimpleDialog

## Pop Dialog - Info Warn Error

Pop Dialog - Modal Dialog Örnekleri

## String deger Alan Dialog

*Örnek1*

```java
FxSimpleDialog fxSimpleDialog = FxSimpleDialog.buildTextFieldDialog("Tarih Giriniz (yyyymmdd)");
//fxSimpleDialog.openAsDialogSync();
if (fxSimpleDialog.isClosedWithOk()) {
  String value = fxSimpleDialog.getTxValue();
}

```

*Örnek2*

```java
FxSimpleDialog fxSimpleDialog = new FxSimpleDialog(FxSimpleDialogType.TextFieldWithValidation);
fxSimpleDialog.setTxInitialValue(selectedItemFiGen.getCha_belge_no());
fxSimpleDialog.setMessageHeader("Yeni Belge Nosunu Giriniz;");
fxSimpleDialog.openAsDialogSync();

if (fxSimpleDialog.isClosedWithOk()) {
  // Dialogdaki değerin alınması
  String txValue = fxSimpleDialog.getTxValue();
  // diger işlemler ....
}

```

# Special Components 

## Şablon Exceli Oluşturma

```java
btnSablon = new FxButton("Şablon",Icons525.TERMINAL);
btnSablon.setOnAction(event -> { 
    FiDbResult<List<TBLURUN>> fiDbResult = new 
    RepoTblUrun().jdSelectEntityTop1();     
    FiExcel.saveSablonExcel(this, genColsExcel(), fiDbResult.getValue(), TBLURUN.class, "ozpasentegre");}
);
getModView().getFxMigToolbar().add(btnSablon);

```

## Form Dialog

```java
FxSimpleDialog fxSimpleDialog = new FxSimpleDialog();

FiColList fiCols = new FiColList();

fiCols.add(EhpFormCols.bui().formColLabelAciklama().buildHeader(String.format("%s kodlu %s ürünü için bilgileri giriniz.", stoKod, mkStokSelected.getSto_kisa_ismi())));
fiCols.add(FiColsMikro.bui().sto_uretici_kodu());
fiCols.add(EhpFormCols.bui().formColHesapSecim2("Satıcı Kodu",null, MetaMikroCariKodCins.CariK0.getValue()).buildFieldName(FiColsMikro.bui().sto_sat_cari_kod().getFieldName()));   //.bui().sto_sat_cari_kod());

fxSimpleDialog.initFormDialog(fiCols, FormType.PlainFormV1);

fxSimpleDialog.setPredValidateForm(fxFormMig3 -> {

  if (fxFormMig3 == null) {
    FxDialogShow.showPopWarn("Form Objesi boş geliyor.Sistem Yöneticinize danışın.");
    return false;
  }

  FxFormMig3 fxFormMig = (FxFormMig3) fxFormMig3;

  FiKeyBean formAsFiKeyBean = fxFormMig.getFormAsFiKeyBean();

  String stoUreticiKodu = formAsFiKeyBean.getAsString(FiColsMikro.sto_uretici_kodu());
  String stoSaticiCariKodu = formAsFiKeyBean.getAsString(FiColsMikro.sto_sat_cari_kod());

  formAsFiKeyBean.putObj(FiColsMikro.sto_kod(), stoKod);
  Fdr fdrUpdate = new RepoMkStoklarJdbi(getConnProfile()).updateUreticiKoduAndUretCariKodu(formAsFiKeyBean);
  FxDialogShow.showFdr1PopOrFailModal(fdrUpdate);

  if (fdrUpdate.isTrueBoResult()) {
    mkStokSelected.setSto_uretici_kodu(stoUreticiKodu);
    mkStokSelected.setSto_sat_cari_kod(stoSaticiCariKodu);
    getFxTableView().refreshTableFiAsyn();
    return true;
  }
  return false;
});

fxSimpleDialog.openAsNonModal();
```

*Örnek 2 - Form Dialog* 

```java
		FxSimpleDialog fxSimpleDialog = new FxSimpleDialog();

		FiColList fiCols = new FiColList();

		fiCols.add(FiColsEntegre.echTxEttn());
		fiCols.add(FiColsEntegre.cha_belge_no().buiHeader("Fatura No"));
		fiCols.add(EfxhpFormCols.bui().formEdmAyarGruplariApcTxGrup(getConnProfile()));

		fxSimpleDialog.setupFormDialog(fiCols, FormType.PlainFormV1);

		fxSimpleDialog.setPredValidateForm(fxFormMig3 -> {

			if (fxFormMig3 == null) {
				FxDialogShow.showPopWarn("Form Objesi boş geliyor.Sistem Yöneticinize danışın.");
				return false;
			}

			FxFormMig3 fxFormMig = (FxFormMig3) fxFormMig3;
			FiKeyBean formAsFiKeyBean = fxFormMig.getFormAsFkb();

			String echTxEttn = formAsFiKeyBean.getAsString(FiColsEntegre.echTxEttn());
			String chaBelgeNo = formAsFiKeyBean.getAsString(FiColsEntegre.cha_belge_no());

			if (FiString.isEmpty(echTxEttn) && FiString.isEmpty(chaBelgeNo)) {
				FxDialogShow.showPopWarn("Lütfen Ettn veya Fatura No Giriniz");
				return false;
			}

			MolEdmWebService molEdmWebService = new MolEdmWebService(getConnProfile());
			molEdmWebService.reqLogin(formAsFiKeyBean.getAsString(FiColsEntegre.apcTxGrup()));

			List<EdmCariHareketBaslik> edmCariHareketBasliks = new ArrayList<>();
			EdmCariHareketBaslik edmCariHareketBaslik = new EdmCariHareketBaslik();
			edmCariHareketBaslik.setEchTxEttn(echTxEttn);
			edmCariHareketBaslik.setCha_belge_no(chaBelgeNo);
			edmCariHareketBasliks.add(edmCariHareketBaslik);
			Fdr<EdmResponse> edmResponseFdr = molEdmWebService.markEdmEvrak(edmCariHareketBasliks, MetaEdmMark.unread().getTxKey());
			FxDialogShow.showFdr1PopOrFailModal(edmResponseFdr);

			if (edmResponseFdr.isTrueBoResult()) return true;
			return false;
		});
		fxSimpleDialog.openAsDialogSync();
```



## Excel Dosya Seçimi ve Yüklemesi

```java

File file = new FiFileGui().actFileChooserForExcelFromDesktop();

if (file != null) {

	List<MkCariHesaplar> listChh = FiExcel.build().readExcelFile(file, genColsExcelVergiNo(), MkCariHesaplar.class);

}

```


# Table

Tablo ile ilgili bilgiler

# Formlar

## Form elemanlarının otomatik kontrolü

```java
List<FiCol> listFiTableColWithFormValue = getFxFormMig().getListFiColWithFormValue();
Fdr fdr = FxEditorFactory.validateCols(listFiTableColWithFormValue);

```

## Form Kontrol Helper

EhpFormCols.formKontrol() metodu true dönerse form dogru, false dönerse hata var demektir.

false sonuç için ayrıca metodda uyarı popup düzenlendi.

```java
if(!new EhpFormCols().formKontrol(getFxFormRapor()))return;
```

## Form verilerinin fikeybean olarak almak

```java
FiKeyBean formAsFiKeyBean = getFxFormMig().getFormAsFiKeyBean();
```


## Form Elements

### ComboBox Element

```java
// grup Kodu
listTableCols.add(FiTableColBuildHelper.build(EntegreField.akesTxGrupKod)
  .buildColType(OzColType.String)
	.buildEditorNodeClass(FxComboBoxSimple.class.getName())
	.buildFnEditorRendererAfterFormLoad((o, node) -> {
	    EhpCommonFnForComps.fillFxAktarimEslestirmeGrup((FxComboBoxSimple) node);
    })
  );
```

```java
// EhpFormCols
public FiCol formEdmAyarGruplari_ApcTxGrup() {
  FiCol fiCol = FiColsEntegre.bui().apcTxGrup();

  fiCol.buildEditorNodeClass(FxComboBoxSimple.class.getName())
      .buiFnEditorNodeRendererBeforeSettingValue((o, node) -> {
        FxComboBoxSimple fxNode = (FxComboBoxSimple) node;

        Fdr<List<EntAppConfig>> listFdr = new RepoEntAppConfig().selTxGrupDistinct2(MetaAppConfigs.bui().edmWebServiceUser().getApcGuid());

        for (EntAppConfig entAppConfig : listFdr.getValueOr(new ArrayList<>())) {
          fxNode.addComboItem(new ComboItem(entAppConfig.getApcTxGrup(),entAppConfig.getApcTxGrup()));
        }
      });
  return fiCol;
}
```
			
- *Sor. Mer. Form Elemanı*

```java

listTableCols.add(FiTableColBuildHelper.build(EntegreField.akesTxSorMerKod)
  .buildColType(OzColType.String)
	.buildEditorNodeClass(FxComboBoxSimple.class.getName())
	.buildFnEditorRendererAfterFormLoad((o, node) -> {
		EhpCommonFnForComps.fillFxComboSorMerDefaultNull((FxComboBoxSimple) node);
		})
);
```





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

## FiQuery

### FiQueryTools metodlar

```

activateParamsMain : mapParams bulunan parametreleri aktive eder(eğer yorum satırına alınmışsa). (sadece dolu olanlar aktif edilsin belirtilirse, dolu olanlar aktive edilir,boş olanları ise pasif eder.)

activateOptParamMain : tek bir tane opt param'ı aktif etmek için
deActivateOptParamMain : tek bir tane opt param'ı deaktif etmek için

activateNamedParamsMain

activateSqlAtParamMain
deactivateSqlAtParamMain

activateAndUpdateOptParam

deActivateAllOptParams

makeMultiParamTemplate

convertSqlForMultiParamByTemplate
convertSqlForMultiParamByTemplate2

convertSqlParamToListJdbiParamMain
convertSqlParamToCommentMain
convertSqlParamToJdbiParamMain

convertListParamToMultiParams

stoj
fixSqlProblems

checkParamsEmpty
checkOptParamExist
findParamsOptional
findParams

getMultiParamStartIndex


```



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


# Hata Çözümleri

## Sorgularda Db Collation CS CI cakismasi

varchar alanın sonuna `collate Turkish_CS_AI` eklenir.

```sql
LEFT JOIN MikroDB_V15_OZPAS.dbo.CARI_HESAP_HAREKETLERI chh 
    ON kko.cha_evrakno_seri = chh.cha_evrakno_seri collate Turkish_CS_AI
```





# Karalama Notlar - İnceleneecek

```java

public void actBtnEdit() {

	Object selectedItem = getFxTableView().getSelectionModel().getSelectedItem();

	if (selectedItem == null) return;

	// zorunlu alanlar kontrol edilmeli annolara göre

	ModEntAktarimEslestirmeFormCont modForm = new ModEntAktarimEslestirmeFormCont();
	modForm.setFormEntityForEdit((EntAktarimEslestirme) selectedItem);
	modForm.openAsDialogSync();

	if (modForm.checkClosedWithDone()) {
		//getFxTableView().refreshTableFi();
		pullTableData();
	}

}
    
EventHandler<KeyEvent> eventFilter = event -> {

	MkCARI_HESAP_HAREKETLERI mkCARI_hesap_hareketleri = FxEditorFactory.bindFormToEntityByFilterNode(getModView().getFxTableView().getFiTableColList(), MkCARI_HESAP_HAREKETLERI.class);

	//mkCARI_hesap_hareketleri.setEmEvrakTip(getEmEvrakTipWindow());
	List<MkCARI_HESAP_HAREKETLERI> listYeni = new RepoCariHareketlerJdbi().selCariHarLike(mkCARI_hesap_hareketleri);
	getModView().getFxTableView().setItemsAsFilteredList(listYeni);


};

getModView().getFxTableView().setColFilterNodeEnterEvent(eventFilter);
    
```



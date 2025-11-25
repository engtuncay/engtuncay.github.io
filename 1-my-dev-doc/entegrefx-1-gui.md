
<h1>Entegre Uygulaması Geliştirici Dökümantasyonu</h1>

Java Fx ile geliştirdiğim uygulama için aldığım notlar. 

# Contents

- [Contents](#contents)
- [Kısaltmalar](#kısaltmalar)
- [Helper Sınıfları](#helper-sınıfları)
- [Meta Datalar](#meta-datalar)
  - [FiColsEntegre - Entegre Sütun Objeleri](#ficolsentegre---entegre-sütun-objeleri)
  - [MetaEntConst Entegre Meta Sabitler (String degerler)](#metaentconst-entegre-meta-sabitler-string-degerler)
- [Layout](#layout)
  - [Hide Component](#hide-component)
- [Module Oluşturma](#module-oluşturma)
  - [Form Module](#form-module)
  - [Table Module](#table-module)
- [Module Helper](#module-helper)
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
  - [Form oluşturma](#form-oluşturma)
  - [Form elemanlarının otomatik kontrolü](#form-elemanlarının-otomatik-kontrolü)
  - [Form Kontrol Helper](#form-kontrol-helper)
  - [Form verilerinin FiKeybean olarak almak](#form-verilerinin-fikeybean-olarak-almak)
  - [Form Elements (FiCols)](#form-elements-ficols)
    - [ComboBox FiCol Element](#combobox-ficol-element)
- [Karalama Notlar - İnceleneecek](#karalama-notlar---i̇nceleneecek)

[🔝](#contents)

# Kısaltmalar

➖ Class İsminde Kullanılan Kısaltmalar

- Vim  : view modal (Class isminde)
- Ehp : Entegre Fx Helper (Class isminde) (Enh)
- Esr : EntegreServer
- Emk : Entegre Mikro
- Emhp : Ent. Mikro Helper (emh de kullanılabilir)
- Emm : Ent. Mikro Modals (Entegre Mikro Projedeki Modal Sınıfları)

➖ Metod İsminde Kullanılan Kısaltmalar

Prefix

PostFix

- Ntn :  Not Null (null değer dönmez, string ise boş string döner) 
- Init : Initialize (Referansın objesini oluşturur.)

[🔝](#contents)

# Helper Sınıfları

Sınıf    | Açıklama
---------|----------------
EmhpIcon | Kullanılan icon
  
[🔝](#contents)

# Meta Datalar

## FiColsEntegre - Entegre Sütun Objeleri

- FiColsEntegre : Entegre ile ilgili alanlar burada tutulur.
  
- FiColsMikro : Mikro alanları burada tutulur.

İlgili tablo ismindeki sınıfın içerisine çekildi. (FiColsCariHesap,FiColsCha gibi...)

örnek alan objesi dönen metod :

```java
public static FiCol aucTxValue() {
  FiCol fiCol = new FiCol("aucTxValue", "Header");
  fiCol.buildColType(OzColType.String);
  return fiCol;
}
```

## MetaEntConst Entegre Meta Sabitler (String degerler)

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



# Module Helper 

Modüllerde kullanılacak yardımcı metodlardır.

- EfxhpModHelper sınıfı (EntegreFx Module Helper) : modüllerde kullanılacak ortak,yardımcı metodlar sunar.

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

## Form oluşturma



## Form elemanlarının otomatik kontrolü

```java
List<FiCol> listFiCol = getFxFormMig().getListFiColWithFormValue();
Fdr fdr = FxEditorFactory.validateCols(listFiCol);

```

## Form Kontrol Helper

`EhpFormCols.formKontrol()` metodu true dönerse form dogru, false dönerse hata var demektir.

false sonuç için ayrıca metodda uyarı popup düzenlendi.

```java
if(!new EhpFormCols().formKontrol(getFxFormRapor()))return;
```

## Form verilerinin FiKeybean olarak almak

```java
FiKeyBean fkbForm = getFxFormMig().getFormAsFiKeyBean();

```


## Form Elements (FiCols)

### ComboBox FiCol Element

Combobox içeriği `buildFnEditorRendererAfterFormLoad((o,node)->{ /*..*/})` veya `buiFnEditorNodeRendererBeforeSettingValue((o, node) -> {}` metodları ile doldurulabilir. Burada node, componenti (combobox,choicebox vs) gösterir.

Örnek

```java
  // EhpFormCols
  FiCol fiCol = FiColsEntegre.bui().apcTxGrup();

  fiCol.buildEditorNodeClass(FxComboBoxSimple.class.getName());
  fiCol.buiFnEditorNodeRendererBeforeSettingValue((o, node) -> {
    FxComboBoxSimple fxNode = (FxComboBoxSimple) node;

    Fdr<List<EntAppConfig>> listFdr = new RepoEntAppConfig().selTxGrupDistinct2(MetaAppConfigs.bui().edmWebServiceUser().getApcGuid());

    for (EntAppConfig entAppConfig : listFdr.getValueOr(new ArrayList<>())) {
      fxNode.addComboItem(new ComboItem(entAppConfig.getApcTxGrup(),entAppConfig.getApcTxGrup()));
    }
  });

```

```java
listTableCols.add(FiTableColBuildHelper.build(EntegreField.akesTxGrupKod)
  .buildColType(OzColType.String)
	.buildEditorNodeClass(FxComboBoxSimple.class.getName())
	.buildFnEditorRendererAfterFormLoad((o, node) -> {
	    EhpCommonFnForComps.fillFxAktarimEslestirmeGrup((FxComboBoxSimple) node);
    })
  );

```
			
- Sor. Mer. Form Elemanı

```java

listTableCols.add(FiTableColBuildHelper.build(EntegreField.akesTxSorMerKod)
  .buildColType(OzColType.String)
	.buildEditorNodeClass(FxComboBoxSimple.class.getName())
	.buildFnEditorRendererAfterFormLoad((o, node) -> {
		EhpCommonFnForComps.fillFxComboSorMerDefaultNull((FxComboBoxSimple) node);
		})
);
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




